<?php
/**
 * @version		$Id: view.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	Copyright (C) 2007-2008 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport( 'joomla.registry.registry' );
jximport( 'jxtended.form.field' );

if( !defined( 'FORM_FIELD_INCLUDE_PATH' ) ) {
	define( 'FORM_FIELD_INCLUDE_PATH', dirname( __FILE__ ).DS.'fields' );
}

/**
 * Form view object
 *
 * @package		JXtended
 * @subpackage	Forms
 */
class JXFormView extends JRegistry
{
	/**
	 * Loaded form field type opjects
	 * @access	private
	 * @var		array
	 */
	var $_fieldTypes = array();

	/**
	 * Folders to search for form field objects
	 * @access	private
	 * @var		array
	 */
	var $_fieldFolders = array();

	/**
	 * Form action URL
	 * @access	private
	 * @var		string
	 */
	var $_action = null;

	/**
	 * Form id
	 * @access	private
	 * @var		string
	 */
	var $_id = null;

	/**
	 * Form name
	 * @access	private
	 * @var		string
	 */
	var $_name = null;

	/**
	 * Form is multi-part (includes an upload control)
	 * @access	private
	 * @var		boolean
	 */
	var $_multipart;

	/**
	 * Form Descriptor
	 * @access	private
	 * @var		array
	 */
	var $_descriptor = array();

	var $_layouts = null;

	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	string	$descriptor	XML Form descriptor string
	 * @param	string	$data		INI Form value data string
	 * @return	void
	 * @since	1.5
	 */
	function __construct($descriptor = null, $data = null)
	{
		parent::__construct('_default');

		$this->_load( $descriptor, false );

		if (trim( $data )) {
			$this->loadINI( $data );
		}

		JHTML::addIncludePath( dirname( __FILE__ ).DS.'html' );
	}

	/**
	 * @param	string	String data, or a file name
	 * @param	boolean
	 */
	function _load( $data, $fromFile = false )
	{
		// Initialize variables
		$result = false;

		if ($data) {
			$xml	= & JFactory::getXMLParser('Simple');
			$loaded	= $fromFile ? $xml->loadFile( $data ) : $xml->loadString( $data );

			if ($loaded) {
				if ($fieldsets = & $xml->document->fields) {
					foreach ($fieldsets as $fields)
					{
						$this->loadFieldsXML( $fields, true );
						$result = true;
					}
				}
				if ($action =& $xml->document->action[0]) {
					$this->setAction($action->data());
				}
				//$this->setName($xml->document->attributes('control'));
			}
		}
		return $result;
	}

	/**
	 * Loads a form view xml file and set form descriptor information
	 *
	 * @access	public
	 * @param	string	$path	Path to the form view xml file
	 * @return	boolean	True if successful
	 * @since	1.5
	 */
	function loadFormFile($path)
	{
		return $this->_load( $path, true );
	}

	/**
	 * Loads a form view xml string and set form descriptor information
	 *
	 * @access	public
	 * @param	string	$descriptor	XML Form descriptor string
	 * @return	boolean	True if successful
	 * @since	1.5
	 */
	function loadFormString($descriptor)
	{
		return $this->_load( $descriptor, false );
	}

	/**
	 * Set a field value
	 *
	 * @access	public
	 * @param	string	The name of the field
	 * @param	string	The value of the field
	 * @param	string	The form field group
	 * @return	string	The set value
	 * @since	1.5
	 */
	function set($key, $value = '', $group = '_default')
	{
		$this->setValue($group.'.'.$key, (string) $value);
		return $this->getValue($group.'.'.$key);
	}

	/**
	 * Get a field value
	 *
	 * @access	public
	 * @param	string	The name of the field
	 * @param	mixed	The default value of the field
	 * @param	string	The form field group
	 * @return	string	The field value
	 * @since	1.5
	 */
	function get($key, $default = '', $group = '_default')
	{
		$value	= $this->getValue($group.'.'.$key);
		$result	= (empty($value) && ($value !== 0) && ($value !== '0')) ? $default : $value;
		return $result;
	}

	/**
	 * Sets a default value if not alreay assigned
	 *
	 * @access	public
	 * @param	string	The name of the field
	 * @param	mixed	The default value of the field
	 * @param	string	The form field group
	 * @return	string	The field value
	 * @since	1.5
	 */
	function def($key, $value = '', $group = '_default')
	{
		return $this->set($key, $this->get($key, (string) $value, $group), $group);
	}

