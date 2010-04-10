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
class TableYOS_AmMap extends JTable
{
	/** @var int Primary key */
	var $id 				= null;
	/** @var string */
	var $title				= null;
	/** @var string */
	var $folder				= null;
	/** @var string */
	var $folderaddon		= null;
	/** @var string */
	var $hdata				= null;	
	/** @var string */
	var $hsettings			= null;	
	/** @var int */
	var $published 			= 0;
	/** @var int */
	var $ordering 			= null;
	/** @var int */
	var $checked_out 		= 0;
	/** @var date */
	var $checked_out_time	= null;
	/** @var date */
	var $created			= null;
	/** @var int */
	var $created_by			= null;
	/** @var int */
	var $pid				= null;
	/** @var int */
	var $security 			= 0;
	/** @var int */
	var $timeout 			= 0;	
	/**
	* @param database A database connector object
	*/
	function __construct(&$db)
	{
		parent::__construct( '#__yos_maps', 'id', $db );
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
