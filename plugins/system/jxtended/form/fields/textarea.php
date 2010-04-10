<?php
/**
 * @version		$Id: textarea.php 92 2008-07-24 10:41:27Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Textarea form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeTextarea extends JXFieldType
{
   /**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'Textarea';

	function fetchField($name, $value, &$node, $controlName)
	{
		$id		= str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		$rows	= $node->attributes('rows');
		$cols	= $node->attributes('cols');
		$class	= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );

		// convert <br /> tags so they are not visible when editing
		$value	= str_replace('<br />', "\n", $value);

		return '<textarea name="'.$controlName.'['.$name.']" cols="'.$cols.'" rows="'.$rows.'" '.$class.' id="'.$id.'" >'.htmlspecialchars($value).'</textarea>';
	}
}