<?php 
/**
 * $Id: admin.xmap.php 129 2008-03-13 13:24:24Z root $
 * $LastChangedDate: 2008-03-13 07:24:24 -0600 (jue, 13 mar 2008) $
 * $LastChangedBy: root $
 * Xmap by Guillermo Vargas 
 * a sitemap component for Joomla! CMS (http://www.joomla.org)
 * Author Website: http://joomla.vargas.co.cr
 * Project License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

$cid 	= JRequest::getVar('cid', array(0),"POST" );
$task 	= JRequest::getVar('task', '' ,"REQUEST");

$live_site = substr_replace(JURI::root(), "", -1, 1);

jimport('joomla.filesystem.path');
jimport('joomla.filesystem.file');

global $xmapComponentURL,$xmapSiteURL,$xmapComponentPath,$xmapAdministratorURL,$xmapLang,$xmapAdministratorPath;

$lang =& JFactory::getLanguage();
$xmapLang = strtolower($lang->getBackwardLang());
$xmapComponentPath = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_xmap';
$xmapComponentURL = $live_site.'/administrator/components/com_xmap';
$xmapAdministratorPath = JPATH_ADMINISTRATOR;
$xmapAdministratorURL = $live_site.'/administrator';
$xmapSiteURL = $live_site;

// load language file
if( file_exists( $xmapComponentPath.DS.'language'.DS . $xmapLang . '.php') ) {
	require_once( $xmapComponentPath.DS.'language'.DS.$xmapLang.'.php' );
} else {
	if ($task != 'ajax_request') {
		echo 'Language file [ '. $xmapLang .' ] not found, using default language: english<br />';
	}
	$xmapLang = 'english';
	require_once( $xmapComponentPath.DS.'language'.DS.'english.php' );
}

require_once( $xmapComponentPath.DS.'classes'.DS.'XmapAdmin.php' );

JToolBarHelper::title ( 'Xmap', 'generic' );

// load settings from database
require_once( $xmapComponentPath.DS.'classes'.DS.'XmapConfig.php' );
require_once( $xmapComponentPath.DS.'admin.xmap.html.php' );
$config = new XmapConfig;
if( !$config->load() ) {
	$text = _XMAP_ERR_NO_SETTINGS."<br />\n";
	$link = 'index2.php?option=com_xmap&task=create';
	echo sprintf( $text, $link );
}

$admin = new XmapAdmin();
$admin->show( $config, $task, $cid );

