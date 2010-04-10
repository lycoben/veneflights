<?php
/**
#
 * Mini-component core file: Deletes an optional extra
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
 * Delete an optional extra
 #
* @package Jomres
#
 */
class j16000delete_taxrate {
	/**
	#
	 * Constructor:  Delete an optional extra
	#
	 */
	function j16000delete_taxrate()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $Itemid;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$id=jomresGetParam( $_REQUEST, 'id', 0 );
		if ($id>1)
			{
			$rate = new jrportal_taxrate();
			if ($id > 0)
				{
				$rate->id = $id;
				}
			$rate->deleteTaxRate();
			jomresRedirect( "index2.php?option=com_jomres&task=list_taxrates", $saveMessage );
			}
		else
			echo _JRPORTAL_TAXRATES_CANNOTDELETE;
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
?>