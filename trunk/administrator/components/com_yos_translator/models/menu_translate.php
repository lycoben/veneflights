<?php
/**
 * Extensions Model for yos_translator Component
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Extensions Model
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorModelmenu_translate extends JModel
{
		
	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();
		
		$cid	= JRequest::getVar('cid');
		
		if (!count($cid)) {
			return true;
		}
		
		for($i=0; $i<count($cid); $i++)
		{
			$id		= explode('|',$cid[$i]);
			$id1[$i]= $id[0];
			$id2[$i]= $id[1];
		}
		
		$this->setState('ids', $id1);
	}
	
	function getList(){
		$db	=	$this->_db;
		$id1	=	$this->getState('ids');
		$key	=	array();
		for ($i = 0; $i<count($id1); $i++){
			$ok	=	true;
			for ($j= $i+1; $j<count($id1); $j++){
				if ($id1[$i]==$id1[$j]) {
					$ok=	false;
					break;
				}
			}
			
			if ($ok) {
				$key[]	=	$id1[$i];
			}
		}	
		
		
		$where	=	implode(' OR id=', $key);
		
		$query	=	 "SELECT id, name "
					."FROM `#__menu` "
					."WHERE id=$where";
		$db->setQuery($query);
		
		$rows	= $db->loadObjectList();
		
		return $rows;
	}
	
	function getLanguages(){
		$db	=	&JFactory::getDBO();
		$query	=	"SELECT * FROM #__languages";
		$db->setQuery($query);
		$rows	=	$db->loadObjectList();
		return JHTML::_('select.genericlist', $rows, 'language_id', 'id="language_id" size="1"', 'id', 'name', JRequest::getString('filter_language'));
	}
	
	function getDefault() {
		global $mainframe;
		$db	=	$this->_db;
		$client	=& JApplicationHelper::getClientInfo(JRequest::getVar('client', '0', '', 'int'));		
		$params	=	&JComponentHelper::getParams('com_languages');
		$default_language	=	$params->get($client->name, 'en-GB');
		$query				=	"SELECT code_translator FROM #__yos_translator WHERE code_language = '$default_language'";
		$db->setQuery($query);
		$code_translator	=	$db->loadResult();
		if (!$code_translator) {
			$mainframe->redirect('index.php?option=com_yos_translator&view=menus');
		}
		return $code_translator;
	}
}
?>