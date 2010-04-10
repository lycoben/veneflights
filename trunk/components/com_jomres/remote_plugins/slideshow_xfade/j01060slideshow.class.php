<?php
/**
#
 * Mini-component core file: Constructs and displays slideshow
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
 * Creates the slideshow
 #
* @package Jomres
#
 */
class j01060slideshow {
	/**
	#
	 * Constructor:
	#
	 */
	function j01060slideshow($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=$componentArgs['property_uid'];
		$this->getSlideshow($property_uid);
		}

	function getSlideshow($property_uid)
		{
		global $jrConfig,$jomresConfig_absolute_path,$property_uid,$jomresAdminPath,$eLiveSite,$ePointFilepath,$jomresConfig_live_site;
		global $slideshowBasepath,$slideshowRelpath,$slideshowImgs_RelPath,$slideshowImgs_AbPath;
		$slideshowImgs_AbPath=$jomresConfig_absolute_path.$jrConfig['ss_imageLocation'].$property_uid.'/';
		$slideshowImgs_RelPath=$jomresConfig_live_site.$jrConfig['ss_imageLocation'].$property_uid.'/';
		$slideshowBasepath=$ePointFilepath;
		$slideshowRelpath=$eLiveSite;
		$imagesArray=listImages();
		
		if (count($imagesArray) >0)
			{
			$filecount=0;
			for ($i = 0; $i <count($imagesArray); $i++)
				{
			 	$filename= split("\.",$imagesArray[$i]);
				$numExtensions=count($filename)-1;
				$fileExt=strtoupper($filename[$numExtensions]);
				if ($fileExt== "JPG" || $fileExt== "JPEG")
					{
					$imageData[$i]['filename']=$imagesArray[$i];
					$sizes=getImagesSize($imagesArray[$i]);
					$imageData[$i]['actualwidth'] = $sizes['actualwidth'];
					$imageData[$i]['actualheight'] = $sizes['actualheight'];
					$imageData[$i]['fullwidth'] = $sizes['fullwidth'];
					$imageData[$i]['fullheight'] = $sizes['fullheight'];
					$imageData[$i]['thwidth'] = $sizes['thwidth'];
					$imageData[$i]['thheight'] = $sizes['thheight'];
					$imageData[$i]['imagelocation'] = $slideshowImgs_RelPath;
					$filecount++;
					}
				}
			}
		$propertyName=getPropertyNameNoTables($property_uid);
		require($slideshowBasepath."slideshow.php");
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