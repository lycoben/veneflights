<?php

function jfpostsef(&$uri){
	$path = $uri->getPath();
	$path = strpos($path,"/")===0?substr($path,1):$path;

	$db =& JFactory::getDBO();
	$sql = "SELECT newurl FROM #__redirection WHERE newurl<>'' AND LOWER(oldurl)='".strtolower($path)."'";
	$db->setQuery($sql);
	$rows = $db->loadObjectList();
	if (count($rows)==1){

		$newuri = new JURI($rows[0]->newurl);
		$lang = $newuri->getVar("lang","");

		if ($lang==""){
			$lang="en-GB";
		}
		$lang = str_replace("_","-",$lang);
		$newuri->setVar("lang");
		$link = JRoute::_($newuri->toString(array('path', 'query', 'fragment')));
		global $mainframe;
		$mainframe->redirect($link,"Post Sef redirected");
		exit();

	}
}