<?php
/**
#
 * JRPortal core file
#
 * @author Vince Wooll <sales@jomres.net>
#
 * @version Jomres 3
#
* @package Jomres
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

class jrportal_taxrate
	{
	function jrportal_taxrate()
		{
		$this->id					= 0;
		$this->code					= '';
		$this->description			= '';
		$this->rate					= 0.00;
		$this->error				= null;
		}


	function getTaxRate()
		{
		if ($this->id > 0 )
			{
			$query = "SELECT
				`id`,`code`,`description`,`rate`
				FROM #__jomresportal_taxrates WHERE `id`=".(int)$this->id." LIMIT 1";

			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->id					= $r->id;
					$this->code					= $r->code;
					$this->description			= $r->description;
					$this->rate					= $r->rate;
					}
				return true;
				}
			else
				{
				if (count($result)==0)
					{
					error_logging(  "No Tax Rates were found with that id");
					return false;
					}
				if (count($result)> 1)
					{
					error_logging(  "More than one Tax Rate rate was found with that id");
					return false;
					}
				}
			}
		else
			{
			error_logging(  "ID of Tax Rate rate not available");
			return false;
			}

		}

	function commitTaxRate()
		{
		if ($this->id < 1 )
			{
			$query="INSERT INTO #__jomresportal_taxrates
				(
				`code`,
				`description`,
				`rate`
				)
				VALUES
				(
				'".(string)$this->code."',
				'".(string)$this->description."',
				'".(float)$this->rate."'
				)";
			$result=doInsertSql($query,"");
			if ($result)
				{
				$this->id=$result;
				return true;
				}
			else
				{
				error_logging(  "ID of Tax Rate could not be found after apparent successful insert");
				return false;
				}
			}
		error_logging(  "ID of Tax Rate already available. Are you sure you are creating a new Commission rate?");
		return false;
		}

	function commitUpdateTaxRate()
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomresportal_taxrates SET
				`code` 					= '$this->code',
				`description` 			= '$this->description',
				`rate` 					= '$this->rate'

				WHERE `id`=".(int)$this->id;
			$result=doInsertSql($query,"");
			if ($result)
				return true;
			else
				{
				error_logging(  "ID of Tax Rate could not be found after apparent successful insert");
				return false;
				}
			}
		error_logging(  "ID of Tax Rate not available");
		return false;
		}

	function deleteTaxRate()
		{
		if ($this->id > 0 )
			{
			$query="DELETE FROM #__jomresportal_taxrates WHERE `id` = ".(int)$this->id;
			$result=doInsertSql($query,"");
			if ($result)
				{
				return true;
				}
			else
				{
				error_logging(  "Could not delete tax rate.");
				return false;
				}
			}
		error_logging(  "ID of Tax Rate not available");
		return false;
		}
	}

?>