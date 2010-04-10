<?php
class plugin_info_dashboard_enhanced
	{
	function plugin_info_dashboard_enhanced()
		{
		$this->data=array(
			"name"=>"dashboard_enhanced",
			"version"=>(float)"1.4",
			"description"=> "Internal plugin. Shows booking information for ALL properties that a manager has rights to. v1.1 fixed errant reference to sefRelToAbs. v1.2 made compatible with touch templates. 1.3 Upgraded to work in 1.5. 1.4 Fixed bug where today was displayed as a historic date.",
			"lastupdate"=>"2008/08/28"
			);
		}
	}
?>