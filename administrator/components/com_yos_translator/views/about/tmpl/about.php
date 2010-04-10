<?php defined('_JEXEC') or die('Restricted access'); ?>
<style type="text/css">
#yos_about {
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
<div id="yos_about">
	<div id="title_about">
		Yos Translator
	</div>
	<div id="content_about">
		<p style="margin-bottom: 0in;">
		<strong>Yos Translator</strong> is a semi-auto translator extension for both of Joomla 1.0.x and 1.5.x version.</p>
<p style="margin-bottom: 0in;">Yos Translator is supported by <a title="Google Translate" href="http://translate.google.com"><strong>Google Translate</strong></a>. Using Yos Translator, you can easily translate your articles to any language which is available on Google Translate.</p>
<p style="margin-bottom: 0in;">Yos Translator works with <a title="Joomfish" href="http://www.joomfish.net"><strong>Joomfish</strong></a> which is a great Joomla extension. With Joomfish you can make your website to support multiple languages very easily.</p>

<p style="margin-bottom: 0in;">Yos Translator is integrated in <strong>AJAX</strong> technology, and you can translate thousands articles to <strong>22 other languages</strong> with just a few clicks.</p>
<p style="margin-bottom: 0in;">Yos Translator provides two options are "Edit All" and "Edit One". "Edit All" mode help you to fast translate many articles to other languages. "Edit One" mode allow you translate just 1 article carefully. In this mode, you can edit translated text after Yos translator help you to do it.</p>
<p style="margin-bottom: 0in;">
		</p>
		
		<p style="text-align: center;">
			<img src="components/com_yos_translator/assets/images/icon-256-translator.png"/>
		</p>
	</div>
	<div id="developer_about">
		Developer: <br/>
		<ul>
			<font style="font-weight:normal;">
			<li><a href="mailto:minhna@yopensource.com">Minh Nguyen Anh</a></li>
			<li><a href="mailto:huycv@yopensource.com">Huy Chu Van</a></li>
			<li><a href="mailto:sonlv@yopensource.com">Son Le Van</a></li>
			<li><a href="http://www.yopensource.com">www.yopensource.com</a></li>
			</font>
		</ul>	
		Info:<br/>
		<font style="font-weight:normal;">		
		&nbsp;&nbsp;Version: This version is <?php echo $this->get('Version'); ?>&nbsp;
		<?php
		if ($this->checkversion) {
			echo '<a href="http://www.yopensource.com/"><font color="red">New version is available!</font></a>&nbsp;&nbsp;&nbsp;';
			echo '<a title="Upgrade" href="index.php?option=com_yos_translator&amp;task=upgrade.doupdate&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Backup" href="index.php?option=com_yos_translator&amp;task=upgrade.getbackup&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Undo Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Get Backup File" href="index.php?option=com_yos_translator&amp;task=upgrade.getFileBackup"><b>Get Backup File!</b></a>';
			
		} else {
			echo 'your version is latest!';
			echo '&nbsp;&nbsp;&nbsp;<a title="Backup" href="index.php?option=com_yos_translator&amp;task=upgrade.getbackup&amp;version='.$this->get('Version').'&amp;url='.$this->get('URL').'&amp;pc='.$this->get('PC').'"><b>Undo Upgrade Now!</b></a>';
			echo '&nbsp;&nbsp;&nbsp;<a title="Get Backup File" href="index.php?option=com_yos_translator&amp;task=upgrade.getFileBackup"><b>Get Backup File!</b></a>';
		}
		?>
		<br/>
		&nbsp;&nbsp;Copyright: &copy; 2008 YOS Team. All rights reserved.<br />		
		</font>
	</div>
</div>
</div>
	
