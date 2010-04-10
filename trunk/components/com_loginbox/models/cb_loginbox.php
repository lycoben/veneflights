<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.model');
class CB_LoginBoxModelCB_LoginBox extends JModel {
    
    var $_messagesToUser = null;
    
function register() {
	global $_CB_framework, $_CB_database, $ueConfig, $_POST, $_PLUGINS, $option;
	
	// simple spoof check security
	cbSpoofCheck( 'registerForm' );
	cbRegAntiSpamCheck();
	
	$this->_messagesToUser = '';

	// Check rights to access:

	if ( ( ( $_CB_framework->getCfg( 'allowUserRegistration' ) == '0' )
		   && ( ( ! isset($ueConfig['reg_admin_allowcbregistration']) ) || $ueConfig['reg_admin_allowcbregistration'] != '1' ) )
		 || $_CB_framework->myId() ) {
		return JError::raiseWarning( 403, JText::_( 'Access Forbidden' ));
	}
	if ( ! isset( $ueConfig['emailpass'] ) ) {
		$ueConfig['emailpass']			=	'0';
	}

	$userComplete						=	new moscomprofilerUser( $_CB_database );

	// Pre-registration trigger:

	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onStartSaveUserRegistration', array() );
	if( $_PLUGINS->is_errors() ) {
	    return JError::raiseWarning( 500, JText::_( $_PLUGINS->getErrorMSG() ));
		/*echo "<script type=\"text/javascript\">alert('".addslashes($_PLUGINS->getErrorMSG())."'); </script>\n";
		$oldUserComplete				=	new moscomprofilerUser( $_CB_database );
		$userComplete->bindSafely( $_POST, $_CB_framework->getUi(), 'register', $oldUserComplete );
		HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, $_PLUGINS->getErrorMSG("<br />") );
		return;*/
	}

	// Check if this user already registered with exactly this username and password:

	$username							=	cbGetParam( $_POST, 'username', '' );
	$usernameExists						=	$userComplete->loadByUsername( $username );
	if ( $usernameExists ) {
		$password						=	cbGetParam( $_POST, 'password', '', _CB_ALLOWRAW );
		$passwordMatches				=	cbHashPassword( $password, $userComplete );
		if ( $passwordMatches ) {
			$pwd_md5					=	$userComplete->password;
			$userComplete->password		=	$password;
			$messagesToUser				=	activateUser( $userComplete, 1, 'SameUserRegistrationAgain' );
			$userComplete->password		=	$pwd_md5;
			echo "\n<div>" . implode( "</div>\n<div>", $messagesToUser ) . "</div>\n";
			return;
		} else {
			$msg						=	sprintf( _UE_USERNAME_ALREADY_EXISTS, $username );
			return JError::raiseWarning( 500, $msg);
			//echo "<script type=\"text/javascript\">alert('" . addslashes( $msg ) . "'); </script>\n";
			//$oldUserComplete				=	new moscomprofilerUser( $_CB_database );
			//$userComplete->bindSafely( $_POST, $_CB_framework->getUi(), 'register', $oldUserComplete );
			//HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, htmlspecialchars( $msg ) );
			//return;
		}
	}

	// Store and check terms and conditions accepted (not a field yet !!!!):

	if ( isset( $_POST['acceptedterms'] ) ) {
		$userComplete->acceptedterms	=	( (int) cbGetParam( $_POST, 'acceptedterms', 0 ) == 1 ? 1 : 0 );
	} else {
		$userComplete->acceptedterms	=	null;
	}

	if($ueConfig['reg_enable_toc']) {
		if ( $userComplete->acceptedterms != 1 ) {
		    return JError::raiseWarning( 500, unHtmlspecialchars( _UE_TOC_REQUIRED ));
			/*echo "<script type=\"text/javascript\">alert('" . addslashes( unHtmlspecialchars( _UE_TOC_REQUIRED ) ) ."'); </script>\n";
			$oldUserComplete				=	new moscomprofilerUser( $_CB_database );
			$userComplete->bindSafely( $_POST, $_CB_framework->getUi(), 'register', $oldUserComplete );
			HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, _UE_TOC_REQUIRED . '<br />' );
			return;*/
		}
	}

	// Set id to 0 for autoincrement and store IP address used for registration:

	$userComplete->id			 		=	0;
	$userComplete->registeripaddr		=	cbGetIPlist();


	// Store new user state:

	$saveResult					=	$userComplete->saveSafely( $_POST, $_CB_framework->getUi(), 'register' );
	if ( $saveResult === false ) {
	    return JError::raiseWarning( 500, $userComplete->getError());
		/*echo "<script type=\"text/javascript\">alert('" . str_replace( '\\\\n', '\\n', addslashes( strip_tags( str_replace( '<br />', '\n', $userComplete->getError() ) ) ) ) ."'); </script>\n";
		
		HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, $userComplete->getError() );
		return;*/
	}
	
	if ( $saveResult['ok'] === true ) {
		$messagesToUser			=	activateUser( $userComplete, 1, "UserRegistration" );
	}
	foreach ( $saveResult['tabs'] as $res ) {
		if ($res) {
			$messagesToUser[] = $res;
		}
	}
	if ( $saveResult['ok'] === false ) {
	    return JError::raiseWarning( 500, $userComplete->getError());
		/*echo "<script type=\"text/javascript\">alert('" . str_replace( '\\\\n', '\\n', addslashes( strip_tags( str_replace( '<br />', '\n', $userComplete->getError() ) ) ) ) . "'); </script>\n";
		HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, $userComplete->getError() );
		return;*/
	}

	$_PLUGINS->trigger( 'onAfterUserRegistrationMailsSent', array( &$userComplete, &$userComplete, &$messagesToUser, $ueConfig['reg_confirmation'], $ueConfig['reg_admin_approval'], true));

	//echo "messagesToUser=<pre>";print_r($messagesToUser);echo "</pre><hr>";
	
	foreach ( $saveResult['after'] as $res ) {
		if ( $res ) {
			$this->_messagesToUser .= "\n" . $res . "<br />\n";
		}
	}

	if ( $_PLUGINS->is_errors() ) {
		//echo $_PLUGINS->getErrorMSG();
		return JError::raiseWarning( 500, $_PLUGINS->getErrorMSG());
		/*HTML_comprofiler::registerForm( $option, $ueConfig['emailpass'], $userComplete, $_PLUGINS->getErrorMSG() );
		return;*/
	}

	$this->_messagesToUser .= "\n" . implode( "<br />", $messagesToUser ) . "\n";
}    

function getMessagesToUser () {
    //echo "returning getMessagesToUser=<pre>";print_r($messagesToUser);echo "</pre><hr>";
    return $this->_messagesToUser;   
}

function setMessagesToUser ($messagesToUser) {
    //echo "returning getMessagesToUser=<pre>";print_r($messagesToUser);echo "</pre><hr>";
    $this->_messagesToUser = $messagesToUser;   
}

