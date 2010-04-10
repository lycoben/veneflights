<?php
// Copyright (C) 2007 Vince Wooll
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

global $jomresConfig_live_site,$jomresConfig_absolute_path,$mrConfig,$jrConfig;

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
	$jomres_pop_from = $params->get( 'jomres_pop_from' );
	$listlimit = $params->get( 'listlimit' );
	$imwidth = $params->get( 'imwidth' );
	$imheight = $params->get( 'imheight' );
	$showTariff = $params->get( 'showTariff' );
	$vertical = $params->get( 'vertical' );
	$class_sfx 	= $params->get( 'moduleclass_sfx' );
	}

$jomres_itemid = $jrConfig['jomresItemid'];

$query="SELECT count,p_uid FROM #__jomres_pcounter ORDER BY count DESC LIMIT 100";
$counted =doSelectSql($query);

$publishedPropertysArray=array();
if (count($counted)>0)
	{
	foreach ($counted as $pid)
		{
		$query="SELECT published FROM #__jomres_propertys WHERE propertys_uid = '$pid->p_uid' ";
		$published=doSelectSql($query,1);
		if ($published=="1")
			$publishedPropertysArray[]=$pid->p_uid;
		}
	}

if (count($publishedPropertysArray)>0)
	{
	if ($vertical=="0")
		echo "<table><tr>";
	$publishedPropertysArray=array_slice($publishedPropertysArray,0,$listlimit);
	foreach ($publishedPropertysArray as $p_uid)
		{
		$query="SELECT property_name,property_street,property_town FROM #__jomres_propertys WHERE propertys_uid = '$p_uid' ";
		$property_names=doSelectSql($query);
		foreach ($property_names as $prop)
			{
			$property_name=$prop->property_name;
			$property_street=$prop->property_street;
			$property_town=$prop->property_town;
			}

		$propimg=null;
		$property_image=$jomresConfig_live_site."/components/com_jomres/images/jrhouse.png";
		$jpg=$p_uid."_property_".$p_uid.".jpg";
		$propertyImageLocation=$jomresConfig_absolute_path."images/stories/jomres/".$jpg;
		if (file_exists($jomresConfig_absolute_path."/images/stories/jomres/".$jpg) )
			$property_image=$jomresConfig_live_site."/images/stories/jomres/".$jpg;

		$todaysDate=date("Y/m/d");
		$date_elements  = explode("/",$todaysDate);
		$unixTodaysDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
		$query = "SELECT validfrom,validto,roomrateperday FROM #__jomres_rates WHERE property_uid = '$p_uid'";
		$tariffList = doSelectSql($query);
		$ratesArray=array();
		foreach ($tariffList as $tariff)
			{
			$date_elements  = explode("/",$tariff->validfrom);
			$unixValidfrom= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
			$date_elements  = explode("/",$tariff->validto);
			$unixValidto= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
			if ( $unixValidfrom <= $unixTodaysDate && $unixValidto >= $unixTodaysDate )
				{
				$ratesArray[]=(float)$tariff->roomrateperday;
				}
			}
		if (is_array($ratesArray))
			{
			sort($ratesArray,SORT_NUMERIC);
			$lowestPrice=$ratesArray[0];
			}
		else
			$lowestPrice="?";
		
		
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
		$currfmt = new jomres_currency_format();
		$lowestPrice=$currfmt->get_formatted($lowestPrice);
		if ($lowestPrice == 0)
			$lowestPrice = " POA";
		$price=$lowestPrice;
		$link=jomresURL( "index.php?option=com_jomres&task=viewproperty&Itemid=$jomres_itemid&property_uid=$p_uid");
		$text=$property_name;
		if ($showTariff=="1")
			$text.=', '.$jomres_pop_from.' '.$currency.$price ;
		if ($vertical=="0")
			echo '<td>';
		echo '<a href="'.$link.'"><img width="'.$imwidth.'" height="'.$imheight.'" border="0" src="'.$property_image.'"><br>'.$text.'</a>';
		if ($vertical=="0")
			echo '</td>';
		else 
			echo "<br>";
		}
	if ($vertical=="0")
		echo "</tr></table>";

	}
else
	echo "No properties clicked";
?>