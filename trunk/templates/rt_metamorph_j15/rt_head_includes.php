<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template

?>

<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_css.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $tstyle; ?>.css" rel="stylesheet" type="text/css" />
<?php if($show_moduleslider=="true") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokslidestrip.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/typography.css" rel="stylesheet" type="text/css" />
<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<style type="text/css">
	div.wrapper { <?php echo $template_width; ?>padding:0;}
	#leftcol2 { width:<?php echo $leftcolumn_width; ?>px;padding:0;}
	#rightcol2 { width:<?php echo $rightcolumn_width; ?>px;padding:0;}
	#leftcol { width:<?php echo $leftcolumn_width; ?>px;padding:0;}
	#rightcol { width:<?php echo $rightcolumn_width; ?>px;padding:0;}
	#maincol { margin-left:<?php echo $leftcolumn_width; ?>px;margin-right:<?php echo $rightcolumn_width; ?>px;padding:0;}
	#maincol-alt { margin-left:<?php echo $leftcolumn_width; ?>px;margin-right:<?php echo $rightcolumn_width; ?>px;padding:0;}
	#rightcol .submenu-main h3, #rightcol2 .submenu-main h3 { width:<?php echo $rightcolumn_width; ?>px;}
	#leftcol .submenu-main h3, #leftcol2 .submenu-main h3 { width:<?php echo $leftcolumn_width; ?>px;}
	#moduleslider-size { height:<?php echo $moduleslider_height; ?>px;}
</style>	
<?php if (rok_isIe7()) :?>
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe6()) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.php" rel="stylesheet" type="text/css" />
<![endif]-->
<?php endif; ?>
<?php if(rok_isIe6() and $enable_ie6warn=="true") : ?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokie6warn.js"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/roksameheight.js"></script>
<?php if($show_moduleslider=="true") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokslidestrip.js"></script>
<?php endif; ?>
<?php if($mtype=="moomenu") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmoomenu.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/mootools.bgiframe.js"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
	new Rokmoomenu($E('ul.menutop '), {
		bgiframe: <?php echo $moo_bgiframe; ?>,
		delay: <?php echo $moo_delay; ?>,
		animate: {
			props: ['width', 'opacity'],
			opts: {
				duration:<?php echo $moo_duration; ?>,
				fps: <?php echo $moo_fps; ?>,
				transition: Fx.Transitions.<?php echo $moo_transition; ?>
			}
		},
		bg: {
			enabled: <?php echo $moo_bg_enabled; ?>,
			overEffect: {
				duration: <?php echo $moo_bg_over_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_bg_over_transition; ?>
			},
			outEffect: {
				duration: <?php echo $moo_bg_out_duration; ?>,
				transition: Fx.Transitions.<?php echo $moo_bg_out_transition; ?>
			}
		}
	});
});
</script>
<?php endif; ?>
<?php if((rok_isIe6() or rok_isIe7()) and ($mtype=="suckerfish" or $mtype=="splitmenu")) :
  echo "<script type=\"text/javascript\" src=\"" . $this->baseurl . "/templates/" . $this->template . "/js/ie_suckerfish.js\"></script>\n";
endif; ?>