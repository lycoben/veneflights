<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
JRequest::setVar( 'hidemainmenu', 1 );
JHTML::_('behavior.tooltip');


?>
<script language="javascript" type="text/javascript">
var elcount	=	<?php echo count($this->rows); ?>

function submitbutton(pressbutton, section) {
	var form = document.adminForm;
	if (pressbutton == 'list.cancel') {
		submitform( pressbutton );
		return;
	}

	submitform(pressbutton);

}


window.addEvent('domready', function(){
	$('newproperty').addEvent('click', function(e){
		var newTr = new Element('tr', {id: 'eltr'+elcount, style: "border-bottom: 1px dashed silver;"});	
		var newTd = new Element('td', {style: 'border-right: 1px dashed silver;'});
		newTd.setHTML('<input type="text" class="textarea" value="" name="name['+elcount+']" style="width: 100%;" />');
		newTd.inject(newTr);
		var newTd = new Element('td', {style: 'border-right: 1px dashed silver;'});
		newTd.setHTML('<input type="text" class="textarea" value="" name="type['+elcount+']" style="width: 100%;" />');
		newTd.inject(newTr);
		var newTd = new Element('td', {style: 'border-right: 1px dashed silver;'});
		newTd.setHTML('<input type="text" class="textarea" value="" name="default['+elcount+']" style="width: 100%;" />');
		newTd.inject(newTr);
		var newTd = new Element('td', {style: 'border-right: 1px dashed silver;'});
		newTd.setHTML('<select name="type_el['+elcount+']"><option value="0">Attribute</option><option value="1">Content</option></select>');
		newTd.inject(newTr);
		var newTd = new Element('td', {style: 'border-right: 1px dashed silver;'});
		newTd.setHTML('<input type="text" class="textarea" value="" name="desc['+elcount+']" style="width: 100%;" />');
		newTd.inject(newTr);
		var newTd = new Element('td', {align: 'center'});
		newTd.setHTML('<input type="button" value="Delete" onclick="$(\'eltr'+elcount+'\').remove();" id="'+elcount+'" />');
		newTd.inject(newTr);		
		newTr.inject($('eltable'));
		elcount	=	elcount	+1;
	});
});
</script>
<form action="index.php?option=<?php echo $option; ?>" method="post" name="adminForm">
	<table width="100%" style="border: 1px dashed silver;" cellpadding="5px;">
	<thead>
		<tr style="border-bottom: 1px dashed silver;">
			<th style="border-right: 1px dashed silver;" width="100">Name</th>
			<th style="border-right: 1px dashed silver;" width="150">Value Type</th>
			<th style="border-right: 1px dashed silver;" width="150">Default</th>
			<th style="border-right: 1px dashed silver;" width="80">Type</th>
			<th style="border-right: 1px dashed silver;">Description</th>
			<th width="60">Delete</th>
		</tr>
	</thead>
	<tbody id="eltable">
	<?php
	
	for ($i =0; $i<count($this->rows); $i++) {
		$row	=	$this->rows[$i];
		
		?>
		<tr id="eltr<?php echo $i; ?>" style="border-bottom: 1px dashed silver;">
			<td style="border-right: 1px dashed silver;">
				<input type="text" class="textarea" value="<?php echo htmlspecialchars($row->name); ?>" name="name[<?php echo $i; ?>]" style="width: 100%;" />
			</td>
			<td style="border-right: 1px dashed silver;">
				<input type="text" class="textarea" value="<?php echo htmlspecialchars($row->type); ?>" name="type[<?php echo $i; ?>]" style="width: 100%;" />
			</td>
			<td style="border-right: 1px dashed silver;">
				<input type="text" class="textarea" value="<?php echo htmlspecialchars($row->default); ?>" name="default[<?php echo $i; ?>]" style="width: 100%;" />
			</td>
			<td style="border-right: 1px dashed silver;">
				<?php echo $this->lists[$i]; ?>
			</td>
			<td style="border-right: 1px dashed silver;">
				<input type="text" class="textarea" value="<?php echo htmlspecialchars($row->description); ?>" name="desc[<?php echo $i; ?>]" style="width: 100%;" />
			</td>
			<td align="center">
				<input type="button" value="Delete" onclick="$('eltr<?php echo  $i; ?>').remove();" id="<?php echo $i; ?>" style="width: 100%;" />
			</td>
		</tr>				
		<?php
	}
	
	?>
	</tbody>
	</table>
	
	<input type="button" id="newproperty" value="Add New" />
	<div id="clr" style="display:none;">
	</div>
	
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="eltype" value="<?php echo $this->eltype; ?>" />
	<input type="hidden" name="task" value="elconfig.save" />	
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
