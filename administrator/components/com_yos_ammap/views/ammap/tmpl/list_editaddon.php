<?php defined('_JEXEC') or die('Restricted access'); ?>
<fieldset>
	<legend>Data</legend>
	<textarea id="addon" style="height: 550px; width: 100%;" name="addon"></textarea>
</fieldset>
<?php
	$files = array();
	if($this->row->id){
		$files=JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon, '\.xml$', 0, false);
		$arr_title = array();
		for ($i=0; $i<count($files); $i++){
			$arr_title[$i]=$files[$i];
			$data = JFile::read(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon.DS.$files[$i]);			echo '<textarea id="'.$i.'" style="display:none">'.$data.'</textarea>';
		}
		
		?>
		<script type="text/javascript">
			var arr = new Array(
				<?php
				for ($i=0; $i<count($arr_title); $i++){
					if ($i!=count($arr_title)-1) {
						echo "'".$arr_title[$i]."',";	
					} else {
						echo "'".$arr_title[$i]."'";	
					}					
				} 
				?>	
			);
			arr_filename= arr;
		</script>
		<?php		
	}
?>
