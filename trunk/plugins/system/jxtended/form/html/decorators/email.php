<?php
/**
 * @version		$Id: email.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	(C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Decorates an email link
 *
 * @static
 * @package		JXtended
 * @subpackage	Forms
 */
class JXDecoratorEmail
{
	function render( $value, $text = '', $options = null )
	{
		return JHTML::link( 'mailto:'.$value, ($text ? $text : $value), $options );
	}
}