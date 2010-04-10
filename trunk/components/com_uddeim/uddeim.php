<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2008 Stephan Slabihoud, � 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

$uddeim_isadmin = 0;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
} else {
	global $mainframe;
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
}

$pathtoadmin = uddeIMgetPath('admin');
$pathtouser  = uddeIMgetPath('user');
$pathtosite  = uddeIMgetPath('live_site');

require_once($pathtoadmin."/admin.shared.php");
require_once($pathtouser.'/bbparser.php');
require_once($pathtouser.'/includes.php');
require_once($pathtouser.'/includes.db.php');
require_once($pathtouser.'/crypt.class.php');
require_once($pathtouser.'/getpiclink.php');
// require_once(uddeIMgetPath('absolute_path').'/includes/pageNavigation.php');
if (file_exists(uddeIMgetPath('absolute_path').'/includes/mambo.php'))
	require_once(uddeIMgetPath('absolute_path').'/includes/mambo.php');

$userid = uddeIMgetUserID();

require($pathtoadmin."/config.class.php");			// get the configuration file
$config = new uddeimconfigclass();
uddeIMcheckConfig($config);
uddeIMloadLanguage($pathtoadmin, $config);

// prepare temporary variables
$config->flags = 0;
$nouserlist = (int) uddeIMmosGetParam ( $_REQUEST, 'nouserlist', 0);		// suppress userlist (used for menu links only)
if ($nouserlist) $config->flags |= ($nouserlist & 0x07);			// 0x01 = suppress user list, 0x02 = suppress connection list, 0x03 = supress both (+0x04=disable TO field)

// check if publlic frontend is called
if ($config->pubfrontend && !$userid) {
	$plugin = $pathtouser.'/public.php';
	if (file_exists($plugin))
		include_once($plugin);
	uddeIMpublicFrontend($versionstring, $pathtouser, $config);
	return;
}

// No access if not logged in, and bye
if (!$userid) {
	$mosmsg=_UDDEIM_NOTLOGGEDIN;
	echo($mosmsg);
	return;
}

// if no Itemid is passed on, try to find one somewhere
// $option = uddeIMmosGetParam( $_REQUEST, 'option', 'com_uddeim' );
$Itemid 	= uddeIMmosGetParam( $_REQUEST, 'Itemid');
if (!$Itemid || !isset($Itemid) || empty( $Itemid )) {
	$Itemid = uddeIMgetItemid($config);
} else if ($config->overwriteitemid) {
	$Itemid = (int)$config->useitemid;
}

$item_id	= (int) $Itemid;
$task		= uddeIMmosGetParam( $_REQUEST, 'task', 'inbox');

$messageid	= (int) uddeIMmosGetParam ( $_REQUEST, 'messageid');
$recip		= (int) uddeIMmosGetParam ( $_REQUEST, 'recip');				// blocking ID and new message
$runame		= uddeIMmosGetParam ( $_REQUEST, 'runame');					//  blocking NAME and new message
$ret		= uddeIMmosGetParam ( $_REQUEST, 'ret');

$to_id		= (int) uddeIMmosGetParam ($_POST, 'to_id');
$to_name	= uddeIMmosGetParam ($_POST, 'to_name');
$pmessage	= strip_tags(uddeIMmosGetParam($_POST, 'pmessage', '', _MOS_ALLOWHTML));
$cryptpass  = uddeIMmosGetParam ($_POST, 'cryptpass');

$sendeform_showallusers = uddeIMmosGetParam ($_POST, 'sendeform_showallusers', '');
$tobedeleted	= uddeIMmosGetParam ($_POST, 'tobedeleted');
$copytome		= uddeIMmosGetParam ($_POST, 'copytome');
$addccinfo		= uddeIMmosGetParam ($_POST, 'addccinfo');
$emailradio		= uddeIMmosGetParam ($_POST, 'emailradio', 0);
$emailreplycheck= uddeIMmosGetParam ($_POST, 'emailreplycheck');		// "on"
$popupcheck		= uddeIMmosGetParam ($_POST, 'popupcheck');			// "on"
$publiccheck	= uddeIMmosGetParam ($_POST, 'publiccheck');			// "on"
$arcmes		    = uddeIMmosGetParam ($_POST, 'arcmes');
$backto			= uddeIMmosGetParam ($_POST, 'backto');

$limitstart		= (int) uddeIMmosGetParam ($_REQUEST, 'limitstart', 0);
$limit			= (int) uddeIMmosGetParam ($_REQUEST, 'limit');
if(!$limit) { $limit=$config->perpage; }
if(!$limit) { $limit=10; }

$sysgm_sys	    = uddeIMmosGetParam ($_POST, 'sysgm_sys');
$sysgm_universe	= uddeIMmosGetParam ($_POST, 'sysgm_universe');
$sysgm_validfor	= uddeIMmosGetParam ($_POST, 'sysgm_validfor');
$sysgm_really	= uddeIMmosGetParam ($_POST, 'sysgm_really');

// load template css file
if(!$config->templatedir) {
	$config->templatedir="default";
}

// change image config values to image links
$uddeicons_flagged    = "<img alt='"._UDDEIM_STATUS_FLAGGED  ."' title='"._UDDEIM_STATUS_FLAGGED  ."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/staron.gif' />";
$uddeicons_unflagged  = "<img alt='"._UDDEIM_STATUS_UNFLAGGED."' title='"._UDDEIM_STATUS_UNFLAGGED."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/staroff.gif' />";
$uddeicons_onlinepic  = "<img alt='"._UDDEIM_STATUS_ONLINE   ."' title='"._UDDEIM_STATUS_ONLINE   ."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/icon_online.gif' />";
$uddeicons_offlinepic = "<img alt='"._UDDEIM_STATUS_OFFLINE  ."' title='"._UDDEIM_STATUS_OFFLINE  ."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/icon_offline.gif' />";
$uddeicons_readpic    = "<img alt='"._UDDEIM_STATUS_READ     ."' title='"._UDDEIM_STATUS_READ     ."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/nonew_im.gif' border='0' />";
$uddeicons_unreadpic  = "<img alt='"._UDDEIM_STATUS_UNREAD   ."' title='"._UDDEIM_STATUS_UNREAD   ."' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/new_im.gif' border='0' />";
$GLOBALS['uddeicons_flagged']    = $uddeicons_flagged;
$GLOBALS['uddeicons_unflagged']  = $uddeicons_unflagged;
$GLOBALS['uddeicons_onlinepic']  = $uddeicons_onlinepic;
$GLOBALS['uddeicons_offlinepic'] = $uddeicons_offlinepic;
$GLOBALS['uddeicons_readpic']    = $uddeicons_readpic;
$GLOBALS['uddeicons_unreadpic']  = $uddeicons_unreadpic;

// browser switch
$used_browser = uddeIMmosGetParam($_SERVER, 'HTTP_USER_AGENT', null);
$css_appendix="";
$css_alternative="";
if (stristr($used_browser, "Opera")) {
	$css_appendix="-opera";
} elseif (stristr($used_browser, "MSIE 4")) {
	$css_appendix="-ie4";
	$css_alternative="-ie";
} elseif (stristr($used_browser, "MSIE 6") || stristr($used_browser, "MSIE/6")) {
	$css_appendix="-ie6";
	$css_alternative="-ie";
} elseif (stristr($used_browser, "MSIE 7") || stristr($used_browser, "MSIE/7")) {
	$css_appendix="-ie7";
	$css_alternative="-ie";
} elseif (((stristr($used_browser, "MSIE 5") || stristr($used_browser, "MSIE/5"))) && stristr($used_browser, "Win")) {
	$css_appendix="-ie5win";
	$css_alternative="-ie";
} elseif (stristr($used_browser, "MSIE 5") && stristr($used_browser, "Mac")) {
	$css_appendix="-ie5mac";
	$css_alternative="-ie";
} elseif (stristr($used_browser, "Safari/100")) {
	$css_appendix="-safari100";
	$css_alternative="-safari";
} elseif (stristr($used_browser, "Safari/85")) {
	$css_appendix="-safari85";
	$css_alternative="-safari";
} elseif (stristr($used_browser, "Safari")) {
	$css_appendix="-safari";
} elseif (stristr($used_browser, "Konqueror/2")) {
	$css_appendix="-konq2";
	$css_alternative="-konq";
} elseif (stristr($used_browser, "Konqueror/3")) {
	$css_appendix="-konq3";
	$css_alternative="-konq";
} elseif (stristr($used_browser, "Konqueror")) {
	$css_appendix="-konq";
}

// Check if default record for message notification and popups for the current user must be created. If a record already exists, then nothing to do...
if (!uddeIMexistsEMN((int)$userid))
	uddeIMinsertEMNdefaults((int)$userid, $config);

