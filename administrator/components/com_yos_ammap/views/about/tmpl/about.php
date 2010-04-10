<?php defined('_JEXEC') or die('Restricted access'); ?>
<style type="text/css">
#yos_aboutmap {
	width:80%;
	overflow:hidden;	
	color: #4C608B;
	text-align: left;
	margin: 0;	
	font-size: 11px;
	font-weight: normal;
	font-family: 'Andale Mono', sans-serif;
	
}

#title_about {	
	font-weight: bold;
	font-size: 20px;
	overflow:hidden;
	text-align: center;
	color: #1A315A;
	padding: 3px;	
	height:25px;
}

#content_about {
	padding: 10px;
}

#developer_about {
	padding: 10px;
}
</style>

<div align="center">
<div id="yos_aboutmap">
	<div id="title_about">
		YOS amMap
	</div>
	<div id="content_about">
		<p style="margin-bottom: 0in;">
			<a target="_blank" title="interactive flash maps" href="http://www.ammap.com/"><strong>amMap</strong></a> is an interactive flash map creation software. Use this tool to show locations of your offices, routes of your journeys, create your distributor map. Photos or illustrations can be used instead of maps, so you can make different presentations, e-learning tools and more.
		</p>
		<p style="margin-bottom: 0in;"><strong>YOS amMap</strong> is an Joomla extension which <strong>integrated almost amMap features</strong>. With <strong>YOS amMap</strong> you can <strong>easily</strong> integrate maps which provided by <strong>amMap</strong> to your Joomla site.</p>
		<p><strong>YOS amMap key features:</strong></p>
		<ul>
		<li>Included <strong>amMap</strong> features</li>
		<li>Easy manage maps, add-ons,  icons</li>
		<li>Back-up and Restore feature</li>
		<li>Protect map data files (Security feature)</li>
		<li>Easy inject maps to anywhere in your Joomla site (front-end)</li>
		</ul>
		<p style="text-align: center;">
			<img src="components/com_yos_ammap/images/yos_ammap.png"/>
		</p>
	</div>
	<div id="developer_about">
		<b>Developer</b>: <br/>
		<ul>
			<font style="font-weight:normal;">
			<li><strong>Analyser:</strong> <a href="mailto:minhna@gmail.com">Minh Nguyen Anh</a></li>
			<li><strong>Coder & Developer:</strong> <a href="mailto:sonvnn@gmail.com">Son Le Van</a></li>
			<li><strong>Support:</strong> <a href="http://bugtracker.yopensource.com">Bug Tracker</a></li>
			<li><a href="http://www.yopensource.com">www.yopensource.com</a></li>
			</font>
		</ul>	
		<p><b>Info:</b></p>
		<font style="font-weight:normal;">		
		&nbsp;&nbsp;Version: This version is <?php echo $this->get('Version'); ?>&nbsp; This's Pro-Version.<br/><br/>
		
		<b>Demo</b>: <a href="http://joomla.yopensource.com/yos-ammap/1.5/">Pro-Version</a><br/><br/>
		<?php
		if ($this->checkversion) {
			echo '<a href="http://www.yopensource.com/"><font color="red">New version is available!</font></a>&nbsp;&nbsp;&nbsp;';
			echo '<a title="Upgrade" href="index.php?option=com_yos_ammap&amp;task=upgrade.doupdate&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Backup" href="index.php?option=com_yos_ammap&amp;task=upgrade.getbackup&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Undo Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Get Backup File" href="index.php?option=com_yos_ammap&amp;task=upgrade.getFileBackup"><b>Get Backup File!</b></a>';
			
		} else {
			echo 'Your version is latest!';
			echo '&nbsp;&nbsp;&nbsp;<a title="Backup" href="index.php?option=com_yos_ammap&amp;task=upgrade.getbackup&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Undo Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Get Backup File" href="index.php?option=com_yos_ammap&amp;task=upgrade.getFileBackup"><b>Get Backup File!</b></a>';
		}
		?>
		<p>
			<b>Copyright</b>: &copy; 2008 - 2009 YOS Team. All rights reserved.<br />
			<b>License</b>: Commercial.	
		</p>
		</font>
	</div>
</div>
</div>
	
