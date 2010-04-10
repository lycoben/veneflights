<?php /** $Id: default.php 294 2008-07-09 08:17:55Z louis $ */ defined( '_JEXEC' ) or die();
JHTML::stylesheet( 'comments.css', 'components/com_comments/media/css/' );
JHTML::script('ratings.js', 'components/com_comments/media/js/'); ?>

<div class="rating-container">
	<form id="rate-<?php echo $this->state->get( 'context_id' ); ?>" class="addrating" method="post" action="<?php echo JRoute::_( 'index.php?option=com_comments&task=rating.add&protocol=json' );?>">
		<ul class="rating-stars">
			<li id="current-<?php echo $this->state->get( 'context_id' ); ?>" class="current-rating" style="width:<?php echo (int) ($this->rating->pscore*100); ?>%;"></li>
			<li><a title="1" rel="0.2" class="one-star">1</a></li>
			<li><a title="2" rel="0.4" class="two-stars">2</a></li>
			<li><a title="3" rel="0.6" class="three-stars">3</a></li>
			<li><a title="4" rel="0.8" class="four-stars">4</a></li>
			<li><a title="5" rel="1.0" class="five-stars">5</a></li>
		</ul>

		<input type="hidden" name="context" value="<?php echo $this->state->get( 'context' ); ?>" />
		<input type="hidden" name="context_id" value="<?php echo $this->state->get( 'context_id' ); ?>" />
		<input type="hidden" name="score" value="" />
		<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
	</form>

	<div id="rating-count-<?php echo $this->state->get( 'context_id' ); ?>" class="rating-count">
		<small><?php echo '<span class="count">'.(int) $this->rating->pscore_count.'</span> '.($this->rating->pscore_count == 1 ? JText::_('COMMENTS_VOTE') : JText::_('COMMENTS_VOTES'));?></small>
	</div>
</div>
