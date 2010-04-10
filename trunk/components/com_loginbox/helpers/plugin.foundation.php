<?php
/**
* Joomla/Mambo Community Builder
* @version $Id: plugin.foundation.php 610 2006-12-13 17:33:44Z beat $
* @package Community Builder
* @subpackage plugin.foundation.php
* @author JoomlaJoe and Beat
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// ensure this file is being included by a parent file
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

/**
 * CB Functions
 */

/**
 * gets Itemid of CB profile, or by default of homepage
 * @param boolean TRUE if should return "&amp:Itemid...." instead of "&Itemid..." (with FALSE as default), === 0 if return only int
 * @return string "&Itemid=xxx"
 */
function getCBprofileItemid( $htmlspecialchars = false, $defaultItemid = true ) {
	global $_CB__Cache_ProfileItemid, $_CB_database, $_CB_framework;
	
	if ( $_CB__Cache_ProfileItemid === null ) {
	//	if( ! isset( $_REQUEST['Itemid'] ) ) {
			$_CB_database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=com_comprofiler' AND published=1 AND access " . ( $_CB_framework->myCmsGid() == 0 ? "= " : "<= " ) . (int) $_CB_framework->myCmsGid() );
			$Itemid = (int) $_CB_database->loadResult();
	//	} else {
	//		$Itemid = (int) cbGetParam( $_REQUEST, 'Itemid', 0 );
	//	}
		if ( ! $Itemid ) {		// if no user profile, try getting itemid of the default list:
			$_CB_database->setQuery("SELECT id FROM #__menu WHERE link = 'index.php?option=com_comprofiler&task=usersList' AND published=1 AND access " . ( $_CB_framework->myCmsGid() == 0 ? "= " : "<= " ) . (int) $_CB_framework->myCmsGid() );
			$Itemid = (int) $_CB_database->loadResult();
		}
		if ( ( ! $Itemid ) && $defaultItemid && ( checkJversion() != 1 ) ) {
			/** Nope, just use the homepage then. * NO: USE NONE: Homepage itemid isn't appropriate at all ! better use none !
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE menutype = 'mainmenu'"
			. "\n AND published = 1"
			. "\n ORDER BY parent, ordering"
			. "\n LIMIT 1"
			;
			$_CB_database->setQuery( $query );
			$Itemid = (int) $_CB_database->loadResult();
			*/
			$Itemid					=	0;
		}
		$_CB__Cache_ProfileItemid	=	$Itemid;
	}
	if ( $_CB__Cache_ProfileItemid ) {
		if ( is_bool( $htmlspecialchars ) ) {
			return ( $htmlspecialchars ? "&amp;" : "&") . "Itemid=" . $_CB__Cache_ProfileItemid;
		} else {
			return $_CB__Cache_ProfileItemid;
		}
	} else {
		return null;
	}
}

/**
 * Includes CB library
 * --- usage: cbimport('cb.xml.simplexml');
 *
 * @param string $path
 */
function cbimport( $lib ) {
	global $_CB_framework;
	static $imported = array();
	
	if ( ! isset( $imported[$lib] ) ) {
		$imported[$lib]	=	true;

		$liblow			=	strtolower( $lib );
		$pathAr			=	explode( '.', $liblow );
		if ( $pathAr[0] == 'language' && in_array( $pathAr[1], array( 'front', 'all' ) ) ) {
			$langPath		=	$_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/language';
			$lang			=	$_CB_framework->getCfg( 'lang' );
			if ( ! file_exists( $langPath . '/' . $lang . '/' . $lang.'.php' ) ) {
				$lang		=	'default_language';
			}
			
			include_once( $langPath . '/' . $lang . '/' . $lang . '.php' );
		} else {
			array_pop( $pathAr );
			$filepath		=	implode( '/', $pathAr ) . (count( $pathAr ) ? '/' : '' ) . $liblow . '.php';
	//echo "trying to include=<pre>";print_r($_CB_framework->getCfg('absolute_path') . '/administrator/components/com_comprofiler/library/' . $filepath);echo "</pre><hr>";
			require_once( $_CB_framework->getCfg('absolute_path') . '/administrator/components/com_comprofiler/library/' . $filepath );
		}
	}
}

/**
 * Does the opposite of htmlspecialchars()
 *
 * @param  string  $text
 * @return string
 */
function cbUnHtmlspecialchars( $text ) {
	return str_replace( array( "&amp;", "&quot;", "&#039;", "&lt;", "&gt;" ), array( "&", "\"", "'", "<", ">" ), $text );
}
/**
* String based find and replace that is case insensitive and works on php4 too
* same as PHP5 str_ireplace()
*
* @param  string  $search   value to look for
* @param  string  $replace  value to replace with
* @param  string  $subject  text to be searched
* @return string            with text searched and replaced
*/
function cbstr_ireplace( $search, $replace, $subject ) {
	if ( function_exists('str_ireplace') ) {
		return str_ireplace($search,$replace,$subject);		// php 5 only
	}
	$srchlen = strlen($search);    // lenght of searched string
	$result  = "";

	while ( true == ( $find = stristr( $subject, $search ) ) ) {	// find $search text in $subject - case insensitiv
		$srchtxt = substr($find,0,$srchlen);    			// get new case-sensitively-correct search text
		$pos	 = strpos( $subject, $srchtxt );			// stripos is php5 only...
		$result	 .= substr( $subject, 0, $pos ) . $replace;	// replace found case insensitive search text with $replace
		$subject = substr( $subject, $pos + $srchlen );
	}
	return $result . $subject;
}

/**
 * Translates text strings from CB and core cms ('_UE_....') into current language
 *
 * @param  string  $text
 * @return string
 */
function getLangDefinition($text) {
	// check for '::' as a workaround of bug #42770 in PHP 5.2.4 with optimizers:
	if ( ( strpos( $text, '::' ) === false ) && defined( $text ) ) {
		$returnText		=	constant( $text ); 
	} else {
		$returnText		=	$text;
	}
	return $returnText;
}

/**
 * Check Mambo/Joomla/others version for API
 *
 * @param  string  $info  'api', 'product', 'release'
 * @return mixed          'api'     : API version: =0 = mambo 4.5.0-4.5.3+Joomla 1.0.x, =1 = Joomla! 1.1, >1 newever ones: maybe compatible, <0: -1: Mambo 4.6
 *                        'product' : product name
 *                        'release' : php-style release number
 */
function checkJversion( $info = 'api' ) {
	static $version						=	array();
	
	if ( isset( $version[$info] ) ) {
		return $version[$info];
	}

	global $_VERSION;
	if ( $_VERSION ) {
		$VO								=	$_VERSION;
	} elseif ( class_exists( 'JVersion' ) ) {
		$VO								=	new JVersion();
	} else {
		trigger_error( 'Unable to determine CMS version.', E_USER_ERROR );
		die();
	}

	switch ( $info ) {
		case 'api':
			if ( $VO->PRODUCT == "Mambo" ) {
				if ( strncasecmp( $VO->RELEASE, "4.6", 3 ) < 0 ) {
					$version[$info]		=	0;
				} else {
					$version[$info]		=	-1;
				}
			} elseif ( $VO->PRODUCT == "Elxis" ) {
				$version[$info]			=	0;
			} elseif ( $VO->PRODUCT == "MiaCMS" ) {
				$version[$info]			=	-1;
			} elseif ( ($VO->PRODUCT == "Joomla!") || ($VO->PRODUCT == "Accessible Joomla!") ) {
				if (strncasecmp($VO->RELEASE, "1.0", 3)) {
					$version[$info]		=	1;
				} else {
					$version[$info]		=	0;
				}
			} else {
				$version[$info]			=	0;
			}
			
			break;

		case 'product':
			$version[$info]				=	$VO->PRODUCT;
			break;
		case 'release':
			$version[$info]				=	$VO->RELEASE;
			break;
		case 'dev_level':
			$version[$info]				=	$VO->DEV_LEVEL;
			break;
		default:
			break;
	}
	return $version[$info];
}

/**
 * Utility function to return a value from a named array or a specified default.
 * TO CONTRARY OF MAMBO AND JOOMLA mos Get Param:
 * 1) DOES NOT MODIFY ORIGINAL ARRAY
 * 2) Does sanitize ints
 * 3) Does return default array() for a default value array(0) which indicates sanitizing an array of ints.
 *
 * @param array A named array
 * @param string The key to search for
 * @param mixed The default value to give if no key found
 * @param int An options mask: _MOS_NOTRIM prevents trim, _MOS_ALLOWHTML allows safe html, _MOS_ALLOWRAW allows raw input
 */
