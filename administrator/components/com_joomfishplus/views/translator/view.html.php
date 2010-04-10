<?php
/**
* @version		$Id: view.html.php 998 2008-06-03 08:03:04Z geraint $
* @package		Joomfish
* @subpackage	Translator
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.filesystem.file');
jimport( 'joomla.application.component.view');
jimport('joomla.html.pane');

class TranslatorViewTranslator extends JView 
{
	/**
	 * Control Panel display function
	 *
	 * @param template $tpl
	 */
	function display($tpl = null)
	{
		global $mainframe;
		
		$document =& JFactory::getDocument();
		// this already includes administrator
		$livesite = JURI::base();
		$document->addStyleSheet($livesite.'components/com_joomfish/assets/css/joomfish.css');

		$document->setTitle(JText::_('JOOMFISH_TITLE') . ' :: ' .JText::_('Translators'));
				
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'Translators' ), 'fish' );
		JToolBarHelper::addNew("translator.edit");
		JToolBarHelper::editList("translator.edit");
		//JToolBarHelper::publish("translator.publish");
		//JToolBarHelper::unpublish("translator.unpublish");
		JToolBarHelper::deleteList(JText::_("ARE YOU SURE YOU WANT TO DELETE THIS TRANSLATOR"), "translator.remove");
		JToolBarHelper::help( 'screen.translator', true);

		$option				= JRequest::getCmd('option', 'com_joomfishplus');

		$translators	= &$this->get('translators');
		
		$this->assignRef('translators', $translators);

		JHTML::_('behavior.tooltip');
		parent::display($tpl);
	}

	function edit($tpl = null)
	{
		global $mainframe;
		
		$document =& JFactory::getDocument();
		// this already includes administrator
		$livesite = JURI::base();
		$document->addStyleSheet($livesite.'components/com_joomfish/assets/css/joomfish.css');

		$document->setTitle(JText::_('JOOMFISH_TITLE') . ' :: ' .JText::_('Edit Translator'));
				
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'Edit Translator' ), 'fish' );
		
		JToolBarHelper::save("translator.save");
		JToolBarHelper::cancel("translator.overview");

		JToolBarHelper::help( 'edit.translator', true);

		$option				= JRequest::getCmd('option', 'com_joomfishplus');

		$translator	= &$this->get('translator');
		
		$db=& JFactory::getDBO();
		// get users AUTHORS and above
		$sql = "SELECT * FROM #__users where gid>=19";
		$db->setQuery( $sql );
		$users = $db->loadObjectList();

		$userOptions[] = JHTML::_('select.option', '-1','Select User' );
		foreach( $users as $user )
		{
			$userOptions[] = JHTML::_('select.option', $user->id, $user->name );
		}
		$userlist = JHTML::_('select.genericlist', $userOptions, 'user_id', 'class="inputbox" size="1" ', 'value', 'text', $translator->user_id);

		$sql = "SELECT * FROM #__languages";
		$db->setQuery( $sql );
		$languages = $db->loadObjectList();

		$langOptions[] = JHTML::_('select.option', '-1','Select Language' );
		foreach( $languages as $language )
		{
			$langOptions[] = JHTML::_('select.option',$language->id, $language->name );
		}
		$langlist = JHTML::_('select.genericlist',  $langOptions, 'language_id', 'class="inputbox" size="1" ', 'value', 'text', $translator->language_id );
		
		$this->assignRef("users",$userlist);
		$this->assignRef("languages",$langlist);		
		$this->assignRef('translator', $translator);

		JHTML::_('behavior.tooltip');
		parent::display($tpl);
	}

	
}
