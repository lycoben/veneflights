<?php
/**
 * @version		$Id: view.html.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * @package		jXComments
 */
class CommentsViewUpgrade extends JView
{
	/**
	 * Set the toolbar icons
	 */
	function setToolbar()
	{
		JToolBarHelper::title( 'Comments: '.JText::_('COMMENTS_UPGRADES'), 'logo' );
		//JToolBarHelper::help( 'index', true );
	}

	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$state		= $this->get( 'State' );
		$items		= &$this->get( 'Upgrades', 'Dashboard' );

		$this->assignRef( 'state', $state );
		$this->assignRef( 'items', $items );

		$this->setToolbar();

		parent::display($tpl);
	}
}