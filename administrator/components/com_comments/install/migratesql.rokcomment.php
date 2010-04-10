# <?php defined('_JEXEC') or die('Restricted access'); ?>
# $Id: migratesql.rokcomment.php 294 2008-07-09 08:17:55Z louis $
#

# Rename tables

RENAME TABLE #__rokcomment					TO #__jxcomments;
RENAME TABLE #__rokcomment_comments			TO #__jxcomments_comments;
RENAME TABLE #__rokcomment_ratings			TO #__jxcomments_ratings;
RENAME TABLE #__rokcomment_ratings_members	TO #__jxcomments_ratings_members;

UPDATE #__jxcomments_comments
 SET `context` = 'zine'
 WHERE `context` = 'rokzine';

UPDATE #__jxcomments_comments
 SET `context` = 'catalog'
 WHERE `context` = 'things';

# Plugins



# Modules

UPDATE #__modules SET
  module = 'mod_comments_comment'
 WHERE module = 'mod_rokcomment_comment';

UPDATE #__modules SET
  module = 'mod_comments_share'
 WHERE module = 'mod_rokcomment_share';

UPDATE #__modules SET
  module = 'mod_comments_rating'
 WHERE module = 'mod_rokcomment_rating';

# Menu Items

UPDATE #__menu SET
  link = REPLACE( link, 'option=com_rokcomment', 'option=com_comments' );

# Component Table

UPDATE #__components SET
  name = 'jX Comments',
  link = 'option=com_comments',
  admin_menu_link = 'option=com_comments',
  admin_menu_alt = 'jX Comments',
  admin_menu_img = 'component',
  `option` = 'com_comments'
 WHERE `option` = 'com_rokcomment'
  AND parent = 0;
