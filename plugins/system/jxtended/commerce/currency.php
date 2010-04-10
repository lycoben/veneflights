<?php
/**
 * @version		$Id: currency.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Commerce
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Currency handling class
 *
 * @package 	JXtended
 * @subpackage 	Commerce
 * @version		1.0
 */
class JXCurrency extends JObject
{
	/**
	 * Default currency code (ISO CODE)
	 * @access	private
	 * @var		string
	 */
	var $_default = 'USD';

	/**
	 * Currency conversion rate table
	 * @access	private
	 * @var		array
	 */
	var $_data = array ();

	/**
	 * Current currency value in default currency
	 * @access	private
	 * @var		float
	 */
	var $_value = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	string		$default	The ISO currency code for the default currency [defaults to USD]
	 * @return	void
	 * @since	1.0
	 */
	function __construct($default = 'USD')
	{
		// Setup private variables
		$this->_default = $default;

		$db = &JFactory::getDBO();

		/*
		 * We need to load a data array of conversion rates based on the default
		 * currency.  There should be a separate rate table depending upon the default
		 * currency.
		 */
		$db->setQuery('SELECT * FROM `#__currencies` WHERE `published` = 1 ORDER BY `ordering`');
		$data = $db->loadObjectList('code');
		if ($data) {
			$this->_data = $data;
		} else {
			$this->_data = array('USD' => (object) array('code'=>'USD','rate'=>1,'symbol_left'=>'$','symbol_right'=>'','decimal_places'=>2,'decimal_point'=>'.','thousands_point'=>','));
		}
	}

	/**
	 * Singleton method to get an WCurrency object for currency manipulation
	 *
	 * @static
	 * @param	string	$default	The ISO currency code for the default currency [defaults to USD]
	 * @return	object	WCurrency object
	 * @since	1.0
	 */
	function getInstance($code='USD')
	{
		static $instances;

		if (!isset ($instances)) {
			$instances = array ();
		}

		if (empty ($instances[$code])) {
			$instances[$code] = new JXCurrency($code);
		}

		return $instances[$code];
	}

	/**
	 * Method to get currency information
	 *
	 * @access	public
	 * @return	array	Currency data
	 * @since	1.0
	 */
	function getCurrencies()
	{
		return $this->_data;
	}

	/**
	 * Method to convert currency
	 *
	 * @access	public
	 * @param	mixed	$value	A float value or an array of float values to convert
	 * @param	string	$target	The target currency to convert to
	 * @param	string	$round	How to round the converted values [up|down|off]
	 * @return	mixed	Either an array of converted currency values or false on error
	 * @since	1.0
	 */
	function convert($values, $target, $round = 'off')
	{
		// Initialize variables
		$ret = array ();

		// Get the currency object for the target currency and format the string
		$currency = $this->getCurrency($target);

		if (!is_array($values)) {
			$ret = $values * $currency->rate;
		} else {
			foreach ($values as $value) {
				$ret[$value] = $value * $currency->rate;
			}
		}
		return $ret;
	}

	/**
	 * Method to get the currency object for a given currency
	 *
	 * @access	public
	 * @param	string	$target	The target currency to get the currency object for
	 * @return	object	Currency object
	 * @since	1.0
	 */
	function getCurrency($code = null)
	{
		if (is_null($code)) {
			$code = $this->_default;
		}
		return $this->_data[$code];
	}

	/**
	 * Method to see if a currency is defined in the database.
	 *
	 * @access	public
	 * @param	string	$code	The currency code to check for [ISO code]
	 * @param	string	$code	The currency code to check for [ISO code]
	 * @return	string	Formatted currency string for a given value
	 * @since	1.0
	 */
	function format($value, $code = null)
	{
		// Check to see if we have a default currency set in the session
		if (empty ($code)) {
			global $mainframe;
			$code = $mainframe->getUserStateFromRequest('commerce.currency', 'currency_id', $this->_default);
		}

		// If no currency code set, use the default one
		if (empty ($code)) {
			$code = $this->_default;
		}

		// Get the currency object for the target currency and format the string
		$currency = $this->getCurrency($code);
		return $currency->symbol_left.number_format($this->convert($value, $code), $currency->decimal_places, $currency->decimal_point, $currency->thousands_point).$currency->symbol_right;
	}

	/**
	 * Method to see if a currency is defined in the database.
	 *
	 * @access	public
	 * @param	string	$code	The currency code to check for [ISO code]
	 * @return	boolean	True if currency exists
	 * @since	1.0
	 */
	function exists($code)
	{
		if (isset ($this->_data[$code]) && !empty($this->_data[$code])) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 * Quick Method to access the currency formatting logic from template engines without
 * having to instantiate an object, etc.
 *
 * @param	mixed	$value	The numeric value to format in the current currency
 * @return	string	The currency formatted string of the passed argument
 * @since	1.0
 */
function FormatCurrency($value)
{
	$currency = &JXCurrency::getInstance();
	return $currency->format($value);
}


/**
 * Quick Method to access the currency formatting logic from template engines without
 * having to instantiate an object, etc.
 *
 * @param	mixed	$value	The numeric value to format in the current currency
 * @return	string	The currency formatted string of the passed argument
 * @since	1.0
 */
function CurrencySelectList()
{
	$app = &JFactory::getApplication();

	$options = array();
	$code = $app->getUserStateFromRequest('commerce.currency', 'currency_id' );
	$currency = &JXCurrency::getInstance();
	$currencies = $currency->getCurrencies();
	foreach ($currencies as $c)
	{
		if ($c->published) {
			$options[] = JHTMLSelect::option($c->code);
		}
	}
	return JHTMLSelect::genericList($options, 'currency_id', 'class="inputbox" onchange="this.form.submit()"', 'value', 'text', $code );
}
