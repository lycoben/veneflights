<?php
/**
#
 * Mini-component core file: Constructs and displays audit data
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
 * Constructs and displays audit data
 #
* @package Jomres
#
 */
class j02250showaudit {
	/**
	#
	 * Constructor: Constructs and displays audit data
	#
	 */
	function j02250showaudit()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig,$jomresConfig_live_site,$dates,$owner,$operations,$Itemid;
		$rows=array();
		$query="";
		$dates		=	jomresGetParam( $_REQUEST, 'auditdates', "%" );
		$owner		=	jomresGetParam( $_REQUEST, 'owner', "%" );
		$operations	=	jomresGetParam( $_REQUEST, 'operations', "%" );


		$dateArray=array();
		$userArray=array();
		$operationArray=array();

		$defaultProperty=getDefaultProperty();
		$showSQLdata=TRUE;
		if ($dates!="%")
			{
			$thedate=str_replace("/","-",$dates);
			$query="SELECT date,time,owner,op,";
			if ($showSQLdata)
				$query.="args,";
			$query.="property_uid FROM #__jomres_audit WHERE date = '$thedate' and property_uid = ".(int)$defaultProperty." ORDER BY `date` ASC ,`time` DESC";
			}

		if ($owner!="%")
			{
			if ($owner!="%")
				{
				if ($owner==_JOMRES_MR_AUDIT_UNKNOWNUSER)
					$userid = '0';
				else
					{
					// First let's get their real username
					$ownerArray=explode("(",$owner);
					$ownerArray2=explode(")",$ownerArray[1]);
					$username=$ownerArray2[0];
					// Now we need to scan the mos_users tables for this user's userid
					$query="SELECT id FROM #__users WHERE username = '$username'";
					$userList=doSelectSql($query);
					foreach ($userList as $user)
						{
						$userid = $user->id;
						}
					}
				}
			else
				$userid="%";
			$query="SELECT date,time,owner,op,";
			if ($showSQLdata)
				$query.="args,";
			$query.="property_uid FROM #__jomres_audit WHERE owner = ".(int)$userid." AND property_uid = ".(int)$defaultProperty."  ORDER BY `date` DESC,`time` DESC";
			}
		if ($operations!="%")
			{
			$query="SELECT date,time,owner,op,";
			if ($showSQLdata)
				$query.="args,";
			$query.="property_uid FROM #__jomres_audit WHERE op = '$operations' and property_uid = ".(int)$defaultProperty."  ORDER BY `date` DESC,`time` DESC";
			}
		if ($query=="")
			{
			$query="SELECT date,time,owner,op,";
			if ($showSQLdata)
				$query.="args,";
			$query.="property_uid FROM #__jomres_audit WHERE property_uid = ".(int)$defaultProperty." ORDER BY `date` DESC,`time` DESC";
			}
		$auditList=doSelectSql($query);
		$output['HDATE']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_DATE',_JOMRES_MR_AUDIT_LISTING_DATE);
		$output['HTIME']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_TIME',_JOMRES_MR_AUDIT_LISTING_TIME);
		$output['HUSER']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_USER',_JOMRES_MR_AUDIT_LISTING_USER);
		$output['HOPERATION']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_OPERATION',_JOMRES_MR_AUDIT_LISTING_OPERATION);
		$output['HVIEWSQL']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_VIEWSQL',_JOMRES_MR_AUDIT_LISTING_VIEWSQL);
		$output['COUNTER']= count($auditList);
		foreach ($auditList as $activity)
			{
			$username=$activity->owner;
			$query="SELECT name,username FROM #__users WHERE id = '".(int)$activity->owner."'";

			$userList =doSelectSql($query);
			if (count($userList)>0)
				{
				foreach ($userList as $user)
					{
					$rw['USER']=$user->name." (".$user->username.") ";
					}
				}
			else
				$rw['USER']=jr_gettext('_JOMRES_MR_AUDIT_UNKNOWNUSER',_JOMRES_MR_AUDIT_UNKNOWNUSER,FALSE);
			$thedate=str_replace("-","/",($activity->date));
			$rw['THEDATE']=outputDate($thedate);
			$rw['THETIME']=$activity->time;
			$rw['OPERATION']=$activity->op;

			$rw['VIEWSQL']='<A href="javascript: alert(\''.htmlentities($activity->args).'\')">'.jr_gettext('_JOMRES_MR_AUDIT_LISTING_VIEWSQL',_JOMRES_MR_AUDIT_LISTING_VIEWSQL,FALSE).'</A>';
			$rows[]=$rw;
			$dateArray[]=$thedate;
			$userArray[]=$rw['USER'];
			$operationArray[]=$activity->op;
			}

		$dates=array_unique($dateArray);
		asort($dates);
		$dateDropdown=filterForm('auditdates',$dates,"date","showAuditTrail");

		$usernames=array_unique($userArray);
		asort($usernames);
		$usernameDropdown=filterForm('owner',$usernames,"","showAuditTrail");

		$operations=array_unique($operationArray);
		asort($operations);
		$operationDropdown=filterForm('operations',$operations,"","showAuditTrail");

		$output['HDATEFILTER']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_DATE',_JOMRES_MR_AUDIT_LISTING_FILTER_DATE);
		$output['HUSERFILTER']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_USERNAME',_JOMRES_MR_AUDIT_LISTING_FILTER_USERNAME);
		$output['HOPERATIONFILTER']=jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_OPERATION',_JOMRES_MR_AUDIT_LISTING_FILTER_OPERATION);
		$output['DATEFILTER']=$dateDropdown;
		$output['USERFILTER']=$usernameDropdown;
		$output['OPERATIONFILTER']=$operationDropdown;

		$output['PAGETITLE']=jr_gettext('_JOMRES_COM_A_AUDITING_SHOWING',_JOMRES_COM_A_AUDITING_SHOWING);
		$output['ITEMID']=$Itemid;

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('archive',jomresURL("index.php?option=com_jomres&task=archiveAudit".jomresURLToken()."&Itemid=$Itemid&no_html=1"),'');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&Itemid=$Itemid"),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'audit_trail.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_UNKNOWNUSER',_JOMRES_MR_AUDIT_UNKNOWNUSER);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_DATE',_JOMRES_MR_AUDIT_LISTING_FILTER_DATE);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_USERNAME',_JOMRES_MR_AUDIT_LISTING_FILTER_USERNAME);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_FILTER_OPERATION',_JOMRES_MR_AUDIT_LISTING_FILTER_OPERATION);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_DATE',_JOMRES_MR_AUDIT_LISTING_DATE);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_TIME',_JOMRES_MR_AUDIT_LISTING_TIME);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_USER',_JOMRES_MR_AUDIT_LISTING_USER);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_OPERATION',_JOMRES_MR_AUDIT_LISTING_OPERATION);
		$output[]		= jr_gettext('_JOMRES_MR_AUDIT_LISTING_VIEWSQL',_JOMRES_MR_AUDIT_LISTING_VIEWSQL);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN',_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN);

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
