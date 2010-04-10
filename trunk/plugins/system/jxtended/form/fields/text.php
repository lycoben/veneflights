<?php
/**
 * @version		$Id: text.php 58 2008-05-12 19:52:31Z louis.landry $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Text form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeText extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Text';

	function fetchField($name, $value, &$node, $controlName)
	{
		$id			= str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		$size		= ( $node->attributes('size') ? ' size="'.$node->attributes('size').'"' : '' );
		$class		= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );
		$readonly	= ( $node->attributes('readonly') == 'true' ? ' readonly="readonly"' : '' );
		$onchange	= ( $node->attributes('onchange') ? ' onchange="'.$node->attributes('onchange').'"' : '' );

		return '<input type="text" name="'.$controlName.'['.$name.']" id="'.$id.'" value="'.htmlspecialchars($value).'" '.$class.$size.$readonly.$onchange.' />';
	}
}