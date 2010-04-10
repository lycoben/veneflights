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
//no direct access
defined('_JEXEC') or die();

/**
 * A helper class for some common forum operations.
 * @package Simplest Forum
*/
class ForumHelper
{
    /**
     * Returns the number of posts contained within the specified forum.
     * @param object a forum object
     * @return int the number of posts
    */
    function getNumPosts($forum)
    {
        $database = JFactory::getDBO();

        if (!$forum->id) {
            return 0;
        }

        $query = 'SELECT COUNT(*) FROM #__simplestforum_post WHERE forumId='.(int)$forum->id;
        $database->setQuery($query);
        
        return $database->loadResult();
    } //getNumPosts


    /**
     * Returns a forum object for the forum whose id is the specified id.
     * @param forumId the id of the desired forum
     * @return object a forum object or null if none is found
    */
    function getForum($forumId)
    {
        $database = &JFactory::getDBO();
        $query = 'SELECT a.*
                  FROM #__simplestforum_forum AS a
                  WHERE a.id='.(int)$forumId;
        $database->setQuery($query);

        return $database->loadObject();
    } //end getForumName

    /**
     * Returns a formatted date string based upon the current offset and the
     * parameter format.
     * @param $date string Y-m-d H:i:s date
    */
    function getDate($date)
    {
        $user = &JFactory::getUser();

        $params = &JComponentHelper::getParams('com_simplestforum');

        return date($params->get('dateformat', 'Y-m-d H:i:s').' T ', strtotime($date));
    } //end getDate

} //end class
?>
