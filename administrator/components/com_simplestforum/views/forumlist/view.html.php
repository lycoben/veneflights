<?php
/**
* @version 1.3.0
* @package Simplest Forum
* @copyright Copyright (C) 2008 Ambitionality Software LLC. All rights reserved.
* @license GNU/GPL
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
//no direct access
defined( '_JEXEC' ) or die( 'Restricted Access' );

jimport( 'joomla.application.component.view' );

/**
 * Forum List View
 *
 * @package Simplest Forum
 */
class SimplestForumViewForumList extends JView
{
    function display( $tmpl = null )
    {
        //set up the tool bar
        JToolBarHelper::title( JText::_( 'FORUM LIST' ), 'generic.png' );
		JToolBarHelper::preferences( 'com_simplestforum', 300 );
        JToolBarHelper::custom('backup', 'archive.png', 'archive.png', JText::_('BACK UP'), false);
        JToolBarHelper::deleteList();
        JToolBarHelper::editListX();
        JToolBarHelper::addNewX();
        JToolBarHelper::help('help', true);

        $items = $this->get('Data');

        $this->assignRef('items', $items);

        parent::display($tmpl);
    } //end display
}
?>
