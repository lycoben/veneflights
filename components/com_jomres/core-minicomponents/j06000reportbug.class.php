<?php
/**
#
 * Mini-component core file: Constructs and displays the manager's menu
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
* @subpackage mini-components
#
* @copyright	2005-2008 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */

// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

/**
#
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 #
* @package Jomres
#
 */
class j06000reportbug {

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function j06000reportbug($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $jomresConfig_live_site,$mrConfig,$ePointFilepath,$jomresConfig_mailfrom,$jomresConfig_fromname,$jomresConfig_sitename;
		global $jomresConfig_host,$jomresConfig_user,$jomresConfig_password,$_VERSION,$thisJRUser;
		if ($thisJRUser->superPropertyManager)
			{
			$link = mysql_connect($jomresConfig_host, $jomresConfig_user, $jomresConfig_password);
			$serverinfo=mysql_get_server_info();
			$currentPage = jomresGetParam( $_REQUEST, 'currentPage', '' );
		    $s=parseConfiguration();

			$safemode=$s["PHP Core"]['safe_mode'][1];
			$image="/components/com_jomres/images/jomresimages/small/EmailSend.png";
			$sitename="Site name : ".$jomresConfig_sitename;
			$joomlaUrl="CMS url : ".$jomresConfig_live_site;
			$jomresVersion="Jomres version : ".$mrConfig['version'];
			$joomlaVersion="CMS version : ".$_VERSION->PRODUCT.' '.$_VERSION->RELEASE.'.'.$_VERSION->DEV_LEVEL.' '.$_VERSION->DEV_STATUS;
			$phpVersion="PHP Version : ".phpversion();
			$safeMode="Safe Mode : ".$safemode;
			$mySqlVersion="MySql version : ".$serverinfo;
			$userAgent="User agent : ".$_SERVER['HTTP_USER_AGENT'];
			$serverSoftware="Server software : ".$_SERVER['SERVER_SOFTWARE'];
			$opSys="Operating system : ".php_uname ();

			$currentPage="Report triggered at page : $currentPage";
			$yourreport="Your bug report : ";
			$adminLogin="Admin userid : admin";
			$adminPassword="Admin password : ";
			$guestLogin="Guest login  :";
			$guestPassword="Guest password :";

			$debug=$yourreport."\n";
			$debug.="\n";
			$debug.="\n";
			$debug.="\n";

			$debug.=$adminLogin."\n";
			$debug.=$adminPassword."\n";
			$debug.=$guestLogin."\n";
			$debug.=$guestPassword."\n";

			$debug.="\n";
			$debug.=$currentPage."\n";
			$debug.=$sitename."\n";
			$debug.=$joomlaUrl."\n";
			$debug.=$jomresVersion."\n";
			$debug.=$joomlaVersion."\n";
			$debug.=$phpVersion."\n";
			$debug.=$safeMode."\n";
			$debug.=$mySqlVersion."\n";
			$debug.=$userAgent."\n";
			$debug.=$serverSoftware."\n";
			$debug.=$opSys."\n";

			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->customToolbarItem("SEND",jomresURL("index.php?option=com_jomres&task=sendbug&currentPage=$currentPage&Itemid=$Itemid"),$text="Send Bug",$submitOnClick=true,$submitTask="sendbug",$image);
			$jrtb .= $jrtbar->endTable();

			$output['SENDBUTTON']=$jrtb;
			$output['DEBUGINFO']=$debug;
			$output['ADMINEMAIL']=$jomresConfig_mailfrom;

			$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'edit_bug.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->displayParsedTemplate();
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>