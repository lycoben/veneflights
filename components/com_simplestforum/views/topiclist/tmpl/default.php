<?php defined( '_JEXEC' ) or die( 'Restricted Access' ); ?>
<div class="contentpane stopics<?php echo $this->params->get('pageclass_sfx'); ?>">
<?php if ($this->params->get('show_page_title')) { ?>
<div class="componentheading"><?php echo $this->params->get('page_title'); ?></div>
<?php } ?>
<p>
    <?php echo $this->forum->description; ?>
</p>
<a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=forumlist'); ?>"><span style="font-size:0.8em;">&lt;&lt;</span> <?php echo JText::_('BACK TO FORUM LIST'); ?></a>
<?php if (!count($this->items)) { ?>
<p>
    <?php echo JText::_('THERE ARE NO TOPICS IN THIS FORUM YET'); ?>
</p>
<?php } ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <th style="text-align:left;"><?php echo JText::_('TOPIC'); ?></th>
        <th style="text-align:center;width:10%;"><?php echo JText::_('REPLIES'); ?></th>
        <th style="width:15%;text-align:center;"><?php echo JText::_('LAST ACTIVITY'); ?></th>
    </tr>
    <tr>
        <td colspan="3" style="text-align:center;">
            <a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&forumId='.$this->forum->id); ?>"><span style="font-size:0.8em;">&lt;&lt;</span> <?php echo JText::_('VIEW ALL POSTS'); ?> <span style="font-size:0.8em;">&gt;&gt;</span></a>
        </td>
    </tr>
<?php foreach ($this->items as $item) { ?>
    <tr>
        <td valign="top"><a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&forumId='.(int)$this->forum->id.'&parentId='.$item->id.'&topic=true'); ?>"><?php echo $item->subject; ?></a></td>
        <td valign="top" style="text-align:center;"><?php echo $item->replies; ?></td>
        <td valign="top" style="text-align:right;"><?php echo ForumHelper::getDate($item->lastActivity); ?></td>
    </tr>
<?php } ?>
</table>
<?php if ($this->postAllowed) { ?>
<?php include(JPATH_COMPONENT.DS.'views'.DS.'postlist'.DS.'tmpl'.DS.'default_form.php'); ?>
<?php } ?>
</div>
