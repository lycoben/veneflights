<?php
/**
#
 * Mini-component core file: Constructs and displays printable confirmation page
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
 *  Constructs and displays printable confirmation page
 #
* @package Jomres
#
 */
class j02190confirmationform {
	/**
	#
	 * Constructor:  Constructs and displays printable confirmation page
	#
	 */
	function j02190confirmationform()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig,$jomresConfig_live_site;
		//echo $contract_uid;
		$defaultProperty=getDefaultProperty();
		$contract_uid = jomresGetParam( $_REQUEST, 'contract_uid', 0 );
		$sendemail = jomresGetParam( $_REQUEST, 'sendemail', 0 );
		$today = date("Y/m/d");
		$query="SELECT arrival,departure,guest_uid,rate_rules,contract_total,deposit_required,property_uid FROM #__jomres_contracts WHERE contract_uid = '".(int)$contract_uid."' AND property_uid = '".(int)$defaultProperty."'";
		$contractData =doSelectSql($query);
		foreach ($contractData as $contract)
			{
			$arrival=$contract->arrival;
			$departure=$contract->departure;
			$guestUid=$contract->guest_uid;
			$rate_rules=$contract->rate_rules;
			$contract_total=$contract->contract_total;
			$deposit_required=$contract->deposit_required;
			$propertyUid=$contract->property_uid;
			}
		// To be used in the future
		/*
		$guesttypeOutput=array();
		$varianceArray=explode(",",$variances);
		foreach ($varianceArray as $v)
			{
			$vDeets=explode("_",$v);
			if ($vDeets[0]=="guesttype")
				{
				$vu=$vDeets[1];
				$vq=$vDeets[2];
				$vv=$vDeets[3];
				$query="SELECT `type` FROM `#__jomres_customertypes` where id = '".(int)$vu."' ";
				$vtitle=doSelectSql($query,1);
				$guesttypeOutput[]=array('title'=>$vtitle,'qty'=>$vq,'value'=>$vv);
				}
			}
		*/
		$guestDetails = getGuestDetailsForContract($contract_uid);
		$rows=array();
		if (count($guestDetails)>0)
			{
			foreach ( $guestDetails as $g)
			$r=array();
			$r['TITLE']=$g['title'];
			$r['QUANTITY']=$g['qty'];
			$rows[]=$r;
			}

		$room_name="";
		$room_number="";
		$room_class_abbvs=array();
		$query="SELECT room_uid FROM #__jomres_room_bookings WHERE contract_uid = '".(int)$contract_uid."' AND `date` = '".(string)$arrival."'";
		$roomData =doSelectSql($query);

		foreach ($roomData as $room)
			{
			$counter=1;
			$query="SELECT room_name,room_number,room_classes_uid FROM #__jomres_rooms WHERE room_uid = '".(int)$room->room_uid."'";
			$roomData =doSelectSql($query);
			foreach ($roomData as $r)
				{
				if (strlen($r->room_name) > 0)
					$room_name.=$r->room_name;
				if (strlen($r->room_number) > 0)
					$room_number.=$r->room_number;
				$room_classes_uid=$r->room_classes_uid;
				if ($counter < count($roomData) )
					{
					if (strlen($r->room_number) > 0)
						$room_number.=",";
					if (strlen($r->room_name) > 0)
						$room_name.=",";
					}
				else
					{
					if (strlen($r->room_number) > 0)
						$room_number.=".";
					if (strlen($r->room_name) > 0)
						$room_name.=".";
					}
				$query="SELECT room_class_abbv FROM #__jomres_room_classes WHERE room_classes_uid = '".(int)$room_classes_uid."'";
				$roomClassData =doSelectSql($query);

				foreach ($roomClassData as $roomClass)
					{
					$room_class_abbvs[]=$roomClass->room_class_abbv." ";
					}
				$counter++;
				}
			}

