<?php
/**
 * @version		1.2
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @copyright	Ossolution Team
 * @license		GPL
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.component.model');
class JGtranslationModelTranslation extends JModel
{
	/**
	 * Constructor
	 *
	 * @since 1.5
	 */
	/**
	 * The current content element being translated
	 *
	 * @var string
	 */
	var $_contentElement = null;
	/**
	 * The original language
	 *
	 * @var string
	 */				
	var $_langFrom = null;
	/**
	 * The destination language
	 *
	 * @var string
	 */
	var $_langTo = null;
	/**
	 * The helper object used to translate data into destination language
	 *
	 * @var GoogleTranslate
	 */		
	var $_translater = null;
	/**
	 * Ajax translater which use google ajax api for translating data 
	 *
	 * @var object
	 */
	var $_ajaxTranslater =  null ;
	/**
	 * Overwrite translation option 
	 *
	 * @var int
	 */
	var $_overwrite = 0;
	/**
	 * The limitstart to get records from database
	 *
	 * @var int
	 */	
	var $_limitStart = 0;
	/**
	 * Constructor
	 * Init some properties
	 *
	 */
	function __construct()
	{	
		global $mainframe, $option;		
		parent::__construct();	
		$cid = JRequest::getVar('cid');
		$this->_contentElement = $cid[0];
		$this->_langFrom = JRequest::getVar('lang_from', '', 'post');
		$this->_langTo = JRequest::getVar('lang_to', '', 'post');
		$this->_limitStart = JRequest::getInt('limit_start', 0, 'post');
		$this->_overwrite = JRequest::getInt('overwrite', 0, 'post');		
		$this->_translater =  new GoogleTranslate($this->_langFrom, $this->_langTo) ;
		$this->_ajaxTranslater =  new GoogleAjaxTranslate($this->_langFrom, $this->_langTo);
		$mainframe->setUserState($option.'lang_from', $this->_langFrom);
		$mainframe->setUserState($option.'lang_to', $this->_langTo);							 														 					
	}		
	/**
	 * Get info of the current table being translated : table name, primary id, fields need to be translated
	 *
	 */
	function _getTableInfo (){
		if (!empty($this->_contentElement)) {
			$xml = & JFactory::getXMLParser('Simple');
			$filePath = JF_ADMINPATH.DS.$this->_contentElement;
			if (!$xml->loadFile($filePath)) {
				unset($xml);
				return false;		
			}
			$table = $xml->document->getElementByPath('reference/table');
			$tableName = $table->_attributes['name'];
			$fields = $table->children();
			$arrFields = array();
			$arrTranslateFields = array();
			$primaryKey = '';
			$filter = array();
			if (count($fields)) {
				foreach ($fields as $field) {
					if ($field->name() == 'field'){
						$fieldType = $field->_attributes['type'];
						$fieldName = $field->_attributes['name'];
						$translate = $field->_attributes['translate'];						
						$jgTranslate = $field->_attributes['jgtranslate'];
						if ($fieldType == 'referenceid') {
							$primaryKey = $fieldName;						
						}
						if ($translate) {
							$arrFields[] = $fieldName;					
						}
						if ($jgTranslate) {
							$arrTranslateFields[] = $fieldName;	
						}
					} 
				}
			}
			$ret = new stdClass;
			$ret->tableName = $tableName;
			$ret->primaryKey = $primaryKey;
			$ret->fields = $arrFields;
			$ret->translateFields = $arrTranslateFields;
			$ret->filter = $filter;
			return $ret;
		} else {
			return null;	 
		}				
	}
	
	/**
	 * Get id of the language
	 *
	 * @param string $langCode
	 * @return int the languageId
	 */
	function _getLanguageId($langCode) {
		$sql = 'SELECT id FROM #__languages WHERE shortcode="'.$langCode.'"';
		$this->_db->setQuery($sql);
		return $this->_db->loadResult();
	}
	
	/**
	 * Translate the selected table
	 *
	 */
	function translate(){
		$user = & JFactory::getUser();
		$whereClause =  JRequest::getVar('where_clause', '', 'post') ;
		$userId = $user->get('id');				
		$languageId = $this->_getLanguageId($this->_langTo);
		$row = $this->_getTableInfo();
		$tableName = $row->tableName;		
		$primaryKey = $row->primaryKey;
		$fields = $row->fields;
		$translateFields = $row->translateFields;
		$filter = $row->filter;
		$sqlFields = $fields;
		for ($i =0 , $n = count($sqlFields); $i < $n; $i++) {
			$sqlFields[$i] = $this->_db->NameQuote($sqlFields[$i]);
		}		
		//Clear all untranslated items
		$sql = 'DELETE FROM #__jf_content WHERE reference_table="'.$tableName.'" AND language_id='.$languageId.' AND `value`="" AND   	original_text!=""';
		$this->_db->setQuery($sql);
		$this->_db->query();
		if ($this->_overwrite) {			
			$sql = 'DELETE FROM #__jf_content WHERE reference_table="'.$tableName.'" AND language_id='.$languageId;
			$this->_db->setQuery($sql);
			$this->_db->query();
		}
		//Get list of records have been translated
		$sql = 'SELECT distinct reference_id FROM #__jf_content WHERE reference_table="'.$tableName.'" AND language_id='.$languageId;
		$this->_db->setQuery($sql);
		$rowIds = $this->_db->loadObjectList();
		$arrIds = array();
		$arrIds[] = 0;										
		for ($i = 0, $n=count($rowIds); $i < $n; $i++) {
			$rowId = $rowIds[$i];
			$arrIds[] = $rowId->reference_id;
		}
		$where = $filter;	
		if ($whereClause != '')			
			$where[] = $whereClause ;
		$where[] = 	$primaryKey.' NOT IN ('.implode(',', $arrIds).')';							
		$sql = 'SELECT '.$primaryKey.','.implode(',', $sqlFields). ' FROM #__'.$tableName. ' AS a '
			. ' WHERE '.implode(' AND ', $where)
			. ' ORDER BY '.$primaryKey
			. ' LIMIT '.NUMBER_ITEMS
			;
		$this->_db->setQuery($sql);						
		$rows = $this->_db->loadObjectList();
		for ($i = 0, $n = count($rows); $i < $n; $i++){
			$row = $rows[$i];
			$referenceId = $row->$primaryKey;
			for ($j = 0, $m = count($fields); $j < $m; $j++){
				$field = $fields[$j];
				$text = $row->$field;
				if ($text == '')
					continue;
				if (in_array($field, $translateFields))	{	
					if (strlen($text) > 5000) {
						$this->_translater->setText($text);
						$translatedValue = $this->_translater->translate();												
					} else {
						$this->_ajaxTranslater->setText($text);
						$translatedValue = $this->_ajaxTranslater->translate();
					}															
				} else {
					$translatedValue = $text;
				}																								
				$originalValue = md5($text);
				$rowJFContent = & JTable::getInstance('JGTranslation', 'Table');				
				$rowJFContent->language_id = $languageId;
				$rowJFContent->reference_id = $referenceId;
				$rowJFContent->reference_table = $tableName;
				$rowJFContent->reference_field = $field;
				$rowJFContent->value = $translatedValue;
				$rowJFContent->original_value = $originalValue;
				$rowJFContent->original_text = $text;
				$rowJFContent->modified = date('Y-m-d h:i:s');
				$rowJFContent->modified_by = $userId;
				$rowJFContent->published = 1;																							
				$rowJFContent->store();														
			}
		}
		return $n;
	}
}