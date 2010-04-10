<?php /** $Id: default.php 294 2008-07-09 08:17:55Z louis $ */ defined('_JEXEC') or die('Restricted access');
JHTML::script( 'checkall.js', 'administrator/components/com_comments/media/js/' ); ?>

<form action="index.php?option=com_comments&amp;view=comments" method="post" name="adminForm">
<fieldset class="filter">
	<ol>
		<li>
			<label for="search"><?php echo JText::_('COMMENTS_SEARCH'); ?>:</label>
			<input type="text" name="search" id="search" value="<?php echo $this->state->get('list.search'); ?>" size="60" title="<?php echo JText::_('COMMENTS_SEARCH_IN_AUTHOR'); ?>" />
		</li>
		<li>
			<button type="submit"><?php echo JText::_('COMMENTS_GO'); ?></button>
			<button type="button" onclick="getElementById('search').value='';this.form.submit();"><?php echo JText::_('COMMENTS_CLEAR'); ?></button>
		</li>
	</ol>
	<div class="clr"></div>
	<ol>
		<li>
			<label for="published"><?php echo JText::_('COMMENTS_STATE'); ?></label>
			<select name="published" id="published" class="inputbox" onchange="this.form.submit()">
				<?php echo JHTML::_( 'select.options', $this->published, 'value', 'text', $this->state->get('list.state')); ?>
			</select>
		</li>
	</ol>
</fieldset>

<table class="adminlist">
	<thead>
		<tr>
			<th width="3%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(this, 'cid' )" />
			</th>
			<th width="15%">
				<?php echo JHTML::_( 'grid.sort', 'COMMENTS_DATE', 'a.created_date', $this->state->get('list.direction'), $this->state->get('list.ordering') ); ?>
			</th>
			<th width="15%">
				<?php echo JHTML::_( 'grid.sort', 'COMMENTS_AUTHOR', 'a.name', $this->state->get('list.direction'), $this->state->get('list.ordering') ); ?>
			</th>
			<th align="center">
				<?php echo JText::_('COMMENTS_DETAILS'); ?>
			</th>
			<th nowrap="nowrap" width="12%">
				<?php echo JHTML::_( 'grid.sort', 'COMMENTS_STATE', 'a.published', $this->state->get('list.direction'), $this->state->get('list.ordering') ); ?>
			</th>
			<th width="5%" align="center">
				<?php echo JText::_('COMMENTS_CONTEXT'); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="15">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
<?php
		$k = 0;
		$i = 0;
		foreach ($this->items as $item) : ?>
		<tr class="row<?php echo $k; ?>">
			<td style="text-align:center">
				<?php echo JHTML::_( 'grid.id', $item->id, $item->id, false, 'c_id' ); ?>
			</td>
			<td align="center">
				<a href="<?php echo JRoute::_('index.php?option=com_comments&view=comment&c_id='.$item->id); ?>">
				<?php echo JText::_('COMMENTS_COMMENT'); ?> #: <?php echo $item->id; ?><br />
				<?php echo JHTML::date($item->created_date, JText::_('DATE_FORMAT_LC2')); ?>
				</a>
			</td>
			<td>
				<strong class="author-name"><?php echo JText::_('COMMENTS_AUTHOR'); ?>: <?php echo $item->name; ?></strong>
				<ul class="comment-author-data">
					<li class="email" title="<?php echo JText::_('COMMENTS_EMAIL'); ?>">
						<?php echo ($item->email) ? $item->email : '- N/A -'; ?></li>
					<li class="ip" title="<?php echo JText::_('COMMENTS_IP_ADDRESS'); ?>">
						<?php echo ($item->address) ? $item->address : JText::_('COMMENTS_NOT_AVAILABLE'); ?> <a href="index.php?option=com_comments&amp;task=config.block&amp;block=address&amp;cid[]=<?php echo $item->id;?>">[ <?php echo JText::_('COMMENTS_BLOCK');?> ]</a></li>
					<li class="url" title="<?php echo JText::_('COMMENTS_WEBSITE_URL'); ?>">
						<?php echo ($item->url) ? $item->url : JText::_('COMMENTS_NOT_AVAILABLE'); ?></li>
				</ul>
			</td>
			<td valign="top">
				<div class="comment-referrer">
					<span><?php echo JText::_('COMMENTS_REFERER'); ?>:</span>
					<a href="<?php echo $item->referer; ?>" target="_blank"><?php echo $item->referer; ?></a></div>
				<ul class="comment-data">
					<li class="subject">
						<span><?php echo JText::_('COMMENTS_SUBJECT'); ?>:</span>
						<?php echo $item->subject; ?></li>
					<li class="body">
						<?php echo substr($item->body, 0, 200); ?></li>
				</ul>
			</td>
			<td>
				<ul class="published_selector">
					<li class="publish"><input type="radio" id="moderate_publish_<?php echo $item->id; ?>" name="moderate[<?php echo $item->id; ?>]" value="1"<?php echo ($item->published == 1) ? 'checked="checked"' : null; ?> />
						<label for="moderate_publish_<?php echo $item->id; ?>"><?php echo JText::_('COMMENTS_PUBLISH'); ?></label></li>

<?php if ($item->published == 0) : ?>
					<li class="defer"><input type="radio" id="moderate_defer_<?php echo $item->id; ?>" name="moderate[<?php echo $item->id; ?>]" value="0" <?php echo ($item->published == 0) ? 'checked="checked"' : null; ?> />
						<label for="moderate_defer_<?php echo $item->id; ?>"><?php echo JText::_('COMMENTS_DEFER'); ?></label></li>
<?php endif; ?>

					<li class="spam"><input type="radio" id="moderate_spam_<?php echo $item->id; ?>" name="moderate[<?php echo $item->id; ?>]" value="2"<?php echo ($item->published == 2) ? 'checked="checked"' : null; ?> />
						<label for="moderate_spam_<?php echo $item->id; ?>"><?php echo JText::_('COMMENTS_SPAM'); ?></label></li>
				</ul>
			</td>
			<td align="center">
				<?php echo $item->context; ?><br/>
				<?php echo $item->context_id; ?></td>
		</tr>
<?php
		$k = 1 - $k;
		$i++;
		endforeach; ?>
	</tbody>
</table>
	<input type="hidden" name="task" value="" />

	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $this->state->get('list.ordering'); ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->get('list.direction'); ?>" />
	<?php echo JHTML::_('form.token'); ?>
</form>
