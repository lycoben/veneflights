<?php
/**
 * @version		$Id: editor.php 81 2008-06-24 21:34:12Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * Textarea form field type object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFieldTypeTextarea_Editor extends JXFieldType
{
   /**
	* Element name
	*
	* @access	protected
	* @var		string
	*/
	var	$_name = 'Textarea_Editor';

	function fetchField($name, $value, &$node, $controlName)
	{
		// editor attribute can be in the form of:
		// editor="desired|alternative"
		if ($editorName = trim( $node->attributes('editor') ))
		{
			$parts	= explode( '|', $editorName );
			$db		= &JFactory::getDBO();
			$query	= 'SELECT element' .
					' FROM #__plugins' .
					' WHERE element	= '.$db->Quote( $parts[0] ) .
					'  AND folder = '.$db->Quote( 'editors' ) .
					'  AND published = 1';
			$db->setQuery( $query );
			if ($db->loadResult()) {
				$editorName	= $parts[0];
			}
			else if (isset( $parts[1] )) {
				$editorName	= $parts[1];
			}
			else {
				$editorName	= '';
			}
			$node->addAttribute( 'editor', $editorName );
		}
		$editor		= &JFactory::getEditor( $editorName ? $editorName : null );
		$rows		= $node->attributes('rows');
		$cols		= $node->attributes('cols');
		$height		= ($node->attributes('height')) ? $node->attributes('height') : '200';
		$width		= ($node->attributes('width')) ? $node->attributes('width') : '100%';
		$class		= ($node->attributes('class') ? 'class="'.$node->attributes('class').'"' : 'class="text_area"');
		$buttons	= $node->attributes('buttons');

		$editor->set( 'TemplateXML',	$node->attributes('templatexml') );
		if ($buttons == 'true') {
			$buttons	= true;
		} else {
			$buttons	= explode( ',', $buttons );
		}
		// convert <br /> tags so they are not visible when editing
		//$value	= str_replace('<br />', "\n", $value);

		return $editor->display( $controlName.'['.$name.']', htmlspecialchars( $value ), $width, $height, $cols, $rows, $buttons ) ;
	}

	function render(&$xmlElement, $value, $controlName = 'jxform')
	{
		$result		= &parent::render( $xmlElement, $value, $controlName );
		$editorName	= trim( $xmlElement->attributes('editor') );
		$result->editor	= &JFactory::getEditor( $editorName ? $editorName : null );
		return $result;
	}
}