define( "_CB_NOTRIM", 0x0001 );
//define( "_MOS_ALLOWHTML", 0x0002 );
define( "_CB_ALLOWRAW", 0x0004 );
function cbGetParam( &$arr, $name, $def=null, $mask=0 ) {	
	static $noHtmlFilter	=	null;

	if ( isset( $arr[$name] ) ) {
        if ( is_array( $arr[$name] ) ) {
        	$ret			=	array();
        	foreach ( array_keys( $arr[$name] ) as $k ) {
        		$ret[$k]	=	cbGetParam( $arr[$name], $k, $def, $mask);
        		if ( $def === array( 0 ) ) {
        			$ret[$k] =	(int) $ret[$k];
        		}
        	}
        } else {
			$ret			=	$arr[$name];
			if ( is_string( $ret ) ) {
				if ( ! ( $mask & _CB_NOTRIM ) ) {
					$ret	=	trim( $ret );
				}
				if ( ! ( $mask & _CB_ALLOWRAW ) ) {
					if ( is_null( $noHtmlFilter ) ) {
						cbimport( 'phpinputfilter.inputfilter' );
						$noHtmlFilter = new CBInputFilter( /* $tags, $attr, $tag_method, $attr_method, $xss_auto */ );
					}
					$ret	=	$noHtmlFilter->process( $ret );
				}
				if ( is_int( $def ) ) {
					$ret	=	(int) $ret;
				} elseif ( is_float( $def ) ) {
					$ret	=	(float) $ret;
				} elseif ( !  get_magic_quotes_gpc() ) {
					$ret	=	addslashes( $ret );
				}
			}
        }
		return $ret;
	} elseif ( false !== ( $firstSeparator = strpos( $name, '[' )  ) ) {
		// html-input-name-encoded array selection, e.g. a[b][c]
		$indexes			=	null;
		$mainArrName		=	substr( $name, 0, $firstSeparator );
		$count				=	preg_match_all( '/\\[([^\\[\\]]+)\\]/', substr( $name, $firstSeparator ), $indexes );
		if ( isset( $arr[$mainArrName] ) && ( $count > 0 ) ) {
			$a				=	$arr[$mainArrName];
			for ( $i = 0; $i < ( $count - 1 ); $i++ ) {
				if ( ! isset( $a[$indexes[1][$i]] ) ) {
					$a		=	null;
					break;
				}
				$a			=	$a[$indexes[1][$i]];
			}
		} else {
			$a				=	null;
		}
		if ( $a !== null ) {
			return cbGetParam( $a, $indexes[1][$i], $def, $mask );
		}
	}
	if ( $def === array( 0 ) ) {
		return array();
	}
	return $def;
}

/**
 * Redirects browser to new $url with a $message .
 * No return from this function !
 *
 * @param  string  $url
 * @param  string  $message
 * @param  string  $messageType  'message', 'error'
 */
function cbRedirect( $url, $message = '', $messageType = 'message' ) {
	global $_CB_framework, $_CB_database;

	if ( ( $_CB_framework->getCfg( 'debug' ) > 0 ) && ( ob_get_length() || ( $_CB_framework->getCfg( 'debug' ) > 1 ) ) ) {
		$outputBufferLength		=	ob_get_length();
		echo '<br /><br /><strong>Site Debug mode: CB redirection';
		if ( $message ) {
			echo ' with ' . $messageType . ' "' . $message . '"';
		}
		if ( $outputBufferLength ) {
			echo ' <u>without empty output</u>';
		}
		echo "<br /><p><em>During it's normal operations Community Builder often redirects you between pages and this causes potentially interesting debug information to be missed. "
			. "When your site is in debug mode (global joomla/mambo config is site debug ON), some of these automatic redirects are disabled. "
			. "This is a normal feature of the debug mode and does not directly mean that you have any problems.</em></p>"
			. '</strong>Click this link to proceed with the next page (in non-debug mode this is automatic): ';
		echo '<a href="' . $url . '">' . $url . '</a><br /><br /><hr />';

		echo $_CB_database->_db->_ticker . ' queries executed'
			. '<pre>';
 		foreach ( $_CB_database->_db->_log as $k => $sql ) {
 			echo $k + 1 . "\n" . htmlspecialchars( $sql ) . '<hr />';
		}
		echo '</hr>'
			. '</hr>POST: ';
		var_export( $_POST );
		echo '</pre>';
		die();
	} else {
		$_CB_framework->redirect( $url, $message, $messageType );
	}
}

/**
* Returns full path to template directory
* @param int  DEPRECIATED: info for backwards-compatibility: user interface : 1: frontend, 2: backend (not used anymore)
* @return template directory path with trailing '/'
*/
function selectTemplate( ) {
	global $_CB_framework;
	
	$templatedir = 'default';//modified by recly

	return $_CB_framework->getCfg( 'live_site' ) . '/components/com_comprofiler/plugin/templates/' . $templatedir . '/';
}



function cbSpoofString( $string = null, $secret = null ) {
	global $_CB_framework;

	$date			=	date( 'dmY' );
	if ( $string === null ) {
		$salt		=	array();
		$salt[0]	=	mt_rand( 1, 2147483647 );
		$salt[1]	=	mt_rand( 1, 2147483647 );		// 2 * 31 bits random
	} else {
		$salt		=	sscanf( $string, 'cbm_%08x_%08x' );
		if ( $string != sprintf( 'cbm_%08x_%08x_%s', $salt[0], $salt[1], md5( $salt[0] . $date . $_CB_framework->getUi() . $_CB_framework->getCfg( 'db' ) . $_CB_framework->getCfg('secret') . $secret . $salt[1] ) ) ) {
			$date	=	date( 'dmY', time() - 64800 );	// 18 extra-hours of grace after midnight.
		}
	}
	return sprintf( 'cbm_%08x_%08x_%s', $salt[0], $salt[1], md5( $salt[0] . $date . $_CB_framework->getUi() . $_CB_framework->getCfg( 'db' ) . $_CB_framework->getCfg('secret') . $secret . $salt[1] ) );
}
function cbSpoofField() {
	return 'cbsecuritym3';
}
/**
 * Computes and returns an antifspoofing additional input tag
 *
 * @return string "<input type="hidden...\n" tag
 */
function cbGetSpoofInputTag( $secret = null, $cbSpoofString = null ) {
	if ( $cbSpoofString === null ) {
		$cbSpoofString		=	cbSpoofString( null, $secret );
	}
	return "<input type=\"hidden\" name=\"" . cbSpoofField() . "\" value=\"" .  $cbSpoofString . "\" />\n";
}

function _cbjosSpoofCheck($array, $badStrings) {
	foreach ($array as $v) {
		foreach ($badStrings as $v2) {
			if (is_array($v)) {
				_cbjosSpoofCheck($v, $badStrings);
			} else if (strpos( $v, $v2 ) !== false) {
				header( "HTTP/1.0 403 Forbidden" );
				exit( _UE_NOT_AUTHORIZED );
			}
		}
	}
}
/**
 * Checks spoof value and other spoofing and injection tricks
 *
 * @param  string   $secret   extra-hashing value for this particular spoofCheck
 * @param  string   $var      'POST', 'GET', 'REQUEST'
 * @param  int      $mode     1: exits with script to display error and go back, 2: returns true or false.
 * @return boolean  or exit   If $mode = 2 : returns false if session expired.
 */
function cbSpoofCheck( $secret = null, $var = 'POST', $mode = 1 ) {
	global $_POST, $_GET, $_REQUEST;

	if ( _CB_SPOOFCHECKS ) {
		if ( $var == 'GET' ) {
			$validateValue 	=	cbGetParam( $_GET,     cbSpoofField(), '' );
		} elseif ( $var == 'REQUEST' ) {
			$validateValue 	=	cbGetParam( $_REQUEST, cbSpoofField(), '' );
		} else {
			$validateValue 	=	cbGetParam( $_POST,    cbSpoofField(), '' );
		}
		if ( ( ! $validateValue ) || ( $validateValue != cbSpoofString( $validateValue, $secret ) ) ) {
			if ( $mode == 2 ) {
				return false;
			}
			_cbExpiredSessionJSterminate( 200 );
			exit;
		}
	}
	// First, make sure the form was posted from a browser.
	// For basic web-forms, we don't care about anything
	// other than requests from a browser:
	if (!isset( $_SERVER['HTTP_USER_AGENT'] )) {
		header( 'HTTP/1.0 403 Forbidden' );
		exit( _UE_NOT_AUTHORIZED );
	}

	// Make sure the form was indeed POST'ed:
	//  (requires your html form to use: action="post")
	if (!$_SERVER['REQUEST_METHOD'] == 'POST' ) {
		header( 'HTTP/1.0 403 Forbidden' );
		exit( _UE_NOT_AUTHORIZED );
	}

	// Attempt to defend against header injections:
	$badStrings = array(
		'Content-Type:',
		'MIME-Version:',
		'Content-Transfer-Encoding:',
		'bcc:',
		'cc:'
	);

	// Loop through each POST'ed value and test if it contains
	// one of the $badStrings:
	foreach ($_POST as $v){
		foreach ($badStrings as $v2) {
			if (is_array($v)) {
				_cbjosSpoofCheck($v, $badStrings);
			} else if (strpos( $v, $v2 ) !== false) {
				header( "HTTP/1.0 403 Forbidden" );
				exit( _UE_NOT_AUTHORIZED );
			}
		}
	}

	// Made it past spammer test, free up some memory
	// and continue rest of script:
	unset( $v, $v2, $badStrings );
	return true;
}
function _cbExpiredSessionJSterminate( $code = 403 ) {
	if ( $code == 403 ) {
		header( 'HTTP/1.0 403 Forbidden' );
	}
	echo "<script type=\"text/javascript\">alert('" . addslashes( _UE_SESSION_EXPIRED . ' ' . _UE_PLEASE_REFRESH ) . "'); window.history.go(-1);</script> \n";
	exit;
}

/**
 * CB Classes
 */

