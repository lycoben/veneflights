<?php
/**
* Captcha Tab Class for handling CB Registration, CB lost password,  CB member email and CB Contact form submissions
* @version $Id: captchasecurityimages.php$
* @package Community Builder
* @subpackage captchasecurityimages.php
* @author Nant and Beat
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license Limited  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL v2
* @final 2.2 
*/

if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

/*
* File: CaptchaSecurityImages.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 03/08/06
* Updated: 07/02/07
* Requirements: PHP 4/5 with GD and FreeType libraries
* Link: http://www.white-hat-web-design.co.uk/articles/php-captcha.php
* 
* This program is free software; you can redistribute it and/or 
* modify it under the terms of the GNU General Public License 
* as published by the Free Software Foundation; either version 2 
* of the License, or (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
* GNU General Public License for more details: 
* http://www.gnu.org/licenses/gpl.html
*
* Modified and extended to work with Community Builder by
* Beat and Nant - Feb. and May 2007
*/

class CaptchaSecurityImages {

	var $font = 'fonts/monofont.ttf';
    var $br = 255;
    var $bg = 255;
    var $bb = 255;
	var $tr = 20;
	var $tg = 40;
	var $tb = 100;
	var $nr = 100;
	var $ng = 120;
	var $nb = 180;
	    
	function CaptchaSecurityImages( ) {
	}
	
	function setFont($font2use) {
		
		switch ($font2use) {
			case 0:
				$this->font = 'fonts/monofont.ttf';
				break;
			case 1:
				$this->font = 'fonts/EARWIGFA.ttf';
				break;
			case 2:
				$this->font = 'fonts/stilltim.ttf';
				break;
			case 3:
				$this->font = 'fonts/sayso chic.ttf';
				break;
			case 4:
				$this->font = 'fonts/CUOMOTYP.ttf';
				break;
			case 5:
				$this->font = 'fonts/PRIMER.ttf';
				break;
			case 6:
				$this->font = 'fonts/PRIMERB.ttf';
				break;
			case 7:
				$this->font = 'fonts/INTERPLA.ttf';
				break;
			default:
				$this->font = 'fonts/monofont.ttf';
				break;
		}				
	}

	function setrgb($value,$composite) {
		if ( ($value > 255) || ($value < 0 ) ) return;
		switch ($composite) {
			case 'br':
				$this->br = (int) $value;
				break;
			case 'bg':
				$this->bg = (int) $value;
				break;
			case 'bb':
				$this->bb = (int) $value;
				break;
			case 'tr':
				$this->tr = (int) $value;
				break;
			case 'tg':
				$this->tg = (int) $value;
				break;
			case 'tb':
				$this->tb = (int) $value;
				break;
			case 'nr':
				$this->nr = (int) $value;
				break;
			case 'ng':
				$this->ng = (int) $value;
				break;
			case 'nb':
				$this->nb = (int) $value;
				break;	
		}	
	}
	
	function generateImage($width='150',$height='40',$code) {
		/* font size will be 75% of the image height */
		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		/* set the colours */
		$background_color = imagecolorallocate($image, $this->br, $this->bg, $this->bb);
		$text_color = imagecolorallocate($image, $this->tr, $this->tg, $this->tb);
		$noise_color = imagecolorallocate($image, $this->nr, $this->ng, $this->nb);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* create textbox and add text */
		if (DIRECTORY_SEPARATOR=='/') {
  			$thispath = dirname(__FILE__) . '/';
		} else {
			$thispath = str_replace('\\', '/', dirname(__FILE__) . '/');
		}

		$textbox = imagettfbbox($font_size, 0, $thispath . $this->font, $code) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $thispath . $this->font , $code) or die('Error in imagettftext function');
		/* output captcha image to browser */
		header( 'Expires: Mon, 26 Jul 1997 05:00:00 GMT' );
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
		header( 'Cache-Control: no-store, no-cache, must-revalidate' );
		header( 'Cache-Control: post-check=0, pre-check=0', false );
		header( 'Pragma: no-cache' );
		header( 'Content-Type: image/jpeg' );
		imagejpeg($image);
		imagedestroy($image);
		return $code;
	}
}
?>