<?php
	defined('_JEXEC') or die('Restricted access');
	JRequest::setVar( 'hidemainmenu', 1 );
?>
<style type="text/css">	 
	.ajax-loading {
		padding: 20px 0;
		background: url(components/com_yos_translator/assets/images/spinner.gif) no-repeat center;
	}
	
	.yos_completed {	
		padding: 10px 0;
		background: url(components/com_yos_translator/assets/images/success.png) no-repeat center;
	}
</style>
<script type="text/javascript" language="javascript">
function submitbutton(pressbutton)
{
	var form = document.adminForm;

	if ( pressbutton == 'save' ) {
		yos_submit(0,form.yos_num.value);
	}
	
	if ( pressbutton == 'cancel') {
		submitform('translatemodules.cancel');
	}

	
}

function yos_submit(i,n){
	//remove old translated class
	$('toolbar-save').setStyle('display','none');
	for(var j = 0; j < n; j++) {
		var log = $('log_res'+j);
		log.removeClass('yos_completed');
	}
	//run ajax translate
	ajax_translate(i, n);
	
}
	
function ajax_translate(i, n){
	if (i<n) {
		id = $('cb'+i).getProperty('value');
		url="index.php?option=com_yos_translator&tmpl=component&task=translatemodules.save&id="+id+"&src="+document.adminForm.default_l.value+"&dst="+document.adminForm.language_id.value+"&published="+$('published').checked;
		var log = $('log_res'+i);
		log.removeClass('yos_completed');
		log.empty().addClass('ajax-loading');
		new Ajax (url,{
			method: 'get',
			update: $('log_res'+i),
			onComplete: function(){
				log.removeClass('ajax-loading');
				log.addClass('yos_completed');
				ajax_translate(i+1,n);
			}
		}).request();
	} else {
		$('toolbar-save').setStyle('display','block');
	}
}
</script>
<form action="index.php?option=com_yos_translator&task=saveEditAllContent" method="post" name="adminForm">
	<table class="adminlist">
	<tr>
		<th bgcolor="#F0F0F0" align="center" width="20px">#</th>
		<th bgcolor="#F0F0F0" width="170px">Label</th>
		<th bgcolor="#F0F0F0">Publishing</th>
		<th bgcolor="#F0F0F0" width="50px">Published</td>
	</tr>
	<tr>
		<td align="center">1</td>
		<td>Save To Language:</td>
		<td><?php echo $this->language; ?></td>
		<td><input type="checkbox" value="1" name="published" id="published" /></td>
	</tr>		
	<tr>
		<th bgcolor="#F0F0F0" align="center">#</th>
		<th bgcolor="#F0F0F0" colspan="2">Original Title</th>
		<th bgcolor="#F0F0F0">Process</th>
	</tr>
	<?php 
	$stt=0;
	for($i=0; $i<count($this->rows); $i++)
	{
		$row	=	&$this->rows[$i];
		$stt=$stt+1;
	?>
	<tr>
		<td align="center"><?php echo $stt; ?></td>
		<td colspan="2"><?php echo $row->title; ?></td>
		<td>
			<div id="log_res<?php echo $i; ?>"></div>
			<div><input type="hidden" id="cb<?php echo $i; ?>" value="<?php echo $row->id; ?>"></div>
		</td>
	</tr>
	<?php
	}
	?>
	</table>
	<input type="hidden" id="yos_num" value="<?php echo count($this->rows); ?>">
	<input type="hidden" name="task" value="">
	<input type="hidden" name="default_l" value="<?php echo $this->default_language; ?>" />
</form>