// 2007-11-21 zenny: changed this so default output is omitted when gettin raw output (eg for autocomplete ajax response)
$omitDefaultOutput = false;
if (class_exists('JRequest')) {
	if (JRequest::getVar('no_html', false))
		$omitDefaultOutput = true;
} else {
	if (uddeIMmosGetParam( $_REQUEST, 'no_html', false ))
		$omitDefaultOutput = true;
}
// now start the output
if (!$omitDefaultOutput){
	echo "\n<!-- ".$versionstring." output below -->\n";

	// load the css file
	if(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/uddeim'.$css_appendix.'.css')) {
		echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/uddeim".$css_appendix.".css' type='text/css' />\n";
	} elseif(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/uddeim'.$css_alternative.'.css')) {
		echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/uddeim".$css_alternative.".css' type='text/css' />\n";
	} elseif(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/uddeim.css')) {
		echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/uddeim.css' type='text/css' />\n";
	} else {
		// template css doesn't exist, now we try to load the default css file
		if(file_exists($pathtouser.'/templates/default/css/uddeim.css'))
			echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/default/css/uddeim.css' type='text/css' />\n";
	}

	if ($config->useautocomplete) {
		if(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/autocompleter'.$css_appendix.'.css')) {
			echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/autocompleter".$css_appendix.".css' type='text/css' />\n";
		} elseif(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/autocompleter'.$css_alternative.'.css')) {
			echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/autocompleter".$css_alternative.".css' type='text/css' />\n";
		} elseif(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/autocompleter.css')) {
			echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/autocompleter.css' type='text/css' />\n";
		} else {
			// template css doesn't exist, now we try to load the default css file
			if(file_exists($pathtouser.'/templates/default/css/autocompleter.css'))
				echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/default/css/autocompleter.css' type='text/css' />\n";
		}
	}
//	if (isset($mainframe))
//		$mainframe->addCustomHeadTag( $cssfile );
//	else 
//		mosMainFrame::addCustomHeadTag( $cssfile );
	echo "<div id='uddeim'><div id='uddeim-topborder'></div>\n";
}

// fork according to task
switch ($task) {

	case "showlists":
		require_once($pathtouser.'/userlists.php');
		uddeIMshowLists($userid, $item_id, $limit, $limitstart, $config);
		break;
	case "createlists":
		require_once($pathtouser.'/userlists.php');
		uddeIMcreateLists($userid, $item_id, 0, $limit, $limitstart, $config);
		break;
	case "editlists":
		require_once($pathtouser.'/userlists.php');
		$listid		= (int) uddeIMmosGetParam ($_REQUEST, 'listid', 0);
		uddeIMcreateLists($userid, $item_id, $listid, $limit, $limitstart, $config);
		break;
	case "savelists":
		require_once($pathtouser.'/userlists.php');
		$listid		= (int) uddeIMmosGetParam ($_REQUEST, 'listid', 0);
		$listname	= uddeIMmosGetParam ($_REQUEST, 'listname');
		$listdesc	= uddeIMmosGetParam ($_REQUEST, 'listdesc');
		$listids	= uddeIMmosGetParam ($_REQUEST, 'listids');
		uddeIMsaveLists($userid, $item_id, $listid, $listname, $listdesc, $listids, $config);
		break;
	case "deletelists":
		require_once($pathtouser.'/userlists.php');
		$listid		= (int) uddeIMmosGetParam ($_REQUEST, 'listid', 0);
		uddeIMdeleteLists($userid, $item_id, $listid, $limit, $limitstart, $config);
		break;
	case "deletelistsmultiple":
		require_once($pathtouser.'/userlists.php');
		uddeIMdeleteListsMultiple($userid, $item_id, $arcmes, $limit, $limitstart, $config);
		break;

// --------------------------------------------------

	case "inbox":
		require_once($pathtouser.'/inbox.php');
		uddeIMshowInbox($userid, $item_id, $limit, $limitstart, $cryptpass, $config);
		break;

	case "show":
		require_once($pathtouser.'/inbox.php');
		uddeIMshowMessage($userid, $item_id, $messageid, false, $cryptpass, $config);
		break;

	case "showpass":
		require_once($pathtouser.'/inbox.php');
		uddeIMshowPass($userid, $item_id, $messageid, $config);
		break;

	case "forward":
		require_once($pathtouser.'/inbox.php');
		uddeIMshowMessage($userid, $item_id, $messageid, true, $cryptpass, $config);
		break;

	case "forwardpass":
		require_once($pathtouser.'/inbox.php');
		uddeIMforwardPass($userid, $item_id, $messageid, $config);
		break;

	case "delete":
		require_once($pathtouser.'/inbox.php');
		uddeIMdeleteMessageInbox($userid, $messageid, $limit, $limitstart, $item_id, $ret, $config);
		break;

	case "muldelete":
		require_once($pathtouser.'/inbox.php');
		uddeIMdeleteInbox($userid, $item_id, $arcmes, $limit, $limitstart, $config);
		break;

// --------------------------------------------------

	case "outbox":
		require_once($pathtouser.'/outbox.php');
		uddeIMshowOutbox($userid, $item_id, $limit, $limitstart, $cryptpass, $config);
		break;

	case "showout":
		require_once($pathtouser.'/outbox.php');
		uddeIMshowOutmessage($userid, $item_id, $messageid, false, $cryptpass, $config);
		break;

	case "showoutpass":
		require_once($pathtouser.'/outbox.php');
		uddeIMshowOutPass($userid, $item_id, $messageid, $config);
		break;

	case "forwardoutbox":
		require_once($pathtouser.'/outbox.php');
		uddeIMshowOutmessage($userid, $item_id, $messageid, true, $cryptpass, $config);
		break;

	case "forwardoutboxpass":
		require_once($pathtouser.'/outbox.php');
		uddeIMforwardOutPass($userid, $item_id, $messageid, $config);
		break;

	case "deletefromoutbox":
		require_once($pathtouser.'/outbox.php');
		uddeIMdeleteMessageOutbox($userid, $messageid, $limit, $limitstart, $item_id, $ret, $config);
		break;

	case "outboxmuldelete":
		require_once($pathtouser.'/outbox.php');
		uddeIMdeleteOutbox($userid, $item_id, $arcmes, $limit, $limitstart, $config);
		break;

	case "recall":
		require_once($pathtouser.'/outbox.php');
		uddeIMrecallMessage($userid, $item_id, $messageid, $cryptpass, $config);
		break;

	case "recallpass":
		require_once($pathtouser.'/outbox.php');
		uddeIMrecallPass($userid, $item_id, $messageid, $config);
		break;

// --------------------------------------------------

	case "trashcan":
		require_once($pathtouser.'/trashcan.php');
		uddeIMshowTrashCan($userid, $item_id, $limit, $limitstart, $cryptpass, $config);
		break;

	case "restore":
		require_once($pathtouser.'/trashcan.php');
		uddeIMrestoreMessage($userid, $messageid, $limit, $limitstart, $item_id, $config);
		break;

// --------------------------------------------------

	case "archive":
		require_once($pathtouser.'/archive.php');
		uddeIMarchive($userid, $item_id, $limit, $limitstart, $cryptpass, $config);
		break;

	case "archivemessage":
		require_once($pathtouser.'/archive.php');
		uddeIMarchiveMessage ($userid, $item_id, $messageid, $cryptpass, $config);
		break;

	case "unarchive":
		require_once($pathtouser.'/archive.php');
		uddeIMunarchiveMessage($userid, $messageid, $limit, $limitstart, $item_id, $config);
		break;

	case "archivedownload":
		require_once ($pathtouser.'/archive.php');
		uddeIMarchiveDownload($userid, $item_id, $arcmes, $limit, $limitstart, $cryptpass, $config);
		break;

	case "archivetrash":
		require_once ($pathtouser.'/archive.php');
		uddeIMarchiveTrash($userid, $item_id, $arcmes, $limit, $limitstart, $config);
		break;

// --------------------------------------------------

	case "prune":
		uddeIMpruneMessages($userid, $item_id, 0, $task, $config);	// group id not required here
		break;

// --------------------------------------------------

	case "save":
		uddeIMsaveMessage($userid, $to_name, $to_id, $pmessage, $tobedeleted, $item_id, $messageid, $copytome, $addccinfo, $sendeform_showallusers, $cryptpass, $backto, $config);
		break;

	case "new":
		uddeIMnewMessage($userid, $item_id, $to_id, $recip, $runame, $pmessage, $config);
		break;

	case "version":
		echo "<h2>Installed uddeIM version</h2>\n";
		echo $versionstring;
		echo "<div id='uddeim-bottomborder'></div>\n";
		break;

	case "sysgm":
	    uddeIMnewSysgm($userid, $item_id, $to_id, $pmessage, $config);
		break;

	case "savesysgm":
	    uddeIMsaveSysgm($userid, $to_name, $to_id, $pmessage, $tobedeleted, $item_id, $messageid, $sysgm_sys, $sysgm_universe, $sysgm_validfor, $sysgm_really, $cryptpass, $config);
		break;

	case "markread":
		uddeIMmarkRead($userid, $messageid, $limit, $limitstart, $item_id, $config);
		break;

	case "markunread":
		uddeIMmarkUnread($userid, $messageid, $limit, $limitstart, $item_id, $config);
		break;

	case "flag":
		uddeIMmarkFlagged($userid, $messageid, $limit, $limitstart, $item_id, $ret, $config);
		break;

	case "unflag":
		uddeIMmarkUnflagged($userid, $messageid, $limit, $limitstart, $item_id, $ret, $config);
		break;

	case "blockuser":
		require_once($pathtouser.'/blocking.php');
		uddeIMblockUserUdde($userid, $item_id, $recip, $config);
		break;

	case "unblockuser":
		require_once($pathtouser.'/blocking.php');
		uddeIMunblockUserUdde($userid, $item_id, $recip, $config);
		break;

	case "settings":
		uddeIMshowSettings($userid, $item_id, $config);
		break;

	case "about":
		uddeIMshowAbout($userid, $item_id, $versionstring, $config);
		break;

	case "saveemn":
		uddeIMsaveEMN($userid, $item_id, $emailradio, $emailreplycheck, $config);
		break;

	case "saveuseremn":
		uddeIMsaveUserEMN($userid, $item_id, $popupcheck, $publiccheck, $config);
		break;

	// 2007-11-21 zenny: added this to route onto autocomplete ajax return
	case 'completeUserName':
		uddeIMcompleteUserName($userid, $config);
		break;

	case 'ajaxGetNewMessages':
		uddeIMajaxGetNewMessages($userid, $config);
		break;

	default:
		require_once($pathtouser.'/inbox.php');
		uddeIMshowInbox($userid, $item_id, $limit, $limitstart, $cryptpass, $config);
		break;
}

