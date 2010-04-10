<?php
/**
 * @version		$Id: file.php 10094 2008-03-02 04:35:10Z instance $
 * @package		Joomla
 * @subpackage	Content
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

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Weblinks Weblink Controller
 *
 * @package		Joomla
 * @subpackage	Weblinks
 * @since 1.5
 */
class YOS_amMap_ControllerFile extends YOS_amMap_Controller
{
	/**
	 * Upload a file
	 *
	 * @since 1.5
	 */
	function upload()
	{
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken( 'request' ) or jexit( 'Invalid Token' );

		$file 		= JRequest::getVar( 'Filedata', '', 'files', 'array' );		
		$format		= JRequest::getVar( 'format', 'html', '', 'cmd');
		$return		= JRequest::getVar( 'return-url', null, 'post', 'base64' );
		$oldtask	= JRequest::getVar( 'oldtask', '');		
		$fd			= JRequest::getVar( 'folder', '');
		$ammap		= false;
		if ($fd!='') {
			$fd= DS.$fd;
		}
		$err		= null;
		
		if ($oldtask=='uploadammap') {
			if (strtolower($file['name'])!='ammap.swf') {
				JError::raiseWarning(100, 'Filename have to be ammap.swf !');
				if ($return) {
					$mainframe->redirect(base64_decode($return));
				}
				return ;
			} else {
				$oldtask='';
				$ammap=true;
			}
		}

		// Set FTP credentials, if given
		jimport('joomla.client.helper');
		JClientHelper::setCredentialsFromRequest('ftp');

		// Make the filename safe
		$file['name']	= JFile::makeSafe($file['name']);
		
		if (isset($file['name'])) {
			
			$filepath = JPath::clean(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.$oldtask.$fd.DS.strtolower($file['name']));

			if (!MediaHelper::canUpload( $file, $err )) {
				if ($format == 'json') {
					jimport('joomla.error.log');
					$log = &JLog::getInstance('upload.error.php');
					$log->addEntry(array('comment' => 'Invalid: '.$filepath.': '.$err));
					header('HTTP/1.0 415 Unsupported Media Type');
					jexit('Error. Unsupported Media Type!');
				} else {
					JError::raiseNotice(100, JText::_($err));
					// REDIRECT
					if ($return) {
						$mainframe->redirect(base64_decode($return));
					}
					return;
				}
			}

			if (JFile::exists($filepath) && ($file['name']!='ammap.swf')) {
				if ($format == 'json') {
					jimport('joomla.error.log');
					$log = &JLog::getInstance('upload.error.php');
					$log->addEntry(array('comment' => 'File already exists: '.$filepath));
					header('HTTP/1.0 409 Conflict');
					jexit('Error. File already exists');
				} else {
					JError::raiseNotice(100, JText::_('Error. File already exists'));
					// REDIRECT
					if ($return) {
						$mainframe->redirect(base64_decode($return));
					}
					return;
				}
			}

			if (!JFile::upload($file['tmp_name'], $filepath)) {
				if ($format == 'json') {
					jimport('joomla.error.log');
					$log = &JLog::getInstance('upload.error.php');
					$log->addEntry(array('comment' => 'Cannot upload: '.$filepath));
					header('HTTP/1.0 400 Bad Request');
					jexit('Error. Unable to upload file');
				} else {
					JError::raiseWarning(100, JText::_('Error. Unable to upload file'));
					// REDIRECT
					if ($return) {
						$mainframe->redirect(base64_decode($return));
					}
					return;
				}
			} else {
				if ($format == 'json') {
					jimport('joomla.error.log');
					$log = &JLog::getInstance();
					$log->addEntry(array('comment' => $folder));
					jexit('Upload complete');
				} else {
					$mainframe->enqueueMessage(JText::_('Upload complete'));
					// REDIRECT
					
					if ($ammap) {
						$mainframe->redirect('index.php?option=com_yos_ammap');
						return ;
					}
					
					if ($return) {
						$mainframe->redirect(base64_decode($return));
					}
					return;
				}
			}
		} else {
			
			$mainframe->redirect(base64_decode($return), 'Invalid Request', 'error');
		}
	}
	
