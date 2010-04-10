<?php
/**
 * @version		$Id: spacer.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Spacer form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeSpacer extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Spacer';

	function fetchField($name, $value, &$node, $controlName)
	{
		return '<hr />';
	}
}