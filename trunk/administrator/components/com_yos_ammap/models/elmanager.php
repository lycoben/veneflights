<?php
/**
 * @version		$Id: elements.php 10381 2008-06-01 03:35:53Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		Commercial 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * amMap Component Elements Model
 *
 * @package		YOS
 * @subpackage	Elememnts
 * @since 1.5
 */
class YOS_ammap_ModelElmanager extends JModel
{	
	function getData(){		
		global $mainframe, $option;
		
		// Initialize variables
		$db			=& JFactory::getDBO();
		$user 		=& JFactory::getUser();
		$uid		= $user->get('id');
		$date		=& JFactory::getDate();
		$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );
		$filter_element	=	JRequest::getString('filter_element');
		
		$task	=	JRequest::getCmd('task');
		list($controllerName, $task) = explode('.', $task);
		
		$edit	=	$task=='editel' ? 1 : 0;
		
		JArrayHelper::toInteger($cid, array(0));
		
		// load the row from the db table
		if ($edit)	{
			$query	=	"SELECT * FROM #__yos_map_elements WHERE element_id = $cid[0] AND element_type = '$filter_element'";
			$db->setQuery($query);
			
			$rows	=	$db->loadObjectList();			
		} else {
			$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type = '$filter_element'";
			$db->setQuery($query);
			$properties	=	$db->loadObjectList();
			$data	=	new stdClass();
			
			foreach ($properties as $value) {
				$refer			=	$value->name;
				$data->$refer	=	null;
			}
			$data->published	=	null;
			$data->id			=	null;
			return $data;
		}	
		
		// fail if checked out not by 'me'
		if (($rows[0]->checked_out != $uid) && ($rows[0]->checked_out != 0)) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The Map Elements' ), $filter_element );
			$mainframe->redirect( "index.php?option=$option&task=elements", $msg);
		}
		
		if ( $edit ) {
			$query	=	"UPDATE #__yos_map_elements SET checked_out = $uid, checked_out_time = '".$date->toMySQL()."' WHERE element_id = $cid[0]";
			$db->setQuery($query);			
			$db->query();
			
			$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type = '$filter_element'";
			$db->setQuery($query);
			$properties	=	$db->loadObjectList();
			$data	=	new stdClass();
			
			foreach ($properties as $value) {
				foreach ($rows as $row) {
					if ($row->field_name == $value->name) {
						$refer			=	$value->name;
						$data->$refer	=	$row->value;
						break;
					}
				}
			}
			
			$data->published	=	$rows[0]->published;
			$data->id			=	$cid[0];
		}
		
		return $data;
	}

	
	function getStructural(){
		$db	=	&JFactory::getDBO();
		$filter_element	=	JRequest::getString('filter_element');
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type = '$filter_element'";
		$db->setQuery($query);
		$rows	=	$db->loadObjectList();
		return $rows;
	}
	
}

class elements extends JObject {
	var $value 	= 	null;
	var $name	=	null;
	
	function __construct($value, $name){
		$this->set('value', $value);
		$this->set('name', $name);
	}	
}