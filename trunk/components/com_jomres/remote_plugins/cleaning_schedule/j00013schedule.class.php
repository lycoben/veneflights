<?php
// PHPLOCKITOPT NOENCODE
// Copyright (C) 2006 Vince Wooll
// This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
// All rights reserved.
//
// ################################################################
if (defined('JPATH_BASE'))
	defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
else
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################
//
//global $ePointFilepath;
//include ($ePointFilepath.'fpdf.php');

class j00013schedule
	{
	function j00013schedule()
		{
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $thisJRUser;

		$requestedMonth	= jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		if ($requestedMonth==0)
			$thisMonth=date("Y/m");
		else
			$thisMonth=date("Y/m",$requestedMonth);
		
		$g=genericOr($thisJRUser->authorisedProperties,'property_uid');
		$query = "SELECT `contract_uid`,`arrival`,`departure`,`property_uid` FROM #__jomres_contracts WHERE `departure` LIKE '".$thisMonth."%' AND ".$g." ORDER BY `property_uid`,`departure` ";
		$result = doSelectSql($query);
		if (count($result)>0)
			{
			$contracts = array();
			foreach ($result as $c)
				{
				$contracts[$c->contract_uid]=array("contract_uid"=>$c->contract_uid,"departure"=>$c->departure,"arrival"=>$c->arrival,"property_uid"=>$c->property_uid);
				$cids[]=(int)$c->contract_uid;
				}
			$g=genericOr($cids,'contract_uid');
			$query = "SELECT `room_uid`,`contract_uid`,`date` FROM #__jomres_room_bookings WHERE ".$g;
			$result = doSelectSql($query);
			$bookedout_rooms=array();
			$rids=array();
			foreach ($result as $r)
				{
				$bookedout_rooms[]=array("room_uid"=>$r->room_uid,"contract_uid"=>$r->contract_uid,"date"=>$r->date);
				$rids[]=(int)$r->room_uid;
				}
			$rid=array_unique($rids);
			sort($rid);
			$g=genericOr($rid,'room_uid');
			$query = "SELECT `room_name`,`room_number`,`room_uid` FROM #__jomres_rooms WHERE ".$g;
			$result = doSelectSql($query);
			$property_rooms=array();
			foreach ($result as $r)
				{
				$property_rooms[$r->room_uid]=array("room_name"=>$r->room_name,"room_number"=>$r->room_number);
				}
			// Ok, that's taken care of data collection. Now let's get our data output
			
			$text_title = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE',"Arrival/Cleaning schedule");
			$text_propertyname = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_PROPERTYNAME',"Property name");
			$text_roomnamenumber = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ROOMNAME',"Room name/number");
			$text_arrival = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ARRIVAL',"Arrival");
			
			echo "<center>";
			echo '<table class="jradmin_table">';
			echo '<tr><td  class="jomres_title" colspan="3">'.$text_title.'</th></tr>';
			echo '<tr><td class="jradmin_subheader_ca">'.$text_propertyname.'</td><td class="jradmin_subheader_ca">'.$text_roomnamenumber.'</td><td class="jradmin_subheader_ca">'.$text_arrival.'</td></tr>';
			foreach ($contracts as $contract)
				{
				foreach ($bookedout_rooms as $room)
					{
					if ($room['contract_uid']==$contract['contract_uid'] && $room['date'] == $contract['arrival'])
						{
						$rm_uid=$room['room_uid'];
						$property_uid=$contract['property_uid'];
						$property_name = $thisJRUser->authorisedPropertyDetails[$property_uid]['property_name'];
						echo '<tr><td class="jradmin_field_ca">'.$property_name.' </td><td class="jradmin_field_ca">'.$property_rooms[$rm_uid]['room_name'].' '.$property_rooms[$rm_uid]['room_number'].'</td><td class="jradmin_field_ca">'.$contract['arrival'].'</td></tr>';
						}
					}
				}
			echo "</table></center>";
			}
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}

?>