<?php
/**
 * @version		$Id: bbcode.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package 	JXtended
 * @subpackage	HTML
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * This class is adapted from and inpired in both code and concept by a class written by
 * Brady Mulhollem.  The copyright notice for his class is as follows:
 *
 * Copyright (c) 2007 Brady Mulhollem
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * BBCode parsing/replacing class
 *
 * @contributor	Brady Mulhollem
 *
 * @package		JXtended
 * @subpackage	HTML
 * @version		1.0
 */
class JXBBCode extends JObject
{
	/**
	 * Array of tags to be replaced
	 *
	 * @access	public
	 * @var		array
	 */
	var $tags = array (
		'b' => 'strong',
		'i' => 'em',
		'u' => 'span style="text-decoration:underline"',
		'quote' => 'blockquote',
		'code' => 'pre',
		's' => 'span style="text-decoration:line-through"',
		'list' => 'ul',
		'\*' => 'li'
	);

	/**
	 * Array of tags to have contents automapped to attributes
	 *
	 * @access	public
	 * @var		array
	 */
	var $tagsAutomapped = array (
		'url' => array (
			'a',
			'href',
			true
		),
		'img' => array (
			'img',
			'src',
			false
		)
	);

	/**
	 * Array of tag with attribute mappings
	 *
	 * @access	public
	 * @var		array
	 */
	var $tagsWithAttributes = array (
		'color' => array (
			'font',
			'color'
		),
		'size' => array (
			'font',
			'size'
		),
		'code' => array (
			'pre',
			'lang'
		),
		'url' => array (
			'a',
			'href'
		)
	);

	/**
	 * Array of smiley mappings
	 *
	 * @access	public
	 * @var		array
	 */
	var $smilies = array (
		':)' => 'smile.gif',
		':(' => 'frown.gif',
		';)' => 'wink.gif',
		':D' => 'big_grin.gif',
		'8)' => 'cool.gif'
	);

	/**
	 * Configuration options array
	 *
	 * @access	private
	 * @var		array
	 */
	 var $_options = array (
		'nl2br' => false,
		'smilies' => true,
		'smileyPath' => '/images/',
		'links' => true,
		'links2new' => true
	);

	/**
	 * The internal text buffer for conversion
	 *
	 * @access	private
	 * @var		string
	 */
	var $_buffer = '';

	/**
	 * Object constructor
	 *
	 * @access	protected
	 * @param	array	$options	Configuration options array for setting object configuration
	 * @return	void
	 * @since	1.0
	 */
	function __construct($options = null)
	{
		if (!empty($options)) {
			$this->setOptions($options);
		}
	}

	/**
	 * Returns a reference to the global JXBBCode object, only creating it
	 * if it doesn't already exist.
	 *
	 * This method must be invoked as:
	 * 		<pre>	$bbcode = &JXBBCode::getInstance();</pre>
	 *
	 * @access	public
	 * @param	array	$options	Configuration options array for setting object configuration.
	 * @return	object	The JXBBCode object.
	 * @since	1.0
	 */
	function &getInstance($options = null)
	{
		static $instance;

		if (!is_object($instance)) {
			$instance = new JXBBCode($options);
		}

		return $instance;
	}

	/**
	 * Method to set the configuration options for the object.
	 *
	 * @access	public
	 * @param	array	$options	Configuration options array to set for the object.
	 * @return	void
	 * @since	1.0
	 */
	function setOptions($options)
	{
		$this->_options = array_merge($this->_options, (array) $options);
	}

	/**
	 * Method to add a simple tag for BBCode replacement
	 *
	 * @access	public
	 * @param	string	$bb		The BBCode tag name for replacement
	 * @param	string	$html	The XHTML tag string for replacement
	 * @return	void
	 * @since	1.0
	 */
	function addTag($bb, $html)
	{
		$this->tags[$bb] = $html;
	}

	/**
	 * Method to add a tag for BBCode replacement which requires attribute automapping.
	 * 	eg. [url]{URI}[/url] automaps to <a href="{URI}">{URI}</a>
	 *
	 * @access	public
	 * @param	string	$bb		The BBCode tag name for replacement
	 * @param	string	$html	The XHTML tag string for replacement
	 * @param	string	$att	The XHTML tag attribute for mapping BBCode tag contents
	 * @param	boolean	$addEnd	Does the XHTML tag require a closing tag?
	 * @return	void
	 * @since	1.0
	 */
	function addMapped($bb, $html, $att, $addEnd = true)
	{
		$this->tagsAutomapped[$bb] = array($html, $att, $addEnd);
	}

	/**
	 * Method to add a tag for BBCode replacement which requires attribute mapping.
	 * 	eg. [url={ATTRIBUTE}]{CONTENT}[/url] with $bb = 'url', $html = 'a' and $att = 'href' maps to
	 * 	<a href="{ATTRIBUTE}">{CONTENT}</a>
	 *
	 * @access	public
	 * @param	string	$bb		The BBCode tag name for replacement
	 * @param	string	$html	The XHTML tag string for replacement
	 * @param	string	$att	The XHTML tag attribute for mapping BBCode tag attribute
	 * @return	void
	 * @since	1.0
	 */
	function addTagWithAttribute($bb, $html, $att)
	{
		$this->tagsWithAttributes[$bb] = array($html, $att);
	}

