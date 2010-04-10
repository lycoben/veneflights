<?php
/**
* Joomla/Mambo Community Builder : Plugin Handler
* @version $Id: plugin.class.php 610 2006-12-13 17:33:44Z beat $
* @package Community Builder
* @subpackage plugin.class.php
* @author various, JoomlaJoe and Beat
* @copyright (C) JoomlaJoe and Beat, www.joomlapolis.com and various
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL version 2
*/

// ensure this file is being included by a parent file
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

/**
 * CB framework
 * @global CBframework $_CB_framework
 */
global $_CB_framework;
global $mainframe;
// modified by recly

/** utility: adds all vars of object $src to object $obj except the variable named in array exclude Array */
function addVarsToClass( &$obj, $src, $excludeArray ) {
	foreach( get_object_vars( $src ) as $key => $val ) {
		if ( ! in_array( $key, $excludeArray ) ) {
			$obj->$key	=	$val;
		}
	}	
}

class cbPluginHandler {
	/** @var array An array of functions in event groups */
	var $_events		=	null;
	/** @var array An array of classes and pluginids for field-types */
	var $_fieldTypes	=	array();
	/** @var array An array of classes for additional field-parameters */
	var $_fieldParams	=	array();
	/** @var array An array of menu and status items (array) */
	var $_menus			=	null;
	/** @var array An array of lists */
	var $_lists			=	null;
	/** @var array An array of loaded plugins objects, index=pluginId */
	var $_plugins		=	array();
	/** @var array An array indexed by the group-name of arrays of plugin ids of the plugins already loaded containing stdClass objects of the plugin table entry */
	var $_pluginGroups	=	array();
	/** @var int Index of the plugin being loaded */
	var $_loading		=	null;
	/** @var array collection of debug data */
	var $debugMSG		=	array();
	/** @var string Error Message*/
	var $errorMSG		=	array();
	var $_iserror		=	false;
	var $params			=	null;	
	
	/**
	* Constructor
	*/
	function cbPluginHandler() {
		$this->_events = array();
	}
	/**
	* Loads all the bot files for a particular group (if group not already loaded)
	* @param string The group name, relates to the sub-directory in the plugins directory
	* @param mixed array of int : ids of plugins to load. OR: string : name of class 
	* @param int if 1 (DEFAULT): load only published plugins, if 0: load all plugins including unpublished ones
	* @return boolean TRUE: load done, FALSE: no plugin loaded
	*/
	function loadPluginGroup( $group, $ids = null, $publishedStatus = 1 ) {
		global $_CB_framework, $_CB_database;

		static $dbCache		=	null;

		$this->_iserror		=	false;
		$group				=	trim( $group );
		if ( ( $group && ! isset( $this->_pluginGroups[$group] ) ) || ( ! $this->all_in_array_key( $ids, $this->_plugins ) ) ) {

			$cmsAccess		=	$_CB_framework->myCmsGid();

			if ( ! isset( $dbCache[$publishedStatus][$cmsAccess][$group] ) ) {
				$where			=	array();

				if ( $publishedStatus == 1 ) {
					$where[]	=	'published = 1';
				} else {
					$where[]	=	'published >= ' . (int) $publishedStatus;
				}

				$where[]		=	'access <= '. (int) $cmsAccess;

				if ( $group ) {
					$where[]	=	'type = ' . $_CB_database->Quote( trim ( $group ) );
				}
/*	
				if ( ( $ids !== null ) && ( count( $ids ) > 0 ) ) {
					cbArrayToInts( $ids );
					if ( count( $ids ) == 1 ) {
						$where[]	=	'id = ' . implode( '', $ids );
					} else {
						$where[]	=	'id IN (' . implode( ',', $ids ) . ')';
					}
				}
*/
				$_CB_database->setQuery( "SELECT id, folder, element, published, type, params, CONCAT_WS('/',folder,element) AS lookup, name"
				. "\n FROM #__comprofiler_plugin"
				. "\n WHERE " . implode( ' AND ', $where )
				. "\n ORDER BY ordering"
				);
				$dbCache[$publishedStatus][$cmsAccess][$group]		=	$_CB_database->loadObjectList();
				if ( $dbCache[$publishedStatus][$cmsAccess][$group] === null ) {
					return false;
				}
			}
			if ( count( $ids ) == 0 ) {
				$ids			=	null;
			}
			foreach ( $dbCache[$publishedStatus][$cmsAccess][$group] AS $plugin ) {
				if ( ( $ids === null ) || in_array( $plugin->id, $ids ) ) {
					if ( ( ! isset( $this->_plugins[$plugin->id] ) ) && $this->_loadPluginFile( $plugin ) ) {
						$this->_plugins[$plugin->id]							=	$plugin;
						if ( ! isset( $this->_pluginGroups[$plugin->type][$plugin->id] ) ) {
							$this->_pluginGroups[$plugin->type][$plugin->id]	=&	$this->_plugins[$plugin->id];
						}
					}
				}
			}
		}
		return true;
	}
	/**
	 * Returns array of plugins which got loaded through loadPluginGroup method for that $group
	 * Returns empty array() if none is loaded.
	 *
	 * @param  string  $group
	 * @return array           keyed array ( pluginid => plugin row ( + lookup = path to plugin files
	 */
	function & getLoadedPluginGroup( $group ) {
		if ( isset( $this->_pluginGroups[$group] ) ) {
			return $this->_pluginGroups[$group];
		} else {
			$array	=	array();
			return $array;
		}
	}
	/** utility: checks if all elements of array needles are in array haystack */
	function all_in_array($needles,$haystack) {
		if (is_array($needles)) {
			foreach ($needles as $needle) {
				if (!in_array($needle,$haystack)) return false;
			}
		} else {
			if (!in_array($needles,$haystack)) return false;
		}
		return true;
	}
	/** utility: checks if all elements of array needles are in array haystack */
	function all_in_array_key($needles,$haystack) {
		if (is_array($needles)) {
			foreach ($needles as $needle) {
				if (!array_key_exists($needle,$haystack)) return false;
			}
		} else {
			if (!array_key_exists($needles,$haystack)) return false;
		}
		return true;
	}
	function _setLoading( $plugin, $loading = true ) {
		$savePreviousPluginId				=	$this->_loading;
		if ( $loading === true ) {
			$this->_loading					=	$plugin->id;
		} elseif ( $loading === false) {
			$this->_loading					=	null;
		} else {
			$this->_loading					=	$loading;
		}
		return $savePreviousPluginId;
	}
	function _loadPluginFile($plugin) {
		global $_CB_framework, $_PLUGINS;
		
		$path	=	$_CB_framework->getCfg('absolute_path') . '/components/com_comprofiler/plugin/' . $plugin->type . '/'. $plugin->folder . '/' . $plugin->element . '.php';
		if ( file_exists( $path ) && is_readable( $path ) ) {
			$savePreviousPluginId			=	$this->_setLoading( $plugin, true );
			require_once( $path );
			$this->_setLoading( $plugin, $savePreviousPluginId );
			return true;
		} else {
			return false;
		}
	}
	function getPluginId( ) {
		global $_PLUGINS;
		return $_PLUGINS->_loading;
	}
	function & getPluginObject( $pluginId = null ) {
		global $_PLUGINS;
		if ( $pluginId === null ) {
			$pluginId	=	$_PLUGINS->_loading;
		}
		return $_PLUGINS->_plugins[$pluginId];
	}
	function & getInstanceOfPluginClass( $class, $pluginId = null ) {
		global $_PLUGINS;
		if ( $pluginId === null ) {
			$pluginId	=	$_PLUGINS->_loading;
		}

		if ( ! isset( $this->_plugins[$pluginId]->classInstance[$class] ) ) {
			if ( ! isset( $this->_plugins[$pluginId]->classInstance ) ) {
				$this->_plugins[$pluginId]->classInstance						=	array();
			}
			$this->_plugins[$pluginId]->classInstance[$class]					=	new $class();
			$this->_plugins[$pluginId]->classInstance[$class]->_cbpluginid		=	$pluginId;
		}

		return $this->_plugins[$pluginId]->classInstance[$class];
	}
	/**
	* Gets a variable from the plugin class
	* @param int id of plugin
	* @param string name of plugin class
	* @param string name of class variable
	* @return mixed : variable's content
	*/
	function getVar($pluginId, $class, $variable) {
		if ($class!=null && class_exists($class) && isset( $this->_plugins[$pluginId] ) ) {
			if ($this->_plugins[$pluginId]->published) {
				if (isset( $this->_plugins[$pluginId]->classInstance[$class]->$variable )) {
					return $this->_plugins[$pluginId]->classInstance[$class]->$variable;
				} 
			}
		}
		return false;
	}
	function getPluginPath() {
		global $_CB_framework, $_PLUGINS;

		// $plugin	=	$_PLUGINS->_pluginGroups[$this->type][$this->_cbpluginid];	//TBD: check for multiple classes per plugin ??? + getPluginCLass/vs. getTabCLass
		$plugin		=&	$_PLUGINS->_plugins[$this->_cbpluginid];					//TBD: remove those vars from here and make this function available to API
		$path		=	$_CB_framework->getCfg('absolute_path') . '/components/com_comprofiler/plugin/' . $plugin->type . '/'. $plugin->folder;
		return $path;
	}
	function getPluginLIvePath() {
		global $_CB_framework, $_PLUGINS;

		// $plugin	=	$_PLUGINS->_pluginGroups[$this->type][$this->_cbpluginid];	//TBD: check for multiple classes per plugin ??? + getPluginCLass/vs. getTabCLass
		$plugin		=&	$_PLUGINS->_plugins[$this->_cbpluginid];					//TBD: remove those vars from here and make this function available to API
		$path		=	$_CB_framework->getCfg('live_site') . '/components/com_comprofiler/plugin/' . $plugin->type . '/'. $plugin->folder;
		return $path;
	}
	function _loadParams($pluginId, $extraParams=null) {
		global $_PLUGINS;
		$this->params	=	new cbParamsBase($_PLUGINS->_plugins[$pluginId]->params . "\n" . $extraParams);	
	}
	function & getParams() {
		return $this->params;
	}
	function getXml( $type = null, $typeValue = null ) {
		return null;		// override if needed
	}

	/**
	 * FIELDS PLUGINS MANAGEMENT: through $_PLUGINS only:
	 */

	/**
	* Registers a field type which can be used by users
	*
	* @param array $typesArray  array of string of the names of types of fields
	* @param int   $pluginId    for CB internal plugin installer use ONLY: id of plugin to associate with field type
	*/
	function registerUserFieldTypes( $typesArray, $pluginId = null ) {
		if ( $pluginId === null ) {
			$pluginId					=	$this->_loading;
		}
		foreach ( $typesArray as $type => $class ) {
			$this->_fieldTypes[$type]	=	array( $class, $pluginId );
		}
	}
	/**
	 * Returns array of field types
	 *
	 * @return array of string  Names of types registered
	 */
	function getUserFieldTypes( ) {
		return array_keys( $this->_fieldTypes );
	}
	/**
	 * Returns array of field types
	 *
	 * @param  string $fieldType  Type of field
	 * @return array of string    Names of types registered
	 */
	function getUserFieldPluginId( $fieldType ) {
		if (isset( $this->_fieldTypes[$fieldType] ) ) {
			return $this->_fieldTypes[$fieldType][1];
		}
		return null;
	}
	/**
	* Calls a function of a field type
	*
	* @param  string $fieldType  Type of field
	* @param  string $method     Method to call
	* @param  array  $args       An array of arguments
	* @return mixed  result of function call or NULL if non-existant
	*/
	function callField( $fieldType, $method, $args = null, &$field ) {
		$result = null;

		if ($args === null) {
			$args		=	array();
		}
		if ( isset( $this->_fieldTypes[$fieldType] ) ) {
			$result		=	$this->call( $this->_fieldTypes[$fieldType][1], $method, $this->_fieldTypes[$fieldType][0], $args );
		}
		return $result;
	}
	/**
	* Registers field params for fields
	* 
	* @param  $class  name of class if overriding core class cbFieldParamsHandler which then needs to be extended.
	*/
	function registerUserFieldParams( $class = null ) {
		$pluginId							=	$this->_loading;
		if ( $class === null ) {
			$class							=	'cbFieldParamsHandler';
		}
		$this->_fieldParams[$pluginId]		=	$class;
	}
	/**
	 * Returns array of field types
	 *
	 * @return array of string  pluginid => Names of class
	 */
	function getUserFieldParamsPluginIds( ) {
		return $this->_fieldParams;
	}

