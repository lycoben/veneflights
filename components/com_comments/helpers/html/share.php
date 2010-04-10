<?php
/**
 * @version		$Id: share.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * JHTML Helper class for JXtended Comments
 *
 * @package	Comments
 * @version	1.0
 */
class JHTMLShare
{
	/**
	 * Generate a link to a mailto popup for
	 *
	 * @static
	 * @param	string	$title		Title for the link
	 * @param	string	$link		The full link
	 * @param	array	$attribs	Link attributes
	 * @return	string	The mailto link
	 * @since	1.0
	 */
	function email($title, $link, $attribs = array())
	{
		$url	= 'index.php?option=com_mailto&tmpl=component&link='.base64_encode($link);
		$status = 'width=400,height=300,menubar=yes,resizable=yes';

		$attribs['title']	= JText::_('COMMENTS_EMAIL');
		$attribs['onclick'] = "window.open(this.href,'win2','".$status."'); return false;";

		$result	= JHTML::_('link', JRoute::_($url), $title, $attribs);
		return $result;
	}
}
