<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMcheckCAPTCHA($my_gid, $config) {
	// CAPTCHA (first check for all other errors and then the CAPTCHA)
	if ( $config->usecaptcha>=4 ||													// all users (incl. admins)
		($config->usecaptcha==3 && in_array($my_gid,array(0,18,19,20,21,23))) ||	// CAPTCHA enabled for public frontend, registered and special users
		($config->usecaptcha==2 && in_array($my_gid,array(0,18))) ) {				// CAPTCHA enabled for public frontend and registered users (note: 0 is not required since this is done in public.php)

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
			return false;
		}
	}
	return true;
}

function uddeIMwriteCSRF($config) {
	if ($config->csrfprotection) {
		$code = md5(uniqid(rand(),true));
		if (class_exists('JFactory')) {
			$session =& JFactory::getSession();
			$session->set('csrf_code', $code);
		} else {
			session_start();
			$_SESSION['csrf_code'] = $code;
		}
		echo "<input type='hidden' name='csrf_token' value='".$code."' />";
	}
}

function uddeIMcheckCSRF($config) {
	if ($config->csrfprotection) {
		if (class_exists('JFactory')) {
			$session =& JFactory::getSession();
			$_SESSION['csrf_code'] = $session->get('csrf_code');	// so I do not need to modify saveMessage code
		} else {
			session_start();
		}
		if( $_SESSION['csrf_code'] == $_POST['csrf_token'] && !empty($_SESSION['csrf_code'] ) ) {
			if (class_exists('JFactory')) {
				$session =& JFactory::getSession();
				$session->set('csrf_code', null);
			} else {
				unset($_SESSION['csrf_code']);
			}
		} else {
			return false;
		}
	}
	return true;
}

function uddeIMsendmail($fromname, $frommail, $toname, $tomail, $subject, $message, $addheaders, $config) {
	$mosConfig_sitename = uddeIMgetSitename();
	$ret = false;

	$header  = "From: \"".$fromname."\" <".$frommail.">\n";
	$header .= "Organization: ".$mosConfig_sitename."\n";
	$header .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.8.1.6) Gecko/20070728 Thunderbird/2.0.0.6\n";
	$header .= "MIME-Version: 1.0\n";
	$header .= "Content-type: text/plain; charset=".uddeIMgetCharsetMailalias($config->mailcharset)."\n";
	$header .= "Content-Transfer-Encoding: 8bit\n";

//	$header  = "MIME-Version: 1.0\n";
//	$header .= "Content-type: text/plain; charset=".uddeIMgetCharsetMailalias($config->mailcharset)."\n";
//	$header .= "Organization: ".$mosConfig_sitename."\n";
//	$header .= "Content-Transfer-Encoding: 8bit\n";
//	$header .= "From: \"".$fromname."\" <".$frommail.">\n";
//	$header .= "Message-ID: <".md5(uniqid(uddetime($config->timezone)))."@{$_SERVER['SERVER_NAME']}>\n";
//	$header .= "Return-Path: ".$frommail."\n";            
//	$header .= "X-Priority: 3\n"; 
//	$header .= "X-MSmail-Priority: Low\n"; 
//	$header .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\n";
//	$header .= "X-Sender: ".$frommail."\n";
	$header .= $addheaders;

	if ($config->mailsystem==1) {			// mosMail
		$ret = uddeIMmosMail($frommail, $fromname, $tomail, $subject, $message, false);
	} else {								//php mail
		$ret = @mail($tomail,$subject,$message,$header);
	}
	return $ret;
}

function uddeIMisPublicUser($name, $id) {
	if ($name==NULL && !$id)
		return 1;
	return 0;
}

function uddeIMisDeletedUser($name, $id) {
	if ($name==NULL && $id)
		return 1;
	return 0;
}

function uddeIMevaluateUsername($fromname, $fromid, $publicname) {
	$back = NULL;
	if ($fromname==NULL && !$fromid) {
		if (!$publicname || $publicname==NULL)
			$back = _UDDEIM_PUBLICUSER;
		else
			$back = $publicname;
	} elseif ($fromname==NULL) {
		if (!$publicname || $publicname==NULL)			// maybe we have the original name still stored here
			$back = _UDDEIM_DELETEDUSER;
		else
			$back = $publicname;
	} else
		$back = $fromname;
	return $back;
}

function uddeIMisRecipientBlockedPublic($toid, $config) {
	$togid = -1;		// default group (uddeim intern) for public users
	if ($toid)			// we have an id, so get group for this user
		$togid = (int)uddeIMgetGID($toid);
	if (!$togid)
		$togid = -1;	// we could not find a group, so assume it is a Public user
	$acl = explode(",",$config->pubblockgroups);
	if (!is_array($acl))
		$acl = array();

	$blocked = 0;
	if (in_array($togid, $acl)) {	// either we have a recipient GID or recipient is a Public user (GID=-1), so we check if this user is blocked
		$blocked = 1;				// yes, it is
	}
	return $blocked;
}

function uddeIMisRecipientBlockedReg($myself, $toid, $config) {
	$database = uddeIMgetDatabase();
	$togid = -1;		// default group (uddeim intern) for public users
	if ($toid)			// we have an id, so get group for this user
		$togid = (int)uddeIMgetGID($toid);
	if (!$togid)
		$togid = -1;	// we could not find a group, so assume it is a Public user
	$acl = explode(",",$config->blockgroups);
	if (!is_array($acl))
		$acl = array();

	$blocked = 0;
	if (in_array($togid, $acl)) {	// either we have a recipient GID or recipient is a Public user (GID=-1), so we check if this user is blocked
		$blocked = 1;				// yes, it is
	}

	if ($blocked && $config->unblockCBconnections) {	// unblock CB connections?
		if (uddeIMcheckCB()) {							// do we have CB installed?
			// Am I on the recipients user list?
			$sql = "SELECT count(m.memberid) FROM #__comprofiler_members AS m, #__users AS u WHERE m.memberid=u.id AND u.block=0 AND m.referenceid=".(int)$toid." AND m.memberid=".(int)$myself;
			$database->setQuery($sql);
			$friends=(int)$database->loadResult();	// this person might be on the connections list
			if (!$friends) { 					// not on CB, maybe on CBE?
				if (file_exists(uddeIMgetPath('absolute_path').'/administrator/components/com_comprofiler/enhanced_admin/enhanced_config.php')) {
					$sql="SELECT count(m.buddyid) FROM #__comprofiler_buddylist AS m, #__users AS u WHERE m.buddyid=u.id AND u.block=0 AND m.userid=".(int)$toid." AND m.buddyid=".(int)$myself." AND buddy='1'";
					$database->setQuery($sql);
					$friends=(int)$database->loadResult();
				}
			}
			if ($friends>0)						// yes, its on the list, so allow as recipient
				$blocked = 0;
		}
	}
	return $blocked;
}

function uddeIMmarkUnread($myself, $messageid, $limit, $limitstart, $item_id, $config) {
	uddeIMupdateToread($myself, $messageid, 0);		// previously it set also "totrash=0" which is not required
	if(!$limit && !$limitstart) {
		$redirecturl="index.php?option=com_uddeim&task=inbox&Itemid=".$item_id;
	} else {
		$redirecturl="index.php?option=com_uddeim&task=inbox&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart;
	}
	uddeJSEFredirect($redirecturl);
}

