<?php /** $Id: default.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die();
	JHTML::stylesheet( 'comments.css', 'components/com_comments/media/css/' );
	$style		= $this->params->get( 'style' );
	$heading	= $this->params->get( 'heading' );
?>
<div class="sharing">
<?php if ($heading > 0) : ?>
	<div class="sharethis">
<?php if ($heading == 1 or $heading == 2) : ?>
		<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/share-icon-16x16.gif" alt="<?php echo JText::_('COMMENTS_SHARE_THIS');?>" />
<?php endif; ?>
		<?php if ($heading == 2 or $heading == 3) : ?>
		<span><?php echo JText::_('COMMENTS_SHARE_THIS');?></span>
<?php endif; ?>
	</div>
<?php endif; ?>

	<ul class="sharelist">
<?php if ($this->config->get('sharing_delicious')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('delicious'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('DELICIOUS'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/delicious.gif" alt="<?php echo JText::_('DELICIOUS');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('DELICIOUS'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_furl')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('furl'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('FURL'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/furl.gif" alt="<?php echo JText::_('FURL');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('FURL'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_yahoo')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('yahoo_myweb'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('YAHOO_MYWEB'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/yahoo_myweb.gif" alt="<?php echo JText::_('YAHOO_MYWEB');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('YAHOO_MYWEB'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_google')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('google_bmarks'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('GOOGLE_BMARKS'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/google_bmarks.gif" alt="<?php echo JText::_('GOOGLE_BMARKS');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('GOOGLE_BMARKS'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_blinklist')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('blinklist'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('BLINKLIST'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/blinklist.gif" alt="<?php echo JText::_('BLINKLIST');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('BLINKLIST'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_magnolia')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('magnolia'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('MAGNOLIA'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/magnolia.gif" alt="<?php echo JText::_('MAGNOLIA');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('MAGNOLIA'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_facebook')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('facebook'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('FACEBOOK'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/facebook.gif" alt="<?php echo JText::_('FACEBOOK');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('FACEBOOK'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_digg')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('digg'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('DIGG'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/digg.gif" alt="<?php echo JText::_('DIGG');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('digg'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_stumbleupon')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('stumbleupon'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('STUMBLEUPON'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/stumbleupon.gif" alt="<?php echo JText::_('STUMBLEUPON');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('STUMBLEUPON'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_technorati')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('technorati'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('TECHNORATI'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/technorati.gif" alt="<?php echo JText::_('TECHNORATI');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('TECHNORATI'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_newsvine')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('newsvine'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('NEWSVINE'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/newsvine.gif" alt="<?php echo JText::_('NEWSVINE');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('NEWSVINE'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_reddit')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('reddit'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('REDDIT'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/reddit.gif" alt="<?php echo JText::_('REDDIT');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('REDDIT'); ?></span>
<?php endif; ?></a>
		</li>
<?php
	endif;
	if ($this->config->get('sharing_tailrank')) : ?>
		<li>
			<a href="<?php echo $this->getBookmark('tailrank'); ?>" target="_blank" title="<?php echo JText::sprintf('COMMENTS_SHARE_THIS_WITH', JText::_('TAILRANK'));?>">
<?php if ($style == 0 or $style == 1) : ?>
				<img src="<?php echo $this->baseurl; ?>/modules/mod_comments_share/images/tailrank.gif" alt="<?php echo JText::_('TAILRANK');?>" />
<?php endif; ?>
<?php if ($style == 2 or $style == 1) : ?>
				<span><?php echo JText::_('TAILRANK'); ?></span>
<?php endif; ?></a>
		</li>
<?php endif; ?>
	</ul>
    <div class="email">
	    <?php echo JHTML::_('share.email', JText::_('COMMENTS_EMAIL_FRIEND'), $this->url); ?>
    </div>
</div>
