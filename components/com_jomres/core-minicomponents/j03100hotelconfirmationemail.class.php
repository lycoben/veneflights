<?php
/**
#
 * Mini-component core file: Sends the hotel confirmation email
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
 * Sends the hotel confirmation email
 #
* @package Jomres
#
 */
class j03100hotelconfirmationemail {
	/**
	#
	 * Constructor: Sends the hotel confirmation email
	#
	 */
	function j03100hotelconfirmationemail($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $jomresConfig_live_site,$Itemid;
		$currfmt = new jomres_currency_format();
		$tempBookingDataList=$componentArgs['tempBookingDataList'];
		$cartnumber=$componentArgs['cartnumber'];
		$guestDetails=$componentArgs['guestDetails'];
		$guests_uid=$componentArgs['guests_uid'];
		$property_uid=(int)$componentArgs['property_uid'];
		$arrivalDate=$componentArgs['arrivalDate'];
		$departureDate=$componentArgs['departureDate'];
		$contract_total=$componentArgs['contract_total'];
		$rates_uids=$componentArgs['rates_uids'];
		$property_uid=(int)$componentArgs['property_uid'];
		$specialReqs=$componentArgs['specialReqs'];
		$deposit_required=$componentArgs['deposit_required'];
		if ( !isset( $componentArgs['email_when_done'] ) )
			$email_when_done=true;
		else
			$email_when_done=$componentArgs['email_when_done']; // Optional. We'll set email_when_done by default to true, otherwise we'll set it in the componentArgs variable. This allows us to call this script independantly which in turn allows us to view the email as it's contructed, rather than when sent.
		
		
		$clientIP=$_SERVER['REMOTE_ADDR'];
		global $my,$database,$mrConfig;
		$rmids=array();
		$requestedRoom =$tempBookingDataList[0]->requestedRoom;
		$rooms=explode(",",$requestedRoom);
		foreach ($rooms as $r)
			{
			$rm=explode("^",$r);
			$rmids[]=$rm[0];
			}
		$gor=genericOr($rmids,'room_uid');
		$query="SELECT propertys_uid,room_number,room_name FROM #__jomres_rooms WHERE $gor ";
		$roomList =doSelectSql($query);

		$roomNumber="";
		$room_name="";
		foreach ($roomList as $room)
			{
			$property=$room->propertys_uid;
			$roomNumber.=$room->room_number;
			$room_name.=$room->room_name;
			}
		$query="SELECT property_name,property_tel,property_email FROM #__jomres_propertys WHERE propertys_uid = '".(int)$property_uid."' LIMIT 1";
		$propertyEmail =doSelectSql($query);
		foreach ($propertyEmail as $email)
			{
			$propertyName=stripslashes($email->property_name);
			$propertyTel=stripslashes($email->property_tel);
			$hotelemail=stripslashes($email->property_email);
			}
		$query="SELECT firstname,surname,tel_landline,tel_mobile FROM #__jomres_guests WHERE guests_uid = '".(int)$guests_uid."'";
		$guestNameList =doSelectSql($query);
		foreach ($guestNameList as $guestName)
			{
			$firstname=stripslashes($guestName->firstname);
			$surname=stripslashes($guestName->surname);
			$landline=stripslashes($guestName->tel_landline);
			$mobile=stripslashes($guestName->tel_mobile);
			}
		$rateOutput="";
		$currency=urldecode($mrConfig['currencyCode']);
		foreach ($rates_uids as $rate)
			{
			$query="SELECT rate_title,rate_description,roomrateperday FROM #__jomres_rates WHERE rates_uid = '".(int)$rate."'";
			$ratesList =doSelectSql($query);
			foreach ($ratesList as $rate)
				{
				$rTitle=stripslashes($rate->rate_title);
				$rDesc=stripslashes($rate->rate_description);
				$rRate=$currfmt->get_formatted($rate->roomrateperday);
				$rateOutput.=$rTitle.' '.$rDesc.' '.$rRate;
				}
			}

		$query="SELECT email FROM #__jomres_guests WHERE guests_uid = '".(int)$guests_uid."' LIMIT 1";
		if ($mrConfig['errorCheckingShowSQL']) echo $query."<br>";
		$userEmail =doSelectSql($query);
		foreach ($userEmail as $email)
			{
			$useremail=stripslashes($email->email);
			}
		$subject=_JOMRES_FRONT_MR_EMAIL_SUBJECT_INTERNETBOOKINGMADE.stripslashes($propertyName);
		/*
		$name=stripslashes($propertyName);
			$text =  " "."\t\n\t\n";
		if ($mrConfig['singleRoomProperty'] != "1")
			$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_ROOM." ".$roomNumber." ".stripslashes($room_name)." \t\n";
		$text .= _JOMRES_BOOKING_NUMBER.' '.$cartnumber." \t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL.outputDate($arrivalDate)." \t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE.outputDate($departureDate). "\t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_NAME.stripslashes($firstname)." ".stripslashes($surname)." \t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE.$landline." \t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE.$mobile." \t\n";
		$text .= _JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL.$currency.$currfmt->get_formatted($contract_total)." \t\n";
		$text .= _JOMRES_FRONT_TARIFFS_TITLE." ".$currency.$rateOutput." \t\n";
		$text .= _JOMRES_COM_MR_EB_ROOM_BOOKINGSPECIALREQ." ".stripslashes($specialReqs)." \t\n\t\n";

		$text .= $jomresConfig_live_site."/index.php?option=com_jomres&task=editBooking&Itemid=53&contract_uid=".$componentArgs['contract_uid']." \t\n";
		$text .= $clientIP;
		*/

//		$fileLocation=checkForImage('property',$property_uid);
		$output=array();
		if (strlen($specialReqs)>0)
			{
			$output['HSPECIAL_REQUIREMENTS']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_BOOKINGSPECIALREQ',_JOMRES_COM_MR_EB_ROOM_BOOKINGSPECIALREQ,FALSE,FALSE);
			$output['SPECIAL_REQUIREMENTS']=quote_smart($specialReqs);
			}
		$output['ISO']=_ISO;
		//$output['IMAGE']=$jomresConfig_live_site."/components/com_jomres/images/jrlogo.png";
//		if ($fileLocation)
//			$output['IMAGE']=$jomresConfig_live_site.$fileLocation;
		$output['IMAGE']=getImageForProperty("property",$property_uid,$property_uid);
		$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
		$output['HROOM']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_ROOM',_JOMRES_FRONT_MR_EMAIL_TEXT_ROOM,FALSE,FALSE);
		$output['ROOM']=$roomNumber." ".$room_name;
		$output['HBOOKINGNO']=jr_gettext('_JOMRES_BOOKING_NUMBER',_JOMRES_BOOKING_NUMBER,FALSE,FALSE);
		$output['BOOKINGNO']=$cartnumber;
		$output['HARRIVAL']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL',_JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL,FALSE,FALSE);
		$output['ARRIVAL']=outputDate($arrivalDate);
		$output['HDEPARTURE']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE',_JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE,FALSE,FALSE);
		$output['DEPARTURE']=outputDate($departureDate);
		$output['HNAME']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_NAME',_JOMRES_FRONT_MR_EMAIL_TEXT_NAME,FALSE,FALSE);
		$output['FIRSTNAME']=stripslashes($firstname);
		$output['SURNAME']=stripslashes($surname);
		$output['HLANDLINE']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE',_JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE,FALSE,FALSE);
		$output['LANDLINE']=$landline;
		$output['HMOBILE']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE',_JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE,FALSE,FALSE);
		$output['MOBILE']=$mobile;
		$output['HTOTAL']=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL',_JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL,FALSE,FALSE);
		$output['TOTAL']=$currency.number_format($contract_total, 2, '.', '');
		$output['HTARIFFTITLE']=jr_gettext('_JOMRES_FRONT_TARIFFS_TITLE',_JOMRES_FRONT_TARIFFS_TITLE,FALSE,FALSE);
		$output['TARIFFINFO']=$rateOutput;
		$output['LINKTOBOOKING']="<a href=\"".$jomresConfig_live_site."/index.php?option=com_jomres&task=editBooking&Itemid=".$Itemid."&contract_uid=".$componentArgs['contract_uid']."\">".jr_gettext('_JOMCOMP_MYUSER_VIEWBOOKING',_JOMCOMP_MYUSER_VIEWBOOKING,FALSE,FALSE)."</a>";
		$output['CLIENTIP']=$clientIP;

		$output['HDEPOSIT']		=	jr_gettext('_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED',_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED);
		$output['DEPOSIT']		=	$mrConfig['currency'].$currfmt->get_formatted($deposit_required);

		$guestDetails = getGuestDetailsForContract($componentArgs['contract_uid']);
		$rows=array();
		if (count($guestDetails)>0)
			{
			$output['HNUMBEROFGUESTS']=jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP4_NUMBEROFGUESTS',_JOMRES_COM_MR_QUICKRES_STEP4_NUMBEROFGUESTS,FALSE,FALSE);
			foreach ( $guestDetails as $g)
				{
				$r=array();
				$r['TITLE']=$g['title'];
				$r['QUANTITY']=$g['qty'];
				$rows[]=$r;
				}
			}

		$pageoutput[]=$output;

		$tmpl = new patTemplate();
		$tmpl->setRoot(JOMRES_TEMPLATEPATH_FRONTEND);
		$tmpl->readTemplatesFromInput( 'hotel_conf_email.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows',$rows);

		if ($email_when_done)
			{
			$text=$tmpl->getParsedTemplate();
			if ($mrConfig['errorChecking'])  echo $text;
			$result=false;
			if (!jomresMailer( $useremail, $propertyName, $hotelemail, $subject, $text,$mode=1))
				error_logging('Failure in sending confirmation email to hotel. Target address: '.$hotelemail.' Subject'.$subject);
			}
		else
			$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP4_NUMBEROFGUESTS',_JOMRES_COM_MR_QUICKRES_STEP4_NUMBEROFGUESTS);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_ROOM',_JOMRES_FRONT_MR_EMAIL_TEXT_ROOM);
		$output[]		=jr_gettext('_JOMRES_BOOKING_NUMBER',_JOMRES_BOOKING_NUMBER);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL',_JOMRES_FRONT_MR_EMAIL_TEXT_ARRIVAL);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE',_JOMRES_FRONT_MR_EMAIL_TEXT_DEPARTURE);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_NAME',_JOMRES_FRONT_MR_EMAIL_TEXT_NAME);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE',_JOMRES_FRONT_MR_EMAIL_TEXT_LANDLINE);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE',_JOMRES_FRONT_MR_EMAIL_TEXT_MOBILE);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL',_JOMRES_FRONT_MR_EMAIL_TEXT_TOTAL);
		$output[]		=jr_gettext('_JOMRES_FRONT_TARIFFS_TITLE',_JOMRES_FRONT_TARIFFS_TITLE);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
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
		return null;
		}
	}
?>