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

class j16000savecrates
	{
	function j16000savecrates()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$crates 				= jomresGetParam( $_POST, 'crates',array() );
		$tmpCrates=array();
		foreach ($_POST['crates'] as $k=>$v)
			{
			$key=intval($k);
			$value=intval($v);
			$tmpCrates[$key]=$value;
			}

		//var_dump($tmpCrates);exit;
		$crates=$tmpCrates;
		$propertyFunctions		= new jrportal_property_functions();
		$portalPropertyList		= $propertyFunctions->getAllPortalProperties();
		$portalPropertyIds		= array();
		foreach ($portalPropertyList as $p)
			{
			$portalPropertyIds[]=$p['property_id'];
			}
		$tr= new jrportal_transaction();
		foreach ($crates as $k=>$v)
			{
			$crate_id=$v;
			$property = new jrportal_property();
			if (!in_array($k,$portalPropertyIds) )
				{
				$property->property_id=$k;
				$property->crate_id=$v;
				$property->commitNewProperty(&$tr);
				}
			else
				{
				$property->getProperty();
				$property->property_id=$k;
				$property->crate_id=$v;
				$property->commitUpdatePropertyByPropertyid(&$tr);
				}
			}
		$result=$tr->commit($tr);
		if ($result)
			jomresRedirect("index2.php?option=com_jomres&task=listproperties", '');
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}