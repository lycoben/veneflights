<?php
/**
 * Extensions Model for yos_translator Component
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * Extensions Model
 *
 * @package		yos_translator
 * @subpackage	Components
 */
class TranslatorModelContents extends JModel
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
	 * Status
	 *
	 * @var array
	 */
	var $_status	 = array();

	/**
	 * Constructor
	 *
	 * @since 0.9
	 */
	function __construct()
	{
		parent::__construct();

		global $mainframe,$option;

		//get the number of events from database		
				
		$filter_state		= $mainframe->getUserStateFromRequest( $option.'.content.filter_state',		'filter_state',		'',	'word' );	
		$search 			= $mainframe->getUserStateFromRequest( $option.'.content.search', 			'search', 			'',				'string' );		
		$catid				= $mainframe->getUserStateFromRequest( $option.'catid',			'catid',			0,	'int' );
		$filter_sectionid	= $mainframe->getUserStateFromRequest( $option.'filter_sectionid',	'filter_sectionid',	-1,	'int' );
		$search 			= JString::strtolower( $search );
		
		$filter_language	= $mainframe->getUserStateFromRequest($option.'.content.filter_language', 'filter_language', '', 'string');
		
		$filter_status		= $mainframe->getUserStateFromRequest($option.'.content.filter_status', 'filter_status', -1, 'int');
	
		$limit				= $mainframe->getUserStateFromRequest($option.'.content.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest($option.'.content.limitstart', 'limitstart', 0, 'int');
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		$this->setState('catid', $catid);
		$this->setState('search', $search);
		$this->setState('filter_language', $filter_language);
		$this->setState('filter_status', $filter_status);
		$this->setState('filter_state', $filter_state);
		$this->setState('filter_sectionid', $filter_sectionid);
	}
	
	function getTotal()
	{
		$db = $this->_db;
		// Lets load the total nr if it doesn't already exist
		if (empty($this->_total))
		{
			$query = $this->_buildQuery(true);		
			$db->setQuery($query);
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}
	
	function getPagination()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$total	=	$this->getTotal();			
			$this->_pagination = new JPagination( $total, $this->getState('limitstart'), $this->getState('limit') );
		}

		return $this->_pagination;
	}
	
	
	function getData(){
		$db = $this->_db;
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$db->setQuery($query, $this->getState('limitstart'), $this->getState('limit'));
			$this->_data = $db->loadObjectList();
		}
		return $this->_data;
	}
	
	function _buildQuery($total = false){
		$where		= $this->_buildWhere();
		$having		= $this->_buildHaving();
		
		$filter_language	=$this->getState('filter_language');
		$leftJoinLanguage = '';
		if(intval($filter_language)) {
			$leftJoinLanguage = " AND JFC1.language_id='$filter_language'";
		}
		
		if (!$total) {
			$query = "
			SELECT JC.`id`, JC.`title`, JFC1.`language_id`, JL.`name`,
			JFC1.value AS 'translation',
			JFC1.modified AS 'modified',
			JFC1.modified_by AS 'modified_by', 
			JU.username AS 'username',
			JFC1.published AS 'published',";
			if ($filter_language == 'NO') {
				$query .= "
				NULL AS 'status',
				(
					SELECT COUNT(*) FROM jos_jf_content AS JFC
					WHERE JFC.reference_id = JC.id AND JFC.reference_field = 'title'
				) AS 'total'";
			}
			else {
			$query .= 			
			"
			(
				SELECT JC.`modified` < JFC1.`modified`
			) AS 'status',
			1 AS 'total'";
			}
		}
		else {
			$query = "
			SELECT COUNT(*)";
		}		
		
		$query .= "
			FROM `#__content` AS JC
			LEFT JOIN `#__jf_content` AS JFC1 ON JC.id = JFC1.reference_id AND JFC1.reference_field = 'title' AND JFC1.reference_table = 'content' $leftJoinLanguage";
			
		if (!$total) {
			$query .= 
			"LEFT JOIN `#__languages` AS JL ON JFC1.language_id = JL.id
			LEFT JOIN `#__users` AS JU ON JFC1.modified_by = JU.id
			"; 
		}
			
		$query .= $where . $having;
			
		return $query;
	}
	
	function _buildWhere( )
	{		
		
		$db					=& JFactory::getDBO();
		$search				=$this->getState('search');
		$filter_sectionid	=$this->getState('filter_sectionid');
		$filter_catid		=$this->getState('catid');
		$filter_state		=$this->getState('filter_state');
		$filter_language	=$this->getState('filter_language');

		$where = array();
		
		$where[] = 'JC.`state` >= 0';
		
		if($search) {
			$where[]='(LOWER(JC.title) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ).')';
		}
		
		if(intval($filter_sectionid)>=0) {
			$where[]="JC.sectionid = '$filter_sectionid' ";
		}
		
		if($filter_catid) {
			$where[]="JC.catid = '$filter_catid'";
		}
		
		if($filter_state) {
			if($filter_state == 'P') {
				$where[]='JFC1.published = 1';
			}
			elseif($filter_state == 'U') {
				$where[]='JFC1.published = 0';
			}
		}
		
		$where 		= ( count( $where ) ? ' WHERE ' . implode( ' AND ', $where ) : '' );
		
		return $where;
	}
	
	function _buildHaving(){
		$filter_status	=	$this->getState('filter_status');
		$filter_language	=$this->getState('filter_language');
		
		$having = array();
		
		switch (intval($filter_status)){
			case 0:
				//not exist
				$having[] = '`status` IS NULL';
				break;
			case 1:
				//original changed
				$having[] = '`status` = 0';
				break;
			case 2:
				//up to date
				$having[] = '`status` = 1';
				break;
		}
		
		switch ($filter_language){
			case 'NO':
				//no translation
				$having [] = 'total = 0';
		}
		
		$having	= ( count( $having ) ? ' HAVING ' . implode( ' AND ', $having ) : '' );
		
		return $having;
	}
	
	function getLists(){
		// Initialize variables
		$db	= & JFactory::getDBO();		
		$filter = null;
		// state filter
		$lists['state'] = JHTML::_('grid.state', $this->getState('filter_state'), 'Published', 'Unpublished');
		
		if ($this->getState('filter_sectionid') >= 0) {
			$filter = ' WHERE cc.section = '. (int) $this->getState('filter_sectionid');
		}
		// get list of categories for dropdown filter
		$query = 'SELECT cc.id AS value, cc.title AS text, section' .
				' FROM #__categories AS cc' .
				' INNER JOIN #__sections AS s ON s.id = cc.section ' .
				$filter .
				' ORDER BY s.ordering, cc.ordering';
				
		$categories[] = JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -');
		$db->setQuery($query);
		$categories = array_merge($categories, $db->loadObjectList());

		$category = JHTML::_('select.genericlist',  $categories, 'catid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $this->getState('catid'));
		
		$lists['catid'] = $category;

		// get list of sections for dropdown filter
		$javascript = 'onchange="document.adminForm.submit();"';
		$lists['sectionid'] = JHTML::_('list.section', 'filter_sectionid', $this->getState('filter_sectionid'), $javascript);
		
		// search filter
		$lists['search']= $this->getState('search');
		
		// filter status
		$filter_status	=	$this->getState('filter_status');
		$status			=	array()	;
		$status[]		=	new filter_status(-1,'--Select Status--');
		$status[]		=	new filter_status(0,'Not exist');
		$status[]		=	new filter_status(1,'Original changed');
		$status[]		=	new filter_status(2, 'Up to date');		
		
		$lists['filter_status']= 	JHTML::_('select.genericlist', $status, 'filter_status', 'id="filter_status"  onchange="submitform( );"', 'value', 'name', $filter_status);
		
		// filter Language
		$lists['filter_language']	=	$this->getSelectLanguage($this->getState('filter_language'),1);
		return $lists;
	}
	
	function getSelectLanguage($language_selected, $state)
	{
		$db		= &JFactory::getDBO();
		$query	=    "SELECT id, name "
					."FROM `#__languages` "
					."WHERE active='1'";
		$db->setQuery($query);
		
		$row_lang	=	$db->loadObjectList();		
		
		$lls[]	= JHTML::_('select.option', '', JText::_("- Select Language -"), 'id', 'name');
		
		if($state==0)
		{
			$lls			= $row_lang ? array_merge($lls, $row_lang) : $lls;
			$language_id	= JHTML::_('select.genericlist', $lls, 'language_id', 'class="inputbox" size="1"', 'id', 'name', $language_selected);
		}
		elseif($state==1)
		{
			$lls[]			= JHTML::_('select.option', 'NO', JText::_("No Translation"), 'id', 'name');
			$lls			= $row_lang ? array_merge($lls, $row_lang) : $lls;
			$language_id	= JHTML::_('select.genericlist', $lls, 'filter_language', 'class="inputbox" size="1" onchange="document.adminForm.submit();"', 'id', 'name', $language_selected);
		}
		
		
		return $language_id;
	}
	
}

class filter_status{
	var $value 	= 	null;
	var $name	=	null;
	
	function __construct($value, $name){
		$this->value=$value;
		$this->name=$name;
	}	
}