<?php
/**
* @version 1.0.2
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
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class SimplestForumLatestPostsHelper
{
    /**
     * Returns a list of post items
    */
    function getItems($forumIds, $numPosts)
    {
        $db = &JFactory::getDBO();

        if (empty($forumIds)) {
            return;
        }

        $query = 'SELECT a.id, a.forumId, a.date, a.subject, a.message, a.parentId, a.thread
                  FROM #__simplestforum_post AS a
                  WHERE a.forumId IN ('.implode(',', $forumIds).')
                  ORDER BY a.date DESC'
        ;
        $db->setQuery($query, 0, $numPosts);

        return ($items = $db->loadObjectList())?$items:array();
    } //end getItems

} //end SimplestForumLatestPostsHelper
?>
