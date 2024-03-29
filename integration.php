<?php
/**
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
#
* @copyright	2005-2008 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */
// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (defined('JPATH_BASE') )
		{
		if (@file_exists(JPATH_BASE .'/includes/defines.php') )
			defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
		}
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

//global $mainframe,$task,$config;
ini_set("max_execution_time","480");
ini_set('error_reporting', E_ERROR | E_WARNING | E_PARSE);
ini_set("memory_limit","128M");

// ini_set("register_globals", 1); // not set yet, resisting the temptation

define('_COMPONENT_JOMRES_INTEGRATIONCALLED','1');

global $jomresConfig_lang,$jomresConfig_absolute_path,$jomresConfig_live_site,$jomresConfig_sitename,$jomresConfig_shownoauth,$jomresConfig_useractivation,
	$jomresConfig_uniquemail,$jomresConfig_offline_message,$jomresConfig_lifetime,$jomresConfig_MetaDesc,$jomresConfig_MetaKeys,$jomresConfig_MetaTitle,
	$jomresConfig_MetaAuthor,$jomresConfig_debug,$jomresConfig_locale,$jomresConfig_offset,$jomresConfig_offset_user,$jomresConfig_hideAuthor,$jomresConfig_hideCreateDate,
	$jomresConfig_hideModifyDate,$jomresConfig_hidePdf,$jomresConfig_hidePrint,$jomresConfig_hideEmail,$jomresConfig_enable_log_items,$jomresConfig_enable_log_searches,
	$jomresConfig_enable_stats,$jomresConfig_sef,$jomresConfig_vote,$jomresConfig_gzip,$jomresConfig_multipage_toc,$jomresConfig_allowUserRegistration,
	$jomresConfig_error_reporting,$jomresConfig_error_message,$jomresConfig_link_titles,$jomresConfig_list_limit,$jomresConfig_caching,$jomresConfig_cachepath,
	$jomresConfig_cachetime,$jomresConfig_mailer,$jomresConfig_mailfrom,$jomresConfig_fromname,$jomresConfig_sendmail,$jomresConfig_smtpauth,$jomresConfig_smtpuser,
	$jomresConfig_smtppass,$jomresConfig_smtphost,$jomresConfig_back_button,$jomresConfig_item_navigation,$jomresConfig_secret,$jomresConfig_pagetitles,$jomresConfig_readmore,
	$jomresConfig_hits,$jomresConfig_icons,$jomresConfig_favicon,$jomresConfig_fileperms,$jomresConfig_dirperms,$jomresConfig_helpurl,$jomresConfig_mbf_content,$jomresConfig_editor,$jomresAdminPath;
global $jomresConfig_user,$jomresConfig_password,$jomresConfig_dbprefix,$jomresConfig_host,$jomresConfig_db;

global $jomresPath,$license_key,$jomres_db_querylog,$MiniComponents,$timetracking;
global $mrConfig,$jrConfig,$jomres_systemLog_path;
global $ra1,$ra2,$convertedRAs,$lessThans; // globaled so that we don't need to initialise them every time
global $R;

// Stuff we want to filter out of inputs.
	$ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', '<link', '<style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', '<title', 'base','mocha','livescript','@import','<html','<body');
	$ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload','fromcharcode',';alert',':alert','fscommand','onbegin','ondragdrop','onend','onmediacomplete','onmediaerror','onoutofsync','onpause','onprogress','onrepeat','onresume','onreverse','onrowsenter','onrowdelete','onrowinserted','onscrollby','onseek','onsyncrestored','ontimeerror','ontrackchange','onurlflip','seeksegmenttime','scriptlet');
$lessThans=array('%3C','&lt','&lt;','&LT','&LT;','&#60','&#060','&#0060','&#00060','&#000060','&#0000060','&#60;','&#060;','&#0060;','&#00060;','&#000060;','&#0000060;','&#x3c','&#x03c','&#x003c','&#x0003c','&#x00003c','&#x000003c','&#x3c;','&#x03c;','&#x003c;','&#x0003c;','&#x00003c;','&#x000003c;','&#X3c','&#X03c','&#X003c','&#X0003c','&#X00003c','&#X000003c','&#X3c;','&#X03c;','&#X003c;','&#X0003c;','&#X00003c;','&#X000003c;','&#x3C','&#x03C','&#x003C','&#x0003C','&#x00003C','&#x000003C','&#x3C;','&#x03C;','&#x003C;','&#x0003C;','&#x00003C;','&#x000003C;','&#X3C','&#X03C','&#X003C','&#X0003C','&#X00003C','&#X000003C','&#X3C;','&#X03C;','&#X003C;','&#X0003C;','&#X00003C;','&#X000003C;','\x3c','\x3C','\u003c','\u003C');
$convertedRAs=initRemoveXSS($ra1,$ra2);

$R=array();
$R[gettype(.0)]='float';
$R[gettype(0)]='int';
$R[gettype(true)]='boolean';
$R[gettype('')]='string';
$R[gettype(null)]='null';
$R[gettype(array())]='array';
$R[gettype(new stdClass())]='object';



if (!defined('JOMRESPATH_BASE'))
	{
	if (!defined('JRDS'))
		{
		$detect_os = strtoupper($_SERVER["SERVER_SOFTWARE"]); // converted to uppercase
		$pos = strpos($detect_os, "WIN32");
		$IIS = strpos($detect_os, "IIS");
		$signature = strtoupper($_SERVER["SERVER_SIGNATURE"]);
		$sig = strpos($signature, "APACHE");
		$dir =  dirname(realpath(__FILE__));
		if ( strpos($dir,":\\" ) )
			define("JRDS" , "\\");
		else
			{
			if ( ($pos === false && $IIS === false) || $sig == true) 
				define("JRDS" , "/");
			else
				define("JRDS" , "\\");
			}
		}
	$dir_path = str_replace( $_SERVER['SCRIPT_NAME'], "", dirname(realpath(__FILE__)) ) ;

	define('JOMRESPATH_BASE', $dir_path );
	}

$jomresConfig_absolute_path= str_replace(JRDS."components".JRDS."com_jomres","",JOMRESPATH_BASE);
define('JOMRESCONFIG_ABSOLUTE_PATH',$jomresConfig_absolute_path);
// Adding this here allows an element of interoperability between J1.x & J1.5
$scriptname=str_replace("/","",$_SERVER['PHP_SELF']);
require_once(JOMRESCONFIG_ABSOLUTE_PATH.JRDS."components".JRDS."com_jomres".JRDS."site_config.php");

/**
#
 * Alternative function for str_ireplace
#
 */
 
if(!function_exists('str_ireplace'))
	{
	function str_ireplace($search,$replace,$subject)
		{
		$token = chr(1);
		$haystack = strtolower($subject);
		//$needle = strtolower($search);
		if (is_array($search) )
			{
			$count=count($search);
			for ($i=0;$i<$count;$i++)
				{
				//echo $search[$i];echo "<br/>";
				$search[$i]= strtolower($search[$i]);
				}
			$needle=$search;
			}
		else
			$needle = strtolower($search);
		while (($pos=strpos($haystack,$needle))!==FALSE)
			{
			$subject = substr_replace($subject,$token,$pos,strlen($search));
			$haystack = substr_replace($haystack,$token,$pos,strlen($search));
			}
		$subject = str_replace($token,$replace,$subject);
		return $subject;
		}
	}

/**
#
 * Alternative function for gregoriantojd
#
 */
if ( !function_exists('gregoriantojd') )
	{
	function gregoriantojd( $m, $d, $y )
		{
		$y = $m == 1 || $m == 2 ? --$y : $y;
		$m = $m == 1 || $m == 2 ? $m + 12 : $m;
		$a = intval( $y / 100 );
		$b = intval( $a / 4 );
		$c = 2 - $a + $b;
		$e = intval( 365.25 * ( $y + 4716 ) );
		$f = intval( 30.6001 * ( $m + 1 ) );
		return $c + $d + $e + $f - 1524.5 + 0.5;
		}
	}

if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'includes'.JRDS.'defines.php') )
	{
	global $mainframe;
	require_once( JOMRESCONFIG_ABSOLUTE_PATH .JRDS.'configuration.php' );
	$CONFIG = new JConfig();
	$no_html			= (int)jomresGetParam( $_REQUEST, 'no_html', 0 );

	if($CONFIG->session_handler !="none" && $no_html == 0)
		{
		echo "You need to configure session handling to be set to 'none'. Go to administrator -> Global Configuration -> System -> Session Handler and set this to 'none'. Until you do this, your booking form will not work.<br>";
		}

	$jomresConfig_offline			= $CONFIG->offline;
	$jomresConfig_db				= $CONFIG->db;
	/*

	*/
	if (class_exists('JURI'))
		{
		$jomresConfig_live_site=JURI::base();
		}
	else
		{
		if ($IIS > 0) // Win NT, therefore $_SERVER['REQUEST_URI'] == null
			{
			$path_info =  $_SERVER['PATH_INFO'];
			$_URI = explode("/", $path_info);
			}
		else
			{
			
		    list($path, $args) = explode("?", $_SERVER['REQUEST_URI']);
		    $_URI = explode("/", $path);
			}
		array_shift($_URI);
		$_URI=array_slice($_URI,0,count($_URI)-1);
		array_unshift ($_URI,$_SERVER['SERVER_NAME'] );
		$jomresConfig_live_site="http://".implode("/",$_URI);
		}
	$jomresConfig_live_site=str_replace("/administrator/","",$jomresConfig_live_site);
	$jomresConfig_live_site=str_replace("/administrator","",$jomresConfig_live_site);
	if(substr($jomresConfig_live_site, -1)=="/") $jomresConfig_live_site = substr($jomresConfig_live_site, 0, -1);
	$jomresConfig_sitename			= $CONFIG->sitename;
	$jomresConfig_lifetime			= $CONFIG->lifetime;
	$jomresConfig_MetaDesc			= $CONFIG->MetaDesc;
	$jomresConfig_MetaKeys			= $CONFIG->MetaKeys;
	$jomresConfig_MetaTitle			= $CONFIG->MetaTitle;
	$jomresConfig_MetaAuthor		= $CONFIG->MetaAuthor;
	$jomresConfig_debug				= $CONFIG->debug;
	$jomresConfig_list_limit		= $CONFIG->list_limit;
	$jomresConfig_mailer			= $CONFIG->mailer;
	$jomresConfig_mailfrom			= $CONFIG->mailfrom;
	$jomresConfig_fromname			= $CONFIG->fromname;
	$jomresConfig_sendmail			= $CONFIG->sendmail;
	$jomresConfig_smtpauth			= $CONFIG->smtpauth;
	$jomresConfig_smtpuser			= $CONFIG->smtpuser;
	$jomresConfig_smtppass			= $CONFIG->smtppass;
	$jomresConfig_smtphost			= $CONFIG->smtphost;
	$jomresConfig_secret			= $CONFIG->secret;
	$jomresConfig_dbprefix			= $CONFIG->dbprefix;
	$jomresConfig_user	 			= $CONFIG->user;
	$jomresConfig_password	 		= $CONFIG->password;
	$jomresConfig_db				= $CONFIG->db;
	$jomresConfig_host				= $CONFIG->host;


	//$jomresConfig_pagetitles			= $CONFIG->pagetitles;
	//$jomresConfig_readmore			= $CONFIG->readmore;
	//$jomresConfig_hits				= $CONFIG->hits;
	//$jomresConfig_icons				= $CONFIG->icons;
	//$jomresConfig_favicon				= $CONFIG->favicon;
	//$jomresConfig_fileperms			= $CONFIG->fileperms;
	//$jomresConfig_dirperms			= $CONFIG->dirperms;
	//$jomresConfig_helpurl				= $CONFIG->helpurl;
	//$jomresConfig_multilingual_content 	= $CONFIG->multilingual_content;
	//$jomresConfig_editor				= $CONFIG->editor;
	//$jomresConfig_locale				= $CONFIG->locale;
	//$jomresConfig_meta_pagetitle		= $CONFIG->meta_pagetitle;
	//$jomresConfig_back_button			= $CONFIG->back_button;
	//$jomresConfig_item_navigation		= $CONFIG->item_navigation;
	//$jomresConfig_caching			= $CONFIG->caching;
	//$jomresConfig_cachepath			= $CONFIG->cachepath;
	//$jomresConfig_cachetime			= $CONFIG->cachetime;
	//$jomresConfig_locale				= $CONFIG->locale;
	//$jomresConfig_offset				= $CONFIG->offset;
	//$jomresConfig_offset_user			= $CONFIG->offset_user;
	//$jomresConfig_hideAuthor			= $CONFIG->hideAuthor;
	//$jomresConfig_hideCreateDate		= $CONFIG->hideCreateDate;
	//$jomresConfig_hideModifyDate		= $CONFIG->hideModifyDate;
	//$jomresConfig_hidePdf				= $CONFIG->hidePdf;
	//$jomresConfig_hidePrint			= $CONFIG->hidePrint;
	//$jomresConfig_hideEmail			= $CONFIG->hideEmail;
	//$jomresConfig_enable_log_items		= $CONFIG->enable_log_items;
	//$jomresConfig_enable_log_searches		= $CONFIG->enable_log_searches;
	//$jomresConfig_enable_stats			= $CONFIG->enable_stats;
	//$jomresConfig_sef				= $CONFIG->sef;
	//$jomresConfig_vote				= $CONFIG->vote;
	//$jomresConfig_gzip				= $CONFIG->gzip;
	//$jomresConfig_allowUserRegistration	= $CONFIG->allowUserRegistration;
	//$jomresConfig_error_reporting		= $CONFIG->error_reporting;
	//$jomresConfig_error_message		= $CONFIG->error_message;
	//$jomresConfig_link_titles			= $CONFIG->link_titles;
	//$jomresConfig_shownoauth			= $CONFIG->shownoauth;
	//$jomresConfig_useractivation		= $CONFIG->useractivation;
	//$jomresConfig_uniquemail			= $CONFIG->uniquemail;
	//$jomresConfig_admin_site			= $CONFIG->admin_site;

	define('_JOMRES_NEWJOOMLA','1');
	$jomresPath=JOMRESCONFIG_ABSOLUTE_PATH.JRDS."components".JRDS."com_jomres";
	$jomresAdminPath=JOMRESCONFIG_ABSOLUTE_PATH.JRDS."administrator".JRDS."components".JRDS."com_jomres";
	}
