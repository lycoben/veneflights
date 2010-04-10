<?php /** $Id:default_comment.php 1308 2007-08-23 12:00:55Z masterchief $ */ defined( '_JEXEC' ) or die(); ?>
	<div class="metadata">
		<p class="author">
<?php if ($this->_config->get('enable_gravatar', 0)) : ?>
			<img class="avatar" src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($this->item->email)); ?>.jpg?s=30&amp;d=http%3A%2F%2Fwww.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D30" align="left" alt="avatar" />
<?php
	endif;
	if ($this->item->url) :
?>
			<a href="<?php echo $this->item->url;?>" target="_blank"><?php echo $this->item->name;?></a>
<?php else : ?>
			<?php echo $this->item->name; ?>
<?php endif;?>
		<?php echo JText::sprintf('COMMENTS_MAKES_THIS_COMMENT', JRoute::_('#comment-'.$this->item->id)); ?>
		</p>
		<p class="date"><?php $date = new JDate( $this->item->created_date ); echo $date->toFormat( $this->dFormat ); ?></p>
	</div>
	<div class="comment">
		<?php echo $this->preProcess($this->item->body); ?>
	</div>
