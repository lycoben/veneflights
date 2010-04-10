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
// no direct access
defined('_JEXEC') or die();

jimport('joomla.application.component.controller');

/**
 * Simplest Forum Controller
 *
 * @package Simplest Forum
 */
class SimplestForumController extends JController
{
    function SimplestForumController()
    {
        parent::__construct();
    }

    function display($tmpl = null)
    {
        parent::display($tmpl);
    }

    /**
     * Verifies access and adds a post to a forum.
     * @param the template
    */
    function addPost($tmpl = null)
    {
        $mainframe = &JFactory::getApplication();

        $data = JRequest::get('post');
        $params = &JComponentHelper::getParams('com_simplestforum');

        $acl = &JFactory::getACL();
        $user = &JFactory::getUser();
        $gid = $user->get('gid');
        $gid = $gid?$gid:$acl->get_group_id(null, 'ROOT');

        $topic = JRequest::getVar('topic');
        $parentId = JRequest::getVar('parentId');

        if ($gid < $params->get('postgid')) {
			JError::raiseError(403, JText::_('REQUEST FORBIDDEN'));
        }

        //if we should use the captcha component, require its info
        if ($params->get('use_captcha')) {
            JPluginHelper::importPlugin('system');

            $mainframe->triggerEvent('onProcessFormSubmit', array(&$data));

            if (isset($data['form_invalid'])) {
                $mainframe->enqueueMessage(JText::_('YOU DID NOT ENTER THE CORRECT VERIFICATION CODE. PLEASE TRY AGAIN.'), 'error');

                if ($topic && !$parentId) {
                    JRequest::setVar('view', 'topiclist');
                }

                parent::display();
                return;
            }
        }

        //verify a valid token
		$token	= JUtility::getToken();
		if(!JRequest::getInt($token, 0, 'post')) {
			JError::raiseError(403, JText::_('REQUEST FORBIDDEN'));
		}

        $model = $this->getModel('postlist');

        if ($model->store($data)) {
            $message = JText::_('YOUR POST HAS BEEN SUBMITTED');
            $msgtype = 'message';
        } else {
            $message = $model->getError();
            $msgtype = 'error';
        }

        if (!$parentId && $topic) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=topiclist&forumId='.(int)JRequest::getVar('forumId'), false), $message, $msgtype);
        } else {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=postlist'.($parentId?'&parentId='.$parentId:'').($topic?'&topic=true':'').'&forumId='.(int)JRequest::getVar('forumId'), false), $message, $msgtype);
        }
    } //end addPost


    /**
     * Delete the post with the id supplied in the request
    */
    function delete()
    {
        $id = JRequest::getVar('id');
        $topic = JRequest::getVar('topic');
        $parentId = JRequest::getVar('parentId');

        $model = $this->getModel('postlist');

        if ($model->delete($id)) {
            $message = JText::_('THE POST HAS BEEN DELETED');
        } else {
            $message = $model->getError();
        }

        $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=postlist'.($parentId?'&parentId='.$parentId:'').($topic?'&topic=true':'').'&forumId='.(int)JRequest::getVar('forumId'), false), $message);
    } //end delete
} //end class
?>
