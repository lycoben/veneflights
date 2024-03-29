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
 * Constructs the javascript tab booking details page
 #
* @package Jomres
#
 */
class j02265viewbookingnotes {
	/**
	#
	 * Constructor: Constructs the javascript tab booking details page
	#
	 */
	function j02265viewbookingnotes()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		global $MiniComponents;
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		global $task,$Itemid,$thisJRUser,$jomresConfig_live_site;

		if ($task=="editBooking" && $thisJRUser->userIsManager )
			{
			$pageoutput=array();
			$output=array();
			$r=array();
			$defaultProperty=getDefaultProperty();
			$contract_uid	=	jomresGetParam( $_REQUEST, 'contract_uid', 0 );
			if ($contract_uid == 0)
				return;
			$query="SELECT id,timestamp,note FROM #__jomcomp_notes WHERE contract_uid = '".(int)$contract_uid."' AND property_uid = '".(int)$defaultProperty."'";
			$bookingData  = doSelectSql($query);
			if (count($bookingData)==0)
				return;
			foreach ($bookingData as $d)
				{
				$r['NOTE']=$d->note;
				$r['DATETIME']=$d->timestamp;
				$r['EDITLINK']=makePopupLink("?option=com_jomres&task=editnote&popup=1&note_id=".$d->id,jr_gettext('_JOMCOMP_BOOKINGNOTES_EDIT',_JOMCOMP_BOOKINGNOTES_EDIT,$editable=false,$isLink=true));
				$r['DELETELINK']='<a href='.$jomresConfig_live_site.'/index.php?option=com_jomres&task=deletenote&popup=1&note_id='.$d->id.'&contract_uid='.$contract_uid.'>'.jr_gettext('_JOMCOMP_BOOKINGNOTES_DELETE',_JOMCOMP_BOOKINGNOTES_DELETE,$editable=false,$isLink=true).'</a>';
				$rows[]=$r;
				}
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows', $rows );
			$tmpl->readTemplatesFromInput( 'view_notes.html' );
			$this->notesoutput = $tmpl->getParsedTemplate();
			}
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMCOMP_BOOKINGNOTES_EDIT',_JOMCOMP_BOOKINGNOTES_EDIT);
		$output[]		=jr_gettext('_JOMCOMP_BOOKINGNOTES_DELETE',_JOMCOMP_BOOKINGNOTES_DELETE);

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
		return $this->notesoutput;
		}
	}
?>