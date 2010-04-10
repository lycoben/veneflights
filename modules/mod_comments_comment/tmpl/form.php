<?php /** $Id: form.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die();
$userId	= $this->user->get( 'id' );
?>

	<form id="respond-form" method="post" action="<?php echo JRoute::_('index.php?option=com_comments&task=comment.add&protocol=json&tmpl=component&format=raw'); ?>" class="form-validate">
		<fieldset>
		<dl>
<?php if ($userId == 0) : ?>
			<dt><label for="comment_name"><?php echo JText::_('COMMENTS_NAME');?></label></dt>
			<dd><input id="comment_name" name="name" class="inputbox required" /></dd>
<?php endif; ?>

<?php if ($this->_config->get('enable_subject')) : ?>
			<dt><label for="comment_subject"><?php echo JText::_('COMMENTS_SUBJECT');?></label></dt>
			<dd><input id="comment_subject" name="subject" class="inputbox" value="RE: <?php echo $document->getTitle(); ?>" /></dd>
<?php endif; ?>

<?php if ($userId == 0) : ?>
			<dt><label for="comment_email"><?php echo JText::_('COMMENTS_EMAIL');?></label></dt>
			<dd><input id="comment_email" name="email" class="inputbox required validate-email" /></dd>
<?php endif; ?>

			<dt><label for="comment_url"><?php echo JText::_('COMMENTS_WEBSITE');?></label></dt>
			<dd><input id="comment_url" name="url" class="inputbox" /></dd>

			<dt><label for="comment_body"><?php echo JText::_('COMMENTS_COMMENT');?></label></dt>
			<dd>
<?php if ($this->_config->get('enable_bbcode')) : ?>
				<div class="bbcode-editor">
					<ul class="toolbar"></ul>
					<span class="help"></span>
					<br class="clear" />
					<textarea id="comment_body" name="body" class="editor inputbox required" rows="8" cols="60" style="font-size:12px;"></textarea>
				</div>
<?php else : ?>
				<textarea id="comment_body" name="body" class="inputbox required" rows="8" cols="60" style="font-size:12px;"></textarea>
<?php endif; ?>
			</dd>
		</dl>

<?php if ($this->captcha) : ?>
		<div class="captcha">
			<img class="captcha-image" src="<?php echo JRoute::_('index.php?option=com_comments&task=getCaptcha&x='.$this->captcha['id']); ?>" alt="" />

			<input id="comment_captcha" name="<?php echo $this->captcha['id']; ?>" class="inputbox required" />
			<label for="comment_captcha"><?php echo JText::_('COMMENTS_CAPTCHA');?></label>

			<br />
			<a href="#" class="captcha-image-refresh"><?php echo JText::_('COMMENTS_CAPTCHA_REFRESH'); ?></a>
		</div>
<?php endif;
if ($this->recaptcha) : ?>
		<div class="captcha">
			<div id="recaptchaContainer">&nbsp;</div>
		</div>
<?php endif; ?>

		<input type="submit" name="button" value="<?php echo JText::_('COMMENTS_SUBMIT');?>" id="submitter" />

		<input type="hidden" name="context" value="<?php echo $this->state->get('list.context'); ?>" />
		<input type="hidden" name="context_id" value="<?php echo $this->state->get('list.context_id'); ?>" />
		<?php echo JHTML::_('form.token'); ?>
		</fieldset>
	</form>