function uddeIMmarkRead($myself, $messageid, $limit, $limitstart, $item_id, $config) {
	uddeIMupdateToread($myself, $messageid, 1);
	if(!$limit && !$limitstart) {
		$redirecturl="index.php?option=com_uddeim&task=inbox&Itemid=".$item_id;
	} else {
		$redirecturl="index.php?option=com_uddeim&task=inbox&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart;
	}
	uddeJSEFredirect($redirecturl);
}

function uddeIMmarkUnflagged($myself, $messageid, $limit, $limitstart, $item_id, $ret, $config) {
	uddeIMupdateFlagged($myself, $messageid, 0);
	$task="inbox";
	if($ret=='archive' && $config->allowarchive)
		$task="archive";
	if(!$limit && !$limitstart) {
		$redirecturl="index.php?option=com_uddeim&task=".$task."&Itemid=".$item_id;
	} else {
		$redirecturl="index.php?option=com_uddeim&task=".$task."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart;
	}
	uddeJSEFredirect($redirecturl);
}

function uddeIMmarkFlagged($myself, $messageid, $limit, $limitstart, $item_id, $ret, $config) {
	uddeIMupdateFlagged($myself, $messageid, 1);
	$task="inbox";
	if($ret=='archive' && $config->allowarchive)
		$task="archive";
	if(!$limit && !$limitstart) {
		$redirecturl="index.php?option=com_uddeim&task=".$task."&Itemid=".$item_id;
	} else {
		$redirecturl="index.php?option=com_uddeim&task=".$task."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart;
	}
	uddeJSEFredirect($redirecturl);
}

function uddeIMmenuWriteform($myself, $my_gid, $item_id, $to_name, $pmessage, $error, $config) {
	uddeIMprintMenu($myself, 'new', $item_id, $config);
	echo "<div id='uddeim-m'>\n";
	$to_name=stripslashes($to_name);
	$pmessage=stripslashes($pmessage);
	uddeIMdrawWriteform($myself, $my_gid, $item_id, "", $to_name, $pmessage, "", 0, $error, 0, $config);
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
}

function uddeIMprintMenu($myself, $uddeaction, $item_id, $config) {
	$pathtosite = uddeIMgetPath('live_site');
	$my_gid = uddeIMgetGID((int)$myself);

	// write the uddeim title
	if($config->showtitle)
		echo "<div class='contentheading'>".$config->showtitle."</div>";

	// write the uddeim menu
	echo "\n<div id='uddeim-navbar2'><ul>\n";

	if($uddeaction=="inbox") {
		echo "<li class='uddeim-activemenu'>";
		if($config->showmenuicons) {
			echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_inbox.gif' alt='"._UDDEIM_INBOX."' />";
		}
		echo _UDDEIM_INBOX;
		echo "</li>\n";
	} else {
		echo "<li>";
		if($config->showmenuicons) {
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=inbox&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_inbox.gif' border='0' alt='"._UDDEIM_INBOX."' /></a>";
		}
		echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=inbox&Itemid=".$item_id)."'>"._UDDEIM_INBOX."</a>";
		echo "</li>\n";
	}

	if($uddeaction=="outbox") {
		echo "<li class='uddeim-activemenu'>";
		if($config->showmenuicons) {
			echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_outbox.gif' alt='"._UDDEIM_OUTBOX."' />";
		}
		echo _UDDEIM_OUTBOX;
		echo "</li>\n";
	} else {
		echo "<li>";
		if($config->showmenuicons) {
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=outbox&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_outbox.gif' border='0' alt='"._UDDEIM_OUTBOX."' /></a>";
		}
		echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=outbox&Itemid=".$item_id)."'>"._UDDEIM_OUTBOX."</a>";
		echo "</li>\n";
	}

	if( ($config->trashrestriction==0) ||
	    ($config->trashrestriction==1 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->trashrestriction==2 && in_array($my_gid,array(24,25))) ) {
		// ok trashcan enabled
		if($uddeaction=="trashcan") {
			echo "<li class='uddeim-activemenu'>";
			if($config->showmenuicons) {
				echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_trashcan.gif' alt='"._UDDEIM_TRASHCAN."' />";
			}
			echo _UDDEIM_TRASHCAN;
			echo "</li>\n";
		} else {
			echo "<li>";
			if($config->showmenuicons) {
				echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_trashcan.gif' border='0' alt='"._UDDEIM_TRASHCAN."' /></a>";
			}
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id)."'>"._UDDEIM_TRASHCAN."</a>";
			echo "</li>\n";
		}
	}

	if($uddeaction=="archive") {
		echo "<li class='uddeim-activemenu'>";
		if($config->showmenuicons) {
			echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_archive.gif' alt='"._UDDEIM_ARCHIVE."' />";
		}
		echo _UDDEIM_ARCHIVE;
		echo "</li>\n";
	} else {
		if($config->allowarchive) {
			echo "<li>";
			if($config->showmenuicons) {
				echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=archive&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_archive.gif' border='0' alt='"._UDDEIM_ARCHIVE."' /></a>";
			}
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=archive&Itemid=".$item_id)."'>"._UDDEIM_ARCHIVE."</a>";
			echo "</li>\n";
		}
	}

	if( ($config->enablelists==1) ||
	    ($config->enablelists==2 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->enablelists==3 && in_array($my_gid,array(24,25))) ) {
		if($uddeaction=="lists") {
			echo "<li class='uddeim-activemenu'>";
			if($config->showmenuicons) {
				echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_book.gif' alt='"._UDDEIM_LISTS."' />";
			}
			echo _UDDEIM_LISTS;
			echo "</li>\n";
		} else {
			echo "<li>";
			if($config->showmenuicons) {
				echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_book.gif' border='0' alt='"._UDDEIM_LISTS."' /></a>";
			}
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id)."'>"._UDDEIM_LISTS."</a>";
			echo "</li>\n";
		}
	}

	if($uddeaction=="settings") {
		if($config->showsettingslink==1) {
			echo "<li class='uddeim-activemenu'>";
			if($config->showmenuicons) {
				echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_settings.gif' alt='"._UDDEIM_SETTINGS."' />";
			}
			echo _UDDEIM_SETTINGS;
			echo "</li>\n";
		}
	} else {
		$showsettings = 0;
		if ($config->showsettingslink==1) {
			if ($config->pubfrontend || $config->allowpopup || $config->allowemailnotify==1 || $config->blocksystem || ($config->allowemailnotify==2 && ($my_gid==24 || $my_gid==25)))
				$showsettings = 1;
		}
		if ($showsettings) {
			echo "<li>";
			if($config->showmenuicons) {
				echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=settings&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_settings.gif' border='0' alt='"._UDDEIM_SETTINGS."' /></a>";
			}
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=settings&Itemid=".$item_id)."'>"._UDDEIM_SETTINGS."</a>";
			echo "</li>\n";
		}
	}

	if($uddeaction=="new") {
		echo "<li class='uddeim-activemenu'>";
		if($config->showmenuicons) {
			echo "<img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_new.gif' alt='"._UDDEIM_COMPOSE."' />";
		}
		echo _UDDEIM_COMPOSE;
		echo "</li>\n";
	} else {
		echo "<li>";
		if($config->showmenuicons) {
			echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=new&Itemid=".$item_id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/menu_new.gif' border='0' alt='"._UDDEIM_COMPOSE."' /></a>";
		}
		echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=new&Itemid=".$item_id)."'>"._UDDEIM_COMPOSE."</a>";
		echo "</li>\n";
	}
	echo "</ul></div>\n";
}