	/**
	 * MENU MANAGEMENT:
	 */

	/**
	 * Adds a menu
	 * @access private
	 * 
	 * @param unknown_type $menuItem
	 */
	function _internalPLUGINSaddMenu( $menuItem ) {
		$this->_menus[]	=	$menuItem;
	}
	/**
	* Registers a menu or status item to a particular menu position
	* 
	* @param array a menu item like:
		// Test example:
		$mi = array(); $mi["_UE_MENU_CONNECTIONS"]["duplique"]=null;
		$this->addMenu( array(	"position"	=> "menuBar" ,		// "menuBar", "menuList"
									"arrayPos"	=> $mi ,
									"caption"	=> _UE_MENU_MANAGEMYCONNECTIONS ,
									"url"		=> cbSef($ue_manageConnection_url) ,		// can also be "<a ....>" or "javascript:void(0)" or ""
									"target"	=> "" ,	// e.g. "_blank"
									"img"		=> null ,	// e.g. "<img src='plugins/user/myplugin/images/icon.gif' width='16' height='16' alt='' />"
									"alt"		=> null ,	// e.g. "text"
									"tooltip"	=> _UE_MENU_MANAGEMYCONNECTIONS_DESC ,
									"keystroke"	=> null ) );	// e.g. "P"
		// Test example: Member Since:
		$mi = array(); $mi["_UE_MENU_STATUS"]["_UE_MEMBERSINCE"]["dupl"]=null;
		$dat = cbFormatDate($user->registerDate);
		if (!$dat) $dat="?";
		$this->addMenu( array(	"position"	=> "menuList" ,		// "menuBar", "menuList"
									"arrayPos"	=> $mi ,
									"caption"	=> $dat ,
									"url"		=> "" ,		// can also be "<a ....>" or "javascript:void(0)" or ""
									"target"	=> "" ,	// e.g. "_blank"
									"img"		=> null ,	// e.g. "<img src='plugins/user/myplugin/images/icon.gif' width='16' height='16' alt='' />"
									"alt"		=> null ,	// e.g. "text"
									"tooltip"	=> _UE_MEMBERSINCE_DESC ,
									"keystroke"	=> null ) );	// e.g. "P"
	*/
	function addMenu( $menuItem ) {
		global $_PLUGINS;
			$_PLUGINS->_internalPLUGINSaddMenu($menuItem);
	}
	/**
	* Returns all menu items registered with addMenu
	* @param string The event name
	* @param string The function name
	*/
	function getMenus() {
		return $this->_menus;
	}

	/**
	 * EVENTS AND TRIGGERS METHODS:
	 */

	/**
	* Registers a function to a particular event group
	* @param string The event name
	* @param string The function name
	*/
	function registerFunction( $event, $method, $class=null ) {
		$this->_events[$event][] = array( $class,$method, $this->_loading );
	}
	/**
	* Calls all functions associated with an event group
	* @param string The event name
	* @param array An array of arguments
	* @return array An array of results from each function call
	*/
	function trigger( $event, $args=null ) {
		$result				=	array();

		if ($args === null) {
			$args			=	array();
		}
		if (isset( $this->_events[$event] ) ) {
			foreach ($this->_events[$event] as $func) {
				$result[]	=	$this->call($func[2],$func[1],$func[0],$args);
			}
		}
		return $result;
	}
	function is_errors() {
		return $this->_iserror;
	}
	/**
	* Execute the plugin class/method pair
	* @param int id of plugin
	* @param string name of plugin variable
	* @param mixed value to assign (if any)
	* @return mixed : previous value
	*/
	function plugVarValue($pluginid, $var, $value=null) {
		$preValue								=	$this->_plugins[$pluginid]->$var;
		if ( $value !== null ) {
			$this->_plugins[$pluginid]->$var	=	$value;
		}
		return $preValue;
	}
	/**
	* Execute the plugin class/method pair
	* @param $pluginid int id of plugin
	* @param $method string name of plugin method
	* @param $class string name of plugin class
	* @param $args array set of variables to path to class/method
	* @param $extraParams string additional parameters external to plugin params (e.g. tab params)
	* @return mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function call( $pluginid, $method, $class, &$args, $extraParams = null, $ignorePublishedStatus = false ) {
		if ( $class != null && class_exists( $class ) ) {
			if ( $this->_plugins[$pluginid]->published || $ignorePublishedStatus ) {

				$pluginClassInstance				=&	$this->getInstanceOfPluginClass( $class, $pluginid );
				if (method_exists( $pluginClassInstance, $method )) {
					$pluginClassInstance->_loadParams( $pluginid, $extraParams );
//BB1.2b7: really needed to have plugin row in tab and field classes called ???	element below should be enough:				addVarsToClass($pluginClassInstance, $this->_plugins[$pluginid], array( 'params', 'classinstance' ));
					$pluginClassInstance->element	=	$this->_plugins[$pluginid]->element;	// needed for _getPrefix for _getReqParam & co
					$savePreviousPluginId			=	$this->_loading;
					$this->_loading					=	$pluginid;
					$ret							=	call_user_func_array( array( &$pluginClassInstance, $method ), $args );
					$this->_loading					=	$savePreviousPluginId;
					return $ret;
				}
			}
		} elseif (function_exists( $method )) {
			if ( $this->_plugins[$pluginid]->published || $ignorePublishedStatus ) {
				$this->_loadParams($pluginid, $extraParams);

				$savePreviousPluginId				=	$this->_loading;
				$this->_loading						=	$pluginid;
				$ret								=	call_user_func_array( $method, $args );
				$this->_loading						=	$savePreviousPluginId;
				return $ret;
			} 
		}
		return false;
	}

	/**
	* PRIVATE method: sets the text of the last error
	* @access private
	*
	* @param  string   $msg   error message
	* @return boolean         true
	*/
	function _setErrorMSG( $msg ) {
		$this->errorMSG[]	=	$msg;
		return true;
	}
	/**
	* Gets the text of the last error:
	* $separator == FALSE:  always returns array
	* $separator is string: returns null or string of errors
	*
	* @param  string|boolean  $separator   FALSE: return array, STRING: Separator between the errors which are imploded from array
	* @return string|array                 Text for error message or array of texts of error messages.
	*/
	function getErrorMSG( $separator = "\n" ) {
		if ( $separator === false ) {
			return $this->errorMSG;
		} else {
			$error		=	null;
			if ( count( $this->errorMSG ) > 0 ) {
				$error	=	implode( $separator, $this->errorMSG );
			}
			return $error;
		}
	}
	/**
	* PRIVATE method: sets the error condition and priority (for now 0)
	* @param error priority
	* @return boolean true
	*/	
	function raiseError($priority) {
		$this->_iserror=true;	
		return true;
	}
	
	/**
	* Gets the debug text
	* @returns string text for debug
	*/
	function getDebugMSG() {
		return $this->debugMSG;
	}
	/**
	* PRIVATE method: sets the text of the last error
	* @returns void
	*/
	function _setDebugMSG($method,$msg) {
		$debugARRAY=array();
		$debugARRAY['class']=get_class($this);
		$debugARRAY['method']=$method;
		$debugARRAY['msg']=$msg;
		$this->debugMSG[]=$debugARRAY;
		return true;
	}

	/**
	 * XML LOAD AND ACCESS METHOD:
	 */

	/**
	 * xml file for plugin
	 *
	 * @param  string             $actionType
	 * @param  string             $action
	 * @param  int                $pluginId
	 * @return CBSimpleXMLElement
	 */
	function & loadPluginXML( $actionType, $action, $pluginId = null ) {
		global $_CB_framework;

		static $cache						=	array();

		cbimport('cb.xml.simplexml');

		$row								=&	$this->getPluginObject( $pluginId );
		$xmlString							=	null;

		if ( $row ) {
			// security sanitization to disable use of `/`, `\\` and `:` in $action variable
			$unsecureChars					=	array( '/', '\\', ':', ';', '{', '}', '(', ')', "\"", "'", '.', ',', "\0", ' ', "\t", "\n", "\r", "\x0B" );
			$classname						=	'CBplug_' . strtolower( substr( str_replace( $unsecureChars, '', $row->element ), 0, 32 ) );
			$action_cleaned					=				strtolower( substr( str_replace( $unsecureChars, '', $action ),		  0, 32 ) );
			
			if ( isset( $cache[$classname][$actionType][$action_cleaned] ) ) {
				return $cache[$classname][$actionType][$action_cleaned];
			}

			if ( class_exists( $classname ) ) {
				// class CBplug_pluginname exists:
				if ( ( $_CB_framework->getUi() == 2 ) && is_callable( array( $classname, 'loadAdmin' ) ) ) {
					// function loadAdmin exists:
					$array					=	array();
					$this->call( $row->id, 'loadAdmin', $classname, $array, null, true );
				}
				// $xmlString	=	$pluginClass->getXml( 'action', $action_cleaned );
				$array		=	array( $actionType, $action_cleaned );
				$xmlString	=	$this->call( $row->id, 'getXml', $classname, $array, null, true );
				if ( $xmlString ) {
					$cache[$classname][$actionType][$action_cleaned]	=&	new CBSimpleXMLElement( $xmlString );
					return $cache[$classname][$actionType][$action_cleaned];
				}
			}

			if ( $action_cleaned ) {
				// try action-specific file: xml/edit.actiontype.xml :
				$xmlfile	=	$_CB_framework->getCfg('absolute_path') . '/components/com_comprofiler/plugin/' .$row->type . '/'.$row->folder . '/xml/edit.' . $actionType . '.' . $action_cleaned .'.xml';
				if ( file_exists( $xmlfile ) ) {
					$cache[$classname][$actionType][$action_cleaned]	=&	new CBSimpleXMLElement( trim( file_get_contents( $xmlfile ) ) );
					return $cache[$classname][$actionType][$action_cleaned];
				}
			}
			// try specific file for after installations: xml/edit.plugin.xml :
			$xmlfile		=	$_CB_framework->getCfg('absolute_path') . '/components/com_comprofiler/plugin/' . $row->type . '/' . $row->folder . '/xml/edit.plugin.xml';
			if ( file_exists( $xmlfile ) ) {
				$cache[$classname][$actionType][$action_cleaned]		=&	new CBSimpleXMLElement( trim( file_get_contents( $xmlfile ) ) );
				return $cache[$classname][$actionType][$action_cleaned];
			}

			// try plugin installation file:
			$xmlfile		=	$_CB_framework->getCfg('absolute_path') . '/components/com_comprofiler/plugin/' . $row->type . '/' . $row->folder . '/' . $row->element . '.xml';
			if ( isset( $cache[$xmlfile] ) ) {
				return $cache[$xmlfile];
			} else {
				if ( file_exists( $xmlfile ) ) {
					$cache[$xmlfile]		=&	new CBSimpleXMLElement( trim( file_get_contents( $xmlfile ) ) );
					return $cache[$xmlfile];
				}
			}
			$row->description				=	'<b><font style="color:red;">Plugin not installed</font></b>';
		}
		$element							=	null;
		return $element;
	}

}	// end class cbPluginHandler

/**
* Event Class for handling the CB event api
* @package Community Builder
* @author JoomlaJoe
*/
class cbEventHandler extends cbPluginHandler  {

	/**
	* Constructor
	*/
	function cbEventHandler() {
		$this->cbPluginHandler();
	}
}

