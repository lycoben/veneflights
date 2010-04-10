<?php
/**
 * @version		$Id: template.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Utilities
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	Utilities
 */
class JXTemplate extends JObject
{
	var $_template = null;

	/**
	 * Constructor
	 */
	function __construct()
	{
		$template			= new stdClass;
		$template->title	= '';
		$template->body		= '';
	}

	/**
	 * Add a directory where we should search for templates. You may
	 * either pass a string or an array of directories.
	 *
	 * @access	public
	 * @param	string	A path to search.
	 * @return	array	An array with directory elements
	 * @since 1.5
	 */
	function addIncludePath( $path=null )
	{
		static $paths;

		if (!isset($paths)) {
			$paths = array( dirname( __FILE__ ).DS.'table' );
		}

		// just force path to array
		settype($path, 'array');

		if (!empty( $path ) && !in_array( $path, $paths ))
		{
			// loop through the path directories
			foreach ($path as $dir)
			{
				// no surrounding spaces allowed!
				$dir = trim($dir);

				// add to the top of the search dirs
				// so that custom paths are searched before core paths
				array_unshift($paths, $dir);
			}
		}
		return $paths;
	}

	/**
	 * @param	string	The raw string to us
	 */
	function setBody( $text )
	{
		$this->_template->body = $text;
	}

	/**
	 * @param	string	The name of the form
	 */
	function loadFromDB( $name )
	{
		if ($table	= $this->get( 'table' ))
		{
			$db	= &JFactory::getDBO();
			$query	= 'SELECT *' .
					' FROM ' . $db->getEscaped( $table->getTableName() ) .
					' WHERE name = '.$db->Quote( $name );
			$db->setQuery( $query );
			$this->_template	= $db->loadObject();

			return (boolean) $this->_template;
		}
		else {
			return JError::raiseError( 500, 'Table from defined' );
		}
	}

	/**
	 * @param	string	The raw string to us
	 */
	function loadFromFile( $name )
	{
		// TODO
	}

	/**
	 * @return	string
	 */
	function getTitle()
	{
		return $this->_template->title;
	}

	/**
	 * @return	string
	 */
	function getBody()
	{
		return $this->_template->body;
	}

	/**
	 * @param	object
	 * @param	string
	 */
	function mergeObject( $obj, $prefix = '' )
	{
		$fields	= $obj->getPublicProperties( true );
		$temp	= $this->_template->body;
		foreach ($fields as $k => $v)
		{
			if (is_scalar( $v ))
			{
				$k		= strtoupper( '{'.$prefix.$k.'}' );
				$temp	= str_replace( $k, $v, $temp );
			}
		}
		$this->_template->body	= $temp;
	}
}
