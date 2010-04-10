<?php
#
/**
#
* @copyright 2006 Vince Wooll
#
* This is not free software, please do not distribute it. For licencing information, please visit http://www.jomres.net/
* All rights reserved.
 */ 
 
if (defined('JPATH_BASE'))
	defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );
else
	defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
#
 * Insert some data into the property header
 #
* @package Jomres
#
 */
class j01011a_property_list_propertytype
	{
	/**
	#
	 * Constructor: Let's gather the data we want.
	#
	 */
	function j01011a_property_list_propertytype($componentArgs)
		{
		$property_uid=$componentArgs['property_uid'];
		$this->returnValue=array();
		$pdeets=getPropertyAddressForPrint($property_uid);
		$thisJomresPropertyDetails=$pdeets[3];
		$ptype_id=$thisJomresPropertyDetails['ptype_id'];
		$query="SELECT ptype FROM #__jomres_ptypes WHERE `id` = '".$ptype_id."' LIMIT 1";
		$type = doSelectSql($query,1);
		$this->returnValue=array('PTYPE'=>$type);
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