<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

$uddeim_isadmin = 1;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
	require_once(JPATH_SITE.'/administrator/components/com_uddeim/admin.uddeimlib15.php');
} else {
	global $mainframe;
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
	require_once($mainframe->getCfg('absolute_path').'/administrator/components/com_uddeim/admin.uddeimlib10.php');
}

$pathtoadmin = uddeIMgetPath('admin');
$pathtouser  = uddeIMgetPath('user');

//if( !($acl->acl_check('administration', 'edit', 'users', $my->usertype, 'components', 'all') |
//$acl->acl_check('administration', 'edit', 'users',$my->usertype,'components', 'com_uddeim') ) )
//{
//    uddeIMmosRedirect('index2.php', _NOT_AUTH );
//} 

require($pathtoadmin."/admin.shared.php");
require($pathtoadmin."/admin.includes.php");
require($pathtoadmin."/admin.usersettings.php");
require($pathtoadmin."/config.class.php");			// configuration file
$config = new uddeimconfigclass();
uddeIMcheckConfig($config);
$usedlanguage = uddeIMloadLanguage($pathtoadmin, $config);

//$task		= uddeIMmosGetParam( $_REQUEST, 'task', 'settings');
//$option		= uddeIMmosGetParam( $_REQUEST, 'option', 'com_uddeim');

if ($config->version!=$configversion) {
	$task='convertconfig';	// its the wrong configuration file, so we have to convert it first
}

$act	= uddeIMmosGetParam($_REQUEST, 'act', '');
$id		= uddeIMmosGetParam($_REQUEST, 'id', 0);
$uddeid	= uddeIMmosGetParam($_REQUEST, 'uddeid', array());
if (!is_array($uddeid)) {
	$uddeid = array();
}

switch ($task) {

	case "usersettingsremove":
	case "usersettingsnew":
		uddeIMdolistEMN($option, $task, $uddeid, $config);
		break;
	case "usersettings":
//		switch($act) {
//			case "status":	uddeIMchangeStatus($option, $task, $id, $config);
//							break;
//			case "popup":	uddeIMchangePopup($option, $task, $id, $config);
//							break;
//			case "public":	uddeIMchangePublic($option, $task, $id, $config);
//							break;
//			default:		uddeIMshowUsersettings($option, $task, $act, $config);
//							break;
//		}
		uddeIMshowUsersettings($option, $task, $act, $config);
		break;

	case "convertconfig":
		// convert config and recall admin
		uddeIMconvertConfiguration($option, $task, $pathtoadmin, $configversion, $config);
		break;

	case "settings":
		uddeIMshowSettings($option, $task, $usedlanguage, $pathtoadmin, $pathtouser, $versionstring, $config);
		break;

	case "savesettings":
		$config->cryptkey = uddeIMmosGetParam ($_POST, 'config_cryptkey', 'uddeIMcryptkey');
		$config->datumsformat = uddeIMmosGetParam ($_POST, 'config_datumsformat', 'j M, H:i');
		$config->ldatumsformat = uddeIMmosGetParam ($_POST, 'config_ldatumsformat', 'j F Y, H:i');  
		$config->emn_sendermail = uddeIMmosGetParam ($_POST, 'config_emn_sendermail', 'webmaster');   
		$config->emn_sendername = uddeIMquotestrip(uddeIMmosGetParam ($_POST, 'config_emn_sendername', 'Messaging'));  
		$config->sysm_username = htmlspecialchars(uddeIMquotestrip(uddeIMmosGetParam ($_POST,'config_sysm_username', 'System')),ENT_QUOTES);   	
		$config->charset = uddeIMmosGetParam($_POST,'config_charset');  	
		$config->mailcharset = uddeIMmosGetParam($_POST,'config_mailcharset');  			
		$config->emn_body_nomessage = uddeIMmosGetParam($_POST,'config_emn_body_nomessage', '');	
		$config->emn_body_withmessage = uddeIMmosGetParam($_POST,'config_emn_body_withmessage', '');	
		$config->emn_forgetmenot = uddeIMmosGetParam($_POST,'config_emn_forgetmenot', '');	
		$config->export_format = uddeIMmosGetParam($_POST,'config_export_format', '');				
		$config->showtitle = uddeIMquotecode(uddeIMmosGetParam($_POST,'config_showtitle', ''));			
		$config->templatedir = uddeIMmosGetParam($_POST,'config_templatedir');					
		$config->quotedivider = uddeIMmosGetParam ($_POST, 'config_quotedivider', '__________');		

		$xxx=uddeIMmosGetParam ($_POST, 'config_blockgroups', array());  
		if (!is_array( $xxx ))
			$xxx = array();
		$config->blockgroups = implode(",", $xxx);

		$xxx=uddeIMmosGetParam ($_POST, 'config_pubblockgroups', array());  
		if (!is_array( $xxx ))
			$xxx = array();
		$config->pubblockgroups = implode(",", $xxx);

		$xxx=trim(uddeIMmosGetParam ($_POST, 'config_hideusers'));
		if ($xxx) {
			$xxx=explode(",", $xxx);
			$xxx=array_map("intval", $xxx);
			$xxx=implode(",", $xxx);
		}
		$config->hideusers = $xxx;

		$xxx=trim(uddeIMmosGetParam ($_POST, 'config_pubhideusers'));
		if ($xxx) {
			$xxx=explode(",", $xxx);
			$xxx=array_map("intval", $xxx);
			$xxx=implode(",", $xxx);
		}
		$config->pubhideusers = $xxx;

		$config->TrashLifespan = (float)uddeIMmosGetParam ($_POST, 'config_TrashLifespan', 2, _MOS_ALLOWRAW);	// otherwise we will not get a float (maybe $config->TrashLifespan = (float) $_POST['config_TrashLifespan'];)
		$config->ReadMessagesLifespan=(int)uddeIMmosGetParam ($_POST, 'config_ReadMessagesLifespan', 36524);
		$config->UnreadMessagesLifespan=(int)uddeIMmosGetParam ($_POST, 'config_UnreadMessagesLifespan', 36524);
		$config->SentMessagesLifespan=(int)uddeIMmosGetParam ($_POST, 'config_SentMessagesLifespan', 36524);
		$config->ReadMessagesLifespanNote=(int)uddeIMmosGetParam ($_POST, 'config_ReadMessagesLifespanNote', 0);
		$config->UnreadMessagesLifespanNote=(int)uddeIMmosGetParam ($_POST, 'config_UnreadMessagesLifespanNote', 0);
		$config->SentMessagesLifespanNote=(int)uddeIMmosGetParam ($_POST, 'config_SentMessagesLifespanNote', 0);
		$config->TrashLifespanNote=(int)uddeIMmosGetParam ($_POST, 'config_TrashLifespanNote', 1);
		$config->adminignitiononly=(int)uddeIMmosGetParam ($_POST, 'config_adminignitiononly', 1);  
		$config->pmsimportdone=(int)uddeIMmosGetParam ($_POST, 'config_pmsimportdone', 0);
		$config->blockalert=(int)uddeIMmosGetParam ($_POST, 'config_blockalert', 0);  	
		$config->blocksystem=(int)uddeIMmosGetParam ($_POST, 'config_blocksystem', 0);  	
		$config->allowemailnotify=(int)uddeIMmosGetParam ($_POST, 'config_allowemailnotify', 0);   
		$config->notifydefault =(int) uddeIMmosGetParam ($_POST, 'config_notifydefault', 0);
		$config->popupdefault =(int) uddeIMmosGetParam ($_POST, 'config_popupdefault', 0);
		$config->allowsysgm=(int)uddeIMmosGetParam ($_POST, 'config_allowsysgm', 0);   
		$config->emailwithmessage=(int)uddeIMmosGetParam ($_POST, 'config_emailwithmessage', 0);   
		$config->firstwordsinbox=(int)uddeIMmosGetParam ($_POST, 'config_firstwordsinbox', 40);   
		$config->longwaitingdays=(int)uddeIMmosGetParam ($_POST, 'config_longwaitingdays', 75);   
		$config->longwaitingemail=(int)uddeIMmosGetParam ($_POST, 'config_longwaitingemail', 0);   
		$config->maxlength=(int)uddeIMmosGetParam ($_POST, 'config_maxlength', 1200);   
		$config->showcblink=(int)uddeIMmosGetParam ($_POST, 'config_showcblink', 0);   
		$config->showcbpic=(int)uddeIMmosGetParam ($_POST, 'config_showcbpic', 0);   
		$config->showonline=(int)uddeIMmosGetParam ($_POST, 'config_showonline', 1);   
		$config->allowarchive=(int)uddeIMmosGetParam ($_POST, 'config_allowarchive', 0);   
		$config->maxarchive=(int)uddeIMmosGetParam ($_POST, 'config_maxarchive', 100);  	
		$config->allowcopytome=(int)uddeIMmosGetParam ($_POST, 'config_allowcopytome', 0);  		
		$config->trashoriginal=(int)uddeIMmosGetParam ($_POST, 'config_trashoriginal', 1);  		
		$config->perpage=(int)uddeIMmosGetParam ($_POST, 'config_perpage', 8);  		
		$config->enabledownload=(int)uddeIMmosGetParam ($_POST, 'config_enabledownload', 0);	
		$config->inboxlimit=(int)uddeIMmosGetParam ($_POST, 'config_inboxlimit', 0);		
		$config->showinboxlimit=(int)uddeIMmosGetParam ($_POST, 'config_showinboxlimit',0);				
		$config->allowpopup=(int)uddeIMmosGetParam ($_POST, 'config_allowpopup', 0);
		$config->allowbb=(int)uddeIMmosGetParam ($_POST, 'config_allowbb', 1);	
		$config->allowsmile=(int)uddeIMmosGetParam ($_POST, 'config_allowsmile', 1);		
		$config->animated=(int)uddeIMmosGetParam ($_POST, 'config_animated', 0);		
		$config->animatedex=(int)uddeIMmosGetParam ($_POST, 'config_animatedex', 0);		
		$config->showmenuicons=(int)uddeIMmosGetParam ($_POST, 'config_showmenuicons', 1);
		$config->bottomlineicons=(int)uddeIMmosGetParam ($_POST, 'config_bottomlineicons', 1);
		$config->actionicons=(int)uddeIMmosGetParam ($_POST, 'config_actionicons', 1);
		$config->showconnex=(int)uddeIMmosGetParam ($_POST, 'config_showconnex', 0);			
		$config->showsettingslink=(int)uddeIMmosGetParam ($_POST, 'config_showsettingslink', 0);				
		$config->connex_listbox=(int)uddeIMmosGetParam ($_POST, 'config_connex_listbox', 0);	
		$config->forgetmenotstart=(int)uddeIMmosGetParam ($_POST, 'config_forgetmenotstart', 0);		
		$config->showabout=(int)uddeIMmosGetParam ($_POST, 'config_showabout', 0);				
		$config->emailtrafficenabled=(int)uddeIMmosGetParam ($_POST, 'config_emailtrafficenabled', 0);
		$config->getpiclink=(int)uddeIMmosGetParam ($_POST, 'config_getpiclink', 0);	
		$config->realnames=(int)uddeIMmosGetParam ($_POST, 'config_realnames', 0);		
		$config->cryptmode=(int)uddeIMmosGetParam ($_POST, 'config_cryptmode', 0);  
		$config->modeshowallusers=(int)uddeIMmosGetParam ($_POST, 'config_modeshowallusers', 0);  
		$config->useautocomplete=(int)uddeIMmosGetParam ($_POST, 'config_useautocomplete', 0);  
		$config->allowmultipleuser=(int)uddeIMmosGetParam ($_POST, 'config_allowmultipleuser', 0);  
		$config->connexallowmultipleuser=(int)uddeIMmosGetParam ($_POST, 'config_connexallowmultipleuser', 0); 
		$config->allowmultiplerecipients=(int)uddeIMmosGetParam ($_POST, 'config_allowmultiplerecipients', 0);
		$config->showtextcounter=(int)uddeIMmosGetParam ($_POST, 'config_showtextcounter', 1); 
		$config->allowforwards=(int)uddeIMmosGetParam ($_POST, 'config_allowforwards', 1); 
		$config->showgroups=(int)uddeIMmosGetParam ($_POST, 'config_showgroups', 0); 
		$config->mailsystem=(int)uddeIMmosGetParam ($_POST, 'config_mailsystem', 0); 
		$config->searchinstring=(int)uddeIMmosGetParam ($_POST, 'config_searchinstring', 1); 
		$config->maxrecipients=(int)uddeIMmosGetParam ($_POST, 'config_maxrecipients', 0);
		$config->languagecharset=(int)uddeIMmosGetParam ($_POST, 'config_languagecharset', 0);
		$config->usecaptcha=(int)uddeIMmosGetParam ($_POST, 'config_usecaptcha', 0);
		$config->captchalen=(int)uddeIMmosGetParam ($_POST, 'config_captchalen', 4);
		$config->pubfrontend=(int)uddeIMmosGetParam ($_POST, 'config_pubfrontend', 0);
		$config->pubfrontenddefault=(int)uddeIMmosGetParam ($_POST, 'config_pubfrontenddefault', 0);
		$config->pubmodeshowallusers=(int)uddeIMmosGetParam ($_POST, 'config_pubmodeshowallusers', 0);  
		$config->hideallusers=(int)uddeIMmosGetParam ($_POST, 'config_hideallusers', 0);  
		$config->pubhideallusers=(int)uddeIMmosGetParam ($_POST, 'config_pubhideallusers', 0);  
		$config->unblockCBconnections=(int)uddeIMmosGetParam ($_POST, 'config_unblockCBconnections', 1);  
		$config->CBgallery=(int)uddeIMmosGetParam ($_POST, 'config_CBgallery', 0);  
		$config->enablelists=(int)uddeIMmosGetParam ($_POST, 'config_enablelists', 0);  
		$config->maxonlists=(int)uddeIMmosGetParam ($_POST, 'config_maxonlists', 100);  
		$config->timedelay=(int)uddeIMmosGetParam ($_POST, 'config_timedelay', 0);
		$config->pubrealnames=(int)uddeIMmosGetParam ($_POST, 'config_pubrealnames', 0);
		$config->pubreplies=(int)uddeIMmosGetParam ($_POST, 'config_pubreplies', 0);
		$config->csrfprotection=(int)uddeIMmosGetParam ($_POST, 'config_csrfprotection', 0);
		$config->trashrestriction=(int)uddeIMmosGetParam ($_POST, 'config_trashrestriction', 0);
		$config->replytruncate=(int)uddeIMmosGetParam ($_POST, 'config_replytruncate', 0);
		$config->allowflagged=(int)uddeIMmosGetParam ($_POST, 'config_allowflagged', 0);
		$config->overwriteitemid=(int)uddeIMmosGetParam ($_POST, 'config_overwriteitemid', 0);
		$config->useitemid=(int)uddeIMmosGetParam ($_POST, 'config_useitemid', 0);
		$config->timezone=(float)uddeIMmosGetParam ($_POST, 'config_timezone', 0, _MOS_ALLOWRAW);	// otherwise we will not get a float
		$config->pubuseautocomplete=(int)uddeIMmosGetParam ($_POST, 'config_pubuseautocomplete', 0);  
		$config->pubsearchinstring=(int)uddeIMmosGetParam ($_POST, 'config_pubsearchinstring', 1); 
		$config->mootools=(int)uddeIMmosGetParam ($_POST, 'config_mootools', 1); 

		$oldsetting_allowarchive=uddeIMmosGetParam ($_POST, 'oldsetting_allowarchive', 0);
		$oldsetting_longwaitingemail= uddeIMmosGetParam ($_POST, 'oldsetting_longwaitingemail', 0);
		$GLOBALS['oldsetting_allowarchive'] = $oldsetting_allowarchive;
		$GLOBALS['oldsetting_longwaitingemail'] = $oldsetting_longwaitingemail;

		uddeIMsaveSettings($option, $task, $pathtoadmin, $config);
		break;
	
	case "cancel":
		$redirecturl = "index2.php";
		uddeIMmosRedirect($redirecturl);
	
	case "importpms":
		uddeIMimportPMS($option, $task, $act, $pathtoadmin, $config);
		break;
	
	case "archivetotrash":
		uddeIMarchivetoTrash($option, $task, $act, $config);
		break;	

	case "maintenance":
		uddeIMmaintenanceCheckTrash($option, $task, $act, $config);		// act=trash/check
		break;	

	case "maintenanceprune":
		uddeIMmaintenancePrune($option, $task, $config);
		break;

	case "backuprestore":
		uddeIMbackupRestoreConfig($option, $task, $act, $pathtoadmin, $config);		// act=emtpy, backup, restore
		break;

	case "versioncheck":
		uddeIMversioncheck($option, $task, $checkversion);
		break;

	case "showstatistics":
		uddeIMshowstatistics($option, $task);
		break;

	default:
		uddeIMshowSettings($option, $task, $usedlanguage, $pathtoadmin, $pathtouser, $versionstring, $config);
		break;	
}

