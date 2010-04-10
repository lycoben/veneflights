<?php /** $Id:default.php 1865 2007-09-22 00:35:42Z masterchief $ */ defined( '_JEXEC' ) or die();
	JHTML::script('dashboard.js', 'administrator/components/com_comments/media/js/');
 ?>

<div id="extension-data">
	<h1>
		<img src="components/com_comments/media/images/logo-300-jx.png" alt="JXtended Comments" />
	</h1>

	<h2>
		<?php echo JText::_('JX_HOME');?>
	</h2>
	<div>
		<a href="http://jxtended.com" target="_new">jxtended.com</a>
	</div>

	<h2>
		<?php echo JText::_('JX_SUPPORT');?>
	</h2>
	<div>
		<a href="http://jxtended.com/support.html" target="_new">jxtended.com/support.html</a>
	</div>

	<h2>
		<?php echo JText::_('JX_VERSION_HISTORY');?>
	</h2>
	<div>
		<dl>
<?php foreach ($this->versions as $version) : ?>
			<dt><strong><?php echo $version->version;?></strong></dt>
			<dd>
				<?php echo JHTML::date($version->installed_date); ?>
				<br /><?php echo nl2br( $version->log ); ?>
			</dd>
<?php endforeach; ?>
		</dl>
<?php if (!empty( $this->upgrades )) : ?>
		<p class="upgrade"><a href="index.php?option=com_comments&amp;view=upgrade">
			<?php echo JText::_('JX_DATABASE_UPGRADE_REQUIRED');?></a></p>
<?php endif; ?>
	</div>
</div>
<div id="extension-reports">

	<div class="chart-container">
		<h3>
			<?php echo JText::_('COMMENTS_DASHBOARD_STATE_CHART'); ?>
		</h3>
		<table border="1" class="chart" summary="<?php echo JText::_('COMMENTS_DASHBOARD_STATE_CHART'); ?>">
		    <tbody>
		        <tr>
		            <th><?php echo JText::_('COMMENTS_PENDING'); ?></th>
		            <th><?php echo JText::_('COMMENTS_PUBLISHED'); ?></th>
		            <th><?php echo JText::_('COMMENTS_SPAM'); ?></th>
		        </tr>
		        <tr>
		            <td><?php echo (!empty($this->stateStats[0]) ? $this->stateStats[0]->num : 0); ?></td>
		            <td><?php echo (!empty($this->stateStats[1]) ? $this->stateStats[1]->num : 0); ?></td>
		            <td><?php echo (!empty($this->stateStats[2]) ? $this->stateStats[2]->num : 0); ?></td>
		        </tr>
		    </tbody>
		</table>
	</div>
</div>