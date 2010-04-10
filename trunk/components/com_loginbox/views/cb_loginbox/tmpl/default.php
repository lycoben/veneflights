<?php
global $_CB_framework;
$usersConfig = &JComponentHelper::getParams('com_users');
$return = '';
?>
<table cellpadding="5" cellspacing="0" border="0" align="center" height="300">
   <tr valign="top">
<?php if (!JRequest::getVar('register_only')) : ?>
      <td>
<?php $this->display('login')?>
      </td>
		<?php endif; ?>
		<?php
		
    	// CB config may override the system configuration setting
    	$registration_enabled	=	$_CB_framework->getCfg( 'allowUserRegistration' );
    	if ( ! $registration_enabled ) {
    		if ( isset($ueConfig['reg_admin_allowcbregistration']) && $ueConfig['reg_admin_allowcbregistration'] == '1' ) {
    			$registration_enabled = true;
    		}
    	}		
		
		if ($usersConfig->get('allowUserRegistration') && !JRequest::getVar('login_only') && $registration_enabled) : ?>
         <?php if (!JRequest::getVar('register_only')) : ?>
	<td valign="middle"><img src="<?php echo JURI::base()?>components/com_loginbox/assets/images/or.jpg" border="0"></td>
   		<?php endif; ?>
	<td>
<?php $this->display('register')?>
	</td>
		<?php endif; ?>
   </tr>
</table>
<script type="text/javascript">

if ($('system-message')) {
   var LB_opa = 1;
   setTimeout(function() {
      var LB_timer = setInterval(function(){
         $('system-message').setOpacity(LB_opa);
         LB_opa -= 0.01;
         if (LB_opa <= 0) {
            clearInterval(LB_timer);
            $('system-message').remove();
         }
      }, 10);
   }, 1500);
}
</script>