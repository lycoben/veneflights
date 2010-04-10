<?php
/**
* @version		$Id: hprouter.php $
* @package		HP Router
* @copyright	Copyright (C) 2008 Hannes Papenberg. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* HP Router is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class plgSystemHPRouter extends JPlugin
{
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param	object		$subject The object to observe
	  * @param 	array  		$config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgSystemSef(&$subject, $config)  {
		parent::__construct($subject, $config);
	}

	function onAfterInitialise()
	{
		$application =& JFactory::getApplication();
		$router =& $application->getRouter();
		if($router->getMode() == JROUTER_MODE_SEF) {
			$router->attachBuildRule(array(&$this, 'build'));
			$router->attachParseRule(array(&$this, 'parse'));
		}
	}

	function build(&$router, &$uri)
	{
		$route = $uri->getPath();

		$query = $uri->getQuery(true);
		if(!isset($query['option'])) {
			return;
		}
		$menu =& JSite::getMenu();

		$component	= preg_replace('/[^A-Z0-9_\.-]/i', '', $query['option']);
		if(file_exists(JPATH_BASE.DS.'plugins'.DS.'system'.DS.'hprouter'.DS.$component.'router.php'))
		{// var_dump($query);
			require_once(JPATH_BASE.DS.'plugins'.DS.'system'.DS.'hprouter'.DS.$component.'router.php');
			$function = substr($component, 4).'HPBuildRoute';
			$parts = $function($query);
			$result = implode('/', $parts);
			$tmp = ($result != "") ? '/'.$result : '';
			/*
			 * Build the application route
			 */
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
	}

	function parse(&$router, &$uri)
	{
		$vars   = array();

		$menu  =& JSite::getMenu(true);
		$route = $uri->getPath();

		//Get the variables from the uri
		$vars = $uri->getQuery(true);

		//Handle an empty URL (special case)
		if(empty($route))
		{

			//If route is empty AND option is set in the query, assume it's non-sef url, and parse apropriately
			if(isset($vars['option']) || isset($vars['Itemid'])) {
				return $router->_parseRawRoute($uri);
			}

			$item = $menu->getDefault();

			//Set the information in the request
			$vars = $item->query;

			//Get the itemid
			$vars['Itemid'] = $item->id;

			// Set the active menu item
			$menu->setActive($vars['Itemid']);

			return $vars;
		}


		/*
		 * Parse the application route
		 */

		if(substr($route, 0, 9) == 'component')
		{
			$segments	= explode('/', $route);
			$route      = str_replace('component/'.$segments[1], '', $route);

			$vars['option'] = 'com_'.$segments[1];
			$vars['Itemid'] = null;
		}
		else
		{
			//Need to reverse the array (highest sublevels first)
			$items = array_reverse($menu->getMenu());

			foreach ($items as $item)
			{
				$lenght = strlen($item->route); //get the lenght of the route

				if($lenght > 0 && strpos($route.'/', $item->route.'/') === 0 && $item->type != 'menulink')
				{
					$route   = substr($route, $lenght);

					$vars['Itemid'] = $item->id;
					$vars['option'] = $item->component;
					break;
				}
			}
		}

		// Set the active menu item
		if ( isset($vars['Itemid']) ) {
			$menu->setActive(  $vars['Itemid'] );
		}

		//Set the variables
		$router->setVars($vars);

		/*
		 * Parse the component route
		 */
		if(!empty($route) && isset($router->_vars['option']) )
		{
			$segments = explode('/', $route);
			array_shift($segments);

			// Handle component	route
			$component = preg_replace('/[^A-Z0-9_\.-]/i', '', $router->_vars['option']);

			// Use the component routing handler if it exists
			$path = JPATH_BASE.DS.'plugins'.DS.'system'.DS.'hprouter'.DS.$component.'router.php';

			if (file_exists($path) && count($segments))
			{
				require_once $path;
				$function =  substr($component, 4).'HPParseRoute';
				$vars =  $function($segments);
				$router->setVars($vars);
			}
		}
		else
		{
			//Set active menu item
			if($item =& $menu->getActive()) {
				$vars = $item->query;
			}
		}

		return $vars;
	}
}
