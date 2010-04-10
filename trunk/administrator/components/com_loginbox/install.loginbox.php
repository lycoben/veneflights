<?php

defined( '_JEXEC' ) or die( 'Restricted access' ); 

jimport('joomla.filesystem.file');
//jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.archive');

global $mainframe;

function loginboxMessage ($status, $message) 
{
 $result = '';   
 switch ($status) {
     case 1: 
       $result .= "<img src='".JURI::base()."components/com_loginbox/assets/images/tick.gif'>&nbsp;<font color=\"green\" style=\"font-family: courier, arial;font-size:8px; \">".$message."</font><br />";              
     break;
     case 3:
       $result .= "<br /><font color='orange' style=\"font-family: courier, arial;font-size:8px; \">WARNING! $message has encountered some minor problems during the install. Please check the log above and <a href=\"".JRoute::_('index.php?option=com_loginbox&task=reinstall', false)."\">try again</a>!</font>";          
     break;
     default:
       $result .= "<img src='".JURI::base()."components/com_loginbox/assets/images/cross.gif'>&nbsp;<font color=\"red\" style=\"font-family: courier, arial;font-size:8px; \">".$message."</font><br />";          
     break;   
     
 }   
 return $result;   
}

$db =& JFactory::getDBO();

$resultText = '<fieldset>';    
    
$hadProblems = false;   

$query = "CREATE TABLE IF NOT EXISTS `#__loginbutton_links` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(255) NOT NULL default '',
  `logout` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM";
$db->setQuery( $query );
$db->query();

$query = "SELECT COUNT(*) FROM `#__loginbutton_links`";
$db->setQuery( $query );
$numberOfLinks = $db->loadResult();

if ($numberOfLinks == 0) {
    $query = "INSERT INTO `#__loginbutton_links` (`id`,`login`,`logout`) VALUES (9,'<input type=\"button\" value=\"Login\" />','<input type=\"button\" value=\"Logout\" />')";
    $db->setQuery( $query );
    $db->query(); 
    
    $query = "INSERT INTO `#__loginbutton_links` (`id`,`login`,`logout`) VALUES (10,'<strong style=\"text-color:#00ff00;font-weight:bold;\">Login</strong>','<strong style=\"text-color:#ff0000;font-weight:bold;\">Logout</strong>')";
    $db->setQuery( $query );
    $db->query(); 
    
}

//make sure we see LoginBox in the components menu
$query = "UPDATE `#__components` SET `link`='option=com_loginbox', 
`admin_menu_link`='option=com_loginbox',
`admin_menu_img`='../administrator/components/com_loginbox/assets/images/icon.png' WHERE `option`='com_loginbox'";
$db->setQuery( $query );
$db->query(); 

//start: install plugin      

		$archivename = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_loginbox'.DS.'plugin_loginbutton_editor.zip';

		// Temporary folder to extract the archive into
		$tmpdir = JPATH_SITE.DS.'plugins'.DS.'editors-xtd'.DS;

		// Clean the paths to use for archive extraction
		$extractdir = JPath::clean($tmpdir);
		$archivename = JPath::clean($archivename);

		// do the unpacking of the archive
		$result = JArchive::extract( $archivename, $extractdir);

		if ( $result === false ) {
		    $hadProblems = true; 
    		$resultText .= loginboxMessage(0, "Couldn't install LoginButton Editor Plugin");

		} else {
            $query = "SELECT COUNT(*) FROM #__plugins WHERE element='loginbutton' AND folder='editors-xtd'";
            $db->setQuery( $query );
            
            if (!$db->loadResult()) {
                $query = "INSERT INTO `#__plugins` (`name`,`element`,`folder`,`access`,`ordering`,`published`,`iscore`,`client_id`,`checked_out`,`checked_out_time`,`params`) VALUES ('Editor Button - Login/Logout','loginbutton','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00','')";
                $db->setQuery( $query );
                $db->query();   
                $resultText .= loginboxMessage(1, "LoginButton Editor Plugin installed and published"); 
            }	
            	    		    
		}	
//end: install plugin

//start: install plugin      

		$archivename = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_loginbox'.DS.'plugin_loginlogout_content.zip';

		// Temporary folder to extract the archive into
		$tmpdir = JPATH_SITE.DS.'plugins'.DS.'content'.DS;

		// Clean the paths to use for archive extraction
		$extractdir = JPath::clean($tmpdir);
		$archivename = JPath::clean($archivename);

		// do the unpacking of the archive
		$result = JArchive::extract( $archivename, $extractdir);

		if ( $result === false ) {
		    $hadProblems = true; 
    		$resultText .= loginboxMessage(0, "Couldn't install LoginLogout Plugin");

		} else {
            $query = "SELECT COUNT(*) FROM #__plugins WHERE element='loginlogout' AND folder='content'";
            $db->setQuery( $query );
            
            if (!$db->loadResult()) {
                $query = "INSERT INTO `#__plugins` (`name`,`element`,`folder`,`access`,`ordering`,`published`,`iscore`,`client_id`,`checked_out`,`checked_out_time`,`params`) VALUES ('Content - LoginLogout','loginlogout','content',0,0,1,0,0,0,'0000-00-00 00:00:00','')";
                $db->setQuery( $query );
                $db->query();   
                $resultText .= loginboxMessage(1, "LoginLogout Plugin installed and published"); 
            }	
            	    		    
		}	
//end: install plugin

//start: install recly libs      

		$archivename = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_loginbox'.DS.'recly.zip';

		// Temporary folder to extract the archive into
		$tmpdir = JPATH_SITE.DS.'libraries'.DS;

		// Clean the paths to use for archive extraction
		$extractdir = JPath::clean($tmpdir);
		$archivename = JPath::clean($archivename);

		// do the unpacking of the archive
		$result = JArchive::extract( $archivename, $extractdir);

		if ( $result === false ) {
		    $hadProblems = true; 
    		$resultText .= loginboxMessage(0, "Couldn't install Recly classes");

		} 	
//end: install recly libs

 
    if (!$hadProblems) {       
        $resultText .= loginboxMessage(1, "LoginBox PRO successfully installed"); 
    } else {
        $resultText .= loginboxMessage(3, "LoginBox PRO"); 
    }   
    $resultText .= "</fieldset>";     
        
	$msg .= '<table width="100%" border="0" cellpadding="8" cellspacing="0">';
    $msg .= '<tr><td align="left" valign="top" width="150">';
    $msg .= "<img src='../components/com_loginbox/assets/images/logo.jpg'><br />
             (c) 2008 <a href=\"http://www.wowjoomla.com\">WowJoomla.com</a></td><td valign=\"top\">
             <h1 style=\"color:green\">Installation and upgrade report</h1>";          
    $msg .= $resultText;   
	$msg .='<br /><br /></td></tr></table>';

	echo $msg ;



?>
