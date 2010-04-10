<?php
/**
 * @package		yos_showcase
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * Yos Utility class
 * Store many useful functions
 *
 */
class Yos_translator
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
		
		//links url processing, add yos_link_begin before and yos_link_end after link url
		preg_match_all('/<a(.*?)href="(.*?)"/i', $content, $matches);
		if(isset($matches[2]))
		{
			for ($i=0; $i < count($matches[2]); $i++)
			{
				$replace = "yos_link_begin" . $matches[2][$i] . "yos_link_end";
				$content = str_replace($matches[2][$i] . '"', $replace . '"', $content);
			}
		}
		
		//links title processing, add yos_title_begin before and yos_title_end after the link title
		preg_match_all('/<a(.*?)title="(.*?)"/i', $content, $matches);
		if(isset($matches[2]))
		{
			for ($i=0; $i < count($matches[2]); $i++)
			{
				$replace = "yos_title_begin" . $matches[2][$i] . "yos_title_end";
				$content=str_replace($matches[2][$i] . '"', $replace . '"', $content);
			}
		}
		
		//span tag processing, replace <span by <yos_span and </span by </yos_span
		$content	= preg_replace('/<span/i', '<yos_span', $content);
		$content	= preg_replace('/<\/span/i', '</yos_span', $content);
		
		//create a header
		$header		=	 "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>"
						."<html xmlns='http://www.w3.org/1999/xhtml'>"
						."<head>"
						."<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>"
						."<title>Yos Translator</title>"
						."</head>"
						."<body>";
		
		//create footer
		$footer		= 	 "</body>"
						."</html>";
		
		$yos_file	=	$header.$content.$footer;
				
		//BEGIN write file: write this content to a file
		$clock		= md5(time().uniqid(''));
		$file		= JPATH_ROOT.DS.'components'.DS.$option.DS."yos_page_".$clock.".html";
		$handle 	= fopen($file, 'w');
		fwrite($handle, $yos_file);
		//END write file
		
		//BEGIN building url to connect
		$lang_trans	= explode('|', $languagePair);
		$hl			= $lang_trans[0];
		$sl			= $lang_trans[0];
		$tl			= $lang_trans[1];		
		$u			= JURI::root()."components/$option/yos_page_".$clock.".html";
		//END building url to connect
		
		//BEGIN 1st connection
		$hostName	= 'translate.google.com';
		$directory	= "/translate?hl=".$hl."&sl=".$sl."&tl=".$tl."&u=".$u;
		
		$fp 		= fsockopen($hostName, 80, $errno, $errstr, 30);
		if(!$fp)
		{
			return "ERROR #01: $errstr ($errno)";
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
				
		//get the second frame
		if (!preg_match('/<frame src="(\/translate_p.*?usg=.*?)"/i', $result, $match)) {
			return "ERROR #02: couldn't get second frame";
		}
		//END 1st connection
		
		//BEGIN 2nd connection
		$hostName = 'translate.google.com';
		$directory = preg_replace('/&amp;/', '&', $match[1]);
		
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
		
		//get the ridirect page
		if (!preg_match('/URL=http:\/\/(.*?)(\/translate_c.*?)"/i', $result, $match)) {
			return "ERROR #04: couldn't get redirect page";
		}
		$hostName = $match[1];
		$directory	= preg_replace('/&amp;/', '&', $match[2]);
		//END 2nd connection
		
		//BEGIN 3rd connection
		$fp 		= fsockopen($hostName, 80, $errno, $errstr, 30);
		if(!$fp) 
		{
			return "ERROR #05: $errstr ($errno)";
		}
		
		$out = "GET $directory HTTP/1.0\r\n";
		$out .= "Host: $hostName\r\n\r\n";
			
		fwrite($fp, $out);
		
		$result = '';
		while(!feof($fp))
		{
			$result.=fgets($fp);
		}
		fclose($fp);
		//END 3rd connection
		
		//Remove cache file
		fclose($handle);
		unlink($file);
		
		//get return encoding
		preg_match('/charset=(.*?)\sDate/', $result, $encoding);
		if(!isset($encoding[1]))
		{
			return "ERROR #06: Google return invalid value";
		}	
		//encode utf-8
		$encoding_begin		= substr($encoding[1], 0, strlen($encoding[1])-1);
		$encoding_to		= "UTF-8";
		$result 			= mb_convert_encoding($result, $encoding_to, $encoding_begin);
		
		//replace newline by JLORD_NEW_LINE
		$result = preg_replace('/\n/', 'JLORD_NEW_LINE', $result);
		
		//get content in body
		preg_match('/<body(.*?)>(.*)<\/body>/', $result, $match);
		$content_in	= $match[2];
		
		//remove google translate suggestion
		preg_match_all('/<span(.*?)tipon(.*?)tipoff(.*?)><span(.*?)>(.*?)<\/span>/', $content_in, $match);
		$content_in	= str_replace($match[0], '', $content_in);
		
		//return valid link url
		preg_match_all('/<a(.*?)href=(.*?)yos_link_begin(.*?)yos_link_end(.*?)"/', $content_in, $matches);
		$content_in	= str_replace($matches[2], '', $content_in);
		$content_in	= str_replace($matches[4], '', $content_in);
		$content_in	= str_replace('yos_link_begin','"',$content_in);
		$content_in	= str_replace('yos_link_end','',$content_in);
		
		//return valid link title
		$content_in	= str_replace('yos_title_begin','',$content_in);
		$content_in	= str_replace('yos_title_end','',$content_in);
		
		//remove all </span tags
		$content_in	= str_replace('</span>','',$content_in);
		
		//replace <yos_span and </yos_span by <span and </span
		$content_in = str_replace('<yos_span', '<span', $content_in);
		$content_in = str_replace('</yos_span', '</span', $content_in);
		
		
		$content_trans	= rawurldecode($content_in);
		$content_trans 	= preg_replace_callback('/&#\d{2,5};/u', array(&$this,"utf8_entity_decode"), $content_trans );
		
		//replace JLORD_NEW_LINE
		$content_trans = preg_replace('/JLORD_NEW_LINE/i', "\n", $content_trans);
		
		$str_out = $this->restore_chars_encode($content_trans);
		
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
?>