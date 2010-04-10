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
 * Simplest Forum List Model
 *
 * @package Simplest Forum
 */
class SimplestForumModelForumList extends JModel
{
    var $_data;

	/**
	 * Overridden constructor
	 * @access	protected
	*/
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
        $query = 'SELECT a.*
                  FROM #__simplestforum_forum AS a
                  ORDER BY a.name';

        return $query;
    } //end _buildQuery


    /**
     * Returns an array of forum items from the database.
     * @return array an array of forum objects
    */
    function getData()
    {
        //only perform the operation if we not already done so
        if (empty($this->_data)) {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList($query);
        }

        return $this->_data;
    } //end getData


    /**
     * Deletes forums based on request supplied ids (as an array cid).
     * @return bool true on successfuly deletion, false otherwise. On
     * error setError is called.
    */
    function delete()
    {
        $cid = JRequest::getVar('cid');

        $query = 'DELETE FROM #__simplestforum_forum WHERE id='.implode(' OR id=', $cid);
        $this->_db->setQuery($query);

        return $this->_db->query();
    } //end delete
}
?>
