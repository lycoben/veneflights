<?php
/**
#
 * Mini-component core file: Edit a property feature (global property features off - else managed in backend)
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
 * Edit a property feature (global property features off - else managed in backend)
 #
* @package Jomres
#
 */
class j04100editpropertyfeature {
	/**
	#
	 * Edit a property feature (global property features off - else managed in backend)
	#
	 */
	function j04100editpropertyfeature($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $mrConfig,$jomresConfig_live_site,$Itemid,$my;
		$defaultProperty=getDefaultProperty();
		$propertyFeatureUid = intval( jomresGetParam( $_REQUEST, 'propertyFeatureUid',	0 ) );
		$clone				= intval( jomresGetParam( $_REQUEST, 'clone',	0 ) );
		if ($propertyFeatureUid)
			{
			$query = "SELECT hotel_feature_abbv,hotel_feature_full_desc,property_uid FROM #__jomres_hotel_features WHERE hotel_features_uid  LIKE '".(int)$propertyFeatureUid."' AND property_uid LIKE '".(int)$defaultProperty."'";
			$pFeatureList =doSelectSql($query);
			foreach($pFeatureList as $pFeature)
				{
				$output['FEATURE_ABBV']=stripslashes($pFeature->hotel_feature_abbv);
				$output['FEATURE_DESCRIPTION']=stripslashes($pFeature->hotel_feature_full_desc);
				}
			}
		if ($clone)
			$propertyFeatureUid=FALSE;

		$output['INDEX']="index.php";
		$output['PROPERTYFEATUREUID']=$propertyFeatureUid;
		$output['HFEATUREABBV']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV',_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV);
		$output['HFEATUREDESCRIPTION']=jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC',_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC);
		$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
		$output['ITEMID']=$Itemid;
		$output['PAGETITLE']=jr_gettext('_JOMRES_COM_MR_VRCT_TAB_PROPERTYFEATURES',_JOMRES_COM_MR_VRCT_TAB_PROPERTYFEATURES);

		$cancelText=jr_gettext('_JOMRES_COM_A_CANCEL',_JOMRES_COM_A_CANCEL,FALSE);
		$deleteText=jr_gettext('_JOMRES_COM_MR_ROOM_DELETE',_JOMRES_COM_MR_ROOM_DELETE,FALSE);
		$saveText=jr_gettext('_JOMRES_COM_MR_SAVE',_JOMRES_COM_MR_SAVE,FALSE);

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','',$saveText,true,'savePropertyFeature');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&task=propertyadmin&Itemid=$Itemid"),$cancelText);
		if (!$clone)
			$jrtb .= $jrtbar->toolbarItem('delete',jomresURL("index.php?option=com_jomres&task=deletePropertyFeature".jomresURLToken()."&propertyFeatureUid=".$propertyFeatureUid."&Itemid=$Itemid"),$deleteText);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'editpropertyfeature.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
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