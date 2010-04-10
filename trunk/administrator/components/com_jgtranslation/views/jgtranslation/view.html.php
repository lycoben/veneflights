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
jimport( 'joomla.application.component.view');

/**
 * HTML View class for the JGtranslation component
 *
 * @static
 * @package		Joomla
 * @subpackage	Google translation for Joomfish
 * @since 1.5
 */
class JGtranslationViewJGtranslation extends JView
{
	function display($tpl = null)
	{		
		global $mainframe, $option;
		$db = & JFactory::getDBO();
		$sql = 'SELECT shortcode FROM #__languages WHERE active =1';
		$db->setQuery($sql);
		$defaultLanguage = $db->loadResult();
		$model = $this->getModel();		
		$rows = $model->getConentElements();
		$languages = $model->getLanguages();		
		//Get default language
		$langFrom = $mainframe->getUserStateFromRequest( $option.'lang_from',		'lang_from',		$defaultLanguage );		
		$langTo = $mainframe->getUserStateFromRequest( $option.'lang_to',		'lang_to',		'');		
		$whereClause = $mainframe->getUserStateFromRequest( $option.'where_clause',		'where_clause',		'');
		$lists['lang_from'] = JHTML::_('select.genericlist', $languages, 'lang_from', ' class="inputbox" ','id', 'name', $langFrom);
		$lists['lang_to'] = JHTML::_('select.genericlist', $languages, 'lang_to', ' class="inputbox" ','id', 'name', $langTo);				
		$this->assignRef('items', $rows);
		$this->assignRef('lists', $lists);
		$this->assignRef('whereClause', $whereClause);
		parent::display($tpl);				
	}
}