/**
* Field Class for handling the CB field api
* @package Community Builder
* @author Beat
*/
class cbFieldHandler extends cbPluginHandler  {
	/** Plugin of this field
	 * @var moscomprofilerPlugin */
	var $_plugin	=	null;
	/** XML of the Plugin of this field
	 * @var CBSimpleXMLElement */
	var $_xml		=	null;
	/** XML of this field
	 * @var CBSimpleXMLElement */
	var $_fieldXml	=	null;
	/**
	* Constructor
	*/
	function cbFieldHandler() {
		$this->cbPluginHandler();
	}
	/**
	 * Overridable methods:
	 */
	/**
	 * Initializer:
	 * Puts the default value of $field into $user (for registration or new user in backend)
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $reason      'profile' for user profile view and edit, 'register' for registration
	 */
	function initFieldToDefault( &$field, &$user, $reason ) {
		foreach ( $field->getTableColumns() as $col ) {
			$user->$col							=	$field->default;
		}
	}
	/**
	 * Formatter:
	 * Returns a field in specified format
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $output      'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @param  string                $formatting  'tr', 'td', 'div', 'span', 'none',   'table'??
	 * @param  string                $reason      'profile' for user profile view and edit, 'register' for registration, 'search' for searches
	 * @return mixed                
	 */
	function getFieldRow( &$field, &$user, $output, $formatting, $reason ) {
		global $ueConfig, $_CB_OneTwoRowsStyleToggle;

		$results									=	null;
		$oValue										=	$this->getField( $field, $user, $output, $reason );

		if ( ( ! ( $oValue != null || trim($oValue) != '' ) )
			&& ( $output == 'html' )
			&& isset( $ueConfig['showEmptyFields'] ) && ( $ueConfig['showEmptyFields'] == 1 )
			&& ( $reason != 'search' )
			&& ( $field->displaytitle == 1 )
			)
		{
			$oValue									=	cbReplaceVars( $ueConfig['emptyFieldsText'], $user );
		}

		if ( $oValue != null || trim($oValue) != '' ) {
			if ( cbStartOfStringMatch( $output, 'html' ) ) {
				switch ( $formatting ) {
					case 'table':
						// ?
						break;
		
					case 'tr':
						$class 						=	'sectiontableentry' . $_CB_OneTwoRowsStyleToggle;
						$_CB_OneTwoRowsStyleToggle	=	( $_CB_OneTwoRowsStyleToggle == 1 ? 2 : 1 );
						$results					.=	"\n\t\t\t\t<tr class=\"" . $class. '" id="cbfr_' . $field->fieldid . '">';
						$colspan					=	( ( $field->profile == 2 ) ? ' colspan="2"' : '' );
						if ( ( $field->displaytitle === null ) || ( $field->displaytitle == 1 ) || ( $output == 'htmledit' ) ) {
							$translatedTitle		=	$this->getFieldTitle( $field, $user, $output, $reason );
							if ( trim( $translatedTitle ) == '' ) {
								$colspan			=	' colspan="2"';		// CB 1.0-1.1 backwards compatibility
							}
						} else {
							$translatedTitle		=	'';
						}
						if( trim( $translatedTitle ) != '' ) {
							$results				.=	"\n\t\t\t\t\t<td class=\"titleCell\"" . $colspan .'>'
													.	( ( $field->displaytitle != -1 ) ? '<label for="' . ( $output == 'htmledit' ? htmlspecialchars( $field->name ) : 'cbfl_' . $field->fieldid ) . '">' : '' )
													.	$translatedTitle
													.	':'
													.	( ( $field->displaytitle != -1 ) ? '</label>' : '' )
													.   '<br />'// modified by recly
													.   $oValue
													.	'</td>';
							if ( $field->profile == 2 ) {
								$results			.=	"\n\t\t\t\t</tr>"
													.	"\n\t\t\t\t<tr class=\"" . $class . '">';
							}
						}
						//$results					.=	"\n\t\t\t\t\t<td" . $colspan . ' class="fieldCell" id="cbfv_' . $field->fieldid . '">' . $oValue . '</td>';
						$results					.=	"\n\t\t\t\t</tr>";
						break;
	
					case 'td':
						$results					.=	"\n\t\t\t\t\t" . '<td class="fieldCell" id="cbfv_' . $field->fieldid . '">' . $oValue . '</td>';
						break;
	
					case 'div':
						$class 						=	'sectiontableentry' . $_CB_OneTwoRowsStyleToggle;
						$_CB_OneTwoRowsStyleToggle	=	( $_CB_OneTwoRowsStyleToggle == 1 ? 2 : 1 );
						$translatedTitle			=	$this->getFieldTitle( $field, $user, $output, $reason );
						$results					.=	"\n\t\t\t\t"
													.	'<div class="' . $class . ' cb_form_line cbclearboth" id="cbfr_' . $field->fieldid . '">';
						if ( trim( $translatedTitle ) != '' ) {
							$results				.=	( ( $field->displaytitle != -1 ) ? '<label for="' . ( $output == 'htmledit' ? htmlspecialchars( $field->name ) : 'cbfv_' . $field->fieldid ) . '">' : '' )
													.	$translatedTitle
													.	':'
													.	( ( $field->displaytitle != -1 ) ? '</label>' : '' )
													;
						}
						$results					.=	'<div class="cb_field"><div id="cbfv_' . $field->fieldid . '">'
													.	$oValue
													.	'</div>'
													//	<div class="cb_result_container"><div id="checkemail__Response">&nbsp;</div></div>	// space for AJAX reply
													.	'</div></div>'
													;
						break;
		
					case 'span':
						$results					.=	'<span class="cb_field"><span id="cbfv_' . $field->fieldid . '">'
													.	$oValue
													.	'</span></span>';
						break;
		
					case 'none':
						$results					=	$oValue;
						break;
		
					default:
						$results					=	'*' . $oValue . '*';
						break;
				}
			} else {
				$results							=	$oValue;
			}
		}
		return $results;
	}

