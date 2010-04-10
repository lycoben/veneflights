/*
    Get the maximum height from divs with passed class as argument
    Djamil Legato <djamil@djamil.it>
    For Andy Miller
*/

var maxHeight = function(classname) {
    var divs = document.getElements('div.' + classname);
    var max = 0;
    divs.each(function(div) {
        max = Math.max(max, div.getSize().size.y);
    });
	divs.setStyle('height', max);
    return max;
}

window.addEvent('load', function() { 
	maxHeight('sameheight');
	maxHeight.delay(500, maxHeight, 'sameheight'); 
});