<?php
defined('_JEXEC') or die();
jimport('joomla.application.component.controller');
JHTML::_('behavior.mootools');
class LoginBoxController extends JController {
   function display() { 
      $view = $this->getView();
      $view->display();
   }
   
	function login() {
		global $mainframe;
        $view = $this->getView();
        $user = JFactory::getUser();
        if ($user->get('id') > 0) {
           $view->display('logged');
           return;
        }

		if ($return = JRequest::getVar('return', '', 'method', 'base64')) {
			$return = base64_decode($return);
		}

		$options = array();
		$options['remember'] = JRequest::getBool('remember', false);

		$credentials = array();
		$credentials['username'] = JRequest::getVar('username', '', 'method', 'username');
		$credentials['password'] = JRequest::getString('passwd', '', 'post', JREQUEST_ALLOWRAW);

		//$params = JComponentHelper::getParams('com_loginbox');
		$access_code = JRequest::getString('access_code', '');
		
        $session = JFactory::getSession();
         	               
		if ($session->get('captcha_keystring_login') != $access_code) {
		   JRequest::setVar('login_only', 1);
		   JError::raiseWarning( 500, 'Wrong access code');
		   $view->display(); 
		   return; 
		}
        	
		$error = $mainframe->login($credentials, $options);
		if (JError::isError($error)) {
		   JRequest::setVar('login_only', 1);
		   $view->display();
		} else {
		   $mainframe->redirect('index.php?option=com_loginbox&task=loggedin');
		}
	}
	
	function register() {
	   global $mainframe;
	    $model = $this->getModel();
        $view = $this->getView();
      
		//$params = JComponentHelper::getParams('com_loginbox');
		$access_code = JRequest::getString('access_code', '');
		
        $session = JFactory::getSession();
         		       
		if ($session->get('captcha_keystring_register') != $access_code) {
		   JRequest::setVar('register_only', 1);
		   JError::raiseWarning( 500, 'Wrong access code');
		   $view->display(); 
		   return; 
		}      
      
	   if (JError::isError($model->register())) {
		   JRequest::setVar('register_only', 1);
		   $view->display();
	   } else {
		   $mainframe->redirect('index.php?option=com_loginbox&task=registered');
	   }
	}
	
	function registered() {
      $view = $this->getView();
	   $view->display('registered');
	}
	
	function loggedin() {
      $view = $this->getView();
	   $view->display('success');
	}
}
?>