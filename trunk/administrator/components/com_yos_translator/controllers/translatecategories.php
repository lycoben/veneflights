<?php
/**
 * Translateone Controller for yos_translator Component
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
/**
 * Translator Extension Controller
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorControllerTranslatecategories extends TranslatorController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	
	var $_notran	=	array();
	
	function __construct()
	{
		parent::__construct();
	}
	
	function edit(){
		
		$view=$this->getView('categories_translate','html');		
			
		if ($model=& $this->getModel('categories_translate')) {
			$view->setModel($model);			
		}		
		$view->display();
	}
	
	function save(){
		global $mainframe;
		$id	=	JRequest::getInt('id');		
		$src=	JRequest::getString('src');
		$dst=	JRequest::getInt('dst');
		$published	=	JRequest::getString('published');
		$published	=	$published == 'true' ? 1 : 0;
		
		$lang_id	=	$dst;
		$lang	=	&JTable::getInstance('languages');
		$lang->load($dst);
		$db	=	&JFactory::getDBO();
		
		$query	=	"SELECT code_translator FROM #__yos_translator WHERE code_language = '$lang->code'";
		$db->setQuery($query); 
		$dst	=	$db->loadResult();
		if (!$dst) {
			echo 'Error!';
			die();
		}
		$categories	=& JTable::getInstance('categories','Table');
		$categories->load((int)$id);
		
		$languagePair	=	$src.'|'.$dst;
				
		//require helper
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'translatetext.php');
		$translator = new Yos_translateText();
		$tsl_content = $translator->translate($languagePair, $categories->title);
		//remove old translated records
		$query	=	"DELETE FROM #__jf_content WHERE reference_id = $id AND language_id = $lang_id AND reference_table= 'categories'";
		$db->setQuery($query);
		$db->query();
		//get table
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$tbl_jf_content =& JTable::getInstance('jf_content', 'Table');		
		//store menu name:
		$tbl_jf_content->store_jf($lang_id, $id, 'categories', 'title', trim($tsl_content), md5($categories->title), $categories->title, $published);
		
		//store modules params:
		$tbl_jf_content->store_jf($lang_id, $id, 'categories', 'alias',  $categories->alias , md5($categories->alias), $categories->alias, $published);
		
		die();
	}
	
	function cancel(){
		global $mainframe, $option;		
		$msg = "Operation aborted!";
		$mainframe->redirect( "index.php?option=$option&view=categories", $msg );
	}
	
}