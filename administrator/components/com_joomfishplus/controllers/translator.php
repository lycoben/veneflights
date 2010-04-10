<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2003-2008 Think Network GmbH, Munich
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: translate.php 1009 2008-06-20 06:56:21Z geraint $
 *
*/

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.application.component.controller');

JLoader::import( 'helpers.controllerHelper',JOOMFISH_ADMINPATH);

class TranslatorController extends JController   {

	/** @var string		current used task */
	var $task=null;

	/** @var array		int or array with the choosen list id */
	var $cid=null;

	/**
	 * PHP 4 constructor for the tasker
	 *
	 * @return joomfishTasker
	 */
	function __construct( ){
		parent::__construct();
		$this->registerDefaultTask( 'showTranslator' );

		$this->task =  JRequest::getVar( 'task', '' );
		$this->cid =  JRequest::getVar( 'cid', array(0) );
		if (!is_array( $this->cid )) {
			$this->cid = array(0);
		}

		$this->registerTask( 'overview', 'showTranslators' );
		$this->registerTask( 'edit', 'editTranslator' );
		$this->registerTask( 'save', 'saveTranslator' );
		$this->registerTask( 'publish', 'publishTranslator' );
		$this->registerTask( 'unpublish', 'unpublishTranslator' );
		$this->registerTask( 'remove', 'removeTranslator' );

		// Populate common data used by view
		// get the view
		$this->view = & $this->getView("translator","html");

		// Assign data for view
		$this->view->assignRef('task', $this->task);
	}

	function showTranslators() {
		//JLoader::import( 'models.translator',JPATH_COMPONENT_ADMINISTRATOR);

		$model	=& $this->getModel( 'translator' );	
		$this->view->setModel($model,true);

		// Set the layout
		$this->view->setLayout('overview');

		$this->view->display();
	}

	function editTranslator(  ) {

		////JLoader::import( 'models.translator',JPATH_COMPONENT_ADMINISTRATOR);

		$model	=& $this->getModel( 'translator' );	
		$this->view->setModel($model,true);
		
		// Set the layout
		$this->view->setLayout('edit');

		$this->view->edit();
	}

	function saveTranslator( ) {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$post	= JRequest::get('post');
		$cid	= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$cid = (int) $cid[0];

		$model = $this->getModel('translator');

		if ($model->store($cid,$post)) {
			$msg = JText::_( 'Translator Saved' );
		} else {
			$msg = JText::_( 'Error Saving Translator' );
		}

		$link = JRoute::_('index.php?option=com_joomfishplus');
		$this->setRedirect($link, $msg);
		
	}

	function removeTranslator() {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$model = $this->getModel('translator');		
		$translators = TableTranslator::getTranslators($this->cid);

		$countdeleted = 0;
		foreach ($translators as $translator) {
			$countdeleted += $translator->delete()?1:0;
		}
		if ($countdeleted = count($translators)){
			$msg = JText::_( 'Translators Deleted' );
		} else {
			$msg = JText::_( 'Not All Translators Deleted' );
		}

		$link = JRoute::_('index.php?option=com_joomfishplus');
		$this->setRedirect($link, $msg);
		
	}

	function publishTranslator(  ) {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$model = $this->getModel('translator');
		$translator = $model->getTranslator();
		$translator->published = 1;
		if ($translator->saveg()){
			$msg = JText::_( 'Translator Enabled' );
		} else {
			$msg = JText::_( 'Error Updating Translator' );
		}

		$link = JRoute::_('index.php?option=com_joomfishplus');
		$this->setRedirect($link, $msg);
		
	}

	function unpublishTranslator(  ) {
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$model = $this->getModel('translator');
		$translator = $model->getTranslator();
		$translator->published = 0;
		if ($translator->store()){
			$msg = JText::_( 'Translator Disabled' );
		} else {
			$msg = JText::_( 'Error Updating Translator' );
		}

		$link = JRoute::_('index.php?option=com_joomfishplus');
		$this->setRedirect($link, $msg);
		
	}

	
}
