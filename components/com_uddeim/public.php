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

// for the public frontend we have
// all libs
// the configuration file
// the language file
//
// Note: $my->id is ZERO
//
// all REQUEST vars must be evaluated here for security reasons

function uddeIMpublicFrontend($versionstring, $pathtouser, $config) {
	// not required since I do this in uddeim.php now
	//	session_start();

	$Itemid 	= uddeIMmosGetParam( $_REQUEST, 'Itemid');
	if (!$Itemid || !isset($Itemid) || empty( $Itemid )) {
		$Itemid = uddeIMgetItemid($config);
	} else if ($config->overwriteitemid) {
		$Itemid = (int)$config->useitemid;
	}

	$item_id	= (int) $Itemid;
	$task		= uddeIMmosGetParam( $_REQUEST, 'task', 'inbox');	// task is publicnew or publicsave

	$recip		= (int) uddeIMmosGetParam ( $_REQUEST, 'recip');				// f�r blocking nach ID and new message
	$runame		= uddeIMmosGetParam ( $_REQUEST, 'runame');	// f�r blocking nach NAME and new message

	$to_id		= (int) uddeIMmosGetParam ($_POST, 'to_id');
	$to_name	= uddeIMmosGetParam ($_POST, 'to_name');
	$fromname	= uddeIMmosGetParam ($_POST, 'from_name');
	$fromemail	= uddeIMmosGetParam ($_POST, 'from_email');
	$pmessage	= strip_tags(uddeIMmosGetParam($_POST, 'pmessage', '', _MOS_ALLOWHTML));
	$spamtrap	= uddeIMmosGetParam ($_POST, 'city');
	if ($spamtrap)
		$task = "spamtrap";

	$sendeform_showallusers = uddeIMmosGetParam ($_POST, 'sendeform_showallusers', '');
	$backto			= uddeIMmosGetParam ($_POST, 'backto');

	// load template css file
	if(!$config->templatedir) {
		$config->templatedir="default";
	}
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
	} elseif (stristr($used_browser, "Safari")) {
		$css_appendix="-safari";
	} elseif (stristr($used_browser, "Safari/100")) {
		$css_appendix="-safari100";
		$css_alternative="-safari";
	} elseif (stristr($used_browser, "Safari/85")) {
		$css_appendix="-safari85";
		$css_alternative="-safari";
	} elseif (stristr($used_browser, "Konqueror")) {
		$css_appendix="-konq";
	} elseif (stristr($used_browser, "Konqueror/2")) {
		$css_appendix="-konq2";
		$css_alternative="-konq";
	} elseif (stristr($used_browser, "Konqueror/3")) {
		$css_appendix="-konq3";
		$css_alternative="-konq";
	}

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

		if ($config->pubuseautocomplete) {
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
		echo "<div id='uddeim'><div id='uddeim-topborder'></div>\n";
	}
	// fork according to task
	switch ($task) {
		case 'completeUserName':
			uddeIMcompleteUserName(0, $config);
			break;
		case "spamtrap":
			uddeIMprintPublicMenu($item_id, $config);
			echo "<div id='uddeim-m'>\n<div id='uddeim-bottomlines'>\n";
			echo "<p><b>"._UDDEIM_PUBLICSENT."</b></p>";
			echo "</div>\n</div>\n<div id='uddeim-bottomborder'></div>\n";
			break;
		case "publicsent":
			uddeIMprintPublicMenu($item_id, $config);
			echo "<div id='uddeim-m'>\n<div id='uddeim-bottomlines'>\n";
			echo "<p><b>"._UDDEIM_PUBLICSENT."</b></p>";
			echo "</div>\n</div>\n<div id='uddeim-bottomborder'></div>\n";
			break;
		case "publicsave":
			uddeIMpublicSaveMessage($fromname, $fromemail, $to_name, $to_id, $pmessage, $item_id, $sendeform_showallusers, $backto, $config);
			break;
		case "publicnew":
		default:
			uddeIMpublicNewMessage($item_id, $to_id, $recip, $runame, $pmessage, $config);
			break;
	}

	if (!$omitDefaultOutput){
		echo "</div>\n";		// </div id='uddeim'>
		echo "<!-- ".$versionstring." output above -->\n";
	}
}

// *****************************************************************************************

