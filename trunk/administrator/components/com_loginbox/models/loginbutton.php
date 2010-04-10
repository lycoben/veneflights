<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.component.model');
jimport('recly.jtableadvanced');
require_once(JPATH_SITE.DS.'components'.DS.'com_loginbox'.DS.'helpers'.DS.'link.php' );
class LoginBoxModelLoginbutton extends JModel {
   var $_item = null;
  
   function save() {
      
      $db = JFactory::getDBO();
      $item = $this->getItem();

      if (!$item->bind(JRequest::get('post'))) {
         $this->setError($item->getError());
         return false;
      }
      
      $item->setLogout(JRequest::getString('logout', '', 'post', 4));
      $item->setLogin(JRequest::getString('login', '', 'post', 4));
  
      if (!$item->check()) {
         $this->setError($item->getError());
         return false;
      }
      
      if (!$item->store()) {
      
         $this->setError($item->getError());
         return false;
      }
                  
      return intval($item->get('id'));
   }
   
   function getItem() {
      if (!is_null($this->_item)) {
         $item = $this->_item;
      } else {
         $ids = (array)JRequest::getVar('cid');
         
         $item = JTable::getInstance('link');
         if (sizeof($ids) > 0) {
            $id = intval(array_shift($ids));
            if ($id > 0) {
               $item->load($id);
            }
         }
         $this->_item = $item;
      }
      return $item;
   }
   
   function delete() {
      $ids = (array) JRequest::getVar('cid');
      if (!(sizeof($ids) > 0)) {
         return 0;
      }
      
      $match = JTable::getInstance('link');
      $counter = 0;
      foreach ($ids as $id) {
        // echo "id=<pre>";print_r($id);echo "</pre><hr>";
         if (!($id > 0)) {
            continue;
         }
         $match->delete($id);
         $counter++;
      }
      return $counter;
   }
   
   
   function getPaginatorData() {
      $option = 'com_loginbox';
      $mainframe = JFactory::getApplication();
      
		$limit = $mainframe->getUserStateFromRequest( "$option.limit",		'limit',		'20',	'int' );
		$start = $mainframe->getUserStateFromRequest( "$option.limitstart",	'limitstart',	'0', 'int' );
		
      return array(
         'start' => $start, 
         'limit' => $limit
      );
   }
   
   function getTotalCount() {
      $store = JTable::getInstance('link');
      //$filter = $this->getPreparedFilter();
      $count = $store->getCount();
      return $count;
   }
   
   function getList() {
      $items = array();
      $store = JTable::getInstance('link');
      $orderer = $this->getOrderer();
      if (!is_null($orderer)) {
         $orderer = array(array($orderer['by'], $orderer['dir']));
      }
      
      //$filter = $this->getPreparedFilter();
      $pgDat = $this->getPaginatorData();
      $limitter = array($pgDat['start'], $pgDat['limit']);
      $items = $store->getAll($filter, $orderer, $limitter);
      return $items;
   }
   
   function getOrderer() {
      $option = 'com_loginbox';
      $mainframe = JFactory::getApplication();
      
		$by = $mainframe->getUserStateFromRequest( "$option.filter_order",		'filter_order',		'id',	'cmd' );
		$dir = $mainframe->getUserStateFromRequest( "$option.filter_order_Dir",	'filter_order_Dir',	'DESC',			'word' );
      
      
      $orderer = null;
      if ($by && $dir) {
         $orderer = array('by' => $by, 'dir' => $dir);
      }
      return $orderer;
   }
   
}
?>
