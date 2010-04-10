<?php

class plugin_check_dependencies
	{
	function plugin_check_dependencies()
		{
		$this->test_result = true;
		$this->dependencies = array ( "pseudocron" );
		foreach ($this->dependencies as $p)
			{
			if (!file_exists(JOMRESPATH_BASE."/remote_plugins/".$p."/plugin_info.php") )
				$this->test_result = false;
			}
		}
	
	}

?>