<?php
// ********************************************************************************************
// Title          Module to report new messages in udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2008 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

$uddeim_isadmin = 0;
if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
	require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
} else {
	global $mainframe;
	require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
}

$udd_pathtoadmin = uddeIMgetPath('admin');
$udd_pathtouser  = uddeIMgetPath('user');
$udd_pathtosite  = uddeIMgetPath('live_site');
$udd_database    = uddeIMgetDatabase();
$udd_mosConfig_lang = uddeIMgetLang();

require_once($udd_pathtouser.'/crypt.class.php');
require_once($udd_pathtoadmin.'/config.class.php');
$udd_config = new uddeimconfigclass();

if(!defined('_UDDEIM_INBOX')) {
	$udd_postfix = "";
	if ($udd_config->languagecharset)
		$udd_postfix = ".utf8";
	if (file_exists($udd_pathtoadmin.'/language'.$udd_postfix.'/'.$udd_mosConfig_lang.'.php')) {
		include_once($udd_pathtoadmin.'/language'.$udd_postfix.'/'.$udd_mosConfig_lang.'.php');
	} elseif (file_exists($udd_pathtoadmin.'/language'.$udd_postfix.'/english.php')) {
		include_once($udd_pathtoadmin.'/language'.$udd_postfix.'/english.php');
	} elseif (file_exists($udd_pathtoadmin.'/language/english.php')) {
		include_once($udd_pathtoadmin.'/language/english.php');
	}
	$GLOBALS['udde_smon'] = $udde_smon;
	$GLOBALS['udde_lmon'] = $udde_lmon;
	$GLOBALS['udde_sweekday'] = $udde_sweekday;
	$GLOBALS['udde_lweekday'] = $udde_lweekday;
}

$udd_par_hidenotifier = (int)$params->get( 'uddhidenotifier', '0' );
$udd_par_showmsg      = (int)$params->get( 'uddshowmsg', '1' );
$udd_par_maxchars     = (int)$params->get( 'uddmaxchars', '24' );
$udd_par_manylines    = (int)$params->get( 'uddmanylines', '5' );
$udd_cbDHTMLPopup     = (int)$params->get( 'uddeDHTMLpopup', 1);
$udd_cbenablepopup    = (int)$params->get( 'uddeenablepopup', 0 );
$udd_uddeenableajax   = (int)$params->get( 'uddeenableajax', 0 );
$udd_uddeajaxtime     = (int)$params->get( 'uddeajaxtime', 0 );
$udd_nametype         = (int)$params->get( 'uddnametype', 0 );
$udd_rightpos         = (int)$params->get( 'uddrightpos', '10' );
$udd_timeout          = (int)$params->get( 'uddtimeout', '10000' );
$udd_rightspeed       = (int)$params->get( 'uddrightspeed', '20' );
$udd_leftspeed        = (int)$params->get( 'uddleftspeed', '20' );

if (!$udd_par_maxchars)		$udd_par_maxchars = 24;
if ($udd_par_manylines<0)	$udd_par_manylines = 0;
if ($udd_uddeajaxtime<5)	$udd_uddeajaxtime = 5;

if (!is_callable("cbLoginCheckJversion")) {
	function cbLoginCheckJversion() {
		$udd_version = uddeIMgetVersion();
		if ($udd_version->PRODUCT == "Mambo") {
			if ( strncasecmp( $udd_version->RELEASE, "4.6", 3 ) < 0 ) {
				$udd_ver = 0;
			} else {
				$udd_ver = -1;
			}
		} elseif ($udd_version->PRODUCT == "Joomla!" || $udd_version->PRODUCT == "Accessible Joomla!") {
			if (strncasecmp($udd_version->RELEASE, "1.0", 3)) {
				$udd_ver = 1;
			} else {
				$udd_ver = 0;
			}
		}
		return $udd_ver;
	}
}

$udd_userid = uddeIMgetUserID();
$udd_mygroupid = uddeIMgetGroupID();

