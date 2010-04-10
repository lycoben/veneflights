<?php
/**
 * @version		$Id: comments.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// if the jxtended libraries are not present exit gracefully
if (!defined('JX_LIBRARIES')) {
	JError::raiseNotice(500, JText::_('JX_LIBRARIES_MISSING'));
	return false;
}

// import library dependencies
jimport('joomla.application.component.helper');
jimport('joomla.application.component.controller');

// add the table path for JXtended Comments
JTable::addIncludePath( JPATH_COMPONENT.DS.'tables' );

/**
 * The base JXtended Comments controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsController extends JController
{
	/**
	 * Dummy method to render an error if an attempt is made to request a view of JXtended Comments component
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function display()
	{
		JError::raiseError(404, 'Resource Not Found');
	}

	function getCaptcha()
	{
		$app = &JFactory::getApplication();

		// build and set the built-in CAPTCHA test
		jximport('jxtended.captcha.captcha');
		$options = array('direct' => true);
		$captcha = &JXCaptcha::getInstance('image', $options);

		$id = JRequest::getCmd('x');
		if (empty($id)) {


			$app->close();
		}

		// test and initialize the CAPTCHA object
		if (!$captcha->test() or !$captcha->initialize())
		{
			// either the test failed or the object could not initialize, raise an error and return

			$app->close();
		}

		// output the CAPTCHA image
		$output = $captcha->create($id);
		if (!$output) {
			// couldn't generate the CAPTCHA image

			$app->close();
		}
	}
}

// Determine the request protocol
$protocol = JRequest::getWord('protocol');

// Get task command from the request
$cmd = JRequest::getVar('task', null);

// If it was a multiple option post get the selected option
if (is_array( $cmd )) {
	$cmd = array_pop( array_keys( $cmd ) );
}

// Filter the command and instantiate the appropriate controller
$cmd = JFilterInput::clean($cmd,'cmd');
if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);

	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerFile = ($protocol) ? $controllerName.'.'.$protocol : $controllerName;
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerFile.'.php';

	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
} else {
	// Base controller, just set the task :)
	$controllerName = null;
	$task = $cmd;
}

// Set the name for the controller and instantiate it
$controllerClass = 'CommentsController'.ucfirst($controllerName);

if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class');
}

// Perform the Request task
$controller->execute( $task );

// Redirect if set by the controller
$controller->redirect();