  /*  
   function register() {
		global $mainframe;
		//check the token before we do anything else
		$token	= JUtility::getToken();
		if(!JRequest::getInt($token, 0, 'post')) {
         return JError::raiseWarning(403, 'Request Forbidden');
		}

		// Get required system objects
		$user 		= clone(JFactory::getUser());
		$authorize	=& JFactory::getACL();

		// If user registration is not allowed, show 403 not authorized.
		$usersConfig = &JComponentHelper::getParams('com_users');
		if (!$usersConfig->get('allowUserRegistration')) {
         return JError::raiseWarning( 403, JText::_( 'Access Forbidden' ));
		}

		// Initialize new usertype setting
		$newUsertype = $usersConfig->get( 'new_usertype' );
		if (!$newUsertype) {
			$newUsertype = 'Registered';
		}

		// Bind the post array to the user object
		if (!$user->bind( JRequest::get('post'), 'usertype' )) {
			return JError::raiseWarning( 500, $user->getError());
		}

		// Set some initial user values
		$user->set('id', 0);
		$user->set('usertype', '');
		$user->set('gid', $authorize->get_group_id( '', $newUsertype, 'ARO' ));

		// TODO: Should this be JDate?
		$user->set('registerDate', date('Y-m-d H:i:s'));

		// If user activation is turned on, we need to set the activation information
		$useractivation = $usersConfig->get( 'useractivation' );
		if ($useractivation == '1') {
			jimport('joomla.user.helper');
			$user->set('activation', md5( JUserHelper::genRandomPassword()) );
			$user->set('block', '1');
		}

		// If there was an error with registration, set the message and display form
		if ( !$user->save() ) {
         return JError::raiseWarning('', JText::_( $user->getError()));
		}
 		$password = JRequest::getString('password', '', 'post', JREQUEST_ALLOWRAW);
  		$password = preg_replace('/[\x00-\x1F\x7F]/', '', $password); //Disallow control chars in the email
 		$this->sendMail($user, $password);
		return true;
   }
   
	function sendMail(&$user, $password) {
		global $mainframe;

		$db		=& JFactory::getDBO();

		$name 		= $user->get('name');
		$email 		= $user->get('email');
		$username 	= $user->get('username');

		$usersConfig 	= &JComponentHelper::getParams( 'com_users' );
		$sitename 		= $mainframe->getCfg( 'sitename' );
		$useractivation = $usersConfig->get( 'useractivation' );
		$mailfrom 		= $mainframe->getCfg( 'mailfrom' );
		$fromname 		= $mainframe->getCfg( 'fromname' );
		$siteURL		= JURI::base();

		$subject 	= sprintf ( JText::_( 'Account details for' ), $name, $sitename);
		$subject 	= html_entity_decode($subject, ENT_QUOTES);

		if ( $useractivation == 1 ){
			$message = sprintf ( JText::_( 'SEND_MSG_ACTIVATE' ), $name, $sitename, $siteURL."index.php?option=com_user&task=activate&activation=".$user->get('activation'), $siteURL, $username, $password);
		} else {
			$message = sprintf ( JText::_( 'SEND_MSG' ), $name, $sitename, $siteURL);
		}

		$message = html_entity_decode($message, ENT_QUOTES);

		//get all super administrator
		$query = 'SELECT name, email, sendEmail' .
				' FROM #__users' .
				' WHERE LOWER( usertype ) = "super administrator"';
		$db->setQuery( $query );
		$rows = $db->loadObjectList();

		// Send email to user
		if ( ! $mailfrom  || ! $fromname ) {
			$fromname = $rows[0]->name;
			$mailfrom = $rows[0]->email;
		}
		JUtility::sendMail($mailfrom, $fromname, $email, $subject, $message);

		// Send notification to all administrators
		$subject2 = sprintf ( JText::_('Account details for %s at %s' ), $name, $sitename);
		$subject2 = html_entity_decode($subject2, ENT_QUOTES);

		// get superadministrators id
		foreach ( $rows as $row ) {
			if ($row->sendEmail) {
				$message2 = sprintf ( JText::_( 'SEND_MSG_ADMIN' ), $row->name, $sitename, $name, $email, $username);
				$message2 = html_entity_decode($message2, ENT_QUOTES);
				JUtility::sendMail($mailfrom, $fromname, $row->email, $subject2, $message2);
			}
		}
	}
	*/	

