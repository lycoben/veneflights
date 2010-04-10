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