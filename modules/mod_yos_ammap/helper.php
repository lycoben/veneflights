<?php
/**
* @version		$Id: helper.php 8379 2007-08-10 23:20:01Z eddieajau $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2007 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
* Camp26.com
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Set the table directory
JTable::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'tables');

class modAmmapHelper {
    function getMap_swfobject(& $map) {
    	$db					= &JFactory::getDBO();
    	$row				= &JTable::getInstance('yos_AmMap','Table');    	
    	$row->load(intval($map['id']));
    	$mapcontent= uniqid('map_');
    	$dhash = '';
    	$shash = '';
    	if ($row->security) {
    		$nowdate = date('Y-m-d H:i:s');		
	    	$timecheck = $nowdate;
	    	$dhash = uniqid('d_').md5($nowdate);    	
	    	$query = "INSERT INTO #__yos_key_hash SET
	    				timecheck = '$timecheck',
	    				hash = '$dhash'
	    				";
	    	$db->setQuery($query);
	    	$db->query();
	    	
	    	$shash = uniqid('s_').md5($nowdate);    	
	    	$query = "INSERT INTO #__yos_key_hash SET
	    				timecheck = '$timecheck',
	    				hash = '$shash'
	    				";
	    	$db->setQuery($query);
	    	$db->query();
    	}
    	
    	JHTML::_('behavior.mootools');
    	
    	if ($map['id']) {
    		$path	=	JURI::root().'components/com_yos_ammap/ammap';
    	} else {
    		$path	=	$map['path'];
    	}
    	
	    ob_start();
	    ?>
	    
		<div id="<?php echo $mapcontent; ?>">
			<strong>You need to upgrade your Flash Player</strong>
		</div>
	
		<script type="text/javascript">
		window.addEvent('load', function(){ 
			// <![CDATA[		
			var so = new SWFObject("<?php echo $path; ?>/ammap.swf", "<?php echo uniqid('map_'); ?>", "<?php echo $map['width']; ?>", "<?php echo $map['height']; ?>", "<?php echo $map['version']; ?>", "<?php echo $map['background']; ?>");
	    	so.addVariable("path", "<?php echo $path; ?>/");
			so.addVariable("data_file", escape("<?php 
				if ($row->published) {
					echo JURI::root()."index.php?option=com_yos_ammap&id=$row->id&file=data&h=$dhash&plugin=".$map['plugin'];
				} else {
					echo $map['data_file'];
				}?>"
			));
	    	so.addVariable("settings_file", escape("<?php 
		    	if ($row->published) {
		    		echo JURI::root()."index.php?option=com_yos_ammap&id=$row->id&file=settings&h=$shash&plugin=".$map['plugin'];
		    	} else {
		    		echo $map['settings_file'];
		    	}
	    	?>"
	    	));		
			so.addVariable("preloader_color", "<?php echo $map['preloader_color']; ?>");
			so.write("<?php echo $mapcontent; ?>");
			so.addVariable("loading_data", "<?php echo $map['loading_data']; ?>");
			so.addVariable("loading_settings", "<?php echo $map['loading_settings']; ?>");
			so.addVariable("wmode", "transparent");
			// ]]>
		}); 
		</script>		
	    <?php
	    $script = ob_get_contents();
	    ob_end_clean();
		return $script;
	}
	
	function getMap_flash(& $map){
		$db					= &JFactory::getDBO();
    	$row				= &JTable::getInstance('yos_AmMap','Table');    	
    	$row->load(intval($map['id']));
    	$mapcontent= uniqid('map_');
    	$dhash = '';
    	$shash = '';
    	if ($row->security) {
    		$nowdate = date('Y-m-d H:i:s');		
	    	$timecheck = $nowdate;
	    	$dhash = uniqid('d_').md5($nowdate);    	
	    	$query = "INSERT INTO #__yos_key_hash SET
	    				timecheck = '$timecheck',
	    				hash = '$dhash'
	    				";
	    	$db->setQuery($query);
	    	$db->query();
	    	
	    	$shash = uniqid('s_').md5($nowdate);    	
	    	$query = "INSERT INTO #__yos_key_hash SET
	    				timecheck = '$timecheck',
	    				hash = '$shash'
	    				";
	    	$db->setQuery($query);
	    	$db->query();
    	}
    	
    	if ($map['id']) {
    		$path	=	JURI::root().'components/com_yos_ammap/ammap';
    	} else {
    		$path	=	$map['path'];
    	}
    	
	    ob_start();
	    
		if ($row->published) {
			$datalink	=	JURI::root()."index.php?option=com_yos_ammap&id=$row->id&file=data&h=$dhash&plugin=".$map['plugin'];
			$settinglink=	JURI::root()."index.php?option=com_yos_ammap&id=$row->id&file=settings&h=$shash&plugin=".$map['plugin'];
		} else {
			$datalink	=	$map['data_file'];
			$settinglink=	$map['settings_file'];
		}
		?>
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="<?php echo $map['width']; ?>" height="<?php echo $map['height']; ?>" id="<?php echo $mapcontent; ?>" align="middle">
		<param name="allowScriptAccess" value="<?php echo JURI::root(); ?>" />
		<param name="movie" value="<?php echo $path; ?>/ammap.swf?&path=<?php echo urlencode($path); ?>/&data_file=<?php echo urlencode($datalink); ?>&settings_file=<?php echo urlencode($settinglink); ?>"/>
		<param name="quality" value="high" />
		<param name="bgcolor" value="<?php echo $map['background']; ?>"/>
		<embed src="<?php echo $path; ?>/ammap.swf?&path=<?php echo urlencode($path); ?>/&data_file=<?php echo urlencode($datalink); ?>&settings_file=<?php echo urlencode($settinglink); ?>" quality="high" bgcolor="<?php echo $map['background']; ?>" width="<?php echo $map['width']; ?>" height="<?php echo $map['height']; ?>" name="0" align="middle" allowScriptAccess="<?php echo JURI::root(); ?>" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object>
		
	    <?php
	    $script = ob_get_contents();
	    ob_end_clean();
		return $script;
	}
}
?>