function uddeIMcontentBottomborder($myself, $item_id, $uddemenucontent, $messagetotal, $config) {
	$zurueck="";

	if ($uddemenucontent!="settings") {	// do not show on settings page
		$showsettings = 0;
		if ($config->showsettingslink==2) {
			$my_gid = 0;
			if ($config->allowemailnotify==2)
				$my_gid = uddeIMgetGID((int)$myself);
			if ($config->pubfrontend || $config->allowpopup || $config->allowemailnotify==1 || $config->blocksystem || ($config->allowemailnotify==2 && ($my_gid==24 || $my_gid==25)))
				$showsettings = 1;
		}
		if ($showsettings) {
			$zurueck="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=settings&Itemid=".$item_id)."'>"._UDDEIM_SETTINGS."</a> ";
		}
	}

	if($config->showabout && $uddemenucontent!="about") {
		$zurueck.="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=about&Itemid=".$item_id)."'>"._UDDEIM_ABOUT."</a> ";
	}

	// BUGBUG this is displayed when $config->showinboxlimit is enabled: Planned for future:
	// New setting: "Show inbox/archive statusline" and $config->showinboxlimit should display a percent bar at the top in "uddeim-toplines"
	if($messagetotal && $messagetotal!='none' && $config->showinboxlimit) {
		$zurueck.="<span class='uddeim-limit-bb'>".$messagetotal."</span>";
	}
	return $zurueck;
}

// *****************************************************************************************

function uddeIMreminderDispatch($item_id, $config) {
	$database = uddeIMgetDatabase();
	// send reminder if forgetmenot is activated
	if ($config->longwaitingemail && $config->longwaitingdays>0) {
		if(!$config->forgetmenotstart) {
			$config->forgetmenotstart=0;
		}
		$rightnow=uddetime($config->timezone);
		$sincewhen=$rightnow-($config->longwaitingdays*86400);
		// $sql="SELECT * FROM #__uddeim WHERE toread=0 AND totrash=0 AND datum<".$sincewhen;
		// $sql="SELECT * FROM #__uddeim WHERE toread=0 AND totrash=0 AND datum<".$sincewhen. " AND datum>".$config->forgetmenotstart;
		// select only messages from users which still exist in the database (public users and deleted users have no inbox and so we do not send forgetmenot mails)
		$sql = "SELECT a.* FROM #__uddeim AS a, #__users AS b WHERE a.fromid=b.id AND a.toread=0 AND a.totrash=0 AND a.datum<".$sincewhen." AND a.datum>".$config->forgetmenotstart;
		$database->setQuery($sql);
		$castaways=$database->loadObjectList();
		
		$loopcounter=0;
		foreach($castaways as $castaway) {
			// has this user already received a reminder?
			$var_remindersent = uddeIMgetEMNremindersent($castaway->toid);
			
			$next_remindersent=$var_remindersent+($config->longwaitingdays*86400);
			if ($next_remindersent < $rightnow) { // send only if no reminder has already been sent
				// =1 means: send forgetmenot message, fromid=0 uses sysmessage as sender name
				$var_message="";
				uddeIMdispatchEMN($castaway->id, $item_id, $castaway->cryptmode, 0, $castaway->toid, $var_message, 1, $config);
				$loopcounter++;
			}
			// new: never send more than 25 forgetmenot e-mails in one script call to avoid too many mails to be sent out at once
			if ($loopcounter>=25) {
				break;
			}
		}
	}
}

function uddeIMdispatchEMN($var_msgid, $item_id, $cryptmode, $var_fromid, $var_toid, $var_message, $emn_option, $config) {
	$mosConfig_sitename = uddeIMgetSitename();

	// if e-mail traffic stopped, don't send.
	if(!$config->emailtrafficenabled) {
		return;
	}

	if ($var_fromid>0) {
		$var_fromname = uddeIMgetNameFromID($var_fromid, $config);
		if (!$var_fromname)
			$var_fromname=$config->sysm_username;
	} else {
		$var_fromname=$config->sysm_username;
	}

//	$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, email FROM #__users WHERE id=".(int)$var_toid;
//	$___atabase->setQuery($sql);
//	$results=$___atabase->loadObjectList();
//	foreach($results as $result) {
//		$var_toname = $result->displayname;
//		$var_tomail = $result->email;
//	}

//	$ret = uddeIMgetNameEmailFromID($var_toid, $var_toname, $var_tomail, $config);
	$var_toname = uddeIMgetNameFromID($var_toid, $config);
	$var_tomail = uddeIMgetEMailFromID($var_toid, $config);

	if(!$var_tomail)
		return;
	if (!$var_toname)
		$var_toname = "Anonymous";

	$msglink = "";
	if ($cryptmode==2) {				// Message is encrypted, so go to enter password page
		$msglink = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=showpass&Itemid=".$item_id."&messageid=".$var_msgid);
	} else {							// normal message
		$msglink = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=show&Itemid=".$item_id."&messageid=".$var_msgid);
	}

	if($emn_option==1) {
		$var_body = _UDDEIM_EMN_FORGETMENOT;
		$var_body = str_replace("%you%", $var_toname, $var_body);
		$var_body = str_replace("%site%", $mosConfig_sitename, $var_body);
		$var_body = str_replace("%msglink%", $msglink, $var_body);
	} else {
		if($config->emailwithmessage) {
			$var_body = _UDDEIM_EMN_BODY_WITHMESSAGE;
			$var_body = str_replace("%you%", $var_toname, $var_body);
			$var_body = str_replace("%site%", $mosConfig_sitename, $var_body);
			$var_body = str_replace("%msglink%", $msglink, $var_body);
			$var_body = str_replace("%user%", $var_fromname, $var_body);
			$var_body = str_replace("%pmessage%", $var_message, $var_body);
		} else {
			$var_body = _UDDEIM_EMN_BODY_NOMESSAGE;
			$var_body = str_replace("%you%", $var_toname, $var_body);
			$var_body = str_replace("%site%", $mosConfig_sitename, $var_body);
			$var_body = str_replace("%msglink%", $msglink, $var_body);
			$var_body = str_replace("%user%", $var_fromname, $var_body);
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

function uddeIMreplyquoteMarkup($string, $quotedivider) {
	if (stristr($string, $quotedivider)) {
		$msgparts = explode($quotedivider, $string, 2);
		if($msgparts[1]) {
			$string=$msgparts[0]."<div class='uddeim-replyquote'>".$quotedivider.$msgparts[1]."</div>";
		}
	}
	return $string;
}

function uddeIMteaser($ofwhat, $howlong, $quotedivider, $useutf8) {
	$msgparts=explode($quotedivider, $ofwhat, 2);
	$words=explode(" ", $msgparts[0]);
	$howmanywords=count($words);
	$x=0;
	if (!$howlong)
		$howlong=33;
	$trailstring="";
	if ($useutf8) {
		if (uddeIM_utf8_strlen($msgparts[0])>$howlong) {
			$howlong = $howlong-3;
			$trailstring = "...";
		}
		$construct="";
		if (uddeIM_utf8_strlen($words[0])>$howlong) {
			$construct = uddeIM_utf8_substr($words[0], 0, ($howlong-3));
		} else {
			for($x=0; $x < $howmanywords; $x++) {
				$posslen = uddeIM_utf8_strlen($construct) + uddeIM_utf8_strlen($words[$x]);
				if ($posslen<=$howlong) {
					$construct .= " ".$words[$x];
				} else {
					break;
				}
			}
		}
		$construct .= $trailstring;
		$construct = ltrim($construct);
		if (empty($construct))
			$construct="...";
	} else {
		if (strlen($msgparts[0])>$howlong) {
			$howlong=$howlong-3;
			$trailstring="...";
		}
		$construct="";
		// while ((strlen($construct)+strlen($words[$x]))<($howlong+1)):
		//		$construct.=" ".$words[$x];
		// $x++;
		// endwhile;
		if(strlen($words[0])>$howlong) {
			$construct=substr($words[0], 0, ($howlong-3));
		} else {
			for($x=0; $x < $howmanywords; $x++) {
				$posslen=strlen($construct)+strlen($words[$x]);
				if($posslen<=$howlong) {
					$construct.=" ".$words[$x];
				} else {
					break;
				}
			}
		}
		$construct.=$trailstring;
		$construct=ltrim($construct);
		if(empty($construct))
			$construct="...";
	}
	return $construct;
}

function uddeIMarrowReplace($shownav, $templatedir) {
	$pathtosite  = uddeIMgetPath('live_site');
	$path = uddeIMgetPath('absolute_path');

	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_end.gif')) {
		$shownav=str_replace("&raquo;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_end.gif' border='0' alt='' />", $shownav);
	}
	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_start.gif')) {
		$shownav=str_replace("&laquo;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_start.gif' border='0' alt='' />", $shownav);
	}

	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_end.gif')) {
		$shownav=str_replace("&gt;&gt;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_end.gif' border='0' alt='' />", $shownav);
	}
	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_start.gif')) {
		$shownav=str_replace("&lt;&lt;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_start.gif' border='0' alt='' />", $shownav);
	}
	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_prev.gif')) {
		$shownav=str_replace("&lt;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_prev.gif' border='0' alt='' />", $shownav);
	}
	if(file_exists($path.'/components/com_uddeim/templates/'.$templatedir.'/images/icon_next.gif')) {
		$shownav=str_replace("&gt;", "<img src='".$pathtosite."/components/com_uddeim/templates/".$templatedir."/images/icon_next.gif' border='0' alt='' />", $shownav);
	}
	return $shownav;
}

