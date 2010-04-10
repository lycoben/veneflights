<?php
/**
 * @version		$Id: calendar.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Calendar field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeText_Calendar extends JXFieldTypeText
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Text_Calendar';

	function fetchField($name, $value, &$node, $controlName)
	{
		JHTML::_('behavior.calendar'); //load the calendar behavior

		$id = str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name));
		//$node->addAttribute( 'onchange', 'relateColor(\''.$pickerId.'\', this.value);' );
		$format = $node->attributes( 'format' );
		$time	= $node->attributes( 'time' );

		if ($value == 'now') {
			$value = strftime( $format );
		}

		$document =& JFactory::getDocument();
		$document->addScriptDeclaration('window.addEvent(\'domready\', function() {if(document.getElementById("'.$id.'")) Calendar.setup({
        inputField     :    "'.$id.'",     // id of the input field
        ifFormat       :    "'.$format.'",      // format of the input field
        button         :    "'.$id.'_img",  // trigger for the calendar (button ID)
        align          :    "Bl",           // alignment (defaults to "Bl")
        singleClick    :    true,
        step           :    1,
        showsTime      :    '.($time ? 'true' : 'false').',
        time24         :    '.($time == 24 ? 'true' : 'false').'
   });});');

		$html = parent::fetchField($name, $value, $node, $controlName);
		$html .= '<img class="calendar" src="'.JURI::root(true).'/templates/system/images/calendar.png" alt="calendar" id="'.$id.'_img" />';

		return $html;
	}
}