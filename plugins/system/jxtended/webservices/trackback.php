<?php
/**
 * @version		$Id: trackback.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Webservices
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.environment.request');
jximport('joomla.environment.uri');
jximport('joomla.utilities.error');

/**
 * JXtended Trackback Library
 *
 * This library handles trackbacks for blogs and any other system which supports the specification.
 *
 * Specification: <http://www.sixapart.com/pronet/docs/trackback_spec>
 *
 * Inpired in concept and code by: Ran Aroussi <ran@blogish.org>
 *
 * <code>
 * 	<?php
 *	jximport('jxtended.webservices.trackback');
 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
 *	?>
 * </code>
 *
 * @package		JXtended
 * @subpackage	Webservices
 * @version		1.0
 */
class JXTrackback extends JObject
{
	/**
	 * The name of the blog or website.
	 * @access	public
	 * @var		string
	 */
    var $site;

	/**
	 * The name of the blog or website's author.
	 * @access	public
	 * @var		string
	 */
    var $author;

	/**
	 * The post's unique ID from the GET request.
	 * @access	private
	 * @var		int
	 */
    var $get_id;

	/**
	 * The post's unique ID from the POST request.
	 * @access	private
	 * @var		int
	 */
    var $post_id;

	/**
	 * The URL of the trackback post.
	 * @access	private
	 * @var		string
	 */
    var $url;

	/**
	 * The title of the trackback post.
	 * @access	private
	 * @var		string
	 */
    var $title;

	/**
	 * An excerpt from the trackback post.
	 * @access	private
	 * @var		string
	 */
    var $excerpt;

    /**
     * Class constructor
     *
     * @access	protected
     * @param	string	$site	The name of the blog or website.
     * @param	string	$author	The name of the blog or website's author.
     * @return	void
     * @since	1.0
     */
    function __construct($site, $author)
    {
        $this->site		= $site;
        $this->author	= $author;

		// Get data from the request
		$this->get_id	= JRequest::getVar('id', null, 'get');
		$this->post_id	= JRequest::getVar('id', null, 'post');
		$this->url		= JRequest::getVar('url', null, 'post');
		$this->title	= JRequest::getVar('title', null, 'post');
		$this->excerpt	= JRequest::getVar('excerpt', null, 'post');
    }

