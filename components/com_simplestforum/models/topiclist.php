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

jimport( 'joomla.application.component.model' );

/**
 * Simplest Forum Topic List model
 *
 * @package Simplest Forum
 */
class SimplestForumModelTopicList extends JModel
{
    var $_data;

    /**
     * The id of the forum of posts for which we should be concerned.
    */
    var $_forumId;


	function SimplestForumModelTopicList()
	{
		parent::__construct();
	}


    /**
     * Sets the id for the parent forum.
     * @param forumId the id of the forum to focus on.
    */
    function setForumId($forumId)
    {
        $this->_forumId = $forumId;
    } //end setForumId


    /**
     * Creates a query string for retrieval of data from the database.
     * @access private
     * @return string the query string for the database operation
    */
    function _buildQuery()
    {
        $query = 'SELECT DISTINCT a.id, a.subject, a.date, COUNT(c.id) AS replies, IF(c.id IS NULL, a.date, MAX(c.date)) AS lastActivity
                  FROM #__simplestforum_post AS a
                  LEFT JOIN #__simplestforum_post AS c ON c.thread = a.id AND c.id != a.id
                  LEFT JOIN #__users AS d ON d.id = c.authorId
                  WHERE a.forumId = '.(int)$this->_forumId.' AND a.parentId = 0
                  GROUP BY a.id
                  ORDER BY lastActivity DESC'
        ;

        return $query;
    } //end _buildQuery


    /**
     * Returns an array of forum items from the database.
     * @return array an array of forum objects
    */
    function getData()
    {
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_db->setQuery($query);
            $this->_data = ($this->_data = $this->_db->loadObjectList())?$this->_data:array();

//          echo '<pre>'.str_replace('#__', 'jos_', $query).'</pre>';
        }

        return $this->_data;
    } //end getData

} //end class
?>
