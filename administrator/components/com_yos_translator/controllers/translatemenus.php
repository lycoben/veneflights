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
class TranslatorControllerTranslatemenus extends TranslatorController
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
		
		$view=$this->getView('menu_translate','html');		
			
		if ($model=& $this->getModel('menu_translate')) {
			$view->setModel($model);
			//$view->setLayout('form');
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
		$menu	=& JTable::getInstance('menu','Table');
		$menu->load((int)$id);
		
		$languagePair	=	$src.'|'.$dst;
		
		//$urlGtran ='ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=';
		//$urlGtran .= rawurlencode($menu->name).'&langpair='.rawurlencode($languagePair);
		
		//require helper
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'translatetext.php');
		$translator = new Yos_translateText();
		$tsl_content = $translator->translate($languagePair, $menu->name);
				
		//remove old translated records
		$query	=	"DELETE FROM #__jf_content WHERE reference_id = $id AND language_id = $lang_id AND reference_table= 'menu'";
		$db->setQuery($query);
		$db->query();
		//get table
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$tbl_jf_content =& JTable::getInstance('jf_content', 'Table');		
		//store menu name:
		$tbl_jf_content->store_jf($lang_id, $id, 'menu', 'name', trim($tsl_content), md5($menu->name), $menu->name, $published);
		//store menu alias:
		$tbl_jf_content->store_jf($lang_id, $id, 'menu', 'alias', $menu->alias, md5($menu->alias), $menu->alias, $published);
		//store menu alias:
		$tbl_jf_content->store_jf($lang_id, $id, 'menu', 'params',  $menu->params , md5($menu->params), $menu->params, $published);
		//store menu alias:
		$tbl_jf_content->store_jf($lang_id, $id, 'menu', 'link',  $menu->link , md5($menu->link), $menu->link, $published);
		die();
	}
	
	function cancel(){
		global $mainframe, $option;		
		$msg = "Operation aborted!";
		$mainframe->redirect( "index.php?option=$option&view=menus", $msg );
	}
	
}