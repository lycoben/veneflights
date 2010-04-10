<?php
class plugin_info_pseudocron
	{
	function plugin_info_pseudocron()
		{
		$this->data=array(
			"name"=>"pseudocron",
			"version"=>(float)"1.1",
			"description"=> 'Internal plugin. See this thread <a href="http://forum.jomres.net/index.php?topic=246.0" target="_blank"> here for more information on this plugin</a>, but do not attempt to install the plugins in that thread. This plugin should be considered the defacto version. v1.1 Added check for curl functions in cron.class.php',
			"lastupdate"=>"2008/08/26"
			);
		}
	}
?>