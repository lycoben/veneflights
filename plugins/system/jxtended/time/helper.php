<?php
/**
 * @version		$Id: helper.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Time
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 *
 * This class draws heavily on PEAR:Date Copyright (c) 1997-2005 Baba Buehler,
 * Pierre-Alain Joye Released under the New BSD license
 *
 */

defined('JPATH_BASE') or die;

/**
 * @package		JXtended
 * @subpackage	Time
 */
class JXDateHelper
{
	/**
	 * Converts a date to number of days since a distant unspecified epoch
	 *
	 * @param	JXDate
	 * @return	integer	the number of days since the epoch
	 *
	 * @access public
	 * @static
	 */
	function toDays( &$date )
	{
		$year		= $date->year;
		$month		= $date->month;
		$day		= $date->day;
		$century	= (int) substr( $year, 0, 2 );
		$year		= (int) substr( $year, 2, 2 );

		if ($month > 2) {
			$month -= 3;
		} else {
			$month += 9;
			if ($year) {
				$year--;
			} else {
				$year = 99;
				$century--;
			}
		}

		return (
			floor( (146097 * $century) / 4 ) +
			floor( (1461 * $year) / 4 ) +
			floor( (153 * $month + 2) / 5 ) +
			$day + 1721119);
	}

	/**
	 * Returns the full weekday name for the given date
	 *
	 * @param	mixed	$day	 JXDate or the weekday number (0-6)
	 *
	 * @return	string  the full name of the day of the week
	 *
	 * @access public
	 * @static
	 */
	function getWeekdayFullname( $day = null )
	{
		if ($day === null ) {
			$day = new JXDate;
		}
		if (is_a( $day, 'JXDate' )) {
			$weekday	= JXDateHelper::dayOfWeek( $day );
		} else if (is_int( $day )) {
			$weekday	= $day;
		}
		$names		= JXDateHelper::getWeekDays();
		return $names[$weekday];
	}

	/**
	 * Returns the abbreviated weekday name for the given date
	 *
	 * @param int	$date	 the date object
	 * @param int	$length  the length of abbreviation
	 *
	 * @return string  the abbreviated name of the day of the week
	 *
	 * @access public
	 * @static
	 * @see Date_Calc::getWeekdayFullname()
	 */
	function getWeekdayAbbrname( $day, $length = 3)
	{
		return substr( JXDateHelper::getWeekdayFullname( $day ), 0, $length );
	}

	/**
	 * Returns the full month name for the given month
	 *
	 * @param int	$month   the month
	 *
	 * @return string  the full name of the month
	 *
	 * @access public
	 * @static
	 */
	function getMonthFullname( $month )
	{
		$month	= (int) $month;
		$names	= JXDateHelper::getMonthNames();
		return $names[$month];
	}

	/**
	 * Returns the abbreviated month name for the given month
	 *
	 * @param int	$month   the month
	 * @param int	$length  the length of abbreviation
	 *
	 * @return string  the abbreviated name of the month
	 *
	 * @access public
	 * @static
	 * @see Date_Calc::getMonthFullname
	 */
	function getMonthAbbrname($month, $length = 3)
	{
		$month = (int) $month;
		return substr(JXDateHelper::getMonthFullname($month), 0, $length);
	}

	/**
	 * Returns an array of month names
	 *
	 * Used to take advantage of the setlocale function to return
	 * language specific month names.
	 *
	 * @returns array  an array of month names
	 *
	 * @access public
	 * @static
	 */
	function getMonthNames()
	{
		static $months = null;
		if ($months === null)
		{
			$months = array();
			for ($i = 1; $i < 13; $i++) {
				$months[$i] = strftime('%B', mktime(0, 0, 0, $i, 1, 2001));
			}
		}
		return $months;
	}

	/**
	 * Returns an array of week days
	 *
	 * Used to take advantage of the setlocale function to
	 * return language specific week days.
	 *
	 * @returns array  an array of week day names
	 *
	 * @access public
	 * @static
	 */
	function getWeekDays()
	{
		static $weekdays = null;
		if ($weekdays == null)
		{
			$weekdays	= array();
			for ($i = 0; $i < 7; $i++) {
				$weekdays[$i] = strftime('%A', mktime(0, 0, 0, 1, $i, 2001));
			}
		}
		return $weekdays;
	}

	/**
	 * Returns day of week for given date (0 = Sunday)
	 *
	 * @param	JXDate
	 * @return	int		the number of the day in the week
	 *
	 * @access public
	 * @static
	 */
	function dayOfWeek( &$date )
	{
		$year	= $date->year;
		$month	= $date->month;
		$day	= $date->day;

		if ($month > 2) {
			$month -= 2;
		} else {
			$month += 10;
			$year--;
		}

		$day = (floor((13 * $month - 1) / 5) +
				$day + ($year % 100) +
				floor(($year % 100) / 4) +
				floor(($year / 100) / 4) - 2 *
				floor($year / 100) + 77);

		$weekday_number = $day - 7 * floor($day / 7);
		return $weekday_number;
	}

	/**
	 * Find the number of days in the given month
	 *
	 * @param	int		$month	the month, default is current local month
	 * @param	int		$year	the year in four digit format, default is current local year
	 * @return	int		the number of days the month has
	 *
	 * @access public
	 * @static
	 */
	function daysInMonth($month, $year)
	{
		if ($year == 1582 && $month == 10) {
			return 21;  // October 1582 only had 1st-4th and 15th-31st
		}

		if ($month == 2) {
			if (JXDateHelper::isLeapYear($year)) {
				return 29;
			 } else {
				return 28;
			}
		} elseif ($month == 4 or $month == 6 or $month == 9 or $month == 11) {
			return 30;
		} else {
			return 31;
		}
	}


	/**
	 * Returns true for a leap year, else false
	 *
	 * @param int	$year	the year.  Use the complete year instead of the
	 *						 abbreviated version.  E.g. use 2005, not 05.
	 *						 Do not add leading 0's for years prior to 1000.
	 * @return boolean
	 *
	 * @access public
	 * @static
	 */
	function isLeapYear( $year )
	{
		$year	= $date->year;

		if (preg_match('/\D/', $year)) {
			return false;
		}
		if ($year < 1000) {
			return false;
		}
		if ($year < 1582) {
			// pre Gregorio XIII - 1582
			return ($year % 4 == 0);
		} else {
			// post Gregorio XIII - 1582
			return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
		}
	}

	/**
	 * @param	JXDate
	 * @return	boolean
	 */
	function isToday( &$date )
	{
		static $today = null;
		if ($today == null) {
			$today	= new JXDate;
		}
		return ($today->day == $date->day && $today->month == $date->month && $today->year == $date->year);
	}
}
