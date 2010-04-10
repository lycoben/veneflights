/*
	Flash/HTML comunication script
*/
var InternetExplorer = navigator.appName.indexOf("Microsoft") != -1;
var	_FlashAreasCount = 0;
var _FlashAreas = new Array();

function setText(textareaID)
{
	var t_area = FlashArea.getElementById("textarea", textareaID);
	var f_area = FlashArea.getElementById("embed", textareaID+'FL');

	if( f_area )
	{
		f_area.SetVariable("myHTMLtext", t_area.value);
	}
}

function getText( textareaID )
{
	var f_area = FlashArea.getElementById("embed", textareaID+'FL');
	if( f_area ) f_area.GotoFrame(1);
	return false;
}

function getTextSubmit( textareaID )
{
	var f_area = FlashArea.getElementById("embed", textareaID+'FL');
	if( f_area ) f_area.GotoFrame(2);
	return false;
}

function DoFSCommand(command, args, textareaID)
{
//	alert(args);
	var t_area = FlashArea.getElementById("textarea", textareaID);
	var f_area = FlashArea.getElementById("embed", textareaID+'FL');

	if( command == "get_content" )
	{
		setText( textareaID );
	}
	else if( command == "set_content" )
	{
		t_area.value = args;
	}
	else if( command == "set_content_submit" )
	{
		t_area.value = args;
		_FlashAreasCount++;
		if( _FlashAreasCount == _FlashAreas.length )t_area.form.submit(true);
	}
}

//------------------------
//--- FLASHAREA base class
//------------------------
function FlashArea(textarea)
{

	if (typeof textarea != "string")
	{
		alert('TextArea id/name reqiured');
		return;
	}

	if ( FlashArea.checkSupportedBrowser() )
	{
		document.write('<SCRIPT LANGUAGE=javascript\> \n');
		document.write(' function '+ textarea +'FL_DoFSCommand(command, args)\n');
		document.write(' { DoFSCommand(command, args, "'+textarea+'"); }\n');
		document.write('</SCRIPT\> \n');

		if (navigator.appName && navigator.appName.indexOf("Microsoft") != -1
			&& navigator.userAgent.indexOf("Windows") != -1 && navigator.userAgent.indexOf("Windows 3.1") == -1)
		{
			 document.write('<SCRIPT LANGUAGE=VBScript\> \n');
			 document.write('on error resume next \n');
			 document.write('Sub '+textarea+'FL_FSCommand(ByVal command, ByVal args)\n');
			 document.write(' call DoFSCommand(command, args, "'+textarea+'")\n');
			 document.write('end sub\n');
			 document.write('</SCRIPT\> \n');
		}
	}

	this.config = new FlashArea.Config();
	this._textArea     = textarea;
	this._textAreaName = textarea;

	_FlashAreas.push(this);

}

/*
	FlashArea config
*/
FlashArea.Config = function ()
{
	//constants part please noty change it
	this.version    = "1.0";
	this.min_width  = "400";//constant minimum width
	this.min_height = "300";//constant minimum height
	//---

	this.width  = "auto";
	this.height = "auto";

	this.bgcolor = "FFFFFF";

	this.configFile = 'default.xml';
}


/*
	Helper function: replaces the TEXTAREA with the given ID with FlashArea.
*/
FlashArea.replace = function( id )
{
	var ta = HTMLArea.getElementById("textarea", id);
	return ta ? (new FlashArea(ta, config)).generate() : null;

}

/*
	check if browser support Flash
*/
FlashArea.checkSupportedBrowser = function()
{
	return DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
//	return true;
}

/*
	return element by id
*/
FlashArea.getElementById = function(tag, id)
{
	var el, i, objs = document.getElementsByTagName(tag);
	for (i = objs.length; --i >= 0 && (el = objs[i]);)
		if (el.id == id)
			return el;
	return null;
};

/*
	Creates the HTMLArea object and replaces the textarea with it.
*/
FlashArea.prototype.generate = function ()
{
 	if ( ! FlashArea.checkSupportedBrowser() ) return;

	var editor = this;	// we'll need "this" in some nested functions
	// get the textarea
	var textarea = this._textArea;
	if (typeof textarea == "string")
	{
		this._textArea = textarea = FlashArea.getElementById("textarea", textarea);
		if( !this._textArea ) return;
	}

	if( !parseInt(editor.config.width) )
		editor.config.width  = textarea.offsetWidth < editor.config.min_width ? editor.config.min_width : textarea.offsetWidth;
	if( !parseInt(editor.config.height) )
		editor.config.height = textarea.offsetHeight< editor.config.min_height ? editor.config.min_height : textarea.offsetHeight;

	editor.config.width  = editor.config.width < editor.config.min_width	? editor.config.min_width : editor.config.width;
	editor.config.height = editor.config.height < editor.config.min_height	? editor.config.min_height : editor.config.height;

	var embed = document.createElement('embed');

	embed.setAttribute('type','application/x-shockwave-flash');
 	embed.setAttribute('width', editor.config.width);
 	embed.setAttribute('height',editor.config.height);
	embed.setAttribute('name', editor._textAreaName + 'FL');
	embed.setAttribute('id', editor._textAreaName + 'FL');
	embed.setAttribute('bgcolor', editor.config.bgcolor);
	embed.setAttribute('base',_editor_url);

 	embed.setAttribute('src',_editor_url+'FlashAreaHtml.swf');
 	embed.setAttribute('data',_editor_url+'FlashAreaHtml.swf');

	embed.setAttribute('flashvars', 'configFile=' + editor.config.configFile);


	//embed.setAttribute('movie', _editor_url + 'FlashAreaHtmlSample.swf');
 	//var div = document.getElementById(replaceid);
 	//document.getElementsByTagName('body')[0].replaceChild(embed,div);


	textarea.style.display = "none";// hide TextArea

	// insert the editor before the textarea.
	textarea.parentNode.insertBefore(embed, textarea);



	if (textarea.form)
	if ( typeof textarea.form.__fe_prevOnSubmit == "undefined" )
	{
		// we have a form, on submit get the HTMLArea content and
		// update original textarea.
		var f = textarea.form;
		f.__msh_prevOnSubmit = [];

		if (typeof f.onsubmit == "function")
		{
			var funcref = f.onsubmit;
				f.__msh_prevOnSubmit.push(funcref);
		}

		f.onsubmit = function()
		{
			_FlashAreasCount = 0;
			for(var i=0; i<_FlashAreas.length; i++ )getTextSubmit( _FlashAreas[i]._textAreaName );

			var a = this.__fe_prevOnSubmit;
			// call previous submit methods if they were there.
			if (typeof a != "undefined")
			{
				for (var i in a)
				{
					a[i]();
				}
			}

			return false;
		}

	}

	// add a handler for the "back/forward" case -- on body.unload we save
	// the HTML content into the original textarea.
	window.onunload = function()
	{
		getText( editor._textAreaName )

	};

};

