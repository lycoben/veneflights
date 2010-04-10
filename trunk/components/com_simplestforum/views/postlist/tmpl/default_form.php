<?php defined( '_JEXEC' ) or die( 'Restricted Access' ); ?>
<form id="postForm" name="postForm" method="post" action="<?php echo JRoute::_('index.php?option=com_simplestforum&view=postlist'); ?>" />
    <fieldset>
        <legend><?php echo isset($this->parent)?JText::_('POST A RESPONSE'):JText::_('POST A NEW MESSAGE'); ?></legend>
        <dl>
            <?php if ($this->user->get('guest')) { ?>
            <dt>
                <label for="name"><?php echo JText::_('NAME'); ?></label>
            </dt>
            <dd>
                <input type="text" id="name" name="name" size="25" maxlength="25" value="<?php echo isset($this->user)?$this->user->name:(isset($this->name)?$this->name:''); ?>" />
            </dd>
            <?php } ?>
            <dt>
                <label for="subject"><?php echo JText::_('SUBJECT'); ?></label>
            </dt>
            <dd>
                <input type="text" id="subject" name="subject" size="50" maxlength="100" value="<?php echo isset($this->subject)?$this->subject:(isset($this->parent)?(JText::_('RE').': '.$this->parent->subject):''); ?>" />
            </dd>
            <dt>
                <label for="message"><?php echo JText::_('MESSAGE'); ?></label>
            </dt>
            <dd>
                <textarea class="text_area" id="message" name="message" rows="10" cols="50"><?php echo isset($this->message)?$this->message:''; ?></textarea>
            </dd>
        </dl>
        <input type="hidden" name="task" value="addPost" />
        <input type="hidden" name="parentId" value="<?php echo isset($this->parent)?$this->parent->id:''; ?>" />
        <input type="hidden" name="forumId" value="<?php echo $this->forum->id; ?>" />
        <input type="hidden" name="topic" value="<?php echo $this->topic?'1':'0'; ?>" />
        <input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
        <?php if ($this->params->get('use_captcha')) { ?>
        <?php $this->mainframe->triggerEvent('onRenderForm', array(JRoute::_('index.php?option=com_simplestforum&view=captcha'))); ?>
        <?php } ?>
        <div style="text-align:right;">
            <input type="submit" class="button" value="<?php echo JText::_('SUBMIT'); ?>" />
        </div>
    </fieldset>
</form>
