<?php
/**
 * @version		$Id: ratingmember.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Comments Component Rating/Member Table
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsTableRatingMember extends JTable
{
	/**
	 * @var int
	 */
	var $user_id = null;
	/**
	 * @var varchar
	 */
	var $context = null;
	/**
	 * @var int
	 */
	var $context_id = null;
	/**
	 * @var varchar
	 */
	var $referer = null;
	/**
	 * @var varchar
	 */
	var $page = null;
	/**
	 * @var double
	 */
	var $score = null;
	/**
	 * @var int
	 */
	var $category_id = null;
	/**
	 * @var datetime
	 */
	var $updated_date = null;
	/**
	 * @var varchar
	 */
	var $address = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	object	Database object
	 * @return	void
	 * @since	1.0
	 */
	function __construct(&$db)
	{
		parent::__construct('#__jxcomments_ratings_members', null, $db);
	}

	/**
	 * Method to load a member/rating relationship record
	 *
	 * @access	public
	 * @param	integer	$userId		Joomla! User ID
	 * @param	string	$context	Comment context string
	 * @param	integer	$contextId	Comment context ID
	 * @param	integer	$categoryId	Category ID
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function load($userId, $context, $contextId, $categoryId = 0)
	{
		$db = &$this->getDBO();
		$db->setQuery(
			'SELECT *' .
			' FROM '.$db->NameQuote($this->_tbl) .
			' WHERE `user_id` = ' .(int) $userId .
			' AND `context` = '.$db->Quote( $context ) .
			' AND `context_id` = '.(int) $contextId .
			' AND `category_id` = '.(int) $categoryId
		);

		if ($result = $db->loadAssoc()) {
			return $this->bind($result);
		}
		else
		{
			$this->setError($db->getErrorMsg());
			return false;
		}
	}

	/**
	 * Method to check the current record to save
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function check()
	{
		// get the JXtended Comments configuration object
		$config = &JComponentHelper::getParams('com_comments');

		// validate the comment data
		$result	= false;
		if (empty($this->context)) {
			$this->setError('Context is empty');
		} else if (empty($this->context_id)) {
			$this->setError('Context ID is empty');
		} else {
			$result = true;
		}

		return $result;
	}

	/**
	 * Method to store the current record
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function store()
	{
		// get a database object
		$db = &$this->getDBO();

		// create the query string for formatting
		$fmtsql	= 'REPLACE INTO '.$db->NameQuote($this->_tbl) .
			'( %s ) VALUES ( %s )';

		// populate the fields and values arrays
		$fields = array();
		foreach (get_object_vars($this) as $k => $v)
		{
			// skip over invalid values
			if (is_array($v) or is_object($v) or $v === NULL) {
				continue;
			}

			// skip over internal/private values
			if ($k[0] == '_') {
				continue;
			}

			// quote and add the fields
			$fields[] = $db->nameQuote($k);
			$values[] = $db->isQuoted($k) ? $db->Quote($v) : (int) $v;
		}

		// set and execute the store query
		$db->setQuery(sprintf($fmtsql, implode(',', $fields), implode(',', $values)));
		if (!$db->query()) {
			$this->setError($db->getErrorMsg());
			return false;
		}

		return true;
	}
}