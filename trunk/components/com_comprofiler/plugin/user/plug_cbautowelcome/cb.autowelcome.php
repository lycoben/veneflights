<?php
/**
* Joomla Community Builder User Plugin: plug_cbautowelcome
* @version $Id$
* @package plug_cbautowelcome
* @subpackage cb.autowelcome.php
* @author Nick A. (aka nant)
* @copyright (C) Nant, JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @final 1.2 RC
*/

/** ensure this file is being included by a parent file **/
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

$_PLUGINS->registerFunction( 'onUserActive', 'awUserActivated', 'plug_cbautowelcomeclass' );

/**
 * Need to generate tab object to grab plugin parameters.
 */
class plug_cbautowelcomeclass extends cbTabHandler {
	
	/**
	 * Construnctor
	 */
	function plug_cbautowelcomeclass() {
		$this->cbTabHandler();
	}
	
	/**
	 * Get all plugin, tab, and CB fields related with this application
	 * @access private
	 * @param object mosUser reflecting the user being displayed
	 */
	function _awGetPlugParameters(){

		$params = $this->params;
		
		// Plugin Parameters
		$PlugParams["awautomessageenable"] = intval($params->get('awAutoMessageEnable', 0));
		$PlugParams["awmessagemethod"] = intval($params->get('awMessageMethod', 0));
		
		$PlugParams["awpmsmessagesubject"] = $params->get('awPMSMessageSubject', "Welcome Aboard [Name]!");
		$PlugParams["awpmsmessagebody"] = $params->get('awPMSMessageBody', "Hello [NAME], Welcome to our site!");
		$PlugParams["awpmsfromuserid"] = intval($params->get('awPMSFromUserId', 62));

		$PlugParams["awemailmessagesubject"] = $params->get('awEMAILMessageSubject', "Welcome Aboard [NAME]!");
		$PlugParams["awemailmessagebody"] = $params->get('awEMAILMessageBody', "Hello [NAME], Welcome to our site!");
		$PlugParams["awemailfromuserid"] = intval($params->get('awEMAILFromUserId', 62));

		
		$PlugParams["awautoconnectenable"] = $params->get('awAutoConnectEnable', 0);
		$PlugParams["awautoconnectmessage"] = $params->get('awConnectMessage', 'Auto Connection Request');
		$PlugParams["awkeyuserid"] = intval($params->get('awKeyUserId', 62));
		$PlugParams["awautoconnectdirection"] = intval($params->get('awAutoConnectDirection', 0));
			
		return $PlugParams;
	}
	
