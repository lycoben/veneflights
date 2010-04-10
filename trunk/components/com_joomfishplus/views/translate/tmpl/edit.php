<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// SECURITY CHECK TO STOP EDITING OF ALREADY PUBLISHED TRANSLATIONS BY UNAUTHORISED USERS
$user = JFactory::getUser();
if ($user->gid < $this->canFrontEndPublish && $this->actContentObject->published) {
	global $mainframe;
	$mainframe->redirect( JRoute::_('index.php?option=com_joomfishplus&task=translate.show'), JText::_('You are not authorised to edit published translations') );
	exit();
}


/**
	* @return void
	* @param object $this->actContentObject
	* @param array $this->langlist
	* @param string $this->catid
	* @desc Shows the dialog for the content translation
	*/
global $Itemid;
$select_language_id = $this->select_language_id;
$user =& JFactory::getUser();
$db =& JFactory::getDBO();
$elementTable = $this->actContentObject->getTable();

// Should use CSS for image waps - in the meantime to this.
global $mainframe;
$jsfile = '<script language="javascript" type="text/javascript" src="'.JURI::root().'/includes/js/mambojavascript.js" ></script>';
$mainframe->addCustomHeadTag( $jsfile );

jimport( 'joomla.html.editor' );
$wysiwygeditor =& JFactory::getEditor();

$editorFields=null;
foreach ($this->tranFilters as $filter) {
	echo "<input type='hidden' name='".$filter->filterType."_filter_value' value='".$filter->filter_value."'/>";
}

// check system and user editor and load appropriate copying script
$user =& JFactory::getUser();
$conf =& JFactory::getConfig();
$editor = $conf->getValue('config.editor');

// Place a reference to the element Table in the config so that it can be used in translation of urlparams !!!
$conf->setValue('joomfish.elementTable',$elementTable);

echo "\n<!-- editor is $editor //-->\n";
$editorFile = JOOMFISH_ADMINPATH."/editors/".strtolower($editor).".php";
if (file_exists($editorFile)){
	require_once($editorFile);
}
else {
	?>

	<script language="javascript" type="text/javascript">
	function copyToClipboard(value,action) {
		try {
			if (document.getElementById) {
				innerHTML="";
				if (action=="copy") {
					srcEl = document.getElementById("original_value_"+value);
					innerHTML = srcEl.innerHTML;
				}
				if (window.clipboardData){
					window.clipboardData.setData("Text",innerHTML);
					alert("<?php echo JText::_('CLIPBOARD_COPIED'); ?>");
				}
				else {
					srcEl = document.getElementById("text_origText_"+value);
					srcEl.value = innerHTML;
					srcEl.select();
					alert("<?php echo JText::_('CLIPBOARD_COPY');?>");
				}
			}
		}
		catch(e){
			alert("<?php echo JText::_('CLIPBOARD_NOSUPPORT');?>");
		}
	}
    </script>
    <?php } ?>

	<script language="javascript" type="text/javascript">
	function confirmChangeLanguage(fromLang, fromIndex){
		selections = document.getElementsByName("language_id")[0].options;
		selection = document.getElementsByName("language_id")[0].selectedIndex;
		//alert(selection+" from "+ fromIndex+" which is "+fromLang+" xx "+document.getElementsByName("language_id")[0].value);
		var toLang = selections[selection].text;
		var toValue = selection = document.getElementsByName("language_id")[0].value;
		if (fromIndex!=toValue){
			answer = confirm("<?php echo ereg_replace( '<br />', '\n', JText::_('JS_CHANGE_TRANSLATION_LANGUAGE')); ?>");
			if (!answer) {
				document.getElementsByName("language_id")[0].selectedIndex=fromIndex;
			}
		}
		else {
			alert("<?php echo ereg_replace( '<br />', '\n', JText::_('JS_REINSTATE_TRANSLATION_LANGUAGE')); ?>");
		}
	}
    </script>

