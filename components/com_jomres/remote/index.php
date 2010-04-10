<?php
define('JOMRESREMOTE_BASEPATH', dirname(__FILE__) );
define('JOOMLAROOT_BASEPATH', JOMRESREMOTE_BASEPATH."/../../../" );
if (@file_exists(JOOMLAROOT_BASEPATH .'/includes/defines.php') )
	{
	define( '_JEXEC', 1 );
	}
else
	{
	define( '_VALID_MOS', 1 );
	}

if (file_exists(JOOMLAROOT_BASEPATH .'/includes/defines.php') )
	{
	define('JPATH_BASE', JOOMLAROOT_BASEPATH );
	}
else
	{
	if (is_readable(JOOMLAROOT_BASEPATH.'/globals.php') )
		require_once( JOOMLAROOT_BASEPATH.'/globals.php' );
	require_once( JOOMLAROOT_BASEPATH.'/configuration.php' );
	if (is_readable(JOOMLAROOT_BASEPATH .'/includes/joomla.php') )
		require_once( JOOMLAROOT_BASEPATH.'/includes/joomla.php' );
	}

global $MiniComponents,$remoteQuery;

ini_set('error_reporting', E_ERROR | E_WARNING | E_PARSE);
ini_set("memory_limit","32M");

require_once(JOMRESREMOTE_BASEPATH."/../integration.php");
require_once(JOMRESPATH_BASE."/libraries/nusoap/nusoap.php");

// Create the server instance

$dataInterchangeType="NOTSET";
if( !empty($_GET['command']) )
	$dataInterchangeType="GET";
if( !empty($_POST['command']) )
	$dataInterchangeType="POST";
if ($dataInterchangeType=="NOTSET")
	$dataInterchangeType="SOAP";

$server = new soap_server;
$server->register('jomres_remote');

switch ($dataInterchangeType) 
	{
	case 'GET':
		$commands=array();
		$commandStr		= (string)jomresGetParam( $_GET, 'command', '' );
		$apikey			= (string)jomresGetParam( $_GET, 'apikey', '' );
		$remoteQuery = new remoteQuery($apikey);
		return $remoteQuery->init($commands);
	break;
	case 'POST':
		$commands=array();
		$commandStr		= (string)jomresGetParam( $_POST, 'command', '' );
		$apikey			= (string)jomresGetParam( $_POST, 'apikey', '' );
		$remoteQuery = new remoteQuery($apikey);
		return $remoteQuery->init($commands);
		
	break;
	case 'SOAP':
	default;
		// Define the method as a PHP function
		function jomres_remote($apikey,$commands,$data) 
			{
			$remoteQuery = new remoteQuery($apikey);
			return $remoteQuery->init($commands);
			}
	break;
	}


// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);


?>