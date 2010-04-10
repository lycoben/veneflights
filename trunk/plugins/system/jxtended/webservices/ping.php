<?php
/**
 * @version		$Id: ping.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Webservices
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('phpxmlrpc.xmlrpc');

/**
 * Ping class for sending ping requests to XML-RPC ping servers
 *
 * <code>
 * 	<?php
 *	jximport('jxtended.webservices.ping');
 *	$ping = new JXPing();
 *	?>
 * </code>
 *
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 */
class JXPing extends JObject
{
	/**
	 * PING Servers
	 * @access	private
	 * @var		array
	 */
	var $_servers = array();

	/**
	 * Debug State
	 * @access	private
	 * @var		boolean
	 */
	var $_debug = false;

	/**
	 * JXPing Object Constructor
	 *
	 * @access	protected
	 * @param	array	$servers	Servers Array
	 * @return	void
	 * @since	1.0
	 */
	function __construct($servers=array())
	{
		// Google Blog XML-RPC settings
		$google = array('host' => 'blogsearch.google.com', 'port' => 80, 'path' => '/ping/RPC2', 'method' => 'weblogUpdates.extendedPing');
		$servers['google'] = $google;

		// Weblogs.Com XML-RPC settings
		$weblogs = array('host' => 'rpc.weblogs.com', 'port' => 80, 'path' => '/RPC2', 'method' => 'weblogUpdates.ping');
		$servers['weblogs'] = $weblogs;

		// Blo.gs XML-RPC settings
		$blo_gs	= array('host' => 'ping.blo.gs', 'port' => 80, 'path' => '/', 'method' => 'weblogUpdates.ping');
		$servers['blo.gs'] = $blo_gs;

		// Ping-o-Matic XML-RPC settings
		$pingomatic	= array('host' => 'rpc.pingomatic.com', 'port' => 80, 'path' => '/RPC2', 'method' => 'weblogUpdates.ping');
		$servers['pingomatic'] = $pingomatic;

		// Technorati XML-RPC settings
		$technorati	= array('host' => 'rpc.technorati.com', 'port' => 80, 'path' => '/rpc/ping', 'method' => 'weblogUpdates.ping');
		$servers['technorati'] = $technorati;

		// Audio.Weblogs.Com XML-RPC settings -- weblog with a podcst
		$audio_weblogs = array('host' => 'audiorpc.weblogs.com', 'port' => 80, 'path' => '/RPC2', 'method' => 'weblogUpdates.ping');
		$servers['weblogs.audio'] = $audio_weblogs;

		$this->_servers = $servers;
	}

	/**
	 * Method to send a ping to an XML-RPC pingback server which supports the weblogs.com interface
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.ping');
	 *	$ping = new JXPing();
	 *
	 *	// Get the list of available pingback servers
	 *	$servers = $ping->getServerList();
	 *
	 *	// Ping all servers
	 *	foreach ($servers as $server)
	 *	{
	 *		$ping->send($server, {SITE_NAME}, {SITE_URL} [, {POST_URL}] [, {POST_CATEGORY}]);
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$server			The name of the server to ping
	 * @param	string	$siteName		The name of the site to send the ping for
	 * @param	string	$siteURL		The URL of the site to send the ping for
	 * @param	string	$postURL		The URL of the post to send the ping for
	 * @param	string	$postCategory	The category of the post to send the ping for
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function send($server, $siteName, $siteURL, $postURL=null, $postCategory=null)
	{

		// Get the appropriate server struct if it exists
		if (isset($this->_servers[$server])) {
			$pingServer = $this->_servers[$server];
		} else {
			return false;
		}

		// Get the ping server information
		$host	= $pingServer['host'];
		$port	= (isset($pingServer['port'])) ? $pingServer['port'] : 80;
		$path	= (isset($pingServer['path'])) ? $pingServer['path'] : '/';
		$method	= (isset($pingServer['method'])) ? $pingServer['method'] : 'weblogUpdates.ping';

		// Create the XML-RPC Client Object
		$client = new xmlrpc_client($path, $host, $port);

		// Build the XML-RPC method arguments
		$args = new JObject();
		$args->set('site.name', new xmlrpcval($siteName, 'string'));
		$args->set('site.url',	new xmlrpcval($siteURL, 'string'));
		if ($postURL) {
			$args->set('post.url',	new xmlrpcval($postURL, 'string'));
		}
		if ($postCategory) {
			$args->set('post.cat',	new xmlrpcval($postCategory, 'string'));
		}

		// Was a post category sent
		if ($args->get('post.cat')) {
			$params = array (
				$args->get('site.name'),
				$args->get('site.url'),
				$args->get('post.url'),
				$args->get('post.cat')
			);
			$logText = $method.'("'.$siteName.'", "'.$siteURL.'", "'.$postURL.'", "'.$postCategory.'")';
		} else {
			// Was a post url sent?
			if ($args->get('post.url')) {
				$params = array (
					$args->get('site.name'),
					$args->get('site.url'),
					$args->get('post.cat')
				);
				$logText = $method.'("'.$siteName.'", "'.$siteURL.'", "'.$postURL.'")';
			} else {
				$params = array (
					$args->get('site.name'),
					$args->get('site.url')
				);
				$logText = $method.'("'.$siteName.'", "'.$siteURL.'")';
			}
		}

		// Create the XML-RPC message object to send
		$message = new xmlrpcmsg($method, $params);

		// Send the XML-RPC request and get the response
		$response = $client->send($message);

		// If an error was encountered log the error
		if ($response == 0) {
			$this->_logError($host, $client->errno, $client->errstring);
			return false;
		}
		if ($response->faultCode() != 0) {
			$this->_logError($host, $response->faultCode(), $response->faultString);
			return false;
		}

		// Get the response values from the response object
		$response = $response->value();

		// Get data from the response values
		$rError		= $response->structmem('flerror');
		$rMessage	= $response->structmem('message');

		// Do we have an error?
		if ($rError->scalarval() != false) {
			$this->_logError($host, 'FLERROR', $rMessage->scalarval());
			return false;
		}

		// Log the ping request
		$this->_logPing($logText, $message->serialize(), $response->serialize());

		return true;
	}

	/**
	 * Method to get the list of available pingback servers
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.ping');
	 *	$ping = new JXPing();
	 *
	 *	// Get the list of available pingback servers
	 *	$servers = $ping->getServerList();
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @return	array	Array of available pingback servers
	 * @since	1.0
	 */
	function getServerList()
	{
		return array_keys($this->_servers);
	}

	/**
	 * Method to log a successful ping request
	 *
	 * @todo	Implement via JLog
	 * @access	protected
	 * @param	string	$text		The method call text
	 * @param	string	$message	The serialized request message
	 * @param	string	$response	The serialized response message
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function _logPing($text, $message, $response)
	{
		return true;
	}

	/**
	 * Method to log a failed ping request
	 *
	 * @todo	Implement via JLog
	 * @access	protected
	 * @param	string	$host	The host of the server being pinged
	 * @param	string	$code	The error code
	 * @param	string	$string	The error message
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function _logError($host, $code, $string)
	{
		return true;
	}
}
