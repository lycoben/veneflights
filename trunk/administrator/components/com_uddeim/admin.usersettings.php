<?php
// ********************************************************************************************
// Title          udde Instant Messages (uddeIM)
// Description    Instant Messages System for Mambo 4.5 / Joomla 1.0 / Joomla 1.5
// Author         � 2007-2008 Stephan Slabihoud
// License        This is free software and you may redistribute it under the GPL.
//                uddeIM comes with absolutely no warranty.
//                Use at your own risk. For details, see the license at
//                http://www.gnu.org/licenses/gpl.txt
//                Other licenses can be found in LICENSES folder.
//                Redistributing this file is only allowed when keeping the header unchanged.
// ********************************************************************************************

//  `id` int(11) unsigned NOT NULL auto_increment,
//  `userid` int(11) NOT NULL default '0',
//  `status` int(1) NOT NULL default '0',		0=no notification,		1=always (10=not on reply),		2=when offline (20=not on reply)
//  `popup` int(1) NOT NULL default '0',  		1=popup
//  `public` int(1) NOT NULL default '0',  		1=public frontend
//  `remindersent` int(11) NOT NULL default '0',
//  `lastsent` int(11) NOT NULL default '0',

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

function uddeIMshowUsersettings($option, $task, $act, $config) {
	$mosConfig_offset = uddeIMgetOffset();
	$database = uddeIMgetDatabase();
	$version = uddeIMgetVersion();
	$emnid = intval( uddeIMmosGetParam( $_POST, 'id', '' ) );
	
	switch($act) {
		case "popup":	uddeIMchangePopup($option, $task, $emnid, $config);		break;
		case "public":	uddeIMchangePublic($option, $task, $emnid, $config);	break;
		case "status":	uddeIMchangeStatus($option, $task, $emnid, $config);	break;
	}

	// get parameter from filter
	$f_param = array();
	$f_where = array();

	$f_param[0] = uddeIMmosGetParam($_POST, 'f_username', '');
	if($f_param[0]!="") $f_where[] = "b.username LIKE '$f_param[0]%'";

	$f_param[1] = uddeIMmosGetParam($_POST, 'f_name', '');
	if($f_param[1]!="") $f_where[] = "b.name LIKE '$f_param[1]%'";

	$f_param[2] = uddeIMmosGetParam($_POST, 'f_status', '');
	if($f_param[2]!="") $f_where[] = "a.status='$f_param[2]'";

	$f_param[3] = uddeIMmosGetParam($_POST, 'f_popup', '');
	if($f_param[3]!="") $f_where[] = "a.popup='$f_param[3]'";

	$f_param[4] = uddeIMmosGetParam($_POST, 'f_public', '');
	if($f_param[4]!="") $f_where[] = "a.public='$f_param[4]'";

	$f_param[5] = uddeIMmosGetParam($_POST, 'f_id', '');
	if($f_param[5]!="") $f_where[] = "a.id IS $f_param[5]";

	$limit      = intval( uddeIMmosGetParam( $_POST, 'limit', 10 ) );
	$limitstart = intval( uddeIMmosGetParam( $_POST, 'limitstart', 0 ) );
	$where = count($f_where) ? " WHERE " . implode(' AND ', $f_where) : "";

	$sql="SELECT count(b.id) FROM #__uddeim_emn AS a RIGHT JOIN #__users AS b ON a.userid=b.id".$where;
	$database->setQuery($sql);
	$total = (int)$database->loadResult();
	if ($limit==0) {
		$limit = $total;
		$limitstart = 0;
	}

// echo($sql." ==> ".$total."<br />");

	$sql  = "SELECT a.*,b.id AS uid,b.name,b.username,b.block ";
	$sql .= "FROM #__uddeim_emn AS a RIGHT JOIN #__users AS b ON a.userid=b.id";
	$sql .= $where;
	$sql .= " ORDER BY name LIMIT $limitstart,$limit";
	$database->setQuery($sql);
	$rows = $database->loadObjectList();

// echo($sql."<br />");

	// include_once(uddeIMgetPath('absolute_path')."/administrator/includes/pageNavigation.php");
	$pageNav = new uddeIMmosPageNav( $total, $limitstart, $limit  );

	$query="SELECT username,name FROM #__users WHERE block!='1' ORDER BY username";
	$database->setQuery($query);
	$results = $database->loadObjectList();

	$results = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	
	$the_username='<select class="inputbox" name="f_username" size="1"><option value=""';
	if ($f_param[0]=="") $the_username.=' selected';
	$the_username.='>'._UDDEADM_USERSET_SELUSERNAME.'</option>';
	foreach($results as $result) {
		$the_username.='<option value="'.$result.'"';
		if ($result==$f_param[0]) $the_username.=' selected';
		$the_username.='>'.$result.'...</option>';
	}
	$the_username.="</select>";

	$the_name='<select class="inputbox" name="f_name" size="1"><option value=""';
	if ($f_param[1]=="") $the_name.=' selected';
	$the_name.='>'._UDDEADM_USERSET_SELNAME.'</option>';
	foreach($results as $result) {
		$the_name.='<option value="'.$result.'"';
		if ($result==$f_param[1]) $the_name.=' selected';
		$the_name.='>'.$result.'...</option>';
	}
	$the_name.="</select>";

    ?>
    <form action="index2.php" method="post" name="adminForm">

	<div align="center">
    <table cellpadding="4" cellspacing="0" border="0" width="98%">
	<tr>
		<td class="sectionname" align="left">
			<h4><img align="middle" style="display: inline;" src="<?php echo uddeIMgetPath('live_site')."/administrator/images/inbox.png"; ?>" />&nbsp;<?php echo _UDDEADM_USERSET_EDITSETTINGS; ?></h4>
		</td>
		<td class="sectionname" align="right">
			<img align="middle" style="display: inline; border:1px solid lightgray;" src="<?php echo uddeIMgetPath('live_site')."/components/com_uddeim/templates/images/uddeim_logo.png"; ?>" />
		</td>
	</tr>
	</table>
	</div>

	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<tr>
		<td width="100%" align="left"><?php echo "Display # "; echo $pageNav->writeLimitBox('?option=$option&task=$task'); ?></td>
		<td>
<?
	$id_items_arr[] = mosHTML::makeOption('', _UDDEADM_USERSET_SELENTRY);
	$id_items_arr[] = mosHTML::makeOption('NOT NULL', _UDDEADM_USERSET_EXISTING);
	$id_items_arr[] = mosHTML::makeOption('NULL', _UDDEADM_USERSET_NONEXISTING);
	echo mosHTML::selectList($id_items_arr, 'f_id', 'size="1" class="text"', 'value', 'text', $f_param[5]);
?>
		</td>
		<td><?php echo $the_username; ?></td>
		<td><?php echo $the_name; ?></td>
		<td>
<?
	$status_arr[] = mosHTML::makeOption('', _UDDEADM_USERSET_SELNOTIFICATION);
	$status_arr[] = mosHTML::makeOption('0', _UDDEADM_USERSET_NONOTIFICATION);
	$status_arr[] = mosHTML::makeOption('1', _UDDEADM_USERSET_ALWAYS);
	$status_arr[] = mosHTML::makeOption('2', _UDDEADM_USERSET_WHENOFFLINE);
	$status_arr[] = mosHTML::makeOption('10', _UDDEADM_USERSET_ALWAYSEXCEPT);
	$status_arr[] = mosHTML::makeOption('20', _UDDEADM_USERSET_WHENOFFLINEEXCEPT);
	echo mosHTML::selectList($status_arr, 'f_status', 'size="1" class="text"', 'value', 'text', $f_param[2]);
?>
		</td>
		<td>
<?
	$popup_items_arr[] = mosHTML::makeOption('', _UDDEADM_USERSET_SELPOPUP);
	$popup_items_arr[] = mosHTML::makeOption('0', _UDDEADM_USERSET_NO);
	$popup_items_arr[] = mosHTML::makeOption('1', _UDDEADM_USERSET_YES);
	echo mosHTML::selectList($popup_items_arr, 'f_popup', 'size="1" class="text"', 'value', 'text', $f_param[3]);
?>
		</td>
		<td>
<?
	$public_items_arr[] = mosHTML::makeOption('', _UDDEADM_USERSET_SELPUBLIC);
	$public_items_arr[] = mosHTML::makeOption('0', _UDDEADM_USERSET_NO);
	$public_items_arr[] = mosHTML::makeOption('1', _UDDEADM_USERSET_YES);
	echo mosHTML::selectList($public_items_arr, 'f_public', 'size="1" class="text"', 'value', 'text', $f_param[4]);
?>
		</td>
		<td>
			<input type="submit" value="Filter" />
		</td>
	</tr>
	</table>

	<br />

	<table class="adminlist">
	<tr>
		<th class="title" width="4%"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" /></th>
		<th class="title" width="4%"><?php echo "UID"; ?></th>
		<th class="title" width="4%"><?php echo "ID"; ?></th>
		<th class="title" nowrap="nowrap"><?php echo _UDDEADM_USERSET_USERNAME; ?></th>
		<th class="title"><?php echo _UDDEADM_USERSET_NAME; ?></th>
		<th class="title"><?php echo _UDDEADM_USERSET_NOTIFICATION; ?></th>
		<th class="title"><?php echo _UDDEADM_USERSET_POPUP; ?></th>
		<th class="title"><?php echo _UDDEADM_USERSET_PUBLIC; ?></th>
		<th class="title" nowrap="nowrap"><?php echo _UDDEADM_USERSET_LASTACCESS; ?></th>
		<th class="title" nowrap="nowrap"><?php echo _UDDEADM_USERSET_LASTSENT; ?></th>
	</tr>
<?php
	$k = 0;
	for($i=0, $n=count( $rows ); $i < $n; $i++)
	{
		$row = &$rows[$i];
		echo "<tr class='row$k'>";
		echo "<td width='5%'><input type='checkbox' id='cb$i' name='uddeid[]' value='$row->uid' onclick='isChecked(this.checked);' /></td>";
		echo "<td align='left'>$row->uid</td>";
		echo "<td align='left'>". (is_null($row->id) ? "-" : "$row->id") ."</td>";
		echo "<td align='left'>$row->username</td>";
		echo "<td align='left'>$row->name</td>";
		echo "<td align='left'>";
		if (is_null($row->status)) { 
			echo "---";
			echo " (";
			switch($config->notifydefault) {
				case 0: echo _UDDEADM_USERSET_NONOTIFICATION; break;
				case 1: echo _UDDEADM_USERSET_ALWAYS; break;
				case 2: echo _UDDEADM_USERSET_WHENOFFLINE; break;
				case 10: echo _UDDEADM_USERSET_ALWAYSEXCEPT; break;
				case 20: echo _UDDEADM_USERSET_WHENOFFLINEEXCEPT; break;
				default: echo _UDDEADM_USERSET_UNKNOWN; break;
			}
			echo ")";
		} else {
			echo "<a href='javascript:document.adminForm.act.value=\"status\"; document.adminForm.id.value=\"".$row->id."\"; document.adminForm.submit();'>";
//			echo "<a href='index2.php?option=$option&task=$task&act=status&id=$row->id'>";
			switch($row->status) {
				case 0: echo _UDDEADM_USERSET_NONOTIFICATION; break;
				case 1: echo _UDDEADM_USERSET_ALWAYS; break;
				case 2: echo _UDDEADM_USERSET_WHENOFFLINE; break;
				case 10: echo _UDDEADM_USERSET_ALWAYSEXCEPT; break;
				case 20: echo _UDDEADM_USERSET_WHENOFFLINEEXCEPT; break;
				default: echo _UDDEADM_USERSET_UNKNOWN; break;
			}
			echo "</a>";
		}
		echo "</td>";
		echo "<td align='left'>";
		if (is_null($row->popup)) { 
			echo "---";
			echo " (".($config->popupdefault ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO).")";
		} else {
			echo "<a href='javascript:document.adminForm.act.value=\"popup\"; document.adminForm.id.value=\"".$row->id."\"; document.adminForm.submit();'>".($row->popup ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO)."</a>";
//			echo "<a href='index2.php?option=$option&task=$task&act=popup&id=$row->id'>".($row->popup ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO)."</a>";
		}
		echo "</td>";
		echo "<td align='left'>";
		if (is_null($row->public)) { 
			echo "---";
			echo " (".($config->pubfrontenddefault ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO).")";
		} else {
			echo "<a href='javascript:document.adminForm.act.value=\"public\"; document.adminForm.id.value=\"".$row->id."\"; document.adminForm.submit();'>".($row->public ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO)."</a>";
//			echo "<a href='index2.php?option=$option&task=$task&act=public&id=$row->id'>".($row->public ? _UDDEADM_USERSET_YES : _UDDEADM_USERSET_NO)."</a>";
		}
		echo "</td>";
		echo "<td align='left'>";
		if (is_null($row->remindersent)) { 
			echo "---";
		} else {
			echo $row->remindersent ? date("Y-m-d H:i:s", $row->remindersent) : "-";
		}
		echo "</td>";
		echo "<td align='left'>";
		if (is_null($row->lastsent)) { 
			echo "---";
		} else {
			echo $row->lastsent ? date("Y-m-d H:i:s", $row->lastsent) : "-";
		}
		echo "</td>";
		echo "</tr>\n";
		$k = 1 - $k;
	}
?>
<tr>
	<th align="center" colspan="10"><?php echo $pageNav->writePagesLinks(); ?></th>
</tr>
<tr>
	<td align="center" colspan="10"><?php echo $pageNav->writePagesCounter(); ?></td>
</tr>
</table>
	<input type="hidden" name="option" value="<?php echo $option;?>" />
	<input type="hidden" name="task" value="<?php echo $task;?>" />
	<input type="hidden" name="act" value="" />
	<input type="hidden" name="id" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="hidemainmenu" value="0" />
<?php
	if ($version->PRODUCT == "Joomla!" || $version->PRODUCT == "Accessible Joomla!")
		if (strncasecmp($version->RELEASE, "1.0", 3)) {
			echo "<input type=\"hidden\" name=\"limitstart\" value=\"".(int)$limitstart."\" />";
		}
?>
</form>
<?php
}

