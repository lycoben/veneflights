<?php
/**
 * @version		$Id: date.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Time
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 *
 * This class draws heavily on PEAR:Date Copyright (c) 1997-2005 Baba Buehler,
 * Pierre-Alain Joye Released under the New BSD license
 *
 * Note, only supports the dates supported by Unix timestamps
 */

defined('JPATH_BASE') or die;

/**
 * "YYYY-MM-DD HH:MM:SS"
 */
define('DATE_FORMAT_ISO', 1);
/**
 * "YYYYMMSSTHHMMSS(Z|(+/-)HHMM)?"
 */
define('DATE_FORMAT_ISO_BASIC', 2);
/**
 * "YYYY-MM-SSTHH:MM:SS(Z|(+/-)HH:MM)?"
 */
define('DATE_FORMAT_ISO_EXTENDED', 3);
/**
 * "YYYY-MM-SSTHH:MM:SS(.S*)?(Z|(+/-)HH:MM)?"
 */
define('DATE_FORMAT_ISO_EXTENDED_MICROTIME', 6);
/**
 * "YYYYMMDDHHMMSS"
 */
define('DATE_FORMAT_TIMESTAMP', 4);
/**
 * long int, seconds since the unix epoch
 */
define('DATE_FORMAT_UNIXTIME', 5);
/**@#-*/

define( 'SECONDS_IN_HOUR', 3600 );
define( 'SECONDS_IN_DAY', 86400 );

/**
 * Generic date handling class based on PEAR Date
 *
 * @package		JXtended
 * @subpackage	Time
 */
class JXDate extends JObject
{
	/**
	 * @var int The year
	 */
	var $year;
	/**
	 * @var int The month
	 */
	var $month;
	/**
	 * @var int The day
	 */
	var $day;
	/**
	 * @var int The hour
	 */
	var $hour;
	/**
	 * @var int The minute
	 */
	var $minute;
	/**
	 * @var int The second
	 */
	var $second;
	/**
	 * @var float Part second
	 */
	var $partsecond;

	/**
	 * @var object Date_TimeZone timezone for this date
	 */
	var $tz;

	/**
	 * Constructor
	 *
	 * Creates a new Date Object initialized to the current date/time in the
	 * system-default timezone by default.  A date optionally
	 * passed in may be in the ISO 8601, TIMESTAMP or UNIXTIME format,
	 * or another Date object.  If no date is passed, the current date/time
	 * is used.
	 *
	 * @access public
	 * @see setDate()
	 * @param mixed $date optional - date/time to initialize
	 * @return object Date the new Date object
	 */
	function __construct( $date = null )
	{
		if (is_null( $date )) {
			$this->setDate( date( 'Y-m-d H:i:s' ) );
		} elseif (is_a( $date, 'JXDate' )) {
			$this->copy( $date );
		} else {
			$this->setDate( $date );
		}
	}

	/**
	 * Set the fields of a Date object based on the input date and format
	 *
	 * Set the fields of a Date object based on the input date and format,
	 * which is specified by the DATE_FORMAT_* constants.
	 *
	 * @access	public
	 * @param	string	$date input date
	 * @param	int		$format Optional format constant (DATE_FORMAT_*) of the input date.
	 *					This parameter isn't really needed anymore, but you could
	 *					use it to force DATE_FORMAT_UNIXTIME.
	 */
	function setDate( $date, $format = DATE_FORMAT_ISO )
	{
		$regex = '/^(\d{4})-?(\d{2})-?(\d{2})([T\s]?(\d{2}):?(\d{2}):?(\d{2})(\.\d+)?(Z|[\+\-]\d{2}:?\d{2})?)?$/i';

		if (preg_match( $regex, $date, $regs ) && $format != DATE_FORMAT_UNIXTIME)
		{
			$this->year			= $regs[1];
			$this->month		= $regs[2];
			$this->day			= $regs[3];
			$this->hour			= isset( $regs[5] ) ? $regs[5] : 0;
			$this->minute		= isset( $regs[6] ) ? $regs[6] : 0;
			$this->second		= isset( $regs[7] ) ? $regs[7] : 0;
			$this->partsecond	= (float) isset( $regs[8] ) ? $regs[8] : 0;

			// if an offset is defined, convert time to UTC
			// Date currently can't set a timezone only by offset,
			// so it has to store it as UTC
			if (isset( $regs[9] )) {
				// TODO Timezone support
				//$this->toUTCbyOffset($regs[9]);
			}
		}
		elseif (is_numeric( $date ))
		{
			// UNIXTIME
			$this->setDate( date( 'Y-m-d H:i:s', $date ) );
		}
		else
		{
			// unknown format
			$this->year			= 0;
			$this->month		= 1;
			$this->day			= 1;
			$this->hour			= 0;
			$this->minute		= 0;
			$this->second		= 0;
			$this->partsecond	= (float)0;
		}
	}

