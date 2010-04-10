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

class j16000removeplugin
	{
	function j16000removeplugin()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $jomresConfig_live_site;
		$debugging=false;
		$pluginName=jomresGetParam( $_REQUEST, 'plugin', '' );
		if ($pluginName == "subsc<x>riptions")
			$pluginName = "subscriptions";
		if (dropPlugin($pluginName))
			echo "Plugin removed";
		else
			echo "Plugin could not be removed";
		
		$registry = new minicomponent_registry(false);
		$registry->regenerate_registry();
		
		if (!$debugging) jomresRedirect($jomresConfig_live_site.'/'.JOMRES_ADMINISTRATORDIRECTORY."/index2.php?option=com_jomres&task=showplugins");
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

