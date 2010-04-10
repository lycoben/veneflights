<?php
/**
 * @version		$Id: model.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Application
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('jxtended.database.helper');
jximport('joomla.application.component.model');

/**
 * Abstract Nested Set Model class
 *
 * @abstract
 * @package		JXtended
 * @subpackage	Application
 */
class JXNestedSetModel extends JModel
{
	/**
	 * @protected
	 * @var	JTable	A persistant Table resource
	 */
	var $_tbl_name = null;

	/**
	 * @access	private
	 * @var		boolean	Has the state been autoset yet
	 */
	var $__state_set = false;

	/**
	 * Overridden constructor
	 *
	 * @access	protected
	 * @param	array	Configuration array
	 */
	function __construct($config = array())
	{
		if (!empty($config['ignore_request'])) {
			$this->__state_set = true;
		}

		parent::__construct($config);
	}

	function getItems()
	{
		$db = &$this->getDBO();

		$state = $this->getState('list.state');
		$stateClause = (!is_null($state) and ($state != '*')) ? ' AND node.`published` = '.(int)$state : null;

		$search = $this->getState('list.search');
		$searchClause = (!empty($search)) ? ' AND node.`title` LIKE \'%'.$db->getEscaped($search).'%\' OR node.`body` LIKE \'%'.$db->getEscaped($search).'%\'' : null;

		$db->setQuery(
			'SELECT node.*, (COUNT(parent.id) - 1) AS level' .
			' FROM '.$this->_tbl_name.' AS node, '.$this->_tbl_name.' AS parent' .
			' WHERE node.left_id BETWEEN parent.left_id AND parent.right_id' .
			$stateClause .
			$searchClause .
			' GROUP BY node.id' .
			' ORDER BY node.left_id'
		);
		$this->_list = $db->loadObjectList();
	}


	/**
	 * Recursive method
	 * @param	int	parent id
	 * @param	int	Left value
	 */
	function _rebuildNesting($parent_id = 0, $left = 0)
	{
		// get the database object
		$db = &$this->_db;

		// get all children of this node
		$db->setQuery(
			'SELECT id FROM '. $this->_tbl_name .
			' WHERE parent_id='. (int)$parent_id .
			' ORDER BY parent_id, ordering, title'
		);
		$children = $db->loadResultArray();

		// the right value of this node is the left value + 1
		$right = $left + 1;

		// execute this function recursively over all children
		for ($i=0,$n=count($children); $i < $n; $i++)
		{
			// $right is the current right value, which is incremented on recursion return
			$right = $this->_rebuildNesting($children[$i], $right);

			// if there is an update failure, return false to break out of the recursion
			if ($right === false) {
				return false;
			}
		}

		// we've got the left value, and now that we've processed
		// the children of this node we also know the right value
		$db->setQuery(
			'UPDATE '. $this->_tbl_name .
			' SET left_id='. (int)$left .', right_id='. (int)$right .
			' WHERE id='. (int)$parent_id
		);
		// if there is an update failure, return false to break out of the recursion
		if (!$db->query()) {
			return false;
		}

		// return the right value of this node + 1
		return $right + 1;
	}

	function _buildRowPath($row_id=null)
	{
		// get the database object
		$db = &$this->_db;

		// get all children of this node
		$db->setQuery(
			'SELECT parent.alias FROM '.$this->_tbl_name.' AS node, '.$this->_tbl_name.' AS parent' .
			' WHERE node.left_id BETWEEN parent.left_id AND parent.right_id' .
			' AND node.id='. (int)$row_id .
			' ORDER BY parent.left_id'
		);
		$segments = $db->loadResultArray();

		// make sure the root node doesn't appear in the path
		if ($segments[0] == 'root') {
			array_shift($segments);
		}

		// build the path
		$path = trim(implode('/', $segments), ' /\\');

		$db->setQuery(
			'UPDATE '. $this->_tbl_name .
			' SET path='. $db->Quote($path) .
			' WHERE id='. (int)$row_id
		);
		// if there is an update failure, return false to break out of the recursion
		if (!$db->query()) {
			return false;
		}

		return true;
	}
}