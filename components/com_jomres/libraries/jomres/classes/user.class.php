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
	
class jrportal_user
	{
	function jrportal_user()
		{
		$this->id					= 0;
		$this->manager_uid			= 0; 
		$this->jos_id				= 0;
		$this->portal_booking_id	= 0; 
		$this->username				= ''; 
		$this->email				= '';
		$this->created				= "0000-00-00 00:00:00";
		}	

	function getJUser()
		{
		if ($this->id > 0 )
			{	
			$query = "SELECT 
				id,manager_uid,jos_id,portal_booking_id,username,email,created
				FROM #__jomresportal_users WHERE `id`='$this->id' LIMIT 1";
			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->id					= $r->id;
					$this->manager_uid			= $r->manager_uid; 
					$this->jos_id				= $r->jos_id; 
					$this->portal_booking_id	= $r->portal_booking_id;
					$this->username				= $r->username;
					$this->email				= $r->email;
					$this->created				= $r->created;
					}
				return true;
				}
			else
				{
				if (count($result)==0)
					{
					$this->error = "No users were found with that id";
					return false;
					}
				if (count($result)> 1)
					{
					$this->error = "More than one user was found with that id";
					return false;
					}
				}
			}
		else
			{
			$this->error = "ID of user not available";
			return false;
			}
		}		
	
	function commitNewUser(&$tr)
		{	
		if ($this->id < 1 )
			{			
			$query="INSERT INTO #__jomresportal_users 
				(
				`manager_uid`,
				`jos_id`,
				`portal_booking_id`,
				`username`,
				`email`,
				`created`
				)
				VALUES
				(
				'$this->manager_uid',
				'$this->jos_id',
				'$this->portal_booking_id',
				'$this->username',
				'$this->email',
				'".date("Y-m-d H-i-s")."'
				)";
			$tr->insertQuery($query);
			if ($tr->success)
				{
				$this->id=$tr->insertedId;
				return true;
				}
			else
				{
				$this->error = "ID of user could not be found after apparent successful insert";
				return false;
				}
			}
		$this->error = "ID of user already available. Are you sure you are creating a new user?";
		return false;			
		}
		
	function commitUpdateUser(&$tr)
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomresportal_users SET 
				`manager_uid` 			= '$this->manager_uid',
				`jos_id` 				= '$this->jos_id',
				`portal_booking_id` 	= '$this->portal_booking_id',
				`username` 				= '$this->username',
				`email` 				= '$this->email',
				`created` 				= '$this->created'
				WHERE `id`				= '$this->id'";
			return $tr->insertQuery($query);
			}
		$this->error = "ID of user not available";	
		return false;			
		}

	function deleteUser(&$tr)
		{
		$query="DELETE FROM #__jomresportal_users WHERE `id`='$this->id' LIMIT 1";
		return $tr->insertQuery($query);
		}		

	}

?>