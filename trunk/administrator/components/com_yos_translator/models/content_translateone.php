<?php
/**
 * Extensions Model for yos_translator Component
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Extensions Model
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorModelContent_translateone extends JModel
{
	var $reference_id = 0;
	var $language_id = 0;
	var $reference_table = 'content';
	
	var $org_title = '';
	var $tsl_title = '';
	
	var $org_introtext = '';
	var $tsl_introtext = '';
	
	var $org_fulltext = '';
	var $tsl_fulltext = '';
	
	var $org_metakey = '';
	var $tsl_metakey = '';
	
	var $org_metadesc = '';
	var $tsl_metadesc = '';
	
	var $publish = 0;
	
	var $translated = 0;
	
	var $_data = null;	
	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	function initialize($reference_id, $language_id){
		$this->reference_id = $reference_id;
		$this->language_id = $language_id;
		
		$db = $this->_db;
		
		//select original title, introtext, fulltext, metakey and metadesc.
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$tbl_content =& JTable::getInstance('content', 'Table');
		$tbl_content->load($reference_id);
		
		$this->org_title = $tbl_content->title;
		$this->org_introtext = $tbl_content->introtext;
		$this->org_fulltext = $tbl_content->fulltext;
		$this->org_metakey = $tbl_content->metakey;
		$this->org_metadesc = $tbl_content->metadesc;
		
		//select translated values
		//title
		$this->tsl_title = $this->_selectTranslatedValue($reference_id, $language_id, 'title');
		$this->tsl_introtext = $this->_selectTranslatedValue($reference_id, $language_id, 'introtext');
		$this->tsl_fulltext = $this->_selectTranslatedValue($reference_id, $language_id, 'fulltext');
		$this->tsl_metakey = $this->_selectTranslatedValue($reference_id, $language_id, 'metakey');
		$this->tsl_metadesc = $this->_selectTranslatedValue($reference_id, $language_id, 'metadesc');		
	}
	
	function getLanguageList(){
		$db = $this->_db;
		
		$arr_obj_language = array();
		$obj_language = new stdClass();
		$obj_language->id = '0';
		$obj_language->name = '---select---';
		array_push($arr_obj_language, $obj_language);
		
		$query = "SELECT id, name FROM #__languages";
		$db->setQuery($query);
		$arr_obj_language2 = $db->loadObjectList();
		
		$arr_obj_language = array_merge($arr_obj_language ,$arr_obj_language2);
				
		return $arr_obj_language;
	}
	
	function getPublishStatus($reference_id, $language_id){
		$db = $this->_db;
		$query = "SELECT COUNT(*) FROM #__jf_content
			WHERE reference_id = $reference_id AND language_id = $language_id AND published = 1";
		$db->setQuery($query);
		if ($db->loadResult()) {
			return true;
		}
		else {
			return  false;
		}
	}
	
	/**
	 * Get Language Pair
	 *
	 * @param int $to_id
	 * @param int $from_id
	 * @return string language pair, e.g: en|fr
	 */
	function getLanguagePair($to_id, $from_id = 0){
		$db = $this->_db;
		
		if ($from_id == 0) {
			//get default language
			$params = JComponentHelper::getParams('com_languages');
			$default_codeLanguage = $params->get('site');
			//select language id
			$query = "SELECT `id` FROM #__languages
				WHERE `code` = '$default_codeLanguage'";
			$db->setQuery($query);
			$from_id = $db->loadResult();
		}
		return  $this->_getLanguageCode($from_id) . '|' . $this->_getLanguageCode($to_id);
	}
	
	function _getLanguageCode($language_id){
		$db = $this->_db;
		
		//get language code
		$query = "SELECT TSL.code_translator 
			FROM #__languages AS JL
			LEFT JOIN #__yos_translator AS TSL ON JL.code = TSL.code_language
			WHERE JL.id = $language_id";
		$db->setQuery($query);
		return $db->loadResult();
	}
	
	function _selectTranslatedValue($reference_id, $language_id, $field){
		$db = $this->_db;
		
		$query = "SELECT value FROM #__jf_content
			WHERE reference_id = $reference_id AND language_id = $language_id AND reference_field = '$field' AND reference_table = 'content'";
		$db->setQuery($query);
		return $db->loadResult();		
	}
	
	function getScript(){
		$script=
		"
			google.load(\"language\", \"1\");
			google.setOnLoadCallback(init);
			
			function init() 
			{				
				var from_lang = document.getElementById('from_lang');
				for (l in google.language.Languages) 
				{
					var lng = l.toLowerCase();
					lng 		= lng.substring(0,1).toUpperCase()+lng.substring(1,lng.length);
					var lngCode = google.language.Languages[l];
					if (google.language.isTranslatable(lngCode)) 
					{
						from_lang.options.add(new Option(lng, lngCode));
					}
				}
			}";
		
		return $script;
	}
	
	
}
