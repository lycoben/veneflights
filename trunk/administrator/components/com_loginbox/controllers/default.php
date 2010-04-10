<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class LoginBoxController extends JController {
   function display() {
      $model = $this->getModel('loginbutton');
      $view = $this->getView(JRequest::getCmd('view', 'list'));
      $view->setModel($model);
      $view->display();
   }    
   
   function cancel() {
      $this->setRedirect("index.php?option=com_loginbox");
   }
   
   function add() {
      JRequest::setVar('view', 'edit');
      $this->execute('display');
   }
   
   function edit() {
      JRequest::setVar('view', 'edit');
      $this->execute('display');
      
      $model = $this->getModel('link');
   }
   
   function apply() {
      $model = $this->getModel('loginbutton');
      $result = $model->save();
      if ($result > 0) {
         $this->setRedirect("index.php?option=com_loginbox&view=edit&cid[]=$result", "Item has been saved successfully");
      } else {
         JError::raiseWarning(0, $model->getError());
         JRequest::setVar('view', 'edit');
         $this->execute('display');
      }
   }
   
   function save() {
      $model = $this->getModel('loginbutton');
      $result = $model->save();
      if ($result > 0) {
         $this->setRedirect("index.php?option=com_loginbox", "Item has been saved successfully");
      } else {
         JError::raiseWarning(0, $model->getError());
         JRequest::setVar('view', 'edit');
         $this->execute('display');
      }
      return;
   }
   
   function remove() {
      $model = $this->getModel('loginbutton');
      $result = $model->delete();
      if (false === $result) {
         $this->setRedirect("index.php?option=com_loginbox", $model->getError(), 'error');
      } else {
         $this->setRedirect("index.php?option=com_loginbox", "$result items have been deleted");
      }
   }
   
   function reinstall() 
   {
       require_once(JPATH_SITE.DS . 'administrator'.DS.'components'.DS.'com_loginbox'.DS.'install.loginbox.php');
   }    
 
}
?>