function uddeIMRemoveXSS($val) {
//	$aAllowedTags = array();
//	$aDisabledAttributes = array('onclick', 'ondblclick', 'onkeydown', 'onkeypress', 'onkeyup', 'onload', 'onmousedown', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onunload');
	// remove tags
//    $val = strip_tags($val, implode('', $aAllowedTags));
	// remove events
//	$val = preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")=[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", $val);

	// Actually this function does nothing. I added it to add some special anti XSS code later...
	return $val;
}

function uddeIMdoAutocomplete($config) {
	$pathtosite  = uddeIMgetPath('live_site');
	// 2007-11-21 zenny: added autocomplete feature. requires mootools, copyright etc. look this file's header
	// echo "<ul id='autocompleter-choices' class='autocompleter-choices' style='z-index: 42; visibility: hidden; opacity: 0;'></ul>";
	echo "<ul id='autocompleter-choices' class='autocompleter-choices' style='width: 200px; z-index: 42; visibility: hidden; opacity: 0;'></ul>";

	if ($config->mootools==1) { // auto
		if (class_exists('JHTML')) {
			JHTML::_('behavior.mootools');
			JHTML::script('Observer.js', 'components/com_uddeim/js/', false);
			if ($config->searchinstring)
				JHTML::script('Autocompleter2.js', 'components/com_uddeim/js/', false);
			else
				JHTML::script('Autocompleter.js', 'components/com_uddeim/js/', false);
		} else {
			echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/mootools.js'></script>";
			echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Observer.js'></script>";
			if ($config->searchinstring)
				echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter2.js'></script>";
			else
				echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter.js'></script>";
		}
	} elseif ($config->mootools==2) { // MooTools 1.1
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/mootools.js'></script>";
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Observer.js'></script>";
		if ($config->searchinstring)
			echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter2.js'></script>";
		else
			echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter.js'></script>";
	} elseif ($config->mootools==3) { // MooTools 1.2
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/mootools-1.2.js'></script>";
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Observer-1.2.js'></script>";
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter-1.2.js'></script>";
		echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter.Request-1.2.js'></script>";
	} else {	// do not load MooTools, but we need the other classes (assume we have MooTools 1.11)
		if (class_exists('JHTML')) {
			JHTML::script('Observer.js', 'components/com_uddeim/js/', false);
			if ($config->searchinstring)
				JHTML::script('Autocompleter2.js', 'components/com_uddeim/js/', false);
			else
				JHTML::script('Autocompleter.js', 'components/com_uddeim/js/', false);
		} else {
			echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Observer.js'></script>";
			if ($config->searchinstring)
				echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter2.js'></script>";
			else
				echo "<script type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/Autocompleter.js'></script>";
		}
	}

	if (class_exists('JHTML'))
		$completeURL = "index.php?option=com_uddeim&task=completeUserName&no_html=1";
	else
		$completeURL = "index2.php?option=com_uddeim&task=completeUserName&no_html=1";

	if ($config->mootools==0 || $config->mootools==1 || $config->mootools==2) { // not loaded, auto, MooTools 1.1
	?>
		<script type="text/javascript">
		//<![CDATA[
			var inputElement = $('input_to_name');
			// var indicator = new Element('div').addClass('autocompleter-loading').setHTML('').setStyle('display', 'none').injectAfter( inputElement );
			var indicator = new Element('div', {'class': 'autocompleter-loading', 'styles': {'display': 'none'}}).setHTML('').injectAfter( inputElement );
			var completer = new Autocompleter.Ajax.Json( inputElement, '<?php echo $completeURL; ?>', {
					'customTarget': $('autocompleter-choices'),
					'onRequest': function(el) {
						indicator.setStyle('display', '');
					},
					'onComplete': function(el) {
						indicator.setStyle('display', 'none');
					},
					'injectChoice': function (choice, i) {
						// this is prepared to add more details
						// choice = unescape(choice);	- old style uddeIM 1.1
						choice = decodeURI(choice);
						var el = new Element('li').setHTML(this.markQueryValue(choice));
						el.inputValue = choice;
						this.addChoiceEvents(el).injectInside(this.choices);
					}
				});
		//]]>
		</script>
	<?php
	}
	if ($config->mootools==3) { // not loaded, auto, MooTools 1.2
	?>
		<script type="text/javascript">
		//<![CDATA[
			var inputElement = $('input_to_name');
			var indicator = new Element('div', {'class': 'autocompleter-loading', 'styles': {'display': 'none'}}).injectAfter( inputElement );
			var completer = new Autocompleter.Request.JSON( inputElement, '<?php echo $completeURL; ?>', {
					'customChoices': $('autocompleter-choices'),
					'onRequest': function(el) {
						indicator.setStyle('display', '');
					},
					'onComplete': function(el) {
						indicator.setStyle('display', 'none');
					},
					'multiple': true,
					'postVar': 'value',
					<?php
					if ($config->searchinstring) echo "'filterSubset': true,";
					?>
					'separator': ',',
					'autoTrim': true,
					'width': 'inherit',
					'injectChoice': function (token, i) {
						token = decodeURI(token);
						var el = new Element('li', {'html': this.markQueryValue(token)});
						el.inputValue = token;
						this.addChoiceEvents(el).injectInside(this.choices);
					}
				});
		//]]>
		</script>
	<?php
	}
}

