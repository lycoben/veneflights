<?php
/**
#
 * Constructs the booking form data before it's passed to the patTemplate form(s)
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
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
 * Get some basic data before beginning construction of the booking form
#
 */
global $mrConfig,$jomresAdminPath,$my,$jomresConfig_lang,$MiniComponents,$Itemid,$jomressession,$thisJRUser ;
global $tmpBookingHandler,$property_uid;

$MiniComponents->triggerEvent('00100'); // Pre-dobooking. Optional
$userIsManager=checkUserIsManager();

if ($userIsManager && in_array(intval($_REQUEST['selectedProperty']),$thisJRUser->authorisedProperties) && (int) $_REQUEST['selectedProperty'] > 0 && $thisJRUser->currentproperty != (int) $_REQUEST['selectedProperty'] )
	{
	$thisJRUser->set_currentproperty((int) $_REQUEST['selectedProperty']);
	jomresRedirect( jomresURL("index.php?option=com_jomres&task=dobooking&Itemid=$Itemid&selectedProperty=$selectedProperty"), "" );
	}
	
$selectedProperty  =$property_uid;

$remus  = jomresGetParam( $_REQUEST, "remus", '' );

$thisdate=false;

$today = date("Y/m/d");
$date_elements  	= explode("/",$today);
$unixTodaysDate		= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
if (!isset($_REQUEST['arrivalDate']) )
	{
	if (!isset($_COOKIE['jomsearch_availability']))
		{
		$arrivalDate=JSCalmakeInputDates(date("Y/m/d",$unixTodaysDate),$siteCal=true);
		$thisdate	=JSCalConvertInputDates($arrivalDate,$siteCal=true);
		}
	else
		$thisdate	=jomresGetParam( $_COOKIE,'jomsearch_availability', '' );
	}
else
	{
	if (isset($tmpBookingHandler->tmpbooking["confirmationSeen"]) )
		$tmpBookingHandler->tmpbooking["confirmationSeen"]=null;
	$thisdate	=jomresGetParam( $_REQUEST, 'arrivalDate', "" );
	}
$thisdate=str_replace("-","/",$thisdate);

$MiniComponents->triggerEvent('00101'); // Pre-form generation. Optional
$query="SELECT propertys_uid FROM #__jomres_propertys WHERE propertys_uid = '".(int)$selectedProperty."'";

$result=doSelectSql($query);
if (count($result)>0 )
	{
	if ($selectedProperty > 0 )
		dobooking($selectedProperty,$thisdate,$jomressession,$remus);
	else
		echo "Property uid incorrect";
	}
else
	echo "Incorrect property uid selected";
// End run here.


/**
#
 * Construct the booking form
#
 */
