<?php

class plugin_check_exclusions
	{
	function plugin_check_exclusions()
		{
		$this->test_result = true;
		$this->exclusions = array ( "slideshow_carousel" );
		foreach ($this->exclusions as $p)
			{
			if (file_exists(JOMRESPATH_BASE."/remote_plugins/".$p."/plugin_info.php") )
				$this->test_result = false;
			}
		}
	
	}

?>