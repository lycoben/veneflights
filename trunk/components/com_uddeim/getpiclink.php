<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         © 2007-2008 Stephan Slabihoud, © 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMshowThumbOrLink($id, $name, $config) {
// $config->getpiclink	1 wenn liste mit bildern
// $config->showcblink	1/2/3 link to CB/FB/Agora
// $config->showcbpic	1/2/3 pic from CB/FB/Agora
	if ($config->getpiclink) {		// with picture
		$ret = uddeIMgetPicLink($id, $name, $config);
	} else {						// without picture
		$ret = uddeIMgetLinkOnly($id, $name, $config);
	}
	return $ret;
}

// these functions are only called when $config->showcblink=1
function uddeIMgetPicLink($ofanid, $ofaname, $config) {	// PICTURE + LINK
	$gimmeback = uddeIMgetPicOnly($ofanid, $config);
	if ($gimmeback)
		$gimmeback .= "<br />";
	$gimmeback .= uddeIMgetLinkOnly($ofanid, $ofaname, $config);
	return $gimmeback;
}

// Agora: http://joomlame.com/index.php?option=com_agora&Itemid=33&task=profile&id=218
// components/com_agora/img/pre_avatars/377.gif

function uddeIMgetLinkOnly($ofanid, $ofaname, $config) {	// LINK only
	$database = uddeIMgetDatabase();
	$gimmeback = "";
	if ($config->showcblink==1) {			// CB
		$gimmeback = "<a href='".uddeIMsefRelToAbs("index.php?option=com_comprofiler&task=userProfile&user=".(int)$ofanid)."'>".$ofaname."</a>";
	} elseif ($config->showcblink==2) {		// FB
        // $sql = "SELECT id FROM #__menu WHERE link = 'index.php?option=com_fireboard' AND published = 1";
		// $database->setQuery($sql);
        // $fbid = (int)$database->loadResult();
		// $gimmeback = "<a href='".uddeIMsefRelToAbs("index.php?option=com_fireboard&task=showprf&func=fbprofile&userid=".(int)$ofanid."&Itemid=".(int)$fbid)."'>".$ofaname."</a>";
		$gimmeback = "<a href='".uddeIMsefRelToAbs("index.php?option=com_fireboard&task=showprf&func=fbprofile&userid=".(int)$ofanid)."'>".$ofaname."</a>";
	} elseif ($config->showcblink==3) {		// Agora
		$sql = "SELECT id FROM #__agora_users WHERE jos_id=".(int)$ofanid;
		$database->setQuery($sql);
		$agoraid = $database->loadResult($sql);
		$gimmeback = "<a href='".uddeIMsefRelToAbs("index.php?option=com_agora&task=profile&id=".(int)$agoraid)."'>".$ofaname."</a>";
	} else {
		$gimmeback = $ofaname;
	}
	return $gimmeback;
}

