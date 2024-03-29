<?php
/**
* Author Tab Class for handling the CB tab api
* @version $Id: cb.authortab.php 605 2006-11-23 14:41:46Z beat $
* @package Community Builder
* @subpackage cb.authortab.php
* @author JoomlaJoe
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// ensure this file is being included by a parent file
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }


class getAuthorTab extends cbTabHandler {
	
	function getAuthorTab() {
		$this->cbTabHandler();
	}
	
	function getDisplayTab($tab,$user,$ui) {
		global $_CB_framework, $_CB_database, $mainframe;
		$return="";
		
		$now = date( 'Y-m-d H:i:s', time() + $_CB_framework->getCfg( 'offset' ) * 60 * 60 );
		$query = "SELECT a.id, a.title, a.hits,a.created, ROUND( r.rating_sum / r.rating_count ) AS rating,r.rating_count"
		. "\n FROM #__content AS a"
		. "\n LEFT JOIN #__content_rating AS r ON r.content_id=a.id"
		. "\n INNER JOIN #__sections AS s ON s.id=a.sectionid AND s.title != 'Mamblog'"
		. "\n WHERE a.created_by=". (int) $user->id .""
		. "\n AND a.state = 1 "
		. "\n AND (publish_up = '0000-00-00 00:00:00' OR publish_up <= '$now')"
		. "\n AND (publish_down = '0000-00-00 00:00:00' OR publish_down >= '$now')"
		. "\n AND a.access <= " . (int) $_CB_framework->myCmsGid()
		. "\n ORDER BY a.created DESC"
		;
		$_CB_database->setQuery( $query );
		//print $_CB_database->getQuery();
		$items = $_CB_database->loadObjectList();
		if(!count($items)>0) {
			$return .= "<br /><br /><div class=\"sectiontableheader\" style=\"text-align:left;width:95%;\">";
			$return .= _UE_NOARTICLES;
			$return .= "</div>";
			return $return;
		}

		$return .= $this->_writeTabDescription( $tab, $user );
		
		$artURL="index.php?option=com_content&amp;task=view&amp;id=";
		$return .= "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" width=\"95%\">";
		$return .= "<tr class=\"sectiontableheader\">";
		$return .= "<th>"._UE_ARTICLEDATE."</th>";
		$return .= "<th>"._UE_ARTICLETITLE."</th>";
		if($_CB_framework->getCfg( 'hits' )) $return .= "<th>"._UE_ARTICLEHITS."</th>";
		if($_CB_framework->getCfg( 'vote' )) $return .= "<th>"._UE_ARTICLERATING."</th>";
		$return .= "</tr>";
		$i=1;
		$hits="";
		$rating="";
		foreach($items AS $item) {
        	if ( isset( $mainframe ) && is_callable( array( $mainframe, "getItemid" ) ) ) {
            	$itemid	= $mainframe->getItemid( $item->id );
        	} elseif (is_callable( "JApplicationHelper::getItemid" ) ) {
        		$itemid	= JApplicationHelper::getItemid( $item->id );
        	} else {
        		$itemid = null;
        	}
        	$itemidtxt	= $itemid ? "&amp;Itemid=" . (int) $itemid : "";
			$i= ($i==1) ? 2 : 1;
			if (is_callable(array("mosAdminMenus","ImageCheck"))) {
				$starImageOn = mosAdminMenus::ImageCheck( 'rating_star.png', '/images/M_images/' );
				$starImageOff = mosAdminMenus::ImageCheck( 'rating_star_blank.png', '/images/M_images/' );
			} else {			// Mambo 4.5.0:
				$starImageOn  = '<img src="'.$_CB_framework->getCfg( 'live_site' ).'/images/M_images/rating_star.png" alt="" align="middle" style="border:0px;" />';
				$starImageOff = '<img src="'.$_CB_framework->getCfg( 'live_site' ).'/images/M_images/rating_star_blank.png" alt="" align="middle" style="border:0px;" />';
			}
			$img="";
			if($_CB_framework->getCfg( 'vote' )) {
				for ($j=0; $j < $item->rating; $j++) {
					$img .= $starImageOn;
				}
				for ($j=$item->rating; $j < 5; $j++) {
					$img .= $starImageOff;
				}

				$rating = '<td><span class="content_rating">';
				$rating .= $img . '&nbsp;/&nbsp;';
				$rating .= intval( $item->rating_count );
				$rating .= "</span></td>\n";
			}
			if($_CB_framework->getCfg( 'hits' )) $hits = "<td>".$item->hits."</td>";
			$return .= "<tr class=\"sectiontableentry$i\"><td>".cbFormatDate( $item->created )."</td><td><a href=\"" 
					. cbSef( $artURL . $item->id . $itemidtxt ) . "\">"
					.$item->title."</a></td>".$hits.$rating."</tr>\n";

		}
		$return .= "</table>";

		return $return;
	}
}	// end class getAuthorTab.
?>