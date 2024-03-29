<?php
/**
 * @version		$Id: json.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Webservices
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

// Is JSON extension loaded?  If not try to load it
if (!extension_loaded('json')) {
	if (JPATH_ISWIN) {
		@dl('php_json.dll');
	} else {
		@dl('json.so');
	}
}
if (!defined('JXJSON_NATIVE')) {
	define('JXJSON_NATIVE', (function_exists('json_encode'))? 0 : 0);
}

/**
 * JSON encoding/decoding class
 *
 * @contributor	Andrea Giammarchi <http://www.devpro.it>
 *
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 */
class JXJson
{
	/**
	 * Method to decode a JSON string into either an array or object of a given type
	 *
	 * @note	This method works in an optimist way. If JSON string is not valid
	 * 		the code execution will die using exit.
	 *		This is probably not so good but JSON is often used combined with
	 *		XMLHttpRequest then I suppose that's better more protection than
	 *		just some WARNING.
	 *		With every kind of valid JSON string the old error_reporting level
	 *		and the old error_handler will be restored.
	 *
	 * <code>
	 * <?php
	 *	JXJson::decode('["one",two,true,false,null,{},[1,2]]'); // array
	 * ?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$src	The JSON source string to decode
	 * @param`	mixed	$class	Either false to return an array or the name of a class to return an instance of
	 * @return	mixed	Either an object, array, or null representation of the JSON string
	 * @since	1.0
	 */
	function decode($src, $stdClass = 'stdClass')
	{
		if (JXJSON_NATIVE) {
			return json_decode($src);
		}
		$pos = 0;
		$length = is_string($src) ? strlen($src) : null;
		if ($length !== null) {
			$result = JXJson::_decode($src, $pos, $length, $stdClass);
		} else {
			$result = null;
		}
		return $result;
	}

	/**
	 * Method to encode a PHP native object or array as a JSON string
	 *
	 * <code>
	 * <?php
	 *	$obj = new MyClass();
	 *	obj->param = "value";
	 *	obj->param2 = "value2";
	 *	JXJson::encode(obj); // '{"param":"value","param2":"value2"}'
	 * ?>
	 * </code>
	 *
	 * @access	public
	 * @param	mixed	$decode	The PHP native object or array to encode into JSON
	 * @return	string	The JSON representation of the PHP native object or array
	 * @since	1.0
	 */
	function encode($decode)
	{
		if (JXJSON_NATIVE) {
			return json_encode($decode);
		}
		$result = '';
		switch (gettype($decode))
		{
			case 'array' :
				if (!count($decode) || array_keys($decode) === range(0, count($decode) - 1)) {
					$keys = array ();
					foreach ($decode as $value)
					{
						if (($value = JXJson::encode($value)) !== '') {
							array_push($keys, $value);
						}
					}
					$result = '['.implode(',', $keys).']';
				} else {
					$result = JXJson::convert($decode);
				}
				break;
			case 'string' :
				$replacement = JXJson::_getStaticReplacement();
				$result = '"'.str_replace($replacement['find'], $replacement['replace'], $decode).'"';
				break;
			default :
				if (!is_callable($decode)) {
					$result = JXJson::convert($decode);
				}
				break;
		}
		return $result;
	}

