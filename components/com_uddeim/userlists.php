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

function uddeIMshowLists($myself, $item_id, $limit, $limitstart, $config) {
	$pathtosite  = uddeIMgetPath('live_site');

	$my_gid=uddeIMgetGID((int)$myself);

	if( ($config->enablelists==1) ||
	    ($config->enablelists==2 && in_array($my_gid,array(19,20,21,23,24,25))) || 
	    ($config->enablelists==3 && in_array($my_gid,array(24,25))) ) {
		// ok contact lists are enabled
	} else {
		$mosmsg=_UDDEIM_LISTSNOTENABLED;
		$redirecturl=uddeIMmosGetParam( $_SERVER, 'HTTP_REFERER', null );
		if (stristr($redirecturl, "lists")) {
			uddeJSEFredirect("index.php?option=com_uddeim&Itemid=".$item_id, $mosmsg);
		}
		uddeIMmosRedirect($redirecturl, $mosmsg);
	}

	$total = uddeIMgetUserlistCount($myself);

	// now load messages as required
	if(!$limitstart)
		$limitstart = 0;

	if(!$limit)
		$limit=$config->perpage;

	if ($limitstart>=$total)
		$limitstart=max(0,$limitstart - $limit);

	$my_lists = uddeIMselectUserlists($myself, $limitstart, $limit);

	// write the uddeim menu
	uddeIMprintMenu($myself, 'lists', $item_id, $config);
	echo "<div id='uddeim-m'>\n";

	echo "<script language='JavaScript' type='text/javascript' src='".$pathtosite."/components/com_uddeim/js/uddeimtools.js'></script>\n";
	echo "<form method='post' name='messages' action='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=listsfork&Itemid=".$item_id)."'>\n";

	echo "<div id='uddeim-overview'><table cellpadding='7' width='100%'>\n";
	$delall="<input type='checkbox' name='arcmes[]' value='' onclick='wiglwogl(this);' title='"._UDDEIM_CHECKALL."' />";
	echo "<tr><th style='text-align:center;' class='sectiontableheader'>".$delall."</th><th class='sectiontableheader'>"._UDDEIM_LISTSNAME."</th><th class='sectiontableheader'>"._UDDEIM_LISTSDESC."</th><th class='sectiontableheader'>&nbsp;</th></tr>\n";

	$i = 1;
	// now write the list
	foreach ( $my_lists as $cl ) {
		$delcell="<input type='checkbox' name='arcmes[]' value='".$cl->id."' />";

		echo "<tr class='sectiontableentry".$i."'>";
		echo "<td style='width:32px; text-align:center; vertical-align:middle'>".$delcell."</td>";		// checkcell
		echo "<td><a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=editlists&listid=".$cl->id."&Itemid=".$item_id)."'>".$cl->name."</a></td>";
		echo "<td>".$cl->description."</td>";

		if ($config->actionicons) {
			$editcell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=editlists&listid=".$cl->id."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/edit.gif' alt='"._UDDEIM_EDITLINK."' title='"._UDDEIM_EDITLINK."' /></a><br />";
			$deletecell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=deletelists&listid=".$cl->id."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart)."'><img src='".$pathtosite."/components/com_uddeim/templates/".$config->templatedir."/images/trash.gif' alt='"._UDDEIM_DELETELINK."' title='"._UDDEIM_DELETELINK."' /></a>";
		} else {
			$editcell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=editlists&listid=".$cl->id."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart)."'>"._UDDEIM_EDITLINK."</a><br />";
			$deletecell="<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=deletelists&listid=".$cl->id."&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart)."'>"._UDDEIM_DELETELINK."</a>";
		}

		if ($config->actionicons) {
			echo "<td style='width:32px; text-align:center; vertical-align:middle'>".$editcell.$deletecell."</td>";
		} else {
			echo "<td class='pathway'>".$editcell.$deletecell."</td>";
		}
		echo "</tr>\n";

		$i++;
		if ($i>2) {
			$i=1;
		}
	}

	$muldel = uddeIMsefRelToAbs("index.php?option=com_uddeim&task=deletelistsmultiple&Itemid=".$item_id."&limitstart=0&limit=".$total);
	if($config->bottomlineicons) {
		echo "<tr><th style='text-align:center;' class='sectiontablefooter'>";
		echo '<a href="#" onclick="listsDelete(\''.$muldel.'\'); return false;"><img src="'.$pathtosite.'/components/com_uddeim/templates/'.$config->templatedir.'/images/trash.gif" alt="" /></a></th>';
		echo "<th class='sectiontablefooter'><a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=createlists&Itemid=".$item_id)."'>"._UDDEIM_LISTSNEW."</a></th>";
		echo "<th class='sectiontablefooter'>&nbsp;</th><th class='sectiontablefooter'>&nbsp;</th></tr>\n";
	}
	echo "</table></div>\n";
	echo "</form>\n";

	// write the inbox navigation links
	$pageNav = new uddeIMmosPageNav($total, $limitstart, $limit);
	$referlink = "index.php?option=com_uddeim&task=showlists&Itemid=".$item_id;
	if ($total>$limit) {
		$shownav = $pageNav->writePagesLinks($referlink);
		$shownav = uddeIMarrowReplace($shownav, $config->templatedir);
		echo "<div id='uddeim-pagenav'>".$shownav."<br />";
		echo "[<a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id."&limitstart=0&limit=".$total)."'>"._UDDEIM_SHOWALL."</a>]";
		echo "</div>\n";
	}

	echo "<div id='uddeim-bottomlines'>";
	if(!$config->bottomlineicons) {
		echo '<p><a href="#" onclick="listsDelete(\''.$muldel.'\'); return false;">'._UDDEIM_TRASHCHECKED.'</a></p>';
		echo "<p><a href='".uddeIMsefRelToAbs("index.php?option=com_uddeim&task=createlists&Itemid=".$item_id)."'>"._UDDEIM_LISTSNEW."</a></p>";
	}
	echo "</div>\n";

	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', "", $config)."</div>\n";
}   

