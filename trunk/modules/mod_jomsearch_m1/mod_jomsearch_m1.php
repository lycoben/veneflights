<?php
// Copyright (C) 2006 Vince Wooll
// All rights reserved.

// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

global $mosConfig_absolute_path,$mosConfig_lang;
$jomresAdminPath='components/com_jomres';
require_once($jomresAdminPath.'/integration.php');
$calledByModule="mod_jomsearch_m1";

$doSearch=false;
$includedInModule=true;

$queryString=$_SERVER['QUERY_STRING'];
$queryStringArray=explode('&',$queryString);
foreach ($queryStringArray as $qs)
	{
	$queryelements[]=substr($qs,strpos($qs, "=")+1);
	}
	
if (!in_array("com_jombok",$queryelements) )
	{
	
	$MiniComponents = new mcHandler();
	$componentArgs=array('doSearch'=>$doSearch,'includedInModule'=>$includedInModule,'calledByModule'=>$calledByModule);
	$MiniComponents->triggerEvent('00030',$componentArgs); 
	}
?>