<?php
/**
 * @package		yos_showcase
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Cuong Phan
 * @copyright 	Cuong Phan (cuongpmyos@gmail.com)
 * @license		Commercial
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Yos Utility class
 * Store many useful functions
 *
 */
class Yos_translateText
{

	/**
	 * Do Translate
	 *
	 * @param string $languagePair
	 * @param string $string_in want to translate
	 * @return string translated
	 */
	
	function translate($languagePair, $string_in) {
		global $option;
		
		$str_out = '';
		
		$content = $this->replace_chars_encode($string_in);
		$hostName = 'ajax.googleapis.com';
		$directory ='/ajax/services/language/translate?v=1.0&q='.rawurlencode($content).'&langpair='.rawurlencode($languagePair);
		$fp 		= fsockopen($hostName, 80, $errno, $errstr, 30);
		if(!$fp) 
		{
			return "ERROR #03: $errstr ($errno)";
		}
		
		$out = "GET $directory HTTP/1.0\r\n";
		$out .= "Host: $hostName\r\n\r\n";
		fwrite($fp, $out);
		$result = '';
		while(!feof($fp))
		{
			$result .= fgets($fp);
		}
		fclose($fp);
		//get content preg_match('/<body(.*?)>(.*)<\/body>/', $result, $match);
		if (preg_match('/translatedText":"(.*?)"},/', $result, $match)) {
			$str_out = trim($match[1]);
		}	
		
		$str_out = preg_replace_callback('/&#\d{2,5};/u', array(&$this,"utf8_entity_decode"), $str_out );
		$str_out = $this->restore_chars_encode($str_out);
		$str_out = str_replace('\u0026#39;','\'',$str_out);
		return $str_out;
	}
	function replace_chars_encode($text)
	{
		$patterns[00]		= '/{/';
		$patterns[01]		= '/}/';
		$replacements[00]	= 'mmdd0000';
		$replacements[01]	= 'mmdd0001';
		$text=preg_replace($patterns, $replacements, $text);
		
		return $text;
	}
		
	function restore_chars_encode($text)
	{
		$patterns[00]		= '/mmdd0000/';
		$patterns[01]		= '/mmdd0001/';
		
		$replacements[00]	= '{';
		$replacements[01]	= '}';
		
		$text=preg_replace($patterns, $replacements, $text);
		
		return $text;
	}
	
	
	function utf8_entity_decode($entity)
	{
		$convmap = array(0x0, 0x10000, 0, 0xfffff);
		return mb_decode_numericentity($entity[0], $convmap, 'UTF-8');
	}
}