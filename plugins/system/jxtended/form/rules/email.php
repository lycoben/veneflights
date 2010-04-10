<?php
/**
 * @version		$Id: email.php 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	Forms
 * @static
 */
class JXFormValidateEmail extends JXFormValidatorRegex
{
	var $_regex = '[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}';
}