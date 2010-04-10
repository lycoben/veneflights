<?php
/**
 * @version		$Id: manager.php 10381 2008-06-01 03:35:53Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Weblinks Component Weblink Model
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class YOS_ammap_ModelAmmap extends JModel
{
	/**
	 * amMap data array
	 *
	 * @var array
	 */
	var $_data = null;	

	/**
	 * uri total
	 *
	 * @var integer
	 */
	var $_total = null;

	/**
	 * Pagination object
	 *
	 * @var object
	 */
	var $_pagination = null;

	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();

		global $mainframe;				

		//get the number of events from database
		$option				= JRequest::getCmd( 'option' );
		//$context			= 'com_content.viewcontent';
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'.ammap.filter_order', 		'filter_order', 	'c.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'.ammap.filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		$filter_state		= $mainframe->getUserStateFromRequest( $option.'.ammap.filter_state',		'filter_state',		'',	'word' );	
		$search 			= $mainframe->getUserStateFromRequest( $option.'.ammap.search', 			'search', 			'',				'string' );
		$search 			= JString::strtolower( $search );
	
		$limit				= $mainframe->getUserStateFromRequest($option.'.ammap.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest($option.'.ammap.limitstart', 'limitstart', 0, 'int');
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		$this->setState('search', $search);
		$this->setState('filter_state', $filter_state);

		// Get the filter request variables
		$this->setState('filter_order', $filter_order);
		$this->setState('filter_order_dir', $filter_order_Dir);
	}
	
	function getTotal()
	{
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}

		return $this->_total;
	}
	
	function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
	
	
	function getData(){
		$pop	= JRequest::getBool('pop');
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();

			if ($pop) {
				$this->_data = $this->_getList( $query );
			} else {
				$this->_data = $this->_getList( $query, $this->getState('limitstart'), $this->getState('limit') );
			}
		}

		return $this->_data;
	}
	
	function _buildQuery(){
		// Get the WHERE and ORDER BY clauses for the query
		$where		= $this->_buildWhere();
		$orderby	= $this->_buildOrderBy();

		//Get Events from Database
		$query = 'SELECT c.*, u.id as userid, u.name as username 
						FROM #__yos_maps as c 
						INNER JOIN #__users as u on c.created_by = u.id '
				. $where
				. $orderby
				;
		return $query;		
	}
	
	function _buildWhere( )
	{		
		
		$db					=& JFactory::getDBO();
		$filter_state		=$this->getState('filter_state');
		$search				=$this->getState('search');
		$where = array();

		if ( $search ) {
			$where[] = 'c.title LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}	
		if ( $filter_state ) {
			if ( $filter_state == 'P' ) {
				$where[] = 'c.published = 1';
			} else if ($filter_state == 'U' ) {
				$where[] = 'c.published = 0';
			}
		}		
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
					
		return $where;
	}
	
	function _buildOrderBy()
	{
		$filter_order		=	$this->getState('filter_order');
		$filter_order_Dir	=	$this->getState('filter_order_dir');
		
		if ($filter_order == 'c.ordering'){
			$orderby 	= ' ORDER BY c.ordering';
		} else {
			$orderby 	= ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', c.ordering';
		}
		
		return $orderby;
	}
	
	function getLists(){
		
		// state filter
		$lists['state'] = JHTML::_('grid.state', $this->getState('filter_state'), 'Published', 'Unpublished');
		
		// table ordering
		$lists['order_Dir']	= $this->getState('filter_order_dir');
		$lists['order']		= $this->getState('filter_order');
		
		// search filter
		$lists['search']= $this->getState('search');
		return $lists;
	}
	
	function getDataEdit($edit){		
		global $mainframe;
		
		// Initialize variables
		$db			=& JFactory::getDBO();
		$user 		=& JFactory::getUser();
		$uid		= $user->get('id');
		$option		= JRequest::getCmd( 'option' );
		$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );
	
		JArrayHelper::toInteger($cid, array(0));		
	
		$row =& JTable::getInstance('yos_AmMap','Table');
		// load the row from the db table
		if ($edit)
			$row->load( $cid[0] );
	
		// fail if checked out not by 'me'
		if ( JTable::isCheckedOut($user->get ('id'), $row->checked_out )) {
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'The amMap' ), $row->title );
			$mainframe->redirect( "index.php?option=$option&task=ammaps", $msg );
		}
		
		if ( $edit ) {
			$row->checkout( $user->get('id'));
		} else {
			$row->published 	= 1;
			$row->timeout		= 30;
		}	
		
		return $row;		
	}
	
	function getEditLists($row, $edit){
		
		$db			=	&JFactory::getDBO();
		
		$cid		= JRequest::getVar( 'cid', array(0), '', 'array' );
	
		JArrayHelper::toInteger($cid, array(0));
		
		// build the html select list for ordering
		$query = 'SELECT ordering AS value, title AS text'
		. ' FROM #__yos_maps'		
		. ' ORDER BY ordering'
		;
		if ($edit) {
			$lists['ordering'] 			= JHTML::_('list.specificordering',  $row, $cid[0], $query );
		}
		else {
			$lists['ordering'] 			= JHTML::_('list.specificordering',  $row, '', $query );
		}
		// build the html radio buttons for published
		
		$published = ($row->id) ? $row->published : 1;
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $published );
		if ($edit){
			
		}
		$security = ($row->id) ? $row->security : 0;
		$lists['security']			= JHTML::_('select.booleanlist', 'security', 'class="inputbox"', $security);		
		
		// Select plug-in for map
		$query = "SELECT id, name FROM #__plugins WHERE folder = 'yos_map' AND published = 1";
		$db->setQuery($query);		
		$plugin = $db->loadObjectList();
		$html	= '<select name="pid" id="pid">';
		$html	.='<option value="0">------------------</option>';
		$html	.= JHTML::_('select.options', $plugin, 'id', 'name', $row->pid );
		$html	.= '</select>';
		$lists['plugin_id']			= $html;
		
		return $lists;
	}	
	
}