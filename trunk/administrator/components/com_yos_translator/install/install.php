<?php
/**
*
* @version $Id: install.s4_component_template.php, v 0.1 2007/11/03 18:42:04 m203cb $
* @package test_joomla-1.5
* @copyright Copyright (C) 2008 s4vn. All rights reserved.
* @license http://s4vn.com
* 
* http://s4vn.com
*/

defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.file');

/* create tables */
$database = JFactory::getDBO();    

/* create tables translator */
$query = "CREATE TABLE `#__yos_translator` (
		  `code_language` varchar(20) NOT NULL,
		  `code_translator` varchar(20) NOT NULL,
		  PRIMARY KEY  (`code_language`,`code_translator`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

$database->setQuery($query);
if(!$database->query())
	echo "create check".$database->getErrorMsg();  

$plugin =& JPluginHelper::getPlugin('content', 'yos_translator');	
if (!count($plugin)) {
	if (JFile::exists(JPATH_ROOT.DS.'components'.DS.'com_yos_translator'.DS.'yos_translator.php') && JFile::exists(JPATH_ROOT.DS.'components'.DS.'com_yos_translator'.DS.'yos_translator.xml')) {
    	JFile::move(JPATH_ROOT.DS.'components'.DS.'com_yos_translator'.DS.'yos_translator.php',JPATH_PLUGINS.DS.'content'.DS.'yos_translator.php');
    	JFile::move(JPATH_ROOT.DS.'components'.DS.'com_yos_translator'.DS.'yos_translator.xml',JPATH_PLUGINS.DS.'content'.DS.'yos_translator.xml');
    	/* insert plug-in */
	    $query	=	"INSERT INTO `#__plugins` (`name`,`element`,`folder`,`access`,`ordering`,`published`,`iscore`,`client_id`,`checked_out`,`checked_out_time`,`params`) VALUES ('YOS Translator Plug-in Notranslate','yos_translator','content',0,0,1,0,0,0,'0000-00-00 00:00:00','');";
	    $database->setQuery($query);
	    $database->query();
    }
}    

?>
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
	
	&nbsp;&nbsp;Copyright: &copy; 2008 YOS Team. All rights reserved.<br />		
	</font>
</div>
</div>
</div>