	/**
	 * Accessor:
	 * Returns a field in specified format
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $output  'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @param  string                $reason  'profile' for user profile view and edit, 'register' for registration, 'list' for user-lists
	 * @return mixed
	 */
	function getField( &$field, &$user, $output, $reason ) {
		$valuesArray							=	array();
		foreach ( $field->getTableColumns() as $col ) {
			$valuesArray[]						=	$user->get( $col );
		}
		$value									=	implode( ', ', $valuesArray );

		switch ( $output ) {
			case 'html':
			case 'rss':
				return $this->_formatFieldOutput( $field->name, $value, $output, true );
			case 'htmledit':
				if ( $reason == 'search' ) {
					return	$this->_fieldSearchModeHtml( $field, $user, $this->_fieldEditToHtml( $field, $user, $reason, 'input', $field->type, $value, '' ), 'text' );
				} else {
					return $this->_fieldEditToHtml( $field, $user, $reason, 'input', $field->type, $value, '' );
				}
				break;

			default:
				return $this->_formatFieldOutput( $field->name, $value, $output, false );
				break;
		}
	}
	/**
	 * Labeller for title:
	 * Returns a field title
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $output  'text' or: 'html', 'htmledit', (later 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist')
	 * @param  string                $reason  'profile' for user profile view and edit, 'register' for registration, 'list' for user-lists
	 * @return string
	 */
	function getFieldTitle( &$field, &$user, $output, $reason ) {
		if ( $output === 'text' ) {
			return strip_tags( cbReplaceVars( $field->title, $user ) );
		} else {
			return cbReplaceVars( $field->title, $user );
		}
	}
	/**
	 * Labeller for description:
	 * Returns a field title
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $output  'text' or: 'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @param  string                $reason  'profile' for user profile view and edit, 'register' for registration, 'list' for user-lists
	 * @return string
	 */
	function getFieldDescription( &$field, &$user, $output, $reason ) {
		if ( $output === 'text' ) {
			return strip_tags( cbReplaceVars( $field->description, $user ) );
		} elseif ( $output === 'htmledit' ) {
			return cbReplaceVars( $field->description, $user );
		} else {
			return null;
		}
	}
	/**
	 * Mutator:
	 * Prepares field data for saving to database (safe transfer from $postdata to $user)
	 * Override
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user      RETURNED populated: touch only variables related to saving this field (also when not validating for showing re-edit)
	 * @param  array                 $postdata  Typically $_POST (but not necessarily), filtering required.
	 * @param  string                $reason    'profile' for save user edit, 'register' for save registration
	 * @return boolean                          True: All fields have validated, False: Some fields didn't validate
	 */
	function prepareFieldDataSave( &$field, &$user, &$postdata, $reason ) {
		$this->_prepareFieldMetaSave( $field, $user, $postdata, $reason );
		foreach ( $field->getTableColumns() as $col ) {
			$value						=	cbGetParam( $postdata, $col );
			if ( ( $value !== null ) && ! is_array( $value ) ) {
				$value					=	stripslashes( $value );
				$this->validate( $field, $user, $col, $value, $postdata, $reason );
				$user->$col				=	$value;
			}
		}
		return true;				//TBD: validation
	}
	/**
	 * Validator:
	 * Validates $value for $field->required and other rules
	 * Override
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user        RETURNED populated: touch only variables related to saving this field (also when not validating for showing re-edit)
	 * @param  string                $columnName  Column to validate
	 * @param  string                $value       (RETURNED:) Value to validate, Returned Modified if needed !
	 * @param  array                 $postdata    Typically $_POST (but not necessarily), filtering required.
	 * @param  string                $reason      'profile' for save user edit, 'register' for save registration
	 * @return boolean                            True if validate, $this->_setErrorMSG if False
	 */
	function validate( &$field, &$user, $columnName, &$value, &$postdata, $reason ) {
		global $_CB_framework, $ueConfig;

		if ( ( $_CB_framework->getUi() == 1 ) || ( ( $_CB_framework->getUi() == 2 ) && ( $ueConfig['adminrequiredfields'] == 1 ) ) ) {

			// Required field:
			if ( ( $field->required == 1 ) && ( $value == '' ) ) {
				$this->_setValidationError( $field, $user, $reason, unHtmlspecialchars(_UE_REQUIRED_ERROR) );
				return false;
			}

			$len						=	strlen( $value );

			// Minimum field length:
			if ( $field->name == 'password' ) {
				$defaultMin				=	6;
			} elseif ( $field->name == 'username' ) {
				$defaultMin				=	3;
			} else {
				$defaultMin				=	0;
			}
			$fieldMinLength				=	$field->params->get( 'fieldMinLength', $defaultMin );

			if ( ( $len > 0 ) && ( $len < $fieldMinLength ) ) {
				$this->_setValidationError( $field, $user, $reason, sprintf( _UE_VALID_MIN_LENGTH, $this->getFieldTitle( $field, $user, 'text', $reason ), $fieldMinLength, $len ) );
				return false;
			}

			// Maximum field length:
			$fieldMaxLength				=	$field->maxlength;
			if ( $fieldMaxLength && ( $len > $fieldMaxLength ) ) {
				$this->_setValidationError( $field, $user, $reason, sprintf( _UE_VALID_MAX_LENGTH, $this->getFieldTitle( $field, $user, 'text', $reason ), $fieldMaxLength, $len ) );
				return false;
			}

			// Bad words:
			if ( ( $reason == 'register' ) && ( in_array( $field->type, array( 'emailaddress', 'primaryemailaddress', 'textarea', 'text', 'webaddress', 'predefined' ) ) ) ) {
				$defaultForbidden		=	'http:,https:,mailto:,//.[url],<a,</a>,&#';
			} else {
				$defaultForbidden		=	'';
			}
			$forbiddenContent			=	$field->params->get( 'fieldValidateForbiddenList_' . $reason, $defaultForbidden );
			if ( $forbiddenContent != '' ) {
				$forbiddenContent		=	explode( ',', $forbiddenContent );
				$replaced				=	str_replace( $forbiddenContent, '', $value );
				if ( $replaced != $value ) {
					$this->_setValidationError( $field, $user, $reason, _UE_INPUT_VALUE_NOT_ALLOWED );
					return false;
				}
			}
		}
		return true;
	}
	/**
	 * Finder:
	 * Prepares field data for saving to database (safe transfer from $postdata to $user)
	 * Override
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $searchVals  RETURNED populated: touch only variables related to saving this field (also when not validating for showing re-edit)
	 * @param  array                 $postdata    Typically $_POST (but not necessarily), filtering required.
	 * @param  string                $reason      'profile' for save user edit, 'register' for save registration
	 * @return boolean                            True: All fields have validated, False: Some fields didn't validate
	 */
	function bindSearchCriteria( &$field, &$searchVals, &$postdata, $reason ) {
		$query							=	array();
		$searchMode						=	$this->_bindSearchMode( $field, $searchVals, $postdata );
		if ( $searchMode ) {
			foreach ( $field->getTableColumns() as $col ) {
				$value					=	cbGetParam( $postdata, $col );
				if ( ( $value !== null ) && ( $value !== '' ) && ! is_array( $value ) ) {
					$value				=	stripslashes( $value );
					$searchVals->$col	=	$value;
					// $this->validate( $field, $user, $col, $value, $postdata, $reason );
					$sql				=	new cbSqlQueryPart();
					$sql->tag			=	'column';
					$sql->name			=	$col;
					$sql->table			=	$field->table;
					$sql->type			=	'sql:field';
					$sql->operator		=	'=';
					$sql->value			=	$value;
					$sql->valuetype		=	'const:string';
					$sql->searchmode	=	$searchMode;
					$query[]			=	$sql;
				}
			}
		}
		return $query;
	}
	/**
	 * Returns a field in specified format
	 *
	 * @param  moscomprofilerField  $field
	 * @param  moscomprofilerUser   $user
	 * @param  string               $output  NO 'htmledit' BUT: 'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @param  boolean              $htmlspecialchars  TRUE: escape for display, FALSE: not escaped will display raw.
	 * @return mixed                
	 */
	function _formatFieldOutput( $name, $value, $output, $htmlspecialchars = true ) {

		switch ( $output ) {
			case 'html':
			case 'rss':
			case 'htmledit':
				if ( $htmlspecialchars ) {
					return htmlspecialchars( $value );
				} else {
					return $value;
				}
				break;

			case 'xml':
				if ( $htmlspecialchars ) {
					return '<' . $name . '>' . htmlspecialchars( htmlspecialchars( $value ) ) . '</' . $name . '>';
				} else {
					return '<' . $name . '>' . htmlspecialchars( $value ) . '</' . $name . '>';
				}
				break;

			case 'json':
				return "'" . $name . "' : '" . addslashes( $value ) . "'";
				break;

			case 'php':
				return array( $name => $value );
				break;

			case 'csvheader':
			case 'fieldslist':
				return $name;
				break;

			case 'csv':
				return '"' . addslashes( $value ) . '"';
				break;

			default:
				trigger_error( '_formatFieldOutput called with ' . htmlspecialchars( $output ), E_USER_WARNING );
				return $value;
				break;
		}
	}
	/**
	 * Returns a field in specified format
	 *
	 * @param  moscomprofilerField  $field
	 * @param  moscomprofilerUser   $user
	 * @param  string               $output  NO 'htmledit' BUT: 'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @return mixed                
	 */
	function _formatFieldOutputIntBoolFloat( $name, $value, $output ) {

		switch ( $output ) {
			case 'html':
			case 'rss':
				return $value; 
				break;

			case 'htmledit':
				trigger_error( '_formatFieldOutput called with htmledit', E_USER_WARNING );
				return null;
				break;

			case 'xml':
				return '<' . $name . '>' . $value . '</' . $name . '>';
				break;

			case 'json':
				return "'" . $name . "' : " . $value;
				break;

			case 'php':
				return array( $name => $value );
				break;

			case 'csvheader':
			case 'fieldslist':
				return $name;
				break;

			case 'csv':
				return $value;
			default:
				trigger_error( '_formatFieldOutput called with ' . htmlspecialchars( $output ), E_USER_WARNING );
				return $value;
				break;
		}
	}
	/**
	 * Reformats a PHP array into $output format
	 *
	 * @param  array   $retArray  Named array
	 * @param  string  $output  'html', 'xml', 'json', 'php', 'csvheader', 'csv', 'rss', 'fieldslist', 'htmledit'
	 * @return mixed
	 */
	function _arrayToFormat( &$retArray, $output ) {
		switch ( $output ) {
			case 'html':
			case 'rss':
				$imploded	=	null;
				foreach ( $retArray as $res ) {
					if ( isset( $res['url' ] ) ) {
						$imploded	.=	'<a href="' . cbSef( $res["url"] ) . '" title="' . getLangDefinition( $res["tooltip"] ) . '">' . $res['title'] . '</a> ';
					}
				}
				return $imploded;
				break;

			case 'htmledit':
				break;

			case 'xml':
				break;

			case 'json':
				break;

			case 'php':
				break;

			case 'csvheader':
			case 'fieldslist':
				break;

			case 'csv':
			default:
				break;
		}
		trigger_error( '_arrayToFormat called with non-implemented output type: ' . htmlspecialchars( $output ), E_USER_WARNING );
	}
	/**
	 * Private methods for front-end:
	 */
	/**
	 * converts to HTML
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $reason      'profile' for user profile view and edit, 'register' for registration
	 * @param  string                $tag         <tag
	 * @param  string                $type        type="$type"
	 * @param  string                $value       value="$value"
	 * @param  string                $additional  'xxxx="xxx" yy="y"'
	 * @param  string                $allValues   
	 * @param  boolean               $displayFieldIcons
	 * @return string                            HTML: <tag type="$type" value="$value" xxxx="xxx" yy="y" />
	 */
	function _fieldEditToHtml( &$field, &$user, $reason, $tag, $type, $value, $additional, $allValues = null, $displayFieldIcons = true ) {
		global $_CB_framework, $ueConfig;

		$readOnly				=	$this->_isReadOnly( $field, $user, $reason );
		$oReq					=	$this->_isRequired( $field, $user, $reason );

		if ( $readOnly ) { 
			$additional			.=	' disabled="disabled"';
			$oReq				=	0;
		}
		if ( $oReq ) {
			$additional			.=	' mosReq="1"'						//TBD: replace by class
								.	' mosLabel="' . htmlspecialchars( $this->getFieldTitle( $field, $user, 'text', $reason ) ) . '"';
		}
		if ( $field->size > 0 ) {
			$additional			.=	" size='" . $field->size . "' ";
			//$additional			.=	" size='5' ";//modified by recly
		}
		//$additional			.=	" size='5' ";
		
		$inputName				=	$field->name;
		switch ( $type ) {
			case 'radio':
				return moscomprofilerHTML::radioListTable( $allValues, $inputName, $additional, 'value', 'text', $value, $field->cols, $field->rows, $field->size, $oReq )
				.	$this->_fieldIconsHtml( $field, $user, 'htmledit', $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $oReq );
				break;

			case 'multiselect':
				$additional		.=	' multiple="multiple"';
				$inputName		.=	'[]';
				// no break on purpose for fall-through:
			case 'select':
				$additional		.=	' class="inputbox"';
				return moscomprofilerHTML::selectList( $allValues, $inputName, $additional, 'value', 'text', $this->_explodeCBvalues( $value ), $oReq )
				.	$this->_fieldIconsHtml( $field, $user, 'htmledit', $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $oReq );
				break;

			case 'multicheckbox':
				$additional		.=	' size="' . $field->size . '"';
				return moscomprofilerHTML::checkboxListTable( $allValues, $inputName . '[]', $additional, 'value', 'text', $this->_explodeCBvalues( $value ), $field->cols, $field->rows, $field->size, $oReq )
				.	$this->_fieldIconsHtml( $field, $user, 'htmledit', $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $oReq );
				break;

			case 'text':
			case 'primaryemailaddress':
			case 'emailaddress':
			case 'webaddress':
			case 'predefined':
			case 'password':
				if ( $field->size = 0 ) {
					$additional			.=	" size='25' ";
				}
				if ( $field->maxlength > 0 ) {
					$additional	.=	' maxlength="' . $field->maxlength . '"';	
				}
				$additional		.=	' class="inputbox"';
				break;

			case 'textarea':
				$tag			=	'textarea';
				$type			=	null;
				$additional		.=	' class="inputbox"';
				if ( $field->cols > 0 ) {
					$additional	.=	' cols="' . $field->cols . '"';	
				}
				if ( $field->rows > 0 ) {
					$additional	.=	' rows="' . $field->rows . '"';	
				}
				break;

			case 'html':
				return $value;
				break;

			default:
				break;
		}
		$htmlDescription		=	$this->getFieldDescription( $field, $user, 'htmledit', $reason );
		return	'<' . $tag
				.	( $type ? ' type="' . $type . '"' : '' )
				.	' name="' . $inputName . '" id="' . $inputName . '"'
				.	( $tag == 'textarea' ? '' : ' value="' . htmlspecialchars( $value ) . '"' )
				.	( $additional ? ' ' . $additional : '' )
				.	( trim( strip_tags( $htmlDescription ) ) ? ' title="' . htmlspecialchars( $this->getFieldTitle( $field, $user, 'html', $reason ) ) . ':' . htmlspecialchars( $htmlDescription ) . '"' : '' )
				.	( $tag == 'textarea' ? '>' .  htmlspecialchars( $value ) . '</textarea>' : ' />' )
				.	$this->_fieldIconsHtml( $field, $user, 'htmledit', $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $oReq )
				;
	}
	function _fieldIconsHtml( &$field, &$user, $output, $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $required ) {
		global $_CB_framework, $_PLUGINS;

		$results				=	$_PLUGINS->trigger( 'onFieldIcons', array( &$field, &$user, $reason, $tag, $type, $value, $additional, $allValues, $displayFieldIcons, $required ) );
		if ( count( $results ) > 0 ) {
			return implode( '', $results );
		} else {
			if ( $displayFieldIcons && ( $reason != 'search' ) ) {
				return getFieldIcons( $_CB_framework->getUi(), ( $required && ( $reason != 'search' ) ), ( $reason != 'search' ? $field->profile : null ), $this->getFieldDescription( $field, $user, $output, $reason ), $this->getFieldTitle( $field, $user, $output, $reason ) );
			} else {
				return null;
			}
		}		
	}
	function _isRequired( &$field, &$user, $reason ) {
		global $_CB_framework, $ueConfig;

		$adminReq				=	$field->required;
		if (	( $_CB_framework->getUi() == 2 )
			&&	( $ueConfig['adminrequiredfields']==0 )
			&&	! in_array( $field->name, array( 'username', 'email', 'name', 'firstname', 'lastname' ) ) )
		{
			$adminReq			=	0;
		}
		return $adminReq;
	}
	function _isReadOnly( &$field, &$user, $reason ) {
		global $_CB_framework;

		$readOnly				=	$field->readonly;
		if ( ( $_CB_framework->getUi() == 2 ) || ( in_array( $reason, array( 'register', 'search' ) ) ) ) {
			$readOnly			=	0;
		}
		return $readOnly;
	}
	function _valueDoesntMatter( &$field, $reason, $noneValue = false ) {
		$value					=	new stdClass();
		$value->id				=	'cbf0_' . $field->fieldid;
		$value->value			=	'';
		$value->text			=	( $reason == 'search' ? ( $noneValue ? _UE_NONE : _UE_NO_PREFERENCE ) : _UE_NO_INDICATION );
		return $value;
	}
	function _explodeCBvalues( $value ) {
		if ( ! is_array( $value ) ) {
			$value				=	explode( '|*|', $value );
		}
		$objArr					=	array();
		foreach( $value as $k => $kv ) {
			$objArr[$k]->value	=	$kv;
			$objArr[$k]->text	=	$kv;
		}
		return $objArr;
	}
	/**
	 * Outputs search format including $html being html with input fields
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $html
	 * @param  string                $type   'text', 'choice', 'isisnot', 'none'
	 * @param  string                $class  Extra-class (e.g. for jQuery)
	 * @return string
	 */
	function _fieldSearchModeHtml( &$field, &$user, $html, $type, $class = '' ) {
		$col						=	$field->name . '__srmch';
		$selected					=	$user->get( $col );
		switch ( $type ) {
			case 'text':
				$choices		=	array(	'is'			=>	_UE_MATCH_IS_EXACTLY,
											'phrase'		=>	_UE_MATCH_PHRASE,
											'all'			=>	_UE_MATCH_ALL,
											'any'			=>	_UE_MATCH_ANY,
											'-'				=>	_UE_MATCH_EXCLUSIONS . ':',
											'isnot'			=>	_UE_MATCH_IS_EXACTLY_NOT,
											'phrasenot'		=>	_UE_MATCH_PHRASE_NOT,
											'allnot'		=>	_UE_MATCH_ALL_NOT,
											'anynot'		=>	_UE_MATCH_ANY_NOT
										);
				break;
			case 'singlechoice':
				$choices		=	array(	'is'			=>	_UE_MATCH_IS,
											// 'is'			=>	_UE_MATCH_IS_EXACTLY,
											// 'phrase'		=>	_UE_MATCH_PHRASE,
											// 'all'			=>	_UE_MATCH_ALL,
											'anyis'			=>	_UE_MATCH_IS_ONE_OF,			// _UE_MATCH_ANY,
											'-'				=>	_UE_MATCH_EXCLUSIONS . ':',
											'isnot'			=>	_UE_MATCH_IS_NOT,
											// 'phrasenot'	=>	_UE_MATCH_PHRASE_NOT,
											// 'allnot'		=>	_UE_MATCH_ALL_NOT,
											'anyisnot'		=>	_UE_MATCH_IS_NOT_ONE_OF			// _UE_MATCH_ANY_NOT
										);
				break;
			case 'multiplechoice':
				$choices		=	array(	'is'			=>	_UE_MATCH_ARE_EXACTLY,
											// 'phrase'		=>	_UE_MATCH_PHRASE,
											'all'			=>	_UE_MATCH_INCLUDE_ALL_OF,
											'any'			=>	_UE_MATCH_INCLUDE_ANY_OF,
											'-'				=>	_UE_MATCH_EXCLUSIONS . ':',
											'isnot'			=>	_UE_MATCH_ARE_EXACTLY_NOT,
											// 'phrasenot'	=>	_UE_MATCH_PHRASE_NOT,
											'allnot'		=>	_UE_MATCH_INCLUDE_ALL_OF_NOT,
											'anynot'		=>	_UE_MATCH_INCLUDE_ANY_OF_NOT
										);
				break;
			case 'isisnot':
				$choices		=	array(	'is'			=>	_UE_MATCH_IS,
											'-'				=>	_UE_MATCH_EXCLUSIONS . ':',
											'isnot'			=>	_UE_MATCH_IS_NOT
										);
				break;

			case 'none':
			default:
				$choices		=	null;
				break;
		}
		if ( $choices !== null ) {
			$drop				=	array();
			$drop[]				=	moscomprofilerHTML::makeOption( '', _UE_NO_PREFERENCE );
			$group				=	false;
			foreach ( $choices as $k => $v ) {
				if ( $k == '-' ) {
					$drop[]		=	moscomprofilerHTML::makeOptGroup( $v );
					$group		=	true;
				} else {
					$drop[]		=	moscomprofilerHTML::makeOption( $k, $v );
				}
			}
			if ( $group ) {
				$drop[]			=	moscomprofilerHTML::makeOptGroup( null );
			}
			$list				=	moscomprofilerHTML::selectList( $drop, $field->name . '__srmch', '', 'value', 'text', $selected, 1 );
		} else {
			$list				=	null;
		}
		return	'<div class="cbSearchContainer">'
				.	( $list ?	'<div class="cbSearchKind">' . $list . '</div>'	:	'' )
				.	'<div class="cbSearchCriteria' . ( $class ? ' ' . $class : '' ) . '">' . $html . '</div>'
				. '</div>'
				;
	}
	function _bindSearchMode( &$field, &$searchVals, &$postdata ) {
		$fieldNam					=	$field->name . '__srmch';
		$value						=	cbGetParam( $postdata, $fieldNam );
		if ( $value !== null ) {
			$searchVals->$fieldNam	=	stripslashes( $value );
		}
		return $value;
	}
	/**
	 * Prepares field meta-data for saving to database (safe transfer from $postdata to $user)
	 * Override but call parent
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user      RETURNED populated: touch only variables related to saving this field (also when not validating for showing re-edit)
	 * @param  array                 $postdata  Typically $_POST (but not necessarily), filtering required.
	 * @param  string                $reason    'profile' for save user edit, 'register' for save registration, 'list' for lists
	 */
	function _prepareFieldMetaSave( &$field, &$user, &$postdata, $reason ) {
		// this is not used here anymore:
//		if ( $reason == 'search' ) {
//			$this->_bindSearchMode( $field, $user, $postdata );
//		}
	}
	function ajaxCheckField( &$field, &$user, $reason ) {
		global $_CB_framework;

		global $_CB_fieldajax_outputed;


		if ( $_CB_fieldajax_outputed !== true ) {
			$cbSpoofField			=	cbSpoofField();
			$cbSpoofString			=	cbSpoofString( null, 'fieldclass' );
			$regAntiSpamFieldName	=	cbGetRegAntiSpamFieldName();
			$regAntiSpamValues		=	cbGetRegAntiSpams();
	
			$userid					=	(int) $user->id;
	
			$checking 				=	_UE_CHECKING;			// . '&start_debug=1',
			$live_site				=	$_CB_framework->getCfg( 'live_site' );
			$regAntiSpZ				=	$regAntiSpamValues[0];

			if ( $_CB_framework->getUi() == 2 ) {
				$ajaxUrl			=	$live_site . '/administrator/index3.php';
			} else {
				$ajaxUrl			=	$live_site . '/index2.php';
			}
			$_CB_framework->outputCbJQuery( <<<EOT
$.fn.cb_field_ajaxCheck = function() {
	if ( ( $(this).val() != '' ) && ( $(this).val() != $(this).data('cblastvalsent') ) ) {
		var inputid = $(this).attr('id');
		if ( ! $('#'+inputid+'__Response').size() ) {
			var respField = '<div class=\"cb_result_container\"><div id=\"' + inputid + '__Response\">&nbsp;</div></div>';
			$(this).parent().each( function() {
				if (this.tagName.toLowerCase() == 'td') {
					$(this).append(respField);
				} else {
					$(this).after(respField);
				}
				$(inputid+'__Response').hide();
			} );
		}
		if (  $('#'+inputid+'__Response').length > 0 ) {
			$('#'+inputid+'__Response').html('<img alt=\"\" src=\"$live_site/components/com_comprofiler/images/wait.gif\" /> $checking').fadeIn('fast');
			var cbInputField = this;
			var lastVal = $(this).val();
			$(this).data('cblastvalsent', lastVal );
			$.ajax( {	type: 'POST',
						url:  '$ajaxUrl?option=com_comprofiler&task=fieldclass&field='+encodeURI(inputid)+'&function=checkvalue&user=$userid&no_html=1&format=raw',
						data: 'value=' + encodeURI( lastVal ) + '&$cbSpoofField=' + encodeURI('$cbSpoofString') + '&$regAntiSpamFieldName=' + encodeURI('$regAntiSpZ'),
						success: function(response) {
							var respField = $('#'+$(cbInputField).attr('id')+'__Response');
							respField.fadeOut('fast', function() {
								respField.html(response).fadeIn('fast');
							} );
							$(cbInputField).data( 'cblastvalchecked', lastVal );
						},
						dataType: 'html'
			});
		}
	}
};
$.fn.cb_field_ajaxClear = function() {
	var respField = $('#'+$(this).attr('id')+'__Response');
	if ( respField.html() != '&nbsp;' ) {
		if ( $(this).val() != $(this).data( 'cblastvalchecked' ) ) {
			respField.fadeOut('medium' );
		} else {
			respField.fadeIn('medium' );
		}
	}
};
EOT
			);
			$_CB_fieldajax_outputed		=	true;
		}

		$_CB_framework->outputCbJQuery(
			// change is broken in FF 2.0.13 when a auto-filled value is chosen
			"$('#" . $field->name . "').data( 'cblastvalsent', $('#" . $field->name . "').val() ).blur( $.fn.cb_field_ajaxCheck ).keyup( $.fn.cb_field_ajaxClear );"
		);
	}
	/**
	 * Direct access to field for custom operations, like for Ajax
	 *
	 * WARNING: direct unchecked access, except if $user is set, then check
	 * that the logged-in user has rights to edit that $user.
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  array                 $postdata
	 * @param  string                $reason     'profile' (as nothing can really be trusted in here.
	 * @return string                            Expected output.
	 */
	function fieldClass( &$field, &$user, &$postdata, $reason ) {
		global $_CB_framework;
		// simple spoof check security
		if ( ( ! cbSpoofCheck( 'fieldclass', 'POST', 2 ) ) || ( ( $reason == 'register' ) && ( $_CB_framework->getUi() == 1 ) && ! cbRegAntiSpamCheck( 2 ) ) ) {
			echo '<span class="cb_result_error">' . _UE_SESSION_EXPIRED . "</span>";
			exit;
		}

		return false;
	}
	/**
	 * Private methods: BACKEND ONLY:
	 */
	/**
	 * Loads XML file (backend use only!)
	 *
	 * @param moscomprofilerField $field
	 * @return boolean  TRUE if success, FALSE if failed
	 */
	function _loadXML( &$field ) {
		global $_CB_database, $_PLUGINS;

		if ( ! $field->pluginid ) {
			// this field pluginid is not up-to-date, try to find the plugin by the php registration method as last resort: load all user plugins for that:
			if ( ! $_PLUGINS->loadPluginGroup( 'user', null, 0 ) ) {
				return false;
			}
			$field->pluginid	=	$_PLUGINS->getUserFieldPluginId( $field->type );
		}
		if ( $this->_xml === null ) {
			if ( ! $_PLUGINS->loadPluginGroup( null, array( $field->pluginid ), 0 ) ) {
				return false;
			}
			$this->_xml		=&	$_PLUGINS->loadPluginXML( 'editField', $field->type, $field->pluginid );
			if ( $this->_xml === null ) {
				return false;
			}
		}
		return true;
	}
	/**
	 * Loads field XML (backend use only!)
	 *
	 * @param  moscomprofilerField $field
	 * @return CBSimpleXMLElement if success, NULL if failed
	 */
	function & _loadFieldXML( &$field ) {
		if ( $this->_fieldXml === null ) {
			if ( $this->_loadXML( $field ) ) {
				$fieldTypesXML			=&	$this->_xml->getElementByPath( 'fieldtypes' );
				if ( $fieldTypesXML ) {
					$this->_fieldXml	=&	$fieldTypesXML->getChildByNameAttr( 'field', 'type', $field->type );
				}
			}
		}
		return $this->_fieldXml;
	}
	/**
	 * Loads parameters editor (backend use only!)
	 *
	 * @param moscomprofilerField $field
	 * @return cbParamsEditorController or null if not existant
	 */
	function & _loadParamsEditor( &$field ) {
		global $_PLUGINS;
		if ( $this->_loadXML( $field ) ) {
			$plugin 		=	$_PLUGINS->getPluginObject( $field->pluginid );
			$params			=&	new cbParamsEditorController( $field->params, $this->_xml, $this->_xml, $plugin );

			$pluginParams	=	new cbParamsBase( $plugin->params );
			$params->setPluginParams( $pluginParams );
		} else {
			$params			=	null;
		}
		return $params;
	}
	/**
	 * Methods for CB backend only (do not override):
	 */
	/**
	 * Draws parameters editor of the field paramaters (backend use only!)
	 *
	 * @param  moscomprofilerField  $field
	 * @param  array                $options
	 * @return string  HTML if editor available, or NULL
	 */
	function drawParamsEditor( &$field, &$options ) {
		$params		=&	$this->_loadParamsEditor( $field );
		if ( $params ) {
			$params->setOptions( $options );
			return $params->draw( 'params', 'fieldtypes', 'field', 'type', $field->type );
		} else {
			return null;
		}
	}
	/**
	 * Converts returned parameters into raw format of parameters (backend use only!)
	 *
	 * @param  moscomprofilerField  $field
	 * @param  array                $post_Params
	 * @return string               for the param column of the field
	 */
	function getRawParams( &$field, &$post_Params ) {
		return cbParamsEditorController::getRawParams( $_POST['params'] );
	}
	/**
	 * Returns full label of the type of the field (backend use only!)
	 *
	 * @param  moscomprofilerField $field
	 * @return boolean  TRUE if success, FALSE if failed
	 */
	function getFieldTypeLabel( &$field, $checkNotSys = true ) {
		$fieldXML		=&	$this->_loadFieldXML( $field );
		if ( $fieldXML ) {
			if ( $checkNotSys && ( $fieldXML->attributes( 'unique' ) == 'true' ) ) {
				return null;
			}
			return $fieldXML->attributes( 'label' );
		}
		return null;
	}
	/**
	 * Returns main table name of $field
	 *
	 * @param  moscomprofilerFields  $field
	 * @return string
	 */
	function getMainTable( &$field ) {
		$fieldXML										=&	$this->_loadFieldXML( $field );
		if ( $fieldXML ) {
			$db											=&	$fieldXML->getElementByPath( 'database' );
			if ( $db !== false ) {

				cbimport( 'cb.sql.upgrader' );
				$sqlUpgrader							=	new CBSQLupgrader( $_CB_database );

				return $sqlUpgrader->getMainTableName( $db, $field->name, '#__comprofiler' );
			}
		}
		return '#__comprofiler';
	}
	/**
	 * Returns array of main table columns names of $field
	 *
	 * @param  moscomprofilerFields  $field
	 * @return array
	 */
	function getMainTableColumns( &$field ) {
		$fieldXML										=&	$this->_loadFieldXML( $field );
		if ( $fieldXML ) {
			$db											=&	$fieldXML->getElementByPath( 'database' );
			if ( $db !== false ) {

				cbimport( 'cb.sql.upgrader' );
				$sqlUpgrader							=	new CBSQLupgrader( $_CB_database );

				$columnsNames							=	$sqlUpgrader->getMainTableColumnsNames( $db, $field->name );
				if ( $columnsNames !== false ) {
					return $columnsNames;
				}

			}
		}
		return array( $field->name );
	}
	/**
	 * Handles SQL XML for the type of the field (backend use only!)
	 * 	<database version="1">
	 *		<table name="#__comprofiler" class="moscomprofiler">
	 *			<columns>
	 *				<column name="_rate" nametype="namesuffix" type="sql:decimal(16,8)" unsigned="true" null="true" default="NULL" auto_increment="100" />
	 *
	 * @param  moscomprofilerField $field
	 * @return array of array of array
	 */
	function adaptSQL( &$field, $add = true ) {
		global $_CB_database;

		$tableTypeNames									=	array();

		cbimport( 'cb.sql.upgrader' );
		$sqlUpgrader									=	new CBSQLupgrader( $_CB_database );

// $sqlUpgrader->setDryRun( true );

		$change											=	( $add ? true : 'drop' );
		$fieldXML										=&	$this->_loadFieldXML( $field );
		if ( $fieldXML ) {
			$db											=&	$fieldXML->getElementByPath( 'database' );
			if ( $db !== false ) {
				// <database><table><columns>.... structure:
				$success								=	$sqlUpgrader->checkXmlDatabaseDescription( $db, $field->name, $change, null );
			} else {
				$data									=&	$fieldXML->getElementByPath( 'data' );
				if ( $data !== false ) {
					// <data ....> structure:
					$xmlText							=	'<?xml version="1.0" encoding="UTF-8"?>
<database version="1">
    <table name="' . $field->table . '" maintable="true" strict="false" drop="never" shared="true">
        <columns>
        </columns>
    </table>
</database>';
					$dbXml								=&	new CBSimpleXMLElement( $xmlText );
					$columns							=&	$dbXml->getElementByPath( 'table/columns' );
					$columns->addChildWithAttr( 'column', '', null, $data->attributes() );
					$success							=	$sqlUpgrader->checkXmlDatabaseDescription( $dbXml, $field->name, $change, null );
				} else {
					$success							=	true;
				}
			}
		} else {
			cbimport('cb.xml.simplexml');
			// no <fieldtype> xml at all, must be an old plugin:
			$xmlText									=	'<?xml version="1.0" encoding="UTF-8"?>
<database version="1">
    <table name="#__comprofiler" class="moscomprofiler" maintable="true" strict="false" drop="never" shared="true">
        <columns>
            <column name="" nametype="namesuffix" type="sql:varchar(255)" null="true" default="NULL" />
        </columns>
    </table>
</database>';
			$dbXml										=&	new CBSimpleXMLElement( $xmlText );
			$success									=	$sqlUpgrader->checkXmlDatabaseDescription( $dbXml, $field->name, $change, null );
		}
		if ( ! $success ) {
			$field->_error								.=	$sqlUpgrader->getErrors();
		}
/*
var_dump( $success );
echo "<br>\nERRORS: " . $sqlUpgrader->getErrors( "<br /><br />\n\n", "<br />\n" );
echo "<br>\nLOGS: " . $sqlUpgrader->getLogs( "<br /><br />\n\n", "<br />\n" );
//exit;
*/

		return $success;
	}
	/**
	 * Sets an error message $errorText for $field of $user
	 *
	 * @param  moscomprofilerFields  $field
	 * @param  moscomprofilerUser    $user
	 * @param  string                $reason    'profile' for save user edit, 'register' for save registration, 'list' for lists
	 * @param  string                $errorText
	 */
	function _setValidationError( &$field, &$user, $reason, $errorText ) {
		$this->_setErrorMSG( $this->getFieldTitle( $field, $user, 'text', $reason ) . ' : ' .  $errorText );
	}
	/**
	* PRIVATE method: sets the text of the last error
	* @access private
	*
	* @param  string   $msg   error message
	* @return boolean         true
	*/
	function _setErrorMSG( $msg ) {
		global $_PLUGINS;

		$_PLUGINS->errorMSG[]	=	$msg;
		return true;
	}
}
// cbimport( 'cb.xml.simplexml' );
class cbSqlQueryPart /* extends CBSimpleXMLElement */ {
	var $tag;
	var $name;
	var $table;
	var $type;
	var $operator;
	var $value;
	var $valuetype;
	var $searchmode;
	var $_children			=	array();

