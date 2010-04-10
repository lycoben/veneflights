<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$db		=& JFactory::getDBO();
$user	=& JFactory::getUser();
$config	=& JFactory::getConfig();

JHTML::_('behavior.tooltip');
?>

<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">
<table class="adminlist">
	<thead>
		<tr>
			<th width="10">
				<?php echo JText::_( 'Num' ); ?>
			</th>
			<th width="10" class="title">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
			</th>
			<th class="title">
				Languages
			</th>
			<th width="5%" class="title" nowrap="nowrap">
				Active
			</th>
			<th>
				Code
			</th>
			<th>
				Current Translator				
			</th>					
			<th>
				Translate Language
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="7">
				<b>Configuration Yos Translator</b>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php
	$k = 0;
	$nullDate = $db->getNullDate();
	
	for ($i=0, $n=count($this->rows); $i < $n; $i++) {
		$row = $this->rows[$i];
		$published 	= JHTML::_('grid.published', $row, $i, 'tick.png','publish_x.png','config.' );
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $i+1; ?>
			</td>
			<td>
				<input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->id; ?>" onclick="isChecked(this.checked);" />
			</td>
			<td>					
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Language' );?>::<?php echo $row->name; ?>">
				
					<?php echo $row->name; ?> </span>						
			</td>
			<td align="center">
				<?php echo $published;?>
			</td>
			<td align="center">
				<?php echo $row->code; ?>
			</td>
			<td align="center">
				<?php echo $this->c_translator[$i]; ?>
			</td>
			<td align="center">
				<select name="<?php echo $row->shortcode; ?>" id="<?php echo $row->shortcode; ?>" onchange="$('cb<?php echo $i; ?>').setProperty('checked',true);"><option value="">--Select Language--</option></select>
			</td>
				
						
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="config" />
<input type="hidden" name="returndotask" value="config" />
<input type="hidden" name="boxchecked" value="0" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
