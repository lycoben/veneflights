<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );

	$live_site        		= $mainframe->getCfg('live_site');
	$template_path 			= $this->baseurl . '/templates/' .  $this->template;
	$default_style 			= $this->params->get("defaultStyle", "style1");
	$enable_ie6warn         = ($this->params->get("enableIe6warn", 1)  == 0)?"false":"true";
	$font_family            = $this->params->get("fontFamily", "default");
	$template_width 		= $this->params->get("templateWidth", "968");
	$leftcolumn_width		= $this->params->get("leftcolumnWidth", "270");
	$rightcolumn_width		= $this->params->get("rightcolumnWidth", "270");
	$splitmenu_col			= $this->params->get("splitmenuCol", "rightcol");
	$menu_name 				= $this->params->get("menuName", "mainmenu");
	$menu_type 				= $this->params->get("menuType", "moomenu");
	$default_font 			= $this->params->get("defaultFont", "default");
	$show_moduleslider 		= ($this->params->get("showModuleslider", 1)  == 0)?"false":"true";
	$moduleslider_location	= $this->params->get("modulesliderLocation", "right");
	$moduleslider_height	= $this->params->get("modulesliderHeight", "400");
	$show_breadcrumbs 		= ($this->params->get("showBreadcrumbs", 0)  == 0)?"false":"true";
	$show_logo		 		= ($this->params->get("showLogo", 1)  == 0)?"false":"true";
	$show_bottomlogo		= ($this->params->get("showBottomlogo", 1)  == 0)?"false":"true";
	$show_date		 		= ($this->params->get("showDate", 1)  == 0)?"false":"true";
	$show_controls		 	= ($this->params->get("showControls", 1)  == 0)?"false":"true";
	$show_copyright 		= ($this->params->get("showCopyright", 1)  == 0)?"false":"true";

	// moomenu options
	$moo_bgiframe     		= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
	$moo_delay       		= $this->params->get("moo_delay", "500");
	$moo_duration    		= $this->params->get("moo_duration", "600");
	$moo_fps          		= $this->params->get("moo_fps", "200");
	$moo_transition   		= $this->params->get("moo_transition", "Sine.easeOut");
	
	$moo_bg_enabled			= ($this->params->get("moo_bg_enabled","0") == 0)?"false":"true";
	$moo_bg_over_duration		= $this->params->get("moo_bg_over_duration", "100");
	$moo_bg_over_transition		= $this->params->get("moo_bg_over_transition", "Expo.easeOut");
	$moo_bg_out_duration		= $this->params->get("moo_bg_out_duration", "800");
	$moo_bg_out_transition		= $this->params->get("moo_bg_out_transition", "Sine.easeOut");
	
	// module slider configuration

	$max_mods_per_row			= $this->params->get("maxModsPerRow", 3);
	$ms_title1					= $this->params->get("msTitle1", "Tab One");	
	$ms_title2					= $this->params->get("msTitle2", "Tab Two");	
	$ms_title3					= $this->params->get("msTitle3", "Tab Three");	
	$ms_title4					= $this->params->get("msTitle4", "Tab Four");	
	$ms_title5					= $this->params->get("msTitle5", "Tab Five");		
	$ms_module1					= $this->params->get("msModule1", "user11");		
	$ms_module2					= $this->params->get("msModule2", "user12");			
	$ms_module3					= $this->params->get("msModule3", "user13");			
	$ms_module4					= $this->params->get("msModule4", "user14");			
	$ms_module5					= $this->params->get("msModule5", "user15");
								
	require(YOURBASEPATH . "/rt_styleloader.php");
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	<head>
		<jdoc:include type="head" />
		<?php
		require(YOURBASEPATH . DS . "rt_tabmodules.php");
		require(YOURBASEPATH . DS . "rt_utils.php");
		require(YOURBASEPATH . DS . "rt_head_includes.php");

	?>
	</head>
	<body id="ff-<?php echo $fontfamily; ?>" class="<?php echo $fontstyle; ?> <?php echo $tstyle; ?> iehandle">
		<div id="header-panel">
			<div id="top-bg">
				<div class="wrapper">
					<!-- Begin Header Area -->
					<div id="header">
						<div id="header2">
							<div id="header3">
								<div id="header-top">
									<?php if($show_logo == "true") : ?>
									<a href="<?php echo $this->baseurl; ?>" class="nounder"><img src="<?php echo $template_path; ?>/images/blank.gif" border="0" alt="" id="logo" /></a>
									<?php else: ?>
									<div class="logo-module">
										<jdoc:include type="modules" name="icon" style="xhtml" />
									</div>
									<?php endif; ?>
									<div class="top-module">
										<jdoc:include type="modules" name="top" style="xhtml" />
									</div>
								</div>
								<!-- Begin Horizontal Menu -->
								<?php if ($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) : ?>
								<div id="horiz-menu-bar"><div id="horiz-menu-bar2"><div id="horiz-menu-bar3">
									<div id="horiz-menu" class="<?php echo $mtype; ?>">
										<?php if($mtype != "module") : ?>
											<?php echo $topnav; ?>
										<?php else: ?>
											<jdoc:include type="modules" name="toolbar" style="none" />
										<?php endif; ?>
									</div></div></div>
								</div>
								<?php else: ?>
								<div id="horiz-menu2-bar"><div id="horiz-menu2-bar2"><div id="horiz-menu2-bar3">
									<div id="horiz-menu" class="<?php echo $mtype; ?>">
										<?php if($mtype != "module") : ?>
											<?php echo $topnav; ?>
										<?php else: ?>
											<jdoc:include type="modules" name="toolbar" style="none" />
										<?php endif; ?>
									</div></div></div>
								</div>
								<?php endif; ?>
								<!-- End Horizontal Menu -->
							</div>
						</div>
					</div>
					<!-- End Header Area -->
				</div>
				<div class="wrapper">
					<!-- Begin Showcase Area -->
					<?php if ($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) : ?>
					<div id="showcase-main"><div id="showcase-main2"><div id="showcase-main3">
						<?php if ($this->countModules('rotator')) : ?>
						<div class="showcase-bg"></div>
						<div class="rotator-module">
							<jdoc:include type="modules" name="rotator" style="rounded" />
						</div>
						<?php else: ?>
						<div class="padding">
							<div id="showcasemodules" class="spacer<?php echo $showcasemod_width; ?>">
								<?php if ($this->countModules('advert1')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="advert1" style="rounded" />
								</div>
								<?php endif; ?>
								<?php if ($this->countModules('advert2')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="advert2" style="rounded" />
								</div>
								<?php endif; ?>
								<?php if ($this->countModules('advert3')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="advert3" style="rounded" />
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
					</div></div></div>
					<?php if ($this->countModules('rotator')) : ?>
					<div id="showcase-bottom" class="alt">
					<?php else: ?>
					<div id="showcase-bottom">
					<?php endif; ?>
					<div id="showcase-bottom2"><div id="showcase-bottom3">
						<?php if($show_date == "true") : ?>
						<div id="date-block">
							<span class="date"><?php $now = &JFactory::getDate(); echo $now->toFormat('%A, %B %d, %Y'); ?></span>
						</div>
						<?php endif; ?>
						<?php if($show_controls == "true") : ?>
						<div id="controls-block">
							<div class="fontbutton-text">Text Size</div>
							<div id="accessibility">
								<div id="buttons">
									<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-larger"); ?>" title="Increase size" class="large"><span class="button">&nbsp;</span></a>
									<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-smaller"); ?>" title="Decrease size" class="small"><span class="button">&nbsp;</span></a>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php if ($this->countModules('search')) : ?>
						<div id="searchmod">
							<jdoc:include type="modules" name="search" style="xhtml" />
						</div>
						<?php endif; ?>
					</div></div></div>
					<?php else: ?>
					<div id="menu2-bottom"><div id="menu2-bottom2"><div id="menu2-bottom3">
						<?php if($show_date == "true") : ?>
						<div id="date-block2">
							<span class="date"><?php $now = &JFactory::getDate(); echo $now->toFormat('%A,%B %d,%Y'); ?></span>
						</div>
						<?php endif; ?>
						<?php if($show_controls == "true") : ?>
						<div id="controls-block2">
							<div class="fontbutton-text">Text Size</div>
							<div id="accessibility">
								<div id="buttons">
									<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-larger"); ?>" title="Increase size" class="large"><span class="button">&nbsp;</span></a>
									<a href="<?php echo JROUTE::_($thisurl . "fontstyle=f-smaller"); ?>" title="Decrease size" class="small"><span class="button">&nbsp;</span></a>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php if ($this->countModules('search')) : ?>
						<div id="searchmod2">
							<jdoc:include type="modules" name="search" style="xhtml" />
						</div>
						<?php endif; ?>
					</div></div></div>
					<?php endif; ?>
					<!-- End Showcase Area -->
				</div>
				<!-- Begin Main Content Area -->
				<?php if ($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) : ?>
				<div id="mid-panel-bg"></div>
				<?php else: ?>
				<div id="mid-panel-bg-alt"></div>
				<?php endif; ?>
				<div class="wrapper">
					<div id="main-body">
						<div id="main-body2">
							<!-- Begin Left Column -->
							<?php if ($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")) : ?>
							<?php if (($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) and ($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol"))) : ?>
							<div id="leftcol2">
							<?php else : ?>
							<div id="leftcol">
							<?php endif; ?>
								<div class="sameheight">
									<div class="inner">
										<?php if ($subnav and $splitmenu_col=="leftcol") : ?>
										<div class="submenu-top"><div class="submenu-top2"><div class="submenu-top3"></div></div></div>
											<div class="submenu-main"><div class="submenu-main2">
												<?php echo $subnav; ?>
											</div></div>
										<div class="submenu-bottom"><div class="submenu-bottom2"><div class="submenu-bottom3"></div></div></div>
										<?php endif; ?>
										<jdoc:include type="modules" name="left" style="rounded" />
										<?php if ($show_moduleslider=="true" and ($moduleslider_location=="left" and ($this->countModules('user11') or $this->countModules('user12') 
			    					or $this->countModules('user13') or $this->countModules('user14') or $this->countModules('user15')))) : ?>
			    							<div id="moduleslider-size">
			    								<?php displayTabs($this); ?>
			    							</div>
			    						<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<!-- End Left Column -->
							<!-- Begin Right Column -->
							<?php if ($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) : ?>
							<?php if (($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) and ($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol"))) : ?>
							<div id="rightcol2">
							<?php else : ?>
							<div id="rightcol">
							<?php endif; ?>
								<div class="sameheight">
									<div class="inner">
										<?php if ($subnav and $splitmenu_col=="rightcol") : ?>
										<div class="submenu-top"><div class="submenu-top2"><div class="submenu-top3"></div></div></div>
											<div class="submenu-main"><div class="submenu-main2">
												<?php echo $subnav; ?>
											</div></div>
										<div class="submenu-bottom"><div class="submenu-bottom2"><div class="submenu-bottom3"></div></div></div>
										<?php endif; ?>
										<jdoc:include type="modules" name="right" style="rounded" />
										<?php if ($show_moduleslider=="true" and ($moduleslider_location=="right" and ($this->countModules('user11') or $this->countModules('user12') 
			    					or $this->countModules('user13') or $this->countModules('user14') or $this->countModules('user15')))) : ?>
			    							<div id="moduleslider-size">
			    								<?php displayTabs($this); ?>
			    							</div>
			    						<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<!-- End Right Column -->
							<!-- Begin Main Column -->
							<?php if ($this->countModules('advert1') or $this->countModules('advert2') or $this->countModules('advert3') or $this->countModules('rotator')) : ?>
							<div id="maincol-alt">
							<?php else: ?>
							<div id="maincol">
							<?php endif; ?>
								<?php if ($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")) : ?>
								<div id="maincol-border-left">
									<div id="maincol-border-left2">
							  	<?php endif; ?>
								<?php if ($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) : ?>
								<div id="maincol-border-right">
									<div id="maincol-border-right2">
									<?php endif; ?>
										<div class="sameheight">
											<?php if ($this->countModules('left') and $this->countModules('right')) : ?>
											<div id="maincol1"><div id="maincol2"><div id="maincol3"><div id="maincol4"><div id="maincol5">
												<?php endif; ?>
												<div class="padding">
													<?php if ($show_breadcrumbs == "true") : ?>
														<div id="pathway">
															<jdoc:include type="module" name="breadcrumbs" style="none" />
														</div>
													<?php endif; ?>
													<?php if ($this->countModules('user1') or $this->countModules('user2') or $this->countModules('user3')) : ?>
													<?php if (($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) and (($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")))) : ?>
													<div id="mainmodules" class="spacer<?php echo $mainmod_width; ?>">
													<?php else : ?>
													<div id="mainmodules" class="alt spacer<?php echo $mainmod_width; ?>">
													<?php endif; ?>
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
														<?php if ($this->countModules('user3')) : ?>
														<div class="block">
															<jdoc:include type="modules" name="user3" style="rounded" />
														</div>
														<?php endif; ?>
													</div>
													<?php endif; ?>
													<?php if (($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) and (($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")))) : ?>
													<div id="main-container">
														<div class="padding">
													<?php else : ?>
													<div id="main-container2">
														<div class="padding">
														<?php endif; ?>
															<jdoc:include type="message" />
															<jdoc:include type="component" />
														</div>
													</div>
													<?php if ($this->countModules('user4') or $this->countModules('user5') or $this->countModules('user6')) : ?>
													<div id="mainmodules2" class="spacer<?php echo $mainmod2_width; ?>">
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
													<?php endif; ?>
													<?php if ($show_moduleslider=="true" and ($moduleslider_location=="middle" and ($this->countModules('user11') or $this->countModules('user12') 
						    					or $this->countModules('user13') or $this->countModules('user14') or $this->countModules('user15')))) : ?>
														<div class="moduleslider-padding">
						    								<div id="moduleslider-size">
						    									<?php displayTabs($this); ?>
						    								</div>
														</div>
						    						<?php endif; ?>
												</div>
												<?php if ($this->countModules('left') and $this->countModules('right')) : ?>
											</div></div></div></div></div>
											<?php endif; ?>
										</div>
									<?php if ($this->countModules('right') or ($subnav and $splitmenu_col=="rightcol")) : ?>
									</div>
								</div>
								<?php endif; ?>
									<?php if ($this->countModules('left') or ($subnav and $splitmenu_col=="leftcol")) : ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<!-- End Main Column -->
							<div class="clr"></div>
						</div>
					</div>
				</div>
				<div class="wrapper">
					<div id="bottom-menu"><div id="bottom-menu2"><div id="bottom-menu3">
						<jdoc:include type="modules" name="bottom" style="xhtml" />
					</div></div></div>
				</div>
				<div id="mid-panel-bg2"></div>
				<div class="wrapper">
					<!-- Begin Bottom Area -->
					<div id="bottom-section">
						<div class="padding">
							<div id="bottommodules" class="spacer<?php echo $bottommod_width; ?>">
								<?php if ($this->countModules('user7')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="user7" style="rounded" />
								</div>
								<?php endif; ?>
								<?php if ($this->countModules('user8')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="user8" style="rounded" />
								</div>
								<?php endif; ?>
								<?php if ($this->countModules('user9')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="user9" style="rounded" />
								</div>
								<?php endif; ?>
								<?php if ($this->countModules('user10')) : ?>
								<div class="block">
									<jdoc:include type="modules" name="user10" style="rounded" />
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<!-- End Bottom Area -->
					<!-- Begin Footer Area -->
					<div id="footer"><div id="footer2"><div id="footer3">
						<div class="padding">
							<?php if ($show_bottomlogo == "true") : ?>
							<div id="bottom-logo"></div>
							<?php endif; ?>
						</div>
					</div></div></div>
				</div>
				<div id="mid-panel-bg3"></div>
				<div class="wrapper">
					<?php if ($show_copyright == "true") : ?>
					<div id="copyright">
						&copy; Copyright 2008, All Rights Reserved
					</div>
					<div id="rocket-block">
						<a href="http://www.rockettheme.com/" title="RocketTheme Joomla Template Club" class="nounder"><img src="<?php echo $template_path; ?>/images/blank.gif" alt="RocketTheme Joomla Templates" id="rocket" /></a>
					</div>
					<?php else: ?>
					<div class="footer-mod">
						<jdoc:include type="modules" name="footer" style="xhtml" />
					</div>
					<?php endif; ?>
				</div>
				<!-- End Footer Area -->
				<jdoc:include type="modules" name="debug" style="xhtml" />
			</div>
		</div>
	</body>
</html>