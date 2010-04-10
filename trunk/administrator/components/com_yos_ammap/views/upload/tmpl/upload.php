<script type="text/javascript">
function submitbutton(){
	var form = document.adminForm;

	// do field validation
	if (form.install_title.value == ""){
		alert( "<?php echo JText::_( 'Please enter a Title', true ); ?>" );
	} else {
		form.installtype.value = 'upload';
		form.submit();
	}
}
</script>

<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm">

	<?php if ($this->ftp) : ?>
		<?php echo $this->loadTemplate('ftp'); ?>
	<?php endif; ?>

	<table class="adminform">
	<tr>
		<th colspan="2"><?php echo JText::_( 'Upload Package File' ); ?></th>
	</tr>
	<tr>
		<td width="120">
			<label for="install_title"><?php echo JText::_( 'Title File' ); ?>:</label>
		</td>
		<td>
			<input class="input_box" id="install_title" name="install_title" type="text" size="57" />			
		</td>
	</tr>
	<tr>
		<td>
			<label for="install_package"><?php echo JText::_( 'Package File' ); ?>:</label>
		</td>
		<td>
			<input class="input_box" id="install_package" name="install_package" type="file" size="57" />
			<input class="button" type="button" value="<?php echo JText::_( 'Upload File' ); ?> &amp; <?php echo JText::_( 'Install' ); ?>" onclick="submitbutton()" />
		</td>
	</tr>
	</table>	

	<input type="hidden" name="type" value="" />
	<input type="hidden" name="installtype" value="upload" />
	<input type="hidden" name="task" value="doInstall" />
	<input type="hidden" name="option" value="com_yos_ammap" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>