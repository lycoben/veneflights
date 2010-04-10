<?php
/**
 * @version		$Id: default.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.switcher');
JHTML::_('behavior.tooltip');
$this->document->addStyleSheet('templates/system/css/system.css');
?>

<div id="comments-config">
	<fieldset>
		<div style="float: right">
			<button type="button" onclick="submitbutton('config.save');">
				<?php echo JText::_('COMMENTS_SAVE');?>
			</button>
			<button type="button" onclick="window.location = 'index.php?option=com_comments&amp;task=config.export';">
				<?php echo JText::_('COMMENTS_EXPORT');?>
			</button>
			<button type="button" onclick="window.parent.document.getElementById('sbox-window').close();">
				<?php echo JText::_('COMMENTS_CANCEL');?>
			</button>
		</div>
		<div class="configuration" >
			<?php echo JText::_('COMMENTS_CONFIG_TOOLBAR_TITLE'); ?>
		</div>
	</fieldset>

	<div id="submenu-box">
		<div class="t">
			<div class="t">
				<div class="t"></div>
	 		</div>
		</div>
		<div class="m">
			<ul id="submenu">
				<li><a id="component" class="active"><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_COMMENTS'); ?></a></li>
				<li><a id="spam"><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_SPAM'); ?></a></li>
				<li><a id="bookmarking"><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_BOOKMARKING'); ?></a></li>
				<li><a id="blocking"><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_BLOCKING'); ?></a></li>
			</ul>
			<div class="clr"></div>
		</div>
		<div class="b">
			<div class="b">
	 			<div class="b"></div>
			</div>
		</div>
	</div>

	<form action="index.php?option=com_comments" method="post" name="adminForm" autocomplete="off">
		<div id="config-document">
			<div id="page-component">
				<fieldset>
					<legend><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_COMMENTS'); ?></legend>
					<?php echo JHTML::_('comments.params', 'params', $this->config->toString(), 'models/forms/config/comments.xml'); ?>
				</fieldset>
			</div>

			<div id="page-spam">
				<fieldset>
					<legend><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_SPAM'); ?></legend>
					<?php echo JHTML::_('comments.params', 'params', $this->config->toString(), 'models/forms/config/spam.xml'); ?>
				</fieldset>
			</div>

			<div id="page-bookmarking">
				<fieldset>
					<legend><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_BOOKMARKING'); ?></legend>
					<?php echo JHTML::_('comments.params', 'params', $this->config->toString(), 'models/forms/config/bookmarking.xml'); ?>
				</fieldset>
			</div>

			<div id="page-blocking">
				<fieldset>
					<legend><?php echo JText::_('COMMENTS_CONFIG_CONFIGURE_BLOCKING'); ?></legend>
					<?php echo JHTML::_('comments.params', 'params', $this->config->toString(), 'models/forms/config/blocking.xml'); ?>
				</fieldset>
			</div>
		</div>
		<?php echo JHTML::_('comments.params', 'params', $this->config->toString(), 'models/forms/config/hidden.xml'); ?>
		<input type="hidden" name="task" value="" />
	</form>
</div>