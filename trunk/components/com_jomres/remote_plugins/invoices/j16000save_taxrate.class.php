<?php
/**
#
 * Mini-component core file: Saves Optional Extra details
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

class j16000save_taxrate {
	function j16000save_taxrate()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$id				= intval(jomresGetParam( $_POST, 'id', 0 ));
		$code			= jomresGetParam( $_POST, 'code', "" );
		$description	= jomresGetParam( $_POST, 'description', "" );
		$rate_val		= jomresGetParam( $_POST, 'rate', 0.00 );
		
		$rate = new jrportal_taxrate();
		if ($id > 0)
			{
			$rate->id = $id;
			}
		$rate->code=$code;
		$rate->description=$description;
		$rate->rate=$rate_val;
		
		if ($id > 0)
			$rate->commitUpdateTaxRate();
		else
			$rate->commitTaxRate();
		//echo $rate->error;
		
		jomresRedirect( jomresURL("index2.php?option=com_jomres&task=list_taxrates"), "" );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>