	/**
	 * Get a string (or other) representation of this date
	 *
	 * Get a string (or other) representation of this date in the
	 * format specified by the DATE_FORMAT_* constants.
	 *
	 * @access public
	 * @param int $format format constant (DATE_FORMAT_*) of the output date
	 * @return string the date in the requested format
	 */
	function getDate( $format = DATE_FORMAT_ISO )
	{
		switch ($format)
		{
			case DATE_FORMAT_ISO:
				return $this->format( '%Y-%m-%d %T' );
				break;

			case DATE_FORMAT_ISO_BASIC:
				$format = '%Y%m%dT%H%M%S';
				/*if ($this->tz->getID() == 'UTC') {
					$format .= 'Z';
				}*/
				return $this->format($format);
				break;

			case DATE_FORMAT_ISO_EXTENDED:
				$format = '%Y-%m-%dT%H:%M:%S';
				/*if ($this->tz->getID() == 'UTC') {
					$format .= 'Z';
				}*/
				return $this->format($format);
				break;

			case DATE_FORMAT_ISO_EXTENDED_MICROTIME:
				$format = '%Y-%m-%dT%H:%M:%s';
				/*if ($this->tz->getID() == 'UTC') {
					$format .= 'Z';
				}*/
				return $this->format($format);
				break;

			case DATE_FORMAT_TIMESTAMP:
				return $this->format( '%Y%m%d%H%M%S' );
				break;

			case DATE_FORMAT_UNIXTIME:
				return mktime( $this->hour, $this->minute, $this->second, $this->month, $this->day, $this->year );
				break;

			default:
				return $this->format( $format );
				break;
		}
	}

	/**
	 * Copy values from another Date object
	 *
	 * Makes this Date a copy of another Date object.
	 *
	 * @access public
	 * @param object Date $date Date to copy from
	 */
	function copy( $date )
	{
		$this->year = $date->year;
		$this->month = $date->month;
		$this->day = $date->day;
		$this->hour = $date->hour;
		$this->minute = $date->minute;
		$this->second = $date->second;
		$this->tz = $date->tz;
	}

	/**
	 * Formats the date
	 */
	function format( $format )
	{
		$timestamp = mktime( $this->hour, $this->minute, $this->second, $this->month, $this->day, $this->year );
		return strftime( $format, $timestamp );
	}

	function getTimestamp()
	{
		$timestamp = mktime( $this->hour, $this->minute, $this->second, $this->month, $this->day, $this->year );
		return $timestamp;
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

	/**
	 * Set the day field of the date object
	 * @access public
	 * @param int the day
	 * @return int the day
	 */
	function day( $value = null )
	{
		if ($value !== null)
		{
			if ($value > 31 || $value < 1) {
				$this->day = 1;
			} else {
				$this->day = $value;
			}
		}
		return $this->day;
	}

	/**
	 * Set the hour field of the date object
	 * @access public
	 * @param int the hour
	 * @return int the hour
	 */
	function hour( $value = null )
	{
		if ($value !== null)
		{
			if ($value > 23 || $value < 0) {
				$this->hour = 0;
			} else {
				$this->hour = $value;
			}
		}
		return $this->hour;
	}

	/**
	 * Set the minute field of the date object
	 * @access public
	 * @param int the minute
	 * @return int the minute
	 */
	function minute( $value = null )
	{
		if ($value !== null)
		{
			if ($value > 59 || $value < 0) {
				$this->minute = 0;
			} else {
				$this->minute = $value;
			}
		}
		return $this->minute;
	}

	/**
	 * Set the second field of the date object
	 * @access public
	 * @param int the second
	 * @return int the second
	 */
	function second( $value = null )
	{
		if ($value !== null)
		{
			if ($value > 59 || $value < 0) {
				$this->second = 0;
			} else {
				$this->second = $value;
			}
		}
		return $this->second;
	}

	/**
	 * Adds (+/-) a number of years to the current date.
	 */
	function addYears( $n )
	{
		$this->year += $n;
	}

	/**
	 * Adds (+/-) a number of months to the current date.
	 * @param int Positive or negative number of months
	 */
	function addMonths( $n )
	{
		$an = abs( $n );
		$years = floor( $an / 12 );
		$months = $an % 12;

		if ($n < 0)
		{
			$this->year -= $years;
			$this->month -= $months;
			if ($this->month < 1) {
				$this->year--;
				$this->month = 12 + $this->month;
			}
		}
		else
		{
			$this->year += $years;
			$this->month += $months;
			if ($this->month > 12) {
				$this->year++;
				$this->month -= 12;
			}
		}
	}

	/**
	 * Adds (+/-) a number of days to the current date.
	 * @param int The number of days
	 */
	function addDays( $n )
	{
		$this->setDate( $this->getTimestamp() + SECONDS_IN_DAY * $n, DATE_FORMAT_UNIXTIME );
	}

	/**
	 * Adds (+/-) a number of hours to the current date.
	 * @param int The number of days
	 */
	function addHours( $n )
	{
		$this->setDate( $this->getTimestamp() + SECONDS_IN_HOUR * $n, DATE_FORMAT_UNIXTIME );
	}

	/**
	 * Adds (+/-) a number of minutes to the current date.
	 * @param int The number of days
	 */
	function addMinutes( $n )
	{
		$this->setDate( $this->getTimestamp() + 60 * $n, DATE_FORMAT_UNIXTIME );
	}

	/**
	 * Adds (+/-) a number of seconds to the current date.
	 * @param int The number of days
	 */
	function addSeconds( $n )
	{
		$this->setDate( $this->getTimestamp() + $n, DATE_FORMAT_UNIXTIME );
	}

    /**
     * Converts a date to number of days since a distant unspecified epoch
     *
     * @param int    the day of the month
     * @param int    the month
     * @param int    the year.  Use the complete year instead of the abbreviated
     * version. E.g. use 2005, not 05. Do not add leading 0's for years prior to
     * 1000.
     *
     * @return integer  the number of days since the epoch
     *
     * @access public
     */
    function toDays()
    {
    	$year	= $this->year;
    	$month	= $this->month;
    	$day	= $this->day;

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
}