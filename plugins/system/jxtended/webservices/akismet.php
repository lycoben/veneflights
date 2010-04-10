<?php
/**
 * @version		$Id: akismet.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Webservices
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Akismet class
 *
 * Inspired in code and concept by: Bret Kuhns <http://www.miphp.net>
 *
 * <code>
 * 	<?php
 *	jximport('jxtended.webservices.akismet');
 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
 *	?>
 * </code>
 *
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 */
class JXAkismet extends JObject
{
	/**
	 * Site URL
	 * @access	public
	 * @var		string
	 */
	var $siteURL;

	/**
	 * Akismet API Key
	 * @access	public
	 * @var		string
	 */
	var $apiKey;

	/**
	 * Is the key valid?
	 * @access	public
	 * @var		boolean
	 */
	var $keyValid;

	/**
	 * Active comment object
	 * @access	protected
	 * @var		object
	 */
	var $comment = null;

	/**
	 * JXAkismetHttpClient Object for sending requests to Akismet Server
	 * @access	protected
	 * @var		object
	 */
	var $_http;

	/**
	 * Server variables to ignore when sending Akismet requests
	 * @access	private
	 * @var		array
	 */
	var $_ignore = array(
			'HTTP_COOKIE',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED_HOST',
			'HTTP_MAX_FORWARDS',
			'HTTP_X_FORWARDED_SERVER',
			'REDIRECT_STATUS',
			'SERVER_PORT',
			'PATH',
			'DOCUMENT_ROOT',
			'SERVER_ADMIN',
			'QUERY_STRING',
			'PHP_SELF',
			'argv'
		);

	/**
	 * Constructor
	 *
	 * Set instance variables, connect to Akismet, and check API key
	 *
	 * @access	protected
	 * @param	string	$siteURL	The site URL
	 * @param 	string	$apiKey		Akismet API key
	 * @return	void
	 * @since	1.0
	 */
	function __construct($siteURL, $apiKey)
	{
		// Set some object wide variables
		$this->siteURL = $siteURL;
		$this->apiKey  = $apiKey;

		// Connect to the Akismet server and populate errors if they exist
		$this->_http = new JXAkismetHttpClient($apiKey);

		// Check if the API key is valid
		if (!$valid = $this->validateAPIKey($apiKey)) {
			JError::raiseWarning(1000, 'Your Akismet API Key is invalid');
		}
		$this->keyValid = $valid;
	}

	/**
	 * Method to set a comment object to the Akismet object according to the Akismet API
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
	 *
	 *	// Create and populate the comment object
	 *	$comment = new JObject();
	 *	$comment->set('author', {COMMENT_AUTHOR});
	 *	$comment->set('email', {COMMENT_AUTHOR_EMAIL});
	 *	$comment->set('website', {COMMENT_AUTHOR_WEBSITE});
	 *	$comment->set('body', {COMMENT_BODY});
	 *	$comment->set('permalink', {POST_URL});
	 *
	 *	// Set the comment to the Akismet handler
	 *	$akismet->setComment($comment);
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	object	Comment Object
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function setComment($comment)
	{
		// Populate the comment array with information needed by Akismet
		$this->comment = new JObject();

		$this->comment->set('comment_type', $comment->get('type'));
		$this->comment->set('comment_author', $comment->get('author'));
		$this->comment->set('comment_author_email', $comment->get('email'));
		$this->comment->set('comment_author_url', $comment->get('website'));
		$this->comment->set('comment_content', $comment->get('body'));

		$this->comment->set('user_ip', $comment->get('user_ip', ($_SERVER['REMOTE_ADDR'] != getenv('SERVER_ADDR')) ? $_SERVER['REMOTE_ADDR'] : getenv('HTTP_X_FORWARDED_FOR')));
		$this->comment->set('user_agent', $comment->get('user_agent', $_SERVER['HTTP_USER_AGENT']));
		$this->comment->set('referrer', $comment->get('referrer', $_SERVER['HTTP_REFERER']));
		$this->comment->set('blog', $comment->get('blog', $this->siteURL));

		return true;
	}

	/**
	 * Query the Akismet and determine if the comment is spam or not
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
	 *
	 *	// Set the comment to the Akismet handler
	 *	$akismet->setComment($comment);
	 *
	 *	// Lets see if the comment is spam
	 *	if ($akismet->isSpam()) {
	 *		echo 'Yes! This is a spam comment';
	 *	} else {
	 *		echo 'No! This is NOT a spam comment';
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @return	boolean	True if the comment is spam
	 * @since	1.0
	 */
	function isSpam()
	{
		$response = $this->_http->getResponse($this->_getQueryString(), 'comment-check');
		if ($response) {
			return ($response == "true");
		} else {
			return JError::raiseWarning(1000, $this->_http->getError());
		}
	}

