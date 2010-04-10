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
class TranslatorControllerConfig extends TranslatorController
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
		
		$id 	= JRequest::getVar('id', 0, 'get', 'int');
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$uid	= $user->get('id');
		$task 	= JRequest::getCmd('task','config.publish');
		
		$publish= ($task=='config.publish')?1:0;
	
		JArrayHelper::toInteger($cid);
	
		if (count( $cid ) < 1) {
			$action = $publish ? 'active' : 'unactive';
			JError::raiseError(500, JText::_( 'Select a language to '.$action, true ) );
		}
	
		$cids = implode( ',', $cid );
	
		$query = 'UPDATE #__languages'
		. ' SET active = ' . (int) $publish
		. ' WHERE id IN ( '.$cids.' )'		
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
	
		if (count( $cid ) == 1) { 
			$row =& JTable::getInstance('Languages');			
			$row->checkin( $cid[0] );
		}
	
		$mainframe->redirect( "index.php?option=com_yos_translator&task=config" );
	}
	
	function save(){
		global $mainframe;
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$id 	= JRequest::getVar('id', 0, 'get', 'int');
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		if (count( $cid ) < 1) {			
			JError::raiseError(500, JText::_( 'Select a language to save', true ) );
		}
		
		for ($i=0; $i<count($cid); $i++){
			$row	=	&JTable::getInstance('Languages');
			$row->load($cid[$i]);
			$t_code	=	JRequest::getString($row->shortcode);
			if (!$t_code) {
				continue;
			}
			$query	=	"SELECT count(*) FROM #__yos_translator WHERE code_language = '$row->code'";
			$db->setQuery($query);
			$total	=	$db->loadResult();
			if (!$total) {
				$query	=	"INSERT INTO #__yos_translator SET code_language = '$row->code', code_translator = '$t_code'";
				$db->setQuery($query);
				$db->query();
			} else {
				$query	=	"UPDATE #__yos_translator SET code_translator = '$t_code' WHERE code_language = '$row->code'";
				$db->setQuery($query);
				$db->query();
			}
		}
		
		$mainframe->redirect('index.php?option=com_yos_translator&task=config');
		
	}
	
	

}
?>