else
	{
	global $mosConfig_db,$mosConfig_lang,$mosConfig_absolute_path,$mosConfig_live_site,$mosConfig_sitename,$mosConfig_shownoauth,$mosConfig_useractivation,
		$mosConfig_uniquemail,$mosConfig_offline_message,$mosConfig_lifetime,$mosConfig_MetaDesc,$mosConfig_MetaKeys,$mosConfig_MetaTitle,
		$mosConfig_MetaAuthor,$mosConfig_debug,$mosConfig_locale,$mosConfig_offset,$mosConfig_offset_user,$mosConfig_hideAuthor,$mosConfig_hideCreateDate,
		$mosConfig_hideModifyDate,$mosConfig_hidePdf,$mosConfig_hidePrint,$mosConfig_hideEmail,$mosConfig_enable_log_items,$mosConfig_enable_log_searches,
		$mosConfig_enable_stats,$mosConfig_sef,$mosConfig_vote,$mosConfig_gzip,$mosConfig_multipage_toc,$mosConfig_allowUserRegistration,
		$mosConfig_error_reporting,$mosConfig_error_message,$mosConfig_link_titles,$mosConfig_list_limit,$mosConfig_caching,$mosConfig_cachepath,
		$mosConfig_cachetime,$mosConfig_mailer,$mosConfig_mailfrom,$mosConfig_fromname,$mosConfig_sendmail,$mosConfig_smtpauth,$mosConfig_smtpuser,
		$mosConfig_smtppass,$mosConfig_smtphost,$mosConfig_back_button,$mosConfig_item_navigation,$mosConfig_secret,$mosConfig_pagetitles,$mosConfig_readmore,
		$mosConfig_hits,$mosConfig_icons,$mosConfig_favicon,$mosConfig_fileperms,$mosConfig_dirperms,$mosConfig_helpurl,$mosConfig_mbf_content,$mosConfig_editor;
	global $mosConfig_user,$mosConfig_password,$mosConfig_dbprefix,$mosConfig_host,$mosConfig_offline;

	$jomresConfig_lang = $mosConfig_lang;

	$jomresConfig_offline			= $mosConfig_offline;
	$jomresConfig_db				= $mosConfig_db;
//	$jomresConfig_absolute_path 	= $mosConfig_absolute_path;
	$jomresConfig_live_site 		= $mosConfig_live_site;
	$jomresConfig_sitename 			= $mosConfig_sitename;
	$jomresConfig_shownoauth 		= $mosConfig_shownoauth;
	$jomresConfig_useractivation 	= $mosConfig_useractivation;
	$jomresConfig_uniquemail 		= $mosConfig_uniquemail;
	$jomresConfig_offline_message 	= $mosConfig_offline_message;
	$jomresConfig_lifetime 			= $mosConfig_lifetime;
	$jomresConfig_MetaDesc 			= $mosConfig_MetaDesc;
	$jomresConfig_MetaKeys 			= $mosConfig_MetaKeys;
	$jomresConfig_MetaTitle 		= $mosConfig_MetaTitle;
	$jomresConfig_MetaAuthor 		= $mosConfig_MetaAuthor;
	$jomresConfig_debug 			= $mosConfig_debug;
	$jomresConfig_locale 			= $mosConfig_locale;
	$jomresConfig_offset 			= $mosConfig_offset;
	$jomresConfig_offset_user 		= $mosConfig_offset_user;
	$jomresConfig_hideAuthor 		= $mosConfig_hideAuthor;
	$jomresConfig_hideCreateDate 	= $mosConfig_hideCreateDate;
	$jomresConfig_hideModifyDate 	= $mosConfig_hideModifyDate;
	$jomresConfig_hidePdf 			= $mosConfig_hidePdf;
	$jomresConfig_hidePrint 		= $mosConfig_hidePrint;
	$jomresConfig_hideEmail 		= $mosConfig_hideEmail;
	$jomresConfig_enable_log_items 	= $mosConfig_enable_log_items;
	$jomresConfig_enable_log_searches = $mosConfig_enable_log_searches;
	$jomresConfig_enable_stats 		= $mosConfig_enable_stats;
	$jomresConfig_sef 				= $mosConfig_sef;
	$jomresConfig_vote 				= $mosConfig_vote;
	$jomresConfig_gzip 				= $mosConfig_gzip;
	$jomresConfig_multipage_toc 	= $mosConfig_multipage_toc;
	$jomresConfig_allowUserRegistration = $mosConfig_allowUserRegistration;
	$jomresConfig_error_reporting 	= $mosConfig_error_reporting;
	$jomresConfig_error_message 	= $mosConfig_error_message;
	$jomresConfig_link_titles 		= $mosConfig_link_titles;
	$jomresConfig_list_limit 		= (int)$mosConfig_list_limit;
	$jomresConfig_caching 			= $mosConfig_caching;
	$jomresConfig_cachepath 		= $mosConfig_cachepath;
	$jomresConfig_cachetime 		= $mosConfig_cachetime;
	$jomresConfig_mailer 			= $mosConfig_mailer;
	$jomresConfig_mailfrom 			= $mosConfig_mailfrom;
	$jomresConfig_fromname 			= $mosConfig_fromname;
	$jomresConfig_sendmail 			= $mosConfig_sendmail;
	$jomresConfig_smtpauth 			= $mosConfig_smtpauth;
	$jomresConfig_smtpuser 			= $mosConfig_smtpuser;
	$jomresConfig_smtppass 			= $mosConfig_smtppass;
	$jomresConfig_smtphost 			= $mosConfig_smtphost;
	$jomresConfig_back_button 		= $mosConfig_back_button;
	$jomresConfig_item_navigation 	= $mosConfig_item_navigation;
	$jomresConfig_secret 			= $mosConfig_secret;
	$jomresConfig_pagetitles 		= $mosConfig_pagetitles;
	$jomresConfig_readmore 			= $mosConfig_readmore;
	$jomresConfig_hits 				= $mosConfig_hits;
	$jomresConfig_icons 			= $mosConfig_icons;
	$jomresConfig_favicon 			= $mosConfig_favicon;
	$jomresConfig_fileperms 		= $mosConfig_fileperms;
	$jomresConfig_dirperms 			= $mosConfig_dirperms;
	$jomresConfig_helpurl 			= $mosConfig_helpurl;
	$jomresConfig_mbf_content 		= $mosConfig_mbf_content;
	$jomresConfig_editor 			= $mosConfig_editor;
	$jomresConfig_user	 			= $mosConfig_user;
	$jomresConfig_password	 		= $mosConfig_password;
	$jomresConfig_dbprefix			= $mosConfig_dbprefix;
	$jomresConfig_host				= $mosConfig_host;
	//$jomresConfig_CMSVERSION		= "J1.0.10";

	$jomresPath=JOMRESCONFIG_ABSOLUTE_PATH.JRDS."components".JRDS."com_jomres";
	$jomresAdminPath=JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'administrator'.JRDS.'components'.JRDS.'com_jomres';
	}

$jomres_db_querylog=array();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'media'.JRDS.'jomres_licensekey.php') ) // Legacy
	require_once(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'media'.JRDS.'jomres_licensekey.php');
else
	{
	if (!strstr($scriptname,'install_jomres.php'))
		{
		$query="SELECT value FROM #__jomres_settings WHERE property_uid LIKE '0' AND akey LIKE 'jomres_licensekey' LIMIT 1";
		$license_key=doSelectSql($query,1);
		}
	else  // We're running install_jomres.php
		{
		$license_key=jomresGetParam($_POST,'lkey','');
		$task="showSiteConfig";
		}
	}
$bang=explode("-",$license_key);
if (isset($bang[2]) )
	$product_id=$bang[2];
if ($product_id != "20")
	checkLicense($license_key,$scriptname);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$jomresConfig_dbtype = 'mysql';
if (!function_exists ('adodb_date_test_date') )
	{
	define('JOMRES_CMS', 'joomla' );
	if (strstr($scriptname,'install_jomres.php'))
		require_once(JOMRESINSTALLPATH_BASE.JRDS.'components'.JRDS.'com_jomres'.JRDS.'libraries'.JRDS.'adodb'.JRDS.'adodb-time.inc.php');
	else
		require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'adodb'.JRDS.'adodb-time.inc.php');
	}
else
	define('JOMRES_CMS', 'elexismambo' );

global $_VERSION;
if (is_null($_VERSION) )
	{
	if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'includes'.JRDS.'version.php'))
		{
		require_once(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'includes'.JRDS.'version.php');
		$_VERSION = new version();
		}
	else
		{
		$_VERSION = new stdClass;
		$_VERSION->PRODUCT = "Joomla!";
		$_VERSION->RELEASE = "1.5";
		}
	}

define('CMSVER',$_VERSION->PRODUCT.$_VERSION->RELEASE);

if ($timetracking)
	{
	$timereport = array();
	$timekeeper = start_track("jomres_initialisation", $timekeeper);
	}
	
if (!class_exists('patTemplate') )
	require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'phptools'.JRDS.'patTemplate.php');
if (!class_exists('patErrorManager') )
	require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'phptools'.JRDS.'patErrorManager.php');

require_once(JOMRESPATH_BASE.JRDS.'jomres_config.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'PHPMailer_v2.0.0'.JRDS.'class.phpmailer.php');

require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'functions.php');

require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'tempbookinghandler.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'currencyformat.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'contenttabs.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'configpanel.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'toolbar.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'images.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'paging.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'booking.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'crate.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'general.classes.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'property.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'user.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'cpanel.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'dobooking.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'search.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'pathway.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'dashboard.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'jomresxmlparser.class.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'minicomponent_registry.class.php');

require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'countries.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'imagehandling.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'general.functions.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'crate.functions.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'booking.functions.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'property.functions.php');
require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'functions'.JRDS.'user.functions.php');

if ($timetracking)
	{
	$timereport = end_track("jomres_initialisation", $timekeeper, $timereport);
	time_report($timereport);
	}

