<?php
/**
 * @version		$Id: validate.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFormValidator extends JObject
{
	/**
	 * Form Descriptor
	 * @access	private
	 * @var		object
	 */
	var $_descriptor = null;

	var $_input = null;

	var $_form = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	string	$descriptor	XML Form descriptor string
	 * @param	string	$data		INI Form value data string
	 * @return	void
	 * @since	1.5
	 */
	function __construct( &$descriptor, &$form )
	{
		if (is_a( $descriptor, 'JSimpleXMLElement')) {
			$this->_descriptor =& $descriptor;
		}
		$this->_form = &$form;
	}

	/**
	 * Validates an input array according to the rules in the descriptor
	 * @param	array
	 * @return	mixed	True or JError
	 */
	function validate( &$input )
	{
		$this->_input = &$input;
		$result = true;

		foreach ($this->_descriptor->children() as $field)
		{
			if ($name = $field->attributes( 'name' ))
			{
				$value = $input->get( $name );
				// First check if required attribute set
				if ($required = $field->attributes( 'required' ))
				{
					if ($required == 'true')
					{
						if ($input->get( $name ) === null)
						{
							// Failed
							if ($msg = $field->attributes( 'message' )) {
								$result = new JException( $msg );
							} else {
								$result = new JException( $field->attributes( 'label' ).' required' );
							}
							break;
						}
					}
				}

				$result = $this->_isValid( $field );
				if (JError::isError( $result )) {
					break;
				} else if ($result == false) {
					// Failed validation
					if ($msg = $field->attributes( 'message' )) {
						$result = new JException( $msg );
					} else {
						$result = new JException( $field->attributes( 'label' ).' failed validation' );
					}
					break;
				}
			}
			else
			{
				// Fatal error
				$result = new JException( 'Field parsing failed: name attribute required' );
				break;
			}
		}

		return $result;
	}

	function &_isValid( &$field )
	{
		$result = true;

		if ($type = $field->attributes('validate'))
		{
			$class	= 'JXFormValidate'.$type;
			if (!class_exists( $class ))
			{
				foreach (JXFormHelper::addIncludePath() as $path)
				{
					$path .= DS.'rules'.DS.$type.'.php';
					if (file_exists( $path ))
					{
						require_once $path;
						break;
					}
				}
			}
			if (class_exists( $class )) {
				$rule = new $class;
				$result	= $rule->test( $field, $this->_input );
			} else {
				$result = new JException( 'Rule of type '.$type.' not available' );
			}
		}
		return $result;
	}
}

/**
 * @abstract
 */
class JXFormValidatorRegex
{
	var $_regex = null;

	function test( &$field, &$values )
	{
		$result = true;
		if (empty( $this->_regex )) {
			$result = new JException( 'Regex is invalid '.get_class( $this ) );
		}
		else
		{
			$name = $field->attributes( 'name' );
			if (!preg_match( chr(1).$this->_regex.chr(1), $values->get( $name ) )) {
				$result = false;
			}
		}
		return $result;
	}
}