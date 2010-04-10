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

class j00013dashboard extends jomres_dashboard
	{
	function j00013dashboard()
		{
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $mrConfig,$Itemid,$jomresConfig_live_site;
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
		$this->allCalDaysArray	= array('property_name'=>'','rooms'=>array() );
		$this->requestedMonth	= jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		$this->showpopup		= jomresGetParam( $_REQUEST, 'showpopup', 0 );
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
			{
			SetCookie("dashboardmonth", "$this->dashboardmonthcookie", time()+3600);
			}

		$this->roomsArray 				= array();
		$this->thisMonthsDatesArray 	= array();
		$this->unixLatestDate			= 0;
		$this->monthsToShow				= 144;

		$this->todaysDate=date("Y/m/d");
		$today = getdate();
		$this->unixTodaysDate=mktime(0,0,0,$today['mon'],$today['mday'],$today['year']);
		$this->setDates();
		//var_dump($this->thisMonthsDatesArray);
		$this->getRoomsForProperty();
		//var_dump($this);
		if ($this->showpopup=="1")
			{
			$this->popup();
			}
		else
			{
			echo '<a href="javascript:void(0)" onclick="window.open(\''.$jomresConfig_live_site.'/index2.php?option=com_jomres&amp;showpopup=1&amp;no_html=1&amp;id='.$Itemid.'&amp;popup=2&amp;requestedMonth='.$this->requestedMonth.'\',\'win2\',\'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=700,height=480,directories=no,location=no\');" title="PDF">PRINTABLE</a>';
			echo $this->dashboardMakeMonthList();
			// Uncomment the next line to show the current dashboard month & year in a table
			//echo $this->getMonthAndYearOutput();

			echo $this->getCss();
			echo $this->viewRoomsHorizontal();
			echo $this->getLegend();
			}
		}

	function getRoomsForProperty()
		{
		global $thisJRUser;
		$propertyList =$thisJRUser->authorisedProperties;
		foreach ( $propertyList as $p)
			{
			$this->property_uid=$p;
			$query="SELECT room_uid,room_name,room_number,propertys_uid FROM #__jomres_rooms WHERE propertys_uid = '$p' ORDER BY room_number,room_name";
			$roomsList =doSelectSql($query);
			foreach ($roomsList as $room)
				{
				$this->roomsArray[]=array('id'=>$room->room_uid,'room_number'=>$room->room_number, 'room_name'=>$room->room_name, 'propertys_uid'=>$this->property_uid);
				}
			}
		}

	function viewRoomsHorizontal()
		{
		global $mrConfig;
		$outputArray=array();
		$output="";
		$monthsToShow=1;
	//	if ($mrConfig['singleRoomProperty']=="1")
	//		$monthsToShow=12;
		$i=1;
		$this->strOpenTable="<table>";
		$this->strOpenTr="<tr>";
		$this->strOpenTrColspan2='<td colspan="'.($this->lastDayOfMonth+1).'">';
		$this->strOpenTd="<td>";
		$this->strCloseTable="</table>";
		$this->strCloseTr="</tr>";
		$this->strCloseTd="</td>";
		$lastPid='0';
		while ($i <= $monthsToShow)
			{
			$output.=$this->strOpenTable;
			foreach ($this->roomsArray as $room)
				{
				$pname=getPropertyName($room['propertys_uid']);
				if ($lastPid!=$room['propertys_uid'])
					{
					$output.=$this->strOpenTrColspan2.'<b><u>'.$pname.'</u></b>'.$this->strCloseTd.' ';
					$output.=$this->strCloseTr;
					$output.=$this->strOpenTr;
					}
				$str1=$this->strOpenTd.$room['room_number'].' '.$room['room_name'].$this->strCloseTd.' ';
				$str2=$this->getHorizontalRoom($room['id'],$room['propertys_uid']);
				$rmno=$room['room_number'];
				//$rmno=$room['room_number'].' '.$room['room_name'];
				$output.=$str1.$str2;
				$output.=$this->strCloseTr;
				$this->allpropertys[$pname][$rmno]=$this->propertyRoomsCal;
				$lastPid=$room['propertys_uid'];
				}
			$output.=$this->strCloseTable;
			$currentMonth=date("Y/m/d",$this->requestedMonth);
			$dateElements=explode("/",$currentMonth);
			$this->requestedMonth=mktime(0, 0, 0,$dateElements[1]+1,$dateElements[2],$dateElements[0]);
			$this->thisMonthsDatesArray=array();
			$this->setDates();
			$i++;
			}
		return $output;
		}

	function getHorizontalRoom($room_id,$property_uid)
		{
		global $mrConfig;
		$output="";
		$i=0;
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
			$query="SELECT contract_uid,black_booking FROM #__jomres_room_bookings WHERE room_uid = '$room_id' AND date = '$sqlDate' LIMIT 1";
			//echo $query;
			$roomList = doSelectSql($query);
			$deposit_paid=TRUE;
			if (count($roomList)>0)
				{
				$bgcolor = $this->cfg_occupiedcolour;
				$fcolor=$this->cfg_booking;
				$viewbookingLink = true;
				foreach ($roomList as $cont)
					{
					$contract_uid=$cont->contract_uid;
					$black_booking=$cont->black_booking;
					if ($black_booking!="1")
						{
						$query="SELECT deposit_paid FROM #__jomres_contracts WHERE contract_uid = '$contract_uid' LIMIT 1";
						//echo $query;
						$contractList = doSelectSql($query);
						foreach ($contractList as $contract)
							{
				  			$deposit_paid=$contract->deposit_paid;
							if (!$deposit_paid)
								$bgcolor=$this->cfg_provisionalcolour;
							}
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
			$output.=$this->showDate($pastDate,$dobookingLink,$bgcolor,$fcolor,$currdate,$sqlDate2,$contract_uid,$room_id,$border,$blackBookingLink,$property_uid);
			$this->propertyRoomsCal[]=$this->rowArray;
			$i++;
			$currdate = mktime(0,0,0,date("m",$this->startdate),date("d",$this->startdate) + $i,date("Y",$this->startdate));
			}
		return $output;
		}

	function showDate($pastDate,$dobookingLink,$bgcolor,$fcolor,$currdate,$sqlDate2,$contract_uid="",$room_id,$border,$blackBookingLink,$property_uid)
		{
		global $mrConfig,$Itemid;
		unset($this->rowArray);
		//$this->rowArray=array('dayofmonth'=>'','bgcolor'=>'','fcolor'=>'','border'=>'');
		$output="";
		$bookinglink='index.php?option=com_jomres&task=dobooking&Itemid='.$Itemid.'&amp;selectedProperty='.$property_uid.'&arrivalDate='.$sqlDate2;
		$viewbookinglink='index.php?option=com_jomres&task=editBooking&thisProperty='.$property_uid.'&Itemid='.$Itemid.'&contract_uid='.$contract_uid;
		$basicFont='<FONT style="style=color:'.$fcolor.'; '.$border.' ">';
		$this->rowArray[date ("j",$currdate)]['fcolor']=$fcolor;
		$this->rowArray[date ("j",$currdate)]['border']=$border;
		$this->rowArray[date ("j",$currdate)]['bgcolor']=$bgcolor;
		//$this->rowArray['dayofmonth']=date ("j",$currdate);
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
						$output.= '<a href="'.jomresURL($bookinglink).'" class="rescal"  style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
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
				$output.='<a href="'.jomresURL($bookinglink).'" class="rescal"  style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
				}
			}
		else
			{
			if ($contract_uid!="")
				{
				//var_dump($this->showpopup);exit;
				if (!$blackBookingLink && $this->showpopup != '1')
					$overlib=$this->getOverlibBookingDeets($contract_uid);
				else
					$overlib="";
				$link='<a href="'.jomresURL($viewbookinglink).'" class="rescal" '.$overlib.' style="color:'.$fcolor.'; '.$border.'">'.(date ("j",$currdate)).'</a>';
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

	function getOverlibBookingDeets($contract_uid)
		{
		$query="SELECT guest_uid,arrival,departure FROM #__jomres_contracts WHERE contract_uid = '$contract_uid'";
		$guest_uid=doSelectSql($query,2);
		$content=outputDate($guest_uid['arrival']).'-'.outputDate($guest_uid['departure']);
		$query="SELECT firstname,surname FROM #__jomres_guests WHERE guests_uid = '".$guest_uid['guest_uid']."'";

		$guest_deets=doSelectSql($query,2);
		$r='onmouseover="return overlib(\''.$content.'\', CAPTION, \''.$guest_deets['firstname'].' '.$guest_deets['surname'].'\');" onmouseout="return nd();"';
		return $r;
		}

	function dashboardMakeMonthList($orientation="")
		{
		global $jomresConfig_locale,$Itemid;
		$monthsArray=array();
		$output="";
		setlocale(LC_ALL, $jomresConfig_locale );
		$currentMonth=date("Y/m/d");
		//$lastYear=0;
		$dateElements=explode("/",$currentMonth);
		$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1],1,$dateElements[0]));
		$nm= mktime(12, 0, 0,$dateElements[1],1,$dateElements[0]);
		for ($i=1;$i<=$this->monthsToShow;$i++)
			{
			$link=jomresURL('index.php?option=com_jomres&requestedMonth='.$nm.'&Itemid='.$Itemid);
			$monthsArray[]=jomresHTML::makeOption($link,$nextMonth);
			$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
			$nm= mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]);
			}
		$dropdown=jomresHTML::selectList( $monthsArray, 'requestedMonth', 'size="1" class="inputbox" OnChange="location.href=dashboardmonthdropdown.requestedMonth.options[selectedIndex].value" ', 'value', 'text', jomresURL('index.php?option=com_jomres&requestedMonth='.$this->requestedMonth.'&Itemid='.$Itemid ) );
		$output='<form name="dashboardmonthdropdown">';
		$output.=$dropdown;
		$output.='</form>';
		return $output;
		}

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

	function popup()
		{
		$td=date("Y/m/d",$this->requestedMonth);
		?>
		<center>
		<form>
		<input type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" onClick="window.print()">
		</form>
		</center>
		<?php
		echo '<h2>'.outputDate($td).'</h2>';
		//echo $this->getCss();
		echo $this->viewRoomsHorizontal();
		echo $this->getLegend();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}

?>