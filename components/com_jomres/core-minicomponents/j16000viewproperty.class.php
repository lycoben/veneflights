<?php
/**
#
 * Mini-component core file:
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

class j16000viewproperty
	{
	function j16000viewproperty($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $indexphp;
		$id=$componentArgs['id'];
		$numberOfYearsToShow=3;
		if (is_null($id) )
			$id = jomresGetParam( $_REQUEST, 'id',	0 );

		if ($id ==0)
			trigger_error ("Front end stats ID empty", E_USER_ERROR);

		$propertyFunctions=new jrportal_property_functions();
		$bookingFunctions=new jrportal_booking_functions();
		$crateFunctions=new jrportal_crate_functions();

		$output['PAGETITLE']=_JRPORTAL_PROPERTIES_VIEWPROPERTY;
		$output['HPROPERTYNAME']=_JRPORTAL_PROPERTIES_PROPERTYNAME;
		$output['HPROPERTYADDRESS']=_JRPORTAL_PROPERTIES_PROPERTYADDRESS;
		$output['HNUMBEROFBOOKINGS']=_JRPORTAL_PROPERTIES_NUMBEROFBOOKINGS;
		$output['HVALUEOFBOOKINGS']=_JRPORTAL_PROPERTIES_VALUEOFBOOKINGS;
		$output['HCOMMISSIONESTIMATE']=_JRPORTAL_PROPERTIES_COMMISSIONESTIMATE;
		$output['ID']=$id;

		$propertyDetails=$propertyFunctions->getPropertyDetails(array($id));
		$output['APIKEY']=$propertyDetails[$id]['apikey'];
		$output['PROPERTY_NAME']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_name']), ENT_QUOTES);
		$output['PROPERTY_STREET']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_street']), ENT_QUOTES);
		$output['PROPERTY_TOWN']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_town']), ENT_QUOTES);
		$output['PROPERTY_REGION']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_region']), ENT_QUOTES);
		$output['PROPERTY_COUNTRY']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_country']), ENT_QUOTES);
		$output['PROPERTY_POSTCODE']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_postcode']), ENT_QUOTES);
		$output['PROPERTY_TEL']=htmlspecialchars(stripslashes($propertyDetails[$id]['property_tel']), ENT_QUOTES);

		if (is_null($componentArgs['id']))
			{
			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('cancel',$indexphp."?option=com_jomres&task=listproperties",_JRPORTAL_CANCEL);
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;
			}
		// Find our commission rate
		$crate=$crateFunctions->getCrateForPropertyuid($id);
		$commissionRate=floatval($crate['value']);
		$currencyCode=$crate['currencycode'];

		$crateTypesObj= new crateTypes();
		$crateTypesObj->id=$crate['type'];
		$crateTypeText=$crateTypesObj->getCrate();

		$output['CRATE_TITLE']=$crate['title'];
		$output['CRATE_TYPE']=$crateTypeText;
		$output['CRATE_VALUE']=$crate['value'];
		$output['CRATE_CURRENCYCODE']=$crate['currencycode'];

		$output['HCOMMISSIONRATE']=_JRPORTAL_PROPERTIES_COMMISSIONRATE;
		$output['HCRATE_TITLE']=_JRPORTAL_CRATE_TITLE;
		$output['HCRATE_TYPE']=_JRPORTAL_CRATE_TYPE;
		$output['HCRATE_VALUE']=_JRPORTAL_CRATE_VALUE;
		$output['HCRATE_CURRENCYCODE']=_JRPORTAL_CRATE_CURRENCYCODE;


		// Let's get the bookings
		$bookingsArray=array();
		$roomBookingsArray=array();
		$curDate=getDate();
		$curYear=$curDate['year']-1;
		for ($y = $curYear; $y < $curYear+$numberOfYearsToShow; $y++)
			{
			for ($m = 1; $m <= 12; $m++)
				{
				if ($m<10)
					$m="0".$m;
				$bookings=$bookingFunctions->getContractsForMonth($m,$y,$id);
				if ( !is_null($bookings) )
					$bookingsArray[$y][$m][]=$bookings;
				}
			}
		$propertyNumberOfRooms=$propertyFunctions->getNumberOfRoomsInProperty(array($id));
		$yearviewgraphs_numberofbookings=array();
		$yearviewgraphs_valueofbookings=array();
		$yearviewgraphs_commissionEstimates=array();
		for ($y = $curYear; $y < $curYear+$numberOfYearsToShow; $y++)
			{
			$graphLabels="";
			$graphValues_number="";
			$graphValues_value="";
			$graphValues_commission="";
			for ($m = 1; $m <= 12; $m++)
				{
				$graphLabels.=getMonthName($m-1);
				if ($m<10)
					$m="0".$m;
				if ( !is_null($bookingsArray[$y][$m][0]) )
					{
					$totalValueOfBookings=0.00;
					$graphValues_number.=count($bookingsArray[$y][$m][0]);
					// Work out bookings values for the month
					foreach ($bookingsArray[$y][$m][0] as $b)
						{
						$totalValueOfBookings=$totalValueOfBookings+$b['contract_total'];
						//echo $b['contract_total']." ".$totalValueOfBookings." ".$y." ".$m."<br>";
						}
					$graphValues_value.=number_format($totalValueOfBookings,2, '.', ''); // Numbers need to be formatted to not show the , (comma) otherwise the graphs'll display unwanted months and the totals will look wrong
					$graphValues_commission.=number_format(($totalValueOfBookings/100)*$commissionRate,2, '.', '');
					}
				else
					{
					$graphValues_number.="0";
					$graphValues_value.=0.00;
					$graphValues_commission.=0.00;
					}
				if ($m<12)
					{
					$graphLabels.=",";
					$graphValues_number.=",";
					$graphValues_value.=",";
					$graphValues_commission.=",";
					}

				}
			$yearnumbercounter++;
			$yearviewgraphs_numberofbookings[]=makeJsGraphOutput($graphLabels,$graphValues_number,"vBar",$y,"yearviewgraph_numberofbookings_".$yearnumbercounter);
			$yearviewgraphs_valueofbookings[]=makeJsGraphOutput($graphLabels,$graphValues_value,"vBar",$y,"yearviewgraph_valueofbookings_".$yearnumbercounter);
			$yearviewgraphs_commissionEstimates[]=makeJsGraphOutput($graphLabels,$graphValues_commission,"vBar",$y,"yearviewgraph_commissionestimate_".$yearnumbercounter);
			}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
		$tmpl->readTemplatesFromInput( 'view_property.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);

		$tmpl->displayParsedTemplate();
		foreach ($yearviewgraphs_numberofbookings as $g)
			{
			echo $g;
			}
		foreach ($yearviewgraphs_valueofbookings as $g)
			{
			echo $g;
			}
		foreach ($yearviewgraphs_commissionEstimates as $g)
			{
			echo $g;
			}
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}