<?php
/**
 * @version		$Id: recaptcha.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Webservices
 * @copyright	Copyright (C) 2007 Johan Janssens. All rights reserved.
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * The library wraps the reCAPTCHA API.
 *
 * The reCAPTCHA PHP Library provides a simple way to place a CAPTCHA
 * on your PHP website, helping you stop bots from abusing your website.
 *
 * The library also includes an API for Mailhide, a way to wrap email
 * addresses in a reCAPTCHA, hiding them from spammers.
 *
 * @contributor	Johan Janssens <johan@joomlatools.org>
 *
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 * @see			http://www.recaptcha.net
 */
class JXRecaptcha extends JObject
{
	/**
	 * Server
	 *
	 * @access	private
	 * @var		string
	 */
	var $_server;

	/**
	 * Secure server
	 *
	 * @access	private
	 * @var		string
	 */
	var $_secure_server;

	/**
	 * Verify server
	 *
	 * @access	private
	 * @var		string
	 */
	var $_verify_server;

	/**
	 * Public key
	 *
	 * @access	private
	 * @var		string
	 */
	var $_pubkey;

	/**
	 * Private key
	 *
	 * @access	private
	 * @var		string
	 */
	var $_privkey;

	/**
	 * Use SSL
	 *
	 * @access	private
	 * @var		boolean
	 */
	var $_ssl;

	/**
	 * Remote IP
	 *
	 * @access	private
	 * @var		string
	 */
	var $_remoteip;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	array	$servers	Servers Array
	 * @return	void
	 * @since	1.0
	 */
	function __construct($config = array())
	{
		// Set the server
		if ( isset( $config['server'] ) ) {
			$this->_server = $config['server'];
		} else {
			$this->_server = 'http://api.recaptcha.net';
		}

		// Set the secure server
		if ( isset( $config['secure_server'] ) ) {
			$this->_secure_server = $config['secure_server'];
		} else {
			$this->_secure_server = 'https://api-secure.recaptcha.net';
		}

		// Set the verify server
		if ( isset( $config['verify_server'] ) ) {
			$this->_verify_server = $config['verify_server'];
		} else {
			$this->_verify_server = 'api-verify.recaptcha.net';
		}

		// Set ssl server
		if ( isset( $config['ssl'] ) ) {
			$this->_ssl = $config['ssl'];
		} else {
			$this->_ssl = false;
		}

		// Set ssl server
		if ( isset( $config['remoteip'] ) ) {
			$this->_remoteip = $config['remoteip'];
		} else {
			$this->_remoteip = $_SERVER["REMOTE_ADDR"];
		}

		// Set ssl server
		if ( isset( $config['remoteip'] ) ) {
			$this->_remoteip = $config['remoteip'];
		}
	}

	/**
	 * Returns a reference to the global recaptcha object, only creating it
	 * if it doesn't already exist.
	 *
	 * This method must be invoked as:
	 * 		<pre>  $session = &JXRecaptcha::getInstance();</pre>
	 *
	 * @access	public
	 * @return	JXRecaptcha	The Recaptcha object.
	 * @since	1.0
	 */
	function &getInstance($config = array())
	{
		static $instance;

		if (!is_object($instance)) {
			$instance = new JXRecaptcha($config = array());
		}

		return $instance;
	}

	/**
	 * Set the recaptcha key pair
	 *
	 * @access public
	 * @return boolean
	 * @since 1.0
	 */
	function setKeyPair($public, $private)
	{
		$this->_pubkey  = $public;
		$this->_privkey = $private;
	}

	function injectHeadScript($ssl = null)
	{
		$ssl = isset($ssl) ? $ssl : $this->_ssl;
		if ($ssl) {
			$server = $this->_secure_server;
		} else {
			$server = $this->_server;
		}

		// get the document object
		$document = &JFactory::getDocument();

		$document->addScript($server.'/js/recaptcha_ajax.js');
	}

	/**
 	 * Gets the challenge HTML (javascript and non-javascript version).
 	 * This is called from the browser, and the resulting reCAPTCHA HTML widget
 	 * is embedded within the HTML form it was called from.
 	 *
 	 * @access	public
 	 * @param string $error The error given by reCAPTCHA (optional, default is null)
 	 * @param boolean $ssl Should the request be made over ssl? (optional, default is false)
 	 * @return string - The HTML to be embedded in the user's form.
 	 * @since 1.0
 	 */
	function renderCaptcha ($ssl = null)
	{
		$ssl = isset($ssl) ? $ssl : $this->_ssl;

		if ($ssl) {
			$server = $this->_secure_server;
		} else {
			$server = $this->_server;
		}

        $errorpart = "";
        if ($error = $this->getError()) {
           $errorpart = "&amp;error=" . $error;
        }
        return '<script type="text/javascript" src="'. $server . '/challenge?k=' . $this->_pubkey . $errorpart . '"></script>

		<noscript>
  			<iframe src="'. $server . '/noscript?k=' . $this->_pubkey . $errorpart . '" height="300" width="500" frameborder="0"></iframe><br>
  			<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
  			<input type="hidden" name="recaptcha_response_field" value="manual_challenge">
		</noscript>';
	}

