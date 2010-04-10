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

class j16000list_taxrates
	{
	function j16000list_taxrates()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $ePointFilepath,$jomresConfig_live_site;
		$editIcon	='<IMG SRC="'.$jomresConfig_live_site.'/components/com_jomres/images/jomresimages/small/EditItem.png" border="0" alt="editicon">';
		$rates=taxrates_getalltaxrates();
		$output=array();
		$pageoutput=array();
		$rows=array();
		
		$output['PAGETITLE']=_JRPORTAL_TAXRATES_TITLE;
		$output['HCODE']=_JRPORTAL_TAXRATES_CODE;
		$output['HDESCRIPTION']=_JRPORTAL_TAXRATES_DESCRIPTION;
		$output['HRATE']=_JRPORTAL_TAXRATES_RATE;
		
		foreach ($rates as $rate)
			{
			$r=array();
			$r['ID']=$rate['id'];
			$r['CODE']=$rate['code'];
			$r['DESCRIPTION']=$rate['description'];
			$r['RATE']=$rate['rate'];
			$r['EDITLINK']='<a href="index2.php?option=com_jomres&task=edit_taxrate&id='.$rate['id'].'">'.$editIcon.'</a>';
			$rows[]=$r;
			}

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('new',jomresURL("index2.php?option=com_jomres&task=edit_taxrate"),'');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index2.php?option=com_jomres"),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath."/templates" );
		$tmpl->readTemplatesFromInput( 'list_taxrates.html');
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