/*
	set edited text into TextArea
*/
FlashArea.prototype.forceSetText = function ()
{
	getText( this._textAreaName )
}

/*
	helpre functions flash detection
*/


// -----------------------------------------------------------------------------
// Globals
// Major version of Flash required
var requiredMajorVersion = 7;
// Minor version of Flash required
var requiredMinorVersion = 0;
// Minor version of Flash required
var requiredRevision = 0;
// the version of javascript supported
var jsVersion = 1.0;
// -----------------------------------------------------------------------------

// Visual basic helper required to detect Flash Player ActiveX control version information
document.write('<script language="VBScript" type="text/vbscript"> \n');
document.write('Function VBGetSwfVer(i) \n');
document.write('  on error resume next \n');
document.write('  Dim swControl, swVersion \n');
document.write('  swVersion = 0 \n');

document.write('  set swControl = CreateObject("ShockwaveFlash.ShockwaveFlash." + CStr(i)) \n');
document.write('  if (IsObject(swControl)) then \n');
document.write('    swVersion = swControl.GetVariable("$version") \n');
document.write('  end if \n');
document.write('  VBGetSwfVer = swVersion \n');
document.write('End Function \n');

document.write('</script> \n');

// Detect Client Browser type
var isIE  = (navigator.appVersion.indexOf("MSIE") != -1) ? true : false;
var isWin = (navigator.appVersion.toLowerCase().indexOf("win") != -1) ? true : false;
var isOpera = (navigator.userAgent.indexOf("Opera") != -1) ? true : false;
jsVersion = 1.1;
// JavaScript helper required to detect Flash Player PlugIn version information
function JSGetSwfVer(i){
	// NS/Opera version >= 3 check for Flash plugin in plugin array
	if (navigator.plugins != null && navigator.plugins.length > 0) {
		if (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]) {
			var swVer2 = navigator.plugins["Shockwave Flash 2.0"] ? " 2.0" : "";
      		var flashDescription = navigator.plugins["Shockwave Flash" + swVer2].description;
			descArray = flashDescription.split(" ");
			tempArrayMajor = descArray[2].split(".");
			versionMajor = tempArrayMajor[0];
			versionMinor = tempArrayMajor[1];
			if ( descArray[3] != "" ) {
				tempArrayMinor = descArray[3].split("r");
			} else {
				tempArrayMinor = descArray[4].split("r");
			}
      		versionRevision = tempArrayMinor[1] > 0 ? tempArrayMinor[1] : 0;
            flashVer = versionMajor + "." + versionMinor + "." + versionRevision;
      	} else {
			flashVer = -1;
		}
	}
	// MSN/WebTV 2.6 supports Flash 4
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.6") != -1) flashVer = 4;
	// WebTV 2.5 supports Flash 3
	else if (navigator.userAgent.toLowerCase().indexOf("webtv/2.5") != -1) flashVer = 3;
	// older WebTV supports Flash 2
	else if (navigator.userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 2;
	// Can't detect in all other cases
	else {

		flashVer = -1;
	}
	return flashVer;
}
// When called with reqMajorVer, reqMinorVer, reqRevision returns true if that version or greater is available
function DetectFlashVer(reqMajorVer, reqMinorVer, reqRevision)
{
 	reqVer = parseFloat(reqMajorVer + "." + reqRevision);
   	// loop backwards through the versions until we find the newest version
	for (i=25;i>0;i--) {
		if (isIE && isWin && !isOpera) {
			versionStr = VBGetSwfVer(i);
		} else {
			versionStr = JSGetSwfVer(i);
		}
		if (versionStr == -1 ) {
			return false;
		} else if (versionStr != 0) {
			if(isIE && isWin && !isOpera) {
				tempArray         = versionStr.split(" ");
				tempString        = tempArray[1];
				versionArray      = tempString .split(",");
			} else {
				versionArray      = versionStr.split(".");
			}
			versionMajor      = versionArray[0];
			versionMinor      = versionArray[1];
			versionRevision   = versionArray[2];

			versionString     = versionMajor + "." + versionRevision;   // 7.0r24 == 7.24
			versionNum        = parseFloat(versionString);
        	// is the major.revision >= requested major.revision AND the minor version >= requested minor
			if ( (versionMajor > reqMajorVer) && (versionNum >= reqVer) ) {
				return true;
			} else {
				return ((versionNum >= reqVer && versionMinor >= reqMinorVer) ? true : false );
			}
		}
	}
}