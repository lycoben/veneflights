<?php
/**
 * @version		$Id: model.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Form model object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFormModel extends JObject
{
	/**
	 * Form name
	 * @access	private
	 * @var		string
	 */
	var $_id = null;

	/**
	 * Form Descriptor
	 * @access	private
	 * @var		object
	 */
	var $_descriptor = null;

	/**
	 * Internal values
	 */
	var $_values = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	string	$descriptor	XML Form descriptor string
	 * @param	string	$data		INI Form value data string
	 * @return	void
	 * @since	1.5
	 */
	function __construct($descriptor = null)
	{
		$this->_load( $descriptor, false );
		$this->_values = array();
	}

	/**
	 * Loads a form model xml file and sets the form descriptor object
	 *
	 * @access	public
	 * @param	string	$path	Path to the form model xml file
	 * @return	boolean	True if successful
	 * @since	1.5
	 */
	function loadFormFile($path)
	{
		return $this->_load( $path, true );
	}

	/**
	 * Loads a form model descriptor from an xml string and sets the form descriptor object
	 *
	 * @access	public
	 * @param	string	$descriptor	XML Form descriptor string
	 * @return	boolean	True if successful
	 * @since	1.5
	 */
	function loadFormString($descriptor)
	{
		return $this->_load( $descriptor, false );
	}

	/**
	 * Get the form id
	 *
	 * @access	public
	 * @param	string	$default	Default name if internal id is not set
	 * @return	string	Form name
	 * @since	1.5
	 */
	function getId($default = null)
	{
		return ($this->_id) ? $this->_id : $default;
	}

	/**
	 * Set the form id
	 *
	 * @access	public
	 * @param	string	$value	Form id to set
	 * @return	void
	 * @since	1.5
	 */
	function setId($value)
	{
		$this->_id = $value;
	}

	/**
	 * Gets an internal value
	 * @param	string	The key of the value
	 * @param	mixed	An optional default if the key is not found
	 * @return	mixed
	 */
	function getValue( $key, $def = null )
	{
		return isset( $this->_values[$key] ) ? $this->_values[$key] : $def;
	}

	/**
	 * Gets the associate array of internal values
	 * @return	array
	 */
	function getValues()
	{
		return $this->_values;
	}

	/**
	 * Sets an internal value
	 * @param	string	The key of the value
	 * @param	mixed	The value
	 */
	function setValue( $key, $value )
	{
		$this->_values[$key] = $value;
	}

	/**
	 * Filter the input array based on the XML specification
	 *
	 * @param	array
	 */
	function filter( &$input )
	{
		// Static input filters for specific settings
		static $noHtmlFilter	= null;
		static $safeHtmlFilter	= null;

		if (is_null( $safeHtmlFilter )) {
			$safeHtmlFilter = & JFilterInput::getInstance(null, null, 1, 1);
		}

		if (is_null( $noHtmlFilter )) {
			$noHtmlFilter = & JFilterInput::getInstance(/* $tags, $attr, $tag_method, $attr_method, $xss_auto */);
		}

		if (isset( $this->_descriptor->fields ))
		{
			$n	= count( $this->_descriptor->fields );
			for ($i = 0; $i < $n; $i++)
			{
				$fields = $this->_descriptor->fields[$i]->children();

				foreach ($fields as $field)
				{
					$name	= $field->attributes( 'name' );
					$filter	= $field->attributes( 'filter' );
					if (isset( $input[$name] ))
					{
						$value	= &$input[$name];
						switch (strtoupper( $filter ))
						{
							case 'RAW':
								// do nothing
								break;

							case 'SAFEHTML':
								$value = $safeHtmlFilter->clean( $value, $filter );
								break;

							default:
								if (function_exists( $filter )) {
									$value = call_user_func( $filter, $value );
								}
								else {
									$value = $noHtmlFilter->clean( $value, $filter );
								}
								break;
						}
					}
				}
			}
		}
	}

	/**
	 * Validate the data against the XML specification
	 *
	 * @param	array
	 *
	 * @return	boolean|JException
	 */
	function validate( $input )
	{
		// We must have a <fields> tag
		if (!isset( $this->_descriptor->fields[0] )) {
			return JError::raiseWarning( 500, 'Fields element not found' );
		}

		// make a JObject for easier handling
		if (is_array( $input ))
		{
			jximport( 'joomla.utilities.array' );
			$input = JArrayHelper::toObject( $input, 'JObject' );
		}

		require_once( JPATH_JXPRO_FORMS.DS.'validate.php' );
		// Validate the input
		$validator	= new JXFormValidator( $this->_descriptor->fields[0], $this );
		$result		= $validator->validate( $input );
		return $result;
	}

	/**
	 * @param	string	String data, or a file name
	 * @param	boolean
	 */
	function _load( $data, $fromFile = false )
	{
		// Initialize variables
		$result = false;

		if ($data) {
			$xml	= & JFactory::getXMLParser('Simple');
			$loaded	= $fromFile ? $xml->loadFile( $data ) : $xml->loadString( $data );

			if ($loaded) {
				$this->_descriptor =& $xml->document;
				$result = true;
			}
		}
		return $result;
	}

	/**
	 *
	 */
	function _store()
	{
		$result = true;
		// Create the table object
		if ($table = &$this->getDataSource())
		{
			// Store the bound request data set to the data source
			if (isset( $table->id )) {
				$table->id = (int) $table->id;
			}
			if (!$table->check()) {
				$result = JError::raiseWarning( 500, $table->getError() );
			} else if (!$table->store()) {
				$result = JError::raiseWarning( 500, $table->getError() );
			}
		}
		return $result;
	}
}