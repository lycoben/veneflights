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
 * Simplest Forum Forum Editing Model
 *
 * @package Simplest Forum
 */
class SimplestForumModelForumEdit extends JModel
{
    var $_data;

    /**
     * The id of the forum being edited.
    */
    var $_id;

	/**
	 * Overridden constructor
	 */
	function SimplestForumModelForumEdit()
	{
		parent::__construct();
	}

    /**
     * Sets the id of the forum to be edited.
     * @param id the id of the forum to be edited
    */
    function setId($id)
    {
        $this->_id = $id;
        $this->_data = null;
    } //end setId

    /**
     * Returns a forum object from the database for the current forum id.
     * @return object the forum object or a blank stdClass if none is found
    */
    function getData()
    {
        //if there is no current data, get it
        if (empty($this->_data)) {
            $query = 'SELECT * FROM #__simplestforum_forum WHERE id = '.$this->_id;
            $this->_db->setQuery($query);
            $this->_data = $this->_db->loadObject();
        }

        //we do not want to return a null object ever
        if (!$this->_data) {
            $this->_data = new stdClass();
        }

        return $this->_data;
    } //end getData


    /**
     * Binds and stores a forum object from the data provided in the
     * specified associative array.
     * @param data an associative array of values whose keys correspond
     * to the field names of a forum object
     * @return bool true if the store is successful, false otherwise.
     * On failure the error is set.
    */
    function store($data)
    {
        $row = $this->getTable('forum');

        //bind the data to the object
        if (!$row->bind($data)) {
            $this->setError($row->getError());
            return false;
        }

        //check to make sure the fields are all acceptable
        if (!$row->check()) {
            $this->setError($row->getError());
            return false;
        }

        //save the object to the database
        if (!$row->store()) {
            $this->setError($row->getError());
            return false;
        }

        return true;
    } //end store function
} //end class
?>
