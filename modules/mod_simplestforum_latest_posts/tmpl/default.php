<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<dl>
    <?php foreach ($items as $item) { ?>
    <dt>
        <span class="subject"><?php echo $item->subject; ?></span>
        <?php if ($showDate) { ?>
        (<span class="date"><?php echo date($params->get('dateformat', 'Y-m-d H:i:s').' T ', strtotime($item->date)); ?></span>)
        <?php } ?>
    </dt>
    <dd>
        <?php echo substr($item->message, 0, $introChars); ?><?php echo strlen($item->message) > $introChars?'...':''; ?>
        <a href="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist&topic=true&forumId='.$item->forumId.'&parentId='.$item->id); ?>" class="readon"><?php echo $readmoreText; ?></a>
        <div class="clr"> </div>
    </dd>
    <?php } ?>
</dl>