if (!$omitDefaultOutput){
	echo "</div>\n";		// </div id='uddeim'>
	echo "<!-- ".$versionstring." output above -->\n";
}

// *****************************************************************************************

function uddeIMpruneMessages($myself, $item_id, $my_gid, $task, $config) {
	// check if this can be called by admins or superadmins only (=1 admins/superadmins automatically, =2 admins/superadmins manually)
	if ($config->adminignitiononly>0) {
		if(!$my_gid)
			$my_gid=uddeIMgetGID((int)$myself);		// no group id, so find it
		if (!($my_gid==24 || $my_gid==25)) {
			echo _UDDEIM_VIOLATION;
			return;
//			_osRedirect(uddeIMsefRelToAbs("index.php?option=com_uddeim"), _UDDEIM_VIOLATION);
		}
	}
	uddeIMdoPrune($config);
	uddeIMreminderDispatch($item_id, $config);		// process forgetmenot emails

	if ($task=="prune") {
		uddeJSEFredirect("index.php", "uddeIM/Prune");
	}
}

// *****************************************************************************************

function uddeIMsaveMessage($myself, $to_name, $to_id, $pmessage, $tobedeleted, $item_id, $messageid, $copytome, $addccinfo, $sendeform_showallusers, $cryptpass, $backto, $config) {
	$database = uddeIMgetDatabase();

	// I could have modified this function to process mails to public users but instead of adding
	// several exceptions it is better to have an own function for this purpose.
	// Everything we need is available here, so we can use this for the new function.
	// When we have the public frontend enabled and the user saves a REPLY (=$messageid exists) and the receiver is a public user then do it...
	if ($config->pubfrontend && $messageid && !$to_id) {
		uddeIMtoPublicSaveMessage($myself, $pmessage, $tobedeleted, $item_id, $messageid, $copytome, $cryptpass, $backto, $config);
		return;
	}

	$my_gid=uddeIMgetGID((int)$myself);
	$to_name_bak = $to_name;				// save all already typed in names

	if($config->inboxlimit) {
		if ($config->allowarchive) {		// have an archive and an "archive and inbox" limit, so get number of messages in inbox and archive
			$total = uddeIMgetInboxArchiveCount($myself);
		} else {							// user has switched of archive but there is an limit for "inbox and archive", so count inbox messages only
			$total = uddeIMgetInboxCount($myself);
		}
		if($total>$config->maxarchive && $my_gid!=24 && $my_gid!=25) {
			$mosmsg=_UDDEIM_MSGLIMITREACHED;
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}
	}
	
	// link to drop down box with names of connected users, value is 2 since it is shown the first time (so selecting the link does not show an error message because of an empty recipient field)
	if(!$to_id && !$to_name && $sendeform_showallusers!=2) {
		// write the uddeim menu
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 5, $config);
		return;
	}

	if($sendeform_showallusers) {	// =2, click on button / =1, keep on showing
		// write the uddeim menu
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 1, $config);
		return;
	}

	$lastsent = uddeIMgetEMNlastsent($myself);
	$flooding = 0;
	if ($config->timedelay>0) {
		if ($lastsent) {
			$delay = uddetime($config->timezone) - $lastsent;
			if ($delay <= $config->timedelay)
				$flooding = 1;
		}
	}
	if($flooding) {
		// write the uddeim menu
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 14, $config);
		return;
	}
	
	if( ($config->enablelists==1) ||
	    ($config->enablelists==2 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->enablelists==3 && in_array($my_gid,array(24,25))) ) {
		// when userlists are not enabled, then "#listname" is treated as "normal" username
		$ok = uddeIMreplaceListsWithNames($to_name, $myself, $config);
		if (!$ok) {
			// write the uddeim menu
			uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 11, $config);
			return;
		}
		// the list is ok, so we work with the expanded names from now
		$to_name_bak = $to_name;					// save all expanded names, we do not want to work with lists because this minimizes db queries
	}

	// first check if all names exist
//	if ($config->allowmultiplerecipients) {
		$anames = explode(",", $to_name);
//	} else {
//		unset($anames);
//		$anames[] = $to_name;		// only one name allowed
//	}

// expand always, so the next condition may be fulfilled
	if( ( $config->allowmultiplerecipients && count($anames)>$config->maxrecipients && $config->maxrecipients>0) ||
		(!$config->allowmultiplerecipients && count($anames)>1)														) { 	// too many recipients
		// write the uddeim menu
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 6, $config);
		return;
	}

	// FIRST ROUND: Check all names that were typed in (lists have been replaced by the corresponding names)
	// ATTENTION: $to_name contains one name only below this line, to restore what the user typed in use $to_name_bak
	foreach ($anames as $value) {
		$to_name = trim($value);

		// when we have a name, then resolve the name
		// remember that replies provide $to_id only and $to_name is empty, so do not try to resolve names when it is empty
		if ($to_name) {
			$to_id = uddeIMgetIDfromName($to_name, $config, true);		// add "AND block=0"
			// BUGBUG: Maybe it is a good idea to do the query vice versa (so I could add a query for "realname"s here)
			if (!$to_id) { // no user with this name found, so try again with username (maybe we do the query twice (see query above, but who cares)
				if ($config->realnames) {
					$to_id = uddeIMgetIDfromUsername($to_name, true);	// add "AND block=0"
				}
			}

			if(!$to_id) { // no user with this username found
				// display to form again so that the user can correct his/her fault
				// the wrong name is displayed in brackets (add brackets only once)
				if (substr($to_name,0,1)!="(") {
					$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
				}
				// write the uddeim menu
				uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 3, $config);
				return;
			} elseif ($to_id==$myself) { // don't send to yourself
				if (substr($to_name,0,1)!="(") {
					$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
				}
				// write the uddeim menu
//				$to_name=stripslashes($to_name_bak);		// all names
				uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 2, $config);
				return;
			}
		}

		// now check blocking
		$isblocked = uddeIMcheckBlockerBlocked($to_id, $myself);
		// well, should be changed in a way that the user can change his input again
		if ($isblocked && $config->blocksystem) { // must not send message to to_id
			if ($config->blockalert) { // sending user shall be informed that (s)he's been blocked
				if (substr($to_name,0,1)!="(") {
					$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
				}
				// write the uddeim menu
				uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 9, $config);
				return;
			}
		}
		// now check group blocking
		if ($my_gid==18) {	// I am a registered user, so check if I am allowed to send to this group
			$is_group_blocked = uddeIMisRecipientBlockedReg($myself, $to_id, $config);
			if ($is_group_blocked) {
				if (substr($to_name,0,1)!="(") {
					$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
				}
				// write the uddeim menu
				uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 10, $config);
				return;
			}
		}
	}

	if(!$pmessage) {
		// write the uddeim menu
		$to_name = $to_name_bak;
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 4, $config);
		return;
	}

	if(!$to_id) {					// this should never be reached
		$mosmsg = _UDDEIM_NOID;
		uddeJSEFredirect("index.php?option=com_uddeim&task=new&Itemid=".$item_id, $mosmsg);
	}

	// CAPTCHA (first check for all other errors and then the CAPTCHA)
	if (!uddeIMcheckCAPTCHA($my_gid, $config)) {
		$to_name = $to_name_bak;
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 7, $config);
		return;
	}

	if (!uddeIMcheckCSRF($config)) {
		$to_name = $to_name_bak;
		uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, 15, $config);
		return;
	}

	foreach ($anames as $value) {

		$to_name = trim($value);

		if ($to_name) {
			$to_id = uddeIMgetIDfromName($to_name, $config, true);		// add "AND block=0"
			// BUGBUG: Maybe it is a good idea to do the query vice versa (so I could add a query for "realname"s here)
			if (!$to_id) { // no user with this name found, so try again with username (maybe we do the query twice (see query above, but who cares)
				if ($config->realnames) {
					$to_id = uddeIMgetIDfromUsername($to_name, true);	// add "AND block=0"
				}
			}
		}
		if (!$to_id) {	// that should never happen, but you never know...
			$mosmsg=_UDDEIM_NOID;
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}

		// now check blocking
		$isblocked = uddeIMcheckBlockerBlocked($to_id, $myself);
		if ($isblocked && $config->blocksystem) { // must not send message to to_id
			continue;
		}

		$savedatum  = uddetime($config->timezone);
		$savetoid   = $to_id;
		$savefromid = $myself;

		// CRYPT
		if ($config->cryptmode==1 || $config->cryptmode==2) {
			$savemessage=strip_tags($pmessage);
		} else {
			$savemessage=addslashes(strip_tags($pmessage));   // original 0.6+
		}
		// strip XSS code
		$savemessage = uddeIMRemoveXSS($savemessage);

		// strip bbcodes
		if (!$config->allowbb)
			$savemessage=uddeIMbbcode_strip($savemessage);

		// set message max length
		if ($config->maxlength>0)		// because if 0 do not use any maxlength
			$savemessage=substr($savemessage, 0, $config->maxlength);


		// add CC: information
		if ($config->allowmultipleuser && $addccinfo && count($anames)>1) {
			$ccinfo = implode(", ", $anames);
			$ccheader = "\n\n[i]"._UDDEIM_CC." ".$ccinfo."[/i]";
			$savemessage .= $ccheader;
		}

		// we have all we need, now save it
		// CRYPT
		$themode = 0;
		if ($config->cryptmode==1) {
			$themode = 1;
			$cm = uddeIMencrypt($savemessage,$config->cryptkey,CRYPT_MODE_BASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,'".md5($config->cryptkey)."')";
		} elseif ($config->cryptmode==2) {
			$themode = 2;
			$thepass=$cryptpass;
			if (!$thepass) {	// no password entered, then fallback to obfuscating
				$themode = 1;
				$thepass=$config->cryptkey;
			}
			$cm = uddeIMencrypt($savemessage,$thepass,CRYPT_MODE_BASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",".$themode.",'".md5($thepass)."')";
		} elseif ($config->cryptmode==3) {
			$themode = 3;
			$cm = uddeIMencrypt($savemessage,"",CRYPT_MODE_STOREBASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, cryptmode) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",3)";
		} else {
			$sql="INSERT INTO #__uddeim (fromid, toid, message, datum) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$savemessage."', ".$savedatum.")";
		}
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to save a message" . $database->stderr(true));
		}
		$insID = $database->insertid();

		// update lastsent field (record already exists since we check this at the very beginning of this component)
		uddeIMupdateEMNlastsent($myself, uddetime($config->timezone));

		// Check if E-Mail notification or popups are enabled by default, if so create a record for the receiver.
		// Note: Not necessary for "copy to myself" sind the record for the current user has been set at the very beginning...
		if ($config->notifydefault>0 || $config->popupdefault>0 || $config->pubfrontenddefault>0) {
			if (!uddeIMexistsEMN($savetoid))
				uddeIMinsertEMNdefaults($savetoid, $config);
		}

		// copy to myself?
		if($copytome && $config->allowcopytome) {
			$to_name = uddeIMgetNameFromID($savetoid, $config);

			$copyheader="

[i]("._UDDEIM_THISISACOPY.$to_name.")[/i]";

			$savemessagecopy = $savemessage.$copyheader;
			$copyname = _UDDEIM_TO_SMALL." ".$to_name;
			// if($config->allowarchive) { $archiveflag=1; }

			// it is a copy to myself, so assume that the message has already been trashed in the senders outbox (remember: system messages are not shown in the outbox)
			// so set totrashoutbox=1, totrashdateoutbox=uddetime($config->timezone)
			// CRYPT
			if ($config->cryptmode==1) {
				$cm = uddeIMencrypt($savemessagecopy,$config->cryptkey,CRYPT_MODE_BASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savefromid.", 1, '".$cm."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",1,'".md5($config->cryptkey)."')";
			} elseif ($config->cryptmode==2) {
				$themode=2;
				$thepass=$cryptpass;
				if (!$thepass) {	// no password entered, then fallback to obfuscating
					$themode=1;
					$thepass=$config->cryptkey;
				}
				$cm = uddeIMencrypt($savemessagecopy,$thepass,CRYPT_MODE_BASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savefromid.", 1, '".$cm.             "', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",".$themode.",'".md5($thepass)."')";
			} elseif ($config->cryptmode==3) {
				$cm = uddeIMencrypt($savemessagecopy,"",CRYPT_MODE_STOREBASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode) VALUES (".(int)$savefromid.", ".(int)$savefromid.", 1, '".$cm."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",3)";
			} else {
				$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox) VALUES (".         				(int)$savefromid.", ".(int)$savefromid.", 1, '".$savemessagecopy."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).")";
			}
			$database->setQuery($sql);
			if (!$database->query()) {
				die("SQL error when attempting to save a message" . $database->stderr(true));
			}
		}

		// e-mail notification code
		// is this a reply?
		$itisareply = stristr($savemessage, $config->quotedivider);
		// is the receiver currently online?
		$currentlyonline = uddeIMisOnline($savetoid);

		if($config->allowemailnotify==1) {
			$ison = uddeIMgetEMNstatus($savetoid);
			if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && !$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
				uddeIMdispatchEMN($insID, $item_id, $themode, $savefromid, $savetoid, $savemessage, 0, $config);
				// 0 stands for normal (not forgetmenot)
			}
		} elseif($config->allowemailnotify==2) {
			$my_gid=uddeIMgetGID((int)$savetoid);
			if ($my_gid==24||$my_gid==25) {
				$ison = uddeIMgetEMNstatus($savetoid);
				if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && !$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
					uddeIMdispatchEMN($insID, $item_id, $themode, $savefromid, $savetoid, $savemessage, 0, $config);
					// 0 stands for normal (not forgetmenot)
				}
			}
		}
	}

	// delete original message?
	if ($tobedeleted) {
		$deletetime=uddetime($config->timezone);
		uddeIMdeleteMessageFromInbox($myself, $messageid, $deletetime);
	}

	if($messageid) {
		$mosmsg=_UDDEIM_MESSAGE_REPLIEDTO;
	} else {
		$mosmsg=_UDDEIM_MESSAGE_SENT;
	}
	if ($tobedeleted) {
		$mosmsg.=_UDDEIM_MOVEDTOTRASH;
	}

	if($backto) {
		uddeIMmosRedirect($backto, $mosmsg);
	}
	uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
}




