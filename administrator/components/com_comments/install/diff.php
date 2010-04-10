# <?php /* $Id: diff.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die(); ?>

-- September 14 2007 --

ALTER TABLE `#__jxcomments_ratings_members`
 CHANGE COLUMN `score` `rating` double NOT NULL default '0' COMMENT 'Actual member rating',
 ADD COLUMN `category` INT(11) NOT NULL default '1' COMMENT 'Rating Category' AFTER `rating`,
 ADD COLUMN `ts` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'Modification Timestamp' AFTER `category`;
