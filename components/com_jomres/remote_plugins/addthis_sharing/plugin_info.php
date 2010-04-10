<?php
class plugin_info_addthis_sharing
	{
	function plugin_info_addthis_sharing()
		{
		$this->data=array(
			"name"=>"addthis_sharing",
			"version"=>(float)"1.1",
			"description"=> "Internal plugin. Shows a link to 'addthis.com' allowing users to add the property link to various community sites like Reddit, Digg etc. Appears above the property details and under the header in the view property page. v1.1 fixed bug that caused an error in touch templates.",
			"lastupdate"=>"2008/06/30"
			);
		}
	}
?>