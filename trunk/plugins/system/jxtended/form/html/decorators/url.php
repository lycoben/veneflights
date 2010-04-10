<?php
/**
 * @version		$Id: url.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	(C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Decorates a URL link
 *
 * If the http prefix is not supplied, one will be added
 *
 * @static
 * @package		JXtended
 * @subpackage	Forms
 */
class JXDecoratorUrl
{
	function render( $value, $text = '', $options = null )
	{
		if (strpos( $value, 'http' ) !== 0) {
			$value = 'http://'.$value;
		}
		return JHTML::link( $value, ($text ? $text : $value), $options );
	}
}