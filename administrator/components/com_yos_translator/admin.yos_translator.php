<?php
/**
 * Translator entry point file for Translator Component
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();

//check directory permission
if (!is_writable(JPATH_COMPONENT_SITE)) {
	JError::raiseWarning('front-end unwritable', JPATH_COMPONENT_SITE . ' is unwritable!');
}

// Load the admin HTML view
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'yos_utility.php' );

// Set the path definitions
$view = JRequest::getCmd('view',null);
//$popup_upload = JRequest::getCmd('pop_up',null);
$path = "file_path";

// Require the base controller
require_once (JPATH_COMPONENT.DS.'controller.php');

$cmd = JRequest::getCmd('task', null);

// Require specific controller if requested
if($controllerName = JRequest::getVar('controller')) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php');
} else {
	if (strpos($cmd, '.') != false)
	{
		// We have a defined controller/task pair -- lets split them out
		list($controllerName, $task) = explode('.', $cmd);
	
		// Define the controller name and path
		$controllerName	= strtolower($controllerName);
		
		$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	
		// If the controller file path exists, include it ... else lets die with a 500 error
		if (file_exists($controllerPath)) {
			require_once($controllerPath);
		} else {
			JError::raiseError(500, 'Invalid Controller');
		}
	}
	else
	{
		// Base controller, just set the task :)
		$controllerName = null;
		$task = $cmd;
	}
}

// Set the name for the controller and instantiate it
$controllerClass = 'TranslatorController'.ucfirst($controllerName);
if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class');
}

//Register Task
$controller->registerTask('unpublish','publish');

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();