function uddeIMcreateLists($myself, $item_id, $listid, $limit, $limitstart, $config) {
	$pathtosite  = uddeIMgetPath('live_site');

	$my_gid=uddeIMgetGID((int)$myself);

	// write the uddeim menu
	uddeIMprintMenu($myself, 'none', $item_id, $config);
	echo "<div id='uddeim-m'>\n";

	echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".$pathtosite."/components/com_uddeim/js/uddeimtools.js\"></script>\n";

	$lname = "";
	$ldesc = "";
	$lids = "";
	if ( $listid ) {
		$this_lists = uddeIMselectUserlistsListFromID($myself, $listid); 		
		foreach($this_lists as $this_list) {
			$lname = $this_list->name;
			$ldesc = $this_list->description;
			$lids = trim($this_list->userids);
		}
	}

//	$total = count(explode(",",$lids));
	$total = 0;
	if ($lids)
		$total = substr_count($lids, ",")+1;
	if ($total>=$config->maxonlists) {
		echo "<div id='uddeim-toplines'><p>"._UDDEIM_LISTSLIMIT_1." ".$config->maxonlists.").</p></div>\n";
	}

	echo "<br />";
	echo "<form name='listsform' method='post' action='".uddeIMsefRelToAbs( "index.php?option=com_uddeim&listid=".$listid."&Itemid=".$item_id."&task=savelists" )."'>";
	echo _UDDEIM_LISTSNAMEWO."<br />";
	echo "<input type='text' name='listname' size='20' maxlength='40' value='".$lname."' /><br />";
	echo _UDDEIM_LISTSDESC."<br />";
	echo "<textarea name='listdesc' rows='5' cols='40'>".$ldesc."</textarea><br />";
	echo "<input type='hidden' name='listids' size='40' value='".$lids."' />";
	echo "<br />";
	echo "<table border='0' cellspacing='10' cellpadding='0'><tr><td valign='top' nowrap='nowrap'>";
	echo uddeIMselectComboSelectionlist( $myself, $my_gid, $lids, $config );
	echo "</td><td valign='middle'>";
	echo "<input type='button' name='buttonadd' class='button' value='&nbsp;&laquo;&nbsp;' onclick='uddeIMaddToSelection( \"listsform\", \"userlist\", \"selectionlist\" );' /><br />";
	echo "<input type='button' name='buttonadd' class='button' value='&nbsp;&raquo;&nbsp;' onclick='uddeIMremoveFromSelection( \"listsform\", \"selectionlist\" );' />";
	echo "</td><td valign='top'>";
	echo uddeIMselectComboUserlist( $myself, $my_gid, $config );
	echo "</td></tr></table>";
	echo "<br />";
	echo "<input type='submit' name='reply' class='button' value='"._UDDEIM_SUBMIT."' />";
	echo "</form>";
	
	echo "</div>\n<div id='uddeim-bottomborder'>".uddeIMcontentBottomborder($myself, $item_id, 'standard', "", $config)."</div>\n";
}

