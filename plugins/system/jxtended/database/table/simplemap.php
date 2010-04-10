<?php
/**
 * @version		$Id: simplemap.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Database
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.database.table');
jximport('jxtended.database.query');

/**
 * JXtended Database Abstraction Class for one-to-many table maps.
 *
 * This class implements a JTable extension to easily handle
 * one-to-many database relationships.  It is useful as the basis
 * of a JTable instance for database tables that have one or many
 * one-to-many relationships with other tables.
 *
 * @package		JXtended
 * @subpackage	Database
 * @version		1.0
 * @dependency	joomla.database.table
 * @dependency	jxtended.database.query
 */
class JXTableSimpleMap extends JTable
{
	/**
	 * The tables to map to.
	 * @access	private
	 * @var		array
	 */
	var $_maps;

	/**
	 * The method to create a mapped relationship between two tables.
	 *
	 * <code>
	 * 	<?php
	 *	// Get our table objects
	 *  $item	= &JTable::getInstance('Items', 'JXTableSimpleMap');
	 *  $cat	= &JTable::getInstance('Categories', 'JXTableSimpleMap');
	 *
	 * 	// Add the map
	 *  $item->addMap($cat, 'item_id', 'category_id');
	 *
	 * 	// Load the row
	 * 	$item->load($id);
	 * 	?>
	 * </code>
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$table				A JTable Object
	 * @param	string	$foreign_map_key	The name of the column in the foreign table to use
	 * @param	string	$local_map_key		The name of the column in the local table to use
	 * @return	void
	 */
	function addMap(&$table, $foreign_map_key, $local_map_key = 'id')
	{
		// Initialize the maps array
		if (is_null($this->_maps))
		{
			$this->_maps = array();
		}

		// Create a new map object
		$map = new JObject();

		$map->table				= $table;
		$map->foreign_map_key	= $foreign_map_key;
		$map->local_map_key		= $local_map_key;

		// Add the map
		$this->_maps[$table->_tbl] = $map;
	}

	/**
	 * Method to load a one-to-many table mapping.
	 *
	 * <code>
	 * 	<?php
	 *	// Get our table objects
	 *  $item	= &JTable::getInstance('Items', 'JXTableSimpleMap');
	 *  $cat	= &JTable::getInstance('Categories', 'JXTableSimpleMap');
	 *
	 * 	// Add the map
	 *  $item->addMap($cat, 'item_id', 'category_id');
	 *
	 * 	// Load the row
	 * 	$item->load($id);
	 *
	 * 	// Load the map
	 *  $categories	= $item->loadMap('#__component_categories');
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
		// Initialize variables
		$foreign	= $this->_maps[$foreign_table];

		// Get the local primary key
		$local_tbl_key	= $this->_tbl_key;
		$local_pri_key	= $this->$local_tbl_key;

		// Get the table map keys
		$local_map_key		= $foreign->local_map_key;
		$foreign_map_key	= $foreign->foreign_map_key;

		// Check that a row is loaded
		if (!$local_pri_key)
		{
			return false;
		}

		// Instantiate the query builder
		$qb = new JXQuery;

		// Build the query
		$qb->select('f.*');
		$qb->from($foreign_table.' AS f');
		$qb->join($join_type, $local->_tbl.' AS l ON l.'.$local_map_key.' = f.'.$foreign_map_key);
		$qb->where('l.'.$local_tbl_key.' = '.$local_pri_key);

		// Set the query
		$this->_db->setQuery($qb->toString());

		// Run the query
		if ($object)
		{
			return $this->_db->loadObjectList();
		} else {
			return $this->_db->loadAssocList();
		}
	}
}