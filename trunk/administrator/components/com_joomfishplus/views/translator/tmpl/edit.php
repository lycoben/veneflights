<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

global $option, $task;
$index=JRoute::_("index.php");
?>
<form action="<?php echo $index;?>" method="post" name="adminForm">
    <input type="hidden" name="cid" value="<?php echo $this->translator->id;?>" />
	<table border="0" cellpadding="2" cellspacing="2" class="adminform" >
		<tr>
			<td><?php echo JText::_("User");?></td>
			<td><?php echo $this->users;?></td>
		</tr>
		<tr>
			<td><?php echo JText::_("Language");?></td>
			<td><?php echo $this->languages;?></td>
		</tr>
		<tr>
			<td><?php echo JText::_("Translator Enabled?");?></td>
			<td><?php 
			if ($this->translator->published){
				$img = 'publish_g.png';
				$alt = JText::_( 'Published' );
				$checked = " checked='checked' ";
			} 
			else {
				$img = 'publish_r.png';
				$alt = JText::_( 'Unpublished' );
				$checked="";
			}
			//echo $this->translator->published;
			?>
			<input type="checkbox" name="published" value="1" <?php echo $checked;?> />
			</td>
		</tr>
	
    </table>
    <input type="hidden" name="hidemainmenu" value="" />
	<input type="hidden" name="task" value="<?php echo $task; ?>" />
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
	