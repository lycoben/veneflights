<h3>Log In</h3>
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
      <label><?php echo JText::_('ACCESS CODE')?>:</label><br />
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
