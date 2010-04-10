<?php
/**
 * Cpanel View for yos_translator Component
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Cpanel View
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorViewCpanel extends JView
{
	/**
	 * display method of Hello view
	 * @return void
	 **/
	function display($tpl = null)
	{
		global $option;
				
		$this->assignRef('option', $option);
					
		parent::display($tpl);
	}
}
