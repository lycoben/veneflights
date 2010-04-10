<?php 
/**
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

defined('_JEXEC') or die('Restricted access'); 
?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
	//toolbar
	JToolBarHelper::title( JText::_( 'Control Panel' ) );
?>

<form action="index.php?option=<?php echo $this->option; ?>" method="post" id="adminForm" name="adminForm">
	
	
	
	
	<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>