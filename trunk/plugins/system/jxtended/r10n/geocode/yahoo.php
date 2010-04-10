<?php
/**
 * @version		$Id: yahoo.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	r10n
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Class to get geocode information for an address via the YAHOO APIs.
 *
 * <code>
 * 	<?php
 *	jximport('jxtended.r10n.geocode.yahoo');
 *	$yahoo = new JXGeocodeYahoo({YAHOO_ID});
 *	?>
 * </code>
 *
 * @package		JXtended
 * @subpackage	r10n
 * @version		1.0
 */
class JXGeocodeYahoo extends JObject
{
	/**
	 * The YAHOO API developer ID
	 * @access	private
	 * @var		string
	 */
	var $_yahoo_id;

	/**
	 * Geocode data cache array
	 * @access	private
	 * @var		array
	 */
	var $_cache;

	/**
	 * Class constructor
	 *
	 * @access	protected
	 * @param	string	$yahoo_id	The YAHOO developer ID to use
	 * @return	void
	 * @since	1.0
	 */
	function __construct($yahoo_id='Cvp1R6TV34ElvSPBlOVIrvRr3x28UxpM0H587hsuBUG88_RuazSHc3FFFh7pUXwkAg--')
	{
		$this->_yahoo_id = $yahoo_id;
	}

	/**
	 * Get the coordinates for a location string.
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.r10n.geocode.yahoo');
	 *	$yahoo = new JXGeocodeYahoo({YAHOO_ID});
	 *
	 *	$coordinates = $yahoo->getCoordinates({ADDRESS_STRING});
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$location	The location string to get geodata for
	 * @return	mixed	The location coordinates in a JObject or false if location could not be found.
	 * @since	1.0
	 */
	function getCoordinates($location)
	{
		if (!isset($this->_cache[$location])) {
			$data = $this->_get_geodata($location);

			if ($data) {
				$tmp = $data['ResultSet']['Result'];
				//var_dump($tmp);

				$data = new JObject();
				$data->set('longitude', $tmp['Longitude']);
				$data->set('latitude', $tmp['Latitude']);
			}
			$this->_cache[$location] = $data;
		}

		return $this->_cache[$location];
	}

	/**
	 * Get the geodata for a location string
	 *
	 * @access	private
	 * @param	string	$location	The location string to get geodata for
	 * @return	mixed	The location geodata or false on error
	 * @since	1.0
	 */
	function _get_geodata($location)
	{
		//build the yahoo geocode access url
		$q = 'http://api.local.yahoo.com/MapsService/V1/geocode';
		$q .= '?appid=' . $this->_yahoo_id . '&location=' . rawurlencode($location) . '&output=php';

		$response = @file_get_contents($q);

		if ($response) {
			$return = unserialize($response);
		} else {
			$return = false;
		}

		return $return;
	}
}