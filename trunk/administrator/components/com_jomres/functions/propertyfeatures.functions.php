<?php
/**
#
 * Functins for showing and saving site configuration
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
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


//---------------------------------------------
//-C R E A T E P R O P E R T Y  FEATURES   ----
//---------------------------------------------

/**
#
 * Lists global property features
#
 */
function listPfeatures()
	{
	global $jomresAdminPath,$jomresConfig_absolute_path,$mrConfig,$jomresConfig_live_site;
	$editIcon	='<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/EditItem.png" border="0">';
	$query = "SELECT  hotel_features_uid,hotel_feature_abbv,hotel_feature_full_desc,image,property_uid FROM #__jomres_hotel_features  WHERE property_uid = '0' ORDER BY hotel_feature_abbv ";
	$propertyFeaturesList=doSelectSql($query);
	$rows=array();

	$output['INDEX']="index2.php";
	$output['PAGETITLE']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK;
	$output['HLINKTEXT']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV;
	$output['HLINKTEXTCLONE']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC;
	//$output['PROPERTYFEATUREUID']=$propertyFeatureUid;
	$output['HPFEATURETITLE']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV;
	$output['HPFEATUREDESCRIPTION']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC;
	$output['HJOMRES_A_ICON']=_JOMRES_A_ICON;
	$output['BACKLINK']='<a href="javascript:submitbutton(\'cpanel\')">'._JOMRES_COM_MR_BACK.'</a>';

	foreach($propertyFeaturesList as $propertyFeature)
		{
		$r['CHECKBOX']='<input type="checkbox" id="cb'.count($rows).'" name="idarray[]" value="'.$propertyFeature->hotel_features_uid.'" onClick="isChecked(this.checked);">';
		$r['LINKTEXT']='<a href="index2.php?option=com_jomres&task=editPfeature&propertyFeatureUid='.$propertyFeature->hotel_features_uid.'">'.$editIcon.'</a>';
		$r['LINKTEXTCLONE']='<a href="index2.php?option=com_jomres&task=editPfeature&propertyFeatureUid='.$propertyFeature->hotel_features_uid.'&clone=1">'.$cloneIcon.'</a>';
		$r['PFEATURETITLE']=$propertyFeature->hotel_feature_abbv;
		$r['PFEATUREDESCRIPTION']=$propertyFeature->hotel_feature_full_desc;
		$r['IMAGE']=$jomresConfig_live_site.'/'.$propertyFeature->image;
		$rows[]=$r;
		}
	$output['COUNTER']=count($rows);
	$output['TOTALINLISTPLUSONE']=count($rows)+1;

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/AddItem.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('newPfeature',$link,_JOMRES_COM_MR_NEWTARIFF,$submitOnClick=true,$submitTask="newPfeature",$image);
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres",'');
	$jrtb .= $jrtbar->spacer();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/WasteBasket.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('deletePfeature',$link,_JOMRES_COM_MR_ROOM_DELETE,$submitOnClick=true,$submitTask="deletePfeature",$image);
	$jrtb .= $jrtbar->endTable();
	$output['JOMRESTOOLBAR']=$jrtb;
	
	$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';
	
	$pageoutput[]=$output;

	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
	$tmpl->readTemplatesFromInput( 'list_pfeatures.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}

/**
#
 * Edit a global property feature
#
 */
function editPfeature()
	{
	global $mrConfig,$jomresAdminPath,$jomresConfig_live_site,$Itemid,$jomresConfig_absolute_path;
	$propertyFeatureUid = jomresGetParam( $_REQUEST, 'propertyFeatureUid',	0 );
	$clone				= intval( jomresGetParam( $_REQUEST, 'clone',	false ) );
	if ($propertyFeatureUid >0)
		{
		$query = "SELECT hotel_feature_abbv,hotel_feature_full_desc,image,property_uid FROM #__jomres_hotel_features WHERE hotel_features_uid  = '".(int)$propertyFeatureUid."' AND property_uid = '0'";
		$pFeatureList =doSelectSql($query);
		foreach($pFeatureList as $pFeature)
			{
			$output['FEATURE_ABBV']=stripslashes($pFeature->hotel_feature_abbv);
			$output['FEATURE_DESCRIPTION']=stripslashes($pFeature->hotel_feature_full_desc);
			$image=$pFeature->image;
			}
		}
	if ($clone)
		$propertyFeatureUid=0;

	$map=$jomresConfig_absolute_path.'/images/stories/jomres/pfeatures/';
	$mrp=$jomresConfig_live_site.'/images/stories/jomres/pfeatures/';
	$d = @dir($map);
	$docs = array();
	$rows=array();
	if($d)
		{
		while (FALSE !== ($entry = $d->read()))
			{
			$filename = $entry;
			if(is_file($map.$filename) && substr($entry,0,1) != '.' && strtolower($entry) !== 'cvs')
				{
				$docs=array();
				$docs['ISCHECKED'] ="";
				$docs['IMAGEPATH'] ='images/stories/jomres/pfeatures/'.$filename;
				$docs['IMAGE'] =$mrp.$filename;
				if (isset($image) && $docs['IMAGEPATH']==$image)
					$docs['ISCHECKED'] ="checked";
				$rows[]=$docs;
				}
			}
		$d->close();
		}
	$output['PROPERTYFEATUREINFO']=_JOMRES_A_GLOBALPFEATURES_INFO;
	$output['PROPERTYFEATUREUID']=$propertyFeatureUid;

	$output['INDEX']="index2.php";
	$output['HLINKTEXT']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK;
	$output['HLINKTEXTCLONE']=_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE;
	$output['HFEATUREABBV']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV;
	$output['HFEATUREDESCRIPTION']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC;
	$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
	$output['ITEMID']=$Itemid;
	$output['PAGETITLE']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK;
	$output['BACKLINK']='<a href="javascript:submitbutton(\'cpanel\')">'._JOMRES_COM_MR_BACK.'</a>';

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/Save.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('savePfeature',$link,_JOMRES_COM_MR_SAVE,$submitOnClick=true,$submitTask="savePfeature",$image);
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres&task=listPfeatures",'');
	$jrtb .= $jrtbar->endTable();
	$output['JOMRESTOOLBAR']=$jrtb;
	
	$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

	HTML_jomres::editPfeature_html($output,$rows);
	}

/**
#
 * Save a global property feature
#
 */
function savePfeature()
	{
	global $mrConfig,$Itemid;
	if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
	$propertyFeatureUid			= jomresGetParam( $_POST, 'propertyFeatureUid', 0 );
	$hotel_feature_abbv			= jomresGetParam( $_POST, 'feature_abbv', "" );
	$hotel_feature_full_desc	= jomresGetParam( $_POST, 'feature_description', "" );
	$image						= jomresGetParam( $_POST, 'image', "" );
	if (empty($propertyFeatureUid) )
		{
		$query="INSERT INTO #__jomres_hotel_features (`hotel_feature_abbv`,`hotel_feature_full_desc`,`image`,`property_uid` )VALUES ('$hotel_feature_abbv','$hotel_feature_full_desc','$image','0')";
		if (doInsertSql($query,''))
			jomresRedirect( "index2.php?option=com_jomres&task=listPfeatures",_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_INSERT);
		}
	else
		{
		$query="UPDATE #__jomres_hotel_features SET `image`='$image',`hotel_feature_abbv`='$hotel_feature_abbv',`hotel_feature_full_desc`='$hotel_feature_full_desc' WHERE hotel_features_uid='".(int)$propertyFeatureUid."' AND property_uid = '0'";
		if (doInsertSql($query,''))
			jomresRedirect( "index2.php?option=com_jomres&task=listPfeatures",_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_SAVE_UPDATE);
		}
	}

/**
#
 *Deletes one or more global property features
#
 */
function deletePfeature()
	{
	global $mrConfig,$Itemid;
	if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
	$idarray = jomresGetParam( $_POST, 'idarray', array() );
	if (count($idarray)>0)
		{
		$allDeleted=true;
		foreach ($idarray as $id)
			{
			$propertyFeatureUid=$id;
			$saveMessage=_JOMRES_COM_MR_PROPERTYFEATURE_DELETED;
			// First we need to check that the feature isn't recorded against any propertys. If it is, we can't move forward
			$query="SELECT property_features FROM #__jomres_propertys";
			$propertyFeaturesList =doSelectSql($query);
			$safeToDelete=TRUE;
			foreach($propertyFeaturesList as $feature)
				{
				$featuresArray=explode(",",($feature->property_features));
				if (in_array($propertyFeatureUid,$featuresArray ))
					{
					$safeToDelete=FALSE;
					$allDeleted=false;
					}
				}
		 	if (!$safeToDelete)
				{
		 		echo jr_gettext('_JOMRES_COM_MR_PROPERTYFEATURE_UNABLETODELETE',_JOMRES_COM_MR_PROPERTYFEATURE_UNABLETODELETE,FALSE).$propertyFeatureUid.": <br>";
				}
		 	else
		 		{
				$query="DELETE FROM #__jomres_hotel_features  WHERE hotel_features_uid='".(int)$propertyFeatureUid."'";
				doInsertSql($query,'');
				}
			}
		}
	if ($allDeleted)
		jomresRedirect( "index2.php?option=com_jomres&task=listPfeatures",$saveMessage);
	}


?>