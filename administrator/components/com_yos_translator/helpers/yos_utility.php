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
class Yos_utility
{
	/**
	 * Convert an array to string
	 *
	 * @param array $arr_input
	 * @param string $str_separate
	 * @return string
	 */
	function yos_array_to_string($arr_input, $str_separate){
		$str_output = "";
		for ($i = 0; $i < count($arr_input); $i++){
			if ($i == 0) {
				$str_output = $arr_input[$i];
			}else {
				$str_output .= $str_separate . $arr_input[$i];
			}
		}
		return $str_output;
	}
	
	/**
	 * Convert an string to an array
	 *
	 * @param string $str_input
	 * @param string $str_separate
	 * @return array
	 */
	function yos_string_to_array($str_input, $str_separate){
		$arr_output = split($str_separate, $str_input);
		return $arr_output;
	}
	
	/**
	 * Is sub array (sequential)
	 * A smarter detect, uses for getUpdateElement function
	 *
	 * @param array $newArray
	 * @param array $oldArray
	 * @return bool
	 */
	function isSubArray($newArray, $oldArray) {
		$d = -1;
		for ($i = 0; $i < count($newArray) && $i < count($oldArray); $i++){
			$ok = false;
			for ($j = 0; $j < count($oldArray); $j++){
				if(($newArray[$i] == $oldArray[$j]) && ($j > $d)){
					$d = $j;
					$ok = true;
					break;
				}
			}
			if (!$ok) {
				return false;
			}
		}
		
		return true;
	}
	
	/**
	 * Get Update Elements
	 * Get updated elements by compare 2 arrays
	 *
	 * @param array $newArray
	 * @param array $oldArray
	 * @return array
	 */
	function getUpdateElement($newArray, $oldArray){
		$k = 0;
		$allNew = true;
		for ($i = 0; $i < count($newArray); $i++){
			$subArray = array_slice($newArray, $i, count($newArray) - $i);
			if (Yos_utility::isSubArray($subArray, $oldArray)) {
				$k = $i;
				$allNew = false;
				break;
			}
		}
		
		$returnArray = array_slice($newArray, 0, $k);
		
		if ($allNew) {
			return $newArray;
		}
		
		return $returnArray;
	}
	
	/**
	 * split an array to many array
	 * each array length less than $size
	 *
	 * @param array $arr_input
	 * @param int $size
	 * @return array
	 */
	function splitArray($arr_input, $size){
		$arr_output = array();
		
		$i = 0;
		do {
			$arr_temp = array_slice($arr_input, $i, $size);
			array_push($arr_output, $arr_temp);
			$i += $size;
		} while ($i < count($arr_input));
		
		return $arr_output;
	}
	
	/**
	 * Get a sub words from a string
	 *
	 * @param string $str_in string input
	 * @param int $numberWord Number of words
	 * @param int $start point to start get words
	 * @return string
	 */
	function wordSub($str_in, $numberWord, $start = 0) {
		$arr_text = preg_split('/\s/',trim($str_in));
		$arr_new = array_slice($arr_text, $start, $numberWord);
		$text = implode(' ', $arr_new);
		return $text;
	}
	
	function getVersion(){
		$xml = & JFactory::getXMLParser('Simple');
		if ($xml->loadFile(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'version.xml'))
		{
			if (!$version = & $xml->document->version) {
				return false;
			}
			if (!$url = & $xml->document->url) {
				return false;
			}
			if (!$productcode = & $xml->document->productcode) {
				return false;
			}
		} else {
			return false;
		}
		
		return array('version' => $version[0]->data(), 'url' => $url[0]->data(), 'productcode'=> $productcode[0]->data() );
		
	}
}
?>

