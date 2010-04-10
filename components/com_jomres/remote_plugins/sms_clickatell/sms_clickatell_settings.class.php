<?php
/**
#
 * JRPortal core file
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
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

class jrportal_sms_clickatell_settings
	{
	function jrportal_sms_clickatell_settings()
		{
		$this->sms_clickatellConfigOptions=array();
		$this->sms_clickatellConfigOptions['api_id']="";
		$this->sms_clickatellConfigOptions['username']="";
		$this->sms_clickatellConfigOptions['password']="";
		}
	
	
	function get_sms_clickatell_settings()
		{
		
		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = 0 AND plugin = 'backend_sms_clickatell_settings'";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->sms_clickatellConfigOptions[$s->setting]=$s->value;
			}
		return $this->sms_clickatellConfigOptions;
		}

	function save_sms_clickatell_settings()
		{
		
		foreach ($_POST as $k=>$v)
			{
			$dirty = (string) $k;
			$k=addslashes($dirty);
			if ($k!='task' && $k!='plugin' && $k !="jomrestoken" && $k !="option" )
				$values[$k]=jomresGetParam( $_POST, $k, "" );
			}
		foreach ($values as $k=>$v)
			{
			$query="SELECT id FROM #__jomres_pluginsettings WHERE prid = 0 AND plugin = 'backend_sms_clickatell_settings' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (count($settingList)>0)
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomres_pluginsettings SET `value`='$v' WHERE prid = 0 AND plugin = 'backend_sms_clickatell_settings' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomres_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					(0,'backend_sms_clickatell_settings','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}

?>