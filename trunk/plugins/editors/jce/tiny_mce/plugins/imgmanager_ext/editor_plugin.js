(function() {
	tinymce.create('tinymce.plugins.ImageManagerExt', {
		init : function(ed, url) {
			function isMediaElm(n) {
				return /^(mceItemFlash|mceItemShockWave|mceItemWindowsMedia|mceItemQuickTime|mceItemRealMedia|mceItemDivX)$/.test(n.className);
			};
			
			// Register commands
			ed.addCommand('mceImageManagerExt', function() {
				// Internal image object like a flash placeholder
				if (isMediaElm(ed.selection.getNode()))
					return;

				ed.windowManager.open({
					file : ed.getParam('site_url') + 'index.php?option=com_jce&task=plugin&plugin=imgmanager_ext&file=imgmanager',
					width : 760 + ed.getLang('imgmanager_ext.delta_width', 0),
					height : 640 + ed.getLang('imgmanager_ext.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url
				});
			});
			// Register buttons
			ed.addButton('imgmanager_ext', {
				title : 'imgmanager_ext.desc',
				cmd : 'mceImageManagerExt',
				image : url + '/img/imgmanager_ext.gif'
			});
			
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('imgmanager_ext', n.nodeName == 'IMG' && !isMediaElm(n));
			});
			
			ed.onInit.add(function() {
				if (ed && ed.plugins.contextmenu) {
					ed.plugins.contextmenu.onContextMenu.add(function(th, m, e) {
						m.add({title : 'imgmanager_ext.desc', icon : 'image', cmd : 'mceImageManagerExt'});
					});
				}
			});
		},
		getInfo : function() {
			return {
				longname : 'Image Manager Extended',
				author : 'Ryan Demmer',
				authorurl : 'http://www.cellardoor.za.net',
				infourl : 'http://www.cellardoor.za.net/index2.php?option=com_content&amp;task=findkey&amp;pop=1&amp;lang=en&amp;keyref=imgmanager.about',
				version : '1.5.0'
			};
		}
	});
	// Register plugin
	tinymce.PluginManager.add('imgmanager_ext', tinymce.plugins.ImageManagerExt);
})();