 function login( $username=null, $passwd2=null ) {
    global $_CB_database, $_COOKIE, $_GET, $_POST, $_CB_framework, $ueConfig, $_PLUGINS;

    $spoofCheckOk		=	false;
    $this->_messagesToUser = '';
    if ( cbSpoofCheck( 'login', 'POST', 2 ) ) {
    	$spoofCheckOk	=	true;
    } else {
		if ( is_callable("josSpoofCheck") && is_callable("josSpoofValue") ) {
			$validate = josSpoofValue();
    		if ( cbGetParam( $_POST, $validate ) ) {
				josSpoofCheck(1);
		    	$spoofCheckOk	=	true;
    		}
		}
    }
    if ( ! $spoofCheckOk ) {
    	return JError::raiseWarning( 500, _UE_SESSION_EXPIRED . ' ' . _UE_PLEASE_REFRESH);
    }

	$messagesToUser		=	array();
    $resultError		=	null;

    // $usercookie = cbGetParam( $_COOKIE, 'usercookie', '' );
    // $sessioncookie = cbGetParam( $_COOKIE, 'sessioncookie', '' );
    if ( !$username || !$passwd2 ) {
		$username	= trim( cbGetParam( $_POST, 'username', '' ) );
		$passwd2	= trim( cbGetParam( $_POST, 'passwd', '', _CB_ALLOWRAW ) );
    }
	$return		= trim( cbGetParam( $_POST, 'return', null ) );
	$message	= trim( cbGetParam( $_POST, 'message', 0 ) );
	//print "message:".$message;
    // $remember = trim( cbGetParam( $_POST, 'remember', '' ) );
	// $lang = trim( cbGetParam( $_POST, 'lang', '' ) );

	if ( !$username || !$passwd2 ) {
		$resultError = _LOGIN_INCOMPLETE;
	} else {
		$_PLUGINS->loadPluginGroup('user');
		$_PLUGINS->trigger( 'onBeforeLogin', array( &$username, &$passwd2 ) );
		
		$alertmessages	= array();
		$showSysMessage = true;
		$stopLogin		= false;
		$returnURL		= null;
		
		if($_PLUGINS->is_errors()) {
			$resultError = $_PLUGINS->getErrorMSG();
		} else {
			/*
			$_CB_database->setQuery( "SELECT * "
			. "\n FROM #__users u, "
			. "\n #__comprofiler ue "
			. "\n WHERE u.username='".$username."' AND u.id = ue.id"
			);
			$row = null;
			if ( $_CB_database->loadObject( $row ) && cbHashPassword( $passwd2, $row ) ) {
			*/
			$loginType			=	( isset( $ueConfig['login_type'] ) ? $ueConfig['login_type'] : 0 );
			// NEXT 3 LINES: CB 1.2 RC 2 + CB 1.2 specific : remove after !
			if ( ! defined( '_UE_INCORRECT_EMAIL_OR_PASSWORD' ) ) {
				DEFINE('_UE_INCORRECT_EMAIL_OR_PASSWORD','Incorrect email or password. Please try again.');
			}
			$row				=	new moscomprofilerUser( $_CB_database );
			$foundUser			=	false;
			if ( $loginType <= 1 ) {
				$foundUser		=	$row->loadByUsername( stripslashes( $username ) ) && cbHashPassword( $passwd2, $row );
			}
			if ( ( ! $foundUser ) && ( $loginType >= 1 ) ) {
				$foundUser		=	$row->loadByEmail( stripslashes( $username ) ) && cbHashPassword( $passwd2, $row );
				if ( $foundUser ) {
					$username	=	$row->username;
				}
			}
			if ( $foundUser ) {
				$pluginResults = $_PLUGINS->trigger( 'onDuringLogin', array( &$row, 1, &$return ) );
				if ( is_array( $pluginResults ) && count( $pluginResults ) ) {
					foreach ( $pluginResults as $res ) {
						if ( is_array( $res ) ) {
							if ( isset( $res['messagesToUser'] ) ) {
								$messagesToUser[]	= $res['messagesToUser'];
							}
							if ( isset( $res['alertMessage'] ) ) {
								$alertmessages[]	= $res['alertMessage'];
							}
							if ( isset( $res['showSysMessage'] ) ) {
								$showSysMessage		= $showSysMessage && $res['showSysMessage'];
							}
							if ( isset( $res['stopLogin'] ) ) {
								$stopLogin			= $stopLogin || $res['stopLogin'];
							}
						}
					}
				}
				if($_PLUGINS->is_errors()) {
					$resultError = $_PLUGINS->getErrorMSG();
				}
				elseif ( $stopLogin ) {
					// login stopped: don't even check for errors...
				}
				elseif ($row->approved == 2){
					$resultError = _LOGIN_REJECTED;
				}
				elseif ($row->confirmed != 1){
					if ( $row->cbactivation == '' ) {
						$row->store();		// just in case the activation code was missing
					}
					$cbNotification = new cbNotification();
					$cbNotification->sendFromSystem($row->id,getLangDefinition(stripslashes($ueConfig['reg_pend_appr_sub'])),getLangDefinition(stripslashes($ueConfig['reg_pend_appr_msg'])));
					$resultError = _LOGIN_NOT_CONFIRMED;
				}
				elseif ($row->approved == 0){
					$resultError = _LOGIN_NOT_APPROVED;
				}
				elseif ($row->block == 1) {
					$resultError = _UE_LOGIN_BLOCKED;
				}
				elseif ($row->lastvisitDate == '0000-00-00 00:00:00') {
					if (isset($ueConfig['reg_first_visit_url']) and ($ueConfig['reg_first_visit_url'] != "")) {
						$return = cbSef($ueConfig['reg_first_visit_url']);
					}
					$_PLUGINS->trigger( 'onBeforeFirstLogin', array( &$row, $username, $passwd2, &$return ));
					if ($_PLUGINS->is_errors()) {
						$resultError = $_PLUGINS->getErrorMSG( "<br />" );
					}					
				}
			} else {
				if ( $loginType < 2 ) {
					$resultError	=	_LOGIN_INCORRECT;
				} else {
					$resultError	=	_UE_INCORRECT_EMAIL_OR_PASSWORD;
				}
			}
		}

		if ( $resultError ) {
			if ( $showSysMessage ) {
				$alertmessages[] = $resultError;
			}
		} elseif ( ! $stopLogin ) {
			$rememberMe		=	cbGetParam( $_POST, 'remember' );
			$_CB_framework->login( $username, $passwd2, $rememberMe );

			$_PLUGINS->trigger( 'onAfterLogin', array( &$row, true ) );
			if ( $message && $showSysMessage ) {
				$alertmessages[] = _LOGIN_SUCCESS;
			}			
			if ( $return && !( strpos( $return, 'com_comprofiler') && ( strpos( $return, 'login') || strpos( $return, 'registers' ) || strpos( strtolower( $return ), 'lostpassword' ) ) ) ) {
			// checks for the presence of a return url
			// and ensures that this url is not the registration or login pages
				$returnURL = (strncasecmp($return, "http:", 5)||strncasecmp($return, "https:", 6)) ? $return : cbSef($return);
			} elseif ( ! $returnURL ) {
				$returnURL = cbSef('index.php');
			}
		}
		// JS Popup message
		if ( count( $alertmessages ) > 0 ) {
		    return JError::raiseWarning( 500, implode( '\n', $alertmessages ) );
			/*echo '<script type="text/javascript"><!--//'."\n";
			echo 'alert( "' . str_replace( '<br />', '\n', implode( '\n', $alertmessages ) ) . '" );';
			if ( $returnURL ) {
				echo "window.location = '" . $returnURL . "';";
			}
			echo "\n//-->\n</script>\n";
			*/
			/*
			**not sure if this is the best case but the 
			**reason why we weren't seeing the login message was
			**because we are immediately redirecting to another page
			**so if we flush out the contents to the browser then we get the alert.
			*/
			if (!$resultError && ( ! ( count( $messagesToUser ) > 0 ) ) && function_exists("ob_flush")) {
				ob_flush();			// warning: this makes cbRedirect fail in IE6, as headers are already sent...JS redirect will work.
			}
		}
	}
	if ( count( $messagesToUser ) > 0 ) {
		if ( $resultError ) {
			//echo "<div class=\"message\">".$resultError."</div>";
			JError::raiseWarning( 500, $resultError );
		}
		//echo "\n<div>" . implode( "</div>\n<div>", $messagesToUser ) . "</div>\n";
		$this->_messagesToUser .= "\n" . implode( "<br />", $messagesToUser ) . "\n";
	} elseif ($resultError) {
		//echo "<div class=\"message\">".$resultError."</div>";
		return JError::raiseWarning( 500, $resultError );
	} /*else {
		cbRedirect( $returnURL );
	}*/
}
/*
function logout() {
	global $_POST, $_CB_framework, $_CB_database, $_PLUGINS;
	
	$return = trim( cbGetParam( $_POST, 'return', null ) );
	$message = trim( cbGetParam( $_POST, 'message', 0 ) );
	
	if ($return || $message) {
	    $spoofCheckOk		=	false;
	    if ( cbSpoofCheck( 'logout', 'POST', 2 ) ) {
	    	$spoofCheckOk	=	true;
	    } else {
			if ( is_callable("josSpoofCheck") && is_callable("josSpoofValue") ) {
				$validate = josSpoofValue();
	    		if ( cbGetParam( $_POST, $validate ) ) {
					josSpoofCheck(1);
			    	$spoofCheckOk	=	true;
	    		}
			}
	    }
	    if ( ! $spoofCheckOk ) {
	    	echo  _UE_SESSION_EXPIRED . ' ' . _UE_PLEASE_REFRESH;
	    	return;
	    }
	}
	
	$_CB_database->setQuery( "SELECT * "
	. "\nFROM #__users u, "
	. "\n#__comprofiler ue"
	. "\nWHERE u.id=" . (int) $_CB_framework->myId() . " AND u.id = ue.id"
	);
	$row = null;
	$_CB_database->loadObject( $row );
	$_PLUGINS->loadPluginGroup('user');
	$_PLUGINS->trigger( 'onBeforeLogout', array($row));
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert('".addslashes($_PLUGINS->getErrorMSG())."');</script>\n";
		echo "<div class=\"message\">".$_PLUGINS->getErrorMSG()."</div>";;
		return;
	}
	$_CB_framework->logout();
	$_PLUGINS->trigger( 'onAfterLogout', array($row, true));

	// JS Popup message
	if ( $message ) {
		?>
		<script type="text/javascript"> 
		<!--//
		alert( "<?php echo _LOGOUT_SUCCESS; ?>" ); 
		//-->
		</script>
		<?php

		if (function_exists("ob_flush")) {
			ob_flush();
		}
	}

	if ( $return ) {
		cbRedirect( strncasecmp( $return, "index.php", 9 ) ? cbSef( $return, false ) : $return );
	} else {
		cbRedirect( cbSef( 'index.php', false ) );
	}
}
  */
}



?>