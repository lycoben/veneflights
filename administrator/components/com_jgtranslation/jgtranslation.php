<?php
/**
 * @version		1.2
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @copyright	Ossolution Team
 * @license		GPL
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
//Define constants
define('JF_ADMINPATH', JPATH_COMPONENT.DS.'elements');
define('NUMBER_ITEMS', 1);
//Require the helper class for translating content
require_once JPATH_COMPONENT.DS.'helper'.DS.'helper.php';
//Require the controller
require_once (JPATH_COMPONENT.DS.'controller.php');
//Init the controller
$controller	= new JGtranslationController();
// Perform the Request task
$controller->execute( JRequest::getCmd('task'));
//Perform redirection if redirect has set
$controller->redirect();
?>