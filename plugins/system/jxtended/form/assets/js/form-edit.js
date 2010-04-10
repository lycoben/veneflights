/**
 * @version		$Id: form-edit.js 49 2008-04-29 00:32:29Z rob.schley $
 * @package		JX-Pro
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

JXFormControl = function() { this.constructor.apply(this, arguments);}
JXFormControl.prototype =
{
	constructor: function()
	{
		var self = this;
		// Initialize droppable object options
		this.droppableOptions = {
			onOver:function(){
				this.addClassName('dragover');
			},
			onLeave:function(){
				this.removeClassName('dragover');
			},
			onDrop:function(el){
				this.removeClassName('dragover');
				document.formControl.addFieldBlock(el);
			}
		}
		this.fieldList	= $('field-list');
		this.fieldCount = this.fieldList.getElements('li').length;
		this.droppable	= $('form-definition').extend(this.droppableOptions);
		this.draggables	= $S('.fieldtype');
		this.draggables.each(function(el){ self.setDraggable(el); });
	},

	/**
	 * Method to set an element as a draggable field type
	 *
	 * @param	object	Element reference to set as draggable
	 * @return	void
	 * @since	1.5
	 */
	setDraggable: function( el )
	{
		var fadeIn = new fx.Opacity(el, {duration:300});
		el.effect = fadeIn;

		var dragContainerOptions = {
			handle: el,

			onStart: function(){
				el.effect.custom(1,.5);
			}.bind(this),

			onComplete: function(){
				el.effect.custom(.5,1);
				el.style.top = 0;
				el.style.left = 0;
			}.bind(this)
		};
		el.style.cursor = 'move';
		dragContainerOptions.droppables = Array($('form-definition'));
		el.makeDraggable(dragContainerOptions);
	},

	/**
	 * Method to add a field block to the field definition list
	 *
	 * @param	object	Element dropped on the field definition list
	 * @return	void
	 * @since	1.5
	 */
	addFieldBlock: function( el )
	{
		// Setup field item
		var li = new Element('li');
		li.addClass( 'field' );
		var title = new Element('div');
		title.addClass( 'field-title' );
		li.appendChild(title);
		var options = new Element('div');
		options.addClass( 'field-options' );
		li.appendChild(options);

		/*
		 * Setup Field Title and Control Block
		 */
		title.options = options;

		// Set field controls
		var controls = this.getControlBlock();
		title.appendChild(controls);
		// Set field icon
		var icon = $(el).getElement('img').clone();
		icon.addEvent('click', function(){ this.parentNode.options.effect.toggle(); });
		icon.setProperty('align', 'middle');
		title.appendChild(icon);
		title.appendText(' ');
		var label = new Element('span');
		label.addClass('fieldTypeName');
		label.setHTML($(el).getElement('div').innerHTML);
		title.appendChild(label);

		/*
		 * Setup Field Options Block
		 */
		options.setStyle('zIndex', 10000);
		var fieldset = new Element('fieldset');
		fieldset.appendChild(new Element('legend').appendText('Field Configuration'));
		fieldset.appendChild(this.getOptionsTable($(el).getElement('div').className));
		options.appendChild(fieldset);

		// Setup field options slide
		var slide = new fx.Slide(options, {duration:300});
		options.effect = slide;

		// Hide open fields
		var fields = $ES('li', 'field-list');
		var divs;
		for (i=0,n=fields.length;i<n;i++)
		{
			divs = $ES('div', fields[i]);
			divs.each(function(div){
				if (div.hasClass('field-options')) {
					div.effect.hide();
				}
			});
		}

		this.fieldList.appendChild(li);
	},

	/**
	 * Method to build a control block object
	 *
	 * @return	object
	 * @since	1.5
	 */
	getOptionsTable: function(type)
	{
		this.fieldCount++;

		var table = new Element('table');
		table.addClass('admintable');
		table.setProperty('cellspacing', 1);

		var tbody = new Element('tbody');
		table.appendChild(tbody);

		// Field Name
		var tr = this.getFieldConfigRowText(this.fieldCount, 'Name', 'name', 'required');
		tbody.appendChild(tr);

		// Field Label
		var tr = this.getFieldConfigRowText(this.fieldCount, 'Label', 'label', 'required');
		tbody.appendChild(tr);

		// Field Description
		var tr = this.getFieldConfigRowTextarea(this.fieldCount, 'Description', 'description');
		tbody.appendChild(tr);

		// Field Type
		var input = new Element('input');
		input.setProperties({
			type: 'hidden',
			name: 'field['+this.fieldCount+'][type]',
			value: type
		});
		tbody.appendChild(input);

		switch (type)
		{
			case 'text':
			case 'password':
				// Field Size
				var tr = this.getFieldConfigRowText(this.fieldCount, 'Size', 'size');
				tbody.appendChild(tr);

				// Field Default
				var tr = this.getFieldConfigRowText(this.fieldCount, 'Default', 'value');
				tbody.appendChild(tr);
				break;
			case 'list':
			case 'radiofield':
				// Field Size
				var tr = this.getFieldConfigRowText(this.fieldCount, 'Size', 'size');
				tbody.appendChild(tr);

				// Field Options
				var tr = this.getFieldConfigRowOptions(this.fieldCount, 'Options', 'options');
				tbody.appendChild(tr);
				break;
			case 'checkbox':
				// Field Value
				var tr = this.getFieldConfigRowText(this.fieldCount, 'Value', 'value');
				tbody.appendChild(tr);

				// Field Value
				var tr = this.getFieldConfigRowCheckbox(this.fieldCount, 'Checked', 'checked');
				tbody.appendChild(tr);
				break;
			default:

				break;
		}

		return table;
	},

	getFieldConfigRowCheckbox: function(offset, label, name, validate)
	{
		var tr = new Element('tr');
		var tdkey = new Element('td');
		tdkey.addClass('key');
		tdkey.setProperty('width', '185px');

		var flabel = new Element('label');
		flabel.appendText(label);
		flabel.setProperty('for', 'fcheckbox'+offset+name);
		tdkey.appendChild(flabel);

		var tdval = new Element('td');
		var input = new Element('input');
		input.setProperties({
			id:   'fcheckbox'+offset+name,
			type: 'checkbox',
			name: 'field['+offset+']['+name+']'
		});
		tdval.appendChild(input);

		tr.appendChild(tdkey);
		tr.appendChild(tdval);

		return tr;
	},

	getFieldConfigRowText: function(offset, label, name, validate)
	{
		var tr = new Element('tr');
		var tdkey = new Element('td');
		tdkey.addClass('key');
		tdkey.setProperty('width', '185px');

		var flabel = new Element('label');
		flabel.appendText(label);
		flabel.setProperty('for', 'ftext'+offset+name);
		tdkey.appendChild(flabel);

		var tdval = new Element('td');
		var input = new Element('input');
		input.setProperties({
			id:   'ftext'+offset+name,
			type: 'text',
			name: 'field['+offset+']['+name+']'
		});
		input.addEvent('blur', function(){return document.formvalidator.validate(this);});
		if (validate) {
			input.addClass(validate);
			input.setProperty('title', label+' is required' );
		}
		tdval.appendChild(input);

		tr.appendChild(tdkey);
		tr.appendChild(tdval);

		return tr;
	},

	getFieldConfigRowTextarea: function(offset, label, name, validate)
	{
		var tr = new Element('tr');
		var tdkey = new Element('td');
		tdkey.addClass('key');
		tdkey.setProperty('width', '185px');

		var flabel = new Element('label');
		flabel.appendText(label);
		flabel.setProperty('for', 'ftextarea'+offset+name);
		tdkey.appendChild(flabel);

		var tdval = new Element('td');
		var input = new Element('textarea');
		input.setProperties({
			id:   'ftextarea'+offset+name,
			name: 'field['+offset+']['+name+']'
		});
		input.addEvent('blur', function(){return document.formvalidator.validate(this);});
		if (validate) {
			input.addClass(validate);
			input.setProperty('title', label+' is required' );
		}
		tdval.appendChild(input);

		tr.appendChild(tdkey);
		tr.appendChild(tdval);

		return tr;
	},

	getFieldConfigRowSelect: function(offset, label, name, options, validate)
	{
		var tr = new Element('tr');
		var tdkey = new Element('td');
		tdkey.addClass('key');
		tdkey.setProperty('width', '185px');

		var flabel = new Element('label');
		flabel.appendText(label);
		flabel.setProperty('for', 'fselect'+offset+name);
		tdkey.appendChild(flabel);

		var tdval = new Element('td');
		var input = new Element('select');
		input.setProperties({
			id: 'fselect'+offset+name,
			name: 'field['+offset+']['+name+']'
		});
		$A(options).each(function(option){
			var o = new Element('option');
			o.setProperty('value', option);
			input.appendChild(o);
		});
		input.addEvent('blur', function(){return document.formvalidator.validate(this);});
		if (validate) {
			input.addClass(validate);
			input.setProperty('title', label+' is required' );
		}
		tdval.appendChild(input);

		tr.appendChild(tdkey);
		tr.appendChild(tdval);

		return tr;
	},

	getFieldConfigRowOptions: function(offset, label, name)
	{
		var tr = new Element('tr');
		var tdkey = new Element('td');
		tdkey.addClass('key');
		tdkey.setProperty('width', '185px');

		var button = new Element('button');
		button.setProperty('type', 'button');
		button.onum = 0;
		button.foffset = offset;
		button.fname = name;
		button.setHTML('Add Option');
		button.addEvent( 'click', function(){
			this.onum++;
			var input = new Element('input');
			input.setProperties({ type: 'text', name: 'field['+this.foffset+']['+this.fname+']['+this.onum+']' });
			input.addEvent('blur', function(){return document.formvalidator.validate(this);});
			input.addClass('required');
			input.setProperty('title', 'Required' );
			var div = new Element('div');
			div.setStyle('padding', '3px');
			div.appendChild(input);
			this.parentNode.getNext().appendChild(div);
			this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.effect.show();
		});
		tdkey.appendChild(button);
		tdkey.appendText(' ');

		var flabel = new Element('label');
		flabel.appendText(label);
		tdkey.appendChild(flabel);

		var tdval = new Element('td');

		tr.appendChild(tdkey);
		tr.appendChild(tdval);

		return tr;
	},

	/**
	 * Method to build a control block object
	 *
	 * @return	object
	 * @since	1.5
	 */
	getControlBlock: function()
	{
		var controls = new Element('div');
		controls.addClass('control-block');
		controls.setStyle('text-align', 'right');

		// Setup remove button
		var rm = new Element('a');
	  	rm.setStyle('cursor', 'pointer');
		rmImg = new Element('img');
		rmImg.setProperties({
			src: 'components/com_forms/assets/images/rmField.gif',
			alt: 'Remove',
			title: '[X]'
		});
		rm.appendChild(rmImg);
		rm.addEvent('click', function(){ this.parentNode.parentNode.parentNode.remove();});
		controls.appendChild(rm);
		controls.appendText(' ');

		// Setup edit button
		var edit = new Element('a');
	  	edit.setStyle('cursor', 'pointer');
		edit.setHTML('[Edit]');
		edit.addEvent('click', function(){ this.parentNode.parentNode.options.effect.toggle(); });
//		controls.appendChild(edit);
//		controls.appendText(' ');

		return controls;
	}
}

Window.onDomReady(function(){
	document.formControl = new JXFormControl();

	// Set field name to appropriate value
	$('item_title').addEvent('blur', function(){ if(this.form.name.value == '')this.form.name.value = this.value.replace(/ /g,'-').replace(/&/g,'and').toLowerCase();});
	$('item_name').addEvent('blur', function(){ this.value = this.value.replace(/ /g,'-').replace(/&/g,'and').toLowerCase();});
});