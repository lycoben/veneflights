-- <?php /* $Id: upgradesql.1_0_2.mysql.utf8.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die() ?>;

ALTER TABLE `#__jxcomments_comments`
 ADD COLUMN `referer` VARCHAR(255) NOT NULL default '' COMMENT 'The referring URL' AFTER `context_id`;

ALTER TABLE `#__jxcomments_comments`
 ADD COLUMN `page` VARCHAR(255) NOT NULL COMMENT 'Custom page field' AFTER `referer`;