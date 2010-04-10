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
jimport('joomla.application.component.model');
/**
 * Google translation for joomfish
 *
 * @package		Joomla
 * @subpackage	JGtranslation
 * @since 1.5
 */
class JGtranslationModelJGtranslation extends JModel
{
	/**
	 * Constructor
	 *
	 * @since 1.5
	 */
	/**
	 * The list of content items
	 *
	 * @var array of content items
	 */
	var $_contentItems = null;	
	/**
	 * Get the active languages in the system
	 *
	 * @var array
	 */
	var $_languages = null; 
	
	function __construct()
	{					
		parent::__construct();
	}
	/**
	 * Get list of content items
	 *
	 */
	function getConentElements(){
		if (empty($this->_contentItems)) {			
			$elements = JFolder::files(JF_ADMINPATH,'.xml');			
			$rows = array();
			for ($i =0 ,$n=count($elements); $i < $n; $i++){
				$xml = & JFactory::getXMLParser('Simple');
				$xmlFile = $elements[$i];
				$filePath = JF_ADMINPATH.DS.$xmlFile;								
				if (!$xml->loadFile($filePath)) {
					unset($xml);
					return false;
				}							
				$row = new stdClass;
				$row->id = $xmlFile;				
				$element = & $xml->document->name[0];				
				$row->name = $element	? $element->data() : '';
				$element = & $xml->document->author[0];
				$row->author = $element ? $element->data() : '';
				$element = & $xml->document->version[0];
				$row->version = $element ? $element->data() : '';
				$element = & $xml->document->description[0];
				$row->description = $element ? $element->data() : '';
				$rows[] = $row;																
			}
			$this->_contentItems = $rows;		
		}
		return $this->_contentItems;				
	}
	/**
	 * Get the active languages in the system
	 *
	 */
	function getLanguages() {
		if (empty($this->_languages)) {
			$sql = 'SELECT shortcode as id, name FROM #__languages WHERE active = 1';
			$this->_db->setQuery($sql);
			$this->_languages = $this->_db->loadObjectList();
		}
		return $this->_languages;
	}
}