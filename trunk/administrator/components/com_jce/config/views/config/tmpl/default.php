<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.tooltip');
	
JToolBarHelper::title( JText::_( 'JCE Configuration' ), 'config.png' );
JToolBarHelper::save();
JToolBarHelper::apply();
JToolBarHelper::cancel( 'cancel', JText::_( 'Close' ) );
jceToolbarHelper::help('config');
?>
<form action="index.php" method="post" name="adminForm">
    <div class="col width-50">
        <fieldset class="adminform">
            <legend><?php echo JText::_( 'Global Parameters' ); ?></legend>
            <table class="admintable">
                <tr>
                	<td><?php echo JText::_( 'GLOBAL PARAMETERS DESC' ); ?></td>
                </tr>
                <tr>
                	<td style="vertical-align:top;">
                	<fieldset class="adminform">
                		<legend><?php echo JText::_( 'Setup' ); ?></legend>
                		<?php if($output = $this->params->render('params', 'setup')) :
						echo $output;
						else :
						echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters')."</div>";
						endif;?>
                	</fieldset>
                	</td>
                </tr>
                <tr>
                	<td style="vertical-align:top;">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_( 'Cleanup' ); ?></legend>
                        <?php if($output = $this->params->render('params', 'cleanup')) :
                        	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters')."</div>";
                        endif;?>
                    </fieldset>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_( 'Formatting' ); ?></legend>
                        <?php if($output = $this->params->render('params', 'format')) :
                        	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </fieldset>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_( 'Advanced' ); ?></legend>
                        <?php if($output = $this->params->render('params', 'advanced')) :
                        	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </fieldset>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_( 'Plugins' ); ?></legend>
                        <?php if($output = $this->params->render('params', 'plugins')) :
                       		echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </fieldset>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                    <fieldset class="adminform">
                        <legend><?php echo JText::_( 'Miscellaneous' ); ?></legend>
                        <?php if($output = $this->params->render('params', 'other')) :
                       		echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </fieldset>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <div class="col width-50">
        <fieldset class="adminform">
            <legend><?php echo JText::_( 'Group Parameters' ); ?></legend>
            <table>
                <tr>
                	<td><?php echo JText::_( 'GROUP PARAMETERS DESC' ); ?></td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <?php if($output = $this->params->render('params', 'groups-editor')) :
                       	 	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <?php if($output = $this->params->render('params', 'groups-options')) :
                       	 	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;">
                        <?php if($output = $this->params->render('params', 'groups-plugins')) :
                       	 	echo $output;
                        else :
                        	echo "<div  style=\"text-align: center; padding: 5px; \">".JText::_('No Parameters ')."</div>";
                        endif;?>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <input type="hidden" name="option" value="com_jce" />
    <input type="hidden" name="client" value="<?php echo $this->client; ?>" />
    <input type="hidden" name="type" value="config" />
    <input type="hidden" name="task" value="" />
    <?php echo JHTML::_( 'form.token' ); ?>
</form>