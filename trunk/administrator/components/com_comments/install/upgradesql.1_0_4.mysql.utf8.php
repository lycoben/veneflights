-- <?php /* $Id: upgradesql.1_0_4.mysql.utf8.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die() ?>;

ALTER TABLE `#__jxcomments_ratings_members`
 ADD COLUMN `address` VARCHAR(50) NOT NULL COMMENT 'IP address of the rater' AFTER `updated_date`;

ALTER TABLE `#__jxcomments_ratings_members`
 ADD INDEX idx_address_context(`address`, `context`);

ALTER TABLE `#__jxcomments_ratings_members`
 ADD INDEX idx_category_context(`category_id`, `context`, `context_id`);
