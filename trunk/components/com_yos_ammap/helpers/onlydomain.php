<?php
defined('_JEXEC') or die( 'Restricted access' );
/* Removing http:// and  www from any URL
*
* if you try parser url  http://www.4arab.net/service.html it will  to  4arab.net is easy :)
* Demo :
* http://www.4arab.net/demo/http_parser.php


* @author    Mohammed Almarwai <info@4arab.net>
* @version    1.0
* @date        26 - 1 - 2007
*/

class Only_Domain  {

	var $url;
	var $_result=null;
	
	function url($url){
		$referer = parse_url($url);
		$domain = $referer['host'];
		if  (  preg_match  (  "/www/i", $domain )){
			$only_domain = str_replace  (  'www.', '',$domain);
			$this->_result = $only_domain;
		} else {
			$this->_result = $domain;
		}
	}

	function getResult(){
		return $this->_result;
	}
}

?>