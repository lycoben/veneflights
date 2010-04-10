<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.helper');

$view = JRequest::getVar('view', 'default');

if ($view == 'captcha') {
    jimport('recly.html.kcaptcha');
    $params = JComponentHelper::getParams('com_loginbox');  
    $kcaptcha = new KCaptcha($params);
    $kcaptcha->render();  
    echo $kcaptcha->display(JRequest::getVar('id', ''));
    exit;
}

$params = JComponentHelper::getParams('com_loginbox');
$_CB_adminpath		=	JPATH_ADMINISTRATOR.DS.'components'.DS.'com_comprofiler'; 

if ( $params->getValue('compatibility') == 'cb' && file_exists( $_CB_adminpath . DS . 'plugin.foundation.php' ) ) {  
     $view = 'cb_'.$view; 
     
     include_once( $_CB_adminpath . '/ue_config.php' );
     require_once(JPATH_COMPONENT.DS.'helpers'.DS.'plugin.foundation.php' );
     require_once(JPATH_COMPONENT.DS.'helpers'.DS.'plugin.class.php' );
     cbimport( 'cb.database' );
     require_once(JPATH_COMPONENT.DS.'helpers'.DS.'comprofiler.html.php');
     require_once(JPATH_COMPONENT.DS.'helpers'.DS.'comprofiler.class.php');
     cbimport( 'language.front' );     
}
  
if ( $params->getValue('compatibility') == 'cb' && !file_exists( $_CB_adminpath . DS . 'plugin.foundation.php' ) ) {
	 JError::raiseWarning( 500, 'CB not installed');    	
}   

require_once(JPATH_COMPONENT_SITE . DS . 'controllers' . DS . "$view.php");

if ( $params->getValue('compatibility') == 'cb' && file_exists( $_CB_adminpath . DS . 'plugin.foundation.php' ) ) {  
     $view = 'cb_'.$view; 
     $controller = new CB_LoginBoxController();
} else {
     $controller = new LoginBoxController();
}

$document = JFactory::getDocument();
if ($params->getValue('css_choice') == 'custom') {
   $document->addStyleDeclaration($params->getValue('css'));  
} else {
   $document->addStyleSheet(JURI::base() . 'components/com_loginbox/assets/css/style.css');
}

$controller->execute(JRequest::getVar('task', null, 'default', 'cmd'));
$controller->redirect();
JRequest::setVar('tmpl', 'component');
?>