function uddeIMdolistEMN($option, $task, $uddeid, $config) {
	$database = uddeIMgetDatabase();
	if ($task=="usersettingsremove" && count($uddeid)) {
		foreach($uddeid AS $id) {
			$sql="SELECT count(id) FROM #__uddeim_emn WHERE userid=".(int)$id;
			$database->setQuery($sql);
			$entryexists=$database->loadResult();
			if ($entryexists) {
				$sql="DELETE FROM #__uddeim_emn WHERE userid=".(int)$id;
				$database->setQuery($sql);
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}
			}
		}
	} elseif ($task=="usersettingsnew" && count($uddeid)) {
		foreach($uddeid AS $id) {
			$sql="SELECT count(id) FROM #__uddeim_emn WHERE userid=".(int)$id;
			$database->setQuery($sql);
			$entryexists=$database->loadResult();
			if (!$entryexists) {
				$sql="INSERT INTO #__uddeim_emn (status, popup, public, userid) VALUES (".$config->notifydefault.", ".$config->popupdefault.", ".$config->pubfrontenddefault.", ".$id.")";
				$database->setQuery($sql);
				if (!$database->query()) {
					die("SQL error" . $database->stderr(true));
				}
			}
		}
	}
	$redirecturl = "index2.php?option=$option&task=usersettings";
	uddeIMmosRedirect($redirecturl); 
}

