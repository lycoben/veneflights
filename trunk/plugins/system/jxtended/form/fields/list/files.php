<?php
/**
 * @version		$Id: files.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

jximport( 'joomla.html.html' );

/**
 * List form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeList_Files extends JXFieldTypeList
{
	function _getOptions( &$node )
	{
		jximport( 'joomla.filesystem.folder' );
		jximport( 'joomla.filesystem.file' );

		// path to images directory
		$path		= JPATH_ROOT.DS.$node->attributes('directory');
		$filter		= $node->attributes('filter');
		$exclude	= $node->attributes('exclude');
		$stripExt	= $node->attributes('stripext');
		$files		= JFolder::files($path, $filter);

		$options = array ();

		if ( is_array($files) )
		{
			foreach ($files as $file)
			{
				if ($exclude)
				{
					if (preg_match( chr( 1 ) . $exclude . chr( 1 ), $file ))
					{
						continue;
					}
				}
				if ($stripExt)
				{
					$file = JFile::stripExt( $file );
				}
				$options[] = JHTML::_('select.option', $file, $file);
			}
		}

		return $options;
	}
}