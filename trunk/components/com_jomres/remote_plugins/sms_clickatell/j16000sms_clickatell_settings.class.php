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
 * Delete an optional extra
 #
* @package Jomres
#
 */
class j16000sms_clickatell_settings {
	/**
	#
	 * Constructor:  Delete an optional extra
	#
	 */
	function j16000sms_clickatell_settings()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $ePointFilepath;
		$output=array();
		$pageoutput=array();

		$sms_clickatell_settings = new jrportal_sms_clickatell_settings();
		$sms_clickatell_settings->get_sms_clickatell_settings();

		$output['PAGETITLE'] 		=_JRPORTAL_SMS_CLICKATELL_TITLE;
		$output['HUSERNAME']		=_JRPORTAL_SMS_CLICKATELL_USERNAME;
		$output['HPASSWORD']		=_JRPORTAL_SMS_CLICKATELL_PASSWORD;
		$output['HAPI_ID']		=_JRPORTAL_SMS_CLICKATELL_APIID;
		$output['INSTRUCTIONS']=_JRPORTAL_SMS_CLICKATELL_INSTRUCTIONS;

		$output['USERNAME']	= $sms_clickatell_settings->sms_clickatellConfigOptions['username'];
		$output['PASSWORD']	= $sms_clickatell_settings->sms_clickatellConfigOptions['password'];
		$output['API_ID'] 	= $sms_clickatell_settings->sms_clickatellConfigOptions['api_id'];
		$output['JOMRESTOKEN'] ='<input type="hidden" name="jomrestoken" value="'.jomresSetToken().'"><input type="hidden" name="no_html" value="1">';

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_sms_clickatell_settings');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index2.php?option=com_jomres"),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS."templates" );
		$tmpl->readTemplatesFromInput( 'sms_clickatell_settings.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
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
		return null;
		}
	}
?>