<?php
/**
#
 * This file controls the main switch functions for Jomres
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

if (!defined('JPATH_BASE'))
	{
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		{
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
		//$mosConfig_absolute_path=JPATH_ROOT	;
		//$jomresConfig_absolute_path 	= JPATH_ROOT;
		}
	else
		{
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
		}
	}

global $timetracking;
$timetracking = false;
if (!isset($_REQUEST['no_html']))
	$_REQUEST['no_html'] = 0;
if ($timetracking && $_REQUEST['no_html']!="1")
	{
	global $jomres_db_querylog;
	$timekeeper = array();
	$timereport = array();
	$timekeeper = start_track("jomres_runtime", $timekeeper);
	}

define('JOMRESTMPPATH', dirname(__FILE__) );

ob_start("removeBOM");
@ini_set("memory_limit","128M");

global $mainframe,$MiniComponents,$thisJRUser,$cssStyle,$task,$jomresPathway, $jrConfig;
global $property_uid,$Itemid,$jomressession,$jomresConfig_absolute_path;
global $popup,$numberOfPropertiesInSystem,$loggingEnabled,$customTextArray;
global $version,$tmpBookingHandler,$jomresConfig_live_site;
global $thisJomresPropertyDetails,$customTextObj;

global $loggingEnabled,$loggingBooking,$loggingGateway,$loggingSystem,$loggingRequest;

/**
#
 * Various includes
#
 */
require_once(JOMRESTMPPATH.'/integration.php');

if ( $_REQUEST['no_html']!="1")
	{
	error_reporting(E_ALL);
	@ini_set("display_errors", 1);
	}

$customTextObj = new custom_text();


// Logging needs to be enabled before the specific log will be created
// Depreciated as of 3.3.1

/*
$loggingEnabled=false;
$loggingBooking=true;
$loggingGateway=true;
$loggingSystem=true;
$loggingRequest=true;
$loggingPortal=true;
*/

request_log($loggingRequest);
$jomressession  = "";

if (isset($_REQUEST['jsid']) ) // jsid is passed by gateway services sending response codes
	{
	$jomressession  =jomresGetParam( $_REQUEST, 'jsid', "" );
	}
//gateway_log("Setting jomressession to ". $jomressession);
$tmpBookingHandler = new jomres_temp_booking_handler();
$tmpBookingHandler->initBookingSession($jomressession);
$jomressession  = $tmpBookingHandler->getJomressession();
gateway_log("Deposit required ".$tmpBookingHandler->tmpbooking['deposit_required']);

$selectedProperty	= intval( jomresGetParam( $_REQUEST, 'selectedProperty', 0 ) );
$property_uid		= intval( jomresGetParam( $_REQUEST, 'property_uid', 0 ) );
$popup				= intval( jomresGetParam( $_REQUEST, 'popup', 0 ) );
$tag				= jomresGetParam( $_REQUEST, 'tag', "" );
$no_html			= (int)jomresGetParam( $_REQUEST, 'no_html', 0 );
$plugin 			= jomresGetParam( $_REQUEST, 'plugin', "" );
$task 				= jomresGetParam( $_REQUEST, 'task', "" );
$Itemid				= intval( jomresGetParam( $_REQUEST, 'Itemid', 0 ) );

if (!defined('_JOMRES_NEWJOOMLA') && !strstr( $version, "Mambo" ) && $no_html != 1) // Mambo doesn't seem to use the language file until after the component has done it's thing, so we wont check for it here. As of v2.6.1 this really only amounts to an advisory anyway.
	{
	//header('Content-type: text/html; ' . _ISO);
	$iso=_ISO;
	if (_ISO != "charset=utf-8" )
		echo "<font color=\"red\">Warning, your charset is not set to utf-8 therefore you will experience problems with currency symbols and non-latin characters being stored incorrectly in the database, and these characters breaking the booking form. You need to use a utf-8 characterset/language file to use Jomres. <a href=\"http://tickets.jomres.net/index.php?_m=knowledgebase&_a=viewarticle&kbarticleid=12&nav=0,7\" target=\"_blank\">See this knowledgebase article for more information. </a>.</font><br>";
	}

