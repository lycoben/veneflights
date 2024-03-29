<?php
/**
 * QContacts Contact manager component for Joomla! 1.5
 *
 * @version 1.0.3
 * @package qcontacts
 * @author Massimo Giagnoni
 * @copyright Copyright (C) 2008 Massimo Giagnoni. All rights reserved.
 * @copyright Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
 /*
This file is part of QContacts.
QContacts is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
function QContactsBuildRoute(&$query) {
	static $items;

	$segments	= array();
	$itemid		= null;

	// Get the menu items for this component.
	if (!$items) {
		$component	= &JComponentHelper::getComponent('com_qcontacts');
		$menu		= &JSite::getMenu();
		$items		= $menu->getItems('componentid', $component->id);
	}

	// Break up the contact id into numeric and alias values.
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

		// Search for a specific link based on the critera given.
		if (!$itemid)
		{
			foreach ($items as $item)
			{
				// Check if this menu item links to this view.
				if (isset($item->query['view']) && $item->query['view'] == 'contact'
					&& isset($query['view']) && $query['view'] == 'contact'
					&& isset($item->query['id']) && $item->query['id'] == $query['id'])
				{
					$itemid	= $item->id;
				}
				elseif (isset($item->query['view']) && $item->query['view'] == 'category'
						&& isset($query['view']) && $query['view'] == 'category'
						&& isset($item->query['catid']) && $item->query['catid'] == $query['catid'])
				{
					$itemid	= $item->id;
				}
			}
		}

		// If no specific link has been found, search for a general one.
		if (!$itemid)
		{
			foreach ($items as $item)
			{
				if (isset($query['view']) && $query['view'] == 'contact'
					&& isset($item->query['view']) && $item->query['view'] == 'category')
				{
					// Check for an undealt with contact id.
					if (isset($query['id']))
					{
						// This menu item links to the contact view but we need to append the contact id to it.
						$itemid		= $item->id;
						$segments[]	= isset($query['catalias']) ? $query['catid'].':'.$query['catalias'] : $query['catid'];
						$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
						break;
					}
				}
				elseif (isset($query['view']) && $query['view'] == 'category'
					&& isset($item->query['view']) && $item->query['view'] == 'category'
					&& isset($item->query['id']) && $item->query['id'] != $query['id'])
				{
					// Check for an undealt with category id.
					if (isset($query['catid']))
					{
						// This menu item links to the category view but we need to append the category id to it.
						$itemid		= $item->id;
						$segments[]	= isset($query['alias']) ? $query['id'].':'.$query['alias'] : $query['id'];
						break;
					}
				}
			}
		}
	}

	// Check if the router found an appropriate itemid.
	if (!$itemid)
	{
		// Check if a id was specified.
		if (isset($query['id']))
		{
			if (isset($query['alias'])) {
				$query['id'] .= ':'.$query['alias'];
			}

			// Push the id onto the stack.
			$segments[] = $query['id'];

			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
		}
		elseif (isset($query['catid']))
		{
			if (isset($query['catalias'])) {
				$query['catid'] .= ':'.$query['catalias'];
			}

			if (isset($query['alias'])) {
				$query['id'] .= ':'.$query['alias'];
			}

			// Push the catid onto the stack.
			$segments[]	= 'category';
			$segments[] = $query['catid'];

			// Push the id onto the stack.
			$segments[] = $query['id'];

			// Remove the unnecessary URL segments.
			unset($query['view']);
			unset($query['id']);
			unset($query['alias']);
			unset($query['catid']);
			unset($query['catalias']);
		}
	}
	else
	{
		$query['Itemid'] = $itemid;

		// Remove the unnecessary URL segments.
		unset($query['view']);
		unset($query['id']);
		unset($query['alias']);
		unset($query['catid']);
		unset($query['catalias']);
	}

	return $segments;
}

function QContactsParseRoute($segments)
{
	$vars	= array();

	// Get the active menu item.
	$menu	= &JSite::getMenu();
	$item	= &$menu->getActive();

	// Check if we have a valid menu item.
	if (is_object($item))
	{
		// Proceed through the possible variations trying to match the most specific one.
		if (isset($item->query['view']) && $item->query['view'] == 'contact' && isset($segments[0]))
		{
			// Break up the contact id into numeric and alias values.
			if (isset($segments[0]) && strpos($segments[0], ':')) {
				list($id, $alias) = explode(':', $segments[0], 2);
			}

			// Contact view.
			$vars['view']	= 'contact';
			$vars['id']		= $id;
		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'category' && count($segments) == 2)
		{
			// Break up the category id into numeric and alias values.
			if (isset($segments[0]) && strpos($segments[0], ':')) {
				list($catid, $catalias) = explode(':', $segments[0], 2);
			}

			// Break up the contact id into numeric and alias values.
			if (isset($segments[1]) && strpos($segments[1], ':')) {
				list($id, $alias) = explode(':', $segments[1], 2);
			}

			// Contact view.
			$vars['view']	= 'contact';
			$vars['id']		= $id;
			$vars['catid']	= $catid;

		}
		elseif (isset($item->query['view']) && $item->query['view'] == 'category' && isset($segments[0]))
		{
			// Break up the category id into numeric and alias values.
			if (isset($segments[0]) && strpos($segments[0], ':')) {
				list($catid, $alias) = explode(':', $segments[0], 2);
			}

			// Category view.
			$vars['view']	= 'category';
			$vars['catid']	= $catid;
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
				// We are viewing a contact.
				$vars['view']	= 'contact';
				$vars['id']		= $segments[$count-1];
				$vars['catid']	= $segments[$count-2];
			}
			else
			{
				// We are viewing a category.
				$vars['view']	= 'category';
				$vars['catid']	= $segments[$count-1];
			}
		}
	}
	return $vars;
}