$jrConfig=getSiteSettings();

if (isset($_REQUEST['lang']) )
	$jomresConfig_lang				=(string)jomresGetParam( $_REQUEST, 'lang', "" );
else
	{
	if (isset($_COOKIE['mbfcookie']) )
		$jomresConfig_lang				=(string)RemoveXSS($_COOKIE['mbfcookie']['lang']);
	else
		{
		if (isset($_COOKIE['jfcookie']) && file_exists(JOMRESCONFIG_ABSOLUTE_PATH.JRDS."components".JRDS."com_joomfish".JRDS."joomfish.php")  )
			$jomresConfig_lang				=(string)RemoveXSS($_COOKIE['jfcookie']['lang']);
		else
			$jomresConfig_lang				=substr($jrConfig['siteLang'], 0 ,strlen($jrConfig['siteLang'])-4) ;
		}
	}
// loads en language file by default
if ($jomresConfig_lang=='')
	$jomresConfig_lang = 'en-GB';


$MiniComponents = new mcHandler();
$MiniComponents->triggerEvent('00001'); // Start

require_once(JOMRESPATH_BASE.JRDS.'libraries'.JRDS.'jomres'.JRDS.'classes'.JRDS.'remote.class.php');

if (!defined('JOMRES_TEMPLATEPATH_FRONTEND'))
	define('JOMRES_TEMPLATEPATH_FRONTEND',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."frontend");
if (!defined('JOMRES_TEMPLATEPATH_BACKEND'))
	define('JOMRES_TEMPLATEPATH_BACKEND',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."backend");
if (!defined('JOMRES_TEMPLATEPATH_ADMINISTRATOR'))
	define('JOMRES_TEMPLATEPATH_ADMINISTRATOR',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."administrator");

define('JOMRES_SYSTEMLOG_PATH',$jrConfig['jomres_systemLog_path']);
set_error_handler('errorHandler');
jomres_parseRequest();


if ( JOMRES_CMS == 'elexismambo')
	$database = new database( $jomresConfig_host, $jomresConfig_user, $jomresConfig_password, $jomresConfig_db, $jomresConfig_dbprefix, $jomresConfig_dbtype );

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($product_id != "20" )
	checkPropertyNumbers($license_key);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// In case somebody removes the above liines, we still need to set this define otherwise folks will not be able to create new properties
if (!defined('JOMRES_SINGLEPROPERTY'))
	define('JOMRES_SINGLEPROPERTY',false);


// Stops here

function jomresURL($link, $ssl=2)
	{
	global $jrConfig;
	if (!$jrConfig['isInIframe'] )
		{
		if (!defined('_JOMRES_NEWJOOMLA') )
			{
			if (!function_exists('sefRelToAbs') )
				require_once(JOMRESCONFIG_ABSOLUTE_PATH.JRDS."includes".JRDS."sef.php");
			$link=sefRelToAbs($link);
			if ($ssl == 1)
				$link	= str_replace("http://","https://",$link);
			else
				$link	= str_replace("https://","http://",$link);
			}
		else 
			{
			jimport('joomla.application.helper');
			if (class_exists('JRoute') )
				{
				$link	=  JRoute::_( $link, $xhtml = true, $ssl );
				}
			}
		}
	else
		{
		$link=str_replace("index.php","index2.php",$link);
		}
	$link=str_replace("&amp;","&",$link);
	$link=str_replace("&","&amp;",$link);
	return $link;
	}

// Called by, eg, $output['TOKEN']='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';
function jomresSetToken()
	{
	$token = md5(uniqid(rand(), TRUE));
	if (!@session_start())
		{
		ini_set('session.save_handler', 'files');
		session_start();
		}
	$_SESSION['jomresValidTokens'][] = $token;
	session_write_close();
	return $token;
	}

function jomresURLToken()
	{
	$t=jomresSetToken();
	return "&jomrestoken=".$t;
	}

// if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
function jomresCheckToken()
	{
	if (!@session_start())
		{
		ini_set('session.save_handler', 'files');
		session_start();
		}
	if (in_array($_REQUEST['jomrestoken'], $_SESSION['jomresValidTokens']))
		{
		$t=$_REQUEST['jomrestoken'];
		$idx=array_search($t,$_SESSION['jomresValidTokens']);
		unset($_SESSION['jomresValidTokens'][$idx]);
		session_write_close();
		return true;
		}
	session_write_close();
	return false;
	}

function jomres_parseRequest()  // A simple request parser to check that mosConf.... isn't in the request string.
	{
	// %6D%6F%73%43%6F%6E%66 = mosConf : urlencode
	// %6D%72%43%6F%6E%66%69%67  mrConfig hex
	//%6A%72%43%6F%6E%66%69%67  jrConfig hex
	foreach ($_REQUEST as $key=>$val)
		{
		$ex_base64 = base64_decode($val);
		if (gettype($val)=="string")
			{
			if (strstr($key,"mosConf") || strstr($val,"mosConf") || strstr($ex_base64,"mosConf") || stristr($val,"%6D%6F%73%43%6F%6E%66" ))
				{
				trigger_error ("Hack attempt", E_USER_ERROR);
				}
			if (strstr($key,"mrConfig") || strstr($val,"mrConfig") || strstr($ex_base64,"mrConfig") || stristr($val,"%6D%72%43%6F%6E%66%69%67" ))
				{
				trigger_error ("Hack attempt", E_USER_ERROR);
				}
			if (strstr($key,"jrConfig") || strstr($val,"jrConfig") || strstr($ex_base64,"jrConfig") || stristr($val,"%6A%72%43%6F%6E%66%69%67" ))
				{
				trigger_error ("Hack attempt", E_USER_ERROR);
				}
			}
		}
	}

function initRemoveXSS($ra1,$ra2)
	{
	$merged=array_merge($ra1,$ra2);
	$base64=array();
	foreach ($merged as $m)
		{
		$base64[]=base64_encode($m);
		}
	return array($base64);
	}

function RemoveXSS($val)
	{
	global $ra1,$ra2,$convertedRAs,$lessThans;
	$val=stripslashes($val);
	// First let's  replace all the possible less than symbols with the real thing <
	$val=str_ireplace($lessThans,"",$val);
	// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
	// this prevents some character re-spacing such as <java\0script>
	// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
	$val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

	foreach ( $convertedRAs as $naughty)
		{
		$val=str_ireplace($naughty,"",$val);
		}

	// Vince's additions
	$vinces=array();
	$vinces[]="&#x0A;"; //  <IMG SRC="jav&#x0A;ascript:alert('XSS');">  Embeded newline to break up XSS.
	$vinces[]="&#x0D;"; // <IMG SRC="jav&#x0D;ascript:alert('XSS');">  Embedded carriage return to break up XSS
	$vinces[]="&#14;"; //  <IMG SRC=" &#14;  javascript:alert('XSS');"> Spaces and meta chars before the JavaScript in images for XSS
	$vinces[]="%53%43%52%49%50%54"; // URL:
	$vinces[]="&#x53;&#x43;&#x52;&#x49;&#x50;&#x54;"; // HTML (with semicolons):
	$vinces[]="&#83&#67&#82&#73&#80&#84"; // HTML (without semicolons):
	$vinces[]="&#x26;&#x23;&#x78;&#x36;&#x41;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x31;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x36;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x31;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x33;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x33;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x32;&#x3B;&#x26;&#x23;&#x78;&#x36;&#x39;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x30;&#x3B;&#x26;&#x23;&#x78;&#x37;&#x34;&#x3B;"; // Javascript hex * 2

	$vinces[]='SIZE="&{'; // <BR SIZE="&{alert('XSS')}">	& JavaScript includes (works in Netscape 4.x):
	$vinces[]='/*'; // <IMG STYLE="xss:expr/*XSS*/ession(alert('XSS'))"> STYLE attribute using a comment to break up expression
	$vinces[]='*/'; // <IMG STYLE="xss:expr/*XSS*/ession(alert('XSS'))"> STYLE attribute using a comment to break up expression
	$vinces[]='<!--'; // <IMG STYLE="xss:expr/*XSS*/ession(alert('XSS'))"> STYLE attribute using a comment to break up expression
	$vinces[]='-->'; // <IMG STYLE="xss:expr/*XSS*/ession(alert('XSS'))"> STYLE attribute using a comment to break up expression
	$vinces[]='<!-- -->'; // <XML ID="xss"><I><B>&lt;IMG SRC="javas<!-- -->cript:alert('XSS')"  data island with comment obfuscation
	//$vinces[]='�?'; // US-ASCII encoding (found by Kurt Huwig). This uses malformed ASCII encoding with 7 bits instead of 8.	//borks apache
	//$vinces[]='¥'; //US-ASCII encoding (found by Kurt Huwig). This uses malformed ASCII encoding with 7 bits instead of 8.	//borks apache
	//$vinces[]='ó'; // US-ASCII encoding (found by Kurt Huwig). This uses malformed ASCII encoding with 7 bits instead of 8.	 //borks apache
	$vinces[]="?_url"; //  open redirector exploit


	$val=str_ireplace($vinces,"",$val);
	$val=str_replace(array("\r","\t","\n"),"" , $val);
	// end vinces

	// straight replacements, the user should never need these since they're normal characters
	// this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';
	for ($i = 0; $i < strlen($search); $i++)
		{
		// ;? matches the ;, which is optional
		// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

		// &#x0040 @ search for the hex values
		$val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
		// &#00064 @ 0{0,7} matches '0' zero to seven times
		$val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
		}

	// now the only remaining whitespace attacks are \t, \n, and \r

	$ra = array_merge($ra1, $ra2);
	$found = true; // keep replacing as long as the previous round replaced something
	while ($found == true)
		{
		$val_before = $val;
		for ($i = 0; $i < sizeof($ra); $i++)
			{
			$pattern = '/';
			for ($j = 0; $j < strlen($ra[$i]); $j++)
				{
				if ($j > 0)
					{
					$pattern .= '(';
					$pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
					$pattern .= '|(&#0{0,8}([9][10][13]);?)?';
					$pattern .= ')?';
					}
				$pattern .= $ra[$i][$j];
				}
			$pattern .= '/i';
			$replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
			$val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
			if ($val_before == $val)
				{
				// no replacements were made, so exit the loop
				$found = false;
				}
			}
		}
	$val=addslashes($val);
	return $val;
	}


function jomresGetParam($request,$element,$def=null,$mask='')	// variable type not used
	{
	
	global $R;
	global $jrConfig;
	//echo $element .' - ';
	if (isset($request[$element]) )
		$dirty=$request[$element];
	else
		return $def;
	//var_dump($dirty);
	$clean=null;
	if (is_null($dirty))
		$dirty=$def;
	$type=$R[gettype($def)];
	switch ($type)
		{
		case ('float') :
			$clean = (float) $dirty;
			break;
		case ('int') :
			$clean = (int) $dirty;
			break;
		case ('boolean') :
			$clean = (bool) $dirty;
			break;
		case ('object') :
			$clean = (object) $dirty;
			break;
		case ('null') :
			$clean = null;
			break;
		case ('array') :
			$tmp = (array) $dirty;
			$clean=array();
			foreach($tmp as $key1=>$val1)
				{
				if(is_array($key1))
					{
					foreach($key1 as $key2=>$val2)	// if the field value is an array, step through it
						{
						$k=(int)$key2;
						$v=(int)$val2;
						$clean[$k]=$v;
						}
					}
				else
					{
					$k=(int)$key1;
					$v=(int)$val1;
					$clean[$k]=$v;
					}
				}
			break;
		default :	// treat everything else as a string.
			$dirty = (string) $dirty;
			global $jomres_db;
			if ( is_null($jomres_db) )
				$jomres_db = new jomres_database();
			$clean=getEscaped( RemoveXSS($dirty) );
			if ($jrConfig['allowHTMLeditor']=="0")	// _MOS_ALLOWHTML = 2 allows html
				$clean =strip_tags ($dirty);
			break;
		}
	return $clean;
	}


function getEscaped( $text ) {
	$text=str_replace("'","&#39;",$text);
	//$text=str_replace('"',"&quot;",$text);
	if (!get_magic_quotes_gpc())
		return mysql_real_escape_string( $text );
	else
		return $text;
	}

