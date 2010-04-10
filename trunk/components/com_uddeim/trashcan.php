<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2008 Stephan Slabihoud, � 2006 Benjamin Zweifel
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMshowTrashCan($myself, $item_id, $limit, $limitstart, $cryptpass, $config) {
	global $uddeicons_onlinepic, $uddeicons_offlinepic, $uddeicons_readpic, $uddeicons_unreadpic;

	$pathtosite = uddeIMgetPath('live_site');
	$pathtouser = uddeIMgetPath('user');
	$my_gid = uddeIMgetGID($myself);

	if( ($config->trashrestriction==0) ||
	    ($config->trashrestriction==1 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->trashrestriction==2 && in_array($my_gid,array(24,25))) ) {
		// ok trashcan enabled
	} else {
		$mosmsg=_UDDEADM_NOTRASHACCESS_NOT;
		$redirecturl=uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
		if (stristr($redirecturl, "trashcan")) {
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}
		uddeIMmosRedirect($redirecturl, $mosmsg);
	}

	$rightnow=uddetime($config->timezone);
	$offset=((float)$config->TrashLifespan) * 86400;
	$timeframe=$rightnow-$offset;

	$total = uddeIMgetTrashcanCount($myself, $timeframe);

	// now load messages as required
	if(!$limitstart) {
		$limitstart=0;
	}
	if(!$limit) {
		$limit=$config->perpage;
	}

	if ($limitstart>=$total)
		$limitstart=max(0,$limitstart - $limit);

	$allmessages = Array();
	if ($total>0)
		$allmessages = uddeIMselectTrashcan($myself, $timeframe, $limitstart, $limit, $config);
	
	// write the uddeim menu
	uddeIMprintMenu($myself, 'trashcan', $item_id, $config);
	echo "<div id='uddeim-m'>\n";

	// if no messages:
	if(count($allmessages)<1) { // no messages to list
		echo "<div id='uddeim-overview'><p>"._UDDEIM_NOMESSAGES_TRASHCAN."</p>\n</div>\n";
		// and close the HTML output and return
		echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
		return;
	}

	// now open the inbox container and table; write table headings
	echo "<div id='uddeim-overview'>";
	echo "<table cellpadding='7' width='100%'>";
//	echo "\n\n\t<tr><th class='sectiontableheader'>&nbsp;</th><th class='sectiontableheader'>"._UDDEIM_FROM." / "._UDDEIM_TO."</th><th class='sectiontableheader'>"._UDDEIM_MESSAGE."</th><th class='sectiontableheader'>"._UDDEIM_DATE."</th><th class='sectiontableheader'>&nbsp;</th></tr>";
	echo "\n\n\t<tr><th class='sectiontableheader'>&nbsp;</th><th class='sectiontableheader'>"._UDDEIM_FROM." / "._UDDEIM_TO."</th><th class='sectiontableheader'>"._UDDEIM_MESSAGE."</th><th class='sectiontableheader'>"._UDDEIM_DELETED."</th><th class='sectiontableheader'>&nbsp;</th></tr>";

	$i=1;
	// now write the list
	foreach($allmessages as $themessage) {

		if($themessage->toread) {
			$readcell=$uddeicons_readpic;
		} else {
			$readcell=$uddeicons_unreadpic;
		}

		$themarker = "";
		$theuser = 0;
		$datumcell = "";
//		$createdcell=uddeDate($themessage->datum, $config);
		if ($myself==$themessage->toid && $myself!=$themessage->fromid) {
			// Msg sent to me, sender is someone else, so user is in "fromid"
			$themarker = "&lt;";
			$theuser = $themessage->fromid;
			$datumcell=uddeDate($themessage->totrashdate, $config);
			// $displayname = $themessage->fromname;
			$displayname = uddeIMevaluateUsername($themessage->fromname, $themessage->fromid, $themessage->publicname);
		} elseif ($myself==$themessage->fromid && $myself!=$themessage->toid) {
			// Msg sent by me, receiver is someone else, so user is in "toid"
			$themarker = "&gt;";
			$theuser = $themessage->toid;
			$datumcell=uddeDate($themessage->totrashdateoutbox, $config);
			// $displayname = $themessage->toname;
			$displayname = uddeIMevaluateUsername($themessage->toname, $themessage->toid, $themessage->publicname);
		} else {	// this case appears when a copy to me message has been trashed my myself
			// totrashoutbox=1 messages (sender has trashed are not selected in the SQL statement, so they do not appear here
			// totrash=1 messages has been trashed by myself, so I show them in the trashcan
			$themarker = "&lt;";	// the message has been send to me (we could also reorder the if-clause and catch this case with "$myself==$themessage->toid" but maybe I change the marker sometime)
			$theuser = $themessage->fromid;
			$datumcell=uddeDate($themessage->totrashdate, $config);
			// $displayname = $themessage->fromname;
			$displayname = uddeIMevaluateUsername($themessage->fromname, $themessage->fromid, $themessage->publicname);
		}

		// systemmessage = "an XXX XXXX"
		$personalsys=0;
		if($themessage->systemmessage==$displayname && $myself==$themessage->toid) {
			$personalsys=1;
		}
		if($themessage->systemmessage && $myself==$themessage->toid) {
			$displayname=$themessage->systemmessage;
		}

		$fromcell = $themarker." ".$displayname;
		if ($theuser) {
			if(($config->showcblink && !$themessage->systemmessage) || ($config->showcblink && $personalsys)) {
				$fromcell = uddeIMshowThumbOrLink($theuser, $themarker." ".$displayname, $config);
			}

			// is this user currently online?
			if (($config->showonline && !$themessage->systemmessage) || ($config->showonline && $personalsys)) {
				$isonline = uddeIMisOnline($theuser);
				if($isonline) {
					$fromcell.="&nbsp;".$uddeicons_onlinepic;
				} else {
					$fromcell.="&nbsp;".$uddeicons_offlinepic;
				}
			}
		}

		// CRYPT
		$cm = uddeIMgetMessage($themessage->message, $cryptpass, $themessage->cryptmode, $themessage->crypthash, $config->cryptkey);

		$teasermessage=$cm;
		// if it is a system message or bb codes allowed, parse BB codes
		if ($themessage->systemmessage || $config->allowbb)
			$teasermessage=uddeIMbbcode_strip($teasermessage);

		$teasermessage=uddeIMteaser(stripslashes($teasermessage), $config->firstwordsinbox, $config->quotedivider, $config->languagecharset);
		$teasermessage=htmlspecialchars($teasermessage, ENT_QUOTES, $config->charset);
		$teasermessage=str_replace("&amp;#", "&#", $teasermessage);
		$safemessage=htmlspecialchars(stripslashes($cm), ENT_QUOTES, $config->charset);

		$messagecell=$teasermessage;

		if($config->actionicons) {
			$deletecell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=restore&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart."&messageid=".$themessage->id)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/recycle.gif' alt='"._UDDEIM_RESTORE."' title='"._UDDEIM_RESTORE."' /></a>";
		} else {
			$deletecell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=restore&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart."&messageid=".$themessage->id)."'>"._UDDEIM_RESTORE."</a>";
		}

		echo "\n\t<tr class='sectiontableentry".$i."'>";
		echo "\n\t\t<td style='width:32px; text-align:center; vertical-align:middle'>".$readcell."</td>";
		$st=uddeIMgetStyleForThumb($config);
		echo "\n\t\t<td ".$st.">".$fromcell."</td>";
		echo "\n\t\t<td>".$messagecell."</td>";
