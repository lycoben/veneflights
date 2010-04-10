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

if (!(defined('_JEXEC') || defined('_VALID_MOS'))) { die( 'Direct Access to this location is not allowed.' ); }

class getInboxTab extends cbTabHandler {
	
	var $uddeicons_readpic = "";
	var $uddeicons_unreadpic = "";
	var $config;
	var $absolute_path;
	var $pathtoadmin;
	var $pathtouser;
	var $pathtosite;
	var $mosConfig_lang;
	var $mosConfig_offset;
	var $myuserid;
	var $mygroupid;
	
	function getInboxTab() {
		$this->cbTabHandler();
		$uddeim_isadmin = 0;
		if ( defined( 'JPATH_ADMINISTRATOR' ) ) {
			require_once(JPATH_SITE.'/components/com_uddeim/uddeimlib15.php');
		} else {
			global $mainframe;
			require_once($mainframe->getCfg('absolute_path').'/components/com_uddeim/uddeimlib10.php');
		}
		$this->absolute_path = uddeIMgetPath('absolute_path');
		$this->pathtoadmin   = uddeIMgetPath('absolute_path')."/administrator/components/com_uddeim";
		$this->pathtouser    = uddeIMgetPath('absolute_path')."/components/com_uddeim";
		$this->pathtosite    = uddeIMgetPath('live_site');

		if(file_exists( $this->pathtoadmin."/config.class.php"))
			include_once( $this->pathtoadmin."/config.class.php");
		$this->config = new uddeimconfigclass();

		$this->mosConfig_lang = uddeIMgetLang();
		$this->mosConfig_offset = uddeIMgetOffset();
		$this->myuserid = uddeIMgetUserID();
		$this->mygroupid = uddeIMgetGroupID();
	}

	function _evaluateUsername($fromname, $fromid, $publicname) {
		$back = NULL;
		if ($fromname==NULL && !$fromid) {
			if (!$publicname || $publicname==NULL)
				$back = _UDDEIM_PUBLICUSER;
			else
				$back = $publicname;
		} elseif ($fromname==NULL) {
			if (!$publicname || $publicname==NULL)			// maybe we have the original name still stored here
				$back = _UDDEIM_DELETEDUSER;
			else
				$back = $publicname;
		} else
			$back = $fromname;
		return $back;
	}