	/**
  	 * Calls an HTTP POST function to verify if the user's guess was correct
  	 *
  	 * @access	public
  	 * @param string $privkey
  	 * @param string $remoteip
  	 * @param string $challenge
  	 * @param string $response
  	 * @return ReCaptchaResponse
  	 * @since 1.0
  	 */
	function checkCaptcha($challenge=null, $response=null)
	{
		if (!$challenge || !$response) {
			$challenge = JRequest::getVar('recaptcha_challenge_field', null);
			$response = JRequest::getVar('recaptcha_response_field', null);
		}

        //discard spam submissions
        if ($challenge == null || strlen($challenge) == 0 || $response == null || strlen($response) == 0)
		{
			return false;
//                $recaptcha_response = new JXReCaptchaResponse();
//                $recaptcha_response->is_valid = false;
//                $recaptcha_response->error = 'incorrect-captcha-sol';
//                return $recaptcha_response;
        }

        $response = $this->_http_post ($this->_verify_server, "/verify",
                                          array (
                                                 'privatekey' => $this->_privkey,
                                                 'remoteip' => $this->_remoteip,
                                                 'challenge' => $challenge,
                                                 'response' => $response
                                                 )
                                          );

        $answers = explode ("\n", $response [1]);

        if (trim ($answers [0]) == 'true') {
			return true;
        }

		$this->setError($answers [1]);
		return false;
	}

	/**
 	 * Gets html to display an email address given a public an private key.
 	 * to get a key, go to: http://mailhide.recaptcha.net/apikey
 	 *
 	 * @access	public
 	 * @since	1.0
 	 */
	function renderMailhide($email)
	{
		$parts = $this->_mailhideEmailParts ($email);
		$url   = $this->renderMailhideURL ($this->_pubkey, $this->_privkey, $email);

		return htmlentities($parts[0]) . "<a href='" . htmlentities ($url) .
			"' onclick=\"window.open('" . htmlentities ($url) . "', '', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300'); return false;\" title=\"Reveal this e-mail address\">...</a>@" . htmlentities ($parts [1]);
	}

	/**
 	 * Description
 	 *
 	 * @access	public
 	 * @since 1.0
 	 */
	function renderMailhideURL($email)
	{
		$ky = pack('H*', $this->_privkey);
		$cryptmail = $this->_aes_encrypt ($email, $ky);

		return "http://mailhide.recaptcha.net/d?k=" . $this->_pubkey . "&c=" . $this->_mailhideEncode ($cryptmail);
	}

	/**
 	 * Gets a URL where the user can sign up for reCAPTCHA. If your application
 	 * has a configuration page where you enter a key, you should provide a link
 	 * using this function.
 	 *
 	 * @access	public
 	 * @param string $domain The domain where the page is hosted
 	 * @param string $appname The name of your application
 	 * @since 1.0
 	 */
	function getSignupURL ($domain = null, $appname = null) {
		return "http://recaptcha.net/api/getkey?" .  $this->_qsencode (array ('domain' => $domain, 'app' => $appname));
	}

	/**
 	 * Description
 	 *
 	 * @since 1.0
 	 */
	function _mailhideEncode ($x) {
		return strtr(base64_encode ($x), '+/', '-_');
	}

	/**
 	 * Description
 	 *
 	 * @since 1.0
 	 */
	function _mailhideEmailParts ($email)
	{
		$arr = preg_split("/@/", $email );

		if (strlen ($arr[0]) <= 4) {
			$arr[0] = substr ($arr[0], 0, 1);
		} else if (strlen ($arr[0]) <= 6) {
			$arr[0] = substr ($arr[0], 0, 3);
		} else {
			$arr[0] = substr ($arr[0], 0, 4);
		}
		return $arr;
	}

	/**
 	 * Encodes the given data into a query string format
 	 *
 	 * @param $data - array of string elements to be encoded
 	 * @return string - encoded request
 	 * @since 1.0
 	 */
	function _qsencode ($data)
	{
        $req = "";
        foreach ( $data as $key => $value ) {
                $req .= $key . '=' . urlencode( stripslashes($value) ) . '&';
        }

        // Cut the last '&'
        $req = substr($req, 0, strlen($req)-1);
        return $req;
	}

	/**
 	 * Submits an HTTP POST to a reCAPTCHA server
 	 *
 	 * @param string $host
 	 * @param string $path
 	 * @param array $data
 	 * @param int port
 	 * @return array response
 	 * @since 1.0
 	 */
	function _http_post($host, $path, $data, $port = 80)
	{
        $req = $this->_qsencode ($data);

        $http_request  = "POST $path HTTP/1.0\r\n";
        $http_request .= "Host: $host\r\n";
        $http_request .= "Content-Type: application/x-www-form-urlencoded;\r\n";
        $http_request .= "Content-Length: " . strlen($req) . "\r\n";
        $http_request .= "User-Agent: reCAPTCHA/PHP\r\n";
        $http_request .= "\r\n";
        $http_request .= $req;

        $response = '';
        if( false == ( $fs = @fsockopen($host, $port, $errno, $errstr, 10) ) ) {
                die ('Could not open socket');
        }

        fwrite($fs, $http_request);

        while ( !feof($fs) )
                $response .= fgets($fs, 1160); // One TCP-IP packet
        fclose($fs);
        $response = explode("\r\n\r\n", $response, 2);

        return $response;
	}

	/**
 	 * Description
 	 *
 	 * @since 1.0
 	 */
	function _aes_encrypt($val, $ky)
	{
		if (! function_exists ("mcrypt_encrypt")) {
			die ("To use reCAPTCHA Mailhide, you need to have the mcrypt php module installed.");
		}
		$mode = MCRYPT_MODE_CBC;
		$enc  = MCRYPT_RIJNDAEL_128;
		$val  = str_pad($val, (16*(floor(strlen($val) / 16)+(strlen($val) % 16==0?2:1))), chr(16-(strlen($val) % 16)));
		return mcrypt_encrypt($enc, $ky, $val, $mode, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
	}
}