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

if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	global $mainframe;
	require_once($mainframe->getPath('toolbar_default'));
	require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
	require_once(JPATH_SITE.'/administrator/components/com_uddeim/admin.uddeimlib15.php');
} else {
	global $mainframe;
	require_once($mainframe->getPath('toolbar_default'));
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
	require_once($mainframe->getCfg('absolute_path').'/administrator/components/com_uddeim/admin.uddeimlib10.php');
}

// $act = uddeIMmosGetParam( $_REQUEST, 'act', '' );

switch ($task) {
	case "usersettings":
		mosMenuBar::startTable();
		mosMenuBar::addNew('usersettingsnew', 'Create settings');				// new
		mosMenuBar::deleteList('', 'usersettingsremove', 'Remove settings');	// remove
		mosMenuBar::back("Back", "index2.php?option=$option&task=settings");
		mosMenuBar::spacer();
		mosMenuBar::endTable();
		break;
	case "convertconfig":
	case "importpms":
	case "archivetotrash":
	case "maintenance":
	case "maintenanceprune":
	case "versioncheck":
	case "backuprestore":
	case "showstatistics":
		mosMenuBar::startTable();
		mosMenuBar::back("Back", "index2.php?option=$option&task=settings");
		mosMenuBar::spacer();
		mosMenuBar::endTable();
		break;
//		mosMenuBar::startTable();
//		mosMenuBar::customX( 'usersettings', '../components/com_uddeim/images/user.png', '../components/com_uddeim/images/user.png', 'User settings', false );
//		mosMenuBar::customX( 'usersettings', 'user.png', 'user.png', 'User settings', false );
//		mosMenuBar::customX( 'usersettings', 'edit.png', 'edit_f2.png', 'User settings', false );
//		mosMenuBar::save( 'savesettings', 'Save' );
//		mosMenuBar::cancel();
//		mosMenuBar::spacer();
//		mosMenuBar::endTable();
//		break;
	case "savesettings":
	case "cancel":
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
		break;
	case "settings":
	default:
		mosMenuBar::startTable();
//		mosMenuBar::customX( 'usersettings', '../components/com_uddeim/images/user.png', '../components/com_uddeim/images/user.png', 'User settings', false );
//		mosMenuBar::customX( 'usersettings', 'user.png', 'user.png', 'User settings', false );
//		mosMenuBar::customX( 'backuprestore', 'archive.png', 'archive_f2.png', 'Backup &amp; Restore', false );
		mosMenuBar::customX( 'usersettings', 'edit.png', 'edit_f2.png', 'User settings', false );
		mosMenuBar::save( 'savesettings', 'Save' );
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::endTable();
		break;
}
