<?php
/**
 * @version		$Id: yos_map_elements.php 10094 2008-03-02 04:35:10Z sonlv $
 * @package		amMap
 * @subpackage	YOS
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );


/**
 * @package		amMap
 * @subpackage	Elements
 */
class TableYOS_Map_Elements extends JTable
{
	/** @var int Primary key */
	var $id 				= null;
	/** @var int */
	var $map_id				= 0;
	/** @var int */
	var $element_id			= 0;
	/** @var string */
	var $element_type		= null;
	/** @var string */
	var $field_name			= null;
	/** @var string */
	var $value				= null;
	/** @var int */
	var $type				= 0;
	/** @var int */
	var $published			= 0;	
	/** @var int */
	var $checked_out		= 0;
	/** @var string */
	var $checked_out_time	= '0000-00-00 00:00:00';	
		
	/**
	* @param database A database connector object
	*/
	function __construct(&$db)
	{
		parent::__construct( '#__yos_map_elements', 'id', $db );
	}

	
}
