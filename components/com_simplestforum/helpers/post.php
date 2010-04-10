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
 * A helper class for some common post operations.
 * @package Simplest Forum
*/
class PostHelper
{
    /**
     * Returns a post object for the post whose id is the specified id.
     * @param postId the id of the desired post
     * @return object a post object or null if none is found
    */
    function getPost($postId)
    {
        $database = &JFactory::getDBO();
        $query = 'SELECT a.*
                  FROM #__simplestforum_post AS a
                  WHERE a.id='.(int)$postId;
        $database->setQuery($query);

        return $database->loadObject();
    } //end getPost
}
?>
