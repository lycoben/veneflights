<?php
/**
 * @version		$Id: equals.php 49 2008-04-29 00:32:29Z rob.schley $
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
class JXFormValidateEquals
{
	function test( &$field, &$values )
	{
		$result = true;

		if ($field1 = $field->attributes('field'))
		{
			$field12 = $field->attributes( 'name' );
			if ($values->get( $field1 ) != $values->get( $field12 )) {
				$result = false;
			}
		}
		else {
			$result = new JException( 'Field attribute not found to support equals validator' );
		}

		return $result;
	}
}