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
class CommentsViewComment extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$state		= $this->get('State');
		$comment	= &$this->get('Item');

		$this->assignRef('state', $state);
		$this->assignRef('comment', $comment);

		$contextList	= &$this->get('ListByContext');
		$nameList		= &$this->get('ListByName');
		$addressList	= &$this->get('ListByIP');

		$this->assignRef('contextList', $contextList);
		$this->assignRef('nameList', $nameList);
		$this->assignRef('addressList', $addressList);

		jimport('joomla.html.pane');
		$pane = &JPane::getInstance('sliders');
		$this->assignRef('pane', $pane);

		$document = &JFactory::getDocument();
		$this->assignRef('document', $document);

		// Setup the toolbar
		$this->_setupToolbar();

		parent::display($tpl);
	}

	function _setupToolbar()
	{
		if ($this->_layout == 'edit') {
			JToolBarHelper::title('Comments: '.JText::_('COMMENTS_EDIT_COMMENT'), 'logo');
			JToolBarHelper::save('comment.save');
			JToolBarHelper::cancel('comment.cancel');
		} else {
			JToolBarHelper::title('Comments: '.JText::_('COMMENTS_MODERATE_COMMENT'), 'logo');

			$bar = & JToolBar::getInstance('toolbar');
			// Add an edit button
			$comment = &$this->get('Item');
			$bar->appendButton('Link', 'edit', JText::_('COMMENTS_EDIT'), JRoute::_('index.php?option=com_comments&task=comment.edit&c_id='.$comment->id));

			// Add a cancel button
			$bar->appendButton('Link', 'cancel', JText::_('COMMENTS_CANCEL'), JRoute::_('index.php?option=com_comments&view=comments'));
		}
		JToolBarHelper::divider();
		//JToolBarHelper::help( 'index', true );
	}
}