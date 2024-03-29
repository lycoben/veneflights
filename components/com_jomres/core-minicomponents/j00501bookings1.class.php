<?php
/**
#
 * Mini-component core file: Configuration panel plugin. Constructs various booking form configuration options
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
class j00501bookings1 {

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function j00501bookings1($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $configurationPanel,$jrConfig,$thisJRUser;
		$mrConfig=$componentArgs['mrConfig'];
		$lists=$componentArgs['lists'];
		//$tabs=$componentArgs['tabs'];
		$smokingOptionDropdownList=$componentArgs['smokingOptionDropdownList'];
		$weekenddayDropdown=$componentArgs['weekenddayDropdown'];

		$configurationPanel->startPanel(_JOMRES_COM_A_BOOKING);

		$configurationPanel->setleft(_JOMRES_COM_A_MINIMUMINTERVAL);
		$configurationPanel->setmiddle('<input type="text" class="inputbox" name="cfg_minimuminterval" size="5" value="'.$mrConfig['minimuminterval'].'" />');
		$configurationPanel->setright(_JOMRES_COM_A_MINIMUMINTERVAL_DESC);
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING);
		$configurationPanel->setmiddle('<input type="text" class="inputbox" name="cfg_mindaysbeforearrival" size="5" value="'.$mrConfig['mindaysbeforearrival'].'" />');
		$configurationPanel->setright(_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING_DESC);
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPE);
		$configurationPanel->setmiddle('<input type="text" class="inputbox" name="cfg_defaultNumberOfFirstGuesttype" size="5" value="'.$mrConfig['defaultNumberOfFirstGuesttype'].'" />');
		$configurationPanel->setright(_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPEDESC);
		$configurationPanel->insertSetting();
		
		
		$configurationPanel->setleft(_JOMRES_COM_A_EXTRAS);
		$configurationPanel->setmiddle($lists['showExtras']);
		$configurationPanel->setright(_JOMRES_COM_A_EXTRAS_DESC);
		$configurationPanel->insertSetting();
		if ( $mrConfig['singleRoomProperty'] != "1" )
			{
			$configurationPanel->setleft(_JOMRES_COM_A_SMOKING);
			$configurationPanel->setmiddle($lists['showSmoking']);
			$configurationPanel->setright(_JOMRES_COM_A_SMOKING_DESC);
			$configurationPanel->insertSetting();

			$configurationPanel->setleft(_JOMRES_COM_A_SMOKING_OPTION);
			$configurationPanel->setmiddle($smokingOptionDropdownList);
			$configurationPanel->setright();
			$configurationPanel->insertSetting();
			}
			
		if ($jrConfig['minimalconfiguration']!="1" || $thisJRUser->superPropertyManager)
			{
			$configurationPanel->setleft(_JOMRES_COM_A_ADVANCEBOOKINGSLIMITYESNO);
			$configurationPanel->setmiddle($lists['limitAdvanceBookingsYesNo']);
			$configurationPanel->setright(_JOMRES_COM_A_ADVANCEBOOKINGSLIMITYESNO_DESC);
			$configurationPanel->insertSetting();

			$configurationPanel->setleft(_JOMRES_COM_A_ADVANCEBOOKINGSLIMITDAYS);
			$configurationPanel->setmiddle('<input type="text" class="inputbox" size="5" name="cfg_advanceBookingsLimit" value="'.$mrConfig['advanceBookingsLimit'].'">');
			$configurationPanel->setright();
			$configurationPanel->insertSetting();
			}
			
		if ($jrConfig['minimalconfiguration']!="1" || $thisJRUser->superPropertyManager)
			{
			$configurationPanel->setleft(_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR);
			$configurationPanel->setmiddle($lists['showAvailabilityCalendar']);
			$configurationPanel->setright(_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR_DESC);
			$configurationPanel->insertSetting();
			}
			
		if ($jrConfig['minimalconfiguration']!="1" || $thisJRUser->superPropertyManager)
			{
			$configurationPanel->setleft(_JOMRES_COM_A_SHOWDEPARTUREINPUT);
			$configurationPanel->setmiddle($lists['showdepartureinput']);
			$configurationPanel->setright(_JOMRES_COM_A_SHOWDEPARTUREINPUT_DESC);
			$configurationPanel->insertSetting();
			}
			
		if ( $mrConfig['singleRoomProperty'] != "1" )
			{
			$configurationPanel->setleft(_JOMRES_COM_LIMITROOMSLIST);
			$configurationPanel->setmiddle('<input type="text" class="inputbox" size="5" name="cfg_returnRoomsLimit" value="'.$mrConfig['returnRoomsLimit'].'">');
			$configurationPanel->setright(_JOMRES_COM_LIMITROOMSLIST_DESC);
			$configurationPanel->insertSetting();
			}
			
		$configurationPanel->setleft(_JOMRES_COM_WEEKENDDAYS);
		$configurationPanel->setmiddle($weekenddayDropdown);
		$configurationPanel->setright(_JOMRES_COM_WEEKENDDAYS_DESC);
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