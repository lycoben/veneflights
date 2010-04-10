<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
JRequest::setVar( 'hidemainmenu', 1 );
JHTML::_('behavior.tooltip');

$data	=	$this->row;
?>
<script language="javascript" type="text/javascript">

function submitbutton(pressbutton, section) {
	var form = document.adminForm;
	if (pressbutton == 'elements.cancel') {
		submitform( pressbutton );
		return;
	}

	submitform(pressbutton);

}

</script>
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">
	<table width="100%" class="adminlist">
	<thead>
	<tr>		
		<th colspan="3">
			Map ID: <?php echo $this->map_id; ?> | Element: <?php echo $this->eltype; ?> | Element ID: <?php echo $data->id; ?> 
		</th>
	</tr>
	</thead>
	
	<tfoot>
		<tr>
			<td colspan="3">
				<strong>Copyright by YOS Team - 2009</strong>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<tr class="row1">
		<td>
		<strong>Published: </strong>
		</td>
		<td colspan="2">
			<?php echo $this->lists['published']; ?>
		</td>
	</tr>	
	<?php
	for ($i =0; $i<count($this->properties); $i++){
		$property	=	$this->properties[$i];
		$type_el	=	intval($property->type_el)?'Content':'Attribute';
		?>
		<tr class="row<?php echo $i%2; ?>">			
			<td width="130">
			<span class="editlinktip hasTip" title="<?php echo htmlspecialchars($property->name).' ('.$type_el.')';?>::<?php echo htmlspecialchars($property->description); ?>"><strong><?php echo htmlspecialchars($property->name); ?>:</strong></span>
			</td>
			<td width="580">
			<?php
				$refer	=	$property->name;
				if ($property->type_el) {
			?>
					<textarea name="<?php echo htmlspecialchars($refer); ?>" style="width: 100%;" rows="5"><?php echo htmlspecialchars($data->$refer); ?></textarea>
			<?php
				} else {
			?>
			<input type="text" name="<?php echo htmlspecialchars($refer); ?>" value="<?php echo htmlspecialchars($data->$refer); ?>" style="width: 100%;" />
			<?php } ?>
			</td>
			<td>
			<strong>default:</strong> <?php echo htmlspecialchars($property->default); ?>
			</td>
		</tr>
		<?php
	}
	?>
	</tbody>
	</table>
	<div id="clr" style="display:none;">
	</div>
	
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="eltype" value="<?php echo $this->eltype; ?>" />
	<input type="hidden" name="map_id" value="<?php echo $this->map_id; ?>" />
	<input type="hidden" name="id" value="<?php echo $data->id; ?>" />
	<input type="hidden" name="task" value="elements.save" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
