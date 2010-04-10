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
class YOS_ammap_ViewIcons extends JView
{
	function display($tpl = null){
		global $mainframe;
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		$this->_setToolBar();
		$option	= JRequest::getCmd( 'option' );
		
		$rows	=	$this->get('Data');
		$pageNav=	$this->get('Pagination');
		$config =& JComponentHelper::getParams('com_yos_ammap');
		
		$document =& JFactory::getDocument();
		JHTML::_('behavior.mootools');
		$document->addStyleSheet('components/com_yos_ammap/assets/mediamanager.css');
		
		JHTML::_('behavior.modal');
		$document->addScriptDeclaration("
		window.addEvent('domready', function() {
			document.preview = SqueezeBox;
		});");				
		JHTML::_('behavior.modal', 'a.modal-icons');
		
		// Set FTP form
		$ftp = !JClientHelper::hasCredentials('ftp');
		
//		if ($config->get('enable_flash', 1)) {
//			JHTML::_('behavior.uploader', 'file-upload', array('onAllComplete' => 'function(){ $(\'adminForm\').submit(); }'));
//		}
		
		$this->assignRef('rows',$rows);
		$this->assignRef('pageNav',$pageNav);
		$this->assignRef('config', $config);
		$this->assign('option',$option);
		$this->assign('require_ftp', $ftp);
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
	
	function _setToolBar()
	{
		JToolBarHelper::title( JText::_( 'Icons Manager' ), 'icon' );		
		JToolBarHelper::deleteList('Are you sure?','file.delete');
		JToolBarHelper::preferences('com_yos_ammap','300','570', 'Configuration','');
	}
}