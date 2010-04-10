<?php
/**
 * @version		$Id: rating.json.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments rating JSON controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerRating extends CommentsController
{
	/**
	 * Method to add a rating
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
			$this->_returnError(new JException('Request Forbidden', 403));
		}

		$db		= &JFactory::getDBO();
		$user	= &JFactory::getUser();
		$userId	= $user->get('id');
		$config	= &JComponentHelper::getParams('com_comments');

		// load the language file for the rating module
		$lang = &JFactory::getLanguage();
		$lang->load('mod_jxcomments_rating');

		// ensure ratings are enabled
		if ($config->get('enable_ratings') == 0) {
			$this->_returnError(new JException('Ratings disabled', 500));
		}

		// ensure poster is not blocked
		require_once(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'helpers'.DS.'blocked.php');
		if (CommentHelper::isBlockedUser($config)) {
			$this->_returnError(new JException('You are Not Permitted to Comment', 403));
		}
		if (CommentHelper::isBlockedIP($config)) {
			$this->_returnError(new JException('Your IP Address is Blocked', 403));
		}
		if (CommentHelper::isBlockedHost($config)) {
			$this->_returnError(new JException('Your Host is Blocked', 403));
		}

		// get the model
		$model = &$this->getModel('rating');

		// get the data from the request for the rating
		$data = array();
		$data['user_id']		= $userId;
		$data['context']		= JRequest::getCmd('context', '', 'post');
		$data['context_id']		= JRequest::getInt('context_id', 0, 'post');
		$data['score']			= JRequest::getFloat('score', 0, 'post');
		$data['category_id']	= JRequest::getInt('category_id', 0);

		// ensure the score is between 0 and 1
		if (($data['score'] < 0.0) or ($data['score'] > 1.0)) {
			$this->_returnError(new JException('Score value was out of bounds', 500));
		}

		// ensure the user has only voted once per session
		$key = 'rating;'.$data['context'].';'.$data['context_id'];
		if ($mainframe->getUserState($key)) {
			$this->_returnError(new JException('You have already rated this item', 403));
		}
		else {
			$mainframe->setUserState($key, true);
		}

		// add the rating to the database
		$r_id = $model->add($data);
		if (JError::isError($r_id)) {
			$this->_returnError($r_id);
		}

		// get the full rating record object
		$item = &$model->getItem($data['context_id'], $data['context']);

		// create a base response object
		$result	= (object) array('error'=>false);

		// append the scoring data to the response object
		$result->pscore_count	= $item->pscore_count;
		$result->pscore			= $item->pscore;

		// convert the object to JSON.
		jximport( 'jxtended.webservices.json' );
		echo JXJson::encode($result);

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
	function _returnError($e)
	{
		global $mainframe;

		// convert the object to JSON.
		jximport( 'jxtended.webservices.json' );
		echo JXJson::encode((object) array('error'=>true,'message'=>$e->message));

		$mainframe->close();
	}
}