function uddeIMpublicSaveMessage($fromname, $fromemail, $to_name, $to_id, $pmessage, $item_id, $sendeform_showallusers, $backto, $config) {
	$database = uddeIMgetDatabase();

	$to_name_bak = $to_name;		// save all already typed in names

	if(!$to_id && !$to_name && $sendeform_showallusers!=2) {
		// write the uddeim menu
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 5, $config);
		return;
	}

	if($sendeform_showallusers) {	// =2, click on button / =1, keep on showing
		// write the uddeim menu
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 1, $config);
		return;
	}

	// do not allow multiple recipients from public frontend
	$to_name = trim($to_name);
	$fromname = trim($fromname);
	$fromemail = trim($fromemail);

	if(!$fromname) {
		// write the uddeim menu
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 12, $config);
		return;
	}

	// When there is an email address this must be valid
	if ($fromemail && !preg_match("/\b[a-z0-9!#$%&'*+\/=?^_`{|}-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum)\b/i", $fromemail)) {
		// write the uddeim menu
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 13, $config);
		return;
	}

	$to_id = uddeIMgetIDfromNamePublic($to_name, $config, true);	// add "AND block=0"
	// BUGBUG: Maybe it is a good idea to do the query vice versa (so I could add a query for "realname"s here)
	if (!$to_id) { // no user with this name found, so try again with username (maybe we do the query twice (see query above, but who cares)
		if ($config->pubrealnames) {
			$to_id = uddeIMgetIDfromUsername($to_name, true);		// add "AND block=0"
		}
	}

	if(!$to_id) { // no user with this username found
		// display to form again so that the user can correct his/her fault
		// the wrong name is displayed in brackets (add brackets only once)
		if (substr($to_name,0,1)!="(") {
			$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
		}
		// write the uddeim menu
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 3, $config);
		return;
	}

	// now check group blocking
	$is_group_blocked = uddeIMisRecipientBlockedPublic($to_id, $config);
	if ($is_group_blocked) {
		if (substr($to_name,0,1)!="(") {
			$to_name = str_replace($to_name, "(".$to_name.")", $to_name_bak);
		}
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 10, $config);
		return;
	}

	if(!$pmessage) {
		// write the uddeim menu
		$to_name = $to_name_bak;
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 4, $config);
		return;
	}

	// check if user allows public access (this check must be done after group blocking, because the admin can block a certain group and the user cannot longer decide if he allows the public frontend or not)
	$ispublic = uddeIMgetEMNpublic($to_id);
	if (!$ispublic) {		// user does not allow public messages
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 8, $config);
		return;
	}
			
	// CAPTCHA (first check for all other errors and then the CAPTCHA)
	if ($config->usecaptcha>=1) {		// CAPTCHA is enabled for public frontend

		if (class_exists('JFactory')) {
			// CAPTCHA15
			$session =& JFactory::getSession();
			$_SESSION['security_code'] = $session->get('security_code');	// so I do not need to modify saveMessage code
		} else {
			// CAPTCHA10
			session_start();
		}

		if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
			// CAPTCHA is correct, so unset security code
			if (class_exists('JFactory')) {
				$session =& JFactory::getSession();
				$session->set('security_code', null);
			} else {
				unset($_SESSION['security_code']);
			}
		} else {
			// wrong captcha, so write the uddeim menu
			$to_name = $to_name_bak;
			uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 7, $config);
			return;
		}
	}

	if (!uddeIMcheckCSRF($config)) {
		$to_name = $to_name_bak;
		uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, 15, $config);
		return;
	}

	$savedatum  = uddetime($config->timezone);
	$savetoid   = $to_id;
	$savefromid = 0;			// This is '0' in public frontend

	// CRYPT
	if ($config->cryptmode==1 || $config->cryptmode==2) {
		$savemessage=strip_tags($pmessage);
	} else {
		$savemessage=addslashes(strip_tags($pmessage));   // original 0.6+
	}

	// strip bbcodes
	if (!$config->allowbb) {
		$savemessage=uddeIMbbcode_strip($savemessage);
	}

	// set message max length
	if ($config->maxlength>0) { // because if 0 do not use any maxlength
		$savemessage=substr($savemessage, 0, $config->maxlength);
	}

	$fromname=addslashes(strip_tags($fromname));
	$fromemail=addslashes(strip_tags($fromemail));

	// we have all we need, now save it
	// CRYPT
	if ($config->cryptmode==1 || $config->cryptmode==2) {					// do not allow individual encryption
		$cm = uddeIMencrypt($savemessage,$config->cryptkey,CRYPT_MODE_BASE64);
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrashoutbox, totrashdateoutbox, cryptmode, crypthash) VALUES ('".$fromname."', '".$fromemail."', ".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,".$savedatum.",1,'".md5($config->cryptkey)."')";
	} elseif ($config->cryptmode==3) {
		$cm = uddeIMencrypt($savemessage,"",CRYPT_MODE_STOREBASE64);
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrashoutbox, totrashdateoutbox, cryptmode) VALUES ('".$fromname."', '".$fromemail."', ".(int)$savefromid.", ".(int)$savetoid.", '".$cm."', ".$savedatum.",1,".$savedatum.",3)";
	} else {
		$sql="INSERT INTO #__uddeim (publicname, publicemail, fromid, toid, message, datum, totrashoutbox, totrashdateoutbox) VALUES ('".$fromname."', '".$fromemail."', ".(int)$savefromid.", ".(int)$savetoid.", '".$savemessage."', ".$savedatum.",1,".$savedatum.")";
	}
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to save a message" . $database->stderr(true));
	}

	// Check if E-Mail notification or popups are enabled by default, if so create a record for the receiver.
	// Note: Not necessary for "copy to myself" sind the record for the current user has been set at the very beginning...
	if ($config->notifydefault>0 || $config->popupdefault>0 || $config->pubfrontenddefault>0) {
		if (!uddeIMexistsEMN($savetoid))
			uddeIMinsertEMNdefaults($savetoid, $config);
	}

	// e-mail notification code
	// is the receiver currently online?
	$currentlyonline = uddeIMisOnline($savetoid);

	if($config->allowemailnotify==1) {
		$ison = uddeIMgetEMNstatus($savetoid);
		if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10) || ($ison==20 && !$currentlyonline))  {
			uddeIMpublicDispatchEMN($fromname, $savetoid, $savemessage, 0, $config);
			// 0 stands for normal (not forgetmenot)
		}
	} elseif($config->allowemailnotify==2) {
		$my_gid = uddeIMgetGID((int)$savetoid);
		if ($my_gid==24||$my_gid==25) {
			$ison = uddeIMgetEMNstatus($savetoid);
			if (($ison==1) || ($ison==2 && !$currentlyonline) || ($ison==10) || ($ison==20 && !$currentlyonline))  {
				uddeIMpublicDispatchEMN($fromname, $savetoid, $savemessage, 0, $config);
				// 0 stands for normal (not forgetmenot)
			}
		}
	}

	$mosmsg=_UDDEIM_MESSAGE_SENT;
	uddeJSEFredirect("index.php?option=com_uddeim&task=publicsent&Itemid=".$item_id, $mosmsg);
}

