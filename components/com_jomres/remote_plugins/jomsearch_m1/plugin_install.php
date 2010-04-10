<?php
if (!defined('JOMRES_INSTALLER')) exit;

$plugin_name = "jomsearch_m1";
$plugin_type = "module";
$params="";


define("JOMRES_INSTALLER_RESULT", install_external_plugin($plugin_name,$plugin_type,"",$params) );

?>