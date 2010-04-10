<?php
/**
 * @version		$Id: controller.php 10094 2008-03-02 04:35:10Z instance $
 * @package		Joomla
 * @subpackage	Contact
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

/**
 * Contact Component Controller
 *
 * @static
 * @package		Joomla
 * @subpackage	amMap
 * @since 1.5
 */
class YOS_amMap_Controller extends JController {
	function display(){
		global $mainframe;
		header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
		header( "Last-Modified: ".gmdate( "D, d M Y H:i:s" )."GMT" );
		header( "Cache-Control: no-cache, must-revalidate" ); 
		header( "Pragma: no-cache" );
		header( "Content-Type: text/xml; charset=utf-8" );
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'show';
		
		// Get/Create the view
		$view = &$this->getView( 'show', $vType);
						
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();		
	}
}
?>