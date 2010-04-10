/*
 * JCE Utilities 2.1.3
 *
 * Copyright (c) 2007 - 2008 Ryan Demmer (www.joomlacontenteditor.net)
 * Licensed under the GPL (http://www.gnu.org/licenses/licenses.html#GPL)license.
 * JCE Tooltips based on Mootools Tips plugin - http://www.mootools.net
 * JCE Lightbox plugin based on Slimbox - http://www.digitalia.be/software/slimbox - and Thickbox - http://jquery.com/demo/thickbox/
 */
jQuery.noConflict();
(function($){
	$.jceUtilities = function(options){
		return $.jceUtilities.init(options);
	};
	$.jceUtilities.init = function(options){
		this.options = $.extend({
			popup : {
				legacy				: 0,
				//convert			: 0,
				overlay				: 1,
				overlayopacity 		: 0.8,
				overlaycolor		: '#000000',
				resize				: 1,	
				icons				: 1,
				fadespeed			: 500,
				scalespeed			: 500,
				width				: 640,
				height				: 480,
				theme				: 'standard',
				themecustom			: '',
				themepath			: 'plugins/system/jceutilities/themes'
			},
			tooltip : {
				classname		: 'tooltip',
				opacity			: 1,
				speed			: 150,
				position		: 'br',
				offsets			: {'x': 16, 'y': 16}
			},
			pngfix				: 1,
			wmode				: 0,
			imgpath				: 'plugins/system/jceutilities/img'						
		}, options);
		//if(this.options.popup.convert > 0){
			//$('a').each(function(){
				//$.jceUtilities.convertType(this);
			//});
		//}else{
			$.jceUtilities.tooltip.init(this.options.tooltip);
			$.jceUtilities.popup.init(this.options.popup);
		//}
		if(this.options.pngfix == 1 && $.browser.ie && $.browser.version < 7){
			this.pngFix();	
		}
		if(this.options.wmode == 1){
			this.wmode();	
		}
	};
	$.jceUtilities.cleanupEventStr = function(s) {
		s = "" + s;
		s = s.replace('function anonymous()\n{\n', '');
		s = s.replace('\n}', '');
		s = s.replace(/^return true;/gi, ''); // Remove event blocker
		return s;
	};
	$.jceUtilities.parseQuery = function(query){
		var params = {}, kv, k, v;
		if(!query){
			return params;
		}
		var pairs = query.split(/[;&]/);
		for(var i=0; i<pairs.length; i++){
			kv = pairs[i].split('=');
			if(!kv || kv.length != 2){
				continue;
			}
			k = unescape(kv[0]);
			v = unescape(kv[1]);
			v = v.replace(/\+/g, ' ');
			params[k] = v;
		}
		return params;
	};
	/*$.jceUtilities.convertType = function(link){
		if(/.(jpg|jpeg|png|gif|bmp|tif)$/i.test(link.href)){
			var linkclass = '';
			var rel = link.rel;
			switch($.jceUtilities.options.popup.convert){
				case 1:
					if(!rel){
						rel = 'lightbox';
					}else{
						rel = 'lightbox[' + rel + ']';
					}
					break;
				case 2:
					linkclass = 'thickbox';
					if(!rel){
						rel = '';
					}
					break;
				case 3:
					if(!rel){
						rel = 'rokzoom';
					}else{
						rel = 'rokzoom[' + rel + ']';
					}
					link.setAttribute('rel', rel);
					break;
			}
			link.setAttribute('rel', rel);
			link.className = link.className.replace(/jce(box|lightbox|popup)/gi, linkclass);
			
			if(link.className === ''){
				link.removeAttribute('class');
			}
			if(link.rel === ''){
				link.removeAttribute('rel');
			}
		}
		return link;
	};*/
	$.jceUtilities.pngFix = function(){
		var s, bg;
		// Images
		$('img[@src*=".png"]', document.body).each( function() {
			this.css('filter', 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' + this.src + '\', sizingMethod=\'\')');			
			this.src = $.jceUtilities.getSite() + 'plugins/system/jceutilities/img/blank.gif';
		});
		// CSS Background Images
		$('*', document.body).each(function(){
			s = $(this).css('background-image');
			if(s && /\.(png)/i.test(s)){
				bg = /url\("(.*)"\)/.exec(s)[1];
				$(this).css('background-image', 'none');
				$(this).css('filter', "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + bg + "',sizingMethod='scale')");	
			}
		})
	};
	$.jceUtilities.wmode = function(){			
		$('object').not('#jcepopup-object').each(function(){
			if(/^(clsid:d27cdb6e-ae6d-11cf-96b8-444553540000)$/i.test(this.classid)){
				if(!this.wmode || this.wmode.toLowerCase() == 'window'){
					this.wmode = 'opaque';	
					if(typeof this.outerHTML == 'undefined'){
						$(this).replaceWith($(this).clone(true));	
					}else{
						this.outerHTML = this.outerHTML;
					}
				}
			}
		});
		$('embed[type="application/x-shockwave-flash"]').each(function(){
			var wm = $(this).attr('wmode');
			if(!wm || wm.toLowerCase() == 'window'){
				$(this).attr('wmode', 'opaque');
				if(typeof this.outerHTML == 'undefined'){
					$(this).replaceWith($(this).clone(true));	
				}else{
					this.outerHTML = this.outerHTML;
				}
			}
		});
	};
	$.jceUtilities.getSite = function(){
		var src;
		$('script[@src*="plugins/system/jceutilities/js/jceutilities"]').each(function(){
			src = this.src;												
		});
		return src.substring(0, src.lastIndexOf('plugins/system/jceutilities/js')) || '';
	};
	$.jceUtilities.tooltip = {
		init: function(options){				
			var t = this;
			this.options = $.extend({}, options);
			$('.jcetooltip, .jce_tooltip').each(function(){
				$(this).bind('mouseover', function(){
					t.show(this);
				});
				$(this).bind('mousemove', function(e){
					t.locate(e);
				});
				$(this).bind('mouseout', function(){
					t.hide(this);
				}).bind('blur', function(){
					t.hide(this);
				});
			});
		},
		show : function(el){
			var d = document, text = el.title || '', title = '';
				
			if(/::/.test(text)){
				var parts 	= text.split('::');
				title 		= $.trim(parts[0]);
				text 		= $.trim(parts[1]);
			}
			this.tip = d.createElement('div');
			// Store original title and remove
			this.tip.title = el.title;
			$(el).attr('title', '');
			
			if(title){
				$(this.tip).append('<h4>' + title + '</h4>');
			}
			$(this.tip).append('<p>' + text + '</p>');							
			
			$(this.tip).addClass(this.options.classname).css('position', 'absolute').appendTo('body').hide();
			$(this.tip).animate({'opacity': this.options.opacity}, this.options.speed).show();
			
			this.exists = true;
		},
		locate : function(e){
			if(this.exists){
				var o 		= this.options.offsets;
				
				var page 	= {'x': e.clientX + $(window).scrollLeft(), 'y': e.clientY + $(window).scrollTop()};
				var tip 	= {'x': this.tip.offsetWidth, 'y': this.tip.offsetHeight};
				var pos 	= {'x': e.clientX + o.x, 'y': e.clientY + o.y};
										
				switch(this.options.position){
					case 'tl':
						pos.x = (page.x - tip.x) - o.x;
						pos.y = (page.y - tip.y) - o.y;
						break;
					case 'tr':
						pos.x = page.x + o.x;
						pos.y = (page.y - tip.y) - o.y;
						break;
					case 'tc':
						pos.x = (page.x - Math.round((tip.x / 2))) + o.x;
						pos.y = (page.y - tip.y) - o.y;
						break;
					case 'bl':
						pos.x = (page.x - tip.x) - o.x;
						pos.y = (page.y + tip.y) - o.y;
						break;
					case 'br':
						pos.x = page.x + o.x;
						pos.y = page.y + o.y;
						break;
					case 'bc':
						pos.x = (page.x - Math.round((tip.x / 2))) + o.x;
						pos.y = (page.y + tip.y) - o.y;
						break;
				}
				$(this.tip).css({
					top: pos.y + 'px', 
					left: pos.x + 'px'
				});
			}
		},
		hide : function(el){
			if(this.exists){
				$(el).attr('title', this.tip.title);
				$(this.tip).fadeOut(this.options.speed).remove();
			}
		}
	};
	$.jceUtilities.popup = {
		popups : [],
		theme : '',
		init : function(options){
			var t = this;					
			this.options = $.extend({}, options);
			this.site = $.jceUtilities.getSite();
			// Converts a legacy (window) popup into an inline popup
			if(this.options.legacy == 1){
				$('a[href*="jce"][href*="popup"]').each(function(){
					var p, s;
					s = $.jceUtilities.cleanupEventStr(this.getAttribute('onclick')).replace(/&amp;/g,'&').replace(/&#39;/g,"'").split("'");					
					p = t._query(s[1]);	
					
					img = p['img'];
					if(!/http:\/\//.test(img)){
						if(img.charAt(0) == '/'){
							img = img.substr(1);	
						}
						img = t.site.replace(/http:\/\/([^\/]+)/, '') + img;	
					}
					$(this).attr({
						'href': img,
						'title': p['title'].replace(/_/, ' '),
						'onclick': ''
					}).addClass('jcepopup').removeAttr('onclick');																  
				});
			}
			$('a.jcebox:parent,a.jcelightbox:parent,a.jcepopup:parent,area.jcebox,area.jcelightbox,area.jcepopup').each(function(){				
				if(t.options.icons == 1 && this.nodeName == 'A' && !$(this).hasClass('noicon')){
					t._zoom(this);
				}
				t.popups.push(this);
				$(this).click(function(){
					return t._start(this);
				});
			});
			// Load the popup theme	
			var theme = t.options.theme == 'custom' ? t.options.themecustom : t.options.theme;
			$.get(this.site + t.options.themepath + '/' + theme + '/theme.html', function(data){
				var re = /<!-- THEME START -->([\s\S]*?)<!-- THEME END -->/;
				if(re.test(data)){
					data = re.exec(data)[1];	
				}
				t.theme = data;
			});
		},
		_ie6 : function(){
			return $.browser.msie && $.browser.version < 7;
		},
		_png : function(el){
			var s;
			// If its an image
			if(el.src){
				s = el.src;
				if(/\.(png)/i.test(s)){
					$(el).attr('src', this.site + 'plugins/system/jceutilities/img/blank.gif').css('filter', 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'' + s + '\', sizingMethod=\'\')');
				}
			}else{
				s = $(el).css('background-image');
				if(/\.(png)/i.test(s)){
					var bg = /url\("(.*)"\)/.exec(s)[1];
					$(el).css('background-image', 'none');
					$(el).css('filter', "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + bg + "',sizingMethod='scale')");
				}
			}
		},
		_zoom : function(el){
			var h, w, mt, ml, mr, iw, ih, it, t = this;
			$(el).each(function(){	
				var child = this.firstChild;
				if(child && child.nodeName == 'IMG'){
					var zoom = document.createElement('img');
					$(window).bind('load', function(){
						w 	= parseInt($(child).width()) || parseInt($(child).css('width'));
						h 	= parseInt($(child).height()) || parseInt($(child).css('height'));
						
						br	= parseInt($(child).css('border-right-width')) || 0;
						bl	= parseInt($(child).css('border-left-width')) || 0;
						bt	= parseInt($(child).css('border-top-width')) || 0;
						bb	= parseInt($(child).css('border-bottom-width')) || 0;						
						
						mt 	= parseInt($(child).css('margin-top')) || 0;
						ml 	= parseInt($(child).css('margin-left')) || 0;
						mr 	= parseInt($(child).css('margin-right')) || 0;
						
						$(zoom).attr({
							'src': t.site + $.jceUtilities.options.imgpath + '/zoom-img.png'
						}).addClass('zoomImg').insertAfter($(child));
						
						iw = parseInt($(zoom).css('width')) || 20;
						ih = parseInt($(zoom).css('height')) || 20;
						
						// Opera needs some special attention?
						if($.browser.opera){
							$(child).parent('a').css('float', $(child).css('float'));	
						}
						var top, lft, mlft, rt, mrt, flt = $(child).css('float');					
						
						switch(flt){
							case 'left':
								top 	= $(child).outerHeight(true) - (ih + mt);
								rt 		= mr + iw;
								mrt 	= -(mr + iw);
								break;
							case 'right':
								top 	= $(child).outerHeight(true) - (ih + mt);
								lft 	= $(child).outerWidth(true) - mr;
								mlft	= $(child).outerWidth(true);
								break;
							default:
								top 	= -mt;
								rt 		= mr + iw;
								mrt 	= mr - iw;
								break;
						}
						$(zoom).css({
							'top': top,
							'cursor': 'pointer',
							'float': flt == 'none' ? '' : flt,
							'vertical-align': /(baseline|auto)/.test($(child).css('vertical-align')) ? '' : 'bottom',
							'right': rt,
							'margin-right': mrt,
							'left': lft,
							'margin-left': mlft
						});
						if(t._ie6() && $.jceUtilities.options.pngfix == 1){
							t._png(zoom);
						}
					});
				}else{					
					zoom = document.createElement('img');
					$(zoom).attr({
						src: t.site + $.jceUtilities.options.imgpath + '/zoom-link.png'
					}).addClass('zoomLink').appendTo(el);
					if(t._ie6() && $.jceUtilities.options.pngfix == 1){
						t._png(zoom);
					}
				}
			});
		},
		// Public
		open : function(s, t, d){
			var link = {};
			if(typeof s == 'object'){
				link = {
					'href' 		: s.href || s.src,
					'title' 	: s.title || '',
					'type'		: s.type || ''
				};
			}else{
				link = {
					'href' 	: s,
					'title' : t || '',
					'type' : d || ''
				};
			}
			return this._start(link);
		},
		_start: function(link){			
			var d = document, t = this, n = 0, items = [];	
			
			if(this.options.overlay == 1){
				this.overlay = d.createElement('div');			
				$(this.overlay).attr('id', 'jcepopup-overlay').appendTo('body').css({opacity: '0', cursor: 'pointer', backgroundColor: this.options.overlaycolor, width: $(window).width()}).click(function(){
					t.close();
				});
			}
			// Default theme layout
			if(!this.theme){
				this.theme  = '<div id="jcepopup-container">';
				this.theme += '<div id="jcepopup-loader"></div>';
				this.theme += '<div id="jcepopup-content"></div>';
				this.theme += '<a id="jcepopup-closelink" href="javascript:;" title="Close"></a>';
				this.theme += '<div id="jcepopup-info">';
				this.theme += '<div id="jcepopup-caption"></div>';
				this.theme += '<div id="jcepopup-nav">';
        		this.theme += '<a id="jcepopup-prev" href="javascript:;" title="Previous"></a>';
        		this.theme += '<a id="jcepopup-next" href="javascript:;" title="Next"></a>';
        		this.theme += '<span id="jcepopup-numbers"></span>';
       			this.theme += '</div>';
    			this.theme += '</div>';
				this.theme += '</div>';
			}
			// Insert theme html into the DOM
			$('body').append(this.theme);
			// Create objects
			$.each(['container', 'content', 'loader', 'closelink', 'info', 'caption', 'nav', 'next', 'prev', 'numbers'], function(i, s){
				t[s] = $('#jcepopup-' + s).hide();
			});
			if(this.closelink){
				this.closelink.click(function(){
					t.close();
				});
			}
			if(this.next){
				this.next.click(function(){
					t._next();
				});
			}
			if(this.prev){
				this.prev.click(function(){
					t._previous();
				});
			}
			if(this._ie6()){
				this._png(this.container);
				$('*', this.container).not('#jcepopup-content').each(function(){
					t._png(this);
				});	
			}
			// If not an element
			if(link.nodeName == 'undefined'){
				items.push(link);
			// Build group
			}else if(link.rel || link.nodeName == 'AREA'){
				// In an AREA element
				if(link.nodeName == 'AREA' && !$(link).hasClass('nogroup')){
					$(link).parent('map').children('area').each(function(i, el){
						items.push(el);
						if(el.href == link.href){
							n = i;	
						}
					});
				}else{
					var i = 0;
					$.each(this.popups, function(){
						if(this.rel == link.rel){
							items.push(this);
							if(this.href == link.href){
								n = i;	
							}
							i++;
						}
					});
				}
			// Not assigned to a group
			}else{
				items.push(link);	
			}
			return this._open(items, n);
		},
		_open: function(items, n){
			this.items = items;
			this._position();
			this._bind(true);
			
			this.container.css('top', $(window).scrollTop() + 50).show();
			
			if(this.options.overlay == 1 && $(this.overlay)){
				$(this.overlay).fadeTo(this.options.fadespeed, this.options.overlayopacity);
			}
			this._position();
			return this._change(n);
		},	
		_position: function(){
			if(this.options.overlay == 1 && $(this.overlay)){
				$(this.overlay).css({'top': $(window).scrollTop(), 'height': $(window).height()});
			}
		},	
		_bind: function(open){
			var t = this;
			if(this._ie6()){
				$('select').each(function(){
					if(open){
						this.tmpStyle = this.style.visibility;
					}
					this.style.visibility = open ? 'hidden' : this.tmpStyle;
				});
			}
			$('object,embed').not('#jcepopup-object').each(function(){
				if(open){
					this.tmpStyle = this.style.visibility;
				}
				this.style.visibility = open ? 'hidden' : this.tmpStyle;
			});
			if(open){
				$(window).bind('scroll', function(){
					t._position();
				});
				$(window).bind('resize', function(){
					t._position();
				});
				$(document).bind('keydown', function(event){
					t._listener(event);
				});
			}else{
				$(window).unbind('scroll');
				$(window).unbind('resize');
				$(document).unbind('keydown');
			}
		},	
		_listener: function(event){
			switch (event.keyCode){
				case 27: case 88: case 67: this.close(); break;
				case 37: case 80: this.previous(); break;	
				case 39: case 78: this.next();
			}
		},
		_media : function(c){
			var ci, cb, mt;
			switch (c) {
				case 'director':
				case 'application/x-director':
					ci = '166b1bca-3f9c-11cf-8075-444553540000';
					cb = 'http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=8,5,1,0';
					mt = 'application/x-director';
					break;
				case 'windowsmedia':
				case 'mplayer':
					ci = '6bf52a52-394a-11d3-b153-00c04f79faa6';
					cb = 'http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701';
					mt = 'application/x-mplayer2';
					break;
				case 'quicktime':
				case 'video/quicktime':
					ci = '02bf25d5-8c17-4b23-bc80-d3488abddc6b';
					cb = 'http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0';
					mt = 'video/quicktime';
					break;
				case 'real':
				case 'realaudio':
				case 'audio/x-pn-realaudio-plugin':
					ci = 'cfcdaa03-8be4-11cf-b84b-0020afbbccfa';
					cb = 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0';
					mt = 'audio/x-pn-realaudio-plugin';
					break;
				case 'divx':
				case 'video/divx':
					ci = '67dabfbf-d0ab-41fa-9c46-cc0f21721616';
					cb = 'http://go.divx.com/plugin/DivXBrowserPlugin.cab';
					mt = 'video/divx';
					break;
				default:
				case 'flash':
				case 'application/x-shockwave-flash':
					ci = 'd27cdb6e-ae6d-11cf-96b8-444553540000';
					cb = 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,124,0';
					mt = 'application/x-shockwave-flash';
					break;
			}
			return {'classid' : ci, 'codebase': cb, 'mediatype': mt};
		},
		_local : function(s){
			return (!/:\/\//.test(this.active.src) || this.active.src.indexOf(this.site) != -1);
		},
		_query : function(s){
			var p = {}, x = s.split(/[&;]/);
			$.each(x, function(){
				v = this.split('=');
				if(v){
					p[v[0]] = v[1];
				}
			});
			return p;
		},
		_params : function(s){
			var p = {}, x = s.split(';');
			$.each(x, function(){
				v = this.match(/(.+)\[(.*?)\]/);
				p[v[1]] = v[2];
			});
			return p;
		},
		_next : function(){
			return this._queue(this.index + 1);
		},
		_previous : function(){
			return this._queue(this.index - 1);
		},
		_queue: function(n){
			var fs = this.options.fadespeed;
			if(this.closelink){
				this.closelink.hide();
			}
			if($.browser.opera || this._ie6()){
				// Optional element
				if(this.info){
					this.info.hide();
				}
				this.content.hide();
				return this._change(n);
			}else{
				var t = this;
				// Optional element
				if(this.info){
					this.info.fadeOut(fs, function(){
						t.content.fadeOut(fs, function(){
							return t._change(n);
						});
					});
				}else{
					t.content.fadeOut(fs, function(){
						return t._change(n);
					});
				}
			}
		},
		_change: function(n){			
			var t = this, p = {};
			if(n < 0 || n >= this.items.length){
				return false;
			}
			this.index 	= n;
			this.active = {};
			
			// Show Loader
			if(this.loader){
				this.loader.show();	
			}
			this.content.empty();
			
			if(this.object){
				this.object = null;
			}
			
			$.extend(this.active, {
				'src': 		this.items[n].href,
				'title':	this.items[n].title,
				'type':		this.items[n].type || this.items[n].className || '',
				'width':	this.options.width,
				'height':	this.options.height
			});
			if(/(youtube|google|metacafe)(.+)\/(v|watch|videoplay|googleplayer|fplayer)(.+)/i.test(this.active.src)){
				this.active.type = 'flash';	
			}
			// Image
			if(/\.(jpg|jpeg|png|gif|bmp|tif)$/i.test(this.active.src)){
				this.active.type = 'image';
									
				this.img = new Image();
				this.img.onload = function(){
					return t._setup();
				};
				this.img.src = this.active.src;
			// Media
			}else if(/(flash|director|shockwave|mplayer|windowsmedia|quicktime|realaudio|real|divx)/i.test(this.active.type)){
				if(/(\[.*\])/.test(this.active.title)){
					p = this._params(this.active.title);
				}else{
					p.title = this.active.title;	
				}
				
				p.src 		= this.active.src;
				var base	= /:\/\//.test(p.src) ? '' : $.jceUtilities.getSite();
				this.object = '';
				
				// Youtube
				if(/youtube(.+)\/(watch\?v=|v\/)(.+)/.test(p.src)){					
					p.src = p.src.replace(/watch\?v=/, 'v/');
					
					if(!p.width){
						p.width = 425;
					}
					if(!p.height){
						p.height = 344;
					}
				}
				// Google Video
				if(/google(.+)\/(videoplay|googleplayer\.swf)\?docid=(.+)/.test(p.src)){					
					p.src = p.src.replace(/videoplay/, 'googleplayer.swf');
					
					if(!p.width){
						p.width = 425;
					}
					if(!p.height){
						p.height = 326;
					}	
				}
				// Metacafe
				if(/metacafe(.+)\/(watch|fplayer)\/(.+)/.test(p.src)){
					var s = $.trim(p.src);
					if(!/\.swf/i.test(s)){						
						if(s.charAt(s.length-1) == '/'){
							s = s.substring(0, s.length-1);	
						}
						s = s + '.swf';		
					}
					p.src = s.replace(/watch/i, 'fplayer');
					
					if(!p.width){
						p.width = 400;
					}
					if(!p.height){
						p.height = 345;
					}
				}
								
				this.active.title 	= p.title 				|| '';
				this.active.width 	= parseInt(p.width) 	|| this.options.width;
				this.active.height 	= parseInt(p.height) 	|| this.options.height;
				
				var mt = this._media(this.active.type);
				
				if(this.active.type == 'flash'){
					p.wmode = 'transparent';
					p.base 	= base;
					//if($.browser.msie){
						p.movie = p.src;
						delete p.src;
					//}
				}
				if(/(mplayer|windowsmedia)/i.test(this.active.type)){
					p.baseurl = base;
					if($.browser.msie){
						p.url = p.src;
						delete p.src;
					}
				}
				this.object = '<object id="jcepopup-object" ';
				if(this.active.type == 'flash'){
					this.object += 'type="'+ mt.mediatype +'" data="'+ p.movie +'" ';	
				}else{
					this.object += 'codebase="' + mt.codebase + '" classid="clsid:' + mt.classid + '" ';
				}
				for (n in p){
					if(p[n] !== ''){
						if (/(id|name|width|height|style)$/.test(n)){
							t.object += n + '="' + p[n] + '"';	
						}
					}
				}
				this.object += '>';
				for (n in p){
					if(p[n] !== ''){
						if (!/(id|name|width|height|style)$/.test(n)){
							t.object += '<param name="' + n + '" value="' + p[n] + '">';
						}
					}
				}
				if(!$.browser.msie && this.active.type != 'flash'){
					this.object += '<object type="'+ mt.mediatype +'" data="'+ p.src +'" ';
					for (n in p){
						if(p[n] !== ''){
							t.object += n + '="' + p[n] + '"';
						}
					}
					this.object += '></object>';	
				}
				this.object += '</object>';	
				this._setup();
			// IFrame
			}else{				
				var src = this.active.src;	
				var q 	= $.jceUtilities.parseQuery(src.replace(/^[^\?]+\??/, '').replace(/&amp;/gi, '&'));	
				
				if(/(\[.*\])/.test(this.active.title)){
					p = this._params(this.active.title);
				}else{
					p.title = this.active.title;
				}
				
				this.active.title 	= p.title;
				
				this.active.src 	= src.replace(/(&|\?)(width|height|bw|bh)=[0-9]+/gi, '');
				this.active.width 	= parseInt(q.width) 	|| parseInt(q.bw)	||	parseInt(p.width) 	|| this.options.width;
				this.active.height 	= parseInt(q.height) 	|| parseInt(q.bh)	||	parseInt(p.height) 	|| this.options.height;
				
				if(this.active.type == 'ajax' || /text\/(xml|html|htm)/i.test(this.active.type) && this._local(this.active.src)){
					if(!/tmpl=component/i.test(this.active.src)){
						this.active.src += /\?/.test(this.active.src) ? '?tmpl=component' : '?tmpl=component';
					}					
					this.ajax = document.createElement('div');
					$(this.ajax).attr({
						id : 'jcepopup-ajax'
					}).css({
						width:  t.active.width, 
						height: t.active.height
					}).appendTo(this.content);
					
					$.get(this.active.src, function(data){
						var html = data, re = /<body[^>]*>([\s\S]*?)<\/body>/;
						if(re.test(data)){
							html = re.exec(data)[1];	
						}
						// Firefox doesn't like this...
						//$(t.ajax).html(html);	
						t.ajax.innerHTML = html;
						if(t.loader){
							t.loader.hide();
						}
						return t._setup();
					});
				}else{
					if(/\.(php)/i.test(this.active.src) && this._local(this.active.src) && !/(tmpl=component)/i.test(this.active.src) ){
						this.active.src += '&tmpl=component';	
					}	
					this.active.type = 'iframe';
					this.iframe = document.createElement('iframe');
					$(this.iframe).attr({
						id : 'jcepopup-iframe',
						frameBorder: 0, 
						onload: function(){
							return t._setup();
						}
					}).css({
						width:  t.active.width, 
						height: t.active.height
					}).appendTo(this.content).attr('src', t.active.src);	
				}
			}
			return false;
		},
		_setup: function(){
			var t = this, w, h;
						
			if(this.active.type == 'image'){
				w = this.img.width;
				h = this.img.height;

				// Resize image
				if(this.options.resize == 1){	
					var x =  Math.round($(window).width() - 150);
					var y =  Math.round($(window).height() - 200);
					if(w > x){
						h = h * (x / w); 
						w = x; 
						if(h > y){ 
							w = w * (y / h); 
							h = y; 
						}
					}else if (h > y){ 
						w = w * (y / h); 
						h = y; 
						if(w > x){ 
							h = h * (x / w); 
							w = x;
						}
					}
				}
				w = Math.round(w);
				h = Math.round(h);
				// Img element
				this.content.width(w).height(h).html('<img src="' + this.active.src + '" title="' + this.active.title + '" width="' + w + '" height="' + h + '" />');
			}else{
				w = this.active.width;
				h = this.active.height;
				
				// Is Iframe
				if(this.active.type == 'iframe' || this.active.type == 'ajax'){
					this.content.width(w).height(h);	
				// Is Media
				}else{				
					this.content.width(w).height(h);
				}
			}
			// Optional Element Caption/Title
			if(this.caption){
				var title = this.active.title || '', caption = '';
				if(/:\/\//.test(title)){
					title = '<a href="' + title + '" target="_blank">' + title + '</a>';	
				}
				caption = '<p>' + title + '</p>';
				if(/::/.test(title)){
					var parts 	= title.split('::');
					caption 	= '<h4>' + parts[0] + '</h4><p>' + parts[1] + '</p>';	 
				}
				this.caption.html(caption).show();
			}
			// Optional Element
			if(this.nav){
				var html = '', len = this.items.length;
				if(len > 1){
					for(var i=0; i<len; i++){
						var n = i + 1;
						if(this.index != i){ 
							html += '<a href="javascript:;">';
						}
						html += n;
						if(this.index != i){
							html += '</a>';
						}
						html += (n == len) ? '' : ' | ';
					}
					if(this.prev){
						if(this.index > 0){
							this.prev.show();	
						}else{
							this.prev.hide();	
						}
					}
					if(this.next){
						if(this.index < len - 1 ){
							this.next.show();
						}else{
							this.next.hide();	
						}
					}
				}
				if(this.numbers){
					this.numbers.html(html).children('a').each(function(){
						$(this).click(function(){
							t._queue(parseInt($(this).text()) - 1);
						});								   
					});
					this.numbers.show();
				}
				this.nav.show();
			}
			// Animate box
			this._animate();						   
		},
		_animate : function(){
			var t = this, ss = this.options.scalespeed, fs = this.options.fadespeed;
			// Hide loader
			if(/(image|iframe|ajax)/.test(t.active.type)){
				if(t.loader){
					t.loader.hide();
				}
			}
			// Animate width				
			t.container.animate({
				width: t.content.outerWidth(), 
				marginLeft: -t.content.outerWidth()/2
			}, ss, function(){
					// Animate height
					t.container.animate({
						height: t.content.outerHeight() + t.info.outerHeight()
					}, ss, function(){
						// Animate fade in
						t.content.fadeIn(fs, function(){															
							// info Optional Element
							if(t.info){
								// Show items Optional Element
								if($.browser.opera || t._ie6()){
									t.info.show();
								}else{					
									t.info.fadeIn(fs);
								}
								// If media
								if(!/(image|iframe|ajax)/.test(t.active.type) && t.object){
									t.content.append(t.object);
								}
							}else{
								// If media
								if(!/(image|iframe|ajax)/.test(t.active.type) && t.object){
									t.content.append(t.object);
								}
							}
							if(t.closelink){
								t.closelink.show();
							}
						});	
					});
			});
		},
		// Public function
		close: function(){
			var t = this, fs = this.options.fadespeed;
			// Destroy Image object
			if(this.img){
				this.img.onload = null;
				this.img 		= null;
			}
			// Hide closelink
			if(this.closelink){
				this.closelink.hide();
			}
			// Empty content div
			this.content.empty();
			// Hide info div
			if(this.info){
				this.info.hide();
			}
			// Remove container, ie: popup
			$(this.container).remove();
			// Fade out overlay
			if(this.overlay){
				if(this._ie6()){
					$(this.overlay).remove();	
					// Remove event bindings
					this._bind();
				}else{
					$(this.overlay).fadeOut(fs, function(){	
						$(this).remove();
						// Remove event bindings
						t._bind();
					});
				}
			}
			return false;
			//this.options.onclose.call(this, args);
		}
	};
})(jQuery);
// Shortcuts
var jceutilities 	= jQuery.jceUtilities;
var jcepopup 		= jceutilities.jcepopup;
var jcelightbox 	= jceutilities.jcepopup;