<?php
/**
 * @version		$Id: view.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jximport('jxtended.application.module.view');

/**
 * Content comments module view for JXtended Comments
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModuleViewComment extends JModuleView
{
	/**
	 * View constructor
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function __construct($name, &$params)
	{
		// get some needed variables
		$this->_config = &JComponentHelper::getParams('com_comments');

		// call the parent constructor
		parent::__construct($name, $params);
	}

	/**
	 * Method to initialize all of the necessary variables for module rendering
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function init()
	{
		$user	  = &JFactory::getUser();
		$userId	  = $user->get('id');
		$document = &JFactory::getDocument();

		// if comments are disabled for JXtended comments, do nothing and return
		if ($this->_config->get('enable_comments') == 0) {
			return false;
		}

		if ($this->_config->get('enable_bbcode', 1)) {
			// instantiate bbcode parser object
			jximport('jxtended.html.bbcode');
			$this->_bbcode = &JXBBCode::getInstance(array('smileyPath' => JURI::base().'/media/jxtended/img/smilies/'));
		}

		// initialize context variables
		$context	= 'error';
		$contextId	= 0;

		// if the autodetect context parameter is set, let's use it
		if ($this->params->get('autodetect')) {
			// get the application object to retrieve the context
			$application = &JFactory::getApplication('site');

			// assumption is that if a global context is set, it is atomic
			$context	= (string) $application->get('jx.context', $context);
			$contextId	= (string) $application->get('jx.context_id', $contextId);
		}

		// if module parameters set the context, they always win
		$context	= $this->params->get('context',	$context);
		$contextId	= $this->params->get('context_id', $contextId);

		// if we do not have a context set, then lets exit gracefully
		if (($context == 'error') and ($contextId == 0)) {
			return false;
		}

		// import the JXtended Comments blocked helper
		require_once(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'helpers'.DS.'blocked.php');

		// add the appropriate include paths for models
		JModel::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'models');

		// get a content comments model instance and set the context in the state
		$model = &JModel::getInstance('Comment', 'CommentsModel', array('ignore_request'=>true));
		$model->setState('list.context', $context);
		$model->setState('list.context_id', $contextId);
		$model->setState('list.state', 1);
		$model->setState('list.ordering', 'a.id');
		$model->setState('limit',	$this->params->get('limit', 5));

		// assign the comments, state and user objects
		$this->assignRef('items', $model->getItems(true));
		$this->assignRef('total', $model->getTotal());
		$this->assignRef('pagination', $model->getPagination());
		$this->assignRef('state', $model->getState());
		$this->assignRef('user', $user);

		// initialize some defaults for the view
		$this->assign('error', null);
		$this->assign('captcha', null);
		$this->assign('recaptcha', null);
		$this->assign('recaptchaKey', null);

		// run some tests to see if the comment submission should be blocked
		$blocked = (CommentHelper::isBlockedUser($this->_config) or CommentHelper::isBlockedIP($this->_config));

		// are we using CAPTCHA?
		$configCaptcha = $this->_config->get('captcha');
		if (!$blocked and ($configCaptcha == 2 or ($configCaptcha == 1 and $userId == 0)))
		{
			if ($this->_config->get('enable_recaptcha')) {
				// build and set the reCAPTCHA test
				jximport('jxtended.webservices.recaptcha');
				$recaptcha = JXRecaptcha::getInstance();

				// set the API keys for reCAPTCHA
				$recaptcha->setKeyPair($this->_config->get('recaptcha_public'), $this->_config->get('recaptcha_private'));
				$this->assign('recaptchaKey', $this->_config->get('recaptcha_public'));

				// render the reCAPTCHA output based on if the current URI is SSL encrypted or not
				$uri = &JFactory::getURI();
				$recaptcha->injectHeadScript($uri->isSSL());
				$this->assign('recaptcha', '<div id="recaptchaContainer">&nbsp;</div>');
			} else {
				// build and set the built-in CAPTCHA test
				jximport('jxtended.captcha.captcha');
				// TODO: Get the tmp dir from the application
				$options = array('direct' => true);
				$captcha = &JXCaptcha::getInstance('image', $options);

				// test and initialize the CAPTCHA object
				if (!$captcha->test() or !$captcha->initialize())
				{
					// either the test failed or the object could not initialize, raise an error and return
					JError::raiseWarning(500, $captcha->getError());
					$document = &JFactory::getDocument();
					echo $document->getBuffer('message');
					return false;
				}

				// create a CAPTCHA test and set the object into the view
				if (is_array($return = $captcha->generateId())) {
					$this->assignRef( 'captcha', $return );
				}
			}
		}

		// set the date format for display
		jimport('joomla.utilities.date');
		$this->assign('dFormat', $this->_config->get('dformat', '%c'));

		// set some remaining values for the view
		$this->assign('numItems', count($this->items));
		$this->assign('blocked', $blocked);

		// will be more useful in the future
		$this->params->def('showForm', 1);

		// if we are viewing the standard comments layout, then lets set the current url
		if ($this->params->get('layout', 'default') == 'default') {
			$uri = &JURI::getInstance();
			$currentURL = $uri->toString( array('scheme', 'host', 'port', 'path', 'query'));
			$session = &JFactory::getSession();
			$session->set('comments.current.url', $currentURL);
		}

		return true;
	}

	function preprocess($input)
	{
		if ($this->_config->get('enable_bbcode', 1) and empty($this->_bbcode)) {
			// instantiate bbcode parser object
			jximport('jxtended.html.bbcode');
			$this->_bbcode = &JXBBCode::getInstance();
		}

		if ($this->_config->get('enable_bbcode', 1) and !empty($this->_bbcode)) {
			// process bbcode
			$input = $this->_bbcode->parse($input);
		}

		return $input;
	}
}