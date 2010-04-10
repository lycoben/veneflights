<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHTML::_('behavior.tooltip'); ?>
<?php
	// Set toolbar items for the page
	JToolBarHelper::title(   JText::_( 'Google translate for joomfish' ), 'generic.png' );	
	JToolBarHelper::addNew('translate', 'Translate content');;	
?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table>
		<tr>
			<th>
				<?php echo JText::_('Translation option:'); ?>
			</th>
			<td>
				<?php echo JText::_('Original language'); ?>
			</td>							
			<td>
				<?php echo $this->lists['lang_from']; ?>
			</td>
			<td>
				<?php echo JText::_('Translate to language'); ?>
			</td>
			<td>
				<?php echo $this->lists['lang_to']; ?>
			</td>
			<td>
				<?php echo JText::_('Overwrite translated items'); ?>
			</td>
			<td>
				<input type="checkbox" name="overwrite" id="overwrite" value="1" class="inputbox" />
			</td>
			<td>
				Where clause : <input type="text" class="inputbox" size="50" name="where_clause" value="<?php echo $this->whereClause; ?>" />
			</td>
		</tr>
	</table>
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
			<th class="title">
				<?php echo  JText::_('Name'); ?>
			</th>
			<th class="title">
				<?php echo JText::_('Author'); ?>
			</th>
			<th class="title">
				<?php echo JText::_('Version'); ?>
			</th>			
			<th class="title">
				<?php echo JText::_('Description'); ?>
			</th>
		</tr>
	</thead>	
	<tbody>
	<?php
	$k = 0;	
	for ($i=0, $n=count( $this->items ); $i < $n; $i++)
	{
		$row = & $this->items[$i];				
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center">
				<?php echo ($i + 1);  ?>
			</td>	
			<td align="center">	
				<?php
					echo  JHTML::_('grid.id', $i, $row->id, false); 
				?>
			</td>		
			<td align="center">
				<?php echo $row->name; ?>
			</td>
			<td align="center">
				<?php echo $row->author; ?>
			</td>
			<td align="center">
				<?php echo $row->version; ?>
			</td>
			<td>
				<? echo $row->description; ?>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
	</table>
</div>
<input type="hidden" name="option" value="com_jgtranslation" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />	
<?php echo JHTML::_( 'form.token' ); ?>
</form>
