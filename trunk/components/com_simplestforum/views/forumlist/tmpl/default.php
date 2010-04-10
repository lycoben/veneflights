<?php defined( '_JEXEC' ) or die( 'Restricted Access' ); ?>
<div class="contentpane sforums<?php echo $this->params->get('pageclass_sfx'); ?>">
<?php if ($this->params->get('show_page_title')) { ?>
<div class="componentheading"><?php echo $this->params->get('page_title'); ?></div>
<?php } ?>
<p>
    <?php echo $this->params->get('intro'); ?>
</p>
<?php if (!count($this->items)) { ?>
<p>
    <?php echo JText::_('THERE ARE NO FORUMS YET.'); ?>
</p>
<?php } ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th style="width:25%;text-align:left;"><?php echo JText::_('FORUM'); ?></th>
        <th style="text-align:left;"><?php echo JText::_('DESCRIPTION'); ?></th>
        <th style="width:10%;text-align:left;"><?php echo JText::_('POSTS'); ?></th>
        <th style="width:15%;text-align:left;"><?php echo JText::_('LAST ACTIVITY'); ?></th>
    </tr>
<?php foreach ($this->items as $item) { ?>
    <tr>
        <td><a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view='.($this->params->get('linktopics')?'topiclist':'postlist').'&forumId='.(int)$item->id); ?>"><?php echo $item->name; ?></a></td>
        <td><?php echo $item->description; ?></td>
        <td style="text-align:center;"><?php echo $item->posts; ?></td>
        <td valign="top" style="text-align:right;"><?php echo ForumHelper::getDate($item->lastActivity); ?></td>
    </tr>
<?php } ?>
</table>
</div>
