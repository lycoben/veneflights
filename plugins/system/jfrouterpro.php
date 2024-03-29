<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2008 Think Network GmbH, Munich
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * $Id: ReadMe,v 1.2 2005/03/15 11:07:01 akede Exp $
 * @package joomfish
 * @subpackage system.jfdatabase_bot
 * @version 2.0
 *
*/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

// In PHP5 this should be a instance_of check
// Currently Joom!Fish does not need to be active in Administrator
// This might be an extended version
if($mainframe->isAdmin()) {
	return;
}
jimport('joomla.filesystem.file');
// Joom!Fish router only gets activated if essential files are missing
//if ( !file_exists( JPATH_PLUGINS .DS. 'system' .DS. 'jfdatabase' .DS. 'jfdatabase.class.php' )) {
if ( !JFile::exists( dirname(__FILE__) .DS. 'jfrouter' .DS. 'contact.php' )) {
	JError::raiseNotice('no_jf_plugin', JText::_('Joom!Fish router plugin not installed correctly. Plugin not executed'));
	return;
}
if(JFile::exists(JPATH_SITE .DS. 'components' .DS. 'com_joomfish' .DS. 'helpers' .DS. 'defines.php')) {
	require_once( JPATH_SITE .DS. 'components' .DS. 'com_joomfish' .DS. 'helpers' .DS. 'defines.php' );
	JLoader::register('JoomfishManager', JOOMFISH_ADMINPATH .DS. 'classes' .DS. 'JoomfishManager.class.php' );
	JLoader::register('JoomFishVersion', JOOMFISH_ADMINPATH .DS. 'version.php' );
	JLoader::register('JoomFish', JOOMFISH_PATH .DS. 'helpers' .DS. 'joomfish.class.php' );	
} else {
	JError::raiseNotice('no_jf_extension', JText::_('Joom!Fish extension not installed correctly. Plugin not executed'));
	return;
}
/**
* Language Determination and basic routing for Joomfish
*/
class plgSystemJFRouterpro extends JPlugin{

	/**
	 * stored configuration from plugin
	 *
	 * @var object configuration information
	 */
	var $_config = null;

	function plgSystemJFRouterpro(& $subject, $config)
	{
		global $mainframe;
		if ($mainframe->isAdmin()) {
			// This plugin is only relevant for use within the frontend!
			return;
		}
		parent::__construct($subject, $config);

		// put params in registry so I have easy access to them later
		$conf =& JFactory::getConfig();
		$conf->setValue("jfrouter.params",$this->params);

		// Must do this here in case other plugins instantiate language!
		// Get the router
		$app	= &JFactory::getApplication();
		$router = &$app->getRouter();

		// Joomfish aware siterouter
		if ($this->params->get("jfrouter",1)){
			if (file_exists(dirname(__FILE__).DS."jfrouterpro".DS."jfrouter.php")){
				include_once(dirname(__FILE__).DS."jfrouterpro".DS."jfrouter.php");
				$config =& JFactory::getConfig();
				$opts['mode'] = $config->getValue('config.sef');
				$router = new JFRouter($opts);
			}
		}

		// end Joomfish aware siterouter

		// atttach build rules for language
		$router->attachBuildRule("prorouteJFRule");

		// This gets the language from the router before any other part of Joomla can load the language !!
		$uri = &JURI::getInstance();
		$this->parseJFRule($router, $uri);
	}

