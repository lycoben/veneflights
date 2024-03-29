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

class j16000additemtobill
	{
	function j16000additemtobill($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $indexphp;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$jos_id					= $componentArgs['jos_id'];
		$username				= $componentArgs['username'];
		$property_uid			= $componentArgs['property_uid'];
		$nett					= $componentArgs['nett'];
		$property_name			= $componentArgs['property_name'];
		$billing_description	= $componentArgs['billing_description'];

		$recurrs				= $componentArgs['recurrs'];  // Optional
		$reccur_value 			= $componentArgs['reccur_value'];  // Optional
		$reccur_frequency 		= $componentArgs['reccur_frequency'];  // Optional

		$componentArgs=array(
			'jos_id'=>$jos_id,
			'username'=>$username,
			'property_uid'=>$property_uid,
			'nett'=>$nett,
			'property_name'=>$property_name,
			'billing_description'=>$billing_description,
			'recurrs'=>$recurrs,
			'reccur_value'=>$reccur_value,
			'reccur_frequency'=>$reccur_frequency
			);
		if ($MiniComponents->eventSpecificlyExistsCheck('00100',"jomcompnbill") )
			{
			$MiniComponents->specificEvent('00100',"jomcompnbill",$componentArgs);
			//$MiniComponents->triggerEvent('00100',$componentArgs);
			$results=$MiniComponents->getAllEventPointsData("00100");
			foreach ($results as $r)
				{
				if ($r['success'])
					{
					echo _JRPORTAL_ADD_ADHOC_ITEM_SUCCESS.$r['billingSystem']."<br>";
					echo '<a href="'.$r['orders_link'].'">'._JRPORTAL_ADD_ADHOC_ITEM_VIEWNBILLORDERS.'</a>';
					}
				else
					echo _JRPORTAL_ADD_ADHOC_ITEM_FAILURE.$r['billingSystem']."<br>";
				}
			}
		else
			echo "Jomres -> Nbill plugin does not exist";
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}