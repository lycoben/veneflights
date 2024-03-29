<?php
/**
* @version 1.3.0
* @package Simplest Forum
* @copyright Copyright (C) 2008 Ambitionality Software LLC. All rights reserved.
* @license GNU/GPL
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
function SimplestForumBuildRoute(&$query)
{
	$segments = array();

    if (isset($query['view'])) {
        $segments[] = $query['view'];
        unset($query['view']);
    }

    if (isset($query['forumId'])) {
        $segments[] = $query['forumId'];
        unset($query['forumId']);
    }

    if (isset($query['parentId'])) {
        $segments[] = $query['parentId'];
        unset($query['parentId']);
    }

    if (isset($query['topic'])) {
        $segments[] = $query['topic'];
        unset($query['topic']);
    }

	return $segments;
}

function SimplestForumParseRoute($segments)
{
	$vars = array();

	//Get the active menu item
	$menu =& JSite::getMenu();
	$item =& $menu->getActive();

	// Count route segments
	$count = count($segments);
    $view = $segments[0];

	//Handle View and Identifier
	switch($view) {
        case 'captcha':
            $vars['view'] = 'captcha';
            break;
		case 'forumlist':
			$vars['view']   = 'forumlist';
            if (isset($item->id)) {
                $vars['Itemid'] = $item->id;
            }
            break;
		case 'topiclist':
			$vars['view']   = 'topiclist';
            $vars['Itemid'] = $item->id;
            if (isset($segments[1])) {
                $vars['forumId']   = $segments[1];
            }
            if (isset($item->id)) {
                $vars['Itemid'] = $item->id;
            }
            break;
        case 'postlist':
        case 'postlist':
			$vars['view']   = 'postlist';
            if (isset($segments[1])) {
                $vars['forumId']   = $segments[1];
            }
            if (isset($segments[2])) {
                $vars['parentId']   = $segments[2];
            }
            if (isset($segments[3])) {
                $vars['topic']   = $segments[3];
            }
            if (isset($item->id)) {
                $vars['Itemid'] = $item->id;
            }
            break;
	}

	return $vars;
}
?>
