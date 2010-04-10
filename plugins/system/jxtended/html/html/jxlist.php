<?php
/**
 * @version		$Id: jxlist.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	HTML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Extended Utility class for all HTML drawing classes.
 *
 * @package 	JXtended
 * @subpackage	HTML
 * @static
 */
class JXHTMLList
{
	/**
	 * Builds a generic select box from a SQL query automagically
	 *
 	 * @param	string	The name of the input field
 	 * @param	object	A default object to be inserted at the beginning of the list
 	 * @param	string	The SQL query e.g. 'SELECT foo AS value, bar AS text FROM #__table ORDER BY text'
 	 * @param	string	The option that should be selected
 	 * @param	string	A string of attributes to add to the <select> tag
 	 * @param	string	The name of the object variable for the option value
	 * @param	string	The name of the object variable for the option text
 	 */
	function genericlist($name, $query, $default = null, $selected = null, $attributes = null, $value = 'value', $text = 'text')
	{
		$options = array();

		$db = &JFactory::getDBO();
		$db->setQuery( $query );

		if (!($rows = $db->loadObjectList()))
		{
			echo $db->stderr();
			return false;
		}

		if (is_object($default))
		{
			$options[] = $default;
		}

		foreach ($rows as $row)
		{
			$options[] = JHTML::_('select.option', $row->$value, $row->$text);
		}

		if ($attributes==null)
		{
			$attributes = 'class="inputbox" size="1" onchange="document.adminForm.submit();"';
		}

		return JHTML::_('select.genericlist', $options, $name, $attributes, $value, $text, $selected);
	}
}