<?php
/**
 * @version		$Id: comments.php 302 2008-07-10 19:39:37Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.helper');
jimport('joomla.application.component.controller');

// create the extension version object
require_once(JPATH_COMPONENT.'/version.php');
$version = new CommentsVersion;

// verify the JXtended libraries are available and the correct version
if (!function_exists('jximport')) {
	JError::raiseWarning(500, JText::_('JX_LIBRARIES_MISSING'));
} else {
	if (version_compare('1.0.5', JX_LIBRARIES)) {
		JError::raiseWarning(500, JText::sprintf('JX_LIBRARIES_OUTDATED', '1.0.5'));
	}
}

/**
 * The base JXtended Comments controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsController extends JController
{
	function display()
	{
		$document = &JFactory::getDocument();
		$document->addStyleSheet( JURI::base().'components/com_comments/media/css/default.css' );

		// Set the default view name and format from the Request
		$vName		= JRequest::getWord( 'view', 'dashboard' );
		$vFormat	= $document->getType();
		$lName		= JRequest::getWord( 'layout', 'default' );

		if ($view = &$this->getView( $vName, $vFormat ))
		{
			switch ($vName)
			{
				case 'config':
					$model = $this->getModel( 'config' );
					break;

				case 'comments':
				case 'comment':
					$model = &$this->getModel('comment');
					break;

				default:
					$model = &$this->getModel( 'dashboard' );
					break;
			}

			// Push the model into the view (as default)
			$view->setModel( $model, true);
			$view->setLayout($lName);

			// push document object into the view
			$view->assignRef('document', $document);

			$view->display();
		}

		JSubMenuHelper::addEntry('Dashboard',	'index.php?option=com_comments&view=dashboard',	($vName == 'dashboard'));
		JSubMenuHelper::addEntry('Moderate',	'index.php?option=com_comments&view=comments',	(($vName == 'comments') or ($vName == 'comment')));
	}

	/**
	 * Manually installs the component
	 */
	function install()
	{
		global $mainframe;

		$model	= &$this->getModel( 'install' );
		$result	= $model->install();

		if (JError::isError( $result )) {
			$mainframe->enqueueMessage( $result->getMessage(), 'notice' );
		}
		else {
			$mainframe->enqueueMessage( JText::_( 'Extension(s) successfully installed' ), 'message' );
		}

		echo '<p><a href="index.php?option=com_comments">'.JText::_( 'Return to Comments' ).'</a></p>';
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
