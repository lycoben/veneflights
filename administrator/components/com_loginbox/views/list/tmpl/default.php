<?php
$items = (array) $this->items;
$filter = $this->filter;
$contests = $this->contests;

?>
<form action="index.php?option=com_loginbox" method="post" name="adminForm" id="adminForm">
   <div class="m">     
      <table class="adminlist" cellpadding="1">
         <thead>
            <tr>
               <th width="2" class="title" align="center">
                  <?php echo JText::_( 'NUM' ); ?>
               </th>
               <th width="10%" class="title" nowrap>
                  <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($items)?>);" />
               </th>
               <th width="10%" class="title"  nowrap>
                  <?php echo JHTML::_('grid.sort',   'ID', 'id', $this->orderer['dir'], $this->orderer['by']); ?>
               </th>
               <th class="title" nowrap>
                  <?php echo JText::_("Login Button"); ?>
               </th>
               <th class="title" nowrap>
                  <?php echo JText::_("Logout Button"); ?>
               </th>
               <th class="title" nowrap>
                  <?php echo JText::_("How to use"); ?>
               </th>
            </tr>
         </thead>
         <tbody>
<?php if (sizeof($items) > 0) :?>
   <?php 
      $startNum = $this->paginator->get('limitstart');
      $itemNum = 0;
   ?>
   <?php foreach ($items as $item):?>
            <tr>
               <td align="center">
      <?php echo $itemNum + $startNum + 1?>
               </td>
               <td align="center">
      <?php echo JHTML::_('grid.id', $itemNum, $item->get('id'))?>
               </td>
               <td>
      <?php echo $item->get('id')?>
               </td>
               <td>
      <?php echo $item->get('login')?>
               </td>      
               <td>
      <?php echo $item->get('logout')?>
               </td>                          
               <td style="padding-left: 10px;">
<a href="javascript:void(0);" onclick="return listItemTask('cb<?php echo $itemNum?>','edit')">{loginbutton}<?php echo $item->get('id')?>{/loginbutton}</a>
               </td>
            </tr>
   <?php 
      $itemNum++;
   ?>
   <?php endforeach;?>
<?php else :?>
<?php endif;?>
         </tbody>
         <tfoot>
   			<tr>
   				<td colspan="9">
   					<?php echo $this->paginator->getListFooter(); ?>
   				</td>
   			</tr>
         </tfoot>
      </table>
   </div>
   <input type="hidden" name="task" value="" />
   <input type="hidden" name="boxchecked" value="0" />
   <input type="hidden" name="filter_order" value="<?php echo $this->orderer['by']; ?>" />
   <input type="hidden" name="filter_order_Dir" value="<?php echo $this->orderer['dir']; ?>" />
   <?php echo JHTML::_( 'form.token' ); ?>
</form>

<script type="text/javascript">
function onExtraTask(el) {
   var el = $(el);
   var value = el.getValue();
   if ('' == value.trim()) {
//      return;
   }
   $('adminForm').elements['task'].value = value;
}
</script>