<?php
/**
 * @version		$Id: pagination.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package 	JXtended
 * @subpackage	HTML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.html.pagination');

/**
 * @package 	JXtended
 * @subpackage	HTML
 */
class JXPagination extends JPagination
{
	/**
	 * View all flag
	 *
	 * @access protected
	 * @var boolean
	 */
	var $_mode = null;

	var $_requestVar	= 'limitstart';
	var $_requestMode	= 0;

	/**
	 * Constructor
	 *
	 * @param	int		The total number of items
	 * @param	int		The offset of the item to start at
	 * @param	int		The number of items to display per page
	 * @param	int		The mode: 0 = like frontend, 1 = like backend, null = auto-detect
	 */
	function __construct($total, $limitstart, $limit, $mode = null)
	{
		if ($mode === null)
		{
			global $mainframe;
			$mode	= $mainframe->isAdmin();
		}
		$this->_mode	= (int) $mode;
		parent::__construct( $total, $limitstart, $limit );
	}

	function setRequestVariable($name='limitstart', $mode=0)
	{
		$this->_requestVar	= $name;
		$this->_requestMode	= $mode;
	}

	/**
	 * Creates a dropdown box for selecting how many records to show per page
	 *
	 * @access	public
	 * @return	string	The html for the limit # input box
	 * @since	1.0
	 */
	function getLimitBox()
	{
		global $mainframe;

		// Initialize variables
		$limits = array ();

		// Make the option list
		for ($i = 5; $i <= 30; $i += 5) {
			$limits[] = JHTML::_('select.option', "$i");
		}
		$limits[] = JHTML::_('select.option', '50');
		$limits[] = JHTML::_('select.option', '100');
		$limits[] = JHTML::_('select.option', '0', JText::_('all'));

		$selected = $this->_viewall ? 0 : $this->limit;

		// Build the select list
		if ($this->_mode == 1) {
			$html = JHTML::_('select.genericlist',  $limits, 'limit', 'class="inputbox" size="1" onchange="submitform();"', 'value', 'text', $selected);
		} else {
			$html = JHTML::_('select.genericlist',  $limits, 'limit', 'class="inputbox" size="1" onchange="this.form.submit()"', 'value', 'text', $selected);
		}
		return $html;
	}

	function _item_active(&$item)
	{
		global $mainframe;
		if ($this->_mode == 1)
		{
			if($item->base>0)
				return "<a title=\"".$item->text."\" onclick=\"javascript: document.adminForm.limitstart.value=".$item->base."; submitform();return false;\">".$item->text."</a>";
			else
				return "<a title=\"".$item->text."\" onclick=\"javascript: document.adminForm.limitstart.value=0; submitform();return false;\">".$item->text."</a>";
		} else {
			return "<a title=\"".$item->text."\" href=\"".$item->link."\" class=\"pagenav\">".$item->text."</a>";
		}
	}

	function _item_inactive(&$item)
	{
		global $mainframe;
		if ($this->_mode == 1) {
			return "<span>".$item->text."</span>";
		} else {
			return "<span class=\"pagenav\">".$item->text."</span>";
		}
	}

	/**
	 * Return the icon to move an item UP
	 *
	 * @access public
	 * @param int $id The row index
	 * @param int $order The ordering value for the item
	 * @param string $task The task to fire
	 * @param string $alt The image alternate text string
	 * @return string Either the icon to move an item up or a space
	 * @since 1.0
	 */
	function orderUpIcon($id, $order, $task = 'orderup', $alt = '#')
	{
		// handling of default value
		if ($alt = '#') {
			$alt = JText::_('Move Up');
		}

		if ($order == 0) {
			$img = 'uparrow0.png';
		} else {
			if ($order < 0) {
				$img = 'uparrow-1.png';
			} else {
				$img = 'uparrow.png';
			}
		}
		$output = '<a href="javascript:void listItemTask(\'cb'.$id.'\',\''.$task.'\')" title="'.$alt.'">';
		$output .= '<img src="images/'.$img.'" width="16" height="16" border="0" alt="'.$alt.'" title="'.$alt.'" /></a>';

		return $output;
	}

