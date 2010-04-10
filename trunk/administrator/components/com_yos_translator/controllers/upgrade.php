<?php
/**
 * @version		$Id: upgrade.php 189 2008-09-16 08:42:00 sonlv $
 * @package		YOS
 * @subpackage	Upgrade
 * @author 		Sonlv
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

// Include class autoupdate
require_once( JPATH_COMPONENT.DS.'helpers'.DS.'autoupdate.php' );


/**
 * Yos_Upgrade_Controller
 *
 * @package		YOS
 * @subpackage	Upgrade
 * @since 1.5
 */
class TranslatorControllerUpgrade extends TranslatorController
{
	function doupdate(){
		global $mainframe;
		// Get/Create the model	
		$checkversion	=	&Yos_utility::getVersion();
		$version	=	$checkversion['version'];
		$url		=	$checkversion['url'];
		$pc			=	$checkversion['productcode'];
		
		$config =& JComponentHelper::getParams('com_yos_translator');
		$config_lic= $config->get('licence');		
		
		
		$engine		=	new AutoUpdateEngine($url, $pc, $version, JURI::root(), $config_lic);
		
		if (!$autoupdate	=	& $engine->getInstance()) {
			$mainframe->redirect('index.php?option=com_yos_translator&task=about');
			return false;
		}
		
		$autoupdate->upgradeFile();
		$autoupdate->upgradeSql();
		$autoupdate->cleanFileUpdate();
		$mainframe->redirect('index.php?option=com_yos_translator&task=about', $autoupdate->getReport());
	}
	
	function getbackup(){
		global $mainframe;		
		
		if (!JFile::exists(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.'backup.php')) {
			JError::raiseWarning(304,'Backup file doesn\'t exist!');
			$mainframe->redirect('index.php?option=com_yos_translator&task=about');
			return false;
		}
		
		$version		=		JRequest::getCmd('version');
		
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.'backup.php');
		if (!JFile::exists($urlbackup)) {
			JError::raiseWarning(400,'File backup doesn\'t exist!');
			$mainframe->redirect('index.php?option=com_yos_translator&task=about');
			return false;
		}
		
		// do the unpacking of the archive		
		$extractdir		=	JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.uniqid($version.'_');
		$archivename	=	$urlbackup;
		JFolder::create($extractdir);
		$result = JArchive::extract( $archivename, $extractdir);		
		
		// Get Instance
		$autoupdate	=	new AutoupdateHelper($extractdir.DS.'update.xml',false ,true , false, $extractdir);
		
		$autoupdate->upgradeFile();
		$autoupdate->cleanFileUpdate();
		$mainframe->redirect('index.php?option=com_yos_translator&task=about', $autoupdate->getReport());
	}
	
	function getFileBackup(){
		
		global $mainframe;
		if (!JFile::exists(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.'backup.php')) {
			JError::raiseWarning(304,'Backup file doesn\'t exist!');
			$mainframe->redirect('index.php?option=com_yos_translator&task=about');
			return false;
		}
		
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.'backup.php');
		if (!JFile::exists($urlbackup)) {
			JError::raiseWarning(400,'File backup doesn\'t exist!');
			$mainframe->redirect('index.php?option=com_yos_translator&task=about');
			return false;
		}
		$mainframe->redirect(str_replace(JPATH_ADMINISTRATOR.DS,'',$urlbackup));
	}

}