// we need the email address here...
// instead of $to_name use the messageid and query the corresponding parameters with (messageid/toid=myself)
function uddeIMtoPublicSaveMessage($myself, $pmessage, $tobedeleted, $item_id, $messageid, $copytome, $cryptpass, $backto, $config) {
	$mosConfig_sitename = uddeIMgetSitename();
	$database = uddeIMgetDatabase();
	$my_gid = uddeIMgetGID($myself);

	if($config->inboxlimit) {
		if ($config->allowarchive) {		// have an archive and an "archive and inbox" limit, so get number of messages in inbox and archive
			$total = uddeIMgetInboxArchiveCount($myself);
		} else {							// user has switched of archive but there is an limit for "inbox and archive", so count inbox messages only
			$total = uddeIMgetInboxCount($myself);
		}
		if($total>$config->maxarchive && $my_gid!=24 && $my_gid!=25) {
			$mosmsg=_UDDEIM_MSGLIMITREACHED;
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}
	}

	$lastsent = uddeIMgetEMNlastsent($myself);
	$flooding = 0;
	if ($config->timedelay>0) {
		if ($lastsent) {
			$delay = uddetime($config->timezone) - $lastsent;
			if ($delay <= $config->timedelay)
				$flooding = 1;
		}
	}
	if($flooding) {
		// write the uddeim menu
		uddeIMprintMenu($myself, 'new', $item_id, $config);
		echo "<div id='uddeim-m'>\n";
		$pmessage=stripslashes($pmessage);
		uddeIMdrawWriteform($myself, $my_gid, $item_id, "", "", $pmessage, $messageid, 1, 14, 0, $config);	// reply!!!
		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
		return;
	}
	
	// select the message I write a reply to
	// I need the email address and the sender name of the public user (the message id is $messageid and I am $myself)
// BUGBUG: das war vorher... a.toid=b.id??? richtig sollte a.fromid=b.id sein, also selectInboxMessage nehmen
//	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.toid=".(int)$myself." AND a.id=".(int)$messageid;
	$displaymessages = 	uddeIMselectInboxMessage($myself, $messageid, $config);
	if (count($displaymessages)<1) {
		echo _UDDEIM_MESSAGENOACCESS;
		return;
	}
	foreach($displaymessages as $displaymessage) {
		$var_toname = $displaymessage->publicname;
		$var_tomail = $displaymessage->publicemail;
	}
	if (!$var_toname || $var_toname==NULL)
		$var_toname = _UDDEIM_PUBLICUSER;
	
	if(!$pmessage) {
		// write the uddeim menu
		uddeIMprintMenu($myself, 'new', $item_id, $config);
		echo "<div id='uddeim-m'>\n";
		$pmessage=stripslashes($pmessage);
		uddeIMdrawWriteform($myself, $my_gid, $item_id, "", "", $pmessage, $messageid, 1, 4, 0, $config);	// reply!!!
		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
		return;
	}

	// CAPTCHA (first check for all other errors and then the CAPTCHA)
	if (!uddeIMcheckCAPTCHA($my_gid, $config)) {
		uddeIMprintMenu($myself, 'new', $item_id, $config);
		echo "<div id='uddeim-m'>\n";
		$pmessage=stripslashes($pmessage);
		uddeIMdrawWriteform($myself, $my_gid, $item_id, "", "", $pmessage, $messageid, 1, 7, 0, $config);	// reply!!!
		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
		return;
	}

	if (!uddeIMcheckCSRF($config)) {
		uddeIMprintMenu($myself, 'new', $item_id, $config);
		echo "<div id='uddeim-m'>\n";
		$pmessage=stripslashes($pmessage);
		uddeIMdrawWriteform($myself, $my_gid, $item_id, "", "", $pmessage, $messageid, 1, 15, 0, $config);	// reply!!!
		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
		return;
	}

	$savedatum  = uddetime($config->timezone);
	$savetoid   = 0;			// reveiver is a public user

	// CRYPT
	if ($config->cryptmode==1 || $config->cryptmode==2) {
		$savemessage=strip_tags($pmessage);
	} else {
		$savemessage=addslashes(strip_tags($pmessage));   // original 0.6+
	}
	// strip XSS code
	$savemessage = uddeIMRemoveXSS($savemessage);

	// strip bbcodes
	if (!$config->allowbb)
		$savemessage=uddeIMbbcode_strip($savemessage);

	// set message max length
	if ($config->maxlength>0)		// because if 0 do not use any maxlength
		$savemessage=substr($savemessage, 0, $config->maxlength);

	// we have all we need, now save it
	// CRYPT
	$fromname=addslashes(strip_tags($var_toname));
	$fromemail=addslashes(strip_tags($var_tomail));
	if ($config->cryptmode==1) {
		$cm = uddeIMencrypt($savemessage,$config->cryptkey,CRYPT_MODE_BASE64);
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrash, totrashdate, toread, cryptmode, crypthash) VALUES ('".$fromname."', '".$fromemail."', ".(int)$myself.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,".$savedatum.",1,1,'".md5($config->cryptkey)."')";
	} elseif ($config->cryptmode==2) {
		$themode=2;
		$thepass=$cryptpass;
		if (!$thepass) {	// no password entered, then fallback to obfuscating
			$themode=1;
			$thepass=$config->cryptkey;
		}
		$cm = uddeIMencrypt($savemessage,$thepass,CRYPT_MODE_BASE64);
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrash, totrashdate, toread, cryptmode, crypthash) VALUES ('".$fromname."', '".$fromemail."', ".(int)$myself.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,".$savedatum.",1,".$themode.",'".md5($thepass)."')";
	} elseif ($config->cryptmode==3) {
		$cm = uddeIMencrypt($savemessage,"",CRYPT_MODE_STOREBASE64);
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrash, totrashdate, toread, cryptmode) VALUES ('".$fromname."', '".$fromemail."', ".(int)$myself.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,".$savedatum.",1,3)";
	} else {
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrash, totrashdate, toread) VALUES ('".$fromname."', '".$fromemail."', ".(int)$myself.", ".(int)$savetoid.", '".$savemessage."', ".$savedatum.",1,".$savedatum.",1)";
	}
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to save a message" . $database->stderr(true));
	}

	// update lastsent field (record already exists since we check this at the very beginning of this component)
	uddeIMupdateEMNlastsent($myself, uddetime($config->timezone));

	// copy to myself?
	if($copytome && $config->allowcopytome) {

		$copyheader="

[i]("._UDDEIM_THISISACOPY.$var_toname.")[/i]";

		$savemessagecopy = $savemessage.$copyheader;
		$copyname = _UDDEIM_TO_SMALL." ".$var_toname;
		// if($config->allowarchive) { $archiveflag=1; }

		// it is a copy to myself, so assume that the message has already been trashed in the senders outbox (remember: system messages are not shown in the outbox)
		// so set totrashoutbox=1, totrashdateoutbox=uddetime($config->timezone)
		// CRYPT
		if ($config->cryptmode==1) {
			$cm = uddeIMencrypt($savemessagecopy,$config->cryptkey,CRYPT_MODE_BASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$myself.", ".(int)$myself.", 1, '".$cm."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",1,'".md5($config->cryptkey)."')";
		} elseif ($config->cryptmode==2) {
			$themode=2;
			$thepass=$cryptpass;
			if (!$thepass) {	// no password entered, then fallback to obfuscating
				$themode=1;
				$thepass=$config->cryptkey;
			}
			$cm = uddeIMencrypt($savemessagecopy,$thepass,CRYPT_MODE_BASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$myself.", ".(int)$myself.", 1, '".$cm.             "', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",".$themode.",'".md5($thepass)."')";
		} elseif ($config->cryptmode==3) {
			$cm = uddeIMencrypt($savemessagecopy,"",CRYPT_MODE_STOREBASE64);
			$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox, cryptmode) VALUES (".(int)$myself.", ".(int)$myself.", 1, '".$cm."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).",3)";
		} else {
			$sql="INSERT INTO #__uddeim (fromid, toid, toread, message, datum, disablereply, systemmessage, archived, totrashoutbox, totrashdateoutbox) VALUES (".         				(int)$myself.", ".(int)$myself.", 1, '".$savemessagecopy."', ".$savedatum.", 1, '".$copyname."', 0, 1,".uddetime($config->timezone).")";
		}
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to save a message" . $database->stderr(true));
		}
	}

	// send notification (message) to public user
	// check if we have an email address
	//	uddeIMdispatchEMN(msgid, $myself, 0, $savemessage, 0, $config);
	// if e-mail traffic stopped, don't send.
	if($config->emailtrafficenabled && $var_tomail) {

		$var_fromname = uddeIMgetNameFromID($myself, $config);
		if (!$var_fromname)
			$var_fromname=$config->sysm_username;

		$var_body=_UDDEIM_EMN_BODY_PUBLICWITHMESSAGE;
		$var_body=str_replace("%you%", $var_fromname, $var_body);
		$var_body=str_replace("%site%", $mosConfig_sitename, $var_body);
		$var_body=str_replace("%user%", $var_toname, $var_body);
		$var_body=str_replace("%pmessage%", $savemessage, $var_body);

		$subject=_UDDEIM_EMN_SUBJECT;
		$subject=str_replace("%site%", $mosConfig_sitename, $subject);
		$header = "Reply-To: ".$var_tomail."\n";

		if(uddeIMsendmail($config->emn_sendername, $config->emn_sendermail, $var_toname, $var_tomail, $subject, $var_body, $header, $config)) {
			// maybe a code here that the email cound not have been sent
		}
	}

	// delete original message?
	if ($tobedeleted) {
		$deletetime=uddetime($config->timezone);
		uddeIMdeleteMessageFromInbox($myself, $messageid, $deletetime);
	}

	if($messageid) {
		$mosmsg=_UDDEIM_MESSAGE_REPLIEDTO;
	} else {
		$mosmsg=_UDDEIM_MESSAGE_SENT;
	}
	if ($tobedeleted) {
		$mosmsg.=_UDDEIM_MOVEDTOTRASH;
	}

	if($backto) {
		uddeIMmosRedirect($backto, $mosmsg);
	}
	uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
}

