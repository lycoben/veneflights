<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

// some global variables
$versionstring="uddeIM 1.4/2008-10-01";		// version string for about boxes
$checkversion="1.4";						// version as above for check for update - this is the version we have
$configversion="1.0";						// this is the version number of the configuration file we expect to load

function uddeIMcheckJversion() {			// stolen from Cummunity Builder, -1 = Mambo>=4.6, 0 = Mambo <=4.5/J1.0, 1 = J1.5
	$version = uddeIMgetVersion();
	if ($version->PRODUCT == "Mambo") {
		if ( strncasecmp( $version->RELEASE, "4.6", 3 ) < 0 ) {
			$ver = 0;
		} else {
			$ver = -1;
		}
	} elseif ($version->PRODUCT == "Joomla!" || $version->PRODUCT == "Accessible Joomla!") {
		if (strncasecmp($version->RELEASE, "1.0", 3)) {
			$ver = 1;
		} else {
			$ver = 0;
		}
	}
	return $ver;
}

function uddeIMcheckCB() {
	$pathtocb = uddeIMgetPath('absolute_path')."/components/com_comprofiler/comprofiler.php";
	if (file_exists($pathtocb))
		return true;
	return false;
}

function uddeIMcheckFB() {
	$pathtofb = uddeIMgetPath('absolute_path')."/components/com_fireboard/fireboard.php";
	if (file_exists($pathtofb))
		return true;
	return false;
}

function uddeIMcheckAG() {
	$pathtoag = uddeIMgetPath('absolute_path')."/components/com_agora/agora.php";
	if (file_exists($pathtoag))
		return true;
	return false;
}

function uddeIM_utf8_check($Str) {
	for ($i=0; $i<strlen($Str); $i++) {
		if (ord($Str[$i]) < 0x80) continue; # 0bbbbbbb
		elseif ((ord($Str[$i]) & 0xE0) == 0xC0) $n=1; # 110bbbbb
		elseif ((ord($Str[$i]) & 0xF0) == 0xE0) $n=2; # 1110bbbb
		elseif ((ord($Str[$i]) & 0xF8) == 0xF0) $n=3; # 11110bbb
		elseif ((ord($Str[$i]) & 0xFC) == 0xF8) $n=4; # 111110bb
		elseif ((ord($Str[$i]) & 0xFE) == 0xFC) $n=5; # 1111110b
		else return false; # Does not match any model
		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
			if ((++$i == strlen($Str)) || ((ord($Str[$i]) & 0xC0) != 0x80))
				return false;
		}
	}
	return true;
}

function uddeIM_utf8_substr($str, $start) {
	preg_match_all("/./su", $str, $ar);
	if (func_num_args() >= 3) {
		$end = func_get_arg(2);
//		return mb_substr($str, $start, $end, "UTF-8");
		return join("", array_slice($ar[0], $start, $end));
	} else {
//		return mb_substr($str, $start, mb_strlen($str), "UTF-8");
		return join("", array_slice($ar[0], $start));
	}
}

function uddeIM_utf8_strlen($str) {
//	return mb_strlen($str, "UTF-8");
	$i = 0;
	$count = 0;
	$len = strlen ($str);
	while ($i < $len) {
		$chr = ord ($str[$i]);
		$count++;
		$i++;
		if ($i >= $len)
			break;
		if ($chr & 0x80) {
			$chr <<= 1;
			while ($chr & 0x80) {
				$i++;
				$chr <<= 1;
			}
		}
	}
	return $count;
}

function uddeIMquoteSmart($source) { 
	$database = uddeIMgetDatabase();
	if (get_magic_quotes_gpc()) { 
		$source = stripslashes($source); 
	}
	$source = $database->getEscaped( $source );
//	if (function_exists('mysql_real_escape_string')) {
//		mysql_real_escape_string($source); 
//	} else {
//		mysql_escape_string($source); 
//	} 
	return $source; 
} 

function uddetime($timezone = 0) {
	$mosConfig_offset = uddeIMgetOffset();
	$rightnow=time()+(($mosConfig_offset+$timezone)*3600);
	return $rightnow;
}

