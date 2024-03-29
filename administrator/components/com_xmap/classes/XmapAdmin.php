<?php
/**
 * $Id: XmapAdmin.php 137 2008-04-05 02:30:21Z root $
 * $LastChangedDate: 2008-04-04 20:30:21 -0600 (vie, 04 abr 2008) $
 * $LastChangedBy: root $
 * Xmap by Guillermo Vargas
 * a sitemap component for Joomla! CMS (http://www.joomla.org)
 * Author Website: http://joomla.vargas.co.cr
 * Project License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

class XmapAdmin {
	
	var $config = null;
	
	/** Parses input parameters and calls appropriate function */
	function show( &$config, &$task, &$cid ) {
		$this->config = &$config;
		global $xmapComponentPath;
		switch ($task) {

			case 'save':
				$this->saveOptions( $config );
				break;
			
			case 'cancel':
				global $mainframe;
				$mainframe->redirect( 'index2.php' );
				break;

			case 'uploadfile':
				xmapUploadPlugin();
				break;

			case 'installfromdir':
				xmapInstallPluginFromDirectory();
				break;

			case 'ajax_request':
				include($xmapComponentPath . '/ajaxResponse.php');
				exit; 
				break;
			default:
				$success = JRequest::getVar('success','',"REQUEST");
				$this->showSettingsDialog($success);
				break;
		}
	}

	/** Show settings dialog
	  * @param integer  configuration save success
	  */
	function showSettingsDialog( $success = 0 ) {
		global $mainframe;
		$database = & JFactory::getDBO();


		$menus = $this->getMenus();
		# $this->sortMenus( $menus );
		
		$config = &$this->config;

	
	    // success messages
		switch( $success ) {
	    	case 1:
	    		$lists['msg_success'] = _XMAP_MSG_SET_BACKEDUP;
	    		break;
	    	case 2:
	    		$lists['msg_success'] = _XMAP_ERR_CONF_SAVE;
	    		break;
	    	default:
	    		$lists['msg_success'] =  '';
	    		break;
		}

		$pluginList = '';
		$xmlfile = '';
		loadInstalledPlugins($pluginList,$xmlfile);

		require_once( $mainframe->getPath( 'admin_html' ) );
		XmapAdminHtml::show( $config, $menus, $lists,$pluginList,$xmlfile );
	}

	/** Save settings handed via POST */
	function saveOptions( &$config ) {
		global $mainframe;

		// save css
		$csscontent	= JRequest::getVar('csscontent', '',"POST","STRING",JREQUEST_ALLOWHTML);	// CSS
		$file 		= JPATH_COMPONENT_SITE.DS.'css'.DS.'xmap.css';
		$success	= 1;
	
		$exclude_css	= JRequest::getVar('exclude_css', 0 ,"POST");
		$exclude_xsl	= JRequest::getVar('exclude_xsl', 0 ,"POST");

		$config->exclude_css = $exclude_css;
		$config->exclude_xsl = $exclude_xsl;
		$config->save();

		JFile::write($file, stripslashes( $csscontent ));

		$mainframe->redirect('index2.php?option=com_xmap&success='.$success);
		exit;
	}

	/** 
	* 
	* get the complete list of menus in joomla 
	*/
	function &getMenus() {
		$config = &$this->config;

		require_once( JPATH_ADMINISTRATOR.DS.'components'.DS.'com_menus'.DS.'helpers'.DS.'helper.php' );
		$menutypes  = MenusHelper::getMenuTypeList();

		$allmenus = array();
		$i=0;
		foreach( $menutypes as $menu ) {
			$menutype = $menu->menutype;
			$allmenus[$menutype] = new stdclass;
			$allmenus[$menutype]->ordering = $i;
			$allmenus[$menutype]->show = false;
			$allmenus[$menutype]->showSitemap = false;
			$allmenus[$menutype]->priority = '0.5';
			$allmenus[$menutype]->changefreq = 'weekly';
			$allmenus[$menutype]->id = $i;
			$allmenus[$menutype]->type = $menutype;
			$i++;
		}
		return $allmenus;
	}
}

