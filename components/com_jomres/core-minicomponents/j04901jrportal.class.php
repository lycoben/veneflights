<?php
/**
#
 * Mini-component core file: cross references a property uid against a commission rate
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

// Post property insert. Creates a property in the commission -> property xref table
class j04901jrportal {
	function j04901jrportal($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $jrConfig;
		$defaultCrate=$jrConfig['defaultCrate'];
		$property_uid			= $componentArgs['property_uid'];

		$property = new jrportal_property();
		$property->property_id=$property_uid;
		$property->crate_id=$defaultCrate;

		$tr= new jrportal_transaction();
		$property->commitNewProperty($tr);
		$result=$tr->commit($tr);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
?>