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
	JToolBarHelper::publish('list.publishM');
	JToolBarHelper::unpublish('list.unpublishM');
	JToolBarHelper::customX('translatemenus.edit','translate','','Translate');
	JToolBarHelper::deleteList("Are you sure?",'list.remove');
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
				
			</td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<td colspan="9" align="center"><?php echo $this->msg; ?></td>
		</tr>
	</tbody>
	</table>
	<br />
</div>
	<input type="hidden" name="option" value="<?php echo $this->option; ?>" />	
	<input type="hidden" name="view" value="menus" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />	
	<?php echo JHTML::_( 'form.token' ); ?>
</form>