function loadInstalledPlugins( &$rows,&$xmlfile ) {
	$database = & JFactory::getDBO();


	if (!defined('DOMIT_INCLUDE_PATH') ) {
               	require_once (JPATH_SITE.DS.'libraries'.DS.'domit'.DS.'xml_domit_lite_parser.php');
	}

	$query = "SELECT id, extension, published"
	. "\n FROM #__xmap_ext"
	. "\n WHERE extension not like '%.bak'"
	. "\n ORDER BY extension";

	$database->setQuery( $query );
	$rows = $database->loadObjectList();

	$n = count( $rows );
	for ($i = 0; $i < $n; $i++) {
		$row =& $rows[$i];

		// path to module directory
		$extensionBaseDir = JPATH_COMPONENT_ADMINISTRATOR.DS.'extensions'.DS;

		// xml file for module
		$xmlfile = $extensionBaseDir. $row->extension. ".xml";

		if (file_exists( $xmlfile )) {
			$xmlDoc = new DOMIT_Lite_Document();
			$xmlDoc->resolveErrors( true );
			if (!$xmlDoc->loadXML( $xmlfile, false, true )) {
				continue;
			}

			$root = &$xmlDoc->documentElement;

			if ($root->getTagName() != 'install' && $root->getTagName() != 'mosinstall') {
				continue;
			}
			if ($root->getAttribute( "type" ) != "xmap_ext") {
				continue;
			}


			$element 			= &$root->getElementsByPath( 'name', 1 );
			$row->name		 	= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'creationDate', 1 );
			$row->creationdate 	= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'author', 1 );
			$row->author 		= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'copyright', 1 );
			$row->copyright 	= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'authorEmail', 1 );
			$row->authorEmail 	= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'authorUrl', 1 );
			$row->authorUrl 	= $element ? $element->getText() : '';

			$element 			= &$root->getElementsByPath( 'version', 1 );
			$row->version 		= $element ? $element->getText() : '';
		}else {
			echo "Missing file '$xmlfile'";
		}
	}
}

function showInstalledPlugins( $_option ) {
	$rows = '';
	$xmlfile = '';
	loadInstalledPlugins($rows,$xmlfile);
	XmapAdminHtml::showInstalledModules( $rows, $_option, $xmlfile, $lists );
}

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'classes'.DS.'XmapPluginInstaller.php');
require_once(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_installer'.DS.'models'.DS.'install.php');

function xmapUploadPlugin( ) {

	$lang =& JFactory::getLanguage();
	$lang->load('com_installer',JPATH_ADMINISTRATOR);

	$installerModel = new InstallerModelInstall;

	 // Get an installer instance
	$installer =& JInstaller::getInstance();

	$xmapInstaller = new XmapPluginInstaller($installer);

	/* Fix for a small bug on Joomla on PHP 4 */
	if (version_compare(PHP_VERSION, '5.0.0', '<')) {
                // We use eval to avoid PHP warnings on PHP>=5 versions
                eval("\$installer->setAdapter('xmap_ext',&\$xmapInstaller);");
        }else {
                $installer->setAdapter('xmap_ext',$xmapInstaller);
        }
	$xmapInstaller->parent = &$installer;
	$install->_adapters['xmap_ext'] = &$xmapXinstaller;
	/* End of the fix for PHP <= 4 */

        if ($installerModel->install()) {
		XmapAdminHtml::showInstallMessage(_XMAP_EXT_INSTALLED_MSG, '', 'index.php?option=com_xmap');
        } else {
		XmapAdminHtml::showInstallFailedMessage(_XMAP_EXT_INSTALLED_MSG, '', 'index.php?option=com_xmap');
	}
}

function xmapInstallPluginFromDirectory() {
	return xmapUploadPlugin();
}


/**
*
* @param
*/
function xmapUninstallPlugin( $extensionid ) {
	require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'classes'.DS.'XmapPluginInstaller.php');
	// Get an installer instance
	$installer =& JInstaller::getInstance();
	$xmapInstaller = new XmapPluginInstaller($installer);
	$installer->setAdapter('xmap_ext',$xmapInstaller);
	$result = false;
	if ($extensionid) {
		$result = $installer->uninstall('xmap_ext', $extensionid );
	}

	if (!$result) {
		echo $installer->getError();
	}
	return $result;
}