function uddeIMsaveSettings($option, $task, $pathtoadmin, $config) {
	global $oldsetting_allowarchive, $oldsetting_longwaitingemail;

	$database = uddeIMgetDatabase();
	if(($oldsetting_longwaitingemail != $config->longwaitingemail) && ($config->longwaitingemail==1)) {
		$config->forgetmenotstart=uddetime($config->timezone);
	}

//define( 'YOURBASEPATH', dirname(__FILE__) );
//$configdatei = YOURBASEPATH . '/config.class.php' ;
	
	if (!uddeIMsaveConfig($pathtoadmin, $config))
		return;

// Change $config->notifydefault using "ALTER TABLE"
//				$upgrade =  "ALTER TABLE `#__uddeim_emn` CHANGE `status` `status` INT( 1 ) NOT NULL DEFAULT '".$config->notifydefault."';";
//				$database->setQuery($upgrade);
//				if(!$database->query()) {
//					// ALTER TABLE failed
//				}

	if($oldsetting_allowarchive==1 && $config->allowarchive==0) {
		$mosmsg = _UDDEADM_SETTINGSSAVED;
		$redirecturl="index2.php?option=com_uddeim&task=archivetotrash";
		uddeIMmosRedirect($redirecturl, $mosmsg); 
	}
	
	$mosmsg=_UDDEADM_SETTINGSSAVED;
	$redirecturl = "index2.php?option=com_uddeim&task=settings";
	uddeIMmosRedirect($redirecturl, $mosmsg); 
}


function uddeIMimportPMS($option, $task, $act, $pathtoadmin, $config) {
	$database = uddeIMgetDatabase();
	$act = (int)$act;
	$mypmstypes = uddeIMcheckPMStype();

	$mypmstype = 0;
	if ( in_array($act, $mypmstypes) ) {
		echo _UDDEADM_IMPORTING;
		$mypmstype = $act;
	}

	// **************************************************************************************************
	if ($mypmstype==1) {
		// import myPMS II 2.x
		$sql="SELECT id, whofrom, username AS whoto, date, time, message, subject, readstate FROM #__pms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			// merge the PMS fields date and time into one single unix timestamp
			$totaldate=$thepms->date." ".$thepms->time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			// remove "<br>" tags in pms message 
			// (uddeIM saves no BR tags and inserts them when reading from the database instead of adding them before writing to database)
			// line breaks should be present in the message, that's why we just strip the BRs
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			// add slahes (but strip them first to avoid double slashes if they have already been added)
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			// strip any HTML that might have been saved into the PMS message
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;
		
			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==2) {
		// import myPMS Enhanced 2.x
		$sql="SELECT id, sender_id, recip_id, date, time, message, subject, readstate, inbox, sent_items FROM #__pms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			$fromid=$thepms->sender_id;
			$toid  =$thepms->recip_id;
		
			// merge the PMS fields date and time into one single unix timestamp
			$totaldate=$thepms->date." ".$thepms->time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);
	
			$toread=$thepms->readstate;
			$totrash=0;
			$totrashoutbox=0;
			if ($thepms->inbox<0)
				$totrash=1;
			if ($thepms->sent_items<0)
				$totrashoutbox=1;

			$totrashdate="NULL";
			if ($totrash) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdate=uddetime($config->timezone)-$trashoffset;
				$totrashdate=uddetime($config->timezone);
			}
			$totrashdateoutbox="NULL";
			if ($totrashoutbox) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdateoutbox=uddetime($config->timezone)-$trashoffset;
				$totrashdateoutbox=uddetime($config->timezone);
			}

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==3) {
		// import jim 1.x
		$sql="SELECT id, whofrom, username AS whoto, date, message, subject, outbox, readstate FROM #__jim";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			// jim stores date and time in one field
			$totaldate=$thepms->date;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;
		
			$totrashoutbox=0;
			if (!$thepms->outbox)
				$totrashoutbox=1;

			$totrashdateoutbox="NULL";
			if ($totrashoutbox)
				$totrashdateoutbox=uddetime($config->timezone);

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==4) {
		// import Archaic Binary Private Messages 1.x
		$sql="SELECT id, sender AS whofrom, usern AS whoto, created, title, text, opened FROM #__abim_data";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			$totaldate=$thepms->created;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->title)
				$pmessage="[b]".$thepms->title."[/b]\n\n".$thepms->text;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->opened;
		
			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==5) {
		// import JAM
		$sql="SELECT id, toid, fromid, subject, message, datetime, stateto, inbox, outbox FROM #__jam";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {

			$toid			= $thepms->toid;
			$fromid			= $thepms->fromid;
		
			$archived = 0;
			$totrash = 0;
			if ($thepms->inbox==-2) {
				$archived = 1;
				$totrash = 1;
			} elseif ($thepms->inbox==2) {
				$archived = 1;
				$totrash = 0;
			} elseif ($thepms->inbox==-1) {
				$archived = 0;
				$totrash = 1;
			}

			$totrashdate = "NULL";
			if ($totrash) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdate=uddetime($config->timezone)-$trashoffset;
				$totrashdate=uddetime($config->timezone);
			}
		
			$totaldate=$thepms->datetime;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->stateto;

			$disablereply=0;
			if ($thepms->system)
				$disablereply=$thepms->system;
			if ($thepms->disablereply)
				$disablereply=$thepms->disablereply;

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, disablereply, archived, totrash, totrashdate) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$disablereply.", ".(int)$archived.", ".(int)$totrash.", ".$totrashdate.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==6) {
		// import Clexus 2.0
		$sql="SELECT id, whofrom, userid AS whoto, time, message, subject, readstate FROM #__mypms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			$fromid=$thepms->whofrom;
			$toid  =$thepms->whoto;

			// merge the PMS fields date and time into one single unix timestamp
			$totaldate=$thepms->time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			// remove "<br>" tags in pms message 
			// (uddeIM saves no BR tags and inserts them when reading from the database instead of adding them before writing to database)
			// line breaks should be present in the message, that's why we just strip the BRs
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			// add slahes (but strip them first to avoid double slashes if they have already been added)
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			// strip any HTML that might have been saved into the PMS message
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;

			if($fromid && $toid && $pmessage) {
				if ($fromid==$toid) {
					$trashoffset=((float)$config->TrashLifespan)*86400;
					$deletetime=uddetime($config->timezone)-$trashoffset;
					$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", 1, ".$deletetime.")";
				} else {
					$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.")";
				}
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==7) {
		// import Missus 1.x
		$sql = "SELECT m.id, subject, message, senderid, sendername, sendermail, datesended, "
				."receptorid, broadcast, replied, forwarded, rptr_rstate AS readstate, rptr_tstate AS totrash, sdr_tstate AS totrashoutbox "
				."FROM #__missus AS m JOIN #__missus_receipt AS r "
				."WHERE m.id = r.id AND m.is_draft=0";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			$fromid=$thepms->senderid;
			$toid  =$thepms->receptorid;
		
			$totaldate=$thepms->datesended;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);
	
			$toread=$thepms->readstate;
			$totrash=$thepms->totrash;
			$totrashoutbox=$thepms->totrashoutbox;

			$totrashdate="NULL";
			if ($totrash) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdate=uddetime($config->timezone)-$trashoffset;
				$totrashdate=uddetime($config->timezone);
			}
			$totrashdateoutbox="NULL";
			if ($totrashoutbox) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdateoutbox=uddetime($config->timezone)-$trashoffset;
				$totrashdateoutbox=uddetime($config->timezone);
			}

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==8) {
		// import Primezilla 1.0
		$sql="SELECT id, userid, userid_from, msg_date, msg_time, subject, message, flag_read, flag_deleted FROM #__primezilla_inbox";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			$fromid=$thepms->userid_from;
			$toid  =$thepms->userid;
		
			// merge the PMS fields date and time into one single unix timestamp
			$totaldate=$thepms->msg_date." ".$thepms->msg_time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);
	
			$toread=$thepms->flag_read;
			$totrash=0;
			if ($thepms->flag_deleted)
				$totrash=1;
			$totrashoutbox=1;

			$totrashdate="NULL";
			if ($totrash) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdate=uddetime($config->timezone)-$trashoffset;
				$totrashdate=uddetime($config->timezone);
			}
			$totrashdateoutbox="NULL";
			if ($totrashoutbox) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdateoutbox=uddetime($config->timezone)-$trashoffset;
				$totrashdateoutbox=uddetime($config->timezone);
			}

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==9) {
		// import myPMS OS 2.x
		$sql="SELECT id, whofrom, username AS whoto, date, message, subject, readstate FROM #__pms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			$totaldate=$thepms->date;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			// remove "<br>" tags in pms message 
			// (uddeIM saves no BR tags and inserts them when reading from the database instead of adding them before writing to database)
			// line breaks should be present in the message, that's why we just strip the BRs
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			// add slahes (but strip them first to avoid double slashes if they have already been added)
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			// strip any HTML that might have been saved into the PMS message
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;
		
			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==10) {
		// import myPMS Pro 1.x
		$sql="SELECT id, whofrom, username AS whoto, time, message, subject, readstate FROM #__mypms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			$totaldate=$thepms->time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			// remove "<br>" tags in pms message 
			// (uddeIM saves no BR tags and inserts them when reading from the database instead of adding them before writing to database)
			// line breaks should be present in the message, that's why we just strip the BRs
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			// add slahes (but strip them first to avoid double slashes if they have already been added)
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			// strip any HTML that might have been saved into the PMS message
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;

			$totrash=0;
			if ($toread==2) {
				$totrash=1;
				$toread=1;
			}
			$totrashdate="NULL";
			if ($totrash)
				$totrashdate=uddetime($config->timezone);

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==11) {
		// import jim reloaded 1.x
		$sql="SELECT id, whofrom, username AS whoto, date, message, subject, inbox, outbox, readstate FROM #__jim";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();
		
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();
		
			// jim stores date and time in one field
			$totaldate=$thepms->date;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);

			$toread=$thepms->readstate;
		
			$totrash=0;
			if (!$thepms->inbox)
				$totrash=1;

			$totrashoutbox=0;
			if (!$thepms->outbox)
				$totrashoutbox=1;

			$totrashdate="NULL";
			if ($totrash)
				$totrashdate=uddetime($config->timezone);
			$totrashdateoutbox="NULL";
			if ($totrashoutbox)
				$totrashdateoutbox=uddetime($config->timezone);

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}

	// **************************************************************************************************
	} elseif ($mypmstype==12) {
		// import myPMS Enhanced 1.x

		$sql="SELECT id, whofrom, username AS whoto, date, time, message, subject, readstate, inbox, sent_items FROM #__pms";
		$database->setQuery($sql);
		$allpms=$database->loadObjectList();
		foreach($allpms as $thepms) {
			// convert the usernames saved in the PMS messages to user IDs
			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whofrom."'";
			$database->setQuery($sql);
			$fromid=$database->loadResult();

			$sql="SELECT id FROM #__users WHERE `username`='".$thepms->whoto."'";
			$database->setQuery($sql);
			$toid=$database->loadResult();

			// merge the PMS fields date and time into one single unix timestamp
			$totaldate=$thepms->date." ".$thepms->time;
			$unixdate=strtotime($totaldate);
		
			if ($thepms->subject)
				$pmessage="[b]".$thepms->subject."[/b]\n\n".$thepms->message;
			else
				$pmessage=$thepms->message;
			$pmessage=str_replace("<br />", "", $pmessage);
			$pmessage=str_replace("<br/>", "", $pmessage);
			$pmessage=str_replace("<br>", "", $pmessage);	
			$pmessage=stripslashes($pmessage);
			$pmessage=addslashes($pmessage);	
			$pmessage=strip_tags($pmessage);
	
			$toread=$thepms->readstate;

			$totrash=0;
			$totrashoutbox=0;
			if ($thepms->inbox<0)
				$totrash=1;
			if ($thepms->sent_items<0)
				$totrashoutbox=1;

			$totrashdate="NULL";
			if ($totrash) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdate=uddetime($config->timezone)-$trashoffset;
				$totrashdate=uddetime($config->timezone);
			}
			$totrashdateoutbox="NULL";
			if ($totrashoutbox) {
//				$trashoffset=((float)$config->TrashLifespan)*86400;
//				$totrashdateoutbox=uddetime($config->timezone)-$trashoffset;
				$totrashdateoutbox=uddetime($config->timezone);
			}

			if($fromid && $toid && $pmessage) {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, toread, totrash, totrashdate, totrashoutbox, totrashdateoutbox) VALUES (".(int)$fromid.", ".(int)$toid.", '".$pmessage."', ".$unixdate.", ".(int)$toread.", ".(int)$totrash.", ".$totrashdate.", ".(int)$totrashoutbox.", ".$totrashdateoutbox.")";
				$database->setQuery( $sql );
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}	
			}
		}
	}

	// now set the config_pmsimportdone variable in the config file to true
	$config->pmsimportdone=1;
	uddeIMsaveConfig($pathtoadmin, $config);

	echo "<p>&nbsp;</p><p><span style='color: red;'>";
	echo _UDDEADM_IMPORTDONE;
	echo "</span></p><p>&nbsp;</p>";
	echo "<p><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></p>";
}

