<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$db		=& JFactory::getDBO();
$user	=& JFactory::getUser();
$config	=& JFactory::getConfig();
$now	=& JFactory::getDate();

//Ordering allowed ?
$ordering = ($this->lists['order'] == 'c.ordering');

JHTML::_('behavior.tooltip');
?>
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">
<table>
<tr>
	<td align="left" width="100%">
		<?php echo JText::_( 'Filter' ); ?>:
		<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
		<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
		<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
	</td>
	<td nowrap="nowrap">
		<?php				
		echo $this->lists['state'];
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
			<th class="title">
				<?php echo JHTML::_('grid.sort',   'Title', 'c.title', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th width="5%" class="title" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'Published', 'c.published', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
			<th nowrap="nowrap" width="8%">
				<?php echo JHTML::_('grid.sort',   'Order by', 'c.ordering', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
				<?php echo JHTML::_('grid.order',  $this->rows, 'filesave.png', 'list.saveOrder' ); ?>
			</th>					
			<th>
				<?php echo JHTML::_('grid.sort', 'Author', 'username', @$this->lists['order_Dir'], @$this->lists['order']); ?>
			</th>
			<th>
				<?php echo JHTML::_('grid.sort', 'Create Date', 'c.created', @$this->lists['order_Dir'], @$this->lists['order']);?>
			</th>
			<th>
				<?php echo JText::_('Elements'); ?>
			</th>
			<th width="75">
				<?php echo JText::_('Back-up'); ?>
			</th>
			
				
			<th width="1%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',   'ID', 'c.id', @$this->lists['order_Dir'], @$this->lists['order'] ); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="10">
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
		
		$link 		= JRoute::_( 'index.php?option='.$option.'&task=edit&cid[]='. $row->Id );				
				
		$published 	= JHTML::_('grid.published', $row, $i, 'tick.png','publish_x.png','list.' );			

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pageNav->getRowOffset( $i ); ?>
			</td>
			<td>
				<input type="checkbox" id="cb<?php echo $i; ?>" name="cid[]" value="<?php echo $row->Id; ?>" onclick="isChecked(this.checked);" />
			</td>
			<td>					
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'Edit amMap' );?>::<?php echo $row->title; ?>">
				<a href="<?php echo $link; ?>">
					<?php echo $row->title; ?></a> </span>						
			</td>
			<td align="center">
				<?php echo $published;?>
			</td>
			<td class="order">
				<span><?php echo $this->pageNav->orderUpIcon( $i, true, 'list.orderup', 'Move Up', $ordering ); ?></span>
				<span><?php echo $this->pageNav->orderDownIcon( $i, $n, true,  'list.orderdown', 'Move Down', $ordering ); ?></span>
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
			</td>
				
			<td align="center">
				<a href="<?php echo  JRoute::_( 'index.php?option=com_users&task=edit&cid[]='.$row->userid ) ;?>" title="<?php echo  JText::_( 'Edit User' ) ;?>"><?php echo $row->username; ?></a>						
			</td>
			<td align="center">
				<?php echo JText::_($row->created); ?>
			</td>
			<td align="center">
				<a href="<?php echo JRoute::_('index.php?option=com_yos_ammap&task=elements.element&filter_map='.$row->Id); ?>" title="<?php echo JText::_('Go to elements of '.$row->title); ?>"><img src="components/com_yos_ammap/images/icon-32-elements.png" /></a>
			</td>
			<td align="center">
				<a href="<?php echo JRoute::_('index.php?option=com_yos_ammap&task=file.download&cid[]='.$row->Id); ?>" title="<?php echo JText::_('Back-up '.$row->title.' map'); ?>"><img src="components/com_yos_ammap/images/mime-icon-32/download_f2.png"/></a>
			</td>
			<td align="center">
				<?php echo $row->Id; ?>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="ammaps" />
<input type="hidden" name="dotask" value="list" />
<input type="hidden" name="returndotask" value="list" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
