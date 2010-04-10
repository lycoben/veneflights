<?php
/**
*
* @version $Id: install.s4_component_template.php, v 0.1 2007/11/03 18:42:04 m203cb $
* @package test_joomla-1.5
* @copyright Copyright (C) 2008 s4vn. All rights reserved.
* @license http://s4vn.com
* 
* http://s4vn.com
*/

defined('_JEXEC') or die('Restricted access');


$database = JFactory::getDBO();
/* drop tables */
$query = "DROP TABLE `#__yos_maps`";
$database->setQuery($query);
$database->query();
if ($database->getErrorNum()) {
	echo $database->getErrorMsg();
	return false;
}

$query = "DROP TABLE `#__yos_key_hash`";
$database->setQuery($query);
$database->query();
if ($database->getErrorNum()) {
	echo $database->getErrorMsg();
	return false;
}

$query = "DROP TABLE `#__yos_elements_properties`";
$database->setQuery($query);
$database->query();
if ($database->getErrorNum()) {
	echo $database->getErrorMsg();
	return false;
}

$query = "DROP TABLE `#__yos_map_elements`";
$database->setQuery($query);
$database->query();
if ($database->getErrorNum()) {
	echo $database->getErrorMsg();
	return false;
}

echo "<h3>Uninstall successfully</h3>";

?>