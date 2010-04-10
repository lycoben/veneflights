<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

global   $option;
$user =& JFactory::getUser();
$db =& JFactory::getDBO();

if( isset( $this->message) &&  $this->message != null ) {?>
<div class="message"><?php echo $this->message;?></div>
<?php
}
$url = JRoute::_("index.php?option=".$option);
?>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:10000;"></div>
	<div id="joomfish">
	    <form action="<?php echo $url;?>" method="post" name="adminForm">
	<br/>
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
    <tr>
      <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->translators); ?>);" /></th>
      <th class="title" width="20%" align="left"  nowrap="nowrap"><?php echo JText::_('Name');?></th>
      <th width="20%" align="left" nowrap="nowrap"><?php echo JText::_('Username');?></th>
      <th width="10%" align="left" nowrap="nowrap"><?php echo JText::_('Language');?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_('Enabled');?></th>
    </tr>
    <?php
    $k=0;
    $i=0;
    foreach ($this->translators as $row ) {
				?>
    <tr class="<?php echo "row$k"; ?>">
	<td width="20">
		<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->id;?>" onclick="isChecked(this.checked);" />
	</td>
	<td>
		<a href="#edit" onclick="hideMainMenu(); return listItemTask('cb<?php echo $i;?>','translator.edit');"><?php echo $row->jname; ?></a>
	</td>
	<td>
		<?php echo $row->username; ?>
	</td>
	<td align="center"><?php echo $row->langname; ?></td>
		<?php
		if ($row->published) {
			$img = 'status_g.png';
		} else {
			$img = 'status_r.png';
		}
		
		$href='';
		if( $row->published>=0 ) {
			$href = '<a href="javascript: void(0);" ';
			$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->published ? 'translator.unpublish' : 'translator.publish'). '\')">';
			$href .= '<img src="components/com_joomfish/assets/images/' .$img. '" width="12" height="12" border="0" alt="" />';
			$href .= '</a>';
		}
		else {
			$href = '<img src="images/' .$img. '" width="12" height="12" border="0" alt="" />';
		}
		?>
     <td align="center"><?php echo $href;?></td>
		<?php
			$k = 1 - $k;
			$i++;
		?>
	</tr>
		<?php  } ?>
	</table>
    <?php echo JHTML::_( 'form.token' ); 
?>
<input type="hidden" name="hidemainmenu" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value='translator.overview' />
</form>
<script  type="text/javascript" src="<?php echo JURI::root();?>includes/js/overlib_mini.js"></script>
<script language="javascript" type="text/javascript">
function submitbutton(pressbutton) {
	var form = document.getElementsByName ('adminForm');
	<?php
	if( isset($editorFields) && is_array($editorFields) ) {
		foreach ($editorFields as $editor) {
			// Where editor[0] = your areaname and editor[1] = the field name
			echo $wysiwygeditor->save( $editor[1]);
		}
	}
	?>
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	} else {
		submitform( pressbutton );
	}
}
</script>
