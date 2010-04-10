<?php
/**
 * @version		$Id: comment.json.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments comment JSON controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerComment extends CommentsController
{
	/**
	 * Method to add a comment
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function add()
	{
		global $mainframe;

		// perform token check to prevent spoofing and CSRF
		if (!JRequest::checkToken()) {
			JError::raiseError(500, JText::_('Invalid Token', true));
			return false;
		}

		$db		= &JFactory::getDBO();
		$user	= &JFactory::getUser();
		$userId	= $user->get('id');
		$config	= &JComponentHelper::getParams('com_comments');

		// load the language file for the comment module
		$lang = &JFactory::getLanguage();
		$lang->load('mod_jxcomments_comment');

		// Check comments enabled
		if ($config->get('enable_comments') == 0) {
			JError::raiseError(500, JText::_('Comments disabled', true));
			return false;
		}

		// Check blocking
		require_once(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'helpers'.DS.'blocked.php');

		if (CommentHelper::isBlockedUser($config)) {
			JError::raiseError(403, JText::_('You are Not Permitted to Comment', true));
			return false;
		}
		if (CommentHelper::isBlockedIP($config)) {
			JError::raiseError(403, JText::_('Your IP Address is Blocked', true));
			return false;
		}
		if (CommentHelper::isBlockedHost($config)) {
			JError::raiseError(403, JText::_('Your Host is Blocked', true));
			return false;
		}

		// Check guest commenting
		if ($userId == 0 && $config->get('guestcomment') == 0) {
			JError::raiseError(403, JText::_('Must be logged in to comment', true));
			return false;
		}

		// get the data from the request for the comment record
		$data = array();
		$data['user_id']	= $userId;
		$data['context']	= JRequest::getCmd('context', '', 'post');
		$data['context_id']	= JRequest::getInt('context_id', 0, 'post');
		$data['name']		= $userId ? $user->get('name') : JRequest::getString('name', '', 'post');
		$data['url']		= JRequest::getString('url', '', 'post');
		$data['subject']	= JRequest::getString('subject', '', 'post');
		$data['email']		= $userId ? $user->get('email') : JRequest::getString('email', '', 'post');
		$data['address']	= $_SERVER['REMOTE_ADDR'];

		$session = &JFactory::getSession();
		$data['referer']	= $session->get('comments.current.url', JFilterInput::clean($_SERVER['HTTP_REFERER']));

		$data['body']		= JRequest::getVar('body', '', 'post', 'string', JREQUEST_ALLOWHTML);
		// make sure that html special characters are encoded in code tags
		function codeEscape($matches)
		{
			return htmlspecialchars($matches[0]);
		}
		$data['body'] = preg_replace_callback('/\[code(.+?)\](.+?)\[\/code\]/is', 'codeEscape', $data['body']);
		// if html is not enabled, then lets filter it out
		$config = &JComponentHelper::getParams('com_comments');
		if (!$config->get('enable_html', 0)) {
			$data['body'] = strip_tags($data['body']);
		}

		// Get the model.
		$model = &$this->getModel('comment');
		$model->setState('list.context',	$data['context']);
		$model->setState('list.context_id',	$data['context_id']);
		$model->setState('list.state', 1);

		// check flood protection
		if ($model->isCommentFlood()) {
			JError::raiseError(403, JText::_('You cannot post again so soon', true));
			return false;
		}

		// set the create time to right now
		$now = &JFactory::getDate();
		$data['created_date'] = $now->toMySQL();

		// add the comment to the database
		$c_id = $model->add($data);
		if (JError::isError($c_id)) {
			JError::raiseError(500, $c_id->getMessage());
			return false;
		}

		// get the full comment record object for the recently inserted comment
		$item = &$model->getItem($c_id);

		// create a base response object
		$result	= (object) array('error'=>false, 'id'=>$item->id, 'total'=>$model->getTotal());

		// if the comment was set for moderation, populate the response body with an explanation
		if ($item->published == 0)
		{
			// comment is set for manual moderation
			$result->body = JText::_('COMMENTS_DISPLAY_UPON_APPROVAL', true);
		} elseif ($item->published == 2)
		{
			// spam *sigh*
			$result->body = JText::_('COMMENTS_FLAGGED_AS_SPAM', true);
		}

		// notify of a new comment being posted if enabled
		$notification = $config->get('notify_comments');
		if (($notification == 1 and $userId == 0) or $notification == 2) {
			// send the comment notification
			$model->sendCommentNotification($item);
		}

		// if the comment is to be published, populate the response body with the rendered comment
		if ($item->published == 1) {
			// get the rendered comment
			$result->body = $model->getRenderedComment($item);
		}

		// convert the object to JSON.
		jximport('jxtended.webservices.json');
		echo JXJson::encode($result);

		$mainframe->close();
	}

	function getComments()
	{

	}

	function getForm()
	{
		global $mainframe;

		// create a base response object
		$result	= (object) array('error'=>false, 'body'=>'');

		// get the comment context information from the request
		$context = JRequest::getWord('context', 'content');
		$context_id = JRequest::getInt('context_id', 0);

		// get the module object
		$module	= JModuleHelper::getModule('mod_comments_comment');
		$module->params	= "context=".$context."\ncontext_id=".$context_id."\nlayout=form";

		// get the document renderer object for a module
		$document = &JFactory::getDocument();
		$renderer = $document->loadRenderer('module');

		// render the module
		$options = array('style'=>'raw');
		$result->body = $renderer->render($module, $options);

		// convert the object to JSON.
		jximport('jxtended.webservices.json');
		echo JXJson::encode($result);
//		echo $result->body;

		$mainframe->close();
	}

	/**
	 * Method to display a JSON error object
	 *
	 * @access	private
	 * @param	object	$e	JException object
	 * @return	void
	 * @since	1.0
	 */
	function handleError($e)
	{
		// Send a 500 error code response.
		JResponse::setHeader('status', $e->getCode());
		JResponse::sendHeaders();

		// Convert the exception to JSON.
		jximport('jxtended.webservices.json');
		echo JXJson::encode((object) array('error'=>true, 'message'=>$e->getMessage()));

		$app = &JFactory::getApplication();
		$app->close();
	}
}

// This needs to be AFTER the class declaration because of PHP 5.1.
JError::setErrorHandling(E_ALL, 'callback', array('CommentsControllerComment', 'handleError'));