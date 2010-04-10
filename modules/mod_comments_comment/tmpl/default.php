<?php /** $Id:default.php 1691 2007-09-15 00:59:20Z masterchief $ */ defined( '_JEXEC' ) or die();

JHTML::stylesheet( 'comments.css', 'components/com_comments/media/css/' );
JHTML::script('highlighter.js', 'media/jxtended/js/');
JHTML::stylesheet('highlighter.css', 'media/jxtended/css/');
?>

<?php
	if (1) : ?>
	<div id="comments">
		<h3 id="comments-num"><?php echo JText::sprintf('COMMENTS_NUM', (int)$this->total);?></h3>
		<ol id="commentlist">
			<?php
			if (!empty($this->items)) :
				$k = 1;
				foreach ($this->items as $item) :
					$this->item	= &$item;
			?>
			<li class="comment <?php echo $k ? 'odd' : 'even';?>" id="comment-<?php echo $this->item->id;?>">
				<?php
					$this->assignRef( 'item', $item );
					echo $this->loadTemplate( 'comment' );
				?>
			</li>
			<?php
				$k = 1 - $k;
				endforeach;
			endif;
			?>
		</ol>
	</div>
<?php
	if ($this->state->config->get('pagination')) {
		echo $this->pagination->getPagesLinks();
	}
?>
<?php
	endif;
	if ($this->params->get( 'showForm' )) :
		if ($this->blocked) :
			echo JText::_('COMMENTS_BLOCKED');
		else :
			echo $this->loadTemplate( 'form' );
		endif;
	endif;
?>