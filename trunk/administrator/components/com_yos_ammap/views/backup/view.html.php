<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z eddieajau $
* @package		Joomla
* @subpackage	Media
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
class YOS_ammap_ViewBackup extends JView
{
	function display($tpl = null){
		global $mainframe;
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		$this->_setToolBar();
		
		$option	= JRequest::getCmd( 'option' );
		$pageNav = $this->get('Pagination');
		$rows = $this->get('Data');
		
		$this->assignRef('rows',$rows);
		$this->assignRef('pageNav',$pageNav);		
		$this->assign('option',$option);		
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
	
	function _setToolBar()
	{
		// Get the toolbar object instance
		$bar =& JToolBar::getInstance('toolbar');
		JToolBarHelper::title( JText::_( 'Back-up Manager' ), 'backup' );
		// Add a Install button
		$title = JText::_('Restore');
		$dhtml = "<a href=\"#\" onclick=\"javascript:if(document.adminForm.boxchecked.value==0){alert('Please make a selection from the list to restore');}else{  submitbutton('file.restore')}\" class=\"toolbar\">
					<span class=\"icon-32-restore\" title=\"$title\" type=\"Custom\"></span>
					$title</a>";
		$bar->appendButton( 'Custom', $dhtml, 'restore' );

		JToolBarHelper::deleteList('Are you sure?','file.delete');		
	}
}