	/**
	 * Method to add a smiley replacement map
	 *
	 * @access	public
	 * @param	string	$string	The smiley string to replace, eg. :)
	 * @param	string	$image	The image name of the image to replace the smiley string.
	 * @return	void
	 * @since	1.0
	 */
	function addSmiley($string, $image)
	{
		$this->smilies[$string] = $image;
	}

	/**
	 * Method to parse the input string of BBCode and return processed XHTML
	 *
	 * @access	public
	 * @param	string	$input	BBCode input string.
	 * @return	string	XHTML representation of the BBCode input string.
	 * @since	1.0
	 */
	function parse($input)
	{
		// set the input string to the internal buffer for processing
		$this->_buffer = $input;

		// make sure all html is stripped from the buffer
		$this->_buffer = strip_tags($this->_buffer);

		// if configured to convert newlines to <br /> tags, do so.
		if ($this->_options['nl2br']) {
			$this->_buffer = nl2br($this->_buffer);

			// make sure that no <br /> are inserted in code blocks
			$this->_buffer = preg_replace_callback('/\[code(.+?)\](.+?)\[\/code\]/is', array($this,'_breakfix'), $this->_buffer);
		}

		// parse all the tags doing XHTML replacement
		$this->_parseTags();

		// if configured to dynamically convert smilies, do so.
		if ($this->_options['smilies']) {
			$this->_parseSmilies();
		}

		// if configured to dynamically convert links, do so.
		if ($this->_options['links']) {
			$this->_parseLinks();
		}

		return $this->_buffer;
	}

	/**
	 * Method to handle tag replacement for BBCode to XHTML
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function _parseTags()
	{
		// if we are going to be setting the target for all links to a new window generate the target attribute string.
		$target = ($this->_options['links2new']) ? ' target="_new"' : '';

		// first let us process the simple tags
		foreach ($this->tags as $old => $new)
		{
			$ex = explode(' ', $new);
			$this->_buffer = preg_replace('/\['.$old.'\](.+?)\[\/'.$old.'\]/is', '<'.$new.'>$1</'.$ex[0].'>', $this->_buffer);
		}

		// now let's handle the special tags that have to have their contents automapped to an attribute, like <a> and <img>
		foreach ($this->tagsAutomapped as $tag => $data)
		{
			$reg = '/\['.$tag.'\](.+?)\[\/'.$tag.'\]/is';
			if ($data[2]) {
				if ($tag == 'url') {
					$this->_buffer = preg_replace($reg, '<'.$data[0].' '.$data[1].'="$1">$1</'.$data[0].''.$target.'>', $this->_buffer);
				} else {
					$this->_buffer = preg_replace($reg, '<'.$data[0].' '.$data[1].'="$1">$1</'.$data[0].'>', $this->_buffer);
				}
			} else {
				$this->_buffer = preg_replace($reg, '<'.$data[0].' '.$data[1].'="$1" />', $this->_buffer);
			}
		}

		// last we are going to process the tags with attributes
		foreach ($this->tagsWithAttributes as $tag => $data)
		{
			if ($tag == 'url') {
				$this->_buffer = preg_replace('/\['.$tag.'=(.+?)\](.+?)\[\/'.$tag.'\]/is', '<'.$data[0].' '.$data[1].'="$1"'.$target.' title="$2">$2</'.$data[0].'>', $this->_buffer);
			} else {
				$this->_buffer = preg_replace('/\['.$tag.'=(.+?)\](.+?)\[\/'.$tag.'\]/is', '<'.$data[0].' '.$data[1].'="$1">$2</'.$data[0].'>', $this->_buffer);
			}
		}
	}

	/**
	 * Method to autodiscover smilies in the input buffer and replace them with <img> tags for appropriate XHTML display
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function _parseSmilies()
	{
		foreach ($this->smilies as $string => $image)
		{
			$this->_buffer = str_replace($string, '<img src="'.$this->_options['smileyPath'].$image.'" alt="'.$string.'" />', $this->_buffer);
		}
	}

	/**
	 * Method to autodiscover links in the input buffer and replace them with <a> tags for appropriate XHTML display
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function _parseLinks()
	{
		$target = ($this->_options['links2new']) ? ' target="_new"' : '';
		$this->_buffer = preg_replace('/([^"])(http:\/\/|https:\/\/|ftp:\/\/)([^\s,]*)/i', '$1<a href="$2$3"'.$target.'>$2$3</a>', $this->_buffer);
		$this->_buffer = preg_replace('/([^"])([A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4})/i', '$1<a href="mailto:$2">$2</a>', $this->_buffer);
	}

	/**
	 * Method to be used as a regex callback for removing <br /> tags in [code] blocks.
	 *
	 * @access	private
	 * @param	array	$matches	The array of regex matches
	 * @return	string	Processed [code] block
	 * @since	1.0
	 */
	function _breakfix($matches)
	{
		return '[code'.$matches[1].']'.str_replace('<br />', '', $matches[2]).'[/code]';
	}
}