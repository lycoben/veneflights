/*
 ### jQuery Star Rating Plugin v2.1 - 2008-03-12 ###
 By Diego A, http://www.fyneworks.com, diego@fyneworks.com
 - 'read only' feature by by Keith Wood, http://keith-wood.name/, kbwood@virginbroadband.com.au
 
 Project: http://plugins.jquery.com/project/MultipleFriendlyStarRating
 Website: http://www.fyneworks.com/jquery/star-rating/
	
	This is a modified version of the star rating plugin from:
 http://www.phpletter.com/Demo/Jquery-Star-Rating-Plugin/
 
 //BB: fixed bug with multiple ratings with same name but different forms
*/
// ORIGINAL COMMENTS:
/*************************************************
 This is hacked version of star rating created by <a href="http://php.scripts.psu.edu/rja171/widgets/rating.php">Ritesh Agrawal</a>
 It thansform a set of radio type input elements to star rating type and remain the radio element name and value,
 so could be integrated with your form. It acts as a normal radio button.
 modified by : Logan Cai (cailongqun[at]yahoo.com.cn)
 website:www.phpletter.com
************************************************/


/*# AVOID COLLISIONS #*/
;if(jQuery) (function($){
/*# AVOID COLLISIONS #*/

// default settings
$.rating = {
	cancel: 'Cancel Rating', // advisory title for the 'cancel' link
	cancelValue: '',         // value to submit when user click the 'cancel' link
	half: false,             // just a shortcut to settings.split = 2
	split: 0,                // split the star into how many parts?
	required: false,         // disables the 'cancel' button so user can only select one of the specified values
	readOnly: false,         // disable rating plugin interaction/ values cannot be changed
	
	// required properties:
	groups: {},// allows multiple star ratings on one page
 event: {// plugin event handlers
  fill: function(n, el, state){ // fill to the current mouse position.
	  this.drain(n);
	  $(el).prevAll('.star').andSelf().addClass('star_'+(state || 'hover'));
  },
  drain: function(n, el, settings) { // drain all the stars.
  	$($.rating.groups[n].valueElem).siblings('.star').removeClass('star_on').removeClass('star_hover');
  },
  reset: function(n, el, settings){ // Reset the stars to the default index.
  	if (!$($.rating.groups[n].current).is('.cancel'))
 		 $($.rating.groups[n].current).prevAll('.star').andSelf().addClass('star_on');
  },
  click: function(n, el, settings){ // Selected a star or cancelled
			$.rating.groups[n].current = el;
			var curValue = $(el).children('a').text();
			// Set value
			$($.rating.groups[n].valueElem).val(curValue);
			// Update display
			$.rating.event.drain(n);
			$.rating.event.reset(n);
			// callback function, as requested here: http://plugins.jquery.com/node/1655
			if(settings.callback) settings.callback.apply($.rating.groups[n].valueElem, [curValue, el]);
  }      
 }// plugin events
};

$.fn.rating = function(instanceSettings){
	if(this.length==0) return this; // quick fail
	
	instanceSettings = $.extend(
  {}/* new object */,
		$.rating/* global settings */,
		instanceSettings || {} /* just-in-time settings */
	);
	
	// loop through each matched element
 this.each(function(i){
		
		var settings = $.extend(
			{}/* new object */,
			instanceSettings || {} /* current call settings */,
			($.metadata? $(this).metadata(): ($.meta?$(this).data():null)) || {} /* metadata settings */
		);
		
		//console.log([this.name, settings.half, settings.split], '#');
		
		// grouping:
		var n = $(this).parents('form').attr('name') + '___' + this.name;		//BB changed, was: var n = this.name;	
		if(!$.rating.groups[n]) $.rating.groups[n] = {count: 0};
		i = $.rating.groups[n].count; $.rating.groups[n].count++;
		
		// Accept readOnly setting from 'disabled' property
		$.rating.groups[n].readOnly = $.rating.groups[n].readOnly || settings.readOnly || $(this).attr('disabled');
		
		// Things to do with the first element...
		if(i == 0){
			// Create value element (disabled if readOnly)
		 $.rating.groups[n].valueElem = $('<input type="hidden" name="' + this.name + '" value=""' + (settings.readOnly ? ' disabled="disabled"' : '') + '>');	//BB changed: name="n" --> name="this.name"....
			// Insert value element into form
   $(this).before($.rating.groups[n].valueElem);
 		
			if($.rating.groups[n].readOnly || settings.required){
			 // DO NOT display 'cancel' button
			}
			else{
			// Display 'cancel' button
 			$(this).before(
     $('<div class="cancel"><a title="' + settings.cancel + '">' + settings.cancelValue + '</a></div>')
					.mouseover(function(){ $.rating.event.drain(n, this, settings); $(this).addClass('star_on'); })
					.mouseout(function(){ $.rating.event.reset(n, this, settings);	$(this).removeClass('star_on'); })
					.click(function(){ $.rating.event.click(n, this, settings); })   
    ); 
			}
		}; // if (i == 0) (first element)
		
		// insert rating option right after preview element
		eStar = $('<div class="star"><a title="' + (this.title || this.value) + '">' + this.value + '</a></div>');
		$(this).after(eStar);
		
		// Half-stars?
		if(settings.half) settings.split = 2;
		
		// Prepare division settings
	 if(typeof settings.split=='number' && settings.split>0){
		 var spi = (i % settings.split), spw = Math.floor($(eStar).width()/settings.split);
			$(eStar)
			// restrict star's width and hide overflow (already in CSS)
			.width(spw)
			// move the star left by using a negative margin
			// this is work-around to IE's stupid box model (position:relative doesn't work)
			.find('a').css({ 'margin-left':'-'+ (spi*spw) +'px' })
		};
		
		// readOnly?
		if($.rating.groups[n].readOnly){
			// Mark star as readOnly so user can customize display
			$(eStar).addClass('star_readonly');
 		//alert([this.name,this.value,this.checked].join('\n'));
		}
		else{
			// Attach mouse events
			$(eStar)
			.mouseover(function(){ $.rating.event.drain(n, this, settings); $.rating.event.fill(n, this, 'hover'); })
			.mouseout(function(){ $.rating.event.drain(n, this, settings); $.rating.event.reset(n, this, settings); })
			.click(function(){ $.rating.event.click(n, this, settings); });
		};
		
		//if(console) console.log(['###', n, this.checked, $.rating.groups[n].initial]);
		if(this.checked) $.rating.groups[n].current = eStar;
		
		//remove this checkbox
		$(this).remove();
		
		// reset display if last element
		if(i + 1 == this.length) $.rating.event.reset(n, this, settings);
	
	}); // each element
  
	// initialize groups...
 for(n in $.rating.groups)//{ not needed, save a byte!
		(function(c, v, n){ if(!c) return;
			$.rating.event.fill(n, c, 'on');
			$(v).val($(c).children('a').text());
		})
		($.rating.groups[n].current, $.rating.groups[n].valueElem, n);
	//}; not needed, save a byte!
	
	return this; // don't break the chain...
};



/*# AVOID COLLISIONS #*/
})(jQuery);
/*# AVOID COLLISIONS #*/
