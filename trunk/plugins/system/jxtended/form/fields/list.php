<?php
/**
 * @version		$Id: list.php 58 2008-05-12 19:52:31Z louis.landry $
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
class JXFieldTypeList extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'List';

	function _getOptions( &$node )
	{
		$options = array ();
		foreach ($node->children() as $option)
		{
			$val	= $option->attributes('value');
			$text	= $option->data();
			$options[] = JHTML::_( 'select.option', $val, JText::_($text));
		}
		return $options;
	}

	function fetchField($name, $value, &$node, $controlName)
	{
		$id			= str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		$size		= $node->attributes('size');
		$class		= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="inputbox"' );
		$disabled	= $node->attributes('disabled');
		$readonly	= $node->attributes('readonly');
		if ($disabled == 'true')
		{
			$disabled	= ' disabled="disabled"';
			$html		= JHTML::_( 'select.genericlist', $this->_getOptions( $node ), $controlName.'['.$name.']', $class.$disabled, 'value', 'text', $value, $id);
		}
		else if ($readonly == 'true')
		{
			$html		= JHTML::_( 'select.genericlist', $this->_getOptions( $node ), '', $class.' disabled="disabled"', 'value', 'text', $value, $id)
				. '<input type="hidden" name="'.$controlName.'['.$name.']'.'" value="'.$value.'" />';

/*
			$options	= $this->_getOptions( $node );
			$selected	= null;
			foreach ($options as $k => $v) {
				if ($v->value == $value) {
					$selected	= $v->value;
					break;
				}
			}
			$html		= '<input type="text" value="'.$value.'" disabled="disabled" />'
				. '<input type="hidden" name="'.$controlName.'['.$name.']'.'" value="'.$value.'" />';
*/
		}
		else {
			$html	= JHTML::_( 'select.genericlist', $this->_getOptions( $node ), $controlName.'['.$name.']', $class, 'value', 'text', $value, $id);
		}
		return $html;
	}
}