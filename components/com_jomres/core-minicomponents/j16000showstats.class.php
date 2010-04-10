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

class j16000showstats
	{
	function j16000showstats()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		global $indexphp,$MiniComponents,$jomresConfig_live_site;
		$pageoutput=array();
		$output=array();
		$rows=array();

		$MiniComponents->triggerEvent('16010');  // Separate stat type options
		$mcOutput=$MiniComponents->getAllEventPointsData('16010');
		if (count($mcOutput)>0)
			{
			$statoptions="";
			foreach ($mcOutput as $key=>$val)
				{
				$r=array();
				$r['STAT']='<a href="index2.php?option=com_jomres&task=getstats&statoption='.$val['task'].'">'.$val['text'].'</a><br/>';
				$rows[]=$r;
				}
			}

		$jrtbar = new jomres_toolbar();
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel',$indexphp."?option=com_jomres",_JRPORTAL_CANCEL);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['STATOPTIONS']=$statoptions;
		$output['LIVESITE']=$jomresConfig_live_site;
		$output['PAGETITLE']	= _JRPORTAL_STATS_PATETITLE;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_ADMINISTRATOR );
		$tmpl->readTemplatesFromInput( 'show_stats.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);

		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}