<?php
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.view');

class LoginBoxViewEdit extends JView {
   function display($tpl = null) {
      JToolBarHelper::title('Add/Edit LoginButton');
      
      JToolBarHelper::save();
      JToolBarHelper::apply();
      JToolBarHelper::cancel();
      
      $model = $this->getModel('loginbutton');
      $item = $model->getItem();
      $this->assignRef('item', $item);
      parent::display($tpl);
   }
}
?>
