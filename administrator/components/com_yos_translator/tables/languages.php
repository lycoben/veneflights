<?php
/**
* @version		$Id: component.php 10381 2008-06-01 03:35:53Z pasamio $
* @package		Joomla.Framework
* @subpackage	Table
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Component table
 *
 * @package 	Joomla.Framework
 * @subpackage		Table
 * @since	1.0
 */
class JTableLanguages extends JTable
{
	/** @var int Primary key */
	var $id					= null;
	/** @var string */
	var $name				= null;
	/** @var int */
	var $active				= 0;
	/** @var string */
	var $iso				= null;
	/** @var string */
	var $code				= null;
	/** @var string */
	var $shortcode			= null;
	/** @var string */
	var $image				= null;
	/** @var string */
	var $fallback_code		= null;
	/** @var string */
	var $params				= null;
	/** @var int */
	var $ordering			= 0;	

	/**
	* @param database A database connector object
	*/
	function __construct( &$db ) {
		parent::__construct( '#__languages', 'id', $db );
	}	

	/**
	 * Validate and filter fields
	 */
	function check()
	{
		$this->active = intval( $this->active );
		$this->ordering = intval( $this->ordering );
		return true;
	}

	/**
	* Overloaded bind function
	*
	* @access public
	* @param array $hash named array
	* @return null|string	null is operation was satisfactory, otherwise returns an error
	* @see JTable:bind
	* @since 1.5
	*/
	function bind($array, $ignore = '')
	{
		if (is_array( $array['params'] ))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}

		return parent::bind($array, $ignore);
	}
}
