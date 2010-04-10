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
class CommentsViewComments extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$state		= $this->get( 'State' );
		$items		= &$this->get( 'Items' );
		$pagination	= &$this->get( 'Pagination' );

		$this->assignRef( 'state', $state );
		$this->assignRef( 'items', $items );

		// setup the page navigation footer
		$this->assignRef( 'pagination', $pagination );

		// published filter
		$options	= array();
		$options[]	= JHTML::_('select.option', '*', JText::_('COMMENTS_ALL'));
		$options[]	= JHTML::_('select.option', '0', JText::_('COMMENTS_PENDING'));
		$options[]	= JHTML::_('select.option', '1', JText::_('COMMENTS_PUBLISHED'));
		$options[]	= JHTML::_('select.option', '2', JText::_('COMMENTS_SPAM'));
		$this->assign( 'published', $options );

		// Setup the toolbar
		$this->_setupToolbar();

		parent::display($tpl);
	}

	function _setupToolbar()
	{
		JToolBarHelper::title( 'Comments: '.JText::_('COMMENTS_MODERATION'), 'logo' );

		JToolBarHelper::custom( 'comment.moderate', 'save.png', 'save_f2.png', 'COMMENTS_MODERATE', false );
		JToolBarHelper::deleteList( '', 'comment.delete' );
		JToolBarHelper::spacer();

		// We can't use the toolbar helper here because there is no generic popup button.
		$bar = &JToolBar::getInstance('toolbar');
		$bar->appendButton('Popup', 'config', 'COMMENTS_CONFIGURATION', 'index.php?option=com_comments&view=config&tmpl=component', 570, 500);

		//JToolBarHelper::help( 'index', true );
	}
}
