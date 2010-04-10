<?php

if (JRequest::getVar('go')) {
   $data = JRequest::get('post');
} else {
   $data = array();
   $data['name'] = '';
   $data['username'] = '';
   $data['email'] = '';
}
?>
<h3>Register</h3>
<?php 

echo $this->messagesToUser;

$memMax				=	trim( @ini_get( 'memory_limit' ) );
if ( $memMax ) {
	$last			=	strtolower( $memMax{strlen( $memMax ) - 1} );
	switch( $last ) {
		case 'g':
			$memMax	*=	1024;
		case 'm':
			$memMax	*=	1024;
		case 'k':
			$memMax	*=	1024;
	}
	if ( $memMax < 16000000 ) {
		@ini_set( 'memory_limit', '16M' );
	}
}

/**
 * CB framework
 * @global CBframework $_CB_framework
 */
global $_CB_framework, $_CB_database, $ueConfig, $_PLUGINS, $_POST, $mainframe;
/** @global mosMainFrame $mainframe
 *  @global stdClass $access
 */

//echo "mainframe->getPath( 'front_html' )=<pre>";print_r($mainframe->getPath( 'front_html' ));echo "</pre><hr>";
//echo "mainframe=<pre>";print_r($mainframe);echo "</pre><hr>";


require_once ( JPATH_BASE.DS.'components'.DS.'com_comprofiler'.DS.'comprofiler.html.php' );
/** @global string $_CB_adminpath
 *  @global string $_CB_joomla_adminpath
 *  @global array $ueConfig
 */

$_CB_adminpath		=	JPATH_ADMINISTRATOR.DS.'components'.DS.'com_comprofiler';
//include_once($_CB_adminpath."/ue_config.php" );
//include_once($_CB_adminpath."/plugin.class.php");

$_CB_framework->cbset( '_ui', 1 );	// we're in 1: frontend, 2: admin back-end

if($_CB_framework->getCfg( 'debug' )) {
	ini_set('display_errors',true);
	error_reporting(E_ALL);
}

$UElanguagePath		=	$_CB_framework->getCfg( 'absolute_path' ) . '/components/com_comprofiler/plugin/language';
$UElanguage			=	$_CB_framework->getCfg( 'lang' );
if ( ! file_exists( $UElanguagePath . '/' . $UElanguage . '/' . $UElanguage . '.php' ) ) {
	$UElanguage		=	'default_language';
}
include_once( $UElanguagePath . '/' . $UElanguage . '/' . $UElanguage . '.php' );

if ( class_exists( 'JFactory' ) ) {	// Joomla 1.5 : for string WARNREG_EMAIL_INUSE used in error js popup.
	$lang			=&	JFactory::getLanguage();
	$lang->load( "com_user" );
}

//include_once($_CB_adminpath."/comprofiler.class.php");
include_once($_CB_adminpath."/imgToolbox.class.php");

$form				=	cbGetParam( $_REQUEST, 'reportform', 1 );
$uid				=	cbGetParam( $_REQUEST, 'uid', 0 );
$act				=	cbGetParam( $_REQUEST, 'act', 1 );

$oldignoreuserabort	=	null;


	if ( ( ( $_CB_framework->getCfg( 'allowUserRegistration' ) == '0' )
		   && ( ( ! isset($ueConfig['reg_admin_allowcbregistration']) ) || $ueConfig['reg_admin_allowcbregistration'] != '1' ) ) )
	{
		cbNotAuth();
		return;
	}
	if ( $_CB_framework->myId() ) {
		echo '<div class="error">' . _UE_ALREADY_LOGGED_IN . '</div>';
		return;
	}
	$fieldsQuery	=	null;

	$_PLUGINS->loadPluginGroup('user');

	$results							=	$_PLUGINS->trigger( 'onBeforeRegisterForm', array( $option, $emailpass, &$regErrorMSG, &$fieldsQuery ) );
	if($_PLUGINS->is_errors()) {
		echo "<script type=\"text/javascript\">alert('".addslashes($_PLUGINS->getErrorMSG(" ; "))."'); </script>\n";
		echo $_PLUGINS->getErrorMSG("<br />");
		return;
	}
	if ( implode( '', $results ) != "" ) {
		$allResults						=	implode( "</div><div>", $results );
		echo "<div>" . $allResults . "</div>";
		return;
	}
	$userComplete						=	new moscomprofilerUser( $_CB_database );
	registerForm( $option, $emailpass, $userComplete, $regErrorMSG );
	
	
	
/*
?>


<form method="POST" action="<?php echo JRoute::_( 'index.php?option=com_loginbox&task=register' ); ?>" target="_self">
   
   <div class="fields">
      <label>Name</label>
<br>
      <input name="name" value="<?php echo htmlspecialchars($data['name'])?>">      
   </div>
   
   <div class="fields">
      <label>Username</label>
<br>
      <input name="username"  value="<?php echo htmlspecialchars($data['username'])?>">
   </div>
   
   <div class="fields">
      <label>Email</label>
<br>
      <input name="email"  value="<?php echo htmlspecialchars($data['email'])?>">      
   </div>

   <div class="fields">
      <label>Password</label>
<br>
      <input name="password" type="password">      
   </div>

   <div class="fields">
      <label>Confirm Password</label>
<br>
      <input name="password2" type="password">      
   </div>
   
<?php if ($this->enable_captcha_register):?>   
   <div class="fields">
      <label><?php echo JText::_('ACCESS CODE')?>:</label><br />
      <input name="access_code" type="text" size="10"/><br /><br />
      <img src="<?php echo JRoute::_( 'index.php?option=com_loginbox&view=captcha&id=register' ); ?>" />      
   </div><br />   
<?php endif;?>   

	<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
	<input type="submit" value="Register" name="go">
</form>
<?php /**/?>