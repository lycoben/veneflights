<?php
/**
 * @version		$Id: ratingmember.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jximport( 'jxtended.application.component.model' );
jximport( 'jxtended.database.query' );

/**
 * The JXtended Comments ratingmember model
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModelRatingMember extends JXModel
{
	/**
	 * @return	JTable
	 */
	function &getResource()
	{
		$result = &parent::getResource();
		if ($result == null)
		{
			$result	= JTable::getInstance( 'RatingMember', 'CommentsTable' );
			$this->setResource( $result );
		}
		return $result;
	}

	/**
	 * @return	object
	 */
	function &getItem()
	{
		static $instance;

		if (!$instance)
		{
			$state	= &$this->getState();
			$filters = array(
				'context'		=> $this->getState( 'context' ),
				'context_id'	=> $this->getState( 'context_id' ),
				'user_id'		=> $this->getState( 'user_id' ),
				'category_id'	=> $this->getState( 'category_id' ),
				'limit'			=> 1
			);
			$temp		= $this->getList( $filters, true );
			$instance	= @$temp[0];
		}
		return $instance;
	}

	/**
	 * @param	boolean	True to resolve foreign keys
	 * @return	array	List of items
	 */
	function &getItems( $resolveFKs = true )
	{
		static $instances;

		$state		= &$this->getState();
		$filters	= JArrayHelper::fromObject( $state );
		$hash		= md5( intval( $resolveFKs ).serialize( $filters ) );

		if (!isset( $instances[$hash] ))
		{
			$query				= $this->_getListQuery( $filters, $resolveFKs );
			$sql				= $query->toString();
			$this->_total		= $this->_getListCount( $sql );
			$result				= $this->_getList( $sql, $state->get( 'limitstart' ), $state->get( 'limit' ));
			$instances[$hash]	= $result;
		}
		else
		{
			// TODO: Ideal for true caching
			$result			= $instances[$hash];
		}

		return $result;
	}

	/**
	 * Gets a list of categories objects
	 *
	 * Filters may be fields|published|order by|searchName|where
	 * @param array Named array of field-value filters
	 * @param boolean True if foreign keys are to be resolved
	 */
	function _getListQuery( $filters, $resolveFKs=false )
	{
		$context	= @$filters['context'];
		$contextId	= @$filters['context_id'];
		$userId		= @$filters['user_id'];
		$categoryId	= @$filters['category_id'];

		// arbitrary where
		$select		= @$filters['select'];
		$where		= @$filters['where'];
		$orderBy	= @$filters['order by'];

		$db	= &$this->getDBO();
		$qb	= new JXQuery;

		$qb->select( $select !== null ? $select : 'a.*'  );
		$qb->from( '#__jxcomments_ratings_members AS a' );

		//if ($resolveFKs)
		//{
		//}

		// options
		if ($userId !== null) {
			$qb->where( 'a.user_id = ' . (int) $userId );
		}

		if ($context !== null) {
			$qb->where( 'a.context = ' . $db->Quote( $context ) );
		}

		if ($contextId !== null) {
			$qb->where( 'a.context_id = ' . (int) $contextId );
		}

		if ($categoryId !== null) {
			$qb->where( 'a.category_id = ' . (int) $categoryId );
		}

		if ($where) {
			$qb->where( $where );
		}

		if ($orderBy) {
			$qb->order( $this->_db->getEscaped( $orderBy ) );
		}

		//echo str_replace('#__','jos_',nl2br($qb->toString()));
		return $qb;
	}
}