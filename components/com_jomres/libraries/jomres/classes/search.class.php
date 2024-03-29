<?php
/**
#
 * Search class and supporting functions
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

#
/**
#
 * Search class and supporting functions
 #
* @package Jomres
 */
class jomSearch {
	/**
	#
	 * Constructs the search object
	#
	 */
	function jomSearch($calledByModule)
		{
		//var_dump($searchOptions);
		global $jrConfig,$searchAll;
		$this->formname="";
		$this->searchAll=$searchAll;
		$jrConfig=getSiteSettings();
		if (empty($jrConfig['randomsearchlimit']) )
			$jrConfig['randomsearchlimit']=2;
		$randomsearchlimit 	= $jrConfig['randomsearchlimit'];
		$this->filter=array('propertyname'=>"",'country'=>"",'region'=>"",'town'=>"",'description'=>"",'feature_uids'=>"",'arrival'=>"",'departure'=>"",'ptype'=>"",'room_type'=>"");
		$this->makeFormName();

		if (!isset($calledByModule) || empty($calledByModule) )
			$calledByModule=jomresGetParam( $_REQUEST, 'calledByModule',"" );
		if (!empty($calledByModule) )
			{
			$calledByModule=mysql_real_escape_string($calledByModule);
			$this->calledByModule=$calledByModule;
			if (defined('_JOMRES_NEWJOOMLA'))
				$this->templateFilePath=JOMRESCONFIG_ABSOLUTE_PATH.'/modules/'.$calledByModule.'/'.$calledByModule.'/';
			else
				$this->templateFilePath=JOMRESCONFIG_ABSOLUTE_PATH.'/modules/'.$calledByModule.'/';
			if (strlen($calledByModule)>0 )
				{
				$query="SELECT params FROM #__modules WHERE module = '$calledByModule'";
				$p=doSelectSql($query,1);
				}
			if (defined('_JOMRES_NEWJOOMLA'))
				{
				$vals=array();
				$arr=explode("\n",$p);
				foreach ($arr as $str)
					{
					$dat=explode("=",$str);
					$key = $dat[0];
					$val = $dat[1];
					if (strlen($key)>0)
						$vals[$key]=$val;
					}
				$moduleclass_sfx 	= $vals['moduleclass_sfx'];
				//$useoverlibLabels 	= $params->get( 'useoverlibLabels',0 );
				$useCols 			= $vals['useCols'];
				$featurecols 		= $vals['featurecols'];

				$geosearchtype 		= $vals['geosearchtype'];
				$pn					= $vals['propertyname'];
				$ptype 				= $vals['ptype'];
				$room_type 			= $vals['room_type'];
				$features 			= $vals['features'];
				$description 		= $vals['description'];
				$availability 		= $vals['availability'];

				$geosearch_dropdown 	= $vals['geosearch_dropdown'];
				$propertyname_dropdown 	= $vals['propertyname_dropdown'];
				$ptype_dropdown 		= $vals['ptype_dropdown'];
				$room_type_dropdown 	= $vals['room_type_dropdown'];
				$features_dropdown 		= $vals['features_dropdown'];
				
				$priceranges			= $vals['priceranges'];
				$pricerange_increments	= $vals['pricerange_increments'];
				$selectcombo			= $vals['selectcombo'];
				}
			else
				{
				$params = new mosParameters( $p );

				$moduleclass_sfx 	= $params->get( 'moduleclass_sfx','' );
				//$useoverlibLabels 	= $params->get( 'useoverlibLabels',0 );
				$useCols 			= $params->get( 'useCols',0 );
				$featurecols 		= $params->get( 'featurecols',10 );

				$geosearchtype 		= $params->get( 'geosearchtype','' );
				$pn					= $params->get( 'propertyname',0 );
				$ptype 				= $params->get( 'ptype',0 );
				$room_type 			= $params->get( 'room_type',0 );
				$features 			= $params->get( 'features',0 );
				$description 		= $params->get( 'description',0 );
				$availability 		= $params->get( 'availability',0 );

				$geosearch_dropdown 	= $params->get( 'geosearch_dropdown',1 );
				$propertyname_dropdown 	= $params->get( 'propertyname_dropdown',1 );
				$ptype_dropdown 		= $params->get( 'ptype_dropdown',1 );
				$room_type_dropdown 	= $params->get( 'room_type_dropdown',1 );
				$features_dropdown 		= $params->get( 'features_dropdown',1);
				
				$priceranges 			= $params->get( 'priceranges',0 );
				$pricerange_increments	= $params->get( 'pricerange_increments',0 );
				
				$selectcombo 			= $params->get( 'selectcombo',0 );
				}
			}
		$option=jomresGetParam( $_REQUEST, 'option',"" );
		if ($option!="com_jomres" && !JOMRES_OVERLIB_CALLED)
			{
			define("JOMRES_OVERLIB_CALLED",true);
			mosCommonHTML::loadOverlib();
			}
		$this->featurecols=$featurecols;
		$this->cols=$useCols;
		//$this->overlibLables=$useoverlibLabels;
		$this->randomSearchLimit=$randomsearchlimit;
		$searchOptions=array();
		if ($pn)
			$searchOptions[]="propertyname";
		if ($ptype)
			$searchOptions[]="ptype";
		if ($room_type)
			$searchOptions[]="room_type";
		if ($features)
			$searchOptions[]="feature_uids";
		if ($description)
			$searchOptions[]="description";
		if ($geosearchtype)
			$searchOptions[]=$geosearchtype;
		if ($availability)
			$searchOptions[]="availability";
		if ($priceranges)
			$searchOptions[]="priceranges";
			
		if ($selectcombo)
			{
			$searchOptions[]="selectcombo";
			$searchOptions[]="country";
			$searchOptions[]="region";
			$searchOptions[]="town";
			}

		$searchOutput=array('propertyname'=>"dropdown",'country'=>"dropdown",'region'=>"dropdown",'town'=>"dropdown",'feature_uids'=>"dropdown",'ptype'=>"dropdown",'room_type'=>"dropdown");
		if (!$geosearch_dropdown)
			{
			$searchOutput['country']="";
			$searchOutput['region']="";
			$searchOutput['town']="";
			}
		if (!$propertyname_dropdown)
			{
			$searchOutput['propertyname']="";
			}
		if (!$ptype_dropdown)
			{
			$searchOutput['ptype']="";
			}
		if (!$room_type_dropdown)
			{
			$searchOutput['room_type']="";
			}
		if (!$features_dropdown)
			{
			$searchOutput['feature_uids']="";
			}

		$query="SELECT propertys_uid FROM #__jomres_propertys WHERE published = '1'";
		$this->searchOptions=$searchOptions;
		$this->searchOutput=$searchOutput;
		$allPuids = doSelectSql($query);
		foreach ($allPuids as $puid)
			{
			$tmpArray[]=$puid->propertys_uid;
			}
		$this->propertys_uid[]=$tmpArray;
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("propertyname",$this->searchOptions) )
			{
			$query = "SELECT propertys_uid,property_name FROM  #__jomres_propertys WHERE published = '1' ORDER BY  property_name ASC";
			$propertynameList=doSelectSql($query);

			foreach ($propertynameList as $property)
				{
				$this->prep['propertyname'][]=array('pn'=>stripslashes($property->property_name),'puid'=>$property->propertys_uid);

				}
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("country",$this->searchOptions) )
			{
			$allCountries=countryCodesArray();
			$query = "SELECT property_country FROM  #__jomres_propertys WHERE published = '1' ORDER BY  property_country ASC";
			$activeCountriesList=doSelectSql($query);
			$tmpCountryArray=array();

			$this->prep['country'][]=array('countrycode'=>$this->searchAll,'countryname'=>$this->searchAll);
			$tmpCountryArray[]=$this->searchAll;

			foreach ($activeCountriesList as $country)
				{
				if (!in_array($country->property_country,$tmpCountryArray) )
					{
					$this->prep['country'][]=array('countrycode'=>$country->property_country,'countryname'=>$allCountries[$country->property_country]);
					$tmpCountryArray[]=$country->property_country;
					}
				}
			}
		if (in_array("region",$this->searchOptions) )
			{
			$query = "SELECT property_region,property_country FROM #__jomres_propertys WHERE published = '1' ORDER BY property_region ASC";
			$activeRegionsList=doSelectSql($query);
			$tmpRegionArray=array();

			$this->prep['region'][]=array('region'=>$this->searchAll);
			$tmpRegionArray[]=$this->searchAll;

			foreach ($activeRegionsList as $region)
				{
				if (!in_array($region->property_region,$tmpRegionArray) )
					{
					$this->prep['region'][]=array('region'=>$region->property_region);
					$tmpRegionArray[]=$region->property_region;
					}
				}
			}
		if (in_array("town",$this->searchOptions) )
			{
			//$result=prepGeographicSearch();
			$query = "SELECT property_region,property_country,property_town FROM #__jomres_propertys WHERE published = '1' ORDER BY property_town ASC";
			$activeTownList=doSelectSql($query);
			$tmpTownArray=array();

			$this->prep['town'][]=array('town'=>$this->searchAll);
			$town=$this->searchAll;$rname=$this->searchAll;$cname=$this->searchAll;
			$tmpRegionArray[]=$this->searchAll;
			foreach ($activeTownList as $town)
				{
				$t=stripslashes($town->property_town);
				if (!empty($town))
					$this->prep['town'][$t]=array('town'=>stripslashes($town->property_town));
				}
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		// Currently returns an empty array
		if (in_array("description",$this->searchOptions) ) {
			$result=prepDescriptiveSearch();
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("availability",$searchOptions) )
			{
			$result=prepAvailabilitySearch();
			$this->prep['arrival']=$result['arrival'];
			$this->prep['departure']=$result['departure'];
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("feature_uids",$this->searchOptions) )
			{
			$result=prepFeatureSearch();
			if ($result && count($result) > 0)
				{
				foreach ($result as $feature)
					{
					if (!empty($feature['id']) && !empty($feature['title']) )
						$this->prep['features'][]=array('id'=>$feature['id'],'image'=>$feature['image'],'title'=>$feature['title'],'description'=>$feature['description']);
					}
				}
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("room_type",$this->searchOptions) )
			{
			$result=prepRoomtypeSearch();

			if ( $result && count($result) > 0)
				{
				foreach ($result as $rtype)
					{
					if (!empty($rtype['id']) && !empty($rtype['title']) )
						$this->prep['rtypes'][]=array('id'=>$rtype['id'],'image'=>$rtype['image'],'title'=>$rtype['title'],'description'=>$rtype['description']);
					}
				}
			}
		// -------------------------------------------------------------------------------------------------------------------------------------------
		if (in_array("ptype",$this->searchOptions) )
			{
			$result=prepPropertyTypeSearch();
			if ( $result && count($result)>0)
				{
				foreach ($result as $ptype)
					{
					$this->prep['ptypes'][]=array('id'=>$ptype['id'] ,'ptype'=>$ptype['ptype']);
					//if (!empty($ptype['id']) && !empty($ptype['ptype']) )
						//$this->prep['ptypes'][]=array('id'=>$ptype['id'] ,'ptype'=>$ptype['ptype'],'number'=>$ptype['number']);
					}
				}
			}
			
		if (in_array("priceranges",$this->searchOptions) )
			{
			$result=prepPriceRangeSearch($pricerange_increments);
			if ( $result && count($result)>0)
				{
				foreach ($result as $r)
					{
					$this->prep['priceranges'][]=$r;
					}
				}
			}			
		}

