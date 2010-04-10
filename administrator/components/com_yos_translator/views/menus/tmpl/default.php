<?php 
/**
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

defined('_JEXEC') or die('Restricted access'); 
?>

<?php JHTML::_('behavior.tooltip'); ?>


<?php
//	$obj_filter = $this->filter;
	
	$document = & JFactory::getDocument();
	JHTML::stylesheet( 'yos_translator.css', 'administrator/components/com_yos_translator/assets/' );
	//toolbar
	JToolBarHelper::title(  JText::_( 'Yos Translator' ) ,'translate' );
	JToolBarHelper::publish('list.MNpublish');
	JToolBarHelper::unpublish('list.MNunpublish');
	JToolBarHelper::customX('translatemenus.edit','translate','','Translate');
	
	JToolBarHelper::deleteList("Are you sure?",'list.removeM');
	JToolBarHelper::preferences('com_yos_translator','300','570', 'Configuration','');
?>
<form action="index.php?option=<?php echo $this->option; ?>" method="post" name="adminForm">
<table width="100%" style="border: 1px dashed silver;">
	<tr>
		<td style="border-right: 1px dashed silver;">
			<?php echo JText::_( 'Keyword Filter: ' ); ?>:
		</td>		
		<td align="center" style="border-right: 1px dashed silver;">
			<?php echo JText::_( 'State Filter: ' ); ?>:
		</td>
		<td align="center" style="border-right: 1px dashed silver;">
			<?php echo JText::_( 'Status Filter: ' ); ?>:
		</td>
		<td align="center">
			<?php echo JText::_( 'Select language: ' ); ?>:
			
		</td>
		
		
	</tr>
	<tr>
		<td style="border-right: 1px dashed silver;">			
			<input type="text" name="search" id="search" value="<?php echo $this->lists['search']; ?>" class="text_area" onchange="document.adminForm.submit();" />
			<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
			<button onclick="document.getElementById('search').value='';document.getElementById('filter_sectionid').value=-1;document.getElementById('catid').value=0;document.getElementById('filter_state').value='';document.getElementById('filter_language').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
		</td>
		
		<td align="center" style="border-right: 1px dashed silver;">
			<?php echo $this->lists['state']; ?>
		</td>
		<td align="center" style="border-right: 1px dashed silver;">
			<?php echo $this->lists['filter_status']; ?>
		</td>
		<td align="center">
			<?php echo $this->lists['filter_language']; ?>
		</td>
	</tr>
</table>

<div id="tablecell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'NUM' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->rows ); ?>);" />
			</th>
			<th  class="title">
				<?php echo JText::_('Original Title'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_('Languages'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_('Translation'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_('Last Modified'); ?>
			</th>
			<th class="title">
				<?php echo JText::_('Status'); ?>
			</th>
			<th  class="title">
				<?php echo JText::_('Published'); ?>
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
	for ($i=0, $n=count( $this->rows ); $i < $n; $i++)
	{
		$row = &$this->rows[$i];
		$published 	= JHTML::_('grid.published', $row, $i, 'publish_g.png','publish_x.png','list.MN' );
	?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $this->pageNav->getRowOffset( $i ); ?>
			</td>
			<td>
				<input id="cb<?php echo $i; ?>" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $row->id; ?>|<?php echo $row->language_id ? $row->language_id : 'NULL'; ?>" name="cid[]"/>
			</td>
			<td align="left">			
				<?php echo $row->jmname;?>			
			</td>
			<td align="center">
				<?php echo $row->jlname; ?>
			</td>
			<td align="left">
				<?php echo $row->translation; ?>
			</td>
			<td align="center">
				<?php echo $row->modified; ?>
			</td>
			<td align="center">
				<?php
				switch ($row->status){
					case NULL:
						echo '<img src="'.JURI::root().'administrator/components/com_yos_translator/assets/images/status_r.png" />';
						break;
					case 0:
						echo '<img src="'.JURI::root().'administrator/components/com_yos_translator/assets/images/status_y.png" />';
						break;
					case 1:
						echo '<img src="'.JURI::root().'administrator/components/com_yos_translator/assets/images/status_g.png" />';
						break;
					default:
						echo '<img src="'.JURI::root().'administrator/components/com_yos_translator/assets/images/status_r.png" />';
				}
				?>
			</td>
			<td align="center">
				<?php echo $published; ?>
			</td>
		</tr>
		<?php
			$k = 1 - $k;
		}
		?>
	</tbody>
	</table>
	<br />
<table cellspacing="0" cellpadding="4" border="0" align="center">
  <tr align="center">
    <td> <img src="<?php echo JURI::root(); ?>administrator/components/com_yos_translator/assets/images/status_g.png" width="12" height="12" border=0 alt="<?php echo JText::_('STATE_OK');?>" />
    </td>
    <td> <?php echo JText::_('Translation is <u>up to date</u>');?> |</td>
    <td> <img src="<?php echo JURI::root(); ?>administrator/components/com_yos_translator/assets/images/status_y.png" width="12" height="12" border=0 alt="<?php echo JText::_('STATE_CHANGED');?>" />
    </td>
    <td> <?php echo JText::_('Translation <u>incomplete</u> or original <u>changed</u>');?> |</td>
    <td> <img src="<?php echo JURI::root(); ?>administrator/components/com_yos_translator/assets/images/status_r.png" width="12" height="12" border=0 alt="<?php echo JText::_('STATE_NOTEXISTING');?>" />
    </td>
    <td> <?php echo JText::_('Translation does <u>not</u> exist');?></td>
  </tr>
  <tr align="center">
    <td> <img src="images/publish_g.png" width="12" height="12" border=0 alt="<?php echo JText::_('Translation visible');?>" />
    </td>
    <td> <?php echo JText::_('Translation is <u>published</u>');?>  |</td>
    <td> <img src="images/publish_x.png" width="12" height="12" border=0 alt="<?php echo JText::_('Finished');?>" />
    </td>
    <td> <?php echo JText::_('Translation <u>Not</u> Published');?></td>
    <td> &nbsp;
    </td>
    <td> <?php echo JText::_('(Click on icon to toggle state.)');?></td>
  </tr>
  <tr>
  	<td align="center" colspan="6">
  		2008 Copyright by <a href="mailto:minhna@yopensource.com">minhna</a> - <a href="mailto:cuongpm@yopensource.com">cuongpm</a> - <a href="mailto:sonlv@yopensource.com">sonlv</a> - <b>YOS Team</b>, all rights reserved.
  	</td>
  </tr>
</table>
<input type="hidden" name="option" value="<?php echo $this->option; ?>" />	
	<input type="hidden" name="view" value="menus" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />	
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
