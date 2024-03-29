<?php
/**
#
 * Mini-component core file: Save a property feature (global property features off - else managed in backend)
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
 * Save a property feature (global property features off - else managed in backend)
 #
* @package Jomres
#
 */
class j04110savepropertyfeature {
	/**
	#
	 * Save a property feature (global property features off - else managed in backend)
	#
	 */
	function j04110savepropertyfeature($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $mrConfig,$Itemid;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$defaultProperty=getDefaultProperty();
		$propertyFeatureUid			= intval(jomresGetParam( $_POST, 'propertyFeatureUid', "" ) );
		$hotel_feature_abbv			= getEscaped( jomresGetParam( $_POST, 'feature_abbv', "" ) );
		$hotel_feature_full_desc	= getEscaped( jomresGetParam( $_POST, 'feature_description', "" ) );
		if ($propertyFeatureUid=="")
			{
			$saveMessage=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_INSERT',_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_INSERT,FALSE);
			$query="INSERT INTO #__jomres_hotel_features (`hotel_feature_abbv`,`hotel_feature_full_desc`,`property_uid` )VALUES ('$hotel_feature_abbv','$hotel_feature_full_desc','".(int)$defaultProperty."')";
			if (doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_INSERT_PROPERTY_FEATURE',_JOMRES_MR_AUDIT_INSERT_PROPERTY_FEATURE,FALSE)))
				returnToPropertyConfig($saveMessage);
			trigger_error ("Unable to insert into hotel features table, mysql db failure", E_USER_ERROR);
			}
		else
			{
			$saveMessage=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_UPDATE',_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_UPDATE,FALSE);
			$query="UPDATE #__jomres_hotel_features SET `hotel_feature_abbv`='$hotel_feature_abbv',`hotel_feature_full_desc`='$hotel_feature_full_desc' WHERE hotel_features_uid='".(int)$propertyFeatureUid."' AND property_uid = '".(int)$defaultProperty."'";
			if (doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_UPDATE_PROPERTY_FEATURE',_JOMRES_MR_AUDIT_UPDATE_PROPERTY_FEATURE,FALSE)))
				returnToPropertyConfig($saveMessage);
			trigger_error ("Unable to update hotel features table, mysql db failure", E_USER_ERROR);
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