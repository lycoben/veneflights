<?php
/**
#
 * Mini-component core file: Constructs and displays tariff list
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
 * Constructs and displays tariff list
 #
* @package Jomres
#
 */
class j02210listtariffs {
	/**
	#
	 * Constructor: Constructs and displays tariff list - admin side
	#
	 */
	function j02210listtariffs()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $mrConfig, $Itemid,$jrConfig;
		if ( $mrConfig['tariffmode']=="2")
			$this->tpl=$MiniComponents->triggerEvent('02211'); //
		else
			{
			$defaultProperty=getDefaultProperty();
		 	if ($jrConfig['useGlobalRoomTypes']=="1")
				$roomTypeSearchParameter="0";
			else
				$roomTypeSearchParameter=$defaultProperty;
			$query="SELECT rates_uid,rate_title,rate_description,validfrom,validto,roomrateperday,mindays,maxdays,minpeople,maxpeople,roomclass_uid,ignore_pppn,allow_ph,allow_we,weekendonly,property_uid FROM #__jomres_rates WHERE property_uid = '".(int)$defaultProperty."' ORDER BY roomclass_uid,validfrom,rate_description";
			$tariffList =doSelectSql($query);

			foreach($tariffList as $tariff)
				{
				$rw=array();
				$tariffRoomClass=$tariff->roomclass_uid;
				$roomClassAbbv="";
				if ($tariffRoomClass!="")
					{
					$query="SELECT room_class_abbv FROM #__jomres_room_classes WHERE room_classes_uid = '".(int)$tariffRoomClass."' AND property_uid = '".(int)$roomTypeSearchParameter."'";
					$classList =doSelectSql($query);
					foreach($classList as $rclass)
						{
						$roomClassAbbv=$rclass->room_class_abbv;
						}
					}
				if ($tariff->ignore_pppn)
					$ignore_pppn=jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES);
				else
					$ignore_pppn=jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO);

