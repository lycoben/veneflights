<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z sonlv $
* @package		YOS
* @subpackage	Elements
* @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
* @license		Commercial
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * HTML View class for the YOS_amMap component
 *
 * @static
 * @package		Joomla
 * @subpackage	YOS_amMap
 * @since 1.0
 */
class YOS_ammap_ViewElements extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		// Set the toolbar
		$this->_setToolBar();
		
		$option				= JRequest::getCmd( 'option' );
		
		$rows	=	$this->get('Data');
		$pageNav=	$this->get('Pagination');
		$lists	=	$this->get('Lists');		
		
		$this->assignRef('lists',$lists);
		$this->assignRef('rows',$rows);
		$this->assignRef('pageNav',$pageNav);
		$this->assign('option',$option);
		parent::display($tpl);
		
	}	

	function _setToolBar()
	{
		JToolBarHelper::title( JText::_( 'YOS Elements Manager' ), 'elements' );
		JToolBarHelper::publishList('elements.publish');
		JToolBarHelper::unpublishList('elements.unpublish');		
		JToolBarHelper::deleteList('Are you sure?','elements.remove');
		JToolBarHelper::editListX('elements.editel');
		JToolBarHelper::addNewX('elements.newel');
		JToolBarHelper::preferences('com_yos_ammap','300','570', 'Configuration','');
	}
	
	function edit($tpl	=	null){
		global $mainframe, $option;
		
		JToolBarHelper::title( JText::_('Edit Element'), 'addedit.png');
		JToolBarHelper::save('elements.save');
		JToolBarHelper::apply('elements.apply');
		JToolBarHelper::cancel('elements.cancel');
		JHTMLBehavior::mootools();
		$row		=	$this->get('Data');
		$properties	=	$this->get('Structural');
		
		// build the html radio buttons for published
		
		$published = ($row->published) ? $row->published : 1;
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $published );
		
		$this->assignRef('row', $row);
		$this->assignRef('properties', $properties);
		$this->assignRef('map_id', JRequest::getInt('filter_map'));
		$this->assignRef('eltype', JRequest::getString('filter_element'));
		$this->assignRef('lists', $lists);
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
}
