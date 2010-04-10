(function() {
	tinymce.create('tinymce.plugins.FileManager', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceFileManager', function() {
				var e = ed.selection.getNode();

				ed.windowManager.open({
					file : ed.getParam('site_url') + 'index.php?option=com_jce&task=plugin&plugin=filemanager&file=filemanager',
					width : 750 + ed.getLang('filemanager.delta_width', 0),
					height : 640 + ed.getLang('filemanager.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});
			// Register buttons
			ed.addButton('filemanager', {
				title : 'filemanager.desc',
				cmd : 'mceFileManager',
				image : url + '/img/filemanager.gif'
			});							
			ed.onNodeChange.add(function(ed, cm, n, co) {
				cm.setActive('filemanager', co && n.nodeName == 'A' && /jce_file/i.test(ed.dom.getAttrib(n, 'class')));
				
				if((n && n.nodeName == 'IMG' || n.nodeName == 'SPAN') && /jce_fm_/i.test(ed.dom.getAttrib(n, 'class'))){
					n = ed.dom.getParent(n, 'A');
				}
				// Select anchor node and set highlight icon
				if(n && n.nodeName == 'A' && /jce_file/i.test(ed.dom.getAttrib(n, 'class'))){
					ed.selection.select(n);
					cm.setActive('filemanager', true);
				}
			});
		},
		getInfo : function() {
			return {
				longname : 'File Manager',
				author : 'Ryan Demmer',
				authorurl : 'http://www.joomlacontenteditor.net',
				infourl : 'http://www.joomlacontenteditor.net/index2.php?option=com_content&amp;task=findkey&amp;pop=1&amp;lang=en&amp;keyref=filemanager.about',
				version : '1.5.0'
			};
		}
	});
	// Register plugin
	tinymce.PluginManager.add('filemanager', tinymce.plugins.FileManager);
})();