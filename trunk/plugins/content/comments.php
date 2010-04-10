<?php
/**
 * @version		$Id: comments.php 306 2008-07-11 01:02:38Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.event.plugin');

/**
 * The JXtended Comments content plugin
 *
 * @package	Comments
 * @version	1.0
 */
class plgContentComments extends JPlugin
{
	var $_catParams = array();

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param object $subject The object to observe
	 * @since 1.5
	 */
	function plgContentComments(&$subject, $params)
	{
		parent::__construct($subject, $params);
	}

	/**
	 * Empty method for now
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 */
	function onPrepareContent(&$article, &$params, $limitstart)
	{
		// empty method for now
	}

	/**
	 * Empty method for now
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onAfterDisplayTitle(&$article, &$params, $limitstart)
	{
		// 0
		$result	= '';
		if (!$this->_getShowState($article, 0)) {
			return $result;
		}

		$result .= $this->_getRenderedData($article, 0);
		return $result;
	}

	/**
	 * Empty method for now
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onBeforeDisplayContent(&$article, &$params, $limitstart)
	{
		// 1
		$result	= '';
		if (!$this->_getShowState($article, 1)) {
			return $result;
		}

		$result .= $this->_getRenderedData($article, 1);
		return $result;
	}

	/**
	 * Method to render the comments output after an article
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 * @return	string
	 */
	function onAfterDisplayContent(&$article, &$params, $limitstart)
	{
		// 2
		$result	= '';
		if (!$this->_getShowState($article, 2)) {
			return $result;
		}

		$result .= $this->_getRenderedData($article, 2);
		return $result;
	}

	function _getShowState(&$article, $location)
	{
		if (isset($article->context) && $article->context == 'zine/article') {
			return false;
		}

		$shareHere		= ($this->params->get('share_placement', 2) == $location);
		$ratingsHere	= ($this->params->get('ratings_placement', 2) == $location);
		$commentsHere	= ($this->params->get('comments_placement', 2) == $location);
		if (!$shareHere and !$ratingsHere and !$commentsHere) {
			return false;
		}

		$showUncat		= $this->params->get('show_uncat', 0);
		$showCategories = (array) $this->params->get('categories');
		$show = (($showUncat and isset($article->sectionid) and $article->sectionid == 0 and isset($article->catid) and $article->catid == 0) or (isset($article->catid) and in_array($article->catid, $showCategories)));
		if (!$show) {
			return false;
		}

		$view = JRequest::getCmd('view');
		$showFrontpage	= $this->params->get('show_on_frontpage', 1);
		$showSection	= $this->params->get('show_on_sections', 1);
		if ((($view == 'frontpage') and !$showFrontpage) or (($view == 'section') and !$showSection)) {
			return false;
		}

		return true;
	}

	function _getRenderedData(&$article, $location)
	{
		$result = '';

		$shareHere		= ($this->params->get('share_placement', 2) == $location);
		$ratingsHere	= ($this->params->get('ratings_placement', 2) == $location);
		$commentsHere	= ($this->params->get('comments_placement', 2) == $location);

		$showShare		= $this->params->get('show_share', 1);
		$showRatings	= $this->params->get('show_ratings', 1);
		$showComments	= $this->params->get('show_comments', 1);

		$style		= 'raw';
		$options	= array('style'=>$style);

		if ($shareHere and $showShare) {
			$result .= $this->_getShare($article, $options);
		}

		if ($ratingsHere and $showRatings) {
			$result .= $this->_getRatings($article, $options);
		}

		if ($commentsHere and $showComments) {
			$view = JRequest::getCmd('view');
			if ($view == 'article') {
				$result .= $this->_getComments($article, $options, false);
			} else {
				$result .= $this->_getComments($article, $options, true);
			}
		}

		return $result;
	}

	function _getShare(&$article, $options)
	{
		$document	= &JFactory::getDocument();
		$renderer	= $document->loadRenderer('module');

		if (empty($this->_catParams[$article->catid])) {
			$db = &JFactory::getDBO();
			$db->setQuery(
				'SELECT `params`' .
				' FROM `#__categories`' .
				' WHERE `id` = '.(int)$article->catid
			);
			$catParams = $db->loadResult();
			$this->_catParams[$article->catid] = new JParameter($catParams);
		}

		$module	= JModuleHelper::getModule('mod_comments_share');
		if (!empty($article->readmore_link)) {
			$module->params	= "link=".$article->readmore_link."\nheading=2\ntitle=".$article->title;
		} else {
			$module->params	= "link=".JRoute::_('index.php?view=article&catid='.$article->catslug.'&id='.$article->slug)."\nheading=2\ntitle=".$article->title;
		}

		if (!empty($this->_catParams[$article->catid])) {
			$module->params .= "\nfeedflarepath=".$this->_catParams[$article->catid]->get('feedflarepath');
		}

		$result	= $renderer->render($module, $options);

		return $result;
	}

	function _getRatings(&$article, $options)
	{
		$document	= &JFactory::getDocument();
		$renderer	= $document->loadRenderer('module');

		$module	= JModuleHelper::getModule('mod_comments_rating');
		$module->params	= "context=content\ncontext_id=".$article->id;
		$result	= $renderer->render($module, $options);

		return $result;
	}

	function _getComments(&$article, $options, $simple=false)
	{
		$layout = ($simple == true) ? "\nlayout=simple" : null;

		$document	= &JFactory::getDocument();
		$renderer	= $document->loadRenderer('module');

		$module	= JModuleHelper::getModule('mod_comments_comment');
		if (!empty($article->readmore_link)) {
			$module->params	= "link=".$article->readmore_link.$layout."\ncontext=content\ncontext_id=".$article->id;
		} else {
			$module->params	= "link=".JRoute::_('index.php?view=article&catid='.$article->catslug.'&id='.$article->slug).$layout."\ncontext=content\ncontext_id=".$article->id;
		}
		$result	= $renderer->render($module, $options);

		return $result;
	}
}