if(!$Itemid || $Itemid == 99999999)
	{
	$query = "SELECT id"
		. "\n FROM #__menu"
		. "\n WHERE "
		. "\n published = 1"
		. "\n AND link LIKE 'index.php?option=com_jomres' LIMIT 1";
	$itemQueryRes = doSelectSql($query);
	if (count($itemQueryRes)>0)
		{
		foreach ($itemQueryRes as $i)
			{
			$Itemid = $i->id;
			}
		}
	else $Itemid = $jrConfig['jomresItemid'];
	}

//var_dump($_REQUEST);exit;

$propertyNamesArray=array();


if ($tag != "" && $task != "editBooking")
	$task="tagSearch";

$jomresPathway=new jomres_pathway();

if ($task!="error")
	{
	$thisJRUser=$MiniComponents->triggerEvent('00002'); // Register user
	$defaultProperty=(int)$thisJRUser->currentproperty;
	$thisJRUser->userIsManager=$thisJRUser->userIsManager;
	$accessLevel=$thisJRUser->accesslevel;
	$usersProperty=$thisJRUser->defaultproperty;
	if (!$thisJRUser->userIsManager && $thisJRUser->userIsRegistered)
		{
		$tmpBookingHandler->updateGuestField('mos_userid',$thisJRUser->id);
		if ($task!="handlereq" && $task!="completebk" && $task!="processpayment" && $task!="confirmbooking")
			{
			$query="SELECT guests_uid,firstname,surname,house,street,town,postcode,county,country,tel_landline,tel_mobile,email FROM #__jomres_guests WHERE mos_userid = '".(int)$thisJRUser->id."' LIMIT 1";
			$guestData=doSelectSql($query,2);
			if ($guestData)
				{
				$tmpBookingHandler->updateGuestField('guests_uid',$guestData['guests_uid']);
				$tmpBookingHandler->updateGuestField('firstname',$guestData['firstname']);
				$tmpBookingHandler->updateGuestField('surname',$guestData['surname']);
				$tmpBookingHandler->updateGuestField('house',$guestData['house']);
				$tmpBookingHandler->updateGuestField('street',$guestData['street']);
				$tmpBookingHandler->updateGuestField('town',$guestData['town']);
				$tmpBookingHandler->updateGuestField('region',$guestData['county']);
				$tmpBookingHandler->updateGuestField('country',$guestData['country']);
				$tmpBookingHandler->updateGuestField('postcode',$guestData['postcode']);
				$tmpBookingHandler->updateGuestField('tel_landline',$guestData['tel_landline']);
				$tmpBookingHandler->updateGuestField('tel_mobile',$guestData['tel_mobile']);
				$tmpBookingHandler->updateGuestField('email',$guestData['email']);
				}
			else
				{
				$query="SELECT email FROM #__users WHERE id = '".(int)$thisJRUser->id."'";
				$guestData=doSelectSql($query,2);
				$tmpBookingHandler->updateGuestField('email',$guestData['email']);
				}
			}
		}
	$tmpBookingHandler->saveGuestData();
	}
else
	{
	$thisJRUser=new stdClass;
	$thisJRUser->userid = FALSE;
	$thisJRUser->username = FALSE;
	$thisJRUser->userIsManager = FALSE;
	$thisJRUser->accesslevel = FALSE;
	$thisJRUser->defaultproperty = FALSE;
	$thisJRUser->currentproperty = FALSE;
	$thisJRUser->authorisedProperties = array();
	}

// The admins_first_login.txt file in the temp folder is used as a check to remind new users that they need to log into the Jomres front end
if (!file_exists($jomresConfig_absolute_path.JRDS.'components'.JRDS.'com_jomres'.JRDS.'temp'.JRDS.'admins_first_login.txt') && $thisJRUser->username == "admin")
	{
	touch($jomresConfig_absolute_path.JRDS.'components'.JRDS.'com_jomres'.JRDS.'temp'.JRDS.'admins_first_login.txt');
	}

