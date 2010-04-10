<?php
class plugin_info_jomres_pricesfrom
	{
	function plugin_info_jomres_pricesfrom()
		{
		$this->data=array(
			"name"=>"jomres_pricesfrom",
			"version"=>(float)"1.1",
			"description"=> "Module. Shows the lower and upper prices for a property. Only active on the View Property Details page. v1.1 Updates how site settings are called to show the correct currency code if Global currency codes are set to Yes. <p><i>Requires Jomres 3.1.8 or later. Cannot be uninstalled via the Show Plugins page, you must use the Joomla/Mambo plugin uninstaller instead.</i></p>",
			"lastupdate"=>"2008/04/11",
			"type"=>"module"
			);
		}
	}
?>