<?php
/**
 * @version		$Id: yos_elements_properties.php 10094 2008-03-02 04:35:10Z sonlv $
 * @package		Joomla
 * @subpackage	YOS
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );


/**
 * @package		Joomla
 * @subpackage	Test
 */
class TableYOS_Elements_Properties extends JTable
{
	/** @var int Primary key */
	var $id 				= null;
	/** @var string */
	var $name				= null;
	/** @var string */
	var $type				= null;
	/** @var int */
	var $type_el			= 0;
	/** @var string */
	var $default			= null;
	/** @var string */
	var $description		= null;
	/** @var string */
	var $element_type		= null;
	/** @var int */
	var $checked_out		= 0;
	/** @var string */
	var $checked_out_time	= '0000-00-00 00:00:00';	
		
	/**
	* @param database A database connector object
	*/
	function __construct(&$db)
	{
		parent::__construct( '#__yos_elements_properties', 'id', $db );
	}
	
	
}