	/**
	 * Bind data to the form
	 *
	 * @access	public
	 * @param	mixed	$data	Array or Object
	 * @param	string	The form field group
	 * @return	boolean	True if the data was successfully bound
	 * @since 1.5
	 */
	function bind($data, $group = '_default')
	{
		if ( is_array($data) ) {
			return $this->loadArray($data, $group);
		} elseif ( is_object($data) ) {
			return $this->loadObject($data, $group);
		}
		// Not an object or an array... can't help you :)
		return false;
	}

	/**
	 * Get the form action URL
	 *
	 * @access	public
	 * @param	string	$default	Default action URL if internal action URL is not set
	 * @return	string	Form action URL
	 * @since	1.5
	 */
	function getAction($default = null)
	{
		return ($this->_action) ? $this->_action : $default;
	}
	/**
	 * Set the form action URL
	 *
	 * @access	public
	 * @param	string	$action	Form action URL to set
	 * @return	void
	 * @since	1.5
	 */
	function setAction($action)
	{
		$this->_action = $action;
	}

	/**
	 * Get the form id
	 *
	 * @access	public
	 * @param	string	$default	Default id if internal id is not set
	 * @return	string	Form id
	 * @since	1.5
	 */
	function getId($default = null)
	{
		return ($this->_id) ? $this->_id : $default;
	}

	/**
	 * Get the form name
	 *
	 * @access	public
	 * @param	string	$default	Default name if internal name is not set
	 * @return	string	Form name
	 * @since	1.5
	 */
	function getName($default = null)
	{
		return ($this->_name) ? $this->_name : $default;
	}

	/**
	 * Set the form id
	 *
	 * @access	public
	 * @param	string	$value	Form id to set
	 * @return	void
	 * @since	1.5
	 */
	function setId($value)
	{
		$this->_id = $value;
	}

	/**
	 * Set the form name
	 *
	 * @access	public
	 * @param	string	$value	Form tag name
	 * @return	void
	 * @since	1.5
	 */
	function setName($value)
	{
		$this->_name = $value;
	}

	/**
	 * Loads form fields from an XML element optionally reseting fields before loading new ones.
	 *
	 * @access	public
	 * @param	object	$xml	An XML object
	 * @param	boolean	$reset	True to reset fields before adding new ones
	 * @return	void
	 * @since	1.5
	 */
	function loadFieldsXML( &$xml, $reset = true )
	{
		if (is_object( $xml ))
		{
			$group = ($xml->attributes('group')) ? $xml->attributes('group') : '_default';
			if ($reset) {
				$this->setFields($xml->children(), $group);
			} else {
				$this->addFields($xml->children(), $group);
			}
			if ($folder = $xml->attributes( 'addfieldfolder' )) {
				$this->addFieldFolder( JPATH_ROOT.$folder );
			}
		}
	}

	/**
	 * Add a field to a group
	 *
	 * @access	public
	 * @param	object	$field	Form field object to add
	 * @param	string	$group	Group to add the field to
	 * @return	void
	 * @since	1.5
	 */
	function addField( &$field, $group = '_default' )
	{
		$this->_descriptor[$group][] = &$field;
	}

	/**
	 * Add an array of fields to a group
	 *
	 * @access	public
	 * @param	array	$fields	Array of form field objects to add
	 * @param	string	$group	Group to add the fields to
	 * @return	void
	 * @since	1.5
	 */
	function addFields( $fields, $group = '_default' )
	{
		$this->_descriptor[$group] = array_merge($this->_descriptor[$group], $fields);
	}

	/**
	 * Set an array of fields to a group replacing any currently set fields
	 *
	 * @access	public
	 * @param	array	$fields	Array of form field objects to set
	 * @param	string	$group	Group to set the fields to
	 * @return	void
	 * @since	1.5
	 */
	function setFields( $fields, $group = '_default' )
	{
		$this->_descriptor[$group] = $fields;
	}

