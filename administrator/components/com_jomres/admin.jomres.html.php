<?php
/**
#
 * Classes for managing output via the backend
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 2.7.5
#
* @package Jomres
#
* @copyright	2005-2008 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */

// ################################################################
if (!defined('JPATH_BASE'))
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
else
	{
	if (file_exists(JPATH_BASE .'/includes/defines.php') )
		defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
	else
		defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
	}
// ################################################################

/**
#
 * Classes for managing output via the backend
 #
* @package Jomres
#
 */


class HTML_jomres {

function controlPanel($version)
		{
		global $jomresConfig_absolute_path, $jomresConfig_admin_template, $jomresConfig_live_site;
		?>
		<table class="adminheading" border="0">
		<tr>
		<th class="cpanel">Jomres Control Panel</th>
		</tr>
		</table>
		<?php
		if (file_exists( JOMRESADMINPATH.JRDS."jomres_cpanel.php" ))
			{
			require JOMRESADMINPATH.JRDS."jomres_cpanel.php";
			}
	else
		{
		echo '<br />File does not exist: '.$path.' .... help!!';
		//mosLoadAdminModules( 'cpanel', 1 );
		}
	}

/**
#
 * Outputs the site configuration panel
#
 */
function showSiteConfig( $jrConfig, &$lists,$jsInputFormatDropdownList,$licensekey,$jrtb,$slideshowLocationDropdown,$langDropdown)
	{
	global $jomresConfig_live_site,$version;
		$contentPanel = new jomres_contentTabs();
		?>
		<form action="" method="post" name="adminForm">
		<table cellpadding="4" cellspacing="0" border="0" width="100%">
		<tr>
			<td width="100%" class="sectionname">Jomres <?php echo _JOMRES_A; ?></td>
		</tr>
		</table>
		<?php
		echo '<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';
		echo $jrtb;
		$sslinput="";
		if (substr($version,"Mambo") )
			{
			$sslinput=
			'<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_USE_SSL.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['useSSLinBookingform'].'</td>
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_USE_SSL_DESC.$jomresConfig_live_site.'</td>
			</tr>';
			}

		$contentPanel->startTabs();
		$contentPanel->startPanel(jr_gettext('_JOMRES_A_TABS_MISC',_JOMRES_A_TABS_MISC,FALSE));
		$contentPanel->setcontent('
		<table  class="jradmin_table" border="0">
		<tr align="center" valign="middle">
			<th width="20%" class="jomres_title">&nbsp;</th>
			<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
			<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">License key</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="30" name="cfg_licensekey" value="'.$licensekey.'" /></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SITELANGUAGE_FILE.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$langDropdown.'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SITELANGUAGE_FILE_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_GLOBALCURRENCYYESNO.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['useGlobalCurrency'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_GLOBALCURRENCYYESNO_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_GLOBALCURRENCY.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="30" name="cfg_globalCurrency" value="'.$jrConfig['globalCurrency'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CURRENCYCODE.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="30" name="cfg_globalCurrencyCode" value="'.$jrConfig['globalCurrencyCode'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			 <td class="jradmin_subheader_la" valign="top">'._JOMRES_MANAGEROPTIONSASIMAGES.'</td>
			 <td class="jradmin_subheader_la" valign="top">'.$lists['menusAsImages'].'</td>
			 <td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_MAPSKEY.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="30" name="cfg_google_maps_api_key" value="'.$jrConfig['google_maps_api_key'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_MAPSKEY_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">Jomres itemid</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="30" name="cfg_jomresItemid" value="'.$jrConfig['jomresItemid'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_MINIMALCONFIG.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['minimalconfiguration'].'</td>
			<td class="jradmin_subheader_la" valign="top">'.JOMRES_COM_A_MINIMALCONFIG_DESC.'</td>
		</tr>
		'.$sslinput.'
		<!--
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_A_GLOBALPFEATURES.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['useGlobalPFeatures'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_A_GLOBALPFEATURES_DESC.'</td>
		</tr>
		-->
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JRPORTAL_CONFIG_DEFAULT_CRATE.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['defaultCrate'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JRPORTAL_CONFIG_DEFAULT_CRATE_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_GLOBALEDITING.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['editingModeAffectsAllProperties'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_GLOBALEDITING_DESC.'</td>
		</tr>
		<!--
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_A_GLOBALROOMTYPES.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['useGlobalRoomTypes'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_A_GLOBALROOMTYPES_DESC.'</td>
		</tr>
		-->
		<tr align="center" valign="middle">
			 <td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_ALLOWHTMLEDITOR.'</td>
			 <td class="jradmin_subheader_la" valign="top">'.$lists['allowHTMLeditor'].'</td>
			 <td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SELFREGISTRATION.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['selfRegistrationAllowed'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SELFREGISTRATION_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_CALENDAROUTPUT.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_cal_output" value="'.$jrConfig['cal_output'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_CALENDAROUTPUT_DESC.'</td>
		</tr>

		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_COMPOSITE_PROPERTY_DETAILS.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['composite_property_details'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_COMPOSITE_PROPERTY_DETAILS_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JOMRESEMAILCHECK.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['useJomresEmailCheck'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JOMRESEMAILCHECK_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_ISWRAPPED.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['isInIframe'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_JRCONFIG_ISWRAPPED_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_ERRORCHECKING.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['errorChecking'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_ERRORCHECKING_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_EMAILERRORS.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['emailErrors'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_EMAILERRORS_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_DUMPTEMPLATEDATA.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['dumpTemplate'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_DUMPTEMPLATEDATA_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<th colspan="3">&nbsp;</th>
		</tr>
		</table>');
	$contentPanel->insertContent();
	$contentPanel->endPanel();

	$currentLangFile=$jrConfig['jscalendarLangfile'];
	$calendarFileNamesArray=array("calendar-en.js","calendar-af.js","calendar-al.js","calendar-bg.js","calendar-big5.js","calendar-big5-utf8.js","calendar-br.js","calendar-ca.js","calendar-cs-utf8.js","calendar-cs-win.js","calendar-da.js","calendar-de.js","calendar-du.js","calendar-el.js","calendar-es.js","calendar-fi.js","calendar-fr.js","calendar-he-utf8.js","calendar-hr.js","calendar-hr-utf8.js","calendar-hu.js","calendar-it.js","calendar-jp.js","calendar-ko.js","calendar-ko-utf8.js","calendar-lt.js","calendar-lt-utf8.js","calendar-lv.js","calendar-nl.js","calendar-no.js","calendar-pl.js","calendar-pl-utf8.js","calendar-pt.js","calendar-ro.js","calendar-ru.js","calendar-ru_win_.js","calendar-si.js","calendar-sk.js","calendar-sp.js","calendar-sv.js","calendar-tr.js","calendar-zh.js","cn_utf8.js");
	$jsCalLangfile="<select class=\"inputbox\" name=\"cfg_jscalendarLangfile\">";
	foreach ($calendarFileNamesArray as $fileName)
		{
		$selected="";
		if ($fileName == $currentLangFile)
			$selected="selected";
		$jsCalLangfile .= "<option ".$selected." value=\"".$fileName."\" >".$fileName."</option>/n";
		}
	$jsCalLangfile .="</select>";

	$currentCSSFile=$jrConfig['jscalendarCSSfile'];
	$calendarFileNamesArray=array("calendar-win2k-cold-2.css","calendar-blue2.css","calendar-blue.css","calendar-brown.css","calendar-green.css","calendar-system.css","calendar-tas.css","calendar-win2k-1.css","calendar-win2k-2.css","calendar-win2k-cold-1.css");
	$jsCalCSSfile="<select class=\"inputbox\" name=\"cfg_jscalendarCSSfile\">";
	foreach ($calendarFileNamesArray as $fileName)
		{
		$selected="";
		if ($fileName == $currentCSSFile)
			$selected="selected";
		$jsCalCSSfile .= "<option ".$selected." value=\"".$fileName."\" >".$fileName."</option>/n";
		}
	$jsCalCSSfile .="</select>";

	$contentPanel->startPanel(jr_gettext('_JOMRES_COM_A_JSCALENDAR',_JOMRES_COM_A_JSCALENDAR,FALSE));
	$contentPanel->setcontent('
		<table  class="jradmin_table" border="0">
		<tr align="center" valign="middle">
			<th width="20%" class="jomres_title">&nbsp;</th>
			<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
			<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARLANGUAGE_AUTO.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$lists['autoDetectJSCalendarLang'].'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARLANGUAGE_AUTO_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARLANGUAGE.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$jsCalLangfile.'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARLANGUAGE_DESC.'</td>
		</tr>
		<tr>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARCSS.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$jsCalCSSfile.'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_CALENDARCSS_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_CALENDARINPUT.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$jsInputFormatDropdownList.'</td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_CALENDARINPUT_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<th colspan="3">&nbsp;</th>
		</tr>
		</table>');
	$contentPanel->insertContent();
	$contentPanel->endPanel();

	$slideshowNames=listSlideshows();
	$slideshowDropdownList= jomresHTML::selectList($slideshowNames, 'cfg_slideshow', 'class="inputbox" size="1"', 'value', 'text', $jrConfig['slideshow']);

	$contentPanel->startPanel(jr_gettext('_JOMRES_COM_A_JOMRES_FILE_UPLOADS',_JOMRES_COM_A_JOMRES_FILE_UPLOADS,FALSE));
	$contentPanel->setcontent('
		<table  class="jradmin_table" border="0">
		<tr align="center" valign="middle">
			<th width="20%" class="jomres_title">&nbsp;</th>
			<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
			<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_UPLOADS_IMAGES_WIDTH_LARGE.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_maxwidth" value="'.$jrConfig['maxwidth'].'"></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_UPLOADS_FILESIZE.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_fileSize" value="'.$jrConfig['fileSize'].'"></td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_UPLOADS_FILESIZE_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SLIDESHOWS.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$slideshowDropdownList.'</td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SLIDESHOW_POPUPWIDTH.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="4" name="cfg_ss_popup_width" value="'.$jrConfig['ss_popup_width'].'"></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
			<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SLIDESHOW_POPUPHEIGHT.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" size="4" name="cfg_ss_popup_height" value="'.$jrConfig['ss_popup_height'].'"></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		</tr>
			<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_SLIDESHOW_LOCATION.'</td>
			<td class="jradmin_subheader_la" valign="top">'.$slideshowLocationDropdown.'</td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>

		<tr>');
	if (!isset( $jrConfig['ss_imageLocation']) ||  $jrConfig['ss_imageLocation']=="" )
		$jrConfig['ss_imageLocation']="/images/stories/jomres/";
	$contentPanel->setcontent('
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SLIDESHOWSIMAGELOCATION.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_ss_imageLocation" value="'.$jrConfig['ss_imageLocation'].'"></td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_A_SLIDESHOWSIMAGELOCATION_DESC.'</td>
		</tr>

		<tr align="center" valign="middle">
			<th colspan="3">&nbsp;</th>
		</tr>
		</table>');
	$contentPanel->insertContent();
	$contentPanel->endPanel();

	$contentPanel->startPanel(jr_gettext('_JOMRES_CUSTOMTEXT_ADMIN_SEARCHOPTIONS',JOMRES_COM_A_SEARCHOPTIONSTAB,FALSE));
	$contentPanel->setcontent('
		<table  class="jradmin_table" border="0">
		<tr align="center" valign="middle">
			<th width="20%" class="jomres_title">&nbsp;</th>
			<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
			<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_PROPERTYLISTDESC.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_propertyListDescriptionLimit" value="'.$jrConfig['propertyListDescriptionLimit'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_PROPERTYLISTDESC_DESC.'</td>
		</tr>
		<tr align="center" valign="middle">
			<td class="jradmin_subheader_la" valign="top">'._JOMRES_A_GLOBAL_SEARCHOPTION_RANDOMLIMIT.'</td>
			<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_randomsearchlimit" value="'.$jrConfig['randomsearchlimit'].'" /></td>
			<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
		</tr>
		<tr align="center" valign="middle">
			<th colspan="3">&nbsp;</th>
		</tr>
		</table>');
	$contentPanel->insertContent();
	$contentPanel->endPanel();

		if (defined('_JOMRES_NEWJOOMLA') )
			{
			if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.JRDS.'components'.JRDS.'com_sh404sef'.JRDS.'sef_ext'.JRDS.'com_jomres.php'))
				{
				$contentPanel->startPanel("SEF");
				$contentPanel->setcontent('
				<table  class="jradmin_table" border="0">
				<tr align="center" valign="middle">
					<th width="20%" class="jomres_title">&nbsp;</th>
					<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
					<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_URL_PREFIX.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_jomres_url_prefix" value="'.$jrConfig['sef_jomres_url_prefix'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_URL_PREFIX_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_VIEWPROPERTY.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_task_alias_viewproperty" value="'.$jrConfig['sef_task_alias_viewproperty'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_VIEWPROPERTY_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_DOBOOKING.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_task_alias_dobooking" value="'.$jrConfig['sef_task_alias_dobooking'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_DOBOOKING_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_SEARCH.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_task_alias_search" value="'.$jrConfig['sef_task_alias_search'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_TASK_ALIAS_SEARCH_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_COUNTRY.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_country'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_COUNTRY_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_REGION.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_region'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_REGION_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_TOWN.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_town'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_TOWN_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PTYPE.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_ptype'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PTYPE_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PROPERTYNAME.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_propertyname'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PROPERTYNAME_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PROPERTY_ID.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_property_url_property_id'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_PROPERTY_URL_PROPERTY_ID_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_COUNTRY.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_search_url_country'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_COUNTRY_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_COUNTRY.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_default_country" value="'.$jrConfig['sef_default_country'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_COUNTRY_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_REGION.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_search_url_region'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_REGION_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_REGION.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_default_region" value="'.$jrConfig['sef_default_region'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_REGION_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_TOWN.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_search_url_town'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_TOWN_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_TOWN.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_default_town" value="'.$jrConfig['sef_default_town'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_TOWN_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_PTYPE.'</td>
					<td class="jradmin_subheader_la" valign="top">'.$lists['sef_search_url_ptype'].'</td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_SEARCH_URL_PTYPE_DESC.'</td>
				</tr>
				<tr align="center" valign="middle">
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_PTYPE.'</td>
					<td class="jradmin_subheader_la" valign="top"><input type="text" class="inputbox" name="cfg_sef_default_ptype" value="'.$jrConfig['sef_default_ptype'].'" /></td>
					<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_SEF_DEFAULT_PTYPE_DESC.'</td>
				</tr>

				<tr align="center" valign="middle">
					<th colspan="3">&nbsp;</th>
				</tr>
				</table>');
				$contentPanel->insertContent();
				$contentPanel->endPanel();
				}
			else
				{
				$contentPanel->startPanel("SEF");
				$contentPanel->setcontent(_JOMRES_COM_SEF_NOTINSTALLED);
				$contentPanel->insertContent();
				$contentPanel->endPanel();
				}
			}
		// Logging configuration
		$contentPanel->startPanel(_JOMRES_COM_LOGGING);
		$contentPanel->setcontent('
		<table  class="jradmin_table" border="0">
			<tr align="center" valign="middle">
				<th width="20%" class="jomres_title">&nbsp;</th>
				<th width="20%" class="jomres_title">'._JOMRES_COM_A_CURRENT_SETTINGS.'</th>
				<th width="60%" class="jomres_title">'._JOMRES_COM_A_EXPLANATION.'</th>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top" colspan="3">'._JOMRES_COM_LOGGING_WARNING.'</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_LOGGING_BOOKING.'</td>
				<td class="jradmin_subheader_la" valign="top">'.$lists['loggingBooking'].'</td>
				<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_LOGGING_GATEWAY.'</td>
				<td class="jradmin_subheader_la" valign="top">'.$lists['loggingGateway'].'</td>
				<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_LOGGING_SYSTEM.'</td>
				<td class="jradmin_subheader_la" valign="top">'.$lists['loggingSystem'].'</td>
				<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_LOGGING_REQUEST.'</td>
				<td class="jradmin_subheader_la" valign="top">'.$lists['loggingRequest'].'</td>
				<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
			</tr>
			<tr align="center" valign="middle">
				<td class="jradmin_subheader_la" valign="top">'._JOMRES_COM_LOGGING_JRPORTAL.'</td>
				<td class="jradmin_subheader_la" valign="top">'.$lists['loggingPortal'].'</td>
				<td class="jradmin_subheader_la" valign="top">&nbsp;</td>
			</tr>
			<tr align="center" valign="middle">
				<th colspan="3">&nbsp;</th>
			</tr>
			</table>');
		$contentPanel->insertContent();
		$contentPanel->endPanel();

		$contentPanel->endTabs();
		?>

		<input type="hidden" name="cfg_useGlobalPFeatures" value="<?php echo $jrConfig['useGlobalPFeatures'];?>" />
		<input type="hidden" name="cfg_useGlobalRoomTypes" value="<?php echo $jrConfig['useGlobalRoomTypes'];?>" />
		<input type="hidden" name="cfg_dynamicMinIntervalRecalculation" value="<?php echo $jrConfig['dynamicMinIntervalRecalculation'];?>" />
		<input type="hidden" name="cfg_disableAudit" value="<?php echo $jrConfig['disableAudit'];?>" />
		<input type="hidden" name="cfg_allowedTags" value="<?php echo $jrConfig['allowedTags'];?>" />
		<input type="hidden" name="cfg_utfHTMLdecode" value="<?php echo $jrConfig['utfHTMLdecode'];?>" />

		<input type="hidden" name="task" value="saveSiteConfig" />
		<input type="hidden" name="option" value="com_jomres" />
		</form>
		<?php
		}

/**
#
 * Calls the edit property feature tempate file
#
 */
function editPfeature_html($output,$rows)
	{
	$pageoutput=array();
	$pageoutput[]=$output;
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
	$tmpl->readTemplatesFromInput( 'editpropertyfeature.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}
/**
#
 * Shows the list property types output
#
 */
function listpropertyTypes_html($pList,$rowInfo,$counter,$jrtb)
		{
		global $mrConfig,$jomresConfig_live_site;
		echo $jrtb;
		//$editIcon	='<IMG SRC="'.$jomresConfig_live_site.'/administrator/images/edit_f2.png" border="0" width="'.$mrConfig['editiconsize'].'" height="'.$mrConfig['editiconsize'].'">';
		?>
		<form action="index2.php" method="POST" name="adminForm">
		<input type="hidden" name="jomrestoken" value="<?php echo jomresSetToken();?>">
		<table  class="jradmin_table" border="0">
			<tr>
				<th class="jomres_title" colspan="5"><?php echo $pList['PAGETITLE']; ?></td>
			</tr>
			<tr>
				<th class="jomres_title"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo $counter+1; ?>);" /></th>
				<th class="jomres_title">&nbsp;</th>
				<th class="jomres_title"><?php echo $pList['HPTYPE']; ?></th>
				<th class="jomres_title"><?php echo $pList['HPTYPE_DESC']; ?></th>
				<th class="jomres_title"><?php echo $pList['HPUBLISHED']; ?></th>
			</tr>
		<?php echo $rowInfo; ?>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="option" value="com_jomres" />
		<input type="hidden" name="boxchecked" value="0">
		</form>
		<?php
		}//end function List property types

/**
#
 * Shows the edit property type form
#
 */
function editpropertyType_html($pList,$rowInfo,$hidden,$jrtb)
		{
		?>
	<form action="index2.php" method="POST" name="adminForm">
	<?php echo $jrtb;?>
	<table class="jradmin_table" border="0">
		<tr>
			<th class="jomres_title" colspan="2"><?php echo $pList['PAGETITLE']; ?></td>
		</tr>
		<tr>
			<th class="jomres_title"><?php echo $pList['HPTYPE']; ?></th><th class="jomres_title"><?php echo $pList['HPTYPE_DESC']; ?></th>
		</tr>
		<?php echo $rowInfo; ?>
	</table>
	<input type="hidden" name="jomrestoken" value="<?php echo jomresSetToken();?>">
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="option" value="com_jomres" />
	<?php echo $hidden ; ?>
		</form>
		<?php
		echo $pList['FURTHER'];
		}//end function List property types

/**
#
 * Called, ultimately, by the show profiles option
#
 */
function listMosUsers_html($userRowInfo,$option)
		{
		?>
		<script type="text/javascript">
		function select_all(obj)
		{ var text_val=eval(obj);
		text_val.focus();
		text_val.select();
		if (!document.all) return; // IE only
		r= text_val.createTextRange();
		r.execCommand('copy');
		} </script>
		<form action="index2.php" method="POST" name="adminForm">
		<table  class="jradmin_table" border="0">
		<tr>
			<th class="jomres_title" colspan="9"><?php echo _JOMRES_COM_MR_ASSIGNUSER_TITLE; ?></th>
		</tr>
		<tr>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_ID; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_NAME; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_USERNAME; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDHOTELUSER; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDDEFAULTHOTEL; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDCHANGETHIS; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDACCESSLEVEL; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDCHANGETHIS; ?></th>
			<th class="jomres_title"><?php echo _JOMRES_COM_USERIS_SUPERPROPERTYMANAGER; ?></th>
		</tr>
				<?php echo $userRowInfo; ?>
		</table>
		<input type="hidden" name="jomrestoken" value="<?php echo jomresSetToken();?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		</form>
	<?php
	}//end function List mos users

}

?>