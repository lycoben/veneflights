<?php /** $Id:default.php 1691 2007-09-15 00:59:20Z masterchief $ */ defined( '_JEXEC' ) or die(); ?>
<?php JHTML::stylesheet( 'comments.css', 'components/com_comments/media/css/' ); ?>

<h4 class="comments"><a href="<?php echo $this->params->get('link'); ?>" title="<?php echo JText::_('COMMENTS_VIEW_FULL_PAGE'); ?>"><?php echo JText::sprintf('COMMENTS_NUM', (int)$this->numItems);?></a></h4>
