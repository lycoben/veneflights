editAreaLoader.init({
	id: "ammap_settings"	// id of the textarea to transform
	,start_highlight: true	// if start with highlight
	,allow_resize: "both"
	,allow_toggle: false
	,language: "en"
	,syntax: "xml"
	,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
});

editAreaLoader.init({
	id: "ammap_data"	// id of the textarea to transform
	,start_highlight: true	// if start with highlight
	,allow_resize: "both"
	,allow_toggle: false
	,language: "en"
	,syntax: "xml"
	,toolbar: "search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
});

editAreaLoader.init({
	id: "addon"	// id of the textarea to transform
	,start_highlight: true	// if start with highlight
	,allow_resize: "both"
	,allow_toggle: false
	,language: "en"
	,syntax: "xml"
	,toolbar: "load, search, go_to_line, fullscreen, |, undo, redo, |, select_font, |, change_smooth_selection, highlight, reset_highlight, |, help"
	,is_multi_files: true,
	EA_file_close_callback: "file_close",	
	submit_callback: "submitfile",
	load_callback: "loadfile",	
	EA_load_callback: "onloadfile"
});

function onloadfile(id){
	if (arr_filename){
		for (var i=0; i<arr_filename.length; i++){
			var j=i+"";

			var new_file= {id: j, text: $(j).getText(), syntax: 'xml', title: arr_filename[i]};
			editAreaLoader.openFile(id, new_file);
		}
		arr_filename = new Array();
	}
}

function file_close(fileclose){
	if ($('addon'+fileclose.id)){
		$('addon'+fileclose.id).remove();	
	}	
}

function submitfile(id){
	form.ammap_data.value=editAreaLoader.getValue('ammap_data');
	form.ammap_settings.value=editAreaLoader.getValue('ammap_settings');
	var nao = '';
	var tao = '';
	var arr_files = editAreaLoader.getAllFiles(id);

	for (item in arr_files){
		nao+='text'+editAreaLoader.getFile(id, item).id+',';
		tao+=editAreaLoader.getFile(uid, item).title+',';
		var newtext = new Element('textarea', {
			id: 'text'+editAreaLoader.getFile(id, item).id,
			name: 'text'+editAreaLoader.getFile(id, item).id
		});
		newtext.setText(editAreaLoader.getFile(id, item).text);
		newtext.inject($('clr'));
	}
	$('naddons').setProperty('value',nao.substring(0,nao.lastIndexOf(',')));
	$('taddons').setProperty('value',tao.substring(0,nao.lastIndexOf(',')));
}

function loadfile(id){
	
	var dateObject = new Date();		
	newid = dateObject.getTime();
	var whatName=prompt("Please type in namefile:","");
	if (whatName!=null){
		var arr_files = editAreaLoader.getAllFiles(id);
		for (item in arr_files){
			if ((whatName+'.xml')==editAreaLoader.getFile(id, item).title){
				alert('Invalid name !');
				return;
			}			
		}
		var new_file= {id: newid, text: "", syntax: 'xml', title: whatName+'.xml'};
		editAreaLoader.openFile(id, new_file);
		
		editAreaLoader.getCurrentFile(id).edited = false;
		if (!$('addon'+editAreaLoader.getCurrentFile(id).id)){
			var newopt = new Element('option', {
				id: 'addon'+editAreaLoader.getCurrentFile(id).id,
				value: editAreaLoader.getCurrentFile(id).title,
				title: editAreaLoader.getCurrentFile(id).id
			});
			newopt.setText(editAreaLoader.getCurrentFile(id).title);
			newopt.inject($('xmladdons'));
		}
	}
}