function uddeIMdoSmileysExHeight($config) {
	$pathtouser  = uddeIMgetPath('user');
	$pathtosite  = uddeIMgetPath('live_site');
	$num = 0;
	if ($config->allowsmile) {
		$picfolder = "animated-extended";
		$testpath2 = $pathtouser."/templates/".$config->templatedir."/".$picfolder;
		if ($config->animated && $config->animatedex && is_dir($testpath2)) {
			$smileys   = $pathtouser."/templates/".$config->templatedir."/".$picfolder."/";
			$folder=opendir ($smileys);
			while ($file = readdir ($folder))
				if($file != "." && $file != ".." && (substr($file, strrpos($file, '.'))=='.gif'))
					$num++;
			closedir($folder);
		}
	}
	$height = 40*($num/8);		// 8 smileys per line
	if ($height<160)
		$height=160;
	return $height+8;
}

function uddeIMdoSmileysEx($config) {
	$pathtouser  = uddeIMgetPath('user');
	$pathtosite  = uddeIMgetPath('live_site');
	if ($config->allowsmile) {
		// test, if "animated" exists
		// $testpath1 = $pathtouser."/templates/".$config->templatedir."/animated";
		// test, if "animated-extended" exists
		$picfolder = "animated-extended";
		$testpath2 = $pathtouser."/templates/".$config->templatedir."/".$picfolder;
		if ($config->animated && $config->animatedex && is_dir($testpath2)) {
			// Extended Animated Emoticons
			$smileys   = $pathtouser."/templates/".$config->templatedir."/".$picfolder."/";

			echo("<script language=\"JavaScript\" type=\"text/javascript\"><!--\n");
			echo("function uddeimWindowOpen (title, par) {\n");
			echo("  uddeimWindow = window.open(\"\", title, par);\n");
			echo("  uddeimWindow.document.writeln(\"<html><head><title>uddeIM</title>");

			if(file_exists($pathtouser.'/templates/'.$config->templatedir.'/css/uddeim.css')) {
				echo "<link rel='stylesheet' href='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/css/uddeim.css' type='text/css' />";
			}
			echo("</head><body>");
			echo("<div id='uddeim-smileybox'>");
			echo("<table border='1' cellpadding='2' cellspacing='0'>");

			$num = 0;
			$maxcols = 8;
			unset($ff);
			$folder=opendir ($smileys);
			while ($file = readdir ($folder)) {
				if($file != "." && $file != ".." && (substr($file, strrpos($file, '.'))=='.gif')) {
					$ext = strrchr($file, '.');
					if($ext !== false) {
						$noextname = substr($file, 0, -strlen($ext));
					} else {
						$noextname = $file;
					}
					$ff[$noextname] = $file;
				}
			}
			closedir($folder);
			ksort($ff);
			reset($ff);
			foreach($ff as $key => $value){
				$name = ":".$key.": ";
				$file = $value;
				if (!($num % $maxcols)) {
					echo("<tr>");
				}
				$uc2 = ($config->showtextcounter && $config->maxlength) ? "window.opener.textCount(window.opener.document.sendeform.pmessage,window.opener.document.sendeform.characterstyped,".$config->maxlength.");" : "";
				echo ("<td><img style='cursor: pointer;' onclick='window.opener.emo(\\\"".$name."\\\"); ".$uc2." return false;' src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/".$picfolder."/".$file."' alt='".$file."' title='".$file."' /></td>");
				$num++;
				if (!($num % $maxcols)) {
					echo("</tr>");
				}
			}
			while ($num % $maxcols) {
				echo ("<td>&nbsp;</td>");
				$num++;
			}
			if ($num % $maxcols) {
				echo("</tr>");
			}
			echo("</table>");
			echo("</div>");
			echo("</body></html>\");\n");
			echo("uddeimWindow.document.close();\n");
			echo("uddeimWindow.focus();\n");
			echo("}\n");
			echo("-->\n");
			echo("</script>\n");
		}
	}
}

function uddeIMdoBB($config) {
	// Most of the following/referenced javascript code is taken from phpBB
	// (C) 2001 The phpBB Group, for original code go to phpbb.com
	// Changed by Benjamin Zweifel for integration with uddeIM
	$pathtosite  = uddeIMgetPath('live_site');
	if ($config->allowbb) {
		$uc = ($config->showtextcounter && $config->maxlength) ? "textCount(document.sendeform.pmessage,document.sendeform.characterstyped,".$config->maxlength.");" : "";
	?>
		<div id='uddeim-bbemobox'>
			<table border="0" cellspacing="4" cellpadding="0">
				<tr>
					<td><img alt="bold" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_bold.gif" style="cursor: pointer;" name="addbbcode0" onclick="bbstyle(0); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_BOLD; ?>" /></td>
					<td><img alt="italic" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_italic.gif" style="cursor: pointer;" name="addbbcode2" onclick="bbstyle(2); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_ITALIC; ?>" /></td>
					<td><img alt="underline" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_underline.gif" style="cursor: pointer;" name="addbbcode4" onclick="bbstyle(4); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_UNDERLINE; ?>" /></td>
					<td>&nbsp;</td>
					<td><img alt="red" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_red.gif" style="cursor: pointer;"  name="addbbcode6" onclick="bbstyle(6); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_COLORRED; ?>" /></td>
					<td><img alt="green" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_green.gif" style="cursor: pointer;"  name="addbbcode8" onclick="bbstyle(8); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_COLORGREEN; ?>" /></td>
					<td><img alt="blue" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_blue.gif" style="cursor: pointer;"  name="addbbcode10" onclick="bbstyle(10); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_COLORBLUE; ?>" /></td>
					<td>&nbsp;</td>
					<td><img alt="very small" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_size1.gif" style="cursor: pointer;"  name="addbbcode12" onclick="bbstyle(12); <?php echo $uc; ?> return false;"  title="<?php echo _UDDEIM_TOOLTIP_FONTSIZE1; ?>" /></td>
					<td><img alt="small" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_size2.gif" style="cursor: pointer;"  name="addbbcode14" onclick="bbstyle(14); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_FONTSIZE2; ?>" /></td>
					<td><img alt="large" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_size4.gif" style="cursor: pointer;"  name="addbbcode16" onclick="bbstyle(16); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_FONTSIZE4; ?>" /></td>
					<td><img alt="very large" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_size5.gif" style="cursor: pointer;"  name="addbbcode18" onclick="bbstyle(18); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_FONTSIZE5; ?>" /></td>
		<?php
	}
	if ($config->allowbb>1) {
	?>
					<td>&nbsp;</td>
					<td><img alt="image" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_image.gif" style="cursor: pointer;"  name="addbbcode24" onclick="bbstyle(24); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_IMAGE; ?>" /></td>
					<td><img alt="web link" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_link.gif" style="cursor: pointer;"  name="addbbcode26" onclick="bbstyle(26); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_URL; ?>" /></td>
	<?php
	}
	if ($config->allowbb) {
	?>
					<td>&nbsp;</td>
					<td><img alt="close tags" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/images/format_closeall.gif" style="cursor: pointer;"  onclick="bbstyle(-1); <?php echo $uc; ?> return false;" title="<?php echo _UDDEIM_TOOLTIP_CLOSEALLTAGS; ?>" /></td>
				</tr>
			</table>
		</div>
	<?php
	}
}

