<?php /** $Id: default.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die(); ?>

<?php if ($this->items) : ?>
	<dl>
	<?php foreach ($this->items as $v => $item) : ?>
		<dt>
			<?php echo $v; ?>
		</dt>
		<dd>
			<a href="index.php?option=com_comments&amp;task=upgrade.process&amp;version=<?php echo $v;?>&amp;<?php echo JUtility::getToken();?>=1">
				<?php echo JText::_('JX_PROCESS_UPGRADE'); ?></a>
		</dd>
	<?php endforeach; ?>
	</dl>
<?php else : ?>
	<?php echo JText::_('JX_DATABASE_UP_TO_DATE'); ?>
<?php endif; ?>
