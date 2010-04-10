# <?php /** $Id: upgradesql.1_0_5.mysql.utf8.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die() ?>;

UPDATE `#__components`
 SET `name`='Comments',
  admin_menu_img='components/com_comments/media/images/icon-16-jx.png'
 WHERE `option`='com_comments';
