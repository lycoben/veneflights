<?php
/**
#
 * Provides search functionality
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
 * The search minicomponent
 #
* @package Jomres
#
 */
class j00030search {

	/**
	#
	 * Takes information, decides if we have been called by a module or not. If called by a module uses the search object to decide what items the module wants to search upon and performs the search
	#
	 */
	function j00030search($componentArgs)
		{
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $Itemid,$jomresConfig_live_site,$jomresConfig_lang,$mainframe,$jrConfig;
		global $option,$task,$jomresSearchFormname,$searchAll,$customTextArray,$Itemid,$version,$thisJRUser;
		$option=jomresGetParam( $_REQUEST, 'option',"" );
		$jrConfig=getSiteSettings();
		unset ($sch);
		$doSearch=false;
		$includedInModule=false;
		$calledByModule="";
		$searchRestarted=false;
		$showSearchOptions=true;

		if (!defined(_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL) )
			{
			if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.'/components/com_jomres/language/'.$jomresConfig_lang.'.php')) {
					require_once(JOMRESCONFIG_ABSOLUTE_PATH.'/components/com_jomres/language/'.$jomresConfig_lang.'.php');
				} else if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.'/components/com_jomres/language/en-GB.php'))  {
					require_once(JOMRESCONFIG_ABSOLUTE_PATH.'/components/com_jomres/language/en-GB.php');
				}
			}
		init_javascript($mainframe,$jrConfig,$thisJRUser,$version,$jomresConfig_live_site,$jomresConfig_lang);

		global $MiniComponents;

		if (isset($componentArgs['doSearch']) )
			$doSearch=$componentArgs['doSearch'];
		if (isset($componentArgs['includedInModule']) )
			$includedInModule=$componentArgs['includedInModule'];
		if (isset($componentArgs['calledByModule']) )
			$calledByModule=$componentArgs['calledByModule'];
		if ($option=="com_jomres" && !$includedInModule )
			{
			$doSearch=true;
			}
		else
			$showSearchOptions=true;

		$runningMiniComp=false;
		if ($calledByModule == "" && isset($_REQUEST['calledByModule']) )
			{
			$calledByModule=jomresGetParam( $_REQUEST, 'calledByModule',"" );
			}
		if ($calledByModule == "" && !isset($_REQUEST['next'])  )
			{
			if (file_exists(JOMRESCONFIG_ABSOLUTE_PATH.'/modules/mod_jomsearch_m0/srch.html') )
				{
				$calledByModule="mod_jomsearch_m0";
				$doSearch=true;
				$searchRestarted=true;
				//var_dump($doSearch);exit;
				$includedInModule=true;
				$componentArgs=array('doSearch'=>$doSearch,'includedInModule'=>$includedInModule,'calledByModule'=>$calledByModule);
				$MiniComponents->triggerEvent('00030',$componentArgs);
				}
			}
		$calledByModule=mysql_real_escape_string($calledByModule);
		if ($calledByModule != "")
			{
			$query = "SELECT id"
			. "\n FROM #__menu"
			. "\n WHERE type = 'component'"
			. "\n AND published = 1"
			. "\n AND link = 'index.php?option=com_jomres' LIMIT 1";
			$itemQueryRes = doSelectSql($query);
			if (count($itemQueryRes)>0)
				{
				foreach ($itemQueryRes as $i)
					{
					$Itemid = (int)$i->id;
					}
				}
			else $Itemid = $jrConfig['jomresItemid'];
			}
		$customTextArray=array();
		$query="SELECT constant,customtext FROM #__jomres_custom_text WHERE property_uid = 0 AND language = '$jomresConfig_lang'";
		$customTextList=doSelectSql($query);
		if (count($customTextList))
			{
			foreach ($customTextList as $text)
				{
				$customTextArray[$text->constant]=stripslashes($text->customtext);
				}
			}

			$infoIcon="/components/com_jomres/images/information.png";
			$output=array();
			$pageoutput=array();
			$showButton=false;
			$searchAll = jr_gettext('_JOMRES_SEARCH_ALL',_JOMRES_SEARCH_ALL,false,false);
			$sch = new jomSearch($calledByModule);
			$sch->searchAll=$searchAll;
			$searchOptions=$sch->searchOptions;
			$h='<input type="hidden" name="calledByModule" value="'.$sch->calledByModule.'"/>'.'<input type="hidden" name="Itemid" value="'.$Itemid.'"/>';
			$output['HIDDEN']	= $h;
			$jomresSearchFormname=$sch->formname;
			$searchOutput=$sch->searchOutput;
			//$overlibLables=$sch->overlibLables;
			$featurecols=$sch->featurecols;

			$metaTitle="";
			
			$unwanted=array("%","'","\"");
			if (!empty($_REQUEST['propertyname'] ) ) {
				if ($_REQUEST['propertyname'] ==$searchAll)
					$sch->filter['propertyname']		=	"%";
				else
					{
					$sch->filter['propertyname']		=	jomresGetParam( $_REQUEST, 'propertyname',"" );
					$sch->filter['propertyname']=str_replace($unwanted,"",$sch->filter['propertyname']);
					$metaTitle.=" ".$sch->filter['propertyname'];
					}
				}

			if (!empty($_REQUEST['country'] ) ) {
				if ($_REQUEST['country'] ==$searchAll)
					$sch->filter['country']		=	"%";
				else
					{
					$sch->filter['country']		=	jomresGetParam( $_REQUEST, 'country',"" );
					$sch->filter['country']=str_replace($unwanted,"",$sch->filter['country']);
					$metaTitle.=" ".$sch->filter['country'];
					}
				}

			if (!empty($_REQUEST['region'] ) ) {
				if ($_REQUEST['region'] ==$searchAll)
					$sch->filter['region']		=	"%";
				else
					{
					$sch->filter['region']		=jomresGetParam( $_REQUEST, 'region',"" );
					$sch->filter['region']=str_replace($unwanted,"",$sch->filter['region']);
					$metaTitle.=" ".$sch->filter['region'];
					}
				}

			if (!empty($_REQUEST['town'] ) ) {
				if ($_REQUEST['town'] ==$searchAll)
					$sch->filter['town']		=	"%";
				else
					{
					$sch->filter['town']		=jomresGetParam( $_REQUEST, 'town',"" );
					$sch->filter['town']=str_replace($unwanted,"",$sch->filter['town']);
					$metaTitle.=" ".$sch->filter['town'];
					}
				}

			if (!empty($_REQUEST['description'] ) )
				{
				if ($_REQUEST['description'] !="")
					{
					$sch->filter['description']	= jomresGetParam( $_REQUEST, 'description',"" );
					$sch->filter['description']=str_replace($unwanted,"",$sch->filter['description']);
					}
				}

			if (!empty($_REQUEST['feature_uids'] ) )
				{
					{
					$sch->filter['feature_uids']= jomresGetParam( $_REQUEST, 'feature_uids', array() );
					}
				}

			if (!empty($_REQUEST['room_type'] ) )
				{
				if ($_REQUEST['room_type'] == $searchAll)
					$sch->filter['room_type']		=	"%";
				else
					{
					$sch->filter['room_type']	= (int)jomresGetParam( $_REQUEST, 'room_type', 0 );
					}
				}

			if (!empty($_REQUEST['ptype'] ) )
				{
				if ($_REQUEST['ptype'] == $searchAll)
					$sch->filter['ptype']		=	"%";
				else
					{
					$sch->filter['ptype']		= (int)jomresGetParam( $_REQUEST, 'ptype',"" );
					}
				}
			//	$_REQUEST['priceranges']="0-50";
			if (!empty($_REQUEST['priceranges'] ) )
				{
				if ($_REQUEST['priceranges'] == $searchAll)
					$sch->filter['priceranges']		=	"%";
				else
					{
					$ranges= jomresGetParam( $_REQUEST, 'priceranges',"" );
					$rangeArr=explode("-",$ranges);
					$sch->filter['priceranges']		= array("from"=>(int)$rangeArr[0],"to"=>(int)$rangeArr[1],"raw"=>$ranges);
					}
				}
				
			if ($option == "com_jomres" && (!empty($_REQUEST['propertyname']) || !empty($_REQUEST['country'] ) || !empty($_REQUEST['region']) || !empty($_REQUEST['town'])) )
				$mainframe->setPageTitle(stripslashes($metaTitle));

			//var_dump($sch->searchOptions);
			if (!empty($_REQUEST['arrivalDate']) && in_array('availability',$sch->searchOptions) )
				{
				$sch->filter['arrival']		= $sch->prep['arrival'];
				$sch->filter['departure']	= $sch->prep['departure'];
				$sch->filter['arrival']=str_replace($unwanted,"",$sch->filter['arrival']);
				$sch->filter['departure']=str_replace($unwanted,"",$sch->filter['departure']);
				}

			if (in_array("country",$searchOptions) && $showSearchOptions  ) {
				$output['JOMRES_SEARCH_GEO_COUNTRYSEARCH']	=jr_gettext('_JOMRES_SEARCH_GEO_COUNTRYSEARCH',_JOMRES_SEARCH_GEO_COUNTRYSEARCH,false);
				}
			if (in_array("region",$searchOptions) && $showSearchOptions ) {
				$output['JOMRES_SEARCH_GEO_REGIONSEARCH']	=jr_gettext('_JOMRES_SEARCH_GEO_REGIONSEARCH',_JOMRES_SEARCH_GEO_REGIONSEARCH,false);
				}
			if (in_array("town",$searchOptions) && $showSearchOptions ) {
				$output['JOMRES_SEARCH_GEO_TOWNSEARCH']		=jr_gettext('_JOMRES_SEARCH_GEO_TOWNSEARCH',_JOMRES_SEARCH_GEO_TOWNSEARCH,false);
				}
			if (in_array("description",$searchOptions) && $showSearchOptions) {
				$output['JOMRES_SEARCH_DESCRIPTION_INFO']	=jr_gettext('_JOMRES_SEARCH_DESCRIPTION_INFO',_JOMRES_SEARCH_DESCRIPTION_INFO,false);
				$output['JOMRES_SEARCH_DESCRIPTION_LABEL']	=jr_gettext('_JOMRES_SEARCH_DESCRIPTION_LABEL',_JOMRES_SEARCH_DESCRIPTION_LABEL,false);
				}
			if (in_array("feature_uids",$searchOptions) && $showSearchOptions) {
					$output['JOMRES_SEARCH_FEATURE_INFO']		=jr_gettext('_JOMRES_SEARCH_FEATURE_INFO',_JOMRES_SEARCH_FEATURE_INFO,false);
				}
			if (in_array("room_type",$searchOptions) && $showSearchOptions) {
				$output['JOMRES_SEARCH_RTYPES']				=jr_gettext('_JOMRES_SEARCH_RTYPES',_JOMRES_SEARCH_RTYPES,false);
				}
			if (in_array("availability",$searchOptions) && $showSearchOptions && $task!="bookaroom") {
				$output['JOMRES_SEARCH_AVL_INFO']			=jr_gettext('_JOMRES_SEARCH_AVL_INFO',_JOMRES_SEARCH_AVL_INFO,false);

				$output['HARRIVALDATE']						=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL,false);
				$output['HDEPARTUREDATE']					=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE,false);
				}

			if (in_array("ptype",$searchOptions) && $showSearchOptions) {
				if ($overlibLables=="1")
					$output['JOMRES_SEARCH_PTYPES']				=makeFeatureImages($infoIcon,_JOMRES_SEARCH_BUTTON, jr_gettext('_JOMRES_SEARCH_PTYPES',_JOMRES_SEARCH_PTYPES,false),$retString=TRUE);
				else
					$output['JOMRES_SEARCH_PTYPES']				=jr_gettext('_JOMRES_SEARCH_PTYPES',_JOMRES_SEARCH_PTYPES,false);
				}

			if (in_array("priceranges",$searchOptions) && $showSearchOptions) {
				if ($overlibLables=="1")
					$output['JOMRES_SEARCH_PRICERANGES']				=makeFeatureImages($infoIcon,_JOMRES_SEARCH_BUTTON, jr_gettext('_JOMRES_SEARCH_PRICERANGES',_JOMRES_SEARCH_PRICERANGES,false),$retString=TRUE);
				else
					$output['JOMRES_SEARCH_PRICERANGES']				=jr_gettext('_JOMRES_SEARCH_PRICERANGES',_JOMRES_SEARCH_PRICERANGES,false);
				}
			/*
			$output['ITEMID']=$Itemid;
			$output['LIVESITE']=$jomresConfig_live_site;
			$output['FORMNAME']=$jomresSearchFormname;
			*/
			$output['ITEMID']=$Itemid;
			$output['LIVESITE']=$jomresConfig_live_site;
			$nossl			  = str_replace("https://","http://",$jomresConfig_live_site);
			$output['LIVESITELINK'] =  $nossl;
			$output['FORMNAME']=$jomresSearchFormname;


			
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("selectcombo",$searchOptions) && $showSearchOptions ) 
				{
				if (!defined("_JOMRES_SELECTCOMBO") )
					{
					define("_JOMRES_SELECTCOMBO",1);
					echo '<script type="text/javascript" src="'.$jomresConfig_live_site.'/components/com_jomres/javascript/jquery.selectCombo1.2.6.js"></script>';
					echo "<script>
					jQuery(function() {
						jQuery('#search_country').selectCombo('".$jomresConfig_live_site."/index2.php?option=com_jomres&task=selectcombo&popup=1&no_html=1&tmpl=component&filter=country','#search_region');
						jQuery('#search_region').selectCombo('".$jomresConfig_live_site."/index2.php?option=com_jomres&task=selectcombo&popup=1&no_html=1&tmpl=component&filter=region','#search_town');
						});
					</script>";
					}
				foreach ($sch->prep['country'] as $country)
					{
					$countryArray[]= jomresHTML::makeOption( $country['countrycode'], stripslashes($country['countryname']));
					}

				$output['SELECTCOMBO_COUNTRY']=
				jomresHTML::selectList( $countryArray, 'country', 'size="1" id="search_country" ', 'value', 'text', $selectOption ).'
				<br />';
				$output['SELECTCOMBO_HIDDENDROPDOWNS_REGION']='
				<select id="search_region" name="region">
				<option value="">--  --</option>
				</select>
				<br />';
				$output['SELECTCOMBO_HIDDENDROPDOWNS_TOWN']='
				<select id="search_town" name="town">
				<option value="">--  --</option>
				<br />';
				$showButton=true;
				}
				
			
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("propertyname",$searchOptions) && $showSearchOptions ) 
				{
				if (count($sch->prep['propertyname'])>0)
					{
					$propertyname=array();
					if (empty($sch->filter['propertyname']) )
						$selectOption=$sch->prep['propertyname'][0]['pn'];
					else
						$selectOption=$sch->filter['propertyname'];
					if ($searchOutput['propertyname']=="dropdown")
						{
						foreach ($sch->prep['propertyname'] as $property)
							{
							$propertyname[]= jomresHTML::makeOption( $property['puid'], stripslashes($property['pn']));
							}
						$output['propertyname']=jomresHTML::selectList( $propertyname, 'propertyname', 'size="1" ', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
						{
						$r="";
						foreach ($sch->prep['propertyname'] as $property)
							{
							//$l=htmlspecialchars('index.php?option=com_jomres&Itemid='.$Itemid.'&propertyname='.$property['pn']);
							$l=htmlspecialchars('index.php?option=com_jomres&task=viewproperty&Itemid='.$Itemid.'&property_uid='.$property['puid']);
							$link=jomresURL($l);

							$r.='<a href="'.$link.'">'.stripslashes($property['pn']).'</a>&nbsp;';
							if ($sch->cols=="1")
								$r.="<br>";
							}
						$output['propertyname']=$r;
						}
					}
				else
					$output['propertyname']="EMPTY";
				}

			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("country",$searchOptions)&& $showSearchOptions && !in_array("selectcombo",$searchOptions) ) 
				{
				$countryArray=array();
				if (count($sch->prep['country'])>0)
					{
					if (empty($sch->filter['country']) )
						$selectOption=$sch->prep['country'][0]['countrycode'];
					else
						$selectOption=$sch->filter['country'];
					if ($searchOutput['country']=="dropdown")
						{
						foreach ($sch->prep['country'] as $country)
							{
							$countryArray[]= jomresHTML::makeOption( $country['countrycode'], stripslashes($country['countryname']));
							}
						$output['country']=jomresHTML::selectList( $countryArray, 'country', 'size="1" ', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
						{
						$r="";
						foreach ($sch->prep['country'] as $country)
							{
							$l=htmlspecialchars('index.php?option=com_jomres&calledByModule='.$calledByModule.'&Itemid='.$Itemid.'&country='.$country['countrycode']);
							$link=jomresURL($l);
							$r.='<a href="'.$link.'">'.stripslashes($country['countryname']).'</a>&nbsp;';
							if ($sch->cols=="1")
								$r.="<br>";
							}
						$output['country']=$r;
						}
					}
				else
					$output['country']="EMPTY";
				}

			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("region",$searchOptions)&& $showSearchOptions && !in_array("selectcombo",$searchOptions)) 
				{
				$regionArray=array();
				if (count($sch->prep['region'])>0)
					{
					if (empty($sch->filter['region']) )
						$selectOption=$sch->prep['region'][0]['region'];
					else
						$selectOption=$sch->filter['region'];
					if ($searchOutput['region']=="dropdown")
						{
						foreach ($sch->prep['region'] as $region)
							{
							$t = str_replace("&#39;","'",$region['region']);  // This is important. php will not pass back, eg Sant&#39;Antimo, it will only pass back Sant, therefore we need to convert the &#39; to a ' to be shown in the url. When jomresGetParam runs it'll convert the ' back to &#39; and the search will run successfully.
							$regionArray[]= jomresHTML::makeOption( $t, stripslashes($t));
							}
						$output['region']=jomresHTML::selectList( $regionArray, 'region', 'size="1" ', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
						{
						$r="";
						foreach ($sch->prep['region'] as $region)
							{
							$t = str_replace("&#39;","'",$region['region']);  // This is important. php will not pass back, eg Sant&#39;Antimo, it will only pass back Sant, therefore we need to convert the &#39; to a ' to be shown in the url. When jomresGetParam runs it'll convert the ' back to &#39; and the search will run successfully.
							$l=htmlspecialchars('index.php?option=com_jomres&calledByModule='.$calledByModule.'&Itemid='.$Itemid.'&region='.$t);
							$link=jomresURL($l);
							$r.='<a href="'.$link.'">'.stripslashes($region['region']).'</a>&nbsp;';
							if ($sch->cols=="1")
								$r.="<br>";
							}
						$output['region']=$r;
						}
					}
				else
					$output['region']="EMPTY";
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("town",$searchOptions) && $showSearchOptions && !in_array("selectcombo",$searchOptions)) 
				{
				$townArray=array();
				//var_dump($sch->prep['town']);
				$ta=$sch->prep['town'];
				if (count($sch->prep['town'])>0)
					{
					if (empty($sch->filter['town']) )
						$selectOption=$ta[0]['town'];
					else
						$selectOption=$sch->filter['town'];
					
					if ($searchOutput['town']=="dropdown")
						{
						foreach ($ta as $town)
							{
							$t = str_replace("&#39;","'",$town['town']);  // This is important. php will not pass back, eg Sant&#39;Antimo, it will only pass back Sant, therefore we need to convert the &#39; to a ' to be shown in the url. When jomresGetParam runs it'll convert the ' back to &#39; and the search will run successfully.
							$townArray[]= jomresHTML::makeOption( $town['town'], stripslashes($t));
							}
						$output['town']=jomresHTML::selectList( $townArray, 'town', 'size="1" ', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
						{
						$r="";
						foreach ($ta as $town)
							{
							$t = str_replace("&#39;","'",$town['town']);  // This is important. php will not pass back, eg Sant&#39;Antimo, it will only pass back Sant, therefore we need to convert the &#39; to a ' to be shown in the url. When jomresGetParam runs it'll convert the ' back to &#39; and the search will run successfully.
							$l=htmlspecialchars('index.php?option=com_jomres&calledByModule='.$calledByModule.'&Itemid='.$Itemid.'&town='.$t);
							$link=jomresURL($l);
							$r.='<a href="'.$link.'">'.stripslashes($town['town']).'</a>';
							if ($sch->cols=="1")
								$r.="<br>";
							}
						$output['town']=$r;
						}
					}
				else
					$output['town']="EMPTY";
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("description",$searchOptions)&& $showSearchOptions ) 
				{
				if (empty($sch->filter['description']) )
					$selectOption=$output['JOMRES_SEARCH_DESCRIPTION_LABEL'];
				else
					$selectOption=$sch->filter['description'];
				$showButton=true;
				$output['DESCRIPTION']='<input class="inputbox" type="text" name="description" value="'.$sch->filter['description'].'"  onfocus="if (this.value ==\''.$output['JOMRES_SEARCH_DESCRIPTION_LABEL'].'\') {this.value = \'\'}" />';
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("feature_uids",$searchOptions)&& $showSearchOptions ) 
				{
				$featureArray=array();
				if (count($sch->prep['features'])>0)
					{
					if (empty($sch->filter['feature_uids']) )
						$selectOption=$sch->prep['features'][0];
					else
						$selectOption=$sch->filter['feature_uids'][0];
					if ($searchOutput['feature_uids']=="dropdown")
						{
						foreach ($sch->prep['features'] as $feature)
							{
							$featureArray[]= jomresHTML::makeOption( $feature['id'], stripslashes($feature['title']));
							}
						$output['feature']=jomresHTML::selectList( $featureArray, 'feature_uids[]', 'size="1" ', 'value', 'text', $selectOption );
						}
					else  // Show the features as overlib
						{
						$r="";
						$counter=0;
						foreach ($sch->prep['features'] as $feature)
							{
							$counter++;
							$pid=$feature['id'];
							$ischecked="";
							if (is_array($sch->filter['feature_uids']) )
								{
								if (in_array($pid,$sch->filter['feature_uids'] ) )
									$ischecked="checked";
								}
							$image = '/'.$feature['image'];
							$tmp=makeFeatureImages($image,$feature['title'],$feature['description'],$retString=TRUE);
							$rowbreak="";
							if ($counter==$featurecols)
								{
								$rowbreak="<br>";
								$counter=0;
								}
							$rows[]=$r;
							$r.=$tmp.'<input type="checkbox" name="feature_uids[]" value="'.$pid.'" '.$ischecked.'>'.$rowbreak;
							}
						$output['feature']=$r;
						}
					}
				else
					$output['feature']="EMPTY";
				$showButton=true;
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("room_type",$searchOptions)&& $showSearchOptions ) 
				{
				$rtypeArray=array();
				if (count($sch->prep['rtypes'])>0)
					{
					$r="";
					if (empty($sch->filter['room_type']) )
						$selectOption=$sch->prep['rtypes'][0]['id'];
					else
						$selectOption=$sch->filter['room_type'];
					if ($searchOutput['room_type']=="dropdown")
						{
						foreach ($sch->prep['rtypes'] as $rtype)
							{
							$roomClassAbbv=jr_gettext(_JOMRES_CUSTOMTEXT_ROOMCLASS_DESCRIPTION.$rtype['id'],stripslashes($rtype['title']));
							$rtypeArray[]= jomresHTML::makeOption( $rtype['id'], $roomClassAbbv);
							}
						$output['room_type']=jomresHTML::selectList( $rtypeArray, 'room_type', 'size="1"', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
						{
						foreach ($sch->prep['rtypes'] as $room_type)
							{
							$roomClassAbbv=jr_gettext(_JOMRES_CUSTOMTEXT_ROOMCLASS_DESCRIPTION.$room_type['id'],stripslashes($room_type['title']));
							$l=htmlspecialchars('index.php?option=com_jomres&calledByModule='.$calledByModule.'&Itemid='.$Itemid.'&room_type='.$room_type['id']);
							$link=jomresURL($l);
							$r.='<a href="'.$link.'">'.$roomClassAbbv.'</a>&nbsp;';
							if ($sch->cols=="1")
								$r.="<br>";
							}
						$output['room_type']=$r;
						}
					}
				else
					$output['room_type']="EMPTY";
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("ptype",$searchOptions)&& $showSearchOptions ) 
				{
				$ptypeArray=array();
				if (count($sch->prep['ptypes'])>0)
					{
					if (empty($sch->filter['ptype']) )
						$selectOption=$sch->prep['ptypes'][0]['id'];
					else
						$selectOption=$sch->filter['ptype'];
					if ($searchOutput['ptype']=="dropdown")
						{
						foreach ($sch->prep['ptypes'] as $ptype)
							{
							$ptypeAbbv=jr_gettext(_JOMRES_CUSTOMTEXT_PROPERTYTYPE.$ptype['id'],stripslashes($ptype['ptype']),false,false);
							
							$ptypeArray[]= jomresHTML::makeOption( $ptype['id'], $ptypeAbbv);
							}
						$output['ptype']=jomresHTML::selectList( $ptypeArray, 'ptype', 'size="1" ', 'value', 'text', $selectOption );
						$showButton=true;
						}
					else
					{
					$r="";
					foreach ($sch->prep['ptypes'] as $ptype)
						{
						$ptypeAbbv=jr_gettext(_JOMRES_CUSTOMTEXT_PROPERTYTYPE.$ptype['id'],stripslashes($ptype['ptype']),true,true);
						//echo $ptypeAbbv;
						$l=htmlspecialchars('index.php?option=com_jomres&calledByModule='.$calledByModule.'&Itemid='.$Itemid.'&ptype='.$ptype['id']);
						$link=jomresURL($l);
						$r.='<a href="'.$link.'">'.$ptypeAbbv.'</a>';
							if ($sch->cols=="1")
							$r.="<br>";
						}
					$output['ptype']=$r;
					}
				}
			else
				$output['ptype']="EMPTY";
			}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			if (in_array("priceranges",$searchOptions)&& $showSearchOptions ) 
				{
				$rangeArray=array();
				if (count($sch->prep['priceranges'])>0)
					{
					if (empty($sch->filter['priceranges']) )
						$selectOption=$sch->prep['priceranges'][0];
					else
						$selectOption=$sch->filter['priceranges']['raw'];
					foreach ($sch->prep['priceranges'] as $priceranges)
						{
						$rangeArray[]= jomresHTML::makeOption( $priceranges, $priceranges);
						}
					$output['PRICERANGES']=jomresHTML::selectList( $rangeArray, 'priceranges', 'size="1" ', 'value', 'text', $selectOption );
					$showButton=true;
					}
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
//
			if (in_array("availability",$searchOptions))
				{
				$output['ARRIVALDATE']= generateDateInput("arrivalDate",$sch->prep['arrival'],"ad",TRUE);
				$output['DEPARTUREDATE']= generateDateInput("departureDate",$sch->prep['departure'],FALSE,TRUE,false);
				$showButton=true;
				}
			// -------------------------------------------------------------------------------------------------------------------------------------------
			//if ($option=="com_jomres" && !$includedInModule)
			//	var_dump($sch);
			// -------------------------------------------------------------------------------------------------------------------------------------------
			
			if ($doSearch)
				{
				global $numberOfPropertiesInSystem;
				if ($numberOfPropertiesInSystem > 1 && !$includedInModule && !isset($_REQUEST['calledByModule']) && !isset($_REQUEST['next']) && $task=="" )
					{
					$sch->jomSearch_random();
					}
				else
					{
					if (in_array("propertyname",$searchOptions) && !empty($sch->filter['propertyname']) )
						{
						$l=htmlspecialchars('index.php?option=com_jomres&task=viewproperty&Itemid='.$Itemid.'&property_uid='.$sch->filter['propertyname']);
						jomresRedirect( jomresURL($l), $saveMessage );
						}
					if (in_array("country",$searchOptions) && !empty($sch->filter['country']) )
						$sch->jomSearch_country();
					if (in_array("region",$searchOptions) && !empty($sch->filter['region']) )
						$sch->jomSearch_region();
					if (in_array("town",$searchOptions) && !empty($sch->filter['town']) )
						$sch->jomSearch_town();
					if (in_array("ptype",$searchOptions) && !empty($sch->filter['ptype']) )
						$sch->jomSearch_ptypes();
					if (in_array("priceranges",$searchOptions) && !empty($sch->filter['priceranges']) )
						$sch->jomSearch_priceranges();
					if (in_array("feature_uids",$searchOptions) && !empty($sch->filter['feature_uids']) )
						$sch->jomSearch_features();
					if (in_array("room_type",$searchOptions) && !empty($sch->filter['room_type']) )
						$sch->jomSearch_roomtypes();
					if (in_array("description",$searchOptions) && !empty($sch->filter['description']) )
						$sch->jomSearch_description();
					if (in_array("availability",$searchOptions) && !empty($sch->filter['arrival']) )
						$sch->jomSearch_availability();
					}
				}
			if ($showButton==true)
				{
				$output['SEARCHBLURB']	=jr_gettext('_JOMRES_FRONT_MR_SEARCH_HERE',_JOMRES_FRONT_MR_SEARCH_HERE);
				$output['THEBUTTON']='<input type="submit" name="send" value="'.jr_gettext('_JOMRES_SEARCH_BUTTON',_JOMRES_SEARCH_BUTTON,false).'" class="button" />';
				}
			$pageoutput[]=$output;

			//if ($option=="com_jomres" && !$includedInModule)
			//	var_dump($sch);
			if (!$doSearch)
				{
				$stmpl = new patTemplate();
				$stmpl->setRoot( $sch->templateFilePath );
				$stmpl->readTemplatesFromInput( 'srch.html' );
				$stmpl->addRows( 'search', $pageoutput );
				$stmpl->displayParsedTemplate();
				}
			if ($doSearch )
				$sch->jomSearch_showresults();
			unset ($sch);
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_SEARCH_BUTTON',_JOMRES_SEARCH_BUTTON);
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_SEARCH_HERE',_JOMRES_FRONT_MR_SEARCH_HERE);
		$output[]		=jr_gettext('_JOMRES_SEARCH_ALL',_JOMRES_SEARCH_ALL);
		
		$output[]		=jr_gettext('_JOMRES_SEARCH_GEO_COUNTRYSEARCH',_JOMRES_SEARCH_GEO_COUNTRYSEARCH);
		$output[]		=jr_gettext('_JOMRES_SEARCH_GEO_REGIONSEARCH',_JOMRES_SEARCH_GEO_REGIONSEARCH);
		$output[]		=jr_gettext('_JOMRES_SEARCH_GEO_TOWNSEARCH',_JOMRES_SEARCH_GEO_TOWNSEARCH);
		$output[]		=jr_gettext('_JOMRES_SEARCH_DESCRIPTION_INFO',_JOMRES_SEARCH_DESCRIPTION_INFO);
		$output[]		=jr_gettext('_JOMRES_SEARCH_DESCRIPTION_LABEL',_JOMRES_SEARCH_DESCRIPTION_LABEL);
		$output[]		=jr_gettext('_JOMRES_SEARCH_FEATURE_INFO',_JOMRES_SEARCH_FEATURE_INFO);
		$output[]		=jr_gettext('_JOMRES_SEARCH_RTYPES',_JOMRES_SEARCH_RTYPES);
		$output[]		=jr_gettext('_JOMRES_SEARCH_AVL_INFO',_JOMRES_SEARCH_AVL_INFO);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL);
		$output[]		=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE);
		
		$output[]		=jr_gettext('_JOMRES_SEARCH_PTYPES',_JOMRES_SEARCH_PTYPES);
		
		$query = "SELECT room_classes_uid, room_class_abbv, room_class_full_desc,image FROM #__jomres_room_classes WHERE property_uid = '0' ORDER BY room_class_abbv ";
		$roomTypeList=doSelectSql($query);
		foreach ($roomTypeList as $rtype )
			{
			$output[]		=jr_gettext(_JOMRES_CUSTOMTEXT_ROOMCLASS_DESCRIPTION.$rtype->room_classes_uid,stripslashes($rtype->room_class_abbv));
			}
			
		$query="SELECT id, ptype FROM #__jomres_ptypes WHERE published = '1' ORDER BY `ptype` ASC";
		$ptypeList = doSelectSql($query);
		foreach ($ptypeList as $ptype )
			{
			$output[]		=jr_gettext(_JOMRES_CUSTOMTEXT_PROPERTYTYPE.$ptype->id,stripslashes($ptype->ptype));
			}
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