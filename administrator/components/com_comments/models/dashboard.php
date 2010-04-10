<?php
/**
 * @version		$Id: dashboard.php 307 2008-07-15 19:47:01Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.model');

/**
 * The JXtended Comments dashboard model
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModelDashboard extends JModel
{
	/**
	 * Flag to indicate model state initialization.
	 *
	 * @access	protected
	 * @var		boolean
	 */
	var $__state_set		= null;

	/**
	 * Overridden method to get model state variables.
	 *
	 * @access	public
	 * @param	string	$property	Optional parameter name.
	 * @return	object	The property where specified, the state object where omitted.
	 * @since	1.0
	 */
	function getState($property = null)
	{
		// if the model state is uninitialized lets set some values we will need from the request.
		if (!$this->__state_set)
		{
			// load the component configuration parameters.
			$this->setState('config', JComponentHelper::getParams('com_comments'));

			$this->__state_set = true;
		}

		return parent::getState($property);
	}

	/**
	 * Method to get requirements test information
	 *
	 * @access	public
	 * @return	array	Array of requirements test information
	 * @since	1.0
	 */
	 function getRequirements()
	 {
	 	$config = $this->getState('config');
	 	$requirements = array();

		// builtin captcha requires the GD libraries
		$gd = new JObject();
		$gd->set('name', JText::_('COMMENTS_REQUIREMENT_GD'));
		$gd->set('fail_message', JText::_('COMMENTS_REQUIREMENT_GD_WARNING'));
		$gd->set('level', 'notice');
		$gd->set('value', is_callable('gd_info'));
		$requirements[] = $gd;
		if ($config->get('captcha') and !$config->get('enable_recaptcha') and !$gd->get('value')) {
			JError::raiseWarning(500, JText::_('COMMENTS_REQUIREMENT_GD_WARNING'));
		} elseif (!$config->get('hidewarning_gd') and !$gd->get('value')) {
			JError::raiseNotice(500, JText::_('COMMENTS_REQUIREMENT_GD_NOTICE'));
		}

	 	// extra information about GD if we need it in the future
		if (is_callable('gd_info')) {
			$gd = gd_info();
			foreach ($gd as $k => $v)
			{
				// var_dump($k); var_dump($v);
			}
		}

		// builtin captcha requires that a media folder be writeable
		/*
		$captchaFolder = new JObject();
		$captchaFolder->set('name', JText::_('COMMENTS_REQUIREMENT_CAPTCHA_FOLDER'));
		$captchaFolder->set('fail_message', JText::_('COMMENTS_REQUIREMENT_CAPTCHA_FOLDER_NOTICE'));
		$captchaFolder->set('level', 'warning');
		$captchaFolder->set('value', is_writable(JPATH_SITE.DS.'tmp'));
		$requirements[] = $captchaFolder;
		if (!$config->get('hidewarning_captcha_folder') and !$captchaFolder->get('value')) {
			JError::raiseNotice(500, JText::sprintf('COMMENTS_REQUIREMENT_CAPTCHA_FOLDER_NOTICE', JPATH_SITE.DS.'tmp'));
		}
		*/

		// built-in captcha test should pass
		if (!is_callable('jximport')) {
			return;
		}
		jximport( 'jxtended.captcha.captcha' );
		// TODO: Get the tmp dir from $mainframe
		$options	= array( 'filePath' => JPATH_SITE.DS.'tmp' );
		$captcha = &JXCaptcha::getInstance( 'image', $options );

		if (!$captcha->test()) {
			$captchaTest = new JObject();
			$captchaTest->set('name', JText::_('COMMENTS_REQUIREMENT_CAPTCHA_TEST'));
			$captchaTest->set('fail_message', $captcha->getError());
			$captchaTest->set('level', 'warning');
			$captchaTest->set('value', false);
			$requirements[] = $captchaTest;
		}

	 	return $requirements;
	 }

	/**
	 * Method to get the version history for JXtended Comments
	 *
	 * @access	public
	 * @return	array	Array of version objects
	 * @since	1.0
	 */
	function getVersions()
	{
		// get a database connector object
		$db = &$this->getDBO();

		$db->setQuery(
			'SELECT *' .
			' FROM `#__jxcomments`' .
			' ORDER BY `installed_date` DESC'
		);
		$result	= $db->loadObjectList();

		// make sure the returned value is an array
		if (empty($result)) {
			$result = array();
		}

		return $result;
	}


	/**
	 * Method to get the version history for JXtended Comments
	 *
	 * @access	public
	 * @return	array	Array of version objects
	 * @since	1.0
	 */
	function getStateStatistics()
	{
		// get a database connector object
		$db = &$this->getDBO();

		$db->setQuery(
			'SELECT `published`, COUNT(*) AS num' .
			' FROM `#__jxcomments_comments`' .
			' GROUP BY `published`'
		);
		$result	= $db->loadObjectList('published');

		// make sure the returned value is an array
		if (empty($result)) {
			$result = array();
		}

		return $result;
	}

	/**
	 * Method to get the available upgrades
	 *
	 * @access	public
	 * @return	array	Array of available upgrades
	 * @since	1.0
	 */
	function getUpgrades()
	{
		$versions	= $this->getVersions();
		$result		= array();

		// get the latest version from the database
		if ($lastVer = array_shift($versions))
		{
			// get the version information from the version object
			$thisVer		= new CommentsVersion;
			$thisVersion	= $thisVer->version.'.'.$thisVer->subversion;
			$lastVersion	= $lastVer->version;

			// do we have the latest version installe?
			if (version_compare( $thisVersion, $lastVersion ) == 1)
			{
				// we do not, look for upgrade SQL scripts
				$files = JFolder::files(JPATH_COMPONENT.DS.'install', '^upgradesql');
				foreach ($files as $file)
				{
					$parts = explode('.', $file);
					$fileVersion = str_replace('_', '.', $parts[1]);
					if (version_compare($fileVersion, $lastVersion ) > 0) {
						$result[$fileVersion]	= $file;
					}
				}

			}
		}
		return	$result;
	}

	function hideWarning($warning, $reverse=false)
	{
		// initialize variables.
		$table			= &JTable::getInstance('component');
		$row			= array();
		$row['option']	= 'com_comments';

		// load the component data for com_comments
		if (!$table->loadByOption('com_comments')) {
			$this->setError($table->getError());
			return false;
		}

		// set the appropriate value in the component configuration
		$params = new JParameter($table->params);
		$params->set('hidewarning_'.$warning, ($reverse ? 0 : 1));
		$row['params'] = $params->toArray();

		// bind the new values
		$table->bind($row);

		// check the row.
		if (!$table->check()) {
			$this->setError($table->getError());
			return false;
		}

		// store the row.
		if (!$table->store()) {
			$this->setError($table->getError());
			return false;
		}

		return true;
	}
}