	/**
	 * Method to convert a variable to a JSON represtative string value
	 *
	 * This method is used by JXJson::encode method but should be used
	 * to do these convertions too:
	 *
	 * - JSON string to time() integer:
	 *
	 *		JXJson::convert(decodedDate:String):time()
	 *
	 *	If You recieve a date string rappresentation You
	 *	could convert into respective time() integer.
	 *	Example:
	 *		JXJson::convert(JXJson::decode($clienttime));
	 *		// i.e. $clienttime = 2006-11-09T14:42:30
	 *		// returned time will be an integer useful with gmdate or date
	 *		// to create, for example, this string
	 *              // Thu Nov 09 2006 14:42:30 GMT+0100 (Rome, Europe)
	 *
	 * - time() to JSON string:
	 *
	 *		JXJson::convert(time():Int32, true:Boolean):JSON Date String format
	 *
	 *	You could send server time() informations and send them to clients.
	 *	Example:
	 *		JXJson::convert(time(), true);
	 *		// i.e. 2006-11-09T14:42:30
	 *
	 * - associative array to generic class:
	 *
	 *		JXJson::convert(array(params=>values), new GenericClass):new Instance of GenericClass
	 * This method is used by JXJson::encode method but should be used
	 * to do these convertions too:
	 *
	 * - JSON string to time() integer:
	 *
	 *		JXJson::convert(decodedDate:String):time()
	 *
	 *	If You recieve a date string rappresentation You
	 *	could convert into respective time() integer.
	 *	Example:
	 *		JXJson::convert(JXJson::decode($clienttime));
	 *		// i.e. $clienttime = 2006-11-09T14:42:30
	 *		// returned time will be an integer useful with gmdate or date
	 *		// to create, for example, this string
	 *              // Thu Nov 09 2006 14:42:30 GMT+0100 (Rome, Europe)
	 *
	 * - time() to JSON string:
	 *
	 *		JXJson::convert(time():Int32, true:Boolean):JSON Date String format
	 *
	 *	You could send server time() informations and send them to clients.
	 *	Example:
	 *		JXJson::convert(time(), true);
	 *		// i.e. 2006-11-09T14:42:30
	 *
	 * - associative array to generic class:
	 *
	 *		JXJson::convert(array(params=>values), new GenericClass):new Instance of GenericClass
	 *
	 * @access	public
	 * @param	mixed	$param	The variable to convert into JSON
	 * @param	object	$result	Optional object if first parameter is an object
	 * @return	string	time() value or new object with parameters
	 * @since	1.0
	 */
	function convert($params, $result = null)
	{
		switch (gettype($params))
		{
			case 'array' :
				$tmp = array ();
				foreach ($params as $key => $value)
				{
					if (($value = JXJson::encode($value)) !== '') {
						array_push($tmp, JXJson::encode(strval($key)).':'.$value);
					}
				}
				$result = '{'.implode(',', $tmp).'}';
				break;
			case 'boolean' :
				$result = $params ? 'true' : 'false';
				break;
			case 'double' :
			case 'float' :
			case 'integer' :
				$result = $result !== null ? strftime('%Y-%m-%dT%H:%M:%S', $params) : strval($params);
				break;
			case 'NULL' :
				$result = 'null';
				break;
			case 'string' :
				$i = create_function('&$e, $p, $l', 'return intval(substr($e, $p, $l));');
				if (preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}$/', $params)) {
					$result = mktime($i ($params, 11, 2), $i ($params, 14, 2), $i ($params, 17, 2), $i ($params, 5, 2), $i ($params, 9, 2), $i ($params, 0, 4));
				}
				break;
			case 'object' :
				$tmp = array ();
				if (is_object($result)) {
					foreach ($params as $key => $value)
					{
						$result->$key = $value;
					}
				} else {
					$result = get_object_vars($params);
					foreach ($result as $key => $value)
					{
						if (($value = JXJson::encode($value)) !== '') {
							array_push($tmp, JXJson::encode($key).':'.$value);
						}
					};
					$result = '{'.implode(',', $tmp).'}';
				}
				break;
		}
		return $result;
	}

	// private methods, uncommented, sorry
	function _getStaticReplacement()
	{
		static $replacement = array ('find' => array (), 'replace' => array () );

		if ($replacement['find'] == array ()) {
			foreach (array_merge(range(0, 7), array (11), range(14, 31)) as $v)
			{
				$replacement['find'][] = chr($v);
				$replacement['replace'][] = "\\u00".sprintf("%02x", $v);
			}

			$replacement['find'] = array_merge(array (chr(0x5c), chr(0x2F), chr(0x22), chr(0x0d), chr(0x0c), chr(0x0a), chr(0x09), chr(0x08)), $replacement['find']);
			$replacement['replace'] = array_merge(array ('\\\\', '\\/', '\\"', '\r', '\f', '\n', '\t', '\b' ), $replacement['replace']);
		}
		return $replacement;
	}

	function _decode(& $encode, & $pos, & $slen, & $class)
	{
		switch ($encode { $pos })
		{
			case 't' :
				$result = true;
				$pos += 4;
				break;
			case 'f' :
				$result = false;
				$pos += 5;
				break;
			case 'n' :
				$result = null;
				$pos += 4;
				break;
			case '[' :
				$result = array ();
				++ $pos;
				while ($encode { $pos } !== ']')
				{
					array_push($result, JXJson::_decode($encode, $pos, $slen, $class));
					if ($encode { $pos } === ',') {
						++ $pos;
					}
				}
				++ $pos;
				break;
			case '{' :
				$result = $class ? new $class : array ();
				++ $pos;
				while ($encode { $pos } !== '}')
				{
					$tmp = JXJson::_decodeString($encode, ++$pos);
					++ $pos;
					if ($class) {
						$result-> $tmp = JXJson::_decode($encode, ++$pos, $slen, $class);
					} else {
						$result[$tmp] = JXJson::_decode($encode, ++$pos, $slen, $class);
					}
					if ($encode { $pos } === ',') {
						++ $pos;
					}
				}
				++ $pos;
				break;
			case '"' :
				switch ($encode { ++ $pos })
				{
					case '"' :
						$result = "";
						break;
					default :
						$result = JXJson::_decodeString($encode, $pos);
						break;
				}
				++ $pos;
				break;
			default :
				$result = null;
				$tmp = '';
				preg_replace('/^(\-)?([0-9]+)(\.[0-9]+)?([eE]\+[0-9]+)?/e', '$tmp = "\\1\\2\\3\\4"', substr($encode, $pos));
				if ($tmp !== '') {
					$pos += strlen($tmp);
					$nint = intval($tmp);
					$nfloat = floatval($tmp);
					$result = $nfloat == $nint ? $nint : $nfloat;
				}
				break;
		}
		return $result;
	}

	function _decodeString(& $encode, & $pos)
	{

		$replacement = JXJson::_getStaticReplacement();
		$endString = JXJson::_endString($encode, $pos, $pos);
		$result = str_replace($replacement['replace'], $replacement['find'], substr($encode, $pos, $endString));
		$pos += $endString;
		return $result;
	}

	function _endString(& $encode, $position, & $pos)
	{
		do {
			$position = strpos($encode, '"', $position +1);
		} while ($position !== false && JXJson::_slashedChar($encode, $position -1));

		if ($position === false) {
			JError::raiseWorning(500, 'Invalid JSON');
		}
		return $position - $pos;
	}

	function _slashedChar(& $encode, $position)
	{
		$pos = 0;
		while ($encode { $position-- } === '\\')
		{
			$pos++;
		}
		return $pos % 2;
	}
}
