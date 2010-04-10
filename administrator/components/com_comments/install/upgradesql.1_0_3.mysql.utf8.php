-- <?php /* $Id: upgradesql.1_0_3.mysql.utf8.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die() ?>;

ALTER TABLE `#__jxcomments_ratings`
 ADD COLUMN `referer` VARCHAR(255) NOT NULL default '' COMMENT 'The referring URL' AFTER `context_id`;

ALTER TABLE `#__jxcomments_ratings`
 ADD COLUMN `page` VARCHAR(255) NOT NULL COMMENT 'Custom page field' AFTER `referer`;

ALTER TABLE `#__jxcomments_ratings_members`
 CHANGE COLUMN `category` `category_id` INTEGER NOT NULL DEFAULT 0 COMMENT 'Rating Category';

ALTER TABLE `#__jxcomments_ratings_members`
 DROP INDEX `idx_user_context`;

ALTER TABLE `#__jxcomments_ratings_members`
 ADD UNIQUE INDEX idx_user_context USING BTREE(`context`, `context_id`, `user_id`, `category_id`);

ALTER TABLE `#__jxcomments_ratings_members`
 DROP INDEX `idx_user`;

ALTER TABLE `#__jxcomments_ratings_members`
 ADD INDEX idx_user USING BTREE(`user_id`, `context`, `context_id`, `category_id`);

ALTER TABLE `#__jxcomments_ratings_members`
 CHANGE COLUMN `rating` `score` DOUBLE NOT NULL DEFAULT 0 COMMENT 'Actual member rating';
