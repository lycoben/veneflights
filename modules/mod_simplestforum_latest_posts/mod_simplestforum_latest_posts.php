<?php
/**
* @version 1.0.2
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
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once(dirname(__FILE__).DS.'helper.php');

$forumIds = $params->get('forumids');
$numPosts = $params->get('numposts');

$forumIds = explode(',', $forumIds);

$items = SimplestForumLatestPostsHelper::getItems($forumIds, $numPosts);

if (empty($items)) {
    return;
}

$introChars = $params->get('introchars');

$readmoreText = $params->get('readmore');
$showDate = $params->get('showdate');
$dateFormat = $params->get('dateformat');

$config = &JFactory::getConfig();
$offset = $config->getValue('offset');

require(JModuleHelper::getLayoutPath('mod_simplestforum_latest_posts'));
