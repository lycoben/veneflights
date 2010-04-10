<?php
/**
 * QContacts Contact manager component for Joomla! 1.5
 *
 * @version 1.0.3
 * @package qcontacts
 * @author Massimo Giagnoni
 * @copyright Copyright (C) 2008 Massimo Giagnoni. All rights reserved.
 * @copyright Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
 /*
This file is part of QContacts.
QContacts is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.view');

class QContactsViewCategory extends JView {
	function display($tpl = null)
	{
		global $mainframe;

		$user =& JFactory::getUser();
		$uri =& JFactory::getURI();
		$model =& $this->getModel();
		$document =& JFactory::getDocument();

		$pparams =& $mainframe->getParams('com_qcontacts');

		$categoryId = JRequest::getVar('catid', 0, '', 'int');
		$limit	= JRequest::getVar('limit', $pparams->get('contacts_per_page', $mainframe->getCfg('list_limit')), '', 'int');
		$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$filter_order = JRequest::getVar('filter_order', 'cd.ordering',	'', 'cmd');
		$filter_order_Dir = JRequest::getVar('filter_order_Dir', 'ASC', '', 'word');

		$options['aid'] = $user->get('aid', 0);
		$options['category_id']	= $categoryId;
		$options['limit'] = $limit;
		$options['limitstart'] = $limitstart;
		$options['order by'] = "$filter_order $filter_order_Dir, cd.ordering";

		$categories	= $model->getCategories( $options );
		$contacts = $model->getContacts( $options );
		$total = $model->getContactCount( $options );

		if($pparams->get('show_feed_link', 1) == 1) {
			$link	= '&format=feed&limitstart=';
			$attribs = array('type' => 'application/rss+xml', 'title' => 'RSS 2.0');
			$document->addHeadLink(JRoute::_($link.'&type=rss'), 'alternate', 'rel', $attribs);
			$attribs = array('type' => 'application/atom+xml', 'title' => 'Atom 1.0');
			$document->addHeadLink(JRoute::_($link.'&type=atom'), 'alternate', 'rel', $attribs);
		}

		if($pparams->get('show_col_email', 0) == 1) {
		    jimport('joomla.mail.helper');
		}
		$columns = array();
		
		if($pparams->get('show_col_name',1)) {
			$c = new stdClass;
			$c->field = 'name';
			$c->label ='Name';
			$c->sortable = true;
			$c->width= $pparams->get('width_col_name');;
			$columns[]=array('order'=>$pparams->get('ord_col_name',0), 'column'=>$c);
		}
		if($pparams->get('show_col_position')) {
			$c = new stdClass;
			$c->field = 'con_position';
			$c->label = 'Position';
			$c->sortable = true;
			$c->width = $pparams->get('width_col_position');
			$columns[]=array('order'=>$pparams->get('ord_col_position',1), 'column'=>$c);
		}
		if($pparams->get('show_col_email')) {
			$c = new stdClass;
			$c->field = 'email_to';
			$c->label = 'Email';
			$c->width = $pparams->get('width_col_email');
			$columns[]=array('order'=>$pparams->get('ord_col_email',2), 'column'=>$c);
		}
		if($pparams->get('show_col_telephone')) {
			$c = new stdClass;
			$c->field = 'telephone';
			$c->label = 'Phone';
			$c->width = $pparams->get('width_col_telephone');
			$columns[]=array('order'=>$pparams->get('ord_col_telephone',3), 'column'=>$c);
		}
		if($pparams->get('show_col_mobile')) {
			$c = new stdClass;
			$c->field = 'mobile';
			$c->label = 'Mobile';
			$c->width = $pparams->get('width_col_mobile');
			$columns[]=array('order'=>$pparams->get('ord_col_mobile',4), 'column'=>$c);
		}
		if($pparams->get('show_col_fax')) {
			$c = new stdClass;
			$c->field = 'fax';
			$c->label = 'Fax';
			$c->width = $pparams->get('width_col_fax');
			$columns[]=array('order'=>$pparams->get('ord_col_fax',5), 'column'=>$c);
		}
		if($pparams->get('show_col_street')) {
			$c = new stdClass;
			$c->field = 'address';
			$c->label = 'Address';
			$c->width = $pparams->get('width_col_street');
			$columns[]=array('order'=>$pparams->get('ord_col_street',6), 'column'=>$c);
		}
		if($pparams->get('show_col_suburb')) {
			$c = new stdClass;
			$c->field = 'suburb';
			$c->label = 'City';
			$c->width = $pparams->get('width_col_suburb');
			$columns[]=array('order'=>$pparams->get('ord_col_suburb',7), 'column'=>$c);
		}
		if($pparams->get('show_col_state')) {
			$c = new stdClass;
			$c->field = 'state';
			$c->label = 'State';
			$c->width = $pparams->get('width_col_state');
			$columns[]=array('order'=>$pparams->get('ord_col_state',8), 'column'=>$c);
		}
		if($pparams->get('show_col_postcode')) {
			$c = new stdClass;
			$c->field = 'postcode';
			$c->label = 'Zip Code';
			$c->width = $pparams->get('width_col_postcode');
			$columns[]=array('order'=>$pparams->get('ord_col_postcode',9), 'column'=>$c);
		}
		if($pparams->get('show_col_country')) {
			$c = new stdClass;
			$c->field = 'country';
			$c->label = 'Country';
			$c->width = $pparams->get('width_col_country');
			$columns[]=array('order'=>$pparams->get('ord_col_country',10), 'column'=>$c);
		}
		foreach ($columns as $k => $v) {
    		$order[$k] = $v['order'];
		}
		array_multisort($order, SORT_ASC, $columns);
		$k = 0;
		for($i = 0; $i < count($contacts); $i++)	{
			$contact =& $contacts[$i];

			$cparams =  new JParameter($contact->params);
			$params = $cparams->toArray();
			foreach($params as $k=>$v) {
				if($cparams->get($k) == '') {
					$cparams->set($k, $pparams->get($k, ''));
				}
			}
			$contact->params = $cparams;
			
			$contact->link = JRoute::_('index.php?option=com_qcontacts&view=contact&id='.$contact->slug.'&catid='.$contact->catslug);
			if($pparams->get('show_col_email', 0) == 1 && $cparams->get('show_email', 0) == 1) {
			    $contact->email_to = trim($contact->email_to);
				if(!empty($contact->email_to) && JMailHelper::isEmailAddress($contact->email_to)) {
				    $contact->email_to = JHTML::_('email.cloak', $contact->email_to);
				} else {
				    $contact->email_to = '';
				}
			}
			if(!$cparams->get('show_email', 0)){
				$contact->email_to = '';
			}
			if(!$cparams->get('show_position',1)) {
				$contact->con_position = '';
			}
			if(!$cparams->get('show_telephone',1)) {
				$contact->telephone = '';
			}
			if(!$cparams->get('show_mobile',1)) {
				$contact->mobile = '';
			}
			if(!$cparams->get('show_fax',1)) {
				$contact->fax = '';
			}
			if(!$cparams->get('show_street_address',1)) {
				$contact->address = '';
			}
			if(!$cparams->get('show_suburb',1)) {
				$contact->suburb = '';
			}
			if(!$cparams->get('show_state',1)) {
				$contact->state = '';
			}
			if(!$cparams->get('show_postcode',1)) {
				$contact->postcode = '';
			}
			if(!$cparams->get('show_country',1)) {
				$contact->country = '';
			}
			
			$contact->odd = $k;
			$contact->count = $i;
			$k = 1 - $k;
		}

		$category = null;
		foreach ($categories as $i => $_cat)
		{
			if ($_cat->id == $categoryId) {
				$category =& $categories[$i];
				break;
			}
		}
		if ($category == null) {
			$db = &JFactory::getDBO();
			$category =& JTable::getInstance('category');
		}

		if ($category->title)	{
			$document->setTitle(JText::_('Contact').' - '.$category->title);
		} else {
			$document->setTitle(JText::_('Contact'));
		}

		$lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;
		$selected = '';

		jimport('joomla.html.pagination');
		$pagination = new JPagination($total, $limitstart, $limit);

		$this->assignRef('items', $contacts);
		$this->assignRef('columns', $columns);
		$this->assignRef('lists', $lists);
		$this->assignRef('pagination', $pagination);
		$this->assignRef('category', $category);
		$this->assignRef('params', $pparams);

		$this->assign('action', $uri->toString());

		parent::display($tpl);
	}

	function getItems()
	{

	}
}