/**
* Parameters handler
* @package Joomla/Mambo Community Builder
*/
class cbParamsBase {
	/** @var object */
	var $_params = null;
	/** @var string The raw params string */
	var $_raw = null;
/**
* Constructor
* @param string The raw parms text
* @param string Path to the xml setup file
* @param string The type of setup file
*/
	function cbParamsBase( $paramsValues ) {
	    $this->_params = $this->parse( $paramsValues );
	    $this->_raw = $paramsValues;
	}
/**
* Loads from the plugins database.
* @param string The plugin element name
* @return boolean true: could load, false: query error.
*/
	function loadFromDB( $element ) {
		global $_CB_database;
		
	    $_CB_database->setQuery("SELECT params FROM `#__comprofiler_plugin` WHERE element = '" . $_CB_database->getEscaped( $element ) . "'" );
	    $text = $_CB_database->loadResult();
	    $this->_params = $this->parse( $text );
	    $this->_raw = $text;
	    return ( $text !== null );
	}
/**
* @param string The name of the param
* @param string The value of the parameter
* @return string The set value
*/
	function set( $key, $value='' ) {
		$this->_params->$key = $value;
		return $value;
	}
/**
* Sets a default value if not alreay assigned
* @param string The name of the param
* @param string The value of the parameter
* @return string The set value
*/
	function def( $key, $value='' ) {
	    return $this->set( $key, $this->get( $key, $value ) );
	}
/**
* @param string The name of the param
* @param mixed The default value if not found
* @return string
*/
	function get( $key, $default=null ) {
	    if ( isset( $this->_params->$key ) ) {
	    	if (is_array( $default ) ) {
	    		return explode( '|*|', $this->_params->$key );
	    	} else {
		        return $this->_params->$key;
	    	}
		} else {
		    return $default;
		}
	}
/**
* Parse an .ini string, based on phpDocumentor phpDocumentor_parse_ini_file function
* @param mixed The ini string or array of lines
* @param boolean add an associative index for each section [in brackets]
* @return object
*/
	function parse( $txt, $process_sections = false, $asArray = false ) {
		if (is_string( $txt )) {
			$lines = explode( "\n", $txt );
		} else if (is_array( $txt )) {
			$lines = $txt;
		} else {
			$lines = array();
		}
		$obj = $asArray ? array() : new stdClass();

		$sec_name = '';
		$unparsed = 0;
		if (!$lines) {
			return $obj;
		}
		foreach ($lines as $line) {
			// ignore comments
			if ($line && $line[0] == ';') {
				continue;
			}
			$line = trim( $line );

			if ($line == '') {
				continue;
			}
			if ($line && $line[0] == '[' && $line[strlen($line) - 1] == ']') {
				$sec_name = substr( $line, 1, strlen($line) - 2 );
				if ($process_sections) {
					if ($asArray) {
						$obj[$sec_name] = array();
					} else {
						$obj->$sec_name = new stdClass();
					}
				}
			} else {
				if ( false !== ( $pos = strpos( $line, '=' ) ) ) {
					$property = trim( substr( $line, 0, $pos ) );

					if (substr($property, 0, 1) == '"' && substr($property, -1) == '"') {
						$property = stripcslashes(substr($property,1,count($property) - 2));
					}
					$value = trim( substr( $line, $pos + 1 ) );
					if ($value == 'false') {
						$value = false;
					}
					if ($value == 'true') {
						$value = true;
					}
					if (substr( $value, 0, 1 ) == '"' && substr( $value, -1 ) == '"') {
						$value = stripcslashes( substr( $value, 1, count( $value ) - 2 ) );
					}

					if ($process_sections) {
						$value = str_replace( array( '\n', '\r' ), array( "\n", "\r" ), $value );
						if ($sec_name != '') {
							if ($asArray) {
								$obj[$sec_name][$property] = $value;
							} else {
								$obj->$sec_name->$property = $value;
							}
						} else {
							if ($asArray) {
								$obj[$property] = $value;
							} else {
								$obj->$property = $value;
							}
						}
					} else {
						$value = str_replace( array( '\n', '\r' ), array( "\n", "\r" ), $value );
						if ($asArray) {
							$obj[$property] = $value;
						} else {
							$obj->$property = $value;
						}
					}
				} else {
					if ($line && trim($line[0]) == ';') {
						continue;
					}
					if ($process_sections) {
						$property = '__invalid' . $unparsed++ . '__';
						if ($process_sections) {
							if ($sec_name != '') {
								if ($asArray) {
									$obj[$sec_name][$property] = trim($line);
								} else {
									$obj->$sec_name->$property = trim($line);
								}
							} else {
								if ($asArray) {
									$obj[$property] = trim($line);
								} else {
									$obj->$property = trim($line);
								}
							}
						} else {
							if ($asArray) {
								$obj[$property] = trim($line);
							} else {
								$obj->$property = trim($line);
							}
						}
					}
				}
			}
		}
		return $obj;
	}
}

/**
 * Lightweight CB user class read-only for use outside CB
 * 
 * @author Beat
 * @license GPL v2
 */
class CBuser {
	var $_cbuser;
	/** Db
	 * @var CBdatabase */
	var $_db;
	var $_cmsUserTable		=	'#__users';
	var $_cmsUserTableKey	=	'id';
	/**
	 * Constructor
	 */
	function CBuser( ) {
		global $_CB_database, $database;
		if ( $_CB_database ) {
			$this->_db	=&	$_CB_database;
		} else {
			$this->_db	=&	$database;
		}
	}
	function & getInstance( $userId ) {
		static $instances	=	array();

		$userIdInt			=	(int) $userId;
		if ( $userIdInt ) {
			if ( ! isset( $instances[$userIdInt] ) ) {
				$instances[$userIdInt]	=&	new CBuser();
				$instances[$userIdInt]->load( $userId );
			}
			return $instances[$userIdInt];
		} else {
			$cbUser			=	new CBuser();
			return $cbUser;
		}
	}
	function load( $cbUserId ) {
		$query = "SELECT *"
		. "\n FROM #__comprofiler c, " . $this->_cmsUserTable . " u"
		. "\n WHERE c.id = u." . $this->_cmsUserTableKey
		. " AND c.id = " . (int) $cbUserId
		;
		$this->_db->setQuery( $query );
		return $this->_db->loadObject( $this->_cbuser );
	}
	function loadCmsUser( $cmsUserId ) {
		return $this->load( $cmsUserId );	// for now it's the same but use right one please
	}
	function loadCbRow( &$row ) {
		$this->_cbuser	=&	$row;
	}
	function & getUserData( ) {
		return $this->_cbuser;
	}
	/**
	 * DO NOT USE: This function will disapear in favor of a new one in very next minor release.
	 *
	 * @param unknown_type $show_avatar
	 * @return unknown
	 */
	function avatarFilePath( $show_avatar = 2 ) {
		global $_CB_framework;

		$oValue				=	null;
		if ( $this->_cbuser ) {
			$avatar			=	$this->_cbuser->avatar;
			$avatarapproved	=	$this->_cbuser->avatarapproved;
			
			$absolute_path	=	$_CB_framework->getCfg( 'absolute_path' );
			$live_site		=	$_CB_framework->getCfg( 'live_site' );
			
			if ( $avatarapproved == 0 ) {
				return selectTemplate() . 'images/avatar/tnpending_n.png';
			} elseif ( ( $avatar == '' ) && $avatarapproved == 1 ) {
				$oValue		=	null;
			} elseif ( strpos( $avatar, 'gallery/' ) === false ) {
				$oValue		=	'images/comprofiler/tn' . $avatar;
			} else {
				$oValue		=	'images/comprofiler/' . $avatar;
			}
			if ( ! is_file( $absolute_path . '/' . $oValue ) ) {
				$oValue		=	null;
			}

			if ( ( ! $oValue ) && ( $show_avatar == 2 ) ) {
				return selectTemplate() . 'images/avatar/tnnophoto_n.png';
			}
		}
		if ( $oValue ) {
			$oValue			=	$live_site . '/' . $oValue;
		}
		return $oValue;
	}
	/**
	 * Replaces [fieldname] by the content of the user row (except for [password])
	 *
	 * @param  string         $msg
	 * @param  boolean|array  $htmlspecialchars  on replaced values only: FALSE : no htmlspecialchars, TRUE: do htmlspecialchars, ARRAY: callback method
	 * @param  boolean        $menuStats
	 * @param  array          $extraStrings
	 * @param  boolean        $translateLanguage  on $msg only
	 * @return string
	 */
	function replaceUserVars( $msg, $htmlspecialchars = true, $menuStats = true, $extraStrings = array(), $translateLanguage = true ){
		if ( $translateLanguage ) {
			$msg	=	getLangDefinition( $msg );
		}
		if ( strpos( $msg, '[' ) === false ) {
			return $msg;
		}
		// $msg		=	$this->_evaluateTabs( $msg );
		$msg		=	$this->_evaluateIfs( $msg );

		$row		=&	$this->_cbuser;
		if ( is_object( $row ) ) {
			$array		=	get_object_vars( $row );
			foreach( $array AS $k => $v ) {
				if( ( ! is_object( $v ) ) && ( ! is_array( $v ) ) ) {
					if ( ! ( ( strtolower( $k ) == "password" ) && ( strlen($v) >= 32 ) ) ) {
						/* do not translate content ! :
						$vTranslated		=	( $translateLanguage ? getLangDefinition( $v ) : $v );
						if ( is_array( $htmlspecialchars ) ) {
							$vTranslated	=	call_user_func_array( $htmlspecialchars, array( $vTranslated ) );
						}
						$msg = cbstr_ireplace("[".$k."]", $htmlspecialchars === true ? htmlspecialchars( $vTranslated ) : $vTranslated, $msg );
						*/
						if ( is_array( $htmlspecialchars ) ) {
							$v	=	call_user_func_array( $htmlspecialchars, array( $v ) );
						}
						$msg	=	cbstr_ireplace("[".$k."]", $htmlspecialchars === true ? htmlspecialchars( $v ) : $v, $msg );
					}
				}
			}
		}
		foreach( $extraStrings AS $k => $v) {
			if( ( ! is_object( $v ) ) && ( ! is_array( $v ) ) ) {
				/* do not translate content ! :
				$vTranslated			=	( $translateLanguage ? getLangDefinition( $v ) : $v );
				if ( is_array( $htmlspecialchars ) ) {
					$vTranslated		=	call_user_func_array( $htmlspecialchars, array( $vTranslated ) );
				}
				$msg = cbstr_ireplace("[".$k."]", $htmlspecialchars === true ? htmlspecialchars( $vTranslated ) : $vTranslated, $msg );
				*/
				if ( is_array( $htmlspecialchars ) ) {
					$v		=	call_user_func_array( $htmlspecialchars, array( $v ) );
				}
				$msg		=	cbstr_ireplace("[".$k."]", $htmlspecialchars === true ? htmlspecialchars( $v ) : $v, $msg );
			}
		}
		if ( $menuStats ) {
			// find [menu .... : path1:path2:path3 /] and replace with HTML code if menu active, otherwise remove it all
			$msg = $this->_replacePragma( $msg, $row, 'menu', 'menuBar' );
			// no more [status ] as they are standard fields !		$msg = $this->_replacePragma( $msg, $row, 'status', 'menuList' );
		}	
		$msg = str_replace( array( "&91;", "&93;" ), array( "[", "]" ), $msg );
		return $msg;
	}

