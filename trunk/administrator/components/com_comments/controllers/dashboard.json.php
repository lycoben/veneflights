<?php
/**
 * @version		$Id: dashboard.json.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * The JXtended Comments dashboard json controller
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsControllerDashboard extends CommentsController
{
	function display()
	{
		$application = &JFactory::getApplication('administrator');
		$application->close();
	}

	function enablePlugin()
	{
		$application = &JFactory::getApplication('administrator');

		if (!file_exists(JPATH_ROOT.'/plugins/system/jxtended.php')) {
			echo '{"error":true,"message":"'.JText::_('JX_PLUGIN_MISSING').'"}';
		} else {
			$db = &JFactory::getDBO();
			$db->setQuery(
				'SELECT `id`, `published`' .
				' FROM `#__plugins`' .
				' WHERE `folder` = "system"' .
				' AND `element` = "jxtended"'
			);
			$plugin = $db->loadObject();

			if (!empty($plugin)) {
				if (!$plugin->published) {
					$db->setQuery(
						'UPDATE `#__plugins`' .
						' SET `published` = 1' .
						' WHERE `folder` = "system"' .
						' AND `element` = "jxtended"'
					);
					if ($db->query()) {
						echo '{"error":false}';
					} else {
						echo '{"error":true,"message":"'.JText::_('JX_ENABLE_PLUGIN_FAILED').'"}';
					}
				} else {
					echo '{"error":true,"message":"'.JText::_('JX_PLUGIN_ALREADY_ENABLED').'"}';
				}
			} else {
				echo '{"error":true,"message":"'.JText::_('JX_PLUGIN_NOT_INSTALLED').'"}';
			}
		}

		$application->close();
	}

	function hideWarning()
	{
		$application = &JFactory::getApplication('administrator');

		$model = &$this->getModel('dashboard');

		$warning = &JRequest::getCmd('warning');
		if ($model->hideWarning($warning)) {
			echo '{"error":false}';
		} else {
			echo '{"error":true,"message":"'.JText::_('COMMENTS_UNABLE_TO_HIDE_WARNING').'"}';
		}

		$application->close();
	}
}