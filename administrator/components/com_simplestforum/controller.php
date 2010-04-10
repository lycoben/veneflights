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

        $this->registerTask('add', 'edit');
        $this->registerTask('remove', 'delete');
    }

    /**
     * Cancels a forum edit operation.
     * @param tmpl The template
    */
    function cancel($tmpl = null)
    {
        $msg = JText::_('FORUM EDIT CANCELED');

        $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), $msg);
    }

    function display($tmpl = null)
    {
        parent::display($tmpl);
    }

    /**
     * Initiates a forum edit operation.
     * @param tmpl The template
    */
    function edit($tmpl = null)
    {
        JRequest::setVar('view', 'forumedit');

        parent::display($tmpl);
    } //end edit

    /**
     * Initiates a forum save operation.
     * @param tmpl The template
    */
    function save($tmpl = null)
    {
        JRequest::setVar('view', 'forumlist');

        $data = JRequest::get('post');
        $model = $this->getModel('forumedit');

        if ($model->store($data)) {
            $message = JText::_('FORUM SAVED SUCCESSFULLY');
        } else {
            $message = $model->getError();
        }

        $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), $message);
    } //end save

    /**
     * Initiates a forum delete operation.
     * @param tmpl The template
    */
    function delete($tmpl = null)
    {
        JRequest::setVar('view', 'forumlist');

        $data = JRequest::get('post');
        $model = $this->getModel('forumlist');

        if ($model->delete($data)) {
            $message = JText::_('FORUM(S) REMOVED SUCCESSFULLY');
        } else {
            $message = $model->getError();
        }

        $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), $message);
    } //end delete

    /**
     * Makes copies of the current database tables for a future upgrade.
    */
    function backup()
    {
        $db = &JFactory::getDBO();

        // uninstall any existing back up table
        $script = file_get_contents(JPATH_COMPONENT.DS.'uninstall.mysql.utf8.sql');
        $forumStatement = explode(';', $script);
        $postStatement = $forumStatement[1];
        $forumStatement = $forumStatement[0];

        $db->setQuery(str_replace('#__simplestforum_forum', '#__simplestforum_forum_backup', $forumStatement));
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO REMOVE BACKUP TABLE X1', '#__simplestforum_forum'), 'error');
            return;
        }

        $db->setQuery(str_replace('#__simplestforum_post', '#__simplestforum_post_backup', $postStatement));

        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO REMOVE BACKUP TABLE X1', '#__simplestforum_post'), 'error');
            return;
        }

        $query = 'DROP TABLE IF EXISTS #__simplestforum_configuration';
        $db->setQuery($query);
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::_('ERROR UNABLE TO REMOVE BACKUP CONFIGURATION'), 'error');
            return;
        }


        // get the installation mysql file to create the new tables and back up the configuration

        // back up the configuration
        $query = 'CREATE TABLE #__simplestforum_configuration (`params` text, `oldComponentId` int)';
        $db->setQuery($query);
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::_('ERROR UNABLE TO CREATE BACKUP CONFIGURATION'), 'error');
            return;
        }

        $query = 'INSERT INTO #__simplestforum_configuration
                  SELECT a.params, a.id FROM #__components AS a WHERE a.option = '.$db->Quote('com_simplestforum')
        ;
        $db->setQuery($query);
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::_('ERROR UNABLE TO CREATE BACKUP CONFIGURATION'), 'error');
            return;
        }


        $script = file_get_contents(JPATH_COMPONENT.DS.'install.mysql.utf8.sql');

        $forumStatement = explode(';', $script);
        $postStatement = $forumStatement[1];
        $forumStatement = $forumStatement[0];

        $db->setQuery(str_replace('#__simplestforum_forum', '#__simplestforum_forum_backup', $forumStatement));
        
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO CREATE BACKUP TABLE X1', '#__simplestforum_forum'), 'error');
            return;
        }

        $db->setQuery(str_replace('#__simplestforum_post', '#__simplestforum_post_backup', $postStatement));

        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO CREATE BACKUP TABLE X1', '#__simplestforum_post'), 'error');
            return;
        }

        $query = 'INSERT IGNORE INTO #__simplestforum_forum_backup
                  SELECT *
                  FROM #__simplestforum_forum'
        ;
        $db->setQuery($query);
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO POPULATE BACKUP TABLE X1', '#__simplestforum_forum_backup'), 'error');
            return;
        }

        $query = 'INSERT IGNORE INTO #__simplestforum_post_backup
                  SELECT *
                  FROM #__simplestforum_post'
        ;
        $db->setQuery($query);
        if (!$db->query()) {
            $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::sprintf('ERROR UNABLE TO POPULATE BACKUP TABLE X1', '#__simplestforum_post_backup'), 'error');
            return;
        }

        $this->setRedirect(JRoute::_('index.php?option=com_simplestforum&view=forumlist', false), JText::_('BACKUP SUCCESS'), 'message');
    } //end backup

} //end class
?>
