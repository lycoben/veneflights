<?php
/**
 * @version		$Id: comment.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.model');

/**
 * The JXtended Comments comment model
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModelComment extends JModel
{
	/**
	 * Flag to indicate model state initialization.
	 *
	 * @access	protected
	 * @var		boolean
	 */
	var $__state_set		= null;

	/**
	 * Container for comment data objects.
	 *
	 * @access	private
	 * @var		array
	 */
	var $_items				= array();

	/**
	 * Container for comment total data.
	 *
	 * @access	private
	 * @var		integer
	 */
	var $_total				= null;

	/**
	 * Container for the items whereby clause.
	 *
	 * @access	private
	 * @var		string
	 */
	var $_whereby			= null;

	/**
	 * Overridden getState method to allow autopopulating of model state by the request.
	 *
	 * @access	public
	 * @param	mixed	$property	The name of the property to return from the state or NULL to return the state
	 * @param	mixed	$default	The default value to return if the property is not set
	 * @return	mixed	The value by name from the state or the state itself
	 * @since	1.0
	 */
	function getState($property=null, $default=null)
	{
		if (!$this->__state_set) {
			$application	= &JFactory::getApplication('site');
			$context		= 'com_comments.comment.';

			// Load the component configuration parameters.
			$this->setState('config', JComponentHelper::getParams('com_comments'));

			// Compute the list start offset.
			$page	= $application->getUserStateFromRequest($context.'list.page', 'comments_page', 0, 'int');
			$start	= intval(($page) ? (($page - 1) * $this->_state->config->get('pagination', 0)) : 0);

			// Load the pagination information.
			$this->setState('list.direction',	$this->_state->config->get('list_order', 'ASC'));
			$this->setState('list.limit',		$this->_state->config->get('pagination', 0));
			$this->setState('list.start',		$start);

			// get the comment id(s) from the request
			$c_id = JRequest::getVar('c_id');
			if (is_array($c_id)) {
				jimport('joomla.utilities.arrayhelper');
				JArrayHelper::toInteger($c_id);
				$this->setState('comment.ids', $c_id);
				$this->setState('comment.id', JFilterInput::clean($c_id[0], 'int'));
			} else {
				$this->setState('comment.id', JFilterInput::clean($c_id, 'int'));
			}
		}
		return parent::getState($property,$default);
	}

	/**
	 * Method to return a comment object
	 *
	 * @access	public
	 * @param	mixed	$id	NULL to use the $_SESSION or $_REQUEST values or integer to directly declare the comment id
	 * @return	object	Comment object
	 * @since	1.0
	 */
	function &getItem($id=null)
	{
		// get the id of the item to return.
		$id = (int) (is_null($id)) ? $this->getState('comment.id', 0) : $id;

		// if the item has not already been retrieved, get it.
		if (empty($this->_items[$id])) {

			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT a.*' .
				' FROM `#__jxcomments_comments` AS a' .
				' WHERE a.`id` = '.$id
			);
			$this->_items[$id] = $db->loadObject();

			if (empty($this->_items[$id])) {
				// TODO: raise a warning of sorts or return a JException
				$this->_items[$id] = (object) array();
			}
		}
		return $this->_items[$id];
	}

	/**
	 * Method to return a list of comment objects
	 *
	 * @access	public
	 * @param	boolean	$new	Force a new list to be created if one already exists
	 * @return	array	Array list of comment objects
	 * @since	1.0
	 */
	function &getItems($new = false)
	{
		if (!empty($this->_list) && !$new) {
			return $this->_list;
		}

		$false		= false;
		$ordering	= $this->getState('list.ordering');
		$direction	= $this->getState('list.direction');
		$start		= (int)$this->getState('list.start');
		$limit		= (int)$this->getState('list.limit');

		// Build the query to get the items.
		$query	= 'SELECT a.*'
				. ' FROM `#__jxcomments_comments` AS a'
				. $this->_getItemsQueryWhere()
				. ' ORDER BY '.$ordering.' '.$direction;

		$this->_db->setQuery($query, $start, $limit);
		$items = $this->_db->loadObjectList();

		// Check for a database error.
		if ($this->_db->getErrorNum()) {
			$this->setError($this->_db->getErrorMsg());
			return $false;
		}

		$this->_list = $items;

		return $this->_list;
	}

	/**
	 * Method to return the total number of comments based on the list data.
	 *
	 * @access	public
	 * @return	integer	The total number of comments based on the list data
	 * @since	1.0
	 */
	function getTotal()
	{
		// Only load the data once.
		if ($this->_total !== null) {
			return $this->_total;
		}

		// Build the query to get the total item count.
		$query	= 'SELECT COUNT(a.id)'
				. ' FROM `#__jxcomments_comments` AS a'
				. $this->_getItemsQueryWhere();

		$this->_db->setQuery($query, 0, 1);
		$return = $this->_db->loadResult();

		// Check for a database error.
		if ($this->_db->getErrorNum()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		$this->_total = (int)$return;

		return $this->_total;
	}

	/**
	 * Method to return a JXPagination object based on the list data
	 *
	 * @access	public
	 * @param	boolean	$new	Force a new list to be created if one already exists
	 * @return	object	JXPagination object based on the list data
	 * @since	1.0
	 */
	function &getPagination($new = false)
	{
		if (empty($this->_pagination) or $new) {
			// generate the JXPagination object
			jximport('jxtended.html.pagination');
			$this->_pagination = new JXPagination($this->getTotal(), $this->getState('list.start'), $this->getState('list.limit'), $this->getState('pagination_mode'));
			$this->_pagination->setRequestVariable('comments_page', 1);
		}
		return $this->_pagination;
	}

	/**
	 * Method to add a comment to the database
	 *
	 * @access	public
	 * @param	array	$data	The comment row data to store in the database
	 * @return	mixed	New comment record ID on success or JException object on failure
	 * @since	1.0
	 */
	function add($data = array())
	{
		global $mainframe;

		$result	= false;
		$user	= &JFactory::getUser();
		$userId	= $user->get('id');
		$config = $this->getState('config');

		// load a table object
		$table = &$this->getTable('comment', 'CommentsTable');
		if (empty($table) or (JError::isError($table))) {
			return new JException(JText::_('COMMENTS_UNABLE_TO_LOAD_TABLE'), 500);
		}

		// bind the posted data to the table object
		if (!$table->bind($data)) {
			return new JException(JText::_('COMMENTS_UNABLE_TO_BIND_COMMENT_DATA'), 500);
		}

		// set the moderation/publishing state
		$moderation	= $config->get('moderate_comments');
		if (($moderation == 1 and $userId == 0) or $moderation == 2) {
			$table->published = 0;
		} else {
			$table->published = 1;
		}

		/*
		 * AKISMET SECTION
		 */

		// if the post is not set to be already published and AKISMET is enabled, lets check it
		if (($table->published == 0) and ($config->get('enable_akismet'))) {
			// get an AKISMET object
			jximport('jxtended.webservices.akismet');
			$akismet = new JXAkismet(JURI::base(), $config->get('akismet_key'));

			// don't do anything if the API key isn't valid
			$valid = $akismet->validateAPIKey();
			if ($valid and !JError::isError($valid)) {

				// create and populate the comment object
				$comment = new JObject();
				$comment->set('author', $table->name);
				$comment->set('email', $table->email);
				$comment->set('website', $table->url);
				$comment->set('body', $table->body);
				$comment->set('permalink', $table->referer);

				// set the comment to the AKISMET handler
				$akismet->setComment($comment);

				// if AKISMET reports the post as spam, set it as such
				if ($akismet->isSpam()) {
					$table->published = 2;
				}
			}
		}

		/*
		 * END OF AKISMET SECTION
		 */

		// make sure all the comment record data is valid
		if (!$table->check()) {
			return new JException($table->getError(), 500);
		}

		/*
		 * CAPTCHA SECTION
		 */

		// do the CAPTCHA validation after the check so the user has a chance to resubmit if an error is caught
		$configCaptcha	= $config->get('captcha');
		if ($configCaptcha == 2 or ($configCaptcha == 1 and $userId == 0))
		{
			// should we be using reCAPTCHA?
			if ($config->get('enable_recaptcha')) {
				// get a reCAPTCHA object
				jximport('jxtended.webservices.recaptcha');
				$recaptcha = JXRecaptcha::getInstance();

				// set the API keys for reCAPTCHA
				$recaptcha->setKeyPair($config->get('recaptcha_public'), $config->get('recaptcha_private'));

				// validate the captcha
				if (!$recaptcha->checkCaptcha()) {
					return new JException('reCAPTCHA validation failed', 403);
				}
			} else {
				// get a CAPTCHA object
				jximport('jxtended.captcha.captcha');
				// TODO: use a better folder
				$options = array('filePath' => JPATH_SITE.DS.'tmp');
				$captcha = &JXCaptcha::getInstance('image', $options);

				// get the list of CAPTCHA tests from the session and verify that they do exist
				$captchas = $mainframe->getUserState('jxcaptcha.captcha');
				if (empty($captchas)) {
					return new JException('Captcha image has gone stale', 500);
				}

				// get the post fields from the request
				$post = JRequest::get('post');

				// iterate over the CAPTCHA tests from the session to validate them
				foreach ($captchas as $item)
				{
					// make sure that something was posted for this CAPTCHA test
					if (isset($post[$item['id']])) {
						// make sure that the posted value passes CAPTCHA validation for the test
						if (!$captcha->validate($item['id'], $post[$item['id']], false)) {
							return new JException('Captcha validation failed', 403);
						}
					}
				}
				$captcha->clean();
			}
		}

		/*
		 * END OF CAPTCHA SECTION
		 */

		// save the data
		if (!$table->save($data)) {
			$result	= new JException($table->getError(), 500);
		} else {
			$result = $table->id;
		}

		return $result;
	}

	/**
	 * Method to send a notification email about a comment being posted
	 *
	 * @access	public
	 * @param	object	$item	The comment record notify about
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function sendCommentNotification($item)
	{
		// get the application object and component configuration object
		$application = &JFactory::getApplication();
		$config = &JComponentHelper::getParams('com_comments');

		// wrap the comment record object in a JObject
		$comment = new JObject();
		$comment->setProperties($item);

		// generate the email from a template and the comment object
		jximport('jxtended.utilities.template');
		$template = new JXTemplate();
		$template->setBody(
			'Date:    {CREATED_DATE}
			Context: {CONTEXT}/{CONTEXT_ID}
			Referer: {REFERER}
			Address: {ADDRESS}
			------------
			From:    {NAME}
			URL:     {URL}
			Email:   {EMAIL}
			Message:
			------------
			{BODY}
			------------'
		);
		$template->mergeObject($comment);

		// setup the email fields
		$mailfrom 	= $application->getCfg('mailfrom');
		$fromname 	= $application->getCfg('fromname');

		$subject 	= html_entity_decode('New comment at '.$application->getCfg('sitename'), ENT_QUOTES);
		$message 	= html_entity_decode($template->getBody(), ENT_QUOTES);
		$email		= $config->get('emailto');

		// send the mail
		return JUtility::sendMail($mailfrom, $fromname, $email, $subject, $message);
	}

	/**
	 * Method to get a comment rendered out as if in the module
	 *
	 * @access	public
	 * @param	object	$item	The comment record to render
	 * @return	string	Rendered output of a comment
	 * @since	1.0
	 */
	function getRenderedComment($item)
	{
		// get the path to the module view and make sure the file exist
		$path	= JPATH_SITE.DS.'modules'.DS.'mod_comments_comment'.DS.'view.php';
		$lang	= &JFactory::getLanguage();

		if (file_exists($path))
		{
			// Load the language file.
			$lang->load('mod_comments_comment');

			jimport('joomla.application.module.helper');

			// setup the view
			require_once($path);
			$params		= new JParameter('');
			$modView	= new CommentsModuleViewComment('mod_comments_comment', $params);
			$modView->assignRef('item', $item);

			jimport('joomla.utilities.date');
			$modView->assign('dFormat', $params->get('dformat', '%c'));

			// render the view and return the output
			return $modView->loadTemplate('comment');
		}
		else {
			// no view found, just return the comment body
			return $item->body;
		}
	}

	/**
	 * Method to determine if the post is considered part of a post flood
	 *
	 * @access	public
	 * @return	boolean	True if a flood
	 * @since	1.0
	 */
	function isCommentFlood()
	{
		// get some needed objects and variables
		$db		= &$this->getDBO();
		$user	= &JFactory::getUser();
		$userId	= $user->get('id');
		$config = &JComponentHelper::getParams('com_comments');

		// get the unix timestamp of the most recent comment with the poster's IP
		$db->setQuery(
			'SELECT UNIX_TIMESTAMP(`created_date`)' .
			' FROM `#__jxcomments_comments`' .
			' WHERE `address` = '.$db->Quote($_SERVER['REMOTE_ADDR']) .
			' ORDER BY `created_date` DESC',
			0, 1
		);
		//$lastAnonPost = $db->loadResult();

		// get the unix timestamp of the most recent comment by the given user
		$db->setQuery(
			'SELECT UNIX_TIMESTAMP(`created_date`)' .
			' FROM `#__jxcomments_comments`' .
			' WHERE `user_id` = '.(int) $userId .
			' ORDER BY `created_date` DESC',
			0, 1
		);
		$lastUserPost = $db->loadResult();

		// get the last post from the user id
		if ($lastUserPost)
		{
			// get some date objects
			$dateNow	= &JFactory::getDate();
			$datePost	= &JFactory::getDate($lastUserPost);

			// how long has it been between now and the last post?
			$diff = $dateNow->toUnix() - $datePost->toUnix();
			if ($userId)
			{
				if ($diff < ($s = $config->get('flooduser'))) {
					return true;
				}
			}
			else if ($diff < ($s = $config->get('floodany'))) {
				return true;
			}
		}

		return false;
	}

	function _getItemsQueryWhere()
	{
		if ($this->_whereby) {
			return $this->_whereby;
		}

		$wheres		= array();
		$state		= $this->getState('list.state', 1);
		$context	= $this->getState('list.context');
		$context_id	= $this->getState('list.context_id');

		// Handle a state filter.
		if (($state !== null) && ($state !== '*')) {
			$wheres[] = 'a.`published` = '.(int)$state;
		}

		// Handle a context filter.
		if ($context) {
			$wheres[] = '`context` = '.$this->_db->Quote($context);
		}

		// Handle a context id filter.
		if ($context_id) {
			$wheres[] = '`context_id` = '.(int)$context_id;
		}

		if (count($wheres)) {
			$this->_whereby = ' WHERE '.implode(' AND ', $wheres);
		}

		return $this->_whereby;
	}
}