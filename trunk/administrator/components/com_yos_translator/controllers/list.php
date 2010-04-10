<?php
/**
 * Extension Controller for yos_translator Component
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
 * Translator Customer Controller
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorControllerList extends TranslatorController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	function publish(){
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');		
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$uid	= $user->get('id');
		$task 	= JRequest::getCmd('task','list.publish');
		
		$publish= ($task=='list.publish')?1:0;		
	
		if (count( $cid ) < 1) {
			$action = $publish ? 'publish' : 'unpublish';
			JError::raiseError(500, JText::_( 'Select a content to '.$action, true ) );
		}
	
		foreach ($cid as $id) {
			$content	=	explode('|',$id);
			$id			=	$content[0];
			$id_lang	=	$content[1];
			$query		=	"UPDATE #__jf_content SET published = ". (int) $publish." 
							WHERE reference_id = $id 
								AND reference_table = 'content'
								AND language_id = '$id_lang'";
			$db->setQuery( $query );
			$db->query();
		}		
	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=contents" );
	}
	
	function remove(){
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');		
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		
		if (count( $cid ) < 1) {			
			JError::raiseError(500, JText::_( 'Select a content to delete', true ) );
		}
		
		foreach ($cid as $id) {
			$content	=	explode('|',$id);
			$id			=	$content[0];
			$id_lang	=	$content[1];
			$query		=	"DELETE FROM #__jf_content 
							WHERE reference_id = $id 
								AND reference_table = 'content'
								AND language_id = '$id_lang'";
			$db->setQuery( $query );
			$db->query();
		}		
	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=contents" );
	}
	
	
	function MNpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.publishM');
		$publish= ($task=='list.MNpublish')?1:0;
		TranslatorControllerList::publishA('menu',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=menus" );
	}
	function MNunpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.publishM');
		$publish= ($task=='list.MNpublish')?1:0;
		TranslatorControllerList::publishA('menu',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=menus" );
	}
	function removeM(){
		global $mainframe;
		TranslatorControllerList::removeA('menu');	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=menus" );
	}
	function MDpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.MDpublish');
		$publish= ($task=='list.MDpublish')?1:0;
		TranslatorControllerList::publishA('modules',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=modules" );
	}
	function MDunpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.MDpublish');
		$publish= ($task=='list.MDpublish')?1:0;
		TranslatorControllerList::publishA('modules',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=modules" );
	}
	function removeMD(){
		global $mainframe;
		TranslatorControllerList::removeA('modules');	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=modules" );
	}
	
	function CTpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.CTpublish');
		$publish= ($task=='list.CTpublish')?1:0;
		TranslatorControllerList::publishA('categories',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=categories" );
	}
	function CTunpublish(){
		global $mainframe;
		$task 	= JRequest::getCmd('task','list.publishMD');
		$publish= ($task=='list.CTpublish')?1:0;
		TranslatorControllerList::publishA('categories',$publish);	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=categories" );
	}
	function removeCT(){
		global $mainframe;
		TranslatorControllerList::removeA('categories');	
		$mainframe->redirect( "index.php?option=com_yos_translator&view=categories" );
	}
	function publishA($referenceT, $publish){
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');		
		
		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$uid	= $user->get('id');
			
		
		if (count( $cid ) < 1) {
			$action = $publish ? 'publish' : 'unpublish';
			JError::raiseError(500, JText::_( 'Select a content to '.$action, true ) );
		}
	
		foreach ($cid as $id) {
			$content	=	explode('|',$id);
			$id			=	$content[0];
			$id_lang	=	$content[1];
			$query		=	"UPDATE #__jf_content SET published = ". (int) $publish." 
							WHERE reference_id = $id 
								AND reference_table = '".$referenceT.
								"' AND language_id = '$id_lang'";
			$db->setQuery( $query );
			$db->query();
		}		
		
	}
	function removeA($referenceT){
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');		
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		
		if (count( $cid ) < 1) {			
			JError::raiseError(500, JText::_( 'Select a content to delete', true ) );
		}
		
		foreach ($cid as $id) {
			$content	=	explode('|',$id);
			$id			=	$content[0];
			$id_lang	=	$content[1];
			$query		=	"DELETE FROM #__jf_content 
							WHERE reference_id = $id 
								AND reference_table = '".$referenceT."'
								AND language_id = '$id_lang'";
			$db->setQuery( $query );
			$db->query();
		}		
	}
}
?>
