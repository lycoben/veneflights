<?php
/**
*  Modul Weather Forecast For Joomla 1.5 Native
* Versi			: 1.0.1
* Created by			: Denny Setiarika Pirhadi and Rony Sandra Yofa Zebua
* Mail			: camp26team@gmail.com
* Created on		: 14 April 2008
* Last Modified on	: 28 April2008
* URL			: www.camp26.com
* Camp26.Com ready to service all of you for developt, rebuild,redesign and customize your Joomla live site
* Camp26.Com Products: Expert Joomla Developer, Expert Designer, Expert Flash Creator, Get your Expert FreeLancer here, Expert Programmer Aplications (send your reguest to marketing@camp26.com)
* Based Idea From: mod_NWS-forecast for J1.0.x
*  WU-forecast.php script by Ken True - webmaster@saratoga-weather.org
* License 		: http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
global $mosConfig_offset;
$temp_width = $params->get( 'width' );
$temp_icons = $params->get( 'icons' );
$temp_url = $params->get ('url');
$temp_rain = $params->get ('rain');
$content = "";
$iconDir ='';                           // set to '' to use the Wunderground icons
//
// view the forecast you want on www.wunderground.com using the language setting you desire,
// then copy the FULL url to the $WU_URL setting below.
//
// NOTE: don't use locations in the United States, US territories or Canada -- this script won't
//  process the Wunderground versions for those locations.
//
$WU_URL = $temp_url;
$maxWidth = $temp_width;
$maxIcons = $temp_icons;
$cacheName = "mod_weatherforecast.txt";           // locally cached page from WU
$refetchSeconds = 1800;                    // cache lifetime (1800sec = 30 minutes)
$xlateCOP = $temp_rain;
// ---- end of settings ---------------------------------------------------
//
// -------------------begin code ------------------------------------------
if (isset($_REQUEST['sce']) && strtolower($_REQUEST['sce']) == 'view' ) {
   //--self downloader --
   $filenameReal = $_SERVER["SCRIPT_FILENAME"];
   $filenameLcl = substr($PHP_SELF,1);
   $download_size = filesize($filenameReal);
   header('Pragma: public');
   header('Cache-Control: private');
   header('Cache-Control: no-cache, must-revalidate');
   header("Content-type: text/plain");
   header("Accept-Ranges: bytes");
   header("Content-Length: $download_size");
   header('Connection: close');

   readfile($filenameReal);
   exit;
}
$Status = "<!-- $Version -->\n";
//------------------------------------------------

$NWSiconlist = array(
 // WU Icon name => NWS icon name // WU meaning
 'chanceflurries.gif' 	=> 'sn.jpg', // Chance of Flurries
 'chancerain.gif' 		=> 'hi_shwrs.jpg', // Chance of Rain
 'chancesleet.gif' 		=> 'ip.jpg', // Chance of Sleet
 'chancesnow.gif' 		=> 'sn.jpg', // Chance of Snow
 'chancetstorms.gif' 	=> 'hi_tsra.jpg', // Chance of Thunderstorms
 'clear.gif' 			=> 'skc.jpg', // Clear
 'cloudy.gif' 			=> 'ovc.jpg', // Cloudy
 'flurries.gif' 		=> 'sn.jpg', // Flurries
 'fog.gif' 				=> 'fg.jpg', // Fog
 'hazy.gif' 			=> 'fg.jpg', // Hazy
 'mostlycloudy.gif' 	=> 'bkn.jpg', // Mostly Cloudy
 'mostlysunny.gif' 		=> 'few.jpg', // Mostly Sunny
 'partlycloudy.gif' 	=> 'sct.jpg', // Partly Cloudy
 'partlysunny.gif' 		=> 'sct.jpg', // Partly Sunny
 'rain.gif' 			=> 'ra.jpg', // Rain
 'sleet.gif' 			=> 'ip.jpg', // Sleet
 'sleat.gif'            => 'ip.jpg', // Sleet (other spelling)
 'snow.gif' 			=> 'sn.jpg', // Snow
 'sunny.gif' 			=> 'skc.jpg', // Sunny
 'tstorms.gif' 			=> 'tsra.jpg', // Thunderstorms
 'unknown.gif' 			=> 'na.jpg', // Unknown
 'nt_chanceflurries.gif' => 'nsn.jpg', // Chance of Flurries
 'nt_chancerain.gif' 	=> 'hi_nshwrs.jpg', // Chance of Rain
 'nt_chancesleet.gif' 	=> 'ip.jpg', // Chance of Sleet
 'nt_chancesnow.gif' 	=> 'nsn.jpg', // Chance of Snow
 'nt_chancetstorms.gif' => 'hi_ntsra.jpg', // Chance of Thunderstorms
 'nt_clear.gif' 		=> 'nskc.jpg', // Clear
 'nt_cloudy.gif' 		=> 'novc.jpg', // Cloudy
 'nt_flurries.gif' 		=> 'nsn.jpg', // Flurries
 'nt_fog.gif' 			=> 'nfg.jpg', // Fog
 'nt_hazy.gif' 			=> 'nfg.jpg', // Hazy
 'nt_mostlycloudy.gif' 	=> 'nbkn.jpg', // Mostly Cloudy
 'nt_mostlysunny.gif' 	=> 'nfew.jpg', // Mostly Sunny
 'nt_partlycloudy.gif' 	=> 'nsct.jpg', // Partly Cloudy
 'nt_partlysunny.gif' 	=> 'nsct.jpg', // Partly Sunny
 'nt_rain.gif' 			=> 'nra.jpg', // Rain
 'nt_sleet.gif' 		=> 'ip.jpg', // Sleet
 'nt_sleat.gif'         => 'ip.jpg', // Sleet (other spelling)
 'nt_snow.gif' 			=> 'nsn.jpg', // Snow
 'nt_sunny.gif' 		=> 'nskc.jpg', // Sunny
 'nt_tstorms.gif' 		=> 'ntsra.jpg', // Thunderstorms
 'nt_unknown.gif' 		=> 'na.jpg', // Unknown
) ;
//
$Force = false;

if (isset($_REQUEST['force']) and  $_REQUEST['force']=="1" ) {

  $Force = true;
}

$doDebug = false;
if (isset($_REQUEST['debug']) and strtolower($_REQUEST['debug'])=='y' ) {
  $doDebug = true;
}

$fileName = $WU_URL;
if ($doDebug) {
  $Status .= "<!-- file: $fileName -->\n";
}

if (isset($_REQUEST['sce']) && strtolower($_REQUEST['sce']) == 'view' ) {
   //--self downloader --
   $filenameReal = $_SERVER["PATH_TRANSLATED"];
   $filenameLcl = substr($PHP_SELF,1);
   $download_size = filesize($filenameReal);
   header('Pragma: public');
   header('Cache-Control: private');
   header('Cache-Control: no-cache, must-revalidate');
   header("Content-type: text/plain");
   header("Accept-Ranges: bytes");
   header("Content-Length: $download_size");
   header('Connection: close');

   readfile($filenameReal);
   exit;
}


// The number 1800 below is the number of seconds the cache will be used instead of pulling a new file
// 1800 = 60s x 30m so it retreives every 30 minutes.

if (! $Force and file_exists($cacheName) and filemtime($cacheName) + $refetchSeconds > time()) {
      $html = implode('', file($cacheName));
      $Status .= "<!-- loading from $cacheName (" . strlen($html) . " bytes) -->\n";
  } else {
      $Status .= "<!-- loading from $fileName. -->\n";
      $html = fetchUrlwithoutHangingWU($fileName,$cacheName);
      $fp = fopen($cacheName, "w");
	  if (!$fp) {
	    $Status .= "<!-- unable to open $cacheName for writing. -->\n";
	  } else {
        $write = fputs($fp, $html);
        fclose($fp);
		$Status .= "<!-- saved cache to $cacheName (". strlen($html) . " bytes) -->\n";
	  }
}


  preg_match('|charset=([^"]+)"|i',$html,$matches);

  if (isset($matches[1])) {
    $charSet = $matches[1];
	$Status .= "<!-- using charset='$charSet' -->\n";
  } else {
    $charSet = 'iso-8859-1';
  }

 //  process the file .. select out the 7-day forecast part of the page
  $UnSupported = false;
  preg_match('|<div id="wundfct_contain">(.*)</table>\s+</div>|Uis',$html,$matches);
//  $Status .= "<!-- first slice for table matches\n" . print_r($matches,true) . "  end first slice matches-->\n";	  
  if(count($matches) < 1 and strlen($html) > 1000) { // oops... not parsable.. give 'em the news later
//  $Status .= "<!-- matches\n" . print_r($matches,true) . "-->\n";
  $UnSupported = true;	  
  }
  
$sevenday = $matches[1];
$sevenday = strip_tags($sevenday,'<td><tr><table></td></tr></table><img><b></b><div></div>');
//  $Status .= "<!-- tagstripped sevenday\n" . $sevenday . " end of sevenday -->\n";
  
  preg_match_all('|<td[^>]*>(.*)</td>|Uis',$sevenday,$matches); // slice out the individual days
  $rows = $matches[1];
  if ($doDebug) {
    $Status .= "<!-- table rows\n" . print_r($rows,true) . " end table rows-->\n";	 
  }
  $WUforecastupdated = $rows[0];
  $WUforecastupdated = trim(strip_tags($WUforecastupdated)); // kill all embedded html 
  
  preg_match_all('|<div class="bm15">\s+<div class="mainB">([^<]+)</div>\s+<table|Uis',$html,$matches); // look for city name header
   if($doDebug) {
     $Status .= "<!-- cityname matches\n" . print_r($matches,true) . "-->\n";
   }
   $temp = explode("\n",$matches[1][0]); // split along lines
   $WUtitle = ucfirst(trim($temp[1])) . ' ' . trim($temp[2]);
   $WUforecastcity = trim($temp[3]);
  
  $n = 0; // counter for arrays to stuff data in

  for ($i=1;$i<count($rows);$i=$i+2) {  // pick data in pairs of rows
 
/* <!-- table rows
Array
(
    [0] => Updated: 12:00 AM GMT on January 31, 2008
    [1] => <img src="http://icons-pe.wxug.com/i/c/50/mostlysunny.gif" width="50" height="50" alt="" class="condIcon" />
    [2] => 
		Friday
		Scattered Clouds.
		High:
		41&deg; F.
		/
		5&deg; C.
		Wind
		West
		24 mph.
		/
		39 km/h.
		
    [3] => <img src="http://icons-pe.wxug.com/i/c/50/nt_chancerain.gif" width="50" height="50" alt="" class="condIcon" />
    [4] => 
		Friday Night
		Chance of Rain.
		Scattered Clouds.
		Low:
		33&deg; F.
		/
		1&deg; C.
		Wind
		WNW
		13 mph.
		/
		21 km/h.
		Chance of precipitation 20%.
		
*/   
    $WUforecasticon[$n] = $rows[$i];
	preg_match('|src="([^"]+)"|i',$rows[$i],$temp); // extract raw image name
	$t = parse_url($temp[1]);
	$t = pathinfo($t['path']);
	$WUforecasticon[$n] = $t['basename'];
	if ($doDebug) {
      $Status .= "<!-- forecasticon[$n]='" . $WUforecasticon[$n] . "' -->\n";
	}	

    preg_match('|<div class="b">(.*)</div>(.*)|is',$rows[$i+1],$temp); // extract period
