<?php
/**
 * @version		$Id: helper.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Database
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Database Helper Class
 *
 * @package		JXtended
 * @subpackage	Database
 */
class JXDatabaseHelper
{
	/**
	 * Instantiate a query object
	 */
	function &getQuery()
	{
		if (!class_exists( 'JXQuery' )) {
			jximport( 'jxtended.database.query' );
		}
		$query = new JXQuery;
		return $query;
	}
}