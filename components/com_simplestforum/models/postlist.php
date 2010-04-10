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
 * Simplest Forum Post List model
 *
 * @package Simplest Forum
 */
class SimplestForumModelPostList extends JModel
{
    var $_data;

    /**
     * The id of the parent post (the thread id)
    */
    var $_thread;

    /**
     * The id of the forum of posts for which we should be concerned.
    */
    var $_forumId;


	function SimplestForumModelPostList()
	{
		parent::__construct();
	}


    /**
     * Sets the parent thread id.
     * @param parentId the id of the parent thread
    */
    function setThread($thread)
    {
        $this->_thread = $thread;
    } //end setParentId


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
        //if there is a parent thread, include only those posts on that thread
        if ($this->_thread) {
            $where = ' AND a.thread='.(int)$this->_thread;
        } else {
            $where = '';
        }

        $params = &JComponentHelper::getParams('com_simplestforum');
        $order = 'a.thread DESC, a.date';

        $query = 'SELECT DISTINCT a.*, IF(b.id IS NOT NULL, b.name, IF(LENGTH(a.authorId) > 0 AND a.authorId != '.$this->_db->Quote('0').', a.authorId, '.$this->_db->Quote(JText::_('ANONYMOUS')).')) AS name
                  FROM #__simplestforum_post AS a
                  LEFT JOIN #__users AS b on b.id = a.authorId
                  WHERE a.forumId = '.(int)$this->_forumId.$where.'
                  ORDER BY '.$order
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
            $posts = $this->_db->loadObjectList();

            if (!empty($posts)) {
                $this->_data = array();
                $table = array();

                // build a table of children posts
                foreach ($posts as $row) {
                    if (!isset($table[$row->parentId])) {
                        $table[$row->parentId] = array($row);
                    } else {
                        $table[$row->parentId][] = $row;
                    }
                }

                $visited = array();

                // recurse through and build a list of items for display
                $this->_data = array();
                for ($i = 0, $n = count($posts); $i < $n; $i++) {
                    $this->_insertPost($posts[$i], $table, $this->_data, $visited);
                }
            }
        }

        if (!$this->_data) {
            $this->_data = array();
        }

        return $this->_data;
    } //end getData

    /**
     * Recursively inserts the posts in order of their posting and parenting.
    */
    function _insertPost(&$row, $table, &$result, &$visited)
    {
        if (in_array($row->id, $visited)) {
            return;
        }

        $result[] = $row;
        $visited[] = $row->id;

        if (isset($table[$row->id])) {
            foreach ($table[$row->id] as $child) {
                $this->_insertPost($child, $table, $result, $visited);
            }
        }
    } //end _insertPost


    /**
     * Deletes a post whose id is supplied in the request (id).
     * @return bool true if the delete is successful, false otherwise.
    */
    function delete($id)
    {
        if (!$id) {
            $this->setError(JText::_('ERROR NO SUCH POST'));
            return false;
        }

        // make sure that the user is authorized to delete
        $user = &JFactory::getUser();
        if (!$this->isModerator($user)) {
            $this->setError(JText::_('YOU ARE NOT AUTHORIZED TO PERFORM THIS ACTION'));
            return false;
        }

        $query = 'DELETE a.*
                  FROM #__simplestforum_post AS a
                  WHERE a.id = '.$id
        ;
        $this->_db->setQuery($query);

        if (!$this->_db->query()) {
            $this->setError(JText::_('ERROR POST NOT DELETED'));
            return false;
        }

        return true;
    } //end delete


    /**
     * Stores a post from the specified associative array to the database.
     * @param data an associative array whose keys correspond to the field names
     * of a post object.
     * @return bool true of the object is stored successfully, false otherwise.
     * on failure, setError is called.
    */
    function store($data)
    {
        $params = &JComponentHelper::getParams('com_simplestforum');
        $database = JFactory::getDBO();

        $row = $this->getTable('post');

        if (!$row->bind($data)) {
            $this->setError($row->getError());
            return false;
        }

        // if there is a parent, we need to get some info from it
        if ($row->parentId) {
            $parent = &JTable::getInstance('post', 'Table');
            
            if (!$parent->load($row->parentId)) {
                $this->setError(JText::_('INVALID PARENT POST'));
                return false;
            }

            $row->thread = $parent->thread;
            $row->depth = $parent->depth + 1;
        }

        //get the user and date information
        $user = &JFactory::getUser();
        if (!$user->get('guest')) {
            $row->authorId = $user->id;
        } else if (isset($data['name'])) {
            $name = JFilterInput::clean($data['name']);
            $disallowedNames = '('.implode(')|(', explode(',', $params->get('disallowednames', ''))).')';

            if (eregi($disallowedNames, $name)) {
                $this->setError(JText::_('ERROR DISALLOWED NAME SUPPLIED'));
                return false;
            }

            $row->authorId = JFilterInput::clean($data['name'], 'string');
        } else {
            $row->authorId = JText::_('ANONYMOUS');
        }
        $row->date = date('Y-m-d H:i:s');

        if (!$row->check()) {
            $this->setError($row->getError());
            return false;
        }

        if (!$row->store()) {
            $this->setError($row->getError());
            return false;
        }

        // if this is the root of a new thread, set it's thread to it's id
        if ($row->id && !$row->parentId && !$row->thread) {
            $query = 'UPDATE #__simplestforum_post AS a
                      SET a.thread = '.(int)$row->id.'
                      WHERE a.id = '.(int)$row->id
            ;
            $this->_db->setQuery($query);
            if (!$this->_db->query()) {
                $mainframe = &JApplication::getApplication();

                $mainframe->enqueueMessage(JText::_('INFO MESSAGE UNABLE TO BE SET POST AS THREAD START'), 'info');
            }

            $row->thread = $row->id;
        }

        $this->_forumId = $row->forumId;
        $this->_thread = $row->thread;

        return true;
    } //end store


    /**
     * Returns whether or not the supplied user belongs to the moderator group or its children.
     * @param $user JUser the user to check
     * @return true if the user is in the moderator group or one of its children
    */
    function isModerator($user)
    {
        $params = &JComponentHelper::getParams('com_simplestforum');
        $acl = &JFactory::getACL();
        $myGroup = $acl->get_group_name($user->get('gid'));
        $allowedGroup = $acl->get_group_name($params->get('moderatorgid', 24));

        if ($myGroup == $allowedGroup || $acl->is_group_child_of($myGroup, $allowedGroup)) {
            return true;
        }

        return false;
    } //end isModerator

} //end class
?>
