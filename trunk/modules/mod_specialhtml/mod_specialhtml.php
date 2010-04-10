<?php
/**
*  Modul Special HTML
* Versi		: 1.0.2
* Created by		: Rony Sandra Yofa Zebua
* Mail		: ok.com
* Camp26.Com mail	: marketing@camp.com
* Created on		: 07 Februari 2008
* Last Updated on	: 18 Maret 2008
* URL			: www.camp.com
* Camp26.Com ready to service all of you for developt, rebuild,redesign and customize your Joomla live site
* Camp26.Com Products: Expert Joomla Developer, Expert Designer, Expert Flash Creator, Get your Expert FreeLancer here, Expert Programmer Aplications (send your reguest to marketing@camp26.com)
* Based Idea From: Mod_HTML for J1.0.x
* License 		: http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

//Parameters
$codearea = $params->get( 'code_area' ); 	$clean_js = $params->get( 'clean_js' );		$clean_css = $params->get( 'clean_css' );		$clean_all = $params->get( 'clean_all' );

//Clean CSS & JS  & All
if (!$clean_all) {
	if ($clean_js) {
		preg_match("/<script(.*)>(.*)<\/script>/i", $html, $matches);
		if ($matches) {
			foreach ($matches as $i=>$match) {
				$clean_js = str_replace('<br />', '', $match);
				$html = str_replace($match, $clean_js, $html);
			}
		}
	}
	if ($clean_css) {
		preg_match("/<style(.*)>(.*)<\/style>/i", $html, $matches);
		if ($matches) {
			foreach ($matches as $i=>$match) {
				$clean_js = str_replace('<br />', '', $match);
				$html = str_replace($match, $clean_js, $html);
			}
		}
	}
} else {
	$html = str_replace('<br />', '', $html);
}


echo $codearea;

 ?>