<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.helper');

require_once(JPATH_COMPONENT.DS.'controllers'.DS.'default.php');

$controller = new LoginBoxController();
$controller->execute(JRequest::getVar('task', null, 'default', 'cmd'));
$controller->redirect();

/*

JToolBarHelper::title('WowJoomla LoginBox');
JToolBarHelper::preferences('com_loginbox', 450, 670);

jimport('joomla.application.component.helper');
$view = JRequest::getVar('view', 'default');

require_once(JPATH_COMPONENT_SITE . DS . 'controllers' . DS . "$view.php");

$controller = new LoginBoxController();
$controller->addModelPath(JPATH_COMPONENT_SITE . DS . 'models');
$controller->addViewPath(JPATH_COMPONENT_SITE . DS . 'views');
$controller->execute(JRequest::getVar('task', null, 'default', 'cmd'));
$controller->redirect();
*/
?>