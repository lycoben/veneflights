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
class j04005roomsconfig {
	/**
	#
	 * Collates the room/property configuration tabs
	#
	 */
	function j04005roomsconfig($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}

		global $mrConfig,$Itemid;
		$output=array();
		$defaultProperty=getDefaultProperty();

		$propertyRowInfo="";

		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

		$query = "SELECT room_uid,room_classes_uid,propertys_uid,room_features_uid,room_name,room_number,room_floor,room_disabled_access,max_people,smoking FROM #__jomres_rooms WHERE propertys_uid = '".(int)$defaultProperty."' ORDER BY room_number ";
		$roomsList =doSelectSql($query);
		if ($mrConfig['singleRoomProperty'] ==  '1')
			$query = "SELECT room_classes_uid,room_class_abbv,room_class_full_desc,property_uid FROM #__jomres_room_classes  WHERE property_uid = '0' AND `srp_only` = '1' ORDER BY room_class_abbv ";
		else
			$query = "SELECT room_classes_uid,room_class_abbv,room_class_full_desc,property_uid FROM #__jomres_room_classes  WHERE property_uid = '0' AND `srp_only` = '0' ORDER BY room_class_abbv ";
		$roomsClassList =doSelectSql($query);
		$query = "SELECT propertys_uid,property_name,property_street,property_town,property_postcode,property_region,property_country,property_tel,property_fax,property_email,property_features,published,apikey FROM #__jomres_propertys  WHERE propertys_uid = '".(int)$defaultProperty."' ORDER BY property_name ";
		$propertysList =doSelectSql($query);
		$query="SELECT `roomrateperday`,`roomclass_uid`,`maxpeople` FROM #__jomres_rates WHERE property_uid = '".(int)$defaultProperty."'";
		$tariffList=doSelectSql($query);

		if (count($roomsClassList) == 0)
			{
			echo "Error, no global room types created yet. Note that this feature is only available if you have global room types set to Yes in the backend Site Configuration panel, and you must create at least one global room type. If you already have global room types, then edit those rooms types to indicate if they are SRP specific or not.";
			return;
			}

		$roomTypesArray=array();
		$allTariffsForRoomType=array();

		if ($mrConfig['singleRoomProperty'] ==  '1' && count($roomsList)>1 ) // Looks like property manager has changed from MRP to SRP. Let's clean things up and start anew
			{
			$query="DELETE FROM #__jomres_rooms WHERE propertys_uid = '".(int)$defaultProperty."'";
			$result=doInsertSql($query,"");
			$query="DELETE FROM #__jomres_rates WHERE property_uid = '".(int)$defaultProperty."'";
			$result=doInsertSql($query,"");
			$roomsList = array();
			$tariffList=array();
			}

