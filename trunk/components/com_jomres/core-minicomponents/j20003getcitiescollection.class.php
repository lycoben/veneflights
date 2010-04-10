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
* @copyright	2005-2007 Vince Wooll
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

class j20003getcitiescollection
	{
	function j20003getcitiescollection($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$managersProperties=$componentArgs['properties'];
		$g=genericOr($managersProperties,'propertys_uid');
		$query = "SELECT property_town FROM #__jomres_propertys WHERE ".$g." AND published = '1'";
		$activeTownList=doSelectSql($query);
		$tmpTownArray=array();
		if (count($activeTownList)>0)
			{
			$result=array();
			foreach ($activeTownList as $t)
				{
				$result[]=$t->property_town;
				}
			$tmpTownArray = array_unique($result);
			}
		$this->retval = $tmpTownArray;
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retval;
		}
	}
	




?>