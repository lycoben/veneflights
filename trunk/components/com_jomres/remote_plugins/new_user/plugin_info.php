<?php
class plugin_info_new_user
	{
	function plugin_info_new_user()
		{
		$this->data=array(
			"name"=>"new_user",
			"version"=>(float)"1.2",
			"description"=> "Internal plugin. <b> Joomla 1.5 only </b> Creates a new user for non-registered users making bookings and emails the registration details to that user.  v1.1 updated language files to xx-XX.php format. 1.2 Fixed 00001 includer so that xx-XX is called if jomrsConfig_lang file doesn't exist.",
			"lastupdate"=>"2008/09/12"
			);
		}
	}
?>