	function addChildren( $children ) {
		$this->_children	=	array_merge( $this->_children, $children );
	}
	function reduceSqlFormula( &$tableReferences, $wildcards = null ) {
		global $_CB_database;

		static $replaceWildcards	=	false;

		if ( $wildcards !== null ) {
			$replaceWildcards		=	$wildcards;
		}
		$condition					=	null;

		$subFormulas				=	array();
		foreach ( $this->children() as $child ) {
			$subFormulas[]			=	$child->reduceSqlFormula( $tableReferences );
		}

		if ( $this->attributes( 'type' ) == 'sql:operator' ) {
			if ( count( $subFormulas ) > 0 ) {
				$condition			=	'(' . implode( ') ' . $this->attributes( 'operator' ) . ' (', $subFormulas ) . ')';
			}
		} elseif ( $this->attributes( 'type' ) == 'sql:field' ) {
			if ( $this->name() == 'column' ) {
				if ( isset( $tableReferences[$this->attributes( 'table' )] ) ) {
					$operator		=	$this->attributes( 'operator' );
					$value			=	$this->attributes( 'value' );
					$valuetype		=	$this->attributes( 'valuetype' );
					$searchmode		=	$this->attributes( 'searchmode' );

					if ( in_array( $operator, array( '=', '<>', '!=' ) ) && ( $valuetype == 'const:string' ) ) {
						switch ( $searchmode ) {
							case 'all':
							case 'any':
							case 'anyis':
							case 'phrase':
							case 'allnot':
							case 'anynot':
							case 'anyisnot':
							case 'phrasenot':
								$precise				=	in_array( $searchmode, array( 'anyis', 'anyisnot' ) );
								if ( $replaceWildcards && ! $precise ) {
									$wildsReplaced		=	$this->_replaceWildCards( $operator, $value );		// changes $operator and $value !
								}
								if ( is_array( $value ) ) {
									$eachValues			=	$value;
								} else {
									if ( cbStartOfStringMatch( $searchmode, 'phrase' ) ) {
										$eachValues			=	array( $value );
									} else {
										$eachValues			=	preg_split( '/\W+/', $value );
									}
								}
								$conditions				=	array();
								foreach ( $eachValues as $v ) {
									if ( $v != '' ) {
										if ( ! ( $precise || in_array( $operator, array( 'LIKE', 'NOT LIKE' ) ) ) ) {
											$operator	=	$this->_operatorToLike( $operator );
										}
										$conditions[]	=	$this->_buildop( $operator, ( $precise ? $v : $this->_prepostfixPercent( $v ) ), $valuetype, $tableReferences );
									}
								}
								if ( count( $conditions ) > 1 ) {
									$op					=	( in_array( $searchmode, array( 'all', 'allnot' ) ) ? ') AND (' : ') OR (' );
									$condition			=	'(' . implode( $op, $conditions ) . ')';
								} elseif ( count( $conditions ) == 1 ) {
									$condition			=	implode( '', $conditions );
								} else {
									$condition			=	null;
								}
								if ( in_array( $searchmode, array( 'allnot', 'anynot', 'anyisnot', 'phrasenot' ) ) && $condition ) {
									$condition			=	'NOT(' . $condition . ')';
								}
								break;

							case 'isnot':
								$operator				=	( $operator == '=' ? '<>' : '=' );
								$condition				=	$this->_buildop( $operator, $value, $valuetype, $tableReferences );
								break;

							case 'is':
							default:
								$condition				=	$this->_buildop( $operator, $value, $valuetype, $tableReferences );
								break;

						}
					} else {
						$condition						=	$this->_buildop( $operator, $value, $valuetype, $tableReferences );
					}
				}
			}
		}
		return $condition;
	}
	function _replaceWildCards( &$operator, &$value ) {
		$changes				=	false;
		if ( is_array( $value ) ) {
			foreach ( array_keys( $value ) as $k ) {
				$changes		=	$this->_replaceWildCards( $operator, $value[$k] ) || $changes;
			}
		} else {
			$escSearch				=	str_replace( '|*|', '|`|', $value );
			if ( strpos( $escSearch, '*' ) !== false ) {
				$escSearch			=	cbEscapeSQLsearch( $escSearch );
				$escSearch			=	str_replace( '*', '%', $escSearch );
				$value				=	str_replace( '|`|', '|*|', $escSearch );
				$operator			=	$this->_operatorToLike( $operator );
				$changes			=	true;
			}
		}
		return $changes;
	}
	function _prepostfixPercent( $sqlSearchEscaped ) {
		if ( $sqlSearchEscaped[0] != '%' ) {
			$sqlSearchEscaped	=	'%' . $sqlSearchEscaped;
		}
		if ( $sqlSearchEscaped[strlen($sqlSearchEscaped) - 1] != '%' ) {
			$sqlSearchEscaped	.=	'%';
		}
		return $sqlSearchEscaped;
	}
	function _operatorToLike( $operator ) {
		switch ( $operator ) {
			case '<>':
			case '!=':
				$operator	=	'NOT LIKE';
				break;

			case '=':
			default:
				$operator	=	'LIKE';
				break;
		}
		return $operator;		
	}
	function _buildop( $operator, $value, $valuetype, &$tableReferences ) {
		global $_CB_database;

		return	$tableReferences[$this->attributes( 'table' )] . '.' . $_CB_database->NameQuote( $this->attributes( 'name' ) )
				.	' ' . $operator . ' '
				.	$this->_sqlCleanQuote( $value, $valuetype )
				;
	}
	/**
	 * Cleans and makes a value SQL safe depending on the type that is enforced.
	 * @access private
	 *
	 * @param  mixed   $fieldValue
	 * @param  string  $type
	 * @return string
	 */
	function _sqlCleanQuote( $fieldValue, $type ) {
		global $_CB_database;

		$typeArray		=	explode( ':', $type, 3 );
		if ( count( $typeArray ) < 2 ) {
			$typeArray	=	array( 'const' , $type );
		}

		switch ( $typeArray[1] ) {
			case 'int':
				$value		=	(int) $fieldValue;
				break;
			case 'float':
				$value		=	(float) $fieldValue;
				break;
			case 'formula':
				$value		=	$fieldValue;
				break;
			case 'field':						// this is temporarly handled here
				$value		=	$_CB_database->NameQuote( $fieldValue );
				break;
			case 'datetime':
				if ( preg_match( '/[0-9]{4}-[01][0-9]-[0-3][0-9] [0-2][0-9](:[0-5][0-9]){2}/', $fieldValue ) ) {
					$value	=	$_CB_database->Quote( $fieldValue );
				} else {
					$value	=	"''";
				}
				break;
			case 'date':
				if ( preg_match( '/[0-9]{4}-[01][0-9]-[0-3][0-9]/', $fieldValue ) ) {
					$value	=	$_CB_database->Quote( $fieldValue );
				} else {
					$value	=	"''";
				}
				break;
			case 'string':
				$value		=	$_CB_database->Quote( $fieldValue );
				break;
			case 'null':
				if ( $fieldValue != 'NULL' ) {
					trigger_error( sprintf( 'cbSqlQueryPart::_sqlCleanQuote: ERROR: field type sql:null has not NULL value' ) );
				}
				$value		=	'NULL';
				break;

			default:
				trigger_error( 'cbSqlQueryPart::_sqlQuoteValueType: ERROR_UNKNOWN_TYPE: ' . htmlspecialchars( $type ), E_USER_NOTICE );
				$value		=	$_CB_database->Quote( $fieldValue );	// false;
				break;
		}
		return (string) $value;
	}