// *****************************************************************************************

function uddeIMpublicDispatchEMN($var_fromname, $var_toid, $var_message, $emn_option, $config) {
	$mosConfig_sitename = uddeIMgetSitename();

	// if e-mail traffic stopped, don't send.
	if(!$config->emailtrafficenabled) {
		return;
	}

	$fromname = $var_fromname;
	if (!$fromname)
		$fromname = _UDDEIM_PUBLICUSER;

//	$ret = uddeIMgetNameEmailFromID($var_toid, $var_toname, $var_tomail, $config);
	$var_toname = uddeIMgetNameFromID($var_toid, $config);
	$var_tomail = uddeIMgetEMailFromID($var_toid, $config);

	if(!$var_tomail)
		return;
	if (!$var_toname)
		$var_toname = "Anonymous";

	if($emn_option==1) {
		$var_body=_UDDEIM_EMN_FORGETMENOT;
		$var_body=str_replace("%you%", $var_toname, $var_body);
		$var_body=str_replace("%site%", $mosConfig_sitename, $var_body);
	} else {
		if($config->emailwithmessage) {
			$var_body=_UDDEIM_EMN_BODY_WITHMESSAGE;
			$var_body=str_replace("%you%", $var_fromname, $var_body);
			$var_body=str_replace("%site%", $mosConfig_sitename, $var_body);
			$var_body=str_replace("%user%", $var_toname, $var_body);
			$var_body=str_replace("%pmessage%", $var_message, $var_body);
		} else {
			$var_body=_UDDEIM_EMN_BODY_NOMESSAGE;
			$var_body=str_replace("%you%", $var_toname, $var_body);
			$var_body=str_replace("%site%", $mosConfig_sitename, $var_body);
			$var_body=str_replace("%user%", $var_fromname, $var_body);
		}
	}

	$subject=_UDDEIM_EMN_SUBJECT;
	$subject=str_replace("%site%", $mosConfig_sitename, $subject);
	$header = "Reply-To: ".$var_tomail."\n";

	if(uddeIMsendmail($config->emn_sendername, $config->emn_sendermail, $var_toname, $var_tomail, $subject, $var_body, $header, $config)) {
		// set the remindersent status of this user to true
		if(!uddeIMexistsEMN($var_toid))
			uddeIMinsertEMNdefaults($var_toid, $config);
		uddeIMupdateEMNreminder($var_toid, uddetime($config->timezone));
	}
}

