<?php
/**
 * @version		$Id: integers.php 49 2008-04-29 00:32:29Z rob.schley $
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
class JXFieldTypeList_Integers extends JXFieldTypeList
{
	function _getOptions( &$node )
	{
		$first		= (int) $node->attributes('first' );
		$last		= (int) $node->attributes('last');
		$step		= (int) max( 1, $node->attributes('step') );

		$options	= array();
		for ($i = $first; $i <= $last; $i += $step)
		{
			$options[] = JHTML::_( 'select.option', $i );
		}
		return $options;
	}
}