function uddeIMsaveLists($myself, $item_id, $listid, $listname, $listdesc, $listids, $config) {
	$database = uddeIMgetDatabase();

//	$listname=addslashes(strip_tags($listname));
	$listname=stripslashes(strip_tags($listname));	// strip tags and slashes
	$listname=str_replace(" ", "", $listname);		// remove all spaces
	$listname=ereg_replace("[^[:alnum:]_\-]","",$listname);	// remove non.alphanumerics
	if (!$listname)
		$listname = "untitled";

	$i=0;
	$suffix="";
	do {
		$exists = uddeIMexistsUserlistName($listname.$suffix, $listid, $name);
		if ($exists) {
			$i++;
			$suffix="_".$i;
		}
	} while($exists);
	$listname=$listname.$suffix;

	$listdesc=addslashes(strip_tags($listdesc));
	$listids =addslashes(strip_tags($listids));

	$ar_ids = explode(",",$listids);
	while (list($key, $value) = each($ar_ids)) {
		$ar_ids[$key] = (int)$value;
	}
	$listids = implode(",",$ar_ids);

	if ($listid) {
		uddeIMupdateUserlist($myself, $listid, $listname, $listdesc, $listids);
		uddeJSEFredirect("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id, _UDDEIM_LISTSUPDATED);
	} else {
		uddeIMinsertUserlist($myself, $listname, $listdesc, $listids);
		uddeJSEFredirect("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id, _UDDEIM_LISTSSAVED);
	}
}

function uddeIMselectComboSelectionlist( $myself, $my_gid, $lids, $config ) {
	$database = uddeIMgetDatabase();
	$ret = '<select name="selectionlist" class="inputbox" ondblclick="selectionlistdblclick(this.selectedIndex, \'listsform\', \'selectionlist\')" size="10">';	
	$database->setQuery( "SELECT id,name,username FROM #__users WHERE block=0 AND id IN (".$lids.") ORDER BY ".($config->realnames ? "name" : "username") );
	$users = $database->loadObjectList(); 
	if ( count( $users ) )  {
		foreach ( $users as $user ) {
			if ( $user->id<>$myself )
				$ret .= '<option value="'.$user->id.'">'.($config->realnames ? $user->name : $user->username).'</option>';
		}
	}
	$ret .= '</select>';
	return $ret;
}

function uddeIMselectComboUserlist( $myself, $my_gid, $config ) {
	$database = uddeIMgetDatabase();
	$ret = '<select name="userlist" class="inputbox" ondblclick="userlistdblclick(this.selectedIndex, \'listsform\', \'userlist\', \'selectionlist\')" size="10">';
	switch ($config->hideallusers) {
		case 3:		// special users
			$sql="SELECT id,name,username FROM #__users WHERE block=0 AND gid NOT IN (19,20,21,23,24,25) AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
			break;
		case 2:		// admins
			$sql="SELECT id,name,username FROM #__users WHERE block=0 AND gid NOT IN (24,25) AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
			break;
		case 1:		// superadmins
			$sql="SELECT id,name,username FROM #__users WHERE block=0 AND gid NOT IN (25) AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
			break;
		default:	// none
			$sql="SELECT id,name,username FROM #__users WHERE block=0 AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
			break;
	}
	if ($my_gid==24 || $my_gid==25)		// do not hide users when it is an admin
		$sql="SELECT id,name,username FROM #__users WHERE block=0 AND id<>".$myself." ORDER BY ".($config->realnames ? "name" : "username");
	$database->setQuery( $sql );
	$users = $database->loadObjectList(); 
	if ( count( $users ) )  {
		foreach ( $users as $user )
			$ret .= '<option value="'.$user->id.'">'.($config->realnames ? $user->name : $user->username).'</option>';
	}
	$ret .= '</select>';
	return $ret;
}

function uddeIMdeleteLists($myself, $item_id, $listid, $limit, $limitstart, $config) {
	uddeIMpurgeUserlist($myself, $listid);
	uddeJSEFredirect("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart);
}

function uddeIMdeleteListsMultiple($myself, $item_id, $arcmes, $limit, $limitstart, $config) {
	$n = count($arcmes);
	if (!$n) {
		echo _UDDEIM_NOLISTSELECTED."<br /><a href='javascript:history.go(-1)'>"._UDDEIM_BACK."</a>";
		return;
	}
	for ($i = 0; $i <= ($n-1); $i++) {
		if ($arcmes[$i]>0) {
			uddeIMpurgeUserlist($myself, $arcmes[$i]);
		}
	}
	uddeJSEFredirect("index.php?option=com_uddeim&task=showlists&Itemid=".$item_id."&limit=".$limit."&limitstart=".$limitstart);
}