	function awUserActivated($user, $success) {
		global $_CB_framework, $ueConfig;
		
		if (!$success) return false;
		
		$res_wpms = true;
		$res_wemail = true;		
		$res_wconnect = true;
		
		$plugparams=$this->_awGetPlugParameters();
		
		$testNotifications = new cbNotification();
	
		if ($plugparams["awautomessageenable"]) {
			switch ($plugparams["awmessagemethod"]) {
				case 0: // PMS
					$cbawNotification = new cbNotification();
					$res_wpms = $cbawNotification->sendUserPMSmsg($user->id,
						$plugparams["awpmsfromuserid"],
						$this->aw_replaceVariables(getLangDefinition($plugparams["awpmsmessagesubject"]),$user),
						$this->aw_replaceVariables(getLangDefinition($plugparams["awpmsmessagebody"]),$user), 
						true);
					if (!$res_wpms) {
						$this->_setErrorMSG("Auto-Welcome plugin failed to send PMS welcome message");
					}
					break;
				case 1: // Email
					$cbawNotification = new cbNotification();
					$res_wemail=$cbawNotification->sendUserEmail($user->id,
						$plugparams["awemailfromuserid"],
						$this->aw_replaceVariables(getLangDefinition($plugparams["awemailmessagesubject"]),$user),
						$this->aw_replaceVariables(getLangDefinition($plugparams["awemailmessagebody"]),$user),
						$plugparams["awemailfromuserid"]);	//reveal email
					if (!$res_wemail) {
						$this->_setErrorMSG("Auto-Welcome plugin failed to send Email welcome message");
					}			
					break;
				case 2: // Email and PMS
					$cbawNotification = new cbNotification();
					$res_wpms = $cbawNotification->sendUserPMSmsg($user->id,
						$plugparams["awpmsfromuserid"],
						$this->aw_replaceVariables(getLangDefinition($plugparams["awpmsmessagesubject"]),$user),
						$this->aw_replaceVariables(getLangDefinition($plugparams["awpmsmessagebody"]),$user), 
						true);
					if (!$res_wpms) {
						$this->_setErrorMSG("Auto-Welcome plugin failed to send PMS welcome message");
					}
					$res_wemail=$cbawNotification->sendUserEmail($user->id,
						$plugparams["awemailfromuserid"],
						$this->aw_replaceVariables(getLangDefinition($plugparams["awemailmessagesubject"]),$user),
						$this->aw_replaceVariables(getLangDefinition($plugparams["awemailmessagebody"]),$user),
						$plugparams["awpmsfromuserid"]);	//reveal email				
					if (!$res_wemail) {
						$this->_setErrorMSG("Auto-Welcome plugin failed to send Email welcome message");
					}			
					break;
				default:
					break;
			}		
		}
	
		if ($plugparams["awautoconnectenable"] && $ueConfig['allowConnections']) {
		
			$awkeyuserid_count = substr_count($plugparams["awkeyuserid"],',');
			$res_wconnect = true;
			$awkeyuserid_item = explode(",",$plugparams["awkeyuserid"]);
			
			if ($plugparams["awautoconnectdirection"]==0) { // connect new user to key users
				$cbawCon=new cbConnection($user->id);
				for ($aw_i=0;$aw_i<=$awkeyuserid_count;$aw_i++) {
					$res_wconnect = $res_wconnect && $cbawCon->addConnection($awkeyuserid_item[$aw_i],
						$this->aw_replaceVariables(getLangDefinition($plugparams["awautoconnectmessage"]),$user));
				}
				if (!$res_wconnect) {
					$this->_setErrorMSG("Auto-Welcome plugin failed to initiate auto-connection");
				}
				unset($cbawCon); // cleanup			
			} else { // connect key users to new user
				for ($aw_i=0;$aw_i<=$awkeyuserid_count;$aw_i++) {
					$cbawCon=new cbConnection($awkeyuserid_item[$aw_i]);
					$res_wconnect = $res_wconnect && $cbawCon->addConnection($user->id,
						$this->aw_replaceVariables(getLangDefinition($plugparams["awautoconnectmessage"]),$user));
					unset($cbawCon); // cleanup
				}
				if (!$res_wconnect) {
					$this->_setErrorMSG("Auto-Welcome plugin failed to initiate auto-connection");
				}
			}
		}
		
		if (!($res_wemail && $res_wpms && $res_wconnect)) {
			$this->raiseError(0);
		}
		
		return $res_wemail && $res_wpms && $res_wconnect;
	}
	
	
	/**
	 * This function is basically a copy of the CB replaceVariables function
	 * that substitutes [fieldname] type strings with their values.
	 * Extended to take care or [NL] tag.
	 *
	 * @param unknown_type $msg
	 * @param unknown_type $row
	 * @return unknown
	 */
	function aw_replaceVariables($msg, $row){
		global $_CB_framework;
		
		$msg = str_replace( array( '\n' ), array( "\n" ), $msg ); 
		$msg = cbstr_ireplace("[USERNAME]", $row->username, $msg);
		$msg = cbstr_ireplace("[NAME]", $row->name, $msg);
		$msg = cbstr_ireplace("[EMAILADDRESS]", $row->email, $msg);
		$msg = cbstr_ireplace("[SITEURL]", $_CB_framework->getCfg( 'live_site' ), $msg);
		$msg = cbstr_ireplace("[DETAILS]", $this->aw_getUserDetails($row,$_CB_framework->getCfg( 'emailpass' )), $msg);
		$msg = cbstr_ireplace("[NL]", "\n", $msg);
		$msg = cbstr_ireplace("<br />", "\n", $msg);
		$array = array();
		$array=get_object_vars($row);
		foreach( $array AS $k=>$v) {
			if(!is_object($v) && !is_array($v)) {
				if (!(strtolower($k) == "password" && strlen($v) >= 32)) {
					$msg = cbstr_ireplace("[".$k."]", getLangDefinition($v), $msg );
				}
			}
		}
		return $msg;
	}
	
	/**
	 * Another CB function copied to work here.
	 *
	 * @param unknown_type $row
	 * @param unknown_type $includePWD
	 * @return unknown
	 */
	function aw_getUserDetails($row,$includePWD) {
		$uDetails = _UE_EMAIL." : ".$row->email;
		$uDetails .= "\n"._UE_UNAME." : ".$row->username."\n";
		if($includePWD==1) $uDetails .= _UE_PASS." : ".$row->password."\n";
	 	return $uDetails;
	}
} // end of class plug_cbautowelcomeclass
?>