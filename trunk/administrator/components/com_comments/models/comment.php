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

JTable::addIncludePath( JPATH_COMPONENT_SITE.'/tables' );

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
	 * Internal array to hold comment data access objects by ID.
	 *
	 * @access	private
	 * @var		array
	 */
	var $_items				= array();

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
			$application	= &JFactory::getApplication('administrator');
			$context		= 'com_comments.comment.';

			// load the list state.
			$this->setState('list.ordering', $application->getUserStateFromRequest($context.'list.ordering', 'filter_order', 'a.created_date', 'cmd'));
			$this->setState('list.direction', $application->getUserStateFromRequest($context.'list.direction', 'filter_order_Dir', 'DESC'));
			$this->setState('list.state', $application->getUserStateFromRequest($context.'list.state', 'published', 0));
			$this->setState('list.search', $application->getUserStateFromRequest($context.'list.search', 'search'));

			// load the pagination information.
			$this->setState('limitstart', $application->getUserStateFromRequest($context.'list.offset', 'limitstart', 0, 'int'));
			$this->setState('limit', $application->getUserStateFromRequest($context.'list.limit', 'limit', $application->getCfg('list_limit'), 'int'));

			// load the component configuration parameters.
			$this->setState('config', JComponentHelper::getParams('com_comments'));

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
		$id = (is_null($id)) ? $this->getState('comment.id', 0) : $id;

		// session value takes precedence
		$session = &JFactory::getSession();
		$id = (int) $session->get('comments.comment.id', $id);

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
	 * @return	array	Array list of comment objects
	 * @since	1.0
	 */
	function &getItems()
	{
		if (empty($this->_list)) {

			$state = $this->getState('list.state');
			$stateClause = null;
			if (($state !== null) and ($state !== '*')) {
				$stateClause = ' WHERE a.`published` = '.(int)$state;
			}
			if ($stateClause) {
//				$searchClause = (!empty($this->getState('list.search'))) ? ' AND `name` LIKE '.$this->getState('list.search') : null;
			} else {
//				$searchClause = (!empty($this->getState('list.search'))) ? ' WHERE `name` LIKE '.$this->getState('list.search') : null;
			}

			// generate the list of objects
			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT a.*' .
				' FROM `#__jxcomments_comments` AS a' .
				$stateClause .
				' ORDER BY '.$this->getState('list.ordering').' '.$this->getState('list.direction'),
				$this->getState('limitstart'), $this->getState('limit')
			);
			$this->_list = $db->loadObjectList();

			// get the number of total possible objects
			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT COUNT(a.id)' .
				' FROM `#__jxcomments_comments` AS a' .
				$stateClause
			);
			$this->_total = (int) $db->loadResult();

		}
		return $this->_list;
	}

	/**
	 * Method to return a short list of comment objects in a given context in descending order of date
	 *
	 * @access	public
	 * @return	array	Array list of comment objects in the same context
	 * @since	1.0
	 */
	function &getListByContext()
	{
		if (empty($this->_listByContext)) {
			$item = &$this->getItem();

			// lets get a list of comments
			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT a.*' .
				' FROM `#__jxcomments_comments` AS a' .
				' WHERE a.`context` = '.$db->Quote($item->context) .
				' AND a.`context_id` = '.(int)$item->context_id .
				' AND a.`created_date` < '.$db->Quote($item->created_date) .
				' AND a.`id` != '.(int)$item->id .
				' ORDER BY a.`created_date` DESC',
				0, 5
			);
			$this->_listByContext = $db->loadObjectList();

			if (empty($this->_listByContext)) {
				$this->_listByContext = array();
			}
		}
		return $this->_listByContext;
	}

	/**
	 * Method to return a short list of comment objects with a given author name in descending order of date
	 *
	 * @access	public
	 * @return	array	Array list of comment objects with the same author name
	 * @since	1.0
	 */
	function &getListByName()
	{
		if (empty($this->_listByName)) {
			$item = &$this->getItem();

			// lets get a list of comments with the same author name in descending order of created date
			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT *' .
				' FROM `#__jxcomments_comments`' .
				' WHERE `name` = '.$db->Quote($item->name) .
				' AND `id` != '.(int)$item->id .
				' ORDER BY `created_date` DESC',
				0, 5
			);
			$this->_listByName = $db->loadObjectList();

			if (empty($this->_listByName)) {
				$this->_listByName = array();
			}
		}
		return $this->_listByName;
	}

	/**
	 * Method to return a short list of comment objects with the same IP in descending order of date
	 *
	 * @access	public
	 * @return	array	Array list of comment objects with the same IP
	 * @since	1.0
	 */
	function &getListByIP()
	{
		if (empty($this->_listByIP)) {
			$item = &$this->getItem();

			// lets get a list of comments with the same IP in descending order of created date
			$db = &$this->getDBO();
			$db->setQuery(
				'SELECT *' .
				' FROM `#__jxcomments_comments`' .
				' WHERE `address` = '.$db->Quote($item->address) .
				' AND `id` != '.(int)$item->id .
				' ORDER BY `created_date` DESC',
				0, 5
			);
			$this->_listByIP = $db->loadObjectList();

			if (empty($this->_listByIP)) {
				$this->_listByIP = array();
			}
		}
		return $this->_listByIP;
	}

	/**
	 * Method to return a JXPagination object based on the list data
	 *
	 * @access	public
	 * @return	object	JXPagination object based on the list data
	 * @since	1.0
	 */
	function &getPagination()
	{
		if (empty($this->_pagination)) {

			jximport('jxtended.html.pagination');
			$this->_pagination = new JXPagination( $this->_total, $this->getState('limitstart'), $this->getState('limit'), $this->getState('pagination_mode'));
		}
		return $this->_pagination;
	}

	/**
	 * Method to set the moderation state on a list of comments
	 *
	 * @access	public
	 * @param	array	$ids	The list of {COMMENT_ID}=>{STATE} values to set
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function moderate($ids)
	{
		$db		= &$this->getDBO();
		$config = $this->getState('config');

		$useAkismet= false;
		if ($config->get('enable_akismet')) {
			jximport('jxtended.webservices.akismet');
			$akismet = new JXAkismet(JURI::base(), $config->get('akismet_key'));

			$valid = $akismet->validateAPIKey();
			if ($valid and !JError::isError($valid)) {
				$useAkismet = true;
			} else {
				JError::raiseNotice(500, JText::_('COMMENTS_INVALID_AKISMET_KEY'));
			}
		}

		// iterate over the ids to moderate.
		foreach ($ids as $id => $state)
		{
			$db->setQuery(
				'SELECT *' .
				' FROM `#__jxcomments_comments`' .
				' WHERE `id` = '.(int)$id
			);
			$c = $db->loadObject();

			if (($state == 2) and ($c->published != 2)) {
				// notify Akismet of spam
				if ($useAkismet and is_object($akismet)) {
					// create and populate the comment object
					$comment = new JObject();
					$comment->set('author', $c->name);
					$comment->set('email', $c->email);
					$comment->set('website', $c->url);
					$comment->set('body', $c->body);
					$comment->set('permalink', $c->referer);

					// set the comment to the Akismet handler and set the comment as spam
					$akismet->setComment($comment);
					$akismet->submitSpam();
				}
			} elseif (($state == 1) and ($c->published == 2)) {
				// notify Akismet of ham
				if ($useAkismet and is_object($akismet)) {
					// create and populate the comment object
					$comment = new JObject();
					$comment->set('author', $c->name);
					$comment->set('email', $c->email);
					$comment->set('website', $c->url);
					$comment->set('body', $c->body);
					$comment->set('permalink', $c->referer);

					// set the comment to the Akismet handler and set the comment as spam
					$akismet->setComment($comment);
					$akismet->submitHam();
				}
			}

			// set the actual state of the comment
			$db->setQuery(
				'UPDATE `#__jxcomments_comments`' .
				' SET `published` = '.(int)$state .
				' WHERE `id` = '.(int)$id
			);
			$db->query();
		}
		return true;
	}

	/**
	 * Method to delete a list of comments
	 *
	 * @access	public
	 * @param	array	$ids	A list of comment ids to delete
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function delete($ids=null)
	{
		$ids = (is_array($ids)) ? $ids : $this->getState('comments.ids');

		// make sure we are dealing with integers
		jimport('joomla.utilities.arrayhelper');
		JArrayHelper::toInteger($ids);

		if (!empty($ids)) {

			// implode the post ids over an OR clause
			$ids = implode(' OR `id` = ', $ids);

			// setup query
			$db = &$this->getDBO();
			$db->setQuery(
				'DELETE FROM `#__jxcomments_comments`' .
				' WHERE `id` ='.$ids
			);

			return $db->query();
		}
		return true;
	}

	/**
	 * Empty method for potential future use
	 */
	function checkout($id=null)
	{
		// empty for now
	}

	/**
	 * Empty method for potential future use
	 */
	function checkin($id=null)
	{
		// empty for now
	}

	/**
	 * Method to save a comment in the database
	 *
	 * @access	public
	 * @param	array	$data	The comment row data to store in the database
	 * @return	mixed	True on success or JException object on failure
	 * @since	1.0
	 */
	function save($data = array())
	{
		$result	= true;
		$user	= &JFactory::getUser();
		$config = $this->getState('config');

		// load a table object
		$table = &$this->getTable('comment', 'CommentsTable');
		if (empty($table) or (JError::isError($table))) {
			return JError::raiseWarning( 500, JText::_('COMMENTS_UNABLE_TO_LOAD_TABLE'));
		}

		// load the comment data if it exists
		if (!empty($data['id'])) {
			$table->load($data['id']);
		}

		// save the data
		if (!$table->save($data)) {
			$result	= JError::raiseWarning(500, $table->getError());
		}

		return $result;
	}
}