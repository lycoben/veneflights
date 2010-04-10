<?php
/**
 * @version		$Id: mod_comments_comment.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// if the jxtended libraries are not present exit gracefully
if (!defined('JX_LIBRARIES')) {
	JError::raiseNotice(500, JText::_('JX_LIBRARIES_MISSING'));
	return false;
}

// import library dependencies
require_once (dirname( __FILE__ ).'/view.php');

//JHTML::_( 'behavior.mootools' );
JHTML::_('behavior.formvalidation');

$modView = new CommentsModuleViewComment('mod_comments_comment', $params);
$modView->display();