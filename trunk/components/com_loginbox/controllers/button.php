<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class LoginBoxController extends JController {
   function display() {
      JRequest::setVar('tmpl', 'component');
      $model = $this->getModel('link');
      $view = $this->getView('button');
      $view->setModel($model);
      $view->display();
   }
   
   function added() {
      JRequest::setVar('tmpl', 'component');
      $model = $this->getModel('link');
      $view = $this->getView('button');
      $view->setModel($model);
      $view->added();
   }
   
   function add() {
      $model = $this->getModel('link');
      $result = $model->addLink();
      if (!$result) {
         $this->setRedirect('index.php?option=com_loginbox&view=button', $model->getError(), 'error');
         return false;
      }
      $this->setRedirect('index.php?option=com_loginbox&view=button&task=added&id_link=' . $result->get('id'));
      return true;
   }
}
?>