	/**
	 * Sends a trackback ping to a specified trackback URL.
	 * allowing clients to auto-discover the TrackBack Ping URL.
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.trackback');
	 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
	 *
	 *	// Send the trackback ping
	 *	if ($trackback->send({TRACKBACK_URI}, {LOCAL_POST_URL} [, {LOCAL_POST_TITLE}] [, {LOCAL_POST_EXCERPT}])) {
	 *		echo "Success";
	 *	} else {
	 *		echo "Failure";
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$target		The target URI to post the trackback to.
	 * @param	string	$url		The trackback post URL.
	 * @param	string	$title		The trackpack post title.
	 * @param	string	$excerpt	Excerpt text from the trackback post.
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function send($target, $url, $title = "", $excerpt = "")
	{
		// Initialize variables
		$response	= '';
		$title		= (empty($title)) ? 'Trackbacking your entry...' : $title;
		$excerpt	= (empty($excerpt)) ? 'I found your entry interesting do I\'ve added a Trackback to it on my weblog' : $excerpt;

		// Parse the target
		$uri = &JURI::getInstance($target);

		// Open the socket
		$server = fsockopen($uri->getHost(), ($uri->getPort()) ? $uri->getPort() : 80);

		// Do we have a connection?
		if (!is_resource($server)) {
			JError::raiseWarning(500, 'Cannot Connect to Trackback Server', 'Server: '.$target);
		}

		// Build the data string to send
		$data = "url=".rawurlencode($url) .
				"&title=".rawurlencode($title) .
				"&blog_name=".rawurlencode($this->site) .
				"&excerpt=".rawurlencode($excerpt);

		// Post the trackback
		fputs($server, "POST " . $uri->toString(array('path', 'query')) . " HTTP/1.1\r\n");
		fputs($server, "Host: " . $uri->getHost() . "\r\n");
		fputs($server, "Content-type: application/x-www-form-urlencoded\r\n");
		fputs($server, "Content-length: " . strlen($data) . "\r\n");
		fputs($server, "Connection: close\r\n\r\n");
		fputs($server, $data);

		// Get trackback response
		while (!feof($server)) {
			$response .= fgets($server, 128);
		}

		// Close the socket
		fclose($server);

		// Did our trackback succeed?
		strpos($response, '<error>0</error>') ? $return = true : $return = false;

		return $return;
	}

	/**
	 * Produces XML response for trackbackers with ok/error message.
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.trackback');
	 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
	 *
	 *	// Set the document mime type
	 *	$document = &JFactory::getDocument();
	 *	$document->setMimeEncoding('text/xml');
	 *
	 *	// Log the trackback in the database or wherever
	 *	$success = myLogFunction($trackback->get('post_id'), $trackback->get('url'), $trackback->get('title'), $trackback->get('excerpt'));
	 *
	 *	// Get the response string for the trackback and set it to the document buffer
	 *	if ($success) {
	 *		$document->setBuffer($trackback->getResponse(true));
	 *	} else {
	 *		$document->setBuffer($trackback->getResponse(false, {OPTIONAL_REASON_WHY_FAILED}));
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	boolean $success	Trackback success state
	 * @param	string	$error		The response message
	 * @return	string	The XML response
	 * @since	1.0
	 */
	function getResponse($success = false, $error = '')
	{
		// Default error response in case of problems...
		if (!$success && empty($error)) {
			$error = 'Unable to log trackback.';
		}

		// Start XML response
		$response[] = '<?xml version="1.0" encoding="UTF-8"?>';
		$response[] = '<response>';
		// Add response state
		if ($success) {
			// Successful trackback
			$response[] = '	<error>1</error>';
		} else {
			// Trackback failure
			$response[] = '	<error>1</error>';
			$response[] = '	<message>'.$this->_makeXMLSafe($error).'</message>';
		}
		// End XML response
		$response[] = '</response>';

		return implode("\n", $response);
	}

	/**
	 * Feteched trackback information and produces an RSS-0.91 feed.
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.trackback');
	 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
	 *
	 *	// Set the document mime type
	 *	$document = &JFactory::getDocument();
	 *	$document->setMimeEncoding('text/xml');
	 *
	 *	// Get the trackback information from the database or wherever.
	 *	// This info is likely to include: {TRACKBACK_TITLE}, {TRACKBACK_EXCERPT}, {PERMALINK_URL}, {TRACKBACK_URL}
	 *	$trackbackInfo = myGetTrackbackFunction($trackback->get('get_id'));
	 *
	 *	// Get the response string for the trackback and set it to the document buffer
	 *	if ($success) {
	 *		$data = new JObject();
	 *		$data->set('title', {TRACKBACK_TITLE});
	 *		$data->set('excerpt', {TRACKBACK_EXCERPT});
	 *		$data->set('permalink', {PERMALINK_URL});
	 *		$data->set('trackback', {TRACKBACK_URL});
	 *
	 *		$document->setBuffer($trackback->getRSSResponse(true));
	 *	} else {
	 *		$document->setBuffer($trackback->getRSSResponse(false, {OPTIONAL_REASON_WHY_FAILED}));
	 *	}
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	boolean	$success	Is the trackback found?
	 * @param	mixed	$data		Either trackback data object or error string
	 * @return	string	The XML response
	 * @since	1.0
	 */
	function getRSSResponse($success = false, $data = '')
	{
		// Default error response in case of problems...
		if (!$success && empty($data)) {
			$data = 'Unable to log trackback.';
		}

		// Start XML response
		$response[] = '<?xml version="1.0" encoding="UTF-8"?>';
		$response[] = '<response>';
        // Send back response...
        if ($success) {
            // Trackback retreived successfully...
            // Sending back an RSS (0.91) - trackback information from $response (array)...
			$response[] = '	<error>0</error>';
			$response[] = '	<rss version="0.91">';
			$response[] = '	<channel>';
			$response[] = '		<title>' . $this->_makeXMLSafe($response->get('title')) . '</title>';
			$response[] = '		<link>' . $this->_makeXMLSafe($response->get('trackback')) . '</link>';
			$response[] = '		<description>' . $this->_makeXMLSafe($response->get('excerpt')) . '</description>';
			$response[] = '		<item>';
			$response[] = '			<title>' . $this->_makeXMLSafe($response->get('title')) . '</title>';
			$response[] = '			<link>' . $this->_makeXMLSafe($response->get('permalink')) . '</link>';
			$response[] = '			<description>' . $this->_makeXMLSafe($response->get('excerpt')) . '</description>';
			$response[] = '		</item>';
			$response[] = '	</channel>';
			$response[] = '	</rss>';
 		} else {
			// Trackback failure
			$response[] = '	<error>1</error>';
			$response[] = '	<message>'.$this->_makeXMLSafe((string) $data).'</message>';
		}
		// End XML response
		$response[] = '</response>';

		return implode("\n", $response);
	}

