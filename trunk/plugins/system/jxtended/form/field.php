<?php
/**
 * @version		$Id: field.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

jximport('joomla.utilities.simplexml');

/**
 * Form Field Object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFormField extends JSimpleXMLElement
{
	function addOption($attrs=array(), $data='')
	{
        //If there is no array already set for the tag name being added,
        //create an empty array for it
        if(!isset($this->option))
            $this->option = array();

        //Create the child object itself
        $child = new JXFormField('option', $attrs, $this->_level + 1);
		$child->setData($data);

        //Add the reference of it to the end of an array member named for the elements name
        $this->option[] =& $child;

        //Add the reference to the children array member
        $this->_children[] =& $child;
	}

	function setData($data)
	{
		$this->_data = $data;
	}
}

/**
 * Form field type base class
 *
 * The base class for all JXField objects
 *
 * @abstract
 * @author		Louis Landry <louis.landry@ivivio.com>
 * @package		ivivio
 * @subpackage	Forms
 * @since		1.5
 */
class JXFieldType extends JObject
{
   /**
	* Field type
	*
	* This has to be set in the final
	* renderer classes.
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = null;

   /**
	* reference to the object that instantiated the element
	*
	* @access	protected
	* @var		object
	*/
	var	$_parent = null;

	/**
	 * Constructor
	 *
	 * @access protected
	 */
	function __construct($parent = null) {
		$this->_parent = $parent;
	}

   /**
	* Method to get the field type
	*
	* @access	public
	* @return	string	field type
	*/
	function getType() {
		return $this->_type;
	}

	function render(&$xmlElement, $value, $controlName = 'jxform')
	{
		$name	= $xmlElement->attributes('name');
		$label	= $xmlElement->attributes('label');
		$descr	= $xmlElement->attributes('description');
		$reqd	= $xmlElement->attributes('required');

		//make sure we have a valid label
		$label = $label ? $label : $name;

		$result = new JObject();
		$result->set('type',	$this->_type);
		$result->set('label',	$this->fetchLabel($label, $descr, $xmlElement, $controlName, $name));
		$result->set('field',	$this->fetchField($name, $value, $xmlElement, $controlName));
		$result->set('name',	$name);
		$result->set('value',	$value);
		$result->set('label.text',			JText::_($label));
		$result->set('description.text',	JText::_($descr));
		$result->set('decorator.type',		$xmlElement->attributes('decorator'));
		$result->set('decorator.text',		$xmlElement->attributes('decorator_text'));
		$result->set('decorator.options',	$xmlElement->attributes('decorator_options'));
		$result->set('required',			(int)($reqd == 'true'));

		return $result;
	}

	function fetchLabel($label, $description, &$xmlElement, $controlName='', $name='')
	{
		$id = str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		if ($description) {
			$output = '<label id="'.$id.'-lbl" for="'.$id.'" class="hasTip" title="'.JText::_($label, true).'::'.JText::_($description, true).'">';
		} else {
			$output = '<label id="'.$id.'-lbl" for="'.$id.'">';
		}

		$output .= JText::_( $label );
		$output .= '</label>';

		return $output;
	}

	function fetchField($name, $value, &$xmlElement, $controlName) {
		return;
	}
}