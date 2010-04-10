<?php
/**
 * @version		$Id: query.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Database
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Query Element Class
 *
 * @package		JXtended
 * @subpackage	Database
 */
class JXQueryElement
{
	/** @var string The name of the element */
	var $_name = null;
	/** @var array An array of elements */
	var $_elements = null;
	/** @var string Glue piece */
	var $_glue = null;

	/**
	 * Constructor
	 * @param	string	The name of the element
	 * @param	mixed	String or array
	 * @param	string	The glue for elements
	 */
	function JXQueryElement( $name, $elements, $glue=',' )
	{
		$this->_elements	= array();
		$this->_name		= $name;
		$this->append( $elements );
		$this->_glue		= $glue;
	}

	/**
	 * Appends element parts to the internal list
	 * @param	mixed	String or array
	 */
	function append( $elements )
	{
		if (is_array( $elements )) {
			$this->_elements = array_unique( array_merge( $this->_elements, $elements ) );
		} else {
			$this->_elements = array_unique( array_merge( $this->_elements, array( $elements ) ) );
		}
	}

	/**
	 * Render the query element
	 * @return	string
	 */
	function toString()
	{
		return "\n{$this->_name} " . implode( $this->_glue, $this->_elements );
	}
}

/**
 * Query Building Class
 *
 * @package		JXtended
 * @subpackage	Database
 */
class JXQuery
{
	/** @var string The query type */
	var $_type = '';
	/** @var object The select element */
	var $_select = null;
	/** @var object The from element */
	var $_from = null;
	/** @var object The join element */
	var $_join = null;
	/** @var object The where element */
	var $_where = null;
	/** @var object The where element */
	var $_group = null;
	/** @var object The where element */
	var $_having = null;
	/** @var object The where element */
	var $_order = null;

	/**
	 * Constructor
	 */
	function JXQuery()
	{
	}

	/**
	 * @param	mixed	A string or an array of field names
	 */
	function select( $columns )
	{
		$this->_type = 'select';
		if (is_null( $this->_select )) {
			$this->_select = new JXQueryElement( 'SELECT', $columns );
		} else {
			$this->_select->append( $columns );
		}
	}

	/**
	 * @param	mixed	A string or array of table names
	 */
	function from( $tables )
	{
		if (is_null( $this->_from )) {
			$this->_from = new JXQueryElement( 'FROM', $tables );
		} else {
			$this->_from->append( $tables );
		}
	}

	/**
	 * @param	string
	 * @param	string
	 */
	function join( $type, $conditions )
	{
		if (is_null( $this->_join )) {
			$this->_join = array();
		}
		$this->_join[] = new JXQueryElement( strtoupper( $type ) . ' JOIN', $conditions );
	}

	/**
	 * @param	mixed	A string or array of where conditions
	 * @param	string
	 */
	function where( $conditions, $glue='AND' )
	{
		if (is_null( $this->_where )) {
			$glue = strtoupper( $glue );
			$this->_where = new JXQueryElement(  'WHERE', $conditions, "\n\t$glue " );
		} else {
			$this->_where->append( $conditions );
		}
	}

	/**
	 * @param	mixed	A string or array of ordering columns
	 */
	function group( $columns )
	{
		if (is_null( $this->_group )) {
			$this->_group = new JXQueryElement( 'GROUP BY', $columns );
		} else {
			$this->_group->append( $columns );
		}
	}

	/**
	 * @param	mixed	A string or array of ordering columns
	 */
	function having( $columns )
	{
		if (is_null( $this->_having )) {
			$this->_having = new JXQueryElement( 'HAVING', $columns );
		} else {
			$this->_having->append( $columns );
		}
	}

	/**
	 * @param	mixed	A string or array of ordering columns
	 */
	function order( $columns )
	{
		if (is_null( $this->_order )) {
			$this->_order = new JXQueryElement( 'ORDER BY', $columns );
		} else {
			$this->_order->append( $columns );
		}
	}

	/**
	 * @return	string	The completed query
	 */
	function toString()
	{
		$query = '';

		switch ($this->_type)
		{
			case 'select':
				$query .= $this->_select->toString();
				$query .= $this->_from->toString();
				if ($this->_join) {
					// special case for joins
					foreach ($this->_join as $join) {
						$query .= $join->toString();
					}
				}
				if ($this->_where) {
					$query .= $this->_where->toString();
				}
				if ($this->_group) {
					$query .= $this->_group->toString();
				}
				if ($this->_having) {
					$query .= $this->_having->toString();
				}
				if ($this->_order) {
					$query .= $this->_order->toString();
				}
				break;
		}

		return $query;
	}
}