// *****************************************************************************************

function uddeIMpublicNewMessage($item_id, $to_id, $recip, $runame, $pmessage, $config) {

	$recipname="";
	if($recip) {
		$recipname = uddeIMgetNameFromID($recip, $config);
	} elseif ($runame) {
		$recipname = uddeIMgetNameFromID($runame, $config);
	}

	// write the uddeim menu
	uddeIMprintPublicMenu($item_id, $config);
	echo "<div id='uddeim-m'>\n";

	// which page did refer to this page?
	// because we want to send back the user where (s)he came from
	$tbackto = uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
	if(stristr($tbackto, "com_pms")) {
		$tbackto="";
	}
	uddeIMdrawPublicWriteform($item_id, $tbackto, "", "", $recipname, $pmessage, 0, $config); // isreply, errorcode, sysmsg
	echo "</div>\n<div id='uddeim-bottomborder'></div>\n";
}

function uddeIMdoPublicShowAllUsers($config) {						
	$database = uddeIMgetDatabase();

	$hide = "";
	if ($config->pubhideusers)
		$hide = "AND a.id NOT IN (".uddeIMquoteSmart($config->pubhideusers).") ";

	$hide2 = "";
	if ($config->pubblockgroups)
		$hide2 = "AND gid NOT IN (".uddeIMquoteSmart($config->pubblockgroups).") ";

	switch ($config->pubhideallusers) {
		case 3:		// special users
			$sql="SELECT a.".($config->pubrealnames ? "name" : "username")." AS displayname FROM #__users AS a, #__uddeim_emn AS b WHERE a.id=b.userid AND b.public=1 AND a.block=0 AND gid NOT IN (19,20,21,23,24,25) ".$hide.$hide2."ORDER BY a.".($config->pubrealnames ? "name" : "username");
			break;
		case 2:		// admins
			$sql="SELECT a.".($config->pubrealnames ? "name" : "username")." AS displayname FROM #__users AS a, #__uddeim_emn AS b WHERE a.id=b.userid AND b.public=1 AND a.block=0 AND gid NOT IN (24,25) ".$hide.$hide2."ORDER BY a.".($config->pubrealnames ? "name" : "username");
			break;
		case 1:		// superadmins
			$sql="SELECT a.".($config->pubrealnames ? "name" : "username")." AS displayname FROM #__users AS a, #__uddeim_emn AS b WHERE a.id=b.userid AND b.public=1 AND a.block=0 AND gid NOT IN (25) ".$hide.$hide2."ORDER BY a.".($config->pubrealnames ? "name" : "username");
			break;
		default:	// none
			$sql="SELECT a.".($config->pubrealnames ? "name" : "username")." AS displayname FROM #__users AS a, #__uddeim_emn AS b WHERE a.id=b.userid AND b.public=1 AND a.block=0 ".$hide.$hide2."ORDER BY a.".($config->pubrealnames ? "name" : "username");
			break;
	}

	$database->setQuery($sql);
	$rows=$database->loadObjectList();
	if (count($rows)>0) {
		$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\" onchange=\"document.sendeform.to_name.value=document.sendeform.userlist.value; return false;\">";
		$allnames.="<option value=\"\">&nbsp;</option>";
		foreach ($rows as $row)
			$allnames.="<option value=\"".$row->displayname."\">".$row->displayname."</option>";
		$allnames.="</select>";
		echo _UDDEIM_USERLIST."<br />";
		echo $allnames;
	}
}

function uddeIMpublicMenuWriteform($item_id, $fromname, $fromemail, $to_name, $pmessage, $error, $config) {
	uddeIMprintPublicMenu($item_id, $config);
	echo "<div id='uddeim-m'>\n";
	$fromname=stripslashes($fromname);
	$fromemail=stripslashes($fromemail);
	$to_name=stripslashes($to_name);
	$pmessage=stripslashes($pmessage);
	uddeIMdrawPublicWriteform($item_id, "", $fromname, $fromemail, $to_name, $pmessage, $error, $config);
	echo "</div>\n<div id='uddeim-bottomborder'></div>\n";
}