//	  $Status .= "<!-- temp\n" . print_r($temp,true) . "-->\n";	 
	$WUforecastday[$n] = trim($temp[1]);
	$WUforecasttitles[$n] = $WUforecastday[$n];
	if ($doDebug) {
      $Status .= "<!-- forecastday[$n]='" . $WUforecastday[$n] . "' -->\n";
	}	

	$WUforecasttext[$n] = trim( preg_replace("|\n\s+|is",' ',$temp[2]) );
	$WUforecasttext[$n] = preg_replace('|Chance of precipitation|s',$xlateCOP,$WUforecasttext[$n]);
	if ($doDebug) {
      $Status .= "<!-- forecasttext[$n]='" . $WUforecasttext[$n] . "' -->\n";
	}
	
	if (preg_match('|(\d+)\%|',$WUforecasttext[$n],$temp)) {
	  $WUforecastpop[$n] = $temp[1]; // got a PoP
	   } else {
	  $WUforecastpop[$n] = '';
	 }
	if ($doDebug) {
      $Status .= "<!-- forecastpop[$n]='" . $WUforecastpop[$n] . "' -->\n";
	}

// fixup temperature
//High: 71&deg; F. / 22&deg; C.	
	preg_match('|(\S+)\:{0,1} ([\d-]+\&deg; \S)\.\s+/\s+([\d-]+\&deg; \S)\.|is',$WUforecasttext[$n],$temp);
