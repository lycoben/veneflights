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

// ===================================================================================================================
// USERS
// ===================================================================================================================

function uddeIMgetGID($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT gid FROM #__users WHERE id=".(int)$myself;
	$database->setQuery($sql);
	$my_gid=(int)$database->loadResult();
	return $my_gid;
}

function uddeIMgetNameFromUsername($username, $config) {
	$database = uddeIMgetDatabase();
//	$sql="SELECT ".($config->realnames ? "name" : "username")." FROM #__users WHERE username LIKE '".$username."'";		// username only is correct here
	$sql="SELECT ".($config->realnames ? "name" : "username")." FROM #__users WHERE username = " . $database->Quote( $username );		// username only is correct here
	$database->setQuery($sql);
	$value = $database->loadResult();
	return $value;
}

function uddeIMgetNameFromID($id, $config) {
	$database = uddeIMgetDatabase();
	$sql="SELECT ".($config->realnames ? "name" : "username")." FROM #__users WHERE id=".(int)$id;
	$database->setQuery($sql);
	$value = $database->loadResult();
	return $value;
}

function uddeIMgetEMailFromID($id, $config) {
	$database = uddeIMgetDatabase();
	$sql="SELECT email FROM #__users WHERE id=".(int)$id;
	$database->setQuery($sql);
	$value = $database->loadResult();
	return $value;
}

function uddeIMgetNameEmailFromID($id, &$name, &$email, $config) {
	$database = uddeIMgetDatabase();
	$sql="SELECT ".($config->realnames ? "name" : "username")." AS displayname, email FROM #__users WHERE id=".(int)$id;
	$database->setQuery($sql);
	$value = NULL;
	if($database->loadObject($value)) {
		$name = $value->displayname;
		$email = $value->email;
	}
	return $value;
}

function uddeIMgetIDfromUsername($name, $unblockedonly=false) {
	$database = uddeIMgetDatabase();
	$sql="SELECT id FROM #__users WHERE ".($unblockedonly ? "block=0 AND " : "")."username = " . $database->Quote( $name );
	$database->setQuery($sql);
	$value = (int)$database->loadResult($sql);
	return $value;
}

function uddeIMgetIDfromName($name, $config, $unblockedonly=false) {
	$database = uddeIMgetDatabase();
	$sql="SELECT id FROM #__users WHERE ".($unblockedonly ? "block=0 AND " : "").($config->realnames ? "name" : "username")." = " . $database->Quote( $name );
	$database->setQuery($sql);
	$value = (int)$database->loadResult($sql);
	return $value;
}

function uddeIMgetIDfromNamePublic($name, $config, $unblockedonly=false) {
	$database = uddeIMgetDatabase();
	$sql="SELECT id FROM #__users WHERE ".($unblockedonly ? "block=0 AND " : "").($config->pubrealnames ? "name" : "username")." = " . $database->Quote( $name );
	$database->setQuery($sql);
	$value = (int)$database->loadResult($sql);
	return $value;
}

// ===============================================================================================================================================================
// CORE_ACL_ARO_GROUPS
// ===============================================================================================================================================================

function uddeIMselectAROgroups() {
	$database = uddeIMgetDatabase();
	$sql = "SELECT group_id, name FROM  #__core_acl_aro_groups WHERE group_id NOT IN (17,28,29,30)";
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	return $value;
}

// ===============================================================================================================================================================
// MENU
// ===============================================================================================================================================================

function uddeIMgetItemid($config) {
	$database = uddeIMgetDatabase();
	$gid = uddeIMgetGroupID();
	if ($config->overwriteitemid)
		return (int)$config->useitemid;
	// first try to find a published link
	$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=1 AND access".
			($gid==0 ? "=" : "<=").$gid." LIMIT 1";
	$database->setQuery($sql);
	$found = (int)$database->loadResult();
	if (!$found) {
		// when no published link has been found, try to find an unpublished one
		$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=0 AND access".
				($gid==0 ? "=" : "<=").$gid." LIMIT 1";
		$database->setQuery($sql);
		$found = (int)$database->loadResult();
	}
	return $found;
}

// ===================================================================================================================
// SESSION
// ===================================================================================================================

function uddeIMisOnline($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT userid FROM #__session WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

// ===================================================================================================================
// UDDEIM_BLOCKS
// ===================================================================================================================

function uddeIMinsertBlockerBlocked($blocker, $blocked) {
	$database = uddeIMgetDatabase();
	$sql="INSERT INTO #__uddeim_blocks (blocker, blocked) VALUES (".(int)$blocker.",".(int)$blocked.")";
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to save a message" . $database->stderr(true));
	}	
}