	/**
	 * Submit the comment as a spam comment to Akismet's server
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
	 *
	 *	// Set the comment to the Akismet handler
	 *	$akismet->setComment($comment);
	 *
	 *	// Submit the comment as spam to Akismet
	 *	$akismet->submitSpam();
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function submitSpam()
	{
		$this->_http->getResponse($this->_getQueryString(), 'submit-spam');
	}

	/**
	 * Submit the comment as a false-positive spam comment to Akismet's server
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
	 *
	 *	// Set the comment to the Akismet handler
	 *	$akismet->setComment($comment);
	 *
	 *	// Submit the comment as ham (false-positive) to Akismet
	 *	$akismet->submitHam();
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function submitHam()
	{
		$this->_http->getResponse($this->_getQueryString(), 'submit-ham');
	}

	/**
	 * Check with the Akismet server to determine if the API key is valid
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismet = new JXAkismet({SITE_URL}, {API_KEY});
	 *
	 *	// Submit the comment as ham (false-positive) to Akismet
	 *	if ($akismet->validateAPIKey([{API_KEY}])) {
	 *		echo 'Yes! API Key is valid';
	 *	} else {
	 *		echo 'No! API Key is NOT valid';
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$key	The Akismet API key [optional]
	 * @return	boolean
	 * @since	1.0
	 */
	function validateAPIKey($key=null)
	{
		$key = (empty($key)) ? $this->apiKey : $key;

		if (($key == $this->apiKey) and ($this->keyValid !== null)) {
			return $this->keyValid;
		} else {
			$response = $this->_http->getResponse('key='.$key.'&blog='.$this->siteURL, 'verify-key');
			if ($response) {
				return ($response == 'valid');
			} else {
				JError::raiseWarning(1000, $this->_http->getError());
				return false;
			}
		}
	}

	/**
	 * Build a query string for use with HTTP requests
	 *
	 * @access	protected
	 * @return	string	The query string for the Akismet HTTP request
	 * @since	1.0
	 */
	function _getQueryString()
	{
		// Initialize variables
		$query = array();
		$sring = null;

		// Iterate over the server variables to add to the comment information
		foreach($_SERVER as $key => $value)
		{
			if(!in_array($key, $this->_ignore)) {
				if($key == 'REMOTE_ADDR') {
					$this->comment->set($key, $this->comment->get('user_ip'));
				} else {
					$this->comment->set($key, $value);
				}
			}
		}

		// Encode comment key => value pairs
		foreach($this->comment->getPublicProperties(true) as $k => $v)
		{
			$query[] = $k.'='.urlencode(stripslashes($v));
		}

		// Implode comment key => value pairs to a URL query string
		$string = implode('&', $query);

		return $string;
	}
}

/**
 * Akismet HTTP Client Class
 *
 * Inspired in code and concept by: Bret Kuhns <http://www.miphp.net>
 *
 * <code>
 *	<?php
 *	jximport('jxtended.webservices.akismet');
 *	$akismetClient = new JXAkismetHttpClient({API_KEY});
 *	?>
 * </code>
 *
 * @author		Louis Landry <louis.landry@webimagery.net>
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 */
class JXAkismetHttpClient extends JObject
{
	/**
	 * Akismet API Key
	 * @access	public
	 * @var		string
	 */
	var $apiKey;