// *****************************************************************************************

function uddeIMsaveSysgm($myself, $to_name, $to_id, $pmessage, $tobedeleted, $item_id, $messageid, $sysgm_sys, $sysgm_universe, $sysgm_validfor, $sysgm_really, $cryptpass, $config) {
	$database = uddeIMgetDatabase();

	$my_gid=uddeIMgetGID((int)$myself);
	if (!$config->allowsysgm || ($my_gid!=24 && $my_gid!=25)) {
		$mosmsg=_UDDEIM_NOTALLOWED_SYSM_GM;
		uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
	}

	// what is username of sender?
	$sendername = uddeIMgetNameFromID($myself, $config);
	if ($sysgm_sys)
		$sendername=$config->sysm_username;

	if (!$sysgm_really) {
		// send not confirmed. ask for confirmation

		// CAPTCHA (first check for all other errors and then the CAPTCHA)
		if (!uddeIMcheckCAPTCHA($my_gid, $config)) {
			uddeIMprintMenu($myself, 'new', $item_id, $config);
			echo "<div id='uddeim-m'>\n";
			$to_name=stripslashes($to_name);
			$pmessage=stripslashes($pmessage);
			uddeIMdrawWriteform($myself, $my_gid, $item_id, "", $to_name, $pmessage, "", 0, 7, 1, $config);
			echo "</div>\n<div id='uddeim-bottomborder'></div>\n";
			return;
		}

		if (!uddeIMcheckCSRF($config)) {
			uddeIMprintMenu($myself, 'new', $item_id, $config);
			echo "<div id='uddeim-m'>\n";
			$to_name=stripslashes($to_name);
			$pmessage=stripslashes($pmessage);
			uddeIMdrawWriteform($myself, $my_gid, $item_id, "", $to_name, $pmessage, "", 0, 15, 1, $config);
			echo "</div>\n<div id='uddeim-bottomborder'></div>\n";
			return;
		}

		uddeIMprintMenu($myself, 'new', $item_id, $config);
		echo "<div id='uddeim-m'>\n";

		echo "<div id='uddeim-toplines'><p>"._UDDEIM_SYSGM_PLEASECONFIRM."</p></div>\n";
		echo "<div id='uddeim-message'><table cellpadding='7' cellspacing='1' width='100%'>\n";
		$usql="";	// send to unblocked users only
		if ($sysgm_universe=="sysgm_toall") {
			$universe=_UDDEIM_SYSGM_WILLSENDTOALL;
			$usql="SELECT count(id) FROM #__users WHERE block=0 AND id<>".(int)$myself;
		} elseif ($sysgm_universe=="sysgm_toalllogged") {
			$universe=_UDDEIM_SYSGM_WILLSENDTOALLLOGGED;
			$usql="SELECT count(a.id) FROM #__users AS a, #__session AS b WHERE a.block=0 AND a.id=b.userid AND a.id<>".(int)$myself;
		} elseif ($sysgm_universe=="sysgm_toallspecial") {
			$universe=_UDDEIM_SYSGM_WILLSENDTOALLSPECIAL;
			$usql="SELECT count(id) FROM #__users WHERE block=0 AND gid IN (19,20,21,23,24,25) AND id<>".(int)$myself;
		} elseif ($sysgm_universe=="sysgm_toalladmins") {
			$universe=_UDDEIM_SYSGM_WILLSENDTOALLADMINS;
			$usql="SELECT count(id) FROM #__users WHERE block=0 AND gid IN (24,25) AND id<>".(int)$myself;
		} else {
			if ($config->showgroups) {
				$aclsql = "SELECT name FROM  #__core_acl_aro_groups WHERE group_id=".(int)$sysgm_universe;
				$database->setQuery($aclsql);
				$universe=$database->loadResult();
				$usql="SELECT count(id) FROM #__users WHERE block=0 AND gid=".(int)$sysgm_universe." AND id<>".(int)$myself;
			}
		}
		if (!$universe) {
			$mosmsg=_UDDEIM_UNEXPECTEDERROR_QUIT."No recipients selected";
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}

		if ($usql) {
			$database->setQuery($usql);
			$rf = (int)$database->loadResult();
			$rft = ($rf==1) ? _UDDEIM_RECIPIENTFOUND : _UDDEIM_RECIPIENTFOUND;
			$universe.=" (".$rf." ".$rft.")";
		}

		$udde_infoheader = $universe."<br />";
		$udde_infoheader .= _UDDEIM_SYSGM_WILLSENDAS_1.$sendername._UDDEIM_SYSGM_WILLSENDAS_2."<br />";
		if($sysgm_sys) {
			$udde_infoheader .= _UDDEIM_SYSGM_WILLDISABLEREPLY."<br />";
		}
		if($sysgm_validfor>0) {
			$now=uddetime($config->timezone);
			$validuntil_timestamp=$now+($sysgm_validfor*3600);
			$validuntil=date("Y-m-d H:i", $validuntil_timestamp);
			$udde_infoheader .= _UDDEIM_SYSGM_WILLEXPIRE." ".$validuntil."<br />";
		}

		echo "\t<tr class='sectiontableentry1'>\n\t\t<td>".$udde_infoheader."</td></tr>\n";

		// strip any HTML from message but don't add slashes yet
		$dmessage=strip_tags($pmessage);
		$dmessage=stripslashes($pmessage);
		$hmessage=htmlspecialchars($dmessage, ENT_QUOTES, $config->charset);
		$jmessage=$dmessage;

		$containslink=stristr($dmessage, "[url");
		// parse bb code if it is a sysgm
		$dmessage=uddeIMbbcode_replace($dmessage, $config);
		$dmessage=uddeIMsmile_replace($dmessage, $config);

		echo "\t<tr class='sectiontableentry2'>\n\t\t\n\t\t<td>".nl2br($dmessage)."</td></tr>\n"; // to do
		echo "</table></div>\n";

		echo "<div id='uddeim-writeform'>\n";
		echo "<form method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=savesysgm&Itemid=".$item_id)."'><input type='hidden' name='sysgm_sys' value='".$sysgm_sys."' />\n";
		echo "<span style='display: none'>\n";

		if ($sysgm_universe=="sysgm_toall") {
			echo "<input type='hidden' name='sysgm_universe' value='sysgm_toall' />\n";
		} elseif ($sysgm_universe=="sysgm_toallspecial") {
			echo "<input type='hidden' name='sysgm_universe' value='sysgm_toallspecial' />\n";
		} elseif ($sysgm_universe=="sysgm_toalladmins") {
			echo "<input type='hidden' name='sysgm_universe' value='sysgm_toalladmins' />\n";
		} elseif ($sysgm_universe=="sysgm_toalllogged") {
			echo "<input type='hidden' name='sysgm_universe' value='sysgm_toalllogged' />\n";
		} elseif ($config->showgroups) { 
			echo "<input type='hidden' name='sysgm_universe' value='".$sysgm_universe."' />\n";
		} 
		echo "<input type='hidden' name='sysgm_validfor' value='".$sysgm_validfor."' />\n";
		echo "<textarea style='visibility: hidden;' name='pmessage' class='inputbox' rows='1' cols='60'>".$jmessage."</textarea>\n";
		echo "<input type='hidden' name='sysgm_really' value='1' />\n";
		echo "<span id='divpass' style='visibility:hidden;'><input type='hidden' name='cryptpass' value='".$cryptpass."' /></span>\n";

		echo "</span>\n";
		echo "<input type='submit' name='reply' class='button' value='"._UDDEIM_SUBMIT."' />\n";
		echo "<input type='button' class='button' value='"._UDDEIM_DONTSEND."' onclick='history.go(-1); return false;' />";
		echo "</form>";
		echo "</div>";

		if ($containslink) {
			echo "<div id='uddeim-bottomlines'><p>"._UDDEIM_SYSGM_CHECKLINK."</p>\n</div>\n";
		}

		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";

	} else { // sysgm_really is set to true, send is confirmed. Now send it.

		$savedatum=uddetime($config->timezone);
		if($sysgm_validfor>0) {
			$now=uddetime($config->timezone);
			$validuntil=$now+($sysgm_validfor*3600);
		} else {
			$validuntil=0;
		}
		$savefromid=$myself;
		$savedisablereply=0;
		$savesysflag="";
		if($sysgm_sys) {
			$savesysflag=$config->sysm_username; 	// system message
			$savedisablereply=1; 					// and users can't reply to them
		} else {
			$savesysflag=$sendername;
			$savedisablereply=0;
		}

		if ($config->cryptmode==1 || $config->cryptmode==2) {
			$savemessage=strip_tags($pmessage);
		} else {
			$savemessage=addslashes(strip_tags($pmessage));   // original 0.6+
		}
		// strip XSS code
		$savemessage = uddeIMRemoveXSS($savemessage);

		// who shall get the message?
		if($sysgm_universe=="sysgm_toall") {
			$sql="SELECT id FROM #__users WHERE id<>".(int)$myself;
		} elseif($sysgm_universe=="sysgm_toalllogged") {
			$sql="SELECT a.id, b.userid FROM #__users AS a, #__session AS b WHERE a.id=b.userid AND a.id<>".(int)$myself;
		} elseif($sysgm_universe=="sysgm_toallspecial") {
			$sql="SELECT id FROM #__users WHERE gid IN (19,20,21,23,24,25) AND id<>".(int)$myself;
		} elseif($sysgm_universe=="sysgm_toalladmins") {
			$sql="SELECT id FROM #__users WHERE gid IN (24,25) AND id<>".(int)$myself;
		} elseif ($config->showgroups) {
			$sql="SELECT id FROM #__users WHERE gid=".(int)$sysgm_universe." AND id<>".(int)$myself;
		}
		// query the database
		$database->setQuery($sql);
		$receivers=$database->loadObjectList();

		if (!count($receivers)) {
			$mosmsg = _UDDEIM_SYSGM_ERRORNORECIPS;
			uddeJSEFredirect("index.php?option=com_uddeim&task=sysgm&Itemid=".$item_id, $mosmsg);
		}
		// we have all we need, now save it

		foreach($receivers as $receiver) {
			$savetoid=$receiver->id;

			// it is a systemmessage to "toid", so assume that the message has already been trashed in the senders outbox (remember: system messages are not shown in the outbox)
			// so set totrashoutbox=1, totrashdateoutbox=uddetime($config->timezone)
			// CRYPT
			$themode = 0;
			if ($config->cryptmode==1) {
				$themode = 1;
				$cm = uddeIMencrypt($savemessage,$config->cryptkey,CRYPT_MODE_BASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, expires, systemmessage, disablereply, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.", ".$validuntil.", '".$savesysflag."', ".$savedisablereply.", 1, ".uddetime($config->timezone).",1,'".md5($config->cryptkey)."')";
			} elseif ($config->cryptmode==2) {
				$themode = 2;
				$thepass=$cryptpass;
				if (!$thepass) {	// no password entered, then fallback to obfuscating
					$themode = 1;
					$thepass=$config->cryptkey;
				}
				$cm = uddeIMencrypt($savemessage,$thepass,CRYPT_MODE_BASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, expires, systemmessage, disablereply, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.", ".$validuntil.", '".$savesysflag."', ".$savedisablereply.", 1, ".uddetime($config->timezone).", ".$themode.",'".md5($thepass)."')";
			} elseif ($config->cryptmode==3) {
				$themode = 3;
				$cm = uddeIMencrypt($savemessage,"",CRYPT_MODE_STOREBASE64);
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, expires, systemmessage, disablereply, totrashoutbox, totrashdateoutbox, cryptmode) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.", ".$validuntil.", '".$savesysflag."', ".$savedisablereply.", 1, ".uddetime($config->timezone).",3)";
			} else {
				$sql="INSERT INTO #__uddeim (fromid, toid, message, datum, expires, systemmessage, disablereply, totrashoutbox, totrashdateoutbox) VALUES (".(int)$savefromid.", ".(int)$savetoid.", '".$savemessage."', ".$savedatum.", ".$validuntil.", '".$savesysflag."', ".$savedisablereply.", 1,".uddetime($config->timezone).")";
			}
			$database->setQuery($sql);
			if (!$database->query()) {
				die("SQL error when attempting to save a message" . $database->stderr(true));
			}
			$insID = $database->insertid();

			// Check if E-Mail notification or popups are enabled by default, if so create a record for the receiver.
			if ($config->notifydefault>0 || $config->popupdefault>0 || $config->pubfrontenddefault>0) {
				if (!uddeIMexistsEMN($savetoid))
					uddeIMinsertEMNdefaults($savetoid, $config);
			}

			// e-mail notification code
			$itisareply="";

			// is the receiver currently online?
			$currentlyonline = uddeIMisOnline($savetoid);

			if($config->allowemailnotify==1) {
				$ison = uddeIMgetEMNstatus($savetoid);
				if ($ison) {
					if($sysgm_sys) {
						$emn_fromid=0;
					} else {
						$emn_fromid=$savefromid;
					}
					if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && 	!$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
						uddeIMdispatchEMN($insID, $item_id, $themode, $emn_fromid, $savetoid, $savemessage, 0, $config);
						// 0 stands for normal (not forgetmenot)
					}
				}
			} elseif($config->allowemailnotify==2) {
				$my_gid = uddeIMgetGID($savetoid);
				if ($my_gid==24||$my_gid==25) {
					$ison = uddeIMgetEMNstatus($savetoid);
					if ($ison) {
						if($sysgm_sys) {
							$emn_fromid=0;
						} else {
							$emn_fromid=$savefromid;
						}
						if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10 && !$itisareply) || ($ison==20 && !$currentlyonline && !$itisareply))  {
							uddeIMdispatchEMN($insID, $item_id, $themode, $emn_fromid, $savetoid, $savemessage, 0, $config);
							// 0 stands for normal (not forgetmenot)
						}
					}
				}
			}
		}
		$mosmsg=_UDDEIM_MESSAGE_SENT;
		uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
	}
}