/**
 * @return string
 * @param string
 * @desc Strip forbidden tags and delegate tag-source check to removeEvilAttributes()
 */
 // src http://uk2.php.net/manual/en/function.strip-tags.php#36574
/*
function removeEvilTags($source)
	{
	global $jrConfig;

	//$source = strip_tags($source, $jrConfig['allowedTags']);
	$txt = removeEvilAttributes($source);
	//$txt = preg_replace('/<(.*?)>/ie', "'<'.removeEvilAttributes('\\1').'>'", $source);
	if (strlen($txt) > 0)
		$txt = strip_tags_except($txt, $jrConfig['allowedTags'], $strip=TRUE);
	return $txt;
	}
*/

/**
 * @return string
 * @param string
 * @desc Strip forbidden attributes from a tag
 */
/*function removeEvilAttributes($tagSource)
	{
	global $jrConfig;
	//$stripAttrib=$jrConfig['stripAttrib'];
	$badAttribsArr=explode("|",$jrConfig['stripAttrib']);
	foreach ($badAttribsArr as $badAttrib)
		{
		$pos = strpos($tagSource, $badAttrib);
		if ($pos === true)
			{
			return "";
			}
		}
	return $tagSource;
	}*/

/**
* @return
 * @param string
* @param array
* @param boolean
* @desc Function strip_tags_except() works similarly to strip_selected_tags() function but instead of allowing the user to specify the tags to strip, she can specify the tags to allow and strip all others. The third parameter, $strip, when TRUE removes "<" and ">" from the string and when FALSE converts them to "&lt;" and "&gt;" respectively.
*/
// http://uk2.php.net/manual/en/function.strip-tags.php#73435
function strip_tags_except($text,$strip=TRUE)
	{
	global $jrConfig;
	$all_tags=array();

	$allowedTags=explode("|",$jrConfig['allowedTags']);
	if (!is_array($allowedTags))
		return $text;

	if (!count($allowedTags))
		return $text;
	$open = $strip ? '' : '&lt;';
	$close = $strip ? '' : '&gt;';

	preg_match_all('!<\s*(/)?\s*([a-zA-Z]+)[^>]*>!',
		$text, $all_tags);

	//$complete_tags=$all_tags[0];
	array_shift($all_tags);
	$slashes = $all_tags[0];
	$all_tags = $all_tags[1];

	foreach ($all_tags as $i => $tag)
		{
		if (in_array("<".strtolower($tag).">", $allowedTags))
			{
			continue;
			}
		$text =
			preg_replace('!<(\s*' . $slashes[$i] . '\s*' .
				$tag . '[^>]*)>!', $open . '$1' . $close,
				$text);
		}
	return $text;
	}

function jomresToolTips($txt)
	{
	global $jomresConfig_live_site;
	if (defined('_JOMRES_NEWJOOMLA') )
		$ret='<a href="#" onmouseover="return overlib(\''.$txt.'\', ABOVE, RIGHT);" onmouseout="return nd();" ><img src="'.$jomresConfig_live_site."/".'components'."/".'com_jomres'."/".'images'."/".'SymbolInformation.png" height="12" width="12" border="0" alt="tooltip"/></a>';
	else
		$ret=mosToolTip($txt);
	return $ret;
	}

function parseByBots($str)
	{
	$output="";
	if (defined('_JOMRES_NEWJOOMLA') )
		{
		$limitstart = 0;
		$dispatcher	=& JDispatcher::getInstance();
		JPluginHelper::importPlugin('content');
		$obj = new stdClass;
		$obj->text=$str;
		$output = $dispatcher->trigger('onPrepareContent', array (&$obj, & $params, $limitstart));
		$output= $obj->text;
		}
	else
		{
		global $_MAMBOTS;
		$page = 0;
		$_MAMBOTS->loadBotGroup( 'content' );
		$obj = new stdClass;
		$obj->text=$str;
		$params =	new dummy_params_class();
		$_MAMBOTS->trigger( 'onPrepareContent', array( &$obj, &$params, $page ), true );
		$output= $obj->text;
		}
	return $output;
	}

class dummy_params_class
	{
	function get()
		{
		$a=0;
		}
	}

function mailJomresdotnet($message)
	{
	global $jomresConfig_live_site,$jomresConfig_sitename,$jomresConfig_mailfrom;
	if (jomresGetDomain() != "locahost")
		{
		$to = "bugs@jomres.net ";
		$subject = "Error report from ".$jomresConfig_sitename;
		$from = $jomresConfig_mailfrom;

		$body = " on ".date('d/m/Y');
		$body .= " at ".date('g:i A')."\n\nDetails:\n";
		$body .= "Server details follow\n\n";
		$body .= "Livesite: ".$jomresConfig_live_site."\n";
		$body .= "Site name: ".$jomresConfig_sitename."\n";
		$body .= "Users email address: ".$jomresConfig_mailfrom."\n";
		$body =	$message."\n";
		jomresMailer( $from, $jomresConfig_sitename, $to, $subject, $body,0);
		}
	}

function stripUnwanted($text)
	{
	$theLen=strlen();
	if (!strncasecmp($result,$text,$theLen)) {
		$text="";
		}
	return $text;
	}

/**
#
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
#
*/
function checkUserIsManager()
		{
		global $thisJRUser;
		$userIsManager=$thisJRUser->userIsManager;
		return $userIsManager;
		}

function doSelectSql($query,$mode=FALSE)
	{
	global $jomres_db,$mrConfig;
	global $jomres_db_querylog;
	global $MiniComponents;
	if (isset($MiniComponents->currentEvent) )
		$jomres_db_querylog[]="<font size=\"-3\"  color=\"red\">".$query."</font><br/><font size=\"-5\">".$MiniComponents->currentEvent."</font>";
	if ( is_null($jomres_db) )
		$jomres_db = new jomres_database();
	$jomres_db->setQuery($query);
	$result = $jomres_db->loadObjectList();
	$num=count($result);
	if ($mrConfig['errorCheckingShowSQL']) echo $query."<br>";
	switch ($mode)
		{
		case 1:
			// Mode 1. The calling function expects 1 row with 1 element in it. Returns a string
			if ($num==1)
				{
				$jomres_db->setQuery( $query );
				$result = $jomres_db->loadResult();
				}
			else
				return FALSE;
		break;
		case 2:
			// Mode 2. The calling function expects 1 row with elements in it. Returns an associative array
			if ($num>1)
				{
				echo "Error, more than one result returned. One expected. Stop.";
				exit;
				}
			$jomres_db->setQuery( $query );
			$result = $jomres_db->loadObjectList();
			$ob=$result[0];
			if (count($ob)==0)
				{
				return FALSE;
				}
			else
				{
				foreach ($ob as $k=>$v)
					{
					$arr[$k]=$v;
					}
				$result=$arr;
				}
		break;
		default:
			// Yer bog standard query
			if ($mrConfig['errorCheckingShowSQLvardump']) echo "<br /><b>".var_dump($result)."</b><br />";
		break;
		}
	if ($num>0)
		return $result;
	else
		return array();
	}


function doInsertSql($query,$op)
	{
	global $jomres_db,$mrConfig;
	global $jomres_db_querylog;
	global $MiniComponents;
	$jomres_db_querylog[]="<font size=\"-3\"  color=\"red\">".$query."</font><br/><font size=\"-5\">".$MiniComponents->currentEvent."</font>";
	// Called doInsertSql, the title is not quite correct as this function also handles updates and deletes
	// We'll use the lack of text in $op as a way of indicating that we don't want this operation logged
	// This way we can call the audit directly from the insert internet booking function
	// rather than logging EVERYTHING that's done by the function.
	//echo $query."<br />";
	if ( is_null($jomres_db) )
		{
		$jomres_db = new jomres_database();
		}
	if ($mrConfig['errorCheckingShowSQL']) echo $query."<br>";
	$jomres_db->setQuery($query);
	if (!$jomres_db->query())
		{
		error_logging("Do insert failed :: ".$jomres_db->error." ".$query);
		return FALSE;
		}
	else
		{
		$thisID=mysql_insert_id();
		if ($op!="")
			audit($query,$op);
		if ($thisID)
			return $thisID;
		else
			return TRUE;
		}
	}

function doSql($query)
	{
	global $jomres_db,$mrConfig;
	if ( is_null($jomres_db) )
		$jomres_db = new jomres_database();
	if ($mrConfig['errorCheckingShowSQL']) echo $query."<br>";
	$jomres_db->setQuery($query);
	if (!$jomres_db->query())
		return FALSE;
	else
		return TRUE;
	}

class jomres_database
	{
	function jomres_database()
		{
		global $jomresConfig_user,$jomresConfig_password,$jomresConfig_dbprefix,$jomresConfig_host,$jomresConfig_db;
		$this->system_tables=array();
		$this->queryLog=array();
		$this->error = null;
		mysql_connect($jomresConfig_host,$jomresConfig_user,$jomresConfig_password) or die('Could not connect ' . mysql_error());
		mysql_select_db($jomresConfig_db) or die('Could not select database');
		$this->db_prefix=$jomresConfig_dbprefix;
		}

	function query()
		{
		$result = mysql_query($this->query);
		if ($result)
			return $result;
		else
			{
			$this->error = mysql_error();
			return false;
			}
		}

	function setQuery($query)
		{

		$q = str_replace("#__",$this->db_prefix,$query);
		$this->query=$q;
		$this->queryLog[]=$q;
		}

	function loadObjectList()
		{
		if (strlen($this->query)==0)
			{
			return null;
			}
		$array = array();
		$result = mysql_query($this->query);
		//var_dump($this->query);exit;
		if ($result)
			{
			while ($row = mysql_fetch_object( $result ))
				{
				$array[] = $row;
				}
			mysql_free_result( $result );
			}
		return $array;
		}

	function loadResult()
		{
		if (!($result = $this->query())) {
			return null;
		}
		$retval = null;
		if ($row = mysql_fetch_row( $result )) {
			$retval = $row[0];
		}
		mysql_free_result( $result );
		return $retval;
		}
	}


function audit($query,$op)
	{
	global $thisJRUser;
	global $jrConfig;
	if ($jrConfig['disableAudit']!="1")
		{
		$ipstuff=getEscaped($_SERVER['REMOTE_ADDR']);
		$id=$thisJRUser->userid;
		$defaultProperty=getDefaultProperty();
		$noquotesquery=str_replace("'"," ",$query." :IP: ".$ipstuff);
		$noquotesquery=str_replace("`"," ",$noquotesquery);
		$urldquery=htmlentities($noquotesquery);
		$query = "INSERT INTO #__jomres_audit (date,time,owner,op,args,property_uid) VALUES (NOW(),NOW(),'$id','$op','$urldquery','
".(int)$defaultProperty."')";
		doInsertSql($query,'');
		}
	}

function getDefaultProperty()
	{
	global $thisJRUser;
	$defaultProperty=$thisJRUser->currentproperty;
	return (int)$defaultProperty;
	}

function getPropertyNameNoTables($property_uid)
	{
	global $propertyNamesArray;
	$query = "SELECT property_name FROM #__jomres_propertys WHERE propertys_uid = '".(int)$property_uid."'";
	$propertysList =doSelectSql($query);
	foreach ($propertysList as $propertys)
		{
		$propertyName = $propertys->property_name;
		}
	$propertyNamesArray[]=$propertyName;
	return $propertyName;
	}

//----------------------------------------
//-T E X T	M O D I F I C A T I O N	 ----
//----------------------------------------

function editCustomTextAll()
	{
	global $mrConfig,$jomresConfig_lang;
	$mrConfig['editingOn']="1";
	$allDefinedContants=get_defined_constants();
	$jomresConstants=array();
	foreach ($allDefinedContants as $key=>$value)
		{
		if (substr($key,0,7)=="_JOMRES")
			$jomresConstants[$key]=$value;
		if (substr($key,0,7)=="_JOMCOMP")
			$jomresConstants[$key]=$value;
		}
	$mrConfig['editingOn']="1";
	foreach ($jomresConstants as $key=>$value)
		{
		if ($jomresConfig_lang == "en")
			echo jr_gettext($key,$value)."&nbsp;&nbsp;::&nbsp;&nbsp;".$key;
		else
			echo jr_gettext($key,$value,true,FALSE)."&nbsp;&nbsp;::&nbsp;&nbsp;".$key;
		echo "<br>";
		}
	}

