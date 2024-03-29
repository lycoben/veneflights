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

class j16000updates
	{
	function j16000updates()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents,$jomresConfig_live_site,$jomresConfig_offline;
		if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.'/includes/defines.php') )
			{
			$CONFIG = new JConfig();
			$jomresConfig_offline			= $CONFIG->offline;
			}
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->updateServer="http://updates.jomres.net";
		$this->updateFolder=JOMRESPATH_BASE."/updates";
		$this->overwriteAllowed = true;
		$this->movedFileLog = array();
		$this->debugging = false;
		$this->test_download = false;
		// Use your own FTP info
		$this->ftp_user_name = 'userid';
		$this->ftp_user_pass = 'password';
		$this->ftp_server = 'localhost';
		$this->ftp_root = JOMRESCONFIG_ABSOLUTE_PATH;
		if (!$this->checkUpdateDirectory())
			{
			echo "Can't create update folder $this->updateFolder";
			return;
			}
		if (!isset($_REQUEST['ftp_user_name']))
			{
			if (!$this->checkJomresDirectories())
				{
				$detect_os = strtoupper($_SERVER["SERVER_SOFTWARE"]); // converted to uppercase
				$pos = strpos($detect_os, "WIN32");
				$IIS = strpos($detect_os, "IIS");
				if ($pos === false && $IIS === false)
					{
					if (!isset($_REQUEST['ftp_user_name']) )
						{
						echo "Error, you have one or more files that are not writable by php. It is probable that they are owned by your ftp user but not by the webserver's user. Please change the permissions of the files so that they can be modified by the webserver. You may need to contact your host if you cannot do this yourself.<br /><br />";
						echo "We can try to modify the these files via ftp if you wish. Please enter your FTP server login details below.";
						?>
						<form action="" method="post" name="adminForm">
						FTP Username<input  class="inputbox" size="39" type="text" name="ftp_user_name" value="<?php echo $this->ftp_user_name;?>" >
						FTP Password<input  class="inputbox" size="39" type="text" name="ftp_user_pass" value="<?php echo $this->ftp_user_pass;?>" >
						Server (typically localhost)<input  class="inputbox" size="39" type="text" name="ftp_server" value="<?php echo $this->ftp_server;?>" >
						<input type="submit" name="ftpdetails" value="submit" class="button" />
						<input type="hidden" name="task" value="updates" />
						<input type="hidden" name="option" value="com_jomres" />
						</form>
						<?php
						}
					else
						{

						$this->chmod_jomresfiles($this->directoryScanResults);
						}

					}
				else
					{
					// We're on a win box
					echo "Error, it's not possible to upgrade Jomres on this server as one or more files is not writable by php. <br/>";
					}

				foreach ($this->directoryScanResults as $f)
					{
					echo $f."<br />";
					}
				return;
				}
			}
		else
			{
			$this->ftp_user_name = jomresGetParam( $_REQUEST, 'ftp_user_name', '' );
			$this->ftp_user_pass = jomresGetParam( $_REQUEST, 'ftp_user_pass', '' );
			$this->ftp_server = jomresGetParam( $_REQUEST, 'ftp_server', '' );
			$this->checkJomresDirectories();
			$this->chmod_jomresfiles($this->directoryScanResults);
			if (!$this->checkJomresDirectories())
				{
				echo "Sorry, it is not possible for this script to chmod your files, you will need to upgrade manually.<br/>";
				}
			}

		if (!isset($_REQUEST['encoding']) && !isset($_REQUEST['ftp_user_name']) )
			{
			$this->getUpdateInfo();
			}
		else if (!isset($_REQUEST['ftp_user_name']))
			{
			if ($jomresConfig_offline == "0" && jomresGetDomain() != "localhost")
				{
				echo "<h2>Error, your server is still online. This may interfere with the upgrade process so you are need to take it offline for the duration of the upgrade. Once you've finished the upgrade run install_jomres.php to make any table changes needed then you can put the server back online.<br/>To take the server offline you need to go to <a href='index2.php?option=com_config'>Global Configuration</a> and set Site Offline to Yes.</h2>";
				return;
				}
			$query="SELECT value FROM #__jomres_settings WHERE property_uid LIKE '0' AND akey LIKE 'jomres_licensekey'";
			$settingsList=doSelectSql($query);
			if (count($settingsList) >0)
				{
				foreach ($settingsList as $lk)
					{
					$license_key=$lk->value;
					}
				}
			if (strlen($license_key)<1)
				exit;
			$license_key_hash=md5($license_key);
			$liveSite="&live_site=".urlencode($jomresConfig_live_site);

			$requiredEncoding=jomresGetParam( $_REQUEST, 'encoding', '' );
			$requiredVersion=jomresGetParam( $_REQUEST, 'version', '' );

			/*
			$curl_handle=curl_init();
			curl_setopt($curl_handle,CURLOPT_URL,$this->updateServer."/gethash.php?"."encoding=".$requiredEncoding."&version=".$requiredVersion);
			curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
			curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
			$expectedHash = trim(curl_exec($curl_handle));
			curl_close($curl_handle);
			*/
			/*
			$expectedHash = queryUpdateServer("gethash.php","encoding=".$requiredEncoding."&version=".$requiredVersion);
			if (empty($expectedHash))
				{
				print "Did not receive the hash for the requested file. Quitting.";
				return;
				}
			*/
			$updateFile = queryUpdateServer("","encoding=".$requiredEncoding."&version=".$requiredVersion."&keyhash=".$license_key_hash.$liveSite);


			$newfilename=$this->updateFolder."/jomres.zip";
			echo "<br>starting download of $updateFile<br>";
			$out = fopen($newfilename, 'wb');
			if ($out == FALSE)
				{
				print "Couldn't create new file $newfilename. Possible file permission problem?<br/>";
				exit;
				}

			$curl_handle = curl_init($updateFile);
			curl_setopt($curl_handle, CURLOPT_FILE, $out);
			curl_setopt($curl_handle, CURLOPT_HEADER, 0);
			curl_setopt($curl_handle, CURLOPT_URL, $updateFile);
			curl_exec($curl_handle);
			curl_close($curl_handle);
			fclose($out);
			/// TO DO

//			echo $expectedHash. "<br>";
//			echo md5_file  ($newfilename);exit;
//			if (file_exists($newfilename) && filesize($newfilename)>0 && md5_file  ($newfilename) === $expectedHash)

			if (file_exists($newfilename) && filesize($newfilename)>0 )
				echo "Got it<br />";
			else
				{
				echo "Something went wrong downloading the update files. Quitting";
				return;
				}

			global $ePointFilepath;
			require_once (JOMRESPATH_BASE."/libraries/dUnzip2.inc.php");

			$zip = new dUnzip2($newfilename);
			// Activate debug
			$zip->debug = false;
			// Unzip all the contents of the zipped file to this folder
			$zip->getList();
			if (mkdir($this->updateFolder."/unpacked"))
				{
				$zip->unZipAll($this->updateFolder."/unpacked");
				if (!$this->test_download)
					$this->dirmv($this->updateFolder."/unpacked/", JOMRESCONFIG_ABSOLUTE_PATH."/", $this->overwriteAllowed, $funcloc = "/");

				echo "Completed upgrade. Please ensure that you visit <a href=\"$jomresConfig_live_site/install_jomres.php\">install_jomres.php</a> to complete any database changes that may be required";
				if ($this->debugging)
					{
					echo "<br/><br/><br/><br/><br/><br/>";
					echo "UPGRADE LOG<br/>";
					foreach ($this->movedFileLog as $record)
						echo $record;
					}
				jomresRedirect($jomresConfig_live_site."/install_jomres.php", '');
				}
			else
				echo "Error creating unpack folder";
			}
		}



	function getUpdateInfo()
		{
		print queryUpdateServer("updates_available.php","");

		}

	function checkJomresDirectories()
		{
		global $myfiles;
		$this->directoryScanResults=array();
		$jomresAdminDir = JOMRESCONFIG_ABSOLUTE_PATH."/".JOMRES_ADMINISTRATORDIRECTORY."/components/com_jomres";
		$jomresFrontDir = JOMRESCONFIG_ABSOLUTE_PATH."/components/com_jomres";
		$files_array = $this->recur_dir($jomresAdminDir);
		$files_array = $this->recur_dir($jomresFrontDir);

		//var_dump($this->is_removeable($jomresAdminDir));exit;
		if (count($this->directoryScanResults) > 0)
			{
			return false;
			}
		return true;
		}

	function is_removeable($dir)
		{
		$folder = opendir($dir);
		while($file = readdir( $folder ))
		if($file != '.' && $file != '..' && ( !is_writable(  $dir."/".$file  ) || (  is_dir(	$dir."/".$file	) && !$this->is_removeable(	$dir."/".$file	)  ) ))
			{
			 closedir($dir);
			 return false;
			}
		closedir($dir);
		return true;
		}

	function recur_dir($dir,$getWritablesFiles=false)
		{
		$dirlist = opendir($dir);
		while ($file = readdir ($dirlist))
		{
			if ($file != '.' && $file != '..')
			{

			$newpath = $dir.'/'.$file;
			if ($getWritablesFiles)
				{
				if (is_file($newpath) && is_writable($newpath) )
					$this->directoryScanResults[] = $dir.'/'.$file;
				}
			else
				{
				if (is_file($newpath) && !is_writable($newpath) )
					$this->directoryScanResults[] = $dir.'/'.$file;
				}
			$level = explode('/',$newpath);
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


	function checkUpdateDirectory()
		{
		if (!is_dir($this->updateFolder) )
			{
			if (!mkdir($this->updateFolder))
				{
				echo "Error, unable to make folder ".$this->updateFolder." automatically therefore cannot store updates downloaded from the update server. Please create the folder manually and ensure that it's writable by the web server";
				return false;
				}
			}
		else
			{
			if (!is_writable($this->updateFolder))
				return false;
			}
		$this->emptyDir($this->updateFolder);
		return true;
		}

	// http://www.php.net/manual/en/function.unlink.php#79940
	function emptyDir($dir)
		{
		if(!$dh = @opendir($dir)) return;
		while (false !== ($obj = readdir($dh)))
			{
			if($obj=='.' || $obj=='..') continue;
			if (!@unlink($dir.'/'.$obj)) $this->emptyDir($dir.'/'.$obj, true);
			}
		closedir($dh);
		if ($dir != $this->updateFolder)
			@rmdir($dir);
		}


	function chmod_jomresfiles($unwritableFiles)
		{
		// Connect to the FTP
		$conn_id = $this->chmod_open();
		// CHMOD each file and echo the results

		$userinfo =posix_getpwuid(fileowner($this->ftp_root."/components/com_jomres/"));
		print_r($userinfo);
		echo "<br/>File permissions ". substr(sprintf('%o', fileperms($this->ftp_root."/components/com_jomres")), -4)."<br/>";

		echo "Attempting to chmod ".$this->ftp_root."/components/com_jomres/<br/>";
		echo chmod( $this->ftp_root."/components/com_jomres",0777 ) ? 'CHMODed successfully!<br/>' : 'Error<br/>';

		echo "Attempting to chmod ".$this->ftp_root."/".JOMRES_ADMINISTRATORDIRECTORY."/components/com_jomres/<br/>";
		echo chmod($this->ftp_root."/".JOMRES_ADMINISTRATORDIRECTORY."/components/com_jomres" ,0777 ) ? 'CHMODed successfully!<br/>' : 'Error<br/>';

		if (is_writable($this->ftp_root."/components/com_jomres") ) // Double blind check in case chmod says it worked, we'll make sure by creating a test file
			{
			foreach ($unwritableFiles as $file)
				{
				echo "Attempting to chmod ".$file."<br/>";
				//echo $this->chmod_file($conn_id, 0777, $file) ? 'CHMODed successfully!<br/>' : 'Error<br/>';
				chmod($file, 0777 ) ? 'CHMODed successfully!<br/>' : 'Error<br/>';
				}
			}
		else
			echo "Nope. ".$this->ftp_root."/components/com_jomres is still unwritable<br/>";
		// Close the connection
		$this->chmod_close($conn_id);
		}

	function chmod_open()
		{
		$conn_id = ftp_connect($this->ftp_server);
		$login_result = ftp_login($conn_id, $this->ftp_user_name, $this->ftp_user_pass);
		if (!$login_result)
			{
			echo "Could not log in using the supplied details ".$this->ftp_user_name.' '.$this->ftp_user_pass;
			}
		return $conn_id;
		}

	function chmod_file($conn_id, $permissions, $path)
		{

		if (ftp_site($conn_id, 'CHMOD ' . $permissions . ' ' . $this->ftp_root . $path) !== false)
			{
			return TRUE;
			}
		else
			{
			return FALSE;
			}
		}
	// http://www.php.net/manual/en/function.rename.php#61152
	function dirmv($source, $dest, $overwrite = false, $funcloc = NULL)
		{
		/*
		if(is_null($funcloc))
			{
			$dest .= '/' . strrev(substr(strrev($source), 0, strpos(strrev($source), null)));
			$funcloc = '/';
			}
		*/
		if(!is_dir( $dest . $funcloc))
			mkdir( $dest . $funcloc); // make subdirectory before subdirectory is copied
		//echo "Opening " . $source . $funcloc."<br/>";
		if($handle = opendir( $source . $funcloc))
			{ // if the folder exploration is sucsessful, continue
			//echo "Opened ". $source . $funcloc."<br/>";
			while(false !== ($file = readdir($handle)))
				{ // as long as storing the next file to $file is successful, continue
				if($file != '.' && $file != '..')
					{
					$path  = $source . $funcloc . $file;
					$path2 = $dest . $funcloc . $file;

					if(is_file( $path))
						{
						if(!is_file( $path2))
							{
							if(!@rename( $path,  $path2))
								{
								echo '<font color="red">File ('.$path.') could not be moved, likely a permissions problem.</font><br/>';
								}
							}
						else
							if($overwrite)
								{
								if(!@unlink( $path2))
									{
									echo 'Unable to overwrite file ("'.$path2.'"), likely to be a permissions problem.<br/>';
									}
								else
									{
									if(!@rename( $path,  $path2))
										{
										echo '<font color="red">File ('.$path.') could not be moved while overwritting, likely a permissions problem.</font><br/>';
										}
									else
										$this->movedFileLog[]= "Moved ".$path."<br/> to ".$path2."<br/>";
									}
								}
							else
								echo "Not allowed to overwrite" .$path2."<br/>";
						}
					elseif(is_dir( $path))
						{
						$this->dirmv($source, $dest, $overwrite, $funcloc . $file . '/'); //recurse!
						rmdir( $path);
						}
					}
				}
			closedir($handle);
			}
		//echo "Finished upgrade <br/>";
		} // end of dirmv()

	function chmod_close($conn_id)
		{
		ftp_close($conn_id);
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}





