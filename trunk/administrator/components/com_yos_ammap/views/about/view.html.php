<?php
/**
* @version		$Id: view.html.php 10214 2008-04-19 08:59:04Z sonlv $
* @package		amMap
* @subpackage	about
* @copyright	Copyright (C) 2008 - 2009 YOS. All rights reserved.
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
class YOS_ammap_ViewAbout extends JView
{
	function display($tpl = null){
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		JToolBarHelper::title(JText::_('About'),'info');
		JToolBarHelper::preferences('com_yos_ammap','300','570', 'Configuration','');
		$config =& JComponentHelper::getParams('com_yos_ammap');
		$config_lic= $config->get('licence');
		if ($config_lic=='') {
			JError::raiseWarning(189, 'Please input your license to use this feature !');
		}
		$checkversion	=	$this->get('Checkversion');
		$this->assign('checkversion', $checkversion);
		parent::display();
		echo JHTML::_('behavior.keepalive');
	}
}