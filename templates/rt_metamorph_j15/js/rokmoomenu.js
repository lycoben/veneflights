/*
 * Rokmoomenu - mootools menu widget
 *
 * mootools dependencies:
 *	- mootools 1.11
 *	- Moo, Utility, Common, Array, String, Function, Element, 
 *	  Dom, Fx.Base, Fx.CSS, Fx.Styles
 *
 * Copyright (c) 2007 Olmo Maldonado
 *
 * v2.0 - Added ability to have crossfading classes underneath menu links
 *      - MouseOver and MouseLeave for the crossfading bg have standalone duration and transitions
 *        giving the ability to an enormous amount of different combinations.
 * 
 * History
 * v1.2 - Adapted for IE6 by Djamil Legato (c) 2008
 * v1.1 - Flash Issues - Adapted for IE6 by Djamil Legato
 */
var Rokmoomenu = new Class({
	version: '2.0', 
	options: {
		bgiframe: true,
		hoverClass: 'sfHover',
		delay: 500,
		animate: {
			props: ['opacity', 'height'],
			opts: Class.empty
		},
		bg: {
			enabled: true,
			overEffect: {
				duration: 700,
				transition: Fx.Transitions.Quad.easeOut
			},
			outEffect: {
				duration: 500,
				transition: Fx.Transitions.Sine.easeIn
			}
		}
	},
	
	initialize: function(el, options) {
		this.setOptions(options);
		if (window.ie6) this.options.delay = 50;
		this.element = $(el);
		
		if (this.options.bg.enabled) {
			this.element.getChildren().each(function(li) {
				if (!li.hasClass('active')) {
					li.getFirst().setStyle('position', 'relative');
					var size = li.getCoordinates();
					var margins = {
						'x': li.getStyle('margin-left').toInt() + li.getStyle('margin-right').toInt(),
						'y': li.getStyle('margin-top').toInt() + li.getStyle('margin-bottom').toInt()
					};
				    var div = new Element('div', {
						'class': 'animated-bg',
						'styles': {
							'position': 'absolute', 
							'left': 0, 
							'top': 0,
							'opacity': 0,
							'width': size.width - margins.x,
							'height': size.height - margins.y
						}
					}).inject(li);
					var self = this;
					var fx = new Fx.Style(div, 'opacity', {duration: this.options.bg.duration, transition: this.options.bg.transition, wait: false}).set(0);
					li.addEvents({
						'mouseenter': function() {
							fx.options.duration = self.options.bg.overEffect.duration;
							fx.options.transition = self.options.bg.overEffect.transition;
							fx.start(1);
						},
						'mouseleave': function() {
							fx.options.duration = self.options.bg.outEffect.duration;
							fx.options.transition = self.options.bg.outEffect.transition;
							fx.start(0);
						}
					});
				}
			}, this);
		};
		this.element.getElements('li').each(function(el) {
			el.addEvents({
				'mouseover': this.over.bind(this, el),
				'mouseout': this.out.bind(this, el)
			});
		}, this);
	},
	
	over: function(el) {
		$clear(el.sfTimer);
		if(!el.hasClass(this.options.hoverClass)) {
			if (window.ie6) {
				var classes = el.getProperty('class').split(" ");
				var option = this.options.hoverClass;
				classes = classes.filter(function(y) { return !y.test("-" + option); });
				classes.each(function(cls) { if (el.hasClass(cls)) el.addClass(cls + "-" + option); }, this);
				var hackish = classes.join("-") + "-" + option;
				if (!el.hasClass(hackish)) el.addClass(hackish);
			}
			
			el.addClass(this.options.hoverClass);
			
			var ul = el.getElement('ul');
			if(ul) {
				if(this.options.bgiframe) ul.bgiframe({opacity: false});
				ul.animate(this.options.animate);
			}
			
			el.getSiblings().each(function(ele) {
				ele.removeClass(this.options.hoverClass);
			}, this);
		}
	},
	
	out: function(el) {
			var option = this.options.hoverClass;

			el.sfTimer = (function(){
				if (window.ie6) {
					var classes = el.getProperty('class').split(" ");
					classes = classes.filter(function(y) { return y.test("-" + option); });
					classes.each(function(cls) { if (el.hasClass(cls)) el.removeClass(cls); }, this);
					var hackish = classes.join("-") + "-" + option;
					if (!el.hasClass(hackish)) el.removeClass(hackish);
				}
				el.removeClass(option);
				var iframe = el.getElement('iframe');
				if(iframe) iframe.remove();
			}).delay(this.options.delay, this);
		}
});
Rokmoomenu.implement(new Options);

Element.extend({
	animate: function(obj) {
		if(!this.Fx) {
			this.Fx = this.effects(obj.opts);
			this.now = this.getStyles.apply(this, obj.props);
			this.FxEmpty = {};
			for(var i in this.now) this.FxEmpty[i] = 0;
		}
		
		if(obj.props.contains('height') || obj.props.contains('width')) {
			this.setStyle('overflow', 'hidden');
			this.getParents('ul').each(function(el) {              
				el.setStyle('overflow', 'visible');
			});
		}
		
		this.Fx.set(this.FxEmpty).start(this.now);
	},
	
	getParents: function(expr) {
		var matched = [];
		var cur = this.getParent();
		while (cur && cur !== document) {
			if(cur.getTag().test(expr)) matched.push(cur);
			cur = cur.getParent();
		}
		return matched;
	},
	
	getSiblings: function(){
		var children = this.getParent().getChildren();
		children.splice(children.indexOf(this), 1);
		return children;
	}
});