function uddeIMdoSmileys($config) {
	$pathtouser  = uddeIMgetPath('user');
	$pathtosite  = uddeIMgetPath('live_site');
	if ($config->allowsmile) {
		$uc = ($config->showtextcounter && $config->maxlength) ? "textCount(document.sendeform.pmessage,document.sendeform.characterstyped,".$config->maxlength.");" : "";
		// test, if "animated" exists
		$testpath1 = $pathtouser."/templates/".$config->templatedir."/animated";
		// test, if "animated-extended" exists
		$picfolder = "animated-extended";
		$testpath2 = $pathtouser."/templates/".$config->templatedir."/".$picfolder;
		$icon_folder="images";
		if ($config->animated && is_dir($testpath1)) {
			$icon_folder="animated";
		}
	?>
		<div id='uddeim-smileybox'>
			<table border='0' cellpadding='2' cellspacing='0'>
				<tr>
					<td><img style="cursor: pointer;" onclick="emo(':) '); <?php echo $uc; ?> return false;" src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_smile.gif" alt=":)" title=":)" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':( '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_sad.gif" alt=":(" title=":(" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':P '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_tongue.gif" alt=":P" title=":P" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':x '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_crossed.gif" alt=":x" title=":x" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':angry: '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_angry.gif" alt=":angry:" title=":angry:" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':blush: '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_blush.gif" alt=":blush:" title=":blush:" /></td>
					<td><img style="cursor: pointer;" onclick="emo('B) '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_cool.gif" alt="B)" title="B)" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':* '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_heart.gif" alt=":*" title=":*" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':kiss: '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_kiss.gif" alt=":kiss:" title=":kiss:" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':laugh: '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_laughing.gif" alt=":laugh:" title=":laugh:" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':ohmy: '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_shocked.gif" alt=":ohmy:" title=":ohmy:" /></td>
					<td><img style="cursor: pointer;" onclick="emo(';) '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_wink.gif" alt=";)" title=";)" /></td>
					<td><img style="cursor: pointer;" onclick="emo(':? '); <?php echo $uc; ?> return false;"  src="<?php echo $pathtosite; ?>/components/com_uddeim/templates/<?php echo $config->templatedir; ?>/<?php echo $icon_folder; ?>/emoticon_wondering.gif" alt=":?" title=":?" /></td>
					<?php 
						if ($config->animated && $config->animatedex && is_dir($testpath2)) {
							$height=uddeIMdoSmileysExHeight($config);
					?>
					<td><a href="#" onclick="uddeimWindowOpen('uddeIM','width=466,height=<?php echo $height;?>,status=no,toolbar=no,scrollbars=no,dependent=yes,location=no,menubar=no,resizable=yes'); return false;"><?php echo _UDDEIM_MORE;?></a></td>
					<?php 
						}
					?>
				</tr>
			</table>
		</div>
	<?php 
	}
}

function uddeIMdoShowAllUsers($myself, $my_gid, $config) {						
	$database = uddeIMgetDatabase();

	$hide = "";
	if ($config->hideusers)
		$hide = "AND id NOT IN (".uddeIMquoteSmart($config->hideusers).") ";

	$hide2 = "";
	if ($my_gid==18 && $config->blockgroups)
		$hide2 = "AND gid NOT IN (".uddeIMquoteSmart($config->blockgroups).") ";

	switch ($config->hideallusers) {
		case 3:		// special users
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname FROM #__users WHERE block=0 AND gid NOT IN (19,20,21,23,24,25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
			break;
		case 2:		// admins
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname FROM #__users WHERE block=0 AND gid NOT IN (24,25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
			break;
		case 1:		// superadmins
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname FROM #__users WHERE block=0 AND gid NOT IN (25) AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
			break;
		default:	// none
			$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname FROM #__users WHERE block=0 AND id<>".$myself." ".$hide.$hide2."ORDER BY ".($config->realnames ? "name" : "username");
			break;
	}
	if ($my_gid==24 || $my_gid==25)		// do not hide users when it is an admin
		$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname FROM #__users WHERE block=0 AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
	$database->setQuery($sql);
	$rows=$database->loadObjectList();

	if ($config->allowmultipleuser)
		$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\" onchange=\"document.sendeform.to_name.value=(document.sendeform.to_name.value.length>0 && document.sendeform.userlist.value.length>0) ? document.sendeform.to_name.value+','+document.sendeform.userlist.value : document.sendeform.userlist.value; return false;\">";
	else
		$allnames="<select size=\"1\" class=\"inputbox\" name=\"userlist\" onchange=\"document.sendeform.to_name.value=document.sendeform.userlist.value; return false;\">";

	$allnames.="<option value=\"\">&nbsp;</option>";
	foreach ($rows as $row) {
		$allnames.="<option value=\"".$row->displayname."\">".$row->displayname."</option>";
	}
	$allnames.="</select>";
	echo _UDDEIM_USERLIST."<br />";
	echo $allnames;
}

