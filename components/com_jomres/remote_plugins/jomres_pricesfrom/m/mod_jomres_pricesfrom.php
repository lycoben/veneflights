<?php
// Copyright (C) 2005 Vince Wooll
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

global $jomresConfig_absolute_path,$jrConfig;
ini_set("memory_limit","32M");

$jomresAdminPath='components/com_jomres';
require_once($jomresAdminPath.'/integration.php');
//var_dump($params);
if (defined('_JOMRES_NEWJOOMLA'))
	{
	$p = $params->_raw;
	$vals=array();
	$arr=explode("\n",$p);
	foreach ($arr as $str)
		{
		$dat=explode("=",$str);
		$key = $dat[0];
		$val = $dat[1];
		if (strlen($key)>0)
			$$key=$val;
		}
	}
else
	{
	$mosres_pf_roomsfrom = $params->get( 'mosres_pf_roomsfrom' );
	$mosres_pf_roomsto   = $params->get( 'mosres_pf_roomsto' );
	$mosres_pf_pernight  = $params->get( 'mosres_pf_pernight' );
	$class_sfx 	= $params->get( 'moduleclass_sfx' );
	}

$jomresComponentMap=$mosConfig_absolute_path."/components/com_jomres";

$queryString=$_SERVER['QUERY_STRING'];
$queryStringArray=explode('&',$queryString);

$property_uid=FALSE;

if (!empty($queryStringArray[1]))
	{
	if ($queryStringArray[1]=="task=viewproperty")
		$property_uid	  = intval( jomresGetParam( $_REQUEST, 'property_uid', '' ) );
	if ($queryStringArray[1]=="task=dobooking")
		$property_uid	  = intval( jomresGetParam( $_REQUEST, 'selectedProperty', '' ) );
	if ($queryStringArray[1]=="task=showRoomDetails")
		{
		$roomUid = intval( jomresGetParam( $_REQUEST, 'roomUid', 0 ) );
		$query="SELECT propertys_uid FROM #__jomres_rooms WHERE room_uid LIKE '".$roomUid."'";
		$propertyList = doSelectSql($query);
		foreach ($propertyList as $pproperty)
			{
			$property_uid=$pproperty->propertys_uid;
			}
		}
	}
	
	if ($queryStringArray[1]=="task=viewproperty" || $queryStringArray[1]=="task=dobooking")
		{
		//require_once($jomresConfig_absolute_path."/components/com_jomres/site_config.php");
		$jrConfig=getSiteSettings();
		if ($jrConfig['useGlobalCurrency']=="0")
			{
			$cury="";
			$currency="";
			$query="SELECT value FROM #__jomres_settings WHERE property_uid = '$p_uid' AND akey = 'currency'";
			$cury=doSelectSql($query,2);
			if (isset($cury['value']) && !empty($cury['value']) )
				$currency=$cury['value'];
			else
				{
				$mrConfig=getPropertySpecificSettings($p_uid);
				$currency=$mrConfig['currency'];
				}
			}
		else
			{
			$currency=$jrConfig['globalCurrency'];
			}
			
		$todaysDate=date("Y/m/d");
		$date_elements  = explode("/",$todaysDate);
		$unixTodaysDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
		if ($property_uid)
			$query = "SELECT validfrom,validto,roomrateperday FROM #__jomres_rates WHERE property_uid LIKE '".$property_uid."'";
		else
			$query = "SELECT validfrom,validto,roomrateperday FROM #__jomres_rates";
		$tariffList = doSelectSql($query);
		$ratesArray=array();
		if (count($tariffList)>0)
			{
			foreach ($tariffList as $tariff)
				{
				$date_elements  = explode("/",$tariff->validfrom);
				$unixValidfrom= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
				$date_elements  = explode("/",$tariff->validto);
				$unixValidto= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
				if ( $unixValidfrom < $unixTodaysDate && $unixValidto > $unixTodaysDate )
					{
					if ($tariff->roomrateperday>0)
						$ratesArray[]=$tariff->roomrateperday;
					}
				}
			}
		$content="&nbsp;";
		if (count($ratesArray)>0)
			{
			sort($ratesArray,SORT_NUMERIC);
			if (count($ratesArray)==1)
				{
				$currfmt = new jomres_currency_format();
				$lowestPrice=$currency.$currfmt->get_formatted($ratesArray[0]);
				$content= $mosres_pf_roomsfrom." ".$lowestPrice." ".$mosres_pf_pernight;
				}
			else
				{
				$currfmt = new jomres_currency_format();
				$lowestPrice=$currency.$currfmt->get_formatted($ratesArray[0]);
				$lastElement=count($ratesArray)-1;
				$highestPrice=$ratesArray[$lastElement];
				$highestPrice=$currency.$currfmt->get_formatted($highestPrice);
				$content= $mosres_pf_roomsfrom." ".$mosres_pf_currency.$lowestPrice." ".$mosres_pf_roomsto." ".$mosres_pf_currency.$highestPrice." ".$mosres_pf_pernight;
				}
			}
		}

?>