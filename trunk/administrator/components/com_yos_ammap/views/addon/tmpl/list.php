<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$user	=& JFactory::getUser();
$config	=& JFactory::getConfig();
JHTML::_('behavior.tooltip');

?>
<?php echo $this->loadTemplate('upload'); ?>
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
				<?php echo JText::_( 'View'); ?>
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
		<tr class="<?php echo "row1"; ?>">
			<td>
				&nbsp;
			</td>
			<td>
				&nbsp;
			</td>
			<td align="center">
				<div><a href="index.php?option=com_yos_ammap&task=addon&folder=<?php echo $this->state->parent; ?>"><img width="32" src="components/com_yos_ammap/images/mime-icon-32/folderup_32.png" style="text-align: center;" /></a></div>
			</td>
			<td>			
				... 
			</td>						
		</tr>
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
				<?php
				
				switch (strtolower(JFile::getExt($file))) {
					case 'swf':
						echo '<img width="32" src="components/com_yos_ammap/images/mime-icon-32/swf.png" title="SWF file" style="text-align: center;" />';
						break;
					case 'jpg':
					case 'gif':
					case 'png':
						echo '<div><a style="display: block; width: 100%; height: 100%;" href="../'.preg_replace('/\\\/','/',str_replace(JPATH_SITE.DS,'',$file)).'" title="Image" class="modal-icons"><img width="32" id="dv'.$i.'" src="../'.preg_replace('/\\\/','/',str_replace(JPATH_SITE.DS,'',$file)).'" style="text-align: center;" /></a></div>';
						break;
					case 'xml':
						echo '<div><a rel="{handler: \'iframe\', size: {x: 640, y: 480}}" href="index.php?option=com_yos_ammap&task=file.preview&url='.$file.'" title="XML file" class="modal"><img width="32" src="components/com_yos_ammap/images/mime-icon-32/xml.png" style="text-align: center;" /></a></div>';
						break;
					default:
						echo '<div><a href="index.php?option=com_yos_ammap&task=addon&folder='.$file.'"><img width="32" src="components/com_yos_ammap/images/mime-icon-32/folder.png" style="text-align: center;" /></a></div>';
						break;
				}
				?>
			</td>
			<td>
				<span class="editlinktip hasTip" title="<?php echo JText::_( 'View Addon' );?>::<?php echo $file; ?>">
				
				<?php 
				echo str_replace(dirname($file),'',$file); ?> </span>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="addon" />
<input type="hidden" name="folder" value="<?php echo $this->state->folder; ?>"/>
<input type="hidden" name="returntask" value="addon"/>
<input type="hidden" name="boxchecked" value="0" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