function uddeIMdoShowConnections($myself, $my_gid, $config) {						
	$rows = uddeIMselectCBbuddies($myself, $config);
	$somanyfriends = count($rows);

	if (!$somanyfriends) { // no friends found, maybe there are some in CBE?
		if (file_exists(uddeIMgetPath('absolute_path').'/administrator/components/com_comprofiler/enhanced_admin/enhanced_config.php')) {
			$rows = uddeIMselectCBEbuddies($myself, $config);
			$somanyfriends = count($rows);
		}
	}

	// collect lists
	$somanylists=0;
	if( ($config->enablelists==1) ||
	    ($config->enablelists==2 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->enablelists==3 && in_array($my_gid,array(24,25))) ) {
		$my_lists = uddeIMselectAllUserlists($myself); 		
		$somanylists = count($my_lists);
	}
	
	if ($somanyfriends>0 || $somanylists>0) {

		if ($somanyfriends>0 && $somanylists>0)
			$mycons = _UDDEIM_CONNECTIONS."/"._UDDEIM_LISTS."<br />";
		elseif ($somanyfriends>0)
			$mycons = _UDDEIM_CONNECTIONS."<br />";
		elseif ($somanylists>0)
			$mycons = _UDDEIM_LISTS."<br />";
		else
			$mycons = "";

		if ($config->connex_listbox) {
			if ($config->connexallowmultipleuser)
				$mycons.="<select size=\"1\" class=\"inputbox\" onchange=\"document.sendeform.to_name.value=(document.sendeform.to_name.value.length>0 && this.options[this.selectedIndex].value.length>0) ? document.sendeform.to_name.value+','+this.options[this.selectedIndex].value : this.options[this.selectedIndex].value; return false;\" name=\"connexlistbox\">";
			else
				$mycons.="<select size=\"1\" class=\"inputbox\" onchange=\"document.sendeform.to_name.value=this.options[this.selectedIndex].value; return false;\" name=\"connexlistbox\">";
			$mycons.="<option value=''>&nbsp;</option>";

			if ($somanyfriends>0)
				foreach ($rows as $row)
					$mycons.="<option value=\"".$row->displayname."\">".$row->displayname."</option>";
			if ($somanylists>0)
				foreach ($my_lists as $row)
					$mycons.="<option value=\"#".$row->name."\">#".$row->name."</option>";

			$mycons.="</select>";
		} else {
			if ($config->connexallowmultipleuser) {
				$mycons.="<ul>";
				$mycons.="<li><a href=\"#\" onclick=\"document.sendeform.to_name.value=''; return false;\">"._UDDEIM_CLEAR."</a></li>&nbsp; ";
				if ($somanyfriends>0)
					foreach ($rows as $row)
						$mycons.="<li><a href=\"#\" onclick=\"document.sendeform.to_name.value=(document.sendeform.to_name.value.length>0) ? document.sendeform.to_name.value+','+'".$row->displayname."' : '".$row->displayname."'; return false;\">".$row->displayname."</a></li>&nbsp; ";
				if ($somanylists>0)
					foreach ($my_lists as $row)
						$mycons.="<li><a href=\"#\" onclick=\"document.sendeform.to_name.value=(document.sendeform.to_name.value.length>0) ? document.sendeform.to_name.value+','+'#".$row->name."' : '#".$row->name."'; return false;\">#".$row->name."</a></li>&nbsp; ";
				$mycons.="</ul>";
			} else {
				if ($somanyfriends>0)
					foreach ($rows as $row)
						$mycons.="<a href=\"#\" onclick=\"document.sendeform.to_name.value='".$row->displayname."'; return false;\">".$row->displayname."</a>&nbsp; ";
				if ($somanylists>0)
					foreach ($my_lists as $row)
						$mycons.="<a href=\"#\" onclick=\"document.sendeform.to_name.value='#".$row->name."'; return false;\">#".$row->name."</a>&nbsp; ";
			}
		}

// START THIRD LINE IN TABLE (when connections exist)
		if ($config->connex_listbox) {
			echo "<tr><td valign='top'>&nbsp;</td><td valign='top' align='right'>".$mycons."</td></tr>";
		} else {
			echo "<tr><td colspan='2'>".$mycons."</td></tr>";
		}
	}
}

function uddeIMreplaceListsWithNames(&$thelist, $myself, $config) {
	$database = uddeIMgetDatabase();
	$ok = 1;
	$objs = explode(",", $thelist);
	if ($objs==FALSE)
		return 0;	// error

	while (list($key, $obj) = each($objs)) {
		if (substr($obj,0,1)=="#") {				// its a list
			$listname = substr($obj,1);				// remove leading "#"
			$this_lists = uddeIMselectUserlistsListFromName($myself, $listname);
			if (count($this_lists)>0) {				// we have a list with that name
				foreach($this_lists as $this_list) {
					$lids = trim($this_list->userids);
				}
				$obj_new = Array();
				$database->setQuery( "SELECT id,name,username FROM #__users WHERE block=0 AND id IN (".$lids.") ORDER BY ".($config->realnames ? "name" : "username") );
				$users = $database->loadObjectList();
				if ( count( $users ) )  {
					foreach ( $users as $user )
						array_push($obj_new, ($config->realnames ? $user->name : $user->username));
					$obj = implode(",", $obj_new);
				}
				$objs[$key] = $obj;
			} else {
				$objs[$key] = "(".$obj.")";
				$ok = 0;	// error
			}
		}	// when it is not a list, do nothing
	}
	$thelist = implode(",", $objs);					// now return the complete list
	return $ok;
}

