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
class YOS_amMap_ViewControlPanel extends JView
{
	function display($tpl = null){
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		
		global $mainframe;			

		JToolBarHelper::title(JText::_( 'YOS amMap Control Panel' ), 'config');
		
		JToolBarHelper::preferences('com_yos_ammap', '460');
		$xml = & JFactory::getXMLParser('Simple');

		if ($xml->loadFile(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'version.xml'))
		{
			if (!$version = & $xml->document->version) {
				return false;
			}
		} else {
			return false;
		}
		
		JHTML::_('behavior.tooltip');
		$this->assignRef('version',	$version[0]->data());
		$this->assignRef('ammapinfo', $this->get('AmmapInfo'));
		$this->assignRef('iconinfo', $this->get('IconInfo'));
		$this->assignRef('mapinfo', $this->get('MapInfo'));
		$this->assignRef('addoninfo', $this->get('AddonInfo'));
		$this->assignRef('backupinfo', $this->get('BackupInfo'));
		$this->assignRef('plugininfo', $this->get('PluginInfo'));
		$this->assignRef('ammapstatus', MediaHelper::checkammap());
		
		parent::display($tpl);
	}
	
	function quickIconButton( $link, $image, $text ) {
		
		$lang	= &JFactory::getLanguage();
		$button = '';
		if ($lang->isRTL()) {
			$button .= '<div style="float:right;">';
		} else {
			$button .= '<div style="float:left;">';
		}
		$button .=	'<div class="icon">'
				   .'<a href="'.$link.'">'
				   .JHTML::_('image.site',  $image, '/components/com_yos_ammap/images/', NULL, NULL, $text )
				   .'<span>'.$text.'</span></a>'
				   .'</div>';
		$button .= '</div>';

		return $button;
	}
	
}