	function _getLanguageFile() {
		require_once( $this->pathtouser."/crypt.class.php");
		if(!defined('_UDDEIM_INBOX')) {
			$postfix = "";
			if ($this->config->languagecharset)
				$postfix = ".utf8";
			if (file_exists($this->pathtoadmin.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php')) {
				include_once($this->pathtoadmin.'/language'.$postfix.'/'.$this->mosConfig_lang.'.php');
			} elseif (file_exists($this->pathtoadmin.'/language'.$postfix.'/english.php')) {
				include_once($this->pathtoadmin.'/language'.$postfix.'/english.php');
			} elseif (file_exists($this->pathtoadmin.'/language/english.php')) {
				include_once($this->pathtoadmin.'/language/english.php');
			}
		}
		$this->uddeicons_readpic    = "<img alt='"._UDDEIM_STATUS_READ   ."' title='"._UDDEIM_STATUS_READ   ."' src='".$this->pathtosite."/components/com_uddeim/templates/".$this->config->templatedir."/images/nonew_im.gif' border='0'>";
		$this->uddeicons_unreadpic  = "<img alt='"._UDDEIM_STATUS_UNREAD ."' title='"._UDDEIM_STATUS_UNREAD ."' src='".$this->pathtosite."/components/com_uddeim/templates/".$this->config->templatedir."/images/new_im.gif' border='0'>";
	}

	function getDisplayTab($tab,$user,$ui) {
		global $_CB_database;

		$myself = $this->myuserid;
		if ($myself != $user->id)
			return null;

		// first try to find a published link
		$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=1 AND access".
				($this->mygroupid==0 ? "=" : "<=").$this->mygroupid." LIMIT 1";
		$_CB_database->setQuery($sql);
		$item_id = (int)$_CB_database->loadResult();
		if (!$item_id) {
			// when no published link has been found, try to find an unpublished one
			$sql="SELECT id FROM #__menu WHERE link LIKE '%com_uddeim%' AND published=0 AND access".
					($this->mygroupid==0 ? "=" : "<=").$this->mygroupid." LIMIT 1";
			$_CB_database->setQuery($sql);
			$item_id = (int)$_CB_database->loadResult();
		}

		$this->_getLanguageFile();
		if ($this->config->overwriteitemid)
			$item_id = $this->config->useitemid;

		$params = $this->params;
		$return="";

		if($tab->description != null)
			$return .= "\t\t<div class=\"tab_Description\">".unHtmlspecialchars(getLangDefinition($tab->description))."</div>\n";

		$params = $this->params;
        $entriesNumber	= $params->get('entriesNumber', '10');
		$pagingEnabled	= $params->get('pagingEnabled', 0);

		$pagingParams = $this->_getPaging(array(),array("entries_"));

		if ($pagingEnabled) {
			$sql = "SELECT count(a.id) FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0";
			$_CB_database->setQuery($sql);
			$total=$_CB_database->loadResult();
            if (!is_numeric($total))
				$total = 0;

            if ($pagingParams["entries_limitstart"] === null)
				$pagingParams["entries_limitstart"] = 0;
            if ($entriesNumber > $total)
				$pagingParams["entries_limitstart"] = 0;
        } else {
            $pagingParams["entries_limitstart"] = 0;
        }

		$sql = "SELECT a.*, b.".($this->config->realnames ? "name" : "username")." AS fromname FROM #__uddeim AS a LEFT JOIN #__users AS b ON a.fromid=b.id WHERE a.toid=".(int)$myself." AND a.totrash=0 AND archived=0 ORDER BY datum DESC LIMIT ".($pagingParams["entries_limitstart"]?$pagingParams["entries_limitstart"]:"0").",".$entriesNumber;
		$_CB_database->setQuery($sql);
		$items=$_CB_database->loadObjectList();

		if(count($items) > 0) {
			if ($pagingEnabled) {
				$title = _UDDEIM_PLUG_INBOXENTRIES.$entriesNumber;
			} else { 
				$title = _UDDEIM_PLUG_LAST.$entriesNumber._UDDEIM_PLUG_ENTRIES;
			}

			$return .= "<br /><div class=\"sectiontableheader\" style=\"text-align:left;padding-left:0px;padding-right:0px;margin:0px 0px 10px 0px;height:auto;width:100%;\">";
			$return .= "<div class=\"sectiontableheader\" style=\"float:left;\">".$title."</div>";
		
			$return .= "<br /><div style=\"clear:both;\">&nbsp;</div>";
            $return .= "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"margin:0px;padding:0px;width:100%;\">";
            $return .= "<tr class=\"sectiontableheader\">";
            $return .= "<th>".   _UDDEIM_PLUG_STATUS   ."</th>";
            $return .= "<th>".   _UDDEIM_PLUG_SENDER   ."</th>";
           	$return .= "<th>".   _UDDEIM_PLUG_MESSAGE  ."</th>";
            $return .= "</tr>";
            $i = 2;
            foreach($items as $item) {

				if($item->toread)
					$readcell=$this->uddeicons_readpic;
				else
					$readcell=$this->uddeicons_unreadpic;
				
				$fromname = $this->_evaluateUsername($item->fromname, $item->fromid, $item->publicname);

				if($item->systemmessage)
					$fromname = $item->systemmessage;

				if ($item->cryptmode==2)
					$pms_show = uddeIMsefRelToAbs("index.php?option=com_uddeim&Itemid=".$item_id."&task=showpass&messageid=".$item->id);
				else
					$pms_show = uddeIMsefRelToAbs("index.php?option=com_uddeim&Itemid=".$item_id."&task=show&messageid=".$item->id);

				$cm = uddeIMgetMessage($item->message, "", $item->cryptmode, "", $this->config->cryptkey);
				$cm = stripslashes($cm);
				if($item->systemmessage || $this->config->allowbb) {					
					require_once ($this->absolute_path."/components/com_uddeim/bbparser.php");
					$cm = uddeIMbbcode_strip($cm);
				}
				$cm = htmlspecialchars($cm, ENT_QUOTES, $this->config->charset);
				$cm = str_replace("&amp;#", "&#", $cm); 

				$i = ($i==1) ? 2 : 1;
                $return .= "<tr class=\"sectiontableentry$i\"><td>".$readcell."</td>"
						. "<td>".$fromname."</td>"
                		. "<td><a href=\"".$pms_show."\">".substr($cm,0,$this->config->firstwordsinbox)."...</a></td>";
                $return .= "</tr>\n";
			}
            $return .= "</table></div>";

            if ($pagingEnabled && ($entriesNumber < $total)) {
                $return .= "<div style='width:95%;text-align:center;'>"
                .$this->_writePaging($pagingParams,"entries_",$entriesNumber,$total)
                ."</div>";
            }
        } else {
			$return .= "<br /><br /><div class=\"sectiontableheader\" style=\"text-align:left;width:95%;\">";
			$return .= _UDDEIM_PLUG_EMPTYINBOX;		// empty
			$return .= "</div>";
        }
		return $return;
    }
}