<?php
/**
 * @version		$Id: view.php 304 2008-07-11 00:55:54Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jximport('jxtended.application.module.view');

// add the JXtended Comments component JHTML helpers
JHTML::addIncludePath(JPATH_SITE.DS.'components'.DS.'com_comments'.DS.'helpers'.DS.'html');

/**
 * Content sharing module view for JXtended Comments
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModuleViewShare extends JModuleView
{

	var $_bookmarks = array(
		'delicious'=>'http://del.icio.us/post?url={URI}&title={TITLE}',
		'furl'=>'http://furl.net/storeIt.jsp?u={URI}&t={TITLE}',
		'yahoo_myweb'=>'http://myweb2.search.yahoo.com/myresults/bookmarklet?u={URI}&t={TITLE}',
		'google_bmarks'=>'http://www.google.com/bookmarks/mark?op=edit&bkmk={URI}&title={TITLE}',
		'blinklist'=>'http://blinklist.com/index.php?Action=Blink/addblink.php&Url={URI}&Title={TITLE}',
		'magnolia'=>'http://ma.gnolia.com/bookmarklet/add?url={URI}&title={TITLE}',
		'facebook'=>'http://www.facebook.com/share.php?u={URI}',
		'digg'=>'http://digg.com/submit?phase=2&url={URI}&title={TITLE}',
		'stumbleupon'=>'http://www.stumbleupon.com/submit?url={URI}&title={TITLE}',
		'technorati'=>'http://www.technorati.com/faves?add={URI}',
		'newsvine'=>'http://www.newsvine.com/_tools/seed&save?popoff=0&u={URI}&h={TITLE}',
		'reddit'=>'http://reddit.com/submit?url={URI}&title={TITLE}',
		'tailrank'=>'http://tailrank.com/share/?link_href={URI}&title={TITLE}'
	);

	/**
	 * View constructor
	 *
	 * @access	protected
	 * @return	void
	 * @since	1.0
	 */
	function __construct($name, &$params)
	{
		// get some needed variables
		$this->_config = &JComponentHelper::getParams('com_comments');

		// call the parent constructor
		parent::__construct($name, $params);
	}

	/**
	 * Method to initialize all of the necessary variables for module rendering
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function init()
	{
		// get some needed variables
		$user	  = &JFactory::getUser();
		$userId	  = $user->get('id');
		$document = &JFactory::getDocument();

		// if sharing is disabled for JXtended comments, do nothing and return
		if ($this->_config->get('enable_sharing') == 0) {
			return false;
		}

		// get a URI object and URI string of the current page
		$uri	= &JFactory::getURI();
		$url	= $uri->toString(array('scheme', 'user', 'pass', 'host', 'port', 'path', 'query'));
		$title	= $this->params->get('title', $document->getTitle());

		// assign the variables to the view for rendering
		$this->assignRef('config', $this->_config);
		$this->assignRef('title', $title);
		$this->assignRef('url',	$url);

		return true;
	}

	/**
	 * Method to return a formatted URL string for a social bookmarking site
	 *
	 * @access	public
	 * @param	string	$site	The social bookmarking site
	 * @param	string	$url	URL to the page to bookmark
	 * @param	string	$title	The title of the page to bookmark
	 * @return	mixed	The social bookmarking URL for the page or boolean false if the site doesn't exist
	 * @since	1.0
	 */
	function getBookmark($site, $url=null, $title=null)
	{
		$result	= false;
		$url	= urlencode((is_null($url)) ? $this->url : $url);
		$title	= urlencode((is_null($title)) ? $this->title : $title);

		if (!empty($this->_bookmarks[$site])) {
			$result	= str_replace(array('{URI}', '{TITLE}'), array($url, $title), $this->_bookmarks[$site]);
		}

		return JFilterOutput::ampReplace($result);
	}
}