<?php
/**
 * @version		$Id: controller.php 9764 2007-12-30 07:48:11Z ircmaxell $
 * @package		Joomla
 * @subpackage	YOS_amMap
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.controller' );
jimport('joomla.client.helper');


/**
 * Media Manager Component Controller
 *
 * @package		Joomla
 * @subpackage	Media
 * @version 1.5
 */
class YOS_amMap_Controller extends JController
{
	/**
	 * Display the view
	 */
	function display()
	{
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'default';
		$mName		= 'cp_data';
		// Get/Create the view
		$view = &$this->getView( 'controlpanel', $vType);
		
		// Get/Create the model		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function ammaps(){
		global $mainframe, $task;
		
		if (!MediaHelper::checkammap()) {
			$this->uploadammap();
			return true;
		}
		
		$doTask = JRequest::getCmd('task',null);
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'ammap';
		// Get/Create the view
		$view = &$this->getView( 'ammap', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}		
		
		// Set the layout
		$view->setLayout($vLayout);
		
		// Display the view		
		switch ($doTask){
			case 'new':
				$view->_edit(false);
				break;
								
			case 'edit':
				$view->_edit(true);
				break;
				
			case 'ammaps':
			default:
				$view->display();
				break;
		}
		echo JHTML::_('behavior.keepalive');
	}
	
	function maps(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'maps';
		// Get/Create the view
		$view = &$this->getView( 'maps', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function icons(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'icons';
		// Get/Create the view
		$view = &$this->getView( 'icons', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function elconfig(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'elconfig';
		// Get/Create the view
		$view = &$this->getView( 'elconfig', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function addon(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'addon';
		// Get/Create the view
		$view = &$this->getView( 'addon', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function backup(){
		global $mainframe;
		
		if (!MediaHelper::checkammap()) {
			$this->uploadammap();
			return true;
		}
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'list';
		$mName		= 'backup';
		// Get/Create the view
		$view = &$this->getView( 'backup', $vType);
		// Get/Create the model
		
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function upload(){
		global $mainframe;
		
		if (!MediaHelper::checkammap()) {
			$this->uploadammap();
			return true;
		}
		
		if (JRequest::getCmd('task',null)=='doInstall'){
			JRequest::checkToken() or jexit( 'Invalid Token' );
		}
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'upload';
		$mName		= 'install';
		// Get/Create the view
		$view = &$this->getView( 'upload', $vType);
		// Get/Create the model	
		
		$model = &$this->getModel($mName);
		
		if (JRequest::getCmd('task',null)=='doInstall'){
			if ($model->install()) {
				$cache = &JFactory::getCache('mod_menu');
				$cache->clean();
			}
		}
		$view->setModel($model, true);	
		
		// Set the layout
		$view->setLayout($vLayout);
		$ftp =& JClientHelper::setCredentialsFromRequest('ftp');
		$view->assignRef('ftp', $ftp);
		// Display the view		
		$view->display();
	}
	
	function about(){
		global $mainframe;
		
		if (!MediaHelper::checkammap()) {
			$this->uploadammap();
			return true;
		}
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'about';
		$mName		= 'version';
		
		// Get/Create the view
		$view = &$this->getView( 'about', $vType);
		
		// Get/Create the model			
		$checkversion	=	&MediaHelper::getVersion();
		$version	=	$checkversion['version'];
		$url		=	$checkversion['url'];
		$pc			=	$checkversion['productcode'];
		if ($model = &$this->getModel($mName,'', array('version'=> $version, 'url'=> $url , 'pc'=> $pc ))) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
	function uploadammap(){
		global $mainframe;
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'form';
		// Get/Create the view
		$view = &$this->getView( 'uploadammap', $vType);
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}

	
}
