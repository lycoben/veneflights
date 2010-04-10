<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMblockUserUdde($myself, $item_id, $recip, $config) {
	if (!$config->blocksystem) {
		$mosmsg = _UDDEIM_BLOCKSDISABLED;
		uddeJSEFredirect("index.php?option=com_uddeim&task=inbox&Itemid=".$item_id, $mosmsg);
	}

	// is this user already blocked?
	$isblocked = uddeIMcheckBlockerBlocked($myself, $recip);
	
	if ($isblocked) {
		uddeJSEFredirect("index.php?option=com_uddeim&task=settings&Itemid=".$item_id);
	}
	
	$recip_gid = uddeIMgetGID($recip);
	if ($recip_gid==24||$recip_gid==25) {	
		$mosmsg = _UDDEIM_CANTBLOCKADMINS;
		uddeJSEFredirect("index.php?option=com_uddeim&task=inbox&Itemid=".$item_id, $mosmsg);	
	}
	
	uddeIMinsertBlockerBlocked($myself, $recip);
	
	// call block plugin if it exists
	$plugin = uddeIMgetPath('absolute_path').'/components/com_uddeim/block.plugin.php';
	$pluginactionflag = "block";
	if (file_exists($plugin)) {
		include_once($plugin);
	}
	uddeJSEFredirect("index.php?option=com_uddeim&task=settings&Itemid=".$item_id);	
}


function uddeIMunblockUserUdde($myself, $item_id, $recip, $config) {
	if (!$config->blocksystem) {
		$mosmsg = _UDDEIM_BLOCKSDISABLED;
		uddeJSEFredirect("index.php?option=com_uddeim&task=inbox&Itemid=".$item_id, $mosmsg);
	}
	uddeIMpurgeBlockerBlocked($myself, $recip);
	
	// call block plugin if it exists
	$plugin = uddeIMgetPath('absolute_path').'/components/com_uddeim/block.plugin.php';
	$pluginactionflag = "unblock";
	if (file_exists($plugin)) {
		include_once($plugin);
	}
	uddeJSEFredirect("index.php?option=com_uddeim&task=settings&Itemid=".$item_id);
}
