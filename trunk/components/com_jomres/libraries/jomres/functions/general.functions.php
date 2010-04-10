<?php
/**
#
 * JRPortal core file
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
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################


function homeButton()
	{
	global $indexphp,$jomresConfig_live_site;
	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = JOMRESPATH_BASE."/images/jomresimages/small/Home.png";
	$link = $jomresConfig_live_site."/administrator/".$indexphp."?option=com_jomcompjrportal";
	$jrtb .= $jrtbar->customToolbarItem('',$link,"Home",false,"",$image);
	$jrtb .= $jrtbar->endTable();
	return $jrtb;
	}

function makeJsGraphOutput($graphLabels,$graphValues,$type="hBar",$legend,$div='divGraph')
	{
	$graphParams='
	<script language="JavaScript"> <!--
	createGraph("'.$graphLabels.'","'.$graphValues.'","'.$type.'","'.$legend.'","'.$div.'")
	//--> </script>
	';
	return $graphParams;
	}

function getMonthName($monthNo)
	{
	$monthNo=intval($monthNo);
	return constant ('_JRPORTAL_MONTHS_LONG_'.$monthNo);
	}

function makeImageValid($imageName="")
	{
	$image = str_replace('+' , '%20' , $imageName);
	$image = str_replace('%2F' , '/' , $image);
	return $image;
	}
?>