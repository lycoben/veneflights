<?php
/**
 * @version		1.2 : view.html.php
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @copyright	Ossolution Team
 * @license		GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.view');
/**
 * HTML View class for the Google translation for joomfish
 *
 * @static
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @since 1.5
 */
class JGtranslationViewTranslation extends JView
{
	function display($tpl = null)
	{		
		$cid = JRequest::getVar('cid', array(), 'post');
		$langFrom = JRequest::getVar('lang_from', '', 'post');
		$langTo = JRequest::getVar('lang_to', '', 'post');
		$whereClause = JRequest::getVar('where_clause', '', 'post');						
		$url = JURI::root();
		$this->assignRef('siteUrl', $url);
		$this->assignRef('cid', $cid[0]);				
		$this->assignRef('langFrom', $langFrom);
		$this->assignRef('langTo', $langTo);		
		$this->assignRef('whereClause', $whereClause);
		parent::display($tpl);				
	}
}