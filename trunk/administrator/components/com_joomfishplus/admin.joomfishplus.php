<?php
/**
 * Joom!Fish Plus - Frontend Translation for Joomfish
 * Copyright (C) 2008 GWE Systems Ltd
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: admin.joomfish.php 928 2008-03-30 10:51:32Z geraint $
 *
*/

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

//echo "This will feature translator management - but its not fully written yet";return;

jimport('joomla.filesystem.path');

// disable Zend php4 compatability mode - this causes problem with passing translations by reference
// see http://forum.joomla.org/index.php/topic,80065.msg451560.html#msg451560 for details of problem
// See http://uk.php.net/ini.core for description of the flag
@ini_set("zend.ze1_compatibility_mode","Off");

/** required standard extentions **/
require_once( JPATH_SITE .DS. 'components' .DS. 'com_joomfish' .DS. 'helpers' .DS. 'defines.php' );

require_once(  JOOMFISH_ADMINPATH .DS. 'classes'.DS. 'JoomfishManager.class.php' );
$joomFishManager = JoomFishManager::getInstance( dirname( __FILE__ ) );

$lang = JFactory::getLanguage();
// Load Joomfish language files
$lang->load("com_joomfish");

$cmd = JRequest::getCmd('task', 'translator.overview');

if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);
	
	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	
	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
} else {
	// Base controller, just set the task 
	$controllerName = null;
	$task = $cmd;
}

// Set the name for the controller and instantiate it
$controllerClass = ucfirst($controllerName).'Controller';
if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class - '.$controllerClass );
}

$config	=& JFactory::getConfig();

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();
