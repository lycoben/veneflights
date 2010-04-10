<?php
if (!defined('JOMRES_INSTALLER')) exit;

$plugin_name = "jomres_pp2";
$plugin_type = "module";
$params="";


define("JOMRES_INSTALLER_RESULT", install_external_plugin($plugin_name,$plugin_type,"",$params) );

?>