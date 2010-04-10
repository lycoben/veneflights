<?php
/**
 * @version		$Id: multimap.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Application
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('jxtended.application.component.model');

/*
CREATE TABLE `jos_multimap` (
  `left_id` int(10) unsigned NOT NULL default '0',
  `right_id` int(10) unsigned NOT NULL default '0',
  KEY `idx_mm_multimap_left` (`left_id`),
  KEY `idx_mm_multimap_right` (`right_id`)
) TYPE=MyISAM;
*/

/**
 * Class JXModelMultiMap
 *
 * @package		JXtended
 * @subpackage	Application
 */
class JXModelMultiMap extends JXModel
{
	/**
	 * @var string
	 */
	var $_tbl;
	/**
	 * @var int unsigned
	 */
	var $left_id;
	/**
	 * @var int unsigned
	 */
	var $right_id;
	/**
	 * @var string
	 */
	var $_left_tbl;
	/**
	 * @var string
	 */
	var $_left_tbl_key;
	/**
	 * @var string
	 */
	var $_right_tbl;
	/**
	 * @var string
	 */
	var $_right_tbl_key;

	/**
	 * You must set the left and right before calling getLeftRecords
	 * @param	JTable	The object that represents the LHS of the mapping
	 * @param	JTable	The object that represents the RHS of the mapping
	 */
	function setLeftRight( &$left, &$right )
	{
		$this->_left_tbl = $left->_tbl;
		$this->_left_tbl_key = $left->_tbl_key;

		$this->_right_tbl = $right->_tbl;
		$this->_right_tbl_key = $right->_tbl_key;
	}

	/**
	 * Updates many in the left column to one in the right column
	 * @param array An array of category id's
	 * @return boolean True on success
	 */
	function updateLeftMap( &$leftArray, $right_id = 0 )
	{
		$database = &$this->_db;

		if ($right_id) {
			$this->right_id = $right_id;
		}
		// clear existing items
		$query = 'DELETE FROM ' . $this->_tbl .
			' WHERE right_id = ' . (int) $this->right_id;
		$this->_db->setQuery( $query );
		if (!$database->query()) {
			$this->_error = $database->getErrorMsg();
			return false;
		}

		// add new categories for item
		$query = 'INSERT INTO ' . $this->_tbl
			. ' SET left_id = %d, right_id = %d';
		foreach ($leftArray as $id) {
			$database->setQuery( sprintf( $query, (int) $id, (int) $this->right_id ) );

			if (!$database->query()) {
				$this->_error = $database->getErrorMsg();
				return false;
			}
		}

		return true;
	}

	/**
	 * Updates many in the right column to one in the left column
	 * @param array An array of right id's
	 * @return boolean True on success
	 */
	function updateRightMap( &$rightArray, $left_id = 0 )
	{
		$database = &$this->_db;

		if ($left_id) {
			$this->left_id = $left_id;
		}
		// clear existing items
		$query = 'DELETE FROM ' . $this->_tbl .
			' WHERE left_id = ' . (int) $this->left_id;
		$database->setQuery( $query );
		if (!$database->query()) {
			$this->setError( $database->getErrorMsg() );
			return false;
		}

		// add new categories for item
		$query = 'INSERT INTO ' . $this->_tbl
			. ' SET left_id = %d, right_id = %d';
		foreach ($rightArray as $id)
		{
			$database->setQuery( sprintf( $query, (int) $this->left_id, (int) $id ) );

			if (!$database->query()) {
				$this->setError( $database->getErrorMsg() );
				return false;
			}
		}

		return true;
	}

	/**
	 * Returns many in the left column for one right column id
	 * @param mixed The id for the right column
	 * @return array
	 */
	function getLeftIds( $right_id = 0 )
	{
		$database = &$this->_db;

		if ($right_id) {
			$this->right_id = $right_id;
		}

		$query = new JXQuery;

		$query->select( 'left_id' );
		$query->from( $this->_tbl );
		$query->where( 'right_id = ' . (int) $this->right_id );

		$database->setQuery( $query->toString() );
		return $database->loadResultArray();
	}