	/**
	 * INTERNAL PRIVATE METHODS:
	 */

	/**
	 * Explodes a text like: href="text1" img="text'it" alt='alt"joe'   into an array with defined keys and values, but null for missing ones.
	 * @access private
	 *
	 * @param string $text	text to parse
	 * @param array of string $validTags	valid tag names
	 * @return array of string	array( "tagname" => "tagvalue", "notsetTagname" => null)
	 */
	function _explodeTags( $text, $validTags ) {
		$text = trim($text);
		$result = array();
		foreach ($validTags as $tagName) {
			$result[$tagName] = null;
		}
		while ( $text != "" ) {
			$posEqual = strpos( $text, "=" );
			if ( $posEqual !== false ) {
				$tagName	= trim( substr( $text, 0, $posEqual ) );
				$text		= trim( substr( $text, $posEqual + 1 ) );
				$quoteMark	= substr( $text, 0, 1);
				$posEndQuote	= strpos( $text, $quoteMark, 1 );
				$tagValue	= false;
				if ( ($posEndQuote !== false) && in_array( $quoteMark, array( "'", '"' ) ) ) {
					$tagValue	= substr( $text, 1, $posEndQuote - 1 );
					$text		= trim( substr( $text, $posEndQuote + 1 ) );
					if ( in_array( $tagName, $validTags ) ) {
						$result[$tagName] = $tagValue;
					}
				} else {
					break;
				}
			} else {
				break;
			}
		}
		return $result;
	}
	/**
	 * Replaces "$1" in $text with $cbMenuTagsArray[$cbMenuTagsArrayKey] if non-null but doesn't tag if empty
	 * otherwise replace by $cbMenu[$cbMenuKey] if set and non-empty
	 * @access private
	 *
	 * @param array of string	$cbMenuTagsArray
	 * @param string			$cbMenuTagsArrayKey
	 * @param array of string	$cbMenu
	 * @param string			$cbMenuKey
	 * @param string			$text
	 * @return string
	 */
	function _placeTags( $cbMenuTagsArray, $cbMenuTagsArrayKey, $cbMenu, $cbMenuKey, $text ) {
		if ( $cbMenuTagsArray[$cbMenuTagsArrayKey] !== null) {
			if ( $cbMenuTagsArray[$cbMenuTagsArrayKey] != "" ) {
				return str_replace( '$1', /*allow tags! htmlspecialchars */ ( $cbMenuTagsArray[$cbMenuTagsArrayKey] ), $text );
			} else {
				return null;
			}
		} elseif ( isset($cbMenu[$cbMenuKey]) && ( $cbMenu[$cbMenuKey] !== null ) && ( $cbMenu[$cbMenuKey] !== "" ) ) {
			return str_replace( '$1', $cbMenu[$cbMenuKey], $text );
		} else {
			return null;
		}
	}
	/**
	 * Replaces complex pragmas
	 *
	 * @param  string    $msg
	 * @param  stdClass  $row
	 * @param  string    $pragma           the tag between the brackets "[$pragma]"
	 * @param  string    $position       the CB menu position
	 * @param  boolean   $htmlspecialcharsEncoded  True if menu tags should remain htmlspecialchared
	 * @return unknown
	 */
	function _replacePragma( $msg, $row, $pragma, $position, $htmlspecialcharsEncoded = true ) {
		global $_PLUGINS;
	
		$msgResult = "";
		$pragmaLen = strlen( $pragma );
	    while ( ( $foundPosBegin = strpos( $msg, "[" . $pragma ) ) !== false ) {
	   		$foundPosEnd = strpos( $msg, "[/" . $pragma . "]", $foundPosBegin + $pragmaLen + 1 );
			if ( $foundPosEnd !== false ) {
				$foundPosTagEnd = strpos( $msg, "]", $foundPosBegin + $pragmaLen + 1 );
				if ( ( $foundPosTagEnd !== false ) && ( $foundPosTagEnd < $foundPosEnd ) ) {
					// found [menu .... : $cbMenuTreePath /] : check to see if $cbMenuTreePath is in current menu:
			    	$cbMenuTreePath = substr( $msg, $foundPosTagEnd + 1, $foundPosEnd - ($foundPosTagEnd + 1) );
			    	$cbMenuTreePathArray = explode( ":", $cbMenuTreePath );
		    		$pm = $_PLUGINS->getMenus();
		    		$pmc=count($pm);
					for ( $i=0; $i<$pmc; $i++ ) {
						if ( $pm[$i]['position'] == $position ) {
							$arrayPos = $pm[$i]['arrayPos'];
							foreach ( $cbMenuTreePathArray as $menuName ) {
								if ( key( $arrayPos ) == trim( $menuName ) ) {
									$arrayPos = $arrayPos[key( $arrayPos )];
								} else {
									// not matching full menu path: check next:
									break;
								}
							}
							if ( !is_array( $arrayPos ) ) {
								// came to end of path: match found: stop searching:
								break;
							}
						}
					}
					// replace by nothing in case not found:
					$replaceString = "";
					if ( $i < $pmc ) {
						// found: replace with menu item: first check for qualifiers for special changes:
			    		$cbMenuTags = substr( $msg, $foundPosBegin + $pragmaLen + 1, $foundPosTagEnd - ($foundPosBegin + $pragmaLen + 1) );
			    		if ($htmlspecialcharsEncoded) {
			    			$cbMenuTags = cbUnHtmlspecialchars( $cbMenuTags );
			    		}
						$cbMenuTagsArray = $this->_explodeTags( $cbMenuTags, array( "href", "target", "title", "class", "style", "img", "caption") );
						
						$replaceString .= $this->_placeTags( $cbMenuTagsArray, 'href', $pm[$i], 'url', '<a href="$1"'
													. $this->_placeTags( $cbMenuTagsArray, 'target', $pm[$i], 'target', ' target="$1"' )
													. $this->_placeTags( $cbMenuTagsArray, 'title', $pm[$i], 'tooltip', ' title="$1"' )
													. $this->_placeTags( $cbMenuTagsArray, 'class', $pm[$i], 'undef', ' class="$1"' )
													. $this->_placeTags( $cbMenuTagsArray, 'style', $pm[$i], 'undef', ' style="$1"' )
													. ">"
												  );
						$replaceString .= $this->_placeTags( $cbMenuTagsArray, 'img', $pm[$i], 'img', '$1' );
						$replaceString .= $this->_placeTags( $cbMenuTagsArray, 'caption', $pm[$i], 'caption', '$1' );
						$replaceString .= $this->_placeTags( $cbMenuTagsArray, 'href', $pm[$i], 'url', '</a>' );
						
								/*	$this->menuBar->addObjectItem( $pm[$i]['arrayPos'], $pm[$i]['caption'],
									isset($pm[$i]['url'])	?$pm[$i]['url']		:"",
									isset($pm[$i]['target'])?$pm[$i]['target']	:"",
									isset($pm[$i]['img'])	?$pm[$i]['img']		:null,
									isset($pm[$i]['alt'])	?$pm[$i]['alt']		:null,
									isset($pm[$i]['tooltip'])?$pm[$i]['tooltip']:null,
									isset($pm[$i]['keystroke'])?$pm[$i]['keystroke']:null );
								*/
					}
					$msgResult .= substr( $msg, 0, $foundPosBegin );
					$msgResult .= $replaceString;
					$msg		= substr( $msg, $foundPosEnd + $pragmaLen + 3 );
			//        $srchtxt = "[menu:".$cbMenuTreePath."]";    // get new search text  
			//        $msg = str_replace($srchtxt,$replaceString,$msg);    // replace founded case insensitive search text with $replace 
				} else {
					break;
				}
	    	} else {
	    		break;
	    	}
	    }
	   	return $msgResult . $msg;
	}

