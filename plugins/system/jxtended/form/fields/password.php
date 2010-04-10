<?php
/**
 * @version		$Id: password.php 81 2008-06-24 21:34:12Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Password form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypePassword extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Password';

	function fetchField($name, $value, &$node, $controlName)
	{
		$id		= str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		$size	= ( $node->attributes('size') ? 'size="'.$node->attributes('size').'"' : '' );
		$class	= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );

		return '<input type="password" name="'.$controlName.'['.$name.']" id="'.$id.'" value="'.htmlspecialchars( $value ).'" '.$class.' '.$size.' />';
	}
}