<?php
/**
 * @version		$Id: multimap.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Database
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.database.table');
jximport('jxtended.database.query');

/**
 * JXtended Database Abstraction Class
 *
 * This class implements a JTable extension to easily handle
 * many-to-many database relationships.
 *
 * @package		JXtended
 * @subpackage	Database
 * @version		1.0
 * @dependency	joomla.database.table
 * @dependency	jxtended.database.query
 */
class JXTableMultiMap extends JTable
{
	/**
	 * The map table name
	 * @access	private
	 * @var		string
	 */
	var $_tbl;

	/**
	 * The left table name
	 * @access	private
	 * @var		string
	 */
	var $_left_tbl;

	/**
	 * The left table column value
	 * @access	private
	 * @var		integer	unsigned
	 */
	var $_left_tbl_id;

	/**
	 * The left table column
	 * @access	public
	 * @var		string
	 */
	var $_left_tbl_key;

	/**
	 * The left map column
	 * @access	public
	 * @var		string
	 */
	var $_left_map_key;

	/**
	 * The right table column value
	 * @access	private
	 * @var		integer	unsigned
	 */
	var $_right_id;

	/**
	 * The right table name
	 * @access	private
	 * @var		string
	 */
	var $_right_tbl;

	/**
	 * The right table column
	 * @access	private
	 * @var		string
	 */
	var $_right_tbl_key;

	/**
	 * The right map column
	 * @access	public
	 * @var		string
	 */
	var $_right_map_key;

	/**
	 * You must set the left and right before calling getLeftRecords
	 * @param	JTable	The object that represents the LHS of the mapping
	 * @param	JTable	The object that represents the RHS of the mapping
	 */
	function setLeftRight(&$left, &$right, $left_map_key, $right_map_key)
	{
		$this->_left_tbl		= $left->_tbl;
		$this->_left_tbl_key	= $left->_tbl_key;
		$this->_left_map_key	= $left_map_key;

		$this->_right_tbl		= $right->_tbl;
		$this->_right_tbl_key	= $right->_tbl_key;
		$this->_right_map_key	= $right_map_key;
	}

