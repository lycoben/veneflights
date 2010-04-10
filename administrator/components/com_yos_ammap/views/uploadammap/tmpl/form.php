<?php defined('_JEXEC') or die( 'Restricted access' ); ?>
<form action="<?php echo JURI::base(); ?>index.php?option=com_yos_ammap&amp;task=file.upload&amp;<?php echo JUtility::getToken();?>=1" id="uploadForm" method="post" enctype="multipart/form-data">

<!-- File Upload Form -->
<?php if ($this->require_ftp): ?>

	<fieldset title="<?php echo JText::_('DESCFTPTITLE'); ?>">
		<legend><?php echo JText::_('DESCFTPTITLE'); ?></legend>
		<?php echo JText::_('DESCFTP2'); ?>
		<table class="adminform nospace">
			<tr>
				<td width="120">
					<label for="username"><?php echo JText::_('Username'); ?>:</label>
				</td>
				<td>
					<input type="text" id="username" name="username" class="input_box" size="70" value="" />
				</td>
			</tr>
			<tr>
				<td width="120">
					<label for="password"><?php echo JText::_('Password'); ?>:</label>
				</td>
				<td>
					<input type="password" id="password" name="password" class="input_box" size="70" value="" />
				</td>
			</tr>
		</table>
	</fieldset>

<?php endif; ?>

	<fieldset>
		<legend><?php echo JText::_( 'Upload File "ammap.swf"' ); ?> [ <?php echo JText::_( 'Max' ); ?>&nbsp;<?php echo ($this->config->get('upload_maxsize') / 1000000); ?>M ]</legend>
		<fieldset class="actions">
			<input type="file" id="file-upload" name="Filedata" />
			<input type="submit" id="file-upload-submit" value="<?php echo JText::_('Start Upload'); ?>"/>
			<span id="upload-clear"></span>
		</fieldset>
		<ul class="upload-queue" id="upload-queue">
			<li style="display: none" ></li>
		</ul>
	</fieldset>
	<input type="hidden" name="return-url" value="<?php echo base64_encode('index.php?option=com_yos_ammap&task=uploadammap'); ?>" />
	<input type="hidden" name="oldtask" value="uploadammap" />
</form>