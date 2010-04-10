<?php
/**
#
 * Mini-component 
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

class j16000featured_properties {
	function j16000featured_properties()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $ePointFilepath;
		
		$output['HPROPERTYNAME']=_JRPORTAL_PROPERTIES_PROPERTYNAME;
		$output['HPROPERTYADDRESS']=_JRPORTAL_PROPERTIES_PROPERTYADDRESS;


		$featured=array();
		$query="SELECT property_uid FROM #__jomresportal_featured_properties";
		$featured_propertiesList=doSelectSQL($query);
		if (count($featured_propertiesList)>0)
			{
			foreach ($featured_propertiesList as $p)
				{
				$featured[]=$p->property_uid;
				}
			}

		$propertyFunctions=new jrportal_property_functions();
		$jomresPropertyList=$propertyFunctions->getAllJomresProperties();

		foreach($jomresPropertyList as $k=>$p)
			{
			$r=array();
			$counter++;
			 if ($counter % 2)
				$r['STYLE'] ="row0";
			else 
				$r['STYLE'] ="row1";
				
			$checked="";
			if (in_array($p['id'],$featured)  )
				$checked="checked";
			
			$r['CHECKBOX']='<input type="checkbox" name="idarray[]" value="'.$p['id'].'" '.$checked.' />';

			$r['PROPERTYNAME']=$p['property_name'];
			$r['PROPERTYADDRESS']=$p['property_street'].', '.$p['property_town'].', '.$p['property_region'].', '.$p['property_country'].', '.$p['property_postcode'];

			$rows[]=$r;
			}
		
		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$image = $jrtbar->makeImageValid("/components/com_jomres/images/jomresimages/small/Save.png");
		$link = $jomresConfig_live_site.JOMRES_ADMINISTRATORDIRECTORY."/".$indexphp."?option=com_jomres";
		$jrtb .= $jrtbar->customToolbarItem('save_featured_properties',$link,$text="Save",$submitOnClick=true,$submitTask="save_featured_properties",$image);
		$jrtb .= $jrtbar->toolbarItem('cancel',$indexphp."?option=com_jomres",_JRPORTAL_CANCEL);
		$jrtb .= $jrtbar->spacer();
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath."/templates" );
		$tmpl->readTemplatesFromInput( 'list_properties.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>