	function _discoverJFLanguage ( ) {

		static $discovered;
		if (isset($discovered) && $discovered){
			return;
		}
		$discovered=true;

		$registry =& JFactory::getConfig();

		// Find language without loading strings
		$conf	=& JFactory::getConfig();
		$locale	= $conf->getValue('config.language');

		$mosConfig_lang          = $locale;
		$GLOBALS['mosConfig_defaultLang'] = $mosConfig_lang;        // Save the default language of the site

		// get params from registry in case function called statically
		$params = $registry->getValue("jfrouter.params");

		$registry->setValue("config.defaultlang", $mosConfig_lang);

		$determitLanguage 		= $params->get( 'determitLanguage', 1 );
		$newVisitorAction		= $params->get( 'newVisitorAction', 'browser' );
		$use302redirect			= $params->get( 'use302redirect', 0 );
		$enableCookie			= $params->get( 'enableCookie', 1 );

		// get instance of JoomFishManager to obtain active language list and config values
		$jfm =&  JoomFishManager::getInstance();

		$client_lang = '';
		$lang_known = false;
		$jfcookie = JRequest::getVar('jfcookie', null ,"COOKIE");
		if (isset($jfcookie["lang"]) && $jfcookie["lang"] != "") {
			$client_lang = $jfcookie["lang"];
			$lang_known = true;
		}

		$uri =& JURI::getInstance();
		if ($requestlang = JRequest::getVar('lang', null ,"REQUEST")){
			if( $requestlang != '' ) {
				$client_lang = $requestlang;
				$lang_known = true;
			}
		}

		/*		if ( $client_lang != '' && ($requestlang = $uri->getVar("lang","")) ) {
		if( $requestlang != '' ) {
		$client_lang = $requestlang;
		}
		// no language chooses - assume from browser configuration
		}*/

		if ( !$lang_known && $determitLanguage &&
		key_exists( 'HTTP_ACCEPT_LANGUAGE', $_SERVER ) && !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ) {

			switch ($newVisitorAction) {
				// usesing the first defined Joom!Fish language
				case 'joomfish':
					$activeLanguages = $jfm->getActiveLanguages();
					reset($activeLanguages);
					$first = key($activeLanguages);
					$client_lang = $activeLanguages[$first]->getLanguageCode();
					break;

				case 'site':
					$jfLang = TableJFLanguage::createByJoomla( $mosConfig_lang );
					$client_lang = $jfLang->getLanguageCode();
					break;

					// no language chooses - assume from browser configuration
				case 'browser':
				default:
					// language negotiation by Kochin Chang, June 16, 2004
					// retrieve active languages from database
					$active_iso = array();
					$active_isocountry = array();
					$active_code = array();
					$activeLanguages = $jfm->getActiveLanguages();
					if( count( $activeLanguages ) == 0 ) {
						return $mosConfig_lang;
					}

					foreach ($activeLanguages as $alang) {
						$active_iso[] = $alang->iso;
						if( eregi('[_-]', $alang->iso) ) {
							$isocountry = split('[_-]',$alang->iso);
							$active_isocountry[] = $isocountry[0];
						}
						$active_code[] = $alang->shortcode;
					}

					// figure out which language to use - browser languages are based on ISO codes
					$browserLang = explode(',', $_SERVER["HTTP_ACCEPT_LANGUAGE"]);

					foreach( $browserLang as $blang ) {
						if( in_array($blang, $active_iso) ) {
							$client_lang = $blang;
							break;
						}
						$shortLang = substr( $blang, 0, 2 );
						if( in_array($shortLang, $active_isocountry) ) {
							$client_lang = $shortLang;
							break;
						}

						// compare with code
						if ( in_array($shortLang, $active_code) ) {
							$client_lang = $shortLang;
							break;
						}
					}
					break;
			}
		}

		// get the name of the language file for joomla
		$jfLang = TableJFLanguage::createByShortcode($client_lang, false);
		if( $jfLang === null && $client_lang!="") {
			$jfLang = TableJFLanguage::createByISO( $client_lang, false );
		}
		else if( $jfLang === null) {
			$jfLang = TableJFLanguage::createByJoomla( $mosConfig_lang );
		}

		if( !$lang_known && $use302redirect ) {
			// using a 302 redirect means that we do not change the language on the fly the first time, but with a clean reload of the page

			$href= "index.php";
			$hrefVars = '';
			$queryString = JRequest::getVar('QUERY_STRING', null ,"SERVER");
			if( !empty($queryString) ) {
				$vars = explode( "&", $queryString );
				if( count($vars) > 0 && $queryString) {
					foreach ($vars as $var) {
						if( eregi('=', $var ) ) {
							list($key, $value) = explode( "=", $var);
							if( $key != "lang" ) {
								if( $hrefVars != "" ) {
									$hrefVars .= "&amp;";
								}
								// ignore mosmsg to ensure it is visible in frontend
								if( $key != 'mosmsg' ) {
									$hrefVars .= "$key=$value";
								}
							}
						}
					}
				}
			}

			// Add the existing variables
			if( $hrefVars != "" ) {
				$href .= '?' .$hrefVars;
			}

			if( $jfLang->getLanguageCode() != null ) {
				$ulang = 'lang=' .$jfLang->getLanguageCode();
			} else {
				// it's important that we add at least the basic parameter - as of the sef is adding the actual otherwise!
				$ulang = 'lang=';
			}

			// if there are other vars we need to add a & otherwiese ?
			if( $hrefVars == '' ) {
				$href .= '?' . $ulang;
			} else {
				$href .= '&amp;' . $ulang;
			}

			$registry->setValue("config.multilingual_support", true);
			global $mainframe;

			$mainframe->setUserState('application.lang',$jfLang->code);
			$registry->setValue("config.jflang", $jfLang->code);
			$registry->setValue("config.lang_site",$jfLang->code);
			$registry->setValue("config.language",$jfLang->code);
			$registry->setValue("joomfish.language",$jfLang);

			$GLOBALS['iso_client_lang'] = $jfLang->getLanguageCode();

			$href = JRoute::_($href,false);
			
			header( 'HTTP/1.1 303 See Other' );
			header( "Location: ". $href );
			exit();
		}

		if( isset($jfLang) && $jfLang->code != "" && ($jfLang->active  || $jfm->getCfg("frontEndPreview") )) {
			$mosConfig_lang = $jfLang->code;
		} else {
			$jfLang = TableJFLanguage::createByJoomla( $mosConfig_lang );
			if( !$jfLang->active ) {
			?>
			<div style="background-color: #c00; color: #fff">
				<p style="font-size: 1.5em; font-weight: bold; padding: 10px 0px 10px 0px; text-align: center; font-family: Arial, Helvetica, sans-serif;">
				Joom!Fish config error: Default language is inactive!<br />&nbsp;<br />
				Please check configuration, try to use first active language</p>
			</div>
			<?php
			$activeLanguages = $jfm->getActiveLanguages();
			if( count($activeLanguages) > 0 ) {
				$jfLang = $activeLanguages[0];
				$mosConfig_lang = $jfLang->code;
			}
			else {
				// No active language defined - using system default is only alternative!
			}
			}
			$client_lang = ($jfLang->shortcode!='') ? $jfLang->shortcode : $jfLang->iso;
		}

		$overwriteGlobalConfig =  $params->get( 'overwriteGlobalConfig', 0 );
		if($overwriteGlobalConfig ) {
			// We should overwrite additional global variables based on the language parameter configuration
			$langParams = new JParameter( $jfLang->params );
			foreach ($langParams->toArray() as $key => $value) {
				$GLOBALS['mosConfig_' .$key] =$value;
			}
		}

		if ($enableCookie){
			setcookie( "lang", "", time() - 1800, "/" );
			setcookie( "jfcookie", "", time() - 1800, "/" );
			setcookie( "jfcookie[lang]", $client_lang, time()+24*3600, '/' );
		}
		
		$GLOBALS['iso_client_lang'] = $client_lang;
		$GLOBALS['mosConfig_lang'] = $jfLang->code;

		$registry->setValue("config.multilingual_support", true);

		global $mainframe;

		$mainframe->setUserState('application.lang',$jfLang->code);
		$registry->setValue("config.jflang", $jfLang->code);
		$registry->setValue("config.lang_site",$jfLang->code);
		$registry->setValue("config.language",$jfLang->code);
		$registry->setValue("joomfish.language",$jfLang);
		/*
		}
		else if ($client_lang=="eng") {
		$mainframe->setLanguage("en-GB");
		$registry->setValue("config.jflang", "english");
		$mainframe->setUserState('application.lang','en-GB');
		}
		*/
		// Force factory static instance to be updated if necessary
		$lang =& JFactory::getLanguage();
		if ($jfLang->code != $lang->getTag()){
			$lang =& JFactory::_createLanguage();
		}

		// no need to set locale for this ISO code its done by JLanguage
		
		// Get the global configuration object
		$registry =& JFactory::getConfig();

		// Load the configuration values into the registry
		$registry->loadObject($config);

		// overwrite with the valued from $jfLang
		$params = new JParameter($jfLang->params);
		$paramarray = $params->toArray();
		foreach ($paramarray as $key=>$val) {
			$registry->setValue("config.".$key,$val);

			if (defined("_JLEGACY")){
				$name = 'mosConfig_'.$key;
				$GLOBALS[$name] = $val;
			}
		}

	}

