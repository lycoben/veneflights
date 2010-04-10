<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
JHTML::_('behavior.modal');
define( 'YOURBASEPATH', dirname(__FILE__) );
require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );

    $live_site        					= $mainframe->getCfg('live_site');
	$default_style    					= $this->params->get("defaultStyle", "light");
	$enable_pngfix 				        = ($this->params->get("enablePngfix", 1)  == 0)?"false":"true";
	$enable_fontspans 					= ($this->params->get("enableFontspans", 1)  == 0)?"false":"true";
	$enable_sifr 					    = ($this->params->get("enableSifr", 0)  == 0)?"false":"true";
	$font_sifr        					= $this->params->get("fontSifr", "walkway");
	$font_family       					= $this->params->get("fontFamily", "optima");
	$template_width   					= $this->params->get("templateWidth", "962");
	$sidebar_width						= $this->params->get("sidebarWidth", "250");
	$sidebar_side     					= $this->params->get("sidebarSide", "right");
	$menu_name       	 				= $this->params->get("menuName", "mainmenu");
	$menu_type        					= $this->params->get("menuType", "splitmenu");
	$menu_style        					= $this->params->get("menuStyle", "menustyle3");
	$default_font     					= $this->params->get("defaultFont", "default");
	$show_fontbuttons 					= ($this->params->get("showFontbuttons", 1)  == 0)?"false":"true";
	$show_breadcrumbs 					= ($this->params->get("showBreadcrumbs", 1)  == 0)?"false":"true";
	$show_moduleslider 					= ($this->params->get("showModuleslider", 1)  == 0)?"false":"true";
	
	// moomenu options
	$moo_bgiframe     					= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
	$moo_delay       					= $this->params->get("moo_delay", "500");
	$moo_duration    					= $this->params->get("moo_duration", "400");
	$moo_fps          					= $this->params->get("moo_fps", "100");
	$moo_transition   					= $this->params->get("moo_transition", "Expo.easeOut");	

	// rokzoom options
	$enable_rokzoom   					= ($this->params->get("enableRokzoom", 1)  == 0)?"false":"true";
	$zoom_resize_duration     			= $this->params->get("zoom_resize_duration", "700");
	$zoom_opacity_duration     			= $this->params->get("zoom_opacity_duration", "500");
	$zoom_transition   			  		= $this->params->get("zoom_transition", "Cubic.easeOut");

	// module title for moduleslider
	$max_mods_per_row					= $this->params->get("maxModsPerRow", 3);
	$ms_title1							= $this->params->get("msTitle1", "Group 1 Tab");	
	$ms_title2							= $this->params->get("msTitle2", "Group 2 Tab");	
	$ms_title3							= $this->params->get("msTitle3", "Group 3 Tab");	
	$ms_title4							= $this->params->get("msTitle4", "Group 4 Tab");	
	$ms_title5							= $this->params->get("msTitle5", "Group 5 Tab");		
	$ms_module1							= $this->params->get("msModule1", "user7");		
	$ms_module2							= $this->params->get("msModule2", "user8");			
	$ms_module3							= $this->params->get("msModule3", "user9");			
	$ms_module4							= $this->params->get("msModule4", "user10");			
	$ms_module5							= $this->params->get("msModule5", "user11");
								
	require(YOURBASEPATH .DS."rt_styleloader.php");
								
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<jdoc:include type="head" />
<?php $this->setGenerator('Venezuela Flight Reservation'); ?>
	<?php							
	require(YOURBASEPATH .DS."rt_tabmodules.php");
	require(YOURBASEPATH .DS."rt_utils.php");
    require(YOURBASEPATH .DS."rt_head_includes.php");
    ?>
	</head>
	<body id="ff-<?php echo $fontfamily; ?>" class="<?php echo $fontstyle; ?> <?php echo $tstyle; ?>">
		<!-- begin wrapper -->
		<div class="wrapper">
			<!-- begin top section -->
			<div id="top">
				<a href="http://www.venezuelaflights.info/" title="venezuela cheap flights" class="nounder"><img src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template; ?>/images/blank.gif" border="0" alt="national flights venezuela" id="rocket" /></a>
				<?php if ($this->countModules('search')) : ?>
					<div id="mod-search">
						<jdoc:include type="modules" name="search" style="xhtml" />
					</div>
				<?php endif; ?>
				<?php if ($show_fontbuttons == "true") : ?>
				<div id="accessibility">
					<div id="buttons">
						<a href="<?php echo $thisurl; ?>fontstyle=f-larger" title="Increase size" class="large"><span class="button">&nbsp;</span></a>
						<a href="<?php echo $thisurl; ?>fontstyle=f-default" title="Default size" class="default"><span class="button">&nbsp;</span></a>
						<a href="<?php echo $thisurl; ?>fontstyle=f-smaller" title="Decrease size" class="small"><span class="button">&nbsp;</span></a>
					</div>
				</div>
				<?php endif; ?>	
			</div>
			<!-- end top section -->
			<!-- begin mainbody -->
			<div id="mainbody-top">
				<div id="mainbody-top2">
					<div id="mainbody-top3">
					</div>
				</div>
			</div>
			<div id="mainbody">
				<!-- begin header -->
				<div id="header">
					<a href="<?php echo $this->baseurl;?>" class="nounder"><img src="<?php echo $this->baseurl;?>/images/blank.png" border="0" alt="" id="logo" /></a>
					<div id="horiz-menu" class="<?php echo $mtype; ?> <?php echo $mstyle; ?>">
						<div id="horiz-menu2">
							<?php if($mtype != "module") : ?>
								<?php echo $topnav; ?>
							<?php else: ?>
								<jdoc:include type="modules" name="toolbar" style="none" />
							<?php endif; ?>	
						</div>
					</div>
				</div>
				<!-- end header -->
				<?php if ($show_breadcrumbs == "true") : ?>
					<div id="pathway">
						<jdoc:include type="module" name="breadcrumbs" style="none" />
					</div>
				<?php endif; ?>
				<div id="mainbody-padding">
					<!-- begin maincolumn -->
					<div id="maincol">
					    <div id="maincol-container">
	    					<?php if ($this->countModules('header')) : ?>
    						<div id="showcase">
    							<jdoc:include type="modules" name="header" style="rounded" />
    						</div>
    						<?php endif; ?>
    						<?php if ($show_moduleslider=="true" and ($this->countModules('user7') or $this->countModules('user8') 
    					or $this->countModules('user9') or $this->countModules('user10') or $this->countModules('user11'))) : ?>
    							<div id="moduleslider-size">
    								<?php displayTabs($this); ?>
    							</div>
    						<?php endif; ?>
    						<jdoc:include type="message" />
    						<div id="body-padding">
							    <jdoc:include type="component" />
							</div>
    						<?php if ($this->countModules('user1') or $this->countModules('user2')) : ?>
    						<div id="mainmodules" class="spacer<?php echo $mainmod_width; ?>">
    						<?php if ($this->countModules('user1')) : ?>
    							<div class="block">
    								<jdoc:include type="modules" name="user1" style="rounded" />
    							</div>
    						<?php endif; ?>
    						<?php if ($this->countModules('user2')) : ?>
    							<div class="block">
    								<jdoc:include type="modules" name="user2" style="rounded" />
    							</div>
    						<?php endif; ?>
    						</div>
    						<?php endif; ?>
    					</div>
					</div>
					<!-- end maincolumn -->
					<!-- begin sidecolumn -->
					<?php if ($this->countModules($sidebar) or ($subnav)) : ?>
						<div id="sidecol">
							<div id="sidecol-padding">
								<?php if($subnav) : ?>
									<div id="sub-menu" class="<?php echo $mstyle; ?>">
										<?php echo $subnav; ?>
									</div>
								<?php endif; ?>
								<?php if ($sidebar == "right") : ?><jdoc:include type="modules" name="right" style="rounded" /><?php else: ?><jdoc:include type="modules" name="left" style="rounded" /><?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<!-- end sidecolumn -->
					<div class="clr"></div>
				</div>
			</div>
			<!-- end mainbody -->
			<!-- begin bottom section -->
			<?php if ($this->countModules('user3') or $this->countModules('user4') or $this->countModules('user5') or $this->countModules('user6')) : ?>
				<div id="bottom">
					<div id="bottommodules" class="spacer<?php echo $bottommods_width; ?>">
				<?php if ($this->countModules('user3')) : ?>
					<div class="block">
						<jdoc:include type="modules" name="user3" style="rounded" />
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('user4')) : ?>
					<div class="block">
						<jdoc:include type="modules" name="user4" style="rounded" />
					</div>
				<?php endif; ?>
				<?php if ($this->countModules('user5')) : ?>
					<div class="block">
						<jdoc:include type="modules" name="user5" style="rounded" />
					</div>
				<?php endif; ?>
					<?php if ($this->countModules('user6')) : ?>
						<div class="block">
							<jdoc:include type="modules" name="user6" style="rounded" />
						</div>
					<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<div id="mainbody-bottom">
				<div id="mainbody-bottom2">
					<div id="mainbody-bottom3">
					</div>
				</div>
			</div>
			<!-- end bottom section -->
			<?php if ($this->countModules('footer')) : ?>
				<div align="center">
				<div id="footer">
					<jdoc:include type="modules" name="footer" style="xhtml" />
				</div>
				</div>
			<?php endif; ?>
		</div>
		<!-- end wrapper -->
	</body>
</html>