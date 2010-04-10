<?php
/**
 * @version		$Id: helper.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

if (!defined( 'JPATH_JXPRO_FORMS' )) {
	define( 'JPATH_JXPRO_FORMS', dirname( __FILE__ ) );
}

/**
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFormHelper
{
	/**
	 * Add a directory where Formilo should search for additional resources
	 *
	 * @access	public
	 * @param	string	A path to search.
	 * @return	array	An array with directory elements
	 * @since 1.5
	 */
	function addIncludePath( $path=null )
	{
		static $paths;

		if (!isset( $paths )) {
			$paths = array( JPATH_JXPRO_FORMS );
		}

		// just force path to array
		settype( $path, 'array' );

		if (!empty( $path ) && !in_array( $path, $paths ))
		{
			// loop through the path directories
			foreach ($path as $dir)
			{
				// no surrounding spaces allowed!
				$dir = trim($dir);

				// add to the top of the search dirs
				//array_unshift($paths, $dir);
				$paths[] = $dir;
			}
		}
		return $paths;
	}

	/**
	 * @param	string	A file name
	 * @param	string	An optional subfolder
	 */
	function find( $file, $subfolder='' )
	{
		foreach (JXFormHelper::addIncludePath() as $path)
		{
			$path .= $subfolder.DS.$file;
			if (file_exists( $path )) {
				return $path;
			}
		}
		return null;
	}

	/**
	 * @param	string	The form id
	 */
	function &getView( $id = '' )
	{
		static $instances = null;

		if ($instances == null) {
			$instances = array();
		}

		if (!isset( $instances[$id] ))
		{
			// load the dependancies
			require_once( JPATH_JXPRO_FORMS.DS.'view.php' );
			$instances[$id] = new JXFormView();
			if ($file = JXFormHelper::find( $id.'.xml', DS.'forms' ))
			{
				$instances[$id]->loadFormFile( $file );
				$instances[$id]->setId( $id );

			}
			foreach (JXFormHelper::addIncludePath() as $path) {
				// TODO: This is a bit dickie
				$instances[$id]->addFieldFolder( $path.DS.'fields' );
			}
			//else {
			//	$instances[$id] = JError::raiseWarning( 404, 'Form '.$id.' not found' );
			//}
		}
		return $instances[$id];
	}

	/**
	 * @param	string	The form id
	 */
	function &getModel( $id='' )
	{
		static $instances = null;

		if ($instances == null) {
			$instances = array();
		}

		if (!isset( $instances[$id] ))
		{
			// load the dependancies
			require_once( JPATH_JXPRO_FORMS.DS.'model.php' );

			$instances[$id] = new JXFormModel();
			if ($file = JXFormHelper::find( $id.'.xml', DS.'forms' ))
			{
				$instances[$id]->loadFormFile( $file );
				$instances[$id]->setId( $id );
			}
			//else {
			//	$instances[$id] = JError::raiseWarning( 404, 'Form '.$id.' not found' );
			//}
		}
		return $instances[$id];
	}
}