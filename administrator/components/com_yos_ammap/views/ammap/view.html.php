<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z sonlv $
* @package		YOS
* @subpackage	Elements
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
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
class YOS_ammap_ViewAmmap extends JView
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
		JToolBarHelper::title( JText::_( 'YOS amMap Manager' ), 'ammap' );
		JToolBarHelper::publishList('list.publish');
		JToolBarHelper::unpublishList('list.unpublish');		
		JToolBarHelper::deleteList('Are you sure?','list.remove');
		JToolBarHelper::editListX('edit');
		JToolBarHelper::addNewX('new');
		JToolBarHelper::preferences('com_yos_ammap','300','570', 'Configuration','');
	}
	
	function _edit($edit){
		global $mainframe;
		
		$model	=	&$this->getModel('ammap');
		$row	=	$model->getDataEdit($edit);
		$lists	=	$model->getEditLists($row, $edit);
		
		$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		$document->addScript('components/com_yos_ammap/assets/edit_area/edit_area_full.js');
		$document->addScript('components/com_yos_ammap/assets/yos_editmanager.js');
		$document->addScript('components/com_yos_ammap/assets/yos_view.js');
		$document->addScript('components/com_yos_ammap/assets/colorpick/dhtmlxcolorpicker.js');
		$document->addScriptDeclaration("
			window.dhx_globalImgPath='components/com_yos_ammap/assets/colorpick/imgs/';
		");
		$document->addStyleSheet('components/com_yos_ammap/assets/colorpick/dhtmlxcolorpicker.css');	
		
		$this->_setToolBarEdit($edit);		
		
		$this->assignRef('row',$row);
		$this->assignRef('lists', $lists);
		parent::display('edit');
	}
	
	function _setToolBarEdit($edit){
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
		$cid = intval($cid[0]);

		$text = ( $edit ? JText::_( 'Edit' ) : JText::_( 'New' ) );

		JToolBarHelper::title( JText::_( 'amMap' ).': <small><small>[ '. $text.' ]</small></small>', 'addedit.png' );
		//JToolBarHelper::preview( 'index.php?option=com_yos_ammap&id='.$cid.'&tmpl=component', true );
		JToolBarHelper::save('list.save');
		JToolBarHelper::apply('list.apply');		
		if ( $edit ) {
			// for existing articles the button is renamed `close`
			JToolBarHelper::cancel( 'list.cancel', 'Close' );
		} else {
			JToolBarHelper::cancel('list.cancel');
		}
	}
	
	
}
