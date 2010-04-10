<?php
if (!defined('JOMRES_INSTALLER')) exit;

	$query="
	CREATE TABLE IF NOT EXISTS `#__jomcomp_cron` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`job` char( 100 ) ,
		`schedule` char(2) not null ,
		`last_ran` int(12) not null ,
		`parameters` varchar(255) null,
		`locked` BOOL NOT NULL DEFAULT '0',
		PRIMARY KEY ( `id` )
		);
		";
	if (!doInsertSql($query))
		echo "Failed to run query: ".$query."<br/>";
	
	$query="
	CREATE TABLE IF NOT EXISTS `#__jomcomp_cronlog` (
		`id` int NOT NULL AUTO_INCREMENT ,
		`log_details` text null,
		PRIMARY KEY ( `id` )
		);
	";
	if (!doInsertSql($query))
		echo "Failed to run query: ".$query."<br/>";
	
	
?>