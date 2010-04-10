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
 * Post List View
 *
 * @package Simplest Forum
 */
class SimplestForumViewPostList extends JView
{
    function display( $tmpl = null )
    {
        $mainframe = &JFactory::getApplication();

        $user = &JFactory::getUser();
        $params = $mainframe->getPageParameters();
        $name = JRequest::getVar('name');

        $acl = &JFactory::getACL();
        $gid = $user->get('gid');
        $gid = $gid?$gid:$acl->get_group_id(null, 'ROOT');
        $this->assign('postAllowed', $gid >= $params->get('postgid'));
        $this->assign('moderateAllowed', $gid >= $params->get('moderatorgid'));
        $this->assign('topic', JRequest::getVar('topic'));

        //get the forum and parent thread id (if applicable)
        $parentId = JRequest::getVar('parentId');
        $forumId = JRequest::getVar('forumId', $params->get('forumid'));

        require_once(JPATH_COMPONENT.DS.'helpers'.DS.'forum.php');
        $forum = ForumHelper::getForum($forumId);

        require_once(JPATH_COMPONENT.DS.'helpers'.DS.'post.php');
        $parent = PostHelper::getPost($parentId);

        $pparams = $mainframe->getPageParameters('com_simplestforum');

        $model = &$this->getModel('postlist');
        $model->setForumId($forumId);
        if ($parent) {
            $model->setThread($parent->thread?$parent->thread:$parent->id);
        }
        $items = $model->getData();

        //if we should use captcha, get the captcha component
        if ($pparams->get('use_captcha')) {
            JPluginHelper::importPlugin('system');
        }

        $this->assignRef('mainframe', $mainframe);

        $this->assignRef('message', JRequest::getVar('message'));
        $this->assignRef('subject', JRequest::getVar('subject'));
        $this->assignRef('name', JRequest::getVar('name'));

        $this->assignRef('items', $items);
        $this->assignRef('params', $pparams);
        $this->assignRef('parent', $parent);
        $this->assignRef('forum', $forum);
        $this->assignRef('user', $user);
        $this->assignRef('name', $name);

        parent::display($tmpl);
    } //end display
}
?>
