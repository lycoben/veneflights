<h3>CB Log In</h3>
<?php 
global $_CB_framework, $_CB_database, $ueConfig, $mainframe, $_SERVER;

$absolute_path		=	$_CB_framework->getCfg( 'absolute_path' );
$cblogin_live_site	=	$_CB_framework->getCfg( 'live_site' );

$len_live_site		=	strlen($cblogin_live_site);		// do not remove: used further down as well

//variant 3:
$isHttps			=	(isset($_SERVER['HTTPS']) && ( !empty( $_SERVER['HTTPS'] ) ) && ($_SERVER['HTTPS'] != 'off') );
$return		=	'http' . ( $isHttps ? 's' : '' ) . '://' . $_SERVER['HTTP_HOST'];
if (!empty ($_SERVER['PHP_SELF']) && ! empty ($_SERVER['REQUEST_URI'])) {
	$return	.=	$_SERVER['REQUEST_URI'];	// Apache
} else {
	$return	.=	$_SERVER['SCRIPT_NAME'];	// IIS
	if (isset($_SERVER['QUERY_STRING']) && ! empty($_SERVER['QUERY_STRING'])) {
		$return	.=	'?' . $_SERVER['QUERY_STRING'];
	}
}
$return	=	preg_replace('/[\\\"\\\'][\\s]*javascript:(.*)[\\\"\\\']/', '""', preg_replace('/eval\((.*)\)/', '', htmlspecialchars( urldecode( $return ) ) ) );
// end variant 3.
$return = cbUnHtmlspecialchars( $return );
// avoid unauthorized page acces at very first login after registration confirmation
if (eregi( 'index.php\?option=com_comprofiler&task=confirm&confirmCode=|index.php\?option=com_comprofiler&task=login', $return)) $return = "index.php";
/*
if (is_callable(array($params,"get"))) {				// Mambo 4.5.0 compatibility
	$message_login 	= $params->get( 'login_message', 0 );
	$message_logout = $params->get( 'logout_message', 0 );
	$pretext 		= $params->get( 'pretext' );
	$posttext 		= $params->get( 'posttext' );
	$logoutpretext 	= $params->get( 'logoutpretext' );
	$logoutposttext = $params->get( 'logoutposttext' );
	$login 			= $params->get( 'login', $return );
	$logout 		= $params->get( 'logout', "index.php" );
	if ( checkJversion() == 1 && ( $logout == "index.php" ) ) {
		$logout		= "index.php?option=com_content&view=frontpage&Itemid=1";	// 1.5 RC 1 cbSef bug fix
	}
	$name 			= $params->get( 'name', 0 );
	$greeting 		= $params->get( 'greeting', 1 );
	$class_sfx		= $params->get( 'moduleclass_sfx', "");
	$horizontal		= $params->get( 'horizontal', 0);
	$show_avatar	= $params->get( 'show_avatar', 0);
	$avatar_position = $params->get( 'avatar_position', "default");
	$text_show_profile = $params->get( 'text_show_profile', "");
	$text_edit_profile = $params->get( 'text_edit_profile', "");
	$pms_type		= $params->get( 'pms_type', 0);
	$show_pms		= $params->get( 'show_pms', 0);
	$remember_enabled = $params->get( 'remember_enabled', 1);
	$https_post		= $params->get( 'https_post', 0);
	$showPendingConnections = $params->get( 'show_connection_notifications', 0);
	$show_newaccount = $params->get( 'show_newaccount', 1 );
	$show_lostpass 	= $params->get( 'show_lostpass', 1 );
	$name_lenght 	= $params->get( 'name_lenght', "14" );
	$pass_lenght 	= $params->get( 'pass_lenght', "14" );
	$compact 		= $params->get( 'compact', 0 );
	$cb_plugins		= $params->get( 'cb_plugins', 0 );
	$show_username_pass_icons	=	$params->get( 'show_username_pass_icons', 0 );
	$show_buttons_icons			=	$params->get( 'show_buttons_icons', 0 );
	$show_remind_register_icons	=	$params->get( 'show_remind_register_icons', 0 );
} else {*/
	$message_login 	= 0;
	$message_logout = 0;
	$pretext 		= "";
	$posttext 		= "";
	$logoutpretext	= "";
	$logoutposttext	= "";
	$login 			= $return;
	$logout 		= "index.php";
	$name 			= 0;
	$greeting 		= 1;
	$class_sfx		= "";
	$horizontal		= 0;
	$show_avatar	= 0;
	$avatar_position = "default";
	$text_show_profile = "";
	$text_edit_profile = "";
	$pms_type		= 0;
	$show_pms		= 0;
	$remember_enabled = 1;
	$https_post		= 0;
	$showPendingConnections = 0;
	$show_newaccount = 1;
	$show_lostpass 	= 1;
	$name_lenght 	= "10";
	$pass_lenght 	= "10";
	$compact		= 0;
	$cb_plugins		= true;
	$show_username_pass_icons	=	0;