function uddeIMgetPicOnly($ofanid, $config) {				// PIC only
	$mosConfig_lang = uddeIMgetLang(); 
	$database = uddeIMgetDatabase();
	$gimmeback = "";

	if ($config->showcbpic==1) {	// CB

		if (is_dir(uddeIMgetPath('absolute_path')."/components/com_comprofiler/plugin/language/".$mosConfig_lang."/images"))
			$fileLang=$mosConfig_lang;
		else
			$fileLang="default_language";

		$sql="SELECT avatar FROM #__comprofiler WHERE user_id=".(int)$ofanid." LIMIT 1";
		$database->setQuery($sql);
		$ofanavatar=$database->loadResult();

		$filenamelocal  = uddeIMgetPath('absolute_path')."/images/comprofiler/tn".$ofanavatar;		// Thumbnail
		$filenamelive   = uddeIMgetPath('live_site')    ."/images/comprofiler/tn".$ofanavatar;		// Thumbnail

		$filenameglocal = uddeIMgetPath('absolute_path')."/images/comprofiler/".$ofanavatar;		// Gallery
		$filenameglive  = uddeIMgetPath('live_site')    ."/images/comprofiler/".$ofanavatar;		// Gallery

		// NOPHOTO for CB
		$filename2local = uddeIMgetPath('absolute_path')."/components/com_comprofiler/plugin/language/".$fileLang."/images/tnnophoto.jpg";
		$filename2live  = uddeIMgetPath('live_site')    ."/components/com_comprofiler/plugin/language/".$fileLang."/images/tnnophoto.jpg";

		// NOPHOTO for CBE
		$filename3local = uddeIMgetPath('absolute_path')."/images/".$fileLang."/tnnophoto.jpg";
		$filename3live  = uddeIMgetPath('live_site')    ."/images/".$fileLang."/tnnophoto.jpg";

		if (file_exists($filenamelocal) && is_file($filenamelocal)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filenamelive."' alt='' />", $config);
		} elseif (file_exists($filenameglocal) && is_file($filenameglocal) && $config->CBgallery) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filenameglive."' alt='' />", $config);
		} elseif (file_exists($filename2local) && is_file($filename2local)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename2live."' alt='' />", $config);
		} elseif (file_exists($filename3local) && is_file($filename3local)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename3live."' alt='' />", $config);
		}

	} elseif ($config->showcbpic==2) {		// FB

		$sql="SELECT avatar FROM #__fb_users WHERE userid=".(int)$ofanid." LIMIT 1";
		$database->setQuery($sql);
		$ofanavatar=$database->loadResult();

		$filenameglocal = uddeIMgetPath('absolute_path')."/images/fbfiles/avatars/".$ofanavatar;		// Gallery
		$filenameglive  = uddeIMgetPath('live_site')    ."/images/fbfiles/avatars/".$ofanavatar;		// Gallery

		$filename2local = uddeIMgetPath('absolute_path')."/images/fbfiles/avatars/s_nophoto.jpg";
		$filename2live  = uddeIMgetPath('live_site')    ."/images/fbfiles/avatars/s_nophoto.jpg";

		if (file_exists($filenameglocal) && is_file($filenameglocal)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filenameglive."' alt='' />", $config);
		} elseif (file_exists($filename2local) && is_file($filename2local)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename2live."' alt='' />", $config);
		}

	} elseif ($config->showcbpic==3) {		// Agora
//		$database->setQuery("UPDATE #__agora_config SET conf_value=$conf_value WHERE conf_name='$conf_name'");
//		$dbresult = $database->query();

		$adir = "";
		$useavatars = 0;
		if (file_exists(uddeIMgetPath('absolute_path')."/components/com_agora/cache/cache_config.php")) {
			include(uddeIMgetPath('absolute_path')."/components/com_agora/cache/cache_config.php");
			if (isset($agora_config['o_avatars_dir'])) {
				$adir = $agora_config['o_avatars_dir'];
			}
			if (isset($agora_config['o_avatars'])) {
				$useavatars = $agora_config['o_avatars'];
			}
		}

		if (!$adir)
			return $gimmeback;

		$sql = "SELECT id, show_avatars FROM #__agora_users WHERE jos_id=".(int)$ofanid;
		$database->setQuery($sql);
		$value = NULL;
		if ($database->loadObject($value)) {
			$agoraid = $value->id;
			$showavatars = $value->show_avatars;
		} else {
			$agoraid = "notfound";
			$showavatars = 0;
		}

		$pic1 = "/".$agoraid.".gif";
		$pic2 = "/".$agoraid.".jpg";
		$pic3 = "/".$agoraid.".png";
		
		$filename1local = uddeIMgetPath('absolute_path')."/".$adir.$pic1;
		$filename1live  = uddeIMgetPath('live_site')    ."/".$adir.$pic1;
		$filename2local = uddeIMgetPath('absolute_path')."/".$adir.$pic2;
		$filename2live  = uddeIMgetPath('live_site')    ."/".$adir.$pic2;
		$filename3local = uddeIMgetPath('absolute_path')."/".$adir.$pic3;
		$filename3live  = uddeIMgetPath('live_site')    ."/".$adir.$pic3;
		$filename4local = uddeIMgetPath('absolute_path')."/".$adir."/noavatar_sm.gif";
		$filename4live  = uddeIMgetPath('live_site')    ."/".$adir."/noavatar_sm.gif";

		if (file_exists($filename1local) && is_file($filename1local) && $useavatars && $showavatars) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename1live."' alt='' />", $config);
		} elseif (file_exists($filename2local) && is_file($filename2local) && $useavatars && $showavatars) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename2live."' alt='' />", $config);
		} elseif (file_exists($filename3local) && is_file($filename3local) && $useavatars && $showavatars) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename3live."' alt='' />", $config);
		} elseif (file_exists($filename4local) && is_file($filename4local)) {
			$gimmeback = uddeIMgetLinkOnly($ofanid, "<img class='uddeim-tn' src='".$filename4live."' alt='' />", $config);
		}

	}
	return $gimmeback;
}

function uddeIMgetStyleForThumb($config) {
	global $ueConfig;
	$st = "style='text-align:center; vertical-align:middle'";
	if ($config->getpiclink && $config->showcbpic==1) {
		if (file_exists(uddeIMgetPath('absolute_path')."/administrator/components/com_comprofiler/ue_config.php")) {
			include_once(uddeIMgetPath('absolute_path')."/administrator/components/com_comprofiler/ue_config.php");
			if (isset($ueConfig['thumbWidth'])) {
				if ($ueConfig['thumbWidth'])
					$st = "style='text-align:center; vertical-align:middle; width:".((int)$ueConfig['thumbWidth']+64)."px;'";
			}
		}
	}
	return $st;
}
