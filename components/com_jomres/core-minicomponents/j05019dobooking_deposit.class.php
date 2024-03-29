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

/**
#
 * Insert some data into the property header
 #
* @package Jomres
#
 */
 // First let's create our class name. The class name should be the same as the file name, eg this file name is called j01070atest.class.php, so this class MUST be called j01070atest
class j05019dobooking_deposit
	{
	/**
	#
	 * Constructor: Let's gather the data we want.
	#
	 */
	function j05019dobooking_deposit()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global  $tmpBookingHandler, $thisJRUser;


		if (!$thisJRUser->userIsManager)
			return;

		if ( !isset($tmpBookingHandler->tmpbooking["amend_contract"]) )
			return;

		if ($tmpBookingHandler->tmpbooking["amend_contract"] == 0)
			return;

		$newTask			= "handlereq_deposit";
		$inputName			= "overdeposit";
		$defaultValue		= "";
		if (isset($tmpBookingHandler->tmpbooking["override_contract_deposit"]) && ($tmpBookingHandler->tmpbooking["override_contract_deposit"] != "") )
			{
			$currfmt 		= new jomres_currency_format();
			$defaultValue	= $currfmt->get_formatted($tmpBookingHandler->tmpbooking["override_contract_deposit"]);
			}

		$bookingFormInsert['DEPOSIT_HEADER']	= jr_gettext('_JOMCOMP_AMEND_OVERRIDE_DEPOSIT',_JOMCOMP_AMEND_OVERRIDE_DEPOSIT,false);
		$bookingFormInsert['DEPOSIT_INPUT']		= '<input class="inputbox" size="12" type="text" id="'.$inputName.'" value="'.$defaultValue.'" onChange="jomresAjax_'.$newTask.'(this.value)">';
		$bookingFormInsert['DEPOSIT_AJAXSTRING']=
			'<script>
			jQuery(document).ready(function() {
				/**
				 * We show a simple loading indicator
				 * using the jQuery ajax events
				 */
				});

			function jomresAjax_'.$newTask.'(value){
				var params = {
				option: "com_jomres",
				task: "'.$newTask.'",
				no_html: "1",
				'.$inputName.': value
				};
				var tosend = value;
				jQuery.ajax({
				type: "GET",
				url: "index2.php",
				async: false,
				data: params,
				dataType: "script"
				})
				};
			</script>';

		$this->returnValue		= $bookingFormInsert;
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMCOMP_AMEND_OVERRIDE_DEPOSIT',_JOMCOMP_AMEND_OVERRIDE_DEPOSIT);

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
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
		return $this->returnValue;
		}
	}
?>