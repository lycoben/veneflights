<?php
/**
#
 * Mini-component core file: Configuration panel plugin. Constructs various Single Room Property related configuration options
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
 * Configuration panel for Single room propertys
 #
* @package Jomres
#
 */
class j00501srps {
	/**
	#
	 * Constructor: Outputs inputs for configuring single room propertys
	#
	 */
	function j00501srps($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $configurationPanel,$jrConfig,$thisJRUser;
		$lists=$componentArgs['lists'];
		$mrConfig=$componentArgs['mrConfig'];
		$weekdayDropdown=$componentArgs['weekdayDropdown'];
		$fixedArrivalDatesRecurring=$componentArgs['fixedArrivalDatesRecurring'];

		$configurationPanel->startPanel("SRPs");

		if (JOMRES_SINGLEPROPERTY) // Allows Solo users to change the type from SRP to MRP and vice versa. Nobody else can do this.
			{
			$configurationPanel->setleft(_JOMRES_COM_A_SINGLEROOMPROPERTY);
			$configurationPanel->setmiddle($lists['singleRoomProperty']);
			$configurationPanel->setright(_JOMRES_COM_A_SINGLEROOMPROPERTY_DESC);
			$configurationPanel->insertSetting();
			}
		
		$configurationPanel->setleft(_JOMRES_COM_A_TARIFFPRICESAREWEEKLY);
		$configurationPanel->setmiddle($lists['tariffChargesStoredWeeklyYesNo']);
		$configurationPanel->setright(_JOMRES_COM_A_TARIFFPRICESAREWEEKLY_DESC);
		$configurationPanel->insertSetting();
		if ($jrConfig['minimalconfiguration']!="1" || $thisJRUser->superPropertyManager)
			{
			$configurationPanel->setleft(_JOMRES_COM_A_SHOWONLYAVLCAL);
			$configurationPanel->setmiddle($lists['showOnlyAvailabilityCalendar']);
			$configurationPanel->setright(_JOMRES_COM_A_SHOWONLYAVLCAL_DESC);
			$configurationPanel->insertSetting();
			}
		$configurationPanel->setleft(_JOMRES_COM_A_FIXEDPERIODBOOKINGS);
		$configurationPanel->setmiddle($lists['fixedPeriodBookings']);
		$configurationPanel->setright(_JOMRES_COM_A_FIXEDPERIODBOOKINGS_DESC);
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_FIXEDPERIOD);
		$configurationPanel->setmiddle('<input type="text" class="inputbox"  size="5" name="cfg_fixedPeriodBookingsNumberOfDays" value="'.$mrConfig['fixedPeriodBookingsNumberOfDays'].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_FIXEDPERIOD_NUMBEROFPERIODS);
		$configurationPanel->setmiddle('<input type="text" class="inputbox"  size="5" name="cfg_numberofFixedPeriods" value="'.$mrConfig['numberofFixedPeriods'].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_FIXEDPERIODBOOKINGSSHORT);
		$configurationPanel->setmiddle($lists['fixedPeriodBookingsShortYesNo']);
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_A_FIXEDPERIOD_SHORTBREAK_DAYS);
		$configurationPanel->setmiddle('<input type="text" class="inputbox"  size="5" name="cfg_fixedPeriodBookingsShortNumberOfDays" value="'.$mrConfig['fixedPeriodBookingsShortNumberOfDays'].'" />');
		$configurationPanel->setright();
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO);
		$configurationPanel->setmiddle($lists['fixedArrivalDateYesNo']);
		$configurationPanel->setright(_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO_DESC);
		$configurationPanel->insertSetting();

		$configurationPanel->setleft(_JOMRES_COM_MR_FIXEDARRIVALDATE_DAY);
		$configurationPanel->setmiddle($weekdayDropdown);
		$configurationPanel->setright();
		$configurationPanel->insertSetting();
		if ($jrConfig['minimalconfiguration']!="1" || $thisJRUser->superPropertyManager)
			{
			$configurationPanel->setleft(_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING);
			$configurationPanel->setmiddle($fixedArrivalDatesRecurring);
			$configurationPanel->setright(_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING_DESC);
			$configurationPanel->insertSetting();
			}
			
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