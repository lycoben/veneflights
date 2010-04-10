<?php
defined('_JEXEC') or die();
jimport('joomla.application.component.view');

class CB_LoginBoxViewCB_LoginBox extends JView {
   function display($tmpl = null) {
        $params = JComponentHelper::getParams('com_loginbox');             
        $this->assignRef('enable_captcha_login', $params->getValue('enable_captcha_login'));
        $this->assignRef('enable_captcha_register', $params->getValue('enable_captcha_register'));
        $this->assignRef('messagesToUser', $this->get('messagesToUser'));
        parent::display($tmpl);
   }
}
?>