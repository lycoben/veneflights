<?php defined( '_JEXEC' ) or die( 'Restricted Access' ); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
        <thead>
            <tr>
                <th width="5"><?php echo JText::_('ID'); ?></th>
                <th width="20">
                    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
                </th>
                <th style="text-align:left;"><?php echo JText::_('NAME'); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;
        for( $i = 0, $n=count($this->items); $i < $n; $i++ ) {
            $row = $this->items[$i];
            $checked = JHTML::_('grid.id', $i, $row->id );
            $link = JRoute::_( 'index.php?option=com_simplestforum&view=forumlist&task=edit&cid[]='.$row->id);
            ?>
            <tr class="<?php echo "row$k"; ?>">
                <td><?php echo $row->id; ?></td>
                <td><?php echo $checked; ?></td>
                <td><a href="<?php echo $link; ?>"><?php echo $row->name; ?></a></td>
            </tr>
            <?php
            $k = 1 - $k;
        }
        ?>
        </tbody>
    </table>
</div>
<input type="hidden" name="option" value="com_simplestforum" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
</form>
