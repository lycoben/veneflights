<?php
/**
*
* @version $Id: install.yos_ammap.php, v 0.1 2007/11/03 18:42:04 sonlv $
* @package yos_ammap
* @copyright Copyright (C) 2008 YOS. All rights reserved.
* @license GNU-GPL
* 
* http://f5vietnam.com
*/

defined('_JEXEC') or die('Restricted access');



/* create tables */
$database = JFactory::getDBO();

/* create tables amMap */
$query = "CREATE TABLE `#__yos_maps` (
			  `Id` int(11) NOT NULL auto_increment,
			  `title` varchar(255) NOT NULL,
			  `folder` varchar(255) NOT NULL,
			  `folderaddon` varchar(255) NOT NULL,
			  `hdata` varchar(255) NOT NULL default '0',
			  `hsettings` varchar(255) NOT NULL default '0',
			  `published` tinyint(3) NOT NULL default '0',
			  `ordering` int(11) NOT NULL default '0',
			  `checked_out` int(11) NOT NULL default '0',
			  `checked_out_time` datetime NOT NULL,
			  `created` datetime NOT NULL,
			  `created_by` int(11) NOT NULL default '0',
			  `pid` int(11) NOT NULL default '0',
			  `security` tinyint(3) NOT NULL default '0',
			  `timeout` int(11) NOT NULL default '0',
			  PRIMARY KEY  (`Id`)
			) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

$database->setQuery($query);
if(!$database->query())
echo "Can't create database".$database->getErrorMsg();

/* create tables element properties */
$query = "CREATE TABLE `#__yos_elements_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `type_el` tinyint(3) NOT NULL DEFAULT '0',
  `default` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `element_type` varchar(255) NOT NULL,
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

$database->setQuery($query);
if(!$database->query())
echo "Can't create database".$database->getErrorMsg();