// *****************************************************************************************

function uddeIMnewMessage($myself, $item_id, $to_id, $recip, $runame, $pmessage, $config) {

	$my_gid=uddeIMgetGID((int)$myself);

	$recipname="";
	if($recip) {
		$recipname = uddeIMgetNameFromID($recip, $config);
	} elseif ($runame) {
		$recipname = uddeIMgetNameFromUsername($runame, $config);
		if (!$recipname)
			$recipname=$runame;
	}

	// write the uddeim menu
	uddeIMprintMenu($myself, 'new', $item_id, $config);
	echo "<div id='uddeim-m'>\n";



	// Don't display writeform if inboxlimit set AND over limit
	// how many messages total in inbox? I do not need the number of messages separately for both boxes!
	if ($config->inboxlimit) {				// there is a limit for inbox + archive
		if ($config->allowarchive) {		// have an archive and an "archive and inbox" limit, so get number of messages in inbox and archive
			$universeflag = _UDDEIM_ARC_UNIVERSE_BOTH;	// inbox and archive
			$total = uddeIMgetInboxArchiveCount($myself);
		} else {							// user has switched of archive but there is an limit for "inbox and archive", so count inbox messages only
			$universeflag = _UDDEIM_ARC_UNIVERSE_INBOX;	// inbox
			$total = uddeIMgetInboxCount($myself);
		}
	
		// if ( $my_gid<24) { // JACL support
		if ($my_gid!=24 && $my_gid!=25) {
			// "The allowed maximum is XX."
			// $limitreached.= _UDDEIM_INBOX_LIMIT_3." ".$config->maxarchive.". ";
			$limitreached.= " "._UDDEIM_SHOWINBOXLIMIT_2." ".$config->maxarchive.").";	// (of max. )

			if ($total > $config->maxarchive) {
				// "You have XX messages in your inbox/inbox+archive."
				$limitreached = _UDDEIM_INBOX_LIMIT_1." ".$total;
				$limitreached.= " ".($total==1 ? _UDDEIM_INBOX_LIMIT_2_SINGULAR : _UDDEIM_INBOX_LIMIT_2)." ";
				$limitreached.= $universeflag;
				// You can still receive and read messages but you will not be able to reply or to compose new ones until you delete messages.
				$limitwarning = _UDDEIM_INBOX_LIMIT_4;

				$showinboxlimit_borderbottom = "<span class='uddeim-warning'>";
				$showinboxlimit_borderbottom.= $limitreached." ";
				$showinboxlimit_borderbottom.= $limitwarning;
				$showinboxlimit_borderbottom.= "</span>";
				echo "<div id='uddeim-bottomlines'>".$showinboxlimit_borderbottom."</div>";
				// close main container
				echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', $limitreached, $config)."</div>\n";
				return;
			}
		}
	}



	// which page did refer to this page?
	// because we want to send back the user where (s)he came from
	$tbackto = uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
	if(stristr($tbackto, "com_pms")) {
		$tbackto="";
	}
	uddeIMdrawWriteform($myself, $my_gid, $item_id, $tbackto, $recipname, $pmessage, "", 0, 0, 0, $config); // isreply, errorcode, sysmsg

	// now check if user is an admin and if system messages are allowed
	if($config->allowsysgm) {
		if ($my_gid==24 || $my_gid==25) {
			echo "<div id='uddeim-bottomlines'><p>";
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=sysgm&Itemid=".$item_id)."'>";
			echo _UDDEIM_WRITE_SYSM_GM;
			echo "</a></p></div>\n";
		}
	}
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
}