	function name() {
		return $this->tag;
	}
	function attributes( $name = null ) {
		if ( isset( $this->$name ) ) {
			return $this->$name;
		} else {
			return null;
		}
	}
	function children( ) {
		return $this->_children;
	}
}
/**
* Field Class for handling the CB field api
* @package Community Builder
* @author Beat
*/
class cbFieldParamsHandler {
	/** Plugin id
	 * @var int */
	var $_pluginid	=	null;
	/** field object
	 * @var moscomprofilerField */
	var $_field		=	null;
	/** Plugin of this field
	 * @var moscomprofilerPlugin */
	var $_plugin	=	null;
	/** XML of the Plugin of this field
	 * @var CBSimpleXMLElement */
	var $_xml		=	null;
	/** XML element for the params for this field
	 * @var CBSimpleXMLElement */
	var $_fieldXml		=	null;
	/** params are specific to one particular field type
	 * @var boolean */
	var $_specific	=	false;
	/**
	* Constructor
	*
	* @param  int                  $pluginid   id of plugin with params for other fields
	* @param  moscomprofilerField  $field
	*/
	function cbFieldParamsHandler( $pluginid, &$field ) {
		$this->_pluginid	=	$pluginid;
		$this->_field		=&	$field;
	}
	/**
	 * Private methods:
	 */
	/**
	 * Loads XML file (backend use only!)
	 *
	 * @return boolean  TRUE if success, FALSE if failed
	 */
	function _loadXML( ) {
		global $_CB_database, $_PLUGINS;

		if ( $this->_xml === null ) {
			if ( ! $_PLUGINS->loadPluginGroup( null, array( $this->_pluginid ), 0 ) ) {
				return false;
			}
			$this->_xml	=&	$_PLUGINS->loadPluginXML( 'editField', 'cbfields_params', $this->_pluginid );
			if ( $this->_xml === null ) {
				return false;
			}
		}
		return true;
	}
	/**
	 * Loads fields-params XML (backend use only!)
	 * also sets $this->_fieldXML and $this->_specific
	 *
	 * @return boolean              TRUE if success, FALSE if not existant
	 */
	function _loadFieldParamsXML( ) {
		if ( $this->_fieldXml === null ) {
			if ( $this->_loadXML() ) {
				$fieldsParamsXML				=&	$this->_xml->getElementByPath( 'fieldsparams' );
				if ( $fieldsParamsXML ) {
					$fieldTypeSpecific			=&	$fieldsParamsXML->getChildByNameAttr( 'field', 'type', $this->_field->type );
					if ( $fieldTypeSpecific ) {
						// <fieldsparams><field type="date"><params><param ....
						$this->_fieldXml		=&	$fieldTypeSpecific;
						$this->_specific		=	true;
					} else {
						// <fieldsparams><field type="other_types"><params><param ....
						$nonSpecific			=&	$fieldsParamsXML->getChildByNameAttr( 'field', 'type', 'other_types' );
						if ( $nonSpecific ) {
							$this->_fieldXml	=&	$nonSpecific;
							$this->_specific	=	false;
						}
					}
				}
			}
		}
		return ( $this->_fieldXml !== null );
	}
	/**
	 * Loads parameters editor (backend use only!)
	 *
	 * @return cbParamsEditorController or null if not existant
	 */
	function & _loadParamsEditor() {
		global $_PLUGINS;
		if ( $this->_loadFieldParamsXML() ) {
			$plugin 		=	$_PLUGINS->getPluginObject( $this->_pluginid );
			$params			=&	new cbParamsEditorController( $this->_field->params, $this->_xml, $this->_xml, $plugin );

			$pluginParams	=	new cbParamsBase( $plugin->params );
			$params->setPluginParams( $pluginParams );
		} else {
			$params			=	null;
		}
		return $params;
	}
	/**
	 * Methods for CB backend only (do not override):
	 */
	/**
	 * Draws parameters editor of the field paramaters (backend use only!)
	 *
	 * @param  array                $options
	 * @return string  HTML if editor available, or NULL
	 */
	function drawParamsEditor( &$options ) {
		$params		=&	$this->_loadParamsEditor();
		if ( $params ) {
			$params->setOptions( $options );
			if ( $this->_specific ) {
				return $params->draw( 'params', 'fieldsparams', 'field', 'type', $this->_field->type );
			} else {
				return $params->draw( 'params', 'fieldsparams', 'field', 'type', 'other_types' );
			}
		} else {
			return null;
		}
	}
	/**
	 * Converts returned parameters into raw format of parameters:
	 *
	 * @param  array                $post_Params
	 * @return string               for the param column of the field
	 */
	function getRawParams( &$post_Params ) {
		return cbParamsEditorController::getRawParams( $_POST['params'] );
	}
	/**
	 * Returns full label of the type of the field (backend use only!)
	 *
	 * @param  moscomprofilerField $field
	 * @return boolean  TRUE if success, FALSE if failed
	 */
	function getFieldsParamsLabel() {
		global $_PLUGINS;
		$plugin 				=	$_PLUGINS->getPluginObject( $this->_pluginid );
		if ( $this->_fieldXml ) {
			return $plugin->name . ': ' . $this->_fieldXml->attributes( 'label' );
		}
		return $plugin->name . ': ' . "specific field-parameters";
	}

}

