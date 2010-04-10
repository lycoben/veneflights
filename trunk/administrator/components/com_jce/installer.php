<?php
/**
* @version		$Id: admin.installer.php 9764 2007-12-30 07:48:11Z ircmaxell $
* @package		Joomla
* @subpackage	Installer
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
 * Make sure the user is authorized to view this page
 */

$ext = JRequest::getWord('type');

$subMenus = array(
	'Plugins' 			=> 'plugin',
	'Languages' 		=> 'language',
	'Plugin Extensions' => 'extension'
);
JSubMenuHelper::addEntry(JText::_( 'Control Panel' ), '#" onclick="javascript:document.adminForm.type.value=\'\';document.adminForm.task.value=\'\';submitbutton(\'\');', !in_array( $ext, $subMenus));
JSubMenuHelper::addEntry(JText::_( 'Install' ), '#" onclick="javascript:document.adminForm.type.value=\'install\';document.adminForm.task.value=\'\';submitbutton(\'\');', !in_array( $ext, $subMenus));


foreach ($subMenus as $name => $extension) {
	JSubMenuHelper::addEntry(JText::_( $name ), '#" onclick="javascript:document.adminForm.type.value=\''.$extension.'\';submitbutton(\'manage\');', ($extension == $ext));
}
require_once( dirname( __FILE__ ) .DS. 'installer' .DS. 'controller.php' );
$controller = new InstallerController( array(
	'default_task' => 'installform', 
	'base_path' =>  dirname( __FILE__ ) .DS. 'installer'
) );
$task = JRequest::getWord('task');
if( $task == 'install' ){
	$task = 'doInstall';
}
$controller->execute( $task );
$controller->redirect();