	/**
	#
	 * Triggers the list_propertys mini-component
	#
	 */
	function jomSearch_showresults()
		{
		global $MiniComponents;
		$tmpResultsArray=end($this->propertys_uid);
		$componentArgs=array();
		$componentArgs['propertys_uid']=$tmpResultsArray;
		$MiniComponents->triggerEvent('01010',$componentArgs); // listPropertys
		//listPropertys($tmpResultsArray);
		}

	/**
	#
	 * Performs a sorts the search results
	#
	 */
	function sortResult()
		{
		$tmpArray=array();
		if (count($this->resultBucket)>0)
			{
			foreach ($this->resultBucket as $result)
				{
				$tmpArray[]=$result->propertys_uid;
				}
			}
		if (count($tmpArray) >1 )
			$tmpArray=array_unique($tmpArray);
		$this->propertys_uid[]=$tmpArray;
		}

	/**
	#
	 * Performs a random search
	#
	 */
	function jomSearch_random()
		{
		$query="SELECT propertys_uid FROM #__jomres_propertys WHERE published='1' ORDER BY RAND(),property_name LIMIT ".(int)$this->randomSearchLimit." ";
		$this->resultBucket=doSelectSql($query);
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on country
	#
	 */
	function jomSearch_country()
		{
		$filter=$this->filter['country'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE property_country LIKE '$filter' $property_ors AND published='1' ORDER BY property_name";
			$this->resultBucket=doSelectSql($query);
			}
		else
			$this->resultBucket=array();
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on region
	#
	 */
	function jomSearch_region()
		{
		$filter=$this->filter['region'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($this->filter['region']) && $property_ors )
			{
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE property_region LIKE '".$this->filter['region']."' $property_ors AND published='1' ORDER BY property_name ";
			$this->resultBucket=doSelectSql($query);
			}
		else
			$this->resultBucket=array();
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on city
	#
	 */
	function jomSearch_town()
		{
		$filter=$this->filter['town'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE property_town LIKE '$filter' $property_ors AND published='1' ORDER BY property_name";
			$this->resultBucket=doSelectSql($query);
			}
		else
			$this->resultBucket=array();
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on text
	#
	 */
	function jomSearch_description()
		{
		$filter=$this->filter['description'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$keywords= mysql_real_escape_string($filter);
			$words = explode( ' ', $keywords );
			$wheres = array();
			foreach ($words as $word)
				{
				$wheres2 = array();
				$wheres2[] = "LOWER(property_name) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_street) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_town) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_postcode) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_description) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_checkin_times) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_area_activities) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_driving_directions) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_airports) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_othertransport) LIKE '%$word%'";
				$wheres2[] = "LOWER(property_policies_disclaimers) LIKE '%$word%'";
				$wheres[] = implode( ' OR ', $wheres2 );
				}
			$where = '(' . implode( ($phrase == 'all' ? ') AND (' : ') OR ('), $wheres ) . ')';
			$query="SELECT propertys_uid FROM #__jomres_propertys ";
			$query.=" WHERE ( $where ) ";
			$query.=" $property_ors AND published = '1' ";
			$this->resultBucket=doSelectSql($query);
			}
		else
			$this->resultBucket=array();
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on property features
	#
	 */
	function jomSearch_features()
		{
		$filter=$this->filter['feature_uids'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$ids	=	$filter;
			if (!empty($ids) && count($ids)>0)
				{
				$st="";
				foreach ($ids as $id)
					{
					$st.="'%,".$id.",%' AND property_features LIKE ";
					}
				$st=substr($st,0,-28);
				}
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE property_features LIKE $st  $property_ors AND published = '1'";
			$this->resultBucket=doSelectSql($query);
			}
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on room types
	#
	 */
	function jomSearch_roomtypes()
		{
		$filter=$this->filter['room_type'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$query="SELECT propertys_uid FROM #__jomres_rooms WHERE  room_classes_uid LIKE '$filter'  $property_ors ";
			$this->resultBucket=doSelectSql($query);
			}
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on property types
	#
	 */
	function jomSearch_ptypes()
		{
		$filter=$this->filter['ptype'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE ptype_id LIKE '$filter'  $property_ors AND published = '1'";
			$this->resultBucket=doSelectSql($query);
			}
		$this->sortResult();
		}

	/**
	#
	 * Performs a search based on price ranges
	#
	 */
	function jomSearch_priceranges()
		{
		$filter=$this->filter['priceranges'];
		$this->makeOrs();
		$property_ors=$this->ors;
		if(!empty($filter) && $property_ors )
			{
			$property_ors = str_replace("propertys_uid","property_uid",$property_ors);
			if (is_array($filter) )
				$query="SELECT property_uid FROM #__jomres_rates WHERE roomrateperday >= ".$filter['from']." AND roomrateperday <= ".$filter['to']."  $property_ors ";
			else
				$query="SELECT property_uid FROM #__jomres_rates WHERE roomrateperday LIKE '%' $property_ors ";
			$result=doSelectSql($query);
			// We need to create a new result array with classes called propertys_uid in, cos that's what resultBucket needs. Annoying fiddly stuff because we've not consistently named the property uids column in various tables, but there you have it. It's not going to change now.
			$res=array();
			foreach ($result as $r)
				{
				$resultObj = new stdClass;
				$resultObj->propertys_uid = $r->property_uid;
				if (!in_array($resultObj,$res))
					$res[]=$resultObj;
				}
			$this->resultBucket=$res;
			//var_dump($this->resultBucket);exit;
			}
		$this->sortResult();
		}
		
	/**
	#
	 * Performs a search based on availability
	#
	 */
	function jomSearch_availability()
		{
		$arrivalDate=$this->filter['arrival'];
		$departureDate=$this->filter['departure'];
		if ($arrivalDate != "" && $departureDate !="")
			{
			$stayDays=dateDiff("d",$arrivalDate,$departureDate);
			$dateRangeArray=array();
			$date_elements  = explode("/",$arrivalDate);
			$unixCurrentDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
			$secondsInDay = 86400;
			$currentUnixDay=$unixCurrentDate;
			$currentDay=$arrivalDate;
			for ($i=0, $n=$stayDays; $i < $n; $i++)
				{
				$currentDay=date("Y/m/d",$unixCurrentDate);
				$dateRangeArray[]=$currentDay;
				//echo $currentDay;
				$unixCurrentDate=$unixCurrentDate+$secondsInDay;
				}
			$st="";
			foreach ($dateRangeArray as $eachdate)
				{
				$st.="date = '".$eachdate."' OR ";
				}
			$st=substr($st,0,-3);
			$propertiesWithFreeRoomsArray=array();

			foreach (end($this->propertys_uid) as $property)
				{
				$propertyHasFreeRooms=FALSE;
				// Then we find their rooms
				$query="SELECT room_uid,room_classes_uid FROM #__jomres_rooms WHERE propertys_uid = '".(int)$property."'";
				$roomsList=doSelectSql($query);
				foreach ($roomsList as $room)
					{
					$ok=true;
					if ($_REQUEST['room_type'] != $this->searchAll)
						{
						if (!empty($_REQUEST['room_type'] ) && $room->room_classes_uid != $this->filter['room_type'])
							$ok=false;
						}
					if ($ok)
						{
						// Then we see if each room is free on the date(s) in the date range array
						$query="SELECT room_uid FROM #__jomres_room_bookings WHERE room_uid = '".(int)$room->room_uid."' AND property_uid ='".(int)$property."'  AND (".$st.")";
						$datesList=doSelectSql($query);
						if (count($datesList)==0)
							$propertyHasFreeRooms=TRUE;
						}
					}
				if ($propertyHasFreeRooms)
					$propertiesWithFreeRoomsArray[]=$property;
				}
			if (count($propertiesWithFreeRoomsArray)>0)
				{
				if (count($propertiesWithFreeRoomsArray) >1 )
					$propertiesWithFreeRoomsArray=array_unique($propertiesWithFreeRoomsArray);
				$this->propertys_uid[]=$propertiesWithFreeRoomsArray;
				}
			else
				$this->propertys_uid[]=array();
			}
		else
			$this->propertys_uid[]=array();
		}

	/**
	#
	 * Constructs a set of ORs to be used in queries based on the last array of property uids in the propertys_uid array
	#
	 */
	function makeOrs()
		{
		$property_uids=end($this->propertys_uid);
		if (!empty($property_uids) )
			{
			$st=" AND (";
			foreach ($property_uids as $property)
				{
				$st.="propertys_uid = '".(int)$property."' OR ";
				}
			$st=substr($st,0,-3);
			$this->ors=$st.") ";
			}
		else
			$this->ors=false;
		}

	/**
	#
	 * Makes a random name for the availability search.
	 * We need to give the form a random name otherwise the availability search will not work, as it the same form generation function is used in multiple places
	#
	 */
	function makeFormName()
		{
		// We need to give the form a random name otherwise the availability search will not work
		list($usec,$sec)=explode(" ",microtime());
		mt_srand($sec * $usec);
		$possible='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefhijklmnopqrstuvwxyz';
		for ($i=0; $i<10; $i++)
			{
			$key=mt_rand(0, strlen($possible)-1);
			$this->formname.=$possible[$key];
			}
		}
	} // End class jomSearch


/**
#
 * Performs a random search, results limited to 10
#
 */
// Depreciated ??
function dorandomSearch()
	{
	$query="SELECT propertys_uid FROM #__jomres_propertys WHERE published = '1' ORDER BY RAND() LIMIT 10";
	$propertysList=doSelectSql($query);
	listPropertys($propertysList);
	}

/**
#
 * Performs a search
#
 */
// Depreciated ??
function doSearch()
	{
	$result=createQuery();
	if ($result)
		listPropertys($result);
	else
		echo _JOMRES_FRONT_NORESULTS;
	}

/**
#
 * Prepares data for geographic searching. To save queries this is done once by getting data for all properties, then seperating the data into various arrays, which are then parsed by methods in the search class
#
 */
function prepGeographicSearch()
	{
	// Prepares the geographic data required for a search
	$allCountries=countryCodesArray();
	$query = "SELECT property_postcode,property_region,property_country,property_town FROM #__jomres_propertys WHERE published = '1' ORDER BY property_country,property_region,property_town desc ";
	$propertyLocations=doSelectSql($query);
	$allPropertyLocations=array();
	foreach ($propertyLocations as $location)
		{
		$r=array();
		$r['postcode']=$location->property_postcode;
		$r['region']=$location->property_region;
		$r['country']=$location->property_country;
		$r['countryname']=$allCountries[$r['country']];
		$r['property_town']=$location->property_town;
		if (!empty($r['property_town']) )
			$allPropertyLocations[]=$r;
		}
	$result['propertyLocations']=$allPropertyLocations;
	return $result;
	}

/**
#
 * Prepares data for searching on features.
#
 */
function prepFeatureSearch()
	{
	// Prepares the Feature data required for a search
	$result=array();
	$query = "SELECT  hotel_features_uid,hotel_feature_abbv,hotel_feature_full_desc,image,property_uid FROM #__jomres_hotel_features  WHERE property_uid = '0' ORDER BY hotel_feature_abbv ";
	$propertyFeaturesList=doSelectSql($query);

	// Added to speed up listing of features. Finds all property features against published propertys and creates a unique array of the feature uids. This way we can still have our list of features but not include any that are not assigned to any properties
	$uniqueFeatures=array();
	$query="SELECT property_features FROM #__jomres_propertys WHERE published = '1'";
	$propertysfeatures=doSelectSql($query);
	foreach ($propertysfeatures as $pf)
		{
		$tmpArray=explode(",",$pf->property_features);
		foreach ($tmpArray as $featureuid)
			{
			if (!in_array($featureuid,$uniqueFeatures) )
				$uniqueFeatures[]=$featureuid;
			}
		}


	foreach($propertyFeaturesList as $propertyFeature)
		{
		if (in_array($propertyFeature->hotel_features_uid,$uniqueFeatures) )
			{
			$r=array();
			$r['id']=$propertyFeature->hotel_features_uid;
			$r['title']=$propertyFeature->hotel_feature_abbv;
			$r['description']=$propertyFeature->hotel_feature_full_desc;
			$r['image']=$propertyFeature->image;
			$result[]=$r;
			}
		}
	return $result;
	}

/**
#
 * Prepares data for searching on room types
#
 */
function prepRoomtypeSearch()
	{
	// Prepares the Room type data required for a search
	global $searchAll;
	$query = "SELECT room_classes_uid, room_class_abbv, room_class_full_desc,image FROM #__jomres_room_classes WHERE property_uid = '0' ORDER BY room_class_abbv ";
	$roomTypeList=doSelectSql($query);
	$result=array();
	$r=array();
	$r['id']=$searchAll;
	$r['title']=$searchAll;
	$r['description']=$searchAll;
	$r['image']='';
	$result[]=$r;

	foreach($roomTypeList as $roomType)
		{
		$r=array();
		$r['id']=$roomType->room_classes_uid;
		$r['title']=$roomType->room_class_abbv;
		$r['description']=$roomType->room_class_full_desc;
		$r['image']=$roomType->image;
		$result[]=$r;
		}
	return $result;
	}

/**
#
 * Returns an empty array.
#
 */
function prepDescriptiveSearch()
	{
	$result=array();
	return $result;
	}

/**
#
 * Prepares the availability search dates. If a search has already been done once then, if valid, the previously chosen dates are returned
#
 */
function prepAvailabilitySearch()
	{
	global $jomresConfig_live_site;
	$result=array();
	//$availabilityArray=array();
	$today = date("Y/m/d");
	$date_elements  	= explode("/",$today);
	$unixTomorrowsDate	= mktime(0,0,0,$date_elements[1],$date_elements[2]+1,$date_elements[0]);
	$unixTodaysDate		= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
	$gmtTomorrowsDate 	= date("Y/m/d", $unixTomorrowsDate);

	if (!isset($_REQUEST['arrivalDate']) )
		{
		if (!isset($_COOKIE['jomsearch_availability']))
			{
			$arrivalDate	=JSCalmakeInputDates(date("Y/m/d",$unixTodaysDate),$siteCal=true);
			$departureDate	=JSCalmakeInputDates(date("Y/m/d",$unixTomorrowsDate),$siteCal=true);
			$arrivalDate	=JSCalConvertInputDates($arrivalDate,$siteCal=true);
			$departureDate	=JSCalConvertInputDates($departureDate,$siteCal=true);
			}
		else
			{
			//echo jomresGetParam( $_COOKIE,'jomsearch_availability', '' );exit;
			$arrivalDate	=jomresGetParam( $_COOKIE,'jomsearch_availability', '' );
			$departureDate	=jomresGetParam( $_COOKIE,'jomsearch_availability_departure', '' );
			}
		}
	else
		{
		$arrivalDate	=JSCalConvertInputDates(jomresGetParam( $_REQUEST, 'arrivalDate', "" ),$siteCal=true);
		$departureDate	=JSCalConvertInputDates(jomresGetParam( $_REQUEST, 'departureDate', "" ),$siteCal=true);
		}

	// Assuming the arrival date was passed from $_REQUEST
	$date_elements  = explode("/",$arrivalDate);
	$unixArrivalDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
	if ($unixArrivalDate < $unixTodaysDate)
		$arrivalDate=$today;

	$date_elements  = explode("/",$departureDate);
	$unixDepartureDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
	if ($unixDepartureDate < $unixTodaysDate)
		$departureDate=$gmtTomorrowsDate;


	$result=array('arrival'=>$arrivalDate,'departure'=>$departureDate);
	SetCookie("jomsearch_availability", $arrivalDate, time()+60*60);
	SetCookie("jomsearch_availability_departure", $departureDate, time()+60*60);
	//SetCookie("jomsearch_availability", $arrivalDate, time()+60*60, "/", $jomresConfig_live_site);
	//SetCookie("jomsearch_availability_departure", $departureDate, time()+60*60, "/", $jomresConfig_live_site);
	return $result;
	}

/**
#
 * Prepares the property type search data
#
 */
function prepPropertyTypeSearch()
	{
	// Prepares the PropertyType data required for a search
	global $searchAll;
	$query="SELECT id, ptype,ptype_desc FROM #__jomres_ptypes WHERE published = '1' ORDER BY `ptype` ASC";
	$ptypeList = doSelectSql($query);
	$result=array();
	$r=array();

	$r['id']=$searchAll;
	$r['ptype']=$searchAll;
	$r['ptype_desc']=$searchAll;
	$result[]=$r;

	foreach ($ptypeList as $ptype)
		{
		$r=array();
		$r['id']=$ptype->id;
		$r['ptype']=$ptype->ptype;
		$r['ptype_desc']=$ptype->ptype_desc;
		$query = "SELECT propertys_uid FROM #__jomres_propertys WHERE published = '1' AND ptype_id = '".(int)$ptype->id."'";
		$number = doSelectSql($query);
		$r['number']=count($number);
		$result[]=$r;
		}
	//var_dump($result);exit;
	return $result;
	}
	
	/**
#
 * Prepares the price range search dropdown data
#
 */
function prepPriceRangeSearch($increments=10)
	{
	// Prepares the PropertyType data required for a search
	global $searchAll;

	$query = "SELECT DISTINCT roomrateperday FROM #__jomres_rates ORDER by roomrateperday";
	$rateList = doSelectSql($query);

	$result=array();
	$result[]=$searchAll;
	$allTariffs=array();
	foreach ($rateList as $rate)
		{
		$allTariffs[]=$rate->roomrateperday;
		}
		
	$lowest = $allTariffs[0];
	$count=count($allTariffs)-1;
	$highest = $allTariffs[$count];
	
	$ranges=my_range(0,$highest,$increments);
	foreach ($ranges as $range)
		{
		$startRange=$range;
		$endRange=$range+$increments;
		$rangeHasElements=false;
		foreach ($allTariffs as $t)
			{
			if ($t > $startRange && $t <= $endRange)
				{
				$rangeHasElements=true;
				}
			}
		if ($rangeHasElements)
			{
			$result[]=$startRange."-".$endRange;
			}
		}
	return $result;
	}
	
// http://uk.php.net/manual/en/function.range.php#82104
function my_range( $start, $end, $step = 1) 
	{
	$range = array();
	foreach (range( $start, $end ) as $index) 
		{
		if (! (($index - $start) % $step) ) 
			{
			$range[] = $index;
			}
		}
	return $range;
	}
?>