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

if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
} else {
	global $mainframe;
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
}

require_once(uddeIMgetPath('absolute_path')."/administrator/components/com_uddeim/config.class.php");
require_once(uddeIMgetPath('absolute_path')."/administrator/components/com_uddeim/admin.shared.php");
require_once(uddeIMgetPath('absolute_path')."/administrator/components/com_uddeim/admin.includes.php");

function com_install() {
	$mosConfig_offset = uddeIMgetOffset();
	$mosConfig_locale = uddeIMgetLocale();
	$mosConfig_sitename = uddeIMgetSitename();
	$mosConfig_lang = uddeIMgetLang();
	$database = uddeIMgetDatabase();
	$version = uddeIMgetVersion();
	$pathtoadmin = uddeIMgetPath('admin');
	$pathtouser  = uddeIMgetPath('user');
	$config = new uddeimconfigclass();

	// set initial values
	$config->cryptkey = 'uddeIMcryptkey';
	$config->version = '1.0';
	$config->datumsformat = 'j M, H:i';
	$config->ldatumsformat = 'j F Y, H:i';
	$config->emn_sendermail = 'webmaster';
	$config->emn_sendername = 'Messaging';
	$config->sysm_username = 'System';
	$config->charset = 'ISO8859-1';
	$config->mailcharset = 'ISO-8859-1';
	$config->emn_body_nomessage = '';
	$config->emn_body_withmessage = '';
	$config->emn_forgetmenot = '';
	$config->export_format = '';
	$config->showtitle = '';
	$config->templatedir = 'default';
	$config->quotedivider= '__________';
	$config->blockgroups = '';
	$config->pubblockgroups = '';
	$config->hideusers = '62';
	$config->pubhideusers = '62';

	$config->ReadMessagesLifespan = 36524;
	$config->UnreadMessagesLifespan = 36524;
	$config->SentMessagesLifespan = 36524;
	$config->TrashLifespan = 2;
	$config->ReadMessagesLifespanNote = 0;
	$config->UnreadMessagesLifespanNote = 0;
	$config->SentMessagesLifespanNote = 0;
	$config->TrashLifespanNote = 1;
	$config->adminignitiononly = 1;
	$config->pmsimportdone = 0;
	$config->blockalert = 0;
	$config->blocksystem = 0;
	$config->allowemailnotify = 0;
	$config->notifydefault = 0;
	$config->popupdefault = 0;
	$config->allowsysgm = 0;
	$config->emailwithmessage = 0;
	$config->firstwordsinbox = 40;
	$config->longwaitingdays = 75;
	$config->longwaitingemail = 0;
	$config->maxlength = 2500;
	$config->showcblink = 1;
	$config->showcbpic = 1;
	$config->showonline = 1;
	$config->allowarchive = 0;
	$config->maxarchive = 100;
	$config->allowcopytome = 1;
	$config->trashoriginal = 1;
	$config->perpage = 8;
	$config->enabledownload = 0;
	$config->inboxlimit = 0;
	$config->showinboxlimit = 0;
	$config->allowpopup = 0;
	$config->allowbb = 1;
	$config->allowsmile = 1;
	$config->animated = 0;
	$config->animatedex = 0;
	$config->showmenuicons = 1;
	$config->bottomlineicons = 1;
	$config->actionicons = 1;
	$config->showconnex = 0;
	$config->showsettingslink = 2;
	$config->connex_listbox = 1;
	$config->forgetmenotstart = 0;
	$config->showabout = 0;
	$config->emailtrafficenabled = 0;
	$config->getpiclink = 0;
	$config->realnames = 0;
	$config->cryptmode = 0;
	$config->modeshowallusers = 1;
	$config->useautocomplete = 0;
	$config->allowmultipleuser = 1;
	$config->connexallowmultipleuser = 1;
	$config->allowmultiplerecipients = 1;
	$config->showtextcounter = 1;
	$config->allowforwards = 1;
	$config->showgroups = 0;
	$config->mailsystem = 0;
	$config->searchinstring = 1;
	$config->maxrecipients = 0;
	$config->languagecharset = 0;
	$config->usecaptcha = 0;
	$config->captchalen = 4;
	$config->pubfrontend = 0;
	$config->pubfrontenddefault = 0;
	$config->pubmodeshowallusers = 1;
	$config->hideallusers = 0;
	$config->pubhideallusers = 0;
	$config->unblockCBconnections = 1;
	$config->CBgallery = 0;
	$config->enablelists = 0;
	$config->maxonlists = 100;
	$config->timedelay = 0;
	$config->pubrealnames = 0;
	$config->pubreplies = 0;
	$config->csrfprotection = 0;
	$config->trashrestriction = 0;
	$config->replytruncate = 0;
	$config->allowflagged = 0;
	$config->overwriteitemid = 0;
	$config->useitemid = 0;
	$config->timezone = 0;
	$config->pubsearchinstring = 1;
	$config->pubuseautocomplete = 0;
	$config->mootools = 1;
	// temporary variables
	$config->flags = 0;

	if ($version->PRODUCT == "Joomla!" || $version->PRODUCT == "Accessible Joomla!")
		if (strncasecmp($version->RELEASE, "1.0", 3))
			$config->languagecharset = 1;					// use UTF-8 on Joomla 1.5

	// try to determine the best settings for uddeIM on this installation 
	// is uddeIM already installed and are messages in the archive?
	$sql="SELECT count(id) FROM #__uddeim WHERE archived=1";
	$database->setQuery($sql);
	$archivedmessages=$database->loadResult();
	$config->allowarchive = 0;
	$config->enabledownload = 0;
	if ($archivedmessages) {
		$config->allowarchive = 1;
		$config->enabledownload = 1;	
	}

	switch ($mosConfig_lang) {
		case "germani":
		case "germanf":
		case "german":
			$config->datumsformat = 'j M, H:i';
			$config->ldatumsformat = 'j. F Y, H:i';
			break;
		default:
			$config->datumsformat = 'j M, H:i';
			$config->ldatumsformat = 'j F Y, H:i';
			break;
	}

	// is CB installed?
	$config->showcblink = 0;
	$config->showcbpic = 0;
	$config->showconnex = 0;
	$config->realnames = 0;
	if (file_exists(uddeIMgetPath('absolute_path')."/components/com_comprofiler/comprofiler.php")) {
		$config->showcblink = 1;
		$config->showcbpic = 1;
		$config->showconnex = 1;
		// now look for the CB config file
		// if realnames are used in CB, use realnames in uddeIM as well
		if (file_exists(uddeIMgetPath('absolute_path')."/administrator/components/com_comprofiler/ue_config.php")) {
			include_once(uddeIMgetPath('absolute_path')."/administrator/components/com_comprofiler/ue_config.php");
			if ($ueConfig['name_format']=='1') {
				$config->realnames=1;
				$config->pubrealnames=1;
			}
		}
	}

	$postfix = "";
	if ($config->languagecharset)
		$postfix = ".utf8";
	// is the correct lang file installed?
	if (file_exists($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php')) {
		include_once($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php');
		$langinfo="";
	} elseif (file_exists($pathtoadmin.'/language'.$postfix.'/english.php')) {
		include_once($pathtoadmin.'/language'.$postfix.'/english.php');
		$langinfo="<p>There is no <b>".ucfirst($mosConfig_lang)." (UTF-8)</b> language file installed. uddeIM will use English (UTF-8).</p>";
	} elseif (file_exists($pathtoadmin.'/language/english.php')) {
		include_once($pathtoadmin.'/language/english.php');
		$langinfo="<p>There is no <b>".ucfirst($mosConfig_lang)."</b> language file installed. uddeIM will use English.</p>";
		$config->languagecharset=0;
	}

	switch ($mosConfig_locale) {
		case "bg_BG":
		case "ru_RU":	
			$config->charset = 'Windows-1251';
			$config->mailcharset = 'Windows-1251';
			break;
		case "sr_YU":
			$config->charset = 'UTF-8';
			$config->mailcharset = 'UTF-8';
			break;
		default:
			$config->charset = 'ISO8859-1';
			$config->mailcharset = 'ISO-8859-1';
			break;
	}
	if ($config->languagecharset)
		$config->mailcharset = 'UTF-8';

//	if($langfile_exists && !$langfile_ver) {
//		$langinfo="<p style='background-color: #ffaaaa;'>Your <b>".ucfirst($mosConfig_lang)."</b> language file is not compatible with current version of uddeIM. You should open <i>english.php</i>, look for any strings that are not present in your language file, copy them to <i>".$mosConfig_lang.".php</i> and translate them. Alternatively, you can delete <i>".$mosConfig_lang.".php</i> from <i>administrator/components/com_uddeim/language</i>. This will make uddeIM use English.</p>";
//	}

	// Now save these settings
	uddeIMsaveConfig($pathtoadmin, $config);

	// Now write a welcome message to the Admin
	$userid = uddeIMgetUserID();
	if ($userid) {
		if ($config->languagecharset) {			// UTF-8 fix, not tested so far
			$sql = "SET NAMES utf8;";
			$database->setQuery($sql);
			$isok = $database->query();
		}

		$rightnow=time()+($mosConfig_offset*3600); 
		$welcome_time=$rightnow;
		$welcome_user = "uddeIM";
		$welcome_msg = _UDDEADM_WELCOMEMSG;
		$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox) VALUES (".$userid.", ".$userid.", 0, '".$welcome_msg."', ".$welcome_time.", 1, '".$welcome_user."', 0, 1, ".$welcome_time.")";
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to save a message" . $database->stderr(true));
		}	
	}

//	if (file_exists(uddeIMgetPath('absolute_path').'/includes/joomla.php')) {
//		$cms_name="Joomla"; 
//	} else {
//		$cms_name="Mambo";
//	}

	echo "<div style='width: 600px; text-align: left;'>";
	echo "<p><b>"._UDDEADM_UDDEINSTCOMPLETE."</b></p>";
	echo $langinfo;
	echo "<p>"._UDDEADM_REVIEWSETTINGS."</p>";
	echo "<ul>";
	echo "<li>"._UDDEADM_REVIEWLANG."</li>";
	echo "<li>"._UDDEADM_REVIEWEMAILSTOP."</li>";
	echo "<li>"._UDDEADM_REVIEWUPDATE."</li>";
	echo "</ul>";

	// redirect to settings
	echo "<p><a href='index2.php?option=com_uddeim'>".ucfirst(_UDDEADM_CONTINUE)."</a></p>";
	echo "</div>";
}
