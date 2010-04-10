<?php
/**
 * @version		$Id: manager.php 10094 2008-03-02 04:35:10Z instance $
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

jimport('joomla.application.component.model');

/**
 * Weblinks Component Weblink Model
 *
 * @package		Joomlord
 * @subpackage	Backup
 * @since 1.5
 */
class YOS_ammap_ModelBackup extends JModel
{

	/**
	 * File Filtered data array
	 *
	 * @var array
	 */
	var $_data = null;
	
	/**
	 * Files in folder
	 *
	 * @var array
	 */
	var $_files= null;

	/**
	 * uri total
	 *
	 * @var integer
	 */
	var $_total = null;

	/**
	 * Pagination object
	 *
	 * @var object
	 */
	var $_pagination = null;

	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();

		global $mainframe;				

		//get the number of events from database
		$option	= JRequest::getCmd( 'option' );
		
		$backup_ext = '\.gz$|\.gzip$|\.bzip2$|\.zip$|\.bz2$|\.tar$';
				
		$limit				= $mainframe->getUserStateFromRequest($option.'.backup.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest($option.'.backup.limitstart', 'limitstart', 0, 'int');
						
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		$this->setState('backup_ext', $backup_ext);				
	}
	
	function getFilesFolder(){
		if (empty($this->_files)) {
			$this->_files 	= JFolder::files(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup',$this->getState('backup_ext'),0,false);
		}
		
		return $this->_files;
	}
	
	function getTotal()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_total))
		{			
			$this->_total = count($this->getFilesFolder());
		}

		return $this->_total;
	}
	
	function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
	
	
	function getData(){
		
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$this->_data = array_slice($this->getFilesFolder(), $this->getState('limitstart'), $this->getState('limit'));
		}

		return $this->_data;
	}	

}