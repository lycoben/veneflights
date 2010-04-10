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

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

class JFRouter extends JRouterSite 
{

	function parse(&$uri) {
		/*
		if (file_exists(dirname(__FILE__)."/jfpresef.php")){
			include_once(dirname(__FILE__)."/jfpresef.php");
			jfpresef($uri);
		}
		*/
		$res = parent::parse($uri);
		if (is_array($res) && count($res)==0 && file_exists(dirname(__FILE__)."/jfpostsef.php")){
			include_once(dirname(__FILE__)."/jfpostsef.php");
			jfpostsef($uri);
		}
		return $res;
	}
	
	function _buildSefRoute(&$uri)
	{
		// Get the query data
		$query = $uri->getQuery(true);
		
		if(!isset($query['option'])) {
			return;
		}
		
		//  Build the component route
		$component	= preg_replace('/[^A-Z0-9_\.-]/i', '', $query['option']);

		// Use the JF Aware component routing handler if it exists
		$path = dirname(__FILE__).DS.$component.DS.'router.php';
		if (!file_exists($path)){
			return parent::_buildSefRoute($uri);
		}

		// Get the route
		$route = $uri->getPath();

		// TODO force a translated version for this for module!
		$menu =& $this->_getJFAwareMenu();

		$tmp 		= '';
		
		// Use the custom routing handler if it exists
		if (file_exists($path) && !empty($query))
		{
			require_once $path;
			$function	= "JF".substr($component, 4).'BuildRoute';
			$parts		= $function($query);

			// encode the route segments
			$parts = $this->_encodeSegments($parts);

			$result = implode('/', $parts);
			$tmp	= ($result != "") ? '/'.$result : '';
		}

		//  Build the application route
		$built = false;
		if (isset($query['Itemid']) && !empty($query['Itemid']))
		{
			$item = $menu->getItem($query['Itemid']);

			if (is_object($item) && $query['option'] == $item->component) {
				$tmp = !empty($tmp) ? $item->route.'/'.$tmp : $item->route;
				$built = true;
			}
		}
		
		if(!$built) {
			$tmp = 'component/'.substr($query['option'], 4).'/'.$tmp;
		}

		$route .= '/'.$tmp;

		// Unset unneeded query information
		unset($query['Itemid']);
		unset($query['option']);

		//Set query again in the URI
		$uri->setQuery($query);
		$uri->setPath($route);
	}
	
	
	/**
	 * Process the parsed router variables based on custom defined rules
	 *
	 * @abstract
	 * @access protected
	 */
	function _processParseRules(&$uri)
	{
		$vars = array();		
		foreach($this->_rules['parse'] as $rule) {
			$vars = $rule($this,$uri);
		}		
		// Process the pagination support
		if($this->_mode == JROUTER_MODE_SEF)
		{
			$app =& JFactory::getApplication();

			if($start = $uri->getVar('start'))
			{
				$uri->delVar('start');
				$vars['limitstart'] = $start;
			}
		}
		return $vars;
	}

	/**
	 * Process the build uri query data based on custom defined rules
	 *
	 * @abstract
	 * @access protected
	 */
	function _processBuildRules(&$uri)
	{		
		
		// Make sure any menu vars are used if no others are specified
		if(($this->_mode != JROUTER_MODE_SEF) && $uri->getVar('Itemid') && count($uri->getQuery(true)) == 2)
		{
			$menu =& $this->_getJFAwareMenu();

			// Get the active menu item
			$itemid = $uri->getVar('Itemid');
			$item   = $menu->getItem($itemid);

			$uri->setQuery($item->query);
			$uri->setVar('Itemid', $itemid);
		}

		// Process the attached build rules
		foreach($this->_rules['build'] as $rule) {
			$rule($this,$uri);
		}

		// Get the path data
		$route = $uri->getPath();

		if($this->_mode == JROUTER_MODE_SEF && $route)
		{
			$app =& JFactory::getApplication();

			if ($limitstart = $uri->getVar('limitstart'))
			{
				$uri->setVar('start', (int) $limitstart);
				$uri->delVar('limitstart');
			}
		}

		$uri->setPath($route);
		
	}

	function & _getJFAwareMenu()
	{

		$registry =& JFactory::getConfig();
		$jfLang = $registry->getValue("config.jflang", false);
		$sefLang = $registry->getValue("joomfish.sef_lang", false);

		if (!$sefLang || $sefLang===$jfLang){
			return JSite::getMenu();
		}
		
		$client = "site";
		$options=array();
		//Load the router object
		$info =& JApplicationHelper::getClientInfo($client, true);

		$path = $info->path.DS.'includes'.DS.'menu.php';
		if(file_exists($path))
		{
			require_once $path;

			// Create a JPathway object
			$classname = 'JMenu'.ucfirst($client);
			$instance = new $classname($options);
			return $instance;
		}
		else
		{
			//$error = JError::raiseError( 500, 'Unable to load menu: '.$client);
			$error = null; //Jinx : need to fix this
			return $error;
		}
		
	}
}