				if ($tariff->allow_ph)
					$allow_ph=jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES);
				else
					$allow_ph=jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO);

				if ($tariff->allow_we)
					$allow_we=jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES);
				else
					$allow_we=jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO);

				if ($tariff->weekendonly)
					$weekendonly=jr_gettext('_JOMRES_COM_MR_YES',_JOMRES_COM_MR_YES);
				else
					$weekendonly=jr_gettext('_JOMRES_COM_MR_NO',_JOMRES_COM_MR_NO);

				$jrtbar = new jomres_toolbar();
				$jrtb  = $jrtbar->startTable();
				$jrtb .= $jrtbar->toolbarItem('edit',jomresURL("index.php?option=com_jomres&task=editTariff&Itemid=$Itemid&tariffUid=".($tariff->rates_uid) ),'');
				$jrtb .= $jrtbar->toolbarItem('copy',jomresURL("index.php?option=com_jomres&task=editTariff&Itemid=$Itemid&tariffUid=".($tariff->rates_uid)."&clone=1"),'');
				$jrtb .= $jrtbar->endTable();
				$rw['LINKTEXT']=$jrtb;

				$rw['RATETITLE']		=jr_gettext('_JOMRES_CUSTOMTEXT_TARIFF_TITLE'.$tariff->rates_uid,stripslashes($tariff->rate_title));
				$rw['RATEDESCRIPTION']		=jr_gettext('_JOMRES_CUSTOMTEXT_TARIFF_DESCRIPTION'.$tariff->rates_uid,stripslashes($tariff->rate_description));
				$rw['VALIDFROM']		=outputDate($tariff->validfrom);
				$rw['VALIDTO']			=outputDate($tariff->validto);
				$rw['ROOMRATEPERDAY']	=$mrConfig['currency'].($tariff->roomrateperday);
				$rw['MINDAYS']			=$tariff->mindays;
				$rw['MAXDAYS']			=$tariff->maxdays;
				$rw['MINPEOPLE']		=$tariff->minpeople;
				$rw['MAXPEOPLE']		=$tariff->maxpeople;
				$rw['ROOMCLASS']		=$roomClassAbbv;
				$rw['IGNOREPPN']		=$ignore_pppn;
				$rw['ALLOWWE']			=$allow_we;
				$rw['WEEKENDONLY']		=$weekendonly;
				$rows[]=$rw;
				}

			$output['HLINKTEXT']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_LINKTEXT',_JOMRES_COM_MR_LISTTARIFF_LINKTEXT);
			$output['HLINKTEXTCLONE']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE',_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE);
			$output['HRATETITLE']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_RATETITLE',_JOMRES_COM_MR_LISTTARIFF_RATETITLE) ;
			$output['HRATEDESCRIPTION']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_RATEDESCRIPTION',_JOMRES_COM_MR_LISTTARIFF_RATEDESCRIPTION);
			$output['HVALIDFROM']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',_JOMRES_COM_MR_LISTTARIFF_VALIDFROM);
			$output['HVALIDTO']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO',_JOMRES_COM_MR_LISTTARIFF_VALIDTO);

			if ($mrConfig['tariffChargesStoredWeeklyYesNo']=="1")
				$output['HROOMRATEPERDAY']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK);
			else
				$output['HROOMRATEPERDAY']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY);
			$output['HMINDAYS']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MINDAYS',_JOMRES_COM_MR_LISTTARIFF_MINDAYS);
			$output['HMAXDAYS']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MAXDAYS',_JOMRES_COM_MR_LISTTARIFF_MAXDAYS);
			$output['HMINPEOPLE']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MINPEOPLE',_JOMRES_COM_MR_LISTTARIFF_MINPEOPLE);
			$output['HMAXPEOPLE']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MAXPEOPLE',_JOMRES_COM_MR_LISTTARIFF_MAXPEOPLE);
			$output['HROOMCLASS']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS',_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS);
			$output['HIGNOREPPN']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_IGNOREPPN',_JOMRES_COM_MR_LISTTARIFF_IGNOREPPN);
			$output['HALLOWWE']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ALLOWWE',_JOMRES_COM_MR_LISTTARIFF_ALLOWWE);
			$output['HWEEKENDONLY']=jr_gettext('_JOMRES_COM_WEEKENDONLY',_JOMRES_COM_WEEKENDONLY);

			$jrtbar = new jomres_toolbar();
			$jrtb  = $jrtbar->startTable();
			$jrtb .= $jrtbar->toolbarItem('new',jomresURL("index.php?option=com_jomres&task=editTariff&amp;Itemid=$Itemid"),'');
			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres&Itemid=$Itemid"),'');
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;

			$output['pagetitle']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_TITLE',_JOMRES_COM_MR_LISTTARIFF_TITLE);
			$output['ITEMID']=$Itemid;

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'list_tariffs.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows', $rows );
			$this->tpl=$tmpl->getParsedTemplate();
			}
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_LINKTEXT',_JOMRES_COM_MR_LISTTARIFF_LINKTEXT);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE',_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_RATETITLE',_JOMRES_COM_MR_LISTTARIFF_RATETITLE) ;
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_RATEDESCRIPTION',_JOMRES_COM_MR_LISTTARIFF_RATEDESCRIPTION);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',_JOMRES_COM_MR_LISTTARIFF_VALIDFROM);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO',_JOMRES_COM_MR_LISTTARIFF_VALIDTO);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERWEEK);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY',_JOMRES_COM_MR_LISTTARIFF_ROOMRATEPERDAY);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MINDAYS',_JOMRES_COM_MR_LISTTARIFF_MINDAYS);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MAXDAYS',_JOMRES_COM_MR_LISTTARIFF_MAXDAYS);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MINPEOPLE',_JOMRES_COM_MR_LISTTARIFF_MINPEOPLE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_MAXPEOPLE',_JOMRES_COM_MR_LISTTARIFF_MAXPEOPLE);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS',_JOMRES_COM_MR_LISTTARIFF_ROOMCLASS);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_IGNOREPPN',_JOMRES_COM_MR_LISTTARIFF_IGNOREPPN);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_ALLOWWE',_JOMRES_COM_MR_LISTTARIFF_ALLOWWE);
		$output[]		=jr_gettext('_JOMRES_COM_WEEKENDONLY',_JOMRES_COM_WEEKENDONLY);
		$output[]		=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_TITLE',_JOMRES_COM_MR_LISTTARIFF_TITLE);

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
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->tpl;
		}
	}

?>