	/**
	 * Render the field group in plain format
	 *
	 * @access	public
	 * @param	string	$legend			The fieldset legend
	 * @param	string	$controlName	The control name for the form field group
	 * @param	string	$group			The form field group
	 * @param	string	$options		Named array of options for display (include|exclude array or comma list of field names)
	 * @return	string	HTML
	 * @since	1.5
	 */
	function render($controlName = 'jxform', $group = '_default', $options = array() )
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}
		$fields = $this->getFields($controlName, $group);

		if (!count($fields)) {
			return;
		}

		// white-list: only include a list of fields
		$includeList	= null;
		if (isset( $options['include'] ))
		{
			if (is_array( $options['include'] )) {
				$includeList	= &$options['include'];
			} else {
				$includeList	= explode( ',', $options['include'] );
			}
		}

		// black-list: include all but fields listed
		$excludeList	= null;
		if (isset( $options['exclude'] ))
		{
			// only include a list of fields
			if (is_array( $options['exclude'] )) {
				$excludeList	= &$options['exclude'];
			} else {
				$excludeList	= explode( ',', $options['exclude'] );
			}
		}

		$html	= array ();
		$hidden	= array();
		foreach ($fields as $field)
		{
			if ($includeList and !$excludeList and !in_array( $field->name, $includeList )) {
				continue;
			}
			else if ($excludeList and !$includeList and in_array( $field->name, $excludeList )) {
				continue;
			}
			if (!$field->get('field')) {
				continue;
			}

			if ($field->type == 'Hidden')
			{
				$hidden[]	= $field->get('field');
			}
			else
			{
				$html[] = $field->get('label');
				$html[] = $field->get('field');
			}
		}

		return implode( "\n", $html )."\n".implode( "\n", $hidden );
	}

	/**
	 * Render the field group to an ordered list
	 *
	 * @access	public
	 * @param	string	$legend			The fieldset legend
	 * @param	string	$controlName	The control name for the form field group
	 * @param	string	$group			The form field group
	 * @return	string	HTML
	 * @since	1.5
	 */
	function renderToOL($legend = null, $controlName = 'jxform', $group = '_default')
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}
		$fields = $this->getFields($controlName, $group);

		if (!count($fields)) {
			return;
		}

		$html = array ();
		$html[] = '<fieldset>';

		// If legend is set add the fieldset legend
		if ($legend) {
			$html[] = '	<legend>'.$legend.'</legend>';
		}

		$html[] = '	<ol>';
		foreach ($fields as $field)
		{
			if (!$field->get('field')) {
				continue;
			}

			$html[] = '		<li>';
			$html[] = '			'.$field->get('label');
			$html[] = '			'.$field->get('field');
			$html[] = '		</li>';
		}

		$html[] = '	</ol>';
		$html[] = '</fieldset>';

		return implode("\n", $html);
	}

	/**
	 * Render the field group to a table
	 *
	 * @access	public
	 * @param	string	$legend			The fieldset legend
	 * @param	string	$controlName	The control name for the form field group
	 * @param	string	$group			The form field group
	 * @return	string	HTML
	 * @since	1.5
	 */
	function renderToFieldset($legend = null, $controlName = 'jxform', $group = '_default', $options = array())
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}

		$html = array ();
		$html[] = '<fieldset>';

		// If legend is set add the fieldset legend
		if ($legend) {
			$html[] = '	<legend>'.$legend.'</legend>';
		}
		$html[] = $this->renderToTable( $controlName, $group );
		$html[] = '</fieldset>';

		return implode("\n", $html);

	}

	/**
	 * Render the field group to a table
	 *
	 * @access	public
	 * @param	string	$legend			The fieldset legend
	 * @param	string	$controlName	The control name for the form field group
	 * @param	string	$group			The form field group
	 * @param	string	$options		Named array of options for display (include|exclude array or comma list of field names)
	 * @return	string	HTML
	 * @since	1.5
	 */
	function renderToTable($controlName = 'jxform', $group = '_default', $options = array() )
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}
		$fields = $this->getFields($controlName, $group);

		if (!count($fields)) {
			return;
		}

		// white-list: only include a list of fields
		$includeList	= null;
		if (isset( $options['include'] ))
		{
			if (is_array( $options['include'] )) {
				$includeList	= &$options['include'];
			} else {
				$includeList	= explode( ',', $options['include'] );
			}
		}

		// black-list: include all but fields listed
		$excludeList	= null;
		if (isset( $options['exclude'] ))
		{
			// only include a list of fields
			if (is_array( $options['exclude'] )) {
				$excludeList	= &$options['exclude'];
			} else {
				$excludeList	= explode( ',', $options['exclude'] );
			}
		}

		$html	= array ();
		$hidden	= array();
		$html[]	= '	<table class="admintable">';
		foreach ($fields as $field)
		{
			if ($includeList and !$excludeList and !in_array( $field->name, $includeList )) {
				continue;
			}
			else if ($excludeList and !$includeList and in_array( $field->name, $excludeList )) {
				continue;
			}
			if (!$field->get('field')) {
				continue;
			}

			if ($field->type == 'Hidden')
			{
				$hidden[]	= $field->get('field');
			}
			else
			{
				$html[] = '		<tr>';
				$html[] = '			<td scope="row" class="key">'.$field->get('label').'</td>';
				$html[] = '			<td>'.$field->get('field').'</td>';
				$html[] = '		</tr>';
			}
		}

		$html[] = '	</table>';

		return implode( "\n", $html ).implode( "\n", $hidden );
	}

	/**
	 * Return the form head string
	 *
	 * @access	public
	 * @return	string	Form header eg. <form>
	 * @since	1.5
	 */
	function getHead()
	{
		jximport( 'joomla.filter.output' );
		$id			= $this->getId();
		$name		= $this->getName( $id );
		$action		= JFilterOutput::ampReplace( $this->getAction() );
		$enctype	= $this->_multipart ? ' enctype="multipart/form-data"' : '';
		return '<form id="'.$id.'-form" class="form-validate" name="'.$name.'" method="post" action="'.$action.'"'.$enctype.'>';
	}

	/**
	 * Return the form foot string
	 *
	 * @access	public
	 * @return	string	Form footer eg. </form>
	 * @since	1.5
	 */
	function getFoot($tokens = true, $randomize = false)
	{
		jximport( 'joomla.utilities.utility' );
		$html	= null;

		if ($tokens) {
			$token	= JUtility::getToken();
			$random = md5(rand());
			$rand	= rand(1000, 9999);
			$rand2	= rand(1000, 9999);

			if ($randomize) {
				if (rand() % 2) {
					$html .= '<input type="hidden" name="'.$token.'" value="'.$rand.'" />';
					$html .= '<input type="hidden" name="'.$random.'" value="'.$rand2.'" />';
				} else {
					$html .= '<input type="hidden" name="'.$random.'" value="'.$rand2.'" />';
					$html .= '<input type="hidden" name="'.$token.'" value="'.$rand.'" />';
				}
			} else {
				$html .= '<input type="hidden" name="'.$token.'" value="'.$rand.'" />';
				$html .= '<input type="hidden" name="'.$random.'" value="'.$rand2.'" />';
			}
		}

		$html .= '<input type="hidden" name="JXForm_id" value="'.$this->_id.'" />';

		$html .= '</form>';

		return $html;
	}

	/**
	 * Return number of form fields for a given group
	 *
	 * @access	public
	 * @return	mixed	Boolean false if no fields exist or integer number of fields that exist
	 * @since	1.5
	 */
	function getNumFields($group = '_default')
	{
		if (!isset($this->_descriptor[$group]) || !count($this->_descriptor[$group]->children())) {
			return false;
		} else {
			return count($this->_descriptor[$group]->children());
		}
	}

	/**
	 * Get the number of form fields in each group
	 *
	 * @access	public
	 * @return	array	Associative array of form field groups => number of fields in the group
	 * @since	1.5
	 */
	function getGroups()
	{
		if (!is_array($this->_descriptor)) {
			return false;
		}
		$results = array();
		foreach ($this->_descriptor as $name => $group)
		{
			$results[$name] = $this->getNumFields($name);
		}
		return $results;
	}

	/**
	 * Get a node
	 *
	 * @param	string	The attribute to search on
	 * @param	string	The attribute value to match
	 * @param	string	$group			The form field group
	 *
	 * @return	mixed
	 */
	function &getNode( $attribute, $value, $group = '_default' )
	{
		$result = false;
		if (isset($this->_descriptor[$group])) {
			foreach ($this->_descriptor[$group] as $i => $node) {
				if ($node->attributes( $attribute ) === $value) {
					$result = &$node;
					break;
				}
			}
		}
		return $result;
	}

	/**
	 * Returns a named array of labels and values
	 *
	 * @access	public
	 * @param	string	$group			The form field group
	 * @return	array	Associative array
	 * @since	1.5
	 */
	function getData($group = '_default')
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}
		$results = array();
		foreach ($this->_descriptor[$group] as $node) {
			$results[$node->attributes('label')] = $this->get( $node->attributes('name'), $node->attributes('default') );
		}
		return $results;
	}

	/**
	 * Render a form field group to an associative array by field name
	 *
	 * @access	public
	 * @param	string	$controlName	The control name for the form field group
	 * @param	string	$group			The form field group
	 * @return	array	Associative array of rendered Form Field object by field name
	 * @since	1.5
	 */
	function getFields($controlName = 'jxform', $group = '_default')
	{
		if (!isset($this->_descriptor[$group])) {
			return false;
		}
		$results = array();
		foreach ($this->_descriptor[$group] as $node) {
			$results[$node->attributes('name')] = $this->getField($node, $controlName, $group);
		}
		/*
		for ($i = 0, $n = count( $this->_descriptor[$group] ); $i < $n; $i++)
		{
			$node	= &$this->_descriptor[$group][$i];
			$results[$node->attributes('name')] = $this->getField($node, $controlName, $group);
		}
		*/

		return $results;
	}

	/**
	 * Render a form field
	 *
	 * @access	public
	 * @param	object	$node			An JXFormField object
	 * @param	string	$controlName	The field control name
	 * @param	string	$group			The form field group
	 * @return	object	Rendered Form Field object
	 * @since	1.5
	 */
	function getField(&$node, $controlName = 'jxform', $group = '_default')
	{
		// get the field type
		$type = $node->attributes('type');

		// get the field value
		// TODO: this is a fudge to get around loadObject that spans all groups
		$value = $this->get($node->attributes('name'), $node->attributes('default')/*, $group*/);

		// load the field type object
		$field =& $this->loadFieldType($type);

		// field type could not be loaded -- just return some basic information
		if ($field === false) {
			$field =& $this->loadFieldType('text');
			/*
			$result = new JObject();
			$result->set('type', $type);
			$result->set('name', $node->attributes('name'));
			$result->set('value', $value);
			$result->set('label', $node->attributes('label'));
			$result->set('field', 'Unknown type '.$type );
			return $result;
			*/
		}

		return $field->render($node, $value, $controlName);
	}

	/**
	 * Loads a form field type object
	 *
	 * @access	public
	 * @param	string	Form field type
	 * @return	mixed	Form field type object or boolean false on failure
	 * @since	1.5
	 */
	function &loadFieldType( $type, $new = false )
	{
		$false = false;
		$signature = md5( $type  );

		if( isset( $this->_fieldTypes[$signature] ) && $new === false ) {
			return	$this->_fieldTypes[$signature];
		}

		if( !class_exists( 'JXFieldType' ) ) {die('oops');
			jximport( 'jxtended.form.field' );
		}

		if ($pos = strpos( $type, '_' ))
		{
			// what we are doing here is some smart loading of derived field types
			$baseType = substr( $type, 0, $pos );
			$this->loadFieldType( $baseType );
		}

		$typeClass = 'JXFieldType'.ucfirst($type);

		if( !class_exists( $typeClass ) )
		{
			if( isset( $this->_fieldFolders ) ) {
				$folders = $this->_fieldFolders;
			} else {
				$folders = array();
			}

			// Last we push the base include path into the queue
			array_push( $folders, $this->getIncludePath());

			// TODO: Can we use the built in JPath::find method here?
			$found = false;
			$n		= count( $folders );
			for ($i = $n - 1; $i >= 0; $i--)
			{
				$typeFile = sprintf( '%s'.DS.'%s.php', $folders[$i], str_replace( '_', DS, $type ) );
				if (file_exists( $typeFile ))
				{
					require_once( $typeFile );
					$found = true;
					break;
				}
			}

			if (!$found) {
				return $false;
			}
		}

		if( !class_exists( $typeClass ) ) {
			return $false;
		}
		$this->_fieldTypes[$signature] = new $typeClass($this);

		return $this->_fieldTypes[$signature];
	}

	/**
	 * Add a folder where JXFormView should search for form field objects
	 *
	 * You may either pass a string or an array of strings.
	 *
	 * JXFormView will be searching for form field objects in the same
	 * order you added them. If the object cannot be found in the custom folders,
	 * it will look in the base include path.
	 *
	 * @access	public
	 * @param	mixed	$folder	Folder or folders to search for form field objects.
	 * @return	void
	 * @since	1.5
	 */
	function addFieldFolder( $folder )
	{
		if( is_array( $folder ) ) {
			$this->_fieldFolders = array_merge( $this->_fieldFolders, $folder );
		} else {
			array_push( $this->_fieldFolders, $folder );
		}
	}

   /**
	* Get the base form field object include path
	*
	* @access	public
	* @return   string
	* @since	1.5
	*/
	function getIncludePath()
	{
		return	FORM_FIELD_INCLUDE_PATH;
	}
}