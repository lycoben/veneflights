<?php
/**
#
 * Mini-component : Includes the cron class and triggers any cron jobs
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
if (defined('JPATH_BASE'))
	defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
else
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
// ################################################################




class j16000upgrade_joomla
	{
	function j16000upgrade_joomla ()
		{
		global $ePointFilepath,$jomresConfig_secret;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->updateServer="http://updates.jomres.net";
		$this->updateFolder=JOMRESPATH_BASE."/updates";
		$upgradeJoomla=jomresGetParam( $_REQUEST, 'upgradeJoomla', false );
		if (!$upgradeJoomla)
			{
			if (!$this->checkJoomlaVersion())
				{
				echo "Error, it looks like you're running an out of date version of Joomla. You are advised to upgrade as soon as you can. If you would like Jomres to upgrade for you please <a href=\"index2.php?option=com_jomres&task=upgrade_joomla&upgradeJoomla=true\">click here</a> but you must ensure that you've performed a full file and mysql backup first. <br/>Woollyinwales IT cannot be held responsible if there is a problem with the Jomres Joomla upgrade process, if in doubt, please download the official Joomla patches from <a href='http://www.joomla.org/download.html' target='_blank'>Joomla.org</a> and upload them yourself.";
				}
			else
				{
				echo "If you would like Jomres to re-install Joomla for you please <a href=\"index2.php?option=com_jomres&task=upgrade_joomla&upgradeJoomla=true\">click here</a> but you must ensure that you've performed a full file and mysql backup first. <br/>Woollyinwales IT cannot be held responsible if there is a problem with the Jomres Joomla upgrade process, if in doubt, please download the official Joomla patches from <a href='http://www.joomla.org/download.html' target='_blank'>Joomla.org</a> and upload them yourself.";
				}
			}
		else
			{
			if ($this->checkJoomlaDirectories())
				$this->upgradeJoomla();
			}
		}
	
	

	function upgradeJoomla()
		{
		if ($this->checkJoomlaDirectories())
			{
			require_once (JOMRESPATH_BASE."/libraries/dUnzip2.inc.php");
			$updateServerVersion=$this->queryUpdateServer();
			$latestJoomla="Joomla_".$updateServerVersion."-Stable-Full_Package.zip";
			$newJoomlafilename=$this->updateFolder.JRDS.$latestJoomla;
			$out = fopen($newJoomlafilename, 'wb');
			if ($out == FALSE)
				{
				print "Couldn't create new file $newJoomlafilename. Possible file permission problem?<br/>";
				exit;
				}
			$serverFile=$this->updateServer."/joomla/".$latestJoomla;
			echo "Attempting to download ".$serverFile."<br/>";
			set_time_limit(0);
			$curl_handle = curl_init($latestJoomla);
			curl_setopt($curl_handle, CURLOPT_FILE, $out);
			curl_setopt($curl_handle, CURLOPT_HEADER, 0);
			curl_setopt($curl_handle, CURLOPT_URL, $serverFile);
			curl_exec($curl_handle);
			curl_close($curl_handle);
			fclose($out);
			
			if (file_exists($newJoomlafilename) && filesize($newJoomlafilename)>0 )
				echo "Got it<br />";
			else
				{
				echo "Something went wrong downloading Joomla. Quitting";
				return;
				}

			$zip = new dUnzip2($newJoomlafilename);
			// Activate debug
			$zip->debug = false;
			// Unzip all the contents of the zipped file to this folder
			$zip->getList();
			
			if (is_dir(JOMRESPATH_BASE.JRDS."updates".JRDS."joomla") )
				{
				echo "Attempting to remove ".JOMRESPATH_BASE.JRDS."updates".JRDS."joomla"."<br />";
				if (rmdir(JOMRESPATH_BASE.JRDS."updates".JRDS."joomla"))
					echo "Removed ".JOMRESPATH_BASE.JRDS."updates".JRDS."joomla"."<br />";
				}
			if (mkdir(JOMRESPATH_BASE.JRDS."updates".JRDS."joomla"))
				{
				echo "Unzipping<br />";
				$zip->unZipAll(JOMRESPATH_BASE.JRDS."updates".JRDS."joomla");
				dirmv(JOMRESPATH_BASE.JRDS."updates".JRDS."joomla", JOMRESCONFIG_ABSOLUTE_PATH.JRDS, true, $funcloc = JRDS);
				emptyDir(JOMRESCONFIG_ABSOLUTE_PATH.JRDS."installation");
				if (!rmdir  (JOMRESCONFIG_ABSOLUTE_PATH.JRDS."installation"))
					echo "Error removing the installation folder, please do it manually";

				echo "Completed download and unzip of Joomla to ".$updateServerVersion.". <i>Note that we do not claim any rights or otherwise for Joomla, this service is purely a convenience feature for our Jomres users.</i><br/>";
				
				}
			else
				echo "Oop, can't make ".JOMRESPATH_BASE.JRDS."updates".JRDS."joomla"."<br />";
			set_time_limit(30);
			}
		else
			{
			echo "Error, it's not possible to upgrade Joomla on this server as one or more files is not writable by php. Please perform the upgrade manually<br/>";
			foreach ($this->directoryScanResults as $f)
				{
				echo $f."<br />";
				}
			return;
			}
		}
		
	function checkJoomlaVersion()
		{
		if (defined('_JOMRES_NEWJOOMLA'))
			{
			$version=$GLOBALS['version'];
			$currentVersion = $version->RELEASE.".".$version->DEV_LEVEL;
			$updateServerVersion=$this->queryUpdateServer();
			if ($updateServerVersion != $currentVersion && strlen($updateServerVersion) > 0 )
				return false;
			else
				return true;
			}
		else
			return true;
		}
		
	function queryUpdateServer()
		{
		$curl_handle=curl_init();
		curl_setopt($curl_handle,CURLOPT_URL,$this->updateServer."/versions.php?r=1");
		curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
		curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
		$response = trim(curl_exec($curl_handle));
		curl_close($curl_handle);
		return $response;
		}
		
	function checkJoomlaDirectories()
		{
		global $myfiles;
		$this->directoryScanResults=array();
		$joomlaDir = JOMRESCONFIG_ABSOLUTE_PATH;
		$files_array = $this->recur_dir($jomresAdminDir);

		//var_dump($this->is_removeable($jomresAdminDir));exit;
		if (count($this->directoryScanResults) > 0)
			{
			return false;
			}
		return true;
		}
	
	function recur_dir($dir,$getWritablesFiles=false)
		{
		$dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
			if ($file != '.' && $file != '..')
			{

			$newpath = $dir.JRDS.$file;
			if ($getWritablesFiles)
				{
				if (is_file($newpath) && is_writable($newpath) )
					$this->directoryScanResults[] = $dir.JRDS.$file;
				}
			else
				{
				if (is_file($newpath) && !is_writable($newpath) )
					$this->directoryScanResults[] = $dir.JRDS.$file;
				}
			$level = explode(JRDS,$newpath);
			if (is_dir($newpath))
				{
				$mod_array[] = array(
						'level'=>count($level)-1,
						'path'=>$newpath,
						'name'=>end($level),
						'kind'=>'dir',
						'mod_time'=>filemtime($newpath),
						'content'=>$this->recur_dir($newpath));
				}
			else
				{
				$mod_array[] = array(
						'level'=>count($level)-1,
						'path'=>$newpath,
						'name'=>end($level),
						'kind'=>'file',
						'mod_time'=>filemtime($newpath),
						'size'=>filesize($newpath));
				}
			}
		}
		closedir($dirlist);
		return $mod_array;
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
	
?>