function uddeIMshowSettings($option, $task, $usedlanguage, $pathtoadmin, $pathtouser, $uddeimversion, $config) {
	global $oldsetting_longwaitingemail;
	
	$database = uddeIMgetDatabase();
	
	if(!$config->emn_body_nomessage)
		$config->emn_body_nomessage=_UDDEIM_EMN_BODY_NOMESSAGE;
	
	if(!$config->emn_body_withmessage)
		$config->emn_body_withmessage=_UDDEIM_EMN_BODY_WITHMESSAGE;
	
	if(!$config->emn_forgetmenot)
		$config->emn_forgetmenot=_UDDEIM_EMN_FORGETMENOT;
	
	if(!$config->export_format)
		$config->export_format=_UDDEIM_EXPORT_FORMAT;
	
	$oldsetting_allowarchive = $config->allowarchive;
	$oldsetting_longwaitingemail = $config->longwaitingemail;

//	$sql = "SHOW FIELDS FROM #__uddeim_emn;";
//	$database->setQuery($sql);
//	$rows = $database->loadObjectList();
//	foreach ($rows as $row) {
//  	if($row->Field=='status') {
//  		$config->notifydefault = $row->Default;
//  		break;
//  	}
//	}
?>
  <form action="index2.php" method="POST" name="adminForm">
  <input type="hidden" name="oldsetting_allowarchive" value="<?php echo $oldsetting_allowarchive; ?>" />
  <input type="hidden" name="oldsetting_longwaitingemail" value="<?php echo $oldsetting_longwaitingemail; ?>" />
  <input type="hidden" name="config_quotedivider" value="<?php echo $config->quotedivider; ?>" />
  <input type="hidden" name="config_forgetmenotstart" value="<?php echo $config->forgetmenotstart; ?>" />

  <div align="center">
  <table cellpadding="4" cellspacing="0" border="0" width="98%">
  <tr>
    <td class="sectionname" align="left">
      <h4><img align="middle" style="display: inline;" src="<?php echo uddeIMgetPath('live_site')."/administrator/images/inbox.png"; ?>" />&nbsp;<?php echo _UDDEADM_SETTINGS; ?></h4>
    </td>
    <td class="sectionname" align="right">
      <img align="middle" style="display: inline; border:1px solid lightgray;" src="<?php echo uddeIMgetPath('live_site')."/components/com_uddeim/templates/images/uddeim_logo.png"; ?>" />
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="2">
      <?php
		$configdatei = $pathtoadmin."/config.class.php";
		if (!is_writable($configdatei)) {
			echo "<p><b><span style='color: red;'>"._UDDEADM_CONFIGNOTWRITEABLE." $configdatei</span></b></p>";
		} else {
			echo "<p><b><span style='color: green;'>"._UDDEADM_CONFIGWRITEABLE." $configdatei</span></b></p>";
		}
	  ?>
    </td>
  </tr>
  </table>
  </div>


<?php	
	$adminstyle = 'style="border-top:1px solid lightgray"';

	$tabs = new mosTabs( 1 );
	$tabs->startPane( "uddeim" );
	$tabs->startTab(_UDDEADM_MESSAGES,"messages-tab");

//	$list = mosHTML::RadioList( $val, "config_xxx", " class='inputbox' size='2'", $config->xxx);
//	$list = mosHTML::yesnoRadioList("config_xxx", " class='inputbox' size='2'", $config->xxx);

		?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_MAXLENGTH_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_maxlength" size="4" value="<?php echo $config->maxlength; ?>" />
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_MAXLENGTH_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->maxlength, _UDDEADM_TRUNCATE_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sosrt[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sosrt[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sosrt = mosHTML::RadioList( $sosrt, 'config_replytruncate', 'class="inputbox" size="2"', $config->replytruncate );
				        echo $list_sosrt;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->maxlength, _UDDEADM_TRUNCATE_EXP, "gray"); ?>
					</td>
			    </tr>				
				
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->maxlength, _UDDEADM_SHOWTEXTCOUNTER_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sostc[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sostc[] = mosHTML::makeOption( '0', _UDDEADM_NO );
//				        $list_sostc = mosHTML::selectList( $sostc, 'config_showtextcounter', 'class="inputbox" size="2"', 'value', 'text', $config->showtextcounter );
				        $list_sostc = mosHTML::RadioList( $sostc, 'config_showtextcounter', 'class="inputbox" size="2"', $config->showtextcounter );
				        echo $list_sostc;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->maxlength, _UDDEADM_SHOWTEXTCOUNTER_EXP, "gray"); ?>
					</td>
			    </tr>									

			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWBB_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valobb[] = mosHTML::makeOption( '2', _UDDEADM_YES );
						$valobb[] = mosHTML::makeOption( '1', _UDDEADM_FONTFORMATONLY );
				        $valobb[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_valobb = mosHTML::selectList( $valobb, 'config_allowbb', 'class="inputbox" size="1"', 'value', 'text', $config->allowbb );
				        echo $list_valobb;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWBB_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_NAMESTEXT; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valrn[] = mosHTML::makeOption( '1', _UDDEADM_REALNAMES );
				        $valrn[] = mosHTML::makeOption( '0', _UDDEADM_USERNAMES );
				        $list_valrn = mosHTML::selectList( $valrn, 'config_realnames', 'class="inputbox" size="1"', 'value', 'text', $config->realnames );
				        echo $list_valrn;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_NAMESDESC; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_ALLOWSMILE_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $valos[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $valos[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_valos = mosHTML::RadioList( $valos, 'config_allowsmile', 'class="inputbox" size="2"', $config->allowsmile );
				        echo $list_valos;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_ALLOWSMILE_EXP; ?>
					</td>
				</tr>
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowsmile, _UDDEADM_ANIMATED_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valanis[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $valanis[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_valanis = mosHTML::RadioList( $valanis, 'config_animated', 'class="inputbox" size="2"', $config->animated );
				        echo $list_valanis;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowsmile, _UDDEADM_ANIMATED_EXP, "gray"); ?>
					</td>
			    </tr>								
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowsmile || !$config->animated, _UDDEADM_ANIMATEDEX_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valanisex[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $valanisex[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_valanisex = mosHTML::RadioList( $valanisex, 'config_animatedex', 'class="inputbox" size="2"', $config->animatedex );
				        echo $list_valanisex;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowsmile || !$config->animated, _UDDEADM_ANIMATEDEX_EXP, "gray"); ?>
					</td>
			    </tr>

  			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_TRASHORIGINAL_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $tror[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $tror[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_tror = mosHTML::RadioList( $tror, 'config_trashoriginal', 'class="inputbox" size="2"', $config->trashoriginal );
				        echo $list_tror;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_TRASHORIGINAL_EXP; ?>
					</td>
			    </tr>							
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_COPYTOME_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $actm[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $actm[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_actm = mosHTML::RadioList( $actm, 'config_allowcopytome', 'class="inputbox" size="2"', $config->allowcopytome );
				        echo $list_actm;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_COPYTOME_EXP; ?>
					</td>
			    </tr>			
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWFORWARDS_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $soamf[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $soamf[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_soamf = mosHTML::RadioList( $soamf, 'config_allowforwards', 'class="inputbox" size="2"', $config->allowforwards );
				        echo $list_soamf;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWFORWARDS_EXP ?>
					</td>
			    </tr>										

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_ALLOWMULTIPLERECIPIENTS_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $soamr[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $soamr[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_soamr = mosHTML::RadioList( $soamr, 'config_allowmultiplerecipients', 'class="inputbox" size="2"', $config->allowmultiplerecipients );
				        echo $list_soamr;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_ALLOWMULTIPLERECIPIENTS_EXP; ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_MAXRECIPIENTS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_maxrecipients" size="4" value="<?php echo $config->maxrecipients; ?>" />
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_MAXRECIPIENTS_EXP, "gray"); ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_ALLOWMULTIPLEUSER_HEAD, "gray", true); ?>
					<td align="left" valign="top">
				    	<?php
				        $soamu[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $soamu[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_soamu = mosHTML::RadioList( $soamu, 'config_allowmultipleuser', 'class="inputbox" size="2"', $config->allowmultipleuser );
				        echo $list_soamu;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_ALLOWMULTIPLEUSER_EXP, "gray"); ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!uddeIMcheckCB() || !$config->allowmultiplerecipients, _UDDEADM_CBALLOWMULTIPLEUSER_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $socbamu[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $socbamu[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_socbamu = mosHTML::RadioList( $soamu, 'config_connexallowmultipleuser', 'class="inputbox" size="2"', $config->connexallowmultipleuser );
				        echo $list_socbamu;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!uddeIMcheckCB() || !$config->allowmultiplerecipients, _UDDEADM_CBALLOWMULTIPLEUSER_EXP, "gray"); ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_ENABLELISTS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $soel[] = mosHTML::makeOption( '3', _UDDEADM_ENABLELISTS_3 );
				        $soel[] = mosHTML::makeOption( '2', _UDDEADM_ENABLELISTS_2 );
				        $soel[] = mosHTML::makeOption( '1', _UDDEADM_ENABLELISTS_1 );
				        $soel[] = mosHTML::makeOption( '0', _UDDEADM_ENABLELISTS_0 );
				        $list_soel = mosHTML::selectList( $soel, 'config_enablelists', 'class="inputbox" size="1"', 'value', 'text', $config->enablelists );
				        echo $list_soel;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo uddeIMprintCond(!$config->allowmultiplerecipients, _UDDEADM_ENABLELISTS_EXP, "gray"); ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->enablelists || !$config->allowmultiplerecipients, _UDDEADM_MAXONLISTS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_maxonlists" size="4" value="<?php echo $config->maxonlists; ?>" />
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->enablelists || !$config->allowmultiplerecipients, _UDDEADM_MAXONLISTS_EXP, "gray"); ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_USEENCRYPTION; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $valcm[] = mosHTML::makeOption( '3', _UDDEADM_CRYPT3 );
				        $valcm[] = mosHTML::makeOption( '2', _UDDEADM_CRYPT2 );
				        $valcm[] = mosHTML::makeOption( '1', _UDDEADM_CRYPT1 );
				        $valcm[] = mosHTML::makeOption( '0', _UDDEADM_CRYPT0 );
				        $list_valcm = mosHTML::selectList( $valcm, 'config_cryptmode', 'class="inputbox" size="1"', 'value', 'text', $config->cryptmode );
				        echo $list_valcm;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_USEENCRYPTIONDESC; ?>
					</td>
			    </tr>								
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond($config->cryptmode==0, _UDDEADM_OBFUSCATING_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_cryptkey" size="30" value="<?php echo uddeIMquotecode($config->cryptkey); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond($config->cryptmode==0, _UDDEADM_OBFUSCATING_EXP, "gray"); ?>
					</td>
			    </tr>					

			</table>



<?php
	$tabs->endTab(_UDDEADM_MESSAGES,"messages-tab");			
	$tabs->startTab(_UDDEADM_DISPLAY,"display-tab");
		?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWTITLE_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_showtitle" size="30" value="<?php echo uddeIMquotecode($config->showtitle); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWTITLE_EXP; ?>
					</td>
			    </tr>					
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_TEMPLATEDIR_HEAD; ?></strong></td>
					<td align="left" valign="top">
<?php
	$tdirs = array();
	$dir = $pathtouser."/templates";
 	if ($hd = opendir($dir)) {
	    while ($sz = readdir($hd)) { 
			if (!preg_match("/\./",$sz) && !preg_match("/images/",$sz))
				$tdirs[] = $sz;
		}
    	closedir($hd);
	}
    asort($tdirs);	
	foreach($tdirs as $tdir) {
		$lastdiradded=$tdir;
		$remodir[]=mosHTML::makeOption( $tdir, $tdir );
	}
	$list_remodir=mosHTML::selectList( $remodir, 'config_templatedir', 'class="inputbox" size="1"', 'value', 'text', $config->templatedir );	
	echo $list_remodir;
//	if(count($remodir)<2) { echo $lastdiradded; } else { echo $list_remodir; }
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_TEMPLATEDIR_EXP; ?>
					</td>
			    </tr>				
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWMENUICONS_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $shmeic[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $shmeic[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_shmeic = mosHTML::RadioList( $shmeic, 'config_showmenuicons', 'class="inputbox" size="2"', $config->showmenuicons );
				        echo $list_shmeic;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWMENUICONS_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWBOTTOMICONS_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $shmebc[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $shmebc[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_shmebc = mosHTML::RadioList( $shmebc, 'config_bottomlineicons', 'class="inputbox" size="2"', $config->bottomlineicons );
				        echo $list_shmebc;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWBOTTOMICONS_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWACTIONICONS_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $shmeac[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $shmeac[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_shmeac = mosHTML::RadioList( $shmeac, 'config_actionicons', 'class="inputbox" size="2"', $config->actionicons );
				        echo $list_shmeac;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWACTIONICONS_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWFLAGGED_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $shmeaf[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $shmeaf[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_shmeaf = mosHTML::RadioList( $shmeaf, 'config_allowflagged', 'class="inputbox" size="2"', $config->allowflagged );
				        echo $list_shmeaf;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWFLAGGED_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWSETTINGSLINK_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $soseli[] = mosHTML::makeOption( '2', _UDDEADM_SHOWSETTINGS_ATBOTTOM );						
				        $soseli[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $soseli[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_soseli = mosHTML::selectList( $soseli, 'config_showsettingslink', 'class="inputbox" size="1"', 'value', 'text', $config->showsettingslink );
				        echo $list_soseli;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWSETTINGSLINK_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_FIRSTWORDSINBOX_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_firstwordsinbox" size="4" value="<?php echo $config->firstwordsinbox; ?>" />
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_FIRSTWORDSINBOX_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_PERPAGE_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_perpage" size="4" value="<?php echo $config->perpage; ?>" />
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_PERPAGE_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWABOUT_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $shmabout[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $shmabout[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_shmabout = mosHTML::RadioList( $shmabout, 'config_showabout', 'class="inputbox" size="2"', $config->showabout );
				        echo $list_shmabout;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWABOUT_EXP; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_MODESHOWALLUSERS_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $sosau[] = mosHTML::makeOption( '2', _UDDEADM_MODESHOWALLUSERS_2 );
				        $sosau[] = mosHTML::makeOption( '1', _UDDEADM_MODESHOWALLUSERS_1 );
				        $sosau[] = mosHTML::makeOption( '0', _UDDEADM_MODESHOWALLUSERS_0 );
				        $list_sosau = mosHTML::selectList( $sosau, 'config_modeshowallusers', 'class="inputbox" size="1"', 'value', 'text', $config->modeshowallusers );
				        echo $list_sosau;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_MODESHOWALLUSERS_EXP; ?>
					</td>
			    </tr>										
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_HIDEALLUSERS_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sohsau[] = mosHTML::makeOption( '3', _UDDEADM_HIDEALLUSERS_3 );
				        $sohsau[] = mosHTML::makeOption( '2', _UDDEADM_HIDEALLUSERS_2 );
				        $sohsau[] = mosHTML::makeOption( '1', _UDDEADM_HIDEALLUSERS_1 );
				        $sohsau[] = mosHTML::makeOption( '0', _UDDEADM_HIDEALLUSERS_0 );
				        $list_sohsau = mosHTML::selectList( $sohsau, 'config_hideallusers', 'class="inputbox" size="1"', 'value', 'text', $config->hideallusers );
				        echo $list_sohsau;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_HIDEALLUSERS_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_HIDEUSERS_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_hideusers" size="20" value="<?php echo uddeIMquotecode($config->hideusers); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_HIDEUSERS_EXP; ?>
					</td>
			    </tr>					
				
			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_USEAUTOCOMPLETE_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $souac[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $souac[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_souac = mosHTML::RadioList( $souac, 'config_useautocomplete', 'class="inputbox" size="2"', $config->useautocomplete );
				        echo $list_souac;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_USEAUTOCOMPLETE_EXP; ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->useautocomplete, _UDDEADM_SEARCHINSTRING_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sosis[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sosis[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sosis = mosHTML::RadioList( $souac, 'config_searchinstring', 'class="inputbox" size="2"', $config->searchinstring );
				        echo $list_sosis;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->useautocomplete, _UDDEADM_SEARCHINSTRING_EXP, "gray"); ?>
					</td>
			    </tr>										
			</table>



<?php
	$tabs->endTab(_UDDEADM_DISPLAY,"display-tab");			
	$tabs->startTab(_UDDEADM_DELETIONS,"delete-tab");
		?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DELETEREADAFTERNOTE_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $deln1[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $deln1[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_deln1 = mosHTML::RadioList( $deln1, 'config_ReadMessagesLifespanNote', 'class="inputbox" size="2"', $config->ReadMessagesLifespanNote );
				        echo $list_deln1;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DELETEREADAFTERNOTE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DELETEREADAFTER_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_ReadMessagesLifespan" size="4" value="<?php echo $config->ReadMessagesLifespan; ?>" /> <?php echo _UDDEADM_DAYS; ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DELETEREADAFTER_EXP; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_DELETEUNREADAFTERNOTE_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $deln2[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $deln2[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_deln2 = mosHTML::RadioList( $deln2, 'config_UnreadMessagesLifespanNote', 'class="inputbox" size="2"', $config->UnreadMessagesLifespanNote );
				        echo $list_deln2;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_DELETEUNREADAFTERNOTE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DELETEUNREADAFTER_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_UnreadMessagesLifespan" size="4" value="<?php echo $config->UnreadMessagesLifespan; ?>" /> <?php echo _UDDEADM_DAYS; ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DELETEUNREADAFTER_EXP; ?>
					</td>
			    </tr>				

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_DELETESENTAFTERNOTE_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $deln3[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $deln3[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_deln3 = mosHTML::RadioList( $deln3, 'config_SentMessagesLifespanNote', 'class="inputbox" size="2"', $config->SentMessagesLifespanNote );
				        echo $list_deln3;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_DELETESENTAFTERNOTE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DELETESENTAFTER_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_SentMessagesLifespan" size="4" value="<?php echo $config->SentMessagesLifespan; ?>" /> <?php echo _UDDEADM_DAYS; ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DELETESENTAFTER_EXP; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_DELETETRASHAFTERNOTE_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $deln4[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $deln4[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_deln4 = mosHTML::RadioList( $deln4, 'config_TrashLifespanNote', 'class="inputbox" size="2"', $config->TrashLifespanNote );
				        echo $list_deln4;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_DELETETRASHAFTERNOTE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DELETETRASHAFTER_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_TrashLifespan" size="4" value="<?php echo $config->TrashLifespan; ?>" /> <?php echo _UDDEADM_DAYS; ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DELETETRASHAFTER_EXP; ?>
					</td>
			    </tr>		
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_NOTRASHACCESS_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $delnna[] = mosHTML::makeOption( '0', _UDDEADM_NOTRASHACCESS_0 );
				        $delnna[] = mosHTML::makeOption( '1', _UDDEADM_NOTRASHACCESS_1 );
				        $delnna[] = mosHTML::makeOption( '2', _UDDEADM_NOTRASHACCESS_2 );
				        $list_delnna = mosHTML::selectList( $delnna, 'config_trashrestriction', 'class="inputbox" size="1"', 'value', 'text', $config->trashrestriction );
				        echo $list_delnna;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_NOTRASHACCESS_EXP; ?>
					</td>
			    </tr>										
			</table>



<?php
	$tabs->endTab(_UDDEADM_DELETIONS,"delete-tab");			
	$tabs->startTab(_UDDEADM_INTEGRATION,"integration-tab");
		?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">	
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWONLINE_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $cso[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $cso[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_cso = mosHTML::RadioList( $cso, 'config_showonline', 'class="inputbox" size="2"', $config->showonline );
				        echo $list_cso;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWONLINE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_POPUP_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $cb_pop[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $cb_pop[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_cb_pop = mosHTML::RadioList( $cb_pop, 'config_allowpopup', 'class="inputbox" size="2"', $config->allowpopup );
				        echo $list_cb_pop;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_POPUP_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_POPUPDEFAULT_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
						$apd[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $apd[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_apd = mosHTML::RadioList( $apd, 'config_popupdefault', 'class="inputbox" size="2"', $config->popupdefault );
				        echo $list_apd;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_POPUPDEFAULT_EXP; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_SHOWLINK_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        if (uddeIMcheckAG())	$cbl[] = mosHTML::makeOption( '3', _UDDEADM_AGORA );
				        if (uddeIMcheckFB())	$cbl[] = mosHTML::makeOption( '2', _UDDEADM_FIREBOARD );
				        if (uddeIMcheckCB())	$cbl[] = mosHTML::makeOption( '1', _UDDEADM_CB );
				        $cbl[] = mosHTML::makeOption( '0', _UDDEADM_DISABLED );
				        $list_cbl = mosHTML::selectList( $cbl, 'config_showcblink', 'class="inputbox" size="1"', 'value', 'text', $config->showcblink );
				        echo $list_cbl;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_SHOWLINK_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWPIC_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        if (uddeIMcheckAG())	$cbp[] = mosHTML::makeOption( '3', _UDDEADM_AGORA );
				        if (uddeIMcheckFB())	$cbp[] = mosHTML::makeOption( '2', _UDDEADM_FIREBOARD );
				        if (uddeIMcheckCB())	$cbp[] = mosHTML::makeOption( '1', _UDDEADM_CB );
				        $cbp[] = mosHTML::makeOption( '0', _UDDEADM_DISABLED );
				        $list_cbp = mosHTML::selectList( $cbp, 'config_showcbpic', 'class="inputbox" size="1"', 'value', 'text', $config->showcbpic );
				        echo $list_cbp;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWPIC_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond((!uddeIMcheckCB() && !uddeIMcheckFB() && !uddeIMcheckAG()), _UDDEADM_THUMBLISTS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $cb_gpl[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $cb_gpl[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_cb_gpl = mosHTML::RadioList( $cb_gpl, 'config_getpiclink', 'class="inputbox" size="2"', $config->getpiclink );
				        echo $list_cb_gpl;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond((!uddeIMcheckCB() && !uddeIMcheckFB() && !uddeIMcheckAG()), _UDDEADM_THUMBLISTS_EXP, "gray"); ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_CBGALLERY_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $cb_ggpl[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $cb_ggpl[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_cb_ggpl = mosHTML::RadioList( $cb_ggpl, 'config_CBgallery', 'class="inputbox" size="2"', $config->CBgallery );
				        echo $list_cb_ggpl;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_CBGALLERY_EXP, "gray"); ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_SHOWCONNEX_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $socox[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $socox[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_socox = mosHTML::RadioList( $socox, 'config_showconnex', 'class="inputbox" size="2"', $config->showconnex );
				        echo $list_socox;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_SHOWCONNEX_EXP, "gray"); ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_CONLISTBOX, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valclb[] = mosHTML::makeOption( '1', _UDDEADM_LISTBOX );
				        $valclb[] = mosHTML::makeOption( '0', _UDDEADM_TABLE );
				        $list_valclb = mosHTML::selectList( $valclb, 'config_connex_listbox', 'class="inputbox" size="1"', 'value', 'text', $config->connex_listbox );
				        echo $list_valclb;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!uddeIMcheckCB(), _UDDEADM_CONLISTBOXDESC, "gray"); ?>
					</td>
			    </tr>								
			</table>



<?php
	$tabs->endTab(_UDDEADM_INTEGRATION,"integration-tab");			
	$tabs->startTab(_UDDEADM_EMAIL,"email-tab");
		?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWEMAILNOTIFY_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
						$aen[] = mosHTML::makeOption( '2', _UDDEADM_ADMINSONLY );
						$aen[] = mosHTML::makeOption( '1', _UDDEADM_YES );
						$aen[] = mosHTML::makeOption( '0', _UDDEADM_NO );
						$list_aen = mosHTML::selectList( $aen, 'config_allowemailnotify', 'class="inputbox" size="1"', 'value', 'text', $config->allowemailnotify );
						echo $list_aen;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWEMAILNOTIFY_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_NOTIFYDEFAULT_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $and[] = mosHTML::makeOption( '2', _UDDEADM_NOTIFYDEF_2 );
						$and[] = mosHTML::makeOption( '1', _UDDEADM_NOTIFYDEF_1 );
				        $and[] = mosHTML::makeOption( '0', _UDDEADM_NOTIFYDEF_0 );
				        $list_and = mosHTML::selectList( $and, 'config_notifydefault', 'class="inputbox" size="1"', 'value', 'text', $config->notifydefault );
				        echo $list_and;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_NOTIFYDEFAULT_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_EMAILWITHMESSAGE_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $ewm[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $ewm[] = mosHTML::makeOption( '0', _UDDEADM_NO );
//				        $list_ewm = mosHTML::selectList( $ewm, 'config_emailwithmessage', 'class="inputbox" size="2"', 'value', 'text', $config->emailwithmessage );
				        $list_ewm = mosHTML::RadioList( $ewm, 'config_emailwithmessage', 'class="inputbox" size="2"', $config->emailwithmessage );
				        echo $list_ewm;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMAILWITHMESSAGE_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_LONGWAITINGEMAIL_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $lwe[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $lwe[] = mosHTML::makeOption( '0', _UDDEADM_NO );
//				        $list_lwe = mosHTML::selectList( $lwe, 'config_longwaitingemail', 'class="inputbox" size="2"', 'value', 'text', $config->longwaitingemail );
				        $list_lwe = mosHTML::RadioList( $lwe, 'config_longwaitingemail', 'class="inputbox" size="2"', $config->longwaitingemail );
				        echo $list_lwe;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_LONGWAITINGEMAIL_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->longwaitingemail, _UDDEADM_LONGWAITINGDAYS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_longwaitingdays" size="4" value="<?php echo $config->longwaitingdays; ?>" /> <?php echo _UDDEADM_DAYS; ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->longwaitingemail, _UDDEADM_LONGWAITINGDAYS_EXP, "gray"); ?>
					</td>
			    </tr>			
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_EMN_SENDERNAME_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_emn_sendername" size="10" value="<?php echo uddeIMquotestrip($config->emn_sendername); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMN_SENDERNAME_EXP; ?>
					</td>
			    </tr>	
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_EMN_SENDERMAIL_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_emn_sendermail" size="10" value="<?php echo $config->emn_sendermail; ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMN_SENDERMAIL_EXP; ?>
					</td>
			    </tr>			
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_STOPALLEMAIL_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $lsae[] = mosHTML::makeOption( '0', _UDDEADM_YES );
				        $lsae[] = mosHTML::makeOption( '1', _UDDEADM_NO );
//				        $list_lsae = mosHTML::selectList( $lsae, 'config_emailtrafficenabled', 'class="inputbox" size="2"', 'value', 'text', $config->emailtrafficenabled );
				        $list_lsae = mosHTML::RadioList( $lsae, 'config_emailtrafficenabled', 'class="inputbox" size="2"', $config->emailtrafficenabled );
				        echo $list_lsae;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_STOPALLEMAIL_EXP; ?>
					</td>
			    </tr>						
			    <!-- <tr align="center" valign="middle">
					<td align="left" valign="top" colspan=2>
						<textarea type="text" name="config_emn_body_nomessage" cols="50" rows="4"><?php echo $config->emn_body_nomessage; ?></textarea> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMN_BODY_NOMESSAGE_EXP; ?>
					</td>
			    </tr>			
			    <tr align="center" valign="middle">
					<td align="left" valign="top" colspan=2>
						<textarea type="text" name="config_emn_body_withmessage" cols="50" rows="4"><?php echo $config->emn_body_withmessage; ?></textarea> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMN_BODY_WITHMESSAGE_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
					<td align="left" valign="top" colspan=2>
						<textarea type="text" name="config_emn_forgetmenot" cols="50" rows="4"><?php echo stripslashes($config->emn_forgetmenot); ?></textarea> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EMN_FORGETMENOT_EXP; ?>
					</td>
			    </tr> -->																																		
			</table>



<?php
	$tabs->endTab(_UDDEADM_EMAIL,"email-tab");				
	$tabs->startTab(_UDDEADM_BLOCK,"block-tab");	
?>		
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_BLOCKSYSTEM_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $bs[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $bs[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_bs = mosHTML::RadioList( $bs, 'config_blocksystem', 'class="inputbox" size="2"', $config->blocksystem );
				        echo $list_bs;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_BLOCKSYSTEM_EXP; ?>
					</td>
			    </tr>								
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->blocksystem, _UDDEADM_BLOCKALERT_HEAD, "gray", true); ?>
					<td align="left" valign="top">
				    	<?php
				        $ba[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $ba[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_ba = mosHTML::RadioList( $ba, 'config_blockalert', 'class="inputbox" size="2"', $config->blockalert );
				        echo $list_ba;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->blocksystem, _UDDEADM_BLOCKALERT_EXP, "gray"); ?>
					</td>
			    </tr>								
<?php
				$xxx = explode(",", $config->blockgroups);
				if ($xxx==FALSE)
					$xxx = Array();
?>
				<tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_BLOCKGROUPS_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
						<table border="0" cellpadding="0" cellspacing="0"><tr>
							<td><input type="checkbox" name="config_blockgroups[4]" <?php if (in_array(19,$xxx)) echo 'checked="checked"'; ?> value="19" id="cb4" class="inputbox" /><label for="cb4"><?php echo _UDDEADM_BLOCKGROUPS_19; ?></label></td>
							<td><input type="checkbox" name="config_blockgroups[7]" <?php if (in_array(23,$xxx)) echo 'checked="checked"'; ?> value="23" id="cb7" class="inputbox" /><label for="cb7"><?php echo _UDDEADM_BLOCKGROUPS_23; ?></label></td>
<!--							<td>&nbsp;</td> -->
							<td><input type="checkbox" name="config_blockgroups[3]" <?php if (in_array(18,$xxx)) echo 'checked="checked"'; ?> value="18" id="cb2" class="inputbox" /><label for="cb2"><?php echo _UDDEADM_BLOCKGROUPS_18; ?></label></td>
						</tr><tr>
							<td><input type="checkbox" name="config_blockgroups[5]" <?php if (in_array(20,$xxx)) echo 'checked="checked"'; ?> value="20" id="cb5" class="inputbox" /><label for="cb5"><?php echo _UDDEADM_BLOCKGROUPS_20; ?></label></td>
							<td><input type="checkbox" name="config_blockgroups[8]" <?php if (in_array(24,$xxx)) echo 'checked="checked"'; ?> value="24" id="cb8" class="inputbox" /><label for="cb8"><?php echo _UDDEADM_BLOCKGROUPS_24; ?></label></td>
							<td>&nbsp;</td>
						</tr><tr>
							<td><input type="checkbox" name="config_blockgroups[6]" <?php if (in_array(21,$xxx)) echo 'checked="checked"'; ?> value="21" id="cb6" class="inputbox" /><label for="cb6"><?php echo _UDDEADM_BLOCKGROUPS_21; ?></label></td>
							<td><input type="checkbox" name="config_blockgroups[9]" <?php if (in_array(25,$xxx)) echo 'checked="checked"'; ?> value="25" id="cb9" class="inputbox" /><label for="cb9"><?php echo _UDDEADM_BLOCKGROUPS_25; ?></label></td>
							<td>&nbsp;</td>
						</tr></table>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_BLOCKGROUPS_EXP; ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_UNBLOCKCB_HEAD; ?></strong>
					<td align="left" valign="top">
				    	<?php
				        $unba[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $unba[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_unba = mosHTML::RadioList( $unba, 'config_unblockCBconnections', 'class="inputbox" size="2"', $config->unblockCBconnections );
				        echo $list_unba;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_UNBLOCKCB_EXP; ?>
					</td>
			    </tr>								
<?php
				$xxx = explode(",", $config->pubblockgroups);
				if ($xxx==FALSE)
					$xxx = Array();
?>
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBBLOCKGROUPS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<table border="0" cellpadding="0" cellspacing="0"><tr>
							<td><input type="checkbox" name="config_pubblockgroups[4]" <?php if (in_array(19,$xxx)) echo 'checked="checked"'; ?> value="19" id="pcb4" class="inputbox" /><label for="pcb4"><?php echo _UDDEADM_BLOCKGROUPS_19; ?></label></td>
							<td><input type="checkbox" name="config_pubblockgroups[7]" <?php if (in_array(23,$xxx)) echo 'checked="checked"'; ?> value="23" id="pcb7" class="inputbox" /><label for="pcb7"><?php echo _UDDEADM_BLOCKGROUPS_23; ?></label></td>
							<td><input type="checkbox" name="config_pubblockgroups[3]" <?php if (in_array(18,$xxx)) echo 'checked="checked"'; ?> value="18" id="pcb2" class="inputbox" /><label for="pcb2"><?php echo _UDDEADM_BLOCKGROUPS_18; ?></label></td>
						</tr><tr>
							<td><input type="checkbox" name="config_pubblockgroups[5]" <?php if (in_array(20,$xxx)) echo 'checked="checked"'; ?> value="20" id="pcb5" class="inputbox" /><label for="pcb5"><?php echo _UDDEADM_BLOCKGROUPS_20; ?></label></td>
							<td><input type="checkbox" name="config_pubblockgroups[8]" <?php if (in_array(24,$xxx)) echo 'checked="checked"'; ?> value="24" id="pcb8" class="inputbox" /><label for="pcb8"><?php echo _UDDEADM_BLOCKGROUPS_24; ?></label></td>
							<td>&nbsp;</td>
						</tr><tr>
							<td><input type="checkbox" name="config_pubblockgroups[6]" <?php if (in_array(21,$xxx)) echo 'checked="checked"'; ?> value="21" id="pcb6" class="inputbox" /><label for="pcb6"><?php echo _UDDEADM_BLOCKGROUPS_21; ?></label></td>
							<td><input type="checkbox" name="config_pubblockgroups[9]" <?php if (in_array(25,$xxx)) echo 'checked="checked"'; ?> value="25" id="pcb9" class="inputbox" /><label for="pcb9"><?php echo _UDDEADM_BLOCKGROUPS_25; ?></label></td>
							<td>&nbsp;</td>
						</tr></table>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBBLOCKGROUPS_EXP, "gray"); ?>
					</td>
			    </tr>										
			</table>



<?php			
	$tabs->endTab(_UDDEADM_BLOCK,"block-tab");		
	$tabs->startTab(_UDDEADM_ARCHIVE,"archive-tab");	
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWARCHIVE_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $aarc[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $aarc[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_aarc = mosHTML::RadioList( $aarc, 'config_allowarchive', 'class="inputbox" size="2"', $config->allowarchive );
				        echo $list_aarc;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWARCHIVE_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_MAXARCHIVE_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_maxarchive" size="4" value="<?php echo $config->maxarchive; ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_MAXARCHIVE_EXP; ?>
					</td>
			    </tr>	
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_INBOXLIMIT_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $iblt[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $iblt[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_iblt = mosHTML::RadioList( $iblt, 'config_inboxlimit', 'class="inputbox" size="2"', $config->inboxlimit );
				        echo $list_iblt;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_INBOXLIMIT_EXP; ?>
					</td>
			    </tr>					
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SHOWINBOXLIMIT_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $siblt[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $siblt[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_siblt = mosHTML::RadioList( $siblt, 'config_showinboxlimit', 'class="inputbox" size="2"', $config->showinboxlimit );
				        echo $list_siblt;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SHOWINBOXLIMIT_EXP; ?>
					</td>
			    </tr>					
				
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowarchive, _UDDEADM_ENABLEDOWNLOAD_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $endo[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $endo[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_endo = mosHTML::RadioList( $endo, 'config_enabledownload', 'class="inputbox" size="2"', $config->enabledownload );
				        echo $list_endo;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowarchive, _UDDEADM_ENABLEDOWNLOAD_EXP, "gray"); ?>
					</td>
			    </tr>					
			    <!-- <tr align="center" valign="middle">
					<td align="left" valign="top" colspan=2>
						<textarea type="text" name="config_export_format" cols="60" rows="6"><?php echo $config->export_format; ?></textarea> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_EXPORT_FORMAT_EXP; ?>
					</td>
			    </tr> --> 				
			</table>



<?php	
	$tabs->endTab(_UDDEADM_ARCHIVE, "archive-tab");	
	$tabs->startTab(_UDDEADM_DATESETTINGS,"date-tab");			
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_DATEFORMAT_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $df[] = mosHTML::makeOption( 'j M, H:i',    '5 Aug, 22:40' );
				        $df[] = mosHTML::makeOption( 'j. M H:i',    '5. Aug 22:40' );
				        $df[] = mosHTML::makeOption( 'j. M, H:i',   '5. Aug, 22:40' );
				        $df[] = mosHTML::makeOption( 'j M y, H:i',  '5 Aug 07, 22:40' );
				        $df[] = mosHTML::makeOption( 'j. M y H:i',  '5. Aug 07 22:40' );
				        $df[] = mosHTML::makeOption( 'j. M y, H:i', '5. Aug 07, 22:40' );
				        $df[] = mosHTML::makeOption( 'M j, H:i',    'Aug 5, 22:40' );
				        $df[] = mosHTML::makeOption( 'M j, h:i a',  'Aug 5, 10:40 pm' );						
				        $df[] = mosHTML::makeOption( 'Y-m-d H:i',   '2007-08-05 22:40' );						
				        $df[] = mosHTML::makeOption( 'm/d/y h:i a', '08/05/07 10:40 pm' );												
				        $list_df = mosHTML::selectList( $df, 'config_datumsformat', 'class="inputbox" size="1"', 'value', 'text', $config->datumsformat );
				        echo $list_df;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_DATEFORMAT_EXP; ?>
					</td>
			    </tr>				
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_LDATEFORMAT_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $ldf[] = mosHTML::makeOption( 'j M, H:i',        '5 Aug, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. M H:i',        '5. Aug 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. M, H:i',       '5. Aug, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j F, H:i',        '5 August, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. F H:i',        '5. August 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. F, H:i',       '5. August, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j F Y, H:i',      '5 August 2007, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. F Y H:i',      '5. August 2007 22:40' );
				        $ldf[] = mosHTML::makeOption( 'j. F Y, H:i',     '5. August 2007, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'M j, H:i',        'Aug 5, 22:40' );
				        $ldf[] = mosHTML::makeOption( 'M j, h:i a',      'Aug 5, 10:40 pm' );						
				        $ldf[] = mosHTML::makeOption( 'F j, Y - H:i',    'August 5, 2007 - 22:40' );
				        $ldf[] = mosHTML::makeOption( 'F j, Y - h:i a',  'August 5, 2007 - 10:40 pm' );						
				        $ldf[] = mosHTML::makeOption( 'Y-m-d H:i',       '2007-08-05 22:40' );						
				        $ldf[] = mosHTML::makeOption( 'm/d/y h:i a',     '08/05/07 10:40 pm' );		
						$ldf[] = mosHTML::makeOption( 'D, j M - H:i',    'Tue, 5 Aug - 22:40' );
						$ldf[] = mosHTML::makeOption( 'D, j. M - H:i',   'Tue, 5. Aug - 22:40' );
						$ldf[] = mosHTML::makeOption( 'D, M j - H:i',    'Tue, Aug 5 - 22:40' );										
						$ldf[] = mosHTML::makeOption( 'D, M j - h:i a',  'Tue, Aug 5 - 10:40 pm' );
						$ldf[] = mosHTML::makeOption( 'l, j. F - H:i',   'Tuesday, 5. August - 22:40' );	
						$ldf[] = mosHTML::makeOption( 'l, j. F - h:i a', 'Tuesday, 5. August - 10:40 pm' );	
						$ldf[] = mosHTML::makeOption( 'l, j. F Y - H:i', 'Tuesday, 5. August 2007 - 22:40' );							
						$ldf[] = mosHTML::makeOption( 'l, F j - H:i',    'Tuesday, August 5 - 22:40' );
						$ldf[] = mosHTML::makeOption( 'l, F j - h:i a',  'Tuesday, August 5 - 10:40 pm' );
						$ldf[] = mosHTML::makeOption( 'l, F j, Y - H:i', 'Tuesday, August 5, 2005 - 22:40' );
						$ldf[] = mosHTML::makeOption( 'l, \d\e\n j F Y, H:i', 'Tuesday, den 5 August 2007, 22:40');
						$ldf[] = mosHTML::makeOption( 'l, \d\e\n j. F Y, H:i', 'Tuesday, den 5. August 2007, 22:40');
				        $list_ldf = mosHTML::selectList( $ldf, 'config_ldatumsformat', 'class="inputbox" size="1"', 'value', 'text', $config->ldatumsformat );
				        echo $list_ldf;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_LDATEFORMAT_EXP; ?>
					</td>
			    </tr>						
			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_TIMEZONE_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
						<input type="text" name="config_timezone" size="4" value="<?php echo $config->timezone; ?>" /> <?php echo _UDDEADM_HOURS; ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_TIMEZONE_EXP; ?>
					</td>
			    </tr>		
			</table>														





<?php
	$tabs->endTab(_UDDEADM_DATESETTINGS, "date-tab");
	$tabs->startTab(_UDDEADM_PUBLIC,"public-tab");	
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_PUBFRONTEND_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sopub[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sopub[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sopub = mosHTML::RadioList( $sopub, 'config_pubfrontend', 'class="inputbox" size="2"', $config->pubfrontend );
				        echo $list_sopub;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_PUBFRONTEND_EXP ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBFRONTENDDEF_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sopud[] = mosHTML::makeOption( '1', _UDDEADM_PUBDEF1 );
				        $sopud[] = mosHTML::makeOption( '0', _UDDEADM_PUBDEF0 );
				        $list_sopud = mosHTML::selectList( $sopud, 'config_pubfrontenddefault', 'class="inputbox" size="1"', 'value', 'text', $config->pubfrontenddefault );
				        echo $list_sopud;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBFRONTENDDEF_EXP, "gray"); ?>
					</td>
			    </tr>								
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBMODESHOWALLUSERS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sopsau[] = mosHTML::makeOption( '2', _UDDEADM_MODESHOWALLUSERS_2 );
				        $sopsau[] = mosHTML::makeOption( '1', _UDDEADM_MODESHOWALLUSERS_1 );
				        $sopsau[] = mosHTML::makeOption( '0', _UDDEADM_MODESHOWALLUSERS_0 );
				        $list_sopsau = mosHTML::selectList( $sopsau, 'config_pubmodeshowallusers', 'class="inputbox" size="1"', 'value', 'text', $config->pubmodeshowallusers );
				        echo $list_sopsau;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBMODESHOWALLUSERS_EXP, "gray"); ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_PUBNAMESTEXT; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valprn[] = mosHTML::makeOption( '1', _UDDEADM_REALNAMES );
				        $valprn[] = mosHTML::makeOption( '0', _UDDEADM_USERNAMES );
				        $list_valprn = mosHTML::selectList( $valprn, 'config_pubrealnames', 'class="inputbox" size="1"', 'value', 'text', $config->pubrealnames );
				        echo $list_valprn;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_PUBNAMESDESC; ?>
					</td>
			    </tr>
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBHIDEALLUSERS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sohpsau[] = mosHTML::makeOption( '3', _UDDEADM_HIDEALLUSERS_3 );
				        $sohpsau[] = mosHTML::makeOption( '2', _UDDEADM_HIDEALLUSERS_2 );
				        $sohpsau[] = mosHTML::makeOption( '1', _UDDEADM_HIDEALLUSERS_1 );
				        $sohpsau[] = mosHTML::makeOption( '0', _UDDEADM_HIDEALLUSERS_0 );
				        $list_sohpsau = mosHTML::selectList( $sohpsau, 'config_pubhideallusers', 'class="inputbox" size="1"', 'value', 'text', $config->pubhideallusers );
				        echo $list_sohpsau;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBHIDEALLUSERS_EXP, "gray"); ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_PUBHIDEUSERS_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_pubhideusers" size="20" value="<?php echo uddeIMquotecode($config->pubhideusers); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_PUBHIDEUSERS_EXP; ?>
					</td>
			    </tr>					
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBREPLYS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sohprau[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sohprau[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sohprau = mosHTML::selectList( $sohprau, 'config_pubreplies', 'class="inputbox" size="1"', 'value', 'text', $config->pubreplies );
				        echo $list_sohprau;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubfrontend, _UDDEADM_PUBREPLYS_EXP, "gray"); ?>
					</td>
			    </tr>										

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_USEAUTOCOMPLETE_HEAD; ?></strong></td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $sopuac[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sopuac[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sopuac = mosHTML::RadioList( $sopuac, 'config_pubuseautocomplete', 'class="inputbox" size="2"', $config->pubuseautocomplete );
				        echo $list_sopuac;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_USEAUTOCOMPLETE_EXP; ?>
					</td>
			    </tr>										
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->pubuseautocomplete, _UDDEADM_SEARCHINSTRING_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sopsis[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sopsis[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sopsis = mosHTML::RadioList( $sopuac, 'config_pubsearchinstring', 'class="inputbox" size="2"', $config->pubsearchinstring );
				        echo $list_sopsis;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->pubuseautocomplete, _UDDEADM_SEARCHINSTRING_EXP, "gray"); ?>
					</td>
			    </tr>										
			</table>




<?php	
	$tabs->endTab(_UDDEADM_PUBLIC, "public-tab");
	$tabs->startTab(_UDDEADM_SYSTEM,"system-tab");	
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ADMINIGNITIONONLY_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $aio[] = mosHTML::makeOption( '1', _UDDEADM_ADMINIGNITIONONLY_YES );
				        $aio[] = mosHTML::makeOption( '0', _UDDEADM_ADMINIGNITIONONLY_NO );
						$aio[] = mosHTML::makeOption( '2', _UDDEADM_ADMINIGNITIONONLY_MANUALLY );
				        $list_aio = mosHTML::selectList( $aio, 'config_adminignitiononly', 'class="inputbox" size="1"', 'value', 'text', $config->adminignitiononly );
				        echo $list_aio;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ADMINIGNITIONONLY_EXP."<br />";
						echo "<a href=index2.php?option=com_uddeim&task=maintenanceprune>"._UDDEADM_MAINTENANCE_PRUNE."</a>";
						?>
					</td>
			    </tr>	
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_ALLOWTOALL_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
				        $ata[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $ata[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_ata = mosHTML::RadioList( $ata, 'config_allowsysgm', 'class="inputbox" size="2"', $config->allowsysgm );
				        echo $list_ata;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_ALLOWTOALL_EXP; ?>
					</td>
			    </tr>	
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->allowsysgm, _UDDEADM_SHOWGROUPS_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $sibsg[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sibsg[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sibsg = mosHTML::RadioList( $sibsg, 'config_showgroups', 'class="inputbox" size="2"', $config->showgroups );
				        echo $list_sibsg;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->allowsysgm, _UDDEADM_SHOWGROUPS_EXP, "gray"); ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_MAILSYSTEM_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $valms[] = mosHTML::makeOption( '1', _UDDEADM_MAILSYSTEM_MOSMAIL );
				        $valms[] = mosHTML::makeOption( '0', _UDDEADM_MAILSYSTEM_PHPMAIL );
				        $list_valms = mosHTML::selectList( $valms, 'config_mailsystem', 'class="inputbox" size="1"', 'value', 'text', $config->mailsystem );
				        echo $list_valms;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_MAILSYSTEM_EXP; ?>
					</td>
			    </tr>								
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_SYSM_USERNAME_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_sysm_username" size="30" value="<?php echo uddeIMquotestrip($config->sysm_username); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_SYSM_USERNAME_EXP; ?>
					</td>
			    </tr>	

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_USECAPTCHA_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $socap[] = mosHTML::makeOption( '4', _UDDEADM_CAPTCHAF4 );
				        $socap[] = mosHTML::makeOption( '3', _UDDEADM_CAPTCHAF3 );
				        $socap[] = mosHTML::makeOption( '2', _UDDEADM_CAPTCHAF2 );
				        $socap[] = mosHTML::makeOption( '1', _UDDEADM_CAPTCHAF1 );
				        $socap[] = mosHTML::makeOption( '0', _UDDEADM_CAPTCHAF0 );
				        $list_socap = mosHTML::selectList( $socap, 'config_usecaptcha', 'class="inputbox" size="1"', 'value', 'text', $config->usecaptcha );
				        echo $list_socap;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_USECAPTCHA_EXP; ?>
					</td>
			    </tr>								
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->usecaptcha, _UDDEADM_CAPTCHALEN_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_captchalen" size="5" value="<?php echo uddeIMquotecode($config->captchalen); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->usecaptcha, _UDDEADM_CAPTCHALEN_EXP, "gray"); ?>
					</td>
			    </tr>								
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_CSRFPROTECTION_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $socsp[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $socsp[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_socsp = mosHTML::selectList( $socsp, 'config_csrfprotection', 'class="inputbox" size="1"', 'value', 'text', $config->csrfprotection );
				        echo $list_socsp;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_CSRFPROTECTION_EXP; ?>
					</td>
			    </tr>								

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_TIMEDELAY_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
						<input type="text" name="config_timedelay" size="4" value="<?php echo $config->timedelay; ?>" /> <?php echo _UDDEADM_SECONDS; ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_TIMEDELAY_EXP; ?>
					</td>
			    </tr>		

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_CHARSET_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
						<input type="text" name="config_charset" size="12" value="<?php echo $config->charset; ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_CHARSET_EXP; ?>
					</td>
			    </tr>		
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_MAILCHARSET_HEAD; ?></strong></td>
					<td align="left" valign="top">
						<input type="text" name="config_mailcharset" size="12" value="<?php echo $config->mailcharset; ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_MAILCHARSET_EXP; ?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_LANGUAGECHARSET_HEAD; ?></strong>
					</td>
					<td align="left" valign="top">
				    	<?php
				        $vallcs[] = mosHTML::makeOption( '1', _UDDEADM_LANGUAGECHARSET_UTF8 );
				        $vallcs[] = mosHTML::makeOption( '0', _UDDEADM_LANGUAGECHARSET_DEFAULT );
				        $list_vallcs = mosHTML::selectList( $vallcs, 'config_languagecharset', 'class="inputbox" size="1"', 'value', 'text', $config->languagecharset );
				        echo $list_vallcs;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_LANGUAGECHARSET_EXP; ?>
					</td>
			    </tr>								

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_MOOTOOLS_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $moold[] = mosHTML::makeOption( '3', _UDDEADM_MOOTOOLS_2 );
				        $moold[] = mosHTML::makeOption( '2', _UDDEADM_MOOTOOLS_1 );
				        $moold[] = mosHTML::makeOption( '1', _UDDEADM_MOOTOOLS_AUTO );
				        $moold[] = mosHTML::makeOption( '0', _UDDEADM_MOOTOOLS_NONE );
				        $list_moold = mosHTML::selectList( $moold, 'config_mootools', 'class="inputbox" size="1"', 'value', 'text', $config->mootools );
				        echo $list_moold;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_MOOTOOLS_EXP; ?>
					</td>
			    </tr>

			    <tr align="center" valign="middle">
				    <td align="left" valign="top"<?php echo $adminstyle; ?>>
						<strong><?php echo _UDDEADM_OVERWRITEITEMID_HEAD; ?></strong>
					</td>
					<td align="left" valign="top"<?php echo $adminstyle; ?>>
				    	<?php
				        $sibov[] = mosHTML::makeOption( '1', _UDDEADM_YES );
				        $sibov[] = mosHTML::makeOption( '0', _UDDEADM_NO );
				        $list_sibov = mosHTML::RadioList( $sibov, 'config_overwriteitemid', 'class="inputbox" size="2"', $config->overwriteitemid );
				        echo $list_sibov;
					    ?>
					</td>
				    <td align="left" valign="top" width="50%"<?php echo $adminstyle; ?>>
						<?php echo _UDDEADM_OVERWRITEITEMID_EXP." "; 
						  	  $sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' LIMIT 1";
							  $database->setQuery($sql);
							  $found = (int)$database->loadResult();
							  echo _UDDEADM_OVERWRITEITEMID_CURRENT.$found; 
						?>
					</td>
			    </tr>
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<?php echo uddeIMprintCond(!$config->overwriteitemid, _UDDEADM_USEITEMID_HEAD, "gray", true); ?>
					</td>
					<td align="left" valign="top">
						<input type="text" name="config_useitemid" size="5" value="<?php echo uddeIMquotecode($config->useitemid); ?>" /> 
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo uddeIMprintCond(!$config->overwriteitemid, _UDDEADM_USEITEMID_EXP, "gray"); ?>
					</td>
			    </tr>

			</table>



<?php	
		$tabs->endTab(_UDDEADM_SYSTEM, "system-tab");	

if ($config->pmsimportdone<=1)		{ // PMS found or already imported (=2 means suppress this tab, set when no PMS is found)
	$tabs->startTab(_UDDEADM_IMPORT,"import-tab");
	
//	$pmsfound = 0;
//	if (!$config->pmsimportdone)
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<h2><?php echo _UDDEADM_IMPORT_HEADER;?></h2>
					</td>
				</tr>
			    <tr align="center" valign="middle">				
				    <td align="left" valign="top">
<?php
						$pmsfounds = uddeIMcheckPMStype();

						echo "<p>"._UDDEADM_PMSFOUND."</p>";
						echo "<p>";
						foreach ($pmsfounds as $pmsfound) {
							$importlink = "<a href=index2.php?option=com_uddeim&task=importpms&act=".(int)$pmsfound.">"._UDDEADM_IMPORT_CAPS."</a>";
							echo $importlink.": ".uddeIMnamePMS($pmsfound)." (";
							switch($pmsfound) {
								case  1: $sql = "SELECT count(id) FROM #__pms"; break;
								case  2: $sql = "SELECT count(id) FROM #__pms"; break;
								case  3: $sql = "SELECT count(id) FROM #__jim"; break;
								case  4: $sql = "SELECT count(id) FROM #__abim_data"; break;
								case  5: $sql = "SELECT count(id) FROM #__jam"; break;
								case  6: $sql = "SELECT count(id) FROM #__mypms"; break;
								case  7: $sql = "SELECT count(m.id) FROM #__missus AS m JOIN #__missus_receipt AS r WHERE m.id = r.id AND m.is_draft=0"; break;
								case  8: $sql = "SELECT count(id) FROM #__primezilla_inbox;"; break;
								case  9: $sql = "SELECT count(id) FROM #__pms"; break;
								case 10: $sql = "SELECT count(id) FROM #__mypms"; break;
								case 11: $sql = "SELECT count(id) FROM #__jim"; break;
								case 12: $sql = "SELECT count(id) FROM #__pms"; break;
							}
							$database->setQuery($sql);
							$allpms=$database->loadResult();
							echo $allpms." "._UDDEADM_MESSAGES.")<br />";
						}
						echo "</p>";
						echo "<p>&nbsp;</p>";

						if (!empty($pmsfounds)) {
							$oldpmsimportdone = $config->pmsimportdone;
							switch($config->pmsimportdone) {
								case 2:		// this should not happen here since tab is not visible when pmsimportdone=2
								case 1:		echo "<p>"._UDDEADM_ALREADYIMPORTED."</p>";
											break;
							}
						} else {
							switch($config->pmsimportdone) {
								case 1:		echo "<p>"._UDDEADM_PMSNOTFOUND."</p>";
											$config->pmsimportdone=2;
											break;
								case 2:		echo "<p>"._UDDEADM_PMSNOTFOUND."</p>";
											break;	// this should not happen here since tab is not visible when pmsimportdone=2
								default:	echo "<p>"._UDDEADM_PMSNOTFOUND."</p>";
											$config->pmsimportdone=2;			// ok, we can suppress the import tab next time
											break;
							}
						}
						if ($oldpmsimportdone!=$config->pmsimportdone) {
							uddeIMsaveConfig($pathtoadmin, $config);
						}
?>
					</td>
				</tr>
			</table>

<?php	
	$tabs->endTab(_UDDEADM_IMPORT, "import-tab");	
}


	$tabs->startTab(_UDDEADM_MAINTENANCE,"maintenance-tab");			
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_MAINTENANCE_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
  							echo "<a href=index2.php?option=com_uddeim&task=maintenance&act=check>"._UDDEADM_MAINTENANCE_CHECK."</a>&nbsp;";
  							echo "<a href=index2.php?option=com_uddeim&task=maintenance&act=trash>"._UDDEADM_MAINTENANCE_TRASH."</a>&nbsp;";
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_MAINTENANCE_EXP; ?>
					</td>
			    </tr>						
<?php
					$query = "SELECT value FROM #__uddeim_config WHERE varname='_backupdate'";
					$database->setQuery($query);
					$backupdate = $database->loadResult();
?>
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_BACKUPRESTORE_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
							echo "<a href=index2.php?option=com_uddeim&task=backuprestore&act=backup>"._UDDEADM_BACKUPRESTORE_BACKUP."</a>&nbsp;";
							if ($backupdate)
								echo "<a href=index2.php?option=com_uddeim&task=backuprestore&act=restore>"._UDDEADM_BACKUPRESTORE_RESTORE."</a>&nbsp;";
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_BACKUPRESTORE_EXP;
							if ($backupdate) echo "<br />"._UDDEADM_BACKUPRESTORE_DATE.$backupdate; ?>
					</td>
			    </tr>						
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_VERSIONCHECK_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
  							echo "<a href=index2.php?option=com_uddeim&task=versioncheck>"._UDDEADM_VERSIONCHECK_CHECK."</a>";
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_VERSIONCHECK_EXP; ?>
					</td>
			    </tr>						
				<tr align="center" valign="middle">
				    <td align="left" valign="top">
						<strong><?php echo _UDDEADM_STATISTICS_HEAD; ?></strong></td>
					<td align="left" valign="top">
				    	<?php
  							echo "<a href=index2.php?option=com_uddeim&task=showstatistics>"._UDDEADM_STATISTICS_CHECK."</a>";
					    ?>
					</td>
				    <td align="left" valign="top" width="50%">
						<?php echo _UDDEADM_STATISTICS_EXP; ?>
					</td>
			    </tr>						
			</table>														
<?php
	$tabs->endTab(_UDDEADM_MAINTENANCE, "maintenance-tab");

	

	$tabs->startTab(_UDDEADM_ABOUT,"about-tab");
?>
			<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
			    <tr align="center" valign="middle">
				    <td align="left" valign="top">
						<h2>uddeIM</h2>
						<?php echo "<p><span style='color: red;'>".$uddeimversion."</span></p>\n"; ?>

						<p><b>uddeIM (Instant Messsages)</b><br />
						PMS component for Joomla 1.0, Joomla 1.5 and Mambo 4.5<br />
						&copy; 2007-2008 Stephan Slabihoud, &copy; 2005-2006 by Benjamin Zweifel</p>

						<p>Language file: <?php echo $usedlanguage; ?></p>
						
						<p><b>Thanks in advance...</b><br />
						You can use and distribute uddeIM freely, but if you really find it useful, a small donation would be 
						very appreciated. uddeIM is the result of hard work, spending hours developing and testing this component.
						If you feel that you would like to give a donation for your use of uddeIM, or just because you want to 
						support uddeIM for future updates, please make a small donation using the Paypal buttons below.</p>
						
						<p>This version is based on uddeIM 0.5b which has been written by Benjamin Zweifel in 2006.</p>

						<p>uddeIM comes with absolutely no warranty.<br />
						For details, see the license at <a href="http://www.gnu.org/licenses/gpl.txt">www.gnu.org/licenses/gpl.txt</a>.</p>

						<input type="hidden" name="config_version" value="<?php echo $config->version; ?>" />
						<input type="hidden" name="config_pmsimportdone" value="<?php echo $config->pmsimportdone; ?>" /> 
					</td>
				</tr>
			</table>



<?php	
	$tabs->endTab(_UDDEADM_ABOUT, "about-tab");
	$tabs->endPane();
?>
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="task" value="<?php echo $task;?>" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="hidemainmenu" value="0" />
</form>
	<br clear=all>

<p><?php echo _UDDEADM_DONATE; ?><br />

<table border="0" cellpadding="2" cellspacing="2"><tr><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" />
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="paypal@slabihoud.de" />
<input type="hidden" name="item_name" value="Unterstuetzung uddeIM Entwicklung" />
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="currency_code" value="EUR" />
<input type="hidden" name="tax" value="0" />
<input type="hidden" name="lc" value="DE" />
<input type="hidden" name="bn" value="PP-DonationsBF" />
<input type="image" src="<?php echo uddeIMgetPath('live_site')."/components/com_uddeim/templates/images/donate_d.gif"; ?>" border="0" name="submit" alt="PayPal Spenden" />
</form>
</td><td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" />
<input type="hidden" name="cmd" value="_xclick" />
<input type="hidden" name="business" value="paypal@slabihoud.de" />
<input type="hidden" name="item_name" value="Donation uddeIM development" />
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="tax" value="0" />
<input type="hidden" name="lc" value="US" />
<input type="hidden" name="bn" value="PP-DonationsBF" />
<input type="image" src="<?php echo uddeIMgetPath('live_site')."/components/com_uddeim/templates/images/donate_en.gif"; ?>" border="0" name="submit" alt="PayPal Donations" />
</form>
</td></tr></table>
</p>

<?php	
}

function uddeIMarchivetoTrash($option, $task, $act, $config) {
	$database = uddeIMgetDatabase();

	if($act=="inbox") {
		$rightnow=uddetime($config->timezone);
		$sql="UPDATE #__uddeim SET archived=0 WHERE archived=1";
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to unarchive messages" . $database->stderr(true));
		}	
		$mosmsg = _UDDEADM_ARCHIVETOTRASH_INBOX_DONE;
		$redirecturl="index2.php?option=com_uddeim";
		uddeIMmosRedirect($redirecturl, $mosmsg);
	} else {
?>

	  <table cellpadding="4" cellspacing="0" border="0" width="100%">
	  	<tr>
    		<td width="100%" class="sectionname">
			      <h4><img align=middle style="display: inline;" src="images/inbox.png" />&nbsp;<?php echo _UDDEADM_SETTINGS; ?></h4>
		    </td>
		</tr>
	  </table>

	  <table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
		    <tr align="center" valign="middle">
			    <td align="left" valign="top">
						<?php
						echo "<p><b>"._UDDEADM_ARCHIVETOTRASH_INTRO."</b></p>";
						echo "<p>";
						echo "<a href='index2.php?option=com_uddeim&task=archivetotrash&act=inbox'>"._UDDEADM_ARCHIVETOTRASH_INBOX_LINK."</a><br />"._UDDEADM_ARCHIVETOTRASH_INBOX_EXP;
						echo "</p>";
						echo "<p>";
						echo "<a href='index2.php?option=com_uddeim'>"._UDDEADM_ARCHIVETOTRASH_LEAVE_LINK."</a><br />"._UDDEADM_ARCHIVETOTRASH_LEAVE_EXP;
						echo "</p>";
						?>
				</td>
			</tr>
	  </table>
<?php			
	}
}

function uddeIMmaintenanceCheckTrash($option, $task, $act, $config) {
	$database = uddeIMgetDatabase();
	if ($act=="check") {
		echo(_UDDEADM_MAINTENANCE_MC1);
		echo("<br />");
		echo(_UDDEADM_MAINTENANCE_MC2);
		echo(_UDDEADM_MAINTENANCE_MC3);
		echo(_UDDEADM_MAINTENANCE_MC4);
		echo(_UDDEADM_MAINTENANCE_MC5);
		echo(_UDDEADM_MAINTENANCE_MC6);
		echo("<br />");
	}
	if ($act=="trash") {
		echo(_UDDEADM_MAINTENANCE_MT1);
		echo("<br />");
	}

	$query = "SELECT min(id) FROM #__users WHERE id>0";
	$database->setQuery($query);
	$mmin = (int)$database->loadResult();
	$query = "SELECT min(fromid) FROM #__uddeim WHERE fromid>0";	// don't select public users
	$database->setQuery($query);
	$mmin1 = (int)$database->loadResult();
	$query = "SELECT min(toid) FROM #__uddeim WHERE toid>0";		// don't select public users
	$database->setQuery($query);
	$mmin2 = (int)$database->loadResult();

	$query = "SELECT max(id) FROM #__users WHERE id>0";
	$database->setQuery($query);
	$mmax = (int)$database->loadResult();
	$query = "SELECT max(fromid) FROM #__uddeim WHERE fromid>0";
	$database->setQuery($query);
	$mmax1 = (int)$database->loadResult();
	$query = "SELECT max(toid) FROM #__uddeim WHERE toid>0";
	$database->setQuery($query);
	$mmax2 = (int)$database->loadResult();

	$mmin = min($mmin,$mmin1,$mmin2);
	$mmax = max($mmax,$mmax1,$mmax2);

	$jobtodo=0;
	for ($i=$mmin;$i<=$mmax;$i++) {
//    $query = "SELECT * FROM #__users WHERE id=".$i;
//    $result = mysql_query($query, $link) or die(mysql_error());
//    $id = mysql_fetch_assoc($result);
//    $value = $id["username"];
//    mysql_free_result($result);
//    echo("$i - $value vorhanden<br />");

		$query = "SELECT count(id) FROM #__users WHERE id=".(int)$i;
		$database->setQuery($query);
		$value = (int)$database->loadResult();

		if ($value==0) {
			// the user does not exist, so count if there are still messages from or to him in the database
			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE fromid='.(int)$i;
			$database->setQuery($query);
			$mvon = (int)$database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE toid='.(int)$i;
			$database->setQuery($query);
			$man = (int)$database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim_emn WHERE userid='.(int)$i;
			$database->setQuery($query);
			$memn = (int)$database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim_blocks WHERE blocker='.(int)$i;
			$database->setQuery($query);
			$mbl1 = (int)$database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim_blocks WHERE blocked='.(int)$i;
			$database->setQuery($query);
			$mbl2 = (int)$database->loadResult();

			if ($mvon>0 || $man>0 || $mbl1>0 || $memn>0 || $mbl2>0)
				echo("<b>#$i "._UDDEADM_MAINTENANCE_NOTFOUND." $mvon/$man/$memn/$mbl1/$mbl2</b><br />");

			if ($act!="trash" && ($mvon>0 || $man>0 || $memn>0 || $mbl1>0 || $mbl2>0)) {
				$jobtodo=1;
			}
			if ($act=="trash" && ($mvon>0 || $man>0 || $memn>0 || $mbl1>0 || $mbl2>0)) {
				echo(_UDDEADM_MAINTENANCE_MT2." #$i<br />");
				$query = "DELETE FROM #__uddeim_emn WHERE userid=".$i;
				$database->setQuery($query);
				if (!$database->query()) { die("SQL error" . $database->stderr(true)); }	

				echo(_UDDEADM_MAINTENANCE_MT3." #$i<br />");
				$query = "DELETE FROM #__uddeim_blocks WHERE blocker=".(int)$i." OR blocked=".(int)$i;
				$database->setQuery($query);
				if (!$database->query()) { die("SQL error" . $database->stderr(true)); }	

				$trashoffset=((float)$config->TrashLifespan)*86400;
				$deletetime=uddetime($config->timezone)-$trashoffset-1;	// "-1" to ensure that pruning will delete the message

// when this is removed, deleted users are shown as "User deleted" in the outbox
				echo(_UDDEADM_MAINTENANCE_MT4." #$i<br />");		// Recdipient does not longer exist, so delete from all outboxes and from non-existing users inbox
				// This following statement is ok, when also messages from purged users are listed in the Outbox, unfortunately they are not, so these messages are also purged.
				//              $query = "UPDATE #__uddeim SET totrash=1, totrashdate=".$deletetime." WHERE toid=".(int)$i;
				$query = "UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".$deletetime.", totrash=1, totrashdate=".$deletetime." WHERE toid=".(int)$i;
				$database->setQuery($query);
				if (!$database->query()) { die("SQL error" . $database->stderr(true)); }	

// when this is removed, deleted users are shown as "User deleted" in the inbox
				echo(_UDDEADM_MAINTENANCE_MT5." #$i<br />");
				// This following statement is ok, when also messages from purged users are listed in the Inbox, unfortunately they are not, so these messages are also purged.
				//              $query = "UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".$deletetime." WHERE fromid=".(int)$i;
				$query = "UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".$deletetime.", totrash=1, totrashdate=".$deletetime." WHERE fromid=".(int)$i;
				$database->setQuery($query);
				if (!$database->query()) { die("SQL error" . $database->stderr(true)); }	
			}
		} else {		// user exists, so display some stats only
			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrashoutbox=0 AND fromid='.(int)$i;
			$database->setQuery($query);
			$mvonoutbox = $database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrashoutbox=1 AND fromid='.(int)$i;
			$database->setQuery($query);
			$mvonoutboxtrashed = $database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrash=0 AND toid='.(int)$i;
			$database->setQuery($query);
			$maninbox = $database->loadResult();

			$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrash=1 AND toid='.(int)$i;
			$database->setQuery($query);
			$maninboxtrashed = $database->loadResult();

			$query = "SELECT username FROM #__users WHERE id=".(int)$i;
			$database->setQuery($query);
			$username = $database->loadResult();

			if ($act=="check") {
				echo("#$i ($username): [$maninbox|$maninboxtrashed|$mvonoutbox|$mvonoutboxtrashed]<br />");
			}
		}
	}
	// step 2: search other problems
	$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrash=0 AND totrashdate IS NOT NULL';
	$database->setQuery($query);
	$datein = $database->loadResult();

	$query = 'SELECT COUNT(id) FROM #__uddeim WHERE totrashoutbox=0 AND totrashdateoutbox IS NOT NULL';
	$database->setQuery($query);
	$dateout = $database->loadResult();

	if ($act=="check") {
		echo("<br />");
		echo(_UDDEADM_MAINTENANCE_D1."$datein/$dateout<br />");
		if ($datein>0 || $dateout>0)
			$jobtodo=1;
	}
	if ($act=="trash" && ($datein>0 || $dateout>0)) {
		$query = 'UPDATE #__uddeim SET totrashdate=NULL WHERE totrash=0 AND totrashdate IS NOT NULL';
		$database->setQuery($query);
		$ret=$database->query();
		$query = 'UPDATE #__uddeim SET totrashdateoutbox=NULL WHERE totrashoutbox=0 AND totrashdateoutbox IS NOT NULL';
		$database->setQuery($query);
		$ret=$database->query();
		echo("<br />");
		echo(_UDDEADM_MAINTENANCE_D2."<br />");
	}
	
	if ($act=="trash") {
		// now prune all messages
		uddeIMdoPrune($config);
	}

	if ($act=="check") {
		echo ("<br />");
		if ($jobtodo==1) {
			echo (_UDDEADM_MAINTENANCE_JOBTODO);
		} else {
			echo (_UDDEADM_MAINTENANCE_NOTHINGTODO);
		}
	}
	echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
}

function uddeIMmaintenancePrune($option, $task, $config) {
	uddeIMdoPrune($config);
	echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
}

function uddeIMconvertConfiguration($option, $task, $pathtoadmin, $expectedversion, $config) {
	$database = uddeIMgetDatabase();
	echo "<p><span style='color: red;'>"._UDDEADM_CFGFILE_NOTFOUND."<br /><br />"._UDDEADM_CFGFILE_FOUND." ".$config->version."<br />"._UDDEADM_CFGFILE_EXPECTED." ".$expectedversion."</span></p>\n"; 
	echo "<p>"._UDDEADM_CFGFILE_CONVERTING."</p>";

	echo "<p>";
	if ($config->version=="0.9") {
		echo _UDDEADM_CFGFILE_CONVERTING_1."<br />";
		$config->mootools = 1;
	}
	echo "</p>";

	// do the converting here
	if (uddeIMsaveConfig($pathtoadmin, $config))
		echo "<p>"._UDDEADM_CFGFILE_DONE."</p>";
	echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
}

function uddeIMbackupRestoreConfig($option, $task, $act, $pathtoadmin, $config) {
	$database = uddeIMgetDatabase();
	if ($act=="backup") {
		$backup = array();
		$backup['_backupdate']					= uddeDate(uddetime($config->timezone), $config);
		$backup['version'] 						= $config->version;
		$backup['cryptkey'] 					= $config->cryptkey;
		$backup['datumsformat'] 				= $config->datumsformat;
		$backup['ldatumsformat'] 				= $config->ldatumsformat;
		$backup['emn_sendermail'] 				= $config->emn_sendermail;
		$backup['emn_sendername'] 				= $config->emn_sendername;
		$backup['sysm_username'] 				= $config->sysm_username;
		$backup['charset'] 						= $config->charset;
		$backup['mailcharset'] 					= $config->mailcharset;
		$backup['emn_body_nomessage'] 			= $config->emn_body_nomessage;
		$backup['emn_body_withmessage'] 		= $config->emn_body_withmessage;
		$backup['emn_forgetmenot'] 				= $config->emn_forgetmenot;
		$backup['export_format'] 				= $config->export_format;
		$backup['showtitle'] 					= $config->showtitle;
		$backup['templatedir'] 					= $config->templatedir;
		$backup['quotedivider'] 				= $config->quotedivider;
		$backup['blockgroups'] 					= $config->blockgroups;
		$backup['pubblockgroups'] 				= $config->pubblockgroups;
		$backup['hideusers'] 					= $config->hideusers;

		$backup['ReadMessagesLifespan']			= $config->ReadMessagesLifespan;
		$backup['UnreadMessagesLifespan']		= $config->UnreadMessagesLifespan;
		$backup['SentMessagesLifespan'] 		= $config->SentMessagesLifespan;
		$backup['TrashLifespan'] 				= $config->TrashLifespan;
		$backup['ReadMessagesLifespanNote'] 	= $config->ReadMessagesLifespanNote;
		$backup['UnreadMessagesLifespanNote'] 	= $config->UnreadMessagesLifespanNote;
		$backup['SentMessagesLifespanNote'] 	= $config->SentMessagesLifespanNote;
		$backup['TrashLifespanNote'] 			= $config->TrashLifespanNote;
		$backup['adminignitiononly'] 			= $config->adminignitiononly;
		$backup['pmsimportdone'] 				= $config->pmsimportdone;
		$backup['blockalert'] 					= $config->blockalert;
		$backup['blocksystem'] 					= $config->blocksystem;
		$backup['allowemailnotify'] 			= $config->allowemailnotify;
		$backup['notifydefault'] 				= $config->notifydefault;
		$backup['popupdefault'] 				= $config->popupdefault;
		$backup['allowsysgm'] 					= $config->allowsysgm;
		$backup['emailwithmessage'] 			= $config->emailwithmessage;
		$backup['firstwordsinbox'] 				= $config->firstwordsinbox;
		$backup['longwaitingdays'] 				= $config->longwaitingdays;
		$backup['longwaitingemail'] 			= $config->longwaitingemail;
		$backup['maxlength'] 					= $config->maxlength;
		$backup['showcblink'] 					= $config->showcblink;
		$backup['showcbpic'] 					= $config->showcbpic;
		$backup['showonline'] 					= $config->showonline;
		$backup['allowarchive']					= $config->allowarchive;
		$backup['maxarchive'] 					= $config->maxarchive;
		$backup['allowcopytome'] 				= $config->allowcopytome;
		$backup['trashoriginal'] 				= $config->trashoriginal;
		$backup['perpage'] 						= $config->perpage;
		$backup['enabledownload'] 				= $config->enabledownload;
		$backup['inboxlimit'] 					= $config->inboxlimit;
		$backup['showinboxlimit'] 				= $config->showinboxlimit;
		$backup['allowpopup'] 					= $config->allowpopup;
		$backup['allowbb'] 						= $config->allowbb;
		$backup['allowsmile'] 					= $config->allowsmile;
		$backup['animated'] 					= $config->animated;
		$backup['animatedex'] 					= $config->animatedex;
		$backup['showmenuicons'] 				= $config->showmenuicons;
		$backup['bottomlineicons'] 				= $config->bottomlineicons;
		$backup['actionicons'] 					= $config->actionicons;
		$backup['showconnex'] 					= $config->showconnex;
		$backup['showsettingslink'] 			= $config->showsettingslink;
		$backup['showabout'] 					= $config->showabout;
		$backup['emailtrafficenabled'] 			= $config->emailtrafficenabled;
		$backup['getpiclink'] 					= $config->getpiclink;
		$backup['connex_listbox'] 				= $config->connex_listbox;
		$backup['forgetmenotstart'] 			= $config->forgetmenotstart;
		$backup['realnames'] 					= $config->realnames;
		$backup['cryptmode'] 					= $config->cryptmode;
		$backup['modeshowallusers'] 			= $config->modeshowallusers;
		$backup['useautocomplete'] 				= $config->useautocomplete;
		$backup['allowmultipleuser'] 			= $config->allowmultipleuser;
		$backup['connexallowmultipleuser'] 		= $config->connexallowmultipleuser;
		$backup['allowmultiplerecipients'] 		= $config->allowmultiplerecipients;
		$backup['showtextcounter'] 				= $config->showtextcounter;
		$backup['allowforwards'] 				= $config->allowforwards;
		$backup['showgroups'] 					= $config->showgroups;
		$backup['mailsystem'] 					= $config->mailsystem;
		$backup['searchinstring'] 				= $config->searchinstring;
		$backup['maxrecipients'] 				= $config->maxrecipients;
		$backup['languagecharset'] 				= $config->languagecharset;
		$backup['usecaptcha'] 					= $config->usecaptcha;
		$backup['captchalen'] 					= $config->captchalen;
		$backup['pubfrontend'] 					= $config->pubfrontend;
		$backup['pubfrontenddefault'] 			= $config->pubfrontenddefault;
		$backup['pubmodeshowallusers'] 			= $config->pubmodeshowallusers;
		$backup['hideallusers'] 				= $config->hideallusers;
		$backup['pubhideallusers'] 				= $config->pubhideallusers;
		$backup['unblockCBconnections'] 		= $config->unblockCBconnections;
		$backup['CBgallery'] 					= $config->CBgallery;
		$backup['enablelists'] 					= $config->enablelists;
		$backup['maxonlists'] 					= $config->maxonlists;
		$backup['timedelay'] 					= $config->timedelay;
		$backup['pubrealnames'] 				= $config->pubrealnames;
		$backup['pubreplies'] 					= $config->pubreplies;
		$backup['csrfprotection'] 				= $config->csrfprotection;
		$backup['trashrestriction'] 			= $config->trashrestriction;
		$backup['replytruncate'] 				= $config->replytruncate;
		$backup['allowflagged'] 				= $config->allowflagged;
		$backup['overwriteitemid'] 				= $config->overwriteitemid;
		$backup['useitemid'] 					= $config->useitemid;
		$backup['timezone'] 					= $config->timezone;
		$backup['pubuseautocomplete'] 			= $config->pubuseautocomplete;
		$backup['pubsearchinstring'] 			= $config->pubsearchinstring;
		$backup['mootools'] 					= $config->mootools;

		$query = 'TRUNCATE TABLE #__uddeim_config';
		$database->setQuery($query);
		if (!$database->query())
			echo("SQL error: ".$database->stderr(true));
		foreach ($backup as $key => $value) {
			$query = 'INSERT INTO #__uddeim_config ( varname, value ) VALUES ( '.$database->Quote($key).', '.$database->Quote($value).' )';
			$database->setQuery($query);
			if (!$database->query())
				echo("SQL error: ".$database->stderr(true));
		}
		echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
	}
	elseif ($act=="restore") {
		$query = "SELECT varname, value FROM #__uddeim_config";
        $database->setQuery($query);
        $results = $database->loadObjectList();
		if (!$database->query())
			echo("SQL error: ".$database->stderr(true));
        foreach ($results as $result) {
			if (substr($result->varname,0,1)!='_')
				$config->{$result->varname} = $result->value;
		}
		uddeIMsaveConfig($pathtoadmin, $config);
		echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
	}
}

function uddeIMversioncheck($option, $task, $checkversion) {
    $current_version = explode('.', $checkversion);
    $current_major = (int) $current_version[0];
    $current_minor = (int) $current_version[1];

	echo "<div style='text-align:left'>";
	echo "<p><b>"._UDDEADM_VERSIONCHECK."</b></p>";

	$handle = @fopen("http://www.slabihoud.de/checkuddeim.php?ver=".$current_major.".".$current_minor, "rb");
	if ($handle) {
		while (!feof($handle))
			$version_info .= @fread($handle, 4096);
		@fclose($handle);
        $version_info = explode("\n", $version_info);
        $latest_major = (int) $version_info[0];
        $latest_minor = (int) $version_info[1];
        $latest_info  = trim($version_info[2]);
        if ($latest_major==$current_major && $latest_minor==$current_minor) {
			echo "<p style='color:green'>"._UDDEADM_VERSIONCHECK_USING." ".$checkversion.".</p>";
			echo "<p style='color:green'>"._UDDEADM_VERSIONCHECK_LATEST."</p>";
		} else {
			echo "<p style='color:red'>"._UDDEADM_VERSIONCHECK_USING." ".$checkversion.".</p>";
			echo "<p style='color:red'>"._UDDEADM_VERSIONCHECK_CURRENT." ".$latest_major.".".$latest_minor.".</p>";
			echo "<p>"._UDDEADM_VERSIONCHECK_INFO."<br />".$latest_info."</p>";
		}
	} else {
   		echo "<b><span style='color: red;'>"._UDDEADM_VERSIONCHECK_ERROR." $configdatei</span></b>";
    }
	echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
	echo "</div>";
}

function uddeIMshowstatistics($option, $task) {
	$database = uddeIMgetDatabase();
	echo "<div style='text-align:left'>";
	echo "<p><b>"._UDDEADM_STATISTICS."</b></p>";

	echo "<table border='0'>";
	$query="SELECT count(id) FROM #__uddeim";
	$database->setQuery($query);
	$result=(int)$database->loadResult();
	echo "<tr><td>"._UDDEADM_MAINTENANCE_COUNT."</td><td>".$result."</td></tr>";

	$query="SELECT count(id) FROM #__uddeim WHERE totrash=1";
	$database->setQuery($query);
	$result=(int)$database->loadResult();
	echo "<tr><td>"._UDDEADM_MAINTENANCE_COUNT_RECIPIENT."</td><td>".$result."</td></tr>";

	$query="SELECT count(id) FROM #__uddeim WHERE totrashoutbox=1";
	$database->setQuery($query);
	$result=(int)$database->loadResult();
	echo "<tr><td>"._UDDEADM_MAINTENANCE_COUNT_SENDER."</td><td>".$result."</td></tr>";
	
	$query="SELECT count(id) FROM #__uddeim WHERE totrash=1 AND totrashoutbox=1";
	$database->setQuery($query);
	$result=(int)$database->loadResult();
	echo "<tr><td>"._UDDEADM_MAINTENANCE_COUNT_TRASH."</td><td>".$result."</td></tr>";

	echo "</table>";
	echo "<p><b><a href=index2.php?option=com_uddeim>"._UDDEADM_CONTINUE."</a></b></p>";
	echo "</div>";
}

function uddeIMintval($n) {
    return int_val($n);
}