function uddeDate($ofwhat, $config) {
	global $udde_smon, $udde_lmon, $udde_sweekday, $udde_lweekday;

	$monat=trim(date('m', $ofwhat));
	$monat=doubleval($monat);
	$wochentag=trim(date('w', $ofwhat));

	$wert=date($config->datumsformat, $ofwhat);

	$ori_sweekday=date('D', $ofwhat);
	$ori_lweekday=date('l', $ofwhat);
	$ori_smonth=date('M', $ofwhat);
	$ori_lmonth=date('F', $ofwhat);

	if (strstr($config->datumsformat, "l")) {
		$wert=str_replace($ori_lweekday, $udde_lweekday[$wochentag], $wert);
	}
	if (strstr($config->datumsformat, "F")) {
		$wert=str_replace($ori_lmonth, $udde_lmon[$monat], $wert);
	}
	if (strstr($config->datumsformat, "D")) {
		$wert=str_replace($ori_sweekday, $udde_sweekday[$wochentag], $wert);
	}
	if (strstr($config->datumsformat, "M")) {
		$wert=str_replace($ori_smonth, $udde_smon[$monat], $wert);
	}
	return $wert;
}

function uddeLdate($ofwhat, $config) {
	global $udde_smon, $udde_lmon, $udde_sweekday, $udde_lweekday;

	$monat=trim(date('m', $ofwhat));
	$monat=doubleval($monat);
	$wochentag=trim(date('w', $ofwhat));

	$wert=date($config->ldatumsformat, $ofwhat);

	$ori_sweekday=date('D', $ofwhat);
	$ori_lweekday=date('l', $ofwhat);
	$ori_smonth=date('M', $ofwhat);
	$ori_lmonth=date('F', $ofwhat);

	if (strstr($config->ldatumsformat, "l")) {
		$wert=str_replace($ori_lweekday, $udde_lweekday[$wochentag], $wert);
	}
	if (strstr($config->ldatumsformat, "F")) {
		$wert=str_replace($ori_lmonth, $udde_lmon[$monat], $wert);
	}
	if (strstr($config->ldatumsformat, "D")) {
		$wert=str_replace($ori_sweekday, $udde_sweekday[$wochentag], $wert);
	}
	if (strstr($config->ldatumsformat, "M")) {
		$wert=str_replace($ori_smonth, $udde_smon[$monat], $wert);
	}
	return $wert;
}

function uddeIMgetCharsetalias($notalias) {
	$notalias=strtoupper($notalias);
	switch ($notalias) {
		case "ISO-8859-1":			$analias="ISO8859-1";		break;
		case "ISO88591":			$analias="ISO8859-1";		break;
		case "ISO8859-1":			$analias="ISO8859-1";		break;
		case "ISO-8859-8":			$analias="ISO8859-8";		break;
		case "ISO8859-8":			$analias="ISO8859-8";		break;
		case "ISO-8859-15":			$analias="ISO8859-15";		break;
		case "ISO8859-15":			$analias="ISO8859-15";		break;
		case "UTF-8":				$analias="UTF-8";			break;
		case "CP866":				$analias="866";				break;
		case "IBM866":				$analias="866";				break;
		case "866":					$analias="866";				break;
		case "CP1251":				$analias="Windows-1251";	break;
		case "WINDOWS-1251":		$analias="Windows-1251";	break;
		case "WINDOWS1251":			$analias="Windows-1251";	break;			
		case "WIN-1251":			$analias="Windows-1251";	break;
		case "1251":				$analias="Windows-1251";	break;
		case "CP1252":				$analias="Windows-1252";	break;
		case "WINDOWS-1252":		$analias="Windows-1252";	break;
		case "WINDOWS1252":			$analias="Windows-1252";	break;			
		case "1251":				$analias="Windows-1251";	break;
		case "KOI8-R":				$analias="koi8r";			break;
		case "KOI8R":				$analias="koi8r";			break;
		case "KOI8-RU":				$analias="koi8r";			break;
		case "BIG5":				$analias="950";				break;
		case "950":					$analias="950";				break;
		case "GB2312":				$analias="936";				break;
		case "936":					$analias="936";				break;
		case "BIG5-HKSCS":			$analias="BIG5-HKSCS";		break;
		case "SHIFT_JIS":			$analias="SJIS";			break;
		case "SJIS":				$analias="932";				break;
		case "932":					$analias="932";				break;
		case "EUC-JP":				$analias="EUCJP";			break;
		case "EUCJP":				$analias="EUCJP";			break;
		default:					$analias="ISO8859-1";		break;
	}
	return $analias;
}

