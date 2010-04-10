<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );
class plgButtonLoginButton extends JPlugin {
   function plgButtonLoginButton(& $subject, $config) {
      parent::__construct($subject, $config);
   }

   function onDisplay($name) {
      global $mainframe;

      $doc     =& JFactory::getDocument();
      $template   = $mainframe->getTemplate();

      $link = 'index.php?option=com_loginbox&view=button&tmpl=component';

      JHTML::_('behavior.modal');

      $button = new JObject();
      $button->set('modal', true);
      $button->set('link', $link);
      $button->set('text', JText::_('LoginButton'));
      $button->set('name', 'next');
      $button->set('options', "{handler: 'iframe', size: {x: 400, y: 300}}");

      return $button;
   }
}