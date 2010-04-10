-- <?php /* $Id:schema.php 1865 2007-09-22 00:35:42Z masterchief $ */ defined( '_JEXEC' ) or die() ?>;

CREATE TABLE IF NOT EXISTS `#__jxcomments` (
  `version` varchar(16) NOT NULL COMMENT 'Version number',
  `installed_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'Date-time installed',
  `log` mediumtext,
  PRIMARY KEY  (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Version history';

CREATE TABLE IF NOT EXISTS  `#__jxcomments_comments` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL default '0' COMMENT 'Map to the user id',
  `context` varchar(50) NOT NULL COMMENT 'The context of the comment',
  `context_id` int(11) NOT NULL default '0' COMMENT 'The id of the item in context',
  `referer` varchar(255) NOT NULL COMMENT 'The referring URL',
  `page` varchar(255) NOT NULL COMMENT 'Custom page field',
  `name` varchar(255) NOT NULL COMMENT 'Name of the commentor',
  `url` varchar(255) NOT NULL COMMENT 'Website for the commentor',
  `email` varchar(255) NOT NULL COMMENT 'Email address for the commentor',
  `subject` varchar(255) NOT NULL COMMENT 'The subject of the comment',
  `body` text NOT NULL COMMENT 'Body of the comment',
  `created_date` datetime NOT NULL COMMENT 'When the comment was created',
  `published` int(10) unsigned NOT NULL default '0' COMMENT 'Published state, allows for moderation',
  `address` varchar(50) NOT NULL COMMENT 'Address of the commentor (IP, Mac, etc)',
  `link` varchar(255) NOT NULL COMMENT 'The link to the page the comment was made on',
  PRIMARY KEY  (`id`),
  KEY `idx_context` (`context`,`context_id`,`published`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `#__jxcomments_ratings` (
  `context` varchar(50) NOT NULL COMMENT 'The context of the rating',
  `context_id` int(11) NOT NULL default '0' COMMENT 'The id of the item in context',
  `referer` varchar(255) NOT NULL default '' COMMENT 'The referring URL',
  `page` varchar(255) NOT NULL COMMENT 'Custom page field',
  `pscore_total` double NOT NULL default '0' COMMENT 'Cummulative public score',
  `pscore_count` int(10) NOT NULL default '0' COMMENT 'Total number of public ratings',
  `pscore` double NOT NULL default '0' COMMENT 'Actual public score',
  `mscore_total` double NOT NULL default '0' COMMENT 'Cummulative member score',
  `mscore_count` int(10) NOT NULL default '0' COMMENT 'Total number of member ratings',
  `mscore` double NOT NULL default '0' COMMENT 'Actual score',
  `used_ips` longtext COMMENT 'The ips used to vote',
  `updated_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  UNIQUE KEY `idx_context` (`context`,`context_id`),
  KEY `idx_updated` (`updated_date`,`pscore`),
  KEY `idx_pscore` (`pscore`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Aggregate scores for public and member ratings';

CREATE TABLE IF NOT EXISTS  `#__jxcomments_ratings_members` (
  `user_id` int(10) unsigned NOT NULL default '0' COMMENT 'Map to the user id',
  `context` varchar(50) NOT NULL COMMENT 'The context of the comment',
  `context_id` int(11) NOT NULL default '0' COMMENT 'The id of the item in context',
  `score` double NOT NULL default '0' COMMENT 'Actual member rating',
  `category_id` int(11) NOT NULL default '0' COMMENT 'Rating Category',
  `updated_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'Modification Timestamp',
  `address` varchar(50) NOT NULL COMMENT 'IP address of the rater',
  UNIQUE KEY `idx_user_context` USING BTREE (`context`,`context_id`,`user_id`,`category_id`),
  KEY `idx_user` USING BTREE (`user_id`,`context`,`context_id`,`category_id`),
  KEY `idx_address_context` (`address`,`context`),
  KEY `idx_category_context` (`category_id`,`context`,`context_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Ratings score for individual members';