function uddeIMcheckBlockerBlocked($blocker, $blocked) {
	$database = uddeIMgetDatabase();
	$sql="SELECT count(id) FROM #__uddeim_blocks WHERE blocker=".(int)$blocker." AND blocked=".(int)$blocked;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMpurgeBlockerBlocked($blocker, $blocked) {
	$database = uddeIMgetDatabase();
	$sql="DELETE FROM #__uddeim_blocks WHERE blocker=".(int)$blocker." AND blocked=".(int)$blocked;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a blocking" . $database->stderr(true));
	}
}

function uddeIMselectBlockerBlockedList($blocker, $config) {
	$database = uddeIMgetDatabase();
	$sql="SELECT a.*, b.".($config->realnames ? "name" : "username")." AS displayname FROM #__uddeim_blocks AS a, #__users AS b WHERE blocker=".(int)$blocker." AND a.blocked=b.id";
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

// ===================================================================================================================
// UDDEIM_USERLISTS
// ===================================================================================================================

function uddeIMgetUserlistCount($myself) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT count(id) FROM #__uddeim_userlists WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMexistsUserlistName($myself, $listid, $name) {
	$database = uddeIMgetDatabase();
	$sql="SELECT COUNT(id) FROM #__uddeim_userlists WHERE name=".$database->Quote($name)." AND id<>".(int)$listid." AND userid=".(int)$myself;	// do I already have a list with this name?
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMselectUserlists($myself, $limitstart, $limit) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT * FROM #__uddeim_userlists WHERE userid=".(int)$myself." ORDER BY name LIMIT ".(int)$limitstart.", ".(int)$limit;
	$database->setQuery( $sql );
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectAllUserlists($myself) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT * FROM #__uddeim_userlists WHERE userid=".(int)$myself." ORDER BY name";
	$database->setQuery( $sql );
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectUserlistsListFromID($myself, $listid) {
	$database = uddeIMgetDatabase();
	$database->setQuery( "SELECT * FROM #__uddeim_userlists WHERE id=".(int)$listid." AND userid=".(int)$myself );
	$value = $database->loadObjectList(); 		
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectUserlistsListFromName($myself, $listname) {
	$database = uddeIMgetDatabase();
	$database->setQuery( "SELECT * FROM #__uddeim_userlists WHERE name=".$database->Quote($listname)." AND userid=".(int)$myself );
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMpurgeUserlist($myself, $listid) {
	$database = uddeIMgetDatabase();
	$sql="DELETE FROM #__uddeim_userlists WHERE id=".(int)$listid." AND userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a list" . $database->stderr(true));
	}
}

function uddeIMupdateUserlist($myself, $listid, $listname, $listdesc, $listids) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_userlists SET name=".$database->Quote($listname).", description=".$database->Quote($listdesc).", userids=".$database->Quote($listids)." WHERE id=".(int)$listid." AND userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query())
		die("SQL error when attempting to update a list" . $database->stderr(true));
}

function uddeIMinsertUserlist($myself, $listname, $listdesc, $listids) {
	$database = uddeIMgetDatabase();
	$sql="INSERT INTO #__uddeim_userlists (userid, name, description, userids) VALUES (".(int)$myself.", ".$database->Quote($listname).", ".$database->Quote($listdesc).", ".$database->Quote($listids).")";
	$database->setQuery($sql);
	if (!$database->query())
		die("SQL error when attempting to save a list" . $database->stderr(true));
}

// ===================================================================================================================
// UDDEIM_EMN
// ===================================================================================================================

function uddeIMgetEMNpublic($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT public FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetEMNpopup($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT popup FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetEMNstatus($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT status FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetEMNremindersent($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT remindersent FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetEMNlastsent($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT lastsent FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMupdateEMNstatus($myself, $status) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_emn SET status=".(int)$status." WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}

function uddeIMupdateEMNreminder($myself, $reminder) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_emn SET remindersent=".(int)$reminder." WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}

function uddeIMupdateEMNlastsent($myself, $lastsent) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_emn SET lastsent=".(int)$lastsent." WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}

function uddeIMupdateEMNpublic($myself, $public) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_emn SET public=".(int)$public." WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}

function uddeIMupdateEMNpopup($myself, $popup) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim_emn SET popup=".(int)$popup." WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}

