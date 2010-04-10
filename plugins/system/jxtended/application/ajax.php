<?php
/**
 * @version		$Id: ajax.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Application
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * AJAX Class
 *
 * @package		JXtended
 * @subpackage	Application
 */
class JXAjax
{
	function _( $type )
	{
		//Initialise variables
		$type	= preg_replace( '#[^A-Z0-9_\.]#i', '', $type );
		$file	= $type;
		$func	= $type;

		// Check to see if we need to load a helper file
		// Form: className.method
		if (substr_count( $type, '.' ))
		{
			$parts	= explode('.', $type);
			$file	= $parts[0];
			$func	= $parts[1];
		}

		$className	= 'JXAjax'.ucfirst( $file );

		if (!class_exists( $className ))
		{
			jximport( 'joomla.filesystem.path' );
			if ($path = JPath::find( JXAjax::addIncludePath(), strtolower($file).'.php' ))
			{
				require_once $path;

				if (!class_exists( $className ))
				{
					return JError::raiseWarning( 0, 'JXAjax '. $className.'::' .$func. ' not found in file.' );
				}
			}
			else
			{
				return JError::raiseWarning( 0, 'JXAjax ' . $file . ' not supported. File not found.' );
			}
		}

		if (is_callable( array( $className, $func ) ))
		{
			$args = func_get_args();
			array_shift( $args );
			return call_user_func_array( array( $className, $func ), $args );
		}
		else
		{
			return JError::raiseWarning( 0, $className.'::'.$func.' not supported.' );
		}

	}

	/**
	 * Add a directory where JHTML should search for helpers. You may
	 * either pass a string or an array of directories.
	 *
	 * @access	public
	 * @param	string	A path to search.
	 * @return	array	An array with directory elements
	 */
	function addIncludePath( $path='' )
	{
		static $paths;

		if (!isset($paths)) {
			$paths = array();
			// dedicated Ajax server
			if (defined( 'JPATH_AJAX' )) {
				$paths[] =  JPATH_AJAX.DS.'methods';
			}
			if (defined( 'JPATH_COMPONENT' )) {
				$paths[] =  JPATH_COMPONENT.DS.'ajax';
			}
		}

		if (!empty( $path ) && !in_array( $path, $paths )) {
			array_unshift($paths, JPath::clean( $path ));
		}
		return $paths;
	}
}