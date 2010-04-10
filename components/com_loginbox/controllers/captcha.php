<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class LoginBoxController extends JController {
   function display() {
      $view = $this->getView('captcha');
      $view->display();
   }
}
?>