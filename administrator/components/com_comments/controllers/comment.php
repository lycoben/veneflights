<?php
/**
 * @version		$Id: comment.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments comment controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerComment extends CommentsController
{
	/**
	 * Controller constructor
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function __construct()
	{
		parent::__construct();
		$this->registerTask('apply', 'save');
	}

	/**
	 * Dummy method to redirect the display method
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function display()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_comments'));
	}

	/**
	 * Method to edit a category
	 *
	 * 	Sets comment ID in the session from the request, checks the item out, and then redirects to the edit page.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function edit()
	{
		$c_id = JRequest::getVar('c_id');
		if (is_array($c_id)) {
			$id = JFilterInput::clean($c_id[0], 'int');
		} else {
			$id = JFilterInput::clean($c_id, 'int');
		}

		if ($id) {
			// Set the session table id and redirect
			$session = &JFactory::getSession();
			$session->set('comments.comment.id', $id);

			// Checkout item
			$model = $this->getModel('comment');
			$model->checkout($id);

			$this->setRedirect(JRoute::_('index.php?option=com_comments&view=comment&layout=edit', false));
		} else {
			$this->setRedirect(JRoute::_('index.php?option=com_comments&view=comments', false));
		}
	}

	/**
	 * Method to cancel an edit
	 *
	 * 	Checks the item in, sets comment ID in the session to null, and then redirects to the list page.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function cancel()
	{
		// Checkin item if checked out
		$session = &JFactory::getSession();
		if ($id = (int)$session->get('comments.comment.id')) {
			$model = $this->getModel('comment');
			$model->checkin($id);
		}

		// Clear the session of the item
		$session->set('comments.comment.id', null);

		$this->setRedirect(JRoute::_('index.php?option=com_comments&view=comments', false));
	}

	/**
	 * Save a comment.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function save()
	{
		// check for request forgeries.
		JRequest::checkToken();

		// get posted form variables.
		$values = JRequest::getVar('jxform', array(), 'post', 'array');
		$post = JRequest::get('post', JREQUEST_ALLOWHTML);

		// handle the post body
		$body = $post['jxform']['body'];

		// make sure that html special characters are encoded in code tags
		function codeEscape($matches)
		{
			return htmlspecialchars($matches[0]);
		}
		$body = preg_replace_callback('/\[code=(.+?)\](.+?)\[\/code\]/is', 'codeEscape', $body);

		// if html is not enabled, then lets filter it out
		$config = &JComponentHelper::getParams('com_comments');
		if (!$config->get('enable_html', 0)) {
			$body = strip_tags($body);
		}

		// reset the body field in the posted values array
		$values['body'] = $body;

		// get the id of the item out of the session.
		$session = &JFactory::getSession();
		$id = (int)$session->get('comments.comment.id');
		$values['id'] = $id;

		// Get the comment model and set the post request in its state.
		$model = &$this->getModel('comment');
		$model->setState('request', JRequest::get('post'));

		// get the items to moderate from the request
		$c_id = JRequest::getVar('moderate', array(), '', 'array');

		// moderate the items if set
		if (is_array($c_id) and !empty($c_id)) {
			// split out the keys and values for the request array so that we can clean them
			$keys = array_keys($c_id);
			$vals = array_values($c_id);

			// clean the keys and values from the request array using JArrayHelper
			jimport('joomla.utilities.arrayhelper');
			JArrayHelper::toInteger($keys);
			JArrayHelper::toInteger($vals);

			// re-initialize the array and build it with cleaned data
			$c_id = array();
			for($i=0,$n=count($keys);$i < $n; $i++)
			{
				$cid[$keys[$i]] = $vals[$i];
			}

			// moderate the items.
			$model->moderate($c_id);
		}

		// save the comment and check for an error state
		$result	= $model->save( $values );
		$msg	= JError::isError( $result ) ? $result->message : 'COMMENTS_SAVED';

		// redirect to the appropriate place based on the task
		if ($this->_task == 'apply') {
			$this->setRedirect(JRoute::_('index.php?option=com_comments&view=comment&layout=edit', false), JText::_($msg));
		} else {
			$session->set('comments.comment.id', null);
			$model->checkin($id);

			$this->setRedirect(JRoute::_('index.php?option=com_comments&view=comments', false), JText::_($msg));
		}
	}

	/**
	 * Delete a set of comments.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function delete()
	{
		// get items to remove from the request.
		$c_id = JRequest::getVar('c_id', array(), '', 'array');
		if (!is_array($c_id) or (count($c_id) < 1)) {
			JError::raiseWarning(500, JText::_('COMMENTS_SELECT_COMMENT_TO_DELETE'));
		} else {
			// get the model.
			$model = &$this->getModel('comment', 'CommentsModel', array('ignore_request'=>true));

			// clean the request array using JArrayHelper
			jimport('joomla.utilities.arrayhelper');
			JArrayHelper::toInteger($c_id);

			// remove the items.
			if(!$model->delete($c_id)) {
				$msg  = JText::_('COMMENTS_UNABLE_TO_REMOVE_COMMENTS');
				$type = 'notice';
			} else {
				$msg  = JText::sprintf('COMMENTS_NUM_REMOVED', count($c_id));
				$type = 'message';
			}
		}

		$this->setRedirect('index.php?option=com_comments&view=comments', $msg, $type);
	}

	/**
	 * Set the moderation state of a set of comments.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function moderate()
	{
		// get the items to moderate from the request
		$c_id = JRequest::getVar('moderate', array(), '', 'array');
		if (!is_array($c_id) or (count($c_id) < 1)) {
			JError::raiseWarning(500, JText::_('COMMENTS_SELECT_COMMENT_TO_MODERATE'));
		} else {
			// Get the model.
			$model = &$this->getModel('comment', 'CommentsModel');

			// split out the keys and values for the request array so that we can clean them
			$keys = array_keys($c_id);
			$vals = array_values($c_id);

			// clean the keys and values from the request array using JArrayHelper
			jimport('joomla.utilities.arrayhelper');
			JArrayHelper::toInteger($keys);
			JArrayHelper::toInteger($vals);

			// re-initialize the array and build it with cleaned data
			$c_id = array();
			for($i=0,$n=count($keys);$i < $n; $i++)
			{
				$c_id[$keys[$i]] = $vals[$i];
			}

			// Publish the items.
			if(!$model->moderate($c_id)) {
				$msg  = JText::_('COMMENTS_UNABLE_TO_MODERATE_COMMENTS');
				$type = 'notice';
			} else {
				$msg  = JText::sprintf('COMMENTS_NUM_MODERATED', count($c_id));
				$type = 'message';
			}
		}

		$this->setRedirect('index.php?option=com_comments&view=comments', $msg, $type);
	}
}