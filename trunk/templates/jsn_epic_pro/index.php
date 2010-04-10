<?php
/**
	* @copyright Copyright (C) 2006 - 2008 
	* @author 
	* @license Commercial Proprietary
	* Please visit http://www.paxsoft.net for more information
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Template version 2.0 for Joomla! 1.5.x -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<?php
	require( YOURBASEPATH.DS."php/jsn_utils.php");
	/****************************************************************/
	/* TEMPLATE PARAMETERS */

	/* Template color */
	$template_color = $this->params->get("templateColor", "blue"); // blue | red | green | violet | orange | grey

	/* Template font */
	$template_font = $this->params->get("templateFont", 1); // 1 - Business / Corporation | 2 - Personal / Blog | 3 - News / Magazines;
	
	/* Path to logo image starting from the Joomla! root folder (! without preceding slash !). */
	$logo_path = $this->params->get("logoPath", "templates/jsn_epic_pro/images/logo.png");

	/* Logo width specified in pixels. */
	$logo_width = $this->params->get("logoWidth", "250px");

	/* Logo height specified in pixels. */
	$logo_height = $this->params->get("logoHeight", "75px");

	/* URL where logo image should link to (! without preceding slash !). Leave this box empty if you want your logo to be clickable. */
	$logo_link = $this->params->get("logoLink", "");

	/* Slogan text to be attached to the logo image ALT text for SEO purpose. */
	$logo_slogan = $this->params->get("logoSlogan", "");

	/* Overall template width specified in pixels (for fixed width) or percentage (for fluid width). */
	$template_width = $this->params->get("templateWidth", "960px");

	/* Left column width specified in percentage within range (18% - 33%).
	   Only whole number is allowed, for example 25% - correct, 25.5% - incorrect */
	$left_width = $this->params->get("leftWidth", "23%");

	/* Right column width specified in percentage within range (18% - 33%).
	   Only whole number is allowed, for example 25% - correct, 25.5% - incorrect */
	$right_width = $this->params->get("rightWidth", "23%");

	/* Menu icons to be shown in Icon Menu */
	$menu_icons = $this->params->get("menuIcons", "home,info,image,download,mail,comment");

	/* Definition whether to show pathway or not */
	$show_pathway = ($this->params->get("showPathway", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable font size selector or not */
	$enable_fontresizer = ($this->params->get("enableFontresizer", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable auto icon link or not. Icons can still be assigned to links by class attribute even if this option is turned off */
	$enable_iconlinks = ($this->params->get("enableIconLinks", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable PNG fix feature for IE6 or not.
	   This parameter should be turned off only when there are incompatibility issues. */
	$enable_pngfix = ($this->params->get("enablePNGfix", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable additional style for Community Builder extension.
	   You can turn off this parameter if you want to use specific Community Builder template. */
	$enable_style_cb = ($this->params->get("enableStyleCB", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable additional style for DocMan extension.
	   You can turn off this parameter if you want to use specific DocMan template. */
	$enable_style_docman = ($this->params->get("enableStyleDocMan", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable additional style for Virtue Mart extension.
	   You can turn off this parameter if you want to use specific Virtue Mart template. */
	$enable_style_vm = ($this->params->get("enableStyleVM", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable additional style for JEvents extension.
	   You can turn off this parameter if you want to use specific JEvents template. */
	$enable_style_jevents = ($this->params->get("enableStyleJEvents", 1) == 1)?"yes":"no"; // yes | no

	/* Definition whether to enable additional style for RSGallery2 extension.
	   You can turn off this parameter if you want to use specific RSGallery2 template. */
	$enable_style_rsg2 = ($this->params->get("enableStyleRSG2", 1) == 1)?"yes":"no"; // yes | no

	/* Definition how to display PHP error reporting.
	   This parameter should be used only in template testing cases. */
	$error_repoting = $this->params->get("errorReporting", "default"); // default | on | off


	/****************************************************************/

	/* Private use only */
	$content_fonts = array(
		array(75, 'Arial, Helvetica, sans-serif'),
		array(80, '"Trebuchet MS", Helvetica, sans-serif'),
		array(85, '"Times New Roman", Times, serif')
		);
	
	$heading_fonts = array(
		'Verdana, Geneva, sans-serif',
		'Georgia, serif',
		'"Palatino Linotype", Palatino, serif'
		);
	
	$template_path = $this->baseurl."/templates/".$this->template;
	$left_width = round($left_width);
	$right_width = round($right_width);
	$has_right = $this->countModules('right');
	$has_left = $this->countModules('left');
	$has_user8 = $this->countModules('user8');
	$has_user9 = $this->countModules('user9');

	$logo_image = $this->baseurl."/".$logo_path;
	$logo_text = $mainframe->getCfg('sitename').($logo_slogan != ''?' - '.$logo_slogan:'');

	switch($error_repoting) {
		case "off":
			error_reporting(0);
			break;

		case "on":
			error_reporting(E_ALL);
			break;
	}

	// Parameter filter
	$template_font -= 1;
	$template_width = intval($template_width);
	$template_width .= ($template_width < 100)?"%":"px";
	$left_width = intval($left_width)."%";
	$right_width = intval($right_width)."%";
	$logo_width = intval($logo_width)."px";
	$logo_height = intval($logo_height)."px";
	$logo_link = ($logo_link != "")?$this->baseurl."/".$logo_link:"";
?>
<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
<link href="<?php echo $template_path; ?>/css/template.css" rel="stylesheet" type="text/css" media="screen" />
<?php
	// Loading specific CSS color file
	if($template_color != "blue") echo '<link href="'.$template_path.'/css/template_'.$template_color.'.css" rel="stylesheet" type="text/css" media="screen" />';

	// Loading specific CSS file for auto icon links
	if($enable_iconlinks == "yes") echo '<link href="'.$template_path.'/css/jsn_iconlinks.css" rel="stylesheet" type="text/css" media="screen" />';
	
	// Inline CSS styles  for external extensions
	if($enable_style_cb == "yes") {
		echo '<link href="'.$template_path.'/ext/cb/style.css" rel="stylesheet" type="text/css" media="screen" />';
		if($template_color != "blue") echo '<link href="'.$template_path.'/ext/cb/style_'.$template_color.'.css" rel="stylesheet" type="text/css" media="screen" />';
	}
	if($enable_style_docman == "yes") {
		echo '<link href="'.$template_path.'/ext/docman/style.css" rel="stylesheet" type="text/css" media="screen" />';
		if($template_color != "blue") echo '<link href="'.$template_path.'/ext/docman/style_'.$template_color.'.css" rel="stylesheet" type="text/css" media="screen" />';
	}
	if($enable_style_vm == "yes") {
		echo '<link href="'.$template_path.'/ext/vm/style.css" rel="stylesheet" type="text/css" media="screen" />';
	}
	if($enable_style_jevents == "yes") {
		echo '<link href="'.$template_path.'/ext/jevents/style.css" rel="stylesheet" type="text/css" media="screen" />';
		if($template_color != "blue") echo '<link href="'.$template_path.'/ext/jevents/style_'.$template_color.'.css" rel="stylesheet" type="text/css" media="screen" />';
	}
	if($enable_style_rsg2 == "yes") {
		echo '<link href="'.$template_path.'/ext/rsg2/style.css" rel="stylesheet" type="text/css" media="screen" />';
	}

	// Inline CSS styles for template layout
	echo '<style type="text/css">';

	// Setup template width parameter
	echo '
	#jsn-page {
		width: '.$template_width.';
	}
	';

	// Adjustment of header area according to the logo height parameter
	echo '
	#jsn-header {
		height: '.$logo_height.';
	}
	';

	if($enable_fontresizer == "yes") {
	echo '
	#jsn-pinset {
		right: 86px;
	}
	';
	}

	// Setup width of promo area
	$tw = 100;
	$lw = intval($left_width);
	$rw = intval($right_width);
	if ($has_user9)	$tw -= $lw;
	if ($has_user8) $tw -= $rw;
	if(intval($template_width) < 100) {
		$tws = ($tw - 0.1).'%';
	}else{
		$tws = floor($tw*0.01*intval($template_width)).'px';
	}
	echo '
	#jsn-puser9 {
		float: left;
		width: '.$lw.'%;
	}
	#jsn-pheader {
		float: left;
		width: '.$tws.';
	}
	#jsn-puser8 {
		float: right;
		width: '.$rw.'%;
	}
	';

	// Setup width of content area
	$tw = 100;
	if ($has_left) {
		$tw -= $lw;
		echo '
	#jsn-content_inner1 {
		background: transparent url('.$template_path.'/images/bg/leftside'.$lw.'-bg-full.png) repeat-y '.$lw.'% top;
		padding: 0;
	}
	#jsn-maincontent_inner {
		padding-left: 0;
	}
	';
	}

	if ($has_right) {
		$tw -= $rw;
		echo '
	#jsn-content_inner2 {
		background: transparent url('.$template_path.'/images/bg/rightside'.$rw.'-bg-full.png) repeat-y '.(100-$rw).'% top;
		padding: 0;
	}
	#jsn-maincontent_inner {
		padding-right: 0;
	}
	';
	}
	if(intval($template_width) < 100) {
		$tws = ($tw - 0.1).'%';
	}else{
		$tws = floor($tw*0.01*intval($template_width)).'px';
	}
	echo '
	#jsn-leftsidecontent {
		float: left;
		width: '.$lw.'%;
	}
	#jsn-maincontent {
		float: left;
		width: '.$tws.';
	}
	#jsn-rightsidecontent {
		float: right;
		width: '.$rw.'%;
	}
	';

	// Setup icons for Icon Menu
	$icons = explode(",", $menu_icons);
	$icons_length = count($icons);
	for($i=0;$i<$icons_length;$i++){
		echo '
			ul.menu-icon li.order'.($i+1).' a:link,
			ul.menu-icon li.order'.($i+1).' a:visited {
				background-image: url("'.JURI::root()."templates/".$this->template.'/images/icon-module-'. $icons[$i].'.png");
			}
			';
	}

	// Setup template width parameter
	echo '
	#jsn-master {
		font-size: '.$content_fonts[$template_font][0].'%;
		font-family: '.$content_fonts[$template_font][1].';
	}
	
	h1, h2, h3, h4, h5, h6,
	ul.menu-suckerfish a,
	.componentheading, .contentheading {
		font-family: '.$heading_fonts[$template_font].' !important;
	}
	';
	
	echo '</style>';

	// Setup core javascript library
	echo '<script type="text/javascript" src="'.$template_path.'/js/jsn_script.js"></script>';
	
	// Setup javascript if font resizer is enabled
	if($enable_fontresizer == "yes") {
	echo '
	<script type="text/javascript">
		var defaultFontSize = '.$content_fonts[$template_font][0].';
	</script>
	<script type="text/javascript" src="'.$template_path.'/js/jsn_epic.js"></script>
	';
	}
