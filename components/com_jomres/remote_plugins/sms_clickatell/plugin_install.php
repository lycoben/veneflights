<?php
if (!defined('JOMRES_INSTALLER')) exit;


$query = "CREATE TABLE IF NOT EXISTS `#__jomresportal_sms_clickatell_messages` (
  id int(10) NOT NULL auto_increment,
  username  varchar(20) NOT NULL default '',
  number varchar(25) NOT NULL default '',
  message varchar(160) NOT NULL default '',
  property_uid int(10) NOT NULL default '0',
  send_time datetime NOT NULL,
  ack INT( 3 ) NULL DEFAULT '0',
  apiMsgid VARCHAR( 255 ) NOT NULL,
  PRIMARY KEY  (id)
)";
doInsertSql($query,"");

?>