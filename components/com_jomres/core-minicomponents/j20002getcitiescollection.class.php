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
* @copyright	2005-2007 Vince Wooll
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

class j20002getcitiescollection
	{
	function j20002getcitiescollection()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->retval= array("centric"=>"manager","command"=>"getcitiescollection");
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retval;
		}
	}
	

function addbooking($bookingin)
	{
	$query="SELECT property_name FROM #__jomres_propertys WHERE propertys_uid = 1001 LIMIT 1";
	$propertyList = doSelectSql($query);
	if (count($propertyList) > 0) 
		{
		$user		=	$bookingin['user'];
		$password	=	$bookingin['password'];
		$property	=	$bookingin['property'];
		$startdate	=	$bookingin['startdate'];
		$enddate	=	$bookingin['enddate'];
		$status		=	1;
		$reference	=	11111111;
		}
	else
		{
		$user		=	$bookingin['user'];
		$password	=	$bookingin['password'];
		$property	=	$bookingin['property'];
		$startdate	=	$bookingin['startdate'];
		$enddate	=	$bookingin['enddate'];
		$status		=	0;
		$reference	=	0;
		}
		
	return array (
		'user'			=> $user,
		'password'		=> $password,
		'property'		=> $property,
		'startdate'		=> $startdate,
		'enddate'		=> $enddate,
		'status'		=> $status,
		'reference'		=> $reference
		);
	}


?>