?>
<!--[if lte IE 6]>
<link href="<?php echo $template_path; ?>/css/jsn_fixie6.css" rel="stylesheet" type="text/css" />
<?php if($enable_pngfix == "yes") {?>
<script type="text/javascript">
	var blankImg = '<?php echo $this->baseurl; ?>/images/blank.png';
</script>
<style type="text/css">
	img {  behavior: url(<?php echo $template_path;?>/js/iepngfix.htc); }
</style>
<?php } ?>
<![endif]-->
<!--[if lte IE 7]>
<script type="text/javascript" src="<?php echo $template_path; ?>/js/suckerfish.js"></script>
<![endif]-->
<!--[if IE 7]>
<link href="<?php echo $template_path; ?>/css/jsn_fixie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="jsn-master">
	<div id="jsn-page">
		<div id="jsn-header">
			<div id="jsn-logo"><?php if ($logo_link != "") echo '<a href="'.$logo_link.'" title="'.$logo_text.'">'; ?><img src="<?php echo $logo_image;?>" width="<?php echo intval($logo_width); ?>" height="<?php echo intval($logo_height); ?>" alt="<?php echo $logo_text; ?>" /><?php if ($logo_link != "") echo '</a>'; ?></div>
			<?php if ($this->countModules( 'top' ) > 0) { ?>
			<div id="jsn-ptop"><jdoc:include type="modules" name="top" style="xhtml" /></div>
			<?php } ?>
		</div>
		<div id="jsn-body">
			<?php if (jsnCountPositions($this, array('toolbar', 'inset')) || $enable_fontresizer == "yes") { ?>
			<div id="jsn-mainmenu">
				<?php if ($this->countModules( 'toolbar' ) > 0) { ?>
				<div id="jsn-ptoolbar"><jdoc:include type="modules" name="toolbar" style="xhtml" /></div>
				<?php } ?>
				<?php if ($this->countModules( 'inset' ) > 0) { ?>
				<div id="jsn-pinset"><jdoc:include type="modules" name="inset" style="xhtml" /></div>
				<?php } ?>
				<?php if ($enable_fontresizer == "yes") { ?>
				<div id="jsn-fontresizer">
					<ul class="hlist">
						<li><a onclick="jsnChangeFontSize(-1);" title="Decrease font size" href="javascript:void(0)"><img alt="Decrease font size" src="<?php echo $template_path; ?>/images/font-decrease.png"/></a></li>
						<li><a onclick="jsnResetFontSize();" title="Reset font size to default" href="javascript:void(0)"><img alt="Reset font size to default" src="<?php echo $template_path; ?>/images/font-reset.png"/></a></li>
						<li><a onclick="jsnChangeFontSize(1);" title="Increase font size" href="javascript:void(0)"><img alt="Increase font size" src="<?php echo $template_path; ?>/images/font-increase.png"/></a></li>
					</ul>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php
				if(jsnCountPositions($this, array('header', 'user8', 'user9'))) {
			?>
			<div id="jsn-promo">
				<?php if ($this->countModules( 'user9' ) > 0) { ?>
				<div id="jsn-puser9" class="jsn-column"><div id="jsn-puser9_inner"><jdoc:include type="modules" name="user9" style="xhtml" /></div></div>
				<?php } ?>
				<?php if ($this->countModules( 'header' ) > 0) { ?>
				<div id="jsn-pheader" class="jsn-column"><jdoc:include type="modules" name="header" style="xhtml" /></div>
				<?php } ?>
				<?php if ($this->countModules( 'user8' ) > 0) { ?>
				<div id="jsn-puser8" class="jsn-column"><div id="jsn-puser8_inner"><jdoc:include type="modules" name="user8" style="xhtml" /></div></div>
				<?php } ?>
				<div class="clearbreak"></div>
			</div>
			<?php } ?>
			<div id="jsn-content"><div id="jsn-content_inner1"><div id="jsn-content_inner2">
				<?php if ($this->countModules( 'left' ) > 0) { ?>
				<div id="jsn-leftsidecontent" class="jsn-column">
					<div id="jsn-pleft"><jdoc:include type="modules" name="left" style="rounded" /></div>
				</div>
				<?php } ?>
				<div id="jsn-maincontent" class="jsn-column"><div id="jsn-maincontent_inner">
					<?php if ($show_pathway == "yes") { ?>
					<div id="jsn-pathway"><jdoc:include type="module" name="breadcrumbs" style="raw" /></div>
					<?php } ?>
					<?php
						$positionCount = jsnCountPositions($this, array('user1', 'user2'));
						if($positionCount){
							$grid_suffix = "_grid".$positionCount;
					?>
					<div id="jsn-usermodules1"><div id="jsn-usermodules1_inner<?php echo $grid_suffix; ?>">
						<?php if ($this->countModules( 'user1' ) > 0) { ?>
						<div id="jsn-puser1<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser1"><jdoc:include type="modules" name="user1" style="xhtml" /></div></div>
						<?php } ?>
						<?php if ($this->countModules( 'user2' ) > 0) { ?>
						<div id="jsn-puser2<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser2"><jdoc:include type="modules" name="user2" style="xhtml" /></div></div>
						<?php } ?>
						<div class="clearbreak"></div>
					</div></div>
					<?php } ?>
					<div id="jsn-mainbody">
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					</div>
					<?php
					$positionCount = jsnCountPositions($this, array('user3', 'user4'));
					if($positionCount){
						$grid_suffix = "_grid".$positionCount;
					?>
					<div id="jsn-usermodules2"><div id="jsn-usermodules2_inner<?php echo $grid_suffix; ?>">
						<?php if ($this->countModules( 'user3' ) > 0) { ?>
						<div id="jsn-puser3<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser3"><jdoc:include type="modules" name="user3" style="xhtml" /></div></div>
						<?php } ?>
						<?php if ($this->countModules( 'user4' ) > 0) { ?>
						<div id="jsn-puser4<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser4"><jdoc:include type="modules" name="user4" style="xhtml" /></div></div>
						<?php } ?>
						<div class="clearbreak"></div>
					</div></div>
					<?php } ?>
					<?php if ($this->countModules( 'banner' ) > 0) { ?>
					<div id="jsn-banner"><jdoc:include type="modules" name="banner" style="xhtml" /></div>
					<?php } ?>
				</div></div>
				<?php if ($this->countModules( 'right' ) > 0) { ?>
				<div id="jsn-rightsidecontent" class="jsn-column">
					<div id="jsn-pright"><jdoc:include type="modules" name="right" style="rounded" /></div>
				</div>
				<?php } ?>
				<div class="clearbreak"></div>
			</div></div></div>
			<?php
			$positionCount = jsnCountPositions($this, array('user5', 'user6', 'user7'));
			if($positionCount){
				$grid_suffix = "_grid".$positionCount;
			?>
			<div id="jsn-usermodules3"><div id="jsn-usermodules3_inner<?php echo $grid_suffix; ?>">
				<?php if ($this->countModules( 'user5' ) > 0) { ?>
				<div id="jsn-puser5<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser5"><jdoc:include type="modules" name="user5" style="xhtml" /></div></div>
				<?php } ?>
				<?php if ($this->countModules( 'user6' ) > 0) { ?>
				<div id="jsn-puser6<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser6"><jdoc:include type="modules" name="user6" style="xhtml" /></div></div>
				<?php } ?>
				<?php if ($this->countModules( 'user7' ) > 0) { ?>
				<div id="jsn-puser7<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-puser7"><jdoc:include type="modules" name="user7" style="xhtml" /></div></div>
				<?php } ?>
				<div class="clearbreak"></div>
			</div></div>
			<?php } ?>
		</div>
		<?php
			$positionCount = jsnCountPositions($this, array('footer', 'bottom'));
			if($positionCount){
				$grid_suffix = "_grid".$positionCount;
		?>
		<div id="jsn-footer">
			<?php if ($this->countModules( 'footer' ) > 0) { ?>
			<div id="jsn-pfooter<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-pfooter"><jdoc:include type="modules" name="footer" style="xhtml" /></div></div>
			<?php } ?>
			<?php if ($this->countModules( 'bottom' ) > 0) { ?>
			<div id="jsn-pbottom<?php echo $grid_suffix; ?>" class="jsn-column"><div id="jsn-pbottom"><jdoc:include type="modules" name="bottom" style="xhtml" /></div></div>
			<?php } ?>
			<div class="clearbreak"></div>
		</div>
		<?php } ?>
	</div>
	<jdoc:include type="modules" name="debug" />
</body>
</html>