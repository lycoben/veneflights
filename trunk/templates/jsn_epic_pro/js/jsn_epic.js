/**
	* @copyright Copyright (C) 2006 - 2008 JoomlaShine.com
	* @author JoomlaShine.com
	* @license Commercial Proprietary
	* Please visit http://www.joomlashine.com for more information
*/

var prefsLoaded = false;
var currentFontSize = defaultFontSize;

function jsnChangeFontSize(sizeDifference)
{
	currentFontSize = parseInt(currentFontSize) + parseInt(sizeDifference * 2.5);

	if(currentFontSize > 100){
		currentFontSize = 100;
	}else if(currentFontSize < 60){
		currentFontSize = 50;
	}

	jsnSetFontSize("jsn-master", currentFontSize);
}

function jsnResetFontSize()
{
	currentFontSize = defaultFontSize;
	jsnChangeFontSize(0);
}

function jsnLoadPrefs()
{
	if(!prefsLoaded){
		cookie = jsnReadCookie("fontSize");
		currentFontSize = cookie ? cookie : defaultFontSize;
		jsnChangeFontSize(0);
		
		prefsLoaded = true;
	}
}

function jsnSavePrefs()
{
	jsnWriteCookie("fontSize", currentFontSize, 365);
}

function jsnInitTemplate()
{
	// Set accessibility preferences
	jsnLoadPrefs();
}

function jsnFinalizeTemplate()
{
	// Save accessibility preferences
	jsnSavePrefs();
}

jsnAddEvent(window, 'load', jsnInitTemplate);
jsnAddEvent(window, 'unload', jsnFinalizeTemplate);