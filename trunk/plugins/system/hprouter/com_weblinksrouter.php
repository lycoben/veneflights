<?php
/**
* @version		$Id: router.php 10752 2008-08-23 01:53:31Z eddieajau $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/**
 * This file has been modified by Hannes Papenberg for the HP Router plugin
 */

function WeblinksHPBuildRoute(&$query)
{
	static $items;
	static $active;
	
	$segments	= array();
	$itemid		= null;

	// Get the menu items for this component.
	if (!$items) {
		$component	= &JComponentHelper::getComponent('com_weblinks');
		$menu		= &JSite::getMenu();
		$titems		= $menu->getItems('componentid', $component->id);
		if(is_array($titems))
		{
			foreach($titems as $titem)
			{
				$items[$titem->id] = $titem;
			}
		}
		$active = $menu->getActive();
	}

	// Break up the weblink/category id into numeric and alias values.
	if (isset($query['id']) && strpos($query['id'], ':')) {
		list($query['id'], $query['alias']) = explode(':', $query['id'], 2);
	}

	// Break up the category id into numeric and alias values.
	if (isset($query['catid']) && strpos($query['catid'], ':')) {
		list($query['catid'], $query['catalias']) = explode(':', $query['catid'], 2);
	}
	// Search for an appropriate menu item.
	if (is_array($items))
	{
		// If only the option and itemid are specified in the query, return that item.
		if (!isset($query['view']) && !isset($query['id']) && !isset($query['catid']) && isset($query['Itemid'])) {
			$itemid = (int) $query['Itemid'];
		}
		
		if(@$active->query['view'] == 'categories' || !isset($active->query['view']))
		{
			$itemid = $active->id;
		}
		// Search for a specific link based on the critera given.
		if (!$itemid)
		{
			foreach ($items as $item)
			{
				// Check if this menu item links to this view.
				if (isset($item->query['view']) && isset($query['view'])
					&& $item->query['view'] == $query['view']
					&& isset($item->query['id']) && $item->query['id'] == $query['id'])
				{
					$itemid	= $item->id;
				}
				elseif (isset($item->query['view']) && $item->query['view'] == 'category'
					&& isset($query['view']) && $query['view'] == 'weblink'
					&& $item->query['id'] == $query['catid'])
				{
					$itemid	= $item->id;
				}
			}
		}

		// If no specific link has been found, search for a general one.
		if ($itemid)
		{
			if((isset($items[$itemid]->query['view']) && $items[$itemid]->query['view'] == 'categories') || !isset($items[$itemid]->query['view']))
			{
				if(isset($query['view']) && $query['view'] == 'category')
				{
					$segments[]	= isset($query['alias']) ? $query['alias'] : $query['id'];
					unset($query['id']);
					unset($query['alias']);
					unset($query['view']);
					return $segments;					
				}
				
				if(isset($query['view']) && $query['view'] == 'weblink')
				{
					$segments[]	= isset($query['catalias']) ? $query['catalias'] : $query['catid'];
					$segments[]	= isset($query['alias']) ? $query['alias'] : $query['id'];
					unset($query['catid']);
					unset($query['catalias']);
					unset($query['id']);
					unset($query['alias']);
					unset($query['view']);
					return $segments;
				}
			}
			
			if (isset($items[$itemid]->query['view']) && $items[$itemid]->query['view'] == 'category'
				&& isset($query['view']) && $query['view'] == 'weblink')
			{
				$segments[] = isset($query['alias']) ? $query['alias'] : $query['id'];
					unset($query['catid']);
					unset($query['catalias']);
					unset($query['id']);
					unset($query['alias']);
					unset($query['view']);
					return $segments;
			}
		}	
	}

	// Check if the router found an appropriate itemid.
	if (!$itemid)
	{
		// Check if a category was specified
		if (isset($query['catid']))
		{
			// Push the catid onto the stack.
			$segments[] = isset($query['alias']) ? $query['alias'] : $query['id'];

			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
		}
		// Check if a id was specified.
		elseif (isset($query['id']))
		{
			$segments[] = isset($query['catalias']) ? $query['catalias'] : $query['catid'];
			// Push the id onto the stack.
			$segments[] = isset($query['alias']) ? $query['alias'] : $query['id'];
			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
			unset($query['catid']);
			unset($query['catalias']);
			unset($query['view']);
		}
		
		if(isset($query['id']))
		{
			$segments[] = isset($query['alias']) ? $query['alias'] : $query['id'];
			unset($query['id']);
			unset($query['alias']);
			unset($query['view']);
		}
	}
	return $segments;
}

function WeblinksHPParseRoute($segments)
{
	$vars	= array();

	// Get the active menu item.
	$menu	= &JSite::getMenu();
	$item	= &$menu->getActive();

	// Check if we have a valid menu item.
	if (is_object($item))
	{
		// Proceed through the possible variations trying to match the most specific one.
		if (isset($item->query['view']) && $item->query['view'] == 'category' && isset($segments[0]))
		{
			if(count($segments) == 2)
			{
				$vars['id']	= $segments[1];
			} else {
				$vars['id']	= $segments[0];
			}
			// Contact view.

			$vars['view']	= 'weblink';
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'categories' && count($segments) == 2)
		{
			// Weblink view.
			$vars['view']	= 'weblink';
			$vars['id']		= $segments[1];
			$vars['catid']	= $segments[0];
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'categories' && isset($segments[0]))
		{
			// Category view.
			$vars['view']	= 'category';
			$vars['id']		= $segments[0];
		}
	}
	else
	{
		// Count route segments
		$count = count($segments);

		// Check if there are any route segments to handle.
		if ($count)
		{
			if ($count == 2)
			{
				// We are viewing a weblink.
				$vars['view']	= 'weblink';
				$vars['catid']	= $segments[$count-2];
				$vars['id']		= $segments[$count-1];
			}
			else
			{
				// We are viewing a category.
				$vars['view']	= 'category';
				$vars['id']	= $segments[$count-1];
			}
		}
	}

	$alias = explode(':', $vars['id']);
	if((int) $alias[0] > 0)
	{
		$vars['id'] = $alias[0];
	} else {
		if(count($alias) > 1)
		{
			$vars['id'] = $alias[0].'-'.$alias[1];
		}

		$db =& JFactory::getDBO();
		if($vars['view'] == 'weblink')
		{
			$query = 'SELECT id FROM #__weblinks WHERE alias = '.$db->Quote($vars['id']);
		} elseif($vars['view'] == 'category') {
			$query = 'SELECT id FROM #__categories WHERE section = \'com_weblinks\' && alias = '.$db->Quote($vars['id']);
		}
		$db->setQuery($query);
		$vars['id'] = $db->loadResult();
	}

	return $vars;
}
