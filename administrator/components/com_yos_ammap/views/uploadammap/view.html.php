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

/**
 * HTML View class for the YOS_amMap component
 *
 * @static
 * @package		Joomla
 * @subpackage	YOS_amMap
 * @since 1.0
 */
class YOS_ammap_ViewUploadammap extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		// Set the toolbar
		$this->_setToolBar();
		$ftp = !JClientHelper::hasCredentials('ftp');
		$config =& JComponentHelper::getParams('com_yos_ammap');
		$this->assign('require_ftp', $ftp);
		$this->assignRef('config', $config);
		parent::display($tpl);
		
	}	

	function _setToolBar()
	{
		JToolBarHelper::title( JText::_( 'Upload amMap' ), 'upload' );		
	}
		
}