function uddeIMexistsEMN($myself) {
	$database = uddeIMgetDatabase();
	$sql="SELECT count(id) FROM #__uddeim_emn WHERE userid=".(int)$myself;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMinsertEMNdefaults($myself, $config) {
	$database = uddeIMgetDatabase();
	$status = $config->notifydefault;
	$popup  = $config->popupdefault;
	$public = $config->pubfrontenddefault;
	$sql="INSERT INTO #__uddeim_emn (status, popup, public, userid) VALUES (".(int)$status.", ".(int)$popup.", ".(int)$public.", ".(int)$myself.")";
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
}



// ===================================================================================================================
// UDDEIM
// ===================================================================================================================

function uddeIMgetArchiveCount($myself) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT count(a.id) FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.totrash=0 AND archived=1 AND a.toid=".(int)$myself;
// OPT
	$sql = "SELECT count(a.id) FROM #__uddeim AS a WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=1";
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	return $total;
}

function uddeIMgetInboxCount($myself) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT count(a.id) FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0";
// OPT
	$sql = "SELECT count(a.id) FROM #__uddeim AS a WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0";
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	return $total;
}

function uddeIMgetInboxArchiveCount($myself) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT count(a.id) FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0";
// OPT
	$sql = "SELECT count(a.id) FROM #__uddeim AS a WHERE a.toid=".(int)$myself." AND a.totrash=0";
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	return $total;
}

function uddeIMgetOutboxCount($myself) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT count(a.id) FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.fromid=".(int)$myself." AND a.totrashoutbox=0 AND ((a.systemmessage IS NULL) OR (a.systemmessage=''))";
// OPT 
	$sql = "SELECT count(a.id) FROM #__uddeim AS a WHERE a.fromid=".(int)$myself." AND a.totrashoutbox=0 AND ((a.systemmessage IS NULL) OR (a.systemmessage=''))";
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	return $total;
}

function uddeIMgetTrashcanCount($myself, $timeframe) {
	$database = uddeIMgetDatabase();
	// how many messages total?
	//	$sql="SELECT count(id) FROM #__uddeim WHERE (totrashdate>=".$timeframe." AND toid=".(int)$myself." AND totrash=1) OR (totrashdateoutbox>=".$timeframe." AND fromid=".(int)$myself." AND totrashoutbox=1)";
	// dont count messages that are "copy to me" messages and sender has already trashed the message (totrashoutbox=1 and fromid=toid)
	// !!! systemmessages from me to others should not be shown here when  totrashoutbox=1 and totrashdateoutbox=valid (==add: AND ((systemmessage IS NULL) OR (systemmessage='')))
	// some optimizations:
	// old: $sql="SELECT count(a.id) FROM #__uddeim AS a, #__users AS b WHERE (totrashdate>=".$timeframe." AND a.toid=".(int)$myself." AND a.totrash=1 AND a.fromid=b.id) OR (totrashdateoutbox>=".$timeframe." AND a.fromid=".(int)$myself." AND a.totrashoutbox=1 AND a.toid=b.id AND a.toid<>a.fromid AND ((systemmessage IS NULL) OR (systemmessage='')))";
	// old: "OR (totrashdateoutbox >= ".$timeframe." AND a.totrashoutbox=1 AND a.fromid=".(int)$myself." AND a.toid<>a.fromid AND ((systemmessage IS NULL) OR (systemmessage='')))"; "
	$sql = "SELECT count(a.id)
				FROM #__uddeim AS a 
				WHERE (totrashdate       >= ".(int)$timeframe." AND a.totrash=1       AND a.toid  =".(int)$myself.") 
				   OR (totrashdateoutbox >= ".(int)$timeframe." AND a.totrashoutbox=1 AND a.fromid=".(int)$myself." AND a.toid<>".(int)$myself." AND ((systemmessage IS NULL) OR (systemmessage='')))"; 
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	return $total;
}

function uddeIMgetFlagged($messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT flagged FROM #__uddeim WHERE id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetToread($messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT toread FROM #__uddeim WHERE id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetArchived($messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT archived FROM #__uddeim WHERE id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetArchivedFromTrashedMessage($myself, $messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT archived FROM #__uddeim WHERE (toid=".(int)$myself." AND id=".(int)$messageid." AND totrash=1) OR (fromid=".(int)$myself." AND id=".(int)$messageid." AND totrashoutbox=1)";
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetTotrash($myself, $messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT totrash FROM #__uddeim WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMgetTotrashoutbox($myself, $messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT totrashoutbox FROM #__uddeim WHERE fromid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMupdateFlagged($myself, $messageid, $value) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET flagged=".(int)$value." WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to mark a message" . $database->stderr(true));
	}
}

