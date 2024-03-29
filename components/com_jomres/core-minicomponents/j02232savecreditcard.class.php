<?php
/**
#
 * Mini-component core file: Saves credit card data saved by the receptionist/manager when editing a customer's details
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
 * Saves credit card data saved by the receptionist/manager when editing a customer's details
 #
* @package Jomres
#
 */
class j02232savecreditcard {
	/**
	#
	 * Constructor: Saves credit card data saved by the receptionist/manager when editing a customer's details
	#
	 */
	function j02232savecreditcard()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $mrConfig,$mykey,$jomresConfig_secret;
		if (!jomresCheckToken()) {trigger_error ("Invalid token", E_USER_ERROR);}
		$defaultProperty=getDefaultProperty();
		$guestUid			= intval(jomresGetParam( $_POST, 'guestUid', 0 ) );
		if ($guestUid)
			{
			$iss_mon            = intval( jomresGetParam( $_POST, 'iss_mon', 0 ) );
			$iss_year           = intval( jomresGetParam( $_POST, 'iss_year', 0 ) );
			$expiry_mon         = intval( jomresGetParam( $_POST, 'expiry_mon', 0 ) );
			$expiry_year        = intval( jomresGetParam( $_POST, 'expiry_year', 0 ) );
			$issueno            = intval( jomresGetParam( $_POST, 'issueno', 0 ) );
			$ccv	            = intval( jomresGetParam( $_POST, 'ccv', 0 ) );
			$ccard_no	        = getEscaped( jomresGetParam( $_POST, 'ccard_no', "" ) );
			$ccard_name         = getEscaped( jomresGetParam( $_POST, 'ccard_name', "" ) );
			$issued=$iss_mon.'/'.$iss_year;
			$expires=$expiry_mon.'/'.$expiry_year;
			$query="UPDATE #__jomres_guests SET
			`ccard_no`=ENCODE('$ccard_no', '$jomresConfig_secret'),
			`ccard_issued`=ENCODE('$issued', '$jomresConfig_secret'),
			`ccard_expiry`=ENCODE('$expires', '$jomresConfig_secret'),
			`ccard_iss_no`=ENCODE('$issueno', '$jomresConfig_secret'),
			`ccard_name`=ENCODE('$ccard_name', '$jomresConfig_secret'),
			`ccv`=ENCODE('$ccv', '$jomresConfig_secret')
			WHERE guests_uid = '".(int)$guestUid."' AND property_uid = '".(int)$defaultProperty."' ";
			if (!doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_CREDITCARD_UPDATED',_JOMRES_MR_AUDIT_CREDITCARD_UPDATED,FALSE))) trigger_error ("Unable to save creditcard data to table", E_USER_ERROR);
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'save_creditcard.html' );
			$tmpl->displayParsedTemplate();
			}
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