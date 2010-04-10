<?php defined('_JEXEC') or die('Restricted access'); ?>
<table width="100%" class="yos_info">
	<tr>
		<th>amMaps Total</th>
		<th><?php echo $this->ammapinfo['publish']+$this->ammapinfo['unpublish']; ?></th>		
	</tr>	
	<tr>
		<td>amMaps Published</td>
		<td><?php echo '<font color=blue>'.$this->ammapinfo['publish'].'</font>'; ?></td>		
	</tr>
	<tr>
		<td>amMaps Unpublished</td>
		<td><?php echo '<font color=red>'.$this->ammapinfo['unpublish'].'</font>'; ?></td>		
	</tr>
	<tr>
		<th>Icon files Total</th>
		<th><?php echo $this->iconinfo; ?></th>		
	</tr>
	<tr>
		<th>Map files Total</th>
		<th><?php echo $this->mapinfo; ?></th>		
	</tr>
	<tr>
		<th>Add-on files Total</th>
		<th><?php echo $this->addoninfo; ?></th>		
	</tr>
</table>