//    $Status .= "<!-- temp[$n]='" . print_r($temp,true) . "' -->\n";
	if (strlen($temp[1])>4) {
	  $temp[1] = '';
	} else {
	  $temp[1] .= ': ';
	}

    $color = '#FF0000';
	if (preg_match('|nt_|i',$WUforecasticon[$n]) ) { // cheap.. if icon=night_, assume low.
	  $color = '#0000FF';
	}
	$WUforecasttemp[$n] = "<span style=\"color: $color;\">" . $temp[2] . "<br/>" .
	  $temp[3] . '</span>';  // assemble the temperature
	$WUforecasttemp[$n] = preg_replace('|; |is',';',$WUforecasttemp[$n]); // clean out space

	if ($doDebug) {
      $Status .= "<!-- forecasttemp[$n]='" . $WUforecasttemp[$n] . "' -->\n";
	}
	
	$temp = explode('.',$WUforecasttext[$n]); // split as sentences (sort of).
	
	$WUforecastcond[$n] = trim($temp[0]); // take first one as summary.
	if ($doDebug) {
      $Status .= "<!-- forecastcond[$n]='" . $WUforecastcond[$n] . "' -->\n";
	}
	
	if(preg_match('| |',$WUforecastday[$n]) ) {
	  $WUforecastday[$n] = preg_replace('| |','<br/>',$WUforecastday[$n],1);
	} else {
	  $WUforecastday[$n] .= "<br/>";
	}
	
	$WUforecasticons[$n] = $WUforecastday[$n] . "<br/>" .
	     img_replace($WUforecasticon[$n],$WUforecastcond[$n],$WUforecastpop[$n]) . "<br/>" .
		 $WUforecastcond[$n];
		
	if ($doDebug) {
	  $Status .= "\n";
	}
	$n++;
}