	/**
	 * Custom handlers to deal with bad component routers e.g. for contact
	 */ 
	function procesCustomBuildRule($router, &$uri){
		$option = $uri->getVar("option","");
		if (strpos($option,"com_")!==0) return;
		$option = substr($option,4);
		$customFile = dirname(__FILE__).DS."jfrouter".DS.$option.".php";
		if (file_exists($customFile)){
			include_once($customFile);
			if (function_exists("JFRouterHelper".ucfirst($option))){
				$function = "JFRouterHelper".ucfirst($option);
				$function ($router, $uri);
			}
		}
	}
	
	function parseJFRule($router, &$uri){
		//echo "got here too lang = ".$uri->getVar("lang","")."<br/>";
		$route = $uri->getPath();

		$conf =& JFactory::getConfig();
		$params = $conf->getValue("jfrouter.params");

		$sefordomain = $params->get("sefordomain","sefprefix");

		if ($sefordomain == "subdomain"){
			$host = $uri->getHost();
			// TODO cache the indexed array
			$rawsubdomains = $params->getValue("sefsubdomain",array());
			$subdomains = array();
			$jfm =&  JoomFishManager::getInstance();
			$langs = $jfm->getLanguagesIndexedById();
			foreach ($rawsubdomains as $domain) {
				list($langid,$domain) = split("::",$domain,2);
				$domain = strtolower(str_replace("http://","",$domain));
				$domain = str_replace("https://","",$domain);
				$domain = preg_replace("#/$#","",$domain);
				//$domain = str_replace("/","",$domain);
				$subdomains[$domain]=$langs[$langid]->shortcode;
			}
			if (array_key_exists($host, $subdomains)){
				$lang = $subdomains[$host];
				// This get over written later - really stupid !!!
				$uri->setVar("lang",$lang);
				JRequest::setVar('lang', $lang );
				// I need to discover language here since menu is loaded in router
				plgSystemJFRouterpro::_discoverJFLanguage();
				$config =& JFactory::getConfig();
				// TODO fix this for HTTPS
				$config->setValue('config.live_site',"http://".$host);
				$config->setValue("joomfish.current_host",$host);
				return array("lang"=>$lang);
			}
		}

		else {
			// Consider stripping base path from URI
			/*
			$live_site = JURI::base();
			$livesite_uri = new JURI($live_site);
			$livesite_path = $livesite_uri->getPath();
			$route = str_replace($livesite_path,"",$route);
			*/

			$jfm =&  JoomFishManager::getInstance();
			$langs = $jfm->getLanguagesIndexedById();

			$sefprefixes = $params->getValue("sefprefixes",array());

			// Workaround if some language prefixes are missing
			if (!is_array($sefprefixes)){
				$sefprefixes = array();
			}
			if (count($sefprefixes)<count($langs)){
				foreach ($sefprefixes as $prefix) {
					list($langid,$prefix) = split("::",$prefix,2);
					if (array_key_exists($langid,$langs)){
						$langs[$langid]->hasprefix = true;
					}
				}
				foreach ($langs as $lang) {
					if (!isset($lang->hasprefix)){
						$sefprefixes[] = $lang->id."::".$lang->shortcode;
					}
				}
			}

			$segments = explode('/', $route);
			$seg=0;
			while ($seg<count($segments)){
				if (strlen($segments[$seg])==0) {
					$seg++;
					continue;
				}
				foreach ($sefprefixes as $prefix) {
					list($langid,$prefix) = split("::",$prefix,2);
					// split off any suffix
					if (strpos($segments[$seg],".")>0){
						$segcompare = substr($segments[$seg],0, strpos($segments[$seg],"."));
						// Trap for pdf, feed of html info in the extension
						if (strpos($segments[$seg],$prefix.".")===0){
							$format = str_replace($prefix.".","",$segments[$seg]);
							//$uri->setVar("format",$format);
							//JRequest::setVar('format', $format);
						}
					}
					else {
						$segcompare = $segments[$seg];
					}
					// does the segment match the prefix
					if ($segcompare==$prefix){
						unset($segments[$seg]);//array_shift($segments);
						$uri->setPath(implode("/",$segments));

						$lang = $langs[$langid]->shortcode;
						// This get over written later - really stupid !!!
						$uri->setVar("lang",$lang);

						JRequest::setVar('lang', $lang);
						// I need to discover language here since menu is loaded in router
						plgSystemJFRouterpro::_discoverJFLanguage();
						return array("lang"=>$lang);
					}
				}

				$seg++;
			}
		}
		plgSystemJFRouterpro::_discoverJFLanguage();
		return array();
	}

}

