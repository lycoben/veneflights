<?php
/**
#
 * Mini-component core file: Constructs and displays edit extra form
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

class j16000edit_taxrate {
	function j16000edit_taxrate()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $ePointFilepath;
		
		$id		= intval(jomresGetParam( $_REQUEST, 'id', 0 ));
		
		$rate = new jrportal_taxrate();
		if ($id > 0)
			{
			$rate->id = $id;
			$rate->getTaxRate();
			}
		
		$output['ID']=$rate->id;
		$output['CODE']=$rate->code;
		$output['DESCRIPTION']=$rate->description;
		$output['RATE']=$rate->rate;
		
		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_taxrate');
		$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres&task=list_taxrates",'');
		if ($id>0)
			$jrtb .= $jrtbar->toolbarItem('delete',"index2.php?option=com_jomres&task=delete_taxrate".jomresURLToken()."&no_html=1&id=".$id,'');
		else
			echo _JRPORTAL_TAXRATES_CANNOTDELETE;
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath."/templates" );
		$tmpl->readTemplatesFromInput( 'edit_taxrate.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>