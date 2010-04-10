var id = 'ammap_data';
var arr_filename = new Array();
window.addEvent('domready',function(){	
	new Drag.Move($('colorPicker'));
	$('setting-page').addEvent('click',function(e){
		id = $('ammap_settings').getProperty('id');
	});
	
	$('data-page').addEvent('click',function(e){
		id = $('ammap_data').getProperty('id');		
	});	
	
	$('sub-page').addEvent('click', function(e){
		id = $('addon').getProperty('id');		
	});	
	
	$('icons').addEvent('dblclick',function(e){
		var form = document.adminForm;		
		editAreaLoader.setSelectedText(id, form.icons.value);
	});
	
	$('maps').addEvent('dblclick', function(e){
		var form = document.adminForm;		
		editAreaLoader.setSelectedText(id, form.maps.value);
	});	
	
	$('addons').addEvent('dblclick', function(e){
		var form = document.adminForm;		
		editAreaLoader.setSelectedText(id, form.addons.value);
					
	});
	
	$('security0').addEvent('click', function(e){
		$('timeout').setProperty('disabled',true);
	});
	
	$('security1').addEvent('click', function(e){
		$('timeout').setProperty('disabled',false);
	});
	
	if ($('security0').getProperty('checked')){
		$('timeout').setProperty('disabled',true);
	}
	
	$('xmladdons').addEvent('dblclick', function(e){
		var form = document.adminForm;
		var agreeindex=confirm("Do you want call addon's files over the index.php?");
		if (agreeindex) {		
			editAreaLoader.setSelectedText(id, '{XAddon '+form.xmladdons.value+'}');
		} else {
			editAreaLoader.setSelectedText(id, '{XAddon}/'+form.xmladdons.value);
		}

		
	});
	
	$('xmldata').addEvent('dblclick', function(e){
		var form = document.adminForm;		
		editAreaLoader.setSelectedText(id, form.xmldata.value);
	});
	
	$('icons').addEvent('click',function(e){
		if ($('dataview')!=null) $('dataview').remove();		
		var form = document.adminForm;
		var object = new Element('object', {
			id: 'dataview',
			type: 'application/x-shockwave-flash',
			data: '../components/com_yos_ammap/ammap/'+form.icons.value,
			width: '150',
			height: '150'
		});		
		$('viewdata').setStyle('display','block');
		object.inject($('viewdata'));		
	});
	
	$('maps').addEvent('click',function(e){		
		if ($('dataview')!=null) $('dataview').remove();
		var form = document.adminForm;
		var object = new Element('object', {
			id: 'dataview',
			type: 'application/x-shockwave-flash',
			data: '../components/com_yos_ammap/ammap/'+form.maps.value,
			width: '150',
			height: '150'
		});				
		$('viewdata').setStyle('display','block');
		object.inject($('viewdata'));
		
	});
});