function uddeIMupdateToread($myself, $messageid, $value) {
	$database = uddeIMgetDatabase();
//	$sql="UPDATE #__uddeim SET toread=".(int)$value." WHERE toid=".(int)$myself." AND archived=0 AND id=".(int)$messageid;
	$sql="UPDATE #__uddeim SET toread=".(int)$value." WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to trash a message" . $database->stderr(true));
	}
}

function uddeIMupdateArchived($messageid, $value) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET archived=".(int)$value." WHERE id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to archive a message" . $database->stderr(true));
	}
}

function uddeIMupdateArchivedToid($myself, $messageid, $value) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET archived=".(int)$value." WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to archive a message" . $database->stderr(true));
	}
}

function uddeIMexistsMessage($id) {
	$database = uddeIMgetDatabase();
	$sql="SELECT count(id) FROM #__uddeim WHERE id=".(int)$id;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMexistsMessageToUser($toid, $messageid) {
	$database = uddeIMgetDatabase();
	$sql="SELECT count(id) FROM #__uddeim WHERE toid=".(int)$toid." AND id=".(int)$messageid;
	$database->setQuery($sql);
	$value = (int)$database->loadResult();
	return $value;
}

function uddeIMpurgeMessageFromUser($fromid, $messageid) {
	$database = uddeIMgetDatabase();
	$sql="DELETE FROM #__uddeim WHERE fromid=".(int)$fromid." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a message" . $database->stderr(true));
	}
}

function uddeIMdeleteMessageFromInbox($myself, $messageid, $deletetime) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".(int)$deletetime." WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a message" . $database->stderr(true));
	}
}

function uddeIMdeleteMessageFromArchive($myself, $messageid, $deletetime) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET totrash=1, totrashdate=".(int)$deletetime." WHERE toid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a message" . $database->stderr(true));
	}
}

function uddeIMdeleteMessageFromOutbox($myself, $messageid, $deletetime) {
	$database = uddeIMgetDatabase();
	$sql="UPDATE #__uddeim SET totrashoutbox=1, totrashdateoutbox=".(int)$deletetime." WHERE fromid=".(int)$myself." AND id=".(int)$messageid;
	$database->setQuery($sql);
	if (!$database->query()) {
		die("SQL error when attempting to delete a message" . $database->stderr(true));
	}
}

function uddeIMrestoreMessageToInboxOutboxArchive($myself, $messageid) {
	$database = uddeIMgetDatabase();
	// Check if the message is send to me (so it was either in the Inbox or the Archive)
	if (uddeIMgetTotrash($myself, $messageid)) {
		// so when the message was from the inbox/archivem then restore it to there and do not restore to outbox (might be also valid e.g. for copy2me messages)
		$sql="UPDATE #__uddeim SET totrash=0, totrashdate=NULL WHERE toid=".(int)$myself." AND id=".(int)$messageid;
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to restore a message" . $database->stderr(true));
		}
	} else {
		// Check if the message was send by me (so it was in the Outbox)
		$sql="UPDATE #__uddeim SET totrashoutbox=0, totrashdateoutbox=NULL WHERE fromid=".(int)$myself." AND id=".(int)$messageid;
		$database->setQuery($sql);
		if (!$database->query()) {
			die("SQL error when attempting to restore a message" . $database->stderr(true));
		}
	}
}

// ===================================================================================================================
// JOINs
// ===================================================================================================================

function uddeIMselectInbox($myself, $limitstart, $limit, $config) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0 ORDER BY datum DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
// OPT
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0 ORDER BY datum DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectInboxMessage($myself, $messageid, $config) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.id=".(int)$messageid;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectArchive($myself, $limitstart, $limit, $config) {
	$database = uddeIMgetDatabase();