function uddeIMgetCharsetMailalias($analias) {
	$analias=strtoupper($analias);
	switch ($analias) {
		case "ISO8859-1":			$notalias="ISO-8859-1";		break;
		case "ISO88591":			$notalias="ISO-8859-1";		break;			
		case "ISO-8859-1":			$notalias="ISO-8859-1";		break;
		case "ISO-8859-8":			$notalias="ISO-8859-8";		break;
		case "ISO8859-8":			$notalias="ISO-8859-8";		break;
		case "ISO-8859-15":			$notalias="ISO-8859-15";	break;
		case "ISO8859-15":			$notalias="ISO-8859-15";	break;
		case "UTF-8":				$notalias="UTF-8";			break;
		case "IBM866":				$notalias="ibm866";			break;
		case "866":					$notalias="ibm866";			break;
		case "CP866":				$notalias="ibm866";			break;
		case "CP1251":				$notalias="Windows-1251";	break;
		case "WINDOWS-1251":		$notalias="Windows-1251";	break;
		case "WINDOWS1251":			$notalias="Windows-1251";	break;			
		case "WIN-1251":			$notalias="Windows-1251";	break;
		case "1251":				$notalias="Windows-1251";	break;
		case "CP1252":				$notalias="Windows-1252";	break;
		case "WINDOWS1252":			$notalias="Windows-1252";	break;			
		case "WINDOWS-1252":		$notalias="Windows-1252";	break;
		case "1252":				$notalias="Windows-1252";	break;
		case "KOI8-RU":				$notalias="KOI8-R";			break;
		case "KOI8R":				$notalias="KOI8-R";			break;
		case "KOI8-R":				$notalias="KOI8-R";			break;		
		case "BIG5":				$notalias="Big5";			break;		
		case "950":					$notalias="Big5";			break;
		case "GB2312":				$notalias="GB2312";			break;			
		case "936":					$notalias="GB2312";			break;
		case "BIG5-HKSCS":			$notalias="BIG5-HKSCS";		break;
		case "SJIS":				$notalias="Shift_JIS";		break;
		case "SHIFT_JIS":			$notalias="Shift_JIS";		break;			
		case "932":					$notalias="Shift_JIS";		break;
		case "EUC-JP":				$notalias="EUC-JP";			break;
		case "EUCJP":				$notalias="EUC-JP";			break;
		default:					$notalias=$analias;			break;
	}
	if(!$notalias) {
		$notalias="ISO-8859-1";
	}
	return $notalias;
}

