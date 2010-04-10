<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2008 Think Network GmbH, Munich, 2008 GWE Systems Ltd 
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
 * @subpackage system.jfrouterpro
 * @version 2.0
 *
*/

defined('_JEXEC') or die('Restricted access');

function JFPollBuildRoute(&$query)
{
	$db =& JFactory::getDBO();
	$pfunc = $db->_profile();

	$registry =& JFactory::getConfig();
	$sefLang = $registry->getValue("joomfish.sef_lang", false);
	if ($sefLang){
		$language = $sefLang;
		$forceTranslation = true;
	}
	else {
		$language = $registry->getValue("config.jflang", "");
		$forceTranslation = false;
	}

	// cache the results
	$jfm =& JoomFishManager::getInstance();
	if ($jfm->getCfg("transcaching",1)){
		$cache = $jfm->getCache($language);
		$result =  $cache->get( "JFPollBuildRouteCached", array($query, $language,$forceTranslation));
	}
	else {
		$result = JFPollBuildRouteCached($query, $language,$forceTranslation);
	}
	$query = $result["query"];
	$db->_profile($pfunc);
	return $result["val"];
}

function JFPollBuildRouteCached(&$query, $jfLang,$forceTranslation)
{
	$result = array();
	$result["query"] =& $query;
	$result["val"]="";

	// TODO - translate category and article alias and anything else needed?
	static $translations;
	if (!isset($translations)){
		$translations = array();
	}
	$db	=& JFactory::getDBO();

	$registry =& JFactory::getConfig();
	$multilingual_support= $registry->getValue("config.multilingual_support",false);
	$siteLang = $registry->getValue("config.defaultlang","site");

	if ($jfLang	!= $siteLang){
		if(isset($query['id'])) {
			$parts = explode(":",$query['id']);
			if (count($parts)>=2){
				$cat = intval($parts[0]);
				$sql = "SELECT value FROM #__jf_content as jfc LEFT JOIN #__languages as lang ON jfc.language_id=lang.id ";
				$sql .= "WHERE reference_table='polls' AND reference_field='alias' AND reference_id=$cat AND lang.code='".$jfLang."'";
				$db->setQuery($sql);
				$cattrans = $db->loadObject(false);
				if (!is_null($cattrans) && isset($cattrans->value)){
					$query['id']=trim($cat.":".$cattrans->value);
				}
			}
		}
	}
	else if ($forceTranslation){
		// This is the scenario where the Joomfish Module needs to get the current URL in the original site language
		if(isset($query['id'])) {
			$parts = explode(":",$query['id']);
			if (count($parts)>=2){
				$cat = intval($parts[0]);
				$sql = "SELECT a.alias as value ";
				$sql .= "FROM #__polls AS a WHERE id=$cat";
				$db->setQuery($sql);
				$cattrans = $db->loadObject(false);
				if (!is_null($cattrans) && isset($cattrans->value)){
					$query['id']=trim($cat.":".$cattrans->value);
				}
			}
		}

	}

	$component	= preg_replace('/[^A-Z0-9_\.-]/i', '', $query['option']);

	// Use the component routing handler if it exists
	$path = JPATH_BASE.DS.'components'.DS.$component.DS.'router.php';

	// Use the custom routing handler
	if (file_exists($path) && !empty($query))
	{
		require_once $path;
		$function	= ucfirst(substr($component, 4)).'BuildRoute';
		$parts		= $function($query);
		$result["val"]=$parts;
		return $result;
	}

}

function JFPollParseRoute($segments)
{
	// Use the component routing handler if it exists
	$component = "com_contact";
	$path = JPATH_BASE.DS.'components'.DS.$component.DS.'router.php';
	require_once $path;
	$function	= ucfirst(substr($component, 4)).'ParseRoute';
	return $function($segments);
}
