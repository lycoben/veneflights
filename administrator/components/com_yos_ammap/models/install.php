<?php
/**
 * @version		$Id: install.php 10094 2008-03-02 04:35:10Z instance $
 * @package		Joomla
 * @subpackage	Menus
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );
jimport('joomla.filesystem.archive');
jimport( 'joomla.installer.installer' );
jimport('joomla.installer.helper');

/**
 * Extension Manager Install Model
 *
 * @package		Joomla
 * @subpackage	Installer
 * @since		1.5
 */
class YOS_ammap_ModelInstall extends JModel
{
	/** @var object JTable object */
	var $_table = null;

	/** @var object JTable object */
	var $_url = null;

	/**
	 * Overridden constructor
	 * @access	protected
	 */
	function __construct()
	{
		parent::__construct();

	}

	function install()
	{
		global $mainframe;

		$this->setState('action', 'install');
		

		switch(JRequest::getWord('installtype'))
		{
			case 'upload':
				$package = $this->_getPackageFromUpload();
				break;

			default:
				$this->setState('message', 'No Install Type Found');
				return false;
				break;
		}

		// Was the package unpacked?
		if (!$package) {
			$this->setState('message', 'Unable to find install package');
					
			return false;
		}

		// Get a database connector
		//$db = & JFactory::getDBO();

		// Get an installer instance
		$installer =& JInstaller::getInstance();

	
		// Package installed sucessfully
		$msg = JText::sprintf(JText::_('Success'));
		$result = true;
		

		// Set some model state values
		$mainframe->enqueueMessage($msg);
		$this->setState('result', $result);

		// Cleanup the install files
		if (!is_file($package['packagefile'])) {
			$config =& JFactory::getConfig();
			$package['packagefile'] = $config->getValue('config.tmp_path').DS.$package['packagefile'];
		}

		JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

		return $result;
	}

	/**
	 * @param string The class name for the installer
	 */
	function _getPackageFromUpload()
	{

		// Get the uploaded file information
		$userfile = JRequest::getVar('install_package', null, 'files', 'array' );

		// Make sure that file uploads are enabled in php
		if (!(bool) ini_get('file_uploads')) {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('WARNINSTALLFILE'));
			return false;
		}

		// Make sure that zlib is loaded so that the package can be unpacked
		if (!extension_loaded('zlib')) {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('WARNINSTALLZLIB'));
			return false;
		}

		// If there is no uploaded file, we have a problem...
		if (!is_array($userfile) ) {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('No file selected'));
			return false;
		}

		// Check if there was a problem uploading the file.
		if ( $userfile['error'] || $userfile['size'] < 1 )
		{
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('WARNINSTALLUPLOADERROR'));
			return false;
		}

		// Build the appropriate paths
		$config =& JFactory::getConfig();
		$tmp_dest 	= $config->getValue('config.tmp_path').DS.$userfile['name'];
		$tmp_src	= $userfile['tmp_name'];

		// Move uploaded file
		jimport('joomla.filesystem.file');
		$uploaded = JFile::upload($tmp_src, $tmp_dest);

		// Path to the archive
		$archivename = $tmp_dest;

		// Temporary folder to extract the archive into
		$tmpdir = uniqid('map_');

		// Clean the paths to use for archive extraction
		$extractdir = JPath::clean(dirname($tmp_dest).DS.$tmpdir);
		$archivename = JPath::clean($archivename);
		
		$package['packagefile']=$archivename;
		$package['extractdir']=$extractdir;

		// do the unpacking of the archive
		$result = JArchive::extract( $archivename, $extractdir);
		// Search the install dir for an xml file
		$files = JFolder::files($extractdir, '\.xml$|\.swf$|\.jpg$|\.gif$|\.png$', 0, true);
		if (!is_integer(array_search($extractdir.DS.'ammap_settings.xml',$files))||!is_integer(array_search($extractdir.DS.'ammap_data.xml',$files))){
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('Invalid Files'));	
			return false;
		}		

		$createdate	 	=& JFactory::getDate();
		$db				= & JFactory::getDBO();
		$nowdate		= JHTML::_('date', $createdate->toUnix(), '%Y-%m-%d %H:%M:%S');
		$title			= JRequest::getVar('install_title','');
		$foldername 	= uniqid($title.'_').'_'.md5($nowdate);
		$user			=& JFactory::getUser();
		//Get Instance in DB
		$row 			=& $this->getTable('yos_AmMap','Table');
		$row->title 	= $title;		
		$row->folder	= JFolder::makeSafe(strtolower(preg_replace('/ /','',$foldername)));
		$row->folderaddon= JFolder::makeSafe(strtolower(preg_replace('/ /','',uniqid($title.'_'))));
		$row->hdata		= md5($nowdate);
		$row->hsettings	= md5($nowdate);
		$row->published = 0;
		$row->ordering	= 0;
		$row->checked_out = 0;
		$row->created	= $nowdate;
		$row->created_by= $user->get('id');
		$row->timeout	= 30;

		if (JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder)) {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('WARNINSTALLFILE'));
			return false;
		}
		
		$folders = JFolder::folders($extractdir,'.',1,true);
		if (count($folders)) {
			foreach ($folders as $folder) {
				if ($folder==$extractdir.DS.'icons') {
					$icons = JFolder::files($folder,'\.swf$|\.jpg$|\.gif$|\.png$',1,false);
					foreach ($icons as $icon) {
						if (JFile::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'icons'.DS.$icon)) {
							JError::raiseWarning('SOME_ERROR_CODE', JText::_('May be this icons exists!!'));
							return false;
						}						
					}
					foreach ($icons as $icon) {
						JFile::move($extractdir.DS.'icons'.DS.$icon,JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'icons'.DS.$icon);
					}
				}
				if ($folder==$extractdir.DS.'maps') {
					$maps = JFolder::files($folder,'\.swf$|\.jpg$|\.gif$|\.png$',1,false);
					foreach ($maps as $map) {
						if (JFile::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'maps'.DS.$map)) {
							JError::raiseWarning('SOME_ERROR_CODE', JText::_('May be this maps exists!!'));
							return false;
						}
					}
					foreach ($maps as $map) {
						JFile::move($extractdir.DS.'maps'.DS.$icon,JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'maps'.DS.$map);
					}
				}
			}
		}

		JFolder::create(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder);
		JFile::move($extractdir.DS.'ammap_settings.xml', JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder.DS.'ammap_settings.xml');
		JFile::move($extractdir.DS.'ammap_data.xml', JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder.DS.'ammap_data.xml');
		$files = JFolder::files($extractdir, '\.xml$|\.swf$|\.jpg$|\.gif$|\.png$', 0, true);
		JFolder::create(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon);
		foreach ($files as $file) {			
			$filename= strrev($file);
			$filename = substr($filename,0,strpos($filename,DS));
			$filename= strrev($filename);
			JFile::move($file,JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon.DS.$filename);		
		}		
		//Store in database
		if (!$row->store()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}
		$package['row']=&$row;
		$package['dir']=$row->folder;
		
		
		return $package;
	}

	
}