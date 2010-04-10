// Repair the stupid toolbar buttons !!!
/*
window.addEvent('domready',
function(){
	var links = $(document.body).getElements('a.toolbar');
	links.each(function(el){

		var onclick = el.getAttribute("onclick");
		el.onclick = "";		
		el.href = "javascript: "+onclick;
	});
}
);
*/