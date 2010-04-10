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
 * $Id: translate.php 954 2008-04-29 16:59:57Z geraint $
 *
*/

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.application.component.controller');

JLoader::import( 'helpers.controllerHelper', JPATH_ADMINISTRATOR. DS. 'components' .DS. 'com_joomfish');
JLoader::import( 'controllers.translate', JPATH_ADMINISTRATOR. DS. 'components' .DS. 'com_joomfish');

class FrontTranslateController extends TranslateController   {

	var $frontEndTranslation ;
	var $frontEndPublish ;
	
	function __construct( ){
		// TODO add more detailed checks on translators here
		$params =& JComponentHelper::getParams( 'com_joomfishplus' );
		$this->frontEndTranslation = $params->get( 'frontEndTranslation',999999 );
		$this->frontEndPublish = $params->get( 'frontEndPublish',999999 );
		
		$user = JFactory::getUser();
		if ($user->gid < $this->frontEndTranslation) {
			global $mainframe;
			$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
			exit();
		}
				
		parent::__construct();
		
		// Check is authorised translator
		if (!isset($this->_language_id)){
			global $mainframe;
			$mainframe->redirect( 'index.php', JText::_('Joomfish translate controller changed - translation disabled.  Please report') );
			exit();			
		}
		$this->_authorisedTranslator($this->_language_id);
		
		$this->view->assign("canFrontEndTranslation",$user->gid >$this->frontEndTranslation);
		$this->view->assign("canFrontEndPublish",$user->gid >$this->frontEndPublish);
	}

	function home(){
		global $mainframe;
		$mainframe->redirect( 'index.php' ,"");
	}

	function showTranslate() {
		$this->_restrictLangList();
		
		parent::showTranslate();		
	}

	// Security check - can't happen here because of the way the controller deliviers the request to the view to display so we do it in the view
	function editTranslation(){
		$this->_restrictLangList();

		parent::editTranslation();
	}

	// Security check
	function saveTranslation(){
		$user = JFactory::getUser();
		if ($user->gid < $this->frontEndTranslation) {
			global $mainframe;
			$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
			exit();
		}
		parent::saveTranslation();
	}

	// Security check
	function publishTranslation(  ) {
		$user = JFactory::getUser();
		if ($user->gid < $this->frontEndPublish) {
			global $mainframe;
			$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
			exit();
		}
		parent::publishTranslation();
	}

	// Security check
	function removeTranslation(){
		$user = JFactory::getUser();
		if ($user->gid < $this->frontEndPublish) {
			global $mainframe;
			$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
			exit();
		}
		parent::removeTranslation();
	}	
	/**
	 * Overridden method that ensures that front end view is used where available
	 *
	 * @param unknown_type $name
	 * @param unknown_type $type
	 * @param unknown_type $prefix
	 * @param unknown_type $config
	 * @return unknown
	 */
	function &getView( $name = '', $type = '', $prefix = '', $config = array() )
	{
		$this->addViewPath(JPATH_COMPONENT."/views");

		 if ($prefix==""){
		 	$prefix= "FrontendtranslateView";
		 }
		return parent::getView($name,$type,$prefix, $config);		
	}
	

	function _authorisedTranslator($langid=0){
		@JLoader::import("translator",JPATH_COMPONENT_ADMINISTRATOR."/tables/");
		if (class_exists("TableTranslator")){
			if (!TableTranslator::authorisedTranslator($langid)){
				global $mainframe;
				$mainframe->setUserState('selected_lang', '-1');		

				$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
				exit();
			}
		}
	}
	
	function _restrictLangList(){
		// Get Restricted Language List
		// get list of active languages
		$langOptions[] = JHTML::_('select.option',  '-1', JText::_('Select Language') );
		$langOptions[] = JHTML::_('select.option',  'NULL', JText::_('Select no Translation'));

		$langActive = $this->_joomfishManager->getLanguages( false );		// all languages even non active once

		@JLoader::import("translator",JPATH_COMPONENT_ADMINISTRATOR."/tables/");
		if (class_exists("TableTranslator")){
			// Redo the language choices
			TableTranslator::filterLangList($langActive);
		}			
		
		if ( count($langActive)>0 ) {
			foreach( $langActive as $language )
			{
				$langOptions[] = JHTML::_('select.option',  $language->id, $language->name );
			}
		}
		$langlist = JHTML::_('select.genericlist', $langOptions, 'select_language_id', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'value', 'text', $this->_language_id );
		$this->view->assign("filteredLangList",$langlist);
		
	}
}