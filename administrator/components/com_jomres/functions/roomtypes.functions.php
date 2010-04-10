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


//---------------------------------------------------------------------
//-C R E A T E	G L O B A L	R O O M	T Y P E S   ----
//---------------------------------------------------------------------

/**
#
 * Lists global room types
#
 */
function listGlobalroomTypes()
	{
	global $jomresAdminPath,$jomresConfig_absolute_path,$mrConfig,$jomresConfig_live_site;
	$editIcon	='<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/EditItem.png" border="0">';
	$query = "SELECT room_classes_uid, room_class_abbv, room_class_full_desc,image FROM #__jomres_room_classes  WHERE property_uid = '0' ORDER BY room_class_abbv";
	$roomtypeList=doSelectSql($query);
	$rows=array();

	$output['INDEX']="index2.php";
	$output['PAGETITLE']=_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_LINK;
	$output['BACKLINK']='<a href="javascript:submitbutton(\'cpanel\')">'._JOMRES_COM_MR_BACK.'</a>';
	$output['HLINKTEXT']=_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_ABBV;
	$output['HLINKTEXTCLONE']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC;
	$output['HRTTITLE']=_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_ABBV;
	$output['HRTDESCRIPTION']=_JOMRES_COM_MR_EB_ROOM_CLASS_DESC;
	$output['HJOMRES_A_ICON']=_JOMRES_A_ICON;

	foreach($roomtypeList as $roomtype)
		{
		$r['CHECKBOX']='<input type="checkbox" id="cb'.count($rows).'" name="idarray[]" value="'.$roomtype->room_classes_uid.'" onClick="isChecked(this.checked);">';
		$r['LINKTEXT']='<a href="index2.php?option=com_jomres&task=editGlobalroomTypes&rmTypeUid='.$roomtype->room_classes_uid.'">'.$editIcon.'</a>';
		$r['LINKTEXTCLONE']='<a href="index2.php?option=com_jomres&task=editGlobalroomTypes&$rmTypeUid='.$roomtype->room_classes_uid.'&clone=1">'.$cloneIcon.'</a>';
		$r['RTTITLE']=$roomtype->room_class_abbv;
		$r['RTDESCRIPTION']=$roomtype->room_class_full_desc;
		$r['IMAGE']=$jomresConfig_live_site.'/'.$roomtype->image;
		$rows[]=$r;
		}
	$output['COUNTER']=count($rows);
	$output['TOTALINLISTPLUSONE']=count($rows)+1;

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/AddItem.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('editGlobalroomTypes',$link,_JOMRES_COM_MR_NEWTARIFF,$submitOnClick=true,$submitTask="editGlobalroomTypes",$image);
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres",'');
	$jrtb .= $jrtbar->spacer();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/WasteBasket.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('deleteGlobalroomTypes',$link,_JOMRES_COM_MR_ROOM_DELETE,$submitOnClick=true,$submitTask="deleteGlobalroomTypes",$image);
	$jrtb .= $jrtbar->endTable();

	$output['JOMRESTOOLBAR']= $jrtb;
	$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'">';
	$pageoutput[]=$output;

	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
	$tmpl->readTemplatesFromInput( 'list_rmtypes.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}

/**
#
 * Edits a global room type
#
 */
function editGlobalroomTypes()
	{
	global $mrConfig,$jomresAdminPath,$jomresConfig_live_site,$Itemid,$jomresConfig_absolute_path;
	$rmTypeUid 			= intval(jomresGetParam( $_REQUEST, 'rmTypeUid',	0 ));
	$clone				= intval( jomresGetParam( $_REQUEST, 'clone',	0 ) );
	$yesno = array();
	$yesno[] = jomresHTML::makeOption( '0', _JOMRES_COM_MR_NO );
	$yesno[] = jomresHTML::makeOption( '1', _JOMRES_COM_MR_YES );
	
	if ($rmTypeUid>0)
		{
		$query = "SELECT room_class_abbv, room_class_full_desc,image,srp_only FROM #__jomres_room_classes WHERE room_classes_uid = '".(int)$rmTypeUid."' AND property_uid = '0'";
		$rtList =doSelectSql($query);
		foreach($rtList as $rt)
			{
			$output['CLASSABBV']=stripslashes($rt->room_class_abbv);
			$output['CLASSDESC']=stripslashes($rt->room_class_full_desc);
			$output['SRP_ONLY']=jomresHTML::selectList( $yesno, 'srp_only','class="inputbox" size="1"', 'value', 'text', $rt->srp_only);
			$image=$rt->image;
			}
		}
	else
		{
		$output['CLASSABBV']="";
		$output['CLASSDESC']="";
		$output['SRP_ONLY']=jomresHTML::selectList( $yesno, 'srp_only','class="inputbox" size="1"', 'value', 'text', 0);
		}
	if ($clone)
		$propertyFeatureUid=FALSE;

	$map=$jomresConfig_absolute_path.'/images/stories/jomres/rmtypes/';
	$mrp=$jomresConfig_live_site.'/images/stories/jomres/rmtypes/';
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
				$docs['IMAGEPATH'] ='images/stories/jomres/rmtypes/'.$filename;
				$docs['IMAGE'] =$mrp.$filename;
				if (isset($image) && $docs['IMAGEPATH']==$image)
					$docs['ISCHECKED'] ="checked";
				$rows[]=$docs;
				}
			}
		$d->close();
		}
	$output['PROPERTYFEATUREINFO']=_JOMRES_A_GLOBALROOMTYPES_INFO;
	$output['ROOMCLASSUID']=$rmTypeUid;

	$output['INDEX']="index2.php";
	$output['TASK']='saveGlobalRoomClass';
	$output['HLINKTEXT']=_JOMRES_COM_MR_VRCT_ROOMTYPES_LINKTEXT;
	$output['HLINKTEXTCLONE']=_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE;
	$output['HABBV']=_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV;
	$output['HDESC']=_JOMRES_COM_MR_EB_ROOM_CLASS_DESC;
	$output['HSRP_ONLY']=JOMRES_COM_A_SRPONLY;
	$output['MOSCONFIGLIVESITE']=$jomresConfig_live_site;
	$output['ITEMID']=$Itemid;
	$output['PAGETITLE']=_JOMRES_COM_MR_VRCT_ROOMTYPES_HEADER_LINK;

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/Save.png");
	$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('saveGlobalRoomClass',$link,_JOMRES_COM_MR_SAVE,$submitOnClick=true,$submitTask="saveGlobalRoomClass",$image);
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres&task=listGlobalroomTypes",'');
	$jrtb .= $jrtbar->endTable();
	$output['JOMRESTOOLBAR']=$jrtb;

	$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';
	
	$pageoutput[]=$output;
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
	$tmpl->readTemplatesFromInput( 'editroomtype.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}

/**
#
 * Saves a global room type
#
 */
function saveGlobalRoomClass()
	{
	global $mrConfig,$Itemid;
	if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
	$roomClassUid				= jomresGetParam( $_POST, 'roomClassUid', 0 );
	$room_class_abbv			= jomresGetParam( $_POST, 'room_class_abbv', "" );
	$room_class_full_desc		= jomresGetParam( $_POST, 'room_class_full_desc', "" );
	$srp_only					= jomresGetParam( $_POST, 'srp_only', 0 );
	
	$image						= jomresGetParam( $_POST, 'image', "" );
	if (empty($roomClassUid) )
		{
		$query="INSERT INTO #__jomres_room_classes (`room_class_abbv`,`room_class_full_desc`,`image`,`property_uid`,`srp_only` )VALUES ('$room_class_abbv','$room_class_full_desc','$image','0','".(int)$srp_only."')";
		if (doInsertSql($query,''))
			jomresRedirect( "index2.php?option=com_jomres&task=listGlobalroomTypes",_JOMRES_COM_MR_VRCT_ROOMTYPES_SAVE_INSERT);
		}
	else
		{
		$query="UPDATE #__jomres_room_classes SET `image`='$image',`room_class_abbv`='$room_class_abbv',`room_class_full_desc`='$room_class_full_desc',`srp_only`='".(int)$srp_only."' WHERE room_classes_uid='".(int)$roomClassUid."' AND property_uid = '0'";
		if (doInsertSql($query,''))
			jomresRedirect( "index2.php?option=com_jomres&task=listGlobalroomTypes",_JOMRES_COM_MR_VRCT_ROOMTYPES_SAVE_UPDATE);
		}
	}

/**
#
 * Deletes one or more global room types
#
 */
function deleteGlobalroomTypes()
	{
	global $mrConfig,$Itemid;
	if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
	$success=true;
	$idarray = jomresGetParam( $_POST, 'idarray', array() );
	if (count($idarray)>0)
		{
		foreach ($idarray as $id)
			{
			$saveMessage=_JOMRES_COM_MR_ROOMCLASS_DELETED;
			// First we need to check that the feature isn't recorded against any tariffs. If it is, we can't move forward
			$query="SELECT  roomclass_uid FROM #__jomres_rates WHERE roomclass_uid='".(int)$id."'";
			$rtList =doSelectSql($query);
			if (count($rtList)>0)
				{
				$success=false;
		 		echo _JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_TARIFFS." Room type id: ".$id."<br>";
				}
		 	else
		 		{
				$query="DELETE FROM #__jomres_room_classes  WHERE room_classes_uid='".(int)$id."'";
				doInsertSql($query,'');
				}
			}
		if ($success)
			jomresRedirect( "index2.php?option=com_jomres&task=listGlobalroomTypes",$saveMessage);
		}
	}

?>