function jr_gettext($theConstant,$theValue,$okToEdit=TRUE,$isLink=FALSE)
	{
	global $mrConfig,$property_uid,$thisJRUser,$customTextArray,$jomresConfig_live_site,$jomresMetadataArray,$jrConfig;
	global $jomresConfig_lang,$task;
	if (isset($thisJRUser->accesslevel))
		$accessLevel=$thisJRUser->accesslevel;
	else
		$accessLevel=0;
	$theText=$theValue;
	$defaultText="";
	$br="";
	if ($task=="editCustomTextAll")
		$br="<br>";

	if (count($customTextArray)>0)
		{
		if (array_key_exists($theConstant,$customTextArray) )
			{
			$theText=stripslashes($customTextArray[$theConstant]);
			}
		else
			{
			$theText=$theValue;
			$defaultText=$theValue;
			}
		}
	if (isset($thisJRUser))
		{
		if ($thisJRUser->userIsManager && ($mrConfig['editingOn'] || ($jrConfig['editingModeAffectsAllProperties'] == "1" && $thisJRUser->superPropertyManager == true ) ) && $okToEdit && ($accessLevel ==2))
			{
			if (strlen(trim($theText))==0 || strtolower(trim($theText)) == "<span></span>" || strtolower(trim($theText)) == "<span> </span>" || strtolower(trim($theText)) == "<span>  </span>")
				$theText="xxxxxxxxx";
			$indexphp="index.php";
			$title=' title="'._JOMRES_COM_MR_VRCT_ROOM_LINKTEXT.'" ';
			$defaultText=substr($defaultText,0,100);
			if ($isLink)
				{
				//$status = 'status=no,toolbar=yes,scrollbars=no,titlebar=no,menubar=yes,resizable=yes,width=500,height=500,directories=no,location=no';
				$link = $jomresConfig_live_site .'/'.$indexphp.'?option=com_jomres&task=editCustomText&lng='.$jomresConfig_lang.'&theConstant='.$theConstant."&property_uid=".$property_uid;
				$editingLink="<a class=\"jomrestexteditable\" $title href=\"$link\" target=\"_blank\" ><img src=\"components/com_jomres/images/labeledit.png\" width=\"10\" height=\"10\" border=\"0\"></a>";
				$theText=$editingLink.$theText;
				}
			else
				{
				//$status = 'status=no,toolbar=yes,scrollbars=no,titlebar=no,menubar=yes,resizable=yes,width=500,height=500,directories=no,location=no';
				$link = $jomresConfig_live_site .'/'.$indexphp.'?option=com_jomres&task=editCustomText&raw=1&popup=1&lng='.$jomresConfig_lang.'&theConstant='.$theConstant."&property_uid=".$property_uid;
				$editingLink="<a class=\"jomrestexteditable\" $title href=\"$link\" target=\"_blank\" >$theText</a>";
				$theText=$editingLink.$br;
				}
			}
		}

	$jomresMetadataArray[]=$theText;
	switch ($jrConfig['utfHTMLdecode'])
		{
		case 0:
			return html_entity_decode($theText);
			break;
		case 1:
			return jomres_html_entity_decode_utf8($theText);
			break;
		case 2:
		default:
			return $theText;
		}
	}

function editCustomText()
	{
	global $jomresConfig_live_site,$jomresConfig_lang,$jrConfig;
	$theConstant = jomresGetParam( $_REQUEST, 'theConstant', '' );
	$defaultText = jomresGetParam( $_REQUEST, 'defaultText', '', _MOS_ALLOWHTML );
	$property_uid=(int)getDefaultProperty();
	$query="SELECT customtext FROM #__jomres_custom_text WHERE constant = '$theConstant' and property_uid = '0' AND language = '$jomresConfig_lang'";
	$customTextList=doSelectSql($query);
	$theText = false;
	if (count($customTextList))
		{
		foreach ($customTextList as $text)
			{
			$theText=stripslashes($text->customtext);
			}
		}
	$query="SELECT customtext FROM #__jomres_custom_text WHERE constant = '$theConstant' and property_uid = '".(int)$property_uid."' AND language = '$jomresConfig_lang'";
	$textList=doSelectSql($query);
	if (count($textList)==1)
		{
		foreach ($textList as $text)
			{
			$theText=stripslashes($text->customtext);
			}
		}
	if (!$theText)
		$theText=urldecode($defaultText);

	if (strlen($theText)==0)
		$theText=stripslashes(constant($theConstant));
	$jrtbar = new jomres_toolbar();
	$jrtb	= $jrtbar->startTable();
	if ($jrConfig['allowHTMLeditor'] != "2" && $jrConfig['allowHTMLeditor'] != "3")
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'saveCustomText');
	$jrtb .= $jrtbar->toolbarItem('cancel','javascript:window.close();','');
	$jrtb .= $jrtbar->endTable();
	$output['JOMRESTOOLBAR']=$jrtb;
	$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
	$output['HCURRENTTEXT']=_JOMRES_COM_A_EDITING_CURRENTTEXT;
	$output['HNEWTEXT']=_JOMRES_COM_A_EDITING_NEWTEXT;
	$output['PROPERTYUID']=$property_uid;
	$output['THECONSTANT']=$theConstant;
	$output['CURRENTTEXT']=$theText;
	if ($jrConfig['allowHTMLeditor']=="1" || $jrConfig['allowHTMLeditor']=="2" || $jrConfig['allowHTMLeditor'] == "3")
		{
		if ($jrConfig['allowHTMLeditor'] == "1")
			{
			$width="450";
			$height="250";
			$col="20";
			$row="10";
			$tmpTxt=editorAreaText( 'newtext', stripslashes($theText), 'newtext', $width, $height, $col, $row );
			}
		if ($jrConfig['allowHTMLeditor'] == "2" || $jrConfig['allowHTMLeditor'] == "3")
			{
			$tmpTxt= flashArea('newtext', stripslashes($theText));
			}
		}
	else
		{
		$tmpTxt='<textarea class="inputbox" cols="40" rows="6" name="newtext">'.$theText.'</textarea>';
		}

	$output['NEWTEXT']=$tmpTxt;
	$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';

	$pageoutput[]=$output;

	$tmpl	=	new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
	$tmpl->readTemplatesFromInput( 'edit_custom_text.html' );
	$tmpl->addRows( 'pageoutput', $pageoutput );
	$tmpl->displayParsedTemplate();
	}

function saveCustomText()
	{
	global $jrConfig;
	if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
	$property_uid=(int)getDefaultProperty();
	if ($jrConfig['allowHTMLeditor'] == "1")
		{
		$customText = jomresGetParam( $_POST, 'newtext', "" , _MOS_ALLOWHTML );
		$theConstant = jomresGetParam( $_POST, 'theConstant', '' );
		}
	else
		{
		$customText = jomresGetParam( $_POST, 'newtext', '','string' );
		$theConstant = jomresGetParam( $_POST, 'theConstant', '' );
		}
	$result=updateCustomText($theConstant,$customText,$property_uid);
	if ($result)
		{
		$tmpl	=	new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'save_custom_text.html' );
		$tmpl->displayParsedTemplate();
		}
	else
		echo "Error, no data to save";
	}

function updateCustomText($theConstant,$theValue,$audit=TRUE)
	{
	global $jomresConfig_lang,$jrConfig,$thisJRUser;
	$testStr= trim(strip_tags_except($theValue));
	$crsEtc=array("\t","\n","\r");
	$testStr=str_replace($crsEtc,"",$testStr);
	if (strlen($testStr)==0)
		return false;
	if ($jrConfig['editingModeAffectsAllProperties'] == "1" && $thisJRUser->superPropertyManager == true )
		$property_uid=0;
	else
		$property_uid=(int)getDefaultProperty();
	//$theValue=htmlentities($theValue);
	$query="SELECT customtext FROM #__jomres_custom_text WHERE constant = '".$theConstant."' and property_uid = '".(int)$property_uid."' AND language = '$jomresConfig_lang'";
	$textList=doSelectSql($query);
	if (strlen($theValue)==0)
		{
		$query="DELETE FROM	#__jomres_custom_text WHERE constant = '".$theConstant."' AND property_uid = '".(int)$property_uid."' AND language = '$jomresConfig_lang'";
		}
	else
		{
		if (count($textList)<1)
			$query="INSERT INTO #__jomres_custom_text (`constant`,`customtext`,`property_uid`,`language`) VALUES ('".$theConstant."','".$theValue."','".(int)$property_uid."','$jomresConfig_lang')";
		else
			$query="UPDATE #__jomres_custom_text SET `customtext`='".$theValue."' WHERE constant = '".$theConstant."' AND property_uid = '".(int)$property_uid."' AND language = '$jomresConfig_lang'";
		}
	if ($audit)
		$audit=_JOMRES_MR_AUDIT_UPDATECUSTOMTEXT;
	doInsertSql($query,$audit);
	return true;
	}

function jomres_html_entity_decode_utf8($string)
	{
	static $trans_tbl;
	// replace numeric entities
	$string = preg_replace('~&#x([0-9a-f]+);~ei', 'jomres_code2utf(hexdec("\\1"))', $string);
	$string = preg_replace('~&#([0-9]+);~e', 'jomres_code2utf(\\1)', $string);

	// replace literal entities
	if (!isset($trans_tbl))
		{
		$trans_tbl = array();
		foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
			$trans_tbl[$key] = utf8_encode($val);
		}
	return strtr($string, $trans_tbl);
	}

// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
function jomres_code2utf($num)
	{
	if ($num < 128) return chr($num);
	if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
	if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
	return '';
	}

function jomresGetDomain()
	{
	$thisSvrName=$_SERVER['SERVER_NAME'];
	$dmn=str_replace("http://www.","",$thisSvrName);
	$domain=str_replace("www.","",$dmn);
	//echo "<H2>Found domain".$domain."</H2>";
	return strtolower($domain);
	}

function parseConfiguration()
	{
	ob_start();
	phpinfo(INFO_CONFIGURATION);
	$s = ob_get_contents();
	ob_end_clean();
	$s = strip_tags($s,'<h2><th><td>');
	$s = preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$s);
	$s = preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$s);
	$vTmp = preg_split('/(<h2>[^<]+<\/h2>)/',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
	$vModules = array();
	for ($i=1;$i<count($vTmp);$i++)
		{
		if (preg_match('/<h2>([^<]+)<\/h2>/',$vTmp[$i],$vMat))
			{
			$vName = trim($vMat[1]);
			$vTmp2 = explode("\n",$vTmp[$i+1]);
			foreach ($vTmp2 AS $vOne)
				{
				$vPat = '<info>([^<]+)<\/info>';
				$vPat3 = "/$vPat\s*$vPat\s*$vPat/";
				$vPat2 = "/$vPat\s*$vPat/";
				if (preg_match($vPat3,$vOne,$vMat))
					{ // 3cols
					$vModules[$vName][trim($vMat[1])] = array(trim($vMat[2]),trim($vMat[3]));
					} elseif (preg_match($vPat2,$vOne,$vMat)) { // 2cols
						$vModules[$vName][trim($vMat[1])] = trim($vMat[2]);
					}
				}
			}
		}
	return $vModules;
	}


/**
* Utility class for all HTML drawing classes
* @package Joomla
*/
class jomresHTML
	{
	function makeOption( $val, $text='', $value_name='value', $text_name='text' )
		{
		$obj = new stdClass;
		$obj->$value_name = $val;
		$obj->$text_name = trim( $text ) ? $text : $value;
		return $obj;
		}

	function selectList( $arr, $name, $attribs, $key, $text, $default=NULL )
		{
		$output = '<span><select class="inputbox" name="'.$name.'" '.$attribs.'>';
		for ($i=0, $n= count( $arr ); $i < $n; $i++ )
			{
			$k = $arr[$i]->$key;
			$txt = $arr[$i]->$text;
			$selected ='';
			if ($k == $default)
				$selected .=' selected="selected"';
			$output .= '<option value="'.$k.'" '.$selected.'>'.$txt.'</option>';
		}
		$output .= "</select></span>";
		return $output;
		}

	function integerSelectList( $start, $end, $increment, $name, $attribs, $selected, $format="" )
		{
		$srt = (int)$start;
		$end = (int)$end;
		$incr = (int)$increment;
		$arry 	= array();
		for ($i=$srt; $i <= $end; $i+=$incr)
			{
			$fi = $format ? sprintf( "$format", $i ) : "$i";
			$arry[] = jomresHTML::makeOption( $fi, $fi );
			}
		return jomresHTML::selectList( $arry, $name, $attribs, 'value', 'text', $selected );
		}

}



