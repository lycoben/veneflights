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
 * HTML View class for the Media component
 *
 * @static
 * @package		Joomla
 * @subpackage	Media
 * @since 1.0
 */
class YOS_ammap_ViewUpload extends JView
{
	function display($tpl = null)
	{
		/*
		 * Set toolbar items for the page
		 */
		JHTML::stylesheet( 'ammap.css', 'administrator/components/com_yos_ammap/assets/' );
		JToolBarHelper::title( JText::_( 'Upload amMap'), 'upload' );

		JToolBarHelper::help( 'screen.installer' );

		$paths = new stdClass();
		$paths->first = '';

		$this->assignRef('paths', $paths);
		$this->assignRef('state', $this->get('state'));

		parent::display($tpl);
	}
}