function uddeIMdrawWriteform($myself, $my_gid, $item_id, $backto, $recipname, $pmessage, $messageid, $dwf_isreply, $dwf_errorcode, $dwf_sysgm, $config) {
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
	// 12 = error in from name (n/a, public frontend only)
	// 13 = error in from email (n/a, public frontend only)
	// 14 = time delay for spam protection
	// 15 = csrf protection

	// This functions expects values stripslashed

	echo "<div id='uddeim-writeform'>\n";
	if ($dwf_sysgm) {
		echo "<form name='sendeform' method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=savesysgm&Itemid=".$item_id)."'>\n";
		uddeIMwriteCSRF($config);
		echo "<p><input type='checkbox' checked='checked' name='sysgm_sys' value='1' />"._UDDEIM_SEND_ASSYSM."</p>\n";

		if ($config->showgroups) {
			echo "<p><select name='sysgm_universe' size='1'>";
			echo "<option value='sysgm_toall'>"._UDDEIM_SEND_TOALL."</option>";
			echo "<option value='sysgm_toallspecial'>"._UDDEIM_SEND_TOALLSPECIAL."</option>";
			echo "<option value='sysgm_toalladmins'>"._UDDEIM_SEND_TOALLADMINS."</option>";
			echo "<option value='sysgm_toalllogged'>"._UDDEIM_SEND_TOALLLOGGED."</option>";
			$groups = uddeIMselectAROgroups();
			foreach ($groups as $group) {
				$groupid = $group->group_id;
				$groupname = $group->name;
				echo "<option value='".$groupid."'>".$groupname."</option>";
			}
			echo "</select></p>";
		} else {
			echo "<p><input type=radio name='sysgm_universe' value='sysgm_toall' />"._UDDEIM_SEND_TOALL."<br />\n";
			echo "<input type=radio name='sysgm_universe' checked='checked' value='sysgm_toallspecial' />"._UDDEIM_SEND_TOALLSPECIAL."<br />\n";
			echo "<input type=radio name='sysgm_universe' checked='checked' value='sysgm_toalladmins' />"._UDDEIM_SEND_TOALLADMINS."<br />\n";
			echo "<input type=radio name='sysgm_universe' value='sysgm_toalllogged' />"._UDDEIM_SEND_TOALLLOGGED."</p>\n";
		}
		echo "<p>"._UDDEIM_VALIDFOR_1;
		echo "<input name='sysgm_validfor' type='text' size='4' />"._UDDEIM_VALIDFOR_2."</p>\n";
		echo "<p>"._UDDEIM_SYSGM_SHORTHELP."</p>\n";
	} else {
		echo "<form name='sendeform' method='post' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=save&Itemid=".$item_id)."'>";
		echo "<input type='hidden' name='sendeform_showallusers' value='' />\n";
		uddeIMwriteCSRF($config);
	}
	echo "\n";

	if($dwf_errorcode==0 && $backto) {
		echo "<input type='hidden' name='backto' value='".$backto."' />";
	}

	if(!$dwf_sysgm) {
	
		if($dwf_isreply!=1) { // if this is NOT a reply

			echo "<table width='100%' cellspacing='0' cellpadding='0'>";

			if(0 && $dwf_errorcode==0 && $recipname) {		// BUGBUG "0 &&". don't need this case
				echo "<tr><td valign='top'>";
				echo "<b>".$recipname."</b>";
				echo "<input type='hidden' name='to_name' id='input_to_name' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";
				echo "</td></tr>";
			} else {

// START FIRST LINE IN TABLE (contains two fields: TO USER and select from ALL USER list)
				echo "<tr><td valign='top'>";
//				if ($dwf_errorcode==0 && $recipname) {	// does not really make sense
//					echo "<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=new&Itemid=".$item_id)."'>"._UDDEIM_TODP."</a>";
//				} else {
					echo _UDDEIM_TODP;
//				}
				echo "<br />";

				if($dwf_errorcode==2 || $dwf_errorcode==3 || $dwf_errorcode==5 || 
				   $dwf_errorcode==6 || $dwf_errorcode==8 || $dwf_errorcode==9 || 
				   $dwf_errorcode==10 || $dwf_errorcode==11) {
					$errorstyle='style="background-color: #ff0000;" ';
				} else {
					$errorstyle='';
				}

				echo "<input type='hidden' name='to_id' value='' />";
				echo "<input type='hidden' name='messageid' value='' />";
				if (!($config->flags & 0x04))
					echo "<input type='text' ".$errorstyle."name='to_name' id='input_to_name' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";
				else
					echo "<input type='text' disabled='disabled' ".$errorstyle."style='color:gray;' name='to_name' id='input_to_name' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";

				if ($config->useautocomplete) {
					uddeIMdoAutocomplete($config);
				}

// SECOND FIELD IN FIRST LINE IN TABLE
				echo "</td><td valign='top' align='right'>\n";
				if (!($config->flags & 0x01)) {
					if ($config->modeshowallusers==1 || $config->modeshowallusers==2) {
						if ($dwf_errorcode==0 && $config->modeshowallusers==1) {
							// link to drop down box with names of connected users, value is 2 since it is shown the first time (so selecting the link does not show an error message because of an empty recipient field)
							echo "<br />";
							echo "<a href=\"#\" onclick=\"document.sendeform.sendeform_showallusers.value='2'; document.sendeform.submit(); return false;\">"._UDDEIM_SHOWUSERS."</a>";
						} else { // now show all users
							uddeIMdoShowAllUsers($myself, $my_gid, $config);
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
// START THIRD LINE IN TABLE WHEN CONNECTIONS AVAILABLE

				$have_lists=0;
				if( ($config->enablelists==1) ||
					($config->enablelists==2 && in_array($my_gid,array(19,20,21,23,24,25))) || 
					($config->enablelists==3 && in_array($my_gid,array(24,25))) )
					$have_lists=1;

				if (!($config->flags & 0x02)) {
					if ((uddeIMcheckCB() && $config->showconnex) || $have_lists) {
						// if (uddeIMcheckCB() && $showconnex && !($recipname && $dwf_errorcode==0)) {
						uddeIMdoShowConnections($myself, $my_gid, $config);	// this creates a third row in table
					}
				}
			}
			echo "</table>";
			echo "<br />";
		} else { // it IS a reply
			if ($dwf_errorcode) {
				echo "<table width='100%' cellspacing='0' cellpadding='0'>";
				if ($dwf_errorcode==7) {
					echo "<tr><td valign=left colspan=2>"._UDDEIM_WRONGCAPTCHA."</td></tr>";
				} elseif ($dwf_errorcode==13) {
					echo "<tr><td valign=left colspan=2>"._UDDEIM_ERRORINEMAIL."</td></tr>";
				} elseif ($dwf_errorcode==14) {
					echo "<tr><td valign=left colspan=2>"._UDDEIM_YOUHAVETOWAIT."</td></tr>";
				}
				echo "</table>";
				echo "<br />";
			}
			echo "<input type='hidden' name='to_id' value='".htmlentities($recipname, ENT_QUOTES, $config->charset)."' />&nbsp;";
			echo "<input type='hidden' name='messageid' value='".$messageid."' />";
			echo "<input type='hidden' name='to_name' value='' />";
		}
	}

	if(($config->showtextcounter && $config->maxlength) || $config->cryptmode==2) {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".$pathtosite."/components/com_uddeim/js/uddeimtools.js\"></script>\n";
	}

	if($config->allowbb || $config->allowsmile) {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".$pathtosite."/components/com_uddeim/js/bbsmile.js\"></script>\n";
		uddeIMdoSmileysEx($config);
		uddeIMdoBB($config);
		uddeIMdoSmileys($config);
	}

// well, I think the complete textarea should be red (or only the label? or both?)
//	if($dwf_errorcode==4) {
//		$errorstyle=' style="background-color: #ff0000;"';
//	} else {
		$errorstyle='';
//	}

	if($dwf_isreply==1) {
		echo "<span".$errorstyle.">"._UDDEIM_REPLY."</span>";
	} else {
		echo "<span".$errorstyle.">"._UDDEIM_MESSAGE."</span>";
	}
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

	// CRYPT
	if($config->cryptmode==2) {
//	if($config->cryptmode==2 && !$dwf_sysgm) {										// show encryption box only when this is not a systemmessage
		echo "<a href='javascript:uddeidswap(\"divpass\");'>"._UDDEIM_PASSWORDBOX."</a>";
		echo "<span id='divpass' style='visibility:hidden;'>: <input name='cryptpass' value='' />"._UDDEIM_ENCRYPTIONTEXT."</span>";
		echo "<br />";
	}

	if ( $config->usecaptcha>=4 ||													// all users (incl. admins)
		($config->usecaptcha==3 && in_array($my_gid,array(0,18,19,20,21,23))) ||	// CAPTCHA enabled for public frontend, registered and special users
		($config->usecaptcha==2 && in_array($my_gid,array(0,18))) ) {				// CAPTCHA enabled for public frontend and registered users (note: 0 is not required since this is done in public.php)
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

	echo "<input type='submit' name='reply' class='button' value='"._UDDEIM_SUBMIT."' />&nbsp;";

	if(($config->trashoriginal && $dwf_isreply==1) || ($config->allowcopytome && !$dwf_sysgm)) {
		echo "<span class='uddeim-sendoption'>";
	}
	if($config->trashoriginal && $dwf_isreply==1) {
		echo "<input type='checkbox' checked='checked' name='tobedeleted' />"._UDDEIM_TRASHORIGINAL."&nbsp;";
	}
	if($config->allowcopytome && !$dwf_sysgm) {
		echo "<input type='checkbox' name='copytome' />"._UDDEIM_SENDCOPYTOME."&nbsp;";
	}
	if($config->allowmultipleuser && !$dwf_sysgm) {
		echo "<input type='checkbox' name='addccinfo' />"._UDDEIM_ADDCCINFO;
	}
	if(($config->trashoriginal && $dwf_isreply==1) || ($config->allowcopytome && !$dwf_sysgm)) {
		echo "</span>";
	}
	echo "</form>\n";
	echo "</div>\n"; // end of uddeim-writeform
}
