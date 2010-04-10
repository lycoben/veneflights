<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php

// Initialize variables
$db		=& JFactory::getDBO();
$user	=& JFactory::getUser();


JHTML::_('behavior.tooltip');
?>
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">

<table class="adminlist">
	<thead>
		<tr>
						
			<th class="title">
				Elements
			</th>
			<th>
				Properties
			</th>
			<th>
				Modifier
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="9">
				Configuration elements properties
			</td>
		</tr>
	</tfoot>
	<tbody>
	
		<tr>
			<td align="center">
				Areas
			</td>
			<td align="center">
				<?php echo $this->areas; ?> property
			</td>
			<td align="center">
				<a href="index.php?option=com_yos_ammap&task=elconfig.edit_element&type=areas">Modifier</a>
			</td>
		</tr>
		<tr>
			<td align="center">
				Movies
			</td>
			<td align="center">
				<?php echo $this->movies; ?> property
			</td>
			<td align="center">
				<a href="index.php?option=com_yos_ammap&task=elconfig.edit_element&type=movies">Modifier</a>
			</td>
		</tr>
		<tr>
			<td align="center">
				Lines
			</td>
			<td align="center">
				<?php echo $this->lines; ?> property
			</td>
			<td align="center">
				<a href="index.php?option=com_yos_ammap&task=elconfig.edit_element&type=lines">Modifier</a>
			</td>
		</tr>
		<tr>
			<td align="center">
				Labels
			</td>
			<td align="center">
				<?php echo $this->labels; ?> property
			</td>
			<td align="center">
				<a href="index.php?option=com_yos_ammap&task=elconfig.edit_element&type=labels">Modifier</a>
			</td>
		</tr>
		
	</tbody>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
<input type="hidden" name="task" value="elconfig" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>
