<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$db		=& JFactory::getDBO();
$user	=& JFactory::getUser();
$config	=& JFactory::getConfig();
$now	=& JFactory::getDate();

//Ordering allowed ?
$ordering = ($this->lists['order'] == 'e.element_id');

JHTML::_('behavior.tooltip');
?>
<script type="text/javascript">
	function change_element(){
		switch (document.adminForm.filter_element.value){
			case 'areas':
				document.adminForm.field_change.value 	= 	'mc_name';
				break;
			case 'movies':
				document.adminForm.field_change.value	=	'file';
				break;
			case 'labels':
				document.adminForm.field_change.value	=	'text';
				break;
			case 'lines':
				document.adminForm.field_change.value	=	'width';
				break;
		}
		submitform();
	}
</script>
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">
<table>
<tr>	
	<td nowrap="nowrap">
		<?php
		echo '<strong>Map: </strong>'.$this->lists['filter_map'].'&nbsp;&nbsp;&nbsp;';
		echo '<strong>Type: </strong>'.$this->lists['filter_element'].'&nbsp;&nbsp;&nbsp;';
		echo '<strong>Field: </strong>'.$this->lists['filter_field'].'&nbsp;&nbsp;&nbsp;';
		echo '<strong>Published: </strong>'.$this->lists['state'];
		?>
	</td>
</tr>
</table>
<table class="adminlist">
	<thead>
		<tr>
			<th width="10">
				<?php echo JText::_( 'Num' ); ?>
			</th>
			<th width="10" class="title">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" />
			</th>
			<th>
				<?php echo JHTML::_('grid.sort', 'Values', 'e.value', @$this->lists['order_Dir'], @$this->lists['order']); ?>
			</th>
			<th width="5%" class="title" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Published', 'e.published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th class="title">
				<?php echo JHTML::_('grid.sort',   'Type', 'e.element_type', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th class="title">
				<?php echo JHTML::_('grid.sort',   'Map', 'm.title', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>			
				
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'e.element_id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="9">
				<?php echo $this->pageNav->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php
	$k = 0;
	$nullDate = $db->getNullDate();
	
	for ($i=0, $n=count($this->rows); $i < $n; $i++) {
		$row = $this->rows[$i];
		
		$maplink 		= JRoute::_( 'index.php?option='.$option.'&task=edit&cid[]='. $row->map_id );
		$link 		= JRoute::_( 'index.php?option='.$option.'&task=elements.editel&filter_element='.$row->element_type.'&filter_map='.$row->map_id.'&cid[]='. $row->element_id );
		
		$el_link	=	JRoute::_('index.php?option='.$option.'&task=elconfig.edit_element&type='.$row->element_type);
				
		$published 	= JHTML::_('grid.published', $row, $i, 'tick.png','publish_x.png','elements.' );

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pageNav->getRowOffset( $i ); ?>
			</td>
			<td>
				<input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->element_id; ?>" onclick="isChecked(this.checked);" />
			</td>
			<td>					
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit element' );?>::<?php echo htmlspecialchars($row->value); ?>">
				<a href="<?php echo $link; ?>">
					<?php echo htmlspecialchars($row->value); ?></a> </span>						
			</td>
			<td align="center">
				<?php echo $published;?>
			</td>
			<td align="center">
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit Properties' );?>::<?php echo $row->element_type; ?>">
				<a href="<?php echo $el_link; ?>">
					<?php echo $row->element_type; ?></a> </span>	
			</td>
			<td>					
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit amMap' );?>::<?php echo $row->title; ?>">
				<a href="<?php echo $maplink; ?>">
					<?php echo $row->title; ?></a> </span>						
			</td>	
			
			<td align="center">
				<?php echo $row->element_id; ?>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="elements.element" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="field_change" value="" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
