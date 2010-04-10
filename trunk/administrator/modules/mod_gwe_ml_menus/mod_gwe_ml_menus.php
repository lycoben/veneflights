<?php
/**
 * Joom!Fish - Multi Lingual extention and translation manager for Joomla!
 * Copyright (C) 2008 GWE Systems Ltd
 *
 * All rights reserved.  The Joom!Fish project is a set of extentions for
 * the content management system Joomla!. It enables Joomla!
 * to manage multi lingual sites especially in all dynamic information
 * which are stored in the database.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * -----------------------------------------------------------------------------
 * $Id: controller.php 928 2008-03-30 10:51:32Z akede $
 *
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class ML_Menus {

	var $params;
	var $menuparams;

	function ML_Menus ($params){
		$this->params = $params;

		$saveLocalisationSettings=trim(JRequest::getString("gwe_localisation_task",""));

		global $option;
		if ($option!="com_menus" && $saveLocalisationSettings!="saveLocalisationSettings"){
			return;
		}

		$this->menuid=JRequest::getVar("cid",array());
		if (!is_array($this->menuid) || count($this->menuid)<=0){
			$this->menuid=JRequest::getInt("id",0);
			if ($this->menuid<=0){
				return;
			}
		}
		else {
			$this->menuid = $this->menuid[0];
		}
		$this->menuid = intval($this->menuid);
		
		if ($saveLocalisationSettings=="saveLocalisationSettings"){
			$this->checkDBTables();
			$this->saveLocalisationSettings();
		}
		else {
			$task=JRequest::getString("task","");
			if ($option=="com_menus" && $task!="edit"){
				return;
			}

			if ($this->menuid<=0){
				return;
			}
			$this->checkDBTables();
			$this->getMenuParams();
			$this->showLocaleOptions();
		}
	}

	function saveLocalisationSettings(){
		$db =& JFactory::getDBO();
		$params=JRequest::getVar("params",array());
		$gwesys_mlmenu = new stdClass();
		
		$gwesys_mlmenu->menuid=intval(JRequest::getInt("id",0));
		if (!array_key_exists("ml_option",$params)){
			return $this->saveLocalisationSettingsFailed();			
		}
		$gwesys_mlmenu->treatment = intval($params["ml_option"]);
		$langs = $this->getLanguages();
		$locales=array();
		foreach ($params as $key=>$val) {
			$lang = strtolower(str_replace("ml_","",$key));
			if (array_key_exists($lang,$langs) && intval($val)==1){
				$locales[] = $lang; 
			}
		}
		$gwesys_mlmenu->languages  = $db->getEscaped(implode(",",$locales));
		$db->setQuery("REPLACE INTO #__gwesys_mlmenu (menuid,treatment,languages) VALUES ($gwesys_mlmenu->menuid , $gwesys_mlmenu->treatment, '$gwesys_mlmenu->languages')");
		$db->query();		
		if (!$db->getErrorNum()){
			$this->saveLocalisationSettingsSuccess();
		}
		else {
			echo $db->_sql."<br/>";
			echo $db->getErrorMsg();
			$this->saveLocalisationSettingsFailed();
		}
		
	}

	function saveLocalisationSettingsFailed(){
		?>
<script language="JavaScript" type="text/javascript">
	alert('localisation settings not saved - please report the problem');
</script>			
		<?php
	}
		
	function saveLocalisationSettingsSuccess(){
		?>
<script language="JavaScript" type="text/javascript">
	try {
		window.parent.toggleLocalisation();
	}
	catch (e) {
		
	}
	alert('localisation settings saved');
</script>			
		<?php
	}

	function checkDBTables() {
		$db	=& JFactory::getDBO();
		$db->setQuery( "CREATE TABLE IF NOT EXISTS `#__gwesys_mlmenu` (  `menuid` int(11) NOT NULL default 0,`treatment` tinyint(1) NOT NULL default 0,`languages` varchar(200) NOT NULL default '', PRIMARY KEY  (`menuid`) ) ;");
		$db->query();
		echo $db->getErrorMsg();
	}

	function getMenuParams() {
		$db	=& JFactory::getDBO();
		
		$db->setQuery( "SELECT * from `#__gwesys_mlmenu` WHERE menuid='$this->menuid';");
		$this->menuparams= $db->loadObject();
		if (is_null($this->menuparams)){
			$this->menuparams = new stdClass();
			$this->menuparams->menuid = $this->menuid;
			$this->menuparams->treatment = 0;
			$this->menuparams->languages = "";
		}
		echo $db->getErrorMsg();
	}

	function getLanguages(){
		// get languages
		$db =& JFactory::getDBO();
		$sql = "SELECT * from #__languages";
		$db->setQuery($sql);
		$langs = $db->loadObjectList('id');
		return $langs;		
	}
	
	function showLocaleOptions(){
		$langs = $this->getLanguages();
		?>
<div style='display:none;' >
<div id="toolbarLocaleExtra" style='position:relative'>
<a class="toolbar" id='loc_link' href="javascript://Localise This Menu" onclick="toggleLocalisation();return false;" target="toolbarLocaleExtra">
	<img src="/administrator/images/impressions.png"  alt="Translate" name="Localise" title="Localise" align="middle" style="border:0px;height:32px;width:32px" />
	<br />Localise
</a>
<div id='localisationSettings' style='visibility:hidden;display:block;position:absolute;top:80px;right:80px;text-align:left;width:500px;padding:5px;border:solid 1px black;z-Index:99;background-color:#ffffff;'>
<iframe name="gwe_localisation_iframe" style='display:none' ></iframe>
<form action="index2.php" method="post" name="localisationOpionsForm" target="gwe_localisation_iframe" >
<input type="hidden" name="gwe_localisation_task" value="saveLocalisationSettings" />
<input type="hidden" name="id" value="<?php echo $this->menuid;?>" />
<fieldset><legend>Localisation Options</legend>
<table class="adminform" width="100%">
	<tr>
		<td colspan="2">
		<table width="100%" class="paramlist">
			<tr>
			<td align="right" valign="middle" style="width:250px;">
			<label class="editlinktip mlmtip" title="How to treat the language list">Include/Exclude</label>
			</td>
			<td>
			<?php
			$treatment = $this->menuparams->treatment;
			?>

			<select name="params[ml_option]" class="inputbox">
				<option value="0" <?php if ($treatment==0) echo 'selected="selected"';?>>Applies to all languages</option>
				<option value="1" <?php if ($treatment==1) echo 'selected="selected"';?>>Applies ONLY to the following list of languages</option>
				<option value="2" <?php if ($treatment==2) echo 'selected="selected"';?>>Applies to all languages EXCEPT these languages</option>
			</select>
			</td>
			</tr>
			<?php
			$locales = explode(",",$this->menuparams->languages);
			foreach ($langs as $wflang){
				$langset = in_array($wflang->id,$locales);
				?>
			<tr>
			<td width="40%" align="right" valign="middle">
			<label class="editlinktip mlmtip" title="How to treat the language list">Locale : <?php echo $wflang->name;?></label>
			</td>
			<td>
			<select name="params[ml_<?php echo $wflang->id;?>]" class="inputbox">
				<option value="1" <?php if ($langset) echo 'selected="selected"';?>>Yes</option>
				<option value="0" <?php if (!$langset) echo 'selected="selected"';?>>No</option>
			</select>
			</td>
			</tr>
				<?php
			}
			?>
		</table>
		</td>
	</tr>
</table>
<div style="margin-bottom:5px;"?>
<input type="submit" value="Save" />&nbsp;<input type="button" value="Cancel" onclick="toggleLocalisation()" />
</fieldset>
</form>
</div>
</div>
</div>
<script language="JavaScript" type="text/javascript">

function addLocaleToolbarButton(){
	var toolbar = document.getElementById('toolbar');
	if (toolbar){
		toolbar = toolbar.getElementsByTagName('tr')[0];
		var extra = document.getElementById("toolbarLocaleExtra");
		var parent = extra.parentNode;
		oldChild = parent.removeChild(extra);
		td = document.createElement('td');
		td.appendChild(oldChild);
		toolbar.appendChild(td);
	}
}
var showlocaliseOptions=false;
function toggleLocalisation(e){
	if(showlocaliseOptions){
		localiseOptions = document.getElementById("localisationSettings");
		localiseOptions.style.visibility="hidden";
		showlocaliseOptions=false;
	}
	else {
		localiseOptions = document.getElementById("localisationSettings");
		localiseOptions.style.visibility="visible";
		showlocaliseOptions=true;
	}
	
	// stop default action
	return false;
}
window.addEvent('domready',addLocaleToolbarButton);
window.addEvent('domready', function(){;var mltips = new Tips($$('.mlmtip')); });

if (window.addEventListener){
//	window.addEventListener("load",addLocaleToolbarButton,false);
}
else {
	//window.onload = addLocaleToolbarButton;
}
</script>
		
		<?php	
	}
	
}


$ml_menus = new ML_Menus($params);