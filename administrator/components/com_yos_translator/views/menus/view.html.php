<?php
/**
 * Cpanel View for yos_translator Component
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		cuongpm
 * @copyright 	YOS (cuongpmyos@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Menus View
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorViewMenus extends JView
{
	function display($tpl = null)
	{
		global $mainframe, $option;
		$filter_language	= $mainframe->getUserStateFromRequest($option.'.content.filter_language', 'filter_language', '', 'string');
		
		if ($filter_language == '') {
			$msg = "Please select a language";
			$this->assignRef('msg', $msg);
			$this->setLayout('selectlanguage');
			
			$lists	=	$this->get('Lists');
			$this->assignRef('lists',$lists);
			$this->assign('option',$option);
			parent::display($tpl);
			return ;
		}
		$rows	=	$this->get('Data');
		
		$pageNav=	$this->get('Pagination');
		$lists	=	$this->get('Lists');
		
		$this->assignRef('lists',$lists);
		$this->assignRef('rows',$rows);
		$this->assignRef('pageNav',$pageNav);
		$this->assign('option',$option);
		parent::display($tpl);
	}
	
}