	/**
	 * @param	array	Options for the query
	 * @param	mixed	The id for the right column
	 * @param	boolean	True to return as an object list, otherwise an array list
	 * @return	array
	 */
	function getLeftRecords( $options = array(), $right_id = 0, $asObject=true )
	{
		$database = &$this->_db;

		if ($right_id) {
			$this->right_id = $right_id;
		}

		$published	= @$options['published'];
		$where		= @$options['where'];
		$orderBy	= @$options['order by'];
		$groupBy	= @$options['group by'];

		$query = new JXQuery;

		$query->select( 'a.*' );
		$query->from( $this->_left_tbl . ' AS a' );
		$query->join( 'INNER', $this->_tbl . ' AS map ON map.left_id = a.id' );
		$query->where( 'map.right_id = ' . (int) $this->right_id );

		// options
		if ($published !== null) {
			$query->where( 'published = ' . (int) $published );
		}
		if ($where !== null) {
			// generic where
			$query->where( $where );
		}
		if ($orderBy !== null) {
			$query->order( $orderBy );
		}
		if ($groupBy !== null) {
			$query->group( $groupBy );
		}

		$database->setQuery( $query->toString() );
		if ($asObject) {
			return $database->loadObjectList();
		} else {
			return $database->loadAssocList();
		}
	}

	/**
	 * Returns many in the right column for one left column id
	 * @param mixed The id for the left column
	 * @return array
	 */
	function getRightIds( $left_id = 0 )
	{
		$database = &$this->_db;

		if ($left_id) {
			$this->left_id = $left_id;
		}

		$query = new JXQuery;

		$query->select( 'right_id' );
		$query->from( $this->_tbl );
		$query->where( 'left_id = ' . (int) $this->left_id );

		$database->setQuery( $query->toString() );
		return $database->loadResultArray();
	}

	/**
	 * @param	array	Options for the query
	 * @param	mixed	The id for the left column
	 * @param	string	The type of result set to return: assoc|object
	 * @return array
	 */
	function getRightRecords( $options = array(), $left_id = 0, $asObject=true )
	{
		$database = &$this->_db;

		if ($left_id) {
			$this->left_id = $left_id;
		}

		$published = @$options['published'];

		$query = new JXQuery;

		$query->select( 'a.*' );
		$query->from( $this->_right_tbl . ' AS a' );
		$query->join( 'INNER', $this->_tbl . ' AS map ON map.right_id = a.id' );
		$query->where( 'map.left_id = ' . (int) $this->left_id );

		// options
		if ($published !== null) {
			$query->where( 'published = ' . (int) $published );
		}

		$sql	= $query->toString();
		//echo '<pre>'.str_replace('#__','jos_',$sql).'</pre><hr/>';
		$database->setQuery( $sql );
		if ($asObject) {
			$result	= $database->loadObjectList();
		} else {
			$result	= $database->loadAssocList();
		}
		return $result;
	}

	/**
	 * @param	array	Options for the query
	 * @param	mixed	The list of right objects which are not mapped to left record given by id
	 * @param	string	The type of result set to return: assoc|object
	 * @return	array
	 */
	function getRightRecordsNotIn( $options = array(), $left_id = 0, $asObject=true )
	{
		$database = &$this->_db;

		if ($left_id) {
			$this->left_id = $left_id;
		}

		$published = @$options['published'];

		$query = new JXQuery;

		$query->select( 'a.*' );
		$query->from( $this->_right_tbl . ' AS a' );
		$query->join( 'LEFT', $this->_tbl . ' AS map ON map.right_id = a.id' );
		$query->where( 'map.left_id <> ' . (int) $this->left_id.' OR map.left_id IS NULL' );

		// options
		if ($published !== null) {
			$query->where( 'published = ' . (int) $published );
		}
		$sql	= $query->toString();
		//echo '<pre>'.str_replace('#__','jos_',$sql).'</pre><hr/>';
		$database->setQuery( $sql );
		if ($asObject) {
			$result	= $database->loadObjectList();
		} else {
			$result	= $database->loadAssocList();
		}
		return $result;
	}
}