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
class TranslatorViewModule_translate extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		global $mainframe, $option;
		
		JHTML::stylesheet( 'yos_translator.css', 'administrator/components/com_yos_translator/assets/' );
		$bar =& JToolBar::getInstance('toolbar');
		JToolBarHelper::title(JText::_( 'Yos Translator' ), 'e_translate' );
		// Add a search button
		$dhtml = "<a class=\"toolbar\" onclick=\"javascript:hideMainMenu(); submitbutton('save')\" href=\"#\">
					<span title=\"Translate\" class=\"icon-32-translate\"><!--span--></span>
					Translate
				</a>";
		$bar->appendButton( 'Custom', $dhtml, 'save' );
		
		$dhtml = "<a class=\"toolbar\" onclick=\"javascript:hideMainMenu(); submitbutton('cancel')\" href=\"#\">
					<span title=\"Cancel\" class=\"icon-32-c_translate\"><!--span--></span>
					Exit
				</a>";
		$bar->appendButton( 'Custom', $dhtml, 'cancel' );	
		
		JHTML::_('behavior.mootools');
		
		$option				= JRequest::getCmd( 'option' );
		$model		=	$this->getModel('module_translate');		
		$rows	=	$model->getList();
		
		$this->assignRef('rows',$rows);
		$this->assign('default_language', $model->getDefault());
		$this->assignRef('language', $model->getLanguages());
		
		$this->assign('option',$option);
		parent::display($tpl);
	}
}
