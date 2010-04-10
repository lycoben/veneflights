<?php
/**
 * @version		$Id: view.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Application
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 *
 */

defined('JPATH_BASE') or die;

/**
 * Module View
 *
 * @package		JXtended
 * @subpackage	Application
 */
class JModuleView extends JObject
{
	/**
	 * @var	string	Name
	 */
	var $_name = null;

	/**
	 * @var	string	Layout path
	 */
	var $_layout = null;

	/**
	 * @var	object	Parameters
	 */
	var $params = null;

	/**
	 * @var	string
	 */
	var $baseurl = null;

	function __construct( $name, &$params )
	{
		$this->_name	=& $name;
		$this->params	=& $params;
		$this->_layout	= 'default';
		$this->baseurl  = JURI::base( true );
	}

	/**
	 * @return	boolean
	 */
	function init()
	{
		return true;
	}

	/**
	 * @param	string
	 */
	function setLayout( $layout )
	{
		$this->_layout = $layout;
	}

	/**
	 * Assign variable for the view
	 *
	 * @access public
	 *
	 * @param	string	$key	The name for the reference in the view.
	 * @param	mixed	$val	The variable.
	 *
	 * @return	bool	True on success, false on failure.
	 */
	function assign( $key, $val )
	{
		if (is_string($key) && substr($key, 0, 1) != '_')
		{
			$this->$key = $val;
			return true;
		}

		return false;
	}

	/**
	 * Assign variable for the view (by reference).
	 *
	 * @access public
	 *
	 * @param	string	$key	The name for the reference in the view.
	 * @param	mixed	&$val	The referenced variable.
	 *
	 * @return	bool	True on success, false on failure.
	 */
	function assignRef( $key, &$val )
	{
		if (is_string($key) && substr($key, 0, 1) != '_')
		{
			$this->$key =& $val;
			return true;
		}

		return false;
	}

	function display( $tpl = null )
	{
		if ($this->init())
		{
			$this->setLayout( $this->params->get( 'layout', 'default' ) );
			echo $this->loadTemplate( $tpl );
		}
	}

	/**
	 * Load a template file -- first look in the templates folder for an override
	 *
	 * @access	public
	 * @param	string	$tpl The name of the template source file ...
	 * @return	string	The output of the the template script.
	 */
	function loadTemplate( $tpl = null )
	{
		global $mainframe, $option;

		//create the template file name based on the layout
		$file	= isset( $tpl ) ? $this->_layout.'_'.$tpl : $this->_layout;
		// clean the file name
		$file	= preg_replace('/[^A-Z0-9_\.-]/i', '', $file);
		$tpl	= preg_replace('/[^A-Z0-9_\.-]/i', '', $tpl);

		$path	= JModuleHelper::getLayoutPath( $this->_name, $file );

		if ($path != false)
		{
			// unset so as not to introduce into template scope
			unset( $tpl );
			unset( $file );

			// never allow a 'this' property
			if (isset( $this->this )) {
				unset( $this->this );
			}

			// start capturing output into a buffer
			ob_start();
			require $path;
			$output = ob_get_contents();
			ob_end_clean();

			return $output;
		}
		else {
			return JError::raiseError( 500, 'Layout "' . $file . '" not found' );
		}
	}
}