<?php
/**
#
 * Mini-component core file: Constructs and displays the receptionist's menu
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
 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
 #
* @package Jomres
#
 */
class j00001start {

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function j00001start($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		define('JOMRES_ADMINISTRATORDIRECTORY',"administrator");
		if (!defined('JOMRES_TEMPLATEPATH_FRONTEND'))
			define('JOMRES_TEMPLATEPATH_FRONTEND',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."frontend");
		if (!defined('JOMRES_TEMPLATEPATH_BACKEND'))
			define('JOMRES_TEMPLATEPATH_BACKEND',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."backend");
		if (!defined('JOMRES_TEMPLATEPATH_ADMINISTRATOR'))
			define('JOMRES_TEMPLATEPATH_ADMINISTRATOR',JOMRESPATH_BASE.JRDS."templates".JRDS."jomres".JRDS."administrator/");
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