<?php

defined('_JEXEC') or die();

class TableModules extends JTable
{
  var $id 	= null;  // int(11) NOT NULL auto_increment,
  var $title = '';  // text NOT NULL,
  var $content =''; // text NOT NULL,
  var $ordering = 0; // int(11) NOT NULL default '0',
  var $position = null; // varchar(50) default NULL,
  var $checked_out = 0 ; // int(11) unsigned NOT NULL default '0',
  var $checked_out_time ='0000-00-00 00:00:00'; // datetime NOT NULL default '0000-00-00 00:00:00',
  var $published = 0; // tinyint(1) NOT NULL default '0',
  var $module = null; // varchar(50) default NULL,
  var $numnews =0 ; // int(11) NOT NULL default '0',
  var $access = 0; // tinyint(3) unsigned NOT NULL default '0',
  var $showtitle =1; // tinyint(3) unsigned NOT NULL default '1',
  var $params = null; // text NOT NULL,
  var $iscore = 0; // tinyint(4) NOT NULL default '0',
  var $client_id =0 ;// tinyint(4) NOT NULL default '0',
  var $control= '';// text NOT NULL,
        
  function __construct(&$db)
  {
  	parent::__construct( '#__modules', 'id', $db );
  }
}