function prorouteJFRule($router, &$uri){
	$registry =& JFactory::getConfig();
	$multilingual_support= $registry->getValue("config.multilingual_support",false);
	$jfLang = $registry->getValue("joomfish.language", false);
	if ($multilingual_support && $jfLang){
		if ($uri->getVar("lang","")==""){
			$uri->setVar("lang",($jfLang->shortcode!='') ? $jfLang->shortcode : $jfLang->iso);
		}
		// this is dependent on Joomfish router being first!!
		$lang=$uri->getVar("lang","");

		$conf =& JFactory::getConfig();

		// This may not ready at this stage
		$params = $conf->getValue("jfrouter.params");

		// so load plugin parameters directly
		if (is_null($params)){
			$params =& JPluginHelper::getPlugin("system", "jfrouter");
			$params = new JParameter($params->params);
		}
		
		$sefordomain = $params->get("sefordomain","sefprefix");

		if ($sefordomain == "subdomain"){
			// If I set config_live_site I actually don't need this function at all let alone this logic ?  Apart from language switcher.
			// TODO cache the indexed array
			$rawsubdomains = $params->getValue("sefsubdomain",array());
			$subdomains = array();
			$jfm =&  JoomFishManager::getInstance();
			$langs = $jfm->getLanguagesIndexedById();
			foreach ($rawsubdomains as $domain) {
				list($langid,$domain) = split("::",$domain,2);
				$domain = strtolower(str_replace("http://","",$domain));
				$domain = str_replace("https://","",$domain);
				$domain = preg_replace("#/$#","",$domain);
				//$domain = str_replace("/","",$domain);
				$subdomains[$langs[$langid]->shortcode]=$domain;
			}

			if (array_key_exists($lang,$subdomains)) {
				$uri->setHost($subdomains[$lang]);
				$uri->delVar("lang");
				$registry->setValue("joomfish.sef_host",$subdomains[$lang]);
				
				plgSystemJFRouterpro::procesCustomBuildRule($router, $uri);
				return;
			}
		}
		else {
			// Get the path data
			$route = $uri->getPath();

			//Add the suffix to the uri
			if($router->_mode == JROUTER_MODE_SEF && $route && !$lang!==""){

				$jfm =&  JoomFishManager::getInstance();
				$jfLang = $jfm->getLanguageByShortcode($lang);
				if (!$jfLang) return;

				$sefprefixes = $params->getValue("sefprefixes",array());

				// Workaround if some language prefixes are missing
				$langs = $jfm->getLanguagesIndexedById();
				if (!is_array($sefprefixes)){
					$sefprefixes = array();
				}
				if (count($sefprefixes)<count($langs)){
					foreach ($sefprefixes as $prefix) {
						list($langid,$prefix) = split("::",$prefix,2);
						if (array_key_exists($langid,$langs)){
							$langs[$langid]->hasprefix = true;
						}
					}
					foreach ($langs as $lang) {
						if (!isset($lang->hasprefix)){
							$sefprefixes[] = $lang->id."::".$lang->shortcode;
						}
					}
				}

				foreach ($sefprefixes as $prefix) {
					list($langid,$prefix) = split("::",$prefix,2);
					if ($jfLang->id == $langid){
						$uri->setPath($uri->getPath()."/".$prefix);
						$uri->delVar("lang");
						plgSystemJFRouterpro::procesCustomBuildRule($router, $uri);
						return;
					}
				}
			}
		}
		
	}
	return;
}