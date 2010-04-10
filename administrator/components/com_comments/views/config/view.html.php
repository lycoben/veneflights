<?php
/**
 * @version		$Id: view.html.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.view');

/**
 * The HTML JXtended Comments configuration view
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsViewConfig extends JView
{
	/**
	 * Method to display the view.
	 *
	 * @access	public
	 * @param	string	$tpl	A template file to load.
	 * @return	mixed	JError object on failure, void on success.
	 * @throws	object	JError
	 * @since	1.0
	 */
	function display($tpl = null)
	{
		// Initialize variables.
		$user		= &JFactory::getUser();

		// Load the view data.
		$state		= &$this->get('State');
		$params		= &$state->get('config');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Prepare the view.
		$this->document->addStyleSheet('components/com_comments/media/css/comments.css');

		JHTML::addIncludePath(JPATH_COMPONENT.DS.'helpers'.DS.'html');

		// Push out the view data.
		$this->assignRef('state',	$state);
		$this->assignRef('config',	$params);

		// Load the view template.
		$result = $this->loadTemplate($tpl);

		// Check for an error.
		if (JError::isError($result)) {
			return $result;
		}

		echo $result;
	}
}