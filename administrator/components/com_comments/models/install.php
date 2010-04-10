<?php
/**
 * @version		$Id: install.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.model');

/**
 * The JXtended Comments install model
 *
 * @deprecated
 * @package	Comments
 * @version	1.0
 */
class CommentsModelInstall extends JModel
{
	/**
	 * Method to install JXtended Comments
	 *
	 * @access	public
	 * @return	mixed	Boolean true on success, or JException on failure
	 * @since	1.0
	 */
	function install()
	{
		// get the database connection object
		$db	= &$this->getDBO();

		// check to see if the extension is already installed
		$db->setQuery(
			'SELECT COUNT(`id`)' .
			' FROM `#__components`' .
			' WHERE `option` = '.$db->Quote('com_comments')
		);

		// if the extension is not found, then lets attempt an install
		if ($db->loadResult() == 0)
		{
			// check if the old extension is installed and migrate if it is found
			$db->setQuery(
				'SELECT COUNT(`id`)' .
				' FROM `#__components`' .
				' WHERE `option` = '.$db->Quote('com_rokcomment')
			);
			$isNew = (bool) ($db->loadResult() == 0);

			if ($isNew) {
				/*
				 * This is a new install, so lets just run the install queries and go.
				 */

				// insert the component into the #__components table
				$db->setQuery(
					'INSERT INTO `jos_components`' .
					' VALUES (0, \'Comments\', \'option=com_comments\', 0, 0, \'option=com_comments\', \'JXtended Comments\', \'com_comments\', 0, \'\', 0, \'\', 1)'
				);
				if (!$db->query()) {
					return new JExecption( $db->getErrorMsg() );
				}

				// get the schema and base data for JXtended Comments
				$queries = file(JPATH_COMPONENT.'/install/installsql.mysql.utf8.php');

				// get rid of first line as it messes with the batch parser
				array_shift($queries);

				// execute the schema import
				$db->setQuery(implode("\n", $queries));
				if (!$db->queryBatch()) {
					return new JExecption( $db->getErrorMsg() );
				}

				return true;

			} else {
				/*
				 * RokComment is present, so lets attempt a migration and go.
				 */

				// get the schema and base data migration queries from RokComment
				$queries = file(JPATH_COMPONENT.'/install/migratesql.rokcomment.php');

				// get rid of first line as it messes with the batch parser
				array_shift( $queries );
				$db->setQuery( implode( "\n", $queries ) );

				// execute the schema migration
				if (!$db->queryBatch()) {
					return new JException( $db->getErrorMsg() );
				}

				return true;
			}
		} else {
			// JXtended Comments is already installed, return a JException.
			return new JException('Comments is already installed');
		}
	}
}
