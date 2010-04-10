<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z sonlv $
* @package		YOS
* @subpackage	Media
* @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

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
class YOS_ammap_ViewElconfig extends JView
{
	function display($tpl = null){
		global $mainframe;
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		$this->_setToolBar();
		$option	= JRequest::getCmd( 'option' );
		
		$areas	=	$this->get('Areas');
		$movies	=	$this->get('Movies');
		$lines	=	$this->get('Lines');
		$labels	=	$this->get('Labels');
		
		$this->assignRef('areas', $areas);
		$this->assignRef('movies', $movies);
		$this->assignRef('lines', $lines);
		$this->assignRef('labels', $labels);
		$this->assign('option',$option);
		
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
	
	function _setToolBar()
	{
		JToolBarHelper::title( JText::_( 'Element Properties Manager' ), 'elconfig' );		
		JToolBarHelper::preferences('com_yos_ammap','300','570', 'Configuration','');
	}
	
	function edit($tpl	=	null){
		global $mainframe, $option;
		$el_type	=	JRequest::getString('type');
		JToolBarHelper::title( JText::_('Edit element property').' <small>['.$el_type.']</small>', 'addedit.png');
		JToolBarHelper::save('elconfig.save');
		JToolBarHelper::apply('elconfig.apply');
		JToolBarHelper::cancel('elconfig.cancel');
		JHTMLBehavior::mootools();
		$rows	=	$this->get('DataEdit');
		$this->assignRef('lists', $this->getLists($rows));
		$this->assignRef('rows', $rows);
		$this->assignRef('eltype', JRequest::getString('type'));
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
	
	function getLists($rows) {
		$lists	=	array();
		if (!$rows) {
			return $lists;
		}
		$attrib[]	=	new element('Attribute', 0);
		$attrib[]	=	new element('Content', 1);
		foreach ($rows as $key=>$row) {
			$lists[$key]= JHTML::_('select.genericlist',  $attrib, 'type_el['.$key.']', '', 'value', 'text', intval($row->type_el));
		}
		return $lists;
	}
}

class element{
	var $text		=	null;
	var $value		=	null;
	function element($text, $value){
		$this->text	=	$text;
		$this->value=	$value;
	}
}
