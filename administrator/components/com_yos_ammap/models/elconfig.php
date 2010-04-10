<?php
/**
 * @version		$Id: manager.php 10381 2008-06-01 03:35:53Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
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
class YOS_ammap_ModelElconfig extends JModel
{
	
	
	function getAreas(){
		global $mainframe;
		$db	=	$this->_db;
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type='areas'";
		$db->setQuery($query);
		$db->query();
		return $db->getNumRows();
	}
	
	function getMovies(){
		global $mainframe;
		$db	=	$this->_db;
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type='movies'";
		$db->setQuery($query);
		$db->query();
		return $db->getNumRows();
	}
	
	function getLines(){
		global $mainframe;
		$db	=	$this->_db;
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type='lines'";
		$db->setQuery($query);
		$db->query();
		return $db->getNumRows();
	}
	
	function getLabels(){
		global $mainframe;
		$db	=	$this->_db;
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type='labels'";
		$db->setQuery($query);
		$db->query();
		return $db->getNumRows();
	}
	
	
	
}