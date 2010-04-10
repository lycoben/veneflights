<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

global $Itemid;
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
$filterOptions = '<table align="right"><tr>';
$filterOptions .= '<td  nowrap="nowrap" align="center">' .JText::_('Languages'). ':<br/>' .$this->langlist. '</td>';
$filterOptions .= '<td  nowrap="nowrap" align="center">' .JText::_('Content elements'). ':<br/>' .$this->clist. '</td>';
$filterOptions .= '</tr></table>';

if (isset($this->filterlist) && count($this->filterlist)>0){
	$filterOptions .= '<table align="right" style="clear:both"><tr>';
	foreach ($this->filterlist as $fl){
		if (is_array($fl))		$filterOptions .= "<td nowrap='nowrap' align='center'>".$fl["title"].":<br/>".$fl["html"]."</td>";
	}
	$filterOptions .= '</tr></table>';
}
?>
<form action="<?php echo JRoute::_("index.php?option=com_joomfishplus&Itemid=".$Itemid);?>" method="post" name="adminForm">
<?php echo $filterOptions; ?>
<br style="clear:both;" /><br />
  <table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
  <thead>
    <tr>
      <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->rows); ?>);" /></th>
      <th class="title" width="20%" align="left"  nowrap="nowrap"><?php echo JText::_('TITLE');?></th>
      <th width="10%" align="left" nowrap="nowrap"><?php echo JText::_('Language');?></th>
      <th width="20%" align="left" nowrap="nowrap"><?php echo JText::_('TITLE_TRANSLATION');?></th>
      <th width="15%" align="left" nowrap="nowrap"><?php echo JText::_('TITLE_DATECHANGED');?></th>
      <th width="15%" nowrap="nowrap" align="center"><?php echo JText::_('TITLE_STATE');?></th>
      <th align="center" nowrap="nowrap"><?php echo JText::_('TITLE_PUBLISHED');?></th>
    </tr>
    </thead>
    <tfoot>
        <tr>
    	  <td align="center" colspan="7">
			<?php echo $this->pageNav->getListFooter(); ?>
		  </td>
		</tr>
    </tfoot>
    
    <tbody>
	<?php
	if( !isset($this->catid) || $this->catid == "" || $this->language_id==-1) {
		?>
	<tr><td colspan="8"><p><?php echo JText::_('NOELEMENT_SELECTED');?></p></td></tr>
		<?php
	}
	else {
		?>
    <?php
    $k=0;
    $i=0;
    foreach ($this->rows as $row ) {
				?>
    <tr class="<?php echo "row$k"; ?>">
      <td width="20">
        <?php		if ($row->checked_out && $row->checked_out != $user->id) { ?>
        &nbsp;
        <?php		} else { ?>
        <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row->translation_id."|".$row->id."|".$row->language_id; ?>" onclick="isChecked(this.checked);" />
        <?php		} ?>
      </td>
      <td>
      	<a href="#edit" onclick="hideMainMenu(); return listItemTask('cb<?php echo $i;?>','translate.edit');"><?php echo $row->title; ?></a>
			</td>
      <td nowrap><?php echo $row->language ? $row->language : JText::_('NOTRANSLATIONYET') ; ?></td>
      <td><?php echo $row->titleTranslation ? $row->titleTranslation : '&nbsp;'; ?></td>
	  <td><?php echo $row->lastchanged ? JHTML::_('date', $row->lastchanged, JText::_('DATE_FORMAT_LC2')):"" ;?></td>
				<?php
				switch( $row->state ) {
					case 1:
						$img = 'status_g.png';
						break;
					case 0:
						$img = 'status_y.png';
						break;
					case -1:
					default:
						$img = 'status_r.png';
						break;
				}
				?>
      <td align="center"><img src="<?php echo JURI::root();?>administrator/components/com_joomfish/assets/images/<?php echo $img;?>" width="12" height="12" border="0" alt="" /></td>
				<?php
				if (isset($row->published) && $row->published) {
					$img = 'publish_g.png';
				} else {
					$img = 'publish_x.png';
				}

				$href='';
				if( $row->state>=0 ) {
					$href = '<a href="javascript: void(0);" ';
					$href .= 'onclick="return listItemTask(\'cb' .$i. '\',\'' .($row->published ? 'translate.unpublish' : 'translate.publish'). '\')">';
					$href .= '<img src="'.JURI::root().'administrator/images/' .$img. '" width="12" height="12" border="0" alt="" />';
					$href .= '</a>';
				}
				else {
					$href = '<img src="'.JURI::root().'administrator/images/' .$img. '" width="12" height="12" border="0" alt="" />';
				}
				?>
      <td align="center"><?php echo $href;?></td>
				<?php
				$k = 1 - $k;
				$i++;
    }
		?>
	</tr>
	</table>
<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
  <tr align="center">
    <td> <img src="<?php echo JURI::root();?>administrator/components/com_joomfish/assets/images/status_g.png" width="12" height="12" border=0 alt="<?php JText::_('STATE_OK');?>" />
    </td>
    <td> <?php echo JText::_('TRANSLATION_UPTODATE');?> |</td>
    <td> <img src="<?php echo JURI::root();?>administrator/components/com_joomfish/assets/images/status_y.png" width="12" height="12" border=0 alt="<?php JText::_('STATE_CHANGED');?>" />
    </td>
    <td> <?php echo JText::_('TRANSLATION_INCOMPLETE');?> |</td>
    <td> <img src="<?php echo JURI::root();?>administrator/components/com_joomfish/assets/images/status_r.png" width="12" height="12" border=0 alt="<?php JText::_('STATE_NOTEXISTING');?>" />
    </td>
    <td> <?php echo JText::_('TRANSLATION_NOT_EXISTING');?></td>
  </tr>
  <tr align="center">
    <td> <img src="<?php echo JURI::root();?>administrator/images/publish_g.png" width="12" height="12" border=0 alt="Translation visible" />
    </td>
    <td> <?php echo JText::_('TRANSLATION_PUBLISHED');?>  |</td>
    <td> <img src="<?php echo JURI::root();?>administrator/images/publish_x.png" width="12" height="12" border=0 alt="Finished" />
    </td>
    <td> <?php echo JText::_('TRANSLATION_NOT_PUBLISHED');?></td>
    <td> &nbsp;
    </td>
    <td> <?php echo JText::_('STATE_TOGGLE');?></td>
  </tr>
</table>
<?php } 
?>
<input type="hidden" name="task" value="translate.default" />
<input type="hidden" name="boxchecked" value="0" />
</form>
