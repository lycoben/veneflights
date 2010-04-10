<?php
/**
 * @version		$Id: radio.php 58 2008-05-12 19:52:31Z louis.landry $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

jximport( 'joomla.html.html' );

/**
 * Radiofield form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeRadio extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Radio';

	function fetchField($name, $value, &$node, $controlName)
	{
		$id = str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));

		$options = array ();
		foreach ($node->children() as $option)
		{
			$val	= $option->attributes('value');
			$text	= $option->data();
			$options[] = JHTML::_('select.option', $val, JText::_($text));
		}
		return JHTML::_('select.radiolist', $options, $controlName.'['.$name.']', '', 'value', 'text', $value, $id);
	}
}