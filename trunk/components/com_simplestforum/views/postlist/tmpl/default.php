<?php defined( '_JEXEC' ) or die( 'Restricted Access' ); ?>
<div class="contentpane sposts<?php echo $this->params->get('post_pageclass_sfx'); ?>">
<?php if ($this->params->get('show_page_title')) { ?>
<div class="componentheading"><?php echo ($title = $this->params->get('page_title'))?$title.': '.$this->forum->name:$this->forum->name; ?></div>
<?php } ?>
<p>
    <?php echo $this->forum->description; ?>
</p>
<a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=forumlist'); ?>"><?php echo JText::_('BACK TO FORUM LIST'); ?></a>
<span style="font-size:0.8em;">&gt;&gt;</span>
<a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=topiclist&forumId='.$this->forum->id); ?>"><?php echo JText::_('BACK TO TOPIC LIST'); ?></a>
<?php if (isset($this->parent) || $this->topic) { ?>
<span style="font-size:0.8em;">&gt;&gt;</span>
<a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&forumId='.$this->forum->id); ?>"><?php echo JText::_('VIEW ALL POSTS'); ?></a>
<?php } ?>
<?php if (!count($this->items)) { ?>
<p>
    <?php echo JText::_('THERE ARE NO POSTS YET FOR THIS FORUM. PLEASE START US OFF!'); ?>
</p>
<?php } ?>
<?php foreach ($this->items as $item) { ?>
    <ul class="post<?php if ($item->parentId) {echo ' child c'.$item->depth;} if (isset($this->parent) && $this->parent->id == $item->id) {echo ' parent';} ?>">
        <li class="subject">
            <?php echo $item->subject; ?>
        </li>
        <li class="postby">
            <?php echo JText::_('POSTED'); ?>: <?php echo ForumHelper::getDate($item->date); ?> <?php echo JText::_('BY'); ?> <?php echo $item->name; ?>
        </li>
        <li class="message">
            <?php echo str_replace("\n", '<br />', $item->message); ?>
        </li>
        <li class="buttons">
            <?php if ($this->postAllowed) { ?>
            <a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&forumId='.$this->forum->id.'&parentId='.$item->id.'&topic='.$this->topic); ?>"><?php echo JText::_('RESPOND TO THIS MESSAGE'); ?></a>
            <?php } ?>
            <?php if ($this->moderateAllowed) { ?>
            | <a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&task=delete&id='.$item->id.'&forumId='.$this->forum->id.'&topic='.$this->topic); ?>"><?php echo JText::_('DELETE THIS MESSAGE'); ?></a>
            <?php } ?>
        </li>
    </ul>
<?php } ?>
<?php if ($this->postAllowed) { ?>
<?php echo $this->loadTemplate('form'); ?>
<?php } ?>
</div>
