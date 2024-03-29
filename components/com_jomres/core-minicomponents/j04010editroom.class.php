<?php
/**
#
 * Mini-component core file: Shows the rooms/tariffs/room type/room feature/property tabs
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
* @subpackage mini-components
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
 * Mini-component core file: Constructs the javascript tab booking details page
 #
* @package Jomres
#
 */
class j04010editroom {
	/**
	#
	 * Collates the room/property configuration tabs
	#
	 */
	function j04010editroom($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig,$jomresConfig_live_site,$Itemid,$jrConfig;
		$defaultProperty=getDefaultProperty();
		$output=array();
		if ($mrConfig['singleRoomProperty'] == "0")
			{
			$roomUid		 = intval( jomresGetParam( $_REQUEST, 'roomUid', 0 ) );
			$clone			 = intval( jomresGetParam( $_REQUEST, 'clone', 0 ) );
			
		 	if ($jrConfig['useGlobalRoomTypes']=="1")
				$roomTypeSearchParameter="0";
			else
				$roomTypeSearchParameter=$defaultProperty;
			$room_features_uid="";
			$room_name="";
			$room_number="";
			$room_floor="";
			$room_disabled_access="1";
			$room_classes_uid=false;
			$max_people="10";
			$smoking="0";
			if ($roomUid)
				{

				$query = "SELECT room_classes_uid,room_features_uid,room_name,room_number,room_floor,room_disabled_access,max_people,smoking,singleperson_suppliment  FROM #__jomres_rooms WHERE  room_uid  LIKE '".(int)$roomUid."' AND propertys_uid LIKE '".(int)$defaultProperty."'";
				$roomList =doSelectSql($query);
				foreach ($roomList as $room)
					{
					$room_classes_uid=$room->room_classes_uid;
					$room_features_uid=$room->room_features_uid;
					$room_name=stripslashes($room->room_name);
					$room_number=stripslashes($room->room_number);
					$room_floor=stripslashes($room->room_floor);
					$room_disabled_access=$room->room_disabled_access;
					$max_people=$room->max_people;
					$smoking=$room->smoking;
					$singleperson_suppliment=$room->singleperson_suppliment;
					
					}
			 	}
			if ($clone)
				$roomUid=0;
			if ($mrConfig['singleRoomProperty'] ==  '1')
				$query = "SELECT room_classes_uid,room_class_abbv,room_class_full_desc,property_uid FROM #__jomres_room_classes  WHERE property_uid = '".(int)$roomTypeSearchParameter."' AND `srp_only` = '1' ORDER BY room_class_abbv ";
			else
				$query = "SELECT room_classes_uid,room_class_abbv,room_class_full_desc,property_uid FROM #__jomres_room_classes  WHERE property_uid = '".(int)$roomTypeSearchParameter."' AND `srp_only` = '0' ORDER BY room_class_abbv ";

			$roomsClassList =doSelectSql($query);
			$classOptions[]=jomresHTML::makeOption( '', "" );
			foreach ($roomsClassList as $roomClass)
				{
		  		$classOptions[]=jomresHTML::makeOption( $roomClass->room_classes_uid,$roomClass->room_class_abbv);
				}
			$classDropDownList= jomresHTML::selectList($classOptions, 'roomClasses', 'class="inputbox" size="1"', 'value', 'text', $room_classes_uid);
			$disabledOptions[]=jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO,FALSE) );
			$disabledOptions[]=jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES,FALSE) );
			$disabledAccessDropdown= jomresHTML::selectList($disabledOptions, 'disabledAccess', 'class="inputbox" size="1"', 'value', 'text', $room_disabled_access);
			$smokingOptions[]=jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO,FALSE) );
			$smokingOptions[]=jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES,FALSE));
			$smokingDropdown= jomresHTML::selectList($smokingOptions, 'smoking', 'class="inputbox" size="1"', 'value', 'text', $smoking);

			if ($roomUid)
				$roomFeaturesArray=explode(",",$room_features_uid);
			else
				$roomFeaturesArray=array();
			$featureListTxt="";
			$query = "SELECT  room_features_uid,feature_description FROM #__jomres_room_features WHERE property_uid LIKE '".(int)$defaultProperty."' ORDER BY feature_description ";
			$roomFeaturesList =doSelectSql($query);
			foreach($roomFeaturesList as $roomFeature)
				{
				$checked="";
				if (in_array(($roomFeature->room_features_uid),$roomFeaturesArray ))
					$checked="checked";
				$featureListTxt.="<input type=\"checkbox\" name=\"features_list[]\" value=\"".($roomFeature->room_features_uid)."\" ".$checked." >".($roomFeature->feature_description)."<br>";
				}
			// Now to find the property image
			$roomImageLocation="";
			$query="SELECT filelocation FROM #__jomres_room_images WHERE roomid LIKE '".(int)$roomUid."'";
			$roomImageList =doSelectSql($query);
			if (count($roomImageList)>0)
				{
				foreach ($roomImageList as $imageLocation)
					{
					$roomImageLocation='<img src="'.$jomresConfig_live_site.'/'.$imageLocation->filelocation.'">';
					}
				}

			$output['ROOMUID']			=$roomUid;
			$output['TYPEDROPDOWN']		=$classDropDownList;
			$output['ROOMNAME']			=$room_name;
			$output['ROOMNUMBER']		=$room_number;
			$output['ROOMFLOOR']		=$room_floor;
			$output['DISABLED']			=$disabledAccessDropdown;
			$output['MAXPEOPLE']		=$max_people;
			$output['SMOKING']			=$smokingDropdown;
			$output['FEATURES']			=$featureListTxt;
			$output['SUPPLIMENT']		=$singleperson_suppliment;
			$output['CURRENCY']=$mrConfig['currency'];
			
			$output['HTYPE']			=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE',_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE);
			$output['HNAME']			=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME',_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME);
			$output['HNUMBER']			=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER',_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER);
			$output['HFLOOR']			=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR',_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR);
			$output['HDISABLED']		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_DISABLEDACCESS',_JOMRES_COM_MR_VRCT_ROOM_HEADER_DISABLEDACCESS);
			$output['HMAXPEOPLE']		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE',_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE);
			$output['HSMOKING']			=jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMSMOKING',_JOMRES_COM_MR_QUICKRES_STEP2_ROOMSMOKING);
			$output['HFEATURES']		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES',_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES);
			$output['HSUPPLIMENT']		=jr_gettext('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON',_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON);
			$output['SUPPLIMENT_DESC']		=jr_gettext('_JOMRES_COM_SPS_EDITROOM_DESC',_JOMRES_COM_SPS_EDITROOM_DESC);
			
			$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;

			$output['IMAGE']=$roomImageLocation;
			if ($roomImageLocation!="")
				$output['DELETEIMAGE']	='<a href="'. jomresURL("index.php?option=com_jomres&task=dropImage&imageType=room&itemUid=$output[ROOMUID]").'">'.jr_gettext('_JOMRES_FILE_DELETE',_JOMRES_FILE_DELETE).'</a>';

			$output['UPLOADIMAGE']		=jr_gettext('_JOMRES_UPLOAD_IMAGE',_JOMRES_UPLOAD_IMAGE,FALSE);
			$output['PAGETITLE']			=jr_gettext('_JOMRES_COM_MR_VRCT_TAB_ROOM',_JOMRES_COM_MR_VRCT_TAB_ROOM);
			$output['ITEMID']				=$Itemid;

			$cancelText=jr_gettext('_JOMRES_COM_A_CANCEL',_JOMRES_COM_A_CANCEL,FALSE);
			$deleteText=jr_gettext('_JOMRES_COM_MR_ROOM_DELETE',_JOMRES_COM_MR_ROOM_DELETE,FALSE);
			$saveText=jr_gettext('_JOMRES_COM_MR_SAVE',_JOMRES_COM_MR_SAVE,FALSE);
			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('save','',$saveText,true,'saveRoom');
			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&task=propertyadmin&Itemid=$Itemid"),$cancelText);
			if ($clone<1)
				$jrtb .= $jrtbar->toolbarItem('delete',jomresURL("index.php?option=com_jomres&task=deleteRoom".jomresURLToken()."&roomUid=".$roomUid."Itemid=$Itemid"),$deleteText);
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;
		
			$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'editroom.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->displayParsedTemplate();
			}
		else
			{
			$query = "SELECT room_classes_uid FROM #__jomres_rooms WHERE propertys_uid LIKE '".(int)$defaultProperty."'";
			$original_room_classes_uid =doSelectSql($query,1);
			echo '<form action="index.php?option=com_jomres" method="post" name="adminForm">';
			$query = "SELECT room_classes_uid,room_class_abbv FROM #__jomres_room_classes WHERE property_uid = 0 AND `srp_only` = '1' ORDER BY room_class_abbv ";
			$roomClasses=doSelectSql($query);
			$dropDownList ="<select class=\"inputbox\" name=\"roomClass\">";
			foreach ($roomClasses as $roomClass)
				{
				$selected="";
				if ($roomClass->room_classes_uid == $original_room_classes_uid)
					$selected=' selected="selected"';
				$room_classes_uid=$roomClass->room_classes_uid;
				$room_class_abbv=$roomClass->room_class_abbv;
				$dropDownList .= "<option value=\"".$room_classes_uid."\" ".$selected." >".$room_class_abbv."</option>";
				}
			$dropDownList.="</select>";
			
			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('save','',$saveText,true,'saveRoom');
			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&task=propertyadmin&Itemid=$Itemid"),$cancelText);
			$jrtb .= $jrtbar->endTable();
			
			echo $jrtb." "._JOMRES_COM_MR_VRCT_PROPERTY_TYPE_INFO." ".$dropDownList;
			echo '<input type="hidden" name="Itemid" value="'.$Itemid.'" />';
			echo '<input type="hidden" name="task" value="saveRoom" />';
			echo '</form>';
			}
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN',_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN);
		$output[]		=jr_gettext('_JOMRES_COM_A_CANCEL',_JOMRES_COM_A_CANCEL);
		$output[]		=jr_gettext('_JOMRES_COM_MR_ROOM_DELETE',_JOMRES_COM_MR_ROOM_DELETE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_SAVE',_JOMRES_COM_MR_SAVE);
		$output[]		=jr_gettext('_JOMRES_UPLOAD_IMAGE',_JOMRES_UPLOAD_IMAGE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_TAB_ROOM',_JOMRES_COM_MR_VRCT_TAB_ROOM);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE',_JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME',_JOMRES_COM_MR_VRCT_ROOM_HEADER_NAME);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER',_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR',_JOMRES_COM_MR_VRCT_ROOM_HEADER_FLOOR);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_DISABLEDACCESS',_JOMRES_COM_MR_VRCT_ROOM_HEADER_DISABLEDACCESS);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE',_JOMRES_COM_MR_VRCT_ROOM_HEADER_MAXPEOPLE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMSMOKING',_JOMRES_COM_MR_QUICKRES_STEP2_ROOMSMOKING);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES',_JOMRES_COM_MR_VRCT_ROOM_HEADER_FEATURES);
		$output[]		=jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO);
		$output[]		=jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>