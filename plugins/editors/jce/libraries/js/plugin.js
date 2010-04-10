/*
Class: Plugin
	Base plugin class for creating a JCE plugin object.

Arguments:
	options - optional, an object containing options.

Options:
	site - the base site url.
	plugin - the plugin name
	lang - the language code, eg: en.
	params - parameter object.

Example:
	var advlink = new Plugin('advlink', {params: {'key': 'value'}});
*/
var Plugin = new Class({
	// Dialog box default
	_dialog 		: [],
	// Arbitrary variable
	_vars 			: null,
	// Current plugin
	_plugin			: null,
	getOptions : function(){
		return {
			site : tinyMCEPopup.getParam('document_base_url'),
			lang : 'en',
			params : {},
			alerts : null
		}
	},
	initialize : function(plugin, options){
		this.setOptions(this.getOptions(), options);		
		this._plugin = plugin;

		// fallback for no plugin set
		if(!this._plugin){
			var q = string.query(document.location.href);
			this._plugin = q['plugin'];
		}
		// show any alert dialogs
		this.showAlerts();
		// initialize tooltips
		this.initToolTip();
	},
	/*
	 * Return site url option
	 * @param {String} The site url variable
	*/
	getSite : function(){
		return this.options.site;	
	},
	/*
	 * Store custom plugin parameters
	 * Example: {'animals': ['dog', 'cat', 'mouse']}
	 * @param {Object} The parameters object
	*/
	setParams : function(p){
		for(n in p){
			this.setParam(n, p[n]);
		}
	},
	/*
	 * Store a custom plugin parameter
	 * Example: 'animals', ['dog', 'cat', 'mouse']
	 * @param {string} The parameter key/name
	 * @param {string/array/object} The value
	*/
	setParam : function(p, v){
		this.options.params[p] = v;
	},
	/*
	 * Return a custom plugin parameter
	 * @param {string} The parameter key/name
	*/
	getParam : function(p){
		return this.options.params[p] || false;
	},
	/*
	 * Set the plugin as current
	 * @param {string} The plugin name
	*/
	setPlugin : function(p){
		this._plugin = p;
	},
	/*
	 * Return the current plugin
	 * @return {string} The plugin name
	*/
	getPlugin : function(){
		return this._plugin;	
	},
	/*
	 * Return a full resource url
	 * @param {string} The url type, eg: img, plugin
	 * @return {string} The url
	*/
	getUrl : function( type ){
		if( type == 'plugins' ){
			type = 'tiny_mce/plugins/' + this.getPlugin();
		}
		return string.path(this.options.site, '/plugins/editors/jce/' + type);
	},
	/*
	 * Return a full image url
	 * @param {string} The image name
	 * @return {string} The url
	*/
	getImage : function(name){
		var parts 	= name.split('.');
		var path 	= parts[0].replace(/[^a-z0-9-_]/i, '');
		var file 	= parts[1].replace(/[^a-z0-9-_]/i, '');
		var ext 	= parts[2].replace(/[^a-z0-9-_]/i, '');
		
		return this.getUrl(path) + '/img/' + file + '.' + ext;
	},
	/*
	 * Resolve a TinyMCE language string
	 * @param {string} The variable name
	 * @param {string} The default translation
	 * @return {string} The language string
	*/
	getLang : function(s, dv){
		return tinyMCEPopup.getLang(s, dv);
	},
	/*
	 * Loads a TinyMCE plugin or theme dialog language file. Requires asset.js
	 * @param {string} The variable name
	 * @param {string} The default translation
	 * @return {string} The language string
	*/
	loadLanguage : function(name){
		var path = '', parts = '', file = '';
		if(name){
			parts 	= name.split('.');
			path 	= parts[0].replace(/[^a-z0-9-_]/i, '');
			file 	= parts[1].replace(/[^a-z0-9-_]/i, '');
			path 	= path + '/' + file + '/';
		}
		var u = this.options.site + '/plugins/editors/jce/tiny_mce/' + path + 'langs/' + this.options.lang + '_dlg.js';
		new Asset.javascript(u);
	},
	setVars: function(vars){
		this._vars = vars;
	},
	getVars: function(){
		return this._vars;
	},
	/*
	* Add a dialog object
	* @param {String} The dialog name
	* @param {String} The dialog object
	*/
	addDialog : function(name, dialog){
		this._dialog[name] = dialog;
	},
	/*
	* Get a dialog object
	* @param {String} The dialog name
	* @return the dialog object
	*/
	getDialog : function(name){
		return this._dialog[name] || '';
	},
	/*
	* Remove a dialog object
	* Shortcut for closing a dialog too
	* @param {String} The dialog name
	*/
	removeDialog : function(name){
		if(typeof this._dialog[name].close() != 'undefined'){
			this._dialog[name].close();	
		}
		delete this._dialog[name];
	},
	/*
	 * Open help window for current language
	*/
	openHelp : function(type){
		if(!type) type = 'standard';
		tinyMCE.activeEditor.windowManager.open({
			url : this.options.site + 'index.php?option=com_jce&task=help&lang='+ this.options.lang +'&plugin='+ this._plugin +'&type='+ type +'&file=help',
			width : 640,
		    height : 480,
		    resizable : "yes",
            inline : "yes",
        	close_previous : "no"
		});
	},
	iframe : function(fn, cb){
		new IFrame({
			auto: true,
			action: fn,
			onComplete: function(o){
				if(o.error){
					alert(o.error);
				}else{
					r = o.result || {error: false};
					if(cb){
						cb.pass(r, this)();	
					}else{
						return r;	
					}
				}	
			}
		});
	},
	/*
	 * XHR request. Requires json.js
	 * @param {string} The target function to call
	 * @param {array} An array of arguments
	 * @param {function} The callback function on success
	*/
	xhr : function(fn, args, cb){
		new Json.Remote(document.location.href, {
			onComplete: function(o){
				if(o.error){
					alert(o.error);	
				}
				r = o.result || {error: false};
				if(cb){
					cb.pass(r, this)();	
				}else{
					return r;	
				}
			}.bind(this),
			onFailure: function(x){
				alert('Request failed with status code: '+ x.status);	
			}
		}).send({'fn': fn, 'args': args});
	},
	/*
	 * Alerts. Requires window.js
	*/
	showAlerts : function(){
		var alerts = this.options.alerts || [];
		if(alerts.length){
			var h = '<dl class="alert">';
			alerts.each(function(a){
				h += '<dt class="' + a['class'] + '">' + a['title'] + '</dt><dd>' + a['text'] + '</dd>';				
			});
			h += '</dl>'
			new Alert(h, {height: 150 + alerts.length * 50});
		}
	},
	initToolTip : function(elms){
		this.tooltip =  new Tips($$('.hastip'), {
			className : 'tooltip',
			fixed: true,
			offsets: {'x': 24, 'y': 24}
		});	
	},
	addToolTip : function(el){
		if($type(el) != 'array'){
			el = [el];	
		}
		el.each(function(e){
			this.tooltip.build(e);				 
		}.bind(this))
	}
});
Plugin.implement(new Events, new Options);
/* IFrame class for pseudo ajax/json stuff */
var IFrame = new Class({
	getOptions : function(){
		return {			
			form: $E('form'),
			frame: 'iframe',
			auto: false,
			action: null,
			onStart: Class.empty,
			onComplete: Class.empty
		};
	},
	initialize : function(options){
		this.setOptions(this.getOptions(), options);
		if (this.options.initialize) this.options.initialize.call(this);
		
		if($(this.options.frame)){
			$(this.options.frame).remove();	
		}
		this.frame 	= new Element('iframe').setProperties({
			'src': 'about:blank', 
			'name': this.options.frame,
			'id': this.options.frame
		}).setStyle('display', 'none').injectInside($E('form'))
		
		if(window.ie){
			window.frames[this.frame.id].name = this.frame.name;
		}
		this.options.form.setAttribute('target', this.frame.name);
		
		this.action = this.options.form.action;
		this.setAction();
		
		this.options.form.addEvent('submit', function(){
			this.fireEvent('onStart');
		}.bind(this));
		
		this.frame.addEvent('load', function(){
			var f 	= $(this.frame);
			var el 	= f.contentWindow.document || f.contentDocument || window.frames[f.id].document;
			if(el.location.href == 'about:blank') return;
			var res = el.body.innerHTML;
			if(res !== ''){
				this.fireEvent('onComplete', Json.evaluate(res, true));
			}
			this.resetAction();
		}.bind(this))
		
		if(this.options.auto){
			this.options.form.submit();	
		}
	},
	setAction : function(){
		this.resetAction();
		if(this.options.action){
			this.action += '&action=' + this.options.action;	
		}
		this.options.form.setAttribute('action', this.action);
	},
	resetAction : function(){
		this.action = this.action.replace(/&action=([^&]+)/i, '');
		this.options.form.setAttribute('action', this.action);
	}
});
IFrame.implement(new Options, new Events);