<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.component.model');
class LoginBoxModelLink extends JModel {
   var $_link = null;
   
   function getUrl() {
      $url = JRequest::getVar('u');
      $url = base64_decode($url);
      return $url;
   }
   /*
   function checkLink() {
      $userId = JRequest::getVar('user_id');
      
      if (empty($userId)) {
         $this->setError("User ID is empty");
         return false;
      }

      $link = $this->getLink();
      $storyId = $link->get('article_id');
      
      $key = JURI::base();
      
      $url = "http://services.digg.com/story/" . urlencode($storyId) . "/user/" . urlencode($userId) . "/digg?appkey=" . urlencode($key);
      $parts = parse_url($url);
      
      $errno = null;
      $error = null;
      $fp = fsockopen($parts['host'], 80, $errno, $error, 30);
      if (!$fp) {
         $this->setError($error);
         return false;
      }

      $getStr = '';
      
      if (isset($parts['path'])) {
         $getStr .= $parts['path'];
      } else {
         $getStr .= "/";
      }
      
      if (isset($parts['query'])) {
         $getStr .= "?{$parts['query']}";
      }
      
      
      $passed = "GET $getStr HTTP/1.1\r\n";
      $passed .= "Host: {$parts['host']}\r\n";
      $passed .= "User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.2.1) Gecko/20021204\r\n";      
      $passed .= "Connection: Close\r\n\r\n";
      fwrite($fp, $passed);

      $received = '';     
      while (!feof($fp)) {
         $received .= fgets($fp, 1024);
      }
      fclose($fp);
      
      if (false !== strpos($received, "200 OK")) {
         return 1;
      } else {
         return 0;
      }
   }
   */
   function getLink() {
      if (!is_null($this->_link)) {
         return $this->_link;
      }
      
      require_once(JPATH_COMPONENT_SITE . DS . 'helpers' . DS . 'link.php');
      $link = JTable::getInstance('link');
      
      $idLink = JRequest::getInt('id_link');
      if ($idLink > 0) {
         $link->load($idLink);
         if (!$link->get('id')) {
            $this->setError("Can't find link with ID $idLink");
            return false;
         }
      } else {
         $session = JFactory::getSession();
         $fromSession = $session->get('loginbutton_link', null);
         if (is_null($fromSession)) {
            $params = JComponentHelper::getParams('com_loginbox');
            $link->set('login', $params->getValue('login'));
            $link->set('logout', $params->getValue('logout'));
         } else {
            $link->setProperties($fromSession);
         }
      }
      $this->_link = $link;
      return $link;
   }
   
   function addLink() {
      $login = JRequest::getString('login', '', 'post', 4);
      $logout = JRequest::getString('logout', '', 'post', 4);
      
     // echo "_REQUEST=<pre>";print_r($_REQUEST);echo "</pre><hr>";
     // echo "login=<pre>";print_r($login);echo "</pre><hr>";
      
      require_once(JPATH_COMPONENT_SITE . DS . 'helpers' . DS . 'link.php');
      $link = JTable::getInstance('link');
      
      $link->set('login', $login);
      $link->set('logout', $logout);
      
      $session = JFactory::getSession();
      if (!$link->check() || !$link->store()) {
         $session->set('loginbutton_link', $link->getProperties());
         $this->setError($link->getError());
         return false;
      }
      $session->set('loginbutton_link', null);
      return $link;
   }
}
?>
