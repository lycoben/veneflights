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

/**
 * Translator Extension Controller
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorControllerTranslateone extends TranslatorController
{
	var $_notran	=	array();
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
		
		$this->registerTask('save_continue', 'save');
	}
	
	function edit(){
		//hide mainmenu
		JRequest::setVar('hidemainmenu', 1);
		
		$view=$this->getView('content_translateone','html');		
			
		if ($model=& $this->getModel('content_translateone')) {
			$view->setModel($model);
			$view->setLayout('form');
		}
		$view->display();
	}
	
	function save(){
		global $mainframe, $option;
		$db =& JFactory::getDBO();
				
		$reference_id	=	JRequest::getInt('reference_id');
		$lang_id = JRequest::getInt('translate_to');
		
		$published	=	JRequest::getString('published');
		$published	=	$published == '1' ? 1 : 0;	
		
		$tsl_title 	= JRequest::getVar( 'tsl_title', '', 'post', 'string', JREQUEST_ALLOWRAW );		
		$tsl_introtext = JRequest::getVar( 'tsl_introtext', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$tsl_fulltext = JRequest::getVar( 'tsl_fulltext', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$tsl_metakey = JRequest::getVar( 'tsl_metakey', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$tsl_metadesc = JRequest::getVar( 'tsl_metadesc', '', 'post', 'string', JREQUEST_ALLOWRAW );
		
		//get table
		JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');
		
		//load content to get original values
		$content =& JTable::getInstance('content','Table');
		$content->load((int)$reference_id);
		
		//remove old translated records
		$query	=	"DELETE FROM #__jf_content WHERE reference_id = $reference_id AND language_id = $lang_id AND reference_table= 'content'";
		$db->setQuery($query);
		$db->query();
		
		//load jf_content table
		$tbl_jf_content =& JTable::getInstance('jf_content', 'Table');
		
		//get title:
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'title', $tsl_title, md5($content->title), $content->title, $published);
		
		//get introtext:
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'introtext', $tsl_introtext, md5($content->introtext), $content->introtext, $published);
		
		//get fulltext:
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'fulltext', $tsl_fulltext, md5($content->fulltext), $content->fulltext, $published);
		
		//get metakey:
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'metakey', $tsl_metakey, md5($content->metakey), $content->metakey, $published);
		
		//get metadesk:
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'metadesc', $tsl_metadesc, md5($content->metadesc), $content->metadesc, $published);
		
		//copy alias, images, publish_up, publish_down, atribs fields
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'alias', $content->alias, md5($content->alias), $content->alias, $published);
		
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'images', $content->images, md5($content->images), $content->images, $published);
		
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'publish_up', $content->publish_up, md5($content->publish_up), $content->publish_up, $published);
		
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'publish_down', $content->publish_down, md5($content->publish_down), $content->publish_down, $published);
		
		$tbl_jf_content->store_jf($lang_id, $reference_id, 'content', 'attribs', $content->attribs, md5($content->attribs), $content->attribs, $published);
		
		//redirect
		$msg = 'Translated successfully';
		$task = JRequest::getCmd('task');
		if ($task == 'save_continue' ) {
			$url = "index.php?option=$option&task=translateone.edit&cid[]=$reference_id|0";
		}
		else {
			$url = "index.php?option=$option&view=contents";
		}
		
		$mainframe->redirect( $url, $msg );
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
	
	//translate content and store in jf_content table
	function translate(){
		global $mainframe, $option;
		
		$view=$this->getView('content_translateone','html');		
			
		if (!$model=& $this->getModel('content_translateone')) {
			$msg = "Couldn't get model!";
			$mainframe->redirect( "index.php?option=$option&view=contents", $msg );
		}
		
		$reference_id = JRequest::getVar('reference_id', 0);
		$language_id = JRequest::getVar('language_id', 0);
		$translate_to = JRequest::getInt('translate_to', 0);
		
		$model->initialize($reference_id, $language_id);
		
		//build a page to translate
		$pageContent = '';
		
		$titleHashBegin = md5('JLORD_BEGIN_TITLE_AREA');
		$titleHashEnd = md5('JLORD_END_TITLE_AREA');
		$pageContent .= '' . $titleHashBegin . '<div>' . $model->get('org_title', '') . '</div>' . $titleHashEnd . '';
		$pageContent .= "<br />";
		
		$introtextHashBegin = md5('JLORD_BEGIN_INTROTEXT_AREA');
		$introtextHashEnd = md5('JLORD_END_INTROTEXT_AREA');
		$pageContent .= '' . $introtextHashBegin . '<div>' . $model->get('org_introtext', '') . '</div>' . $introtextHashEnd . '';
		$pageContent .= "<br />";
		
		$fulltextHashBegin = md5('JLORD_BEGIN_FULLTEXT_AREA');
		$fulltextHashEnd = md5('JLORD_END_FULLTEXT_AREA');
		$pageContent .= '' . $fulltextHashBegin . '<div>' . $model->get('org_fulltext', '') . '</div>' . $fulltextHashEnd . '';
		$pageContent .= "<br />";
		
		$metakeyHashBegin = md5('JLORD_BEGIN_METAKEY_AREA');
		$metakeyHashEnd = md5('JLORD_END_METAKEY_AREA');
		$pageContent .= '' . $metakeyHashBegin . '<div>' . $model->get('org_metakey', '') . '</div>' . $metakeyHashEnd . '';
		$pageContent .= "<br />";
		
		$metadescHashBegin = md5('JLORD_BEGIN_METADESC_AREA');
		$metadescHashEnd = md5('JLORD_END_METADESC_AREA');
		$pageContent .= '' . $metadescHashBegin . '<div>' . $model->get('org_metadesc', '') . '</div>' . $metadescHashEnd . '';
		$pageContent .= "<br />";
		
		//No translate
		$pageContent	=	$this->notranslate($pageContent);
		$pageContent	=	$this->personconfig($pageContent);
		
		//get language pair
		$languagePair = $model->getLanguagePair($translate_to);
		
		$language_from = JRequest::getString('from_lang', '');
		if ($language_from != '') {
			//get code of language to
			$code_to = $model->_getLanguageCode($translate_to);
			$languagePair = $language_from.'|'.$code_to;
		}
		
		//get translated pageContent from helper
		require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'helpers'.DS.'translator.php');
		$translator = new Yos_translator();
		$tsl_pageContent = $translator->translate($languagePair, $pageContent);
		
		//Prepare save content
		if (count($this->_notran)) {
			foreach ($this->_notran as $notran) {
				$tsl_pageContent	=	str_replace($notran['hash'], $notran['value'], $tsl_pageContent);
			}
		}
		
		//get title:
		if (preg_match('/' . $titleHashBegin . '\s*<div>(.*?)<\/div>\s*' . $titleHashEnd . '/is', $tsl_pageContent, $match)) {
			$model->set('tsl_title', trim($match[1]));
		}
		
		//get introtext:
		if (preg_match('/' . $introtextHashBegin . '\s*<div>(.*?)<\/div>\s*' . $introtextHashEnd . '/is', $tsl_pageContent, $match)) {
			$model->set('tsl_introtext', trim($match[1]));
		}
		
		//get fulltext:
		if (preg_match('/' . $fulltextHashBegin . '\s*<div>(.*?)<\/div>\s*' . $fulltextHashEnd . '/is', $tsl_pageContent, $match)) {
			$model->set('tsl_fulltext', trim($match[1]));
		}
		
		//get metakey
		if (preg_match('/' . $metakeyHashBegin . '\s*<div>(.*?)<\/div>\s*' . $metakeyHashEnd . '/is', $tsl_pageContent, $match)) {
			$model->set('tsl_metakey', trim($match[1]));
		}
		
		//get metadesk:
		if (preg_match('/' . $metadescHashBegin . '\s*<div>(.*?)<\/div>\s*' . $metadescHashEnd . '/is', $tsl_pageContent, $match)) {
			$model->set('tsl_metadesc', trim($match[1]));
		}
		
		$model->set('translated', 1);
		
		//set this modle to view
		$view->setModel($model);
		$view->setLayout('form');

		$view->display();
	}
	
	function cancel(){
		global $mainframe, $option;
		
		$msg = "Operation aborted!";
		$mainframe->redirect( "index.php?option=$option&view=contents", $msg );
	}
	
}