<?php
/* Search plugin for QContacts 
 *
 * Largely based on original com_contact search plugin
 * 
 * @version 1.0.0
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

defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onSearch', 'plgSearchQContacts' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSearchQContactsAreas' );

JPlugin::loadLanguage( 'plg_search_contacts' );

/**
 * @return array An array of search areas
 */
function &plgSearchQContactsAreas()
{
	static $areas = array(
		'contacts' => 'Contacts'
	);
	return $areas;
}

/**
* Contacts Search method
*
* The sql must return the following fields that are used in a common display
* routine: href, title, section, created, text, browsernav
* @param string Target search string
* @param string mathcing option, exact|any|all
* @param string ordering option, newest|oldest|popular|alpha|category
*/
function plgSearchQContacts( $text, $phrase='', $ordering='', $areas=null )
{
	$db		=& JFactory::getDBO();
	$user	=& JFactory::getUser();

	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( plgSearchQContactsAreas() ) )) {
			return array();
		}
	}

	// load plugin params info
 	$plugin =& JPluginHelper::getPlugin('search', 'qcontacts');
 	$pluginParams = new JParameter( $plugin->params );

	$limit = $pluginParams->def( 'search_limit', 50 );

	$text = trim( $text );
	if ($text == '') {
		return array();
	}
	
	$wheres = array();
	switch ($phrase) {
		case 'exact':
			$text		= $db->Quote( '%'.$db->getEscaped( $text, true ).'%', false );
			$wheres2 	= array();
			$wheres2[] 	= 'a.name LIKE '.$text;
			$wheres2[] 	= 'a.misc LIKE '.$text;
			$wheres2[] 	= 'a.con_position LIKE '.$text;
			$wheres2[] 	= 'a.address LIKE '.$text;
			$wheres2[] 	= 'a.suburb LIKE '.$text;
			$wheres2[] 	= 'a.state LIKE '.$text;
			$wheres2[] 	= 'a.country LIKE '.$text;
			$wheres2[] 	= 'a.postcode LIKE '.$text;
			$wheres2[] 	= 'a.telephone LIKE '.$text;
			$wheres2[] 	= 'a.fax LIKE '.$text;
			$wheres2[] 	= 'a.mobile LIKE '.$text;
			$wheres2[] 	= 'a.webpage LIKE '.$text;
			$wheres2[] 	= 'a.skype LIKE '.$text;
			$wheres2[] 	= 'a.yahoo_msg LIKE '.$text;
			$where 		= '(' . implode( ') OR (', $wheres2 ) . ')';
			break;

		case 'all':
		case 'any':
		default:
			$words = explode( ' ', $text );
			$wheres = array();
			foreach ($words as $word) {
				$word		= $db->Quote( '%'.$db->getEscaped( $word, true ).'%', false );
				$wheres2 	= array();
				$wheres2[] 	= 'a.name LIKE '.$word;
				$wheres2[] 	= 'a.misc LIKE '.$word;
				$wheres2[] 	= 'a.con_position LIKE '.$word;
				$wheres2[] 	= 'a.address LIKE '.$word;
				$wheres2[] 	= 'a.suburb LIKE '.$word;
				$wheres2[] 	= 'a.state LIKE '.$word;
				$wheres2[] 	= 'a.country LIKE '.$word;
				$wheres2[] 	= 'a.postcode LIKE '.$word;
				$wheres2[] 	= 'a.telephone LIKE '.$word;
				$wheres2[] 	= 'a.fax LIKE '.$word;
				$wheres2[] 	= 'a.mobile LIKE '.$word;
				$wheres2[] 	= 'a.webpage LIKE '.$word;
				$wheres2[] 	= 'a.skype LIKE '.$word;
				$wheres2[] 	= 'a.yahoo_msg LIKE '.$word;
				$wheres[] 	= implode( ' OR ', $wheres2 );
			}
			$where = '(' . implode( ($phrase == 'all' ? ') AND (' : ') OR ('), $wheres ) . ')';
			break;
	}
	
	$section = JText::_( 'Contact' );

	switch ( $ordering ) {
		case 'alpha':
			$order = 'a.name ASC';
			break;

		case 'category':
			$order = 'b.title ASC, a.name ASC';
			break;

		case 'popular':
		case 'newest':
		case 'oldest':
		default:
			$order = 'a.name DESC';
	}

	$text	= $db->Quote( '%'.$db->getEscaped( $text, true ).'%', false );
	$query	= 'SELECT a.name AS title, "" AS created,'
	. ' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(\':\', a.id, a.alias) ELSE a.id END as slug, '
	. ' CASE WHEN CHAR_LENGTH(b.alias) THEN CONCAT_WS(\':\', b.id, b.alias) ELSE b.id END AS catslug, '
	. ' CONCAT_WS( ", ", a.name, a.con_position, a.misc ) AS text,'
	. ' CONCAT_WS( " / ", '.$db->Quote($section).', b.title ) AS section,'
	. ' "2" AS browsernav'
	. ' FROM #__qcontacts_details AS a'
	. ' INNER JOIN #__categories AS b ON b.id = a.catid'
	. ' WHERE ('.$where.' )'
	. ' AND a.published = 1'
	. ' AND b.published = 1'
	. ' AND a.access <= '.(int) $user->get( 'aid' )
	. ' AND b.access <= '.(int) $user->get( 'aid' )
	. ' GROUP BY a.id'
	. ' ORDER BY '. $order
	;
	
	$db->setQuery( $query, 0, $limit );
	$rows = $db->loadObjectList();

	foreach($rows as $key => $row) {
		$rows[$key]->href = 'index.php?option=com_qcontacts&view=contact&id='.$row->slug.'&catid='.$row->catslug;
	}

	return $rows;
}
