<?php
defined('JPATH_BASE') or die();
jimport('recly.jtableadvanced');
class JTableLink extends JTableAdvanced {
   var $_table = '#__loginbutton_links';
   var $id = null;
   var $login = null;
   var $logout = null;
   
   function __construct() {
      $db = JFactory::getDBO();
      return parent::__construct($this->_table, 'id', $db);
   }
   
   function check() {
      $return = true;
      if (empty($this->login)) {
         $this->setError("Login HTML code is empty");
         $return &= false;
      }
      
      if (empty($this->logout)) {
         $this->setError("Logout HTML code is empty");
         $return &= false;
      }
            
      return $return;
   }
} 
?>