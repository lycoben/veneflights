<?php
/**
#
 * JRPortal core file
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
	
class jrportal_property
	{
	function jrportal_property()
		{
		$this->id					= 0;
		$this->property_id			= 0;
		$this->crate_id				= 0;
		//$this->property_name		= '';
		$this->property_address		= '';
		$this->property_managers	= array();

		$this->propertys_uid		= 0;
		$this->property_name		= '';
		$this->property_street		= '';
		$this->property_town		= '';
		$this->property_region		= '';
		$this->property_country		= '';
		$this->property_postcode	= '';
		$this->property_tel			= '';
		$this->property_fax			= '';
		$this->property_email		= '';
		$this->property_features	= '';
		$this->property_mappinglink	= '';
		$this->property_description	= '';
		$this->property_checkin_times			= '';
		$this->property_area_activities			= '';
		$this->property_driving_directions		= '';
		$this->property_airports				= '';
		$this->property_othertransport			= '';
		$this->property_policies_disclaimers	= '';
		$this->published						= 0;

		$this->error				= null;
		}
		
	function getProperty()
		{
		if ($this->id > 0 )
			{			
			$query = "SELECT 
				`id`,`property_id`,`crate_id`
				FROM #__jomresportal_properties_crates_xref WHERE `id`='$this->id' LIMIT 1";
				
			$result=doSelectSql($query);
			//var_dump($result);exit;
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->id					= $r->id;
					$this->property_id			= $r->property_id; 
					$this->crate_id				= $r->crate_id; 
					}
				return true;
				}
			else
				{
				if (count($result)==0)
					{
					$this->error = "No Properties were found with that id";
					return false;
					}
				if (count($result)> 1)
					{
					$this->error = "More than one Property was found with that id";
					return false;
					}
				}
			}			
		else
			{
			$this->error = "ID of Property not available";
			return false;
			}
		}	
	
	function commitNewProperty(&$tr)
		{
		if ($this->id < 1 )
			{
			$query="INSERT INTO #__jomresportal_properties_crates_xref 
				(
				`property_id`,
				`crate_id`
				)
				VALUES
				(
				'$this->property_id',
				'$this->crate_id'
				)";
				//echo $query;exit;
			$tr->insertQuery($query);
			if ($tr->success)
				{
				$this->id=$tr->insertedId;
				return true;
				}
			else
				{
				$this->error = "ID of Property could not be found after apparent successful insert";
				return false;
				}
			}
		$this->error = "ID of Property already available. Are you sure you are creating a new Property?";
		return false;
		}

	function commitUpdateProperty(&$tr)
		{
		if ($this->id > 0 )
			{
			
			$query="UPDATE #__jomresportal_properties_crates_xref SET 
				`property_id` 			= '$this->property_id',
				`crate_id` 				= '$this->crate_id'
				WHERE `id`='$this->id'";
			return $tr->insertQuery($query);
			}
			
		$this->error = "ID of Property not available";	
		return false;
		}
	function commitUpdatePropertyByPropertyid(&$tr)
		{
		if ($this->property_id > 0 )
			{
			$query="UPDATE #__jomresportal_properties_crates_xref SET 
				`crate_id` 				= '$this->crate_id'
				WHERE `property_id` 	= '$this->property_id'";
			return $tr->insertQuery($query);
			}
			
		$this->error = "ID of Property not available";	
		return false;
		}

	/*
	function getJomresPropertyDetails($property_uid)
		{
		$query="SELECT propertys_uid,property_name,property_street,property_town,property_region,property_country,property_postcode,
			property_tel,property_fax,property_email,property_features,property_mappinglink,
			property_description,property_checkin_times,property_area_activities,
			property_driving_directions, property_airports,property_othertransport,property_policies_disclaimers,published
		FROM #__jomres_propertys WHERE propertys_uid = '".$property_uid."' LIMIT 1";
		$result=doSelectSql($query);
		if ($this->id > 0 )
			{			
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->propertys_uid		=$r->propertys_uid ;
					$this->property_name		=$r->property_name ;
					$this->property_street		=$r->property_street ;
					$this->property_town		=$r->property_town ;
					$this->property_region		=$r->property_region ;
					$this->property_country		=$r->property_country ;
					$this->property_postcode	=$r->property_postcode ;
					$this->property_tel			=$r->property_tel ;
					$this->property_fax			=$r->property_fax ;
					$this->property_email		=$r->property_email ;
					$this->property_features	=$r->property_features ;
					$this->property_mappinglink	=$r->property_mappinglink ;
					$this->property_description	=$r->property_description ;
					$this->property_checkin_times			=$r->property_checkin_times ;
					$this->property_area_activities			=$r->property_area_activities ;
					$this->property_driving_directions		=$r->property_driving_directions ;
					$this->property_airports				=$r->property_airports ;
					$this->property_othertransport			=$r->property_othertransport ;
					$this->property_policies_disclaimers	=$r->property_policies_disclaimers ;
					$this->published						=$r->published ;
					}
				return true;
				}
			else
				{
				if (count($result)==0)
					{
					$this->error = "No Properties were found with that id";
					return false;
					}
				}
			}
		}
	*/
	}

?>