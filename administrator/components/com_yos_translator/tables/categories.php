<?php

defined('_JEXEC') or die();

class TableCategories extends JTable
{
  var $id =null;		// int(11) NOT NULL auto_increment,
  var $parent_id = 0; 	// int(11) NOT NULL default '0',
  var $title = '';		// varchar(255) NOT NULL default '',
  var $name = ''; 		// varchar(255) NOT NULL default '',
  var $alias = ''; 		// varchar(255) NOT NULL default '',
  var $image = '';		// varchar(255) NOT NULL default '',
  var $section = '';    // varchar(50) NOT NULL default '',
  var $image_position = '';	// varchar(30) NOT NULL default '',
  var $description = ''; // text NOT NULL,
  var $published = 0 ; // tinyint(1) NOT NULL default '0',
  var $checked_out = 0 ; // int(11) unsigned NOT NULL default '0',
  var $checked_out_time = '0000-00-00 00:00:00'; //datetime NOT NULL default '0000-00-00 00:00:00',
  var $editor = null;	// varchar(50) default NULL,
  var $ordering	= 0;	// int(11) NOT NULL default '0',
  var $access = 0; 	// tinyint(3) unsigned NOT NULL default '0',
  var $count = 0; 	// int(11) NOT NULL default '0',
  var $params = '';	// text NOT NULL,
        
  function __construct(&$db)
  {
  	parent::__construct( '#__categories', 'id', $db );
  }
}
