<?php
/**
 * @version		$Id: combo.php 58 2008-05-12 19:52:31Z louis.landry $
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
class JXFieldTypeCombo extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Combo';

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
		$size		= ( $node->attributes('size') ? ' size="'.$node->attributes('size').'"' : '' );
		$readonly	= ( $node->attributes('readonly') == 'true' ? ' readonly="readonly"' : '' );
		$onchange	= ( $node->attributes('onchange') ? ' onchange="'.$node->attributes('onchange').'"' : '' );
		$class		= ( $node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="combobox"' );

		$options	= $this->_getOptions( $node );

		$html	= '<input type="text" name="'.$controlName.'['.$name.']" id="'.$id.'" value="'.htmlspecialchars($value).'" '.$class.$size.$readonly.$onchange.' />';
		$html	.= '<ul id="combobox-'.$id.'" style="display:none;">';
		foreach ($options as $option) {
			$html .= '<li>'.$option->text.'</li>';
		}
		$html	.= '</ul>';

		JHTML::_('behavior.combobox');

		return $html;
	}
}