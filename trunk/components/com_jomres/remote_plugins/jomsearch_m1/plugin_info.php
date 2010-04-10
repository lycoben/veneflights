<?php
class plugin_info_jomsearch_m1
	{
	function plugin_info_jomsearch_m1()
		{
		$this->data=array(
			"name"=>"jomsearch_m1",
			"version"=>(float)"1.3",
			"description"=> 'Module. Search module. Please watch <a href="http://www.jomres.net/index.php?option=com_content&task=view&id=27&Itemid=239" target="_blank"> the tutorial on search titled Using the Jomres Search modules</a> for guidance on how to use this search module. v1.1 Added pricerange option to enable searching by price ranges from Jomres 3.2.1. 1.2 Removed the memory_limit setting code as this is handled in jomres.php 1.3 Added code for showing country/region/town jquery combo dropdowns. mod_jomsearch_m1 is optimised to be shown in a banner/syndication template area, the other three search modules srch.html template files are left with no layout so that you can organise them as you want.<p><i>Requires Jomres 3.1.8 or later. Cannot be uninstalled via the Show Plugins page, you must use the Joomla/Mambo plugin uninstaller instead.</i></p>',
			"lastupdate"=>"2008/11/24",
			"type"=>"module"
			);
		}
	}
?>