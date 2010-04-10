<?php
/**
* @version		$Id: helper.php 8379 2007-08-10 23:20:01Z eddieajau $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
* Camp26.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once( dirname(__FILE__).DS.'helper.php' );
$document =& JFactory::getDocument();
$map['id']					= $params->get('id',0);
$map['plugin']				= $params->get('plugin',0);
$map['type']				= $params->get('typedisplay', 'js');
$map['width']				= $params->get('width',1000);
$map['height']				= $params->get('height',500);
$map['version']				= $params->get('version',8);
$map['background']			= $params->get('background','#000000');
$map['path']				= $params->get('path','components/com_yos_ammap/ammap');
$map['data_file']			= $params->get('data_file','ammap_data.xml');
$map['settings_file']		= $params->get('settings_file','ammap_settings.xml');
$map['preloader_color']		= $params->get('preloader_color','#999999');
$map['loading_data']		= $params->get('loading_data','Loading data');
$map['loading_settings']	= $params->get('loading_settings','Loading settings');
if (!$map['id']) {
	$document->addScript($map['path'].'/swfobject.js');
} else {
	$document->addScript('components/com_yos_ammap/ammap/swfobject.js');	
}

JHTML::_('behavior.mootools');

switch ($map['type']){
	case 'js':
		$script						= modAmmapHelper::getMap_swfobject($map);		
		break;
	case 'fl':
	default:
		$script						= modAmmapHelper::getMap_flash($map);
		break;
}

require(JModuleHelper::getLayoutPath('mod_yos_ammap'));
?>