//	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.totrash=0 AND archived=1 AND a.toid=".(int)$myself." ORDER BY datum DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
// OPT
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a FORCE INDEX(datum) LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=1 ORDER BY datum DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectArchiveMessage($myself, $messageid, $config) {
	$database = uddeIMgetDatabase();
	// does not test on " AND archived=1", but thats ok
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.id=".(int)$messageid;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectOutbox($myself, $limitstart, $limit, $config) {
	$database = uddeIMgetDatabase();
	// 1. Do not select messages which have been already trashed in the outbox ("totrashoutbox" must be 0)
	// 2. Do not show Systemmessages ("systemmessage" must be NULL or "")
	// There are following special cases:
	//	"welcome messages" (fromid==toid and systemmessage => not shown)
	//	"general messages" (fromid==toid or fromid<>toid and systemmessage => not shown)
	//	"copy2me" (fromid==my and toid=my and systemmessages => not shown)
	// FIXME?: copy2me ändern => keine systemmessage mehr, sondern neues feld mit "original author"
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS toname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.fromid=".(int)$myself." AND a.totrashoutbox=0 AND ((a.systemmessage IS NULL) OR (a.systemmessage='')) ORDER BY toread ASC, datum DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
// OPT, date missing, so I keep the non-optimized version
//	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS toname FROM #__uddeim AS a FORCE INDEX(toread_totrash_datum) LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.fromid=".(int)$myself." AND a.totrashoutbox=0 AND ((a.systemmessage IS NULL) OR (a.systemmessage='')) ORDER BY toread ASC LIMIT ".(int)$limitstart.", ".(int)$limit;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectOutboxMessage($myself, $messageid, $config) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS toname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.fromid=".(int)$myself." AND a.id=".(int)$messageid;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectOutboxMessageIfUnread($myself, $messageid, $config) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT a.*, b.".($config->realnames ? "name" : "username")." AS toname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.toid=b.id WHERE a.toread=0 AND a.fromid=".(int)$myself." AND a.id=".(int)$messageid;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectTrashcan($myself, $timeframe, $limitstart, $limit, $config) {
	$database = uddeIMgetDatabase();
	// copy2me messages have always "totrashoutbox"=1, so they would be always shown in the trashcan.
	// since copy2me messages have "fromid"="toid", I do filter these messages in the outbox part
	// I do also not show systemmessages which have "fromid"<>"toid" but have "systemmessage" set
	// some optimizations:
	// OLD: "OR (totrashdateoutbox >= ".$timeframe." AND a.totrashoutbox=1 AND a.fromid=".(int)$myself." AND a.toid<>a.fromid AND ((systemmessage IS NULL) OR (systemmessage='')))"
	$sql = "SELECT a.*, ufrom.".($config->realnames ? "name" : "username")." AS fromname, 
						  uto.".($config->realnames ? "name" : "username")." AS toname
				FROM (#__uddeim AS a LEFT JOIN #__users AS ufrom ON a.fromid = ufrom.id) 
									 LEFT JOIN #__users AS uto   ON a.toid   = uto.id
				WHERE (totrashdate       >= ".$timeframe." AND a.totrash=1       AND a.toid  =".(int)$myself.") 
				   OR (totrashdateoutbox >= ".$timeframe." AND a.totrashoutbox=1 AND a.fromid=".(int)$myself." AND a.toid<>".(int)$myself." AND ((systemmessage IS NULL) OR (systemmessage=''))) 
				ORDER BY IF(totrashdate,totrashdate,totrashdateoutbox) DESC LIMIT ".(int)$limitstart.", ".(int)$limit;
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectCBEbuddies($myself, $config) {
	$database = uddeIMgetDatabase();
	$sql="SELECT a.buddyid, a.userid, b.id, b.".($config->realnames ? "name" : "username")." AS displayname FROM #__comprofiler_buddylist AS a, #__users AS b WHERE b.block=0 AND (((a.userid=".(int)$myself." AND b.id=a.buddyid) OR (a.buddyid=".(int)$myself." AND b.id=a.userid)) AND buddy='1') ORDER by b.".($config->realnames ? "name" : "username");
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}

function uddeIMselectCBbuddies($myself, $config) {
	$database = uddeIMgetDatabase();
	$sql = "SELECT m.referenceid,m.memberid,u.".($config->realnames ? "name" : "username")." as displayname, u.id FROM #__comprofiler_members AS m, #__users AS u "
		 . " WHERE u.block=0 AND m.memberid=u.id AND m.referenceid=".(int)$myself." ORDER BY u.".($config->realnames ? "name" : "username");
	$database->setQuery($sql);
	$value = $database->loadObjectList();
	if (!$value)
		$value = Array();
	return $value;
}
