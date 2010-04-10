<?php
/**
 * @version		$Id: elconfigedit.php 10381 2008-06-01 03:35:53Z sonlv $
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
class YOS_ammap_ModelElconfigedit extends JModel
{
	function getDataEdit(){		
		global $mainframe, $option;
		// Initialize variables
		$db			=& JFactory::getDBO();
		$user 		=& JFactory::getUser();
		$date		=& JFactory::getDate();
		$uid		= $user->get('id');
		$el_type	=	JRequest::getCmd('type');
		
		if ($el_type=='') {
			$mainframe->redirect( "index.php?option=$option&task=elconfig", "Can't get element type !");
			return false;
		}
		// load the row from the db table
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type = '$el_type'";
		$db->setQuery($query);
		$rows	=	$db->loadObjectList();
		if (!$rows) {
			return null;
		}
		
		if (($rows[0]->checked_out != $uid) && ($rows[0]->checked_out != 0)) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The Elements Properties' ), $el_type );
			$mainframe->redirect( "index.php?option=$option&task=elconfig", $msg);
		}
		
		
		$query	=	"UPDATE #__yos_elements_properties SET checked_out = $uid, checked_out_time = '".$date->toMySQL()."' WHERE element_type = '$el_type'";
		$db->setQuery($query);
		
		$db->query();
		
		return $rows;
	}		
	
}