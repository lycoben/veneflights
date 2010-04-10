<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div id="editcell">
	<table>
		<tr>	
			<td>
				<?php echo JText::_('Please wait until the translation process completed.....'); ?>
			</td>
		</tr>
		<tr>
			<td>
				<img src="<?php echo $this->siteUrl; ?>administrator/components/com_jgtranslation/images/loading.gif" /> 
			</td>
		</tr>		
	</table>
</div>
<input type="hidden" name="option" value="com_jgtranslation" />
<input type="hidden" name="task" value="translate" />
<input type="hidden" name="lang_from" value="<?php echo $this->langFrom; ?>">
<input type="hidden" name="lang_to" value="<?php echo $this->langTo; ?>">
<input type="hidden" name="cid[]" value="<?php echo $this->cid; ?>" />
<input type="hidden" name="where_clause" value="<?php echo $this->whereClause;?>" />
<script type="text/javascript">
	/***
		Submit the form after every 10 second, hope this will not be banned by google
	***/
	function submitForm() {
		var form = document.adminForm;
		form.submit();
	}	
	var randNo = Math.floor((20-4)*Math.random()) + 5;
	var timeOut =  randNo * 1000;				
	setTimeout('submitForm()', timeOut);
</script>
</form>
