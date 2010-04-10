<?php
/**
 * Extension View for yos_translator Component
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Extension View
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorViewContent_translateone extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		global $mainframe, $option;
		
		$controller = 'translateone';
		JHTML::stylesheet( 'yos_translator.css', 'administrator/components/com_yos_translator/assets/' );
		$model	=	$this->getModel('content_translateone');
//		var_dump($model->get('translated'));die();
		//Cuongpm add $document for select from language
		$document =& JFactory::getDocument();
		$document->addScript('http://www.google.com/jsapi');		
		$document->addScriptDeclaration($model->getScript());
		
		//check is model initialized
		if ($model->get('translated') == null) {
			$arr_cid = JRequest::getVar('cid', '');
			$str_cid = $arr_cid[0];
			
			if(!preg_match('/(\d+)\|((\d+)|(null))/i', $str_cid, $match)){
				$msg = "Please select an item";
				$mainframe->redirect( "index.php?option=$option&view=contents", $msg );
				return true;
			}
			//get language
			$reference_id = $match[1];
			$language_id = $match[2];
			
			//if translation not exist, then get the user filter state
			if ($language_id == 'null' || $language_id == 'NULL') {
				$language_id = $mainframe->getUserStateFromRequest($option.'.content.filter_language', 'filter_language', '', 'int');
			}
			
			//get model	
			$model = $this->getModel('content_translateone');
			$model->initialize($reference_id, $language_id);	
		}
		
		$reference_id = $model->get('reference_id');
		
		if (JRequest::getVar('translate_to') == null) {
			$language_id = $model->get('language_id');
		}
		else {
			$language_id = intval(JRequest::getVar('translate_to'));
		}
		
		$arr_languages = $model->getLanguageList();
		
		$languages = JHTML::_('select.genericlist', $arr_languages, 'translate_to', '', 'id', 'name', $language_id);
		
		$published = $model->getPublishStatus($reference_id, $language_id);
		
		$this->assignRef('languages', $languages);
		$this->assignRef('published', $published);
		
		$this->assignRef('org_title', $model->get('org_title'));
		$this->assignRef('tsl_title', $model->get('tsl_title'));
		
		$this->assignRef('org_introtext', $model->get('org_introtext'));
		$this->assignRef('tsl_introtext', $model->get('tsl_introtext'));
		
		$this->assignRef('org_fulltext', $model->get('org_fulltext'));
		$this->assignRef('tsl_fulltext', $model->get('tsl_fulltext'));
		
		$this->assignRef('org_metakey', $model->get('org_metakey'));
		$this->assignRef('tsl_metakey', $model->get('tsl_metakey'));
		
		$this->assignRef('org_metadesc', $model->get('org_metadesc'));
		$this->assignRef('tsl_metadesc', $model->get('tsl_metadesc'));
		
		$this->assignRef('reference_id', $reference_id);
		$this->assignRef('language_id', $language_id);
		
		$this->assign('option',$option);
		$this->assign('controller', $controller);
		parent::display($tpl);
	}
}