	function _evaluateIfs( $input ) {
//		$regex		=	"#\[if ([^\]]+)\](.*?)\[/if\]#s";
//		$regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#s';
		$regex = '#\[if( +[^\]]+)]((?:[^[]|\[(?!/?if[^\]]*])|(?R))+)\[/if]#';
		if ( is_array( $input ) ) {
			$regex2				=	'# +(?:(&&|and|\|\||or|) +)?([^=<!> ]+) *(=|<|>|>=|<=|<>|!=) *"([^"]*)"#';
			$conditions			=	null;
			if (preg_match_all( $regex2, $input[1], $conditions ) ) {
				$resultsIdx		=	0;
				$results		=	array( $resultsIdx => true );
				for ( $i = 0, $n = count( $conditions[0] ); $i < $n; $i++ ) {
					$operator	=	$conditions[1][$i];
					$field		=	$conditions[2][$i];
					$compare	=	$conditions[3][$i];
					$value		=	$conditions[4][$i];
					if ( $field && isset( $this->_cbuser->$field ) ) {
						$var	=	$this->_cbuser->$field;
					} else {
						$var	=	null;
					}
					switch ( $compare ) {
						case '=':
							$r	=	( $var == $value );
							break;
						case '<':
							$r	=	( $var < $value );
							break;
						case '>':
							$r	=	( $var > $value );
							break;
						case '>=':
							$r	=	( $var >= $value );
							break;
						case '<=':
							$r	=	( $var <= $value );
							break;
						case '<>':
						case '!=':
							$r	=	( $var != $value );
							break;
					}
					if ( in_array( $operator, array( 'or', '||' ) ) ) {
						$resultsIdx++;
						$results[++$resultsIdx]	=	true;
					}
					// combine and:
					$results[$resultsIdx]	=	$results[$resultsIdx] && $r;
				}
				// combine or:
				$r				=	false;
				foreach ( $results as $rr ) {
					$r			=	$r || $rr;
				}
				$input		=	( $r ? $input[2] : '' );
			} else {
				$input		=	'';
			}
		}
		return preg_replace_callback( $regex, array( $this, '_evaluateIfs' ), $input );
	}
/*
	function _evaluateTabs( $input ) {
//		$regex		=	"#\[if ([^\]]+)\](.*?)\[/if\]#s";
//		$regex = '#\[indent]((?:[^[]|\[(?!/?indent])|(?R))+)\[/indent]#s';
		$regex = '#\[cbtab +([^\]]+)]#';
		if ( is_array( $input ) ) {
			$tabNameId			=	$input[1];


			$regex2				=	'# +(?:(&&|and|\|\||or|) +)?([^=<!> ]+) *(=|<|>|>=|<=|<>|!=) *"([^"]*)"#';
			$conditions			=	null;
			if (preg_match_all( $regex2, $input[1], $conditions ) ) {
				$resultsIdx		=	0;
				$results		=	array( $resultsIdx => true );
				for ( $i = 0, $n = count( $conditions[0] ); $i < $n; $i++ ) {
					$operator	=	$conditions[1][$i];
					$field		=	$conditions[2][$i];
					$compare	=	$conditions[3][$i];
					$value		=	$conditions[4][$i];
					if ( $field && isset( $this->_cbuser->$field ) ) {
						$var	=	$this->_cbuser->$field;
					}
					switch ( $compare ) {
						case '=':
							$r	=	( $var == $value );
							break;
						case '<':
							$r	=	( $var < $value );
							break;
						case '>':
							$r	=	( $var > $value );
							break;
						case '>=':
							$r	=	( $var >= $value );
							break;
						case '<=':
							$r	=	( $var <= $value );
							break;
						case '<>':
						case '!=':
							$r	=	( $var != $value );
							break;
					}
					if ( in_array( $operator, array( 'or', '||' ) ) ) {
						$resultsIdx++;
						$results[++$resultsIdx]	=	true;
					}
					// combine and:
					$results[$resultsIdx]	=	$results[$resultsIdx] && $r;
				}
				// combine or:
				$r				=	false;
				foreach ( $results as $rr ) {
					$r			=	$r || $rr;
				}
				$input		=	( $r ? $input[2] : '' );
			} else {
				$input		=	'';
			}
		}
		return preg_replace_callback( $regex, array( $this, '_evaluateTabs' ), $input );
	}
*/
}

/**
 * CB Framework class for Mambo 4.5.2+
 * @author Beat
 * @license GPL v2
 */
class CBframework {
	/** Base framework class
	 * @var mosMainFrame */
	var $_baseFramework;
	var $_cmsDatabase;
	var $_ui						=	1;
	var $_now;
	var $_myId;
	var $_myUsername;
	var $_myUserType;
	var $_myCmsGid;
	var $_myLanguage				=	null;
	/** php gacl instance:
	 * @var gacl_api $acl */
	var $acl;
	var $_aclParams					=	array();
	var $_cmsSefFunction;
	var $_sefFuncHtmlEnt;
	var $_cmsUserClassName;
	var $_cmsUserNeedsDb;
	var $_cmsRedirectFunction;
	var $_cbUrlRouting;			//	= array( 'option' => 'com_comprofiler' )
	var $_outputCharset;
	var $_editorDisplay;

	var $_redirectUrl				=	null;
	var $_redirectMessage			=	null;
	var $_redirectMessageType		=	'message';