// Finding the property uid
$query="SELECT propertys_uid FROM #__jomres_propertys";
$countproperties = doSelectSql($query);
$numberOfPropertiesInSystem=count($countproperties);
if ($numberOfPropertiesInSystem==1)
	{
	if (!$thisJRUser->userIsManager)
		{
		foreach ($countproperties as $prop)
			{
			$property_uid=(int)$prop->propertys_uid;
			}
		}
	else
		{
		$parray=array();
		foreach ($countproperties as $prop)
			{
			$parray[]=(int)$prop->propertys_uid;
			}
		if (in_array($defaultProperty,$parray) )
			$property_uid=$defaultProperty;
		else
			$property_uid=$parray[0];

		}
	}
else if ($thisJRUser->userIsManager)
	$property_uid=$defaultProperty;

/*
replaced with $published=$thisJomresPropertyDetails['published'];
if ($task != "handlereq")
	{
	$query="SELECT published FROM #__jomres_propertys WHERE propertys_uid = ".(int)$property_uid." ";
	$propertyList = doSelectSql($query);
	$published="0";
	foreach ($propertyList as $prop)
		{
		$published=$prop->published;
		}
	}
*/

if ($task=="showRoomDetails")
	{
	$roomUid	= jomresGetParam( $_REQUEST, 'roomUid', 0 );
	$query = "SELECT propertys_uid FROM #__jomres_rooms WHERE  room_uid  = '".(int)$roomUid."'";
	$roomList =doSelectSql($query);
	if (count($roomList)>0)
		{
		foreach ($roomList as $room)
			{
			$property_uid=(int)$room->propertys_uid;
			}
		}
	}

if (($task=="handlereq" || $task=="confirmbooking" || $task=="completebk" || $task=="processpayment") && !$thisJRUser->userIsManager  )
	{
	$property_uid = (int)$tmpBookingHandler->getBookingFieldVal("property_uid");
	gateway_log("Setting property uid to ".$property_uid);
	}

// Payment specific stuff.
if ($task=="completebk" || $task=="processpayment" || $task=="confirmbooking")
	{
	if (isset($_POST['specialReqs']) )
		{
		$specialReqs=quote_smart(jomresGetParam( $_POST, 'specialReqs', "" ));
		$tmpBookingHandler->updateBookingField("error_log",$specialReqs);
		$tmpBookingHandler->saveBookingData();
		}
	}
// Finish finding the property uid


// Getting the property specific settings
if ( (isset($property_uid) && !empty($property_uid) ) || ( isset($selectedProperty) && !empty($selectedProperty) ) || ( isset($defaultProperty) && $defaultProperty!="%" ) )
	{
	global $mrConfig;
	if (!empty($property_uid))
		{
		$a=0;
		}
	else if (!empty($selectedProperty))
		{
		$property_uid=(int)$selectedProperty;
		}
		else
			{
			$property_uid=(int)$defaultProperty;
			}
	$mrConfig=getPropertySpecificSettings($property_uid);
	}

// Finish getting the property specific settings




if ($property_uid > 0)
	{
	//$tmpBookingHandler->tmpbooking["property_uid"]=$property_uid;
	$tmpBookingHandler->saveBookingData();
	$pdeets=getPropertyAddressForPrint($property_uid);
	$thisJomresPropertyDetails=$pdeets[3];
	$published=$thisJomresPropertyDetails['published'];
	}

// Getting the language file
if (!empty($property_uid))
	{
	//$query="SELECT ptype_id FROM #__jomres_propertys WHERE propertys_uid = ".(int)$property_uid."";
	//$ptype_id = doSelectSql($query,1);
	$ptype_id=$thisJomresPropertyDetails['ptype_id'];
	if ($ptype_id > 0)
		{
		$query="SELECT ptype_desc FROM #__jomres_ptypes WHERE id = '".(int)$ptype_id."'";
		$propertytype = doSelectSql($query,1);
		}
	}
else
	$propertytype="";

if (file_exists(JOMRESPATH_BASE.JRDS.'language'.JRDS.strtolower($propertytype).JRDS.$jomresConfig_lang.'.php'))
	{
	require_once(JOMRESPATH_BASE.JRDS.'language'.JRDS.strtolower($propertytype).JRDS.$jomresConfig_lang.'.php');
	}
