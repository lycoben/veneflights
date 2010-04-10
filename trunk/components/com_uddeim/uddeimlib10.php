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

function uddeIMsefRelToAbs($value) {
	return sefRelToAbs($value);
}

function uddeIMmosGetParam( &$arr, $name, $def=null, $mask=0 ) {
	return mosGetParam( $arr, $name, $def, $mask );
}

function uddeIMmosRedirect( $url, $msg='' ) {
	mosRedirect( $url, $msg );
}

function uddeJSEFredirect($url, $msg='') {
	$redirecturl = sefRelToAbs($url);
	mosRedirect( $redirecturl, $msg );
}

function uddeIMmosMail($from, $fromname, $recipient, $subject, $body, $mode=0, $cc=NULL, $bcc=NULL, $attachment=NULL, $replyto=NULL, $replytoname=NULL ) {
	return mosMail($from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname );
}

function uddeIMgetOffset() {
	global $mosConfig_offset;
	return $mosConfig_offset;
}

function uddeIMgetLocale() {
	global $mosConfig_locale;
	return $mosConfig_locale;
}

function uddeIMgetSitename() {
	global $mosConfig_sitename;
	return $mosConfig_sitename;
}

function uddeIMgetLang() {
	global $mosConfig_lang;
	return $mosConfig_lang;
}

function uddeIMgetVersion() {
	global $_VERSION;
	return $_VERSION;
}

function uddeIMgetDatabase() {
	global $database;
	return $database;
}

function uddeIMgetDBprefix() {
	global $mainframe;
	return $mainframe->getCfg('dbprefix');
}

function uddeIMgetUserID() {
	global $my;
	return $my->id;
}

function uddeIMgetGroupID() {	// 0=public, 1=registered, 2=special
	global $my;
	return $my->gid;
}

function uddeIMgetMy() {
	global $my;
	return $my;
}

function uddeIMgetPath($path) {
	global $mainframe;
	switch($path) {
		case "absolute_path":	return $mainframe->getCfg('absolute_path');
		case "live_site":		return $mainframe->getCfg('live_site');
		case "admin":			return $mainframe->getCfg('absolute_path')."/administrator/components/com_uddeim";
		case "user":			return $mainframe->getCfg('absolute_path')."/components/com_uddeim";
	}
	return NULL;
}

if ($uddeim_isadmin) {
	if (!class_exists('uddeIMmosPageNav')) {
		if (!class_exists('mosPageNav'))
			include_once(uddeIMgetPath('absolute_path')."/administrator/includes/pageNavigation.php");
		class uddeIMmosPageNav extends mosPageNav {
			function mosPageNav( $total, $limitstart, $limit ) {
				parent::__construct($total, $limitstart, $limit);
			}
		}
	}
} else {
	if (!class_exists('uddeIMmosPageNav')) {
		if (!class_exists('mosPageNav'))
			include_once(uddeIMgetPath('absolute_path')."/includes/pageNavigation.php");
		class uddeIMmosPageNav extends mosPageNav {
			function mosPageNav( $total, $limitstart, $limit ) {
				parent::__construct($total, $limitstart, $limit);
			}
		}
	}
}