$udd_moduleSubPath = $udd_pathtosite."/modules/mod_uddeim";
switch ( cbLoginCheckJversion() ) {
 	case 0:		// Mambo 4.5 & Joomla 1.0:
				$udd_moduleSubPath = $udd_pathtosite."/modules/mod_uddeim";
				break;
 	case -1:	// Mambo 4.6.x:
				$udd_moduleSubPath = $udd_pathtosite."/modules/mod_uddeim";
				break;
 	case 1:
 	default:	// Joomla 1.5+
				$udd_moduleSubPath = $udd_pathtosite."/modules/mod_uddeim/mod_uddeim";
				break;
}

if (!$udd_userid) {
	if (!$udd_par_hidenotifier) {
		echo "<div id='uddeim-module'>";
		echo "<p class='uddeim-module-head'>"._UDDEIM_NOTLOGGEDIN."</p>";
		echo "</div>";
	}
	return;
}

switch($udd_nametype) {
	case 0 : $udd_query = "SELECT name FROM #__users WHERE id = ". (int)$udd_userid; break;
	case 1 : $udd_query = "SELECT username FROM #__users WHERE id = ". (int)$udd_userid; break;
	case 2 : if (uddeIMmodCheckCB()) {
				$udd_query = "SELECT firstname FROM #__comprofiler WHERE id = ". (int)$udd_userid;
			 } else {
				$udd_query = "SELECT name FROM #__users WHERE id = ". (int)$udd_userid; break;
			 }
			 break;
}
$udd_database->setQuery( $udd_query );
$udd_name = htmlspecialchars($udd_database->loadResult());

// first try to find a published link
$udd_sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=1 AND access".
		($udd_mygroupid==0 ? "=" : "<=").$udd_mygroupid." LIMIT 1";
$udd_database->setQuery($udd_sql);
$udd_item_id = (int)$udd_database->loadResult();
if (!$udd_item_id) {
	// when no published link has been found, try to find an unpublished one
	$udd_sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=0 AND access".
			($udd_mygroupid==0 ? "=" : "<=").$udd_mygroupid." LIMIT 1";
	$udd_database->setQuery($udd_sql);
	$udd_item_id = (int)$udd_database->loadResult();
}
if ($udd_config->overwriteitemid)
	$udd_item_id = $udd_config->useitemid;


$udd_pms_link = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=inbox".($udd_item_id ? "&Itemid=".$udd_item_id : ""));

$udd_sql="SELECT a.*, b.".($udd_config->realnames ? "name" : "username")." AS displayname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toread=0 AND a.totrash=0 AND a.toid=".(int)$udd_userid." ORDER BY a.datum";
//if ($udd_par_manylines>0) {
//	$udd_sql.=" LIMIT ".$udd_par_manylines;
//}
$udd_database->setQuery($udd_sql);
$udd_allmessages=$udd_database->loadObjectList();
$udd_totalmessages=count($udd_allmessages);

if (!$udd_par_hidenotifier) {
	if (file_exists(uddeIMgetPath('absolute_path').'/components/com_uddeim/templates/'.$udd_config->templatedir.'/css/uddemodule.css')) {
		echo '<link rel="stylesheet" href="'.$udd_pathtosite.'/components/com_uddeim/templates/'.$udd_config->templatedir.'/css/uddemodule.css" type="text/css" />';
	} elseif(file_exists(uddeIMgetPath('absolute_path').'/components/com_uddeim/templates/default/css/uddemodule.css')) {
		echo '<link rel="stylesheet" href="'.$udd_pathtosite.'/components/com_uddeim/templates/default/css/uddemodule.css" type="text/css" />';
	}
}
$udd_uddeicons_modulenewmess    = $udd_pathtosite.'/components/com_uddeim/templates/'.$udd_config->templatedir.'/images/env_ani.gif';
$udd_uddeicons_modulenonewmess  = $udd_pathtosite.'/components/com_uddeim/templates/'.$udd_config->templatedir.'/images/env.gif';
$udd_luddeicons_modulenewmess   = $udd_pathtouser.'/templates/'.$udd_config->templatedir.'/images/env_ani.gif';
$udd_luddeicons_modulenonewmess = $udd_pathtouser.'/templates/'.$udd_config->templatedir.'/images/env.gif';

