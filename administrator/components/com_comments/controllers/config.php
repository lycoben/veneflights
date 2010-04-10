<?php
/**
 * @version		$Id: config.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments configuration controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerConfig extends CommentsController
{
	/**
	 * Method to save the configuration changes.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function save()
	{
		// Get the model.
		$model = &$this->getModel('Config', 'CommentsModel');

		// Save the configuration.
		if (!$model->save()) {
			$message = JText::_('COMMENTS_CONFIG_SAVE_FAILED');
			$this->setRedirect('index.php?option=com_comments&view=config&tmpl=component', $message, 'notice');
		} else {
			$this->setRedirect('index.php?option=com_comments&view=config&layout=success&tmpl=component');
		}
	}

	/**
	 * Method to cancel the configuration changes.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function cancel()
	{
		$this->setRedirect('index.php?option=com_comments');
	}

	/**
	 * Method to block an IP or email address from posting.
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function block()
	{
		$type	= JRequest::getWord('block');
		$cid	= JRequest::getVar('cid', null, '', 'array');

		$model	= &$this->getModel('config');
		$result	= $model->block($type, $cid);
		if (JError::isError( $result )) {
			$msg = $result->getMessage();
		} else {
			$msg = JText::sprintf('COMMENTS_ITEMS_BLOCKED', count($cid));
		}
		$this->setRedirect( 'index.php?option=com_comments&view=comments', $msg );
	}

	function export()
	{
		$application = &JFactory::getApplication('administrator');

		$config = &JComponentHelper::getParams('com_comments');
		$configString = $config->toString();

		header( 'Content-type: application/force-download' );
	    header( 'Content-Transfer-Encoding: Binary' );
	    header( 'Content-length: '.strlen($configString));
	    header( 'Content-disposition: attachment; filename="jxcomments.config.ini"' );
		header( 'Pragma: no-cache' );
		header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
		header( 'Expires: 0' );

	    echo $configString;

		$application->close();
	}

	function import()
	{
		$string = JRequest::getVar('configString', null, 'post', 'string', JREQUEST_ALLOWHTML);
		$file	= JRequest::getVar('configFile', array(), 'files', 'array');

		if (!empty($string)) {
			// import the configuration.
			$model = &$this->getModel('Config', 'CommentsModel');
			if (!$model->import($string)) {
				$message = JText::_('COMMENTS_CONFIG_IMPORT_FAILED');
				$this->setRedirect('index.php?option=com_comments&view=config&layout=import&tmpl=component', $message, 'notice');
			} else {
				$this->setRedirect('index.php?option=com_comments&view=config&layout=success&tmpl=component');
			}
		} elseif (!empty($file) and ($file['error'] == 0) and ($file['size'] > 0) and (is_readable($file['tmp_name']))) {
			// get the configuration string from the uploaded file
			$string = implode("\n", file($file['tmp_name']));

			// import the configuration.
			$model = &$this->getModel('Config', 'CommentsModel');
			if (!$model->import($string)) {
				$message = JText::_('COMMENTS_CONFIG_IMPORT_FAILED');
				$this->setRedirect('index.php?option=com_comments&view=config&layout=import&tmpl=component', $message, 'notice');
			} else {
				$this->setRedirect('index.php?option=com_comments&view=config&layout=success&tmpl=component');
			}
		} else {
			$this->setRedirect('index.php?option=com_comments&view=config&layout=import&tmpl=component');
		}
	}
}