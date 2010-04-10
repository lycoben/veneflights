<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
global $mainframe;
// JURI::base() returns admin path so go up one level
$live_site = JURI::base()."..";
$base = '<base href="'.$live_site.'/index.html" />';
$mainframe->addCustomHeadTag( $base );
?>
	<script>

		var form = window.parent.document.adminForm	;
		var title = form.refField_title.value;
		var title_orig = form.origText_title.value;

		var alltext = form.refField_introtext.value;
		var alltext_orig = window.parent.document.getElementById("original_value_introtext").innerHTML;
		if (form.refField_fulltext) {
			alltext += form.refField_fulltext.value;
			alltext_orig += window.parent.document.getElementById("original_value_fulltext").innerHTML;
		}

	</script>
<br style="clear:both"/>
<table align="center" width="100%" cellspacing="2" cellpadding="2" border="0">
	<tr>
		<th ><h2><?php echo JText::_("Original");?></h2></th>
		<th ><h2><?php echo JText::_("Translation");?></h2></th>
	</tr>
	<tr>
		<td class="contentheading" style="width:50%!important"><script>document.write(title_orig);</script></td>
		<td class="contentheading" ><script>document.write(title);</script></td>
	</tr>
	<tr>
		<script>document.write("<td valign=\"top\" >" + alltext_orig + "</td>");</script>
		<script>document.write("<td valign=\"top\" >" + alltext + "</td>");</script>
	</tr>
	<tr>
		<td align="center" colspan="2"><a href="javascript:;" onClick="window.print(); return false"><?php echo JText::_("Print");?></a></td>
	</tr>
</table>