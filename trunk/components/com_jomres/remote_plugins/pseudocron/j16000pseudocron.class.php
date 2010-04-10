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

class j16000pseudocron
	{
	function j16000pseudocron()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		require_once(dirname(__FILE__).'/cron.class.php');

		global $jomresConfig_secret,$jomresConfig_live_site,$cronConfigOptions;
		$plugin="jomcompcronjobs";
		if (isset($_POST['method']) )
			$this->savecronconfigPlugin($plugin);
			
		$cronConfigOptions=$this->getcronconfig($plugin);

		$method = array();
		$method[] = jomresHTML::makeOption( 'Minicomponent', "Minicomponent" );
		$method[] = jomresHTML::makeOption( 'Cron', "Cron job" );
		$methodDropdown=jomresHTML::selectList( $method, 'method','class="inputbox" size="1"', 'value', 'text', $cronConfigOptions['method']);

		$displaylogging = array();
		$displaylogging[] = jomresHTML::makeOption( '1', "Yes" );
		$displaylogging[] = jomresHTML::makeOption( '0', "No" );
		$displayloggingDropdown=jomresHTML::selectList( $displaylogging, 'displaylogging','class="inputbox" size="1"', 'value', 'text', $cronConfigOptions['displaylogging']);

		$logging = array();
		$logging[] = jomresHTML::makeOption( '1', "Yes" );
		$logging[] = jomresHTML::makeOption( '0', "No" );
		$loggingDropdown=jomresHTML::selectList( $logging, 'logging','class="inputbox" size="1"', 'value', 'text', $cronConfigOptions['logging']);

		$verbose = array();
		$verbose[] = jomresHTML::makeOption( '1', "Yes" );
		$verbose[] = jomresHTML::makeOption( '0', "No" );
		$verboseDropdown=jomresHTML::selectList( $verbose, 'verbose','class="inputbox" size="1"', 'value', 'text', $cronConfigOptions['verbose']);

		echo "<hr>";
		?>
			<form action="" method="post" name="adminForm">
			<table cellpadding="4" cellspacing="0" border="0" width="100%">
			<tr>
				<td width="100%" class="sectionname">Cron job settings and logs</td>
			</tr>
			</table>
			<table class="jradmin_table" border="0">
			<tr align="center" valign="middle">
				<th width="20%" class="jomres_title">Summary</th>
				<th width="20%" class="jomres_title">Settings</th>
				<th width="60%" class="jomres_title">Explanation</th>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">Method</td>
				<td class="jradmin_subheader_la" valign="top"><?php echo $methodDropdown ;?></td>
				<td class="jradmin_subheader_la" valign="top">If you do not have access to cron jobs, set this to Minicomponent, otherwise create a cron job and tell it to run<br /> <i>curl -s http://<?php echo $jomresConfig_live_site; ?>/index2.php?option=com_jomres&task=cronjobs&no_html=1&secret=<?php echo $jomresConfig_secret; ?> > /dev/null</i> </td>
			</tr>
			
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">Display logging in the browser</td>
				<td class="jradmin_subheader_la" valign="top"><?php echo $displayloggingDropdown ;?></td>
				<td class="jradmin_subheader_la" valign="top">Only works if the method is set to Minicomponent.</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">Logging enabled</td>
				<td class="jradmin_subheader_la" valign="top"><?php echo $loggingDropdown ;?></td>
				<td class="jradmin_subheader_la" valign="top">Set this to Yes for logging to be enabled. The results of the logs will be output below.</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">Verbose logging</td>
				<td class="jradmin_subheader_la" valign="top"><?php echo $verboseDropdown ;?></td>
				<td class="jradmin_subheader_la" valign="top">Lots of logging output</td>
			</tr>
			<tr align="center" valign="middle">
				<th colspan="3">&nbsp;</th>
			</tr>
			</table>
			<input type="hidden" name="jomrestoken" value="<?php echo jomresSetToken();?>">
			<input type="hidden" name="task" value="pseudocron" />
			<input type="hidden" name="option" value="com_jomres" />
			<input type="submit" value="submit" class="button" />
			</form>
		<?php
		echo "<hr>";echo "<hr>";
		echo "Installed cron minicomponents. To run an individual cron job use the links specified below.<br />";
		$cron = new jomres_cron($displayLog);
		foreach ($cron->allJobs as $job)
			{
			echo '<a href="'.$jomresConfig_live_site."/index2.php?option=com_jomres&task=cron_".$job['job_name']."&secret=".$jomresConfig_secret.'" target="_blank" >'.$job['job_name'].'</a><br />';
			}

		echo "<hr>";echo "<hr>";
		echo "JOB LOGS";
		echo "<hr>";echo "<hr>";
		$query = "SELECT ";

		$query = "SELECT log_details FROM #__jomcomp_cronlog";
		$logDetails = doSelectSql($query);
		foreach ($logDetails as $log)
			{
			echo $log->log_details;
			echo "<hr>";
			}
		}
	
	function getcronconfig($plugin)
		{
		global $cronConfigOptions;
		$cronConfigOptions=array();
		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '".(int)$defaultProperty."' AND plugin = '$plugin'";
		$settingList=doSelectSql($query);
		
		foreach ($settingList as $s)
			{
			$cronConfigOptions[$s->setting]=$s->value;
			}
		return $cronConfigOptions;
		}
		
	function savecronconfigPlugin($plugin)
		{
		global $jomresAdminPath;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$defaultProperty="0";
		foreach ($_POST as $k=>$v)
			{
			$dirty = (string) $k;
			$k=RemoveXSS($dirty);
			if ($k!='task' && $k!='plugin' && $k !="jomrestoken" && $k !="option" )
				$values[$k]=jomresGetParam( $_POST, $k, "" );
			}
		foreach ($values as $k=>$v)
			{
			$query="SELECT id FROM #__jomres_pluginsettings WHERE prid = '".(int)$defaultProperty."' AND plugin = '$plugin' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (count($settingList)>0)
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomres_pluginsettings SET `value`='$v' WHERE prid = '".(int)$defaultProperty."' AND plugin = '$plugin' AND setting = '$k'";
				doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_PLUGINS_UPDATE',_JOMRES_MR_AUDIT_PLUGINS_UPDATE,FALSE));
				}
			else
				{
				$query="INSERT INTO #__jomres_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('".(int)$defaultProperty."','$plugin','$k','$v')";
				doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_PLUGINS_INSERT',_JOMRES_MR_AUDIT_PLUGINS_INSERT,FALSE));
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>