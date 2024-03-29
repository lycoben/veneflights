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


//-----------------------------
//-A S S I G N  U S E R S  ----
//-----------------------------

/**
#
 * Lists profiles, performing assignation functionality where valid
#
 */
function listMosUsers()
	{
	global $jomresConfig_live_site;
	$query="SELECT id,name,username FROM #__users";
	$userList = doSelectSql($query);
	$userRowInfo="";
	$tickIcon	= '<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/Tick.png" border="0">';
	$crossIcon	= '<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/Cancel.png" border="0">';
	$editIcon	='<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/EditItem.png" border="0">';
	
	$img_guest=$jomresConfig_live_site."/components/com_jomres/images/Tourists.png";
	$img_reception=$jomresConfig_live_site."/components/com_jomres/images/Services.png";
	$img_manager=$jomresConfig_live_site."/components/com_jomres/images/User_Agent_Male.png";
	$img_superpropertymanager=$jomresConfig_live_site."/components/com_jomres/images/User_Ninja.png";
	
	$rows=array();
	$output=array();

	$output['INSTRUCTIONS']=_JOMRES_PROFILELIST_INSTRUCTIONS;
	$output['HLINKTEXT']=	_JOMRES_COM_MR_VRCT_ROOM_LINKTEXT;
	$output['HGRANTLINK']=	_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDHOTELUSER;
	$output['HACCESSLEVEL']=_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDACCESSLEVEL;
	$output['HUSERNAME']=_JOMRES_COM_MR_ASSIGNUSER_USERNAME;
	$output['HNUMBEROFPROPERTIES']='<img src="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/propertyTypes.png">';
	
	
	$output['KEY']='
	<img src = "'.$img_guest.'"  style="border:none;">'._JOMRES_COM_MR_EDITBOOKING_TAB_GUEST.'
	<img src = "'.$img_reception.'"  style="border:none;">'._JOMRES_COM_MR_ASSIGNUSER_LEVEL_RECEPTION.'
	<img src = "'.$img_manager.'"  style="border:none;">'._JOMRES_COM_MR_ASSIGNUSER_LEVEL_ADMIN.'
	<img src = "'.$img_superpropertymanager.'"  style="border:none;">'._JOMRES_COM_USERIS_SUPERPROPERTYMANAGER.'
	';
	
	$img_output_guest='<img src = "'.$img_guest.'"  style="border:none;">';
	$img_output_reception='<img src = "'.$img_reception.'"  style="border:none;">';
	$img_output_manager='<img src = "'.$img_manager.'"  style="border:none;">';
	$img_output_superpropertymanager='<img src = "'.$img_superpropertymanager.'"  style="border:none;">';
	
	$managers=array();
	$query="SELECT manager_uid,userid,currentproperty,access_level,pu FROM #__jomres_managers";
	$jomresUserList  = doSelectSql($query);
	foreach ($jomresUserList as $user)
		{
		$managers[$user->userid]=array('manager_uid'=>$user->manager_uid,'userid'=>$user->userid,'access_level'=>$user->access_level,'pu'=>$user->pu);
		}
	foreach($userList as $user)
		{
		$r=array();
		$accesslevel_img =$img_output_guest;
		$authorise="y";
		$authorise_img=$crossIcon;
		if (count($managers)>0 )
			{
			$access_level=0;
			if (array_key_exists($user->id,$managers) )
				{
				$authorise="n";
				$authorise_img=$tickIcon;
				foreach ($jomresUserList as $userdeets)
					{
					$access_level= $userdeets->access_level;
					$pu = $userdeets->pu;// Pu, flag that defines if a user is a super property manager.
					}
				if ($managers[$user->id]['access_level']=="1")
					$accesslevel_img =$img_output_reception;
				else
					$accesslevel_img =$img_output_manager;
					
				if ($managers[$user->id]['pu'] == "1")
					$accesslevel_img =$img_output_superpropertymanager;

				$query="SELECT property_uid FROM #__jomres_managers_propertys_xref WHERE manager_id = '".(int)$user->id."'";
				$propertyList= doSelectSql($query);
				$numberOfProperties=count($propertyList);
				}
 			}
		
		$r['ACCESSLEVELIMAGE']=$accesslevel_img;
		$r['GRANTLINK']='<a href="index2.php?option=com_jomres&task=grantMosUser&userid='.$user->id.'&grantAct='.$authorise.'&username='.($user->username).'">'.$authorise_img.'</a>';
		if ($access_level>0)
			$r['LINKTEXT']='<a href="index2.php?option=com_jomres&task=editProfile&id='.$user->id.'">'.$editIcon.'</a>';
		else
			$r['LINKTEXT']="&nbsp;";
		$r['USERNAME']=$user->username;
		$r['NUMBEROFPROPERTIES']=$numberOfProperties;
		$rows[]=$r;
		}

	$pageoutput[]=$output;
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
	$tmpl->readTemplatesFromInput( 'list_profiles.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}


function editProfile()
	{
	$userid = jomresGetParam( $_REQUEST, 'id', 0 );

	$yesno = array();
	$yesno[] = jomresHTML::makeOption( '0', _JOMRES_COM_MR_NO );
	$yesno[] = jomresHTML::makeOption( '1', _JOMRES_COM_MR_YES );
	
	$accessLevels = array();
	$accessLevels[] = jomresHTML::makeOption( '1', _JOMRES_COM_MR_ASSIGNUSER_LEVEL_RECEPTION );
	$accessLevels[] = jomresHTML::makeOption( '2', _JOMRES_COM_MR_ASSIGNUSER_LEVEL_ADMIN );
	
	$output['INSTRUCTIONS']=_JOMRES_PROFILEEDIT_INSTRUCTIONS;
	$output['HSUPERPROP']=_JOMRES_COM_USERIS_SUPERPROPERTYMANAGER;
	$output['HACCESSLEVEL']=_JOMRES_COM_MR_ASSIGNUSER_AUTHORISEDACCESSLEVEL;
	
	
	$query="SELECT access_level,pu FROM #__jomres_managers WHERE userid = ".$userid. " LIMIT 1";
	$managerDetails  = doSelectSql($query);
	foreach ($managerDetails as $m)
		{
		$accessLevel=$m->access_level;
		$superPropertyManager=$m->pu;
		}
	$superPropertyManagerOutput=jomresHTML::selectList( $yesno, 'superpropertymanager','class="inputbox" size="1"', 'value', 'text', $superPropertyManager);
	$accessLevelOutput=jomresHTML::selectList( $accessLevels, 'accesslevel','class="inputbox" size="1"', 'value', 'text', $accessLevel);
	$output['SUPERPROP']=$superPropertyManagerOutput;
	$output['ACCESSLEVEL']=$accessLevelOutput;
	$output['ID']=$userid;
	
	$query="SELECT manager_id,property_uid FROM #__jomres_managers_propertys_xref";
	$managersToPropertysList = doSelectSql($query);
	$managersToPropertysArray=array();
	foreach ($managersToPropertysList as $x)
		{
		$managersToPropertysArray[$x->property_uid][]=(int)$x->manager_id;
		}
	$query="SELECT property_uid FROM #__jomres_managers_propertys_xref  WHERE manager_id = '".(int)$userid."'";
	$managersToPropertyList = doSelectSql($query);
	$managersToPropertyArray=array();
	foreach ($managersToPropertyList as $x)
		{
		$managersToPropertyArray[]=(int)$x->property_uid;
		}
		
	$query="SELECT propertys_uid,property_name FROM #__jomres_propertys";
	$propertyList = doSelectSql($query);
	foreach ($propertyList as $property)
		{
		$propertyIdArray[]=$property->propertys_uid;
		$propertynameArray[]=$property->property_name;
		}
		
	$query="SELECT userid,username FROM #__jomres_managers";
	$managerList= doSelectSql($query);
	$managersArray=array();
	foreach ($managerList as $m)
		{
		$managersArray[$m->userid]=$m->username;
		}
	$n=count($propertyIdArray);
	for ($i = 0; $i < $n; $i++)
		{
		$r=array();
		$propertyManagers="";
		$managers=$managersToPropertysArray[$i];
		if (count($managers)>0)
			{
			foreach ($managers as $m)
				{
				$propertyManagers = $managersArray[$m].", ";
				}
			}
		$row="0";
		if ($i % 2)
			$row="1";
		$checked="";
		if (in_array($propertyIdArray[$i] ,$managersToPropertyArray) )
			$checked="checked";
		$r['INPUT']="<input type=\"checkbox\" name=\"chosenHotel[]\" value=\"".$propertyIdArray[$i]."\" ".$checked.">";
		$r['PROPERTYNAME']=$propertynameArray[$i];
		$r['MANAGERS']=$propertyManagers;
		$rows[]=$r;
		}

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/Save.png");
	$link = $jomresConfig_live_site."/".JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres";
	$jrtb .= $jrtbar->customToolbarItem('saveProfile',$link,_JOMRES_COM_MR_SAVE,$submitOnClick=true,$submitTask="saveProfile",$image);
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres&task=listMosUsers",'');
	$jrtb .= $jrtbar->endTable();
	$output['JOMRESTOOLBAR']=$jrtb;
	
	$pageoutput[]=$output;
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
	$tmpl->readTemplatesFromInput( 'edit_profile.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}
	
	
function saveProfile()
	{
	$userid 				= jomresGetParam( $_POST, 'userid', 0 );
	$superpropertymanager 	= jomresGetParam( $_POST, 'superpropertymanager', 0 );
	$accesslevel 			= jomresGetParam( $_POST, 'accesslevel', 0 );
	$chosenHotels 			= jomresGetParam( $_POST, 'chosenHotel', array() );
	if (count($chosenHotels)==0 && $superpropertymanager == 0)
		{
		echo "Error, you need to assign at least one property to this user";
		return;
		}
	updateManagerIdToPropertyXrefTable($userid,$chosenHotels);
	$acsLvlStr="";
	if ($accesslevel == 1)
		{
		$acsLvlStr=", pu='0'";
		$query = "UPDATE #__jomres_managers SET `access_level` = '$accesslevel' ".$acsLvlStr." WHERE userid = '".(int)$userid."'";
		}
	else
		{
		$acsLvlStr=", pu='".$superpropertymanager."'";
		$query = "UPDATE #__jomres_managers SET `access_level` = '$accesslevel' ".$acsLvlStr." WHERE userid = '".(int)$userid."'";
		}
	if (doInsertSql($query,'Changed access level to '.$accesslevel))
		{
		// If this is a super property manager, then we can grab all the property uids, return the first one and set the default property as that property uid. If we don't, the user will bomb out on login
		if ($superpropertymanager == 1)
			{
			$query="SELECT propertys_uid,property_name FROM #__jomres_propertys LIMIT 1";
			$property_uid = doSelectSql($query,1);
			$query="UPDATE #__jomres_managers SET `currentproperty`='$property_uid' WHERE userid = '".$userid."'";
			if (!doInsertSql($query,FALSE)) trigger_error ("Unable to set current property, mysql db failure", E_USER_ERROR);
			jomresRedirect( "index2.php?option=com_jomres&task=listMosUsers",_JOMRES_COM_MR_ASSIGNUSER_USERMODIFIEDMESAGE );
			}
		jomresRedirect( "index2.php?option=com_jomres&task=listMosUsers",_JOMRES_COM_MR_ASSIGNUSER_USERMODIFIEDMESAGE );
		}
		
	
	}

/**
#
 * Grants or removes a user's access to the system
#
 */
function grantMosUser()
	{
	$userid = jomresGetParam( $_GET, 'userid', '' );
	$grantAct = jomresGetParam( $_GET, 'grantAct', '' );
	
	$query="SELECT id,name,username FROM #__users";
	$userList = doSelectSql($query);
	foreach ($userList as $u)
		{
		if ($u->id == $userid)
			$username=$u->username;
		}
	$apikey=createNewAPIKey();
	if ($grantAct=="y")
		$query="INSERT INTO #__jomres_managers (`userid`,`username`,`property_uid`,`access_level`,`currentproperty`,`apikey`)VALUES ('".(int)$userid."','$username','-1','1','-1','$apikey')";
	else
		$query="DELETE FROM #__jomres_managers WHERE userid = '".(int)$userid."'";
	if (doInsertSql($query,'') )
		{
		if ($grantAct=="y")
			jomresRedirect( "index2.php?option=com_jomres&task=editProfile&id=".(int)$userid,_JOMRES_COM_MR_ASSIGNUSER_USERMODIFIEDMESAGE );
		else
			jomresRedirect( "index2.php?option=com_jomres&task=listMosUsers",_JOMRES_COM_MR_ASSIGNUSER_USERMODIFIEDMESAGE );
		}
	}

?>