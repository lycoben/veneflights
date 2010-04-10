<?php
/**
 * @version		$Id: color.php 59 2008-05-12 19:54:30Z louis.landry $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;
/**
 * Text form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeText_Color extends JXFieldTypeText
{
   /**
	* Field type
	*
	* @access	protected
	* @var		string
	*/
	var	$_type = 'Text';

	function fetchField($name, $value, &$node, $controlName)
	{
		static $init = null;
		if (!$init)
		{
			global $mainframe;
			$url	= $mainframe->isAdmin() ? '../' : '';
			$doc	=& JFactory::getDocument();
			$doc->addScript( $url.'libraries/jxpro/assets/js/color.js' );
			$init	= true;
		}

		$pickerId = str_replace(']', '', str_replace('[', '_', $controlName.'_'.$name)).'-picker';
		$node->addAttribute( 'onchange', 'relateColor(\''.$pickerId.'\', this.value);' );

		$html = parent::fetchField($name, $value, &$node, $controlName);
		$html .= ' <button type="button" onclick="pickColor(\''.$pickerId.'\')" id="'.$pickerId.'" class="color-picker">...</div>';

		return $html;
	}
}