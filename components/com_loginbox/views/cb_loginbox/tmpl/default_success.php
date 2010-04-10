<?php
$params = JComponentHelper::getParams('com_loginbox'); 
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0"  height="300">
   <tr valign="middle">
      <td>
<h3 style="text-align: center;">
You have successfully logged in
</h3>
      </td>
   </tr>
</table>
<script type="text/javascript">
<!--
window.addEvent('domready', function() {
    setTimeout(function(){
<?php if ($params->getValue('login_redirection_url')):?>    
      window.parent.location = "<?php echo $params->getValue('login_redirection_url');?>"
<?php else: ?>
      window.parent.location.reload(true);
<?php endif;?>      
   }, 1500);
});
//-->
</script>
