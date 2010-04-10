<?php
$usersConfig = &JComponentHelper::getParams('com_users');
$useractivation = $usersConfig->get('useractivation');
$params = JComponentHelper::getParams('com_loginbox'); 

?>
<table width="100%" cellpadding="0" cellspacing="0" border="0"  height="300">
   <tr valign="middle">
      <td>
<h3 style="font-size: 12px; text-align: center;">
<?php if ($useractivation):?>
Your account has been created and an activation link has been sent to the e-mail address you entered. 
Note that you must activate the account by clicking on the activation link when you get the e-mail before you can login.
<br>
<a href="javascript: void(0);" onclick="window.parent.location.reload(true); return false;">Close This Box</a>
   <?php else:?>
Registration Complete!
<br>
<a href="<?php echo JRoute::_('index.php?option=com_loginbox&login_only=1')?>">Click here to login</a>
<?php endif;?>
</h3>
      </td>
   </tr>
</table>

<script type="text/javascript">
<!--
window.addEvent('domready', function() {
    setTimeout(function(){
<?php if ($params->getValue('signup_redirection_url')):?>    
      window.parent.location = "<?php echo $params->getValue('signup_redirection_url');?>"
<?php else: ?>
      window.parent.location.reload(true);
<?php endif;?>      
   }, 1500);
});
//-->
</script>



