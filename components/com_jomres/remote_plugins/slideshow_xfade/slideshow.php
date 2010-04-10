<?php
/**
#
 * Constructs and displays the slideshow
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
#
* @copyright	2005-2007 Vince Wooll
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
 * Constructs and displays the slideshow
#
 */
 
/*
// Note: full width & full height are generated from the config settings "Slideshow full width". This MAY be larger than the actual image size,
// it's just there to find the maximum width & height. The same goes for thumbnails.
// The widths & heights are calculated to maintain the aspect of the image
// The thumbnail images aren't actually used in this script, but they're available if you want to use them elsewhere.

Variables available to this script:

$slideshowImgs_AbPath			// The absolute path to the images
$slideshowImgs_RelPath			// The relative path to the images
$slideshowBasepath				// The absolute path to this script
$slideshowRelpath				// The relative path to this script
$imageData						// An associative array of images in the given properties directory indexed by the image name 
								// and containing 'actualwidth', 'actualheight', 'fullwidth','fullheight','thwidth' & 'thheight' of the images
$propertyName					// The name of the property

With thanks to Slayer Office (again)
http://slayeroffice.com/code/imageCrossFade/xfade2.html
*/
global $property_uid;
global $slideshowBasepath,$slideshowRelpath,$slideshowImgs_RelPath,$slideshowImgs_AbPath;
if (isset($imageData))
	$numberOfImages=count($imageData);
else
	$numberOfImages=0;
$output['PROPERTYNAME']=$propertyName;
$output['SLIDESHOWIMAGESRELPATH']=$slideshowImgs_RelPath;
$output['SLIDESHOWRELPATH']=$slideshowRelpath;

$widths=array();
$heights=array();

$captionElementsToReplace=array("-","_");


if ($numberOfImages>1)
	{
	for ($i = 0; $i <$numberOfImages; $i++)
		{
		$r=array();
		$r['COUNTER']=$i;
		$cap=$imageData[$i]['filename'];
		$capAr=explode(".",$cap);
		$cap=$capAr[0];
		$cap=str_replace($captionElementsToReplace," ",$cap);
		$cap=strtolower($cap);
		$cap=ucwords($cap);
		$r['ALTTEXT']=$cap;
		$r['IMAGE']=$slideshowImgs_RelPath.$imageData[$i]['filename'];
		$r['WIDTH']=$imageData[$i]['actualwidth'];
		$r['HEIGHT']=$imageData[$i]['actualheight'];
		$rows[]=$r;
		
		$widths[]=$imageData[$i]['actualwidth'];
		$heights[]=$imageData[$i]['actualheight'];
		
		}
	sort($widths);
	sort($heights);
	
	$output['MAXWIDTH']=$widths[count($widths)-1];
	$output['MAXHEIGHT']=$heights[count($heights)-1];
	
	$pageoutput[]=$output;
	$tmpl    =    new patTemplate();
	$tmpl->setRoot( $slideshowBasepath );
	$tmpl->readTemplatesFromInput( 'slideshow.html' );
	$tmpl->addRows( 'pageoutput', $pageoutput );
	$tmpl->addRows( 'rows', $rows );
	$tmpl->displayParsedTemplate();
	}
else
	{
	echo jr_gettext('_JOMRES_COM_A_SLIDESHOWS_NOIMAGES',_JOMRES_COM_A_SLIDESHOWS_NOIMAGES,'');
	echo "<br />";
	}


		
?>