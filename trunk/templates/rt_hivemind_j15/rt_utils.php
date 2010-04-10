<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );

global $Itemid, $modules_list;

// menu code
$document	= &JFactory::getDocument();
$renderer	= $document->loadRenderer( 'module' );
$options	 = array( 'style' => "raw" );
$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
$topnav = false; $subnav = false;
if ($mtype=="splitmenu") :
	$module->params	= "menutype=$menu_name\nstartLevel=0\nendLevel=1\nclass_sfx=top";
	$topnav = $renderer->render( $module, $options );
	$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
	$module->params	= "menutype=$menu_name\nstartLevel=1\nendLevel=9\nclass_sfx";
	$options	 = array( 'style' => "submenu");
	$subnav = $renderer->render( $module, $options );
elseif ($mtype=="moomenu" or $mtype=="suckerfish") :
	$module->params	= "menutype=$menu_name\nshowAllChildren=1\nclass_sfx=top";
	$topnav = $renderer->render( $module, $options );
endif;

// make sure subnav is empty
if (strlen($subnav) < 10) $subnav = false;
//Are we in edit mode
$editmode = false;
if (JRequest::getCmd('task') == 'edit' ) :
	$editmode = true;
endif;

$mainmod_count = ($this->countModules('user1')>0) + ($this->countModules('user2')>0);
$mainmod_width = $mainmod_count > 0 ? ' w' . floor(99 / $mainmod_count) : '';
$bottommods_count = ($this->countModules('user3')>0) + ($this->countModules('user4')>0) + ($this->countModules('user5')>0) + ($this->countModules('user6')>0);
$bottommods_width = $bottommods_count > 0 ? ' w' . floor(99 / $bottommods_count) : '';

$sidebar_width = ($this->countModules($sidebar_side)>0 or $subnav) ? $sidebar_width : "0";
$template_width = 'margin: 0 auto; width: ' . $template_width . 'px;';
$template_path = $this->baseurl . "/templates/" . $this->template;
$sidebar_alt = $sidebar == "right" ? "left" : "right";

// module slider configuration
$modules_list 				= array(array("title"=>$ms_title1, "module"=>$ms_module1),
									array("title"=>$ms_title2, "module"=>$ms_module2),
									array("title"=>$ms_title3, "module"=>$ms_module3),
									array("title"=>$ms_title4, "module"=>$ms_module4),
									array("title"=>$ms_title5, "module"=>$ms_module5));

function rok_isIe7() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 7')) return true;
	return false;
}

function rok_isIe6() {
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if (stristr($agent, 'msie 6')) return true;
	return false;
}

?>