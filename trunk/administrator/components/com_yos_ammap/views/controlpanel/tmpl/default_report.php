<?php defined('_JEXEC') or die('Restricted access');?>
<table width="100%" class="yos_info">
	<tr>
		<th>amMap status</th>
		<th><?php echo $this->ammapstatus ? '<font color=blue>Ready!</font>' : '<font color=red>Not Ready!</font>'; ?></th>		
	</tr>	
	<tr>
		<th>Plug-in Total</th>
		<th><?php echo count($this->plugininfo); ?></th>		
	</tr>
	<?php
	for ($i =0 ; $i<count($this->plugininfo); $i++){
	?>
	<tr>
		<td><?php echo $this->plugininfo[$i]->name; ?></td>
		<td><?php echo $this->plugininfo[$i]->published ? '<font color=blue>Published</font>' : '<font color=red>UnPublished</font>'; ?></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<th>Back-up files Total</th>
		<th><?php echo $this->backupinfo; ?></th>		
	</tr>	
</table>