//}

		$urlImgPath = $cblogin_live_site."/modules/mod_cblogin/mod_cblogin/";
		$lang =& JFactory::getLanguage();
		$lang->load("mod_login");		// might not be needed, unsure

	switch ( isset( $ueConfig['login_type'] ) ? $ueConfig['login_type'] : 0 ) {
		case 2:
			$userNameText	=	_UE_EMAIL;
			break;
		case 1:
			// NEXT 3 LINES: CB 1.2 RC 2 + CB 1.2 specific : remove after !
			if ( ! defined( '_UE_USERNAME_OR_EMAIL' ) ) {
				DEFINE('_UE_USERNAME_OR_EMAIL','Username or email');
			}
			$userNameText	=	_UE_USERNAME_OR_EMAIL;
			break;
		case 0:
		default:
			$userNameText	=	_UE_USERNAME;
			break;
	}

	// redirect to site url (so cookies are recognized correctly after login):
	if (strncasecmp($cblogin_live_site, "http://www.", 11)==0 // && strncasecmp($cblogin_live_site, "http://", 7)==0
		&& strncasecmp( substr($cblogin_live_site, 11), substr($login, 7), $len_live_site - 11 ) == 0 ) {
			// the login return string matches the live site without 'www.' in it:
			// add www subdomain as live_site has it.
			$login = "http://www." . substr($login, 7);
	} elseif (strncasecmp($cblogin_live_site, "https://www.", 12)==0 // && strncasecmp($cblogin_live_site, "https://", 8)==0
		&& strncasecmp( substr($cblogin_live_site, 12), substr($login, 8), $len_live_site - 12 ) == 0 ) {
			$login = "https://www." . substr($login, 8);	// same for https
	}

	$login = cbSef( $login );

	if ( $https_post > 1 /* && ! $isHttps */ ) {
		if ((strncmp($login, "http:", 5)!=0) && (strncmp($login, "https:", 6)!=0)) {
			$login = $cblogin_live_site . '/' . $login;
		}
		$login = str_replace("http://","https://",$login);
	}

	$loginPost = cbSef("index.php?option=com_loginbox&amp;task=login");
	if ( $https_post /* && ! $isHttps */ ) {
		if ( ( substr($loginPost, 0, 5) != "http:" ) && ( substr($loginPost, 0, 6) != "https:" ) ) {
			$loginPost = $cblogin_live_site."/".$loginPost;
		}
		$loginPost = str_replace("http://","https://",$loginPost);
	}

	echo '<form action="'.$loginPost.'" method="post" id="mod_loginform'.$class_sfx.'" ';

	echo 'style="margin:0px;">'."\n";
	if ( $pretext ) {
		if ( defined( $pretext ) ) {
			echo constant( $pretext );
		} else {
			echo $pretext;
		}
		echo "\n";
	}
	if (!$horizontal) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mod_login'.$class_sfx.'">'."\n"
		. "<tr><td>";
	}

	$bgstyleUser			=	'';
	$bgstylePass			=	'';
	if ( $compact ) {
		if ( $show_username_pass_icons >= 1 ) {
			$bgstyleUser	.=	' style="background-image:url(' . $urlImgPath . 'username.png); background-repeat: no-repeat; background-position: 0px 0px; padding-left: 30px; min-height: 18px;" ';
			$bgstylePass	.=	' style="background-image:url(' . $urlImgPath . 'password.png); background-repeat: no-repeat; background-position: 0px 0px; padding-left: 30px; min-height: 18px;" ';
		}
		if ( $show_username_pass_icons <= 1 ) {
			$bgstyleUser	.=	" alt=\"" . $userNameText . "\" value=\"" . $userNameText . "\" "
							.	"onfocus=\"if (this.value=='" . $userNameText . "') this.value=''\" onblur=\"if(this.value=='') { this.value='" . $userNameText . "'; return false; }\""
							;
			$bgstylePass	.=	" alt=\""._UE_PASS."\" value=\"paswww\" onfocus=\"if (this.value=='paswww') this.value=''\" onblur=\"if(this.value=='') { this.value='paswww'; return false; }\""
							;
		}
	} else {
		if ( $show_username_pass_icons == 2 ) {
			$bgstyleUser	.=	' style="vertical-align:top;" ';
			$bgstylePass	.=	' style="vertical-align:top;" ';
		}
		$txtusername		=	'<label for="mod_login_username'.$class_sfx.'">'
							.	( $show_username_pass_icons >= 1 ? '<img src="' . $urlImgPath . 'username.png" width="25px" height="20px" alt="' . $userNameText . '" /> ' : '' )
							.	( $show_username_pass_icons <= 1 ? $userNameText : '' )
							.	'</label>'
							;
		$txtpassword		=	'<label for="mod_login_password'.$class_sfx.'">'
							.	( $show_username_pass_icons >= 1 ? '<img src="' . $urlImgPath . 'password.png" width="25px" height="20px" alt="' . _UE_PASS . '" /> ' : '' )
							.	( $show_username_pass_icons <= 1 ? _UE_PASS : '' )
							.	'</label>'
							;

		echo '<span id="mod_login_usernametext'.$class_sfx.'">'.$txtusername.'</span>';
	}
	if ( $compact || ( $show_username_pass_icons == 2 ) ) {
		$bgstyleUser		.=	' title="' . $userNameText . '"';
		$bgstylePass		.=	' title="' . _UE_PASS . '"';
	}
	if ($horizontal) {
		echo "&nbsp;\n";
	} elseif ( ( ! $compact ) && ( $show_username_pass_icons != 2 ) ) {
		echo "<br />\n";
	}
	echo '<input type="text" name="username" id="mod_login_username'.$class_sfx.'" class="inputbox'.$class_sfx.'" size="'.$name_lenght.'"' . $bgstyleUser . ' />';
	if ($horizontal) {
		echo "&nbsp;\n";
	} else {				// if (!$compact) {
		echo "<br />\n";
	}
	if (!$compact) {
		echo '<span id="mod_login_passwordtext'.$class_sfx.'">'.$txtpassword.'</span>';
	}
	if ($horizontal) {
		echo "&nbsp;";
	} elseif ( ( ! $compact ) && ( $show_username_pass_icons != 2 ) ) {
		echo "<br />";
	}
	echo '<span><input type="password" name="passwd" id="mod_login_password'.$class_sfx.'" class="inputbox'.$class_sfx.'" size="'.$pass_lenght.'"' . $bgstylePass . ' /></span>';
	if ($horizontal) {
		echo "&nbsp;\n";
	} else {
		echo "<br />\n";
	}

	echo '<input type="hidden" name="op2" value="login" />'."\n";
	echo '<input type="hidden" name="lang" value="' . $_CB_framework->getCfg( 'lang' ) . '" />' . "\n";
	echo '<input type="hidden" name="force_session" value="1" />'."\n";		// makes sure to create joomla 1.0.11+12 session/bugfix
	echo '<input type="hidden" name="return" value="' . $login . '" />'."\n";
	echo '<input type="hidden" name="message" value="' . htmlspecialchars( $message_login ) . '" />'."\n";
	echo cbGetSpoofInputTag( 'login' );
	// this is left for backwards compatibility only, to be removed after CB 1.2:
	if ( is_callable("josSpoofValue")) {
		$validate = josSpoofValue();
		echo "<input type=\"hidden\" name=\"" .  $validate . "\" value=\"1\" />\n";
	}

	switch ($remember_enabled) {
		case 1:
			echo '<input type="checkbox" name="remember" id="mod_login_remember'.$class_sfx.'"' . ( $class_sfx ? ' class="inputbox'.$class_sfx.'"' : '' ) . ' value="yes" /> '
				.'<span id="mod_login_remembermetext'.$class_sfx.'"><label for="mod_login_remember'.$class_sfx.'">'._UE_REMEMBER_ME."</label></span>";
			if ($horizontal) echo "&nbsp;\n"; else echo "<br />\n";
		break;
		case 2:
			echo '<input type="hidden" name="remember" value="yes" />';
		break;
		case 3:
			echo '<input type="checkbox" name="remember" id="mod_login_remember'.$class_sfx.'"' . ( $class_sfx ? ' class="inputbox'.$class_sfx.'"' : '' ) . ' value="yes" checked="checked" /> '
				.'<span id="mod_login_remembermetext'.$class_sfx.'"><label for="mod_login_remember'.$class_sfx.'">'._UE_REMEMBER_ME."</label></span>";
			if ($horizontal) echo "&nbsp;\n"; else echo "<br />\n";
		break;
		default:
		break;
	}

	if ( $cb_plugins ) {
		//include_once( $absolute_path . "/administrator/components/com_comprofiler/plugin.class.php");
		global $_PLUGINS;

		$_PLUGINS->loadPluginGroup('user');
		$pluginsResults	=	$_PLUGINS->trigger( 'onAfterLoginForm', array( $name_lenght, $pass_lenght, $horizontal, $class_sfx, &$params ) );
		if ( implode( $pluginsResults ) != '' ) {
			$divHtml	=	( $horizontal ? '<span class="mod_login_plugin'.$class_sfx.'">' : '<div class="mod_login_plugin'.$class_sfx.'">' );
			$sldivHtml	=	( $horizontal ? '</span>' : '</div>' );
			echo $divHtml . implode( $sldivHtml . $divHtml, $pluginsResults ) . $sldivHtml;
		}
	}

	// Login button/icon:
	switch ( $show_buttons_icons ) {
		case 2:
			$buttonStyle	=	' style="width:25px;height:20px;border-width:0px;margin:0px;cursor:pointer;vertical-align:top;background:transparent url(' . $urlImgPath . 'login.png) no-repeat;"'
							.	' title="' . _UE_BUTTON_LOGIN . '"';
			$buttonValue	=	'';
			break;
		case 1:
			$buttonStyle	=	' style="min-height:20px;padding-left:30px;cursor:pointer;background:transparent url(' . $urlImgPath . 'login.png) no-repeat;"';
			$buttonValue	=	_UE_BUTTON_LOGIN;
			break;
		case 0:
		default:
			$buttonStyle	=	'';
			$buttonValue	=	_UE_BUTTON_LOGIN;
			break;
	}
	echo '<input type="submit" name="Submit" class="button'.$class_sfx.'" value="' . $buttonValue . '"' . $buttonStyle . ' />';

	if ($horizontal || ( $show_remind_register_icons == 2 ) ) {
		echo "&nbsp;&nbsp;\n";
	} else {
		echo "</td></tr>\n<tr><td>";
	}
	
	if ($show_lostpass) {
		$loginPost = cbSef("index.php?option=com_comprofiler&amp;task=lostPassword");
		if ( $https_post /* && ! $isHttps */ ) {
			if ( ( substr($loginPost, 0, 5) != "http:" ) && ( substr($loginPost, 0, 6) != "https:" ) ) {
				$loginPost = $cblogin_live_site."/".$loginPost;
			}
			$loginPost = str_replace("http://","https://",$loginPost);
		}
		echo '<a href="'.$loginPost.'" class="mod_login'.$class_sfx.'">';

		if ( $show_remind_register_icons >= 1 ) {
			echo '<img src="' . $urlImgPath . 'forgot.png" alt="' . _UE_USERNAME_PASSWORD_REMINDER . '" title="' . _UE_USERNAME_PASSWORD_REMINDER . '" width="25px" height="20px" style="border-width:0px;cursor:pointer;" /> ';
		}
		if ( $show_remind_register_icons <= 1 ) {
			if ($compact) {
				echo _UE_FORGOT_PASSWORD;	
			} else {
				echo ( ( checkJversion() == -1 ) ? _UE_USERNAME_PASSWORD_REMINDER : _UE_LOST_USERNAME_PASSWORD );
			}
		}
		echo '</a>';

		if ( $show_remind_register_icons == 2 ) {
			echo "&nbsp;\n"; 
		} elseif ($horizontal) {
			if ($compact) {
				echo "&nbsp;|";
			} else {
				echo "&nbsp;\n"; 
			}
		} else echo "</td></tr>\n";
	}
	/*
	if ($registration_enabled && $show_newaccount) {
		if ($horizontal || ( $show_remind_register_icons == 2 ) ) {
			echo '&nbsp;<span id="mod_login_noaccount'.$class_sfx.'">';
		} else {
			echo "<tr><td>";
		}
		if ( ( ! $compact ) && ( $show_remind_register_icons == 0 ) ) {
			echo _UE_NO_ACCOUNT . " ";
		}
		$loginPost = cbSef("index.php?option=com_comprofiler&amp;task=registers");
		if ( $https_post  ) {
			if ( ( substr($loginPost, 0, 5) != "http:" ) && ( substr($loginPost, 0, 6) != "https:" ) ) {
				$loginPost = $cblogin_live_site."/".$loginPost;
			}
			$loginPost = str_replace("http://","https://",$loginPost);
		}
		
		echo '<a href="'.$loginPost.'" class="mod_login'.$class_sfx.'">';
		if ( $show_remind_register_icons >= 1 ) {
			echo '<img src="' . $urlImgPath . 'register.png" alt="' . _UE_REGISTER . '" title="' . _UE_REGISTER . '" width="25px" height="20px" style="border-width:0px;cursor:pointer;" /> ';
		}
		if ( $show_remind_register_icons <= 1 ) {
			echo ( ( ( checkJversion() == -1 ) && ! $compact ) ? _UE_CREATE_ACCOUNT : _UE_REGISTER );
		}
		echo '</a>';
		if ($horizontal || ( $show_remind_register_icons == 2 ) ) {
			echo "</span>\n";
		} else {
			echo "</td></tr>\n";
		}
	}*/
	if (!$horizontal) {
		echo "</table>";
	}
	if ( $posttext ) {
		if ( defined( $posttext ) ) {
			echo constant( $posttext );
		} else {
			echo $posttext;
		}
		echo "\n";
	}
	echo "</form>";

?>
<?php /*
<form method="POST" action="<?php echo JRoute::_( 'index.php?option=com_loginbox&task=login' ); ?>" target="_self">
   
   <div class="fields">
      <label>Username</label>
<br>
      <input name="username" >      
   </div>

   <div class="fields">
      <label>Password</label>
<br>
      <input name="passwd" type="password">      
   </div>
<?php if ($this->enable_captcha_login):?>   
   <div class="fields">
      <label>Please enter access code below:</label><br />
      <input name="access_code" type="text" size="10"/><br /><br />
      <img src="<?php echo JRoute::_( 'index.php?option=com_loginbox&view=captcha&id=login' ); ?>" />      
   </div>   
<?php endif;?>
   <div class="fields">
<input  name="remember" type="checkbox" value="yes">      <label>remember me</label>
   </div>

	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
	<input type="submit" value="Log In!">
</form>
<br>
<a style="font-size: 11px;" href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>"  target="_top">
   <?php echo JText::_('Forgot Password?'); ?>
</a>
<br>
<a style="font-size: 11px;"  href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>" target="_top">
   <?php echo JText::_('Forgot Username?'); ?>
</a>

<?php /**/ ?>


