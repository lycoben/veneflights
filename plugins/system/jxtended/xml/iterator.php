<?php
/**
 * @version		$Id: iterator.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	XML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * @abstract
 * @package		JXtended
 * @subpackage	XML
 */
class XmlIterator extends JObject
{
	protected $parent	= null;

	protected $model	= null;

	/**
	 * Constructor
	 */
	function __construct( &$parent )
	{
		$this->parent = $parent;
	}

	// Overridable methods

	function loadString( $source )
	{
		JError::raiseNotice( 500, 'Load method must be defined by the derived class' );
	}

	/**
	 * @param	string	The type of iterator
	 */
	function &getInstance( $type )
	{
		$className	= $type.'XmlIterator';
		if (!class_exists( $className ))
		{
			$base	= dirname( __FILE__ );
			$type	= strtolower( JFilterInput::clean( $type, 'word' ) );
			if (file_exists( $base.DS.'iterators'.DS.$type.'.php' ))
			{
				require_once( $base.DS.'iterators'.DS.$type.'.php' );

				if (!class_exists( $className )) {
					$result	= JError::raiseNotice( 500, 'Iterator type not found in file' );
				}
				else
				{
					$parent	= null;
					$result	= new $className( $parent );
				}
			}
			else {
				$result	= JError::raiseNotice( 500, 'Iterator type file not found' );
			}
		}
		return $result;
	}

	/**
	 * Add a directory where JHTML should search for helpers. You may
	 * either pass a string or an array of directories.
	 *
	 * @access	public
	 * @param	string	A path to search.
	 * @return	array	An array with directory elements
	 * @since	1.5
	 */
	function addIncludePath( $path='' )
	{
		static $paths;

		if (!isset($paths)) {
			$paths = array();
		}

		// force path to array
		settype($path, 'array');

		// loop through the path directories
		foreach ($path as $dir)
		{
			if (!empty($dir) && !in_array($dir, $paths)) {
				array_unshift($paths, JPath::clean( $dir ));
			}
		}

		return $paths;
	}

	/**
	 * Iterates over a node
	 * @param	DOMElement	An xml doc element
	 * @return	string		The assembled html
	 */
	function iterate( &$node, &$value = null )
	{
		static	$path = null;

		if ($path == null) {
			// TODO: This is cheating, do the popper find method used elsewhere
			$path = array_pop( XMLIterator::addIncludePath() );
		}

		$result	= array();
		foreach ($node->children() as $child)
		{
			$name	= strtolower( $child->getName() );
			$name	= preg_replace( '#[^A-Z0-9_]#i', '', $name );
			$class	= 'XMLIterate'.$name;
			if (!class_exists( $class ))
			{
				$file	= $path.DS.strtolower( $name ).'.php';
				if (file_exists( $file )) {
					require_once( $file );
				} else {
					$result[]	= JError::raiseWarning( 500, $name.' class file unavailable' );
				}
			}
			if (class_exists( $class )) {
				$transform	= new $class( $this );
				$temp		= $transform->iterate( $child, $value );
				$result[]	= $temp;
			}
			else {
				$result[]	= JError::raiseWarning( 500, $class.' class unavailable' );
			}
		}
		return $result;
	}

	function out( $text )
	{
		static $prof;

		if (!$prof)
		{
			jimport( 'joomla.utilities.profiler' );
			$prof = new JProfiler();
			echo '<style> * {font-family:monospace;}</style>';
		}
		echo $prof->mark( $text );
		ob_flush();
		flush();
	}

	function setModel( &$model )
	{
		$this->model = &$model;
	}

	function &getModel()
	{
		if ($this->parent == null) {
			return $this->model;
		} else {
			return $this->parent->getModel();
		}
	}


}