<?php
$item = $this->item;
$offset = 3600 * 4;
?>
<form action="index.php?option=com_loginbox" method="post" name="adminForm" id="adminForm">
   <div class="m">
   
   <p>
      <label class="key">
         CID: <?php echo JView::escape($item->get('id'))?>
      </label>
   </p>   
   
   <p>
      <label class="key">
         Login Button HTML code
      </label>
      <input name="login" class="inputbox" value="<?php echo JView::escape($item->get('login'))?>">
   </p>
   
   <p>
      <label class="key">
         Logout Button HTML code
      </label>
      <input name="logout" class="inputbox" value="<?php echo JView::escape($item->get('logout'))?>">
   </p>
   
   </div>
   <input type="hidden" name="task" value="" />
   <input type="hidden" name="cid[]" value="<?php echo JView::escape($item->get('id'))?>" />
   <?php echo JHTML::_( 'form.token' ); ?>
</form>

<style type="text/css">
.right-aligned {
   float: right;   
}

.m p {
   width: 79%;
   text-align: right; 
}

.m label.key {
   font-size: 16px;
   display: block;
   float: left;
}

.m .inputbox {
   margin-left: 20px;
   width: 200px;
   height: 20px;
   line-height: 18px;
   font-size: 18px;
}
</style>