function createNewAPIKey()
	{
	$apikey=generateJomresRandomString();
	$keeplooking=true;
	while ($keeplooking):
		$query="SELECT propertys_uid FROM #__jomres_propertys WHERE apikey = '".$apikey."' LIMIT 1";
		$plist=doSelectSql($query);
		$query="SELECT manager_uid FROM #__jomres_managers WHERE apikey = '".$apikey."' LIMIT 1";
		$clist=doSelectSql($query);
		if (count($plist)==0 && count($clist)==0)
			$keeplooking=false;
		if ($keeplooking)
			$apikey=generateJomresRandomString();
	endwhile;
	return $apikey;
	}

function generateJomresRandomString($length=50)
	{
	$str = "";
	// define possible characters
	$possible = "0123456789bcdfghjkmnpqrstvwxyz";
	// set up a counter
	$i = 0;
	// add random characters to $str until $length is reached
	while ($i < $length)
		{
		// pick a random character from the possible ones
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		$str .= $char;
		$i++;
		}
	return $str;
	}



/**
#
 * The true heart of Jomres. Finds all core and plugin minicomponents for Jomres, enables calling of specific minicomponents and can return minicomponent stored variables
#
 */
class mcHandler {

	function mcHandler()
		{
		$this->registeredClasses = array();
		
		// Following commented out functionality superceeded by Jomres minicomponent registry introduced in 3.2beta2
		//$this->eventPoints = array();
		//$this->nonOverridableEventClasses=array();
		//$this->unWantedFolderContents=array('.','..','cvs','.svn');
		
		$this->miniComponentData=array();
		$this->template_touch=false;
		$this->log = array();
		$this->currentEvent = "";

		$this->remote_plugin_directory = JOMRESPATH_BASE.JRDS."remote_plugins".JRDS;
		if (!is_dir($this->remote_plugin_directory) )
			{
			if (!@mkdir($this->remote_plugin_directory))
				{
				echo "Error, unable to make folder ".$this->remote_plugin_directory." automatically therefore cannot store booking session data. Please create the folder manually and ensure that it's writable by the web server";
				exit;
				}
			}
			
		// Following commented out functionality superceeded by Jomres minicomponent registry introduced in 3.2beta2
		// Mini components can have two sources, the Jomres events folder, and the Joomla components table. We read in from both
		//$this->getMiniComponentCoreClasses();
		//$this->getMiniComponentRemoteClasses();
		//$this->getMiniComponentComponentClasses();
		//asort($this->registeredClasses);
		
		$registry = new minicomponent_registry();
		$this->registeredClasses=$registry->get_registered_classes();
		}

	function touch_templates()
		{
		global $ePointFilepath,$thisJRUser,$mrConfig,$jomresConfig_live_site;
		$eventArgs=null;
		$mrConfig['editingOn']="1";
		//var_dump($thisJRUser);exit;
		if ($thisJRUser->superPropertyManager)
			{
			$eventClasses=$this->registeredClasses;
			$this->template_touch=true;
			echo jr_gettext('_JOMRES_CUSTOMTEXT_TOUCHTEMPLATES',"This feature allows you to edit language text for any template configured to allow you to edit text. If you are editing text for all properties you must switch Global Editing mode On and be performing the editing as a Super Property Manager.");
			echo "<br/>";
			foreach ( $eventClasses as $eClass)
				{
				$ePointFilepath=$eClass['filepath'];
				$classFileSuffix='.class.php';
				$filename='j'.$eClass['eventPoint'].$eClass['eventName'].$classFileSuffix;
				//echo $filename;exit;
				if (file_exists($eClass['filepath'].$filename) )
					{
					include_once($eClass['filepath'].$filename);
					$this->log[]=$eClass['filepath'].$filename;
					$event=new stdClass;
					$ePoint=$eClass['eventPoint'];
					$eName=$eClass['eventName'];
					$eLiveSite=str_replace(JOMRESCONFIG_ABSOLUTE_PATH,$jomresConfig_live_site,$ePointFilepath);
					$eLiveSite=str_replace(JRDS,"/",$eLiveSite);
					$event='j'.$ePoint.$eName;
					$e = new $event($eventArgs);
					if (isset($e->template_touchable) && $e->template_touchable)
						{
						echo "<br/>".$event."<br/>";
						echo $e->touch_template_language();
						}
					unset($e);
					}
				}
			}


		}

	// Acutally calls the triggered event.
	function triggerEvent($eventPoint,$eventArgs=null)
		{
		global $ePointFilepath,$eLiveSite,$jomresConfig_live_site;
		$retVal=null;
		$eventClasses=$this->registeredClasses;
		if (count($this->registeredClasses) > 0 )
			{
			foreach ( $eventClasses as $eClass)
				{
				if ($eClass['eventPoint']==$eventPoint)
					{
					$ePointFilepath=$eClass['filepath'];
					$classFileSuffix='.class.php';
					$filename='j'.$eClass['eventPoint'].$eClass['eventName'].$classFileSuffix;
					if (file_exists($eClass['filepath'].$filename) )
						{
						include_once($eClass['filepath'].$filename);
						$this->log[]=$eClass['filepath'].$filename;
						$this->currentEvent =$eClass['filepath'].$filename;
					    $event=new stdClass;
						$ePoint=$eClass['eventPoint'];
						$eName=$eClass['eventName'];
						$eLiveSite=str_replace(JOMRESCONFIG_ABSOLUTE_PATH,$jomresConfig_live_site,$ePointFilepath);
						$eLiveSite=str_replace(JRDS,"/",$eLiveSite);
					    $event='j'.$ePoint.$eName;
					    $e = new $event($eventArgs);
						$retVal=$e->getRetVals();
						$this->miniComponentData[$ePoint][$eName]=$retVal;
						unset($e);
						}
					}
				}
			}
		$this->currentEvent = "";
		return $retVal;
		}

	// Calls a specific event.
	function specificEvent($eventPoint,$eventName,$eventArgs=null)
		{
		global $ePointFilepath,$eLiveSite,$jomresConfig_live_site;
		$retVal=null;
		$eventClasses=$this->registeredClasses;
		if (count($this->registeredClasses) > 0 )
			{
			foreach ( $eventClasses as $eClass)
				{
				if ($eClass['eventPoint']==$eventPoint && $eClass['eventName']==$eventName)
					{
					$ePointFilepath=$eClass['filepath'];
					$classFileSuffix='.class.php';
					$filename='j'.$eClass['eventPoint'].$eClass['eventName'].$classFileSuffix;
					if (file_exists($eClass['filepath'].$filename) )
						{
						include_once($eClass['filepath'].$filename);
						$this->log[]=$eClass['filepath'].$filename;
						$this->currentEvent =$eClass['filepath'].$filename;
					    $event=new stdClass;
						$ePoint=$eClass['eventPoint'];
						$eName=$eClass['eventName'];
						$eLiveSite=str_replace(JOMRESCONFIG_ABSOLUTE_PATH,$jomresConfig_live_site,$ePointFilepath);
						$eLiveSite=str_replace(JRDS,"/",$eLiveSite);
					    $event='j'.$ePoint.$eName;
					    $e = new $event($eventArgs);
						$retVal=$e->getRetVals();
						$this->miniComponentData[$ePoint][$eName]=$retVal;
						unset($e);
						}
					}
				}
			}
		$this->currentEvent = "";
		return $retVal;
		}

	//  This function is used to see if a mini-component exists for a given event point
	function eventFileExistsCheck($eventPoint)
		{
		$eventClasses=$this->registeredClasses;
		if (count($this->registeredClasses) > 0 )
			{
			foreach ( $eventClasses as $eClass)
				{
				if ($eClass['eventPoint']==$eventPoint)
					{
					return true;
					}
				}
			}
		return false;
		}

	//  This function is used to see if a mini-component exists.
	function eventSpecificlyExistsCheck($eventPoint,$eventName)
		{
		$eventClasses=$this->registeredClasses;
		if (count($this->registeredClasses) > 0 )
			{
			foreach ( $eventClasses as $eClass)
				{
				if ($eClass['eventPoint']==$eventPoint && $eClass['eventName']==$eventName)
					{
					return true;
					}
				}
			}
		return false;
		}

	//  This function is used to see if a mini-component file exists.
	function eventFileLocate($eventPoint,$eventName)
		{
		$eventClasses=$this->registeredClasses;
		if (count($this->registeredClasses) > 0 )
			{
			foreach ( $eventClasses as $eClass)
				{
				if ($eClass['eventPoint']==$eventPoint && $eClass['eventName']==$eventName)
					{
					return true;
					}
				}
			}
		return false;
		}

	function getAllEventPointsData($ePoint)
		{
		$retVal =array();
		if (count($this->miniComponentData[$ePoint]) >0)
			{
			foreach ($this->miniComponentData[$ePoint] as $key=>$val)
				{
				$retVal[$key]=$this->getEventPointData($ePoint,$key);
				}
			}
		return $retVal;
		}

	function getEventPointData($ePoint,$eName)
		{
		return $this->miniComponentData[$ePoint][$eName];
		}
	}

/**
#
 * Constructs the mrConfig data when passed a property uid. jomres_config.php is read in first to set up mrConfig in the event that property settings haven't been configured previously (eg during an import)
#
*/
function getSiteSettings()
	{
	global $jrConfig;
	include(JOMRESPATH_BASE.JRDS.'jomres_config.php');
	$query="SELECT akey,value FROM #__jomres_site_settings";
	$settingsList=doSelectSql($query);
	if (count($settingsList)>0)
		{
		foreach ($settingsList as $setting)
			{
			$akey=$setting->akey;
			$value=$setting->value;
			//echo "Resetting mrConfig variables: Setting $akey ".$mrConfig['$akey']." to $value<br>";
			$jrConfig[$akey]=$value;
			}
		}
	return $jrConfig;
	}

// ################################################################################################################################

function checkLicense($license_key,$scriptname)
	{
	global $task;
	if (strlen($license_key)==0 && $task!="showSiteConfig" && $task!="saveSiteConfig" && !strstr($scriptname,'install_jomres.php'))
		{
		echo "<font color='red'><h1>Your license key is not set, therefore you will not be able to use Jomres yet. Please ensure that you have entered the license key number in the Site Configuration -> Misc -> License Key field before continuing.</h1></font>";
		$task="showSiteConfig";
		}

	if (defined('JOMRES_LICVALID'))
		{
		echo "Error, JOMRES_LICVALID already defined. Exiting";
		exit;
		}

	if (!strstr($scriptname,'install_jomres.php'))
		validateLicensekeyFile($license_key);

	if (defined('JOMRES_ISADMINCALLED'))
		{
		echo "Error, JOMRES_ISADMINCALLED already defined. Exiting";
		exit;
		}
	if (defined('_JOMRES_NEWJOOMLA'))
		$indexphp="index.php";
	else
		$indexphp="index2.php";
	$request_uri=$_SERVER['REQUEST_URI'];
	$testUri='/administrator/'.$indexphp;
	if (strstr($request_uri,$testUri) )
		define('JOMRES_ISADMINCALLED',true);
	else
		define('JOMRES_ISADMINCALLED',false);
	$task2 	= jomresGetParam( $_REQUEST, 'task', "" );

	if (!JOMRES_LICVALID && JOMRES_ISADMINCALLED && (!empty($task2) && $task2!="showSiteConfig" && $task2!="saveSiteConfig" && $task2!="saveLicenseKey" && $task2!="getLicenseKey"))
		{
		global $jomresConfig_live_site;
		$message="ERROR: Your license is not valid. Backend functionality is severely limited until this is resolved.<br>";
		$str='<SCRIPT LANGUAGE="JavaScript">window.location="'.$jomresConfig_live_site.'/administrator/index2.php?option=com_jomres&task=showSiteConfig&mosmsg='.$message.'";</script>';
		echo $str;
		}

	if (!JOMRES_LICVALID && JOMRES_ISADMINCALLED)
		{
		echo outputLicenseFailureReasonMessage();
		}
	if ( (JOMRES_LICRESULT == 2 ||JOMRES_LICRESULT == 3 ||JOMRES_LICRESULT == 5 || JOMRES_LICRESULT == 7 || JOMRES_LICRESULT == 8 || JOMRES_LICRESULT == 9) && !JOMRES_ISADMINCALLED ) // License disabled/suspended
		{
		echo outputLicenseFailureReasonMessage();
		exit;
		}
	}

