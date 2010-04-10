<?php

# KCAPTCHA PROJECT VERSION 1.2.6

# Copyright by Kruglov Sergei, 2006, 2007, 2008
# www.captcha.ru, www.kruglov.ru

# Modified for Joomla 1.5 by Anton Nikiforov
# www.recly.com

# System requirements: PHP 4.0.6+ w/ GD

# KCAPTCHA is a free software. You can freely use it for building own site or software.
# If you use this software as a part of own sofware, you must leave copyright notices intact or add KCAPTCHA copyright notices to own.

class KCaptcha{

# symbols used to draw CAPTCHA     
var $_alphabet = "0123456789abcdefghijklmnopqrstuvwxyz"; # do not change without changing font files!

var $_allowed_symbols = "23456789abcdeghkmnpqsuvxyz";

# CAPTCHA string length
var $_length = 0; # random 5 or 6

# CAPTCHA image size (you do not need to change it, whis parameters is optimal)
var $_width = 120;
var $_height = 60;

# symbol's vertical fluctuation amplitude divided by 2
var $_fluctuation_amplitude = 5;

# increase safety by prevention of spaces between symbols
var $_no_spaces = true;

# show credits
var $_show_credits = true; # set to false to remove credits line. Credits adds 12 pixels to image height
var $_credits = 'wowjoomla.com'; # if empty, HTTP_HOST will be shown

# CAPTCHA image colors (RGB, 0-255)
var $_foreground_color = array();
var $_background_color = array();

# JPEG quality of CAPTCHA image (bigger is better quality, but larger file size)
var $_jpeg_quality = 90;   

var $_keystring = null;
var $_fonts = array();
var $_rendered_image = null;

