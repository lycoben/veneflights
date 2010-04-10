<?php
/**
 * @version		$Id: bookmarks.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Share
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Bookmarks
 *
 * @package		JXtended
 * @subpackage	Share
 */
class JXBookmarks extends JObject
{
	/**
	 * @var	array
	 */
	var $_bookmarks = null;

	function __construct()
	{
		$this->_bookmarks = array();
	}

	/**
	 * The array should be in the form:
	 *
	 * array( 'bookmark name' => '<link>?url={URL}&title={TITLE}' )
	 *
	 * where {URL} and {TITLE} are literal
	 *
	 * @param	array
	 */
	function loadArray( $array )
	{
		$this->_bookmarks = array();
	}

	function loadINI( $path )
	{
		if (file_exists( $path )) {
			$this->_bookmarks = parse_ini_file( $path );
		}
	}

	/**
	 *
	 *
	 * @param	string	URL
	 * @param	string	The item title
	 */
	function format( $url, $title )
	{
		$url	= urlencode( $url );
		$title	= urlencode( $title );
		$result	= array();
		foreach ($this->_bookmarks as $k => $bmark) {
			$result[$k]	= str_replace( array( '{URI}', '{TITLE}' ), array( $url, $title ), $bmark );
		}
		return $result;
	}
}