	/**
	 * Akismet API Version
	 * @access	private
	 * @var		string
	 */
	var $_APIVersion = '1.1';

	/**
	 * Akismet Server Host
	 * @access	private
	 * @var		string
	 */
	var $_host = 'rest.akismet.com';

	/**
	 * Akismet Server Port
	 * @access	private
	 * @var		int
	 */
	var $_port = 80;

	/**
	 * Akismet Server Connection
	 * @access	private
	 * @var		resource
	 */
	var $_connection;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param 	string	$apiKey	Akismet API key
	 * @param	string	$host	Server host [optional]
	 * @param	int		$port	Server port [optional]
	 * @return	void
	 * @since	1.0
	 */
	function __construct($apiKey, $host = null, $port = null)
	{
		// Set parameters
		$this->apiKey = $apiKey;

		// Set optional parameters
		$this->_host = (!empty($host)) ? $host : $this->_host;
		$this->_port = (!empty($port)) ? $port : $this->_port;
	}

	/**
	 *
	 * <code>
	 *	<?php
	 *	jximport('jxtended.webservices.akismet');
	 *	$akismetClient = new JXAkismetHttpClient({API_KEY});
	 *
	 *	$response = $akismetClient->getResponse({REQUEST_DATA}, {REQUEST_PATH});
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$request	The request data to send to the Akismet server
	 * @param	string	$path		The rvar_dump('HERE');
equest path (or method) to send to the Akismet server
	 * @param	string	$type		The request method [optional]
	 * @param	int		$maxLength	The maximum length of the response data [optional]
	 * @return	string	The Akismet server response string
	 * @since	1.0
	 */
	function getResponse($request, $path, $type = 'post', $maxLength = 1160)
	{
		// Connect to the Akismet Server
		if (!$this->_connect()) {
			return false;
		}

		// If the connection is valid and live, lets send the request and get a response
		if(is_resource($this->_connection)) {
			// Build the request data
			$data[] = strtoupper($type).' /'.$this->_APIVersion.'/'.$path.' HTTP/1.0';
			$data[] = 'Host: '.((!empty($this->apiKey)) ? $this->apiKey."." : null).$this->_host;
			$data[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
			$data[] = 'Content-Length: '.strlen($request);
			$data[] = 'User-Agent: JXAkismet | Akismet/1.11';
			$data[] = null;
			$data[] = $request;

			$request	= implode("\r\n", $data);$i=0;
			$response	= null;

			// Send the request data
			@fwrite($this->_connection, $request);

			stream_set_blocking($this->_connection, false);
			stream_set_timeout($this->_connection, 5);
			$info = stream_get_meta_data($this->_connection);

			// Get the response data from the Akismet server
			while (!feof($this->_connection) && !$info['timed_out']) {
			    $response .= fgets($this->_connection, $maxLength);
			    $info = stream_get_meta_data($this->_connection);
			}
			$response = explode("\r\n\r\n", $response, 2);

			// Close the connection and return the response string
			$this->_disconnect();
			return $response[1];
		} else {
			$this->setError('The response could not be retrieved.');
			return false;
		}
	}

	/**
	 * Method to connect to the Askismet server
	 *
	 * @access	private
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function _connect()
	{
		$errno = null;
		$errstr= null;
		if (!($this->_connection = @fsockopen($this->_host, $this->_port, $errno, $errstr, 5))) {
			$this->setError('Could not connect to akismet server.');
			return false;
		}
		return true;
	}

	/**
	 * Method to close the connection to the Askismet server
	 *
	 * @access	private
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function _disconnect()
	{
		@fclose($this->_connection);
		return true;
	}
}