//		echo "\n\t\t<td>".$createdcell."</td>";
		echo "\n\t\t<td>".$datumcell."</td>";
		if($config->actionicons) {
			echo "\n\t\t<td style='width:32px; text-align:center; vertical-align:middle'>".$deletecell."</td>";
		} else {
			echo "\n\t\t<td class='pathway'>".$deletecell."</td>";
		}
		echo "</tr>";

		$i++;
		if ($i>2) {
			$i=1;
		}
	}

	// now close inbox table and container
	echo "\n</table></div>\n";

	// write the inbox navigation links
	$pageNav = new uddeIMmosPageNav($total, $limitstart, $limit);
	$referlink = "index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id;
	if($total>$limit) {
		$shownav = $pageNav->writePagesLinks($referlink);
		$shownav = uddeIMarrowReplace($shownav, $config->templatedir, $pathtouser);
		echo "<div id='uddeim-pagenav'>".$shownav."<br />";
		echo "[<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id."&limitstart=0&limit=".$total)."'>"._UDDEIM_SHOWALL."</a>]";
		echo "</div>\n";
	}

	$keephours=((float)$config->TrashLifespan) * 24;
	echo "<div id='uddeim-bottomlines'>";
	if ($config->TrashLifespanNote)
		echo "<p>"._UDDEIM_TRASHCAN_INFO_1.$keephours._UDDEIM_TRASHCAN_INFO_2."</p>";
	echo "</div>\n";
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', 'none', $config)."</div>\n";
}

