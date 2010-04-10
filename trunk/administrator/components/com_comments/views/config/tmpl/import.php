<?php
/**
 * @version		$Id: import.php 295 2008-07-09 08:35:28Z louis $
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
			<button type="button" onclick="submitbutton('config.import');">
				<?php echo JText::_('COMMENTS_IMPORT');?>
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

	<form action="index.php?option=com_comments" method="post" name="adminForm" autocomplete="off" enctype="multipart/form-data">
		<fieldset>
			<legend><?php echo JText::_('COMMENTS_CONFIG_IMPORT'); ?></legend>

			<label for="import_file"><?php echo JText::_('COMMENTS_CONFIG_IMPORT_FROM_FILE'); ?></label><br />
			<input type="file" name="configFile" id="import_file" size="50" />

			<br /><br />

			<label for="import_string"><?php echo JText::_('COMMENTS_CONFIG_IMPORT_FROM_STRING'); ?></label><br />
			<textarea name="configString" rows="10" cols="50"></textarea>
		</fieldset>
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_('form.token'); ?>
	</form>
</div>