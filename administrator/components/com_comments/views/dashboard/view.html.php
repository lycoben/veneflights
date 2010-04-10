<?php
/**
 * @version		$Id:view.php 1865 2007-09-22 00:35:42Z masterchief $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * @package		Comment
 */
class CommentsViewDashboard extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$this->assignRef('versions', $this->get('Versions'));
		$this->assignRef('upgrades', $this->get('Upgrades'));
		$this->assignRef('requirements', $this->get('Requirements'));
		$this->assignRef('stateStats', $this->get('StateStatistics'));

		// Setup the toolbar
		$this->_setupToolbar();

		parent::display($tpl);
	}

	function _setupToolbar()
	{
		JToolBarHelper::title( 'Comments: '.JText::_('COMMENTS_DASHBOARD'), 'logo' );

		// We can't use the toolbar helper here because there is no generic popup button.
		$bar = &JToolBar::getInstance('toolbar');
		$bar->appendButton('Popup', 'config', 'COMMENTS_CONFIGURATION', 'index.php?option=com_comments&view=config&tmpl=component', 570, 500);
		$bar->appendButton('Popup', 'export', 'COMMENTS_CONFIGURATION_IMPORT', 'index.php?option=com_comments&view=config&layout=import&tmpl=component', 570, 500);
		//JToolBarHelper::help( 'index', true );
	}
}