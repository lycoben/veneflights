<?php
/**
 * @version		$Id: hidden.php 81 2008-06-24 21:34:12Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Hidden form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeHidden extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Hidden';

	function fetchField($name, $value, &$node, $controlName)
	{
		$id		= str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		$class	= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"' );

		return '<input type="hidden" name="'.$controlName.'['.$name.']" id="'.$id.'" value="'.htmlspecialchars( $value ).'" '.$class.' />';
	}
}