function checkPropertyNumbers($license_key)
	{
	$bang=explode("-",$license_key);
	if (isset($bang[2]) )
		$product_id=$bang[2];
	else
		$product_id=$bang[0];

	if (defined('JOMRES_SINGLEPROPERTY'))
		{
		echo "Error, JOMRES_SINGLEPROPERTY already defined. Exiting";
		exit;
		}
	if ($product_id == 18)
		define('JOMRES_SINGLEPROPERTY',true);
	else
		define('JOMRES_SINGLEPROPERTY',false);
	if (JOMRES_SINGLEPROPERTY)
		{
		$query="SELECT propertys_uid FROM #__jomres_propertys";
		$propertyList = doSelectSql($query);
		if (count($propertyList) > 1)
			{
			echo "Error, This system is only licensed to service one property. Exiting";
			exit;
			}
		}
	}


function outputLicenseFailureReasonMessage()
	{
	switch (JOMRES_LICRESULT)
		{
		case 0:
			$message="<b>Unable to read key (it's possible that /media/key.php isn't readable by the web server)</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 1:
		break;
		case 2:
			$message="<b>SHA1 hash incorrect (key may have been tampered with)</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 3:
			$message="<b>MD5 hash incorrect (key may have been tampered with)</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 4:
			$message="<br><b>Hostname or IP doesn't match hostname/IP that the license is bound to.<br> Check that this host is the same as that bound to the license.<br>Also check that you are not on load balanced servers/a proxy bank. If you are then make a list of the IPs that show in the connectivity test and pass them onto jomres.net so that they can adjust your license bindings accordingly.<br> Log onto <a href=\"http://license-server.jomres.net\" target=\"_blank\">the license server</a> and view your domain details by clicking on View in the Manage column next to your license.</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue<br></center>';
		break;
		case 5:
			$message="<b>License has expired</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 6:
			$message="<b><br>The hostname in the key file and the hostname you are using to access this server are not the same.</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.' You may experience this if you normally use "localhost" and are now using "127.0.0.1" or you moved your Jomres/Joomla installation from a sub-domain to the root, or vice versa. <br>'.'Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 7:
			$message="<b>IP does not match key file</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 8:
			$message="<b>License disabled</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 9:
			$message="<b>License suspended</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 10:
			$message="<b>Unable to open file for writing</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 11:
			$message="<b>Unable to write to file key file</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 12:
			$message="<b>Communication error</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue<br>Check that the server has access to the internet and that a firewall isn\'t preventing it from communicating with the license server at http://license-server.jomres.net.</center>';
		break;
		case 13:
			$message="<b>Fopen error</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		case 14:
			$message="<b>PHP not compiled with sha1 encryption</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		default:
			$message="<b>Unknown error</b><br>";
			$result='<center>Keyfile failed validation. Error message: '.$message.'. Please contact <a href="http://www.jomres.net">Jomres.net</a> for help in resolving this issue</center>';
		break;
		}
	return $result;
	}

function validateLicensekeyFile($license_key)
	{
	/*
	* Possible Responses:
	* - 0: Unable to read key
	* - 1: Everything is OK
	* - 2: SHA1 hash incorrect (key may have been tampered with)
	* - 3: MD5 hash incorrect (key may have been tampered with)
	* - 4: License key does not match key string in key file
	* - 5: License has expired
	* - 6: Host name does not match key file
	* - 7: IP does not match key file
	*/
	// Home call details
	$user_defined_string = '230a25e276da';
	$key = new jomres_iono_keys($license_key, $user_defined_string, JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'media'.JRDS.'key.php');
	if (!defined('JOMRES_LICRESULT') );
		define('JOMRES_LICRESULT',$key->result);
	switch ($key->result)
		{
		case 0:
			define('JOMRES_LICVALID',false);
		break;
		case 1:
		break;
		case 2:
			define('JOMRES_LICVALID',false);
		break;
		case 3:
			define('JOMRES_LICVALID',false);
		break;
		case 4:
			define('JOMRES_LICVALID',false);
		break;
		case 5:
			define('JOMRES_LICVALID',false);
		break;
		case 6:
			define('JOMRES_LICVALID',false);
		break;
		case 7:
			define('JOMRES_LICVALID',false);
		break;
		case 8:
			define('JOMRES_LICVALID',false);
		break;
		case 9:
			define('JOMRES_LICVALID',false);
		break;
		case 10:
			define('JOMRES_LICVALID',false);
		break;
		case 11:
			define('JOMRES_LICVALID',false);
		break;
		case 12:
			@unlink(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'media'.JRDS.'key.php');
			define('JOMRES_LICVALID',false);
		break;
		case 13:
			define('JOMRES_LICVALID',false);
		break;
		case 14:
			define('JOMRES_LICVALID',false);
		break;
		default:
			define('JOMRES_LICVALID',false);
		break;
		}
	if (!defined('JOMRES_LICVALID'))
		define('JOMRES_LICVALID',true);
	}


function testConnectivity()
	{
	$home_url_site 	= "license-server.jomres.net";		// The license server that we are testing conectivity to.
	$home_url_port 	= 80;								// The port we will be attempting to connect via.
	$home_pathtoremote = "/";							// Path to remote.php. If your license server is in a sub-folder you can define the folder here.
														// NOTE not tested. Feedback on the iono forum welcome.
	$outPutSteps	= true;								// Echo the connection steps? We will leave this as an option so that the class can be used within another application if required.

	echo "<h2><center>Testing connectivity to the license server</h2></center><br>";
	$cTest = new ionoServerConnectivityTest($outPutSteps);
	$result= $cTest->testConnectivity($home_url_site,$home_url_port,$home_pathtoremote);
	//$result = false;
	echo "";

	echo "Connection attempted using method: ".$cTest->connectionMethodAttempted."<br>";
	if (!$result)
		{
		echo "Tried to connect to the license server on $home_url_site but failed<br>";
		echo "<br>This may be because of a firewall or iptables preventing outgoing communications, or because this server is not connected to the internet";
		}
	else
		{
		echo "Connected to license server on $home_url_site succssfully<br>";
		}
	echo "</center>";
	}


class ionoServerConnectivityTest
	{
	function ionoServerConnectivityTest($outPutSteps = true)
		{
		$this->outPutSteps = $outPutSteps;
		$this->connectionMethodAttempted = 'NONEYET';
		}
	function testConnectivity($home_url_site,$home_url_port = 80,$home_pathtoremote = "/")
		{
		$success = false;
		if ($this->outPutSteps)
			echo "<center>";
		// Let's get some server information
		if (!isset($_SERVER['SERVER_NAME']) )
			echo "SERVER_NAME not found. Are we on an IIS server?<br>";
		$domain=strtolower(str_replace("http://","",$_SERVER['SERVER_NAME']));
		if ($this->outPutSteps)
			{
			echo "<H3>Found domain: ".$domain."</H3>";
			echo "The domain found is the domain which your server is trying to authenticate against the license server.";
			echo "<h3>on IP ".$_SERVER['SERVER_ADDR']."</h3><br>";
			}
		// Build request
		$request = '';
		$request = $home_url_site.'?'.$request;
		// Build HTTP header
		$header	= "GET $request HTTP/1.0\r\nHost: $home_url_site$home_pathtoremote\r\nConnection: Close\r\nUser-Agent: Iono connectivity tester\r\n";
		$header .= "\r\n\r\n";
		// Some servers are configured to return very little information. We will parse phpinfo to try to find the value of the master Fopen settings (and hope that at least phpino is available).
		// If master Fopen is Off then Fopen is also disabled, we'll try to switch to CURL. Local fopen is not used here but we'll keep it in case we need it sometime in the future.
		$configSets=$this->parseConfiguration();
		//$localFopen=$configSets["PHP Core"]['allow_url_fopen'][0];
		$masterFopen=$configSets["PHP Core"]['allow_url_fopen'][1];
		// Output the value of the master Fopen
		if ($this->outPutSteps)
			{
			echo "Master fopen = ";
			print_r($masterFopen);
			echo "<br>";
			}
		if (function_exists('curl_init') && $masterFopen == "Off") // use CURL
			{
			$this->connectionMethodAttempted = 'CURL';
			if ($this->outPutSteps)
				echo "Trying to use CURL to connect to license server<br>";
			$return=$this->get_content_curl($home_url_site,$request,$headers);
			if ($return)
				{
				if ($this->outPutSteps)
					echo "Connected successfully with license server using CURL";
				$success = true;
				}
			else
				{
				if ($this->outPutSteps)
					echo "Failed to connect to license server using CURL";
				$success = false;
				}
			}
		else // use fsock
			{
			$this->connectionMethodAttempted = 'FSOCK';
			if ($this->outPutSteps)
				echo "Trying to use fsock to connect to license server<br>";
			$fpointer = @fsockopen($home_url_site, $home_url_port, $errno, $errstr, 5);
			if ($fpointer)
				{
				if ($this->outPutSteps)
					echo "Connected successfully with license server using fsock<br>";
				$success = true;
				}
			else
				{
				if ($this->outPutSteps)
					{
					echo "Failed to connect to license server using fsock<br>";
					echo $errstr."<br>";
					}
				$success = false;
				}
			}
		if ($this->outPutSteps)
			echo "</center>";
		return $success;
		}


	function get_content_curl($url,$request,$headers)
		{
		if (function_exists('curl_init'))
			{
			$ch = curl_init();
			$timeout = 5; // set to zero for no timeout
			curl_setopt ($ch, CURLOPT_URL, 'http://license-server.jomres.net/');
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
			return $file_contents;
			}
		else
			{
			if ($this->outPutSteps)
				echo "Error, tried to use CURL but function doesn't exist. Please ensure that PHP is compiled with CURL enabled.";
			return false;
			}
		}

	function parseConfiguration()
		{
		ob_start();
		if (function_exists('phpinfo'))
			phpinfo(INFO_CONFIGURATION);
		else
			{
			return false;
			$this->phpInfoAvailable = false;
			}
		$s = ob_get_contents();
		ob_end_clean();
		$s = strip_tags($s,'<h2><th><td>');
		$s = preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$s);
		$s = preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$s);
		$vTmp = preg_split('/(<h2>[^<]+<\/h2>)/',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
		$vModules = array();
		for ($i=1;$i<count($vTmp);$i++)
			{
			if (preg_match('/<h2>([^<]+)<\/h2>/',$vTmp[$i],$vMat))
				{
				$vName = trim($vMat[1]);
				$vTmp2 = explode("\n",$vTmp[$i+1]);
				foreach ($vTmp2 AS $vOne)
					{
					$vPat = '<info>([^<]+)<\/info>';
					$vPat3 = "/$vPat\s*$vPat\s*$vPat/";
					$vPat2 = "/$vPat\s*$vPat/";
					if (preg_match($vPat3,$vOne,$vMat))
						{ // 3cols
						$vModules[$vName][trim($vMat[1])] = array(trim($vMat[2]),trim($vMat[3]));
						} elseif (preg_match($vPat2,$vOne,$vMat)) { // 2cols
							$vModules[$vName][trim($vMat[1])] = trim($vMat[2]);
						}
					}
				}
			}
		return $vModules;
		}
	}