	// generates keystring and image
   function __construct(&$params = null) {
       
		//$fonts=array();
		$this->_length = mt_rand(5,6);
		$this->_foreground_color = array(mt_rand(0,100), mt_rand(0,100), mt_rand(0,100));
		$this->_background_color = array(mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
		if (isset($params) && $params->getValue('captcha_allowed_symbols')) $this->_allowed_symbols = $params->getValue('captcha_allowed_symbols');
		if (isset($params) && (int)$params->getValue('captcha_width')>0) $this->_width = $params->getValue('captcha_width');
		if (isset($params) && (int)$params->getValue('captcha_height')>0) $this->_height = $params->getValue('captcha_height');
		if (isset($params) && (int)$params->getValue('captcha_show_credits')>0) $this->_show_credits = $params->getValue('captcha_show_credits');
		if (isset($params) && $params->getValue('captcha_credits')) $this->_credits = $params->getValue('captcha_credits');		

		$fontsdir_absolute=dirname(__FILE__).DS.'fonts';
		if ($handle = opendir($fontsdir_absolute)) {
			while (false !== ($file = readdir($handle))) {
				if (preg_match('/\.png$/i', $file)) {
					$this->_fonts[]=$fontsdir_absolute.DS.$file;
				}
			}
		    closedir($handle);
		}	
   }
   
   function render () {
		//echo "this=<pre>";print_r($this);echo "</pre><hr>";exit;
	
		$alphabet_length=strlen($this->_alphabet);
		
		do{
			// generating random keystring
			while(true){
				$this->_keystring='';
				for($i=0;$i<$this->_length;$i++){
					$this->_keystring.=$this->_allowed_symbols{mt_rand(0,strlen($this->_allowed_symbols)-1)};
				}
				if(!preg_match('/cp|cb|ck|c6|c9|rn|rm|mm|co|do|cl|db|qp|qb|dp|ww/', $this->_keystring)) break;
			}
		
			$font_file=$this->_fonts[mt_rand(0, count($this->_fonts)-1)];
			$font=imagecreatefrompng($font_file);
			imagealphablending($font, true);
			$fontfile_width=imagesx($font);
			$fontfile_height=imagesy($font)-1;
			$font_metrics=array();
			$symbol=0;
			$reading_symbol=false;

			// loading font
			for($i=0;$i<$fontfile_width && $symbol<$alphabet_length;$i++){
				$transparent = (imagecolorat($font, $i, 0) >> 24) == 127;

				if(!$reading_symbol && !$transparent){
					$font_metrics[$this->_alphabet{$symbol}]=array('start'=>$i);
					$reading_symbol=true;
					continue;
				}

				if($reading_symbol && $transparent){
					$font_metrics[$this->_alphabet{$symbol}]['end']=$i;
					$reading_symbol=false;
					$symbol++;
					continue;
				}
			}

			$img=imagecreatetruecolor($this->_width, $this->_height);
			imagealphablending($img, true);
			$white=imagecolorallocate($img, 255, 255, 255);
			$black=imagecolorallocate($img, 0, 0, 0);

			imagefilledrectangle($img, 0, 0, $this->_width-1, $this->_height-1, $white);

			// draw text
			$x=1;
			for($i=0;$i<$this->_length;$i++){
				$m=$font_metrics[$this->_keystring{$i}];

				$y=mt_rand(-$this->_fluctuation_amplitude, $this->_fluctuation_amplitude)+($this->_height-$fontfile_height)/2+2;

				if($this->_no_spaces){
					$shift=0;
					if($i>0){
						$shift=10000;
						for($sy=7;$sy<$fontfile_height-20;$sy+=1){
							for($sx=$m['start']-1;$sx<$m['end'];$sx+=1){
				        		$rgb=imagecolorat($font, $sx, $sy);
				        		$opacity=$rgb>>24;
								if($opacity<127){
									$left=$sx-$m['start']+$x;
									$py=$sy+$y;
									if($py>$this->_height) break;
									for($px=min($left,$this->_width-1);$px>$left-12 && $px>=0;$px-=1){
						        		$color=imagecolorat($img, $px, $py) & 0xff;
										if($color+$opacity<190){
											if($shift>$left-$px){
												$shift=$left-$px;
											}
											break;
										}
									}
									break;
								}
							}
						}
						if($shift==10000){
							$shift=mt_rand(4,6);
						}

					}
				}else{
					$shift=1;
				}
				imagecopy($img, $font, $x-$shift, $y, $m['start'], 1, $m['end']-$m['start'], $fontfile_height);
				$x+=$m['end']-$m['start']-$shift;
			}
		}while($x>=$this->_width-10); // while not fit in canvas

		$center=$x/2;

		// credits. To remove, see configuration file
		$img2=imagecreatetruecolor($this->_width, $this->_height+($this->_show_credits?12:0));
		$foreground=imagecolorallocate($img2, $this->_foreground_color[0], $this->_foreground_color[1], $this->_foreground_color[2]);
		$background=imagecolorallocate($img2, $this->_background_color[0], $this->_background_color[1], $this->_background_color[2]);
		imagefilledrectangle($img2, 0, 0, $this->_width-1, $this->_height-1, $background);		
		imagefilledrectangle($img2, 0, $this->_height, $this->_width-1, $this->_height+12, $foreground);
		$this->_credits=empty($this->_credits)?$_SERVER['HTTP_HOST']:$this->_credits;
		imagestring($img2, 2, $this->_width/2-imagefontwidth(2)*strlen($this->_credits)/2, $this->_height-2, $this->_credits, $background);

		// periods
		$rand1=mt_rand(750000,1200000)/10000000;
		$rand2=mt_rand(750000,1200000)/10000000;
		$rand3=mt_rand(750000,1200000)/10000000;
		$rand4=mt_rand(750000,1200000)/10000000;
		// phases
		$rand5=mt_rand(0,31415926)/10000000;
		$rand6=mt_rand(0,31415926)/10000000;
		$rand7=mt_rand(0,31415926)/10000000;
		$rand8=mt_rand(0,31415926)/10000000;
		// amplitudes
		$rand9=mt_rand(330,420)/110;
		$rand10=mt_rand(330,450)/110;

		//wave distortion

		for($x=0;$x<$this->_width;$x++){
			for($y=0;$y<$this->_height;$y++){
				$sx=$x+(sin($x*$rand1+$rand5)+sin($y*$rand3+$rand6))*$rand9-$this->_width/2+$center+1;
				$sy=$y+(sin($x*$rand2+$rand7)+sin($y*$rand4+$rand8))*$rand10;

				if($sx<0 || $sy<0 || $sx>=$this->_width-1 || $sy>=$this->_height-1){
					continue;
				}else{
					$color=imagecolorat($img, $sx, $sy) & 0xFF;
					$color_x=imagecolorat($img, $sx+1, $sy) & 0xFF;
					$color_y=imagecolorat($img, $sx, $sy+1) & 0xFF;
					$color_xy=imagecolorat($img, $sx+1, $sy+1) & 0xFF;
				}

				if($color==255 && $color_x==255 && $color_y==255 && $color_xy==255){
					continue;
				}else if($color==0 && $color_x==0 && $color_y==0 && $color_xy==0){
					$newred=$this->_foreground_color[0];
					$newgreen=$this->_foreground_color[1];
					$newblue=$this->_foreground_color[2];
				}else{
					$frsx=$sx-floor($sx);
					$frsy=$sy-floor($sy);
					$frsx1=1-$frsx;
					$frsy1=1-$frsy;

					$newcolor=(
						$color*$frsx1*$frsy1+
						$color_x*$frsx*$frsy1+
						$color_y*$frsx1*$frsy+
						$color_xy*$frsx*$frsy);

					if($newcolor>255) $newcolor=255;
					$newcolor=$newcolor/255;
					$newcolor0=1-$newcolor;

					$newred=$newcolor0*$this->_foreground_color[0]+$newcolor*$this->_background_color[0];
					$newgreen=$newcolor0*$this->_foreground_color[1]+$newcolor*$this->_background_color[1];
					$newblue=$newcolor0*$this->_foreground_color[2]+$newcolor*$this->_background_color[2];
				}

				imagesetpixel($img2, $x, $y, imagecolorallocate($img2, $newred, $newgreen, $newblue));
			}
		}
		
		$this->_rendered_image = $img2;
			
   }
   
   function display($id_session = '') {
		
		ob_start(); 
		
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Cache-Control: no-store, no-cache, must-revalidate'); 
		header('Cache-Control: post-check=0, pre-check=0', FALSE); 
		header('Pragma: no-cache');
		
		if(function_exists("imagejpeg")){
			header("Content-Type: image/jpeg");
			imagejpeg($this->_rendered_image, null, $this->_jpeg_quality);
		}else if(function_exists("imagegif")){
			header("Content-Type: image/gif");
			imagegif($this->_rendered_image);
		}else if(function_exists("imagepng")){
			header("Content-Type: image/x-png");
			imagepng($this->_rendered_image);
		}
		
		$result = ob_get_contents();
        ob_end_clean(); 
        
        $session = JFactory::getSession();
        $session->set('captcha_keystring_'.$id_session, $this->_keystring);        
        
        return $result;		
	}
	
   function getImage() {
		
		ob_start(); 
		
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Cache-Control: no-store, no-cache, must-revalidate'); 
		header('Cache-Control: post-check=0, pre-check=0', FALSE); 
		header('Pragma: no-cache');
		
		if(function_exists("imagejpeg")){
			header("Content-Type: image/jpeg");
			imagejpeg($this->_rendered_image, null, $this->_jpeg_quality);
		}else if(function_exists("imagegif")){
			header("Content-Type: image/gif");
			imagegif($this->_rendered_image);
		}else if(function_exists("imagepng")){
			header("Content-Type: image/x-png");
			imagepng($this->_rendered_image);
		}
		
		$result = ob_get_contents();
        ob_end_clean(); 
        
        return $result;		
	}	

	// returns keystring
	function getKeyString(){
		return $this->_keystring;
	}
}

?>