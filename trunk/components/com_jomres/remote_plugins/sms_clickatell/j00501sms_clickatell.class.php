<?php
/**
#
 * Mini-component core file: Configuration panel plugin. Allows input of a gallery link (doesn't have to be a gallery, you can link to anywhere you want)
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
 * Configuration panel for gallery link input
 #
* @package Jomres
#
 */
class j00501sms_clickatell {
	/**
	#
	 * Constructor: Outputs the gallery link config inputs
	#
	 */
	function j00501sms_clickatell($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $configurationPanel,$jrConfig,$thisJRUser;
		
		$mrConfig=$componentArgs['mrConfig'];
		$configurationPanel->startPanel(_JRPORTAL_SMS_CLICKATELL_TABTITLE);
		$configurationPanel->setleft(_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER);
		$configurationPanel->setmiddle('<input type="text" class="inputbox"  size="50" name="cfg_sms_clickatell_notification_number" value="'.$mrConfig['sms_clickatell_notification_number'].'" />');
		$configurationPanel->setright(_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER_DESC);
		$configurationPanel->insertSetting();
		$configurationPanel->endPanel();
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