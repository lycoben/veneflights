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
JRequest::setVar( 'hidemainmenu', 1 );
?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
	//toolbar
	$bar =& JToolBar::getInstance('toolbar');
	JToolBarHelper::title(  JText::_( 'Translate a content' ), 'e_translate' );
	// Add a search button
	$dhtml = "<a class=\"toolbar\" onclick=\"javascript:hideMainMenu(); submitbutton('save_continue')\" href=\"#\">
					<span title=\"Translate and Continue\" class=\"icon-32-translate\"><!--span--></span>
					Save and Continue
				</a>";
	$bar->appendButton( 'Custom', $dhtml, 'save_continue' );
	
	$dhtml = "<a class=\"toolbar\" onclick=\"javascript:hideMainMenu(); submitbutton('save')\" href=\"#\">
					<span title=\"Translate\" class=\"icon-32-translate\"><!--span--></span>
					Save
				</a>";
	$bar->appendButton( 'Custom', $dhtml, 'save' );
	
	$dhtml = "<a class=\"toolbar\" onclick=\"javascript:hideMainMenu(); submitbutton('cancel')\" href=\"#\">
					<span title=\"Cancel\" class=\"icon-32-c_translate\"><!--span--></span>
					Exit
				</a>";
		$bar->appendButton( 'Custom', $dhtml, 'cancel' );	
?>

<?php
	$editor =& JFactory::getEditor();
?>
<form action="index.php" method="post" name="adminForm">
	<table class="adminlist">
	<!--BEGIN LANGUAGE & PUBLISING SELECTION-->
	<tr>
		<th bgcolor="#F0F0F0" align="left" width="140px">Label</th>
		<th bgcolor="#F0F0F0">Publishing</th>
	</tr>
	<tr>
		<td>Save To Language:</td>
		<td>
			<?php echo $this->languages; ?>&nbsp;&nbsp;
			<input type="button" name="translate" value="translate" onclick="javascript:hideMainMenu(); submitbutton('translate');" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo 'From language' ;?> 
			<select name="from_lang" id="from_lang"><option value="">--Default Language--</option></select>
		</td>
	</tr>
	<tr>
		<td>Published</td>
		<td>
			<input type="checkbox" value="1" name="published" <?php if($this->published==1) {echo "checked='checked'";}?>/>
		</td>
	</tr> 
	
	<!--BEGIN TITLE-->
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<th bgcolor="#F0F0F0" align="left">Label:</th>
		<th bgcolor="#F0F0F0" align="left">Title</th>
	</tr>
	<tr>
		<td>Original:</td>
		<td><?php echo $this->org_title; ?></td>
		<input type="hidden" name="org_title" value="<?php echo $this->org_title; ?>" />
	</tr>
	<tr>
		<td valign="top">Translate:</td>
		<td>
			<input type="text" value="<?php echo $this->tsl_title; ?>" name="tsl_title" size="50" />
		</td>
	</tr>
	
	<!--BEGIN INTROTEXT-->
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<th bgcolor="#F0F0F0" align="left">Label:</th>
		<th bgcolor="#F0F0F0" align="left">Introtext</th>
	</tr>
	<tr>
		<td valign="top">Original:</td>
		<td><?php echo $this->org_introtext; ?></td>
	</tr>
	<tr>
		<td valign="top">Translate:</td>
		<td>
			<?php 
			// parameters : areaname, content, width, height, cols, rows
			echo $editor->display( 'tsl_introtext',  $this->tsl_introtext , '100%', '400', '75', '20' ) ;
			?>
		</td>
	</tr>
	
	<!--BEGIN FULLTEXT-->
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<th bgcolor="#F0F0F0" align="left">Label:</th>
		<th bgcolor="#F0F0F0" align="left">Fulltext</th>
	</tr>
	<tr>
		<td valign="top">Original:</td>
		<td><?php echo $this->org_fulltext; ?></td>
	</tr>
	<tr>
		<td valign="top">Translate:</td>
		<td>
			<?php 
			// parameters : areaname, content, width, height, cols, rows
			echo $editor->display( 'tsl_fulltext',  $this->tsl_fulltext , '100%', '400', '75', '20' ) ;
			?>
		</td>
	</tr>
	
	<!--BEGIN METAKEY & METADESC-->
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<th bgcolor="#F0F0F0" align="left">Label:</th>
		<th bgcolor="#F0F0F0" align="left">Metakey</th>
	</tr>
	<tr>
		<td valign="top">Original:</td>
		<td><?php echo $this->org_metakey; ?></td>
	</tr>
	<tr>
		<td valign="top">Translate:</td>
		<td>
			<input type="text" name="tsl_metakey"value="<?php echo $this->tsl_metakey; ?>" size="60" />
		</td>
	</tr>
	<tr>
		<th bgcolor="#F0F0F0" align="left">Label:</th>
		<th bgcolor="#F0F0F0" align="left">Metadesc</th>
	</tr>
	<tr>
		<td valign="top">Original:</td>
		<td><?php echo $this->org_metadesc; ?></td>
	</tr>
	<tr>
		<td valign="top">Translate:</td>
		<td>
			<textarea name="tsl_metadesc" cols="50" rows="8"><?php echo $this->tsl_metadesc; ?></textarea>
		</td>
	</tr>
	
	
	</table>
	<input type="hidden" name="reference_id" value="<?php echo $this->reference_id; ?>" />
	<input type="hidden" name="language_id" value="<?php echo $this->language_id; ?>" />
	<input type="hidden" name="option" value="<?php echo $this->option; ?>" />
	<input type="hidden" name="controller" value="<?php echo $this->controller; ?>" />
	<input type="hidden" name="task" value="">
</form>