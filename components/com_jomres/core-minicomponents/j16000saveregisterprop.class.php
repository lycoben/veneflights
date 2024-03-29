<?php
/**
#
 * Mini-component core file:
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

class j16000saveregisterprop
	{
	function j16000saveregisterprop()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $indexphp,$jomresConfig_live_site,$jrportalConfig,$mrConfig;

		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}

		$property_name					= jomresGetParam( $_POST, 'property_name', "New Property" );
		$property_street				= jomresGetParam( $_POST, 'property_street', "Street" );
		$property_town					= jomresGetParam( $_POST, 'property_town', "Town" );
		$property_region				= jomresGetParam( $_POST, 'property_region', "" );
		$property_country				= jomresGetParam( $_POST, 'property_country', "" );
		$property_postcode				= jomresGetParam( $_POST, 'property_postcode', "" );
		$property_tel					= jomresGetParam( $_POST, 'property_tel', "" );
		$property_fax					= jomresGetParam( $_POST, 'property_fax', "" );
		$property_email					= jomresGetParam( $_POST, 'property_email', "" );
		$property_mappinglink			= urlencode(jomresGetParam( $_POST, 'property_mappinglink', "" ) );
		$property_description			= jomresGetParam( $_POST, 'property_description', "Change Me" );
		$property_checkin_times			= jomresGetParam( $_POST, 'property_checkin_times', "" );
		$property_area_activities		= jomresGetParam( $_POST, 'property_area_activities', "" );
		$property_driving_directions	= jomresGetParam( $_POST, 'property_driving_directions', "" );
		$property_airports				= jomresGetParam( $_POST, 'property_airports', "" );
		$property_othertransport		= jomresGetParam( $_POST, 'property_othertransport', "" );
		$property_policies_disclaimers	= jomresGetParam( $_POST, 'property_policies_disclaimers', "" );
		$property_type					= intval(jomresGetParam( $_POST, 'propertyType', "" ));
		$property_stars					= intval(jomresGetParam( $_POST, 'stars', "" ) );
		$features_list					= jomresGetParam( $_POST, 'features_list', array() );
		$crate							= jomresGetParam( $_POST, 'crate', 0 );
		$userid						= jomresGetParam( $_POST, 'userid', 0 );

		if (count($features_list)>1)
			$featuresList=implode(",",$features_list);
		if (count($features_list)==1)
			{
			$featuresList=implode(",",$features_list);
			}
		$featuresList=",".$featuresList.",";
		$apikey=createNewAPIKey();
		$query="INSERT INTO #__jomres_propertys (`property_name`,`property_street`,`property_town`,
			`property_region`,`property_country`,`property_postcode`,`property_tel`,`property_fax`,
			`property_email`,`property_features`,`property_mappinglink`,
			`property_description`,`property_checkin_times`,`property_area_activities`,
			`property_driving_directions`,`property_airports`,`property_othertransport`,`property_policies_disclaimers`,stars,ptype_id,apikey)
			VALUES
			('$property_name','$property_street',
			'$property_town','$property_region','$property_country','$property_postcode','$property_tel',
			'$property_fax','$property_email','$featuresList',
			'$property_mappinglink','$property_description','$property_checkin_times','$property_area_activities',
			'$property_driving_directions','$property_airports','$property_othertransport',
			'$property_policies_disclaimers','$property_stars','$property_type','$apikey'
			)";
		$newPropId=doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_INSERT_PROPERTY',_JOMRES_MR_AUDIT_INSERT_PROPERTY,FALSE));
		$today = date("Y/m/d");
		$validfrom=$today;
		$validto=date("Y/m/d",mktime(0, 0, 0, date("m")	, date("d"), date("Y")+1));
		if ($jrConfig['useGlobalRoomTypes']!="1")
			{
			$query="INSERT INTO #__jomres_room_classes (
			`room_class_abbv`,`room_class_full_desc`,`property_uid` )
			VALUES
			('CHANGE ME','CHANGE ME','$newPropId')";
			$rmTypeId=doInsertSql($query,_JOMRES_MR_AUDIT_INSERT_ROOM_TYPE);
			}
		else
			{
			$query="SELECT room_classes_uid FROM #__jomres_room_classes WHERE property_uid = '0' LIMIT 1";
			$rmTypeId=doSelectSql($query,1);
			}
		$query="INSERT INTO #__jomres_rates (
			`rate_title`,`rate_description`,`validfrom`,`validto`,`roomrateperday`,
			`mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,`ignore_pppn`,
			`allow_we`,`property_uid`)
			VALUES
			('CHANGE ME','CHANGE ME','$validfrom','$validto','100',
			'1','100','1','10','$rmTypeId','0',
			'1','$newPropId')";
		$tariffid=doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_INSERT_TARIFF',_JOMRES_MR_AUDIT_INSERT_TARIFF,FALSE));
		$query="INSERT INTO #__jomres_rooms (
			`room_classes_uid`,`propertys_uid`,`room_name`,`room_number`,
			`room_floor`,`room_disabled_access`,`max_people`,`smoking`)
			VALUES
			('$rmTypeId','$newPropId','CHANGE ME','N/A',
			'N/A','0','10','0')";
		doInsertSql($query,_JOMRES_MR_AUDIT_INSERT_ROOM);

		// Let's find all of this manager's property uids, then we can add the new Id to that list. If we didn't create the whole id array, any item NOT in that array would be removed from the manager's properties by the updateManagerIdToPropertyXrefTable function
		$query="SELECT property_uid FROM #__jomres_managers_propertys_xref  WHERE manager_id = '".$userid."'";
		$managersToPropertyList = doSelectSql($query);
		$authorisedProperties = array();
		foreach ($managersToPropertyList as $x)
			{
			$authorisedProperties[]=$x->property_uid;
			}
		$authorisedProperties[]=$newPropId;
		updateManagerIdToPropertyXrefTable($userid,$authorisedProperties );

		// Now we can create the cross reference in the property commisson rate xreference
		$tr= new jrportal_transaction();
		$property = new jrportal_property();
		$property->property_id=$newPropId;
		$property->crate_id=$crate;
		$property->commitNewProperty(&$tr);

		$userObj= new jrportal_user();
		$userObj->id=$userid;
		$userObj->getJUser();

		$subject=_JOMRES_REGISTRATION_CREATEDPROPERTY.$property_name;
		$message=_JOMRES_REGISTRATION_CREATEDPROPERTY_FORUSER.$userObj->username;
		sendAdminEmail($subject,$message);
		jomresRedirect( "index2.php?option=com_jomres&task=listproperties","");
		$url=$url."&mosmsg=". urlencode( $msg );
		echo "<script>document.location.href='$url';</script>\n";
		exit();

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}