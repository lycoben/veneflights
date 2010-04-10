var sfHover = function(search, replaced) {
	if (!replaced) replaced = 'sfHover';

	var els = $$('.' + search).getElements('li');
	if (!els.length) return false;

		els.each(function(el) {
			el.addEvents({
				'mouseenter': function() {
					this.addClass(replaced);
				},
				'mouseleave': function() {
					this.removeClass(replaced);
				}
			});
		});
	}

window.addEvent('domready', function() {
	sfHover('menutop');
});
