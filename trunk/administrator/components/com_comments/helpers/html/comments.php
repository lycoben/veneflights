<?php
/**
 * @version		$Id: comments.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * HTML behavior class for JXtended Comments
 *
 * @package	Comments
 * @version	1.0
 */
class JHTMLComments
{

	function statelist($active)
	{
		$options	= array();
		$options[]	= JHTML::_('select.option', '0', JText::_('COMMENTS_INDEX_FILTER_BY_STATE'));
		$options[]	= JHTML::_('select.option', '1', JText::_('COMMENTS_STATE_PUBLISHED'));
		$options[]	= JHTML::_('select.option', '-1', JText::_('COMMENTS_STATE_UNPUBLISHED'));

		$attributes = 'class="inputbox" size="1" onchange="document.adminForm.submit();"';

		return JHTML::_('select.genericlist', $options, 'filter_state', $attributes, 'value', 'text', $active);
	}

	/**
	 * Method to render a given parameters form.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string	$name	The name of the array for form elements.
	 * @param	string	$ini	An INI formatted string.
	 * @param	string	$file	The XML file to render.
	 * @return	string	A HTML rendered parameters form.
	 */
	function params($name, $ini, $file)
	{
		jimport('joomla.html.parameter');

		// Load and render the parameters
		$path	= JPATH_COMPONENT.DS.$file;
		$params	= new JParameter($ini, $path);
		$output	= $params->render($name);

		return $output;
	}
}