		$room_class_abbvs_data=array_count_values($room_class_abbvs);
		$counter=1;
		foreach ($room_class_abbvs_data as $key=>$val)
			{
			$room_class_abbv .= $key. " x ".$val;
			if ($counter < count($room_class_abbvs_data) )
				$room_class_abbv .=",";
			else
				$room_class_abbv .=".";
			$counter++;
			}

//		$fileLocation=checkForImage('property',$propertyUid);
//		$property_image=array();
//		$output['PROPERTYIMAGE']=$jomresConfig_live_site."/components/com_jomres/images/jrlogo.png";
//		if ($fileLocation)
//			$output['PROPERTYIMAGE']=$jomresConfig_live_site.$fileLocation;
		$output['PROPERTYIMAGE']=getImageForProperty("property",$propertyUid,$propertyUid);
		$output['BL_DEAR']=jr_gettext('_JOMRES_COM_CONFIRMATION_DEAR',_JOMRES_COM_CONFIRMATION_DEAR);
		$output['BL_INTRO1']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO1',_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO1);
		$output['BL_INTRO2']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO2',_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO2);
		$output['BL_CHECKIN']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_CHECKIN',_JOMRES_COM_CONFIRMATION_RESERVATION_CHECKIN);
		$output['BL_LOOKFORWARD']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_LOOKFORWARD',_JOMRES_COM_CONFIRMATION_RESERVATION_LOOKFORWARD);
		$output['BL_HAVEAPLEASANTSTAY']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_HAVEAPLEASANTSTAY',_JOMRES_COM_CONFIRMATION_RESERVATION_HAVEAPLEASANTSTAY);
		$output['SP_SMALLPRINTINTRO']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINTINTRO',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINTINTRO);
		$output['SP_BINDINGCONTRACT']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_BINDINGCONTRACT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_BINDINGCONTRACT);
		$output['SP_NOALLOWANCE']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_NOALLOWANCE',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_NOALLOWANCE);
		$output['SP_CANCELLATIONCHARGES_INTRO']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_CANCELLATIONCHARGES_INTRO',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_CANCELLATIONCHARGES_INTRO);
		$output['SP_30DAYSPLUS']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_30DAYSPLUS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_30DAYSPLUS);
		$output['SP_DEPOSITONLY']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_DEPOSITONLY',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_DEPOSITONLY);
		$output['SP_1530DAYS']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_1530DAYS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_1530DAYS);
		$output['SP_50PERCENT']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_50PERCENT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_50PERCENT);
		$output['SP_ARRIVALDATETO14DAYS']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_ARRIVALDATETO14DAYS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_ARRIVALDATETO14DAYS);
		$output['SP_100_PERCENT']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_100_PERCENT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_100_PERCENT);
		$output['SP_VAT']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_VAT',_JOMRES_COM_CONFIRMATION_RESERVATION_VAT);

		$output['HNAME']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NAME',_JOMRES_COM_MR_EB_ROOM_NAME);
		$output['HNUMBER']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NUMBER',_JOMRES_COM_MR_EB_ROOM_NUMBER);
		$output['HARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL);
		$output['HDEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE);
		$output['HDEPOSITREQUIRED']=jr_gettext('_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED',_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED);
		$output['HCONTRACT_TOTAL']=jr_gettext('_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL',_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL);
		$output['HROOMTYPE']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV',_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV);
		//$output['HPERNIGHT']=jr_gettext('_JOMRES_COM_CONFIRMATION_RATE_RULES',_JOMRES_COM_CONFIRMATION_RATE_RULES);
		$output['HTELEPHONE']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE);
		$output['HFAX']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX);
		$output['HEMAIL']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL);
		$output['HWEBSITE']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_WEBSITE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_WEBSITE);
		$output['RESV_DETAILS']=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS',_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS);

		$propertyAddressArray=getPropertyAddressForPrint($propertyUid);
		$propertyContactArray=$propertyAddressArray[1];
		$propertyAddyArray=$propertyAddressArray[2];

		$output['PROP_NAME']=$propertyContactArray[0];
		$output['PROP_STREET']=$propertyContactArray[1];
		$output['PROP_TOWN']=$propertyContactArray[2];
		$output['PROP_POSTCODE']=$propertyContactArray[3];
		$output['PROP_REGION']=$propertyContactArray[4];

		$countryname=getSimpleCountry($propertyContactArray[5]);

		$output['PROP_COUNTRY']=ucfirst($countryname);
		$output['PROP_TEL']=$propertyAddyArray[0];
		$output['PROP_FAX']=$propertyAddyArray[1];
		$output['PROP_EMAIL']=$propertyAddyArray[2];
		$output['PROP_URL']=$propertyAddyArray[3];

		$guestDetailsArray=getGuestForPrint($guestUid);

		$output['GUEST_FIRSTNAME']=$guestDetailsArray[0];
		$output['GUEST_SURNAME']=$guestDetailsArray[1];
		$output['GUEST_HOUSE']=$guestDetailsArray[2];
		$output['GUEST_STREET']=$guestDetailsArray[3];
		$output['GUEST_TOWN']=$guestDetailsArray[4];
		$output['GUEST_POSTCODE']=$guestDetailsArray[5];
		$output['GUEST_REGION']=$guestDetailsArray[6];
		$output['GUEST_COUNTRY']=$guestDetailsArray[7];

		$output['ROOM_NAME']=$room_name;
		$output['ROOM_NUMBER']=$room_number;
		$output['ARRIVAL']=outputDate($arrival);
		$output['DEPARTURE']=outputDate($departure);
		$output['DEPOSIT_REQUIRED']=$mrConfig['currency'].number_format($deposit_required,2);
		$output['CONTRACT_TOTAL']=$mrConfig['currency'].number_format($contract_total,2);
		$output['ROOMTYPE']=$room_class_abbv;
		$output['PERNIGHT']=$mrConfig['currency'].number_format($rate_rules,2);
		$output['LIVESITE']=$jomresConfig_live_site;
		$pageoutput[]=$output;

		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'confirmation_letter.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);

		if ($sendemail ==0)
			$tmpl->displayParsedTemplate();
		else
			{
			$text=$tmpl->getParsedTemplate();
			$subject=jr_gettext('_JOMRES_FRONT_GUEST_EMAIL_TEXT_THANKS',_JOMRES_FRONT_GUEST_EMAIL_TEXT_THANKS)." ".$output['PROP_NAME'];
			//mosMail( $from=$useremail, $fromname=$propertyName, $recipient=$hotelemail, $subject, $body=$text, $mode=1, $cc=NULL, $bcc=NULL, $Attachment=NULL);
			$query="SELECT email FROM #__jomres_guests WHERE guests_uid = '".(int)$guestUid."' LIMIT 1";
			if ($mrConfig['errorCheckingShowSQL']) echo $query."<br>";
			$userEmail =doSelectSql($query);
			foreach ($userEmail as $email)
				{
				$useremail=stripslashes($email->email);
				}
			$result=false;

			if (count($useremail)>0)
				{
				$result=jomresMailer( $output['PROP_EMAIL'], $output['PROP_NAME'], $useremail, $subject, $text,$mode=1);
				$result=jomresMailer($output['PROP_EMAIL'], $output['PROP_NAME'], $output['PROP_EMAIL'], $subject, $text,$mode=1);// Let's send this to the property too, so that they have a seperate record
				}
			}
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_FRONT_GUEST_EMAIL_TEXT_THANKS',_JOMRES_FRONT_GUEST_EMAIL_TEXT_THANKS);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_DEAR',_JOMRES_COM_CONFIRMATION_DEAR);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO1',_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO1);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO2',_JOMRES_COM_CONFIRMATION_RESERVATION_INTRO2);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_CHECKIN',_JOMRES_COM_CONFIRMATION_RESERVATION_CHECKIN);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_LOOKFORWARD',_JOMRES_COM_CONFIRMATION_RESERVATION_LOOKFORWARD);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_HAVEAPLEASANTSTAY',_JOMRES_COM_CONFIRMATION_RESERVATION_HAVEAPLEASANTSTAY);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINTINTRO',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINTINTRO);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_BINDINGCONTRACT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_BINDINGCONTRACT);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_NOALLOWANCE',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_NOALLOWANCE);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_CANCELLATIONCHARGES_INTRO',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_CANCELLATIONCHARGES_INTRO);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_30DAYSPLUS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_30DAYSPLUS);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_DEPOSITONLY',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_DEPOSITONLY);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_1530DAYS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_1530DAYS);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_50PERCENT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_50PERCENT);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_ARRIVALDATETO14DAYS',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_ARRIVALDATETO14DAYS);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_100_PERCENT',_JOMRES_COM_CONFIRMATION_RESERVATION_SMALLPRINT_100_PERCENT);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_VAT',_JOMRES_COM_CONFIRMATION_RESERVATION_VAT);
		$output[]		=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NAME',_JOMRES_COM_MR_EB_ROOM_NAME);
		$output[]		=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NUMBER',_JOMRES_COM_MR_EB_ROOM_NUMBER);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED',_JOMRES_COM_MR_EB_PAYM_DEPOSITREQUIRED);
		$output[]		=jr_gettext('_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL',_JOMRES_COM_MR_EB_PAYM_CONTRACT_TOTAL);
		$output[]		=jr_gettext('_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV',_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_WEBSITE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_WEBSITE);
		$output[]		=jr_gettext('_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS',_JOMRES_COM_CONFIRMATION_RESERVATION_DETAILS);

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