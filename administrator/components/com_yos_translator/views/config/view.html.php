<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z sonlv $
* @package		Joomla
* @subpackage	Yos Translator
* @copyright	Copyright (C) 2005 - 2008 Yos Translator. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * HTML View class for the Yos_amMap component
 *
 * @static
 * @package		Joomla
 * @subpackage	Yos_amMap
 * @since 1.0
 */
class TranslatorViewConfig extends JView
{
	function display($tpl = null)
	{
		global $mainframe, $option;
		$document =& JFactory::getDocument();
		JHTML::stylesheet( 'yos_translator.css', 'administrator/components/com_yos_translator/assets/' );
		$document->addScript('http://www.google.com/jsapi');
		
		$document->addScriptDeclaration($this->get('Script'));
		
		// Set the toolbar
		$this->_setToolBar();
		
		$rows	=	$this->get('Data');		
		$this->assignRef('rows',$rows);	
		$this->assignRef('c_translator',$this->get('CurrentTranslator'));
		$this->assign('option',$option);
		parent::display($tpl);
		
	}	

	function _setToolBar()
	{
		JToolBarHelper::title( JText::_( 'Configuration' ), 'config' );
		JToolBarHelper::publishList('config.publish','Active');
		JToolBarHelper::unpublishList('config.unpublish','Unactive');
		JToolBarHelper::save('config.save');
		JToolBarHelper::preferences('com_yos_translator','300','570', 'Configuration','');
	}
}
