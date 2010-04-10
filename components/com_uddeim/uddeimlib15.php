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
	// Replace all &amp; with & as the router doesn't understand &amp;
	$url = str_replace('&amp;', '&', $value);
	if(substr(strtolower($url),0,9) != "index.php") return $url;
	$uri    = JURI::getInstance();
	$prefix = $uri->toString(array('scheme', 'host', 'port'));
	return $prefix.JRoute::_($url);
}

function uddeIMmosGetParam( &$arr, $name, $def=null, $mask=0 ) {
	static $noHtmlFilter	= null;
	static $safeHtmlFilter	= null;
	$var = JArrayHelper::getValue( $arr, $name, $def, '' );
	if (!($mask & 1) && is_string($var)) {
		$var = trim($var);
	}
	if ($mask & 2) {
		if (is_null($safeHtmlFilter)) {
			$safeHtmlFilter = & JFilterInput::getInstance(null, null, 1, 1);
		}
		$var = $safeHtmlFilter->clean($var, 'none');
	} elseif ($mask & 4) {
		$var = $var;
	} else {
		if (is_null($noHtmlFilter)) {
			$noHtmlFilter = & JFilterInput::getInstance(/* $tags, $attr, $tag_method, $attr_method, $xss_auto */);
		}
		$var = $noHtmlFilter->clean($var, 'none');
	}
	return $var;
}

function uddeIMmosRedirect( $url, $msg='' ) {
	global $mainframe;
	$mainframe->redirect( $url, JText::_($msg) );
}

function uddeJSEFredirect($url, $msg='') {			// REMOVE FROM includes.php
	global $mainframe;
	$redirecturl = JRoute::_($url, false);
	$mainframe->redirect( $redirecturl, JText::_($msg) );
}

function uddeIMmosMail($from, $fromname, $recipient, $subject, $body, $mode=0, $cc=NULL, $bcc=NULL, $attachment=NULL, $replyto=NULL, $replytoname=NULL ) {
	return JUTility::sendMail($from, $fromname, $recipient, $subject, $body, $mode, $cc, $bcc, $attachment, $replyto, $replytoname );
}

function uddeIMgetOffset() {
	$config =& JFactory::getConfig();
	return $config->getValue('config.offset');  
}

function uddeIMgetLocale() {
	$config =& JFactory::getConfig();
	return $config->getValue('config.locale');  
}

function uddeIMgetSitename() {
	$config =& JFactory::getConfig();
	return $config->getValue('config.sitename');  
}

function uddeIMgetLang() {
	$lang =& JFactory::getLanguage();
	return $lang->getBackwardLang();
}

function uddeIMgetVersion() {
	$ver = new JVersion();
	return $ver;
}

function uddeIMgetDatabase() {
	$db =& JFactory::getDBO();
	return $db;
}

function uddeIMgetDBprefix() {
	$config =& JFactory::getConfig();
	return $config->getValue('config.dbprefix');  
//	global $mainframe;
//	return $mainframe->getCfg('dbprefix');
}

function uddeIMgetUserID() {			// REMOVE FROM admin.shared.php
	$user =& JFactory::getUser();
	return $user->id;
}

function uddeIMgetGroupID() {
	$user =& JFactory::getUser();
	return $user->get('aid', 0);
}

function uddeIMgetMy() {
	$user =& JFactory::getUser();
	$my = (object)$user->getProperties();
	$my->gid = $user->get('aid', 0);
	return $my;
}
		
function uddeIMgetPath($path) {
	switch($path) {
		case "absolute_path":	return JPATH_SITE;
		case "live_site":		return substr_replace(JURI::root(), '', -1, 1);
		case "admin":			return JPATH_ADMINISTRATOR .'/components/com_uddeim';
		case "user":			return JPATH_SITE .'/components/com_uddeim';
	}
	return NULL;
}

if (!class_exists('uddeIMmosPageNav')) {
	jimport('joomla.html.pagination');
	class uddeIMmosPageNav extends JPagination {
		function mosPageNav( $total, $limitstart, $limit ) {
			parent::__construct($total, $limitstart, $limit);
		}
		function writeLimitBox($link = null) {
			echo $this->getLimitBox();
		}
		function writePagesCounter() {
			return $this->getPagesCounter();
		}
		function writePagesLinks($link = null) {
			return $this->getPagesLinks();
		}
		function writeLeafsCounter() {
			return $this->getPagesCounter();
		}
		function rowNumber($index) {
			return $index +1 + $this->limitstart;
		}
	}
}
