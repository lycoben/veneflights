var TemplateManagerDialog = {
	preInit : function() {
		tinyMCEPopup.requireLangPack();	
	},
	templateHTML : null,
	init : function() {
		var ed 	= tinyMCEPopup.editor, s = ed.selection, n = s.getNode();
		var src = ed.documentBaseURI.toRelative(ed.dom.getAttrib(n, 'src'));
		this.templatemanager = initManager(src);
		
		dom.disable('insert', true);
	},
 	insert : function() {
		tinyMCEPopup.execCommand('mceInsertTemplate', false, {
			content : this.getHTML(),
			selection : tinyMCEPopup.editor.selection.getContent()
		});

		tinyMCEPopup.close();
	},
	getHTML : function(){
		return this.templateHTML;
	},
	setHTML : function(h){
		this.templateHTML = tinymce.trim(h);
	}
};
TemplateManagerDialog.preInit();
tinyMCEPopup.onInit.add(TemplateManagerDialog.init, TemplateManagerDialog);

var TemplateManager = Manager.extend({
	otherOptions : function(){
		return {
			onFileClick : function(file){
				this.selectFile(file);
			},
			onFileInsert : function(file){
				this.selectFile(file);	
			}.bind(this)
		};
	},
	initialize : function(src, options){
		this.setOptions(this.otherOptions(), options);
		this.parent('templatemanager', src, '', this.options);
	},
	saveTemplate : function(){
		var content 	= tinyMCEPopup.editor.getContent();
		var selection 	= tinyMCEPopup.editor.selection.getContent();
		
		if(selection === ''){
			selection = content;	
		}
		var extras = new Element('div', {'class': 'formElm'}).adopt(
			new Element('label', {'for': 'template-type'}).setHTML(tinyMCEPopup.getLang('dlg.type', 'Type'))								 
		).adopt(
			new Element('select', {'id': 'template-type', 'name': 'type'}).adopt([
				new Element('option', {'value': 'snippet'}).setHTML(tinyMCEPopup.getLang('templatemanager_dlg.snippet', 'Snippet')),													 
				new Element('option', {'value': 'template'}).setHTML(tinyMCEPopup.getLang('templatemanager_dlg.template', 'Template'))
			])
		)

		this.addDialog('template', new Prompt(tinyMCEPopup.getLang('templatemanager_dlg.new_template', 'Create Template'), {
			parent: 'form',
			text: tinyMCEPopup.getLang('dlg.name', 'Name'),
			id : 'template-name',
			name : 'name',
			elements: extras,
			onConfirm: function(){
				$E('form').adopt(
					new Element('input', {'type': 'hidden', 'name': 'dir', 'value': this.getDir()})				 
				).adopt(
					new Element('input', {'type': 'hidden', 'name': 'data', 'value': selection})
				)
				this.setMessage(tinyMCEPopup.getLang('dlg.message_load', 'Loading...'), 'load');
				this.iframe('saveTemplate', function(o){
					if(!o.error){
						this.refreshList();
						this.removeDialog('template');
					}else{
						this.raiseError(o.error);
					}
				}.bind(this))
			}.bind(this)
		}));
	},
	selectFile : function(title){		
		var site 	= string.path(this.getSite(), this.getParam('base'));
		var url		= string.path(this.getDir(), string.basename(title));
		var src		= string.path(site, url);
					
		dom.disable('insert', true);
		this.setStatus(tinyMCEPopup.getLang('dlg.message_load', 'Loading...'), 'load');
		
		$('template_iframe').addEvent('load', function(){
			TemplateManagerDialog.setHTML($('template_iframe').contentWindow.document.body.innerHTML);
			dom.disable('insert', false);
			this.resetStatus();
		}.bind(this)).setProperty('src', src);
	}
});
TemplateManager.implement(new Events, new Options);