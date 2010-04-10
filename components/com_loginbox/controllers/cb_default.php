<?php
defined('_JEXEC') or die();
jimport('joomla.application.component.controller');
JHTML::_('behavior.mootools');
class CB_LoginBoxController extends JController {
   function display() { 
      //echo "cb_default.php this=<pre>";print_r($this);echo "</pre><hr>";
      $view = $this->getView();
      $model = $this->getModel();
      $view->setModel($model, true);
      
     //  echo "cb_default.php model=<pre>";print_r($model);echo "</pre><hr>";
     // echo "cb_default.php CB_LoginBoxController view=<pre>";print_r($view);echo "</pre><hr>";
      $view->display();
   }
    
	function login() {
		global $mainframe;
	    $view = $this->getView();
        $model = $this->getModel();
        $view->setModel($model, true);
        
        $user = JFactory::getUser();
        //echo "user=<pre>";print_r($user);echo "</pre><hr>";
        if ($user->get('id') > 0) {
           $model->setMessagesToUser('You are already logged in!'); 
          // echo "honna displauy view->display('logged')<hr>";
           $view->display('logged');
           return;
        }       
		
	   if (JError::isError($model->login())) {
		   JRequest::setVar('login_only', 1);
	   } else {
	       if (!$view->get('messagesToUser')) {
	           $model->setMessagesToUser('You have successfully logged in'); 
	       }
	   }
	   //echo "model=<pre>";print_r($model);echo "</pre><hr>";

        if ($view->get('messagesToUser')) {
           $view->display('logged');
        } else {	   
		   $view->display();
        }		
		
	}
	
	function register() {
	   global $mainframe;
	   // $model = $this->getModel();
	    $view = $this->getView();
        $model = $this->getModel();
        $view->setModel($model, true);
      
	   if (JError::isError($model->register())) {
		   JRequest::setVar('register_only', 1);
	   }
	   
        if ($view->get('messagesToUser')) {
           $view->display('registered');
        } else {	   
		   $view->display();
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