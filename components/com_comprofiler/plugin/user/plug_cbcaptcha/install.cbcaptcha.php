<?php
/**
* Joomla Community Builder User Plugin: plug_cbprofilegallery
* @version $Id$
* @package plug_cbcaptcha
* @subpackage install.cbcaptcha.php
* @author Nant, JoomlaJoe and Beat
* @copyright (C) Nant, JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited  http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @final 2.2 RC2
*/
function plug_cb_captcha_install(){
	global $_CB_framework;
	# Show installation result to user
  	?>
	<center>
	<table width="100%" border="0">
	<tr>
	<td>
	</td>
	</tr>
	<tr>
	<td>
	<br />Copyright 2007 Nick A., Beat and CB team on joomlapolis.com . This CB Plugin is released under the GNU/GPL v2.0 License. All copyright statements must be kept. Derivate work must prominently duly acknowledge original work and include visible online links. Official site: <a href="http://www.joomlapolis.com">www.joomlapolis.com</a>
	<br />
	</td>
	</tr>
	<tr>
	<td background="F0F0F0" colspan="2">
        <code>Post-installation Process:<br />
        <?php
			if(!chmod_R($_CB_framework->getCfg( 'absolute_path' ) . "/components/com_comprofiler/plugin/user/plug_cbcaptcha", 0755)) {
			//		print "<font color=red>". $_CB_framework->getCfg( 'live_site' ) . "/components/com_comprofiler/plugin/user/plug_cbcaptcha Failed to be chmod'd to 755 please do so manually!</font><br />";
			} 	
		?>
        <font color="green"><b>Installation finished.</b></font></code>
	</td>
	</tr>
	</table>
	</center>
	<?php
	return "";
}

function chmod_R($path, $filemode) {
	if (!is_dir($path)){
		return chmod($path, $filemode);
	}

	$dh = opendir($path);
	while ($file = readdir($dh)) {
		if($file != '.' && $file != '..') {
			$fullpath = $path.'/'.$file;
			if(!is_dir($fullpath)) {
				if (!@chmod($fullpath, $filemode))
					return FALSE;
			} else {
				if (!chmod_R($fullpath, $filemode))
					return FALSE;
			}
		}
	}
 
    closedir($dh);
    
    if(chmod($path, $filemode)) {
		return TRUE;
	} else { 
      return FALSE;
	}
}
?>