		foreach ($roomsClassList as $roomType) // First we need to gather some information about tariffs & rooms
			{
			if (count($roomsList)>0)
				{
				foreach ($roomsList as $room)
					{
					if ($room->room_classes_uid == $roomType->room_classes_uid )
						{
						$count=$roomTypesArray[$roomType->room_classes_uid]['counter'];
						$roomTypesArray[$roomType->room_classes_uid]['counter']=$count+1;
						$roomTypesArray[$roomType->room_classes_uid]['existingrooms'][]=$room->room_uid;
						$roomTypesArray[$roomType->room_classes_uid]['max_people']=$room->max_people;
						}
					}
				}
			if (count($tariffList)>0)
				{
				foreach ($tariffList as $tariff)
					{
					if ($tariff->roomclass_uid == $roomType->room_classes_uid )
						{
						$count=$allTariffsForRoomType[$roomType->room_classes_uid]['counter'];
						$allTariffsForRoomType[$roomType->room_classes_uid]['counter']=$count+1;
						$allTariffsForRoomType[$roomType->room_classes_uid]['roomrateperday']=$tariff->roomrateperday;
						$allTariffsForRoomType[$roomType->room_classes_uid]['maxpeople']=$tariff->maxpeople;
						}
					}
				}
			}


		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_normalmode_tariffs');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&Itemid=$Itemid"),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['HROOMCLASS']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV',_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV);
		$output['HNUMBEROFROOMS']=jr_gettext('_JOMRES_NUMBEROFROOMSAVAILABLE',_JOMRES_NUMBEROFROOMSAVAILABLE);
		$output['HROOMRATEPERDAY']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY);
		$output['HPROPERTYTYPE']=jr_gettext('JOMRES_PROPERTYTYPE',JOMRES_PROPERTYTYPE);
		$output['HROOMTYPE']=jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMTYPE',_JOMRES_COM_MR_QUICKRES_STEP2_ROOMTYPE);
		$output['HMAXPEOPLE_ROOM']=jr_gettext('JOMRES_MAXPEOPLEINROOM',JOMRES_MAXPEOPLEINROOM);
		$output['HMAXPEOPLE_TARIFF']=jr_gettext('JOMRES_MAXPEOPLEINBOOKING',JOMRES_MAXPEOPLEINBOOKING);

		$output['ITEMID']=$Itemid;
		if ($mrConfig['singleRoomProperty'] ==  '0')  ///////////////////////////////////////////////////////////// MRPs
			{
			// Now we can start to create our rows
			$rows=array();
			foreach ($roomsClassList as $roomType) // First we need to gather some information about tariffs & rooms
				{
				$roomtype_id=$roomType->room_classes_uid;
				$r=array();
				$roomtype_abbr=jr_gettext(_JOMRES_CUSTOMTEXT_ROOMCLASS_DESCRIPTION.$roomType->room_classes_uid, $roomType->room_class_abbv);
				$r['ROOM_CLASS_ABBV'] = $roomtype_abbr;
				$r['ROOMNUMBERDROPDOWN'] = jomresHTML::integerSelectList( 00, 1000, 1, "numberofRooms[$roomtype_id]", 'size="1" class="inputbox"', $roomTypesArray[$roomtype_id]['counter'], "%02d" );
				$r['ROOMRATEPERDAY']=$mrConfig['currency'].'<input class="inputbox" style="text-align:right" size="4" type="text" name="roomrateperday['.$roomtype_id.']" value="'.$allTariffsForRoomType[$roomType->room_classes_uid]['roomrateperday'].'" />';
				$r['MAX_PEOPLE_ROOM']=jomresHTML::integerSelectList( 00, 1000, 1, "max_people[$roomtype_id]", 'size="1" class="inputbox"', $roomTypesArray[$roomType->room_classes_uid]['max_people'], "%02d" );
				$r['MAX_PEOPLE_TARIFF']= jomresHTML::integerSelectList( 01, 1000, 1, "maxpeople_tariff[$roomtype_id]", 'size="1" class="inputbox"', $allTariffsForRoomType[$roomtype_id]['maxpeople'], "%02d" );
				$existingrooms="";
				$counter=1;
				$numberOfExistingRooms=count($roomTypesArray[$roomType->room_classes_uid]['existingrooms']);

				foreach ( $roomTypesArray[$roomType->room_classes_uid]['existingrooms'] as $id)
					{
					$existingrooms.=$id;
					if ($counter<$numberOfExistingRooms)
						$existingrooms.=",";
					$counter++;
					}
				$r['existingrooms']='<input type="hidden" name="existingrooms['.$roomtype_id.']" value="'.$existingrooms.'" />';
				$rows[]=$r;
				}
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'list_normalmode_roomtariffs.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tariffRoomOutput=$tmpl->getParsedTemplate();
			}
		else //////////////////////////////////////////////////////////////////////////////// SRPs
			{

			foreach ($roomTypesArray as $key=>$val)
				{
				$type_id=$key;
				}

			if ($mrConfig['tariffChargesStoredWeeklyYesNo']=="1")
				$output['RATETEXT']=_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK;
			else
				$output['RATETEXT']=_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY;
			$output['ROOMRATEPERDAY']='<input class="inputbox" style="text-align:right" size="4" type="text" name="roomrateperday" value="'.$allTariffsForRoomType[$type_id]['roomrateperday'].'" />';
			$output['MAX_PEOPLE']='<input class="inputbox" style="text-align:right" size="4" type="text" name="max_people" value="'.$roomTypesArray[$type_id]['max_people'].'" />';
			$rows=array();
			foreach ($roomsClassList as $roomType) // First we need to gather some information about tariffs & rooms
				{
				$r=array();
				$roomtype_id=$roomType->room_classes_uid;
				$selected="";
				if ($type_id == (int)$roomtype_id)
					$selected=" checked ";
				$r['ROOM_CLASS_ABBV'] = $roomType->room_class_abbv;
				$r['ROOM_CLASS_RADIO'] ='<input type="radio" name="roomtype" value="'.$roomtype_id.'" '.$selected.'> '.$r['ROOM_CLASS_ABBV'];
				$rows[]=$r;
				}

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'list_normalmode_roomtariffs_srp.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tariffRoomOutput=$tmpl->getParsedTemplate();
			}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		foreach($propertysList as $property)
			{
			$published=$property->published;
			if ($published)
				{
				$img = $jomresConfig_live_site."/administrator/images/tick.png";
				}
			else
				{
				$img = $jomresConfig_live_site."/administrator/images/publish_x.png";
				}
//			$fileLocation=checkForImage('property',$property->propertys_uid);
//			$property_image=$jomresConfig_live_site."/components/com_jomres/uploaded/jrlogo.png";
//			if ($fileLocation)
//				$property_image=$jomresConfig_live_site.$fileLocation;
			$property_image=getImageForProperty("property",$property->propertys_uid,$property->propertys_uid);

			$propertyRowInfo .="<tr>";
			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('edit',jomresURL("index.php?option=com_jomres&task=editProperty&amp;Itemid=$Itemid&amp;propertyUid=".$property->propertys_uid),'');
			if (!$published)
				$jrtb .= $jrtbar->toolbarItem('unpublish',jomresURL('index.php?option=com_jomres&task=publishProperty'.jomresURLToken().'&Itemid='.$Itemid),jr_gettext('_JOMRES_COM_MR_VRCT_PUBLISH',_JOMRES_COM_MR_VRCT_PUBLISH,false));
			else
				$jrtb .= $jrtbar->toolbarItem('publish',jomresURL('index.php?option=com_jomres&task=publishProperty'.jomresURLToken().'&Itemid='.$Itemid),jr_gettext('_JOMRES_COM_MR_VRCT_UNPUBLISH',_JOMRES_COM_MR_VRCT_UNPUBLISH,false) );
			$jrtb .= $jrtbar->endTable();
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".$jrtb."</td>";
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".stripslashes(($property->property_street ))."</td>";
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".stripslashes(($property->property_town) )."</td>";
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".($property->property_region )."</td>";
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".($property->property_country )."</td>";
			$propertyRowInfo .="<td class=\"jradmin_field_ca\">".stripslashes(($property->property_postcode))."</td></tr>";
			$propertyRowInfo .='<tr><td colspan="6" class=\"jradmin_field_ca\"><img src="'.$property_image.'" border="0" width="'.$mrConfig['editiconsize'].'" height="'.$mrConfig['editiconsize'].'"></td>';
			$propertyRowInfo .="</tr>";

			// Uncomment the following lines to show the apikey in the frontend property admin
			$propertyRowInfo .='
			<script type="text/javascript">
			function select_all(obj)
				{ var text_val=eval(obj);
				text_val.focus();
				text_val.select();
				if (!document.all) return; // IE only
					r= text_val.createTextRange();
				r.execCommand(\'copy\');
				} </script>';
			$propertyRowInfo .='<tr><td class=\"jradmin_subheader_la\" colspan=\"6\">APIKEY: <input type="text" size="50" class="inputbox" name="apikey'.$id.'" value="'.$property->apikey.'" READONLY onclick="select_all(this)"/></td></tr>';
			}

		global $mrConfig,$thisJRUser,$Itemid,$jrConfig,$MiniComponents;
		$defaultProperty=$thisJRUser->defaultproperty;
		$currentProperty=getDefaultProperty();
		echo jr_gettext('_JOMRES_COM_MR_VIEWROOMSPROPERTYCONFIG_TITLE',_JOMRES_COM_MR_VIEWROOMSPROPERTYCONFIG_TITLE);
		$contentPanel = new jomres_contentTabs();
		$contentPanel->startTabs();
		$contentPanel->startPanel(jr_gettext('_JOMRES_COM_MR_VRCT_TAB_ROOM',_JOMRES_COM_MR_VRCT_TAB_ROOM,FALSE));
		$contentPanel->setcontent($tariffRoomOutput);
		$contentPanel->insertContent();
		$contentPanel->endPanel();



		$contentPanel->startPanel(jr_gettext('_JOMRES_COM_MR_VRCT_TAB_PROPERTYS',_JOMRES_COM_MR_VRCT_TAB_PROPERTYS,FALSE));
		$contentPanel->setcontent($newPropertyButton);
		$contentPanel->setcontent('<table>
			<tr>
			<td class="jradmin_subheader_ca">&nbsp;</td>
			<td class="jradmin_subheader_ca">'.jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET).'</td>
			<td class="jradmin_subheader_ca">'.jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN).'</td>
			<td class="jradmin_subheader_ca">'.jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION).'</td>
			<td class="jradmin_subheader_ca">'.jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY).'</td>
			<td class="jradmin_subheader_ca">'.jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE).'</td>
			');
		$contentPanel->setcontent('</tr>');
		$contentPanel->setcontent($propertyRowInfo);
		$contentPanel->setcontent('</table>');
		$contentPanel->insertContent();
		$contentPanel->endPanel();

		$contentPanel->endTabs();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_TAB_PROPERTYS',_JOMRES_COM_MR_VRCT_TAB_PROPERTYS);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VRCT_TAB_ROOM',_JOMRES_COM_MR_VRCT_TAB_ROOM);
		$output[]		= jr_gettext('_JOMRES_COM_MR_VIEWROOMSPROPERTYCONFIG_TITLE',_JOMRES_COM_MR_VIEWROOMSPROPERTYCONFIG_TITLE);
		$output[]		= jr_gettext('_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV',_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV);
		$output[]		= jr_gettext('_JOMRES_NUMBEROFROOMSAVAILABLE',_JOMRES_NUMBEROFROOMSAVAILABLE);
		$output[]		= jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY);
		$output[]		= jr_gettext('JOMRES_PROPERTYTYPE',JOMRES_PROPERTYTYPE);
		$output[]		= jr_gettext('_JOMRES_COM_MR_QUICKRES_STEP2_ROOMTYPE',_JOMRES_COM_MR_QUICKRES_STEP2_ROOMTYPE);
		$output[]		= jr_gettext('JOMRES_MAXPEOPLEINROOM',JOMRES_MAXPEOPLEINROOM);
		$output[]		= jr_gettext('JOMRES_MAXPEOPLEINBOOKING',JOMRES_MAXPEOPLEINBOOKING);

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