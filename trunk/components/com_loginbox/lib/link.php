<?php
class JTableLink extends JTable {
   var $id = null;
   var $login = null;
   var $logout = null;
  // var $article_id = null;
   
   function __construct() {
      $db = JFactory::getDBO();
      return parent::__construct('#__loginbutton_links', 'id', $db);
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