// *****************************************************************************************

function uddeIMrestoreMessage($myself, $messageid, $limit, $limitstart, $item_id, $config) {

	$my_gid = uddeIMgetGID($myself);

	if( ($config->trashrestriction==0) ||
	    ($config->trashrestriction==1 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->trashrestriction==2 && in_array($my_gid,array(24,25))) ) {
		// ok trashcan enabled
	} else {
		$mosmsg=_UDDEADM_NOTRASHACCESS_NOT;
		$redirecturl=uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
		if (stristr($redirecturl, "trashcan")) {
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}
		uddeIMmosRedirect($redirecturl, $mosmsg);
	}

	// to do: show error message when trying to restore message that has been purged or is no longer available
	$exists = uddeIMexistsMessage($messageid);
	if (!$exists) {
		$mosmsg = _UDDEIM_CANTRESTORE;
		uddeJSEFredirect("index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart, $mosmsg);
		return;
	}

	$total = uddeIMgetArchiveCount($myself);
	if ($config->inboxlimit && $config->allowarchive) {		// inbox + archive
		$total = uddeIMgetInboxArchiveCount($myself);
	}
	// if ($inarchive >= $config->maxarchive && $my_gid<24) { // JACL support
	if ($total >= $config->maxarchive && $my_gid!=24 && $my_gid!=25) {
		echo "<p>"._UDDEIM_ARC_SAVED_1.$total._UDDEIM_ARC_SAVED_2."</p>\n";
		echo "<p>"._UDDEIM_ARC_SAVED_3."</p>\n";
		$mosmsg = _UDDEIM_LIMITREACHED;
		$redirecturl=uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
		uddeIMmosRedirect($redirecturl, $mosmsg);
	}

	// WAS: check if the deleted message was in the archive,  but the archive in not longer enabled, so deny access to the message
	// NOW: check if the deleted message was in the archive,  but the archive in not longer enabled, so unarchive message
	$isarchived = uddeIMgetArchivedFromTrashedMessage($myself, $messageid);
	// if not allowarchive: send back where came from
	if(!$config->allowarchive && $isarchived) {
		uddeIMupdateArchived($messageid, 0);
//		$mosmsg = _UDDEIM_ARCHIVENOTENABLED;
//		$redirecturl=uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
//		uddeIMmosRedirect($redirecturl, $mosmsg);
	}

	uddeIMrestoreMessageToInboxOutboxArchive($myself, $messageid);
	uddeJSEFredirect("index.php?option=com_uddeim&task=trashcan&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart);
}
