<?php defined('_JEXEC') or die('Restricted access'); ?>
<fieldset id="data">
	<legend>Data</legend>
	<textarea id="ammap_data" style="height: 550px; width: 100%;" name="ammap_data">
		<?php  
			if ($this->row->id) {
				echo JFile::read(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$this->row->folder.'/ammap_data.xml');
			} else {
				echo JFile::read(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'ammap_data.xml');
			}
		?>
	</textarea>
</fieldset>