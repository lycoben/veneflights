<?php
/**
 * @version		$Id: simplemap.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Application
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.database.table');
jximport('jxtended.database.query');
jximport('joomla.application.component.model');

/**
 * JXtended Model Helper Class for one-to-many table maps.
 *
 * This class implements a JModel extension to easily handle
 * one-to-many database relationships for discreet tables.  It is
 * useful for working with mapped tables that are not extensions
 * of JXTableSimpleMap.
 *
 *
 * @package		JXtended
 * @subpackage	application.component.model
 * @version		1.0
 * @dependency	joomla.database.table
 * @dependency	jxtended.database.query
 * @dependency	joomla.application.component.model
 */
class JXModelSimpleMap extends JModel
{
	/**
	 * The table to map from.
	 * @access	private
	 * @var		object
	 */
	var $_local;

	/**
	 * The tables to map to.
	 * @access	private
	 * @var		array
	 */
	var $_maps;

	/**
	 * Class constructor
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$table	A JTable object
	 * @return	void
	 */
	function __construct(&$table)
	{
		// Initialize the variables
		$this->_maps	= array();
		$this->_local	= $table;
	}

	/**
	 * Method to add a one-to-many relationship between the local
	 * table and the given foreign table.  The link is formed between
	 * the columns specified as the foreign_map_key and the local_map_key.
	 *
	 * <code>
	 * 	<?php
	 * 	jximport('jxtended.application.component.simplemap');
	 *
	 * 	// Get the tables
	 * 	$user	= &JTable::getInstance('users');
	 * 	$addr	= &JTable::getInstance('users_addresses', 'JXTable');
	 *
	 *	// Load the table
	 * 	$user->load($id);
	 *
	 *	// Get the mapping model
	 * 	$muser	= new JXModelSimpleMap($user);
	 *
	 *	// Add a map
	 *	$muser->addMap($addr, 'user_id', 'address_id');
	 * 	?>
	 * </code>
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$table				A JTable object
	 * @param	string	$foreign_map_key	The name of the column in the foreign table to use
	 * @param	string	$local_map_key		The name of the column in the local table to use
	 * @return	void
	 */
	function addMap(&$table, $foreign_map_key, $local_map_key)
	{
		// Create a new map object
		$map = new JObject();

		$map->table				= $table;
		$map->foreign_map_key	= $foreign_map_key;
		$map->local_map_key		= $local_map_key;

		// Add the map
		$this->_maps[$table->_tbl] = $map;
	}

	/**
	 * Method to set the local table to work from.
	 *
	 * <code>
	 * 	<?php
	 * 	jximport('jxtended.application.component.simplemap');
	 *
	 * 	// Get the tables
	 * 	$user	= &JTable::getInstance('users');
	 * 	$addr	= &JTable::getInstance('users_addresses', 'JXTable');
	 *
	 *	// Load the table
	 * 	$user->load($id);
	 *
	 *	// Get the mapping model
	 * 	$muser = new JXModelSimpleMap($user);
	 *
	 *	// Add a map
	 *	$muser->addMap($addr, 'user_id', 'address_id');
	 *
	 *	// Get the map
	 *	$addresses = $muser->loadMap('#__users_addresses');
	 * 	?>
	 * </code>
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string	$foreign_table	The name of the mapped table
	 * @param	string	$join_type		The query join type
	 * @param	boolean	$object			Toggle control for return type (object/array)
	 * @return	array	An array of database rows
	 */
	function loadMap($foreign_table, $join_type = 'LEFT', $object = true)
	{
		$db = &JFactory::getDBO();

		// Initialize variables
		$local		= $this->_local;
		$foreign	= $this->_maps[$foreign_table];

		// Get the local primary key
		$local_tbl_key	= $local->_tbl_key;
		$local_pri_key	= $local->$local_tbl_key;

		// Get the table map keys
		$local_map_key		= $foreign->local_map_key;
		$foreign_map_key	= $foreign->foreign_map_key;

		// Check that a row is loaded
		if (!$local_pri_key)
		{
			return array();
		}

		// Instantiate the query builder
		$qb = new JXQuery;

		// Build the query
		$qb->select('f.*');
		$qb->from($foreign_table.' AS f');
		$qb->join($join_type, $local->_tbl.' AS l ON l.'.$local_map_key.' = f.'.$foreign_map_key);
		$qb->where('l.'.$local_tbl_key.' = '.$local_pri_key);

		// Set the query
		$db->setQuery($qb->toString());

		// Run the query
		if ($object)
		{
			return $db->loadObjectList();
		} else {
			return $db->loadAssocList();
		}
	}
}