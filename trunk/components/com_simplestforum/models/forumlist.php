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
 * Simplest Forum Forum List model
 *
 * @package Simplest Forum
 */
class SimplestForumModelForumList extends JModel
{
    var $_data;

	function SimplestForumModelForumList()
	{
		parent::__construct();
	}

    /**
     * Creates a query string for retrieval of data from the database.
     * @access private
     * @return string the query string for the database operation
    */
    function _buildQuery()
    {
        $query = 'SELECT a.*, COUNT(b.id) AS posts, MAX(b.date) AS lastActivity
                  FROM #__simplestforum_forum AS a
                  LEFT JOIN #__simplestforum_post AS b ON b.forumId = a.id
                  GROUP BY a.id
                  ORDER BY a.name'
        ;

        return $query;
    } //end _buildQuery


    /**
     * Returns an array of forum items from the database.
     * @return array an array of forum objects
    */
    function getData()
    {
        if (empty($this->_data))
        {
            $query = $this->_buildQuery();
            $this->_data = ($this->_data = $this->_getList($query))?$this->_data:array();
        }

        return $this->_data;
    } //end getData
}
?>