	function CBframework( &$baseFramework, &$database, &$acl, &$aclParams, $cmsSefFunction, $sefFuncHtmlEnt, $cmsUserClassName, $cmsUserNeedsDb, $cmsRedirectFunction, $myId, $myUsername, $myUserType, $myCmsGid, $myLanguage, $cbUrlRouting, $outputCharset, $editorDisplay ) {
		$this->_baseFramework		=&	$baseFramework;
		$this->_cmsDatabase			=&	$database;
		$this->acl					=&	$acl;
		$this->_aclParams			=&	$aclParams;
		$this->_cmsSefFunction		=	$cmsSefFunction;
		$this->_cmsUserClassName	=	$cmsUserClassName;
		$this->_cmsUserNeedsDb		=	$cmsUserNeedsDb;
		$this->_cmsRedirectFunction	=	$cmsRedirectFunction;
		$this->_myId				=	(int) $myId;
		$this->_myUsername			=	$myUsername;
		$this->_myUserType			=	$myUserType;
		$this->_myCmsGid			=	$myCmsGid;
		$this->_myLanguage			=	$myLanguage;
		$this->_cbUrlRouting		=	$cbUrlRouting;
		$this->_outputCharset		=	$outputCharset;
		$this->_editorDisplay		=	$editorDisplay;
		$this->_now					=	time();
	}
	function login( $username, $password, $rememberme = 0, $userId = null ) {
		// Mambo 4.5.x and Joomla before 1.0.13+ (in fact RC3+) do need hashed password for login() method:
		$hashedPwdLogin				=	( ( checkJversion() == 0 ) && ! function_exists( 'josHashPassword' ) );	// more reliable version-checking than the often hacked version.php file!

		header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');              // needed for IE6 to accept this anti-spam cookie in higher security setting.
		if ( $hashedPwdLogin ) {				// Joomla 1.0.12 and below:
			return $this->_baseFramework->login( $username, cbHashPassword( $password ), $rememberme, $userId );
		} elseif ( checkJversion() == 1 ) {		// Joomla 1.5 RC and above:
			return $this->_baseFramework->login( array( 'username' => $username, 'password' => $password ), array( 'remember' => $rememberme ) );
		} else {
			return $this->_baseFramework->login( $username, $password, $rememberme, $userId );
		}
	}
	function logout() {
		header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');              // needed for IE6 to accept this anti-spam cookie in higher security setting.
		$this->_baseFramework->logout();
	}
	function getCfg( $config ) {
		switch ( $config ) {
			case 'absolute_path':
				if ( checkJversion() == 1 ) {
					return JPATH_SITE;
				}
				break;
			case 'live_site':
				if ( checkJversion() == 1 ) {
					if ( $this->getUi() == 1 ) {
						$live_site	=	JURI::base();
					} else {
						$live_site	=	$this->_baseFramework->getSiteURL();
					}
					if ( substr( $live_site, -1, 1 ) == '/' ) {
						// fix erroneous ending / in some joomla 1.5 versions:
						return substr( $live_site, 0, -1 );
					} else {
						return $live_site;
					}
				}
				break;
			case 'lang':
				return $this->_myLanguage;
				break;
			case 'uniquemail':
				if ( checkJversion() == 1 ) {
					return '1';
				}
				break;
			case 'frontend_userparams':
				if ( checkJversion() == -1 ) {
					return '0';
				}
				// NO break; on purpose for fall-through:
			case 'allowUserRegistration':
			case 'useractivation':
			case 'new_usertype':
				if ( checkJversion() == 1 ) {
					$usersConfig	=	&JComponentHelper::getParams( 'com_users' );
					$setting		=	$usersConfig->get( $config );
					if ( ( $config == 'new_usertype' ) && ! $setting ) {
						$setting	=	'Registered';
					}
					return $setting;
				} else {
					if ( $config == 'new_usertype' ) {
						return 'Registered';
					}
				}
				break;
			case 'dirperms':
			case 'fileperms':
				if ( checkJversion() == 1 ) {
					return '';		//TBD: these two missing configs should one day go to CB
				}
				break;
			// CB-Specific config params:
			case 'tmp_path':
				$abs_path			=	$this->getCfg('absolute_path');
				$tmpDir				=	$abs_path . '/media';
				if ( @is_dir( $tmpDir ) && @is_writable( $tmpDir ) ) {
					return $tmpDir;
				}
				// First try the new PHP 5.2.1+ function:
				if ( function_exists( 'sys_get_temp_dir' ) ) {
					$tmpDir		=	@sys_get_temp_dir();
					if ( @is_dir( $tmpDir ) && @is_writable( $tmpDir ) ) {
						return $tmpDir;
					}
				}
				// Based on http://www.phpit.net/article/creating-zip-tar-archives-dynamically-php/2/
				$varsToTry	=	array( 'TMP', 'TMPDIR', 'TEMP' );
				foreach ( $varsToTry as $v ) {
					if ( ! empty( $_ENV[$v] ) ) {
						$tmpDir		=	realpath( $v );
						if ( @is_dir( $tmpDir ) && @is_writable( $tmpDir ) ) {
							return $tmpDir;
						}
					}
				}
				// Try the CMS cache directory and other directories desperately:
				$tmpDirToTry		=	array( $this->getCfg( 'cachepath' ), realpath( '/tmp' ), $abs_path.'/tmp', $abs_path.'/images', $abs_path.'/images/stories', $abs_path.'/images/comprofiler' );
				foreach ( $tmpDirToTry as $tmpDir ) {
					if ( @is_dir( $tmpDir ) && @is_writable( $tmpDir ) ) {
						return $tmpDir;
					}
				}
				return null;
				break;
			default:
				break;
		}
		return $this->_baseFramework->getCfg( $config );

	}
	function getUi( ) {
		return $this->_ui;
	}
	function myId( ) {
		return $this->_myId;
	}
	function myUsername( ) {
		return $this->_myUsername;
	}
	function myUserType( ) {
		return $this->_myUserType;
	}
	function myCmsGid( ) {
		return $this->_myCmsGid;
	}
	function _cms_all_acl( ) {
		return $this->_aclParams;
	}
	function _cms_acl( $action ) {
		if ( isset( $this->_aclParams[$action] ) ) {
			return $this->_aclParams[$action];
		}
		trigger_error( 'acl_check undefined', E_USER_ERROR );
		exit;
	}
	/**
	 * Checks rights of user $userType to perform a $action.
	 *
	 * @param  string  $action  'canEditUsers', 'canBlockUsers', 'canManageUsers', 'canReceiveAdminEmails','canInstallPlugins'
	 *                          'canEditOwnContent', 'canAddAllContent', 'canEditAllContent', 'canPublishContent'
	 * @param  string  $userTye
	 * @return boolean           TRUE: Yes, user can do that, FALSE: forbidden.
	 */
	function check_acl( $action, $userTye ) {
		$aclParams						=	$this->_cms_acl( $action );
		$aclParams[3]					=	$userTye;
		return ( true == call_user_func_array( array( $this->acl, 'acl_check' ), $aclParams ) );
	}
	function outputCharset( ) {
		return $this->_outputCharset;
	}
	function getUrlRoutingOfCb( ) {
		return $this->_cbUrlRouting;
	}
	function setRedirect( $url, $message = null, $messageType = 'message' ) {	// or 'error'
		$this->_redirectUrl				=	$url;
		$this->_redirectMessage			=	$message;
		$this->_redirectMessageType		=	$messageType;
	}
	function redirect( $url = null, $message = null, $messageType = null ) {
		if ( $url ) {
			$this->_redirectUrl			=	$url;
		}
		if ( $message !== null ) {
			$this->_redirectMessage		=	$message;
		}
		if ( $messageType !== null ) {
			$this->_redirectMessageType	=	$messageType;
		}
		call_user_func_array( $this->_cmsRedirectFunction, array( $this->_redirectUrl, $this->_redirectMessage, $this->_redirectMessageType ) );
	}
	/**
	 * Converts an URL to an absolute URI with SEF format
	 * @param  string  $string  The relative URL
	 * @param  string  $htmlSpecials  TRUE (default): apply htmlspecialchars to sefed URL, FALSE: don't.
	 * @return string           The absolute URL
	 */
	function cbSef( $string, $htmlSpecials = true ) {
		if ( ( $this->getUi() == 1 ) && ( ( $string == '' ) || ( substr( $string, 0, 9 ) == 'index.php' ) || ( $string[0] == '?' ) ) && is_callable( $this->_cmsSefFunction ) ) {
			$uri					=	call_user_func_array( $this->_cmsSefFunction, array( $this->_sefFuncHtmlEnt ? $string : cbUnHtmlspecialchars( $string ) ) );
		} else {
			$uri					=	$string;
		}
		if ( ! in_array( substr( $uri, 0, 4 ), array( 'http', 'java' ) ) ) {
			if ( $uri[0] == '/' ) {
				// we got special case of an absolute link without live_site, but an eventual subdirectory of live_site is included...need to strip live_site:
				$matches			=	array();
				if (	( preg_match( '!^([^:]+://)([^/]+)(/.*)$!', $this->getCfg( 'live_site' ), $matches ) )
					&&	( $matches[3] == substr( $uri, 0, strlen( $matches[3] ) ) ) )
				{
					$uri			=	$matches[1] . $matches[2] . $uri;		// 'http://' . 'site.com' . '/......
				} else {
					$uri			=	$this->getCfg( 'live_site' ) . $uri;
				}
			} else {
				$uri				=	$this->getCfg( 'live_site' ) . '/' . $uri;
			}
		}
		if ( ! $htmlSpecials ) {
			$uri					=	cbUnHtmlspecialchars( $uri );
		} else {
			$uri					=	htmlspecialchars( cbUnHtmlspecialchars( $uri ) );	// quite a few sefs, including Mambo and Joomla's non-sef are buggy.
		}
		return $uri;
	}
	function userProfileUrl( $userId, $htmlSpecials = true ) {
		if ( $userId == $this->myId() ) {
			$uid		=	null;
		} else {
			$uid		=	'&amp;task=userProfile&amp;user=' . $userId;
		}
		return cbSef( 'index.php?option=com_comprofiler&amp;' . $uid . getCBprofileItemid(true), $htmlSpecials );
	}
	function & _getCmsUserObject( $cmsUserId = null ) {
		if ( $this->_cmsUserNeedsDb ) {
			global $_CB_database;
			$obj		=	new $this->_cmsUserClassName( $_CB_database );
		} else {
			$obj		=	new $this->_cmsUserClassName();
		}
		if ( $cmsUserId !== null ) {
			if ( ! $obj->load( (int) $cmsUserId ) ) {
				$obj	=	null;
			}
		}
		return $obj;
	}
	function getUserIdFrom( $field, $value ) {
		global $_CB_database;

		$_CB_database->setQuery( 'SELECT id FROM #__users u WHERE u.' . $_CB_database->NameQuote( $field ) . ' = ' . $_CB_database->Quote( $value )
								 . "\n LIMIT 2");
		$results		=	$_CB_database->loadResultArray();
		if ( $results && ( count( $results ) == 1 ) ) {
			return $results[0];
		}
		return null;
	}
	/**
	 * Returns is user is "online" and last time online of the user
	 *
	 * @param  int  $userId
	 * @return int|null      last online time of the user
	 */
	function userOnlineLastTime( $userId ) {
		global $_CB_database;

		$_CB_database->setQuery( 'SELECT MAX(time) FROM #__session WHERE userid = ' . (int) $userId . ' AND guest = 0');
		$lastTime		=	$_CB_database->loadResult();
		return $lastTime;
	}
	function displayCmsEditor( $hiddenField, $content, $width, $height, $col, $row ) {
		if ( ! $this->_editorDisplay['returns'] ) {
			ob_start();
		}
		if ( $this->_editorDisplay['display']['args'] == 'withid' ) {
			$args		=	array( 'editor' . $hiddenField, $content, $hiddenField, $width, $height, $col, $row );
		} else {
			$args		=	array( $hiddenField, $content, $width, $height, $col, $row );
		}
		$return			=	call_user_func_array( $this->_editorDisplay['display']['call'], $args );
		if ( ! $this->_editorDisplay['returns'] ) {
			$return			=	ob_get_contents();
			ob_end_clean();
		}
		return $return;
	}
	function saveCmsEditorJS( $hiddenField ) {
		if ( ! $this->_editorDisplay['returns'] ) {
			ob_start();
		}
		if ( $this->_editorDisplay['save']['args'] == 'withid' ) {
			$args		=	array( 'editor' . $hiddenField, $hiddenField );
		} else {
			$args		=	array( $hiddenField );
		}
		$return			=	call_user_func_array( $this->_editorDisplay['save']['call'], $args );
		if ( ! $this->_editorDisplay['returns'] ) {
			$return			=	ob_get_contents();
			ob_end_clean();
		}
		return $return;
	}

	/**
	 * Returns the start time of CB's pageload
	 *
	 * @return int     Unix-time in seconds
	 */
	function now( ) {
		return $this->_now;
	}
	function addCustomHeadTag( $tag ) {
		if ( ( $this->getUi() == 1 ) && method_exists( $this->_baseFramework, 'addCustomHeadTag' ) ) {
			return $this->_baseFramework->addCustomHeadTag( $tag );
		} else {
			echo $tag . "\n";
		}
	}
	function setPageTitle( $title ) {
		if ( method_exists( $this->_baseFramework, 'setPageTitle' ) ) {
			return $this->_baseFramework->setPageTitle( $title );
		} else {
			return null;
		}
	}
	function appendPathWay( $title ) {
		if ( method_exists( $this->_baseFramework, 'appendPathWay' ) ) {
			return $this->_baseFramework->appendPathWay( $title );
		} else {
			return null;
		}
	}
	function getUserState( $stateName ) {
		return $this->_baseFramework->getUserState( $stateName );
	}
	function getUserStateFromRequest( $stateName, $reqName, $default = null ) {
		return $this->_baseFramework->getUserStateFromRequest( $stateName, $reqName, $default );
	}
	function setUserState( $stateName, $stateValue ) {
		return $this->_baseFramework->setUserState( $stateName, $stateValue );
	}
	function cbset( $name, $value ) {
		$this->$name			=	$value;
	}
	function outputCbJs( $javascriptCode ) {
		$this->_jsCodes[]		=	$javascriptCode;
	}
	/**
	 * JS + JQUERY LIB:
	 *
	 */
	var $_jsCodes				=	array();
	var $_jQueryCodes			=	array();
	var $_jQueryPlugins			=	array();
	var $_jqueryDependencies	=	array(	'ui-all-1.5b3'	=>	array( -1	=>	array( 'dimensions' ) ),	//temporary: change to ui-all when released
											'flot'		=>	array( 1	=>	array( 'excanvas' ) ),
											'rating'	=>	array( -1	=>	array( 'metadata' ) ) );
	var $_jqueryCssFiles		=	array(	'lightbox'	=>	array( 'lightbox.css' => 'screen' ) );

