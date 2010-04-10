<?php
/**
 * Customers table class
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */
// no direct access
defined('_JEXEC') or die('Restricted access');


/**
 * Content Table class
 *
 * @package    yos_translator
 * @subpackage Components
 */
class TableMenu extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * menutype
	 * @var string
	 */
	var $menutype = '';
	
	/**
	 * name
	 * @var string
	 */
	var $name = '';
	
	/**
	 * alias
	 * @var string
	 */
	var $alias = '';
	
	/**
	 * link
	 * @var string
	 */
	var $link = '';
	
	/**
	 * type
	 * @var string
	 */
	var $type = '';
	
	/**
	 * published
	 * @var tinyint(1)
	 */
	var $published = 0;
	
	/**
	 * parent
	 * @var int(11)
	 */
	var $parent = 0;
	
	/**
	 * componentid
	 * @var int(11)
	 */
	var $componentid = 0;
	
	/**
	 * sublevel
	 * @var int(11)
	 */
	var $sublevel = 0;
	
	/**
	 * ordering
	 * @var int(11)
	 */
	var $ordering = 0;
	
	/**
	 * checked_out
	 * @var int(11)
	 */
	var $checked_out = 0;
	
	/**
	 * created_by_alias
	 * @var datetime
	 */
	var $checked_out_time = '0000-00-00 00:00:00';
	
	/**  
	 * pollid
	 * @var int(11)
	 */
	var $pollid = 0;
	
	/**
	 * browserNav
	 * @var tinyint(3)
	 */
	var $browserNav = 0;
	
	/**
	 * access
	 * @var int(11)
	 */
	var $access = 0;
	
	/**
	 * utaccess
	 * @var  tinyint(3)
	 */
	var $utaccess = 0;
	
	/**
	 * params
	 * @var String
	 */
	var $params = '';
	
	/**
	 * lft
	 * @var int(11) 
	 */
	var $lft = 0;
	
	/**
	 * rgt
	 * @var text
	 */
	var $rgt = 0;
	
	/**
	 * home
	 * @var int(1)
	 */
	var $home = 0;


	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableMenu(& $db) {
		parent::__construct('#__menu', 'id', $db);
	}
}
?>
