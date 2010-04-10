<?php
/**
* @version $Id: install.xcloner.php 57 2007-07-08 18:05:52Z soeren $
* @package XCloner
* @copyright (C) 2005-2007 JoomlaPlug.com
* @license JoomalPlug.com
* @author Ovidiu
*/
function com_install(){
	global $database;

    if( is_callable( array( 'JFactory', 'getDBO' ))) {
		$database = JFactory::getDBO();
	}
    $mypath = dirname(__FILE__);
 
    @chmod("components/com_xcloner/cloner.config.php", 0777);
    @mkdir("backups", 0777);
    @chmod("backups", 0777);
    @chmod("components/com_xcloner/configs", 0777);
    @chmod("components/com_xcloner/browser", 0755);
    @chmod("components/com_xcloner/", 0755);	
    @chmod("components/com_xcloner/index.php", 0755);
    @chmod("components/com_xcloner/index2.php", 0755);	
    @chmod("components/com_xcloner/cloner.cron.php", 0755);

    error_reporting( E_ALL ^ E_NOTICE );

	//add new admin menu images
	$database->setQuery("UPDATE #__components SET admin_menu_img = 'components/com_xcloner/images/xcloner.png' WHERE admin_menu_link = 'option=com_xcloner'");
    $database->query();
}
?>
