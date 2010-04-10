<?php
/**
 * @version		$Id: chart.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	HTML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * HTML helper class for rendering simple charts.
 *
 * @package 	JXtended
 * @subpackage	HTML
 */
class JXHTMLChart
{
	function simple($data, $type = 'p3', $translate = true)
	{
		$html	= '<table class="chart"><tbody class="'.$type.'"><tr>';
		$ths	= array_keys($data);
		$tds	= array_values($data);

		// Process the table headings.
		for ($i = 0, $c = count($ths); $i < $c; $i++) {
			if ($translate) {
				$ths[$i] = JText::_($ths[$i]);
			}
			$html	.= '<th>'.$ths[$i].'</th>';
		}

		$html	.= '</tr><tr>';

		// Process the table cells.
		for ($i = 0, $c = count($tds); $i < $c; $i++) {
			$html	.= '<td>'.($tds[$i] ? $tds[$i] : 0).'</td>';
		}

		$html	.= '</tr></tbody></table>';
		return $html;
	}
}