# $Date: 2005-11-26 00:01:05 +0000 (Sat, 26 Nov 2005) $
# 4
# **************************************************************************
# User details must be added in here. This would usually be done in another
# file. See documentation for help and examples.

//$license_key = 'USER LICENSE KEY'; // License's key
# *************************************************************************

# You do not need to edit any of the following code........Vince: Wanna bet?
/**
* iono License Key File Handling
*
* @author David Mytton
* @copyright Olate Ltd 2005
* @link http://www.olate.co.uk
* @version 1.2.0
* @package iono
*/
class jomres_iono_keys
{

	/**
	* Sets the class vars and then checks the key file.
	* @param string $license_key The user's license key
	* @param string $remote_auth The remote authorisation string from iono settings
	* @param string $key_location The location of the key file to use
	* @param int $key_age The maximum age of the key file before it is regenerated (seconds) default 15 days (1296000)
	*/
	function jomres_iono_keys($license_key, $remote_auth, $key_location = 'key.php', $key_age = 1296000)
		{
		global $jomresConfig_live_site;
		/**
		* @var string The user's license key
		* @access private
		*/
		$this->license_key="";
		/**
		* @var string The iono root site location
		* @access private
		*/
		$this->home_url_site = 'license-server.jomres.net';
		/**
		* @var int The iono root site location port for access
		* @access private
		*/
		$this->home_url_port = 80;
		/**
		* @var string The iono location
		* @access private
		*/
		$this->home_url_iono = '/remote.php';
		/**
		* @var string The location of the key file to use
		* @access private
		*/
		$this->key_location = $key_location;
		/**
		* @var string Remote Authentication String from your iono installation
		* @access private
		*/
		$this->remote_auth = $remote_auth;
		/**
		* @var int The maximum age of the key file before it is regenerated (seconds)
		* @access private
		*/
		$this->key_age =$key_age;
		/**
		* @var array The data stored in the key
		* @access private
		*/
		$this->key_data = "";
		/**
		* @var int Current timestamp. Needs to be constant throughout class so is set here
		* @access private
		*/
		$this->now = time();
		/**
		* @var int The result of the key actions
		* @access public
		*/
		$this->result = null;
		// Set the class vars
		$this->license_key = $license_key;
		$this->remote_auth = $remote_auth;
		$this->key_location =	$key_location;
		$this->key_age =	$key_age;
		$this->now = time();
		$thisServer = jomresGetDomain();
		if ($thisServer == 'localhost' && strstr($jomresConfig_live_site,'localhost') )
			{
			$this->result = 1;
			return;
			}
		// Does the key exist? If not, then we need to create it. Else read it.
		if (file_exists($this->key_location))
		{
			$this->result = $this->read_key();
		}
		else
		{
			$this->result = $this->generate_key();

			if (empty($this->result))
			{
				$this->result = $this->read_key();
			}
		}

		unset($this->remote_auth);
		}


	/**
	* Gets the license details form the iono server and writes to the key file
	*
	* Responses:
	* - 8: License disabled
	* - 9: License suspended
	* - 5: License expired
	* - 10: Unable to open file for writing
	* - 11: Unable to write to file
	* - 12: Unable to communicate with iono
	* - 13: Vince's new: master fopen is off
	* - 14: Vince's new: PHP not compiled with sha1 encryption
	* @return int Response code
	* @access private
	*/
	function generate_key()
	{
		// Build request
		$domain=jomresGetDomain();
		$request = 'remote=licenses&type=5&license_key='.urlencode(base64_encode($this->license_key));
		$request .= '&host_ip='.urlencode(base64_encode($_SERVER['SERVER_ADDR'])).'&host_name='.urlencode(base64_encode($domain));
		$request .= '&hash='.urlencode(base64_encode(md5($request)));

		$request = $this->home_url_iono.'?'.$request;
		// Build HTTP header
		$header	= "GET $request HTTP/1.0\r\nHost: $this->home_url_site\r\nConnection: Close\r\nUser-Agent: iono (www.olate.co.uk/iono)\r\n";
		$header .= "\r\n\r\n";

		$configSets=parseConfiguration();
		$localFopen=$configSets["PHP Core"]['allow_url_fopen'][0];
		$masterFopen=$configSets["PHP Core"]['allow_url_fopen'][1];

		if (!function_exists('sha1') )
			return 14;

		if ($masterFopen == "Off")
			{

			$return=get_content_curl($this->home_url_site,$request,$header,$this->license_key);
			//return 13;
			$string=$return;
			}
		else
			{

			// Contact license server
			$fpointer = @fsockopen($this->home_url_site, $this->home_url_port, $errno, $errstr, 5);
			$return = '';
			if ($fpointer)
			{
				@fwrite($fpointer, $header);
				while(!@feof($fpointer))
				{
					$return .= @fread($fpointer, 1024);
				}
				@fclose($fpointer);
			}
			else
				{
				return 12;
				}
			// Get rid of HTTP headers
			$content = explode("\r\n\r\n", $return);

			$content = explode($content[0], $return);
			// Split up the content
			$string = urldecode($content[1]);
			}


		//$string = '1|key|' .(time()+2000) .'|localhost|127.0.0.1';
		$exploded = explode('|', $string);
		switch ($exploded[0]) // If we have an inactive license, return the status code
		{
			case 0: // Disabled
				return 8;
				break;
			case 2: // Suspended
				return 9;
				break;
			case 3: // Expired
				return 5;
				break;
		}

		$data['license_key'] = @$exploded[1];
		$data['expiry']	= @$exploded[2];
		$data['hostname'] = @$exploded[3];
		$data['ip']	= @$exploded[4];
		$data['timestamp'] = $this->now;

		$data_encoded = serialize($data);
		$data_encoded = base64_encode($data_encoded);
		$data_encoded = md5($this->now.$this->remote_auth).$data_encoded;
		$data_encoded = strrev($data_encoded);
		$data_encoded_hash = sha1($data_encoded.$this->remote_auth);
		$fp = fopen($this->key_location, 'w');
		if ($fp)
		{
			$fp_write = fwrite($fp, wordwrap($data_encoded.$data_encoded_hash, 40, "\n", true));

			if (!$fp_write)
			{
				return 11; // Unable to write to file
			}
			fclose($fp);
		}
		else
		{
			return 10; // Unable to open file for writing
		}
	}



/**
	* Read the key file and then return a response code
	*
	* Responses:
	* - 0: Unable to read key
	* - 1: Everything is OK
	* - 2: SHA1 hash incorrect (key may have been tampered with)
	* - 3: MD5 hash incorrect (key may have been tampered with)
	* - 4: License key does not match key string in key file
	* - 5: License has expired
	* - 6: Host name does not match key file
	* - 7: IP does not match key file
	* @return int Response code
	* @access private
	*/
	function read_key()
	{
		$key = file_get_contents($this->key_location);

		if ($key)
			{
			$key = str_replace("\n", '', $key); // Remove the line breaks from the key string

			// Split out SHA1 hash from the key data
			$key_string = substr($key, 0, strlen($key)-40);
			$key_sha_hash = substr($key, strlen($key)-40, (strlen($key)));

			if (sha1($key_string.$this->remote_auth) == $key_sha_hash) // Compare SHA1 hash to the key data
			{
				$key = strrev($key_string); // Back the right way around

				$key_hash = substr($key, 0, 32); // Get the MD5 hash of the data from the string
				$key_data = substr($key, 32); // Get the data from the string
				$key_data = base64_decode($key_data);

				$key_data = unserialize($key_data);
				if (md5($key_data['timestamp'].$this->remote_auth) == $key_hash) // Check the MD5 hash
				{
					// Is it more than $this->key_age seconds old?
					if (($this->now - $key_data['timestamp']) >= $this->key_age)
						{
						unlink($this->key_location);
						$this->result = $this->generate_key();
						if (empty($this->result))
						{
							$this->result = $this->read_key();
						}
					return 1; // Have to return here because there is a 1 second delay due to the nature of time()
					}
					else
						{
						$this->key_data = $key_data;
						if ($key_data['license_key'] != $this->license_key)
							{
							return 4; // License key does not match key string in key file
							}
						if ($key_data['expiry'] <= $this->now && $key_data['expiry'] != 1)
							{
							return 5; // License key expired
							}
						//Are we on IIS? Doesn't have the $_SERVER['SERVER_NAME'] variable.
						if (isset($_SERVER['SERVER_NAME']) && !empty($_SERVER['SERVER_NAME'])	)
							{
							// Do we have multiple hostnames?
							$domain=jomresGetDomain();
							if (substr_count($key_data['hostname'], ',') == 0)
								{ // No
								if ($key_data['hostname'] != $domain && !empty($key_data['hostname']))
									{
									return 6; // Host name does not match key file
									}
								}
							else
								{ // Yes
								$hostnames = explode(',', $key_data['hostname']);
								if (!in_array($domain, $hostnames))
									{
									return 6; // Host name is not in key file
									}
								}
							}
						// Do we have multiple IPs?
						//var_dump($_SERVER);
						if (substr_count($key_data['ip'], ',') == 0)
							{ // No
							if (!isset($_SERVER['SERVER_ADDR']) ) // Disables this check as we're on IIS so just passes back the OK return
								return 1;
							if ($key_data['ip'] != $_SERVER['SERVER_ADDR'] && !empty($key_data['ip']))
								{
								echo "Server attempted to validate ".$_SERVER['SERVER_ADDR']." IP number, but failed<br>";
								return 7; // IP does not match key file
								}
							}
						else
							{ // yes
							$xyz=0;
							// Disabled due to server farms being a pain in the arse.
							/*
							$ips = explode(',', $key_data['ip']);
							//var_dump($ips);
							if (!in_array($_SERVER['SERVER_ADDR'], $ips))
								{
								echo "Server attempted to validate ".$_SERVER['SERVER_ADDR']." IP number, but failed<br>";
								return 7; // IP is not in key file
								}
							*/
							}
						return 1;
					}
				}
				else
				{
					return 3; // MD5 hash incorrect (key may have been tampered with)
				}
			}
			else
			{
				return 2; // SHA1 hash incorrect (key may have been tampered with)
			}
		}
		else
		{
			return 0;
		}
	}

	/**
	* Returns array of key data
	*
	* @return array Array of data in the key file
	*/
	function get_data()
	{
		return $this->key_data;
	}
}


function get_content_curl($url,$request,$header,$license_key="",$versionRequest=false)
	{
	$domain=jomresGetDomain();
	//$home_url_site = 'license-server.jomres.net';
	if (!$versionRequest)
		{
		$home_url_iono = '/remote.php';
		$request = 'remote=licenses&type=5&license_key='.urlencode(base64_encode($license_key));
		$request .= '&host_ip='.urlencode(base64_encode($_SERVER['SERVER_ADDR'])).'&host_name='.urlencode(base64_encode($domain));
		$request .= '&hash='.urlencode(base64_encode(md5($request)));
		$request = $url.$home_url_iono.'?'.$request."\r\n\r\n";
		}
	else
		$request=$url.$request;
		//var_dump($request);exit;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $request);
	curl_setopt($ch, CURLOPT_PORT, 80);
	//curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
	//curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, 'iono (www.olate.co.uk/iono)');
	$file_contents = curl_exec($ch);
	return $file_contents;
	}

class jomres_getkeydata
	{
	function jomres_getkeydata()
		{
		$this->hostname = null;
		$this->expires = null;
		$this->expiry = null;
		$key_location =	JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'media'.JRDS.'key.php';
		if (file_exists($key_location ) )
			{
			$key = file_get_contents($key_location);
			if ($key)
				{
				$key = str_replace("\n", '', $key); // Remove the line breaks from the key string
				// Split out SHA1 hash from the key data
				$key_string = substr($key, 0, strlen($key)-40);
				$key_sha_hash = substr($key, strlen($key)-40, (strlen($key)));
				$key = strrev($key_string); // Back the right way around
				$key_hash = substr($key, 0, 32); // Get the MD5 hash of the data from the string
				$key_data = substr($key, 32); // Get the data from the string
				$key_data = base64_decode($key_data);
				$key_data = unserialize($key_data);
				$this->hostname	= $key_data['hostname'];
				$this->expiry	= $key_data['expiry'];
				}
			}
		}
	}
// ################################################################

?>