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

class j16000save_featured_properties
	{
	function j16000save_featured_properties()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $jomresAdminPath;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$featured=array();
		if (isset($_REQUEST['idarray']) )
			{
			foreach ($_POST['idarray'] as $k=>$v)
				{
				$key=intval($k);
				$value=intval($v);
				$featured[$key]=$value;
				}
			}
		
		$query="DELETE FROM #__jomresportal_featured_properties";
		$result=doInsertSQL($query,"");
		if (count($featured) >0)
			{
			foreach ($featured as $f)
				{
				$query="INSERT INTO #__jomresportal_featured_properties (`property_uid`) VALUES (".$f.")";
				$result=doInsertSQL($query,"");
				}
			}
		jomresRedirect("index2.php?option=com_jomres&task=featured_properties", '');
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}