	/**
	 * Produces embedded RDF representing metadata about the entry,
	 * allowing clients to auto-discover the TrackBack Ping URL.
	 *
	 * NOTE: The post date must be in RFC 822 datetime format <http://www.faqs.org/rfcs/rfc822.html>, it is easiest to use JDate::toRFC822()
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.trackback');
	 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
	 *
	 *	// Get JDate object
	 *	jximport('joomla.utilities.date');
	 *	$date = new JDate({POST_DATE});
	 *
	 *	// Get the trackback information from the database or wherever.
	 *	$rdf = $trackback->getAutodiscoveryRDF($date->toRFC822(), {POST_TITLE}, {POST_EXCERPT}, {POST_PERMALINK}, {POST_TRACKBACK}[, {POST_AUTHOR}]);
	 *	?>
	 * </code>
	 *
	 * @access	public
	 * @param	string	$date		Post date
	 * @param	string	$title		Post title
	 * @param	string	$excerpt	Post excerpt
	 * @param	string	$permalink	Post permalink
	 * @param	string	$trackback	Post trackback url
	 * @param	string	$author		Post author name [optional]
	 * @return	string	The RDF trackback data
	 * @since	1.0
	 */
	function getAutodiscoveryRDF($date, $title, $excerpt, $permalink, $trackback, $author = "")
	{
		if (!$author) {
			$author = $this->author;
		}

		$data[] = '<!-- ';
		$data[] = '<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"';
		$data[] = '	xmlns:dc="http://purl.org/dc/elements/1.1/"';
		$data[] = '	xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">';
		$data[] = '	<rdf:Description';
		$data[] = '		rdf:about="' . $this->_makeXMLSafe($permalink) . '"';
		$data[] = '		dc:identifier="' . $this->_makeXMLSafe($permalink) . '"';
		$data[] = '		trackback:ping="' . $this->_makeXMLSafe($trackback) . '"';
		$data[] = '		dc:title="' . $this->_makeXMLSafe($title) . '"';
		$data[] = '		dc:subject="TrackBack"';
		$data[] = '		dc:description="' . $this->_makeXMLSafe($this->_getSnippet($excerpt)) . '"';
		$data[] = '		dc:creator="' . $this->_makeXMLSafe($author) . '"';
		$data[] = '		dc:date="' . $date . '" />';
		$data[] = '</rdf:RDF>';
		$data[] = '-->';
		$data[] = '';

		return implode("\n", $data);
	}

