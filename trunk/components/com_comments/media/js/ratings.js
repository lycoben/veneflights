
window.addEvent('domready',function(){$$('form.addrating').each(function(form){form.getElements('ul.rating-stars a').each(function(link){link.setProperty('formId',this.id);link.setStyle('cursor','pointer');link.addEvent('click',function(){form=$(this.getProperty('formId'));var contextId=form.id.replace('rate-','');var log=$('rating-count-'+contextId).addClass('ajax-loading');form.score.value=this.rel;form.send({onComplete:function(responseText){log.removeClass('ajax-loading');response=Json.evaluate(responseText);if(response.error==true){alert(response.message);}else{numratings=$('rating-count-'+contextId).getElement('span.count');if(response.pscore_count==1){numratings.setText('1');}else{numratings.setText(response.pscore_count);}
ratingstars=form.getElement('.current-rating');ratingstars.setStyle('width',Math.floor(response.pscore*100)+'%');}}});});},form);});});