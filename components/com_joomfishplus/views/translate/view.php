<?php
/**
* @version		$Id: view.html.php 947 2008-04-12 12:48:52Z akede $
* @package		Joomla
* @subpackage	Weblinks
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

include_once( JPATH_ADMINISTRATOR. DS. 'components' .DS. 'com_joomfish'. "/views/translate/view.php");

/**
 * HTML View class for the WebLinks component
 *
 * @static
 * @package		Joomla
 * @subpackage	Weblinks
 * @since 1.0
 */
class FrontendtranslateViewTranslate extends JView 
{
	function __construct($config = array()){
		
		// include the script that mends the toolbar icon behaviour
		JHTML::script("jfplus.js",'components/com_joomfishplus/assets/js/',true);
		
		$module = JModuleHelper::getModule("jflanguageselection",false);
		echo "<div style='float:left;margin:10px;'>".JModuleHelper::renderModule($module)."</div>\n";
		
		include_once(JPATH_ADMINISTRATOR.DS."includes".DS."toolbar.php");
		parent::__construct($config);	
		
		// TODO find the active admin template
		JHTML::stylesheet("system.css",JURI::root()."administrator/templates/system/css/");
		JHTML::stylesheet("template.css",JURI::root()."administrator/templates/khepri/css/");

		JHTML::stylesheet("joomfish.css",JURI::root()."administrator/components/com_joomfish/assets/css/");
	}
		
	function display($tpl = null)
	{
		$document =& JFactory::getDocument();
	
		// Get data from the model
		$state		= &$this->get('State');
		// Are there messages to display ?
		$showMessage	= false;
		$message = $this->get('message');
				
		if ( is_object($state) )
		{
			$message1		= $state->get('message') == null ? $message : $state->get('message');
			$message2		= $state->get('extension.message');
			$showMessage	= ( $message1 || $message2 );
		}

		$this->assign('showMessage',	$showMessage);
		$this->assignRef('state',		$state);
		
		$layout = $this->getLayout();
		if (method_exists($this,$layout)){
			$this->$layout($tpl);
		} else {
			$this->overview($tpl);
		}			
	}

	function overview($tpl = null)
	{
		
		// browser title
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('JOOMFISH_TITLE') . ' :: ' .JText::_('TRANSLATE'));
		
		// set page title
		JToolBarHelper::title( JText::_( 'JOOMFISH PLUS').' :: ' .JText::_('TRANSLATE' ), 'translation' );

		// Set toolbar items for the page
		if ($this->canFrontEndPublish){
			JToolBarHelper::publish("translate.publish");
			JToolBarHelper::unpublish("translate.unpublish");
		}
		JToolBarHelper::editList("translate.edit");
		if ($this->canFrontEndPublish){
			JToolBarHelper::deleteList(JText::_("ARE YOU SURE YOU WANT TO DELETE THIS TRANSLATION"), "translate.remove");	
		}
		JToolBarHelper::help( 'translate.overview', true);
		JToolBarHelper::custom( 'translate.home', 'default', 'default', JText::_( 'Main Site' ), false );

		// hide the sub menu
		$this->_hideSubmenu();

		JHTML::_('behavior.tooltip');

		$this->langlist =& $this->filteredLangList;

		$this->_adminStart();			
		parent::display($tpl);
		$this->_adminEnd();
	}	
	
	function edit($tpl = null){
		// browser title
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('JOOMFISH_TITLE') . ' :: ' .JText::_('Translate'));
		
		// set page title
		JToolBarHelper::title( JText::_( 'Translate' ), 'translation' );

		// Set toolbar items for the page
		if (JRequest::getVar("catid","")=="content"){
			$bar = & JToolBar::getInstance('toolbar');
			// Add a special preview button by hand			
			$live_site = JURI::base();			
			$bar->appendButton( 'Popup', 'preview', 'Preview', JRoute::_("index.php?option=com_joomfishplus&task=translate.preview&tmpl=component"), "800","550");
		}
		JToolBarHelper::save("translate.save");
		JToolBarHelper::cancel("translate.overview");

			
		JHTML::_('behavior.tooltip');

		$this->langlist =& $this->filteredLangList;

		// hide the sub menu
		$this->_hideSubmenu();

		$this->_adminStart();
		parent::display($tpl);
		$this->_adminEnd();
	}
	
	function preview($tpl = null)
	{
		// browser title
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('JOOMFISH_TITLE') . ' :: ' .JText::_('Preview'));
		
		// set page title
		JToolBarHelper::title( JText::_( 'Preview' ), 'translation' );

		// Set toolbar items for the page
		if (JRequest::getVar("catid","")=="content"){
			$bar = & JToolBar::getInstance('toolbar');
			// Add a special preview button by hand			
			$live_site = JURI::base();			
			$bar->appendButton( 'Popup', 'preview', 'Preview', JRoute::_("index.php?option=com_joomfishplus&task=translate.preview&tmpl=component"), "800","550");
		}
			
		JHTML::_('behavior.tooltip');

		$this->langlist =& $this->filteredLangList;

		// hide the sub menu
		$this->_hideSubmenu();

		$this->_adminStart();
		parent::display($tpl);
		$this->_adminEnd();
		
	}
	
	function _adminStart(){
		
?>
	<div id="content-box" style="clear:both">
		<div class="border">
			<div class="padding">
				<div id="toolbar-box" >
   					<div class="t">
						<div class="t">
							<div class="t"></div>
						</div>
					</div>
					<div class="m">
<?php
		$bar = & JToolBar::getInstance('toolbar');
		echo $bar->render();
		global $mainframe;
		$title = $mainframe->get('JComponentTitle');
		echo $title;
?>
					<div class="clr"></div>
					</div>
					<div class="b">
						<div class="b">
							<div class="b"></div>	
						</div>
					</div>
  				</div>
				<div id="toolbar-box2">
   					<div class="t">
						<div class="t">
							<div class="t"></div>
						</div>
					</div>
					<div class="m">
<?php			
	}

	function _adminEnd(){
?>
					<div class="clr"></div>
					</div>
					<div class="b">
						<div class="b">
							<div class="b"></div>	
						</div>
					</div>
  				</div>
			</div>
		</div>
	</div>
<?php			
	}
	
	/**
	 * Routine to hide submenu suing CSS since there are no paramaters for doing so without hiding the main menu
	 *
	 */
	function _hideSubmenu(){
		JHTML::stylesheet( 'hidesubmenu.css', 'administrator/components/com_joomfish/assets/css/' );	 	
	}

}
