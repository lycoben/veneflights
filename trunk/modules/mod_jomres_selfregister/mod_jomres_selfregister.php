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

global $mosConfig_live_site,$database,$mosConfig_absolute_path;
ini_set("memory_limit","32M");

$params->def( 'pretext', '' );
$params->def( 'posttext', '' );
$class_sfx 	= $params->get( 'moduleclass_sfx' );

echo $params->get( 'pretext' ).'<br >';
echo '<a href="index.php?option=com_jomres&task=registerProp_step1">Register your Yacht with Yacht Charter Travel 2.0 and become member of the new generation of Yacht Brokers!</a>'.'<br >';
echo $params->get( 'posttext' ).'<br >';
?>