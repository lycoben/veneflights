<?php
/**
 * @version		$Id: manager.php 10381 2008-06-01 03:35:53Z pasamio $
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Weblinks Component Weblink Model
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class TranslatorModelConfig extends JModel
{
	/**
	 * amMap data array
	 *
	 * @var array
	 */
	var $_data = null;	

	/**
	 * uri total
	 *
	 * @var integer
	 */
	var $_total = null;

	/**
	 * Pagination object
	 *
	 * @var object
	 */
	var $_pagination = null;

	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();		
	}	
	
	function getData(){		
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList( $query );			
		}

		return $this->_data;
	}
	
	function _buildQuery(){	

		//Get Events from Database
		$query = 'SELECT id, name, active as published, code, shortcode FROM #__languages ';				
		return $query;
	}
	
	function getScript(){
		$data 	=	$this->getData();
		$var 	=	"";
		$addoption =	"";
		for ($i =0 ; $i< count($data); $i++){
			$var		.= "var ".$data[$i]->shortcode." = document.getElementById('".$data[$i]->shortcode."');";			
			$addoption	.= $data[$i]->shortcode.".options.add(new Option(lng, lngCode));";
		}
		$script=
		"
			google.load(\"language\", \"1\");
			google.setOnLoadCallback(init);
			
			function init() 
			{				
				".$var."
				for (l in google.language.Languages) 
				{
					var lng = l.toLowerCase();
					lng 		= lng.substring(0,1).toUpperCase()+lng.substring(1,lng.length);
					var lngCode = google.language.Languages[l];
					if (google.language.isTranslatable(lngCode)) 
					{
						".$addoption."
					}
				}
			}";
		
		return $script;
	}
	
	function getCurrentTranslator(){
		$db		=	&JFactory::getDBO();
		
		$data	=	$this->getData();
		$current	=	array();
		for ($i = 0; $i<count($data); $i++){
			$query	=	"SELECT code_translator FROM #__yos_translator WHERE code_language = '".$data[$i]->code."'";
			$db->setQuery($query);
			$current[]	=	$db->loadResult();
		}
		
		return $current;
	}
}