<?php
defined('JPATH_BASE') or die();
class JTableAdvanced extends JTable {
   function __construct($table) {
      parent::__construct($table, 'id', JFactory::getDBO());
   }
   
   function getParam($key) {
      if (!isset($this->params)) {
         return false;
      }
      
      $paramsObj = new JParameter('');
      $paramsObj->loadINI($this->params);
      $value = $paramsObj->getValue($key);
      return $value;
   }
   
   function getLimitterQuery($limitter = null) {
      $db = $this->_db;
      if (!is_array($limitter) || !(sizeof($limitter) > 0)) {
         return false;
      }
      
      $start = intval($limitter[0]);
      $limit = intval($limitter[1]);
      
      if (!($limit > 0)) {
         return false;
      }
      
      $query = " LIMIT $start, $limit";
      return $query;
   }
   
   function getFilterQuery($filter = null) {
      $db = $this->_db;
      $filterQuery = '';
      $allowedOperators = array('=', '>', '>=', '!=', '<', '<=', 'LIKE'); 
      if (is_array($filter) && sizeof($filter) > 0) {
         foreach ($filter as $v) {
            $sign = isset($v[2]) && in_array($v[2], $allowedOperators)?$v[2]:'=';
            $filterQuery .= ' AND `' . $v[0] . "` $sign '" . $db->getEscaped($v[1]) . "' ";
         }
         if (!empty($filterQuery)) {
            $filterQuery = "WHERE 1 $filterQuery ";
         }
      }
      return $filterQuery;
   }
   
   
   function getCount($filter = null) {
      $db = $this->_db;
      $filterQuery = $this->getFilterQuery($filter);
      $query = "SELECT COUNT(id) FROM $this->_tbl $filterQuery";
      $db->setQuery($query);
      if (!$db->query()) {
         $this->setError($db->getErrorMsg());
         return false;
      }
      $count = $db->loadResult();
      return $count;
   }
   
   
   function getAll($filter = null, $orderer = null, $limitter = null) {
      $db = $this->_db;
      
      $filterQuery = $this->getFilterQuery($filter);
      
      $orderQuery = '';
      if (is_array($orderer) && sizeof($orderer) > 0) {
         foreach ($orderer as $v) {
            if (!empty($orderQuery)) {
               $orderQuery .= ", ";
            }
            $orderQuery .= "`" . $v[0] . "`  " . $v[1];
         }
         if (!empty($orderQuery)) {
            $orderQuery = "ORDER BY $orderQuery";
         }
      }
      
      $limitterQuery = $this->getLimitterQuery($limitter);
      
      $query = "SELECT * FROM $this->_tbl $filterQuery $orderQuery $limitterQuery";
      $db->setQuery($query);
//      echo "<h3>" . $db->getQuery() . "</h3>";
      if (!$db->query()) {
         $this->setError($db->getErrorMsg());
         return false;
      }
      $objects = array();
      $arr = $db->loadAssocList('id');
      
      
      foreach ($arr as $k => $v) {
         $classname = get_class($this);
         $obj = new $classname();
         $obj->bind($v);
         $objects[$k] = $obj;
      }
      return $objects;
   }
}