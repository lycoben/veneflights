<?php
/**
#
 * Mini-component core file: Deletes a room type (Global room types off - else managed in backend)
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
 * Mini-component core file: Deletes a room type (Global room types off - else managed in backend)
 #
* @package Jomres
#
 */
class j04060deleteroomtype {
	/**
	#
	 * Deletes a room type (Global room types off - else managed in backend)
	#
	 */
	function j04060deleteroomtype($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$roomClassUid		 = intval(jomresGetParam( $_REQUEST, 'roomClassUid', 0 ) );
		$defaultProperty=getDefaultProperty();
		$saveMessage=jr_gettext('_JOMRES_COM_MR_ROOMCLASS_DELETED',_JOMRES_COM_MR_ROOMCLASS_DELETED,FALSE);
		// First we need to check that the room type isn't recorded against any rooms or tariffs. If it is, we can't move forward
		$safeToDelete=TRUE;
		$query="SELECT room_classes_uid FROM #__jomres_rooms WHERE room_classes_uid LIKE '".(int)$roomClassUid."' AND propertys_uid LIKE '".(int)$defaultProperty."' LIMIT 1";
		$propertyFeaturesList =doSelectSql($query);
		if (count($propertyFeaturesList))
			{
			$safeToDelete=FALSE;
			trigger_error (_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_ROOMS, E_USER_ERROR);
			echo "<script> alert('".jr_gettext('_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_ROOMS',_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_ROOMS,FALSE)."'); ; </script>\n";
			}
		$query="SELECT roomclass_uid FROM #__jomres_rates WHERE roomclass_uid LIKE '".(int)$roomClassUid."' AND property_uid LIKE '".(int)$defaultProperty."' LIMIT 1";
		$propertyFeaturesList =doSelectSql($query);
		if (count($propertyFeaturesList))
			{
			$safeToDelete=FALSE;
			trigger_error (_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_TARIFFS, E_USER_ERROR);
			echo "<script> alert('".jr_gettext('_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_TARIFFS',_JOMRES_COM_MR_ROOMCLASS_UNABLETODELETE_TARIFFS,FALSE)."'); ; </script>\n";
			}
	 	if ($safeToDelete)
	 		{
			$query="DELETE FROM #__jomres_room_classes  WHERE room_classes_uid LIKE '".(int)$roomClassUid."' AND property_uid LIKE '".(int)$defaultProperty."'";
			if (doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_DELETE_ROOM_TYPE',_JOMRES_MR_AUDIT_DELETE_ROOM_TYPE,FALSE)))
				returnToPropertyConfig($saveMessage);
			trigger_error ("Unable to delete from room classes table, mysql db failure", E_USER_ERROR);
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