function uddeIMprintPublicMenu($item_id, $config) {
	$pathtosite  = uddeIMgetPath('live_site');

	if($config->showtitle)
		echo "<div class='contentheading'>".$config->showtitle."</div>";
	echo "\n<div id='uddeim-navbar2'><ul>\n";

	echo "<li>";
	if($config->showmenuicons) {
		echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=publicnew&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_new.gif' border='0' alt='"._UDDEIM_COMPOSE."' /></a>";
	}
	echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=publicnew&Itemid=".$item_id)."'>"._UDDEIM_COMPOSE."</a>";
	echo "</li>\n";

//	echo "<li class='uddeim-activemenu'>";
//	if($config->showmenuicons)
//		echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_new.gif' />";
//	echo _UDDEIM_COMPOSE;
//	echo "</li>\n";
	echo "</ul></div>\n";
}

function uddeIMdrawPublicWriteform($item_id, $backto, $fromname, $fromemail, $recipname, $pmessage, $dwf_errorcode, $config) {
	$pathtouser  = uddeIMgetPath('user');
	$pathtosite  = uddeIMgetPath('live_site');

	// possible values for dwf_errorcode:
	// 0 = no error
	// 1 = no error, show complete userlist
	// 2 = don't send to yourself
	// 3 = username not found
	// 4 = no message
	// 5 = no username
	// 6 = too many recipients
	// 7 = wrong captcha code
	// 8 = does not allow public messages
	// 9 = one user has blocked you
	// 10 = sending to this group not allowed
	// 11 = contact list not found
	// 12 = error in from name
	// 13 = error in from email
	// 14 = time delay for spam protection
	// 15 = csrf protection

	// This functions expects values stripslashed

	echo "<div id='uddeim-writeform'>\n";
	echo "<form name='sendeform' method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=publicsave&Itemid=".$item_id)."'>\n";
	echo "<input type='hidden' name='sendeform_showallusers' value='' />\n";
	uddeIMwriteCSRF($config);

	if($dwf_errorcode==0 && $backto) {
		echo "<input type='hidden' name='backto' value='".$backto."' />\n";
	}

	echo "<table width='100%' cellspacing='0' cellpadding='0'>";

// START SENDER LINE IN TABLE
	echo "<tr><td colspan='2' valign='top'>"._UDDEIM_YOURNAME."<br />";
	$errorstyle='';
	if($dwf_errorcode==12)
		$errorstyle='style="background-color: #ff0000;" ';

	echo "<input type='text' ".$errorstyle."name='from_name' value='".htmlentities($fromname, ENT_QUOTES, $config->charset)."' /></td></tr>";

// START SENDER EMAIL LINE IN TABLE
	echo "<tr><td colspan='2' valign='top'>"._UDDEIM_YOUREMAIL."<br />";
	$errorstyle='';
	if($dwf_errorcode==13)
		$errorstyle='style="background-color: #ff0000;" ';
	echo "<input type='text' ".$errorstyle."name='from_email' value='".htmlentities($fromemail, ENT_QUOTES, $config->charset)."' /></td></tr>";

// START FIRST LINE IN TABLE (contains two fields: TO USER and select from ALL USER list)
	echo "<tr><td valign='top'>"._UDDEIM_TODP."<br />";

	if($dwf_errorcode==2 || $dwf_errorcode==3 || $dwf_errorcode==5 || 
	   $dwf_errorcode==6 || $dwf_errorcode==8 || $dwf_errorcode==9 || 
	   $dwf_errorcode==10 || $dwf_errorcode==11) {
		$errorstyle='style="background-color: #ff0000;" ';
	} else {
		$errorstyle='';
	}

	if (!($config->flags & 0x04))
		echo "<input type='text' ".$errorstyle."name='to_name' id='input_to_name' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";
	else
		echo "<input type='text' disabled='disabled' ".$errorstyle."style='color:gray;' name='to_name' id='input_to_name' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";

	if ($config->pubuseautocomplete) {
		uddeIMdoAutocomplete($config);
	}

// SECOND FIELD IN FIRST LINE IN TABLE
	echo "</td><td valign='top' align='right'>\n";
	if (!($config->flags & 0x01)) {
		if ($config->pubmodeshowallusers==1 || $config->pubmodeshowallusers==2) {
			if ($dwf_errorcode==0 && $config->pubmodeshowallusers==1) {
				// link to drop down box with names of connected users, value is 2 since it is shown the first time (so selecting the link does not show an error message because of an empty recipient field)
				echo "<br />";
				echo "<a href=\"#\" onclick=\"document.sendeform.sendeform_showallusers.value='2'; document.sendeform.submit(); return false;\">"._UDDEIM_SHOWUSERS."</a>";
			} else { // now show all users
				uddeIMdoPublicShowAllUsers($config);
			}
		}
	}
	echo "</td></tr>";
