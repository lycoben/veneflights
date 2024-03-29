<?php
/**
#
 * Mini-component core file: Deletes a guest
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
 * Deletes a guest
 #
* @package Jomres
#
 */
class j02226deleteguest {
	/**
	#
	 * Constructor: Deletes a guest
	#
	 */
	function j02226deleteguest()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $Itemid;
		//if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$guestUid=jomresGetParam( $_REQUEST, 'guestUid', 0 );
		$defaultProperty=getDefaultProperty();
		$saveMessage=jr_gettext('_JOMRES_FRONT_DELETEGUEST_GUESTDELETED',_JOMRES_FRONT_DELETEGUEST_GUESTDELETED,FALSE);
		$query="SELECT guest_uid,contract_uid FROM #__jomres_contracts WHERE guest_uid = '".(int)$guestUid."' AND property_uid = '".(int)$defaultProperty."' AND cancelled != 1";
		$bookingCountThisProperty =doSelectSql($query);
		$query="SELECT guest_uid FROM #__jomres_contracts WHERE guest_uid = '".(int)$guestUid."' AND cancelled != 1";
		$bookingCountAllPropertys=doSelectSql($query);
		if (count($bookingCountThisProperty)==count($bookingCountAllPropertys))
			{
			if (count($bookingCountThisProperty) > 0)
				{
				foreach ($bookingCountThisProperty as $contract_uid)
					{
					echo "Deleting room bookings";
					
					$query="DELETE FROM #__jomres_room_bookings WHERE contract_uid = '".(int)$contract_uid->contract_uid."' AND property_uid = '".(int)$defaultProperty."'";
					echo $query;echo "<br>";
					if (!doInsertSql($query,""))
						trigger_error ("Unable to delete from room bookings table, mysql db failure", E_USER_ERROR);
					
					$query="UPDATE #__jomres_contracts SET `cancelled`='1', `cancelled_timestamp`='".date( 'Y-m-d H:i:s' )."', `cancelled_reason`='Guest deleted' WHERE contract_uid = '".(int)$contract_uid->contract_uid."' AND property_uid = '".(int)$defaultProperty."'";
					echo $query;echo "<br>";
					if (!doInsertSql($query,""))
						trigger_error ("Unable to update cancellations data for contract". (int)$contract_uid->contract_uid.", mysql db failure", E_USER_ERROR);
					}
				}
			else
				echo "No bookings to delete";
			$query="DELETE FROM #__jomres_guests WHERE guests_uid = '".(int)$guestUid."' AND property_uid = '".(int)$defaultProperty."'";
			echo $query;
			if (!doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_DELETE_GUEST',_JOMRES_MR_AUDIT_DELETE_GUEST,FALSE))) trigger_error (_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST, E_USER_ERROR);
			jomresRedirect( jomresURL("index.php?option=com_jomres&task=listguests&Itemid=$Itemid"), $saveMessage );
			}
		else
			{
			
			echo jr_gettext('_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST',_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST,FALSE);
			
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