// All finished with parsing, now prepare to print

	   $wdth = intval(100/count($WUforecasticons));
	   $ndays = intval(count($WUforecasticon)/2);
	   
	   $WUtitle = preg_replace('|5|i',$ndays,$WUtitle,1);
	
       $doNumIcons = $maxIcons;
	   if(count($WUforecasticons) < $maxIcons) { $doNumIcons = count($WUforecasticons); }

  $IncludeMode = false;
  $PrintMode = true;

  if (isset($doPrintWU) && ! $doPrintWU ) {
      print $Status;
      return;
  }
  if (isset($_REQUEST['inc']) && 
      strtolower($_REQUEST['inc']) == 'noprint' ) {
      print $Status;
	  return;
  }

if (isset($_REQUEST['inc']) && strtolower($_REQUEST['inc']) == 'y') {
  $IncludeMode = true;
}
if (isset($doIncludeWU)) {
  $IncludeMode = $doIncludeWU;
}

$printHeading = true;
$printIcons = true;
$printText = true;

if (isset($doPrintHeadingWU)) {
  $printHeading = $doPrintHeadingWU;
}
if (isset($_REQUEST['heading']) ) {
  $printHeading = substr(strtolower($_REQUEST['heading']),0,1) == 'y';
}

if (isset($doPrintIconsWU)) {
  $printIcons = $doPrintIconsWU;
}
if (isset($_REQUEST['icons']) ) {
  $printIcons = substr(strtolower($_REQUEST['icons']),0,1) == 'y';
}
if (isset($doPrintTextWU)) {
  $printText = $doPrintTextWU;
}
if (isset($_REQUEST['text']) ) {
  $printText = substr(strtolower($_REQUEST['text']),0,1) == 'y';
}