// *****************************************************************************************

function uddeIMnewSysgm($myself, $item_id, $to_id, $pmessage, $config) {
	$my_gid=uddeIMgetGID((int)$myself);
	if (!$config->allowsysgm || ($my_gid!=24 && $my_gid!=25)) {
		$mosmsg=_UDDEIM_NOTALLOWED_SYSM_GM;
		uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
	}

	// write the uddeim menu
	uddeIMprintMenu($myself, 'new', $item_id, $config);
	echo "<div id='uddeim-m'>\n";
	uddeIMdrawWriteform($myself, $my_gid, $item_id, "", "", $pmessage, "", 0, 0, 1, $config); // isreply, errorcode, sysmsg
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
}

// *****************************************************************************************

function uddeIMshowSettings($myself, $item_id, $config) {
	// write the uddeim menu
	uddeIMprintMenu($myself, 'settings', $item_id, $config);
	echo "<div id='uddeim-m'>\n";

	$emptysettings = _UDDEIM_NOSETTINGS;

	$my_gid=0;	// only required for allowemailnotify=2, this saves one DB query
	if($config->allowemailnotify==2)
		$my_gid=uddeIMgetGID((int)$myself);

	// if ($config->allowemailnotify==1 || ($config->allowemailnotify==2 && $my_gid>23)) { // JACL support
	if ($config->allowemailnotify==1 || ($config->allowemailnotify==2 && ($my_gid==24 || $my_gid==25))) {
		$emptysettings='';
		$emn_notonreply_checkstatus='';
		$emn_always_checkstatus='';
		$emn_whenoffline_checkstatus='';
		$emn_none_checkstatus='';

		$ison = uddeIMgetEMNstatus($myself);
		if($ison==0) {
			$emn_none_checkstatus='checked="checked"';
		} elseif ($ison==1 || $ison==10) {
			$emn_always_checkstatus='checked="checked"';
		} elseif ($ison==2 || $ison==20) {
			$emn_whenoffline_checkstatus='checked="checked"';
		}
		if($ison==10 || $ison==20) {
			$emn_notonreply_checkstatus='checked="checked"';
		}
		echo "<div class='uddeim-set-block'>";  // was uddeim-set-emn
		echo "<h4>"._UDDEIM_EMN."</h4>";
		echo "<p>"._UDDEIM_EMN_EXP."</p>";
		echo "<form name='emnform' method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=saveemn&Itemid=".$item_id)."'>";
		echo '<input type="radio" '.$emn_always_checkstatus.' name="emailradio" onclick="document.emnform.emailreplycheck.disabled=false;" value="1" />'._UDDEIM_EMN_ALWAYS.'<br />';
		echo '<input type="radio" '.$emn_whenoffline_checkstatus.' name="emailradio" onclick="document.emnform.emailreplycheck.disabled=false;" value="2" />'._UDDEIM_EMN_WHENOFFLINE.'<br />';
		echo '<input type="radio" '.$emn_none_checkstatus.' name="emailradio" value="0" onclick="document.emnform.emailreplycheck.checked=false; document.emnform.emailreplycheck.disabled=true;" />'._UDDEIM_EMN_NONE.'<br />';
		if($emn_none_checkstatus) {
			echo '<input type="checkbox" '.$emn_notonreply_checkstatus.' name="emailreplycheck" disabled="disabled" />'._UDDEIM_EMN_NOTONREPLY.'<br />';
		} else {
			echo '<input type="checkbox" '.$emn_notonreply_checkstatus.' name="emailreplycheck" />'._UDDEIM_EMN_NOTONREPLY.'<br />';
		}
		echo '<input type="submit" name="reply" class="button" value="'._UDDEIM_SAVECHANGE.'" />';
		echo "</form>";
		echo "</div>";
	}

	if($config->blocksystem) {
		$emptysettings="";
		$blockedusers = uddeIMselectBlockerBlockedList($myself, $config);
		$howmanyblocks=count($blockedusers);

		echo "<div class='uddeim-set-block'>\n";
		echo "<h4>"._UDDEIM_BLOCKSYSTEM."</h4>\n";
		if ($howmanyblocks) {
			echo "<p>"._UDDEIM_BLOCKS_EXP."</p>\n";
			echo "<p>"._UDDEIM_YOUBLOCKED_PRE.$howmanyblocks._UDDEIM_YOUBLOCKED_POST."</p>\n";
			echo "<div id='uddeim-overview'>";
			foreach($blockedusers as $blockeduser) {
				if ($blockeduser->displayname)
					echo uddeIMgetLinkOnly($blockeduser->blocked, "<b>".$blockeduser->displayname."</b>", $config);
				else
					echo _UDDEADM_NONEORUNKNOWN;
				echo "&nbsp;&nbsp;";
				echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=unblockuser&Itemid=".$item_id."&recip=".$blockeduser->blocked)."'>"._UDDEIM_UNBLOCKNOW."</a><br />";
			}
			echo "</div>\n";
			if ($config->blockalert) {
				echo "<p>"._UDDEIM_BLOCKALERT_EXP_ON."</p>\n";
			} else {
				echo "<p>"._UDDEIM_BLOCKALERT_EXP_OFF."</p>\n";
			}
		} else {
			echo "<p>"._UDDEIM_NOBODYBLOCKED."</p>\n";
		}
		echo "</div>";
	}

	if ($config->allowpopup || ($config->pubfrontend && !uddeIMisRecipientBlockedPublic($myself, $config)) ) {

		$emptysettings="";
		echo "<div class='uddeim-set-block'>";
		echo "<h4>"._UDDEIM_OPTIONS."</h4>";
		echo "<p>"._UDDEIM_OPTIONS_EXP."</p>";
		echo "<form name='uddeim-popupform' method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=saveuseremn&Itemid=".$item_id)."'>";

		$ison = uddeIMgetEMNpopup($myself);
		$p0checked='';
		switch($ison) {
			case 0:		$p0checked='';						break;
			case 1:		$p0checked='checked="checked"'; 	break;
		}
		if ($config->allowpopup)
			echo '<input type="checkbox" '.$p0checked.' name="popupcheck" />'._UDDEIM_OPTIONS_P.'<br />';
		else
			echo '<input type="hidden" name="popupcheck" value="'.$ison.'" />';

		$ison = uddeIMgetEMNpublic($myself);
		$p0checked='';
		switch($ison) {
			case 0:		$p0checked='';						break;
			case 1:		$p0checked='checked="checked"'; 	break;
		}
		if ($config->pubfrontend && !uddeIMisRecipientBlockedPublic($myself, $config))			// show option only when I am not in a generally blocked group
			echo '<input type="checkbox" '.$p0checked.' name="publiccheck" />'._UDDEIM_OPTIONS_F.'<br />';
		else
			echo '<input type="hidden" name="publiccheck" value="'.$ison.'" />';
		// Note: When a certain group is blocked it does not matter what is stored in $public by default, since the group checked if performed before the individual check.
		// I.e. when the group is not blocked -> the individual check $public is tested (the user can modify this value here)
		// and when the group is blocked -> the individual check is not done, since the user will see an error message that the group is not allowed

		echo '<input type="submit" name="reply" class="button" value="'._UDDEIM_SAVECHANGE.'" />';
		echo "</form>";
		echo "</div>";
	}

	if ($emptysettings) {
			echo "<div id='uddeim-toplines'>".$emptysettings."</div>";
	}
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'settings', 'none', $config)."</div>\n";
}

