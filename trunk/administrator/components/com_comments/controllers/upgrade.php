<?php
/**
 * @version		$Id: upgrade.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments upgrade controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerUpgrade extends CommentsController
{
	/**
	 * Dummy method to redirect the display method
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function display()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_comments'));
	}

	/**
	 * Method to process an upgrade
	 *
	 * @access	public
	 * @return	void
	 * @since	1.0
	 */
	function process()
	{
		// Check for request forgeries
		JRequest::checkToken('request') or die('Invalid Request');

		// Set the redirection
		$this->setRedirect($_SERVER['HTTP_REFERER']);

		$version	= JRequest::getString( 'version' );
		$version	= preg_replace( '#[^0-9\.]#i', '', $version );
		$file		= JPATH_COMPONENT.DS.'install'.DS.'upgradesql.'.str_replace( '.', '_', $version ).'.mysql.utf8.php';

		if (file_exists( $file ))
		{
			jimport('joomla.filesystem.file');
			$db	 = &JFactory::getDBO();
			$sql = JFile::read($file);
			$db->setQuery($sql);
			if ($db->queryBatch())
			{
				$db->setQuery(
					'INSERT INTO `#__jxcomments` (`version`, `log`)' .
					' VALUES ('.$db->Quote( $version ).', '.$db->Quote( 'Database updated' ).')'
				);
				if ($db->query()) {
					$this->setMessage('Upgrade successful');
				}
				else {
					$this->setMessage('Upgrade successful BUT failed to update version log');
				}
			}
			else
			{
				JError::raiseWarning(500, $db->getErrorMsg());
				$this->setMessage('Database Error');
			}
		}
		else
		{
			$this->setMessage(JText::_('Upgrade file not found'));
		}
	}
}