	/**
	 * Updates many in the left column to one in the right column
	 * @param array An array of category id's
	 * @return boolean True on success
	 */
	function updateLeftMap(&$leftArray, $right_id = 0)
	{
		// Check for a new right id
		if ($right_id)
		{
			$this->_right_id = $right_id;
		}

		// Build a query to delete the existing maps
		$query	= 'DELETE FROM '.$this->_tbl. ' WHERE '
				. $this->_right_map_key.' = '.(int) $this->_right_id;

		// Set the query
		$this->_db->setQuery($query);

		// Run the query
		if (!$this->_db->query())
		{
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Build a query to insert the new maps
		$query	= 'INSERT INTO '.$this->_tbl.' SET '
				. $this->_left_map_key.' = %d, '.$this->_right_map_key.' = %d';

		// Iterate through the ids and insert a row for each one
		foreach ($leftArray as $id)
		{
			// Set the query
			$this->_db->setQuery(sprintf($query, (int) $id, (int) $this->_right_id));

			// Run the query
			if (!$this->_db->query())
			{
				$this->setError($this->_db->getErrorMsg());
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
	function updateRightMap(&$rightArray, $left_id = 0)
	{
		// Check for a new left id
		if ($left_id)
		{
			$this->_left_id = $left_id;
		}

		// Build a query to delete the existing maps
		$query	= 'DELETE FROM '.$this->_tbl.' WHERE '
				. $this->_left_map_key.' = '.(int) $this->_left_id;

		// Set the query
		$this->_db->setQuery($query);

		// Run the query
		if (!$this->_db->query())
		{
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Build a query to insert the new maps
		$query	= 'INSERT INTO '.$this->_tbl.' SET '
				. $this->_left_map_key.' = %d, '.$this->_right_map_key.' = %d';

		// Iterate through the ids and insert a row for each one
		foreach ($rightArray as $id)
		{
			// Set the query
			$this->_db->setQuery(sprintf($query, (int) $this->_left_id, (int) $id));

			// Run the query
			if (!$this->_db->query())
			{
				$this->setError($this->_db->getErrorMsg());
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
	function getLeftIds($right_id = 0)
	{
		// Check for a new right id
		if ($right_id)
		{
			$this->_right_id = $right_id;
		}

		// Instantiate the query builder
		$query = new JXQuery;

		// Build the query
		$query->select($this->_left_map_key);
		$query->from($this->_tbl);
		$query->where($this->_right_map_key.' = '.(int) $this->_right_id);

		// Set the query
		$this->_db->setQuery($query->toString());

		// Run the query
		return $this->_db->loadResultArray();
	}

	/**
	 * @param array Options for the query
	 * @param mixed The id for the right column
	 * @param boolean True to return as an object list, otherwise an array list
	 * @return array
	 */
	function getLeftRecords($options = array(), $right_id = 0, $asObject = true)
	{
		// Check for a new right id
		if ($right_id)
		{
			$this->_right_id = $right_id;
		}

		// Instantiate the query builder
		$query = new JXQuery;

		// Build the query
		$query->select('a.*');
		$query->from($this->_left_tbl.' AS a');
		$query->join('INNER', $this->_tbl.' AS map ON map.'.$this->_left_map_key.' = a.id');
		$query->where('map.'.$this->_right_map_key.' = '.(int) $this->_right_id);

		// Break out the options
		$published	= @$options['published'];
		$where		= @$options['where'];
		$orderBy	= @$options['order by'];
		$groupBy	= @$options['group by'];

		// Adjust the query based on the options
		if ($published !== null)
		{
			$query->where('published = '.(int)$published);
		}
		if ($where !== null)
		{
			$query->where($where);
		}
		if ($orderBy !== null)
		{
			$query->order($orderBy);
		}
		if ($groupBy !== null)
		{
			$query->group($groupBy);
		}

		// Set the query
		$this->_db->setQuery( $query->toString() );

		// Run the query
		if ($asObject)
		{
			return $this->_db->loadObjectList();
		} else {
			return $this->_db->loadAssocList();
		}
	}

	/**
	 * Returns many in the right column for one left column id
	 * @param mixed The id for the left column
	 * @return array
	 */
	function getRightIds($left_id = 0)
	{
		$database = &$this->_db;

		// Check for a new left id
		if ($left_id)
		{
			$this->_left_id = $left_id;
		}

		// Instantiate the query builder
		$query = new JXQuery();

		// Build the query
		$query->select($this->_right_map_key);
		$query->from($this->_tbl);
		$query->where($this->_left_map_key.' = '.(int) $this->_left_id);

		// Set the query
		$this->_db->setQuery($query->toString());

		// Run the query
		return $this->_db->loadResultArray();
	}

	/**
	 * @param array Options for the query
	 * @param mixed The id for the left column
	 * @return array
	 */
	function getRightRecords($options = array(), $left_id = 0, $asObject = true)
	{
		// Check for a new left id
		if ($left_id)
		{
			$this->_left_id = $left_id;
		}

		// Instantiate the query builder
		$query = new JXQuery;

		// Build the query
		$query->select('a.*');
		$query->from($this->_right_tbl.' AS a');
		$query->join('INNER', $this->_tbl.' AS map ON map.'.$this->_right_map_key.' = a.id');
		$query->where('map.'.$this->_left_map_key.' = '.(int) $this->_left_id);

		// Break out the options
		$published	= @$options['published'];
		$where		= @$options['where'];
		$orderBy	= @$options['order by'];
		$groupBy	= @$options['group by'];

		// Adjust the query based on the options
		if ($published !== null)
		{
			$query->where('published = '.(int)$published);
		}
		if ($where !== null)
		{
			$query->where($where);
		}
		if ($orderBy !== null)
		{
			$query->order($orderBy);
		}
		if ($groupBy !== null)
		{
			$query->group($groupBy);
		}

		// Set the query
		$this->_db->setQuery($query->toString());

		// Run the query
		if ($asObject)
		{
			return $this->_db->loadObjectList();
		} else {
			return $this->_db->loadAssocList();
		}
	}
}