$query	=	"INSERT INTO `#__yos_elements_properties` (`name`, `type`, `type_el`, `default`, `description`, `element_type`, `checked_out`, `checked_out_time`) VALUES
( 'title', 'String', 0, '', 'Movie title. Title can be displayed in a roll-over balloon.', 'movies', 0, '0000-00-00 00:00:00'),
( 'description', 'String', 1, '', 'Include description of object', 'movies', 0, '0000-00-00 00:00:00'),
( 'alpha', 'Number', 0, '100', 'Opacity of a movie. 0 for invisible (but still clickable).', 'movies', 0, '0000-00-00 00:00:00'),
( 'color', 'Hex color code', 0, '', 'If you do not set color, the movie will keep its original color.', 'movies', 0, '0000-00-00 00:00:00'),
( 'remain', 'true / false', 0, 'true', '\"true\" means that this movie will remain visible when user clicks on it or on other objects in the same level. If your movie clip has child objects, you might want to make it invisible - set this property to \"false\" then.', 'movies', 0, '0000-00-00 00:00:00'),
( 'center', 'true / false', 0, 'false', '\"true\" means that the movie center will be in specified longitude & latitude (or x & y). Otherwise movie''s top left corner will be in this position. It is recommended to set \"true\" for photos, images and custom swf movies. However default amMap icons are made so that the icon''s center is in 0,0 position, that''s why you shouldn''t set this setting to \"true\" when you use these icons.', 'movies', 0, '0000-00-00 00:00:00'),
( 'x', 'Number, Number% or !Number', 0, '', 'If you want your movie to be bounded to the stage, set x and y properties. This means that this movie will not move together with the map. To find desired x and y, use developer mode.', 'movies', 0, '0000-00-00 00:00:00'),
( 'color_hover', 'Hex color code', 0, '', 'Movie color when user roll-overs it. Movie will not change color if this property is not set.', 'movies', 0, '0000-00-00 00:00:00'),
( 'oid', 'String', 0, '', 'Unique object id. You only need it if you want to make \"link\" from one object to another.', 'movies', 0, '0000-00-00 00:00:00'),
( 'file', 'String', 0, '', 'File name of a movie. This file should be placed in \"path\" folder (defined in map html file). If you want to use embedded movie, set movie name here: file=\"rectangle\" (circle, border, target, home)', 'movies', 0, '0000-00-00 00:00:00'),
( 'y', 'Number, Number% or !Number', 0, '', 'If you want your movie to be bounded to the stage, set x and y properties. This means that this movie will not move together with the map. To find desired x and y, use developer mode.', 'movies', 0, '0000-00-00 00:00:00'),
( 'lat', 'Number', 0, '', 'If you want your movie to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this movie will move together with the map. To find desired lat and long, use developer mode.', 'movies', 0, '0000-00-00 00:00:00'),
( 'long', 'Number', 0, '', 'If you want your movie to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this movie will move together with the map. To find desired lat and long, use developer mode.', 'movies', 0, '0000-00-00 00:00:00'),
( 'rotation', 'Number', 0, '', 'Movie clip rotation in degrees.', 'movies', 0, '0000-00-00 00:00:00'),
( 'height', 'Number or Number%', 0, '', 'Width and height of your movie. If you want to keep original size, do not set these properties.', 'movies', 0, '0000-00-00 00:00:00'),
( 'width', 'Number or Number%', 0, '', 'Width and height of your movie. If you want to keep original size, do not set these properties.', 'movies', 0, '0000-00-00 00:00:00'),
( 'fixed_size', 'true / false', 0, 'false', '\"false\" means that the movie will be resized together with the map (when zooming). If you want your movie to remain the same size, set this property to \"true\".', 'movies', 0, '0000-00-00 00:00:00'),
( 'url', 'String', 0, '', 'There are several options: 1) web site address: http://www.ammap.com 2) JavaScript function: javascript:alert(''movie clicked''); 3) #top - will go to top level of your map 4) #parent - will go one level up 5) #object_id - will act as if object with oid=\"object_id\" was clicked', 'movies', 0, '0000-00-00 00:00:00'),
( 'flash_vars', 'String', 0, '', 'If you use amMap on a web server, you can pass variables to your movies by adding them to your file name, for example: file=\"movie.swf?id=50&color=#CC0000\". However if you open ammap as a stand alone flash project, this method will not work. The parameter \"flash_vars\" will help you to solve this problem. You can pass any number of variables to your movie: flash_vars=\"id=10&color=#CC0000\".', 'movies', 0, '0000-00-00 00:00:00'),
( 'target', 'String', 0, '', 'Target of url. Will work only if url is web site address. Do not set any target if you want this page to be opened in the same window. For a new window use \"_blank\".', 'movies', 0, '0000-00-00 00:00:00'),
( 'value', 'Number', 0, '', 'Value of the movie. Value can be displayed in a roll-over balloon.', 'movies', 0, '0000-00-00 00:00:00'),
( 'zoom_x', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'movies', 0, '0000-00-00 00:00:00'),
( 'zoom_y', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'movies', 0, '0000-00-00 00:00:00'),
( 'zoom', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'movies', 0, '0000-00-00 00:00:00'),
( 'text_box', 'true / false', 0, '<settings><text_box><enabled>', 'Text box displays description of your movie. If your movie has description, but you don''t want text box to appear, set this attribute to false.', 'movies', 0, '0000-00-00 00:00:00'),
( 'text_box_x', 'Number, Number% or !Number', 0, '<settings><text_box><x>', 'Text box x position', 'movies', 0, '0000-00-00 00:00:00'),
( 'text_box_y', 'Number, Number% or !Number', 0, '<settings><text_box><y>', 'Text box y position.', 'movies', 0, '0000-00-00 00:00:00'),
( 'text_box_width', 'Number or Number%', 0, '<settings><text_box><width>', 'Text box width.', 'movies', 0, '0000-00-00 00:00:00'),
( 'text_box_height', 'Number or Number%', 0, '<settings><text_box><height>', 'Text box height.', 'movies', 0, '0000-00-00 00:00:00'),
( 'balloon', 'true / false', 0, 'true', 'If you want to disable roll over balloon for your movie, set this attribute to false.', 'movies', 0, '0000-00-00 00:00:00'),
( 'link_with', 'other objects'' oid attributes, separated by commas', 0, '', 'If you want some other objects to change color when user rolls over or clicks on this movie, you can add object''s ids (oid) here.', 'movies', 0, '0000-00-00 00:00:00'),
( 'x', 'Numbers, Numbers% or !Numbers, separated by comas', 0, '', 'If you want your line to be bounded to the stage, set x and y properties. This means that this line will not move together with the map. To find desired x and y, use developer mode.', 'lines', 0, '0000-00-00 00:00:00'),
( 'y', 'Numbers, Numbers% or !Numbers, separated by comas', 0, '', 'If you want your line to be bounded to the stage, set x and y properties. This means that this line will not move together with the map. To find desired x and y, use developer mode.', 'lines', 0, '0000-00-00 00:00:00'),
( 'lat', 'Numbers, separated by comas', 0, '', 'If you want your line to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this line will move together with the map. To find desired lat and long, use developer mode.', 'lines', 0, '0000-00-00 00:00:00'),
( 'long', 'Numbers, separated by comas', 0, '', 'If you want your line to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this line will move together with the map. To find desired lat and long, use developer mode.', 'lines', 0, '0000-00-00 00:00:00'),
( 'width', 'Number', 0, '<settings><line><width>', 'Width of your line. 0 - hairline.', 'lines', 0, '0000-00-00 00:00:00'),
( 'fixed_size', 'true / false', 0, '<settings><line><fixed_size>', '\"true\" means that the line arrow will remain the same size when zooming the map. Set this property to false if you want line arrow to resize together with the map.', 'lines', 0, '0000-00-00 00:00:00'),
( 'remain', 'true / false', 0, 'true', '\"true\" means that this line will remain visible when user clicks on objects in the same level.', 'lines', 0, '0000-00-00 00:00:00'),
( 'color', 'Hex color code', 0, '<settings><line><color>', 'Line color. If not set, will be equal to line color set in settings file.', 'lines', 0, '0000-00-00 00:00:00'),
( 'alpha', 'Number', 0, '<settings><line><alpha>', 'Opacity of a line. If not set, will be equal to line alpha set in settings file.', 'lines', 0, '0000-00-00 00:00:00'),
( 'arrow', 'end / start / middle / both', 0, '<settings><line><arrow>', 'Arrow position. Do not set this property if you don''t want arrow at all. \"middle\" will not work properly with curved lines.', 'lines', 0, '0000-00-00 00:00:00'),
( 'arrow_size', 'Number', 0, '<settings><line><arrow_size>', 'Arrow size.', 'lines', 0, '0000-00-00 00:00:00'),
( 'arrow_color', 'Hex color code', 0, '<settings><line><arrow_color>', 'Arrow color.', 'lines', 0, '0000-00-00 00:00:00'),
( 'arrow_alpha', 'Number', 0, '<settings><line><arrow_alpha>', 'Opacity of an arrow.', 'lines', 0, '0000-00-00 00:00:00'),
( 'curved', 'true / false', 0, '<settings><line><curved>', '\"true\" means that this line will be smoothed if it has at least 3 points in it''s x, y or lat and long attributes set.', 'lines', 0, '0000-00-00 00:00:00'),
( 'description', 'string', 1, '', 'Description of Lines', 'lines', 0, '0000-00-00 00:00:00'),
( 'description', 'String', 1, '', 'Description of Labels', 'labels', 0, '0000-00-00 00:00:00'),
( 'text', 'String', 1, '', 'Text of Labels', 'labels', 0, '0000-00-00 00:00:00'),
( 'x', 'Number, Number% or !Number', 0, '', 'If you want your label to be bounded to the stage, set x and y properties. This means that this label will not move together with the map. To find desired x and y, use developer mode.', 'labels', 0, '0000-00-00 00:00:00'),
( 'lat', 'Number', 0, '', 'If you want your label to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this label will move together with the map. To find desired lat and long, use developer mode.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_size', 'Number', 0, '<settings><text_size>', 'Text size. If not set, will be equal to <text_size> set in settings file.', 'labels', 0, '0000-00-00 00:00:00'),
( 'fixed_size', 'true / false', 0, 'true', '\"true\" means that the label will remain the same size when zooming the map. Set this property to false if you want text to resize together with the map.', 'labels', 0, '0000-00-00 00:00:00'),
( 'width', 'Number or Number%', 0, '', 'Width of your label text field.', 'labels', 0, '0000-00-00 00:00:00'),
( 'bg_alpha', 'Number', 0, '100', 'Opacity of a background.', 'labels', 0, '0000-00-00 00:00:00'),
( 'title', 'String', 0, '', 'Label title. Title can be displayed in a roll-over balloon.', 'labels', 0, '0000-00-00 00:00:00'),
( 'url', 'String', 0, '', 'There are several options: 1) web site address: http://www.ammap.com 2) JavaScript function: javascript:alert(''label clicked''); 3) #top - will go to top level of your map 4) #parent - will go one level up 5) #object_id - will act as if object with oid=\"object_id\" was clicked.', 'labels', 0, '0000-00-00 00:00:00'),
( 'y', 'Number, Number% or !Number', 0, '', 'If you want your label to be bounded to the stage, set x and y properties. This means that this label will not move together with the map. To find desired x and y, use developer mode.', 'labels', 0, '0000-00-00 00:00:00'),
( 'oid', 'String', 0, '', 'Unique object id. You only need it if you want to make \"link\" from one object to another.', 'labels', 0, '0000-00-00 00:00:00'),
( 'remain', 'true / false', 0, 'true', '\"true\" means that this label will remain visible when user clicks on it or on other objects in the same level. If your label has child objects, you might want to make it invisible - set this property to \"false\" then.', 'labels', 0, '0000-00-00 00:00:00'),
( 'zoom_x', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'labels', 0, '0000-00-00 00:00:00'),
( 'target', 'String', 0, '', 'Target of url. Will work only if url is web site address. Do not set any target if you want this page to be opened in the same window. For a new window use \"_blank\".', 'labels', 0, '0000-00-00 00:00:00'),
( 'zoom_y', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'labels', 0, '0000-00-00 00:00:00'),
( 'long', 'Number', 0, '', 'If you want your label to be bounded to the map, set lat and long (latitude and longitude) properties. This means that this label will move together with the map. To find desired lat and long, use developer mode.', 'labels', 0, '0000-00-00 00:00:00'),
( 'align', 'left / right / center', 0, 'left', 'Alignment of text in text field.', 'labels', 0, '0000-00-00 00:00:00'),
( 'rotate', 'true / false', 0, 'false', 'If you set this property to \"true\" the label will be rotated by 90 degrees.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_box_y', 'Number, Number% or !Number', 0, '<settings><text_box><y>', 'Text box y position.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_box_x', 'Number, Number% or !Number', 0, '<settings><text_box><x>', 'Text box x position.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_box', 'true / false', 0, '<settings><text_box><enabled>', 'Text box displays description of your movie. If your movie has description, but you don''t want text box to appear, set this attribute to false.', 'labels', 0, '0000-00-00 00:00:00'),
( 'zoom', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the movie. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into movie node.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_box_height', 'Number or Number%', 0, '<settings><text_box><height>', 'Text box height.', 'labels', 0, '0000-00-00 00:00:00'),
( 'balloon', 'true / false', 0, 'true', 'If you want to disable roll over balloon for your label, set this attribute to false.', 'labels', 0, '0000-00-00 00:00:00'),
( 'mc_name', 'String', 0, '', 'Movie clip instance name. This instance name is set in the map file before publishing. All the maps included in the map package has a list of all available areas, so you don''t need to worry about these names if you use default maps.', 'areas', 0, '0000-00-00 00:00:00'),
( 'oid', 'String', 0, '', 'Unique object id. You only need it if you want to group the areas or you want one object to work as a \"link\" to another.', 'areas', 0, '0000-00-00 00:00:00'),
( 'color', 'Hex color code', 0, '', 'If you do not set color, the area will keep its original color.', 'areas', 0, '0000-00-00 00:00:00'),
( 'color_hover', 'Hex color code', 0, '<settings><area><color_hover>', 'Area color when user roll-overs the area. Will use value from settings file if not defined in data file.', 'areas', 0, '0000-00-00 00:00:00'),
( 'alpha', 'Number', 0, '100', 'Opacity of an area, use 0 for invisible (but still clickable).', 'areas', 0, '0000-00-00 00:00:00'),
( 'title', 'String', 0, '', 'Title can be displayed in a roll-over balloon.', 'areas', 0, '0000-00-00 00:00:00'),
( 'url', 'String', 0, '', 'There are several options: 1) web site address: http://www.ammap.com 2) JavaScript function: javascript:alert(''area US clicked''); 3) #top - will go to top level of your map 4) #parent - will go one level up 5) #object_id - will act as if object with oid=\"object_id\" was clicked', 'areas', 0, '0000-00-00 00:00:00'),
( 'target', 'String', 0, '', 'Target of an url. Will work only if url is web site address. Do not set any target if you want this page to be opened in the same window. For a new window use \"_blank\".', 'areas', 0, '0000-00-00 00:00:00'),
( 'value', 'Number', 0, '', 'Value of the area. Value can be displayed in a roll-over balloon. If you do not set color of the area, the areas with high value will be filled with colors close to <settings><area><color_solid>, and the areas with low values - close to <settings><area><color_light> color.', 'areas', 0, '0000-00-00 00:00:00'),
( 'zoom_x', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the area. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into area node.', 'areas', 0, '0000-00-00 00:00:00'),
( 'zoom_y', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the area. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into area node.', 'areas', 0, '0000-00-00 00:00:00'),
( 'zoom', 'Number%', 0, '', 'You should set zoom_x, zoom_y and zoom if you want map to be zoomed or moved to a different position when user clicks on the area. To find out these values, turn developer mode on, set desired zoom level and position, copy \"zoom info\" to clipboard and paste it into area node.', 'areas', 0, '0000-00-00 00:00:00'),
( 'text_box', 'true / false', 0, '<settings><text_box><enabled>', 'Text box displays description of your area. If your area has description, but you don''t want text box to appear, set this attribute to false.', 'areas', 0, '0000-00-00 00:00:00'),
( 'text_box_x', 'Number, Number%, !Number', 0, '<settings><text_box><x>', 'Text box x position', 'areas', 0, '0000-00-00 00:00:00'),
( 'text_box_y', 'Number, Number%, !Number', 0, '<settings><text_box><y>', 'Text box y position', 'areas', 0, '0000-00-00 00:00:00'),
( 'text_box_width', 'Number or Number%', 0, '<settings><text_box><width>', 'Text box width.', 'areas', 0, '0000-00-00 00:00:00'),
( 'text_box_height', 'Number or Number%', 0, '<settings><text_box><height>', 'Text box height.', 'areas', 0, '0000-00-00 00:00:00'),
( 'balloon', 'true / false', 0, 'true', 'If you want to disable roll over ballon for a specific area, set this attribute to false.', 'areas', 0, '0000-00-00 00:00:00'),
( 'link_with', 'other objects'' oid attributes, separated by commas', 0, '', 'If you want some other objects to change color when user rolls over or clicks on this area, you can add object''s ids (oid) here.', 'areas', 0, '0000-00-00 00:00:00'),
( 'description', 'String', 1, '', 'Description of Areas', 'areas', 0, '0000-00-00 00:00:00'),
( 'color_hover', 'Hex color code', 0, '', 'Label text color when user roll-overs it. Label will not change color if this property is not set', 'labels', 0, '0000-00-00 00:00:00'),
( 'bg_color', 'Hex color code', 0, '', 'Label background color.', 'labels', 0, '0000-00-00 00:00:00'),
( 'color', 'Hex color code', 0, '<settings><text_color>', 'Text color. If not set, will be equal to text_color set in settings file.', 'labels', 0, '0000-00-00 00:00:00'),
( 'text_box_width', 'Number or Number%', 0, '<settings><text_box><width>', 'Text box width.', 'labels', 0, '0000-00-00 00:00:00'),
( 'link_with', 'other objects'' oid attributes, separated by commas', 0, '', 'If you want some other objects to change color when user rolls over or clicks on this label, you can add object''s ids (oid) here.', 'labels', 0, '0000-00-00 00:00:00');";

$database->setQuery($query);
if(!$database->query())
echo "Can't create database".$database->getErrorMsg();

/* create tables map element */
$query = "CREATE TABLE `#__yos_map_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_id` int(11) NOT NULL DEFAULT '0',
  `element_id` int(11) NOT NULL DEFAULT '0',
  `element_type` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";

$database->setQuery($query);
if(!$database->query())
echo "Can't create database".$database->getErrorMsg();

/* create tables key hash */
$query = "CREATE TABLE `#__yos_key_hash` (
				  `timecheck` datetime NOT NULL,
				  `hash` varchar(255) NOT NULL,
				  PRIMARY KEY  (`hash`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

$database->setQuery($query);
if(!$database->query())
echo "Can't create database".$database->getErrorMsg();
	?>
	<p style="margin-bottom: 0in;">
		<a target="_blank" title="interactive flash maps" href="http://www.ammap.com/"><strong>amMap</strong></a> is an interactive flash map creation software. Use this tool to show locations of your offices, routes of your journeys, create your distributor map. Photos or illustrations can be used instead of maps, so you can make different presentations, e-learning tools and more.
	</p>
	<p style="margin-bottom: 0in;"><strong>YOS amMap</strong> is an Joomla extension which <strong>integrated almost amMap features</strong>. With <strong>YOS amMap</strong> you can <strong>easily</strong> integrate maps which provided by <strong>amMap</strong> to your Joomla site.</p>
	<p><strong>YOS amMap key features:</strong></p>
	<ul>
		<li>Included <strong>amMap</strong> features</li>
		<li>Easy manage maps, add-ons,  icons</li>
		<li>Back-up and Restore feature</li>
		<li>Protect map data files (Security feature)</li>
		<li>Easy inject maps to anywhere in your Joomla site (front-end)</li>
	</ul>	
	<p style="text-align: center;">
		<img src="components/com_yos_ammap/images/yos_ammap.png"/>
	</p>
	<p><strong>Info:</strong></p>
	<font style="font-weight:normal;">		
	&nbsp;&nbsp;This's Pro-Version.<br/><br/>
	
	<b>Demo:</b> <a href="http://joomla.yopensource.com/yos-ammap/1.5/">Pro-Version</a><br/><br/>
	
	<p style="text-align: center;">
		<a href="<?php echo JRoute::_('index.php?option=com_yos_ammap&task=backup'); ?>"><img src="components/com_yos_ammap/images/icon-install.png" style="border: 1px solid silver;" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo JRoute::_('index.php?option=com_yos_ammap'); ?>"><img src="components/com_yos_ammap/images/icon-main.png" style="border: 1px solid silver;" /></a>
	</p>
