<?php
/**
 * @version		$Id: rating.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.model');

/**
 * The JXtended Comments rating model
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModelRating extends JModel
{
	/**
	 * Flag to indicate model state initialization.
	 *
	 * @access	protected
	 * @var		boolean
	 */
	var $__state_set		= null;

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
		// if the model state is uninitialized lets set some values we will need from the request.
		if (!$this->__state_set) {

			// load the component configuration parameters.
			$this->setState('config', JComponentHelper::getParams('com_comments'));
		}
		return parent::getState($property,$default);
	}

	/**
	 * Method to return a rating object
	 *
	 * @access	public
	 * @param	mixed	$context_id	NULL to use model state or integer
	 * @param	mixed	$context	NULL to use model state or string
	 * @return	object	rating object
	 * @since	1.0
	 */
	function &getItem($context_id=null, $context=null)
	{
		// get the context id of the item to return.
		$context_id = (int) (is_null($context_id)) ? $this->getState('context_id', 0) : $context_id;
		$context = (string) (is_null($context)) ? $this->getState('context', '') : $context;

		// get a rating table object
		$table = &$this->getTable('rating', 'CommentsTable');
		if (empty($table) or (JError::isError($table))) {
			return new JException(JText::_('COMMENTS_UNABLE_TO_LOAD_TABLE'), 500);
		}

		// load the table and return it
		$table->load($context, $context_id);
		return $table;
	}

	/**
	 * Method to add a rating to the database
	 *
	 * @access	public
	 * @param	array	$data	The rating row data to store in the database
	 * @return	mixed	New rating record ID on success or JException object on failure
	 * @since	1.0
	 */
	function add($data = array())
	{
		$result	= false;
		$user	= &JFactory::getUser();
		$userId	= $user->get('id');
		$config = $this->getState('config');

		// is this a member comment?
		if ($userId > 0)
		{

			// get a member/rating table object
			$table = &$this->getTable('ratingmember', 'CommentsTable');
			if (empty($table) or (JError::isError($table))) {
				return new JException(JText::_('COMMENTS_UNABLE_TO_LOAD_TABLE'), 500);
			}

			// load the row if it exists
			if ($table->load($userId, $data['context'], $data['context_id'], $data['category_id'])) {
				return new JException('You have already rated this item', 403);
			}

			// set the row data fields
			$table->user_id			= $userId;
			$table->context			= $data['context'];
			$table->context_id		= $data['context_id'];
			$table->category_id		= $data['category_id'];
			$table->score			= $data['score'];
			$table->address			= $_SERVER['REMOTE_ADDR'];

			// verify the table object data is valid
			if (!$table->check($config)) {
				return new JException($table->getError(), 500);
			}

			// store the table object
			if (!$table->store()) {
				return new JException($table->getError(), 500);
			}
		}

		// load a rating table object
		$table = &$this->getTable('rating', 'CommentsTable');
		if (empty($table) or (JError::isError($table))) {
			return new JException(JText::_('COMMENTS_UNABLE_TO_LOAD_TABLE'), 500);
		}

		// load the row
		$table->load($data['context'], $data['context_id']);

		// set the row data fields
		$table->context			= $data['context'];
		$table->context_id		= $data['context_id'];
		$table->referer			= JFilterInput::clean($_SERVER['HTTP_REFERER']);
		$table->pscore_total	+= $data['score'];
		$table->pscore_count	+= 1;
		$table->pscore			= $table->pscore_total / $table->pscore_count;

		// set the members only row data fields
		if ($userId > 0) {
			$table->mscore_total	+= $data['score'];
			$table->mscore_count	+= 1;
			$table->mscore			= $table->mscore_total / $table->mscore_count;
		}

		// verify the table object data is valid
		if (!$table->check($config)) {
			return new JException($table->getError(), 500);
		}

		// store the table object
		if (!$table->store()) {
			return new JException($table->getError(), 500);
		}

		return true;
	}
}