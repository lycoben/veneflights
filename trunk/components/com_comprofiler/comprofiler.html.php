<?php
/**
* Joomla/Mambo Community Builder
* @version $Id: comprofiler.html.php 609 2006-12-13 17:30:15Z beat $
* @package Community Builder
* @subpackage comprofiler.html.php
* @author JoomlaJoe and Beat
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/


if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

class HTML_comprofiler {

	function outputMosFormVal() {
?>
<script type="text/javascript"><!--//--><![CDATA[//><!--
var cbDefaultFieldBackground;
function submitbutton(mfrm) {
	var me = mfrm.elements;
	var errorMSG = '';
	var iserror=0;
	// loop through all input elements in form
	for (var i=0; i < me.length; i++) {
		// check if element is mandatory; here mosReq="1"
		if ( (typeof(me[i].getAttribute('mosReq')) != "undefined") && ( me[i].getAttribute('mosReq') == 1) ) {
			if (me[i].type == 'radio' || me[i].type == 'checkbox') {
				var rOptions = me[me[i].getAttribute('name')];
				var rChecked = 0;
				if(rOptions.length > 1) {
					for (var r=0; r < rOptions.length; r++) {
						if (rOptions[r].checked) {
							rChecked=1;
						}
					}
				} else {
					if (me[i].checked) {
						rChecked=1;
					}
				}
				if(rChecked==0) {
					for (var k=0; k < me.length; k++) {
						if (me[i].getAttribute('name') == me[k].getAttribute('name')) {
							if (me[k].checked) {
								rChecked=1;
								break;
							}
						}
					}
				}
				if(rChecked==0) {
					// add up all error messages
					errorMSG += me[i].getAttribute('mosLabel') + ' : <?php echo unhtmlentities(_UE_REQUIRED_ERROR); ?>\n';
					// notify user by changing background color, in this case to red
					if (cbDefaultFieldBackground === undefined) cbDefaultFieldBackground = ((me[i].style.getPropertyValue) ? me[i].style.getPropertyValue("backgroundColor") : me[i].style.backgroundColor);
					me[i].style.backgroundColor = "red";
					iserror=1;
				} else if (me[i].style.backgroundColor.slice(0,3)=="red") me[i].style.backgroundColor = cbDefaultFieldBackground;
			}
			if (me[i].value == '') {
				// add up all error messages
				errorMSG += me[i].getAttribute('mosLabel') + ' : <?php echo unhtmlentities(_UE_REQUIRED_ERROR); ?>\n';
				// notify user by changing background color, in this case to red
				if (cbDefaultFieldBackground === undefined) cbDefaultFieldBackground = ((me[i].style.getPropertyValue) ? me[i].style.getPropertyValue("backgroundColor") : me[i].style.backgroundColor);
				me[i].style.backgroundColor = "red";
				iserror=1;
			} else if ((me[i].getAttribute('mosLength')) && (me[i].value.length > me[i].getAttribute('mosLength'))) {
				errorMSG += me[i].getAttribute('mosLabel') + " <?php echo unhtmlentities(_UE_LENGTH_ERROR); ?> " + (me[i].value.length - me[i].getAttribute('mosLength')) + " <?php echo unhtmlentities(_UE_CHARACTERS); ?>\n";
				// notify user by changing background color, in this case to red
				if (cbDefaultFieldBackground === undefined) cbDefaultFieldBackground = ((me[i].style.getPropertyValue) ? me[i].style.getPropertyValue("backgroundColor") : me[i].style.backgroundColor);
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
//--><!]]></script>
<?php
	}	// end of php method HTML_comprofiler::outputMosFormVal()


	function emailUser( $option, $rowFrom, $rowTo, $subject = '', $message = '' ) {
	global $_CB_framework, $ueConfig, $_PLUGINS;
	
	if($rowFrom->id == $rowTo->id) {
		echo "<div class=\"contentheading\" >"._UE_NOSELFEMAIL."</div>";
		return;
	}
	HTML_comprofiler::outputMosFormVal();

	$_PLUGINS->loadPluginGroup('user');
	$results = $_PLUGINS->trigger( 'onBeforeEmailUserForm', array( &$rowFrom, &$rowTo, 1 ));	//$ui=1
	if ($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
		exit();
	}
?>
	<div style="text-align:left;">
	<div class="componentheading" ><?php
	echo sprintf(_UE_EMAILFORMTITLE,"<a href=\"".cbSef( "index.php?option=com_comprofiler&amp;task=UserDetails&amp;user=".$rowTo->id )."\">".getNameFormat($rowTo->name,$rowTo->username,$ueConfig['name_format'])."</a>");
	?></div>
	<form action="<?php echo cbSef("index.php?option=$option".getCBprofileItemid(true)); ?>" method="post" id="adminForm" name="adminForm" onsubmit="return submitbutton(this)">
		<br /><?php echo _UE_EMAILFORMSUBJECT; ?><br />
<?php
	if (is_array($results)) {
		echo implode( "<br />", $results );
	}
?>
		<input mosReq="1" mosLabel="<?php echo htmlspecialchars( _UE_EMAILFORMSUBJECT ); ?>" type="text" class="inputbox" name="emailSubject" size="50" value="<?php echo htmlspecialchars( $subject ); ?>" /><?php
		echo getFieldIcons( 1, 1, null );
		?><br />
		<br /><?php echo _UE_EMAILFORMMESSAGE; ?><br />
		<textarea mosReq="1" mosLabel='<?php echo htmlspecialchars( _UE_EMAILFORMMESSAGE ); ?>' class="inputbox" name="emailBody" cols="50" rows="15" ><?php echo htmlspecialchars( $message ); ?></textarea><?php
		echo getFieldIcons( 1, 1, null );
		echo '<br />';
	$warning = _UE_EMAILFORMWARNING;
	$results = $_PLUGINS->trigger( 'onAfterEmailUserForm', array( &$rowFrom, &$rowTo, &$warning, 1 ));	//$ui=1
	if (is_array($results)) {
		echo implode( "<br />", $results );
	}
?>
		<div><?php echo sprintf( $warning, $rowFrom->email ); ?></div>
		<input type="hidden" name="fromID" value="<?php echo $rowFrom->id; ?>" />
		<input type="hidden" name="toID" value="<?php echo $rowTo->id; ?>" />
		<input type="hidden" name="protect" value="<?php
	$salt	=	cbMakeRandomString( 16 );
	echo 'cbmv1_' . md5($salt.$rowTo->id.$rowTo->password.$rowTo->lastvisitDate.$rowFrom->password.$rowFrom->lastvisitDate) . '_' . $salt; ?>" />
		<?php
	echo cbGetSpoofInputTag( 'emailUser' );
	echo "\t\t" . cbGetAntiSpamInputTag();
?>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="sendUserEmail" />
		<input type="submit" class="button" value="<?php echo _UE_SENDEMAIL; ?>" />
	</form>
	</div>
	<div style="align:center;">
	<?php
	echo getFieldIcons( 1, 1, null, '', '', 2 );
	?>
	</div>
<?php

	}

/******************************
Profile Functions
******************************/

	function userEdit( $user, $option, $submitvalue, $regErrorMSG=null )
	{
	global $_CB_framework, $ueConfig, $_REQUEST;

	outputCbTemplate( 1 );
	addCbHeadTag( 1, initToolTip(1) );
	
	$title		=	cbSetTitlePath( $user, _UE_EDIT_TITLE, _UE_EDIT_OTHER_USER_TITLE );

	$tabs		=	new cbTabs( 0, 1 );
	$tabcontent	=	$tabs->getEditTabs( $user );

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
	if (cbDefaultFieldBackground === undefined) cbDefaultFieldBackground = ((me['username'].style.getPropertyValue) ? me['username'].style.getPropertyValue("backgroundColor") : me['username'].style.backgroundColor);
<?php echo $tabs->fieldJS; ?>
	if (me['username'].value == "") {
		errorMSG += "<?php echo unhtmlentities(_REGWARN_UNAME);?>\n";
		me['username'].style.backgroundColor = "red";
		iserror=1;
	} else if (r.exec(me['username'].value) || (me['username'].value.length < 3)) {
		errorMSG += "<?php printf( unhtmlentities(_VALID_AZ09), unhtmlentities(_PROMPT_UNAME), 2 );?>\n";
		me['username'].style.backgroundColor = "red";
		iserror=1;
	} else if (me['username'].style.backgroundColor.slice(0,3)=="red") {
		me['username'].style.backgroundColor = cbDefaultFieldBackground;
	}
	if ((me['password'].value) && (me['password'].value.length < 6)) {
		errorMSG += "<?php printf( unhtmlentities(_VALID_AZ09), unhtmlentities(_REGISTER_PASS), 6 );?>\n";
		me['password'].style.backgroundColor = "red";
		iserror=1;
	} else if ((me['password'].value != "") && (me['password'].value != me['password__verify'].value)){
		errorMSG += "<?php echo unhtmlentities(_REGWARN_VPASS2);?>\n";
		me['password'].style.backgroundColor = "red"; me['password__verify'].style.backgroundColor = "red";
		iserror=1;
	} else {
		if (me['password'].style.backgroundColor.slice(0,3)=="red") me['password'].style.backgroundColor = cbDefaultFieldBackground;
		if (me['password__verify'].style.backgroundColor.slice(0,3)=="red") me['password__verify'].style.backgroundColor = cbDefaultFieldBackground;
	}
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
				if(rChecked==0) {
					for (var k=0; k < me.length; k++) {
						if (me[i].getAttribute('name') == me[k].getAttribute('name')) {
							if (me[k].checked) {
								rChecked=1;
								break;
							}
						}
					}
				}
				if(rChecked==0) {
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
?>
<div class="componentheading"><?php echo htmlspecialchars( $title ); ?></div>
<div class="cbEditProfile"><div id="cbEditProfileInner">
	<form action="<?php echo cbSef("index.php?option=$option".getCBprofileItemid(true)); ?>" method="post" id="cbcheckedadminForm" name="adminForm" enctype="multipart/form-data" autocomplete="off">
<?php
if ( $regErrorMSG ) {
	echo "<div class='error'>".$regErrorMSG."</div>\n";
}
if ( $user->id != $_CB_framework->myId() ) {
	echo "<div class='message' style='font-weight:bold;color:red;margin-bottom:20px;'>" . sprintf( _UE_WARNING_EDIT_OTHER_USER_PROFILE, getNameFormat( $user->name, $user->username, $ueConfig['name_format'] ) ) . "</div>\n";
}
echo $tabcontent;
?>
	<input class="button" type="submit" value="<?php echo $submitvalue; ?>" />
	<input type="button" class="button" name="btncancel" value="<?php echo _UE_CANCEL; ?>" onclick="window.location='<?php
									 echo cbSef("index.php?option=" . htmlspecialchars( cbGetParam( $_REQUEST, 'option' ) ) . ( ( $user->id == $_CB_framework->myId() ) ? '' : ( '&amp;user=' . $user->id ) ) . getCBprofileItemid( true )); ?>';" />
	<input type="hidden" name="id" value="<?php echo $user->id;?>" />
	<input type="hidden" name="task" value="saveUserEdit" />
	<?php
	echo cbGetSpoofInputTag( 'userEdit' );
?>
			<div style="align:center;">
<?php
echo getFieldIcons(1,true,true,"","",true);
if ( isset( $_REQUEST['tab'] ) ) {
	echo "<script type=\"text/javascript\">showCBTab( '" . urldecode( cbGetParam( $_REQUEST, 'tab' ) ) . "' );</script>";
}
?>
		</div>
	</form>
</div></div>
<div class="cbClr"></div>
<?php
	}
	
	function userProfile($user, $option, $submitvalue) {
		global $_CB_framework, $ueConfig,$_POST,$_PLUGINS;
		
		$_PLUGINS->loadPluginGroup('user');
		$results = $_PLUGINS->trigger( 'onBeforeUserProfileRequest', array(&$user,1));
		if ($_PLUGINS->is_errors()) {
			echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
			exit();
		}

		$cbMyIsModerator = isModerator( $_CB_framework->myId() );
		$cbUserIsModerator = isModerator($user->id);

		$showProfile=1;
		if ( ( $user->banned != 0 ) || ( ( $user->block == 1 ) && $user->confirmed && $user->approved ) ) {
			echo "<font color='red'>";
			if ($user->banned != 0 ) {
				if ( $_CB_framework->myId() != $user->id ) {
					echo _UE_USERPROFILEBANNED;
				} else {
					echo _UE_BANNED_CHANGE_PROFILE;
				}
			}
			if ( ( $user->block == 1 ) && $user->confirmed && $user->approved ) {
				echo _UE_USERPROFILEBLOCKED;
			}
			if ( ( $_CB_framework->myId() != $user->id ) && ( $cbMyIsModerator != 1 ) ) {
				$showProfile=0;
			} else {
				if ($user->block == 1) {
					echo ": "._UE_LOGIN_BLOCKED;
				}
				if ($user->banned != 0) {
					echo "<br />".nl2br($user->bannedreason);
				}
			}
			echo "<br /></font>";
		}
		if ( ! $user->confirmed ) {
			echo "<font color='red'>"._UE_USER_NOT_CONFIRMED."</font><br />";
		}
		if ( ! $user->approved ) {
			echo "<font color='red'>"._UE_USER_NOT_APPROVED."</font><br />";
		}
		if ( ( ! $user->confirmed || ! $user->approved) && $cbMyIsModerator != 1 ) {
				$showProfile	=	0;
		}
		if ( $showProfile == 1 ) {
			$results = $_PLUGINS->trigger( 'onBeforeUserProfileDisplay', array( &$user, 1, $cbUserIsModerator, $cbMyIsModerator ) );	//$ui=1	//BBB: params?
			if ($_PLUGINS->is_errors()) {
				echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
				exit();
			}
			if (is_array($results)) {
				for ($i=0, $n=count($results); $i<$n; $i++) {
					echo $results[$i];
				}
			}

			$cbUser			=&	CBuser::getInstance( $user->id );
			$_CB_framework->displayedUser( (int) $user->id );
			$userViewTabs	=	$cbUser->getProfileView();
			
/*
			$tabs = new cbTabs( 0, 1 );
			$userViewTabs = $tabs->getViewTabs($user);			// this loads, registers menu and user status and renders the tabs
*/
			$_CB_framework->setPageTitle( unHtmlspecialchars(getNameFormat($user->name,$user->username,$ueConfig['name_format'])));
			$_CB_framework->appendPathWay( getNameFormat($user->name,$user->username,$ueConfig['name_format']));

			$i=1;
			outputCbTemplate(1);
			addCbHeadTag( 1, initToolTip(1) );
			addCbHeadTag( 1, '
<script type="text/javascript">
	function cbConnSubmReq() {
		cClick();
		document.connOverForm.submit();
	}
	function confirmSubmit() {
	if (confirm("' . _UE_CONFIRMREMOVECONNECTION . '"))
		return true ;
	else
		return false ;
	}
</script>
' );

			//positions: head left middle right tabmain underall
			$wLeft	 = isset($userViewTabs["cb_left"])	 ? 100 : 0;
			$wMiddle = isset($userViewTabs["cb_middle"]) ? 100 : 0;
			$wRight	 = isset($userViewTabs["cb_right"])	 ? 100 : 0;
			$nCols	 = intval(($wLeft + $wMiddle + $wRight)/100);
			switch ($nCols) {
				case 0:
				case 1:
					break;
				case 2:
					$wLeft	 = $wLeft	? intval($ueConfig['left2colsWidth'])-1 : 0;
					$wMiddle = $wMiddle	? ($wLeft ? 100-intval($ueConfig['left2colsWidth'])-1 : intval($ueConfig['left2colsWidth'])-1) : 0;
					$wRight	 = $wRight	? 100-intval($ueConfig['left2colsWidth'])-1 : 0;
					break;
				case 3:
					$wLeft	 = intval($ueConfig['left3colsWidth'])-1;
					$wMiddle = 100-intval($ueConfig['left3colsWidth'])-intval($ueConfig['right3colsWidth'])-1;
					$wRight	 = intval($ueConfig['right3colsWidth'])-1;
					break;
			}

			echo "\n\t<div class=\"cbProfile\"><div id=\"cbProfileInner\">";

			// Display "head" tabs: (Menu + shortest connection path / Degree of relationship + Uname Profile Page)
			if (isset($userViewTabs["cb_head"])) {
				echo "<div class=\"cbPosHead\">";
	    		echo $userViewTabs["cb_head"];
    			echo "</div><div class=\"cbClr\"></div>";
			}
			if ($nCols != 0) {
				echo "\n\t\t<div class=\"cbPosTop\">";

				// Display "Left" tabs
				if (isset($userViewTabs["cb_left"])) {
					echo "\n\t\t\t<div class=\"cbPosLeft\" style=\"width:".$wLeft."%;\">";
	    			echo $userViewTabs["cb_left"];
    				echo "</div>";
				}
				// Display "Middle" tabs (User Avatar/Image):
				if (isset($userViewTabs["cb_middle"])) {
					echo "\n\t\t\t<div class=\"cbPosMiddle\" style=\"width:".$wMiddle."%;\">";
	    			echo $userViewTabs["cb_middle"];
    				echo "</div>";
				}
				// Display "Right" tabs (User Status):
				if (isset($userViewTabs["cb_right"])) {
					echo "\n\t\t\t<div class=\"cbPosRight\" style=\"width:".$wRight."%;\">";
	    			echo $userViewTabs["cb_right"];
    				echo "</div>";
				}
				echo "</div><div class=\"cbClr\"></div>";
			}
			if (isset($userViewTabs["cb_tabmain"])) {
				echo "\n\t\t<div class=\"cbPosTabMain\">";
				echo $userViewTabs["cb_tabmain"];
				echo "</div><div class=\"cbClr\"></div>";
			}
			if (isset($userViewTabs["cb_underall"])) {
				echo "\n\t\t<div class=\"cbPosUnderAll\">";
				echo $userViewTabs["cb_underall"];
				echo "</div><div class=\"cbClr\"></div>";
			}

			// New CB 1.2 grid layout:

			$line					=	null;
			$tabsIdxes				=	array_keys( $userViewTabs );
			foreach ( $tabsIdxes as $k => $v ) {
				if ( $v[0] == 'L' ) {
					$L				=	$v[1];
					if ( $line === null ) {
						// new line: mark begin:
						$line		=	$k;
					}
					if ( ! ( isset( $tabsIdxes[$k + 1] ) && ( $tabsIdxes[$k + 1][1] == $L ) ) ) {
						// line is now complete, next entry, if exists, is another line: generate line:
						$cols		=	$k - $line + 1;
						$width		=	100;
						$step		=	floor( $width / $cols );
						echo "\n\t\t" . '<div class="cbPosGridLine" id="cbPosLine' . substr( $v, 0, 2 ) . '">';
						for ( $i = $line ; $i <= $k ; $i++ ) {
							if ( $i == $k ) {
								$step	=	$width - ( ( $cols - 1 ) * $step );
							}
							echo "\n\t\t" . '<div class="cbPosGrid" id="cbPos' . $v . '" style="width:' . $step . '%;"><div class="cbPosGridE">';
							echo $userViewTabs[$tabsIdxes[$i]];
							echo '</div></div>';
						}
						echo '</div><div class="cbClr" id="cbPosSep' . substr( $v, 0, 2 ) . '"> </div>';

						$line		=	null;
					}
				}
			}

			echo "</div><div class=\"cbClr\"></div></div>\n" . "<div class=\"cbClr\"></div>";		// end of cbProfile floating div

			$tab = null;
			if ( isset( $_GET['tab'] ) ) {
				$tab = urldecode( cbGetParam( $_GET, 'tab', '' ) );
			} elseif ( isset( $_POST['tab'] ) ) {
				$tab = cbGetParam( $_POST, 'tab', '' );
			}
			if ($tab) {
				echo "<script type=\"text/javascript\">showCBTab('".addslashes(htmlspecialchars($tab))."');</script>\n";
			}

			if ( $_CB_framework->myId() != $user->id ) {
				recordViewHit( $_CB_framework->myId(), $user->id, getenv( 'REMOTE_ADDR' ) );
			}
			$_PLUGINS->trigger( 'onAfterUserProfileDisplay', array($user,true));
		}
	}

	function userAvatar( &$row, $option, $submitvalue ) {
		global $_CB_framework, $_CB_database, $_REQUEST, $ueConfig, $_PLUGINS, $_FILES;

		outputCbTemplate(1);

		$title		=	cbSetTitlePath( $row, _UE_UPDATEAVATAR, _UE_EDIT_OTHER_USER_TITLE );
?>
<!-- TAB -->
<div class="componentheading"><?php echo $title; ?></div><br />
<?php                       
		if($ueConfig['allowAvatarUpload']){
			echo "<div class='contentheading'>"._UE_UPLOAD_SUBMIT."</div>";
			echo sprintf( _UE_UPLOAD_DIMENSIONS_AVATAR, $ueConfig['avatarWidth'], $ueConfig['avatarHeight'], $ueConfig['avatarSize'] );
			echo "\n<form action='".cbSef("index.php?option=com_comprofiler&amp;task=userAvatar".getCBprofileItemid(true))."' method='post' name='adminForm' enctype='multipart/form-data'>";
			echo "\n\t<input type='hidden' name='do' value='validate' />";
			if ( $_CB_framework->myId() != $row->id ) {
				echo "\n\t<input type='hidden' name='uid' value='" . $row->id . "' />";
			}
			echo "\n\t<table width='100%' border='0' cellpadding='4' cellspacing='2'>";
			echo "\n\t\t<tr align='center' valign='middle'>\n\t\t\t<td align='center' valign='top'>";

			//echo " <input type='hidden' name='MAX_FILE_SIZE' value='".$maxAllowed."' />";
			echo _UE_UPLOAD_SELECT_FILE." <input type='file' name='avatar' value='' />";
			echo " <input type='submit' class='button' value='"._UE_UPLOAD_UPLOAD."' />";
			echo "</td>\n\t\t</tr>";
			echo "\n\t\t<tr align='center' valign='middle'>\n\t\t\t<td align='center' valign='top'>";
			echo ( $ueConfig['reg_enable_toc'] ? sprintf( _UE_AVATAR_UPLOAD_DISCLAIMER_TERMS, "<a href='".cbSef(htmlspecialchars($ueConfig['reg_toc_url']))."' target='_BLANK'> " . _UE_AVATAR_TOC_LINK . "</a>" ) : _UE_AVATAR_UPLOAD_DISCLAIMER );
			echo "</td>\n\t\t</tr>";
			echo "</table><br/><br/>";
			echo "\n";
			echo cbGetSpoofInputTag( 'userAvatar' );
			echo "</form>";
		}

		if($ueConfig['allowAvatarGallery']){
			echo "\n<div class='contentheading'>"._UE_UPLOAD_GALLERY."</div>";
			echo "\n<form action='".cbSef("index.php?option=com_comprofiler&amp;task=userAvatar".getCBprofileItemid(true))."' method='post' name='adminForm'>";
			echo "\n\t<input type='hidden' name='do' value='fromgallery' />";
			if ( $_CB_framework->myId() != $row->id ) {
				echo "\n\t<input type='hidden' name='uid' value='" . $row->id . "' />";
			}
			echo "\n\t<table width='100%' border='0' cellpadding='4' cellspacing='2'>";
			echo "\n\t\t<tr align='center' valign='middle'>";
			echo '<td colspan="5">&nbsp;</td></tr>';
			echo "\n\t\t<tr align='center' valign='middle'>";
			$live_site				=	$_CB_framework->getCfg( 'live_site' );
			$avatar_gallery_path	=	$_CB_framework->getCfg( 'absolute_path' ) . '/images/comprofiler/gallery';
			$avatar_images			=	display_avatar_gallery($avatar_gallery_path);
			for($i = 0; $i < count($avatar_images); $i++) {
				$j=$i+1;
				echo "\n\t\t\t<td>";
				$avatar_name = ucfirst(str_replace("_", " ", preg_replace('/^(.*)\..*$/', '\1', $avatar_images[$i])));
				echo '<img src="' . $live_site . '/images/comprofiler/gallery/'. $avatar_images[$i].'" alt="'.$avatar_name.'" title="'.$avatar_name.'" />';
				echo '<input type="radio" name="newavatar" value="'.$avatar_images[$i].'" />';
				echo '</td>';
				if (function_exists('fmod')) {
					if (!fmod(($j),5)) { echo "</tr>\n\t\t<tr align=\"center\" valign=\"middle\">"; }
				} else {
					if (!fmodReplace(($j),5)) { echo "</tr>\n\t\t<tr align=\"center\" valign=\"middle\">"; }
				}

			}
			echo "\n\t\t</tr>\n\t\t";
			echo '<tr><td colspan="5" align="center"><input class="button"  type="submit" value="'._UE_UPLOAD_CHOOSE.'" /> ';
			echo '<input type="button" class="button" name="btncancel" value="' . _UE_CANCEL . '" onclick="window.location=\''
					. cbSef("index.php?option=" . htmlspecialchars( cbGetParam( $_REQUEST, 'option' ) ) . ( ( $row->id == $_CB_framework->myId() ) ? '' : ( '&amp;user=' . $row->id ) ) . getCBprofileItemid( true ))
					. '\';" />';
			echo '</td></tr>';
			echo "\n\t</table>";
			echo "\n";
			echo cbGetSpoofInputTag( 'userAvatar' );
			echo "</form>\n";
		}
	}



/******************************
List Functions
******************************/

	function usersList( &$row, &$users, &$columns, &$allFields, &$lists, $listid, $search, $searchmode, $option_itemid, $limitstart, $limit, $total, &$myUser, &$searchableFields, &$searchVals, &$tabs, $searchType, $showPaging, $hotlink_protection ) {
		global $_CB_framework, $ueConfig, $_PLUGINS, $_POST, $_GET, $_REQUEST;

		$results				=	$_PLUGINS->trigger( 'onBeforeDisplayUsersList', array( &$row, &$users, &$columns, &$allFields, &$lists, $listid, &$search, &$option_itemid, 1 ) );	// $uid = 1

		// regroup parts of the different plugins:
		$pluginAdditions		=	array( 'search', 'header', 'footer' );
		$pluginAdditions['search']	=	array();
		$pluginAdditions['header']	=	array();
		$pluginAdditions['footer']	=	array();
		if ( is_array( $results ) && ( count( $results ) > 0 ) ) {
			foreach ($results as $res ) {
				if ( is_array( $res ) ) {
					foreach ( $res as $k => $v ) {
						$pluginAdditions[$k][]	=	$v;
					}
				}
			}
		}

		$listTitle				=	cbReplaceVars( getLangDefinition( $row->title ), $myUser );
		$listDescription		=	cbReplaceVars( getLangDefinition( $row->description ), $myUser );

		$_CB_framework->setPageTitle( $listTitle );
		$_CB_framework->appendPathWay( htmlspecialchars( $listTitle ) );

		$cbSpoofField			=	cbSpoofField();
		if ( $hotlink_protection == 1 ) {
			$cbSpoofString		=	cbSpoofString( null, 'usersList' );
			$spoofAmp			=	"&amp;" . $cbSpoofField . '=' . urlencode( $cbSpoofString );
		} else {
			$cbSpoofString		=	null;
			$spoofAmp			=	null;
		}
		
		$ue_base_url			=	"index.php?option=com_comprofiler&amp;task=usersList&amp;listid=" . $listid . "&amp;Itemid=" . $option_itemid; // . $spoofAmp;	// Base URL string

		// $adminimagesdir			=	"components/com_comprofiler/images/";

		$searchTabContent		=	$tabs->getSearchablesContents( $searchableFields, $myUser, $searchVals /* , $searchType */ );
		
		outputCbTemplate( 1 );
		//no need for now:	addCbHeadTag( 1, initToolTip(1) );

		// paginator addition:
		$pagingSearch			=	'';
		foreach ( get_object_vars( $searchVals ) as $k => $v ) {
			if ( is_array( $v ) ) {
				$pArr			=	'&amp;' . urlencode( $k );
				foreach ( $v as $kk => $vv ) {
					$pagingSearch	.=	$pArr . '[' . urlencode( $kk ) . ']=' . urlencode( $vv );
				}
			} else {
				$pagingSearch		.=	'&amp;' . urlencode( $k ) . '=' . urlencode( $v );
			}
		}

								//	Add Javascript to click tr:
		$jsClickTr				=	" {"
								.	"\n		var cbUserURLs = new Array(";
		if ( is_array( $users ) ) {
			foreach( $users as $user ) {
				$jsClickTr		.=				"'" . cbSef( 'index.php?option=com_comprofiler&amp;task=userProfile&amp;user=' . $user->id . getCBprofileItemid( true ), false ) . "',";
			}
		}
		$jsClickTr				.=	"'');"
								//	CLICK a table row:
								.	"\n		$('#cbUserTable > tbody > tr').click( function(e) {"
								//	If it's not a link within the row which is getting clicked:
								.	"\n			if ( ! ( $(e.target).is('a') || ( $(e.target).is('img') && $(e.target).parent().is('a') ) ) ) {"
								//	Get the href of the user profile link:
								.	"\n				window.location = cbUserURLs[this.id.substr(3)];"
								//	And avoid the <a> link being followed:
								.	"\n				return false;"
								.	"\n			}"
								.	"\n		} );"
								.	"\n	}"
								;

		$_CB_framework->outputCbJQuery( $jsClickTr );

/*
								//	Add Javascript to pagination of list
		$jsPagination			=	"	$('#cbUserList a.pagenav').click( function() {"
								//	Get the href of the pagination link:
								.	"\n		var href = $(this).attr('href');"
								//	Get the page limitstart value:
								.	"\n		var matches = /limitstart=(\\d*)/.exec(href);"
								.	"\n		if ( matches && matches.length == 2 ) {"
								//	Set limitstart input:
								.	"\n			$('input#cbListlimitstart').val( matches[1] );"
								//	Submit the form, so the values are taken:
								.	"\n			$('form#adminForm').submit();"
								//	And avoid the <a> link being followed:
								.	"\n			return false;"
								.	"\n		}"
								//	Link doesn't match, simply follow link:
								.	"\n		return true;"
								.	"\n	} );"
								;

		$_CB_framework->outputCbJQuery( $jsPagination );
*/

		// list title:

?>
<div class="cbUsersList"><div id="cbUsersListInner">
  <form class="cb_form" name="adminForm" id="adminForm" method="get" action="<?php echo /* cbSef */ ($ue_base_url."&amp;action=search");	// on purpose without SEF, as joomla 1.0/mambo 4.5.5 core sef doesn't work with this.
  ?>" >
    <input type="hidden" name="option" value="com_comprofiler" />
    <input type="hidden" name="task" value="usersList" />
    <input type="hidden" name="Itemid" value="<?php echo $option_itemid; ?>" />
    <input type="hidden" name="limitstart" id="cbListlimitstart" value="0" />
	<div class="cbUserListHeadTitle">
<?php
		if ( ( $lists['plists'] !== null ) || ( count( $lists ) > 1 ) || TRUE ) {		//TBD IF ALLOW SEARCH:
?>

		<div class="cbUserListChanger">
<?php
			// selector for user-list:
			if ( ( $lists['plists'] !== null ) || ( count( $lists ) > 1 ) ) {
				foreach ( $lists as $kname => $ncontent ) {
?>

			<div class="cbUserListChangeItem cbUserList<?php echo $kname; ?>"><?php
				echo $ncontent;
			?></div>

<?php
				}
			}
			if ( count( $searchableFields ) > 0 ) {
				if ( $search === null ) {
?>
			<div class="cbUserListSearchButtons" id="cbUserListsSearchTrigger"><a class="pagenav" href="#"><?php echo _UE_SEARCH_USERS; ?></a></div>
<?php
				} else {
?>
			<div id="cbUserListListAll"><a class="pagenav" href="<?php echo cbSef($ue_base_url); ?>" onclick="javascript:adminForm.search.value=''"><?php echo _UE_LIST_ALL; ?></a></div>
<?php
				}
			}
?>
		</div>
<?php
		}
			// List title:
?>

		<div class="contentheading cbUserListTitle"><?php echo htmlspecialchars( $listTitle ); ?></div>
<?php
		if ( TRUE && trim( $listDescription ) ) {		// to remove description from front-end display as was before CB 1.2: change TRUE to FALSE.
			// List description:
?>

   		<div class="contentdescription cbUserListDescription"><?php echo $listDescription; ?></div>
<?php
		}
		
		// users-count:
?>

	<div class="contentdescription cbUserListResultCount"><?php
		if ( ( $search !== null) || ( $row->filterfields != '' ) ) {
			echo "<strong>" . $total . "</strong> " . _UE_USERPENDAPPRACTION . ":";
		} else {
			echo $_CB_framework->getCfg( 'sitename' ) . " " . _UE_HAS . " <strong>" . $total . "</strong> " . _UE_USERS;
		}
	  ?></div>
		<div class="cbClr"></div>
<?php

		if ( count( $searchableFields ) > 0 ) {

			// Searchable fields appearing in the users list:
			// Search box:
			//TBD: display if there is a search criteria:
			if ( $search === null ) {
							//	Show the "Search" button:
				$jsSearch	=	"	$('#cbUserListsSearchTrigger').show();"
							//	Hide  the Search Criteria part and Results title:
							.	"\n	$('#cbUserListsSearcher').hide();"
							//	When button <a> link is clicked:
							.	"\n	$('#cbUserListsSearchTrigger').click( function() {"
							//	Hide the button:
							.	"\n		$('#cbUserListsSearchTrigger').hide('medium', function() {"
							//	Show the Search Criteria part:
							.	"\n			$('#cbUserListsSearcher').slideDown('slow');"
							.	"\n		} );"
							//	And avoid the <a> link being followed:
							.	"\n		return false;"
							.	"\n	} );"
							;
				$_CB_framework->outputCbJQuery( $jsSearch );
			} else {
				/*
				$ajaxCode	=	"$('#cbUserListsSearchTrigger').hide();"
							.	"$('#cbUserListsSearcher').show();"
							.	"} );"
							;
				$_CB_framework->outputCbJQuery( $ajaxCode );
				*/
			}
							//	When a search kind ('is', 'is not', 'contains', etc) is clicked (change does not work correctly in some safari 2 and IE 6 versions):
			$searchTabJs	=	"\n{"
							.	"\n	function cbsearchkrit(thisSelect) {"
							//	Get value of the selected option:
							.	"\n		var kindval = $(thisSelect).val();"
							.	"\n		if ( kindval == '' ) {"
							//	Hide the search criteria if there is 'no preference' selected:
							.	"\n			$(thisSelect).parent( 'div' ).next('div.cbSearchCriteria').slideUp('slow');"
							.	"\n		} else {"
							//	Otherwise show the search criteria:
							.	"\n			$(thisSelect).parent( 'div' ).next('div.cbSearchCriteria').slideDown('slow');"
							//	Check for search kind being precise search:
							.	"\n			if ( ( kindval == 'is' ) || ( kindval == 'isnot' ) ) {"
							//	For radio buttons, insure they are (again) radios: unfortunately, DOM doesn't allow to change type of input on the fly, so do it by regex replacing html:
							.	"\n				$(thisSelect).parent('div').next('div.cbSearchCriteria.cb__js_radio').find('input:checkbox').parent().each( function() {"
							.	"\n				    return $(this).html( $(this).html().replace(/(name=)(\"?)([^\"\\[ >]+)(\\[\\])(\"?)([ >])/g, '\$1\"\$3\"\$6').replace(/type=\"?checkbox\"?/g,'type=\"radio\"') );"
							.	"\n				} );"
							//	For single-selects, insure they are not multiple anymore:
							.	"\n				$(thisSelect).parent('div').next('div.cbSearchCriteria.cb__js_select').each( function() {"
							.	"\n				    return $(this).html( $(this).html().replace(/(name=)(\"?)([^\"\\[ >]+)(\\[\\])(\"?)([ >])/g, '\$1\"\$3\"\$6').replace(/multiple(=(\"?)multiple(\"?))?/gi,'') );"
							.	"\n				} );"
							.	"\n			} else {"
							//	If search criteria is multiple, then make also radios into checkboxes (and below single-selects into multi-selects):
							.	"\n				$(thisSelect).parent('div').next('div.cbSearchCriteria.cb__js_radio').find('input:radio').parent().each( function() {"
							.	"\n				    return $(this).html( $(this).html().replace(/(name=)(\"?)([^\"\\[ >]+)(\\[\\])?(\"?)([ >])/g, '\$1\"\$3\\[\\]\"\$6').replace(/type=\"?radio\"?/g,'type=\"checkbox\"') );"
							.	"\n				} );"
							.	"\n				$(thisSelect).parent('div').next('div.cbSearchCriteria.cb__js_select').each( function() {"
							.	"\n				    return $(this).html( $(this).html().replace(/(name=)(\"?)([^\"\\[ >]+)(\\[\\])?(\"?)([ >])/g, '\$1\"\$3\\[\\]\"\$6').replace(/(<select )/gi,'\$1multiple=\"multiple\" ').replace(/size=(\"?)[^\" >]*(\"?)/g,'size=\"0\"') );"
							.	"\n				} );"
							.	"\n			}"
							.	"\n		}"
							.	"\n	}"
							.	"\n	$('div.cbSearchKind select').click( function() {"
							.	"\n		cbsearchkrit( this );"
							//	At page startup fires the click event, which executes the callback just defined above:
							.	"\n	} ).click();"
							.	"\n	$('div.cbSearchKind select').change( function() {"
							.	"\n		cbsearchkrit( this );"
							//	At page startup fires the click event, which executes the callback just defined above:
							.	"\n	} );"
							.	"\n}"
						/*
							=	"	$('.cbSearchCriteria').each( function() {"
							.	"\n		if ( $(this).prev().children('select')[0].val() == '' ) {"
							.	"\n			$(this).hide();"
							.	"\n		}"
							.	"\n	} );"
							
							.	"\n		var searchkind = $(this).prev().children('select')[0];"
							.	"\n		var searchcrit = this;"
							.	"\n		$(this).children('input,select').each( function() {"
							.	"\n			if ( $(this).value() == '' ) {"
							.	"\n				$(searchcrit).hide();"
						*/
							;
			$_CB_framework->outputCbJQuery( $searchTabJs );

?>
		<div class="contentdescription cbUserListSearch" id="cbUserListsSearcher">
			<div class="componentheading"><?php echo cbReplaceVars( _UE_SEARCH_CRITERIA, $myUser ); ?></div>
<?php /* old method:
			<div class="cbUserListSearchBox">
			  <div>
				<input type="text" name="search" class="inputbox" size="15" maxlength="100" value="<?php echo htmlspecialchars( $search ); ?>" />
				<input type="image" src="<?php echo $adminimagesdir; ?>search.gif" alt="<?php echo _UE_SEARCH; ?>" align="top" style="border: 0px;" />
			  </div>
			  
			</div>
			<div class="cbClr"></div>
		// replaced by next hidden input line:
*/ ?>
			<input type="hidden" name="search" value="" />
			<div class="cbUserListSearchFields">
<?php
			echo $searchTabContent;
?>
				<div class="cbClr"></div>
				<div class="cb_form_buttons_line">
					<input type="submit" class="button" id="cbsearchlist" value="<?php echo _UE_FIND_USERS; ?>" />
				</div>
				<div class="cbClr"></div>
			</div>
<?php
			if ( count( $pluginAdditions['search'] ) ) {
				echo '<div id="cbUserListSearchPlugins"><div>' . implode( '</div><div>', $pluginAdditions['search'] ) . '</div></div>';
			}
			if ( $searchmode == 0 ) {
?>
			<div class="componentheading"><?php echo cbReplaceVars( _UE_SEARCH_RESULTS, $myUser ); ?></div>
<?php
			}
?>

		</div>
<?php
		}
?>

	</div>
<?php
		if ( $searchmode == 0 ) {

			if ( count( $pluginAdditions['header'] ) ) {
				echo '<div id="cbUserListHeader"><div>' . implode( '</div><div>', $pluginAdditions['header'] ) . '</div></div>';
			}
			if ( $showPaging && ( ( $limitstart != 0 ) || ( $limit <= $total ) ) ) {

				// top page links:
?>
	<div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url.$pagingSearch.$spoofAmp, $search); ?></div>
<?php		}	?>

	<hr class="cbUserListHrTop" size="1" />
	<table id="cbUserTable" class="cbUserListTable cbUserListT_<?php echo $row->listid ?>">
	  <thead>
		<tr class="sectiontableheader">
<?php
			// table headers:
	
			$colsNbr = count( $columns );
			foreach ( $columns as $column ) {
				echo "\t\t\t<th><b>" . getLangDefinition( $column->title ) . "</b></th>\n";
			}
?>

		</tr>
	  </thead>
	  <tbody>
<?php
		// table content:

		$i = 0;
		if (is_array($users) && count($users)>0) {
			foreach($users as $user) {
				$class = "sectiontableentry" . ( 1 + ( $i % 2 ) );		// evenodd class

				if($ueConfig['allow_profilelink']==1) {
					$style = "style=\"cursor:hand;cursor:pointer;\"";
					$style .= " id=\"cbU".$i."\"" ;
					// $style .= " onclick=\"javascript:window.location='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$user->id.getCBprofileItemid( true ))."'\"";
				} else {
					$style = "";
				}
				if ( $user->banned ) {
					echo "\t\t<tr class=\"$class\"><td colspan=\"".$colsNbr."\"><span class=\"error\" style=\"color:red;\">"._UE_BANNEDUSER." ("._UE_VISIBLE_ONLY_MODERATOR.") :</span></td></tr>\n";
				}
				echo "\t\t<tr class=\"$class\" ".$style.">\n";
	
				foreach ( $columns as $colIdx => $column ) {
					echo "\t\t\t<td valign=\"top\" class=\"cbUserListCol" . $colIdx . "\">" . HTML_comprofiler::getUserListCell( $user, $column, $allFields ) . "\t\t\t</td>\n";
				}
				echo "\t\t</tr>\n";
				$i++;
			}
		} else {
			echo "\t\t<tr class=\"sectiontableentry1\"><td colspan=\"".$colsNbr."\">"._UE_NO_USERS_IN_LIST."</td></tr>\n";
		}
?>
	  </tbody>
	</table>	

	<hr class="cbUserListHrBottom" size="1" />
<?php	if ( $showPaging && ( ( $limitstart != 0 ) || ( $limit <= $total ) ) ) {

			// bottom page links:
?>

	<div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url.$pagingSearch.$spoofAmp, $search); ?></div>
<?php	}

		if ( count( $pluginAdditions['footer'] ) ) {
			echo '<div id="cbUserListFooter"><div>' . implode( '</div><div>', $pluginAdditions['footer'] ) . '</div></div>';
		}
	}		// end of if ( $searchmode == 0 )
	if ( $cbSpoofString ) {
		echo cbGetSpoofInputTag( null, $cbSpoofString );
	}
?>

  </form>
</div><div class="cbClr"> </div></div><div class="cbClr"> </div>
<?php
	}	// end function usersList

	function getUserListCell( &$user, &$column, &$fields ) {
		global $_PLUGINS;

		$html				=	array();		
		
		foreach ( $column->fields as $fieldId ) {
 			$field			=	$fields[$fieldId];

			$value			=	$_PLUGINS->callField( $field->type, 'getFieldRow', array( &$field, &$user, 'html', 'none', 'list' ), $field );

			if ( $value !== null ) {
				$title		=	'';
				if  ( $column->captions ) {
					$title	=	'<span class="cbUserListFieldTitle cbUserListFT_' . $field->name . '">'
							.	$_PLUGINS->callField( $field->type, 'getFieldTitle', array( &$field, &$user, 'html', 'list' ), $field )
							.	':'
							.	'</span> ';
				}
				// done at db query stage: $oField->params			=	new cbParamsBase( $oField->params );
				$html[]		=	'<div class="cbUserListFieldLine">'
							.	$title
							.	'<span class="cbListFieldCont cbUserListFC_' . $field->name . '">'
							.	$value
							.	'</span>'
							.	'</div>';
			}
		}
		return "\n\t\t\t\t" . implode( "\n\t\t\t\t", $html ) . "\n";
	}

