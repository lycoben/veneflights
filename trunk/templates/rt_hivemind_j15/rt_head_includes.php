<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template

?>

<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<?php if($sifr=="true") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/sifr-screen.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template.css" rel="stylesheet" type="text/css" />
<?php if($show_moduleslider=="true") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokslidestrip.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $tstyle; ?>.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/<?php echo $mstyle; ?>-<?php echo $tstyle; ?>.css" rel="stylesheet" type="text/css" />
<?php if($enable_rokzoom=="true") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/rokzoom.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
<style type="text/css">
	div.wrapper { <?php echo $template_width; ?>padding:0;}
	/* clear fixes for pure css layout */
	<?php if ($this->countModules($sidebar) or $subnav) : ?>
    #maincol {float: <?php echo $sidebar_alt; ?>; margin-<?php echo $sidebar; ?>: -<?php echo $sidebar_width; ?>px; width: 100%;}
    #maincol-container {margin-<?php echo $sidebar; ?>:<?php echo $sidebar_width; ?>px;}
    #sidecol {float: <?php echo $sidebar; ?>; width: <?php echo $sidebar_width; ?>px;}
    <?php endif; ?>
</style>	
<?php if (rok_isIe7()) :?>
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe6()) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<?php if($enable_pngfix=="true") : ?>
img { behavior: url(<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/iepngfix.htc); } 
<?php endif; ?>
</style>
<![endif]-->
<?php endif; ?>
<?php if($show_moduleslider=="true") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokslidestrip.js"></script>
<?php endif; ?>
<?php if($enable_rokzoom=="true") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/rokzoom.js"></script>
<?php endif; ?>
<?php if($sifr=="true") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/sifr/sifr.js"></script> 
<?php endif;?>
<?php if($sifr=="true" or $enable_fontspans=="true") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokfonts.js"></script>   
<script type="text/javascript">
	window.addEvent('load', function() {
		var modules = ['module','module-menu','module-color1','module-color2','module-color3','module-color4','module-style1','module-style1-color1','module-style1-color2','module-style1-color3','module-style1-color4','module-style2','module-style2-color1','module-style2-color2','module-style2-color3','module-style2-color4'];
		var header = "h3";
		<?php if($sifr=="true") : ?>
		RokStart(modules, header, "<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/sifr/<?php echo $sifrfont; ?>.swf", {sifr: {sWmode: 'transparent'}});
	    <?php else : ?>
	    RokBuildSpans(modules, header);
        <?php endif; ?>
	});
</script>
<?php endif; ?>
<?php if($mtype=="moomenu") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmoomenu.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/mootools.bgiframe.js"></script>
<script type="text/javascript">
window.addEvent('domready', function() {
	new Rokmoomenu($E('ul.menutop '), {
		bgiframe: false,
		delay: 500,
		animate: {
			props: ['opacity'],
			opts: {
				duration:600,
				fps: 100,
				transition: Fx.Transitions.Quad.easeOut
			}
		}
	});
});
</script>
<?php endif; ?>	
<?php if($mtype=="suckerfish" or $mtype=="splitmenu") :
	echo "<!--[if IE]>\n";		
	echo "<script type=\"text/javascript\" src=\"" . $this->baseurl . "/templates/" . $this->template . "/js/ie_suckerfish.js\"></script>\n";
	echo "<![endif]-->\n";
endif; ?>	
<?php if($enable_rokzoom=="true") :?>
<script type="text/javascript">
	window.addEvent('load', function() {
		RokZoom.init({
			imageDir: '<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/rokzoom/images/',
			resizeFX: {
				duration: 700,
				transition: Fx.Transitions.Cubic.easeOut,
				wait: true
			},
			opacityFX: {
				duration: 500,
				wait: false	
			}
		});
	});
</script>
<?php endif; ?>