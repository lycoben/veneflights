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
 * Content rating module view for JXtended Comments
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModuleViewRating extends JModuleView
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
		// get some needed variables
		$user	  = &JFactory::getUser();
		$userId	  = $user->get('id');
		$document = &JFactory::getDocument();

		// if sharing is disabled for JXtended comments, do nothing and return
		if ($this->_config->get('enable_ratings') == 0) {
			return false;
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

		// add the appropriate include paths for tables and models
		JModel::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'models');
		JTable::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'tables');

		// get a content rating model instance and set the context in the state
		$model = &JModel::getInstance('Rating', 'CommentsModel', array('ignore_request'=>true));
		$model->setState('context',	$context);
		$model->setState('context_id', $contextId);

		// assign the rating object and state object
		$this->assignRef('rating', $model->getItem());
		$this->assignRef('state', $model->getState());

		// reset the error value for the view
		$this->assign('error', null);

		return true;
	}
}