if (! $IncludeMode and $PrintMode) { ?>
<?php
} // end printmode and not includemode
print $Status;
// if the forecast text is blank, prompt the visitor to force an update

if($UnSupported) {

  print <<< EONAG
<h1>Sorry.. this country <a href="$WU_URL">forecast</a> can not be processed by this script.</h1>
<p>Locations in the United States and territories should use the <a href="http://saratoga-weather.org/scripts-carterlake.php#advforecast">carterlake NOAA script</a>.</p>
<p>Locations in Canada should use the <a href="http://saratoga-weather.org/scripts-ECforecast.php#ECforecast">Environment Canada forecast script</a>.</p>

EONAG
;
}

if (strlen($WUforecasttext[0])<2 and $PrintMode and ! $UnSupported ) {

  echo '<br/><br/>Forecast blank? <a href="' . $PHP_SELF . '?force=1">Force Update</a><br/><br/>';

} 
if ($PrintMode and ($printHeading or $printIcons)) {  ?>
  <table width="<?php print $maxWidth; ?>" style="border: none;" class="WUforecast">
    <?php if($printHeading) { ?>
      <td><b>WeatherUnderground <?php echo $WUtitle; ?>: </b><span style="color: green;">
	   <?php echo $WUforecastcity; ?></span>
      </td>
    </tr>
    <tr>
      <td align="center"><?php echo $WUforecastupdated; ?>
	  </td>
    </tr>
	<?php } // end print heading
	
	if ($printIcons) {
	?>
    <tr>
      <td align="center">
	    <table width="100%" border="0" cellpadding="0" cellspacing="0">  
	      <tr valign ="top" align="center">
	<?php
	  for ($i=0;$i<$doNumIcons;$i++) {
	    print "<td style=\"width: $wdth%;\"><span style=\"font-size: 8pt;\">$WUforecasttitles[$i]</span></td>\n";
	  }
	?>
          </tr>	
	      <tr valign ="top" align="center">
	<?php
	  for ($i=0;$i<$doNumIcons;$i++) {
	    print "<td style=\"width: $wdth%;\">" . img_replace($WUforecasticon[$i],$WUforecastcond[$i],$WUforecastpop[$i]) . "</td>\n";
	  }
	?>
          </tr>	
	      <tr valign ="top" align="center">
	<?php
	  for ($i=0;$i<$doNumIcons;$i++) {
	    print "<td style=\"width: $wdth%;\"><span style=\"font-size: 8pt;\">$WUforecastcond[$i]</span></td>\n";
	  }
	?>
          </tr>	
          <tr valign ="top" align="center">
	  <?php
	  for ($i=0;$i<$doNumIcons;$i++) {
	    print "<td style=\"width: $wdth%;\">$WUforecasttemp[$i]</td>\n";
	  }
	  ?>
          </tr>
	<?php if(! $iconDir) { // print a PoP row since they aren't using icons ?>
	      <tr valign ="top" align="center">
	<?php
	  for ($i=0;$i<$doNumIcons;$i++) {
	    print "<td style=\"width: $wdth%;\">";
	    if($WUforecastpop[$i] > 0) {
  		  print "<span style=\"font-size: 8pt; color: #009900;\">PoP: $WUforecastpop[$i]%</span>";
		} else {
		  print "&nbsp;";
		}
		print "</td>\n";
		
	  }
	?>
          </tr>	
	  <?php } // end if iconDir ?>
        </table><!-- end icon table -->
     </td>
   </tr><!-- end print icons -->
   	<?php } // end print icons ?>
</table>

<?php } // end print header or icons