if ($udd_cbenablepopup && $udd_totalmessages>0) {		// NEW MESSAGES, so do notification popups when enabled
	// ALERT-POPUP-CODE ##################################################################################
	$udd_DoAlert = 0;
	$udd_query_popup = "SELECT popup FROM #__uddeim_emn WHERE userid=". (int)$udd_userid;
	$udd_database->setQuery( $udd_query_popup );
	$udd_dopopup = (int)$udd_database->loadResult();
	if ($udd_dopopup)
		$udd_DoAlert = 1;
	// do not show popup when PMS component is active
	if (stristr($_SERVER['REQUEST_URI'],'option=com_uddeim')!==FALSE)
		$udd_DoAlert = 0;
	if (stristr($_SERVER['REQUEST_URI'],'/uddeim')!==FALSE)
		$udd_DoAlert = 0;
	if ( $udd_DoAlert ) {
		// ToDo: Set flag, message has been displayed
		switch( $udd_cbDHTMLPopup ) {
			case 1:		$udd_message = "Hi " . $udd_name . "<br />";
						$udd_message .= _UDDEMODULE_YOUHAVE." ".$udd_totalmessages." ".($udd_totalmessages == 1 ? _UDDEMODULE_MESSAGE : _UDDEMODULE_MESSAGES);
						uddepmscalldhtml($udd_message, $udd_pms_link, $udd_moduleSubPath);
						break;
			case 2:		$udd_message = "Hi " . $udd_name . "<br />";
						$udd_message .= _UDDEMODULE_YOUHAVE." ".$udd_totalmessages." ".($udd_totalmessages == 1 ? _UDDEMODULE_MESSAGE : _UDDEMODULE_MESSAGES);
						uddepmscalldhtmlfloater($udd_timeout, $udd_rightpos, $udd_rightspeed, $udd_leftspeed, $udd_uddeicons_modulenewmess, $udd_message, $udd_pms_link, $udd_moduleSubPath);
						break;
			default:	$udd_message .= "\\n"._UDDEMODULE_YOUHAVE." ".$udd_totalmessages." ".($udd_totalmessages == 1 ? _UDDEMODULE_MESSAGE : _UDDEMODULE_MESSAGES)."\\n";
						echo uddepmscalljava($udd_message, $udd_pms_link, $udd_moduleSubPath);
						break;
		}
	}
}