	/**
	 * Deletes paths from the current path
	 *
	 * @param string $listFolder The image directory to delete a file from
	 * @since 1.5
	 */
	function delete()
	{
		global $mainframe;

		// Set FTP credentials, if given
		jimport('joomla.client.helper');
		JClientHelper::setCredentialsFromRequest('ftp');

		// Get some data from the request
		$paths		= JRequest::getVar( 'cid', array(), '', 'array' );
		$returntask = JRequest::getCmd('returntask');		

		// Initialize variables
		$msg = array();
		$ret = true;
		
		if (count($paths)) {
			foreach ($paths as $path)
			{
				if ($returntask!='addon'){
					if ($path !== JFile::makeSafe($path)) {
						JError::raiseWarning(100, JText::_('Unable to delete:').htmlspecialchars($path, ENT_COMPAT, 'UTF-8').' '.JText::_('WARNFILENAME'));
						continue;
					}
				}
				if ($returntask=='addon') {
					$fullPath = JPath::clean($path);	
				} elseif ($returntask=='backup'){ 
					$fullPath = JPath::clean(JPATH_COMPONENT_ADMINISTRATOR.DS.$returntask.DS.$path);
				} else {
					$fullPath = JPath::clean(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.$returntask.DS.$path);
				}
				if (is_file($fullPath)) {
					$ret |= !JFile::delete($fullPath);
				} else if (is_dir($fullPath)) {
					$files = JFolder::files($fullPath, '.', true);
					$canDelete = true;
					foreach ($files as $file) {
						if ($file != 'index.html') {
							$canDelete = false;
						}
					}
					if ($canDelete) {
						$ret |= !JFolder::delete($fullPath);
					} else {
						JError::raiseWarning(100, JText::_('Unable to delete:').$fullPath.' '.JText::_('Not Empty!'));
					}
				}
			}
		}
		switch ($returntask){
			case 'icons':
				$mainframe->redirect('index.php?option=com_yos_ammap&task=icons');
				break;				
			case 'maps':
				$mainframe->redirect('index.php?option=com_yos_ammap&task=maps');
				break;
			case 'backup':
				$mainframe->redirect('index.php?option=com_yos_ammap&task=backup');
				break;
			case 'addon':
				$folder = JRequest::getVar('folder','');
				$mainframe->redirect('index.php?option=com_yos_ammap&task=addon&folder='.$folder);
				break;				
		}		
	}
	
	function preview(){
		global $mainframe;
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
		header( "Last-Modified: ".gmdate( "D, d M Y H:i:s" )."GMT" );
		header( "Cache-Control: no-cache, must-revalidate" ); 
		header( "Pragma: no-cache" );
		header( "Content-Type: text/xml; charset=utf-8" );
		$document	=& JFactory::getDocument();		
		$url		=	JRequest::getVar('url', '');		
		$document->setLink(JURI::root());
		$content	=	JFile::read($url);		
		$content	=	preg_replace('/<hr\s+id=(\"|\')system-readmore(\"|\')\s*\/*>/i','', $content);
		JHTML::_('behavior.caption');
		
		?>		

		<table align="center" width="90%" cellspacing="2" cellpadding="2" border="0">			
		<tr>
			<td valign="top" height="90%" colspan="2"><?php echo htmlspecialchars($content); ?></td>
		</tr>
		</table>
		<?php
		exit();
	}
	
	function download(){
		global $mainframe;
		jimport('joomla.filesystem.archive');
		$option		= JRequest::getCmd( 'option' );
		$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );		
		JArrayHelper::toInteger($cid, array(0));
		$row =& JTable::getInstance('yos_AmMap','Table');
		$row->load($cid[0]);		
		$zipname = strtolower(preg_replace('/\s/','',uniqid($row->title.'_'))).'.tar';
		$config =& JFactory::getConfig();
		$zipdest = JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.$zipname;
		$filedatas = JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder,'.', 0, true);
		$fileaddon = JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon,'.', 0, true);
		$files = array_merge($filedatas, $fileaddon);
		$foldername = uniqid('folder_');
		$destfolder = JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.$foldername;
		JFolder::create($destfolder);
		foreach ($files as $file) {
			if (!JFile::copy($file,$destfolder.str_replace(dirname($file),'',$file))) {
				$mainframe->redirect(JRoute::_('index.php?option=com_yos_ammap&task=backup'),'Failed');
			}
		}
		
		$files = JFolder::files($destfolder,'.',0,true);
		
		JArchive::create($zipdest, $files,'gz','',dirname($files[0]),true,true);
		JFolder::delete($destfolder);
		
	 	$mainframe->redirect(JRoute::_('components/com_yos_ammap/backup/'.$zipname.'.gz'));
	}
	
	function restore(){
		global $mainframe;
		jimport('joomla.filesystem.archive');
		$paths		= JRequest::getVar( 'cid', array(), '', 'array' );
		if (!count($paths)) {
			$mainframe->redirect('index.php?option=com_yos_ammap&task=backup');
		}
		foreach ($paths as $path) {
			$tmp_dest	= JPATH_COMPONENT_ADMINISTRATOR.DS.'backup'.DS.$path;
		
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
			$title			= $path;
			$foldername 	= uniqid($title.'_').'_'.md5($nowdate);
			$user			=& JFactory::getUser();
			//Get Instance in DB
			$row 			=	&JTable::getInstance('yos_AmMap','Table');
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
			
			// Does the unpacked extension directory exist?
			if (is_dir($package['extractdir'])) {
				JFolder::delete($package['extractdir']);
			}
			
		}
		$mainframe->redirect('index.php?option=com_yos_ammap&task=backup','Restore Successful');
	}

}
