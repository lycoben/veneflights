<?php
/**
 * @version		$Id: dom.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	XML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	XML
 */
class DomXMLIterator extends XMLIterator
{
	function &loadString( $source )
	{
		$dom 		= new DOMDocument;
		$dom->preserveWhitespace = false;
		$dom->loadXML( $source );
		$document	= &$dom->documentElement;

		// Use simple xml for the easy stuff
		$xml		= simplexml_import_dom( $dom );
		return $xml;
	}
}