<form action="<?php echo JRoute::_("index.php?option=com_joomfishplus&Itemid=".$Itemid);?>" method="post" name="adminForm">
   	<table width="100%">
	  <tr>
	    <td>
		<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
			<?php
			$k=1;
			for( $i=0; $i<count($elementTable->Fields); $i++ ) {
				$field =& $elementTable->Fields[$i];
				$originalValue = $field->originalValue;

				// if we supress blank originals 
				if ($field->ignoreifblank && $field->originalValue==="") continue;
				
				if( $field->Translate ) {
					$translationContent = $field->translationContent;

					// This causes problems in Japanese/Russian etc. ??
					jimport('joomla.filter.output');
					JFilterOutput::objectHTMLSafe( $translationContent );
				?>
		    <tr class="<?php echo "row$k"; ?>">
		      <th colspan="3"><?php echo JText::_('DBFIELDLABLE') .': '. $field->Lable;?></th>
		    </tr>
	      	<?php
	      	if (strtolower($field->Type)!='params'){
	      	?>
		    <tr class="<?php echo "row$k"; ?>">
		      <td align="left" valign="top"><?php echo JText::_('ORIGINAL');?></td>
		      <td align="left" valign="top" id="original_value_<?php echo $field->Name?>">
		      <?php
		      if (eregi("<form",$field->originalValue)){
		      	$ovhref = JRoute::_("index.php?option=com_joomfish&task=translate.originalvalue&tmpl=component&field=".$field->Name."&cid=".$this->actContentObject->id."&lang=".$select_language_id);
		      	echo '<a class="modal" rel="{handler: \'iframe\', size: {x: 700, y: 500}}" href="'.$ovhref.'" >'.JText::_("Content contains form - click here to view in popup window").'</a>';
		      }
		      else {
		      	echo $field->originalValue;
		      }
		      ?>
		      </td>
			  <td valign="top">
				<input type="hidden" name="origValue_<?php echo $field->Name;?>" value='<?php echo md5( $field->originalValue );?>' />
				<?php if( strtolower($field->Type)!='htmltext' ) {?>
					<input type="hidden" name="origText_<?php echo $field->Name;?>" value='<?php echo $field->originalValue;?>' />
					<a class="toolbar" onclick="document.adminForm.refField_<?php echo $field->Name;?>.value = document.adminForm.origText_<?php echo $field->Name;?>.value;" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('copy_<?php echo $field->Name;?>','','administrator/images/copy_f2.png',1);"><img src="administrator/images/copy.png" alt="<?php echo JText::_('copy');?>" border="0" name="copy_<?php echo $field->Name;?>" align="middle" /></a>
				<?php }	else { ?>
				    <textarea  name="origText_<?php echo $field->Name;?>" style="display:none"><?php echo $field->originalValue;?></textarea>
					<a class="toolbar" onclick="copyToClipboard('<?php echo $field->Name;?>','copy');" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('copy_<?php echo $field->Name;?>','','administrator/images/copy_f2.png',1);"><img src="administrator/images/copy.png" alt="<?php echo JText::_('copy');?>" border="0" name="copy_<?php echo $field->Name;?>" align="middle" /></a>
				<?php  }?>
			  </td>
		    </tr>
		    <tr class="<?php echo "row$k"; ?>">
		      <td align="left" valign="top"><?php echo JText::_('Translation');?></td>
		      <td align="left" valign="top">
					  <input type="hidden" name="id_<?php echo $field->Name;?>" value="<?php echo $translationContent->id;?>" />
						<?php
						if( strtolower($field->Type)=='text' || strtolower($field->Type)=='titletext' ) {
							$length = ($field->Length>0)?$field->Length:60;
							$maxLength = ($field->MaxLength>0)?$field->MaxLength:60;
							?>
							<input class="inputbox" type="text" name="refField_<?php echo $field->Name;?>" size="<?php echo $length;?>" value="<?php echo $translationContent->value; ?>" maxlength="<?php echo $maxLength;?>"/>

							<?php
						} else if( strtolower($field->Type)=='textarea' ) {
							$ta_rows = ($field->Rows>0)?$field->Rows:15;
							$ta_cols = ($field->Columns>0)?$field->Columns:30;
							?>
							<textarea name="refField_<?php echo $field->Name;?>" rows="<?php echo $ta_rows;?>" cols="<?php echo $ta_cols;?>" ><?php echo $translationContent->value; ?></textarea>
							<?php
						} else if( strtolower($field->Type)=='htmltext' ) {
							?>
							<?php
							$editorFields[] = array( "editor_".$field->Name, "refField_".$field->Name );
							// parameters : areaname, content, hidden field, width, height, rows, cols
							echo $wysiwygeditor->display( "refField_".$field->Name, $translationContent->value, '100%', '300', '70', '15',array("readmore") ) ;
							
						}
						if( strtolower($field->Type)=='readonlytext') {
							$length = ($field->Length>0)?$field->Length:60;
							$maxLength = ($field->MaxLength>0)?$field->MaxLength:60;
							$value =  strlen($translationContent->value)>0? $translationContent->value:$field->originalValue;
							?>
							<input class="inputbox" readonly="yes" type="text" name="refField_<?php echo $field->Name;?>" size="<?php echo $length;?>" value="<?php echo $value; ?>" maxlength="<?php echo $maxLength;?>"/>
							<?php
						}
						?>
				</td>
				<td valign="top">
					<?php
					 if ( strtolower($field->Type)=='readonlytext'){
					}
					else if( strtolower($field->Type)!='htmltext' ) {?>
						<a class="toolbar" onclick="document.adminForm.refField_<?php echo $field->Name;?>.value = '';" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','administrator/images/delete_f2.png',1);"><img src="administrator/images/delete.png" alt="<?php echo JText::_('clear');?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>
					<?php } else {?>
					<!-- ToDo
						<a class="toolbar" onclick="editor_setHTML('refField_<?php echo $field->Name;?>', ''); document.adminForm.refField_<?php echo $field->Name;?>.value = '';" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','images/delete_f2.png',1);"><img src="images/delete.png" alt="<?php echo JText::_('clear');?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>
					-->
					<a class="toolbar" onclick="copyToClipboard('<?php echo $field->Name;?>','clear');" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','administrator/images/delete_f2.png',1);"><img src="administrator/images/delete.png" alt="<?php echo JText::_('clear');?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" /></a>

					<?php }?>
					</td>
		    </tr>
	      	<?php
	      	}
	      	else {
	      		// Special Params handling
	      		// if translated value is blank then we always copy across the original value
	      		$joomFishManager = & JoomFishManager::getInstance();
	      		if ($joomFishManager->getCfg('copyparams',1) &&  $translationContent->value==""){
		      		$translationContent->value = $field->originalValue;
	      		}
	      	?>
		    <tr class="<?php echo "row$k"; ?>">
		      <td colspan="3">
		      <table class='translateparams'>
			      <tr>
				      <td valign="top" style="text-align:center!important"><?php echo JText::_('ORIGINAL');?></td>
				      <td valign="top" style="text-align:center!important"><?php echo JText::_('Translation');?></td>
				      <td valign="top" align="right">
						<input type="hidden" name="origValue_<?php echo $field->Name;?>" value='<?php echo md5( $field->originalValue );?>' />
						<input type="hidden" name="origText_<?php echo $field->Name;?>" value='<?php echo $field->originalValue;?>' />
						<a class="toolbar" onclick="copyParams('orig', '<?php echo $field->Name;?>');" onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('copy_<?php echo $field->Name;?>','','administrator/images/copy_f2.png',1);">
						   <img src="administrator/images/copy.png" alt="<?php echo JText::_('copy');?>" border="0" name="copy_<?php echo $field->Name;?>" align="middle" />
						</a>
						<a class="toolbar" onclick="copyParams('defaultvalue', '<?php echo $field->Name;?>');"  onmouseout="MM_swapImgRestore();"  onmouseover="MM_swapImage('clear_<?php echo $field->Name;?>','','administrator/images/delete_f2.png',1);">
						    <img src="administrator/images/delete.png" alt="<?php echo JText::_('clear');?>" border="0" name="clear_<?php echo $field->Name;?>" align="middle" />
						</a>
					   </td>
			     </tr>
			     <tr>
			      <td align="left" valign="top" class="origparams" id="original_value_<?php echo $field->Name?>">
			      <?php
			      $tpclass = "TranslateParams_".$elementTable->Name;
			      if (!class_exists($tpclass)){
			      	$tpclass = "TranslateParams";
			      }
			      $transparams = new $tpclass($field->originalValue,$translationContent->value, $field->Name,$elementTable->Fields);
			      $transparams->showOriginal();
			      $transparams->showDefault();

			      ?>
			      </td>
			      <td align="left" valign="top" class="translateparams">
						  <input type="hidden" name="id_<?php echo $field->Name;?>" value="<?php echo $translationContent->id;?>" />
							<?php
							$retval = $transparams->editTranslation();
							if ($retval){
								$editorFields[] = $retval;
							}
							?>
					</td>
			      </tr>
		      </table>
		      </td>
		    </tr>
	      	<?php
	      	}
	      	?>
				<?php
				}
				$k=1-$k;
			}
				?>
		</table>
	  </td>
	  <td valign="top" width="30%">
		<?php
		jimport('joomla.html.pane');
		$tabs = & JPane::getInstance('tabs');
		echo $tabs->startPane("translation");
		echo $tabs->startPanel(JText::_('PUBLISHING'),"ItemInfo-page");
	  ?>
  	<table width="100%" border="0" cellpadding="4" cellspacing="2" class="adminForm">
      <tr>
        <td width="34%"><strong><?php echo JText::_('TITLE_STATE');?>:</strong></td>
        <td width="50%"><?php echo $this->actContentObject->state > 0 ? JText::_('STATE_OK') : ($this->actContentObject->state < 0 ? JText::_('STATE_NOTEXISTING') : JText::_('STATE_CHANGED'));?></td>
      </tr>
      <tr>
        <td><strong><?php echo JText::_('LANGUAGE');?>:</strong></td>
        <td><?php echo $this->langlist;?></td>
      </tr>
      <tr>
        <td><strong><?php echo JText::_('TITLE_PUBLISHED')?>:</strong></td>
        <td>
        	<?php
        	$disabled = "";
        	if (!$this->canFrontEndPublish){
        		$disabled = ' disabled="disabled"';
        		$this->actContentObject->published=0;
        	}
        	?>
        	<input type="checkbox" name="published" value="1" <?php echo $this->actContentObject->published&0x0001 ? 'checked="checked"' : ''; echo $disabled;?> />
        </td>
      </tr>
      <tr>
        <td><strong><?php echo JText::_('TITLE_DATECHANGED');?>:</strong></td>
	   <td><?php echo $this->actContentObject->lastchanged ? JHTML::_('date', $this->actContentObject->lastchanged, JText::_('DATE_FORMAT_LC2')): JText::_('new') ;?></td>
      </tr>
	  </table>
	  <?php
	  echo $tabs->endPanel();
	  echo $tabs->endPane();
		?>
	  <input type="hidden" name="select_language_id" value="<?php echo $select_language_id;?>" />
	  <input type="hidden" name="reference_id" value="<?php echo $this->actContentObject->id;?>" />
	  <input type="hidden" name="reference_table" value="<?php echo (isset($elementTable->name) ? $elementTable->name : '');?>" />
	  <input type="hidden" name="catid" value="<?php echo $this->catid;?>" />
	</td></tr>
	</table>
	<input type="hidden" name="option" value="com_joomfishplus" />
	<input type="hidden" name="task" value="translate.edit" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
<script language="javascript" type="text/javascript">
    function submitbutton(pressbutton) {
    	var form = document.getElementsByName ('adminForm');
    	<?php
    	if( isset($editorFields) && is_array($editorFields) ) {
    		foreach ($editorFields as $editor) {
    			// Where editor[0] = your areaname and editor[1] = the field name
				echo $wysiwygeditor->save( $editor[1]);
    		}
    	}
    	?>
    	if (pressbutton == 'cancel') {
    		submitform( pressbutton );
    		return;
    	} else {
    		submitform( pressbutton );
    	}
    }
</script>
