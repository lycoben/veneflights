<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * @copyright Copyright (C) 2008 GWE Systems Ltd. All rights reserved.
 * 
 * All rights reserved.  The Joom!Fish project is a set of extentions for 
 * the content management system Joomla!. It enables Joomla! 
 * to manage multi lingual sites especially in all dynamic information 
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU Lesser General Public License" (LGPL) is available at
 * http: *www.gnu.org/copyleft/lgpl.html
 * -----------------------------------------------------------------------------
 * @package joomfish
 * @subpackage joomfish.menulocalisation
 * @version 2.0
 *
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// TODO we also need to manage languages from the language switching module too!!

jimport( 'joomla.plugin.plugin' );

class plgJoomfishMenuLocalisation extends JPlugin
{
	var $_dbvalid = 0;

	function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
	}

	/**
	 * Demo of what can be done before translation takes place
	 *
	 */
	function onBeforeTranslation(&$rows, $ids, $reference_table, $language, $refTablePrimaryKey, & $tableArray, $querySQL, $allowfallback){
		if ($reference_table=="menu"){
			$backtrace = debug_backtrace();
			$matched=false;
			foreach ($backtrace as $bt) {
				if (array_key_exists("class",$bt) && strtolower($bt["class"])=="jmenusite"){
					if (!array_key_exists("specialhandling",$tableArray)){
						$tableArray["specialhandling"]= array();
					}
					$tableArray["specialhandling"][$reference_table]=1;
				}
				/*
				if (array_key_exists("class",$bt) && strtolower($bt["class"])=="japplication" && strtolower($bt["function"])=="route"){
				if (!array_key_exists("specialhandling",$tableArray)){
				$tableArray["specialhandling"]= array();
				}
				$tableArray["specialhandling"][$reference_table]=0;
				}
				*/
			}
		}
		return false;
	}

	/**
	 * Demo of what can be done before translation takes place
	 *
	 */
	function onAfterTranslation(&$rows, $ids, $reference_table, $language, $refTablePrimaryKey, & $tableArray, $querySQL, $allowfallback){
		if ($reference_table=="menu"){
			$registry =& JFactory::getConfig();
			static $localisation;
			if (!isset($localisation)){
				$db =& JFactory::getDBO();
				$db->setQuery("Select * from #__gwesys_mlmenu where menuid in ($ids)");
				$localisation = $db->loadObjectList("menuid",false);
			}
			foreach ($rows as $k=>$v) {
				if (array_key_exists($rows[$k]->id,$localisation)){
					// must always leave at least 1 item
					if (count($rows)>1){
						$ml_option = intval($localisation[$rows[$k]->id]->treatment);
						$locales = explode(",",$localisation[$rows[$k]->id]->languages);
						$jfLang = $registry->getValue("joomfish.language",false);
						if (!$jfLang){
							return;
						}
						$ml_lang =  in_array($jfLang->id,$locales);

						// include only those in the list
						if ($ml_option==1){
							if (!$ml_lang){
								unset($rows[$k]);
							}
						}
						// only exlude the list
						else if($ml_option==2){
							if ($ml_lang){
								unset($rows[$k]);
							}
						}
					}
				}
			}
		}
		return false;
	}

	/*
	function onMissingTranslation(&$row_to_translate, $language, $reference_table, $tableArray, $querySQL){
	}
	*/

	function  onAfterModuleActiveLanguages(&$langActive){
		global $Itemid;
		$registry =& JFactory::getConfig();
		static $localisation;
		if (!isset($localisation)){
			$db =& JFactory::getDBO();
			$db->setQuery("Select * from #__gwesys_mlmenu where menuid in ($Itemid)");
			$localisation = $db->loadObjectList("menuid");
		}
		if (count($localisation)<=0){
			return true;
		}

		foreach ($langActive as $k=>$lang) {
			// must always leave at least 1 item
			if (count($langActive)>1){
				$ml_option = intval($localisation[$Itemid]->treatment);
				$locales = explode(",",$localisation[$Itemid]->languages);
				$ml_lang =  in_array($lang->id,$locales);

				// include only those in the list
				if ($ml_option==1){
					if (!$ml_lang){
						unset($langActive[$k]);
					}
				}
				// only exlude the list
				else if($ml_option==2){
					if ($ml_lang){
						unset($langActive[$k]);
					}
				}
			}
		}

	}

}

