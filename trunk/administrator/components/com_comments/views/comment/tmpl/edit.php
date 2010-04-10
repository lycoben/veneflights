<?php /** $Id: edit.php 294 2008-07-09 08:17:55Z louis $ */ defined('_JEXEC') or die('Restricted access'); ?>

	<form id="comment_edit_form" method="post" action="<?php JRoute::_('index.php?option=com_comments'); ?>" name="adminForm">
		<fieldset>
			<ul class="published_selector">
				<li class="publish" style="float:left;"><input id="moderate_publish" type="radio" name="moderate[<?php echo $this->comment->id; ?>]" value="1"<?php echo ($this->comment->published == 1) ? 'checked="checked"' : null; ?> /><label for="moderate_publish"><?php echo JText::_('COMMENTS_PUBLISHED'); ?></label></li>
<?php if ($this->comment->published == 0) : ?>
				<li class="defer" style="float:left;"><input id="moderate_defer" type="radio" name="moderate[<?php echo $this->comment->id; ?>]" value="0" <?php echo ($this->comment->published == 0) ? 'checked="checked"' : null; ?> /><label for="moderate_defer"><?php echo JText::_('COMMENTS_DEFER'); ?></label></li>
<?php endif; ?>
				<li class="spam" style="float:left;"><input id="moderate_spam" type="radio" name="moderate[<?php echo $this->comment->id; ?>]" value="2"<?php echo ($this->comment->published == 2) ? 'checked="checked"' : null; ?> /><label for="moderate_spam"><?php echo JText::_('COMMENTS_SPAM'); ?></label></li>

			</ul>
			<input type="hidden" name="task" value="" />
		</fieldset>

	<fieldset>
		<legend><?php echo JText::_('COMMENTS_COMMENT'); ?>: <?php echo $this->comment->id; ?></legend>

		<div class="comment-referrer">
			<span><?php echo JText::_('COMMENTS_REFERER'); ?>:</span>
			<a href="<?php echo $this->comment->referer; ?>" target="_blank"><?php echo $this->comment->referer; ?></a></div>

		<dl class="comment">
			<dt><?php echo JText::_('COMMENTS_AUTHOR'); ?></dt>
			<dd>
				<div class="comment-author-name">
					<strong class="author-name"><?php echo $this->comment->name; ?></strong> <a href="index.php?option=com_comments&amp;task=block&amp;block=name&amp;cid[]=<?php echo $this->comment->name;?>&amp;view=moderate">[ <?php echo JText::_('COMMENTS_BLOCK');?> ]</a></div>
				<ul class="comment-author-data">
					<li class="email" title="<?php echo JText::_('COMMENTS_EMAIL'); ?>"><?php echo $this->comment->email; ?></li>

					<li class="ip" title="<?php echo JText::_('COMMENTS_IP_ADDRESS'); ?>"><a href="http://ip-lookup.net/index.php?ip=<?php echo $this->comment->address; ?>" target="_new"><?php echo $this->comment->address; ?></a>
						 <a href="index.php?option=com_comments&amp;task=config.block&amp;block=address&amp;cid[]=<?php echo $this->comment->id;?>">[ <?php echo JText::_('COMMENTS_BLOCK');?> ]</a></li>

					<li class="url" title="<?php echo JText::_('COMMENTS_WEBSITE_URL'); ?>"><?php echo ($this->comment->url) ? $this->comment->url : JText::_('COMMENTS_NOT_AVAILABLE'); ?></li>
				</ul>
			</dd>

			<dt class="date"><?php echo JText::_('COMMENTS_DATE'); ?></dt>
			<dd class="date"><?php echo JHTML::date($this->comment->created_date, JText::_('DATE_FORMAT_LC2')); ?></dd>

			<dt class="subject"><?php echo JText::_('COMMENTS_SUBJECT'); ?></dt>
			<dd class="subject-field"><input type="text" style="width:100%" name="jxform[subject]" value="<?php echo $this->comment->subject; ?>" /></dd>

			<dt class="body"><?php echo JText::_('COMMENTS_BODY'); ?></dt>
			<dd class="body-field"><textarea style="width:100%;height:200px;" name="jxform[body]"><?php echo $this->comment->body; ?></textarea></dd>
		</dl>
	</fieldset>
	<?php echo JHTML::_('form.token'); ?>
</form>
