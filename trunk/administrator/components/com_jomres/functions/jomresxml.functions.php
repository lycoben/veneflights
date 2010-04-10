<?php
/**
#
 * XML parsing core file
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

global $logFiles,$xmlelements;

$logFiles=array('system'=>'jomres_system_log.xml','request'=>'jomres_request_log.xml','gateway'=>'jomres_gateway_log.xml','booking'=>'jomres_booking_log.xml','error'=>'jomres_error_log.xml','jrportalquery'=>'jrportalquery_log.xml');
$systemElements=array('root'=>'systemlog','entry'=>'systemlogentry');
$requestElements=array('root'=>'requestlog','entry'=>'requestlogentry');
$gatewayElements=array('root'=>'gatewaylog','entry'=>'gatewaylogentry');
$bookingElements=array('root'=>'bookinglog','entry'=>'bookinglogentry');
$errorElements=array('root'=>'errorlog','entry'=>'errorlogentry');
$jrportalqueryElements=array('root'=>'jrportalquerylog','entry'=>'jrportalquerylogentry');

$xmlelements=array('system'=>$systemElements,'request'=>$requestElements,'gateway'=>$gatewayElements,'booking'=>$bookingElements,'error'=>$errorElements,'jrportalquery'=>$jrportalqueryElements);

function listLogs()
	{
	global $jrConfig,$jomresConfig_absolute_path,$logFiles,$jomresAdminPath;

	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres",'');
	$jrtb .= $jrtbar->endTable();
	
	$output['JOMRESTOOLBAR']=$jrtb;

	$output=array();
	$pageoutput=array();
	$rows=array();
	
	$output['PAGETITLE']=JOMRES_COM_A_AVAILABLELOGS;
	$counter=0;
	if (count($logFiles) > 0)
		{
		foreach ($logFiles as $key=>$file)
			{
			if (file_exists(JOMRES_SYSTEMLOG_PATH.$file))
				{
				$r=array("LOGFILELINK"=>'<a href="index2.php?option=com_jomres&task=showLog&logfile='.$key.'">'.ucwords($key)."</a>");
				$rows[]=$r;
				$counter++;
				}
			}
		}
	
	if ($counter==0)
		echo JOMRES_COM_A_LOGS_NOENTRIES;
	else
		{
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
		$tmpl->readTemplatesFromInput( 'list_logs.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}
	}

function showLog()
	{
	global $jrConfig,$jomresConfig_absolute_path,$logFiles,$xmlelements,$jomresConfig_live_site;
	global $xml_entry_key,$rows,$jomresAdminPath,$counter,$lastdata,$xmlelements;
	$logfile = jomresGetParam( $_REQUEST, 'logfile',	'' );
	$pageoutput=array();
	$output=array();
	$rows=array();
	$temp=array();

	$output['TITLE']="".$logFiles[$logfile]." Log";
	$output['DATETIME']='datetime';
	$output['JOMRESSESSION']='jomressession';
	$output['TASK']='task';
	$output['REQUESTURI']='requesturi';
	$output['MESSAGE']=JOMRES_COM_A_MESSAGE;
	$output['DELETE']=_JOMRES_COM_MR_ROOM_DELETE;
	$output['DELETELINK']='index2.php?option=com_jomres&task=clearLog&logfile='.$logfile;
	$output['LIVESITE']=$jomresConfig_live_site;
	$output['BACKLINK']='<a href="javascript:submitbutton(\'listLogs\')">'._JOMRES_COM_MR_BACK.'</a>';

	if (file_exists(JOMRES_SYSTEMLOG_PATH.$logFiles[$logfile]) )
		{
		$counter=0;
		$theElements=$xmlelements[$logfile];
		$xml_root_key=$theElements['root'];
		//$xml_entry_key=$theElements['entry'];
		$xml_file = JOMRES_SYSTEMLOG_PATH.$logFiles[$logfile];
		
		if (!($fp = fopen($xml_file, 'r')))
			{
			die("Could not open $xml_file for parsing!\n");
			}
		$xml="";
		while ($data = fgets($fp, 8192))
			{
			$xml.=$data;
			}
			
		$p = new jomresXMLParser($xml);
		$result=$p->getOutput($xml);
		$counter=0;
		foreach ($result[$xml_root_key] as $res)
			{
			$r=array();
			$r['COUNTER']=$counter;
			$r['DATETIME']=$res['datetime'];
			$r['TASK']=$res['requesturi'];
			$r['MESSAGEFULL']=$res['message'];
			$r['JOMRESSESSION']=$res['jomressession'];
			$r['LIVESITE']=$jomresConfig_live_site;
			$rows[]=$r;
			$counter++;
			}
		}
	$jrtbar = new jomres_toolbar();
	$jrtb  = $jrtbar->startTable();
	$jrtb .= $jrtbar->toolbarItem('cancel',"index2.php?option=com_jomres&task=listLogs",'');
	$jrtb .= $jrtbar->endTable();
	$output['{JOMRESTOOLBAR}']=$jrtb;

	$pageoutput[]=$output;
		
	$tmpl = new patTemplate();
	$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
	$tmpl->readTemplatesFromInput( 'logfileoutput.html');
	$tmpl->addRows( 'pageoutput',$pageoutput);
	$tmpl->addRows( 'rows',$rows);
	$tmpl->displayParsedTemplate();
	}
	


function characterData($parser, &$data){
	global $current_tag, $temp, $jomresConfig_live_site;
	global $lastdata, $lastTag;
	$temp['LIVESITE']=$jomresConfig_live_site;
		switch($current_tag)
			{
			case 'DATETIME':
				$temp['datetime'] .= $data;
				break;
			case 'JOMRESSESSION':
				$temp['jomressession'] .= $data;
				break;
			case 'TASK':
				$temp['task'] .= $data;
				break;
			case 'REQUESTURI':
				$temp['requesturi'] .= $data;
				break;
			case 'MESSAGE':
				$temp['messagefull'] .= $data;
				break;
			default:
				break;
			}
	}

function startElement($parser, $name, $attrs=''){
	global $open_tags, $temp, $current_tag,$xml_entry_key;
	$current_tag = $name;
	switch($name)
		{
		case strtoupper($xml_entry_key):
		break;
		default:
		break;
		}
	}

function endElement($parser, $name, $attrs=''){
	global $close_tags, $temp, $current_tag,$xml_entry_key;
	switch($name)
		{
		case strtoupper($xml_entry_key):
		return_page($temp);
		$temp = array();
		break;
		default:
		break;
		}
	}

function return_page()
	{
	global $temp,$rows,$counter;

	$counter++;
	 if ($counter % 2)
		$temp['style'] ="odd";
	else
		$temp['style'] ="even";

	$temp['counter'] =$counter;
	$rows[]=$temp;
	}

function clearLog()
	{
	global $jrConfig,$jomresConfig_absolute_path,$jomresConfig_absolute_path,$logFiles;
	$jomres_systemLog_path=$jomresConfig_absolute_path.$jrConfig['jomres_systemLog_path'];
	$logfile = jomresGetParam( $_REQUEST, 'logfile',	'' );
	if (file_exists($jomres_systemLog_path.$logFiles[$logfile]) && is_writable($jomres_systemLog_path.$logFiles[$logfile]) )
		{
		if (unlink ($jomres_systemLog_path.$logFiles[$logfile]) )
			$msg= "Deleted";
		else
			$msg= "Not deleted. Check that the web server can has write access";
		}
	jomresRedirect( "index2.php?option=com_jomres&task=listLogs", $msg);
	}
?>