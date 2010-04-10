<?php
/**
 * Joom!Fish Plus - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2008 GWE Systems Lds
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
 * $Id: joomfish.php 894 2008-03-07 11:59:45Z geraint $
 *
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
* Translator Table class
*
* @package		JoomfishPlus
* @subpackage	Translators
* @since 1.0
*/
class TableTranslator extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	var $user_id = null;
	var $language_id = null;
	var $published = null;
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct() {
		$db =& JFactory::getDBO();
		parent::__construct('#__jf_translators', 'id', $db);
	}

	function checkTable(){
		$db =& JFactory::getDBO();
		
		// 1. Make sure translators table exists
		$sql = <<<SQL
CREATE TABLE IF NOT EXISTS `#__jf_translators` (
	`id` int( 11 ) unsigned NOT NULL AUTO_INCREMENT ,
	`language_id` int( 11 ) NOT NULL default '0',
	`user_id` int( 11 ) NOT NULL default '0',
	`published` tinyint( 2 ) NOT NULL default '0',
	PRIMARY KEY ( `id` ),
	KEY `combo` ( `language_id`,`user_id`  )
);
SQL;
		$db->setQuery( $sql );
		if (!$db->query()){
			echo $db->getErrorMsg();
		}

	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @access public
	 * @return boolean True on success
	 * @since 1.0
	 */
	function check()
	{
		return true;
	}
	
	function getTranslators($ids=array()){
		$where = "";
		if (is_array($ids)){
			if (count($ids)>0){
				JArrayHelper::toInteger($ids);
				$idstring = implode(",",$ids);
				$where = "WHERE tl.id in ($idstring)";
			}
		}
		else {
			$idsstring = intval($ids);
			$where = "WHERE tl.id in ($idstring)";
		}

		$db =& JFactory::getDBO();
		$sql = "SELECT tl.*, ju.name as jname, ju.username , l.name as langname, l.id as langid FROM #__jf_translators AS tl ";
		$sql .= " LEFT JOIN #__users as ju ON tl.user_id=ju.id ";
		$sql .= " LEFT JOIN #__languages as l ON tl.language_id=l.id ";
		$sql .= $where;
		
		$db->setQuery( $sql	);
		$translators = $db->loadObjectList('id');
		echo $db->getErrorMsg();
		foreach ($translators as $key=>$val){
			$translator = new TableTranslator();
			$translator->bind(get_object_vars($val));
			$translator->jname = $val->jname;
			$translator->username = $val->username;
			$translator->langname = $val->langname;
			$translator->langid	 = $val->langid;
			$translators[$key]=$translator;
		}
		return $translators;
	}

	function getTranslatorsByUserid($userid,$index="id"){
		if (is_array($userid)){
			JArrayHelper::toInteger($userid);
			$userids = implode(",",$userid);
		}
		else {
			$userids = intval($userid);
		}
		$db =& JFactory::getDBO();
		$sql = "SELECT tl.*, ju.name as jname, ju.username , l.name as langname, l.id as langid FROM #__jf_translators AS tl ";
		$sql .= " LEFT JOIN #__users as ju ON tl.user_id=ju.id ";
		$sql .= " LEFT JOIN #__languages as l ON tl.language_id=l.id ";
		$sql .= " WHERE ju.id IN ( ".$userids." )";
		$db->setQuery( $sql	);
		$translators = $db->loadObjectList($index);
		echo $db->getErrorMsg();
		foreach ($translators as $key=>$val){
			$translator = new TableTranslator();
			$translator->bind(get_object_vars($val));
			$translator->jname = $val->jname;
			$translator->username = $val->username;
			$translator->langname = $val->langname;
			$translator->langid	 = $val->langid;
			$translators[$key]=$translator;
		}
		return $translators;
	}
	
	function authorisedTranslator($lang=0){
		$user = JFactory::getUser();
		$translators = TableTranslator::getTranslatorsByUserid($user->id,"langid");
		if (count($translators)>0 && $lang<=0) return true;
		if (array_key_exists($lang,$translators)) return true;
		foreach ($translators as $translator) {
			if ($translator->langid == $lang && $translator->published){
		//		return true;
			}
		}
		return false;
	}

	function filterLangList(&$langlist){
		$user = JFactory::getUser();
		$translators = TableTranslator::getTranslatorsByUserid($user->id,"langid");
		foreach ($langlist as $key=>$val) {
			if ($val->id>0 && (!array_key_exists($val->id,$translators) || !$translators[$val->id]->published)){
				unset($langlist[$key]);
			}			
		}
	}
}