/**
* Tab Class for handling the CB tab api
* @package Community Builder
* @author JoomlaJoe and Beat
*/
class cbTabHandler extends cbPluginHandler  {
	var $fieldJS="";

	/**
	* Constructor
	*/
	function cbTabHandler() {
		$this->cbPluginHandler();
	}
	/**
	* Generates the menu and user status to display on the user profile by calling back $this->addMenu
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @return boolean                        either true, or false if ErrorMSG generated
	*/
	function getMenuAndStatus( $tab, $user, $ui) {
	}
	/**
	* Generates the HTML to display the user profile tab
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayTab( $tab, $user, $ui ) {
	}
	/**
	* Generates the HTML to display the user edit tab
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getEditTab( $tab, $user, $ui ) {
	}
	/**
	* Saves the user edit tab postdata into the tab's permanent storage
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @param  array               $postdata  _POST data for saving edited tab content as generated with getEditTab
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function saveEditTab( $tab, &$user, $ui, $postdata ) {
	}
	/**
	* Generates the HTML to display the registration tab/area
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @param  array               $postdata  _POST data for saving edited tab content as generated with getEditTab
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getDisplayRegistration( $tab, $user, $ui, $postdata ) {
	}
	/**
	* Saves the registration tab/area postdata into the tab's permanent storage
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @param  array               $postdata  _POST data for saving edited tab content as generated with getEditTab
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function saveRegistrationTab( $tab, &$user, $ui, $postdata ) {
	}
	/**
	* WARNING: UNCHECKED ACCESS! On purpose unchecked access for M2M operations
	* Generates the HTML to display for a specific component-like page for the tab. WARNING: unchecked access !
	* @param  moscomprofilerTab   $tab       the tab database entry
	* @param  moscomprofilerUser  $user      the user being displayed
	* @param  int                 $ui        1 for front-end, 2 for back-end
	* @param  array               $postdata  _POST data for saving edited tab content as generated with getEditTab
	* @return mixed                          either string HTML for tab content, or false if ErrorMSG generated
	*/
	function getTabComponent( $tab, $user, $ui, $postdata ) {
		return null;
	}
	//
	// private methods for inheriting classes:
	//
	/**
	* adds a validation JS code for the Edit Profile and Registration pages
	* @param string Javascript code ready for HTML output, with a tab \t at the begin and a newline \n at the end.
	*/
	function _addValidationJS($js)
	{
		$this->fieldJS .= $js;
	}
	/**
	* internal utility method
	* @param string postfix for identifying multiple pagings/search/sorts (optional)
	* @return string value of the tab forms&urls prefix
	*/
	function _getPrefix($postfix="")
	{
		return str_replace(".","_",((strncmp($this->element, "cb.", 3)==0)? substr($this->element,3) : $this->element).$postfix);
	}
	/**
	* gets an ESCAPED and urldecoded request parameter for the plugin
	* you need to call stripslashes to remove escapes, and htmlspecialchars before displaying.
	*
	* @param  string  $name     name of parameter in REQUEST URL
	* @param  string  $def      default value of parameter in REQUEST URL if none found
	* @param  string  $postfix  postfix for identifying multiple pagings/search/sorts (optional)
	* @return string            value of the parameter (urldecode processed for international and special chars) and ESCAPED! and ALLOW HTML!
	*/
	function _getReqParam( $name, $def=null, $postfix="" ) {
		global $_GET, $_POST;

		$prefix		=	$this->_getPrefix($postfix);

		$value		=	cbGetParam( $_POST, $prefix.$name, false );
		if ( $value !== false ) {
			$value	=	cbGetParam( $_POST, $prefix.$name, $def );
		} else {
			$value	=	cbGetParam( $_GET, $prefix.$name, $def );
			if ( $value && is_string( $value ) ) {
				$value	=	utf8ToISO( urldecode( $value ) );
			}
		}
		return $value;
	}
	/**
	* Gets the name input parameter for search and other functions
	*
	* @param  string  $name     name of parameter of plugin
	* @param  string  $postfix  postfix for identifying multiple pagings/search/sorts (optional)
	* @return string            value of the name input parameter
	*/
	function _getPagingParamName( $name="search", $postfix="" )
	{
		$prefix		=	$this->_getPrefix($postfix);
		return $prefix.$name;
	}
	/**
	* Gives the URL of a link with plugin parameters.
	*
	* @param  array    $paramArray        array of string with key name of parameters
	* @param  string   $task              cb task to link to (default: userProfile)
	* @param  boolean  $sefed             TRUE to call cbSef (default), FALSE to leave URL unsefed
	* @param  array    $excludeParamList  of string with keys of parameters to not include
	* @return string                      value of the parameter
	*/
	function _getAbsURLwithParam( $paramArray, $task = 'userProfile', $sefed = true, $excludeParamList = array() )
	{
		global $_CB_database, $_POST, $_GET;
		
		$prefix						=	$this->_getPrefix();

		if ( $task == 'userProfile' ) {
			$Itemid					=	(int) getCBprofileItemid( 0 );
			unset( $paramArray['Itemid'] );
		} elseif ( isset( $paramArray['Itemid'] ) ) {
			$Itemid					=	(int) $paramArray['Itemid'];
			unset( $paramArray['Itemid'] );
		} elseif ( isset( $_POST['Itemid'] ) ) {
			$Itemid					=	(int) cbGetParam( $_POST, 'Itemid', 0 );
		} elseif ( isset( $_GET['Itemid'])) {
			$Itemid					=	(int) cbGetParam( $_GET, 'Itemid', 0 );
		} else {
			$Itemid					=	(int) getCBprofileItemid( 0 );
		}
		if ( ( $task == 'userProfile' ) && ! isset( $paramArray['user'] ) ) {
			if ( isset( $_POST['user'] ) ) {
				$paramArray['user']	=	urldecode(cbGetParam($_POST,'user',null));
			} else {
				$paramArray['user']	=	urldecode(cbGetParam($_GET,'user',null));
			}
		}
		if ( $task == 'pluginclass' ) {
			$plugin					=	$this->getPluginObject();
			$unsecureChars			=	array( '/', '\\', ':', ';', '{', '}', '(', ')', "\"", "'", '.', ',', "\0", ' ', "\t", "\n", "\r", "\x0B" );
			$paramArray['plugin']	=	substr( str_replace( $unsecureChars, '', $plugin->element ), 0, 32 );
			$paramArray['tab']		=	null;
		} else {
			$paramArray['plugin']	=	null;
			if ( ! isset( $paramArray['tab'] ) ) {
				$paramArray['tab']	=	strtolower( get_class( $this ) );
			}
		}

		$uri	=	'index.php?option=com_comprofiler&amp;task=' . $task
				.	( ( isset( $paramArray['user'] ) && $paramArray['user'] ) ? '&amp;user=' . htmlspecialchars( stripslashes( $paramArray['user'] ) ) : '' )
				.	( $Itemid ? '&amp;Itemid=' . $Itemid : '' )
				.	( $paramArray['tab'] ? '&amp;tab=' . htmlspecialchars( stripslashes( $paramArray['tab'] ) ) : '' )
				.	($paramArray['plugin'] ? '&amp;plugin=' . htmlspecialchars( stripslashes( $paramArray['plugin'] ) ) : '' );

		reset( $paramArray );
		while ( list( $key, $val ) = each( $paramArray ) ) {
			if ( ! in_array( $key, array( 'Itemid', 'user', 'tab', 'plugin' ) ) && ! in_array( $key, $excludeParamList ) ) {
				if ( $val ) {
					$uri			.=	'&amp;' . htmlspecialchars( $prefix . $key ) . '=' . htmlspecialchars( stripslashes( $val ) );
				}
			}
		}
		if ( $sefed ) {
			return cbSef( $uri );
		} else {
			return $uri;
		}
	}
	/**
	 * Returns the tab description with all replacements of variables and of language strings made.
	 *
	 * @param  cbTabHandler        $tab
	 * @param  moscomprofilerUser  $user
	 * @param  string              $htmlId  div id tag for the description html div
	 * @return string
	 */
	function _writeTabDescription( $tab, $user, $htmlId = null ) {
		if ( $tab->description != null ) {
			$return = "\t\t<div class=\"tab_Description\""
					. ( $htmlId ? " id=\"" . $htmlId . "\"" : "" )
					. ">"
					. cbReplaceVars( unHtmlspecialchars( $tab->description ), $user )		//TBD later: remove unHtmlSpecialchars, as from CB 1.2 on the row is stored fine.
					."</div>\n";
		} else {
			$return = null;
		}
		return $return;
	}
	/**
	* Writes the html search box as <form><div><input ....
	* @param array: paging parameters. ['limitstart'] is the record number to start dislpaying from will be ignored
	* @param string postfix for identifying multiple pagings/search/sorts (optional)
	* @param string the class/style for the div
	* @param string the class/style for the input
	* @param string cb task to link to (default: userProfile)
	* @return string html text displaying a nice search box
	*/
	function _writeSearchBox($pagingParams,$postfix="",$divClass="style=\"float:right;\"",$inputClass="class=\"inputbox\"",$task="userProfile")
	{
		$base_url = $this->_getAbsURLwithParam($pagingParams, $task, true, array($postfix."search",$postfix."limitstart"));
		$searchPagingParams = stripslashes($pagingParams[$postfix."search"]);

		$searchForm = "<form action=\"".$base_url."\" method=\"post\"><div".($divClass?" ".$divClass:"").">";
/* done in _getAbsURLwithParam:
		foreach ($pagingParams as $k => $pp) {
			if ($pp && !in_array($k,array($postfix."search",$postfix."limitstart"))) {
				$searchForm .= "<input type='hidden' name='".$this->_getPagingParamName($k)."' value=\"".htmlspecialchars($pp)."\" />";	//BB $_CB_framework->outputCharset() charset into htmlspecialchars everywhere ?
			}
		}
*/
		$searchForm .= "<input type=\"text\" name=\"".$this->_getPagingParamName("search",$postfix)."\" ".$inputClass." value=\""
					.($searchPagingParams ? htmlspecialchars($searchPagingParams) : _UE_SEARCH_INPUT)."\"";
		if (!$searchPagingParams) {
			$searchForm .= " onblur=\"if(this.value=='') { this.value='"._UE_SEARCH_INPUT."'; return false; }\""
						." onfocus=\"if(this.value=='"._UE_SEARCH_INPUT."') this.value='';\"";
		}
		$searchForm .= " onchange=\"if(this.value!='".($searchPagingParams ? str_replace(array("\\","'"),array("\\\\","\\'"),htmlspecialchars($searchPagingParams)) : _UE_SEARCH_INPUT)."')"
					." { ";
		if (!$searchPagingParams) {
			$searchForm .= "if (this.value=='"._UE_SEARCH_INPUT."') this.value=''; ";
		}
		$searchForm .= "this.form.submit(); }\" />"
					. "</div></form>";
		return $searchForm;
	}
	/**
	* Writes the html links for sorting as headers
	* @param array: paging parameters. ['limitstart'] is the record number to start dislpaying from will be ignored
	* @param string postfix for identifying multiple pagings/search/sorts (optional)
	* @param string sorting parameter added as &sortby=... if NOT NULL
	* @param string Name to display as column heading/hyperlink
	* @param boolean true if it is the default sorting field to not output sorting
	* @param string class/style html for the unselected sorting header
	* @param string class/style html for the selected sorting header
	* @param string cb task to link to (default: userProfile)
	* @return string html text displaying paging
	*/
	function _writeSortByLink($pagingParams,$postfix,$sortBy,$sortName,$defaultSort=false,$unselectedClass='class="cbSortHead"',$selectedClass='class="cbSortHeadSelected"',$task="userProfile")
	{
		$url = $this->_getAbsURLwithParam($pagingParams, $task, false, array($postfix."sortby",$postfix."limitstart"));
		$prefix = $this->_getPrefix();
		//done in _getAbsURLwithParam: foreach ($pagingParams as $k => $v) if ($v && $k!=$postfix."sortby")  $url .= "&amp;".htmlentities($prefix.$k)."=".htmlentities($v);
		if (!$defaultSort) $url .= "&amp;".htmlentities($prefix.$postfix)."sortby=".htmlentities($sortBy);
		$class = ((!$pagingParams[$postfix."sortby"] && $defaultSort) || ($pagingParams[$postfix."sortby"]==$sortBy))?" ".$selectedClass:" ".$unselectedClass;
		return '<a href="'.cbSef($url).'"'.$class.' title="'.sprintf(_UE_CLICKTOSORTBY,htmlspecialchars($sortName, ENT_QUOTES)).'">'
				.htmlspecialchars($sortName, ENT_QUOTES).'</a>';
	}
	/**
	* Writes the html links for pages inside tabs, eg, previous 1 2 3 ... x next
	* @param array: paging parameters. ['limitstart'] is the record number to start dislpaying from will be ignored
	* @param string postfix for identifying multiple pagings/search/sorts (optional)
	* @param int Number of rows to display per page
	* @param int Total number of rows
	* @param string cb task to link to (default: userProfile)
	* @return string html text displaying paging
	*/
	function _writePaging( $pagingParams, $postfix, $limit, $total, $task = 'userProfile' )
	{
		$base_url	=	$this->_getAbsURLwithParam( $pagingParams, $task, false, array( $postfix . 'limitstart' ) );
		$prefix		=	$this->_getPrefix( $postfix );
		return writePagesLinks( $pagingParams[$postfix . 'limitstart'], $limit, $total, $base_url, null, $prefix );
	}
	/**
	* gets the paging limitstart, search and sortby parameters, as well as additional parameters
	* @param array of string : keyed additional parameters as "Param-name" => "default-value"
	* @param mixed : array of string OR string : postfix for identifying multiple pagings/search/sorts (optional)
	* @return array("limitstart" => current list-start value (default: null), "search" => search-string (default: null), "sortby" => sorting by, +additional parameters as keyed in $additionalParams)
	*/
	function _getPaging($additionalParams=array(), $postfixArray=null)
	{
		$return=array();

		if (!is_array($postfixArray)) {
			if (is_string($postfixArray)) {
				$postfixArray = array($postfixArray);
			} else {
				$postfixArray = array("");
			}
		}
		foreach ($postfixArray as $postfix) {	
			$return[$postfix."limitstart"]	=	(int) $this->_getReqParam("limitstart", null, $postfix);
			$return[$postfix."search"]		=	$this->_getReqParam("search", null, $postfix);
			$return[$postfix."sortby"]		=	$this->_getReqParam("sortby", null, $postfix);
		}
		foreach ($additionalParams as $k => $p) {
			$return[$k] = $this->_getReqParam($k, $p);
		}
		return $return;
	}
	/**
	* sets the paging limitstart, search and sortby parameters, as well as additional parameters
	* @param array of string : keyed additional parameters as "Param-name" => "value"
	* @param string search string
	* @param string sorting parameter added as &sortby=... if NOT NULL
	* @param array of string : keyed additional parameters as "Param-name" => "default-value"
	* @param string postfix for identifying multiple pagings/search/sorts (optional)
	* @return array("limitstart" => current list-start value (default: null), "search" => search-string (default: null), "sortby" => sorting by, +additional parameters as keyed in $additionalParams)
	*/
	function _setPaging($limitstart="0",$search=null,$sortBy=null,$additionalParams=array(), $postfix="")
	{
		$return=array();

		$return[$postfix."limitstart"]	=	(int)	$limitstart;
		$return[$postfix."search"]		=	$search;
		$return[$postfix."sortby"]		=	$sortBy;
		foreach ($additionalParams as $k => $p) {
			$return[$k] = $p;
		}
		return $return;
	}
}	// end class cbTabHandler.


