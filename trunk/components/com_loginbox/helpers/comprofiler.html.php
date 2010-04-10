<?php

	function registerForm( $option, $emailpass, &$user, $regErrorMSG = null) {
		global $_CB_framework, $_CB_database, $_POST;

	    $_CB_adminpath		=	JPATH_ADMINISTRATOR.DS.'components'.DS.'com_comprofiler';
        include_once( $_CB_adminpath . '/ue_config.php' );
		
		outputCbTemplate(1);
		outputCbJs(1);
		addCbHeadTag( 1, initToolTip(1) );
		
		// gets registration tabs from plugins (including the contacts tab core plugin for username, password, etc:
		$tabs								=	new cbTabs( 0, 1 );
		if ( $regErrorMSG !== null ) {
			$tabcontent						=	$tabs->getEditTabs( $user, $_POST, 'tabletrs', 'register', false );
		} else {
			$null							=	null;
			$tabcontent						=	$tabs->getEditTabs( $user, $null,  'tabletrs', 'register', false );
			// $tabcontent					=	$tabs->getEditTabs( $user, $null,  'table', 'register', true );
		}

		$_CB_framework->setPageTitle( _UE_REGISTRATION );
		$_CB_framework->appendPathWay( _UE_REGISTRATION );

		// starts outputing:

		$cbSpoofField			=	cbSpoofField();
		$cbSpoofString			=	cbSpoofString( null, 'registerForm' );
		$regAntiSpamFieldName	=	cbGetRegAntiSpamFieldName();
		$regAntiSpamValues		=	cbGetRegAntiSpams();
		// <script type="text/javascript" src="includes/js/mambojavascript.js"></script>

		ob_start();
?>
var cbDefaultFieldBackground;
function cbFrmSubmitButton() {
	var me = this.elements;
<?php
		$version = checkJversion();
		if ($version == 1) {
	// var r = new RegExp("^[a-zA-Z](([\.\-a-zA-Z0-9@])?[a-zA-Z0-9]*)*$", "i");
?>
	var r = new RegExp("^[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]*$", "i");
<?php
		} elseif ( $version == -1 ) {
?>
	var r = new RegExp("[^A-Za-z0-9]", "i");
<?php
		} else {
?>
	var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
<?php
		}
?>
	var errorMSG = '';
	var iserror=0;
	if (cbDefaultFieldBackground === undefined && typeof(me['username'])!='undefined') cbDefaultFieldBackground = ((me['username'].style.getPropertyValue) ? me['username'].style.getPropertyValue("backgroundColor") : me['username'].style.backgroundColor);
<?php echo $tabs->fieldJS; ?>
	if (typeof(me['username'])!='undefined' && me['username'].value == "") {
		errorMSG += "<?php echo unhtmlentities(_REGWARN_UNAME);?>\n";
		me['username'].style.backgroundColor = "red";
		iserror=1;
	} else if (typeof(me['username'])!='undefined' && ( r.exec(me['username'].value) || (me['username'].value.length < 3))) {
		errorMSG += "<?php printf( unhtmlentities(_VALID_AZ09), unhtmlentities(_PROMPT_UNAME), 2 );?>\n";
		me['username'].style.backgroundColor = "red";
		iserror=1;
	} else if (typeof(me['username'])!='undefined' && me['username'].style.backgroundColor.slice(0,3)=="red") { me['username'].style.backgroundColor = cbDefaultFieldBackground;
<?php if ($emailpass!="1") { ?>
	}
	if (typeof(me['password'])!='undefined' && me['password'].value.length < 6) {
		errorMSG += "<?php printf( unhtmlentities(_VALID_AZ09), unhtmlentities(_REGISTER_PASS), 6 );?>\n";
		me['password'].style.backgroundColor = "red";
		iserror=1;
	} else if (typeof(me['password'])!='undefined' && (me['password'].value != "") && (me['password'].value != me['password__verify'].value)){
		errorMSG += "<?php echo unhtmlentities(_REGWARN_VPASS2);?>\n";
		me['password'].style.backgroundColor = "red"; me['password__verify'].style.backgroundColor = "red";
		iserror=1;
	} else if (typeof(me['password'])!='undefined') {
		if (me['password'].style.backgroundColor.slice(0,3)=="red") me['password'].style.backgroundColor = cbDefaultFieldBackground;
		if (me['password__verify'].style.backgroundColor.slice(0,3)=="red") me['password__verify'].style.backgroundColor = cbDefaultFieldBackground;
<?php } ?>
	}
<?php	if($ueConfig['reg_enable_toc']) { ?>
	if(!me['acceptedterms'].checked) {
		errorMSG += "<?php echo unhtmlentities(_UE_TOC_REQUIRED); ?>\n";
		iserror=1;
	}
<?php	} ?>
	// loop through all input elements in form
	var fieldErrorMessages = new Array;
	for (var i=0; i < me.length; i++) {
		// check if element is mandatory; here mosReq="1"
		if ( (typeof(me[i].getAttribute('mosReq')) != "undefined") && ( me[i].getAttribute('mosReq') == 1) ) {
			if (me[i].type == 'radio' || me[i].type == 'checkbox') {
				var rOptions = me[me[i].getAttribute('name')];
				var rChecked = 0;
				if(rOptions.length > 1) {
					for (var r=0; r < rOptions.length; r++) {
						if ( (typeof(rOptions[r].getAttribute('mosReq')) != "undefined") && ( rOptions[r].getAttribute('mosReq') == 1) ) {
							if (rOptions[r].checked) {
								rChecked=1;
							}
						}
					}
				} else {
					if (me[i].checked) {
						rChecked=1;
					}
				}
				if (rChecked==0) {
					for (var k=0; k < me.length; k++) {
						if (me[i].getAttribute('name') == me[k].getAttribute('name')) {
							if (me[k].checked) {
								rChecked=1;
								break;
							}
						}
					}
				}
				if (rChecked==0) {
					var alreadyFlagged = false;
					for (var j = 0, n = fieldErrorMessages.length; j < n; j++) {
						if (fieldErrorMessages[j] == me[i].getAttribute('name')) {
							alreadyFlagged = true;
							break
						}
					}
					if ( ! alreadyFlagged ) {
						fieldErrorMessages.push(me[i].getAttribute('name'));
						// add up all error messages
						errorMSG += me[i].getAttribute('mosLabel') + ' : <?php echo unhtmlentities(_UE_REQUIRED_ERROR); ?>\n';
						// notify user by changing background color, in this case to red
						me[i].style.backgroundColor = "red";
						iserror=1;
					}
				} else if (me[i].style.backgroundColor.slice(0,3)=="red") me[i].style.backgroundColor = cbDefaultFieldBackground;
			}
			if (me[i].value == '') {
				// add up all error messages
				errorMSG += me[i].getAttribute('mosLabel') + ' : <?php echo unhtmlentities(_UE_REQUIRED_ERROR); ?>\n';
				// notify user by changing background color, in this case to red
				me[i].style.backgroundColor = "red";
				iserror=1;
			} else if (me[i].style.backgroundColor.slice(0,3)=="red") me[i].style.backgroundColor = cbDefaultFieldBackground;
		}
	}
	if(iserror==1) {
		alert(errorMSG);
		return false;
	} else {
		return true;
	}
}
$('#cbcheckedadminForm').submit( cbFrmSubmitButton );
<?php
		$cbjavascript	=	ob_get_contents();
		ob_end_clean();
		$_CB_framework->outputCbJQuery( $cbjavascript );

		if ($regErrorMSG) {
			echo "<div class='error'>".$regErrorMSG."</div>\n";
		}

		$reg_show_login_on_page	=	false;

?>
<div class="contentpaneopen"><div class="cb_comp_outer"><div class="cb_comp_inner cbRegistration">
<?php
		/*if ( ( ! isset( $ueConfig['reg_show_icons_explain'] ) ) || in_array( $ueConfig['reg_show_icons_explain'], array( 1, 3 ) ) ) {
			echo '<div style="align:center;" id="cbIconsTop">';
			echo getFieldIcons(1,true,true,"","",true);
			echo '</div>';
		}*/
?>
<form action="<?php echo cbSef("index.php?option=".$option); ?>" method="post" id="cbcheckedadminForm" name="adminForm" enctype="multipart/form-data">
<table class="contentpane" id="registrationTable">
<?php
		if ( isset( $ueConfig['reg_intro_msg'] ) && $ueConfig['reg_intro_msg'] && ( ! $reg_show_login_on_page ) ) {
?>
    <tr>
      <td colspan="2" class="contentpaneopen"><?php echo stripslashes(getLangDefinition($ueConfig['reg_intro_msg'])); ?></td>
    </tr>
<?php
		}
		// outputs all tabs, including contact tab:
		echo $tabcontent;

		// outputs the site terms and conditions link and approval checkbox: Not yet a CB field		//TBD

		if($ueConfig['reg_enable_toc']) {
			echo "\t<tr>\n";
		      	echo "\t\t<td>&nbsp;</td>\n<td class='fieldCell'><input type='checkbox' name='acceptedterms' id='acceptedterms' value='1' mosReq='0' mosLabel='". htmlspecialchars( _UE_TOC ) ."' /> <label for='acceptedterms'>"
		      	. sprintf(_UE_TOC_LINK,"<a href='".cbSef(htmlspecialchars($ueConfig['reg_toc_url']))."' target='_BLANK'> ","</a>") . "</label></td>\n";
			echo "\t</tr>\n";
		}
		
		// outputs conclusion text and different default values:
?>
    <tr>
      <td colspan="2" class="contentpaneopen"><?php
   	  if (isset($ueConfig['reg_conclusion_msg']) and ($ueConfig['reg_conclusion_msg'])) {
 		echo stripslashes(getLangDefinition($ueConfig['reg_conclusion_msg']));
   	  } else {
   	  	echo "&nbsp;";
   	  }
   	  ?></td>
    </tr>
    <tr>
      <td colspan="2">
		<input type="hidden" name="id" value="0" />
		<input type="hidden" name="gid" value="0" />
		<input type="hidden" name="emailpass" value="<?php echo $emailpass;?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="register" />
		<?php
		echo cbGetSpoofInputTag( null, $cbSpoofString );
		echo "\t\t" . cbGetRegAntiSpamInputTag( $regAntiSpamValues );
?>
		<input type="submit" value="<?php echo _UE_REGISTER; ?>" class="button" />
      </td>
    </tr>
</table>
</form>
<?php
		if ( ( ! isset( $ueConfig['reg_show_icons_explain'] ) ) || in_array( $ueConfig['reg_show_icons_explain'], array( 2, 3 ) ) ) {
			echo '<div style="align:center;" id="cbIconsBottom">';
			//echo getFieldIcons(1,true,true,"","",true);
			echo '</div>';
		}
		echo '</div></div></div>';
		if ( $reg_show_login_on_page ) {
			echo '</div></div>';
		}
		echo "<div class=\"cbClr\"></div>";

		// finally small javascript to focus on first field on registration form if there is no introduction text and it's a text field:

		if ( ! ( ( isset( $ueConfig['reg_intro_msg'] ) && ( $ueConfig['reg_intro_msg'] ) )
			  || ( isset( $ueConfig['reg_show_login_on_page'] ) && ( $ueConfig['reg_show_login_on_page'] == 1 ) )
			  || ( $regErrorMSG )
			   ) )
		{
?>
<script type="text/javascript"><!--//--><![CDATA[//><!--
function cbIEfocus() {
	if ( document.forms['adminForm'].elements[0].type == 'text' ) {
		document.forms['adminForm'].elements[0].focus();
	}
}
if (window.addEventListener) window.addEventListener("load", cbIEfocus, true);
else if (window.attachEvent) window.attachEvent("onload", cbIEfocus);
else cbIEfocus();
//--><!]]></script>
<?php
		}
	}


?>