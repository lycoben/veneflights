<?php
/**
#
 * Mini-component core file: Displays the standard availability calendar
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
class  j00018MRPavailabilitycalendar {

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function  j00018MRPavailabilitycalendar($componentArgs=null)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig,$noshowroom,$jrConfig;
		$this->retVals="";
		$this->pop=jomresGetParam( $_REQUEST, 'popup', 0 );
		if ($this->pop==1)
			property_header($property_uid);
		if (isset($componentArgs['showlinks']) )
			$this->showlinks=$componentArgs['showlinks'];
		else
			$this->showlinks=true;
		$roomUid=$componentArgs['roomUid'];
		$requestedDate=$componentArgs['requestedDate'];
		$property_uid=(int)$componentArgs['property_uid'];
		$showFullYear=$componentArgs['showFullYear'];
		if (isset($mrConfig['CalendarMonthsToShow']))
			$showFullYear=$mrConfig['CalendarMonthsToShow'];
		$query="SELECT room_uid FROM #__jomres_rooms WHERE propertys_uid = '".(int)$property_uid."'";
		$this->numberOfRoomsInProperty=count(doSelectSql($query));

		$this->colour_empty		='#6AFB92';
		$this->colour_quarter	='#B1FB17';
		$this->colour_half		='#FFFC17';
		$this->colour_threequarter='#F88017';
		$this->colour_full 		='#FF0000';

		$this->rooms_empty=0;
		$this->rooms_quarter=(($this->numberOfRoomsInProperty/100)*.25)*100;
		$this->rooms_half=(($this->numberOfRoomsInProperty/100)*.5)*100;
		$this->rooms_threequarter=(($this->numberOfRoomsInProperty/100)*.75)*100;
		$this->rooms_full=$this->numberOfRoomsInProperty;

		if ($mrConfig['showAvailabilityCalendar']=="1")
			{
			$currentYear=date("Y");
			if ($mrConfig['calstartfrombeginningofyear']=="1")
				$currentMonth=1;
			else
				$currentMonth=date("m");
			$counter=1;
			$monthsToYearEnd=12-$currentMonth;
			$this->retVals.='
			<center>
			<table id="panelwrapper">
				<tr>
					<td>
						<table class="innerwrapper">
							<tr class="availability_calendar_header">
								<td>
									<table>
										';
										if ($mrConfig['visitorscanbookonline']=="1"	&& !$noshowroom && $this->showlinks)
											{
											$this->retVals.='<tr>';
											$this->retVals.='<td colspan="6">'.jr_gettext('_JOMRES_FRONT_CALENDAR_CLICKDATES',_JOMRES_FRONT_CALENDAR_CLICKDATES).'</td>';
											$this->retVals.='</tr>';
											}
										$this->retVals.='
										<tr>
											<td bgcolor="'.$this->colour_empty.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.jr_gettext('_JOMRES_AVLCAL_NOBOOKINGS',_JOMRES_AVLCAL_NOBOOKINGS).'</td>
											<td bgcolor="'.$this->colour_quarter.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.jr_gettext('_JOMRES_AVLCAL_QUARTER',_JOMRES_AVLCAL_QUARTER).'</td>
											<td bgcolor="'.$this->colour_half.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.jr_gettext('_JOMRES_AVLCAL_HALF',_JOMRES_AVLCAL_HALF).'</td>
											<td bgcolor="'.$this->colour_threequarter.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.jr_gettext('_JOMRES_AVLCAL_THREEQUARTER',_JOMRES_AVLCAL_THREEQUARTER).'</td>
											<td bgcolor="'.$this->colour_full.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.jr_gettext('_JOMRES_AVLCAL_FULLYBOOKED',_JOMRES_AVLCAL_FULLYBOOKED).'</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr class="availability_calendar_calendars">
								<td><center>
									<table>
										<tr>
										';
			if ($showFullYear)
				{
				//echo $currentMonth;
				for ($currentMonth;$counter<=$showFullYear;$currentMonth++)
					{
					$this->retVals.="\n<td style=\"vertical-align: top\">";
					$this->retVals.=$this->makecal($currentMonth,$currentYear,$roomUid,$property_uid);
					if ($currentMonth==12)
						{
						$currentYear=$currentYear+1;
						$currentMonth=0;
						}
					$this->retVals.="</td>\n";
					if ($counter%3==0 and $counter<72)
						$this->retVals.="</tr>\n<tr>";
					$counter++;
					}
				}
			else
				{
				$this->retVals.="<td>\n";
				$this->retVals.=$this->makecal($currentMonth,$currentYear,$roomUid);
				$this->retVals.="</td>\n";
				}
			$this->retVals.='
										</tr>
									</table>
								</center></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</center>
			';
			}
		if ($jrConfig['composite_property_details']!="1" || (jomresGetParam( $_REQUEST, 'task', '' )=="dobooking"))
			{
			echo $this->retVals;
			unset($this->retVals);
			}
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_AVLCAL_NOBOOKINGS',_JOMRES_AVLCAL_NOBOOKINGS);
		$output[]		=jr_gettext('_JOMRES_AVLCAL_QUARTER',_JOMRES_AVLCAL_QUARTER);
		$output[]		=jr_gettext('_JOMRES_AVLCAL_HALF',_JOMRES_AVLCAL_HALF);
		$output[]		=jr_gettext('_JOMRES_AVLCAL_THREEQUARTER',_JOMRES_AVLCAL_THREEQUARTER);
		$output[]		=jr_gettext('_JOMRES_AVLCAL_FULLYBOOKED',_JOMRES_AVLCAL_FULLYBOOKED);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SUNDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_SUNDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_MONDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_MONDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_TUESDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_TUESDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_THURSDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_THURSDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_FRIDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_FRIDAY_ABBR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SATURDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_SATURDAY_ABBR);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	#
	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function makecal($stmonth, $styear,$roomUid,$property_uid)
		{
		// Adapted from source
		// http://www.weberdev.com/get_example-1430.html
		// Submitted by: Whiddon James on Dec 01st 1999
		global $mrConfig,$jomresConfig_locale,$Itemid;
		global $jomresConfig_live_site,$noshowroom, $jomresConfig_offset,$jrConfig;
		$userIsManager=checkUserIsManager();
		setlocale(LC_ALL, $jomresConfig_locale);

		$showOutMonthDates=false;
		$task=jomresGetParam( $_REQUEST, 'task', '' );
		if ($task == "remoteavailability" )
			$target='target="_blank"';
		else
			$target='';

		###################################
		## define variables-little cleaner
		## than mucking over the code to
		## change stuff

		$face			= "verdana";  ## font face for all text
		$size			= "1";		## font size for all text
		$height			= "12";		## cell height
		$width			= "12";		## cell width
		$todaycolor		= $mrConfig['avlcal_todaycolor'];  ## font color for the current date
		$inmonthface	= $mrConfig['avlcal_inmonthface'];  ## font color for days in the display month
		$outmonthface	= $mrConfig['avlcal_outmonface'];  ## font color for days not in the display month
		//$inbgcolor	 	= $mrConfig['avlcal_inbgcolour'];  ## cell bgcolor for days in the display month
		$outbgcolor		= $mrConfig['avlcal_outbgcolour'];  ## cell bgcolor for days not in display month
		//$occupiedcolour 	= $mrConfig['avlcal_occupiedcolour'];  ## cell bgcolour for occupied days
		$provisionalcolour = $mrConfig['avlcal_provisionalcolour'];  ## cell bgcolour for occupied days
		$pastcolour 	= $mrConfig['avlcal_pastcolour'];  ## cell bgcolour for occupied days

		###################################
		## make workie code stuph
		##

		$todaysDate=date("Y/m/d");
		$stdate = mktime(0,0,0,$stmonth,1,$styear);
		$startdate = $currdate = mktime(0,0,0,$stmonth,1 - date("w", mktime(0,0,0,$stmonth,1,$styear)),$styear);
		$enddate = mktime(0,0,0,date("m",$stdate) + 1,7 - date("w", mktime(0,0,0,$stmonth + 1,0,$styear)),$styear);
		$dateElements=explode("/",$todaysDate);
		$unixTodaysDate=mktime(0, 0, 0,$dateElements[1],$dateElements[2],$dateElements[0]);

		//$thisMonthName=jr_gettext('_JOMRES_CUSTOMTEXT_'.date("M",$stdate),strftime( "%B",$stdate),true);
		$thisMonthName= getThisMonthName(date("n",$stdate));
		
		$this->retVals.="\n<table class=\"rescal\" cellspacing=\"0\">\n";
		$this->retVals.="<tr class=\"availability_calendar_months\" >\n<th colspan=\"7\" height=\"$height\"><font face=\"$face\" size=\"$size\">" . $thisMonthName . " " . strftime( "%Y",$stdate) . "</font></th>\n</tr>\n";
		$this->retVals.="<tr class=\"availability_calendar_days\">\n<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SUNDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_SUNDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_MONDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_MONDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_TUESDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_TUESDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_THURSDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_THURSDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_FRIDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_FRIDAY_ABBR)."</font></th>\n";
		$this->retVals.="<th width=\"$width\" height=\"$height\" valign=\"middle\" align=\"center\"><font face=\"$face\"
			size=\"$size\">". jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SATURDAY_ABBR',_JOMRES_COM_MR_WEEKDAYS_SATURDAY_ABBR)."</font></th>\n</tr>\n";
		if ($mrConfig['limitAdvanceBookingsYesNo']=="1")
			{
			$dateElements=explode("/",$todaysDate);
			$unixLatestDate=mktime(0, 0, 0,$dateElements[1],$dateElements[2]+$mrConfig['advanceBookingsLimit'],$dateElements[0]);
			}

		$i=0;
		$sqlDates=array();
		$tmpdatesArray=array();
		$datesArray=array();

		while ($currdate < $enddate)
			{
			$sqlDates[]=date("Y/m/d",$currdate);
			$i++;
			$currdate = mktime(0,0,0,date("m",$startdate),date("d",$startdate) + $i,date("Y",$startdate));
			}
		$gor=genericOr($sqlDates,'date',false);

		$query="SELECT contract_uid,black_booking,`date` FROM #__jomres_room_bookings WHERE property_uid = '".(int)$property_uid."' AND ".$gor;
		$roomList = doSelectSql($query);

		foreach ($roomList as $cont)
			{
			$date=$cont->date;

			$bgcolor=$inbgcolor;
			$contract_uid=$cont->contract_uid;
			if (!array_key_exists($date,$tmpdatesArray))
				$tmpdatesArray[$date]=1;
			else
				{
				$count=$tmpdatesArray[$date];
				$tmpdatesArray[$date]=$count+1;
				}
			}
		foreach ($tmpdatesArray as $key=>$d)
			{
			$bgcolor=$this->colour_full;
			// These two lines added so that the property isn't marked as full until it's completely full (previously it was marked full after 3/4 spaces taken to give properties room to maneouver)
			if ($d == $this->rooms_full-1)
				$bgcolor=$this->colour_threequarter;
			if ($d <= $this->rooms_threequarter)
				$bgcolor=$this->colour_threequarter;
			if ($d <= $this->rooms_half)
				$bgcolor=$this->colour_half;
			if ($d <= $this->rooms_quarter)
				$bgcolor=$this->colour_quarter;
			if ($d == $this->rooms_empty)
				$bgcolor=$this->colour_empty;
			$datesArray[$key]=array('bgcolor'=>$bgcolor);
			}

		$i=0;
		$currdate = mktime(0,0,0,date("m",$startdate),date("d",$startdate),date("Y",$startdate));
		$startingmonth = date("m",mktime(0,0,0,date("m",$startdate),date("d",$startdate),date("Y",$startdate)));
		$endingmonth = date("m",mktime(0,0,0,date("m",$stdate) + 1,7 - date("w", mktime(0,0,0,$stmonth + 1,0,$styear)),$styear) );
		while ($currdate < $enddate)
			{
			$this->retVals.= "<tr>\n";
			for ($c = 0; $c < 7; $c++)
				{
				$bgcolor=$this->colour_empty;
				$contract_uid="";
				$link="";
				$sqlDate2=date("Y-m-d",$currdate);
				$sqlDate=date("Y/m/d",$currdate);
				//$currdow=date("w",$sqlDate);
				$currentMonth=date("m",$currdate);
				if (array_key_exists(date("Y/m/d",$currdate),$datesArray) )
					{
					$bgcolor=$datesArray[date("Y/m/d",$currdate)]['bgcolor'];
					$contract_uid=$datesArray[date("Y/m/d",$currdate)]['contract_uid'];
					}
				$jomresCurrDate=date("Y/m/d",$currdate);
				$dateElements=explode("/",$jomresCurrDate);
				$unixCurrDate=mktime(0, 0, 0,$dateElements[1],$dateElements[2],$dateElements[0]);

				if ($mrConfig['limitAdvanceBookingsYesNo']=="1" && ($unixCurrDate>=$unixLatestDate))
					$bgcolor = $pastcolour;
				if ($unixCurrDate<$unixTodaysDate)
					$bgcolor = $pastcolour;
/*
				if ((date("m",$stdate) == date("m",$currdate)) && ($bgcolor != $occupiedcolour) && ($bgcolor != $provisionalcolour) && ($bgcolor != $pastcolour)) {
					$bgcolor = $inbgcolor;
				} else {
						if (($bgcolor != $occupiedcolour) && ($bgcolor != $provisionalcolour) && ($bgcolor != $pastcolour))
							$bgcolor = $outbgcolor;
				}
			*/
				if (date("d",$currdate) == date("d") && date("m",$currdate) == date("m") && date("Y",$currdate) == date("Y")) {
					$fcolor = $todaycolor;
				} elseif (date("m",$currdate) == date("m",$stdate) && date("Y",$currdate) == date("Y",$stdate)) {
					$fcolor = $inmonthface;
				} else {
					$fcolor = $outmonthface;
				}

				//echo $startingmonth.' '.$currentMonth.' '.$endingmonth.'<br>';
				if ( $currentMonth == $startingmonth && date("m",$stdate) > date("m",$startdate) )
					$bgcolor =$outbgcolor;
				if ( date("m",$currdate) == date("m",$enddate) )
					$bgcolor =$outbgcolor;
				if (!$showOutMonthDates && $bgcolor ==$outbgcolor)
					$this->retVals.= "<td height=\"$height\" width=\"$width\" valign=\"middle\" ><font face=\"$face\" size=\"$size\" color=\"$fcolor\">";
				else
					$this->retVals.= "<td height=\"$height\" width=\"$width\" valign=\"middle\" bgcolor=\"$bgcolor\"><font face=\"$face\" size=\"$size\" color=\"$fcolor\">";

				if (!$showOutMonthDates && $bgcolor ==$outbgcolor)
					$this->retVals.= "&nbsp;";
				else
					{
					if ( $bgcolor != $outmonthface && ($bgcolor != $pastcolour))
						{
						if (!$noshowroom && $bgcolor !=$outbgcolor && $mrConfig['visitorscanbookonline'] && $bgcolor !=$this->colour_full && $this->showlinks)
							{
							$validDayOfWeek=true;
							if ($mrConfig['fixedArrivalDateYesNo'])
								{
								$currdow=date("w",$currdate);
								if ($mrConfig['fixedArrivalDay']!=date("w",$currdate) )
									$validDayOfWeek=false;
								}
								
							if ($validDayOfWeek)
								{
								$link='index.php?option=com_jomres&task=dobooking&amp;Itemid='.$Itemid.'&amp;selectedProperty='.$property_uid.'&arrivalDate='.$sqlDate2;
								if (!$mrConfig['singleRoomProperty'])
									$link.='&remus='.$roomUid;
								/*
								if ( $jrConfig['useSSLinBookingform'] == "1" )
									{
									$link = str_replace("http://","https://",$link);
									}
								*/
								if ( $jrConfig['useSSLinBookingform'] == "1" )
									$link=jomresURL($link,1);
								else
									$link=jomresURL($link);
	
								$thelink='<a '.$target.' href="'.jomresURL($link).'" class="rescal" rel="nofollow">'.date ("j",$currdate).'</a>';
								$this->retVals.= $thelink;
								}
							else
								$this->retVals.= date ("j",$currdate);
							}
						else
							$this->retVals.= date ("j",$currdate);
						}
					else
						{
						$this->retVals.= date ("j",$currdate);
						}
					}
				$this->retVals.= "</font></td>\n";
				$i++;
				$currdate = mktime(0,0,0,date("m",$startdate),date("d",$startdate) + $i,date("Y",$startdate));
				}
			$this->retVals.= "</tr>\n";
			}
		$this->retVals.= "</table>\n";
		}

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
		return $this->retVals;
		}
	}
?>