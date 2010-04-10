<?php
/**
 * @version		$Id: manager.php 10381 2008-06-01 03:35:53Z pasamio $
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

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Weblinks Component Weblink Model
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class YOS_ammap_ModelAddon extends JModel
{
	/**
	 * amMap data array
	 *
	 * @var array
	 */
	var $_data = null;	

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
		$config =& JComponentHelper::getParams('com_yos_ammap');
		$config_ext= $config->get('show_extensions');		
		$arr_ext = split(',',$config_ext);
		$show_ext = '';
		foreach ($arr_ext as $ext) {
			$show_ext.="\.$ext$|";
		}
		if ($config_ext!='') {
			$show_ext=substr($show_ext,0,strlen($show_ext)-1);
		} else {
			$show_ext='\.jpg$|\.gif$|\.swf$|\.png$|\.xml$';
		}		
		
		$limit				= $mainframe->getUserStateFromRequest($option.'.addon.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest($option.'.addon.limitstart', 'limitstart', 0, 'int');
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		$this->setState('show_ext', $show_ext);
	}
	
	function getState($property = null)
	{
		static $set;

		if (!$set) {
			$folder = JRequest::getVar( 'folder', '', '', 'path' );
			$this->setState('folder', $folder);

			$parent = str_replace("\\", "/", dirname($folder));
			$parent = ($parent == '.') ? null : $parent;
			$this->setState('parent', $parent);
			$set = true;
		}
		return parent::getState($property);
	}
	
	function getFilesFolder(){
		if (empty($this->_files)) {
			
			$folder = '';		
			if ($this->getState('folder')) {
				$folder = DS.$this->getState('folder');
			}
			$files 	= JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.$folder,$this->getState('show_ext'),0,true);
			$folders= JFolder::folders(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.$folder,'.',0,false);
			
			$items = array_merge($folders,$files);
			$this->_files 	=  $items;
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