	function _coreJQueryFilePath( $jQueryPlugin, $pathType = 'live_site' ) {
		return $this->getCfg( $pathType ) . '/components/com_comprofiler/js/jquery-1.2.6/jquery.' . $jQueryPlugin . ( $this->getCfg( 'debug' ) ? '' : '.pack' ) . '.js';
	}
	/**
	 * Adds an external JQuery plugin to the known JQuery plugins (if not already known)
	 *
	 * @param  string|array   $jQueryPlugins  Short Name of plugin or array of short names
	 * @param  string|boolean $path           Path to file from root of website (not including leading / )
	 * @param  array          $dependencies   array( 1	=>	array( pluginNames ) ) for plugins to load after and -1 for plugins to load before.
	 * @param  array          $cssfiles       array( filename => media ) : media = null or 'screen'.
	 */
	function addJQueryPlugin( $jQueryPlugins, $path, $dependencies = null, $cssfiles = null ) {

		$jQueryPlugins										=	(array) $jQueryPlugins;
		foreach ( $jQueryPlugins as $jQueryPlugin ) {

			//temporary:
			if ( $jQueryPlugin == 'ui-all' ) {
				$jQueryPlugin								=	'ui-all-1.5b3';
			}

			if ( ( $path === true ) || file_exists( $this->_coreJQueryFilePath( $jQueryPlugin, 'absolute_path' ) ) ) {
				$path										=	$this->_coreJQueryFilePath( $jQueryPlugin );
			} else {
				$path										=	$this->getCfg( 'live_site' ) . '/' . $path;
				if ( $dependencies !== null ) {
					$this->_jqueryDependencies				=	array_merge( $this->_jqueryDependencies, array( $jQueryPlugin => $dependencies ) );
				}
				if ( $cssfiles !== null ) {
					$this->_jqueryCssFiles					=	array_merge( $this->_jqueryCssFiles, array( $jQueryPlugin => $cssfiles ) );
				}
			}
	
			if ( ! isset( $this->_jQueryPlugins[$jQueryPlugin] ) ) {
				// not yet configured for loading: check dependencies: -1: before:
				if ( isset( $this->_jqueryDependencies[$jQueryPlugin][-1] ) ) {
					foreach ( $this->_jqueryDependencies[$jQueryPlugin][-1] as $jLib ) {
						if ( ! isset( $this->_jQueryPlugins[$jLib] ) ) {
							$this->_jQueryPlugins[$jLib]	=	$this->_coreJQueryFilePath( $jLib );
						}
					}
				}
				$this->_jQueryPlugins[$jQueryPlugin]		=	$path;
				// +1: dependencies after:
				if ( isset( $this->_jqueryDependencies[$jQueryPlugin][1] ) ) {
					foreach ( $this->_jqueryDependencies[$jQueryPlugin][1] as $jLib ) {
						if ( ! isset( $this->_jQueryPlugins[$jLib] ) ) {
							$this->_jQueryPlugins[$jLib]	=	$this->_coreJQueryFilePath( $jLib );
						}
					}
				}
			}
		}
	}
	/**
	 * Outputs a JQuery init string into JQuery strings at end of page,
	 * and adds if needed JS file inclusions at begin of page.
	 * Pro-memo, JQuery runs in CB in noConflict mode.
	 *
	 * @param  string  $javascriptCode  Javascript code ended by ; which will be put in between jQuery(document).ready(function($){ AND });
	 * @param  string  $jQueryPlugin    (optional) name of plugin to auto-load (if core plugin, or call first addJQueryPlugin).
	 */
	function outputCbJQuery( $javascriptCode, $jQueryPlugin = null ) {
		if ( $jQueryPlugin ) {
			$this->addJQueryPlugin( $jQueryPlugin, true );
		}
		$this->_jQueryCodes[]	=	$javascriptCode;
	}
	function getAllJsPageCodes( $inHead = false ) {
		global $ueConfig;

		$jsCodeTxt			=	'';

		// jQuery code loading:

		if ( count( $this->_jQueryCodes ) > 0 ) {
			foreach ( $this->_jQueryPlugins as $plugin => $v ) {
				if ( isset( $this->_jqueryCssFiles[$plugin] ) ) {
					foreach ( $this->_jqueryCssFiles[$plugin] as $templateFile => $media ) {
						outputCbTemplate( $this->getUi(), $templateFile, $media );
					}
				}
			}
			if ( $this->getCfg( 'debug' ) ) {
				$jsCodeTxt	.=	'<script type="text/javascript" src="' . $this->getCfg('live_site') . '/components/com_comprofiler/js/jquery-1.2.6/jquery-1.2.6.js"></script>';
			} else {
				$jsCodeTxt	.=	'<script type="text/javascript" src="' . $this->getCfg('live_site') . '/components/com_comprofiler/js/jquery-1.2.6/jquery-1.2.6.pack.js"></script>';
			}
			$jsCodeTxt		.=	'<script type="text/javascript"><!--//--><![CDATA[//><!--' . "\n";
			$jsCodeTxt		.=	"jQuery.noConflict();\n";
			$jsCodeTxt		.=	"//--><!]]></script>\n";
			foreach ( $this->_jQueryPlugins as $plugin => $pluginPath ) {
				$jsCodeTxt	.=	( $plugin == 'excanvas' ? '<!--[if IE]>' : '' )
											  . '<script type="text/javascript" src="' . $pluginPath . '"></script>'
											  . ( $plugin == 'excanvas' ? '<![endif]-->' : '' );
			}

			addCbHeadTag( $this->getUi(), $jsCodeTxt );		// files loading in header for speeding up concurrent loading, we need CSS and jQuery before HTML to get onReady event and avoid flicker

			$jsCodeTxt		=	'';
/*
			$jsCodeTxt		.=	"var cbJFrame = window.cbJFrame = function() { return new cbJFrame.prototype.init(); };\n"
							.	"cbJFrame.fn = cbJFrame.prototype = {\n"
							.	"  init: function() { return this; },\n"
							.	"  cbjframe: '" . $ueConfig['version'] . "',\n"
							.	"  jquery: null\n"
							.	"};\n"
							.	"cbJFrame.prototype.init.prototype = cbJFrame.prototype;\n"
							//.	"cbJFrame.jquery = jQuery.noConflict();\n"
							.	'cbJFrame.jquery(document).ready(function($){' . "\n"
							.	implode( "\n", $this->_jQueryCodes )
							.	"});\n";
*/
			$jsCodeTxt		.=	'<script type="text/javascript"><!--//--><![CDATA[//><!--' . "\n"
							.	'jQuery(document).ready(function($){' . "\n"
							.	implode( "\n", $this->_jQueryCodes )
							.	"});\n"
							.	"//--><!]]></script>\n";
		}

		// classical standalone javascript loading (for compatibility), depreciated ! :

		if ( count( $this->_jsCodes ) > 0 ) {
			$jsCodeTxt		.=	'<script type="text/javascript"><!--//--><![CDATA[//><!--' . "\n"
							.	implode( "\n", $this->_jsCodes )
							.	"//--><!]]></script>\n";
		}
		if ( $inHead ) {
			addCbHeadTag( $this->getUi(), $jsCodeTxt );
			return null;
		} else {
			return $jsCodeTxt;
		}
	}
}

/**
 * Converts an absolute URL to SEF format
 * @param  string  $string  The relative URL
 * @param  string  $htmlSpecials  TRUE (default): apply htmlspecialchars to sefed URL, FALSE: don't.
 * @return string           The absolute URL
 */
function cbSef( $string, $htmlSpecials = true ) {
	global $_CB_framework;
	return $_CB_framework->cbSef( $string, $htmlSpecials );
}
/**
 * Displays "Not authorized", and if not logged-in "you need to login"
 *
 */
function cbNotAuth() {
	global $_CB_framework;

	echo '<div class="error">' . _UE_NOT_AUTHORIZED . '</div>';
	if ($_CB_framework->myId() < 1 ) {
		echo '<div class="error">' . _UE_DO_LOGIN . '</div>';
	}
}


/**
 * Text classes and old function
 *
 */

class CBTxtStorage {
	var $_iso;					// 'UTF-8', 'ISO-8859-1', ...
	var $_mode;					// 1: debug, 2: edit
	var $_lang					=	'en-GB';
	var $_langOld				=	'english';
	var $_strings				=	array();

	function CBTxtStorage( $iso, $mode ) {
		$this->_iso				=	$iso;
		$this->_mode			=	$mode;
	}
}

