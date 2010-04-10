<?php
defined('_JEXEC') or die();
jimport('joomla.application.component.view');

class LoginBoxViewLoginBox extends JView {
   function display($tmpl = null) {
      $params = JComponentHelper::getParams('com_loginbox');
      $this->assignRef('enable_captcha_login', $params->getValue('enable_captcha_login'));
      $this->assignRef('enable_captcha_register', $params->getValue('enable_captcha_register'));
      parent::display($tmpl);
   }
}
?>