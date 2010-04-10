<?php
/**
 * Joomfish content table class
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */
// no direct access
defined('_JEXEC') or die('Restricted access');


/**
 * Hello Table class
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TableJf_content extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;
	
	/**
	 * language id
	 * @var int
	 */
	var $language_id = 0;

	/**
	 * reference id
	 * @var int
	 */
	var $reference_id = 0;
	
	/**
	 * reference table
	 * @var string
	 */
	var $reference_table = '';
	
	/**
	 * reference field
	 * @var string
	 */
	var $reference_field = '';
	
	/**
	 * value
	 * @var string
	 */
	var $value = '';
	
	/**
	 * original_value
	 * @var string
	 */
	var $original_value = null;
	
	/**
	 * original_text
	 * @var string
	 */
	var $original_text = null;
	
	/**
	 * modified
	 * @var datetime
	 */
	var $modified = '0000-00-00 00:00:00';
	
	/**
	 * modified_by
	 * @var int
	 */
	var $modified_by = 0;
	
	/**
	 * published
	 * @var int
	 */
	var $published = 0;

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableJf_content(& $db) {
		parent::__construct('#__jf_content', 'id', $db);
	}
	
	/**
	 * Get Translation Status
	 *
	 * @param int $language_id
	 * @param int $reference_id
	 * @param string $reference_table
	 * @return value 0 if not exist, value 1 if incompleted, value 2 if completed
	 */
	function getTranslationStatus($language_id, $reference_id, $reference_table){
		$db = $this->_db;
		
		//select all records
		$query = "SELECT * FROM " . $this->getTableName() 
		. " WHERE language_id = $language_id AND reference_id = $reference_id AND reference_table = '$reference_table'";
		$db->setQuery($query);
		$items = $db->loadObjectList();		
		if (!$items) {
			return 0;
		}
		
		foreach ($items as $item){
			$query = "SELECT md5(`" . $item->reference_field . "`)"
				. " FROM #__" . $item->reference_table
				. " WHERE id = $item->reference_id";
			$db->setQuery($query);
			if ($db->loadResult() != $item->original_value) {
				
				return 1;
			}
		}
		
		return 2;
	}
	
	/**
	 * Store a field translated in jf_content
	 *
	 * @param int $lang_id
	 * @param int $reference_id
	 * @param string $reference_table
	 * @param string $reference_field
	 * @param string $value
	 * @param string $original_value
	 * @param string $original_text
	 * @param int $published, 0 = unpublished, 1 = published
	 */
	function store_jf($lang_id, $reference_id, $reference_table, $reference_field , $value,$original_value,$original_text, $published){
		$db = $this->_db;
		
		$now	=	&JFactory::getDate();
		$modified = $now->toMySQL();
		
		$user	 = &JFactory::getUser();
		$modified_by = $user->get('id');
				
		//store new translate value
		$this->set('id', null);
		$this->set('language_id', $lang_id);
		$this->set('reference_id', $reference_id);		
		$this->set('reference_table', $reference_table);
		$this->set('reference_field', $reference_field);
		$this->set('value', $value);
		$this->set('original_value', $original_value);
		$this->set('original_text', $original_text);
		$this->set('modified', $modified);
		$this->set('modified_by', $modified_by);
		$this->set('published', $published);
		$this->store();
	}
}
?>
