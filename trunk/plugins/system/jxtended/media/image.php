<?php
/**
 * @version		$Id: image.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Media
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	Media
 */
class JXImage
{
	var $_transform = null;

	function setTransform( $file )
	{
		$xml	= &JFactory::getXMLParser( 'simple' );
		$xml->loadFile( $file );
		$this->_transform = &$xml;
	}

	function transform( $imageFile )
	{
		$ext		= array(
			IMAGETYPE_GIF	=> 'gif',
			IMAGETYPE_PNG	=> 'png',
			IMAGETYPE_JPEG	=> 'jpg'
		);

		$doc		= &$this->_transform->document;
		$props		= new JObject;
		$result		= new JObject;
		$baseName	= JFile::stripExt( basename( $imageFile ) );
		$fileExt	= '.'.JFile::getExt( $imageFile );

		// Ensure we have a valid path and the folder exists
		if (!($relPath = $doc->attributes( 'path' ))) {
			$relPath = 'images';
		}
		$basePath = JPATH_SITE.DS.$relPath;

		JPath::check( $basePath );
		JFolder::create( $basePath );

		// Process each instruction
		foreach ($doc->children() as $node)
		{
			$type		= 'IMAGETYPE_'.strtoupper( $node->attributes( 'type' ) );
			$fileName	= $node->attributes( 'prefix' ).$baseName.$node->attributes( 'suffix' ).JArrayHelper::getValue( $ext, $type, $fileExt );

			$props->set( 'type',		constant( $type ) );
			$props->set( 'filename',	$basePath.DS.$fileName );
			$props->set( 'width',		$node->attributes( 'width' ) );
			$props->set( 'height',		$node->attributes( 'height' ) );
			$props->set( 'palette',		$node->attributes( 'palette' ) );

			//echo JUtility::dump($props);

			JXImage::scale( $imageFile, $props, 1 );

			if ($name = $node->attributes( 'name' )) {
				$result->set( $name, $relPath.DS.$fileName );
			}
		}

		return $result;
	}

	/**
	 * Get an image size and other properties
	 *
	 * @param	string	The file location
	 *
	 * @result	object	An object with the following properties: x, y, type, attributes, bits, channels, mime
	 */
	function size( $file )
	{
		$result = null;
		if ($iSize = getimagesize( $file ))
		{
			$result	= new JObject;
			$result->set( 'x',			$iSize[0] );
			$result->set( 'y',			$iSize[1] );
			$result->set( 'type',		$iSize[2] );
			$result->set( 'attributes',	$iSize[3] );
			$result->set( 'bits',		@$iSize['bits'] );
			$result->set( 'channels',	@$iSize['channels'] );
			$result->set( 'mime',		$iSize['mime'] );
		}
		return $result;
	}

	/**
	 * @param	int		The original X
	 * @param	int		The original Y
	 * @param	int		The new/max X
	 * @param	int		The new/max Y
	 * @param	int		0 = stretch to max; 1 = stretch and maintain aspect
	 */
	function correctAspect( $xOrig, $yOrig, $xMax, $yMax, $mode = 0 )
	{
		$xOrig		= (int) $xOrig;
		$yOrig		= (int) $yOrig;
		$xMax		= (int) $xMax;
		$yMax		= (int) $yMax;

		$result		= new JObject;
		$result->x1 = $xOrig;
		$result->y1 = $yOrig;

		if ($xMax == 0 && $yMax == 0)
		{
			$result->x2	= $xOrig;
			$result->y2	= $yOrig;
		}
		else if ($mode == 0)
		{
			$result->x2 = $xMax;
			$result->y2 = $yMax;
		}
		else
		{
			$ratio	= $xOrig / $yOrig;
			if ($xOrig > $xMax || $yOrig > $yMax) {
				$result->x2	= $xMax;
				$result->y2	= round( $result->x2 / $ratio );

				if ($result->y2 > $yMax) {
					$result->y2	= $yMax;
					$result->x2	= round( $result->y2 * $ratio );
				}
			}
		}
		return $result;
	}

	/**
	 * Resize an image
	 *
	 * @param	string	The file location
	 * @param	object	Properties for scaling
	 * @param	int		TODO: mode for how to scale images at different aspect ratios
	 */
	function scale( $file, &$props, $mode )
	{
		if ($size = JXImage::size( $file ))
		{
			// Process the original image
			switch ($size->type)
			{
				case IMAGETYPE_JPEG:
					$image = imagecreatefromjpeg( $file );
					break;

				case IMAGETYPE_GIF:
					$image = imagecreatefromgif( $file );
					break;

				case IMAGETYPE_PNG:
					$image = imagecreatefrompng( $file );
					break;

				default:
					return JError::raiseWarning( 500, 'Unknown image type' );
					break;
			}

			// Check if we want to keep the original
			$newFile	= $props->get( 'filename', $file );

			// Calculate the new scaling and size
			$newSize	= JXImage::correctAspect( $size->x, $size->y, $props->width, $props->height, $mode );

			// Create the new image container
			if ($props->get( 'palette' ) == 'gray')
			{
				if (imageistruecolor( $image )) {
					imagetruecolortopalette( $image, false, 256 );
				}

				for ($c = 0; $c < imagecolorstotal( $image ); $c++)
				{
					$col = imagecolorsforindex( $image, $c );
					$gray = round(0.299 * $col['red'] + 0.587 * $col['green'] + 0.114 * $col['blue']);
					imagecolorset( $image, $c, $gray, $gray, $gray );
				}
			}

			// Create the new image container
			$newImage	= imagecreatetruecolor( $newSize->x2, $newSize->y2 );

			// Copy and resample
			imagecopyresampled( $newImage, $image, 0, 0, 0, 0, $newSize->x2, $newSize->y2, $newSize->x1, $newSize->y1 );

			// Produce the new image
			switch ($props->get( 'type' ))
			{
				case IMAGETYPE_JPEG:
					imagejpeg( $newImage, $newFile );
					break;

				case IMAGETYPE_GIF:
					imagegif( $newImage, $newFile );
					break;

				case IMAGETYPE_PNG:
					imagepng( $newImage, $newFile );
					break;
			}
		}
	}
}