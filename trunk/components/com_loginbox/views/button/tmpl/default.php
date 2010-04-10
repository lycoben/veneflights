<form method="POST" action="index.php?option=com_loginbox&view=button">
   <p>
      <label>
Login HTML code
      </label>
 <input type="text" name="login" size="45"  value="<?php echo $this->escape($this->link->get('login')) ?>">
   </p>
   <p>
      <label>
Logout HTML code
      </label>
 <input type="text" name="logout" size="45"  value="<?php echo $this->escape($this->link->get('logout')) ?>">
   </p>
<br>
<input type="submit" value="Add LoginButton Link">
   <input type="hidden" name="task" value="add">
<?php echo JHTML::_('form.token');?>
</form>
<style type="text/css">
p {
   text-align: right;
}

p label {
   float: left;
}
</style>