<?php defined('_JEXEC') or die('Restricted access'); ?>
<fieldset id="settings">
	<legend>Settings</legend>
	<textarea id="ammap_settings" style="height: 550px; width: 100%;" name="ammap_settings">
		<?php  
			if ($this->row->id) {				
				echo JFile::read(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$this->row->folder.'/ammap_settings.xml');
			} else {
				echo JFile::read(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'ammap_settings.xml');
			}
		?>
	</textarea>
</fieldset>