function uddeIMchangeStatus($option, $task, $emnid, $config) {
	$database = uddeIMgetDatabase();
	$database->setQuery("SELECT status FROM #__uddeim_emn WHERE id=".(int)$emnid);
	$value = (int)$database->loadResult();
	switch($value) {
		case 0: $value=1; break;
		case 1: $value=2; break;
		case 2: $value=10; break;
		case 10: $value=20; break;
		case 20: $value=0; break;
		default: $value=0; break;
	}
	$database->setQuery("UPDATE #__uddeim_emn SET status=".(int)$value." WHERE id=".(int)$emnid);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
//	$redirecturl = "index2.php?option=$option&task=$task";
//	uddeIMmosRedirect($redirecturl); 
}

function uddeIMchangePopup($option, $task, $emnid, $config) {
	$database = uddeIMgetDatabase();
	$database->setQuery("SELECT popup FROM #__uddeim_emn WHERE id=".(int)$emnid);
	$value = (int)$database->loadResult();
	$value = 1 - $value;
	$database->setQuery("UPDATE #__uddeim_emn SET popup=".(int)$value." WHERE id=".(int)$emnid);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
//	$redirecturl = "index2.php?option=$option&task=$task";
//	uddeIMmosRedirect($redirecturl); 
}

function uddeIMchangePublic($option, $task, $emnid, $config) {
	$database = uddeIMgetDatabase();
	$database->setQuery("SELECT public FROM #__uddeim_emn WHERE id=".(int)$emnid);
	$value = (int)$database->loadResult();
	$value = 1 - $value;
	$database->setQuery("UPDATE #__uddeim_emn SET public=".(int)$value." WHERE id=".(int)$emnid);
	if (!$database->query()) {
		die("SQL error" . $database->stderr(true));
	}
//	$redirecturl = "index2.php?option=$option&task=$task";
//	uddeIMmosRedirect($redirecturl); 
}