/******************************
Registration Functions
******************************/

	function confirmation() {
		?>
	<div class="componentheading"><?php echo _UE_SUBMIT_SUCCESS; ?></div><br />
    <table cellspacing="0" cellpadding="5" align="center" width="90%">
		<tr>
			<td class="fieldCell"><?php echo _UE_SUBMIT_SUCCESS_DESC; ?></td>
		</tr>
	</table>
<?php
	}
	
	function lostPassForm($option) {
		global $_CB_framework, $ueConfig, $_PLUGINS;
		
		$_PLUGINS->loadPluginGroup('user');
		$results = $_PLUGINS->trigger( 'onLostPassForm', array( 1 ));	//$ui=1
		if ($_PLUGINS->is_errors()) {
			echo "<script type=\"text/javascript\">alert(\"".$_PLUGINS->getErrorMSG()."\"); window.history.go(-1); </script>\n";
			exit();
		}

		$cbSpoofField			=	cbSpoofField();
		$cbSpoofString			=	cbSpoofString( null, 'registerForm' );
		$regAntiSpamFieldName	=	cbGetRegAntiSpamFieldName();
		$regAntiSpamValues		=	cbGetRegAntiSpams();

		$checkUsername			=	( ( isset( $ueConfig['reg_username_checker'] ) ) && ( $ueConfig['reg_username_checker'] ) );
		$checkEmail				=	( ( isset( $ueConfig['reg_email_checker'] ) ) && ( $ueConfig['reg_email_checker'] > 1 ) );

		outputCbTemplate( 1 );
		ob_start();
/*
$('#adminForm').validate( {
		errorClass: 'cb_result_warning',
        rules: { 
            checkusername: { 
                required: false, 
                minlength: 3 //, 
                			// remote: "users.php" 
            }, 
/*            password: { 
                required: true, 
                minlength: 5 
            }, 
            password_confirm: { 
                required: true, 
                minlength: 5, 
                equalTo: "#password" 
            }, 
*
            checkemail: { 
                required: true, 
                email: true, 
      //          remote: "emails.php" 
            }, 
        }, 
        messages: { 
            checkusername: { 
                required: "Enter a username", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                remote: jQuery.format("{0} is already in use") 
            }, 
/*
            password: { 
                required: "Provide a password", 
                rangelength: jQuery.format("Enter at least {0} characters") 
            }, 
            password_confirm: { 
                required: "Repeat your password", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                equalTo: "Enter the same password as above" 
            }, 
*
            checkemail: { 
                required: "Please enter a valid email address", 
                minlength: "Please enter a valid email address", 
                remote: jQuery.format("{0} is already in use") 
            }, 
        },
        errorPlacement: function(error, element) { 
            if ( element.is(":radio") ) 
                error.appendTo( element.parent().next().next() ); 
            else if ( element.is(":checkbox") ) 
                error.appendTo ( element.next() ); 
            else 
                // error.appendTo( element.parent().next() );
                error.appendTo( element.parent().next().children()[0] );
        }
} );
*/
/*
$('#adminForm').ajaxForm( {	url: '< ?php echo $_CB_framework->getCfg( 'live_site' ); ? >/index2.php?no_html=1&output=raw',
							target: '#cb_lost_username_passwd_content',
							beforeSubmit: function(formData, jqForm, options) {
								$('#cb_line_lostbutton').fadeOut('fast', function() { $('#cb_line_lostbutton').html('<img src=\"< ?php echo $_CB_framework->getCfg( 'live_site' ); ?>/components/com_comprofiler/images/wait.gif\" /> <?php echo _UE_CHECKING; ? >').fadeIn('fast'); } );
								return true;
							},
							success: function(responseText, statusText) {
								alert('Got reply !status: ' + statusText + '\n\nresponseText: \n' + responseText + 
    							      '\n\nThe output div should have already been updated with the responseText.'); }
						   } );
*/

		// checkboxes onchange trigger only on blur:
?>
$.fn.cb_uncheck = function() {
	return this.each( function() {
		this.checked = false;
	});
};
$('#boxLostUsername,#boxLostPassword').click( function() {
	if ( $('#boxLostUsername').get(0).checked ) {
		$('#cb_step1_form').slideDown('medium');
		$('#cb_line_checkusername').slideUp('medium');
		if ( $('#boxLostPassword').get(0).checked ) {
			$('#cb_lost_username_password').slideDown('medium');
			$('#cb_lost_username,#cb_lost_password').slideUp('medium');
		} else {
			$('#cb_lost_username').slideDown('medium');
			$('#cb_lost_password,#cb_lost_username_password').slideUp('medium');
		}
	} else {
		if ( $('#boxLostPassword').get(0).checked ) {
			$('#cb_step1_form,#cb_lost_password,#cb_line_checkusername').slideDown('medium');
			$('#cb_lost_username,#cb_lost_username_password').slideUp('medium');
		} else {
			$('#cb_lost_username,#cb_lost_password,#cb_lost_username_password,#cb_step1_form').slideUp('medium');
		}
	}
	return true;
} );

$('#cb_lost_username,#cb_lost_password,#cb_lost_username_password,#cb_step1_form,#cb_line_checkusername').hide();
$('#boxLostUsername,#boxLostPassword').cb_uncheck();
$('#checkusername,#checkemail').val('');
$('#cbsendnewuspass').attr('disabled',true);

$('#checkusername,#checkemail').keyup( function() {
	var respField = $('#'+$(this).attr('id')+'Response');
	if ( respField.html() != '&nbsp;' ) {
		respField.fadeOut('medium', function() { respField.html('&nbsp;'); } );
	}
	if ( $.trim( $('#checkusername').val() ) == '' ) {
		if ( $.trim( $('#checkemail').val() ) == '' ) {
			$('#cbsendnewuspass').val('<?php echo _UE_BUTTON_SEND_USERNAME_PASS; ?>').attr('disabled',true);
		} else {
			$('#cbsendnewuspass').attr('disabled',false).val('<?php echo _UE_BUTTON_SEND_USERNAME; ?>');
		}
	} else {
		$('#cbsendnewuspass').attr('disabled',false).val('<?php echo _UE_BUTTON_SEND_PASS; ?>');
	}
	return true;
} );
<?php 	if ( $checkUsername || $checkEmail ) {	?>

$('#checkusername,#checkemail').change( function() {
	if ( ( $(this).val() != '' ) && ( $('#'+$(this).attr('id')+'Response').length ) ) {
		$('#'+$(this).attr('id')+'Response').html('<img alt="" src=\"<?php echo $_CB_framework->getCfg( 'live_site' ); ?>/components/com_comprofiler/images/wait.gif\" /> <?php echo _UE_CHECKING; ?>').fadeIn('fast');
		var cbInputField = this;
		$.ajax( {	type: 'POST',
					url: '<?php echo $_CB_framework->getCfg( 'live_site' ); ?>/index2.php?option=com_comprofiler&task=perform'+$(this).attr('id')+'&function=testexists&no_html=1&format=raw',
					data: 'value=' + encodeURI( $(this).val() ) + '&<?php
					echo $cbSpoofField; ?>=' + encodeURI('<?php echo $cbSpoofString; ?>') + '&<?php
					echo $regAntiSpamFieldName; ?>=' + encodeURI('<?php echo $regAntiSpamValues[0]; ?>'),
					success: function(response) { var respField = $('#'+$(cbInputField).attr('id')+'Response'); respField.fadeOut('fast', function() { respField.html(response).fadeIn('fast'); } ); },
					dataType: 'html'
		});
	} else {
		$('#'+$(this).attr('id')+'Response').html('&nbsp;');
	}
} );

<?php
		}
		$jsContent	=	ob_get_contents();
		ob_end_clean();
		$_CB_framework->outputCbJQuery( $jsContent /* , array( 'form', 'validate' ) */ );

//TODO: Add ability to change password on form.
		?>
<div class="componentheading"><?php echo _UE_LOST_USERNAME_OR_PASSWORD; ?></div>
<div class="cbPageOuter" id="cbLostPasswordPage"><div class="cbPageInner">
	<div class="contentpaneopen" id="cb_lost_username_passwd_content">
		<form action="<?php echo cbSef('index.php'); ?>" class="cb_form" id="adminForm" name="adminForm" method="post">
			<div class="cb_form_line" id="cb_lost_choice">
				<label for="cb_lost_choice"><?php echo _UE_REMINDER_NEEDED_FOR; ?>:</label>
				<div class="cb_field">
					<div><input type="checkbox" id="boxLostUsername" name="typeofloose[]" value="username" /> <label for="boxLostUsername"><?php echo _UE_LOST__USERNAME; ?></label></div>
					<div><input type="checkbox" id="boxLostPassword" name="typeofloose[]" value="password" /> <label for="boxLostPassword"><?php echo _UE_LOST__PASSWORD; ?></label></div>
				</div>
			</div>
			<div class="cb_form_instructions">
				<ul>
					<li id="cb_lost_username"><?php echo getLangDefinition(_UE_LOST_USERNAME_DESC); ?></li>
					<li id="cb_lost_password"><?php echo getLangDefinition(_UE_LOST_PASSWORD_DESC); ?></li>
					<li id="cb_lost_username_password"><?php echo getLangDefinition(_UE_LOST_USERNAME_PASSWORD_DESC); ?></li>
				</ul>
			</div>
			<div id="cb_step1_form">
				<div class="cb_form_line" id="cb_line_checkusername">
					<label for="checkusername"><?php echo _PROMPT_UNAME; ?></label>
					<div class="cb_field">
						<div><input type="text" name="checkusername" id="checkusername" class="inputbox" size="30" maxlength="25" /></div>
<?php 	if ( $checkUsername ) { ?>

						<div class="cb_result_container"><div id="checkusernameResponse">&nbsp;</div></div>
<?php	}	?>

					</div>
				</div>

				<div class="cb_form_line" id="cb_line_checkemail">
					<label for="checkemail"><?php echo _PROMPT_EMAIL; ?></label>
					<div class="cb_field">
						<div><input type="text" name="checkemail" id="checkemail" class="inputbox" size="30" /></div>
<?php 	if ( $checkEmail ) { ?>

						<div class="cb_result_container"><div id="checkemailResponse">&nbsp;</div></div>
<?php	}	?>

					</div>
				</div>
<?php
		if (is_array($results)) {
			foreach ( $results as $r ) {
?>
				<div class="cb_form_line" id="cb_line_lostbutton">
					<label<?php if ( isset( $r[2] ) ) echo ' for="' . $r[2] . '"'; ?>><?php echo $r[0]; ?></label>
					<div class="cb_field"><?php echo $r[1]; ?></div>
				</div>
<?php
			}
		}
?>

				<div class="cb_form_buttons_line">
					<input type="submit" class="button" id="cbsendnewuspass" value="<?php echo _UE_BUTTON_SEND_USERNAME_PASS; ?>" />
				</div>
			</div>
			<input type="hidden" name="option" value="<?php echo $option;?>" />
			<input type="hidden" name="task" value="sendNewPass" />
			<?php
		echo cbGetSpoofInputTag( 'lostPassForm' );
		echo "\t\t\t" . cbGetRegAntiSpamInputTag( $regAntiSpamValues );
?>
		</form>
	</div>
</div></div>
<div class="cbClr"> </div>
<?php
	}

	function registerForm( $option, $emailpass, &$user, $regErrorMSG = null) {
		global $_CB_framework, $_CB_database, $ueConfig, $_POST;

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
		if ( isset( $ueConfig['reg_show_login_on_page'] ) && ( $ueConfig['reg_show_login_on_page'] == 1 ) && ! $regErrorMSG ) {
			$params				=	null;
			$login_module_file	=	$_CB_framework->getCfg( 'absolute_path' ) . '/modules/' . ( checkJversion() > 0 ? 'mod_cblogin/' : '' ) . 'mod_cblogin.php';
			if ( file_exists( $login_module_file ) ) {
				$reg_show_login_on_page	=	true;
				$_CB_database->setQuery( "SELECT params from #__modules WHERE module = 'mod_cblogin' ORDER BY ordering LIMIT 1" );
				$raw_params		=	$_CB_database->loadResult();
				$params			=&	new cbParamsBase( $raw_params );
				
				if ( isset( $ueConfig['reg_intro_msg'] ) && $ueConfig['reg_intro_msg'] ) {
?>
					<div class="componentheading" id="cb_comp_login_register_head"><?php echo _LOGIN_REGISTER_TITLE; ?></div><div class="cb_comp_outer"><div class="cb_comp_inner">
					<div class="contentpaneopen" id="cb_comp_login_register_content"><?php echo stripslashes(getLangDefinition($ueConfig['reg_intro_msg'])); ?></div>
					</div></div>
<?php
				}
				echo '<div class="cbclearboth"><div id="cb_comp_login"><div class="componentheading">' . _LOGIN_TITLE . '</div><div class="cb_comp_outer"><div class="cb_comp_inner">';
				include( $login_module_file );
				echo '</div></div></div><div id="cb_comp_register">';
			}
		}
?>
<div class="componentheading"><?php echo _REGISTER_TITLE; ?></div><div class="contentpaneopen"><div class="cb_comp_outer"><div class="cb_comp_inner cbRegistration">
<?php
		if ( ( ! isset( $ueConfig['reg_show_icons_explain'] ) ) || in_array( $ueConfig['reg_show_icons_explain'], array( 1, 3 ) ) ) {
			echo '<div style="align:center;" id="cbIconsTop">';
			echo getFieldIcons(1,true,true,"","",true);
			echo '</div>';
		}
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
		<input type="hidden" name="task" value="saveregisters" />
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
			echo getFieldIcons(1,true,true,"","",true);
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


/******************************
Moderation Functions
******************************/

	function reportUserForm($option,$uid)
	{
	global $_CB_framework, $ueConfig, $Itemid;
	if($ueConfig['allowUserReports']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			return;
	}
	HTML_comprofiler::outputMosFormVal();
?>
<!-- TAB -->
<div class="componentheading"><?php echo _UE_REPORTUSER_TITLE; ?></div>
<form action='<?php
	echo cbSef('index.php?option=com_comprofiler&amp;task=reportUser'.($Itemid ? "&amp;Itemid=".(int) $Itemid : ""));
		?>' method="post" id="adminForm" name="adminForm" onsubmit="return submitbutton(this)">
<table width='100%' border='0' cellpadding='4' cellspacing='2'>
<tr align='left' valign='middle'>
	<td colspan="4" class="titleCell">

<?php echo _UE_REPORTUSERSACTIVITY; ?></td></tr>
<tr><td colspan="4" align="center" class="fieldCell">
<textarea mosReq="1" mosLabel="User Report" mosLength="4000" cols="50" rows="8" name="reportexplaination"></textarea>
</td></tr>
<tr><td colspan="4" align="center">
<input class="button" type="submit" value="<?php echo _UE_SUBMITFORM; ?>" />
</td></tr>
</table>
<input type="hidden" name="reportedbyuser" value="<?php echo $_CB_framework->myId(); ?>" />
<input type="hidden" name="reporteduser" value="<?php echo $uid; ?>" />
<input type="hidden" name="reportform" value="0" />
<?php
	echo cbGetSpoofInputTag( 'reportUserForm' );
?>
</form>
<?php
}

	function banUserForm($option,$uid,$act,$orgbannedreason)
	{
	global $_CB_framework, $ueConfig, $Itemid;
	if($ueConfig['allowUserBanning']==0) {
			echo _UE_FUNCTIONALITY_DISABLED;
			return;
	}
	HTML_comprofiler::outputMosFormVal();
?>
<!-- TAB -->
<div class="componentheading"><?php if( $_CB_framework->myId() != $uid ) echo _UE_REPORTBAN_TITLE; ELSE echo _UE_REPORTUNBAN_TITLE;; ?></div>
<form action='<?php 
	echo cbSef('index.php?option=com_comprofiler&amp;task=banProfile&amp;act='.(( $_CB_framework->myId() != $uid ) ? '1': '2').'&amp;user='.$uid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
		?>' method="post" id="adminForm" name="adminForm" onsubmit="return submitbutton(this)">
<table width='100%' border='0' cellpadding='4' cellspacing='2'>
<tr align='left' valign='middle'>
	<td colspan="4" class="titleCell">
<?php if( $_CB_framework->myId() != $uid ) echo _UE_BANREASON; ELSE echo _UE_UNBANREQUEST; ?></td></tr>
<tr><td colspan="4" align="center" class="fieldCell">
<textarea mosReq="1" mosLabel='<?php if( $_CB_framework->myId() != $uid ) echo htmlspecialchars( _UE_BANREASON ); ELSE echo htmlspecialchars( _UE_UNBANREQUEST ); ?>' mosLength="4000" cols="60" rows="5" name="bannedreason"></textarea>
</td></tr>
<tr><td colspan="4" align="center">
<input class="button" type="submit" value="<?php echo _UE_SUBMITFORM; ?>" />
</td></tr>
</table>
<input type="hidden" name="bannedby" value="<?php echo $_CB_framework->myId(); ?>" />
<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
<input type="hidden" name="orgbannedreason" value="<?php echo $orgbannedreason; ?>" />
<input type="hidden" name="reportform" value="0" />
<?php
	echo cbGetSpoofInputTag( 'banUserForm' );
?>
</form>
<?php
}

function pendingApprovalUsers($option,$users) {
	global $ueConfig, $Itemid;

?>
<div class="componentheading"><?php echo _UE_MODERATE_TITLE; ?></div>
<br />
<?php
	if(count($users)<1) {
		echo _UE_NOUSERSPENDING;
		return;
	} 
?>    
<br />                    
<div class='contentheading'><?php echo _UE_USERAPPROVAL_MODERATE; ?></div><br />
          <form action='<?php echo cbSef("index.php?option=$option".($Itemid ? "&amp;Itemid=". (int) $Itemid : "")); ?>' method='post' id='adminForm' name='adminForm'>
          <table width='100%' border='0' cellpadding='4' cellspacing='2'>
		<thead><tr align='left'>
		<th>&nbsp;</th>
		<th><?php echo _UE_USER; ?></th>
		<th><?php echo _UE_EMAIL; ?></th>
		<th><?php echo _UE_REGISTERDATE; ?></th>
		<th><?php echo _UE_COMMENT; ?></th>
		</tr></thead>	
<?php  
		for($i = 0; $i < count($users); $i++) {
			echo "<tr align='left' valign='middle'>";
			echo "<td><input id='u".$users[$i]->id."' type=\"checkbox\" checked=\"checked\" name=\"uids[]\" value=\"".$users[$i]->id."\" /></td>";
			echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$users[$i]->id.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($users[$i]->name,$users[$i]->username,$ueConfig['name_format']). "</a></td>";
			echo "<td>".$users[$i]->email."</td>";
			echo "<td>".cbFormatDate($users[$i]->registerDate)."</td>";
			echo "<td><textarea name='comment".$users[$i]->id."' cols='20' rows='3'></textarea></td>";
			echo "</tr>";
		}
		echo '<tr align="center" valign="middle"><td colspan="5">'
		.'<input class="button" style="background-color:#CFC;" onclick="this.form.task.value=\'approveUser\';this.form.submit();" type="button" value="'._UE_APPROVE.'" />'
		.'&nbsp;&nbsp;&nbsp;'
		.'<input class="button" style="background-color:#FCC;" onclick="this.form.task.value=\'rejectUser\';this.form.submit();" type="button" value="'._UE_REJECT.'" /></td></tr>';
		echo "</table>\n";
		echo "<input type='hidden' name='task' value='' />\n";
		echo "<input type='hidden' name='option' value='".$option."' />\n";
		echo cbGetSpoofInputTag( 'pendingApprovalUsers' );
		echo "</form>\n";
}
function manageConnections($connections,$actions,$connecteds=null) {
	global $ueConfig, $_REQUEST, $Itemid;

	$ui=1;
	outputCbTemplate($ui);
	addCbHeadTag( 1, initToolTip(1) );
?>
<div class="contentheading"><?php echo _UE_MANAGECONNECTIONS; ?></div><br />
<br />
<script type="text/javascript"><!--//--><![CDATA[//><!--
var tabPanemyCon;
function showCBTab( sName ) {
	if (typeof tabPanemyCon != "undefined" ) {
		switch ( sName.toLowerCase() ) {
			case "<?php echo strtolower(_UE_MANAGEACTIONS); ?>":
			case "manageactions":
			case "0":
				tabPanemyCon.setSelectedIndex( 0 );
				break;
			case "<?php echo strtolower(_UE_MANAGECONNECTIONS); ?>":
			case "manageconnections":
			case "1":
				tabPanemyCon.setSelectedIndex( 1 );
				break;
			case "<?php echo strtolower(_UE_CONNECTEDWITH); ?>":
			case "connectedfrom":
			case "2":
				tabPanemyCon.setSelectedIndex( 2 );
				break;
		}
	}
}

  function confirmSubmit() {
	if (confirm("<?php echo _UE_CONFIRMREMOVECONNECTION; ?>"))
		return true ;
	else
		return false ;
}
//--><!]]></script>
<?php
	$tabs = new cbTabs( 0, $ui);
	$cTypes=explode("\n",$ueConfig['connection_categories']);
	$connectionTypes=array();
	foreach($cTypes as $cType) {
		if(trim($cType)!=null && trim($cType)!="") $connectionTypes[]=moscomprofilerHTML::makeOption( trim($cType) , getLangDefinition(trim($cType)) );
	}
	echo $tabs->startPane("myCon");
	
	// Tab 0: Manange Actions:
	echo $tabs->startTab("myCon",_UE_MANAGEACTIONS." (".count($actions).")","action");
	if(!count($actions)>0) {
		echo "\t\t<div class=\"tab_Description\">"._UE_NOACTIONREQUIRED."</div>\n";
	} else {
		echo '<form method="post" action="'
			. cbSef('index.php?option=com_comprofiler&amp;task=processConnectionActions'.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
			.	'">';
		echo "\t\t<div class=\"tab_Description\">"._UE_CONNECT_ACTIONREQUIRED."</div>\n";
		// echo "<div style=\"width:100%;text-align:right;\"><input type=\"submit\" class=\"inputbox\"  value=\""._UE_UPDATE."\" /></div>";
		echo "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" width=\"95%\">";
		echo "<tr>";
		echo "<td>";
		foreach($actions AS $action) {
			$conAvatar = null;
			$conAvatar = getFieldValue('image',$action->avatar,$action);
			$onlineIMG = ($ueConfig['allow_onlinestatus']==1) ? getFieldValue('status',$action->isOnline,$action,null,1) : "";
	
			$tipField = "<b>"._UE_CONNECTIONREQUIREDON."</b> : ".dateConverter($action->membersince,'Y-m-d',$ueConfig['date_format']);
			if($action->reason!=null) $tipField .= "<br /><b>"._UE_CONNECTIONMESSAGE."</b> :<br />".htmlspecialchars($action->reason, ENT_QUOTES);
			$tipTitle = _UE_CONNECTIONREQUESTDETAIL;
			$htmltext = $conAvatar;
			$style = "style=\"padding:5px;\"";
			$tooltip = cbFieldTip($ui, $tipField, $tipTitle, $width='250', $icon='', $htmltext, $href='', $style, $olparams='',false);
			
			echo "<div class=\"connectionBox\">";
			echo $onlineIMG.' '.getNameFormat($action->name,$action->username,$ueConfig['name_format'])."<br />"
				.$tooltip
				."<br /><img src=\"components/com_comprofiler/images/tick.png\" border=\"0\" alt=\""._UE_ACCEPTCONNECTION
				."\" title=\""._UE_ACCEPTCONNECTION."\" /><input type=\"radio\"  value=\"a\" checked=\"checked\" name=\"".$action->id
				."action\"/> <img src=\"components/com_comprofiler/images/publish_x.png\" border=\"0\" alt=\""._UE_DECLINECONNECTION
				."\" title=\""._UE_DECLINECONNECTION."\" /><input type=\"radio\" value=\"d\" name=\"".$action->id
				."action\"/><input type=\"hidden\" name=\"uid[]\" value=\"".$action->id."\" />";
			echo " </div>\n";
		}
	
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "<div style=\"width:100%;text-align:right;\"><input type=\"submit\" class=\"inputbox\"  value=\""._UE_UPDATE."\" /></div>";
		echo cbGetSpoofInputTag( 'manageConnections' );
		echo "</form>";
	}
	echo $tabs->endTab();
	
	// Tab 1: Manange Connections:
	echo $tabs->startTab("myCon",_UE_MANAGECONNECTIONS,"connections");
	if(!count($connections)>0) {
		echo "\t\t<div class=\"tab_Description\">"._UE_NOCONNECTIONS."</div>\n";
	} else {
?>
	<form action='<?php 
	echo cbSef('index.php?option=com_comprofiler&amp;task=saveConnections'.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""));
		?>' method='post' name='userAdmin'>
	<div class="tab_Description"><?php echo _UE_CONNECT_MANAGECONNECTIONS; ?></div>
	<table cellpadding="5" cellspacing="0" border="0" width="95%">
	  <thead><tr>
		<th style='text-align:center;'><?php echo _UE_CONNECTION; ?></th>
		<th style='text-align:center;'><?php echo _UE_CONNECTIONTYPE; ?></th>
		<th style='text-align:center;'><?php echo _UE_CONNECTIONCOMMENT; ?></th>
	  </tr></thead>
	  <tbody>
<?php
		$i=1;
		foreach($connections AS $connection) {
			$ks=explode("|*|",trim($connection->type));
			$k = array();
			foreach($ks as $kv) {
				$k[]->value=$kv;
			}
			$list=array();
			$list['connectionType'] = moscomprofilerHTML::selectList( $connectionTypes, $connection->id.'connectiontype[]', 'class="inputbox" multiple="multiple" size="5"', 'value', 'text', $k,0 );
			$conAvatar = null;
			$conAvatar = getFieldValue('image',$connection->avatar,$connection);
			$emailIMG  = getFieldValue('primaryemailaddress',$connection->email,$connection,null,1);
			$pmIMG	   = getFieldValue('pm',$connection->username,$connection,null,1);
			$onlineIMG = ($ueConfig['allow_onlinestatus']==1) ? getFieldValue('status',$connection->isOnline,$connection,null,1) : "";
			if($connection->accepted==1 && $connection->pending==1) $actionIMG = "<img src=\"components/com_comprofiler/images/pending.png\" border=\"0\" alt=\""._UE_CONNECTIONPENDING."\" title=\""._UE_CONNECTIONPENDING."\" /> <a href=\"".cbSef("index.php?option=com_comprofiler&amp;act=connections&amp;task=removeConnection&amp;connectionid=".$connection->memberid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."\" onclick=\"return confirmSubmit();\" ><img src=\"components/com_comprofiler/images/publish_x.png\" border=\"0\" alt=\""._UE_REMOVECONNECTION."\" title=\""._UE_REMOVECONNECTION."\" /></a>";
			elseif($connection->accepted==1 && $connection->pending==0) $actionIMG="<a href=\"".cbSef("index.php?option=com_comprofiler&amp;act=connections&amp;task=removeConnection&amp;connectionid=".$connection->memberid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."\" onclick=\"return confirmSubmit();\" ><img src=\"components/com_comprofiler/images/publish_x.png\" border=\"0\" alt=\""._UE_REMOVECONNECTION."\" title=\""._UE_REMOVECONNECTION."\" /></a>";
			elseif($connection->accepted==0) $actionIMG="<a href=\"".cbSef("index.php?option=com_comprofiler&amp;act=connections&amp;task=acceptConnection&amp;connectionid=".$connection->memberid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."\"><img src=\"components/com_comprofiler/images/tick.png\" border=\"0\" alt=\""._UE_ACCEPTCONNECTION."\" title=\""._UE_ACCEPTCONNECTION."\" /></a> <a href=\"".cbSef("index.php?option=com_comprofiler&amp;act=connections&amp;task=removeConnection&amp;connectionid=".$connection->memberid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."\"><img src=\"components/com_comprofiler/images/publish_x.png\" border=\"0\" alt=\""._UE_REMOVECONNECTION."\" title=\""._UE_DECLINECONNECTION."\" /></a>";
		
			$tipField = "<b>"._UE_CONNECTEDSINCE."</b> : ".dateConverter($connection->membersince,'Y-m-d',$ueConfig['date_format']);
			if($connection->type!=null) $tipField .= "<br /><b>"._UE_CONNECTIONTYPE."</b> : ".getConnectionTypes($connection->type);
			if($connection->description!=null) $tipField .= "<br /><b>"._UE_CONNECTEDCOMMENT."</b> : ".htmlspecialchars($connection->description);
			$tipTitle = _UE_CONNECTEDDETAIL;
			$htmltext = $conAvatar;
			$style = "style=\"padding:5px;\"";
			$tooltip = cbFieldTip($ui, $tipField, $tipTitle, $width='200', $icon='', $htmltext, $href='', $style, $olparams='',false);
		
			echo "\n<tr style='vertical-align:top;' class='sectiontableentry".$i."'>";
			echo "\n\t<td style='text-align:center;'>".$onlineIMG.' '.getNameFormat($connection->name,$connection->username,$ueConfig['name_format'])
			."<br />".$tooltip."<br />"
			.$actionIMG." <a href=\"".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$connection->memberid.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
			."\"><img src=\"components/com_comprofiler/images/profiles.gif\" border=\"0\" alt=\""._UE_VIEWPROFILE."\" title=\""._UE_VIEWPROFILE
			."\" /></a> ".$emailIMG." ".$pmIMG."</td>";
			echo "\n\t<td style='text-align:center;'>".$list['connectionType']."</td>";
			echo "\n\t<td style='text-align:center;'><textarea cols=\"25\" class=\"inputbox\"  rows=\"5\" name=\"".$connection->id."description\">".$connection->description."</textarea><input type=\"hidden\" name=\"uid[]\" value=\"".$connection->id."\" /></td>";
			echo "\n</tr>";
			$i= ($i==1) ? 2 : 1;
		}
		echo "</tbody>";
		echo "</table><br />";
		echo "<div style=\"width:100%;text-align:right;\"><input type=\"submit\" class=\"inputbox\"  value=\""._UE_UPDATE."\" /></div>";
		echo cbGetSpoofInputTag( 'manageConnections' );
		echo "</form>";
	}
	echo $tabs->endTab();

	// Tab 2: Users connected with me:
	if ( $ueConfig['autoAddConnections'] == 0 ) {
		echo $tabs->startTab( 'myCon', _UE_CONNECTEDWITH, 'connected' );
		if ( ! count( $connecteds ) > 0 ) {
			echo _UE_NOCONNECTEDWITH;
		} else {
			// tooltip params:
			$width				=	'200';
			$icon				=	'';
			$href				=	'';

			echo '<table cellpadding="5" cellspacing="0" border="0" width="95%">';
			echo '<tr>';
			echo '<td>';
			foreach ( $connecteds AS $connected ) {
				$conAvatar		=	null;
				$conAvatar		=	getFieldValue('image',$connected->avatar,$connected);
				$emailIMG		=	getFieldValue('primaryemailaddress',$connected->email,$connected,null,1);
				$pmIMG			=	getFieldValue('pm',$connected->username,$connected,null,1);
				$onlineIMG		=	( $ueConfig['allow_onlinestatus'] == 1 ) ? getFieldValue('status',$connected->isOnline,$connected,null,1) : '';
				if ( $connected->accepted == 1 && $connected->pending == 1 ) {
					$actionIMG	=	'<img src="components/com_comprofiler/images/pending.png" border="0" alt="'._UE_CONNECTIONPENDING.'" title="'._UE_CONNECTIONPENDING.'" /> '
								.	'<a href="'
								.	cbSef('index.php?option=com_comprofiler&amp;act=connections&amp;task=denyConnection&amp;connectionid='.$connected->memberid.($Itemid ? '&amp;Itemid='. (int) $Itemid : ''))
								.	'" onclick="return confirmSubmit();">'
								.	'<img src="components/com_comprofiler/images/publish_x.png" border="0" alt="'._UE_REMOVECONNECTION.'" title="'._UE_REMOVECONNECTION.'" /></a>'
								;
				} elseif ( $connected->accepted == 1 && $connected->pending == 0 ) {
					$actionIMG	=	'<a href="'
								.	cbSef('index.php?option=com_comprofiler&amp;act=connections&amp;task=denyConnection&amp;connectionid='.$connected->referenceid.($Itemid ? '&amp;Itemid='. (int) $Itemid : ''))
								.	'" onclick="return confirmSubmit();">'
								.	'<img src="components/com_comprofiler/images/publish_x.png" border="0" alt="'._UE_REMOVECONNECTION.'" title="'._UE_REMOVECONNECTION.'" /></a>'
								;
				} elseif ( $connected->accepted == 0 ) {
					$actionIMG	=	'<a href="'
								.	cbSef('index.php?option=com_comprofiler&amp;act=connections&amp;task=acceptConnection&amp;connectionid='.$connected->referenceid.($Itemid ? '&amp;Itemid='. (int) $Itemid : ''))
								.	'">'
								.	'<img src="components/com_comprofiler/images/tick.png" border="0" alt="'._UE_ACCEPTCONNECTION.'" title="'._UE_ACCEPTCONNECTION.'" /></a> '
								.	'<a href="'
								.	cbSef('index.php?option=com_comprofiler&amp;act=connections&amp;task=denyConnection&amp;connectionid='.$connected->referenceid.($Itemid ? '&amp;Itemid='. (int) $Itemid : ''))
								.	'" onclick="return confirmSubmit();">'
								.	'<img src="components/com_comprofiler/images/publish_x.png" border="0" alt="'._UE_REMOVECONNECTION.'" title="'._UE_DECLINECONNECTION.'" /></a>'
								;
				}
				$tipField		=	'<b>'._UE_CONNECTEDSINCE.'</b> : '.dateConverter($connected->membersince,'Y-m-d',$ueConfig['date_format']);
				if ( getLangDefinition( $connected->type ) != null ) {
					$tipField	.=	'<br /><b>'._UE_CONNECTIONTYPE.'</b> : '.getLangDefinition($connected->type);
				}
				if ( $connected->description != null ) {
					$tipField	.=	'<br /><b>'._UE_CONNECTEDCOMMENT.'</b> : '.htmlspecialchars($connected->description);
				}
				$tipTitle		=	_UE_CONNECTEDDETAIL;
				$htmltext		=	$conAvatar;
				$style			=	'style="padding:5px;"';
				$tooltip		=	cbFieldTip( $ui, $tipField, $tipTitle, $width, $icon, $htmltext, $href, $style, '',false);

				echo '<div class="connectionBox">';
				echo $actionIMG.'<br />';
				echo $tooltip.'<br />';
				echo $onlineIMG.' '.getNameFormat($connected->name,$connected->username,$ueConfig['name_format']);
				echo '<br /><a href="'.cbSef('index.php?option=com_comprofiler&amp;task=userProfile&amp;user='.$connected->memberid.($Itemid ? '&amp;Itemid='. (int) $Itemid : ''))
				.'"><img src="components/com_comprofiler/images/profiles.gif" border="0" alt="'._UE_VIEWPROFILE
				.'" title="'._UE_VIEWPROFILE.'" /></a> '.$emailIMG.' '.$pmIMG."\n";
				echo " </div>\n";
			}
			echo '</td>';
			echo '</tr>';
			echo '</table>';
		}
		echo $tabs->endTab();	
	}
	echo $tabs->endPane();
	if ( isset($_REQUEST['tab'] ) ) {
		echo "<script type=\"text/javascript\">showCBTab( '" . urldecode( cbGetParam( $_REQUEST, 'tab' ) ) . "' );</script>";
	} elseif ( ! ( count( $actions ) > 0 ) ) {
		echo "<script type=\"text/javascript\">tabPanemyCon.setSelectedIndex( 1 );</script>";
	}
	echo '<div style="clear:both;padding:5px"><a href="' . cbSef( 'index.php?option=com_comprofiler' . getCBprofileItemid( true ) ) . '">' . _UE_BACK_TO_YOUR_PROFILE . '</a></div>';
}

}	// end class HTML_comprofiler

	function moderateBans( $option, $act, $uid ) {
	global $_CB_framework, $_CB_database, $ueConfig, $Itemid, $_REQUEST;
	
	$isModerator=isModerator( $_CB_framework->myId() );
	if ( ( $isModerator == 0 ) || ( ( $act == 2 ) && ( $uid == $_CB_framework->myId() ) ) ) {
		cbNotAuth();
		return;
	}
	$ue_base_url = "index.php?option=com_comprofiler&amp;task=moderateBans".($Itemid ? "&amp;Itemid=". (int) $Itemid : "");	// Base URL string

	if ( $act == 2 ) {
		$query = "SELECT count(*) FROM #__comprofiler WHERE NOT(ISNULL(bannedby)) AND approved=1 AND confirmed=1 AND id=" . (int) $uid;
	} else {
		$query = "SELECT count(*) FROM #__comprofiler WHERE banned=2 AND approved=1 AND confirmed=1 AND id!=".(int) $_CB_framework->myId();
	}
	if(!$_CB_database->setQuery($query)) print $_CB_database->getErrorMsg();
	$total = $_CB_database->loadResult();

	$limitstart	= (int) cbGetParam( $_REQUEST, 'limitstart', 0 );
	if (empty($limitstart)) {
		$limitstart = 0;
	}
	$limit = 20;
	if ($limit > $total) {
		$limitstart = 0;
	}

	$query	=	"SELECT c.id, c.banned, u2.name AS bannedbyname, u2.username as bannedbyusername, u3.name AS unbannedbyname, u3.username as unbannedbyusername, "
			.	"u.name as bannedname, u.username as bannedusername, c.banneddate, c.unbanneddate, c.bannedreason, c.bannedby, c.unbannedby"
			.	"\n FROM #__comprofiler AS c"
			.	"\n INNER JOIN #__users AS u ON u.id=c.id"
			.	"\n INNER JOIN #__users AS u2 ON u2.id= c.bannedby"
			.	"\n LEFT JOIN #__users AS u3 ON  u3.id = c.unbannedby";
	if ( $act == 2 ) {
		$query	.=	"\n WHERE NOT(ISNULL(c.bannedby)) AND c.id = " . (int) $uid;
	} else {
		$query	.=	"\n WHERE c.banned = 2 AND c.id != " . (int) $uid;
	}
	$query	.=	" AND  c.approved = 1 AND c.confirmed = 1";
	$query	.=	"\n LIMIT $limitstart, $limit";
	$_CB_database->setQuery($query);
	$row = $_CB_database->loadObjectList();

	outputCbTemplate(1);
?>
<!-- TAB -->
<div class="componentheading"><?php echo _UE_MODERATE_TITLE; ?></div><br />
<?php
if($total<1) {
	echo _UE_NOUNBANREQUESTS;
	return;
}  
?>                  
<div class='contentheading'><?php echo _UE_UNBAN_MODERATE; ?></div><br /><br />
<div class="tab_Description"><?php echo _UE_UNBAN_MODERATE_DESC; ?></div><br />
     <table width='98%' border='0' cellpadding='4' cellspacing='0'>
		<thead><tr align='left'>
		<th><?php echo _UE_BANNEDUSER; ?></th>
		<th><?php echo _UE_BANNEDREASON; ?></th>
		<th><?php echo _UE_BANNEDON; ?></th>
		<th><?php echo _UE_BANNEDBY; ?></th>
		<th><?php echo _UE_UNBANNEDON; ?></th>
		<th><?php echo _UE_UNBANNEDBY; ?></th>
		<th><?php echo _UE_BANSTATUS; ?></th>
		</tr></thead>	
<?php  
     for($i = 0; $i < count($row); $i++) {
		 $class = "sectiontableentry" . ( 1 + ( $i % 2 ) );
	     echo "<tr align='left' valign='middle' class='".$class."'>";
             echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->id.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->bannedname,$row[$i]->bannedusername,$ueConfig['name_format']). "</a></td>";
	     echo "<td>".nl2br($row[$i]->bannedreason)."</td>";  
	     echo "<td>".dateConverter($row[$i]->banneddate,'Y-m-d',$ueConfig['date_format'])."</td>";
             echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->bannedby.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->bannedbyname,$row[$i]->bannedbyusername,$ueConfig['name_format']). "</a></td>";           
	     echo "<td>".dateConverter($row[$i]->unbanneddate,'Y-m-d',$ueConfig['date_format'])."</td>";
             echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->unbannedby.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->unbannedbyname,$row[$i]->unbannedbyusername,$ueConfig['name_format']). "</a></td>";
             echo "<td>";
             switch ( $row[$i]->banned ) {
             	case 1:
             		echo '<span style="color:red;">' . _UE_BANSTATUS_BANNED  . '</span>';
             		break;
                case 2:
             		echo '<span style="color:orange;">' . _UE_BANSTATUS_UNBAN_REQUEST_PENDING  . '</span>';
             		break;          
             	default:
              		echo '<span style="color:green;">' . _UE_BANSTATUS_PROCESSED  . '</span>';
            		break;
             }
             echo "</td>";
	     echo '</tr>';
     }
     echo '</table>';
     if ($total > $limit) { ?>
<hr /><div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div>
<?php
     }
}


	function moderateReports($option) {
	global $_CB_framework, $_CB_database, $ueConfig, $Itemid, $_REQUEST;
	
	$isModerator=isModerator( $_CB_framework->myId() );
	if ($isModerator == 0) {
		cbNotAuth();
		return;
	}
	$ue_base_url = "index.php?option=com_comprofiler&amp;task=moderateReports".($Itemid ? "&amp;Itemid=". (int) $Itemid : "");	// Base URL string


	$query = "SELECT count(*) FROM #__comprofiler_userreports  WHERE reportedstatus=0 ";
	if (!$_CB_database->setQuery($query)) {
		print $_CB_database->getErrorMsg();
	}
	$total = $_CB_database->loadResult();
	
	if($total<1) {
		echo _UE_NONEWUSERREPORTS;
		return;
	}
	
	$limitstart	= intval( cbGetParam( $_REQUEST, 'limitstart', 0 ) );
	if (empty($limitstart)) $limitstart = 0;
	$limit = 20;
	if ($limit > $total) {
		$limitstart = 0;
	}

	$query = "SELECT u2.name as reportedbyname, u2.username as reportedbyusername, u.name as reportedname, u.username as reportedusername, ur.* FROM #__users u, #__comprofiler_userreports ur, #__users u2 WHERE u.id=ur.reporteduser AND u2.id=ur.reportedbyuser AND  ur.reportedstatus=0 ORDER BY ur.reporteduser,ur.reportedondate";
	$query .= " LIMIT $limitstart, $limit";
	$_CB_database->setQuery($query);
	$row = $_CB_database->loadObjectList();

	outputCbTemplate(1);
?>
<!-- TAB -->
<div class="componentheading"><?php echo _UE_MODERATE_TITLE; ?></div><br /><br />
                    
<div class='contentheading'><?php echo _UE_USERREPORT_MODERATE; ?></div><br />
          <form action='<?php 
	echo cbSef('index.php?option=com_comprofiler&amp;task=processReports'.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""));
		?>' method='post' name='adminForm'>
          <table width='98%' border='0' cellpadding='4' cellspacing='0'>
		<thead><tr align='left' class="sectionatableheader">
		<th>&nbsp;</th>
		<th><?php echo _UE_REPORTEDUSER; ?></th>
		<th><?php echo _UE_REPORT; ?></th>
		<th><?php echo _UE_REPORTEDONDATE; ?></th>
		<th><?php echo _UE_REPORTEDBY; ?></th>	
		</tr></thead>	
<?php  
       for($i = 0; $i < count($row); $i++) {
   		 $class = "sectiontableentry" . ( 1 + ( $i % 2 ) );
	     echo "<tr align='left' valign='middle' class='".$class."'>";
             echo "<td><input id='img".$row[$i]->reportid."' type=\"checkbox\" checked=\"checked\" name=\"reports[]\" value=\"".$row[$i]->reportid."\" /></td>";
             echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->reporteduser.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->reportedname,$row[$i]->reportedusername,$ueConfig['name_format']). "</a></td>";
	     echo "<td>".$row[$i]->reportexplaination."</td>";  
	     echo "<td>".dateConverter($row[$i]->reportedondate,'Y-m-d',$ueConfig['date_format'])."</td>";
             echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->reportedbyuser.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->reportedbyname,$row[$i]->reportedbyusername,$ueConfig['name_format']). "</a></td>";           
	     echo '</tr>';
          }
          
          echo '<tr align="center" valign="middle"><td colspan="5">'
          .'<input class="button" type="submit" value="'._UE_PROCESSUSERREPORT.'" /></td></tr>';
          echo '</table>';
          echo cbGetSpoofInputTag( 'moderateReports' );
          echo "</form>";
		if($total > $limit) { ?>
<hr /><div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div>
<?php
		}
    }



	function moderateImages($option) {
	global $_CB_framework, $_CB_database, $ueConfig, $Itemid, $_REQUEST;
	
	$isModerator=isModerator( $_CB_framework->myId() );
	if ($isModerator == 0) {
		cbNotAuth();
		return;
	}
	$ue_base_url = "index.php?option=com_comprofiler&amp;task=moderateImages".($Itemid ? "&amp;Itemid=". (int) $Itemid : "");	// Base URL string

	$query = "SELECT count(*) FROM #__comprofiler  WHERE avatarapproved=0 AND approved=1 AND confirmed=1 AND banned=0";
	if(!$_CB_database->setQuery($query)) print $_CB_database->getErrorMsg();
	$total = $_CB_database->loadResult();

	$limitstart	= intval( cbGetParam( $_REQUEST, 'limitstart', 0 ) );
	if (empty($limitstart)) $limitstart = 0;
	$limit = 20;
	if ($limit > $total) {
		$limitstart = 0;
	}

	$query = "SELECT * FROM #__comprofiler c, #__users u WHERE u.id= c.id AND c.avatarapproved=0 AND approved=1 AND confirmed=1 AND banned=0";
	$query .= " LIMIT $limitstart, $limit";
	$_CB_database->setQuery($query);
	$row = $_CB_database->loadObjectList();

	outputCbTemplate(1);
?>
<!-- TAB -->
<div class="componentheading"><?php echo _UE_MODERATE_TITLE; ?></div><br /><br />

<?php
	if($total<1) {
		echo _UE_NOIMAGESTOAPPROVE;
		return;
	} 
?>                    
<div class='contentheading'><?php echo _UE_IMAGE_MODERATE; ?></div><br />
<?php if($total > $limit) { ?>
<div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div><hr />
<?php
}  

          echo "<form action='".cbSef('index.php?option=com_comprofiler&amp;task=approveImage'.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."' method='post' name='adminForm'>";
          echo "<table width='98%' border='0' cellpadding='4' cellspacing='1'>";
          echo "<tr align='center' valign='middle'><td>";
          $avatar_gallery_path	=	$_CB_framework->getCfg( 'live_site' ) . '/images/comprofiler/';
          $sys_gallery_path		=	$_CB_framework->getCfg( 'live_site' ) . '/components/com_comprofiler/images/';
          for($i = 0; $i < count($row); $i++) {
	     	$image				=	$avatar_gallery_path.'tn'.$row[$i]->avatar;	
            echo '<div class="containerBox">';
            echo '<img style="cursor:hand;" src="'.$image.'" onclick="this.src=\''.$avatar_gallery_path.$row[$i]->avatar.'\'" alt="" /><br />';
            echo "<label for='img".$row[$i]->id."'>".getNameFormat($row[$i]->name,$row[$i]->username,$ueConfig['name_format'])
            . " <input id='img".$row[$i]->id."' type=\"checkbox\" checked=\"checked\" name=\"avatar[]\" value=\"".$row[$i]->id."\" /></label>";
	     	echo "<br /><img style='cursor:hand;' onclick='window.location=\""
	     	.cbSef("index.php?option=com_comprofiler&amp;task=approveImage&amp;flag=1&amp;avatars=".$row[$i]->id.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
	     	."\"' src='".$sys_gallery_path."approve.png' title='"._UE_APPROVE_IMAGE."' alt='"._UE_APPROVE
	     	."' /> <img style='cursor:hand;' src='".$sys_gallery_path."reject.png' onclick='javascript:window.location=\""
	     	.cbSef("index.php?option=com_comprofiler&amp;task=approveImage&amp;flag=0&amp;avatars=".$row[$i]->id.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
	     	."\"' title='"._UE_REJECT_IMAGE."' alt='"._UE_REJECT."' /> <img style='cursor:hand;' src='".$sys_gallery_path
	     	."updateprofile.gif' title='"._UE_VIEWPROFILE."' onclick='javascript:window.location=\""
	     	.cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->id.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))
	     	."\"' alt='"._UE_VIEWPROFILE."' />";
			echo "</div>";
          }
          echo '</td></tr>';
          echo '<tr><td colspan="4" align="center">'
          .'<input class="button" style="background-color:#CFC;" onclick="this.form.act.value=\'1\';this.form.submit();" type="button" value="'._UE_APPROVE.'" />'
          .'&nbsp;&nbsp;&nbsp;'
          .'<input class="button" style="background-color:#FCC;" onclick="this.form.act.value=\'0\';this.form.submit();" type="button" value="'._UE_REJECT.'" />';
          echo '</td></tr>';
          echo '</table>';
		  echo '<input type="hidden" name="act" value="" />';
		  echo cbGetSpoofInputTag( 'moderateImages' );
          echo "</form>";
		if ($total > $limit) { ?>
<hr /><div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div>
<?php
		}  
    }


	function viewReports($option,$uid,$act) {
		global $_CB_framework, $_CB_database, $ueConfig, $Itemid, $_REQUEST;
		$isModerator	=	isModerator( $_CB_framework->myId() );
		if ( $isModerator == 0 ) {
			cbNotAuth();
			return;
		}
		$ue_base_url = "index.php?option=com_comprofiler&amp;task=viewReports".($Itemid ? "&amp;Itemid=". (int) $Itemid : "");	// Base URL string

		$query = "SELECT count(*) FROM #__comprofiler_userreports  WHERE " . ( $act = 1 ? '' : "reportedstatus=0 AND " ) . "reporteduser=" . (int) $uid;
		if(!$_CB_database->setQuery($query)) print $_CB_database->getErrorMsg();
		$total = $_CB_database->loadResult();

		$limitstart	= intval( cbGetParam( $_REQUEST, 'limitstart', 0 ) );
		if (empty($limitstart)) $limitstart = 0;
		$limit = 20;
		if ($limit > $total) {
			$limitstart = 0;
		}

		$query = "SELECT u2.name as reportedbyname, u2.username as reportedbyusername, u.name as reportedname, u.username as reportedusername, ur.* FROM #__users u, #__comprofiler_userreports ur, #__users u2 WHERE u.id=ur.reporteduser AND u2.id=ur.reportedbyuser AND " . ( $act = 1 ? '' : "ur.reportedstatus=0 AND " ) . "ur.reporteduser=".(int) $uid." ORDER BY ur.reporteduser,ur.reportedondate";
		$query .= " LIMIT $limitstart, $limit";
		$_CB_database->setQuery($query);
		$row = $_CB_database->loadObjectList();

		outputCbTemplate(1);
?>
<!-- TAB -->
<div class="componentheading"><?php echo _UE_MODERATE_TITLE; ?></div><br /><br />
<?php
if($total<1) {
	echo _UE_NOREPORTSTOPROCESS;
	return;
} 
?> 
                    
<div class='contentheading'><?php echo _UE_USERREPORT; ?></div><br />
<?php if($total > $limit) { ?>
<div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div><hr />
<?php
} 
?>
	<table width='98%' border='0' cellpadding='4' cellspacing='1'>
		<thead><tr align='left' class="sectiontableheader">
			<th><?php echo _UE_REPORTEDUSER; ?></th>
			<th><?php echo _UE_REPORT; ?></th>
			<th><?php echo _UE_REPORTEDONDATE; ?></th>
			<th><?php echo _UE_REPORTEDBY; ?></th>	
			<th><?php echo _UE_REPORTSTATUS; ?></th>	
		</tr></thead>
<?php  
	for($i = 0; $i < count($row); $i++) {
   		$class = "sectiontableentry" . ( 1 + ( $i % 2 ) );
		echo "<tr align='left' valign='middle' class='".$class."'>";	
		echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->reporteduser.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->reportedname,$row[$i]->reportedusername,$ueConfig['name_format']). "</a></td>";
		echo "<td>".$row[$i]->reportexplaination."</td>";
		echo "<td>".dateConverter($row[$i]->reportedondate,'Y-m-d',$ueConfig['date_format'])."</td>";
		echo "<td><a href='".cbSef("index.php?option=com_comprofiler&amp;task=userProfile&amp;user=".$row[$i]->reportedbyuser.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."'>".getNameFormat($row[$i]->reportedbyname,$row[$i]->reportedbyusername,$ueConfig['name_format']). "</a></td>";
		echo "<td>". ( $row[$i]->reportedstatus ? ( '<span style="color:green;">' . _UE_REPORTSTATUS_PROCESSED  . '</span>' ) : ( '<span style="color:red;font-weight:bold;">' . _UE_REPORTSTATUS_OPEN  . '</span>' ) ) ."</td>";
		echo "</tr>\n";
	}
	echo "</table>\n";
		if($total > $limit) { ?>
<hr /><div style="width:100%;text-align:center;"><?php echo writePagesLinks($limitstart, $limit, $total, $ue_base_url); ?></div>
<?php
	}
	echo "<br /><div style='width:100%;text-align:center;'>\n";
	echo "<form action='".cbSef('index.php?option=com_comprofiler&amp;task=moderateReports'.($Itemid ? "&amp;Itemid=". (int) $Itemid : ""))."' method='post' name='adminForm'>\n";
    echo '<input class="button" type="submit" value="'._UE_USERREPORT_MODERATE."\" />\n";
    echo "</form>\n</div>\n";
}

?>
