<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('recly.html.kcaptcha');

class LoginBoxViewCaptcha extends JView {
   function display($tpl = null) {      
     // $this->addTemplatePath(JPATH_COMPONENT_SITE . DS . 'views' . DS . 'captcha' . DS . 'tmpl');  
      $params = JComponentHelper::getParams('com_loginbox');  
      $kcaptcha = new KCaptcha($params);
      $kcaptcha->render();  
      $this->assignRef('captcha', $kcaptcha->display());       
      parent::display($tpl);
   }
}
?>