// START SECOND LINE IN TABLE (colspan=2)
	if ($dwf_errorcode==3) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_NOSUCHUSER."</td></tr>";
	} elseif ($dwf_errorcode==2) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_NOTTOYOURSELF."</td></tr>";
	} elseif ($dwf_errorcode==5) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_ENTERNAME."</td></tr>";
	} elseif ($dwf_errorcode==6) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_TOOMANYRECIPIENTS."</td></tr>";
	} elseif ($dwf_errorcode==7) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_WRONGCAPTCHA."</td></tr>";
	} elseif ($dwf_errorcode==8) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_NOPUBLICMSG."</td></tr>";
	} elseif ($dwf_errorcode==9) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_ONEUSERBLOCKS."</td></tr>";
	} elseif ($dwf_errorcode==10) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_GROUPBLOCKED."</td></tr>";
	} elseif ($dwf_errorcode==11) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_NOSUCHLIST."</td></tr>";
	} elseif ($dwf_errorcode==12) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_ERRORINFROMNAME."</td></tr>";
	} elseif ($dwf_errorcode==13) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_ERRORINEMAIL."</td></tr>";
	} elseif ($dwf_errorcode==14) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_YOUHAVETOWAIT."</td></tr>";
	} elseif ($dwf_errorcode==15) {
		echo "<tr><td valign=left colspan=2>"._UDDEIM_ERRORCSRF."</td></tr>";
	}
	echo "</table>";
	echo "<br />";

	if($config->showtextcounter && $config->maxlength) {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".$pathtosite."/components/com_uddeim/js/uddeimtools.js\"></script>\n";
	}

	if($config->allowbb || $config->allowsmile) {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".$pathtosite."/components/com_uddeim/js/bbsmile.js\"></script>\n";
		uddeIMdoSmileysEx($config);
		uddeIMdoBB($config);
		uddeIMdoSmileys($config);
	}

	$errorstyle='';
	echo "<span".$errorstyle.">"._UDDEIM_MESSAGE."</span>";
	echo "<br />";

	if($dwf_errorcode==4) {
		$errorstyle="style='background-color: #ff0000;' ";
	} else {
		$errorstyle="";
	}

	if($config->showtextcounter && $config->maxlength) {
		$uc = ($config->showtextcounter) ? "textCount(document.sendeform.pmessage,document.sendeform.characterstyped,".$config->maxlength.");" : "";
		echo "<textarea name='pmessage' ".$errorstyle."class='inputbox' rows='10' cols='60' onkeydown='".$uc."' onkeyup='".$uc."'>".$pmessage."</textarea>";
		echo "<br />";
		echo "<input style='background-color: lightgray;' readonly='readonly' type='text' name='characterstyped' size='4' maxlength='4' value='".$config->maxlength."' /> "._UDDEIM_CHARSLEFT;
	} else {
		echo "<textarea name='pmessage' ".$errorstyle."class='inputbox' rows='10' cols='60'>".$pmessage."</textarea>";
	}
	echo "<br />";

	if ($config->usecaptcha>=1) {
		// CAPTCHA
		if($dwf_errorcode==7) {
			$errorstyle='style="background-color: #ff0000;" ';
		} else {
			$errorstyle='';
		}
		echo "<label for='security_code'>Security Code: </label><input id='security_code' name='security_code' type='text' ".$errorstyle." />&nbsp;";

		if (class_exists('JFactory')) {
			// CAPTCHA15
			echo "<img style='vertical-align:middle;' src='".$pathtosite."/components/com_uddeim/captcha15.php' /><br />";
		} else {
			// CAPTCHA10
			echo "<img style='vertical-align:middle;' src='".$pathtosite."/components/com_uddeim/captcha.php' /><br />";
		}
	}

	echo "<br />";
	echo "<input type='submit' name='reply' class='button' value='"._UDDEIM_SUBMIT."' />&nbsp;";
	echo "<span id='city' style='visibility:hidden;'><input type='text' name='city' value='' /></span>\n";

	echo "</form>\n";
	echo "</div>\n"; // end of uddeim-writeform
}
