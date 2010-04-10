<?php
/**
 * @version		$Id: elconfig.php 10094 2008-03-02 04:35:10Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		Commercial 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * YOS amMap Controller
 *
 * @package		YOS
 * @subpackage	element configuration
 * @since 1.5
 */
class YOS_amMap_ControllerElconfig extends YOS_amMap_Controller
{
	
	function edit_element(){
		global $mainframe;
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'form';
		$mName		= 'elconfigedit';
		// Get/Create the view
		$view = &$this->getView( 'elconfig', $vType);
		
		// Get/Create the model		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
		
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->edit();
	}
	
	function save() {
		global $mainframe, $option;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db		 		=& JFactory::getDBO();
		$user			= & JFactory::getUser();
		
		$name			= JRequest::getVar( 'name', null, 'post', 'array' );
		$type			= JRequest::getVar( 'type', null, 'post', 'array' );
		$type_el		= JRequest::getVar( 'type_el', null, 'post', 'array' );
		$default		= JRequest::getVar( 'default', null, 'post', 'array' );
		$desc			= JRequest::getVar( 'desc', null, 'post', 'array' );
		$eltype			= JRequest::getString('eltype');
		
		$query			=	"DELETE FROM #__yos_elements_properties WHERE element_type = '$eltype'";
		$db->setQuery($query);
		$db->query();
		
		foreach ($name as $key=>$value) {
			if (trim($value)!='') {
				$row				=	&JTable::getInstance('yos_elements_properties','Table');
				
				$row->name			=	$value;
				$row->type			=	$type[$key];
				$row->default		=	$default[$key];
				$row->type_el		=	$type_el[$key];
				$row->description	=	$desc[$key];
				$row->element_type	=	$eltype;
				
				
				if (!$row->store()) {
					JError::raiseError(500, $row->getError() );
				}
			}			
		}
		
		switch ( JRequest::getCmd('task') )
		{	
			case 'elconfig.apply':
				$msg = JText::_( 'Changes to Element saved' );
				$mainframe->redirect( "index.php?option=".$option."&task=elconfig.edit_element&type=$eltype", $msg );
				break;
	
			case 'elconfig.save':
			default:
				$msg = JText::_( 'Element saved' );
				$mainframe->redirect( "index.php?option=".$option."&task=elconfig", $msg );
				break;
		}
		
	}
	
	function cancel() {
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db =& JFactory::getDBO();	
	
		$eltype	=	JRequest::getString('eltype');
		
		$query		=	"UPDATE #__yos_elements_properties SET checked_out = 0, checked_out_time = '0000-00-00 00:00:00' WHERE element_type = '$eltype'";
		$db->setQuery($query);
		
		$db->query();
	
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=elconfig" );
	}
}