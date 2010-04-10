<?php header("Content-type: text/css"); ?>
<?php
$template_path = dirname( dirname( $_SERVER['SCRIPT_NAME'] ) );
?>
/** IE6 is a hunk of crap!!! due to limitations in the CSS capabilities of IE, these hacks are required **/

#ff-optima h1,#ff-optima h2,#ff-optima h3,#ff-optima h4,#ff-optima h5,#ff-optima h6, #ff-lucida h1,#ff-lucida h2,#ff-lucida h3,#ff-lucida h4,#ff-lucida h5,#ff-lucida h6 {letter-spacing: -0.07em;}
body#ff-optima, body#ff-lucida {letter-spacing: -0.03em;}
body#ff-georgia, body#ff-georgia.f-default {font-size: 12px;}
.menu span {cursor:pointer;}


.style1 img#logo {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style1/logo.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style2 img#logo {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style2/logo.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style3 img#logo {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style3/logo.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style4 img#logo {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style4/logo.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style5 img#logo {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style5/logo.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style1 .showcase-bg {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style1/rotator-bg.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style2 .showcase-bg {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style2/rotator-bg.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style3 .showcase-bg {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style3/rotator-bg.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style4 .showcase-bg {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style4/rotator-bg.png', sizingMethod='crop');background-image: none;zoom: 1;}
.style5 .showcase-bg {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/style5/rotator-bg.png', sizingMethod='crop');background-image: none;zoom: 1;}

.rok-content-rotator a.readon {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $template_path; ?>/images/learn-more.png', sizingMethod='crop');background-image: none;zoom: 1;}
#rokslide-toolbar li {float: left;}
#rokslide-toolbar li span {float: left;padding: 0 18px;}
#header {background: url(../images/header-m-ie.png) 0 0 repeat-x;}
#header2 {background: url(../images/header-l-ie.png) 0 0 no-repeat;}
#header3 {background: url(../images/header-r-ie.png) 100% 0 no-repeat;}

#searchmod, #searchmod2, #main-body, #main-body2, #header-panel, #top-bg, #mid-panel-bg, #mid-panel-bg-alt, #mid-panel-bg2, #mid-panel-bg3, #showcasemodules, #bottommodules, #mainmodules, #mainmodules2, #mainmodules.alt, #maincol, #maincol-alt, #leftcol, #leftcol2, #rightcol, #rightcol2, #maincol-border-left, #maincol-border-left2, #maincol-border-right, #maincol-border-right2, #maincol1, #maincol2, #maincol3, #maincol4, #maincol5, .submenu-top, .submenu-top2, .submenu-top3, .submenu-main, .submenu-main2, .submenu-bottom, .submenu-bottom2, .submenu-bottom3, .submenu-main h3, .top-module, #header-top, #leftcol .module, #leftcol2 .module, #rightcol .module, #rightcol2 .module, #leftcol .module-hilite1 h3, #leftcol2 .module-hilite1 h3, #rightcol .module-hilite1 h3, #rightcol2 .module-hilite1 h3, #maincol .padding, #maincol-alt .padding, #leftcol .inner, #leftcol2 .inner, #rightcol .inner, #rightcol2 .inner, .rotator-module, .rok-content-rotator, .rok-content-rotator .rotator-2, .rok-content-rotator .rotator-3, .rok-content-rotator .rotator-4, .submenu-main h3, .padding, #showcase-bottom, #showcase-bottom2, #showcase-bottom3, #tabmodules {
	zoom: 1;
}

.submenu-top {margin-top: 35px;}
.rok-content-rotator div.clr {display: none;}
.rok-content-rotator div.content {width: 380px;padding-bottom: 0;margin-left: 0;margin-top: 0;}
#sl_horiz #sl_rememberme {width: 110px;font-size: 90%;}
#sl_horiz #sl_lostpass {margin: 0;font-size: 90%;}
#sl_horiz #sl_lostname {margin: 0;font-size: 90%;}
#sl_horiz #sl_register {margin: 0;font-size: 90%;}
#searchmod, #searchmod2 {width: 360px;}
#accessibility {margin-right: 8px;}
#mid-panel-bg {margin-bottom: 42px;}
#mid-panel-bg-alt {margin-bottom: 22px;}
#mid-panel-bg2 {margin-bottom: 26px;}
#maincol {margin-bottom: -18px;}
#maincol-alt {margin-bottom: -14px;}

#rightcol .inner {padding-bottom: 24px;}
#rightcol2 .inner {padding-bottom: 24px;}
#leftcol .inner {padding-bottom: 24px;}
#leftcol2 .inner {padding-bottom: 24px;}
#moduleslide {padding-top: 15px !important;}

/* ie6 warning */
#iewarn {background: #C6D3DA url(../images/error.png) 10px 20px no-repeat;position: relative;z-index: 1;opacity: 0;margin: -150px auto 0;font-size: 110%;color: #001D29;z-index: 8000;}
#iewarn div {position: relative;border-top: 5px solid #95B8C9;border-bottom: 5px solid #95B8C9;padding: 10px 80px 10px 220px;	}
#iewarn h4 {color: #900;font-weight: bold;line-height: 120%;}
#iewarn a {color: #296AC6;font-weight: bold;}
#iewarn_close {background: url(../images/close.png) 50% 50% no-repeat;display: block;cursor: pointer;position: absolute;width: 61px;height: 21px;top: 25px;right: 12px;}
#iewarn_close.cHover {background: url(../images/close_hover.png) 50% 50% no-repeat;}
/* end ie6 warning */

/*
   NEW PURE CSS PNG FIX SOLUTION  
   use class="png" to implement 
*/

html .png,
div .png {
	azimuth: expression(
		this.pngSet?this.pngSet=true:(this.nodeName == "IMG" && this.src.toLowerCase().indexOf('.png')>-1?(this.runtimeStyle.backgroundImage = "none",
		this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.src + "', sizingMethod='image')",
		this.src = "<?php echo $template_path; ?>/images/blank.gif"):(this.origBg = this.origBg? this.origBg :this.currentStyle.backgroundImage.toString().replace('url("','').replace('")',''),
		this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.origBg + "', sizingMethod='crop')",
		this.runtimeStyle.backgroundImage = "none")),this.pngSet=true
	);
}

/* page peel overrides for demo site */
a.fliptip {display: block;z-index: 100000;position: relative;}