class CBTxt {
	function T( $english ) {
		global $_CB_TxtIntStore;

		if ( $_CB_TxtIntStore->_mode == 0 ) {
			if ( isset( $_CB_TxtIntStore->_strings[$english] ) ) {
				return CBTxt::utf8ToISO( $_CB_TxtIntStore->_strings[$english] );
			} else {
				return $english;
			}
		} else {
			if ( isset( $_CB_TxtIntStore->_strings[$english] ) ) {
				return CBTxt::utf8ToISO( '*' . $_CB_TxtIntStore->_strings[$english] . '*' );
			} else {
				return '===>' . str_replace( '%s', '[%s]', $english ) . '<!---';
			}
		}
	}
	function Th( $english ) {
		global $_CB_TxtIntStore;

		if ( $_CB_TxtIntStore->_mode == 0 ) {
			if ( isset( $_CB_TxtIntStore->_strings[$english] ) ) {
				return CBTxt::utf8ToISO( $_CB_TxtIntStore->_strings[$english] );
			} else {
				return $english;
			}
		} elseif ( $_CB_TxtIntStore->_mode == 1 ) {
			if ( isset( $_CB_TxtIntStore->_strings[$english] ) ) {
				return '<span style="color:#CCC;font-style:italic">' . CBTxt::utf8ToISO( $_CB_TxtIntStore->_strings[$english] ) . '</span>';
			} else {
				return '<span style="color:#FF0000;font-weight:bold">' . '===>' . $english . '<===' . '</span>';
			}
		} else {
			if ( isset( $_CB_TxtIntStore->_strings[$english] ) ) {
				return CBTxt::utf8ToISO( '*' . $_CB_TxtIntStore->_strings[$english] . '*' );
			} else {
				return '===&gt;' . str_replace( '%s', '[%s]', $english ) . '&lt;===';
			}
		}
	}
	function addStrings( &$array ) {
		global $_CB_TxtIntStore;
		$_CB_TxtIntStore->_strings			=	array_merge( $_CB_TxtIntStore->_strings, $array );
	}
	// Temporary internal functions: do not use !
	function utf8ToISO( $string ) {
		global $_CB_TxtIntStore;

		if ( $_CB_TxtIntStore->_iso == 'UTF-8' ) {
			return $string;
		} elseif ( strncmp( $_CB_TxtIntStore->_iso, 'ISO-8859-1', 9 ) == 0 ) {
			return utf8_decode( $string );
		} else {
			return CBTxt::_unhtmlentities( htmlentities( $string, ENT_NOQUOTES, 'UTF-8' ), ENT_NOQUOTES, $_CB_TxtIntStore->_iso );
		}
	}
	function _unhtmlentities( $string, $quotes = ENT_COMPAT, $charset = "ISO-8859-1" ) {
		$phpv = phpversion();
		if ( version_compare( $phpv, '4.4.3', '<' )
			 || ( version_compare( $phpv, '5.0.0', '>=' ) && version_compare( $phpv, '5.1.3', '<' ) )
		     || ( version_compare( $phpv, '5.0.0', '<'  ) && ( ! in_array( $charset, array( "ISO-8859-1", "ISO-8859-15", "cp866", "cp1251", "cp1252" ) ) ) )
		     || ( version_compare( $phpv, '5.1.3', '>=' ) && ( ! in_array( $charset, array( "ISO-8859-1", "ISO-8859-15", "cp866", "cp1251", "cp1252", 
		     								   "KOI8-R", "BIG5", "GB2312", "UTF-8", "BIG5-HKSCS", "Shift_JIS", "EUC-JP" ) ) ) )
		   ) {
			// For 4.1.0 =< PHP < 4.3.0 use this function instead of html_entity_decode: also php < 5.0 does not support UTF-8 outputs !
			// Plus up to 4.4.2 and 5.1.2 html_entity_decode is deadly buggy
			$trans_tbl = get_html_translation_table( HTML_ENTITIES );
			if ( $charset == "UTF-8" ) {
				foreach ( $trans_tbl as $k => $v ) {
					$ttr[$v] = utf8_encode($k);
				}
			} else {
				$ttr = array_flip( $trans_tbl );
			}
			return strtr ( $string, $ttr );
		} else  {
			return html_entity_decode ($string, $quotes, $charset);
		}
	}

}

/**
 * CB GLOBALS and initializations
 */

// ----- NO MORE CLASSES OR FUNCTIONS PASSED THIS POINT -----
// Post class declaration initialisations
// some version of PHP don't allow the instantiation of classes
// before they are defined

switch ( checkJversion() ) {
	case 1:
		global $mainframe;
		$database		=&	JFactory::getDBO();
		$my				=&	JFactory::getUser();
		$acl			=&	JFactory::getACL();
		$sefFunc		=	array( 'JRoute', '_' );
		$sefFuncHtmlEnt	=	false;
		$cmsUser		=	'JUser';
		$cmsUserNeedsDb	=	false;
		$cmsRedirectFunc =	array( $mainframe, 'redirect' );
		$lang			=&	JFactory::getLanguage();
		$myLanguage		=	$lang->getBackwardLang();
		$outputCharst	=	'UTF-8';
		$editor			=&	JFactory::getEditor();
		//$editor->initialise();
		$editorDisplay	=	array( 'display' => array( 'call' => array( $editor , 'display' ),	'args' => 'noid' ),
								   'save'	 => array( 'call' => array( $editor , 'save' ),		'args' => 'noid' ),
								   'returns' => true );
		// no$editorDisplay	=	array( 'JEditor' , 'display' );
		break;
	case 0:
		global $mainframe, $database, $my, $acl;
		$sefFunc		=	'sefRelToAbs';
		$sefFuncHtmlEnt	=	true;
		$cmsUser		=	'mosUser';
		$cmsUserNeedsDb	=	true;
		$cmsRedirectFunc =	'mosRedirect';
		$myLanguage		=	$mainframe->getCfg( 'lang' );
		$outputCharst	=	( defined( '_ISO' ) ? strtoupper( str_replace( "charset=", "", _ISO ) ) : 'ISO-8859-1' );
		$editorDisplay	=	array( 'display' => array( 'call' => 'editorArea',		  'args' => 'withid' ),
								   'save'	 => array( 'call' => 'getEditorContents', 'args' => 'withid' ),
								   'returns' => false );
		break;
	case -1:
	default:
		global $mainframe, $database, $my, $acl;
		$sefFunc		=	'sefRelToAbs';
		$sefFuncHtmlEnt	=	true;
		$cmsUser		=	'mosUser';
		$cmsUserNeedsDb	=	true;
		$cmsRedirectFunc =	'mosRedirect';
		$myLanguage		=	$mainframe->getCfg( 'locale' );
		$outputCharst	=	( defined( '_ISO' ) ? strtoupper( str_replace( "charset=", "", _ISO ) ) : 'UTF-8' );
		$editorDisplay	=	array( 'display' => array( 'call' => 'editorArea',		  'args' => 'withid' ),
								   'save'	 => array( 'call' => 'getEditorContents', 'args' => 'withid' ),
								   'returns' => false );
		break;
}
if ( checkJversion() < 1 ) {
	$aclParams			=	array(	'canEditUsers'			=>	array( 'administration', 'manage', 'users', null, 'components', 'com_users' ),
									'canBlockUsers'			=>	array( 'administration', 'edit', 'users', null, 'user properties', 'block_user' ),
									'canReceiveAdminEmails'	=>	array( 'workflow', 'email_events', 'users', null ),
									'canEditOwnContent'		=>	array( 'action', 'edit', 'users', null, 'content', 'own' ),
									'canAddAllContent' 		=>	array( 'action', 'add', 'users', null, 'content', 'all' ),
									'canEditAllContent' 	=>	array( 'action', 'edit', 'users', null, 'content', 'all' ),
									'canPublishContent'		=>	array( 'action', 'publish', 'users', null, 'content', 'all' ),
									'canInstallPlugins'		=>	array( 'administration', 'install', 'users', null, 'components', 'all' ),
									'canManageUsers'		=>	array( 'administration', 'manage', 'users', null, 'components', 'com_users' )
							);
} else {
	$aclParams			=	array(	'canEditUsers'			=>	array( 'com_user', 'edit', 'users', null ),
									'canBlockUsers'			=>	array( 'com_users', 'block user', 'users', null ),
									'canReceiveAdminEmails'	=>	array( 'com_users', 'email_events', 'users', null ),
									'canEditOwnContent'		=>	array( 'com_content', 'edit', 'users', null, 'content', 'own' ),
									'canAddAllContent'	 	=>	array( 'com_content', 'add', 'users', null, 'content', 'all' ),
									'canEditAllContent' 	=>	array( 'com_content', 'edit', 'users', null, 'content', 'all' ),
									'canPublishContent'		=>	array( 'com_content', 'publish', 'users', null, 'content', 'all' ),
									'canInstallPlugins'		=>	array( 'com_installer', 'installer', 'users', null ),
									'canManageUsers'		=>	array( 'com_users', 'manage', 'users', null )
							);
}

/**
 * CB framework
 * @global CBframework $_CB_framework
 */
global $_CB_framework;
$optionOfCb				=	'com_comprofiler';		// cbGetParam( $_REQUEST, 'option', 'com_comprofiler' )
$_CB_framework			=	new CBframework( $mainframe, $database, $acl, $aclParams, $sefFunc, $sefFuncHtmlEnt, $cmsUser, $cmsUserNeedsDb, $cmsRedirectFunc, $my->id, $my->username, $my->usertype, $my->gid, $myLanguage, array( 'option' => $optionOfCb ), $outputCharst, $editorDisplay );

/**
 * CB text languages EXPERIMENTAL
 * @access private
 * @global CBText $_CB_framework
 */
global $_CB_TxtIntStore;
$_CB_TxtIntStore	=	new CBTxtStorage( $_CB_framework->outputCharset(), 0 );

?>
