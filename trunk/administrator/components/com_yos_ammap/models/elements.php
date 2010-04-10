<?php
/**
 * @version		$Id: elements.php 10381 2008-06-01 03:35:53Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		Commercial 
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.model');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * amMap Component Elements Model
 *
 * @package		YOS
 * @subpackage	Elememnts
 * @since 1.5
 */
class YOS_ammap_ModelElements extends JModel
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
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'.elements.filter_order', 		'filter_order', 	'e.element_id',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'.elements.filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		$filter_state		= $mainframe->getUserStateFromRequest( $option.'.elements.filter_state',		'filter_state',		'',	'word' );
		$filter_element		= $mainframe->getUserStateFromRequest( $option.'.elements.filter_element',		'filter_element',		'movies',	'word' );
		$field_change = '';
		switch ($filter_element){
			case 'areas':
				$field_change	=	'mc_name';
				break;
			case 'movies':
				$field_change	=	'file';
				break;
			case 'labels':
				$field_change	=	'text';
				break;
			case 'lines':
				$field_change	=	'width';
				break;
		}
		$filter_field		= JRequest::getString('filter_field', $field_change);
		$field				=	JRequest::getString('field_change');
		if ($field!='') {
			$filter_field	=	$field;
		}
		$filter_map			= $mainframe->getUserStateFromRequest($option.'.elements.filter_map', 'filter_map', 0, 'int');		
	
		$limit				= $mainframe->getUserStateFromRequest($option.'.elements.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest($option.'.elements.limitstart', 'limitstart', 0, 'int');
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);		
		$this->setState('filter_state', $filter_state);
		$this->setState('filter_element', $filter_element);
		$this->setState('filter_field', $filter_field);
		$this->setState('filter_map', $filter_map);

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
		$filter_element	=	$this->getState('filter_element');
		$filter_field	=	$this->getState('filter_field');
		$and	=	array();
		$and[]	=	'm.id	=	e.map_id';
		if ($filter_element) {
			$and[]	=	"e.element_type	=	'$filter_element'";
		}
		
		if ($filter_field) {
			$and[]	=	"e.field_name	=	'$filter_field'";
		}
		
		$and	=	implode(' AND ', $and);

		//Get Events from Database
		$query = "SELECT m.title, e.* FROM #__yos_maps as m INNER JOIN #__yos_map_elements as e ON $and "
				. $where
				. $orderby
				;
		return $query;
	}
	
	function _buildWhere( )
	{		
		$db					=& JFactory::getDBO();
		$filter_state		=$this->getState('filter_state');
		$filter_map			=$this->getState('filter_map');
		
		$where = array();
		
		if ($filter_map) {
			$where[]	=	'e.map_id	=	'.$filter_map;
		}
		
		if ( $filter_state ) {
			if ( $filter_state == 'P' ) {
				$where[] = 'e.published = 1';
			} else if ($filter_state == 'U' ) {
				$where[] = 'e.published = 0';
			}
		}
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
					
		return $where;
	}
	
	function _buildOrderBy()
	{
		$filter_order		=	$this->getState('filter_order');
		$filter_order_Dir	=	$this->getState('filter_order_dir');
		
		if ($filter_order == 'e.element_id'){
			$orderby 	= ' ORDER BY e.element_id';
		} else {
			$orderby 	= ' ORDER BY '. $filter_order .' '. $filter_order_Dir .', e.element_id';
		}
		
		return $orderby;
	}
	
	function getLists(){
		
		$filter_map		=	$this->getState('filter_map');
		$filter_element	=	$this->getState('filter_element');
		$filter_field	=	$this->getState('filter_field');
		
		// state filter
		$lists['state'] = JHTML::_('grid.state', $this->getState('filter_state'), 'Published', 'Unpublished');
		
		//filter map
		$db		=	&$this->_db;
		$query	=	"SELECT id, title FROM #__yos_maps";
		$db->setQuery($query);
		$rows	=	$db->loadObjectList();
		$lists['filter_map']	=	JHTML::_('select.genericlist', $rows, 'filter_map', 'onchange="submitform( );"', 'id', 'title', $filter_map);
		
		$elements			=	array()	;		
		$elements[]			=	new elements('areas','areas');
		$elements[]			=	new elements('movies','movies');
		$elements[]			=	new elements('labels', 'labels');
		$elements[]			=	new elements('lines', 'lines');	
		
		$lists['filter_element']	=	JHTML::_('select.genericlist', $elements, 'filter_element', 'id="filter_element"  onchange="change_element();"', 'value', 'name', $filter_element);
		
		$db	=	&$this->_db;
		
		$query	=	"SELECT * FROM #__yos_elements_properties WHERE element_type='$filter_element'";
		$db->setQuery($query);
		
		$rows	=	$db->loadObjectList();
		
		$lists['filter_field']	=	JHTML::_('select.genericlist', $rows, 'filter_field', 'id="filter_field" onchange="submitform();"', 'name', 'name', $filter_field);
		
		// table ordering
		$lists['order_Dir']	= $this->getState('filter_order_dir');
		$lists['order']		= $this->getState('filter_order');		
		
		return $lists;
	}
	
}

class elements extends JObject {
	var $value 	= 	null;
	var $name	=	null;
	
	function __construct($value, $name){
		$this->set('value', $value);
		$this->set('name', $name);
	}	
}