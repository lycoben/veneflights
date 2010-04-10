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
 * Topic List View
 *
 * @package Simplest Forum
 */
class SimplestForumViewTopicList extends JView
{
    function display( $tmpl = null )
    {
        $mainframe = &JFactory::getApplication();
        $user = &JFactory::getUser();

        $params = $mainframe->getPageParameters();

        $acl = &JFactory::getACL();
        $gid = $user->get('gid');
        $gid = $gid?$gid:$acl->get_group_id(null, 'ROOT');
        $this->assign('postAllowed', $gid >= $params->get('postgid'));

        //get the forum and parent thread id (if applicable)
        $forumId = JRequest::getVar('forumId', $params->get('forumid'));

        require_once(JPATH_COMPONENT.DS.'helpers'.DS.'forum.php');
        $forum = ForumHelper::getForum($forumId);

        $pparams = $mainframe->getPageParameters('com_simplestforum');

        $model = &$this->getModel('topiclist');
        $model->setForumId($forumId);
        $items = $model->getData();

        $this->assignRef('items', $items);
        $this->assignRef('params', $pparams);
        $this->assignRef('forum', $forum);
        $this->assignRef('user', $user);
        $this->assignRef('message', JRequest::getVar('message'));
        $this->assignRef('subject', JRequest::getVar('subject'));
        $this->assignRef('name', JRequest::getVar('name'));

        //if we should use captcha, get the captcha component
        if ($pparams->get('use_captcha')) {
            JPluginHelper::importPlugin('system');
        }

        $this->assignRef('mainframe', $mainframe);

        parent::display($tmpl);
    } //end display
}
?>
