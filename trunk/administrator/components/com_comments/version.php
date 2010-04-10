<?php
/**
 * @version		$Id: version.php 307 2008-07-15 19:47:01Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * @package		Comments
 */
class CommentsVersion
{
	var $version	= '1.1';

	var $subversion	= '1';

	var $date		= '2008-07-15 00:00:00';

	var $status		= 'Stable';

	var $revision	= '$Revision: 307 $';

	function getBuild()
	{
		return intval( substr( $this->revision, 11 ));
	}
}