function uddeIMsaveEMN($myself, $item_id, $emailradio, $emailreplycheck, $config) {
	if($emailradio==0 || $emailradio==1 || $emailradio==2) {
		$emn_setstatus=$emailradio;
		if($emailradio==1 && $emailreplycheck) {
			$emn_setstatus=10;
		}
		if($emailradio==2 && $emailreplycheck) {
			$emn_setstatus=20;
		}
		if (!uddeIMexistsEMN($myself))
			uddeIMinsertEMNdefaults($myself, $config);
		uddeIMupdateEMNstatus($myself, $emn_setstatus);
	}
	uddeJSEFredirect("index.php?option=com_uddeim&task=settings&Itemid=".$item_id);
}

function uddeIMsaveUserEMN ($myself, $item_id, $popupcheck, $publiccheck, $config) {
	// $popupcheck and $publiccheck contain "on"
	$valuepopup = 0;
	if ($popupcheck)
		$valuepopup=1;
	$valuepublic = 0;
	if ($publiccheck)
		$valuepublic=1;

	if (!uddeIMexistsEMN($myself))
		uddeIMinsertEMNdefaults($myself, $config);
	uddeIMupdateEMNpopup($myself, $valuepopup);
	uddeIMupdateEMNpublic($myself, $valuepublic);

	uddeJSEFredirect("index.php?option=com_uddeim&task=settings&Itemid=".$item_id);
}

// *****************************************************************************************

function uddeIMshowAbout($myself, $item_id, $versionstring, $config) {
	// write the uddeim menu
	uddeIMprintMenu($myself, 'about', $item_id, $config);
	echo "<div id='uddeim-m'>\n";
	echo "<div id='uddeim-bottomlines'>\n";
	echo "<p><b>uddeIM (Instant Messsages)</b></p>";
	echo "<p>".$versionstring."</p>\n";
	echo "<p>PMS component for Joomla 1.0, Joomla 1.5 and Mambo 4.5<br />";
	echo "&copy; 2007-2008 Stephan Slabihoud, &copy; 2005-2006 by Benjamin Zweifel</p>\n";

	echo "<p>This is free software and you may redistribute it under the GPL.<br />";
	echo "uddeIM comes with absolutely no warranty. For details, see the license at <a href='http://www.gnu.org/licenses/gpl.txt'>www.gnu.org/licenses/gpl.txt</a>.</p>\n";
	echo "<p>For the latest uddeIM version, go to<br /><a href='http://www.joomla.org/'>http://www.joomla.org/</a></p>\n";
	echo "</div>\n";
	echo "</div>\n";
	echo "<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'about', 'none', $config)."</div>\n";
}

/**
 * returns userlist for autocomplete functionality
 * @since J!1.5 - uddeim 0.9b+ 2007-11-21
 * @author zenny
 */
function uddeIMcompleteUserName($myself, $config){
	// look for json encoding abilities, first native php, then global pear package, then local pear copy (switched by joomla version again)
	if (!function_exists('json_encode') && !class_exists('Services_JSON')) {
		if ( !@include_once('JSON.php') ) {
			require_once( uddeIMgetPath('absolute_path').'/components/com_uddeim/json.php' );
		}
	}

	$db = uddeIMgetDatabase();

	// get and filter input (switch for jjoom and joom again)
	$input = trim( class_exists('JRequest') ? JRequest::getVar('value') : uddeIMmosGetParam($_REQUEST, 'value', '') );
//	$input = rawurldecode($input);
//	$input = utf8_decode($input);
//	if (!class_exists('JFilterInput'))
	if (function_exists('iconv'))
		$input=iconv('UTF-8',$config->charset,$input);

	if (class_exists('JFilterInput'))
		$input = JFilterInput::clean($input, 'username');
	else
		$input = (string) preg_replace( '/[\x00-\x1F\x7F<>"\'%&]/', '', $input );

	// do not fetch stuff from db if request is faulty in any way or empty, but return an blank result set
	if ( strlen($input) == 0){
		$results = Array();
	} else {
		$fieldToUse = $config->realnames ? 'name' : 'username';
		// NOTE: modify the input quote to extend wildcard matching
		if ($myself) {
			$my_gid = uddeIMgetGID((int)$myself);
			$hide2 = "";
			if ($config->blockgroups && $my_gid!=24 && $my_gid!=25)
				$hide2 = "AND gid NOT IN (".uddeIMquoteSmart($config->blockgroups).") ";
			$query = sprintf( 'SELECT %1$s AS displayname FROM `#__users` WHERE `block` = 0 AND %1$s LIKE %2$s '.$hide2.'ORDER BY %1$s LIMIT 50'
								, $db->nameQuote( $fieldToUse )
								, $db->Quote( ($config->searchinstring ? '%' : '').$input.'%' )
							);
		} else {
			$hide2 = "";
			if ($config->pubblockgroups)
				$hide2 = "AND a.gid NOT IN (".uddeIMquoteSmart($config->pubblockgroups).") ";
			$query = sprintf( 'SELECT a.%1$s AS displayname FROM `#__users` AS a, `#__uddeim_emn` AS b WHERE a.id=b.userid AND b.public=1 AND a.block=0 AND a.%1$s LIKE %2$s '.$hide2.'ORDER BY a.%1$s LIMIT 50'
								, $db->nameQuote( $fieldToUse )
								, $db->Quote( ($config->pubsearchinstring ? '%' : '').$input.'%' )
							);
		}
		$db->setQuery( $query );
		$results = $db->loadObjectList();
	}
	$items = Array();

	$use_jason = 1;
	$use_xml = 0;
	if ($use_jason) {		// - old style uddeIM 1.1
		// assign results
		foreach ( $results as $item ) {
			// on some systems "rawurlencode" makes troubles, so special characters are displayed wrong, if this happens, remove this function
	//		$temp = iconv($config->charset,'UTF-8',$temp);
	//		$temp = ($item->displayname);			// works in J1.5
			$temp = $item->displayname;
			if (function_exists('iconv'))
				$temp = iconv($config->charset,'UTF-8',$temp);	// fix for 1.2
			$items[] = rawurlencode($temp);	// works in J1.0 - uddeIM 1.1 style
		}

		// encode to json and print, using available methods
		if (function_exists('json_encode'))
			echo json_encode($items);
		else{
			$json = new Services_JSON();
			echo $json->encode($items);
		}
	}
	if ($use_xml) {
		$i = 0;
		foreach ( $results as $item ) {
			$temp = $item->displayname;
			if (function_exists('iconv'))
				$temp = iconv($config->charset,'UTF-8',$temp);
			$items[] = array( "id"=>($i+1) ,"value"=>rawurlencode($temp), "info"=>rawurlencode("") );
			$i++;
		}
		header ("Expires: Mon, 26 Jul 1997 01:00:00 GMT"); // Date in the past
		header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
		header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
		header ("Pragma: no-cache"); // HTTP/1.0
		header ("Content-Type: application/json");
		echo "[";
		$arr = array();
		for ($i=0;$i<count($items);$i++)
			$arr[] = "\"".$items[$i]['value']."\"";
//			$arr[] = "{\"id\": \"".$items[$i]['id']."\", \"value\": \"".$items[$i]['value']."\", \"info\": \"\"}";
		echo implode(", ", $arr);
		echo "]";
	}
}

function uddeIMajaxGetNewMessages($myself, $config){
	$db = uddeIMgetDatabase();

	$input = trim( class_exists('JRequest') ? JRequest::getVar('value') : uddeIMmosGetParam($_REQUEST, 'value', '') );
	if (function_exists('iconv'))
		$input = iconv('UTF-8',$config->charset,$input);

	if (class_exists('JFilterInput'))
		$input = JFilterInput::clean($input, 'username');
	else
		$input = (string) preg_replace( '/[\x00-\x1F\x7F<>"\'%&]/', '', $input );

	$sql="SELECT count(a.id) FROM #__uddeim AS a WHERE a.totrash=0 AND a.toread=0 AND a.toid=".(int)$myself;
	$db->setQuery($sql);
	$result=(int)$db->loadResult();
	echo $result;
}
