<?php defined('_JEXEC') or die('Restricted access'); ?>
<script language="javascript" type="text/javascript">
function submitbutton(pressbutton) {
    var form = document.adminForm;
    if (pressbutton == 'cancel') {
        submitform( pressbutton );
        return;
    }

    // do field validation
    if (form.name.value.length == 0) {
        alert( "<?php echo JText::_( 'THE FORUM MUST HAVE A NAME', true ); ?>" );
    } else {
        submitform( pressbutton );
    }
}
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<fieldset class="adminform">
    <legend><?php echo JText::_( 'DETAILS' ); ?></legend>
    <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="name">
                    <?php echo JText::_( 'NAME' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="name" id="name" size="32" maxlength="100" value="<?php echo isset($this->item->name)?$this->item->name:'';?>" />
            </td>
        </tr>
        <tr>
            <td width="100" align="right" class="key" valign="top">
                <label for="description">
                    <?php echo JText::_( 'DESCRIPTION' ); ?>:
                </label>
            </td>
            <td>
                <textarea id="description" class="text_area" name="description" rows="10" cols="50"><?php echo isset($this->item->description)?$this->item->description:''; ?></textarea>
            </td>
        </tr>
    </table>
</fieldset>

<input type="hidden" name="option" value="com_simplestforum" />
<input type="hidden" name="id" value="<?php echo isset($this->item->id)?$this->item->id:''; ?>" />
<input type="hidden" name="task" value="" />
</form>
