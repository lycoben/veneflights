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
 * $Id: languages.php 928 2008-03-30 10:51:32Z akede $
 *
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );
JLoader::import("translator",JPATH_COMPONENT_ADMINISTRATOR."/tables/");


/**
 * @package		Joom!Fish
 * @subpackage	Translator
 */
class TranslatorModelTranslator extends JModel
{
	/**
	 * @var string	name of the current model
	 * @access private
	 */
	var $_modelName = 'translator';

	/**
	 * @var array list of current translators
	 * @access private
	 */
	var $_translators = null;
	
	/**
	 * default constrcutor
	 */
	function __construct() {
		parent::__construct();
		
		$app	= &JFactory::getApplication();
		$option = JRequest::getVar('option', '');
		// Get the pagination request variables
		$limit		= $app->getUserStateFromRequest( 'global.list.limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$limitstart	= $app->getUserStateFromRequest( $option.'.limitstart', 'limitstart', 0, 'int' );

		// In case limit has been changed, adjust limitstart accordingly
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);		
	}
	
	
	/**
	 * return the model name
	 */
	function getName() {
		return $this->_modelName;
	}

	/**
	 * generic method to load the translator related data
	 * @return array of languages
	 */
	function getTranslators() {
		TableTranslator::checkTable();
		if($this->_translators == null) {
			$this->_loadTranslators(); 
		}
		return $this->_translators;
	}
		
	/**
	 * generic method to load the translator related data
	 * @return array of languages
	 */
	function getTranslator() {
		$cid = JRequest::getVar("cid",array(0));
		JArrayHelper::toInteger($cid);
		if (count($cid)>0){
			$id=$cid[0];
		}
		else $id=0;
		$translator = new TableTranslator();
		if ($id>0){
			$translator->load($id);
		}
		return $translator;
	}

	/**
	 * Method to store language information
	 */
	function store($cid, $data) {
		$translator = new TableTranslator();
		if ($cid>0){
			$translator->load($cid);	
		}
		return $translator->save($data);
	}
	
	/**
	 * Method to load the translators in the system
	 * 
	 * @return void
	 */
	function _loadTranslators(){
		$this->_translators= TableTranslator::getTranslators();	
	}
			
}