if (!$udd_par_hidenotifier) {
	if (class_exists('JHTML')) {
		$udd_completeURL = "index.php?option=com_uddeim&task=ajaxGetNewMessages&no_html=1";
	} else {
		$udd_completeURL = "index2.php?option=com_uddeim&task=ajaxGetNewMessages&no_html=1";
	}

	if ($udd_uddeenableajax) {
		$udd_ajaxcode = 
"<SCRIPT LANGUAGE='JavaScript'>
<!--
uddSetTimer();
function uddSetTimer() {
//	var almin = document.getElementById('refhmsg');
//	if (document.getElementById('refhmsg')!=null) {
//		min=almin*60000;
//	} else {
//		min=6000;
//	}
	var uddMin = ".$udd_uddeajaxtime."*1000;
	var uddTimer = setInterval('uddShowUser()', uddMin);
}
var uddXMLHttp;
var uddTotal = ".$udd_totalmessages.";
function uddShowUser() { 
	uddXMLHttp = uddGetXmlHttpObject()
	if (uddXMLHttp==null) {		// alert ('Browser does not support HTTP Request');
		return;
	}
	var uddURL = '".$udd_completeURL."';
	uddXMLHttp.onreadystatechange = uddStateChanged;
	uddXMLHttp.open('GET',uddURL,true);
	uddXMLHttp.send(null);
}

function uddStateChanged() { 
	if (uddXMLHttp.readyState==4 || uddXMLHttp.readyState=='complete') { 
		// document.getElementById('txtHint').innerHTML=uddXMLHttp.responseText 
		var uddAllValue = uddXMLHttp.responseText;
		// chkval= AllValue.split('~');
		uddChkval = uddAllValue.split('~');
		if (uddChkval[0]!=0) {
			if (document.getElementById('uddeim-nomessage'))
				document.getElementById('uddeim-nomessage').innerHTML = '"._UDDEMODULE_NEWMESSAGES."'+' '+uddChkval;
			if (document.getElementById('uddeim-noimage'))
				document.getElementById('uddeim-noimage').src = '".$udd_uddeicons_modulenewmess."';
		} else {
			if (document.getElementById('uddeim-nomessage'))
				document.getElementById('uddeim-nomessage').innerHTML = '"._UDDEMODULE_NONEW."';
			if (document.getElementById('uddeim-noimage'))
				document.getElementById('uddeim-noimage').src = '".$udd_uddeicons_modulenonewmess."';
		}
		if (uddTotal!=uddChkval[0]) { ";

//			switch( $udd_cbDHTMLPopup ) {
// trigger the event to display floater box etc. here
//			}

		$udd_ajaxcode .= "} ";
		$udd_ajaxcode .= "
	} 
}
function uddGetXmlHttpObject() {
	var uddXMLHttp=null;
	try {
		// Firefox, Opera 8.0+, Safari
		uddXMLHttp = new XMLHttpRequest();
	}
	catch (e) {
		// Internet Explorer
		try {
			uddXMLHttp=new ActiveXObject('Msxml2.XMLHTTP');
		}
		catch (e) {
			uddXMLHttp=new ActiveXObject('Microsoft.XMLHTTP');
		}
	}
	return uddXMLHttp;
}
//-->
</SCRIPT>";
		echo $udd_ajaxcode;
	}

	$udd_headline = "<a href='".$udd_pms_link."'>"._UDDEMODULE_PRIVATEMESSAGES."</a>";

	if ($udd_totalmessages>0) {		// NEW MESSAGES

		echo "<div id='uddeim-modulenew'>";
		echo "<p class='uddeim-module-head'>".$udd_headline;
		if (file_exists($udd_luddeicons_modulenewmess))
			echo " <a href='".$udd_pms_link."'><img id='uddeim-noimage' border='0' src='".$udd_uddeicons_modulenewmess."' alt='' /></a>";
		echo "</p>";

		if (!$udd_par_showmsg) {	// DONT SHOW NEW MESSAGES
			echo "<p class='uddeim-module-body'><a id='uddeim-nomessage' href='".$udd_pms_link."'>"._UDDEMODULE_NEWMESSAGES." ".$udd_totalmessages."</a></p>";
		} else {				// SHOW NEW MESSAGES

			$udd_count=1;
			foreach($udd_allmessages as $udd_themessage) {
				if ($udd_count<=$udd_par_manylines || $udd_count==0) {
					if($udd_themessage->systemmessage) {
						$udd_whofrom=$udd_themessage->systemmessage;
					} else {
						$udd_whofrom=$udd_themessage->displayname;
					}
					if (function_exists('bcdiv')) {
						$udd_halfchars=bcdiv($udd_par_maxchars,2,0);
					} elseif (function_exists('floor')) {
						$udd_halfchars=floor($udd_par_maxchars/2);
					} else {
						$udd_halfchars=($udd_par_maxchars/2);
					}
					if(strlen($udd_whofrom)>=($udd_halfchars-1)) {
						$udd_whofrom=substr($udd_whofrom, 0, ($udd_halfchars-1));
						$udd_whofrom=$udd_whofrom.".";
					}

					$udd_cm = uddeIMgetMessage($udd_themessage->message, "", $udd_themessage->cryptmode, "", $udd_config->cryptkey);
					$udd_displaymessage=stripslashes($udd_cm);
					if($udd_themessage->systemmessage || $udd_config->allowbb) {					
						require_once ($udd_pathtouser."/bbparser.php");
						$udd_displaymessage=uddeIMbbcode_strip($udd_displaymessage);
					}
					$udd_displaymessage=htmlspecialchars($udd_displaymessage, ENT_QUOTES, $udd_config->charset);
					$udd_displaymessage=str_replace("&amp;#", "&#", $udd_displaymessage); 

					$udd_maxlen=$udd_par_maxchars-strlen($udd_whofrom)-1;	// one space
					if($udd_maxlen<5)
						$udd_maxlen=5;

					if ($udd_themessage->cryptmode==2) {
						$udd_pms_show = uddeIMsefRelToAbs("index.php?option=com_uddeim".($udd_item_id ? "&Itemid=".$udd_item_id : "")."&task=showpass&messageid=".$udd_themessage->id);
					} else {
						$udd_pms_show = uddeIMsefRelToAbs("index.php?option=com_uddeim".($udd_item_id ? "&Itemid=".$udd_item_id : "")."&task=show&messageid=".$udd_themessage->id);
					}
					if ($udd_par_showmsg==2) {
						echo "<p class='uddeim-module-row'>";
						echo "<a href='".$udd_pms_show."'>".$udd_whofrom."</a>";
						echo "</p>";
					} else {
						echo "<p class='uddeim-module-row'>".$udd_whofrom." ";
						echo "<a href='".$udd_pms_show."'>".uddTeaserHead($udd_displaymessage, $udd_maxlen)."</a>";
						echo "</p>";
					}
				}
				$udd_count++;
			}
		}
		echo "</div>";			// uddeim-modulenew
	} else {					// NO NEW MESSAGES

		echo "<div id='uddeim-module'>";
		echo "<p class='uddeim-module-head'>".$udd_headline;
		if (file_exists($udd_luddeicons_modulenonewmess))
			echo " <a href='".$udd_pms_link."'><img id='uddeim-noimage' border='0' src='".$udd_uddeicons_modulenonewmess."' alt='' /></a>";
		echo "</p>";
		echo "<p id='uddeim-nomessage' class='uddeim-module-body'>"._UDDEMODULE_NONEW."</p>";
		echo "</div>";	  

	}
}

function uddeIMmodCheckCB() {
	$udd_pathtocb = uddeIMgetPath('absolute_path')."/components/com_comprofiler/comprofiler.php";
	if (file_exists($udd_pathtocb))
		return true;
	return false;
}
  
function uddTeaserHead($udd_ofwhat, $udd_howlong) {
	$udd_msgparts=explode("__________", $udd_ofwhat, 2);

	$udd_words=explode(" ", $udd_msgparts[0]);
	$udd_howmanywords=count($udd_words);

	$udd_x=0;
	if (!$udd_howlong) { $udd_howlong=33; }
	$udd_trailstring="";
	if (strlen($udd_msgparts[0])>$udd_howlong) {
		$udd_howlong=$udd_howlong-3;
		$udd_trailstring="...";
	}
	$udd_construct="";
	// while ((strlen($udd_construct)+strlen($udd_words[$udd_x]))<=$udd_howlong):
	//		$udd_construct.=" ".$udd_words[$udd_x];
	// $udd_x++;
	// endwhile;
	if(strlen($udd_words[0])>$udd_howlong) {
		$udd_construct=substr($udd_words[0], 0, ($udd_howlong-3));
	} else {		
		for($udd_x=0; $udd_x < $udd_howmanywords; $udd_x++) {
			$udd_posslen=strlen($udd_construct)+strlen($udd_words[$udd_x]);
			if($udd_posslen<=$udd_howlong) {
				$udd_construct.=" ".$udd_words[$udd_x];
			} else {
				break;
			}
		}
	}
	$udd_construct.=$udd_trailstring;
	$udd_construct=ltrim($udd_construct);
	if(empty($udd_construct)) {
		$udd_construct="...";
	}	
	return $udd_construct;
}

// Popup-Code
function uddepmscalljava($udd_message,$udd_pms_link,$udd_moduleSubPath){
	$udd_javawindow = "<script language=\"Javascript\">"
	. "alert(\"$udd_message\")"
	. "</script>";
	return $udd_javawindow;
}

function uddepmscalldhtml($udd_message, $udd_pms_link, $udd_moduleSubPath){
	$udd_link = '<a href="'.$udd_pms_link.'"><div style="text-align: justify; padding: 2px 5px; font-size: 13px; font-family: Arial; width: 250px; background-color: #FFFFFF; color: #000000;">'.$udd_message.'</div></a>';
//	$udd_link = '<div style="text-align: justify; padding: 2px 5px; font-size: 13px; font-family: Arial; background-color: #FFFFFF; color: #000000;">'.$udd_message.'</div>';
        $udd_title = _UDDEMODULE_EXPRESSMESSAGE;
        //$udd_title = "<img src=\"$udd_mosConfig_live_site/modules/mod_uddeim/close.gif\" style=\"vertical-align: bottom;\" width=\"16\" height=\"14\" />".$udd_title;
	echo "<link href=\"".$udd_moduleSubPath."/popup.css\" rel=\"stylesheet\" type=\"text/css\" />\n";
	echo "<script language=\"Javascript\" src=\"".$udd_moduleSubPath."/domLib.js\"></script>\n"
		. "<script language=\"Javascript\" src=\"".$udd_moduleSubPath."/domTT.js\"></script>\n"
		. "<script language=\"Javascript\" src=\"".$udd_moduleSubPath."/domTT_drag.js\"></script>\n"
		. "<script type=\"text/javascript\" language=\"javascript\"><!--\n"
		. "	var domTT_styleClass = 'domTTWin';\n"
		. "	var domTT_draggable = true;\n"
		. "	var domTT_closeLink = '<img src=\"".$udd_moduleSubPath."/close.gif\" style=\"vertical-align: bottom;\" width=\"16\" height=\"14\" alt=\"\" />';\n"
		. "	window.onload = function(in_event) {\n"
		. "	  domTT_addPredefined('popup', 'caption', '$udd_title', 'content', '$udd_link', 'type', 'sticky');\n"
		. "	  domTT_activate('popup1', in_event, 'predefined', 'popup', 'x', 400, 'y', 150, 'delay', 200 );\n"	// 'width', 273, 
		. "	};\n"
		. "	window.onmousemove = function(in_event) {};\n"	// compatibility fix for overlib_mini.js
		. "-->\n"
		. "</script>\n";
}

function uddepmscalldhtmlfloater($udd_timeout, $udd_rightpos, $udd_rightspeed, $udd_leftspeed, $udd_uddeicons_modulenewmess, $udd_message, $udd_pms_link, $udd_moduleSubPath){
	$udd_link = "<a href='".$udd_pms_link."'>".$udd_message."</a>";
	echo "<link href='".$udd_moduleSubPath."/popupex.css' rel='stylesheet' type='text/css' />\n";
	echo "<div style='left: -450px;' id='floaterDiv' class='floaterTranslucent'>";
	  echo "<div class='floaterTitle'>"._UDDEMODULE_EXPRESSMESSAGE;
	  echo "<a href='javascript:floatOut()'><img src='".$udd_moduleSubPath."/close.gif' border='0' alt='' /></a>";
	  echo "</div>";
	  echo "<div class='floaterBody'><br />".$udd_link."<br /><br /><img src='".$udd_moduleSubPath."/mail.gif' border='0' alt='' /></div>\n";
	echo "</div>\n";
?>
<script language="JavaScript" type="text/javascript"><!--
function floatIn() {
	if (document.getElementById) {
		if (parseInt(obj.style["left"]) <  rightpos) {
			obj.style["left"] = parseInt(obj.style["left"]) + 20 + "px";
			setTimeout("floatIn()", <?php echo $udd_rightspeed; ?>);
		}
	}
}

function floatOut() {
	if (document.getElementById) {
		if (parseInt(obj.style["left"]) > -450) {
			obj.style["left"] = parseInt(obj.style["left"]) - 20 + "px";
			setTimeout("floatOut()", <?php echo $udd_leftspeed; ?>);
		} else {
			obj.style.visibility = "hidden";
		}
	}
}

function start() {
	if (document.getElementById) {
		obj = document.getElementById("floaterDiv");
		obj.style["left"] = "-450px";
		obj.style.visibility = "visible";
	}
	floatIn();
}

var rightpos = <?php echo $udd_rightpos; ?>;
if (document.getElementById) {
	if (rightpos<0) {
		rightpos = document.body.clientWidth + rightpos;
	}
}

setTimeout('floatOut();', <?php echo $udd_timeout; ?>);
window.onload = start;
-->
</script>
<?php
}
