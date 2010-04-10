-- <?php /* $Id: upgradesql.1_0_1.mysql.utf8.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die() ?>;

ALTER TABLE `#__jxcomments_ratings`
  ADD COLUMN `updated_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP;

ALTER TABLE `#__jxcomments_ratings`
  ADD INDEX idx_updated(`updated_date`, `pscore`);

ALTER TABLE `#__jxcomments_ratings`
  ADD INDEX idx_pscore(`pscore`);

ALTER TABLE `#__jxcomments_ratings_members`
 CHANGE COLUMN `score` `rating` double NOT NULL default '0' COMMENT 'Actual member rating';

ALTER TABLE `#__jxcomments_ratings_members`
 ADD COLUMN `category` INT(11) NOT NULL default '1' COMMENT 'Rating Category' AFTER `rating`;

ALTER TABLE `#__jxcomments_ratings_members`
 ADD COLUMN `updated_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT 'Modification Timestamp' AFTER `category`;
