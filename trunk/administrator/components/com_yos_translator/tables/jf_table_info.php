<?php
/**
 * Joomfish content info table class
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
 * Hello Table class
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TableJf_table_info extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;
	
	/**
	 * joomlatablename
	 * @var string
	 */
	var $joomlatablename = '';
	
	/**
	 * tablepkID
	 * @var string
	 */
	var $tablepkID = '';

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(& $db) {
		parent::__construct('#__jf_tableinfo', 'id', $db);
	}
}
?>
