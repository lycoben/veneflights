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
* @copyright	2005-2007 Vince Wooll
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
	
class remoteQuery
	{
	function remoteQuery($apikey)
		{
		if (strlen($apikey)==0) die("Api key not sent");
		$this->authenticatedCaller	= false;
		$this->availablecommands	= array();
		$this->requestedcommands	= array();
		$this->centric				= false;
		$this->apikey				= $apikey;
		$this->managerid			= 0;
		$this->managerpropertys		= array();
		$this->propertyid			= 0;
		}

	function init($commandStr)
		{
		global $MiniComponents;
		if (strlen($this->apikey)==0) die("Api key not sent");
		$this->apikey				= $this->apikey;

		$this->authenticatecaller();
		$this->checkmanagercentric();
		$this->checkpropertycentric();
		$this->setcommandsarrays($commandStr);
		
		$returnedData=array();
		
		if ( $this->centric == "manager" )
			{
			$this->getmanagerspropertys();
			foreach ($this->availablecommands as $c)
				{
				$returnedData[$c]=$MiniComponents->specificEvent('20003',$c,$componentArgs=array('properties'=>$this->managerpropertys) );
				}
			}
		if ( $this->centric == "property" )
			{
			$this->getmanagerspropertys();
			foreach ($this->availablecommands as $c)
				{
				$returnedData[$c]=$MiniComponents->specificEvent('20003',$c,$componentArgs=array($this->propertyid) );
				}
			}

		return $returnedData;
		}
		
	function setcommandsarrays($commandStr)
		{
		global $MiniComponents;
		if (!$this->authenticatedCaller) return;
		$commands = array();
		if (strlen($commandStr)>0)
			{
			$commands=explode("~",$commandStr);
			}
		if (count($commands)>0)
			{
			foreach ($commands as $c)
				{
				$dirty = (string) $c;
				$clean1=RemoveXSS($dirty);
				$clean2 =strip_tags ($clean1);
				$this->requestedcommands[]=trim($clean2);
				}
			}
		$availableCommands=array();
		$MiniComponents->triggerEvent('20002');
		$commandsArray=$MiniComponents->getAllEventPointsData('20002');
		foreach ($commandsArray as $c)
			{
			if ($c['centric']==$this->centric)
				$availableCommands[]=$c['command'];
			}
		$this->availablecommands=$availableCommands;
		}
		
	function authenticatecaller()
		{
		$found=false;
		$query = "SELECT apikey FROM #__jomres_managers WHERE apikey = '".$this->apikey."' LIMIT 1";
		$mList=doSelectSql($query);
		if (count($mList)>0)
			$found=true;
		$query = "SELECT apikey FROM #__jomres_propertys WHERE apikey = '".$this->apikey."' LIMIT 1";
		$pList=doSelectSql($query);
		if (count($pList)>0)
			$found=true;
		$this->authenticatedCaller=$found;
		}

	function checkmanagercentric()
		{
		if (!$this->authenticatedCaller) return;
		$query = "SELECT userid FROM #__jomres_managers WHERE apikey = '".$this->apikey."' LIMIT 1";
		$mList=doSelectSql($query);
		if (count($mList)>0)
			{
			$this->centric		= "manager";
			foreach ($mList as $m)
				{
				$this->managerid = (int)$m->userid;
				}
			}
		}

	function checkpropertycentric()
		{
		if (!$this->authenticatedCaller) return;
		$query = "SELECT propertys_uid FROM #__jomres_propertys WHERE apikey = '".$this->apikey."' LIMIT 1";
		$pList=doSelectSql($query);
		if (count($pList)>0)
			{
			$this->centric		= "property";
			$this->propertyid = (int)$property;
			foreach ($pList as $p)
				{
				$this->propertyid = (int)$p->propertys_uid;
				}
			}
		}

	function getmanagerspropertys()
		{
		if ($this->managerid == 0 ) 
			$this->managerpropertys = array();
		else
			{
			$managersPropertys=array();
			$query="SELECT property_uid FROM #__jomres_managers_propertys_xref WHERE manager_id = '".(int)$this->managerid."'";
			$result=doSelectSql($query); 
			foreach ($result as $r)
				{
				$managersPropertys[]=$r->property_uid;
				}
			$this->managerpropertys = $managersPropertys;
			}
		}

	}

?>