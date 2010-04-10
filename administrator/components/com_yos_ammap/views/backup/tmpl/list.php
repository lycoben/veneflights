<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$user	=& JFactory::getUser();
$config	=& JFactory::getConfig();
JHTML::_('behavior.tooltip');
?>
<!-- File Manager Form -->
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm" id="adminForm">
<table class="adminlist">
	<thead>
		<tr>
			<th width="10">
				<?php echo JText::_( 'Num' ); ?>
			</th>
			<th width="10" class="title">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
			</th>
			<th width="70">
				<?php echo JText::_( 'Type'); ?>
			</th>
			<th class="title">
				<?php echo JText::_('Files'); ?>
			</th>			
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="4">
				<?php echo $this->pageNav->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php
	$k = 0;	
	
	for ($i=0, $n=count($this->rows); $i < $n; $i++) {
		$file = $this->rows[$i];
		
		$link 		= JRoute::_( 'index.php?option='.$option.'&task=view&cid[]='. $file );				

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pageNav->getRowOffset( $i ); ?>
			</td>
			<td>
				<input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $file; ?>" onclick="isChecked(this.checked);" />
			</td>
			<td align="center">
				<a href="<?php echo JRoute::_("components/com_yos_ammap/backup/$file"); ?>"><img width="32" src="components/com_yos_ammap/images/mime-icon-32/zip.png" title="Zip file" style="text-align: center;" /></a>
			</td>
			<td>					
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Download file' );?>::<?php echo $file; ?>">
				
				<a href="<?php echo JRoute::_("components/com_yos_ammap/backup/$file"); ?>"><?php echo $file; ?></a> </span>						
			</td>						
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="backup" />
<input type="hidden" name="returntask" value="backup"/>
<input type="hidden" name="boxchecked" value="0" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
