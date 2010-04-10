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
class TranslatorControllerTranslateall extends TranslatorController
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
		
		$view=$this->getView('content_translateall','html');		
			
		if ($model=& $this->getModel('content_translateall')) {
			$view->setModel($model);
			$view->setLayout('form');
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
		
		$content	=& JTable::getInstance('content','Table');
		$content->load((int)$id);
		
		//build a page to translate
		$pageContent = '';
		
		$titleHashBegin = md5('JLORD_BEGIN_TITLE_AREA');
		$titleHashEnd = md5('JLORD_END_TITLE_AREA');
		$pageContent .= '' . $titleHashBegin . '<div>' . $content->title . '</div>' . $titleHashEnd . '';
		$pageContent .= "<br />";
		
		$introtextHashBegin = md5('JLORD_BEGIN_INTROTEXT_AREA');
		$introtextHashEnd = md5('JLORD_END_INTROTEXT_AREA');
		$pageContent .= '' . $introtextHashBegin . '<div>' . $content->introtext . '</div>' . $introtextHashEnd . '';
		$pageContent .= "<br />";
		
		$fulltextHashBegin = md5('JLORD_BEGIN_FULLTEXT_AREA');
		$fulltextHashEnd = md5('JLORD_END_FULLTEXT_AREA');
		$pageContent .= '' . $fulltextHashBegin . '<div>' . $content->fulltext . '</div>' . $fulltextHashEnd . '';
		$pageContent .= "<br />";
		
		$metakeyHashBegin = md5('JLORD_BEGIN_METAKEY_AREA');
		$metakeyHashEnd = md5('JLORD_END_METAKEY_AREA');
		$pageContent .= '' . $metakeyHashBegin . '<div>' . $content->metakey . '</div>' . $metakeyHashEnd . '';
		$pageContent .= "<br />";
		
		$metadescHashBegin = md5('JLORD_BEGIN_METADESC_AREA');
		$metadescHashEnd = md5('JLORD_END_METADESC_AREA');
		$pageContent .= '' . $metadescHashBegin . '<div>' . $content->metadesc . '</div>' . $metadescHashEnd . '';
		$pageContent .= "<br />";
		
		//No translate
		$pageContent	=	$this->notranslate($pageContent);
		$pageContent	=	$this->personconfig($pageContent);
		
		//require helper
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'translator.php');
		$translator = new Yos_translator();
		$languagePair	=	$src.'|'.$dst;
		
		$language_from = JRequest::getString('from_lang', '');
		
		
		if ($language_from != '') {
			//get code of language to
			//$code_to = $model->_getLanguageCode($translate_to);
			$languagePair = $language_from.'|'.$dst;
		}
		
			
		$tsl_pageContent = $translator->translate($languagePair, $pageContent);
		
		//Prepare save content
		if (count($this->_notran)) {
			foreach ($this->_notran as $notran) {
				$tsl_pageContent	=	str_replace($notran['hash'], $notran['value'], $tsl_pageContent);
			}
		}
		

		//remove old translated records
		$query	=	"DELETE FROM #__jf_content WHERE reference_id = $id AND language_id = $lang_id AND reference_table= 'content'";
		$db->setQuery($query);
		$db->query();
		
		//get table
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		$tbl_jf_content =& JTable::getInstance('jf_content', 'Table');
		
		//get title:
		if (preg_match('/' . $titleHashBegin . '\s*<div>(.*?)<\/div>\s*' . $titleHashEnd . '/is', $tsl_pageContent, $match)) {
			$title = str_replace('&quot;','"',trim($match[1]));
			$tbl_jf_content->store_jf($lang_id, $id, 'content', 'title', $title, md5($content->title), $content->title, $published);
		}
		
		//get introtext:
		if (preg_match('/' . $introtextHashBegin . '\s*<div>(.*?)<\/div>\s*' . $introtextHashEnd . '/is', $tsl_pageContent, $match)) {
			$tbl_jf_content->store_jf($lang_id, $id, 'content', 'introtext', trim($match[1]), md5($content->introtext), $content->introtext, $published);
		}
		
		//get fulltext:
		if (preg_match('/' . $fulltextHashBegin . '\s*<div>(.*?)<\/div>\s*' . $fulltextHashEnd . '/is', $tsl_pageContent, $match)) {
			$tbl_jf_content->store_jf($lang_id, $id, 'content', 'fulltext', trim($match[1]), md5($content->fulltext), $content->fulltext, $published);
		}
		
		//get metakey:
		if (preg_match('/' . $metakeyHashBegin . '\s*<div>(.*?)<\/div>\s*' . $metakeyHashEnd . '/is', $tsl_pageContent, $match)) {
			$tbl_jf_content->store_jf($lang_id, $id, 'content', 'metakey', trim($match[1]), md5($content->metakey), $content->metakey, $published);
		}
		
		//get metadesk:
		if (preg_match('/' . $metadescHashBegin . '\s*<div>(.*?)<\/div>\s*' . $metadescHashEnd . '/is', $tsl_pageContent, $match)) {
			$tbl_jf_content->store_jf($lang_id, $id, 'content', 'metadesc', trim($match[1]), md5($content->metadesc), $content->metadesc, $published);
		}
		
		
		//copy alias, images, publish_up, publish_down, atribs fields
		$tbl_jf_content->store_jf($lang_id, $id, 'content', 'alias', $content->alias, md5($content->alias), $content->alias, $published);
		
		$tbl_jf_content->store_jf($lang_id, $id, 'content', 'images', $content->images, md5($content->images), $content->images, $published);
		
		$tbl_jf_content->store_jf($lang_id, $id, 'content', 'publish_up', $content->publish_up, md5($content->publish_up), $content->publish_up, $published);
		
		$tbl_jf_content->store_jf($lang_id, $id, 'content', 'publish_down', $content->publish_down, md5($content->publish_down), $content->publish_down, $published);
		
		$tbl_jf_content->store_jf($lang_id, $id, 'content', 'attribs', $content->attribs, md5($content->attribs), $content->attribs, $published);
		
		die();
	}
	
	/**
	 * Dump to notranslate data
	 *
	 * @param content data $data
	 * @return content data
	 */
	function notranslate($data){
		
		$regex	=	'/\{notranslate\}(.*?)\{\/notranslate\}/m';
		preg_match_all($regex, $data, $matches);
		$f_number	=	count($matches[0]);
		
		if (!$f_number) {
			return $data;
		}		
		
		for ($i =0 ; $i<$f_number; $i++){
			$data	=	str_replace($matches[0][$i], md5($matches[0][$i]),$data);
			$this->_notran[]	=	array('hash'=> md5($matches[0][$i]), 'value'=> $matches[1][$i]);
		}		
		
		return $data;
	}
	
	/**
	 * Replace personconfig to notranslate and dump it
	 *
	 * @param content data $data
	 * @return content data
	 */
	function personconfig( $data ){
		$config =& JComponentHelper::getParams('com_yos_translator');
		$param_notranslate= $config->get('notranslate');
		$param_notranslate=	preg_replace('/\s/','',$param_notranslate);
		if ($param_notranslate) {
			$arr_tag	=	explode(';',$param_notranslate);			
			foreach ($arr_tag as $tag) {
				if ($tag) {
					$arr_sp		=	explode(',', $tag);
					$tagfirst	=	$arr_sp[0];
					$taglast	=	$arr_sp[1];
					if (!($tagfirst && $taglast)) {
						continue;
					}
					
					preg_match_all('/'.str_replace('/','\/',preg_quote($tagfirst)).'(.*?)'.str_replace('/','\/',preg_quote($taglast)).'/', $data, $matches);
					$f_number	=	count($matches[0]);
					if (!$f_number) {
						continue;
					}
					
					for ($i =0 ; $i<$f_number; $i++){
						$data	=	str_replace($matches[0][$i], md5($matches[0][$i]),$data);
						$this->_notran[]	=	array('hash'=> md5($matches[0][$i]), 'value'=> $matches[0][$i]);
					}
					
				}
			}			
		}
		
		return $data;
		
	}
	
	function cancel(){
		global $mainframe, $option;
		
		$msg = "Operation aborted!";
		$mainframe->redirect( "index.php?option=$option&view=contents", $msg );
	}
	
}