<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
JRequest::setVar( 'hidemainmenu', 1 );
JHTML::_('behavior.tooltip');
jimport('joomla.html.pane');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

$pane =& JPane::getInstance('sliders');

JFilterOutput::objectHTMLSafe( $this->row);

$createdate	 	=& JFactory::getDate();
$nowdate		= JHTML::_('date', $createdate->toUnix(), '%Y-%m-%d %H:%M:%S');

?>
<script language="javascript" type="text/javascript">

function submitbutton(pressbutton, section) {
	var form = document.adminForm;
	if (pressbutton == 'list.cancel') {
		submitform( pressbutton );
		return;
	}

	if ( form.title.value == "" ) {
		alert("<?php echo JText::_( 'amMaps must have a title', true ); ?>");
	} else if ( (editAreaLoader.getValue('ammap_data')=="")||(editAreaLoader.getValue('ammap_settings')=="")){
		alert("<?php echo JText::_( 'amMaps must have data and settings files', true ); ?>");
	} else {
		form.ammap_data.value=editAreaLoader.getValue('ammap_data');
		form.ammap_settings.value=editAreaLoader.getValue('ammap_settings');
		var uid = 'addon';
		var nao = '';
		var tao = '';
		var arr_files = editAreaLoader.getAllFiles(uid);
		
		for (item in arr_files){			
			nao+='text'+editAreaLoader.getFile(uid, item).id+',';
			tao+=editAreaLoader.getFile(uid, item).title+',';
			var newtext = new Element('textarea', { 
				id: 'text'+editAreaLoader.getFile(uid, item).id,
				name: 'text'+editAreaLoader.getFile(uid, item).id
			});
			newtext.setText(editAreaLoader.getFile(uid, item).text);
			newtext.inject($('clr'));			
		}
		$('naddons').setProperty('value',nao.substring(0,nao.lastIndexOf(',')));
		$('taddons').setProperty('value',tao.substring(0,tao.lastIndexOf(',')));
		
		submitform(pressbutton);
	}
}
</script>
<form action="index.php?option=com_yos_ammap" method="post" name="adminForm" id="ammapForm">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>
			<table class="admintable" width="100%">
			<tr>
				<td width="50%">
					<table width="100%">
						<tr>
							<td class="key">
								<label for="title" width="100">
									<?php echo JText::_( 'Title' ); ?>:
								</label>
							</td>
							<td colspan="2">
								<input class="text_area" type="text" name="title" id="title" value="<?php echo $this->row->title; ?>" size="50" maxlength="50" title="<?php echo JText::_( 'A long name to be displayed in headings' ); ?>" />
							</td>
						</tr>
						
						<tr>
							<td width="120" class="key">
								<?php echo JText::_( 'Published' ); ?>:
							</td>
							<td>
								<?php echo $this->lists['published']; ?>
							</td>
						</tr>
							
						<tr>
							<td class="key">
								<label for="ordering">
									<?php echo JText::_( 'Ordering' ); ?>:
								</label>
							</td>
							<td colspan="2">
								<?php echo $this->lists['ordering']; ?>
							</td>
						</tr>
						<tr>
							<td class="key">
								<label for="security">
									<?php echo JText::_( 'Security' ); ?>:
								</label>
							</td>
							<td colspan="2">
								<?php echo $this->lists['security']; ?>
							</td>
						</tr>
						<tr>
							<td class="key">
								<label for="timeout">
									<?php echo JText::_( 'Timeout' ); ?>:
								</label>
							</td>
							<td colspan="2">
								<input class="text_area" type="text" name="timeout" id="timeout" value="<?php echo $this->row->timeout; ?>" size="50" maxlength="50" title="<?php echo JText::_( 'Time-life of key' ); ?>" />
							</td>
						</tr>
						<tr>
							<td class="key">
								<label for="pid">
									<?php echo JText::_( 'Plugin-ID' ); ?>:
								</label>
							</td>
							<td colspan="2">
								<?php echo $this->lists['plugin_id']; ?>
							</td>
						</tr>						
					</table>
				</td>
				<td>
					<table width="100%" style="border: 1px dashed silver; padding: 5px; margin-bottom: 10px;">
						<?php
						if ( $this->row->id ) {
						?>
						<tr>
							<td>
								<strong><?php echo JText::_( 'amMap ID' ); ?>:</strong>
							</td>
							<td>
								<?php echo $this->row->id; ?>
							</td>
						</tr>						
						<tr>
							<td>
								<strong><?php echo JText::_( 'Folder' ); ?>:</strong>
							</td>
							<td>
								<?php echo $this->row->folder; ?>
							</td>
						</tr>
						<tr>
							<td>
								<strong><?php echo JText::_( 'Folder Addons' ); ?>:</strong>
							</td>
							<td>
								<?php echo $this->row->folderaddon; ?>
							</td>
						</tr>
						<?php
						}
						?>
						<tr>
							<td>
								<strong><?php echo JText::_( 'Create Date' ); ?>:</strong>
							</td>
							<td>
								<?php echo (!$this->row->created)? $nowdate: $this->row->created; ?>
								
							</td>
						</tr>						
					</table>					
				</td>
			</tr>			
		</table>
	</fieldset>
	
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Design' ); ?></legend>
		<table class="admintable" width="100%">
		<tr>
			<td width="80%" valign="top">
			<?php
			echo $pane->startPane("amMaps-pane");
			echo $pane->startPanel( JText::_( 'Data' ), "data-page" );
			echo $this->loadTemplate('editdata');
			echo $pane->endPanel();
			echo $pane->startPanel( JText::_('Settings'), "setting-page");
			echo $this->loadTemplate('editsetting');
			echo $pane->endPanel();
			echo $pane->startPanel( JText::_('Add on'), "sub-page");
			echo $this->loadTemplate('editaddon');
			echo $pane->endPanel();
			echo $pane->endPane();
			?>
			</td>
			<td valign="top">
			<?php echo $this->loadTemplate('editicons'); ?>
			</td>
		</tr>
		
		</table>
	</fieldset>
	<div id="clr" style="display:none;">	
	</div>
	<input type="hidden" name="naddons" id="naddons" value=""/>
	<input type="hidden" name="taddons" id="taddons" value=""/>
	<input type="hidden" name="option" value="<?php echo $option; ?>" />
	<input type="hidden" name="oldtitle" value="<?php echo $this->row->title ; ?>" />
	<input type="hidden" name="id" value="<?php echo $this->row->id; ?>" />
	<input type="hidden" name="folder" value="<?php echo $this->row->folder; ?>" />
	<input type="hidden" name="folderaddon" value="<?php echo $this->row->folderaddon; ?>" />
	<input type="hidden" name="task" value="list.save" />	
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
<script type="text/javascript">
window.addEvent('domready', function() {
	$$('#amMaps-pane .jpane-slider').each(function(el){
		el.setStyle('overflow-y', 'visible');
	});
});
</script>