	/**
	 * Return the icon to move an item DOWN
	 *
	 * @access public
	 * @param int $id The row index
	 * @param int $order The ordering value for the item
	 * @param string $task The task to fire
	 * @param string $alt The image alternate text string
	 * @return string Either the icon to move an item down or a space
	 * @since 1.0
	 */
	function orderDownIcon($id, $order, $task = 'orderdown', $alt = '#')
	{
		// handling of default value
		if ($alt = '#') {
			$alt = JText::_('Move Down');
		}

		if ($order == 0) {
			$img = 'downarrow0.png';
		} else {
			if ($order < 0) {
				$img = 'downarrow-1.png';
			} else {
				$img = 'downarrow.png';
			}
		}
		$output = '<a href="javascript:void listItemTask(\'cb'.$id.'\',\''.$task.'\')" title="'.$alt.'">';
		$output .= '<img src="images/'.$img.'" width="16" height="16" border="0" alt="'.$alt.'" title="'.$alt.'" /></a>';

		return $output;
	}

	/**
	 * Create and return the pagination data object
	 *
	 * @access	public
	 * @return	object	Pagination data object
	 * @since	1.5
	 */
	function _buildDataObject()
	{
		// Initialize variables
		$data = new stdClass();

		$data->all	= new JPaginationObject(JText::_('View All'));
		if (!$this->_viewall) {
			$data->all->base	= '0';
			$data->all->link	= JRoute::_('&'.$this->_requestVar.'=');
		}

		// Set the start and previous data objects
		$data->start	= new JPaginationObject(JText::_('Start'));
		$data->previous	= new JPaginationObject(JText::_('Prev'));

		if ($this->get('pages.current') > 1)
		{
			if ($this->_requestMode) {
				$page = ($this->get('pages.current') - 1);
				$start = 1;
			} else {
				$page = ($this->get('pages.current') -2) * $this->limit;
				$start = 0;
			}

			$page = $page == 0 ? '' : $page; //set the empty for removal from route

			$data->start->base	= '0';
			$data->start->link	= JRoute::_('&'.$this->_requestVar.'='.$start);
			$data->previous->base	= $page;
			$data->previous->link	= JRoute::_('&'.$this->_requestVar.'='.$page);
		}

		// Set the next and end data objects
		$data->next	= new JPaginationObject(JText::_('Next'));
		$data->end	= new JPaginationObject(JText::_('End'));

		if ($this->get('pages.current') < $this->get('pages.total'))
		{
			if ($this->_requestMode) {
				$next = ($this->get('pages.current') + 1);
				$end  = $this->get('pages.total');
			} else {
				$next = $this->get('pages.current') * $this->limit;
				$end  = ($this->get('pages.total') -1) * $this->limit;
			}

			$data->next->base	= $next;
			$data->next->link	= JRoute::_('&'.$this->_requestVar.'='.$next);
			$data->end->base	= $end;
			$data->end->link	= JRoute::_('&'.$this->_requestVar.'='.$end);
		}

		$data->pages = array();
		$stop = $this->get('pages.stop');
		for ($i = $this->get('pages.start'); $i <= $stop; $i ++)
		{
			if ($this->_requestMode) {
				$offset = $i;
			} else {
				$offset = ($i -1) * $this->limit;
			}

			$offset = $offset == 0 ? '' : $offset;  //set the empty for removal from route

			$data->pages[$i] = new JPaginationObject($i);
			if ($i != $this->get('pages.current') || $this->_viewall)
			{
				$data->pages[$i]->base	= $offset;
				$data->pages[$i]->link	= JRoute::_('&'.$this->_requestVar.'='.$offset);
			}
		}
		return $data;
	}
}