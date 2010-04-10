<?php defined('_JEXEC') or die('Restricted access'); 

$icons 	= JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'icons','\.swf$|\.jpg$|\.gif$|\.png$', 0, false);
$maps	= JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'maps', '\.swf$|\.jpg$|\.gif$|\.png$', 0, false);
if ($this->row->folderaddon) {
	$addons	= JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon,'\.swf$|\.jpg$|\.gif$|\.png$', 0, true);
} else {
	$addons	= JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon','\.swf$|\.jpg$|\.gif$|\.png$', 0, true);
}
$xmladdons =JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon, '\.xml$', 0, false);
?>
<script type="text/javascript">
	
</script>
<table width="100%" style="border: 1px dashed silver; padding: 5px; margin-bottom: 10px;">
	<tr>
		<td>
			<span class="editlinktip hasTip" title="<?php echo JText::_( 'amMap\'s Icons' );?>::<?php echo JText::_( 'Icons to show on amMap. Double click to get it!' ); ?>"><strong><?php echo JText::_( 'Icons' ); ?>:</strong></span> <br/>
			<select id="icons" name="icons" size="5" style="width: 150px;">
			<?php
				foreach ($icons as $icon) {					
					echo '<option value = "icons/'.$icon.'">'.$icon.'</option>';
				}
			?>
			</select>
		</td>		
	</tr>
	<tr>
		<td>
			<span class="editlinktip hasTip" title="<?php echo JText::_( 'amMap\'s Maps' );?>::<?php echo JText::_( 'Maps as World, Country, Region etc... Double click to get it!' ); ?>"><strong><?php echo JText::_( 'Maps' ); ?>:</strong></span> <br/>
			<select id="maps" name="maps" size="5" style="width: 150px;">
			<?php
				foreach ($maps as $map) {					
					echo '<option value = "maps/'.$map.'">'.$map.'</option>';
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			<span class="editlinktip hasTip" title="<?php echo JText::_( 'amMap\'s Data' );?>::<?php echo JText::_( 'This box contain ammap_data.xml and ammap_settings.xml Double click to get it!' ); ?>"><strong><?php echo JText::_( 'XML Data & Settings' ); ?>:</strong></span> <br/>
			<select id="xmldata" name="xmldata" size="5" style="width: 150px;">
				<option value="{XData}">ammap_data.xml</option>
				<option value="{XSettings}">ammap_settings.xml</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td>
			<span class="editlinktip hasTip" title="<?php echo JText::_( 'amMap\'s XML Addons' );?>::<?php echo JText::_( 'This box contain addon XML files. Double click to get it!' ); ?>"><strong><?php echo JText::_( 'XML Addons' ); ?>:</strong></span> <br/>
			<select id="xmladdons" name="xmladdons" size="5" style="width: 150px;">
			<?php
				$k = 0;
				foreach ($xmladdons as $xmladdon) {					
					echo '<option id="addon'.$k.'" value = "'.$xmladdon.'" title="'.$k.'">'.$xmladdon.'</option>';
					$k++;
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>			
			<span class="editlinktip hasTip" title="<?php echo JText::_( 'amMap\'s Addons' );?>::<?php echo JText::_( 'This box contain addon files as a.swf, b.jpg, c.gif, d.png. Double click to get it!' ); ?>"><strong><?php echo JText::_( 'Addons' ); ?>:</strong></span> <br/>
			<select id="addons" name="addons" size="5" style="width: 150px;">
			<?php
				foreach ($addons as $addon) {
					$iaddon = str_replace(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS,'',$addon);
					if (strpos($iaddon,DS)!=0) {
						echo '<option value = "{IAddon}/'.substr($iaddon,strpos($iaddon,DS)+1).'">'.substr($iaddon,strpos($iaddon,DS)+1).'</option>';
					} else {
						echo '<option value = "addon/'.$iaddon.'">'.$iaddon.'</option>';
					}
				}
			?>
			</select>
		</td>
	</tr>
	
</table>
<fieldset id="viewdata" style="display:none;">
	<legend>Data View</legend>
	
</fieldset>