if ($PrintMode and $printText) { ?>

<?php } // end print text ?>
<?php if ($PrintMode) { ?>

<p>Forecast from <a href="<?php echo htmlspecialchars($fileName); ?>">WeatherUnderground</a> and <a href="http://www.camp26.com">Camp26 WF</a> 
for <?php echo $WUforecastcity; ?>.</p>
<?php
} // end printmode

 if (! $IncludeMode and $PrintMode ) { ?>
</body>
</html>
<?php 
}  

 
// Functions --------------------------------------------------------------------------------

function fetchUrlWithoutHangingWU($url,$cacheurl)
   {
   global $Status;
   // Set maximum number of seconds (can have floating-point) to wait for feed before displaying page without feed
   $numberOfSeconds=4;    

   // Suppress error reporting so Web site visitors are unaware if the feed fails
   error_reporting(0);

   // Extract resource path and domain from URL ready for fsockopen

   $url = str_replace("http://","",$url);
   $urlComponents = explode("/",$url);
   $domain = $urlComponents[0];
   $resourcePath = str_replace($domain,"",$url);
   $xml = '';

   // Establish a connection
   $socketConnection = fsockopen($domain, 80, $errno, $errstr, $numberOfSeconds);

   if (!$socketConnection)
       {

       // You may wish to remove the following debugging line on a live Web site

       $Status .= "<!-- Network error: $errstr ($errno) -->\n";
       }    // end if
   else    {
       $xml = '';
       fputs($socketConnection, "GET $resourcePath HTTP/1.0\r\nHost: $domain\r\n\r\n");
   
       // Loop until end of file
       while (!feof($socketConnection))
           {
           $xml .= fgets($socketConnection, 4096);
           }    // end while

       fclose ($socketConnection);

       }    // end else

   return($xml);

   }    // end function

// -------------------------------------------------------------------------------------------
   
 function img_replace ( $WUimage, $WUcondtext,$WUpop) {
//
// optionally replace the WeatherUnderground icon with an NWS icon instead.
// 
 global $NWSiconlist,$iconDir;
// $WU_URL = 'http://icons-aa.wxug.com/graphics/conds/';
// $WU_URL = 'http://icons.wunderground.com/graphics/conds/2005/';
 $WU_URL = 'http://icons-pe.wxug.com/i/c/50/';
 
 $curicon = $NWSiconlist[$WUimage]; // translated icon (if any)

 if (!$iconDir or !$curicon) { // no change.. use WU icon
   return("<img src=\"$WU_URL$WUimage\" width=\"50\" height=\"50\" 
  alt=\"$WUcondtext\" title=\"$WUcondtext\"/>"); 
 }
   
  if ($WUpop > 0) {
	$testicon = preg_replace("|.jpg|","$WUpop.jpg",$curicon);
	if (file_exists("$iconDir$testicon")) {
	  $newicon = $testicon;
	} else {
	  $newicon = $curicon;
	}
  } else {
	$newicon = $curicon;
  }

  return("<img src=\"$iconDir$newicon\" width=\"55\" height=\"58\" 
  alt=\"$WUcondtext\" title=\"$WUcondtext\"/>"); 
 
 
 }
// End of functions --------------------------------------------------------------------------
//Weather Forecast by www.camp26.com - Special Joomla Clubs
?>