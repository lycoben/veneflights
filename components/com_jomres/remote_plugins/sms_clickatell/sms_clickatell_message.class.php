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

class jrportal_sms_clickatell_message
	{
	function jrportal_sms_clickatell_message()
		{
		$this->id				= 0;
		$this->username			= '';
		$this->number			= '';
		$this->message			= '';
		$this->property_uid		= 0;
		$this->send_time		= '';
		$this->ack				= 0;
		$this->apiMsgid			= '';
		}
  
	function getMessage()
		{
		if ($this->id > 0 )
			{
			$query = "SELECT
				`id`,`username`,`number`,`message`,`property_uid`,`send_time`,`ack`,`apiMsgid`
				FROM #__jomresportal_sms_clickatell_messages WHERE `id`='$this->id' LIMIT 1";

			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->id				= $r->id;
					$this->username			= $r->username;
					$this->number			= $r->number;
					$this->message			= $r->message;
					$this->property_uid		= $r->property_uid;
					$this->send_time		= $r->send_time;
					$this->ack				= $r->ack;
					$this->apiMsgid			= $r->apiMsgid;
					}
				return true;
				}
			else
				{
				if (count($result)==0)
					{
					error_logging( "No Messages were found with that id");
					return false;
					}
				if (count($result)> 1)
					{
					error_logging("More than one Message was found with that id");
					return false;
					}
				}
			}
		else
			{
			error_logging( "ID of Message not available");
			return false;
			}
		}

	function commitNewMessage()
		{
		if ($this->id < 1 )
			{
			$query="INSERT INTO #__jomresportal_sms_clickatell_messages
				(
				`username`,
				`number`,
				`message`,
				`property_uid`,
				`send_time`,
				`ack`,
				`apiMsgid`
				)
				VALUES
				(
				'".(string)$this->username."',
				'".(string)$this->number."',
				'".(string)$this->message."',
				'".(int)$this->property_uid."',
				'".date( 'Y-m-d H:i:s' )."',
				'".(int)$this->ack."',
				''
				)";
			$id=doInsertSql($query,"");
			if ($id)
				{
				$this->id=$id;
				return true;
				}
			else
				{
				error_logging( "ID of Message could not be found after apparent successful insert");
				return false;
				}
			}
		error_logging( "ID of Message already available. Are you sure you are creating a new Message?");
		return false;
		}

	function commitUpdateMessage()
		{
		if ($this->id > 0 )
			{
			$query="UPDATE #__jomresportal_sms_clickatell_messages SET
				`username`		= '".(string)$this->username."',
				`number`		= '".(string)$this->number."',
				`message`		= '".(string)$this->message."',
				`property_uid`	= '".(int)$this->property_uid."',
				`send_time`		= '".(string)$this->send_time."',
				`ack`			= '".(int)$this->ack."',
				`apiMsgid`		= '".(string)$this->apiMsgid."'
				WHERE `id`='$this->id'";
			return doInsertSql($query,"");
			}
		error_logging( "ID of Message not available");
		return false;
		}

	}

?>