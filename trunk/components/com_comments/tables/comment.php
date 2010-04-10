<?php
/**
 * @version		$Id: comment.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Comments Component Comment Table
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsTableComment extends JTable
{
	/**
	 * @var int
	 */
	var $id = null;
	/**
	 * @var int unsigned
	 */
	var $user_id = null;
	/**
	 * @var varchar
	 */
	var $context = null;
	/**
	 * @var int
	 */
	var $context_id = null;
	/**
	 * @var varchar
	 */
	var $referer = null;
	/**
	 * @var varchar
	 */
	var $page = null;
	/**
	 * @var varchar
	 */
	var $name = null;
	/**
	 * @var varchar
	 */
	var $url = null;
	/**
	 * @var varchar
	 */
	var $email = null;
	/**
	 * @var varchar
	 */
	var $subject = null;
	/**
	 * @var text
	 */
	var $body = null;
	/**
	 * @var datetime
	 */
	var $created_date = null;
	/**
	 * @var int unsigned
	 */
	var $published = null;
	/**
	 * @var varchar
	 */
	var $address = null;
	/**
	 * @var varchar
	 */
	var $link = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	object	Database object
	 * @return	void
	 * @since	1.0
	 */
	function __construct(&$db)
	{
		parent::__construct('#__jxcomments_comments', 'id', $db);
	}

	/**
	 * Method to check the current record to save
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function check()
	{
		// get the JXtended Comments configuration object
		$config = &JComponentHelper::getParams('com_comments');

		// import library dependencies
		jimport('joomla.mail.helper');
		jimport('joomla.filter.input');

		// validate the comment data
		$result	= false;
		if (empty($this->context)) {
			$this->setError('Context is empty');
		} else if (empty($this->context_id)) {
			$this->setError('Context ID is empty');
		} else if (empty($this->name)) {
			$this->setError('Name is empty');
		} else if (strlen($this->body) < $config->get('minlength')) {
			$this->setError('Comment is too short');
		} else if (strlen($this->body) > $config->get('maxlength')) {
			$this->setError('Comment is too long');
		} else if (!JMailHelper::isEmailAddress($this->email)) {
			$this->setError('The email addressis invalid');
		} else if ($this->url && JFilterInput::checkAttribute(array('href', $this->url))) {
			$this->setError('Please provide a valid URL');
		} else {
			$result = true;
		}

		// check for http on webpage
		if (strlen($this->url) > 0 && (!(eregi('http://', $this->url) or (eregi('https://', $this->url)) or (eregi('ftp://', $this->url))))) {
			$this->url = 'http://'.$this->url;
		}

		// clean the various mail fields
		$this->subject	= JMailHelper::cleanSubject($this->subject);
		$this->email	= JMailHelper::cleanAddress($this->email);
		$this->body		= JMailHelper::cleanBody($this->body);

		// strip out bad words
		$badWords		= explode(',', $config->get('censorwords'));
		$this->subject	= str_replace($badWords, '', $this->subject);
		$this->name		= str_replace($badWords, '', $this->name);
		$this->url		= str_replace($badWords, '', $this->url);
		$this->email	= str_replace($badWords, '', $this->email);
		$this->body		= str_replace($badWords, '', $this->body);

		return $result;
	}
}
