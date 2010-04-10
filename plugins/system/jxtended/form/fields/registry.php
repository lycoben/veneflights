<?php
/**
 * @version		$Id: text.php 49 2008-04-29 00:32:29Z rob.schley $
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
class JXFieldTypeRegistry extends JXFieldType
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Registry';

	function fetchField($name, $value, &$node, $controlName)
	{
		if (is_string($value)) {
			$params = new JParameter($value);
			$values = $params->toArray();
		} else {
			$values = (array) $value;
		}

		$fields = array();
		if (!empty($node->param)) {
			foreach ($node->param as $param)
			{
				$fields[$param->attributes('name')] = $this->_getField($param, (!empty($values[$param->attributes('name')])) ? $values[$param->attributes('name')] : $param->attributes('default', null), $controlName.'['.$name.']');
			}
		}

		return $fields;
	}

	/**
	 * Render a form field
	 *
	 * @access	public
	 * @param	object	$node			An JXFormField object
	 * @param	mixed	$value			The field value
	 * @param	string	$controlName	The field control name
	 * @return	object	Rendered Form Field object
	 * @since	1.5
	 */
	function _getField(&$node, $value, $controlName = 'jxform[params]')
	{
		// get the field type
		$type = $node->attributes('type');

		// load the field type object
		$field = &$this->_parent->loadFieldType($type);

		// field type could not be loaded -- just return some basic information
		if ($field === false) {
			$field = &$this->_parent->loadFieldType('text');
		}

		return $field->render($node, $value, $controlName);
	}
}