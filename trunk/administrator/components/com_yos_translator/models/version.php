<?php
/**
 * @version		$Id: version.php 189 2008-09-16 08:48:00 sonlv$
 * @package		YOS
 * @subpackage	Version
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

/**
 * Yos_translator Model
 *
 * @package		YOS
 * @subpackage	version
 * @since 1.5
 */
class TranslatorModelVersion extends JModel
{
	//version of product
	var $_version	=	null;
	
	//url of server checkversion
	var $_url		=	null;
	
	//Product code
	var $_pc		=	null;
	
	function __construct($lists){
		$this->_version	=	$lists['version'];
		$this->_url		=	$lists['url'];
		$this->_pc		=	$lists['pc'];
		parent::__construct();
	}
	
	function setVersion($version){
		$this->_version=$version;
	}
	
	function getVersion(){
		return $this->_version;
	}
	
	function setURL($url){
		$this->_url	=	$url;
	}
	
	function getURL(){
		return $this->_url;
	}
	
	function setPC($pc){
		$this->_pc	=	$pc;
	}
	
	function getPC(){
		return $this->_pc;
	}
	//$version: current version
	//$url: now must be www.yopensource.com
	//$pc: product code
	function getCheckversion()
	{
		$version=	$this->_version;
		$url	=	$this->_url;
		$pc		=	$this->_pc;
		
		$arr_version = split('\.', $version);
		
		$fp = fsockopen($url, 80, $errno, $errstr, 30);
		if (!$fp) 
			{
				echo "$errstr ($errno)<br />\n";
			} 
		else 
			{			   
			    //This for joomla 1.5.x: use JURI::root()
			    $out = "GET /index.php?option=com_yos_checkversion&view=checkversion&pc=$pc&version=$version&s=".base64_encode(JURI::root())." HTTP/1.1\r\n";
			    $out .= "Host: $url\r\n";
			    $out .= "Connection: Close\r\n\r\n";
			    fwrite($fp, $out);
			    $contentf = '';
			    while (!feof($fp)) 
			    {
			      $contentf .= fgets($fp);
			    }
			    preg_match('/<version>(.*?)<\/version>/', $contentf, $match);
			    if (!$match) 
			    {
			      $lastversion = '0';
			    } else 
			    {
			      $lastversion=$match[1];
			    }
			    fclose($fp);
			}	
		
		$arr_lastversion = split('\.', $lastversion);
		for ($i=0; $i< count($arr_lastversion); $i++)
			{
				if ((isset($arr_version[$i]))&&(intval($arr_version[$i])>intval($arr_lastversion[$i]))) 
				{
					return false;
				}
				if ((!isset($arr_version[$i]))||(intval($arr_version[$i])<intval($arr_lastversion[$i]))) 
				{
		 			return true;
				}
			}
		return false;
	}
}