else
	{
	if (file_exists(JOMRESPATH_BASE.JRDS.'language'.JRDS.$jomresConfig_lang.'.php'))
		{
		require_once(JOMRESPATH_BASE.JRDS.'language'.JRDS.$jomresConfig_lang.'.php');
		$jomresLangFile=JOMRESPATH_BASE.JRDS.'language'.JRDS.$jomresConfig_lang.'.php';
		}
	else
		{
		if (file_exists(JOMRESPATH_BASE.JRDS.'language'.JRDS.'en-GB.php'))
			{
			require_once(JOMRESPATH_BASE.JRDS.'language'.JRDS.'en-GB.php');
			$jomresLangFile=JOMRESPATH_BASE.JRDS.'language'.JRDS.'en-GB.php';
			} //else no language file available... don't include it either...
		}
	}

// This little routine sets the custom text for an individual property.
if (!empty($property_uid))
	{
	$customTextArray=$customTextObj->get_custom_text_for_property($property_uid);
	}

if (!isset($jrConfig['useSSLinBookingform']) )
	$jrConfig['useSSLinBookingform']=0;

if ( $jrConfig['useSSLinBookingform'] == 1 && !_JOMRES_NEWJOOMLA )
	{
	if ($task == "handlereq" || $task == "dobooking" || $task == "confirmbooking" || $task == "completebk" || $task == "processpayment")
		{
		$jomresConfig_live_site = str_replace("http://","https://",$jomresConfig_live_site);
		$mosConfig_live_site = str_replace("http://","https://",$mosConfig_live_site);
		if (strstr( $version, "Mambo" ) )
			mamboCore::set ('mosConfig_live_site', $jomresConfig_live_site);
		}
	else
		{
		$jomresConfig_live_site = str_replace("https://","http://",$jomresConfig_live_site);
		$mosConfig_live_site = str_replace("https://","http://",$mosConfig_live_site);
		if (strstr( $version, "Mambo" ) )
			mamboCore::set ('mosConfig_live_site', $jomresConfig_live_site);
		}
	}

init_javascript($mainframe,$jrConfig,$thisJRUser,$version,$jomresConfig_live_site,$jomresConfig_lang);

