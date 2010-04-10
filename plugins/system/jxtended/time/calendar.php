<?php
/**
 * @version		$Id: calendar.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Time
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport( 'jxtended.time.date' );

/**
 * @package		JXtended
 * @subpackage	Time
 */
class JXCalendarRenderer extends JObject
{
	var $date = null;

	/**
	 * Constructor
	 *
	 * @param	int		The year (as a whole number, eg 2007)
	 * @param	int		The month
	 */
	function __construct( &$date )
	{
		$this->date		= $date;
	}

	/**
	 * Set the year field of the date object
	 * @param	int		the year
	 * @return	int		the year
	 * @access	public
	 */
	function year( $value = null )
	{
		if ($value !== null)
		{
			if ($value < 0 || $value > 9999) {
				$this->year = 0;
			} else {
				$this->year = $value;
			}
		}
		return $this->year;
	}

	/**
	 * Set the month field of the date object
	 * @param	int		the month
	 * @return	int		the month
	 * @access	public
	 */
	function month( $value = null )
	{
		if ($value !== null)
		{
			if ($value < 1 || $value > 12) {
				$this->month = 1;
			} else {
				$this->month = $value;
			}
		}
		return $this->month;
	}


	function toTable( $id = 'calendar', $summary = '' )
	{
		jximport( 'jxtended.time.helper' );

		$nDays	= JXDateHelper::daysInMonth( $this->date->year, $this->date->month );

		$fDay	= new JXDate( '-' );
		$fDay->year( $this->date->year );
		$fDay->month( $this->date->month );
		$fDay->day( 1 );
		$fDays	= JXDateHelper::dayOfWeek( $fDay );

		$lDay	= new JXDate( '-' );
		$lDay->year( $this->date->year );
		$lDay->month( $this->date->month );
		$lDay->day( $nDays );
		$lDays	= JXDateHelper::dayOfWeek( $lDay );

		$dNames	= JXCalendarRenderer::getWeekdays( 1 );
		$html	= '<table id="'.$id.'" summary="'.htmlentities( $summary, ENT_QUOTES ).'">';
		$html	.= '<caption>' .
				'<a href="#" title="previous month" class="nav">&laquo;</a> ' .
				JXDateHelper::getMonthFullname( $fDay->month() ) .
				' <a href="#" title="next month" class="nav">&raquo;</a>' .
				'</caption>';
		$html	.= '<tr>';
		foreach ($dNames as $d => $a) {
			$html	.= 	'<th scope="col" abbr="'.$d.'" title="'.$d.'">'.$a.'</th>';
		}
 		$html	.= '</tr>';

		$cell	= 0;
		$cells	= $fDays + $nDays + (7-$lDays) - 1;

		//echo "$fDays + $nDays + $lDays = $cells";
		for ($i = -$fDays+1; $cell < $cells; $i++)
		{
			//echo "<br>cell=$cell, i=$i, mod=".($cell%7);
			if ($cell % 7 == 0)
			{
				$html	.= "\n".'<tr>';
			}

			if ($i < 1 || $i > $nDays)
			{
				$html	.= '<td>&nbsp;</td>';
			}
			else
			{
				if (JXDateHelper::isToday( $fDay )) {
					$html	.= '<td class="today">'.$i.'</td>';
				} else {
					$html	.= '<td>'.$i.'</td>';
				}
				$fDay->day++;
			}

			if ($cell % 7 == 6)
			{
				$html	.= '</tr>';
			}
			$cell++;
		}
		$html	.= '</table>';

		return $html;
	}

	/**
	 * Gets the weekday names and abbreviations
	 */
	function getWeekdays( $length = 3 )
	{
		static $instances = null;

		if ($instances == null) {
			$instances = array();
		}
		if (!isset( $instances[$length] ))
		{
			$instances[$length] = array();
			for ($i = 0; $i < 7; $i++)
			{
				$name	= JXDateHelper::getWeekdayFullname( $i );
				$instances[$length][$name]	= substr( $name, 0, $length );
			}
		}
		return $instances[$length];
	}

}