function dobooking($selectedProperty,$thisdate=false,$jomressession,$remus)
	{
	global $jomresAdminPath,$jomresConfig_live_site,$mrConfig,$jomresConfig_lang,$thisJRUser,$Itemid,$MiniComponents,$jomresConfig_absolute_path;
	global $tmpBookingHandler,$jrConfig;
	
	$referrer=$_SERVER['HTTP_REFERER'];
	$backWasClicked=false;
	if ($tmpBookingHandler->tmpbooking["confirmationSeen"] == true )
		$backWasClicked=true;
	elseif ($thisJRUser->userIsManager == true)
		$tmpBookingHandler->resetTempGuestData();  // We don't want managers coming back to the booking form with the old guest data still saved.
	$tmpBookingHandler->updateBookingField("lang",$jomresConfig_lang);
	if ((int)$tmpBookingHandler->getBookingPropertyId() != (int)$selectedProperty)
		$tmpBookingHandler->resetTempBookingData();
	$tmpBookingHandler->tmpbooking["property_uid"]=(int)$selectedProperty;
	$tmpBookingHandler->tmpbooking["total_discount"]="";

	$tmpBookingHandler->saveBookingData();

	$today = date("Y/m/d");
	$date_elements  	= explode("/",$today);
	$unixTomorrowsDate	= mktime(0,0,0,$date_elements[1],$date_elements[2]+1,$date_elements[0]);
	$unixTodaysDate		= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);

	$mrConfig=getPropertySpecificSettings($selectedProperty);
	property_header($selectedProperty);
	$MiniComponents->triggerEvent('00102'); // First-form generation
	$bkg =$MiniComponents->triggerEvent('05000'); // Create the new booking object
	if (!is_object($bkg) )
		{
		echo "Error creating booking object";
		return;
		}

	$text=$bkg->makeOutputText();
	$guest=$bkg->makeGuestData();

	$output=array_merge($text,$guest);
	$requiredIcons=$bkg->makeRequiredIcons();
	$output=array_merge($output,$requiredIcons);
	$guestTypes=$bkg->makeCustomerTypes($selectedProperty);

	$output['UPDATEADDRESSBUTTON']					=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_UPDATEADDRESSBUTTON',_JOMRES_BOOKINGFORM_UPDATEADDRESSBUTTON,false,false));
	if ( $mrConfig['singleRoomProperty'] == "1")
		$output['BLOCKUI_RECHECKINGROOMAVAILABILITY']	=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY_SRP',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY_SRP,false,false));
	else
		$output['BLOCKUI_RECHECKINGROOMAVAILABILITY']	=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_RECHECKINGROOMAVIALABILITY,false,false));
	
	
	$output['BLOCKUI_CHANGINGEXTRA']				=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGEXTRA',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGEXTRA,false,false));
	$output['BLOCKUI_CHANGINGROOMSELECTION']		=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGROOMSELECTION',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_CHANGINGROOMSELECTION,false,false));
	$output['BLOCKUI_UPDATINGADDRESS']				=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_UPDATINGADDRESS',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_UPDATINGADDRESS,false,false));
	$output['BLOCKUI_ADDRESSINPUTERROR']			=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_ADDRESSINPUTERROR',_JOMRES_BOOKINGFORM_BLOCKUIMESSAGES_ADDRESSINPUTERROR,false,false));

	
	if ($thisJRUser->userIsManager)
		$output['ISMANAGER']="true";
	else
		$output['ISMANAGER']="false";
	$output['PID']=$selectedProperty;
	$output['ITEMID']=$Itemid;
	if (defined('_JOMRES_NEWJOOMLA') )
		$output['AJAXURL']=$jomresConfig_live_site."/index.php";
	else
		$output['AJAXURL']=$jomresConfig_live_site."/index2.php";
	$output['LIVESITE']=$jomresConfig_live_site;
	if (!$thisJRUser->userIsManager)
		$bkg->setBookerClass("000");
	else
		$bkg->setBookerClass("100");

	if ($bkg->cfg_singleRoomProperty != "1")
		$output['SELECTROOMMESSAGE']=$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_SELECT_A_ROOM',_JOMRES_BOOKINGFORM_MONITORING_SELECT_A_ROOM,false,false));
	else
		$output['SELECTROOMMESSAGE']=$bkg->sanitiseOutput(jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP4_TITLE',_JOMRES_COM_MR_QUICKRES_STEP4_TITLE,false,false));
	$output['MININTERVAL']=$mrConfig['minimuminterval'].' ; var selectroommessage = "'.$output['SELECTROOMMESSAGE'].'"';  //For backward compatability this selectroommessage has been tacked onto the end of the min interval var definition
	//if (!$bkg->ok_to_book || $bkg->cfg_singleRoomProperty == "1")
		$bkg->resetRequestedRoom();
	$bkg->initGuestDetails($bkg,$guest);
		
	$overrideSessionArrivalDate=false;
	if ($thisdate != "")
		$overrideSessionArrivalDate=true;
		
	if ($backWasClicked)
		$overrideSessionArrivalDate=false;

	if ($bkg->arrivalDate != "" && !$overrideSessionArrivalDate)
		{
		$arrivalDate=$bkg->arrivalDate;
		$departureDate=$bkg->departureDate;
		}
	else
		{
		$arrivalDate=$defaultArrivalDate=$bkg->initArrivalDate();
		$bkg->setGuest_country($mrConfig['defaultcountry']);

		if ($thisdate && isset($_REQUEST['arrivalDate']) )
			{
			if ( $bkg->checkArrivalDate($thisdate) )
				{
				$bkg->setArrivalDate($thisdate);
				$arrivalDate=$thisdate;
				}
			else
				$arrivalDate=$defaultArrivalDate;
			}
		else if (isset($thisdate) )
			{
			$arrivalDate=$thisdate;
			$bkg->setArrivalDate($arrivalDate);
			}
		if (!$bkg->checkArrivalDate($arrivalDate) )
			{
			$arrivalDate=$defaultArrivalDate;
			$bkg->setArrivalDate($arrivalDate);
			}
		$defaultdepartureDate=$bkg->initDepartureDate();
		if (!isset($_REQUEST['arrivalDate']) )
			{
			if (!isset($_COOKIE['jomsearch_availability']))
				$departureDate	=date("Y/m/d",$unixTomorrowsDate);
			else
				$departureDate	=jomresGetParam( $_COOKIE,'jomsearch_availability_departure', '' );
			}
		else
			$departureDate	=JSCalConvertInputDates(jomresGetParam( $_REQUEST, 'departureDate', "" ));
		$value=$bkg->sanitiseInput("date",$departureDate);
		if (isset($value) && $bkg->checkDepartureDate($value) )
			{
			$bkg->setDepartureDate($value);
			$departureDate=$value;
			}
		else
			{
			$departureDate=$defaultdepartureDate;
			$bkg->setDepartureDate($departureDate);
			}

		$bkg->setStayDays();
		$bkg->setDateRangeString();
	}

	$output['EARLIESTPOSSIBLEARRIVALDATE']=$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_EARLIESTPOSSIBLEARRIVALDATE',_JOMRES_AJAXFORM_EARLIESTPOSSIBLEARRIVALDATE,false)).$bkg->JSCalmakeInputDates($arrivalDate);

	$explodedEarliest=explode("/",$today);
	$amend_contract =  $tmpBookingHandler->getBookingFieldVal("amend_contract");
	$output['EARLIESTDAY']=$explodedEarliest[2]+$bkg->cfg_mindaysbeforearrival;
	$output['EARLIESTMON']=$explodedEarliest[1]-1;
	$output['EARLIESTYEAR']=$explodedEarliest[0];
	if ($amend_contract && $arrivalDate < $today)
		$output['ARRIVALDATE']=outputDate($arrivalDate);
	else
		$output['ARRIVALDATE']=$bkg->makeArrivalDateOutput($arrivalDate);
	$output['DEPARTUREDATE']=$bkg->makeDepartureDateOutput($departureDate);

	if ($mrConfig['showSmoking']=="1")
		{
		$smoking=$bkg->initSmoking();
		$output['SMOKING']=$bkg->makeSmokingOutput($smoking);
		}
//var_dump($bkg->variancetypes);exit;

		$counter=0;
		foreach ($guestTypes as $gst)
			{
			
			$current=$bkg->getGuestVariantDetails($gst['ID']);
			if ($current==false)
				{
				if ($counter==0)
					$bkg->initGuestVariant($gst['ID'],$mrConfig['defaultNumberOfFirstGuesttype']);
				else
					$bkg->initGuestVariant($gst['ID'],0);
				}
			$counter++;
			}
			
	if (count($guestTypes)==0)
		$output['BILLING_TOTALINPARTY']="";
	$extra_details=$bkg->makeExtras($selectedProperty);
	if (count($extra_details)>0)
		{
		$output['EXTRAS_INFO']		='<img border="0" style="vertical-align:top;" src="'.$jomresConfig_live_site.'/components/com_jomres/images/info.png" />';
		//$output['EXTRAS_SPACES']		="";
		$output['AJAXFORM_EXTRAS']		=$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_EXTRAS',_JOMRES_AJAXFORM_EXTRAS));
		$output['AJAXFORM_EXTRAS_DESC']	=$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_EXTRAS_DESC',_JOMRES_AJAXFORM_EXTRAS_DESC,false));
		$output['EXTRAS_TOTAL']=$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_EXTRAS_TOTAL',_JOMRES_AJAXFORM_EXTRAS_TOTAL));
		$output['EXTRAS_HEADER']='
											<tr>
												<th colspan="5">'.$output['AJAXFORM_EXTRAS'].'&nbsp;&nbsp;<a href="javascript:void(0);" onmouseover="return overlib(\''.$output['AJAXFORM_EXTRAS_DESC'].'\', WIDTH, 300, BELOW, CENTER );" onmouseout="return nd(0);"><img border="0" style="vertical-align:top;" src="'.$output['LIVESITE'].'/components/com_jomres/images/info.png" /></a></th>
											</tr>
			';
		}
	$bkg->setStayDays();
	$bkg->setDateRangeString();
	$dateRangeIncludesWeekend=$bkg->dateRangeIncludesWeekends();
	$freeRoomsArray=$bkg->getAllRoomUidsForProperty();
	$freeRoomsArray=$bkg->removeRoomuidsAlreadyInThisBooking($freeRoomsArray);
	
	$freeRoomsArray=$bkg->findFreeRoomsInDateRange($freeRoomsArray);
	//var_dump($freeRoomsArray);exit;
	$freeRoomsArray=$bkg->checkPeopleNumbers($freeRoomsArray);
	$freeRoomsArray=$bkg->checkSmokingOption($freeRoomsArray);
	$roomAndTariffArray=$bkg->getTariffsForRoomUids($freeRoomsArray);
	if (isset($remus) && !empty($remus) )
		{
		for ($i=0;$i<count($roomAndTariffArray);$i++)
			{
			$rmandtariff=$roomAndTariffArray[$i];
			if ($rmandtariff[0]==$remus)
				{
				$tariff=$rmandtariff[1];
				break;
				}
			}
		$bkg->updateSelectedRoom($remus."^".$tariff);
		$freeRoomsArray=$bkg->getAllRoomUidsForProperty();
		$freeRoomsArray=$bkg->removeRoomuidsAlreadyInThisBooking($freeRoomsArray);
		$freeRoomsArray=$bkg->findFreeRoomsInDateRange($freeRoomsArray);
		$freeRoomsArray=$bkg->checkPeopleNumbers($freeRoomsArray);
		$freeRoomsArray=$bkg->checkSmokingOption($freeRoomsArray);
		$roomAndTariffArray=$bkg->getTariffsForRoomUids($freeRoomsArray);
		}
	if ($mrConfig['singleRoomProperty'] == "0" )
		{
		$rm='<div class="roomslist_availabletext">'.$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_SELECTEDROOMS',_JOMRES_AJAXFORM_SELECTEDROOMS)).'</div>';
		if ($bkg->numberOfCurrentlySelectedRooms()>0 )
			$rm.=$bkg->listCurrentlySelectedRooms();
		else
			$rm.='<div class="roomslist_noroomsselected">'.$bkg->sanitiseOutput(jr_gettext('_JOMRES_BOOKINGFORM_NOROOMSSELECTEDYET',_JOMRES_BOOKINGFORM_NOROOMSSELECTEDYET)).'</div>';
		$output['SELECTEDROOM']=$rm;

		$rm='<div class="roomslist_availabletext">'.$bkg->sanitiseOutput(jr_gettext('_JOMRES_AJAXFORM_AVAILABLEROOMS',_JOMRES_AJAXFORM_AVAILABLEROOMS)).'</div>';
		//$rm.="<br>";
		$rm.=$bkg->generateRoomsList($roomAndTariffArray);
		}
	else
		$rm=$bkg->generateRoomsList($roomAndTariffArray);
	//$rm=$bkg->generateRoomsList($roomAndTariffArray);
	$output['AVAILABLEROOMS']=$rm;
	$output['ROOMSLIST']=$output['SELECTEDROOM'].'<br>'.$output['AVAILABLEROOMS'].'</div><div id="availRooms" class="roomslist">';
	$componentArgs=array();
	$componentArgs['output']=$output;
	$MiniComponents->triggerEvent('00103',$output); // End-form generation


	$bkg->storeBookingDetails();
	$toload=array();
	$load=array();
	//$bkg->writeToLogfile("STORED BOOKING");
	if ( $mrConfig['singleRoomProperty'] == "1" || (isset($thisdate) && !empty($thisdate))  )
		{
		$load['ONLOAD']="hidediv('indicator');";
		$load['COUNT']=1;
		$toload[]=$load;
		$load['ONLOAD']="show_log();";
		$load['COUNT']=2;
		$toload[]=$load;
		}
	else
		{
		$load['ONLOAD']="hidediv('indicator');";
		$load['COUNT']=1;
		$toload[]=$load;
		$load['ONLOAD']="hidediv('extrascontainer');";
		$load['COUNT']=2;
		$toload[]=$load;
		$load['ONLOAD']="hidediv('guestdeets');";
		$load['COUNT']=3;
		$toload[]=$load;
		$load['ONLOAD']="show_log();";
		$load['COUNT']=4;
		$toload[]=$load;
		}

	$pageoutput[]=$output;
	$tmpl = new patTemplate();
 	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'guesttypes',$guestTypes);
	$tmpl->addRows( 'onload',$toload);
	$MiniComponents->triggerEvent('05019');
	$mcOutput=$MiniComponents->getAllEventPointsData('05019');
	if (count($mcOutput)>0)
		{
		foreach ($mcOutput as $key=>$val)
			{
			$tmpl->addRows( 'customOutput_'.$key, array($val) );
			}
		}
	//var_dump($tmpl);
	//exit;

	if ($mrConfig['showExtras']=="1")
		{
		$tmpl->addRows( 'extras', $extra_details );
		}
	$componentArgs=array('tmpl'=>$tmpl);
	if ($mrConfig['singleRoomProperty'] == "0" && $MiniComponents->eventFileExistsCheck('00200'))
		{
		$MiniComponents->triggerEvent('00200',$componentArgs); //
		}
	elseif ($MiniComponents->eventFileExistsCheck('00202'))
		{
		$MiniComponents->triggerEvent('00202',$componentArgs); //
		}
	else
		{
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
		if ( ($mrConfig['singleRoomProperty'] == "1" ) )
			$tmpl->readTemplatesFromInput( 'dobooking_srp.html');
		else
			$tmpl->readTemplatesFromInput( 'dobooking.html');
		$tmpl->displayParsedTemplate();
		}

	if ($jrConfig['dumpTemplate']=="1")
		$tmpl->dump();
	}
?>