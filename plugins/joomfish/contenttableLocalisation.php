<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2008 GWE Systems Ltd
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
 *
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgjoomfishcontenttableLocalisation extends JPlugin
{
	
	/**
	 * 
	 * TODO DOCUMENT THE MATCHING QUERY LOCATIONS TO CHECK WITH EACH RELEASE OF JOOMLA 1.5
	 *
	 * 
	 */
	
	var $_dbvalid = 0;
	var $_categories = array();
	var $_sections = array();

	function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	/**
	 * Demo of what can be done before translation takes place
	 *
	 */
	function onBeforeTranslation(&$rows, $ids, $reference_table, $language, $refTablePrimaryKey, & $tableArray, $querySQL, $allowfallback){
		return;
		global $option;
		if ($option != "com_content" && $option!="com_frontpage"){
			return;
		}
		if ($reference_table=="categories"){
			echo $querySQL."<br/>";

		}
	}

	/**
	 * Demo of what can be done after translation takes place``
	 *
	 * TODO consider if this should respect fall back language if at all and how to do it if possible
	 * 
	 */
	function onAfterTranslation(&$rows, $ids, $reference_table, $language, $refTablePrimaryKey, & $tableArray, $querySQL, $allowfallback){		
		global $option;
		//echo "option = $option<br/>reference_table = $reference_table</br>$querySQL = ".substr($querySQL,0,50)."<br/>";
		if ($option != "com_content" && $option!="com_frontpage" && !class_exists("modLatestNewsHelper",false) && !class_exists("modNewsFlashHelper",false) && !class_exists("modMostReadHelper",false)){
			return true;
		}

		// TODO add a handler for is language doesn't match the results of this
		$registry =& JFactory::getConfig();
		$jfLang = $registry->getValue("joomfish.language",null);
		$jfLangId = $jfLang->id;

		if ($language == $registry->getValue("config.defaultlang","")){
			return true;
		}
		
		if ($reference_table=="categories" && strpos($querySQL,"COUNT( b.id ) AS numitems")>0){
			//components/com_content/models/category.php (296) 			$query = 'SELECT c.*, COUNT( b.id ) AS numitems' .
			//components/com_content/models/section.php (305) 			$query = 'SELECT a.*, COUNT( b.id ) AS numitems,' .

			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) && strtolower($bt["class"])=="contentmodelsection"){
					$matched=true;
					break;
				}
			}

			if (!$matched) return false;

			if (count($rows)<=0) return false;
			$row = reset($rows);
			if (!isset($row->id) || !isset($row->section)){
				return false;
			}

			$db =& JFactory::getDBO();

			$sql = $querySQL;
			$sql = str_replace("COUNT( b.id )","COUNT(DISTINCT b.id)",$sql);
			$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_field='title' AND jfc.reference_id=b.id AND jfc.language_id=".$jfLangId;
			$sql = str_replace("WHERE a.section =",$jfpart." WHERE jfc.reference_id IS NOT NULL AND a.section =",$sql);

			$db->setQuery($sql);

			//$rows =  $db->loadObjectList();
			// This approach saves a translation
			$temprows = $db->loadObjectList("id",false);
			$newrows = array();

			foreach ($rows as $k=>$v) {
				if (!array_key_exists($rows[$k]->id,$temprows)){
					unset($rows[$k]);
				}
				else {
					$newrow = $rows[$k];
					$newrow->numitems = $temprows[$newrow->id]->numitems;
					$newrows[] = $newrow;
				}
			}
			$rows = $newrows;
			return true;

		}
		else if ($reference_table=="categories" && strpos($querySQL,"SELECT cc.title AS category, a.id, a.title, a.title_alias, a.introtext")===0 ){
			//components/com_content/models/category.php (362) 		$query = 'SELECT cc.title AS category, a.id, a.title, a.title_alias, a.introtext, a.fulltext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by,' .

			// TODO consider creating a plugin before the parent is called

			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) && strtolower($bt["class"])=="contentmodelcategory"){
					$matched=true;
					break;
				}
			}

			if (!$matched) return false;

			if (count($rows)<=0) return false;
			$row = reset($rows);
			if (!isset($row->id) ){
				return false;
			}

			$db =& JFactory::getDBO();

			if (strpos($querySQL,"ORDER BY a.title")>0){
				$sql = str_replace("ORDER BY a.title","ORDER BY jfc.value",$querySQL);
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				$rows = $db->loadObjectList("id");
				return true;
			}
			else if (strpos($querySQL,"ORDER BY author")>0){
				
				// TODO sort by authot
				$sql = $querySQL;
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				$rows = $db->loadObjectList("id");
				return true;
			}
			else {
				$sql = $querySQL;
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				$rows = $db->loadObjectList("id");
				return true;
			}
			/*
			// This doesn't deal with ordering and just truncates the list
			$idstring = "-1";
			foreach ($rows as $row) {
				$idstring .= ",".$row->id;
			}

			$sql = "SELECT DISTINCT jfc.reference_id as id FROM #__jf_content as jfc WHERE jfc.reference_table='content' AND jfc.reference_id IN($idstring)";

			$db->setQuery($sql);

			$temprows = $db->loadObjectList("id",false);
			$newrows = array();
			foreach ($rows as $row) {
			if (array_key_exists($row->id,$temprows)){
			$newrows[] = $row;
			}
			}
			$rows = $newrows;
			return true;
			*/
		}
		// Front page - THIS DOESN'T WORK SINCE THE TOTAL IS CALCULATED OUTSIDE OUR CONTROL!!
		else  if ($reference_table=="content" && strpos($querySQL,"SELECT a.id, a.title, a.title_alias, a.introtext, a.fulltext,")===0){
			// components/com_content/models/frontpage.php (129) 		$query = ' SELECT a.id, a.title, a.title_alias, a.introtext, a.fulltext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by,' .

			// TODO consider creating a plugin before the parent is called

			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) &&  strtolower($bt["class"])=="contentviewfrontpage"){
					$matched=true;
					break;
				}
			}

			if (!$matched) return false;

			if (count($rows)<=0) return false;
			$row = reset($rows);
			if (!isset($row->id) ){
				return false;
			}

			$db =& JFactory::getDBO();

			if (strpos($querySQL,"ORDER BY a.title")>0){
				$sql = str_replace("ORDER BY a.title","ORDER BY jfc.value",$querySQL);
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				//$rows = $db->loadObjectList("id");
				$rows = $db->loadObjectList();
				if (is_null($rows)) $rows=array();
				return true;
			}
			else if (strpos($querySQL,"ORDER BY author")>0){
				// TODO sort by authot
				$sql = $querySQL;
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				//$rows = $db->loadObjectList("id");
				$rows = $db->loadObjectList();
				if (is_null($rows)) $rows=array();
				
				return true;
			}
			else {
				$sql = $querySQL;
				$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
				$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
				$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);

				$db->setQuery($sql);

				//$rows = $db->loadObjectList("id");
				$rows = $db->loadObjectList();

				if (is_null($rows)) $rows=array();
				return true;
			}
		}
		// Front page item count
		else if ($reference_table=="" && strpos($querySQL,"SELECT a.id, a.title, a.title_alias, a.introtext, a.fulltext,")===0){
			// components/com_content/models/frontpage.php (129) 		$query = ' SELECT a.id, a.title, a.title_alias, a.introtext, a.fulltext, a.sectionid, a.state, a.catid, a.created, a.created_by, a.created_by_alias, a.modified, a.modified_by,' .

			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) &&  strtolower($bt["class"])=="contentviewfrontpage"){
					$matched=true;
					break;
				}
			}

			if (!$matched) return false;

			$db =& JFactory::getDBO();

			$sql = $querySQL;
			$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
			$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
			$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);
			$db->setQuery($sql);

			$db->query();
			$count = $db->getNumRows(false);
			$rows = array($count);
			return true;
		}
		// Mod latest News and mod News Flash
		else if ($reference_table=="content" && strpos(str_replace(" ","",$querySQL),str_replace(" ","",'SELECT a.*,  CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'))===0){
			// modules/mod_latestnews/helper.php (85) 		

			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) &&  
				(strtolower($bt["class"])=="modlatestnewshelper" || strtolower($bt["class"])=="modnewsflashhelper" || strtolower($bt["class"])=="modmostreadhelper")
				){
					$matched=true;
					break;
				}
			}

			if (!$matched) return false;

			$db =& JFactory::getDBO();

			$sql = $querySQL;

			$jfpart = "LEFT JOIN #__jf_content as jfc ON jfc.reference_table='content' AND jfc.reference_id=a.id AND jfc.reference_field='title' AND jfc.language_id=".$jfLangId;
			$sql = str_replace("WHERE ",$jfpart." WHERE jfc.reference_id IS NOT NULL AND ",$sql);
			$sql = str_replace("SELECT ","SELECT jfc.value as jfcvalue, ",$sql);
			$db->setQuery($sql);

			$db->query();
			$rows = $db->loadObjectList();
			if (is_null($rows)) $rows=array();
			return true;
		}

		return false;
	}

	function onMissingTranslation(&$row_to_translate, $language, $reference_table, $querySQL, $tableArray){
	}

}

