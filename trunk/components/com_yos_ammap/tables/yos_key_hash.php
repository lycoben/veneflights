<?php
/**
 * @version		$Id: contact.php 10094 2008-03-02 04:35:10Z instance $
 * @package		Joomla
 * @subpackage	Test
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


/**
 * @package		Joomla
 * @subpackage	Test
 */
class TableYOS_Key_Hash extends JTable
{
	/** @var date */
	var $timecheck			= null;
	/** @var string */
	var $hash				= null;		
	/**
	* @param database A database connector object
	*/
	function __construct(&$db)
	{
		parent::__construct( '#__yos_key_hash', 'id', $db );
	}

	/**
	 * Overloaded check function
	 *
	 * @access public
	 * @return boolean
	 * @see JTable::check
	 * @since 1.5
	 */
	function check()
	{
		//$this->default_con = intval( $this->default_con );

//		if (JFilterInput::checkAttribute(array ('href', $this->webpage))) {
//			$this->setError(JText::_('Please provide a valid URL'));
//			return false;
//		}

		// check for http on webpage
//		if (strlen($this->webpage) > 0 && (!(eregi('http://', $this->webpage) || (eregi('https://', $this->webpage)) || (eregi('ftp://', $this->webpage))))) {
//			$this->webpage = 'http://'.$this->webpage;
//		}

//		if(empty($this->alias)) {
//			$this->alias = $this->name;
//		}
//		$this->alias = JFilterOutput::stringURLSafe($this->alias);
//		if(trim(str_replace('-','',$this->alias)) == '') {
//			$datenow =& JFactory::getDate();
//			$this->alias = $datenow->toFormat("%Y-%m-%d-%H-%M-%S");
//		}

		return true;
	}	
}
