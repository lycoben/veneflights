<?php
/**
#
 * Mini-component core file: Edit a property
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
 * Edit a property
 #
* @package Jomres
#
 */
class j04200editproperty {
	/**
	#
	 * Edit a property
	#
	 */
	function j04200editproperty($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $database,$selectedCountry,$mrConfig,$jomresConfig_live_site,$thisJRUser,$Itemid,$jrConfig;
		$defaultText="Change Me!";
		$propertyRights=$thisJRUser->defaultproperty;
		$propertyUid  = intval( jomresGetParam( $_REQUEST, 'propertyUid', 0 ) );
		if ($jrConfig['selfRegistrationAllowed']=="0" && $propertyUid == 0)
			$propertyUid=getDefaultProperty();
		if (JOMRES_SINGLEPROPERTY)
			$propertyUid=getDefaultProperty();
		$propertyRegion[]=array("GB","");
		$ptypeid="";
		$propertyFeatures="";
		$output['PROPERTY_DESCRIPTION']='<textarea class="inputbox" cols="40" rows="3" name="property_description"></textarea>';
		if (isset($_REQUEST['selectedCountry']) && !empty($_REQUEST['selectedCountry']))
			$selectedCountry  = jomresGetParam( $_REQUEST, 'selectedCountry', '' );

		if (isset($propertyUid) && $propertyUid!="")
			{
			$query = "SELECT propertys_uid,property_name,property_street,property_town,property_region,property_country,property_postcode,
			property_tel ,property_fax,property_email,property_features,property_key,
			property_mappinglink,property_description,property_checkin_times,
			property_area_activities,property_driving_directions,property_airports,
			property_othertransport,property_policies_disclaimers,stars,ptype_id,`lat`,`long`,`metatitle`,`metadescription`
			FROM #__jomres_propertys WHERE  propertys_uid  LIKE '".(int)$propertyUid."' LIMIT 1";
			$propertyList =doSelectSql($query);
			foreach($propertyList as $property)
				{
				$starsDropDownList = '<span ><select id="stars" class="inputbox" style="border:0px" name="stars">';
				for ($i=0, $n=5; $i <= $n; $i++)
					{
					if ($i==($property->stars))
						$selected="selected";
					else
						$selected="";
					$starsDropDownList .= "<option value=\"".$i."\" ".$selected.">".$i."</option>";
					}
				$starsDropDownList.="</select></span>";
				$ptypeid=$property->ptype_id;

				$output['PROPERTY_NAME']=getEscaped($property->property_name);
				$output['PROPERTY_STREET']=getEscaped(($property->property_street));
				$output['PROPERTY_TOWN']=getEscaped(($property->property_town ));
				$output['PROPERTY_POSTCODE']=getEscaped(($property->property_postcode));
				$output['PROPERTY_TEL']=getEscaped(($property->property_tel ));
				$output['PROPERTY_FAX']=getEscaped(($property-> property_fax ));
				$output['PROPERTY_EMAIL']=getEscaped(($property->property_email ));
				$output['PROPERTY_MAPPINGLINK']=getEscaped(($property->property_mappinglink));


				$output['LAT']=$property->lat;
				$output['LONG']=$property->long;
				$output['METATITLE']=getEscaped(($property->metatitle ));
				$output['METADESCRIPTION']=getEscaped(($property->metadescription ));

				if (!isset($jrConfig['allowHTMLeditor']) )
					$jrConfig['allowHTMLeditor']="1";

				$property_description=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_DESCRIPTION', trim(stripslashes($property->property_description)),false,false);
				$property_checkintimes=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_CHECKINTIMES',trim(stripslashes($property->property_checkin_times)),false,false);
				$property_areaactivities=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_AREAACTIVITIES',trim(stripslashes($property->property_area_activities)),false,false);
				$property_drivingdirections=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_DIRECTIONS',trim(stripslashes($property->property_driving_directions)),false,false);
				$property_airports=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_AIRPORTS',trim(stripslashes($property->property_airports)),false,false);
				$property_othertransport=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_OTHERTRANSPORT',trim(stripslashes($property->property_othertransport)),false,false);
				$property_policiesdisclaimers=jr_gettext('_JOMRES_CUSTOMTEXT_ROOMTYPE_DISCLAIMERS',trim(stripslashes($property->property_policies_disclaimers)),false,false);

				if ($jrConfig['allowHTMLeditor']=="1" || $jrConfig['allowHTMLeditor']=="2" || $jrConfig['allowHTMLeditor'] == "3")
					{
					if ($jrConfig['allowHTMLeditor'] == "1")
						{
						$hiddenField="property_description";
						$width="95%";
						$height="250";
						$col="20";
						$row="10";
						$output['PROPERTY_DESCRIPTION']=editorAreaText( 'property_description',$property_description, 'property_description', $width, $height, $col, $row );
						$output['PROPERTY_CHECKIN_TIMES']=editorAreaText( 'property_checkin_times', $property_checkintimes, 'property_checkin_times', $width, $height, $col, $row );
						$output['PROPERTY_AREA_ACTIVITIES']=editorAreaText( 'property_area_activities', $property_areaactivities, 'property_area_activities', $width, $height, $col, $row );
						$output['PROPERTY_DRIVING_DIRECTIONS']=editorAreaText( 'property_driving_directions', $property_drivingdirections, 'property_driving_directions', $width, $height, $col, $row );
						$output['PROPERTY_AIRPORTS']=editorAreaText( 'property_airports', $property_airports, 'property_airports', $width, $height, $col, $row );
						$output['PROPERTY_OTHERTRANSPORT']=editorAreaText( 'property_othertransport', $property_othertransport, 'property_othertransport', $width, $height, $col, $row );
						$output['PROPERTY_POLICIES_DISCLAIMERS']=editorAreaText( 'property_policies_disclaimers', $property_policiesdisclaimers, 'property_policies_disclaimers', $width, $height, $col, $row );
						}
					else
						{
						if ($jrConfig['allowHTMLeditor'] == "2")
							{
							$output['PROPERTY_DESCRIPTION']= flashArea('property_description',$property_description);
							$output['PROPERTY_CHECKIN_TIMES']= flashArea('property_checkin_times', $property_checkintimes);
							$output['PROPERTY_AREA_ACTIVITIES']= flashArea('property_area_activities', $property_areaactivities);
							$output['PROPERTY_DRIVING_DIRECTIONS']= flashArea('property_driving_directions', $property_drivingdirections);
							$output['PROPERTY_AIRPORTS']=flashArea('property_airports', $property_airports);
							$output['PROPERTY_OTHERTRANSPORT'] = flashArea('property_othertransport', $property_othertransport);
							$output['PROPERTY_POLICIES_DISCLAIMERS']= flashArea('property_policies_disclaimers', $property_policiesdisclaimers);
							}
						if ($jrConfig['allowHTMLeditor'] == "3")
							{
							$output['PROPERTY_DESCRIPTION']= flashArea('property_description', $property_description);
							$output['PROPERTY_CHECKIN_TIMES']='<textarea class="inputbox" cols="40" rows="3" name="property_checkin_times">'.$property_checkintimes.'</textarea>';
							$output['PROPERTY_AREA_ACTIVITIES']='<textarea class="inputbox" cols="40" rows="3" name="property_area_activities">'.$property_areaactivities.'</textarea>';
							$output['PROPERTY_DRIVING_DIRECTIONS']='<textarea class="inputbox" cols="40" rows="3" name="property_driving_directions">'.$property_drivingdirections.'</textarea>';
							$output['PROPERTY_AIRPORTS']='<textarea class="inputbox" cols="40" rows="3" name="property_airports">'.$property_airports.'</textarea>';
							$output['PROPERTY_OTHERTRANSPORT']='<textarea class="inputbox" cols="40" rows="3" name="property_othertransport">'.$property_othertransport.'</textarea>';
							$output['PROPERTY_POLICIES_DISCLAIMERS']='<textarea class="inputbox" cols="40" rows="3" name="property_policies_disclaimers">'.$property_policiesdisclaimers.'</textarea>';
							}
						}
					}
				else
					{
					$output['PROPERTY_DESCRIPTION']='<textarea class="inputbox" cols="40" rows="3" name="property_description">'.$property_description.'</textarea>';
					$output['PROPERTY_CHECKIN_TIMES']='<textarea class="inputbox" cols="40" rows="3" name="property_checkin_times">'.$property_checkintimes.'</textarea>';
					$output['PROPERTY_AREA_ACTIVITIES']='<textarea class="inputbox" cols="40" rows="3" name="property_area_activities">'.$property_areaactivities.'</textarea>';
					$output['PROPERTY_DRIVING_DIRECTIONS']='<textarea class="inputbox" cols="40" rows="3" name="property_driving_directions">'.$property_drivingdirections.'</textarea>';
					$output['PROPERTY_AIRPORTS']='<textarea class="inputbox" cols="40" rows="3" name="property_airports">'.$property_airports.'</textarea>';
					$output['PROPERTY_OTHERTRANSPORT']='<textarea class="inputbox" cols="40" rows="3" name="property_othertransport">'.$property_othertransport.'</textarea>';
					$output['PROPERTY_POLICIES_DISCLAIMERS']='<textarea class="inputbox" cols="40" rows="3" name="property_policies_disclaimers">'.$property_policiesdisclaimers.'</textarea>';
					}
				$propertyFeatures=$property->property_features;
				$propertyRegion=$property->property_region;
				if (empty($selectedCountry))
					$selectedCountry=$property->property_country;
				}
			}
		else
			{
			if (!isset($jrConfig['allowHTMLeditor']) )
				$jrConfig['allowHTMLeditor']="1";
			if ($jrConfig['allowHTMLeditor']=="1" || $jrConfig['allowHTMLeditor']=="2" || $jrConfig['allowHTMLeditor'] == "3")
				{
				if ($jrConfig['allowHTMLeditor'] == "1")
					{
					$hiddenField="property_description";
					$width="450";
					$height="250";
					$col="20";
					$row="10";
					$output['PROPERTY_DESCRIPTION']=editorAreaText( 'property_description', $defaultText, 'property_description', $width, $height, $col, $row );
					$output['PROPERTY_CHECKIN_TIMES']=editorAreaText( 'property_checkin_times', $defaultText, 'property_checkin_times', $width, $height, $col, $row );
					$output['PROPERTY_AREA_ACTIVITIES']=editorAreaText( 'property_area_activities', $defaultText, 'property_area_activities', $width, $height, $col, $row );
					$output['PROPERTY_DRIVING_DIRECTIONS']=editorAreaText( 'property_driving_directions', $defaultText, 'property_driving_directions', $width, $height, $col, $row );
					$output['PROPERTY_AIRPORTS']=editorAreaText( 'property_airports', $defaultText, 'property_airports', $width, $height, $col, $row );
					$output['PROPERTY_OTHERTRANSPORT']=editorAreaText( 'property_othertransport', $defaultText, 'property_othertransport', $width, $height, $col, $row );
					$output['PROPERTY_POLICIES_DISCLAIMERS']=editorAreaText( 'property_policies_disclaimers', $defaultText, 'property_policies_disclaimers', $width, $height, $col, $row );
					}
				else
					{
					if ($jrConfig['allowHTMLeditor'] == "2")
						{
						$output['PROPERTY_DESCRIPTION']= flashArea('property_description', $defaultText);
						$output['PROPERTY_CHECKIN_TIMES']= flashArea('property_checkin_times', $defaultText);
						$output['PROPERTY_AREA_ACTIVITIES']= flashArea('property_area_activities', $defaultText);
						$output['PROPERTY_DRIVING_DIRECTIONS']= flashArea('property_driving_directions', $defaultText);
						$output['PROPERTY_AIRPORTS']=flashArea('property_airports', $defaultText);
						$output['PROPERTY_OTHERTRANSPORT'] = flashArea('property_othertransport', $defaultText);
						$output['PROPERTY_POLICIES_DISCLAIMERS']= flashArea('property_policies_disclaimers', $defaultText);
						}
					if ($jrConfig['allowHTMLeditor'] == "3")
						{
						$output['PROPERTY_DESCRIPTION']= flashArea('property_description', $defaultText);
						$output['PROPERTY_CHECKIN_TIMES']='<textarea class="inputbox" cols="40" rows="3" name="property_checkin_times">'.$defaultText.'</textarea>';
						$output['PROPERTY_AREA_ACTIVITIES']='<textarea class="inputbox" cols="40" rows="3" name="property_area_activities">'.$defaultText.'</textarea>';
						$output['PROPERTY_DRIVING_DIRECTIONS']='<textarea class="inputbox" cols="40" rows="3" name="property_driving_directions">'.$defaultText.'</textarea>';
						$output['PROPERTY_AIRPORTS']='<textarea class="inputbox" cols="40" rows="3" name="property_airports">'.$defaultText.'</textarea>';
						$output['PROPERTY_OTHERTRANSPORT']='<textarea class="inputbox" cols="40" rows="3" name="property_othertransport">'.$defaultText.'</textarea>';
						$output['PROPERTY_POLICIES_DISCLAIMERS']='<textarea class="inputbox" cols="40" rows="3" name="property_policies_disclaimers">'.$defaultText.'</textarea>';
						}
					}
				}
			else
				{
				$output['PROPERTY_DESCRIPTION']='<textarea class="inputbox" cols="40" rows="3" name="property_description">'.$defaultText.'</textarea>';
				$output['PROPERTY_CHECKIN_TIMES']='<textarea class="inputbox" cols="40" rows="3" name="property_checkin_times">'.$defaultText.'</textarea>';
				$output['PROPERTY_AREA_ACTIVITIES']='<textarea class="inputbox" cols="40" rows="3" name="property_area_activities">'.$defaultText.'</textarea>';
				$output['PROPERTY_DRIVING_DIRECTIONS']='<textarea class="inputbox" cols="40" rows="3" name="property_driving_directions">'.$defaultText.'</textarea>';
				$output['PROPERTY_AIRPORTS']='<textarea class="inputbox" cols="40" rows="3" name="property_airports">'.$defaultText.'</textarea>';
				$output['PROPERTY_OTHERTRANSPORT']='<textarea class="inputbox" cols="40" rows="3" name="property_othertransport">'.$defaultText.'</textarea>';
				$output['PROPERTY_POLICIES_DISCLAIMERS']='<textarea class="inputbox" cols="40" rows="3" name="property_policies_disclaimers">'.$defaultText.'</textarea>';
				}
			$starsDropDownList="<select class=\"inputbox\" name=\"stars\">";
			for ($i=0, $n=5; $i <= $n; $i++)
				{
				$starsDropDownList .= "<option value=\"".$i."\">".$i."</option>";
				}
			$starsDropDownList.="</select>";
			}


		$output['HPROPERTY_TYPE']=jr_gettext('_JOMRES_FRONT_PTYPE',_JOMRES_FRONT_PTYPE);
		$output['PROPERTY_TYPE_DROPDOWN']=getPropertyTypeDropdown($ptypeid);
		$propertyFeaturesArray=explode(",",$propertyFeatures);

		if ($jrConfig['useGlobalPFeatures']=="1")
			{
			$query = "SELECT  hotel_features_uid,hotel_feature_abbv,hotel_feature_full_desc,image,property_uid FROM #__jomres_hotel_features  WHERE property_uid LIKE '0' ORDER BY hotel_feature_abbv ";
			$propertyFeaturesList=doSelectSql($query);
			$counter=1;
			foreach($propertyFeaturesList as $propertyFeature)
				{
				$r=array();

				$r['PID']=$propertyFeature->hotel_features_uid;
				if (in_array($propertyFeature->hotel_features_uid,$propertyFeaturesArray) )
					$r['ischecked']="checked";
				$r['FEATURE']=makeFeatureImages($propertyFeature->image,$propertyFeature->hotel_feature_abbv,$propertyFeature->hotel_feature_full_desc,$retString=TRUE);
				$r['BR']="";
				if ($counter==8)
					{
					$r['BR']="<br />";
					$counter=0;
					}
				$counter++;
				$globalPfeatures[]=$r;
				}
			}
		else
			{
			$listTxt="";
			$query = "SELECT hotel_features_uid,hotel_feature_abbv,hotel_feature_full_desc FROM #__jomres_hotel_features WHERE property_uid LIKE '".(int)$propertyUid."' ORDER BY hotel_feature_abbv ";
			$propertyFeaturesList =doSelectSql($query);
			foreach($propertyFeaturesList as $propertyFeature)
				{
				$checked="";
				if (in_array(($propertyFeature->hotel_features_uid),$propertyFeaturesArray ))
					$checked="checked";
				$listTxt.="<input type=\"checkbox\" name=\"features_list[]\" value=\"".($propertyFeature->hotel_features_uid)."\" ".$checked." >".($propertyFeature->hotel_feature_abbv)."<br>";
				}
			}
		if (isset($listTxt))
			$output['FEATURES']=$listTxt;
		$propertyImageLocation="";
		$query="SELECT filelocation FROM #__jomres_property_images WHERE propertyid LIKE '".(int)$propertyUid."'";
		$propertyImageList =doSelectSql($query);
		if (count($propertyImageList)>0)
			{
			foreach ($propertyImageList as $imageLocation)
				{
				$propertyImageLocation='<img src="'.$jomresConfig_live_site.'/'.$imageLocation->filelocation.'">';
				}
			}

		$output['STARSDROPDOWN']=$starsDropDownList;
		$output['COUNTRIESDROPDOWN']=createCountriesDropdown($selectedCountry);
		$output['REGIONDROPDOWN']=setupRegions($selectedCountry,$propertyRegion);

		$output['HCOUNTRY']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY);
		$output['HREGION']= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION);
		$output['HNAME']= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME);
		$output['HSTREET']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET);
		$output['HTOWN']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN);
		$output['HPOSTCODE']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE);
		$output['HTELEPHONE']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE);
		$output['HFAX']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX);
		$output['HEMAIL']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL);
		$output['HSTARS']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STARS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STARS);
		$output['HFEATURES']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FEATURES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FEATURES);
		$output['HMAPPINGLINK']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_MAPPINGLINK',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_MAPPINGLINK);
		$output['HPROPDESCRIPTION']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPDESCRIPTION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPDESCRIPTION);
		$output['HCHECKINTIMES']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_CHECKINTIMES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_CHECKINTIMES);
		$output['HAREAACTIVITIES']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AREAACTIVITIES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AREAACTIVITIES);
		$output['HDRIVINGDIRECTIONS']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_DRIVINGDIRECTIONS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_DRIVINGDIRECTIONS);
		$output['HAIRPORTS']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AIRPORTS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AIRPORTS);
		$output['HOTHERTRANSPORT']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_OTHERTRANSPORT',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_OTHERTRANSPORT);
		$output['HPOLICIESDISCLAIMERS']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POLICIESDISCLAIMERS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POLICIESDISCLAIMERS);

		$output['CHANGECOUNTRYWARNING']=jr_gettext('_JOMRES_EDITPROPERTY_SELECTCOUNTRY',_JOMRES_EDITPROPERTY_SELECTCOUNTRY);
		$output['SAVEBEFOREUPLOADWARNING']=jr_gettext('_JOMRES_EDITPROPERTY_SAVEBEFOREUPLOAD',_JOMRES_EDITPROPERTY_SAVEBEFOREUPLOAD);


		$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
		$output['ITEMID']=$Itemid;
		$output['PROPERTYUID']=$propertyUid;

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		if ($jrConfig['allowHTMLeditor']!="2" && $jrConfig['allowHTMLeditor'] != "3")
			$jrtb .= $jrtbar->toolbarItem('save','','',true,'saveProperty');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&task=propertyadmin&Itemid=$Itemid"),'');
		$usersProperties=$thisJRUser->authorisedPropertyDetails;

		if (!function_exists('botJRHP') && !JOMRES_SINGLEPROPERTY && count($usersProperties) > 1)
			$jrtb .= $jrtbar->toolbarItem('delete',jomresURL("index.php?option=com_jomres&task=deleteProperty".jomresURLToken()."&Itemid=$Itemid"),'');
		else
			{
			if (JOMRES_GUESTLIMIT==50)
				$output['DELETEWARNING']=_JOMRES_EDITPROPERTY_CONNOTDELETE1." "._JOMRES_EDITPROPERTY_CONNOTDELETE2;
			else
				$output['DELETEWARNING']=jr_gettext('_JOMRES_EDITPROPERTY_CONNOTDELETE1',_JOMRES_EDITPROPERTY_CONNOTDELETE1);
			}
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['PAGETITLE']=jr_gettext('_JOMRES_COM_MR_VRCT_TAB_PROPERTYS',_JOMRES_COM_MR_VRCT_TAB_PROPERTYS);
		$output['IMAGE']=$propertyImageLocation;
		if ($propertyImageLocation!="")
			$output['DELETEIMAGE']	='<a href="'. jomresURL("index.php?option=com_jomres&task=dropImage&imageType=property&itemUid=".$propertyUid."$output[ROOMUID]").'">'.jr_gettext('_JOMRES_FILE_DELETE',_JOMRES_FILE_DELETE).'</a>';
		$output['UPLOADIMAGE']=jr_gettext('_JOMRES_UPLOAD_IMAGE',_JOMRES_UPLOAD_IMAGE,FALSE);

		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'editproperty.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		if ($jrConfig['useGlobalPFeatures']=="1")
			$tmpl->addRows( 'globalPfeatures',$globalPfeatures);
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]=jr_gettext('_JOMRES_FRONT_PTYPE',_JOMRES_FRONT_PTYPE);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY);
		$output[]= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION);
		$output[]= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FAX);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_EMAIL);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STARS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STARS);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FEATURES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_FEATURES);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_MAPPINGLINK',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_MAPPINGLINK);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPDESCRIPTION',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_PROPDESCRIPTION);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_CHECKINTIMES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_CHECKINTIMES);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AREAACTIVITIES',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AREAACTIVITIES);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_DRIVINGDIRECTIONS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_DRIVINGDIRECTIONS);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AIRPORTS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_AIRPORTS);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_OTHERTRANSPORT',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_OTHERTRANSPORT);
		$output[]=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POLICIESDISCLAIMERS',_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POLICIESDISCLAIMERS);
		$output[]=jr_gettext('_JOMRES_EDITPROPERTY_SELECTCOUNTRY',_JOMRES_EDITPROPERTY_SELECTCOUNTRY);
		$output[]=jr_gettext('_JOMRES_EDITPROPERTY_SAVEBEFOREUPLOAD',_JOMRES_EDITPROPERTY_SAVEBEFOREUPLOAD);
		$output[]=jr_gettext('_JOMRES_UPLOAD_IMAGE',_JOMRES_UPLOAD_IMAGE);
		$output[]=jr_gettext('_JOMRES_EDITPROPERTY_CONNOTDELETE1',_JOMRES_EDITPROPERTY_CONNOTDELETE1);

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