/**
* PMS Class for handling the CB PMS api
* @package Community Builder
* @author Beat
*/
class cbPMSHandler extends cbTabHandler  {
	/**
	* Constructor
	*/
	function cbPMSHandler() {
		$this->cbTabHandler();
	}
	/**
	* Sends a PMS message
	* @param int userId of receiver
	* @param int userId of sender
	* @param string subject of PMS message
	* @param string body of PMS message
	* @param boolean false: real user-to-user message; true: system-Generated by an action from user $fromid (if non-null)
	* @return mixed : either string HTML for tab content, or false if ErrorMSG generated
	*/
	function sendUserPMS( $toid, $fromid, $subject, $message, $systemGenerated = false ) {
	}
	/**
	* returns all the parameters needed for a hyperlink or a menu entry to do a pms action
	* @param int userId of receiver
	* @param int userId of sender
	* @param string subject of PMS message
	* @param string body of PMS message
	* @param int kind of link: 1: link to compose new PMS message for $toid user. 2: link to inbox of $fromid user; 3: outbox, 4: trashbox,
	  5: link to edit pms options
	* @return mixed array of string {"caption" => menu-text ,"url" => NON-cbSef relative url-link, "tooltip" => description} or false and errorMSG
	*/
	function getPMSlink($toid, $fromid, $subject, $message, $kind) {
	}
	/**
	* gets PMS system capabilities
	* @return mixed array of string {'subject' => boolean ,'body' => boolean} or false if ErrorMSG generated
	*/
	function getPMScapabilites() {
	}
	/**
	* gets PMS unread messages count
	* @param	int user id
	* @return	mixed number of messages unread by user $userid or false if ErrorMSG generated
	*/
	function getPMSunreadCount($userid) {
	}
}


// ----- NO MORE CLASSES OR FUNCTIONS PASSED THIS POINT -----
// Post class declaration initialisations
// some version of PHP don't allow the instantiation of classes
// before they are defined

global $_PLUGINS;
/** @global cbPluginHandler $_PLUGINS */
$_PLUGINS = new cbPluginHandler();


?>
