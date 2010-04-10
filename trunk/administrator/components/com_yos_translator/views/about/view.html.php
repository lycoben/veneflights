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
 * HTML View class for the Yos_translator component
 *
 * @static
 * @package		Joomla
 * @subpackage	Yos_translator
 * @since 1.0
 */
class TranslatorViewAbout extends JView
{
	function display($tpl = null){
		JHTML::stylesheet( 'yos_translator.css', 'administrator/components/com_yos_translator/assets/' );
		JToolBarHelper::title( JText::_( 'Yos Translator' ), 'info' );
		JToolBarHelper::preferences('com_yos_translator','300','570', 'Configuration','');
		$checkversion	=	$this->get('Checkversion');
		$this->assign('checkversion', $checkversion);
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
}