if (!$no_html)
	{
	// Now we can show top.html
	$output=array();
	$output['BACKLINK']='<a href="javascript: history.go(-1)">'.jr_gettext('_JOMRES_COM_MR_BACK',_JOMRES_COM_MR_BACK).'</a>';

	$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
	$pageoutput[]=$output;
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
	$tmpl->readTemplatesFromInput( 'top.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->displayParsedTemplate();
	$pageoutput=array();
	$output=array();
	}


// Manager specific tasks
if ($thisJRUser->userIsManager)
	{
	if ($task != "propertyadmin" && $task != "editRoom" && $task !='savenormalmodetariffs' && $task !='hotelSettings' && $task !='saveHotelSettings')
		performSingleRoomPropertyCheck($property_uid);
		if ($task != "invoiceForm" && $task != "confirmationForm" && $task != "editCustomText" && $task != "saveCustomText" && !$popup && !$no_html)
		{ // Show the reception menu
		$componentArgs=array();
		$componentArgs['published']=$published;
		$componentArgs['property_uid']=$property_uid;
		$MiniComponents->triggerEvent('00010',$componentArgs);
		$componentArgs=array();
		if ($accessLevel=="2")
			{ // Show the manager's memu
			$componentArgs=array();
			$componentArgs['published']=$published;
			$MiniComponents->triggerEvent('00011',$componentArgs);
			$componentArgs=array();
			}
		}
	}
else
	{ // User is not a manager. We can check that it's valid to show search options
	$showSearchOption=FALSE;
	if ( ($task=="listproperties" || $task=="" || $task=="doSearch" || $task=="search") && $numberOfPropertiesInSystem>1 && $popup!=1)
		$showSearchOption=TRUE;
	if ( $task=="viewproperty" ||  $task=="" )
		{
		$componentArgs=array();
		$componentArgs['thisJRUser']=$thisJRUser;
		$MiniComponents->triggerEvent('00050',$componentArgs);
		$componentArgs=array();
		}
	}


$option="com_jomres";
$componentArgs=array();
$MiniComponents->triggerEvent('00012',$componentArgs); // Optional other stuff to do before switch is done. Probably not required.
$componentArgs=array();

if (!isset($jrConfig['cssColourScheme']) )
	$jrConfig['cssColourScheme']="blue";
if (!$no_html)
	{
	$componentArgs=array();
	$colourSchemeDataArray=$MiniComponents->triggerEvent('00021',$componentArgs); // Get the colour scheme
	$componentArgs=array();
	}

$task2 			= jomresGetParam( $_REQUEST, 'task2', "" );
if ($task2 != "")
	$task = $task2;
if (!isset($jrConfig['errorChecking']) )
	$jrConfig['errorChecking']=0;

$jomresPathway->addItem("Search",$task,"");
if ($numberOfPropertiesInSystem>0)
	{
	switch ($task) {
		#########################################################################################
		case 'handlereq':
			$MiniComponents->triggerEvent('05010');
		break;
		#########################################################################################
		case 'dobooking':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('05020');
			else
				{
				if (($mrConfig['visitorscanbookonline']=="1") && (!$thisJRUser->userIsManager))
					{
					if (!$thisJRUser->userIsRegistered && $mrConfig['registeredUsersOnlyCanBook']=="1")
						{
						$MiniComponents->triggerEvent('02280');
						}
					else
						$MiniComponents->triggerEvent('05020');
					}
				else
					$MiniComponents->specificEvent('00600',"contactowner"); // Alternative if online bookings by guests is disabled
				}
		break;
		#########################################################################################
		case 'confirmbooking':
			$componentArgs=array();
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02990'); // Trigger the booking confirmation page
			else
				{
				if (($mrConfig['visitorscanbookonline']=="1") && (!$thisJRUser->userIsManager))
					{
					if (!$thisJRUser->userIsRegistered && $mrConfig['registeredUsersOnlyCanBook']=="1")
						$MiniComponents->triggerEvent('02280');
					else
						$MiniComponents->triggerEvent('02990'); // Trigger the booking confirmation page
					}
				}
		break;
		#########################################################################################
		case 'completebk':
			$bookingdata = gettempBookingdata();
			$MiniComponents->triggerEvent('00609',array ('bookingdata'=> $bookingdata) ); // Optional
			$MiniComponents->specificEvent('00610',$plugin); //Incoming
		break;
		#########################################################################################
		case 'processpayment':
			$bookingdata = gettempBookingdata();
			$MiniComponents->triggerEvent('00599',array ('bookingdata'=> $bookingdata) ); // Optional
			if (!$thisJRUser->userIsManager && $mrConfig['useOnlinepayment']=="1" )
				{
				$query="SELECT id,plugin FROM #__jomres_pluginsettings WHERE prid = ".(int)$property_uid." AND `plugin` = '".(string)$plugin."' AND setting = 'active' AND value = '1'";
				$gatewayDeets=doSelectSql($query);
				if (count($gatewayDeets)>0)
					{
					$interrupted = intval( jomresGetParam( $_POST, 'interrupted', 0 ) );
					$interruptOutgoingFile	= false;
					if ($MiniComponents->eventFileLocate('00600',$plugin))
						$interruptOutgoingFile	='j00600'.$plugin.'.class.php';
					$outgoingFile ='j00605'.$plugin.'.class.php';

					if ($interruptOutgoingFile && $interrupted == 0 )
						$MiniComponents->specificEvent('00600',$plugin,array('bookingdata'=>$bookingdata ,'property_uid'=>$property_uid ,'guestdata'=>$guestdata   )); //Interrupt outgoing
					else
						$MiniComponents->specificEvent('00605',$plugin,array('bookingdata'=>$bookingdata ,'property_uid'=>$property_uid ,'guestdata'=>$guestdata   )); //outgoing
					}
				else
					{
					insertInternetBooking($jomressession,$depositPaid=false,$confirmationPageRequired=true,$customTextForConfirmationForm="");
					}
				}
			else
				{
				insertInternetBooking($jomressession,$depositPaid=false,$confirmationPageRequired=true,$customTextForConfirmationForm="");
				}
		break;
		#########################################################################################
		case 'showRoomsListing':
			$componentArgs=array('all'=>"all",'property_uid'=>$property_uid);
			$MiniComponents->triggerEvent('01055',$componentArgs);
			$componentArgs=array();
			//showRoomDetails("all",$property_uid);
		break;
		#########################################################################################
		case 'saveCustomerTypeOrder':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				{
				$componentArgs=array();
				$MiniComponents->triggerEvent('02110');
				//saveCustomerTypeOrder();
				}
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'publishCustomerType':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02112'); //publishCustomerType();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listCustomerTypes':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02114'); //listCustomerTypes();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editCustomerType':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02116'); //editCustomerType();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveCustomerType':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02118'); //saveCustomerType();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteCustomerType':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02120'); //deleteCustomerType();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'registerProp_step1':
			if ($thisJRUser->userIsRegistered)
				$MiniComponents->triggerEvent('02300');
			else
				echo _JOMRES_REGISTRATION_NOTALLOWED;
		break;
		#########################################################################################
		case 'registerProp_step2':
			if ($thisJRUser->userIsRegistered)
				$MiniComponents->triggerEvent('02310');
			else
				echo _JOMRES_REGISTRATION_NOTALLOWED;
		break;
		#########################################################################################
		case 'saveRegisterProp':
			 if ($thisJRUser->userIsRegistered)
				$MiniComponents->triggerEvent('02320');
		break;
		#########################################################################################
		case 'editGateway':
			if ($thisJRUser->userIsManager  && $accessLevel ==2  && $plugin)
				{
				$MiniComponents->specificEvent('00510',$plugin);
				}
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'savePlugin':
			if ($thisJRUser->userIsManager  && $accessLevel ==2)
				{
				if (isset($_REQUEST['plugin']) && !empty($_REQUEST['plugin']) )
					{
					$plugin = jomresGetParam( $_REQUEST, plugin, '' );
					savePlugin($plugin);
					}
				}
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveHotelSettings':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				saveHotelSettings();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'hotelSettings':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				hotelSettings();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'publishProperty':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				publishProperty();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'dropImage':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				dropImage($defaultProperty);
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editCustomTextAll':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				editCustomTextAll();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editCustomText':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				editCustomText();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveCustomText':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				saveCustomText();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'slideshow':
			$MiniComponents->triggerEvent('01060'); //
		break;
		#########################################################################################
		case 'bUploadForm':
			if ($thisJRUser->userIsManager  && $accessLevel ==2  )
				batchUploadForm();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'bUpload':
			if ($thisJRUser->userIsManager  && $accessLevel ==2  )
				batchUploadPropertyImages();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'uploadPropertyImage':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				uploadPropertyImage();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'uploadRoomImage':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				uploadRoomImage();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'propertyadmin':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04000'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editRoom':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04010'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveRoom':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04020'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteRoom':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04030'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editRoomFeature':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04070'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveRoomFeature':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('04080'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteRoomFeature':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('04090'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editRoomClass':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04040'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveRoomClass':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04050'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteRoomClass':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04060'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editProperty':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04200'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteProperty':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04910'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveProperty':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04900'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteProperty':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04910'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editPropertyFeature':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04100'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'savePropertyFeature':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04110'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deletePropertyFeature':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('04120'); //
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editCreditcard':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02230'); //editCreditcard();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveCreditcard':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02232'); //saveCreditcard();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'cancelCreditcardEdit':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02234'); //cancelCreditcardEdit();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listBlackBookings':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02130'); //listBlackBookings();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'newBlackBooking':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02134'); //newBlackBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'viewBlackBooking':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02132'); //viewBlackBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveBBooking':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02136'); //saveBBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteBlackBooking':
			if ($thisJRUser->userIsManager)
				$MiniComponents->triggerEvent('02138'); //deleteBlackBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'publishExtra':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02140'); //publishExtra();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listExtras':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02142'); //listExtras();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editExtra':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02144'); //editExtra();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveExtra':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02146'); // saveExtra();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteExtra':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02148'); //deleteExtra();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'showRoomDetails':
			$componentArgs['all']=false;
			$MiniComponents->triggerEvent('01055',$componentArgs); //showRoomDetails();

		break;
		#########################################################################################
		case 'showAuditTrail':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02250'); //showAuditTrail();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'archiveAudit':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02252'); //archiveAudit();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'addServiceToBill':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02150'); //addServiceToBill();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'invoiceForm':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02192'); //invoiceForm();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'confirmationForm':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02190'); //confirmationForm();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveCancellation':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02162'); //saveCancellation();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'cancelBooking':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02160'); //cancelBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'bookGuestIn':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02170'); //bookGuestIn();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'bookGuestOut':
			if ($thisJRUser->userIsManager )
			$MiniComponents->triggerEvent('02180'); //bookGuestOut();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveBookout':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02182'); //saveBookout();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editBooking':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02260'); //editBooking();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listguests':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02220'); //listGuests();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editGuest':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02222'); //editGuest();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveGuest':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02224'); //saveGuest();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteGuest':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02226'); //deleteGuest();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listLiveBookings':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02240'); //listLiveBookings();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'listNewBookings':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02242'); //listNewBookings();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editDeposit':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02200'); //editDeposit();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveDeposit':
			if ($thisJRUser->userIsManager )
				$MiniComponents->triggerEvent('02202'); //saveDeposit();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'editTariff':
			if ($thisJRUser->userIsManager && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02212'); //editTariff()
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'saveTariff':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02214'); //saveTariff();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'deleteTariff':
			if ($thisJRUser->userIsManager  && $accessLevel ==2 )
				$MiniComponents->triggerEvent('02216'); //deleteTariff();
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'tagSearch':
			if ($thisJRUser->userIsManager )
				{
				$componentArgs=array();
				$componentArgs['tag']=$tag;
				$MiniComponents->triggerEvent('00020',$componentArgs); //tagSearch();
				}
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'showTariffs':
				$MiniComponents->triggerEvent('01020'); //showTariffs();
		break;
		#########################################################################################
		case 'doSearch':
			doSearch();
		break;
		#########################################################################################
		case 'listProperties':
			jomresShowSearch();
		break;
		#########################################################################################
		case 'viewproperty':
			// Used to trigger an error artificially to test error handling
			//if ($divisor == 0) { trigger_error ("Cannot divide by zero", E_USER_ERROR); }
			$componentArgs=array();
			$componentArgs['property_uid']=$property_uid;
			if (in_array(intval($_REQUEST['property_uid']),$thisJRUser->authorisedProperties) && intval($thisJRUser->currentproperty) != intval($_REQUEST['property_uid']) )
				{
				$property_uid		= intval( jomresGetParam( $_REQUEST, 'property_uid', 0 ) );
				$thisJRUser->set_currentproperty($property_uid);
				jomresRedirect( jomresURL("index.php?option=com_jomres&task=viewproperty&Itemid=$Itemid&property_uid=$property_uid"), "" );
				}
			if ($jrConfig['composite_property_details']!="1")
				{
				//$MiniComponents->triggerEvent('00014',$componentArgs); // Pre-View property
				$MiniComponents->triggerEvent('00015',$componentArgs); // View property
				}
			else
				$MiniComponents->triggerEvent('00016',$componentArgs);

		break;
		#########################################################################################
		case 'preview':
			if ($thisJRUser->userIsManager )
				{
				$componentArgs=array();
				$componentArgs['property_uid']=$property_uid;
				if ($jrConfig['composite_property_details']!="1")
					{
					//$MiniComponents->triggerEvent('00014',$componentArgs); // Pre-View property
					$MiniComponents->triggerEvent('00015',$componentArgs); // View property
					}
				else
					$MiniComponents->triggerEvent('00016',$componentArgs);
				}
			else
				userHasBeenLoggedOut();
		break;
		#########################################################################################
		case 'error':
			$componentArgs=array();
			$MiniComponents->triggerEvent('02270',$componentArgs); // Post-view property
		break;
		#########################################################################################
		default:
			if ($MiniComponents->eventSpecificlyExistsCheck('06000',$task) )
				{
				$MiniComponents->specificEvent('06000',$task); // Custom task
				}
			else
				{
				if ( (isset($_REQUEST['calledByModule']) || isset($_REQUEST['page'])) && $thisJRUser->userIsManager)
					{
					$jomresPathway->addItem("Search","listProperties","");
					jomresShowSearch();
					}
				else
					{
					if ($thisJRUser->userIsManager )
						$MiniComponents->triggerEvent('00013');  // Show dashboard
					else if ($numberOfPropertiesInSystem==1)
						{
						//$MiniComponents->triggerEvent('0013');  // Show dashboard
						$task="viewproperty";
						$componentArgs=array();
						$componentArgs['property_uid']=$property_uid;
						if ($jrConfig['composite_property_details']!="1")
							{
							//$MiniComponents->triggerEvent('00014',$componentArgs); // Pre-View property
							$MiniComponents->triggerEvent('00015',$componentArgs); // View property
							}
						else
							$MiniComponents->triggerEvent('00016',$componentArgs);
						}
					else
						{
						$jomresPathway->addItem("Search","listProperties","");
						jomresShowSearch();
						}
					}
				}
		break;
		}

	if (!$no_html)
		{
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
		$tmpl->readTemplatesFromInput( 'bottom.html');
		$tmpl->displayParsedTemplate();
		}
	}
else
	{
	if ($MiniComponents->eventSpecificlyExistsCheck('06000',$task) )
		{
		$MiniComponents->specificEvent('06000',$task); // Optional  Custom task
		}
	else
		{
		echo "Error, no properties installed. Before you can use Jomres you need to have at least 1 property installed, this is achieved by running <a href=\"$jomresConfig_live_site/install_jomres.php\"></a>install_jomres.php.";
		}
	}

$componentArgs=array();
$MiniComponents->triggerEvent('99999',$componentArgs); // Optional end of run minicomponent
$componentArgs=array();

if ($no_html==0 && $jrConfig['errorChecking']==1)
	{
	foreach ($MiniComponents->log as $log)
		echo "Log :".$log."<br>";
	}
if ($timetracking && $_REQUEST['no_html']!="1")
	{
	$timereport = end_track("jomres_runtime", $timekeeper, $timereport);
	time_report($timereport);
	//var_dump($jomres_db_querylog);exit;

	if( function_exists('memory_get_usage') )
		{
		echo "Memory usage: ".memory_get_usage  (TRUE );
		echo "<br>";
		echo "Peak usage: ".memory_get_peak_usage  ( TRUE  );
		echo "<br>";
		}
	echo "Number of queries: ".count($jomres_db_querylog);
	echo "<br>";
	foreach ($jomres_db_querylog as $q)
		{
		//echo substr  ($q,0,80);
		echo wordwrap  ($q,80);
		echo "<br>";
		}
	}
ob_end_flush();

// Script stops here

function performSingleRoomPropertyCheck($property_uid)
	{
	global $mrConfig;
	if ($mrConfig['singleRoomProperty'] == "1" )
		{
		$query="SELECT room_uid FROM #__jomres_rooms WHERE propertys_uid = ".(int)$property_uid."";
		$roomsList =doSelectSql($query);
		if (count($roomsList) > 1 )
			echo "<script>alert('"._JOMRES_SINGLEROOMPROPERTY_ERROR."')</script>";
		}
	}


	function start_track($item, $timekeeper)
	{
		$timeStart=gettimeofday();
		$timeStart_uS=$timeStart["usec"];
		$timeStart_S=$timeStart["sec"];
		$item1 = $item . "_usec";
		$item2 = $item . "_sec";
		$timekeeper[$item1] = $timeStart_uS;
		$timekeeper[$item2] = $timeStart_S;
		return $timekeeper;
	}

	function end_track($item, $timekeeper, $timereport)
	{
		$timeEnd=gettimeofday();
		$timeEnd_uS=$timeEnd["usec"];
		$timeEnd_S=$timeEnd["sec"];
		$item1 = $item . "_usec";
		$item2 = $item . "_sec";
		$start_uS = $timekeeper[$item1];
		$start_S = $timekeeper[$item2];
		$ExecTime_S = ($timeEnd_S+($timeEnd_uS/1000000))-($start_S+($start_uS/1000000));
		$timereport[$item] = $ExecTime_S;
		return $timereport;
	}

	function time_report($timereport)
	{
		while(list($key, $time) = each($timereport))
		{
			print "$key - $time sec.<br>\n";
		}
	}

function removeBOM($str="")
	{
	if(substr($str, 0,3) == pack("CCC",0xef,0xbb,0xbf))
		{
		$str=substr($str, 3);
		}
	return $str;
	}

?>