<?php
/**
#
 * Mini-component core file:
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

class j00599newuser
	{
	function j00599newuser()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $thisJRUser,$tmpBookingHandler,$jomresConfig_mailfrom,$jomresConfig_fromname,$jomresConfig_live_site;
		if (!$thisJRUser->userIsRegistered && defined('_JOMRES_NEWJOOMLA') )
			{
			require_once( JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'libraries'.JRDS.'joomla'.JRDS.'user'.JRDS.'helper.php' );
			$guestDeets = $tmpBookingHandler->getGuestData();
			$valid=false;
			while (!$valid)
				{
				$username = $guestDeets['firstname']."_".$guestDeets['surname'].rand(0, 1000);
				$query="SELECT FROM #__users WHERE username = '".$username."'";
				$users=doSelectSql($query);
				if (count($users)==0)
					$valid=true;
				}
			$name = $guestDeets['firstname']." ".$guestDeets['surname'];
			$usertype="Registered";
			$block = "0";
			
			$password = JUserHelper::genRandomPassword();
			$encryptedPassword=JUserHelper::getCryptedPassword($password);
			
			$query = "INSERT INTO #__users (
				`name`,
				`username`,
				`email`,
				`password`,
				`usertype`,
				`gid`,
				`registerDate`
				) VALUES (
				'".$name."',
				'".$username."',
				'".$guestDeets['email']."',
				'".$encryptedPassword."',
				'".$usertype."',
				18,
				'".date( 'Y-m-d H:i:s' )."'
				) ";
			$id=doInsertSql($query);
			if (!$id)
				{
				trigger_error ("Failed insert new user ".$query, E_USER_ERROR);
				$this->insertSuccessful =false;
				}
			else 
				{
				
				$query = "INSERT INTO #__core_acl_aro (
					`section_value`,
					`value`,
					`name`
					) VALUES (
					'users',
					'".$id."',
					'".$name."'
					) ";
				$aro=doInsertSql($query);
				$query = "INSERT INTO #__core_acl_groups_aro_map (
					`group_id`,
					`aro_id`
					) VALUES (
					18,
					".$aro."
					) ";
				$map=doInsertSql($query);
				
				
				$thisJRUser->userIsRegistered=true;
				$thisJRUser->id=$id;
				$tmpBookingHandler->updateGuestField('mos_userid',$id);
				$tmpBookingHandler->saveGuestData();
				
				$subject = jr_gettext('_JRPORTAL_NEWUSER_SUBJECT',_JRPORTAL_NEWUSER_SUBJECT,false,false);
				
				$text = jr_gettext('_JRPORTAL_NEWUSER_DEAR',_JRPORTAL_NEWUSER_DEAR,false,false)." ".stripslashes($guestDeets['firstname'])." ".stripslashes($guestDeets['surname'])." \t\n";
				$text .= jr_gettext('_JRPORTAL_NEWUSER_THANKYOU',_JRPORTAL_NEWUSER_THANKYOU,false,false)." \t\n";
				$text .= jr_gettext('_JRPORTAL_NEWUSER_USERNAME',_JRPORTAL_NEWUSER_USERNAME,false,false).$username." \t\n";
				$text .= jr_gettext('_JRPORTAL_NEWUSER_PASSWORD',_JRPORTAL_NEWUSER_PASSWORD,false,false).$password." \t\n";
				$text .= jr_gettext('_JRPORTAL_NEWUSER_LOG_IN',_JRPORTAL_NEWUSER_LOG_IN,false,false).$jomresConfig_live_site."\t\n\t\n";
				
				if (!jomresMailer($jomresConfig_mailfrom, $jomresConfig_fromname, $guestDeets['email'], $subject, $text,$mode=0))
					error_logging('Failure in sending registration email to guest. Target address: '.$hotelemail.' Subject'.$subject);
				}
			}
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_SUBJECT',_JRPORTAL_NEWUSER_SUBJECT);
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_DEAR',_JRPORTAL_NEWUSER_DEAR);
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_THANKYOU',_JRPORTAL_NEWUSER_THANKYOU);
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_USERNAME',_JRPORTAL_NEWUSER_USERNAME);
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_PASSWORD',_JRPORTAL_NEWUSER_PASSWORD);
		$output[]		=jr_gettext('_JRPORTAL_NEWUSER_LOG_IN',_JRPORTAL_NEWUSER_LOG_IN);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>