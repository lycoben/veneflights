<?php
/**
 * @version		$Id: manager.php 10381 2008-06-01 03:35:53Z sonlv $
 * @package		YOS
 * @subpackage	Content
 * @copyright	Copyright (C) 2008 YOS. All rights reserved.
 * @license		Commercial 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
jimport('joomla.filesystem.folder');

/**
 * Weblinks Component Weblink Model
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class YOS_ammap_ModelCP_Data extends JModel
{
	/**
	 * amMap data array
	 *
	 * @var array
	 */
	var $_ammap = null;	

	/**
	 * icons total
	 *
	 * @var integer
	 */
	var $_icons = null;

	/**
	 * maps total
	 *
	 * @var integer
	 */
	var $_maps = null;
	
	/**
	 * add-ons total
	 *
	 * @var integer
	 */
	var $_addons = null;
	
	/**
	 * plugin total
	 *
	 * @var Object
	 */
	var $_plugin = null;
	
	/**
	 * backup total
	 *
	 * @var integer
	 */
	var $_backup = null;

	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();				
	}
	
	function getAmMapInfo(){
		
		if (empty($this->_ammap)) {
			
			$db		=	&JFactory::getDBO();
			$query	=	"SELECT count(*) FROM #__yos_maps WHERE published = 1";
			$db->setQuery($query);
			$publish	=	$db->loadResult();
			
			$query	=	"SELECT count(*) FROM #__yos_maps WHERE published = 0";
			$db->setQuery($query);
			$unpublish	=	$db->loadResult();
			
			$this->_ammap	=	array('publish'=> $publish, 'unpublish'=> $unpublish);
			
		}
		return $this->_ammap;
	}
	
	function getIconInfo()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_icons))
		{			
			$this->_icons = count(JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'icons','.', true));
		}

		return $this->_icons;
	}

	function getMapInfo()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_maps))
		{			
			$this->_maps = count(JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'maps','.', true));
		}

		return $this->_maps;
	}
	
	function getAddonInfo()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_addons))
		{			
			$this->_addons = count(JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon','.', true));
		}

		return $this->_addons;
	}
	
	function getPluginInfo(){
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_plugin))
		{
			$db	=	&JFactory::getDBO();
			$query = "SELECT name, published FROM #__plugins WHERE folder = 'yos_map'";
			$db->setQuery($query);
			$plugin = $db->loadObjectList();
			$this->_plugin = $plugin;
		}

		return $this->_plugin;
	}
	
	function getBackupInfo()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_backup))
		{			
			$this->_backup = count(JFolder::files(JPATH_COMPONENT_ADMINISTRATOR.DS.'backup','\.gz$', false));
		}

		return $this->_backup;
	}
	
}