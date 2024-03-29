<?php
/**
#
 * Mini-component core file: Constructs and displays the dashboard
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
* @subpackage mini-components
#
* @copyright	2005-2008 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */

// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

/**
#
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 #
* @package Jomres
#
 */
class j00013dashboard extends jomres_dashboard
	{

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function j00013dashboard()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig;

		$this->property_uid		= getDefaultProperty();
		$this->cfg_todaycolor	= $mrConfig['avlcal_todaycolor'];  ## font color for the current date
		$this->cfg_inmonthface	= $mrConfig['avlcal_inmonthface'];  ## font color for days in the display month
		$this->cfg_outmonthface	= $mrConfig['avlcal_outmonface'];  ## font color for days not in the display month
		$this->cfg_inbgcolor	= $mrConfig['avlcal_inbgcolour'];  ## cell bgcolor for days in the display month
		$this->cfg_outbgcolor	= $mrConfig['avlcal_outbgcolour'];  ## cell bgcolor for days not in display month
		$this->cfg_occupiedcolour	= $mrConfig['avlcal_occupiedcolour'];  ## cell bgcolour for occupied days
		$this->cfg_provisionalcolour= $mrConfig['avlcal_provisionalcolour'];  ## cell bgcolour for occupied days
		$this->cfg_pastcolour	= $mrConfig['avlcal_pastcolour'];  ## cell bgcolour for occupied days
		$this->cfg_booking		= $mrConfig['avlcal_booking'];  ## font color for days where the room is booked up
		$this->cfg_black		= $mrConfig['avlcal_black'];  ## font color for days where the room is black booked
		$this->cfg_weekendborder= $mrConfig['avlcal_weekendborder'];  ## font color for days where the room is black booked
		$this->requestedMonth	= jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		$this->dashboardmonthcookie	= jomresGetParam( $_COOKIE,'dashboardmonth', '' );

		if ($this->requestedMonth==0)
			{
			$currentMonth=date("Y/m");
			$dateElements=explode("/",$currentMonth);
			if(!$this->dashboardmonthcookie)
				{
				$this->dashboardmonthcookie= mktime(0, 0, 0,$dateElements[1],1,$dateElements[0]);
				SetCookie("dashboardmonth", "$this->dashboardmonthcookie", time()+3600);
				$this->requestedMonth=$this->dashboardmonthcookie;
				}
			else
				{
				$this->requestedMonth=$this->dashboardmonthcookie;
				}
			}
		else
			SetCookie("dashboardmonth", "$this->dashboardmonthcookie", time()+3600);
		$this->roomsArray 				= array();
		$this->thisMonthsDatesArray 	= array();
		$this->unixLatestDate			= 0;
		$this->monthsToShow				= 16;

		// Let's do some data collection to try to minimise the db queries
		$this->contracts=array();
		$query="SELECT contract_uid,deposit_paid,arrival,departure,guest_uid FROM #__jomres_contracts WHERE property_uid = '".(int)$this->property_uid."' AND `cancelled` != 1 ";
		$contractList = doSelectSql($query);
		if (count($contractList)>0)
			{
			foreach ($contractList as $c)
				{
				$this->contracts[$c->contract_uid]=array("deposit_paid"=>$c->deposit_paid,"arrival"=>$c->arrival,"departure"=>$c->departure,"guest_uid"=>$c->guest_uid);
				}
			}

		$this->guestInfo = array();
		$query="SELECT firstname,surname,guests_uid FROM #__jomres_guests WHERE property_uid = '".(int)$this->property_uid."'";
		$guestList = doSelectSql($query);
		if (count($guestList)>0)
			{
			foreach ($guestList as $c)
				{
				$this->guestInfo[$c->guests_uid]=array("firstname"=>$c->firstname,"surname"=>$c->surname);
				}
			}

		$this->room_bookings = array();
		$query="SELECT room_uid,contract_uid,black_booking,date FROM #__jomres_room_bookings WHERE property_uid = ".(int)$this->property_uid;
		$bookingsList = doSelectSql($query);
		if (count($bookingsList)>0)
			{
			foreach ($bookingsList as $c)
				{
				$this->room_bookings[]=array("room_uid"=>$c->room_uid,"contract_uid"=>$c->contract_uid,"black_booking"=>$c->black_booking,"date"=>$c->date);
				}
			}


		$this->todaysDate=date("Y/m/d");
		$today = getdate();
		$this->unixTodaysDate=mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
		$this->setDates();
		$this->getRoomsForProperty();
		//var_dump($this);
		echo $this->dashboardMakeMonthList();
		// Uncomment the next line to show the current dashboard month & year in a table
		//echo $this->getMonthAndYearOutput();

		echo $this->getCss();
		echo $this->viewRoomsHorizontal();
		echo $this->getLegend();
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function viewRoomsHorizontal()
		{
		global $mrConfig;

		$output="";
		$monthsToShow=1;
		if ($mrConfig['singleRoomProperty']=="1")
			$monthsToShow=12;
		$i=1;
		while ($i <= $monthsToShow)
			{
			$output.="<table>";
			foreach ($this->roomsArray as $room)
				{
				$n=1;
				/*
				foreach ($this->thisMonthsDatesArray as $currdate)
					{
					$sqlDates[]=date("Y/m/d",$currdate);
					$n++;
					$currdate = mktime(0,0,0,date("m",$this->startdate),date("d",$this->startdate) + $n,date("Y",$this->startdate));
					}
				$gor=genericOr($sqlDates,'date',false);
				$query="SELECT contract_uid,black_booking,date FROM #__jomres_room_bookings WHERE room_uid = '".(int)$room['id']."' AND ".$gor;
				$roomList = doSelectSql($query);
				*/
				$bookings=array();
				if (count($this->room_bookings)>0)
					{
					foreach ($this->room_bookings as $r)
						{
						if ($r['room_uid'] == $room['id'])
							{
							$bookings[]=array("contract_uid"=>$r['contract_uid'],"black_booking"=>$r['black_booking'],"date"=>$r['date']);
							}
						}
					}
				$output.="<tr>";
				if ($mrConfig['singleRoomProperty']=="1")
					$output.='<td>'.date("m/Y",$this->requestedMonth).'</td>';
				else
					{
					$output.='<td>'.$room['room_number'].'</td>';
					//$output.='<td>'.$room['room_name'].'</td>';
					}
				//$output.=$this->getHorizontalRoom($room['id'],$roomList);
				$output.=$this->getHorizontalRoom($room['id'],$bookings);
				$output.="</tr>";
				}
			$output.="</table>";
			$currentMonth=date("Y/m/d",$this->requestedMonth);
			$dateElements=explode("/",$currentMonth);


			$this->requestedMonth=mktime(0, 0, 0,$dateElements[1]+1,$dateElements[2],$dateElements[0]);
			$this->thisMonthsDatesArray=array();
			$this->setDates();
			$i++;
			//echo $i;
			}

		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getHorizontalRoom($room_id,$bookings)
		{
		global $mrConfig;
		$output="";
		$i=0;

		//var_dump($roomList);
		$roomsArray=array();
		$bookingsArray=array();
		foreach ($bookings as $rm)
			{
			/*
			$date=$rm->date;
			$contractUid=$rm->contract_uid;
			$blackbooking=$rm->black_booking;
			$bookingsArray[$date]=array('contract_uid'=>$contractUid,'black_booking'=>$blackbooking);
			*/

			$date=$rm['date'];
			$contractUid=$rm['contract_uid'];
			$blackbooking=$rm['black_booking'];
			$bookingsArray[$date]=array('contract_uid'=>$contractUid,'black_booking'=>$blackbooking);
			}
		foreach ($this->thisMonthsDatesArray as $currdate)
			{
			$dobookingLink 		= false;
			$viewbookingLink 	= false;
			$blackBookingLink 	= false;
			$showDate			= true;
			$pastDate			= false;
		   	$contract_uid="";
			$bgcolor=$this->cfg_inbgcolor;
			$fcolor =$this->cfg_inmonthface;
			$sqlDate=date("Y/m/d",$currdate);
			$sqlDate2=date("Y-m-d",$currdate);

			$deposit_paid=TRUE;
			if (count($bookingsArray)>0)
				{
				if (array_key_exists(date("Y/m/d",$currdate),$bookingsArray) )
					{
				   	$bgcolor = $this->cfg_occupiedcolour;
					$fcolor=$this->cfg_booking;
					$viewbookingLink = true;
					$d=date("Y/m/d",$currdate);
					$t=$bookingsArray[$d];
					$contract_uid=$t['contract_uid'];
					$black_booking=$t['black_booking'];
					if ($black_booking!="1")
						{
						/*
				   		$query="SELECT deposit_paid FROM #__jomres_contracts WHERE contract_uid = '".(int)$contract_uid."' LIMIT 1";
						//echo $query;
				   		$contractList = doSelectSql($query);

						foreach ($contractList as $contract)
							{
				  			$deposit_paid=$contract->deposit_paid;
		   					if (!$deposit_paid)
				   				$bgcolor=$this->cfg_provisionalcolour;
				   			}
				   		*/
						$deposit_paid=$this->contracts[$contract_uid]["deposit_paid"];
		   				if (!$deposit_paid)
				   			$bgcolor=$this->cfg_provisionalcolour;
						}
					else
						{
						$fcolor=$this->cfg_black;
						$blackBookingLink = true;
						}
					}
				}
			if ( $this->isWeekend($currdate) )
				$border='border:solid 1px '.$this->cfg_weekendborder.';';
			else
				$border="";

			if (!$viewbookingLink && !$blackBookingLink)
				$dobookingLink = true;
			if ( ($mrConfig['limitAdvanceBookingsYesNo']=="1" && ($currdate>=$this->unixLatestDate) ) ||$currdate<$this->unixTodaysDate)
				{
				$pastDate=true;
				$bgcolor = $this->cfg_pastcolour;
				}
			if ( date("d",$currdate) == date("d") && date("m",$currdate) == date("m") && date("Y",$currdate) == date("Y")  )
				$fcolor = $this->cfg_todaycolor;
			$output.=$this->showDate($pastDate,$dobookingLink,$bgcolor,$fcolor,$currdate,$sqlDate2,$contract_uid,$room_id,$border,$blackBookingLink);
			$i++;
			$currdate = mktime(0,0,0,date("m",$this->startdate),date("d",$this->startdate) + $i,date("Y",$this->startdate));
			}
		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function showDate($pastDate,$dobookingLink,$bgcolor,$fcolor,$currdate,$sqlDate2,$contract_uid="",$room_id,$border,$blackBookingLink)
		{
		global $mrConfig,$Itemid;
		$output="";
		$bookinglink='index.php?option=com_jomres&task=dobooking&Itemid='.$Itemid.'&amp;selectedProperty='.$this->property_uid.'&arrivalDate='.$sqlDate2;
		$viewbookinglink='index.php?option=com_jomres&task=editBooking&Itemid='.$Itemid.'&contract_uid='.$contract_uid;
		$basicFont='<FONT style="style=color:'.$fcolor.'; '.$border.' ">';

		$output.='<td align="center" valign="middle" bgcolor="'.$bgcolor.'" >';
		if ($dobookingLink && !$pastDate)
			{
			if ($mrConfig['fixedArrivalDateYesNo']=="1")
				{
				$currdow=date("w",$currdate);
				if ($mrConfig['fixedArrivalDay']==date("w",$currdate))
					{
					if ($mrConfig['visitorscanbookonline'])
						{
						if (!$mrConfig['singleRoomProperty'])
						   	$bookinglink.='&remus='.$room_id;
						$output.= '<a href="'.jomresURL($bookinglink).'" class="rescal_dashboard"  style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
			   	   		}
		   		   	else
						$output.= date ("j",$currdate);
					}
				else
					$output.= date ("j",$currdate);
				}
			else
				{
				if (!$mrConfig['singleRoomProperty'])
					$bookinglink.='&remus='.$room_id;
				$output.='<a href="'.jomresURL($bookinglink).'" class="rescal_dashboard"  style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
				}
			}
		else
		   	{
			if ($contract_uid!="")
				{
				if (!$blackBookingLink)
					$overlib=$this->getOverlibBookingDeets($contract_uid);
				else
					$overlib="";
				$link='<a href="'.jomresURL($viewbookinglink).'" class="rescal_dashboard" '.$overlib.' style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
				$output.=$link;
		   		}
		   	else
				{
				$output.=$basicFont.date ("j",$currdate);
				}
			}
		$output.="</font></td>\n";
		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getOverlibBookingDeets($contract_uid)
		{
		/*
		$query="SELECT guest_uid,arrival,departure FROM #__jomres_contracts WHERE contract_uid = '".(int)$contract_uid."'";
		$guest_uid=doSelectSql($query,2);


		$query="SELECT firstname,surname FROM #__jomres_guests WHERE guests_uid = '".(int)$guest_uid['guest_uid']."'";

		$guest_deets=doSelectSql($query,2);

		$r='onmouseover="return overlib(\''.$content.'\', CAPTION, \''.$this->guestInfo[$guest_uid]['firstname'].' '.$this->guestInfo[$guest_uid]['surname'].'\');" onmouseout="return nd();"';
		*/
		$content=outputDate($this->contracts[$contract_uid]['arrival']).'-'.outputDate($this->contracts[$contract_uid]['departure']);
		$guest_uid=$this->contracts[$contract_uid]['guest_uid'];

		$r='onmouseover="return overlib(\''.$content.'\', CAPTION, \''.$this->guestInfo[$guest_uid]['firstname'].' '.$this->guestInfo[$guest_uid]['surname'].'\');" onmouseout="return nd();"';

		return $r;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function dashboardMakeMonthList($orientation="")
		{
		global $jomresConfig_locale,$Itemid;
		$monthsArray=array();
		$output="";
		setlocale(LC_ALL, $jomresConfig_locale );
		$currentMonth=date("Y/m/d");
		$dateElements=explode("/",$currentMonth);
		//$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1],1,$dateElements[0]));
		$year=strftime("%Y", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
		$nextMonth= getThisMonthName(strftime("%m", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0])),false)." ".$year;
		$nm= mktime(12, 0, 0,$dateElements[1],1,$dateElements[0]);
		for ($i=1;$i<=$this->monthsToShow;$i++)
			{
			$link=jomresURL('index.php?option=com_jomres&requestedMonth='.$nm.'&Itemid='.$Itemid);
			$monthsArray[]=jomresHTML::makeOption($link,$nextMonth);
			//$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
			$year=strftime("%Y", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
			$nextMonth= getThisMonthName(strftime("%m", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0])),false)." ".$year;
			$nm= mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]);
			}
		$dropdown=jomresHTML::selectList( $monthsArray, 'requestedMonth', 'size="1" class="inputbox" OnChange="location.href=dashboardmonthdropdown.requestedMonth.options[selectedIndex].value" ', 'value', 'text', jomresURL('index.php?option=com_jomres&requestedMonth='.$this->requestedMonth.'&Itemid='.$Itemid ) );
		$output='<form name="dashboardmonthdropdown">';
		$output.=$dropdown;
		$output.='</form>';
		return $output;
		}
		/*
		// Uncomment the following function & comment out the above one if you want your months to be listed as links instead of the dropdown.
		function dashboardMakeMonthList($orientation="horizontal")
			{
			global $jomresConfig_locale,$Itemid;
			$output="";
			setlocale(LC_ALL, $jomresConfig_locale );
			$currentMonth=date("Y/m/d");
			$dateElements=explode("/",$currentMonth);
			$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1],1,$dateElements[0]));
			$nm= mktime(12, 0, 0,$dateElements[1],1,$dateElements[0]);
			$output .= "<table><tr>";
			for ($i=1;$i<=$this->monthsToShow;$i++)
				{
				$link="<td><a href=\"".sefRelToAbs("index.php?option=com_jomres&Itemid=$Itemid&requestedMonth=$nm")."\"><font size=\"1\">|".$nextMonth."</font></a></td>";
				if ($orientation !="horizontal" ) // Let's add some br's to the end to make columns of months
					$link = $link."<br>";
				$output.= $link;
				$nextMonth=strftime("%B %Y", mktime(12, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
				$nm= mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]);
				if ($i%8==0 and $i<16)
				   	$output.="</tr><tr>";
				}
			$output.="</tr></table>";
			return $output;
			}
		*/


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getLegend()
		{
		$output="";
		$output.='<table>';
		$output.='<tr><td>'.jr_gettext('_JOMRES_COM_AVLCAL_INMONTHFACE_KEY',_JOMRES_COM_AVLCAL_INMONTHFACE_KEY).'</td><td bgcolor="'.$this->cfg_inbgcolor.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR_KEY',_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR_KEY).'</td><td bgcolor="'.$this->cfg_occupiedcolour.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR_KEY',_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR_KEY).'</td><td bgcolor="'.$this->cfg_provisionalcolour.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		//$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_BOOKING_KEY',_JOMRES_COM_AVLCAL_BOOKING_KEY).'</td><td bgcolor="'.$this->cfg_booking.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		//$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_BLACK_KEY',_JOMRES_COM_AVLCAL_BLACK_KEY).'</td><td bgcolor="'.$this->cfg_black.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>';
		$output.='</table>';
		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getCss()
		{
		$output='
		<style>
		a.rescal:link, a.rescal:visited, tr.rescal, td.rescal {
		display : block;
		}
		a.rescal:hover {
		background-color : grey;
		color : black;
		}
		</style>';
		return $output;
		}


	function touch_template_language()
		{
		$output=array();

		$output['HPROPERTYADMIN']		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN',_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN);
		$output['HCUSTOMERTYPEADMIN']	=jr_gettext('_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES',_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES);
		$output['HSHOWAUDITTRAIL']		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_AUDITTRAIL',_JOMRES_FRONT_MR_MENU_ADMIN_AUDITTRAIL);
		$output['HLISTEXTRAS']			=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_EXTRAS',_JOMRES_FRONT_MR_MENU_ADMIN_EXTRAS);
		$output['HLISTBLACKBOOKINGS']	=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS',_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS);
		$output['HEDITLANG']			=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_LANGUAGE',_JOMRES_FRONT_MR_MENU_ADMIN_LANGUAGE);
		$output['HBATCHUPLOADS']		=jr_gettext('_JOMRES_FRONT_IMAGEUPLOADS',_JOMRES_FRONT_IMAGEUPLOADS);
		$output['HSTATS']				=jr_gettext('_JRPORTAL_STATS_PATETITLE',_JRPORTAL_STATS_PATETITLE);

		$output['P1'] = jr_gettext('_JOMRES_COM_MR_VRCT_UNPUBLISH',_JOMRES_COM_MR_VRCT_UNPUBLISH);
		$output['P2'] = jr_gettext('_JOMRES_COM_MR_VRCT_PUBLISH',_JOMRES_COM_MR_VRCT_PUBLISH);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

		/*
		// Uncomment this function if you want css with fixed width blocks. It breaks 3 column templates but looks ok in 2 columns.
		function getCss()
		{
		$output='
		<style>
		a.rescal:link, a.rescal:visited, tr.rescal, td.rescal {
		display : block;
		width : 20px;
		height : 16px;
		padding-top : 2px;
		font-size : 10px;
		cellpadding:1px;
		cellspacing:3px;
		}
		a.rescal:hover {
		background-color : grey;
		color : black;
		}
		</style>';
		return $output;
		}
	*/

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>