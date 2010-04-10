<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.component.view');
class LoginBoxViewButton extends JView {
   function display($tpl = null) {
      $this->addTemplatePath(JPATH_COMPONENT_SITE . DS . 'views' . DS . 'button' . DS . 'tmpl');
      $model = $this->getModel('link');
      $link = $model->getLink();
      $this->assignRef('link', $link);
      parent::display($tpl);
   }
   
   function added() {
      $this->addTemplatePath(JPATH_COMPONENT_SITE . DS . 'views' . DS . 'button' . DS . 'tmpl');
      $model = $this->getModel('link');
      $link = $model->getLink();
      $this->assignRef('link', $link);
      $this->display('added');
   }
}
?>