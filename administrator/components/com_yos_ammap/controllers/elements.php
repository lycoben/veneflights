<?php
/**
 * @version		$Id: file.php 10094 2008-03-02 04:35:10Z sonlv $
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
 * @package		Joomla
 * @subpackage	amMap
 * @since 1.5
 */
class YOS_amMap_ControllerElements extends YOS_amMap_Controller
{
	function __construct(){
		parent::__construct();
		$this->registerTask('newel', 'editel');
		$this->registerTask('unpublish','publish');
	}
	
	function element(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'elements';
		// Get/Create the view
		$view = &$this->getView( 'elements', $vType);
		
		// Get/Create the model		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
		
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function editel(){
		global $mainframe;		
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'form';
		$mName		= 'elmanager';
		// Get/Create the view
		$view = &$this->getView( 'elements', $vType);
		
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
	
	function save(){
		global $mainframe, $option;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db		 		=& JFactory::getDBO();
		$user			= & JFactory::getUser();		
		
		$eltype			= JRequest::getString('eltype');
		$map_id			= JRequest::getInt('map_id');
		$post			= $_POST;
		$element_id		= JRequest::getInt('id');
		$published		= JRequest::getInt('published');
		
		if ($element_id) {
			$query			=	"DELETE FROM #__yos_map_elements WHERE element_id = $element_id AND element_type = '$eltype' AND map_id = $map_id ";
			$db->setQuery($query);
			$db->query();
		} else {
			$query			=	"SELECT * FROM #__yos_map_elements WHERE element_type = '$eltype' AND map_id = $map_id GROUP BY element_id";
			$db->setQuery($query);
			$db->query();
			$element_id	=	$db->getNumRows() + 1;
		}
		
		$query		=	"SELECT * FROM #__yos_elements_properties WHERE element_type = '$eltype'";
		$db->setQuery($query);
		$element	=	$db->loadObjectList();
		
		foreach ($element as $property) {
			if (array_key_exists($property->name, $post)) {
				$row				=	&JTable::getInstance('yos_map_elements', 'Table');
				$row->map_id		=	$map_id;
				$row->element_id	=	$element_id;
				$row->element_type	=	$eltype;
				$row->field_name	=	$property->name;
				$row->value			=	$post[$property->name];
				$row->type			=	$property->type_el;
				$row->published		=	$published;
				if (!$row->store()) {
					JError::raiseError(500, $row->getError() );
				}
			}
		}
		

		
		switch ( JRequest::getCmd('task') )
		{	
			case 'elements.apply':
				$msg = JText::_( 'Changes to Element saved' );
				$mainframe->redirect( "index.php?option=".$option."&task=elements.editel&filter_map=$map_id&filter_element=$eltype&cid[]=$element_id", $msg );
				break;
	
			case 'elements.save':
			default:
				$msg = JText::_( 'Element saved' );
				$mainframe->redirect( "index.php?option=".$option."&task=elements.element&filter_element=$eltype&filter_map=$map_id", $msg );
				break;
		}
	}
	
	function cancel() {
		global $mainframe, $option;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db =& JFactory::getDBO();	
	
		$element_id		= JRequest::getInt('id');
		$eltype			= JRequest::getString('eltype');
		$map_id			= JRequest::getInt('map_id');
		
		if (!$element_id) {
			$mainframe->redirect( "index.php?option=$option&task=elements.element&filter_element=$eltype&filter_map=$map_id" );
		}
		
		
		$query		=	"UPDATE #__yos_map_elements SET checked_out = 0, checked_out_time = '0000-00-00 00:00:00' WHERE element_id = $element_id AND element_type = '$eltype' AND map_id = $map_id";
		$db->setQuery($query);
		
		$db->query();
	
		$mainframe->redirect( "index.php?option=$option&task=elements.element&filter_element=$eltype&filter_map=$map_id" );
	}
	
	function publish(){
		global $mainframe, $option;
		
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		// Initialize variables
		$db =& JFactory::getDBO();
		
		$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );
		$eltype			= JRequest::getString('filter_element');
		$map_id			= JRequest::getInt('filter_map');
		JArrayHelper::toInteger($cid, array(0));
		
		$task		=	JRequest::getCmd('task','elements.publish');
		
		$published	=	$task=='elements.publish' ? 1 : 0;
		
		$query	=	"UPDATE #__yos_map_elements SET published = $published WHERE element_id = $cid[0] AND element_type = '$eltype' AND map_id = $map_id";
		$db->setQuery($query);
		$db->query();
		
		$mainframe->redirect( "index.php?option=$option&task=elements.element&filter_element=$eltype&filter_map=$map_id" );
	}
}