function uddeIMloadLanguage($pathtoadmin, $config) {
	$mosConfig_lang = uddeIMgetLang();
	// Get right language file or use english
	$postfix = "";
	$usedlanguage="";
	if ($config->languagecharset)
		$postfix = ".utf8";
	if (file_exists($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php')) {
		include($pathtoadmin.'/language'.$postfix.'/'.$mosConfig_lang.'.php');
		$usedlanguage='/language'.$postfix.'/'.$mosConfig_lang.'.php';
	} elseif (file_exists($pathtoadmin.'/language'.$postfix.'/english.php')) {
		include($pathtoadmin.'/language'.$postfix.'/english.php');
		$usedlanguage='/language'.$postfix.'/english.php';
	} elseif (file_exists($pathtoadmin.'/language/english.php')) {
		include($pathtoadmin.'/language/english.php');
		$usedlanguage='/language/english.php';
	}
	// register vars from language file
	$GLOBALS['udde_smon'] = $udde_smon;
	$GLOBALS['udde_lmon'] = $udde_lmon;
	$GLOBALS['udde_sweekday'] = $udde_sweekday;
	$GLOBALS['udde_lweekday'] = $udde_lweekday;
	return $usedlanguage;
}

function uddeIMcheckConfig(&$config) {
	$mosConfig_sitename = uddeIMgetSitename();
	// adjust non acceptable values
	if ((int)$config->captchalen<1)		 			{ $config->captchalen = 1;	}
	if ((int)$config->captchalen>8)		 			{ $config->captchalen = 8;	}
	if ((int)$config->firstwordsinbox<8) 			{ $config->firstwordsinbox = 8;	}
	if ((int)$config->ReadMessagesLifespan<1) 		{ $config->ReadMessagesLifespan = 1; }
	if ((int)$config->UnreadMessagesLifespan<1)		{ $config->UnreadMessagesLifespan = 1; }
	if ((int)$config->SentMessagesLifespan<1) 		{ $config->SentMessagesLifespan = 1; }
	if ((float)$config->TrashLifespan<0.01)			{ $config->TrashLifespan = 0.01; }
	if ((int)$config->ReadMessagesLifespan>60000) 	{ $config->ReadMessagesLifespan=60000; }
	if ((int)$config->UnreadMessagesLifespan>60000)	{ $config->UnreadMessagesLifespan=60000; }
	if ((int)$config->SentMessagesLifespan>60000) 	{ $config->SentMessagesLifespan=60000; }
	if ((float)$config->TrashLifespan>60000)		{ $config->TrashLifespan=60000; }
	if ((int)$config->maxarchive<10) 				{ $config->maxarchive=10; }
	if ((int)$config->longwaitingdays<14) 			{ $config->longwaitingdays=14; }
	if(!$config->charset) 							{ $config->charset="ISO8859-1"; }
	if(!$config->mailcharset) 						{ $config->mailcharset="ISO8859-1";	}
	if(!$config->sysm_username) 					{ $config->sysm_username=$mosConfig_sitename; }
}

function uddeIMdoPrune($config) {
	$database = uddeIMgetDatabase();

	$rightnow=uddetime($config->timezone);

	// trash read messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->ReadMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	// $trashoffset=((float)$config->TrashLifespan)*86400;
	// $trashframe=$rightnow-$trashoffset;
	// $sql="DELETE FROM #__uddeim WHERE toread>0 AND totrash<1 AND datum<".$timeframe;
	// change in behaviour: (move to trash, don't erase after timeframe elapsed)
	// $sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE toread=1 AND totrash=0 AND datum<".$timeframe." AND (totrashdate<".$trashframe." OR totrashdate IS NULL)";
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE archived=0 AND toread=1 AND totrash=0 AND datum<".$timeframe;
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// trash unread messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->UnreadMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	// $sql="DELETE FROM #__uddeim WHERE totrash<1 AND datum<".$timeframe;
	// change in behaviour: (move to trash, don't erase after timeframe elapsed)
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".$rightnow." WHERE archived=0 AND toread=0 AND totrash=0 AND datum<".$timeframe;	
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// trash sent messages after configured time frame, doesn't matter if these messages are intern, from public users or deleted users
	$offset=$config->SentMessagesLifespan*86400;
	$timeframe=$rightnow-$offset;
	$sql="UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".$rightnow." WHERE totrashoutbox=0 AND datum<".$timeframe;
	$database->setQuery($sql);
	$queryresult = $database->query();

	// DELETE
	// delete messages from trashcans after configured time frame (both, sender and receiver, must have trashed the message), doesn't matter if these messages are intern, from public users or deleted users
	$offset=((float)$config->TrashLifespan)*86400;
	$timeframe=$rightnow-$offset;
	// SSL: $sql="DELETE FROM #__uddeim WHERE totrash>0 AND totrashdate<".$timeframe;
	$sql="DELETE FROM #__uddeim WHERE (totrashoutbox=1 AND totrashdateoutbox<".$timeframe.") AND (totrash=1 AND totrashdate<".$timeframe.")";
	$database->setQuery($sql);
	$queryresult = $database->query();
	
	// DELETE
	// delete "copy to author" messages from trashcans after configured time frame, fromid is same as toid
	$offset=((float)$config->TrashLifespan)*86400;
	$timeframe=$rightnow-$offset;
	$sql="DELETE FROM #__uddeim WHERE (fromid=toid) AND (totrash=1 AND totrashdate<".$timeframe.")";
	$database->setQuery($sql);
	$queryresult = $database->query();

	// erase unread expired messages
	$sql="DELETE FROM #__uddeim WHERE toread=0 AND expires>0 AND expires<".$rightnow;
	$database->setQuery($sql);
	$queryresult = $database->query();
}