	/**
	 * Search text for links, and searches links for trackback URLs.
	 *
	 * <code>
	 * 	<?php
	 *	jximport('jxtended.webservices.trackback');
	 *	$trackback = new JXTrackback({SITE_NAME}, {AUTHOR});
	 *
	 *	// Get possible trackback URIs from a post's text
	 *	$uris = $trackback->autodiscovery({POST_TEXT});
	 *
	 *	// Send trackback pings to found trackback URIs
	 *	if ($uris) {
	 *		foreach ($uris as $link)
	 *		{
	 *			// Attempt to send a trackback ping
	 *			if ($trackback->send($link, {POST_URL}[, {POST_TITLE}] [, {POST_EXCERPT}])) {
	 *				// Success
	 *				echo 'Trackback sent to: '.$link;
	 *			} else {
	 *				// Failure
	 *				echo 'Trackback failed to: '.$link;
	 *			}
	 *		}
	 *	} else {
	 *		echo 'No trackbacks were discovered';
	 *	}
	 *	?>
	 * </code>
	 *
	 * @param string $text
	 * @return array Trackback URLs.
	 */
	function autodiscovery($text)
	{
		/*
		 * First lets get all unique links from the text
		 */

		// RegExp to look for (0=>link, 4=>host in 'replace')
		$regex = "/(http)+(s)?:(\\/\\/)((\\w|\\.)+)(\\/)?(\\S+)?/i";

		// Make sure each link ends with [space]
		$text = preg_replace("#www\.#i", "http://www.", $text);
		$text = preg_replace("#http://http://#i", "http://", $text);
		$text = str_replace('"', ' "', $text);
		$text = str_replace('\'', ' \'', $text);
		$text = str_replace('>', ' >', $text);

		// Create an array with unique links
		$uris = array();
		if (preg_match_all($regex, strip_tags($text, '<a>'), $array, PREG_PATTERN_ORDER)) {
			// For each link lets extract the url
			foreach($array[0] as $link)
			{
				// For each delimeter lets trim the string to make sure we have a clean link
				foreach((array(",", ".", ":", ";")) as $t_value)
				{
					$link = trim($link, $t_value);
				}
				$uris[] = ($link);
			}
			// Make sure we don't have duplicates
			$uris = array_unique($uris);
		}

		/*
		 * Next lets get the trackback URIs from the text links
		 */

		// Loop through the URIs array, get data from the URI and extract RDF segments
		$rdfs = array();
		foreach($uris as $link)
		{
			// If the link can be resolved and data gotten from it lets process it
			if ($linkData = @file_get_contents($link)) {
				// Ok, we got data ... lets get all the RDF tags from the data
				$linkRDFs = array();
				preg_match_all('/(<rdf:RDF.*?<\/rdf:RDF>)/sm', $linkData, $linkRDFs, PREG_SET_ORDER);
				for ($i=0, $n=count($linkRDFs); $i < $n; $i++)
				{
					// Ok, for each of these RDF tags, lets make sure we have a trackback URI match
					if (preg_match('|dc:identifier="' . preg_quote($link) . '"|ms', $linkRDFs[$i][1])) {
						$rdfs[] = trim($linkRDFs[$i][1]);
					}
				}
			}
		}

		// Loop through the RDFs array and extract trackback URIs
		$trackbacks = array();
		if (!empty($rdfs)) {
			for ($i=0, $n=count($rdfs); $i < $n; $i++)
			{
				// Do we have a trackback ping url in the RDF?
				if (preg_match('/trackback:ping="([^"]+)"/', $rdfs[$i], $array)) {
					$trackbacks[] = trim($array[1]);
				}
			}
		}

		return (count($trackbacks)) ? $trackbacks : false;
    }

	/**
	 * Converts a string into an XML-safe string (replaces &, <, >, " and ')
	 *
	 * @access	private
	 * @param	string	$string	The string to make XML-safe
	 * @return	string	The XML-safe string
	 * @since	1.0
	 */
	function _makeXMLSafe($string)
	{
		return htmlspecialchars($string, ENT_QUOTES);
	}

	/**
	 * Gets a snippet from a string of a given length.  If the string is longer than the given length then the
	 * snippet will end with an ellipse [...].
	 *
	 * @access	private
	 * @param	string	$string	String to get a snippet from.
	 * @param	int		$length	Maximum length of the snippet from the string.
	 * @return	string	The snippet.
	 * @since	1.0
	 */
	function _getSnippet($string, $length = 255)
	{
		if (strlen($string) > $length) {
			$string = substr($string, 0, $length - 3) . '...';
		}

		return $string;
	}
}
