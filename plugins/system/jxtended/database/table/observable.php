<?php
/**
 * @version		$Id: observable.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Database
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Abstract Observable Table Class
 *
 * This class implements a hybrid database table row object and
 * an observable object.  When changes are made to the state of
 * the database row, observing objects may need to be notified.
 *
 * @package		JXtended
 * @subpackage	Database
 * @version		1.0
 */
class JXTableObservable extends JTable
{
	/**
	 * An array of observer objects to notify
	 *
	 * @access	private
	 * @var		array
	 */
	var $_observers = array();

	/**
	 * Class constructor
	 *
	 * @param	string	$table	The name of the table to instantiate
	 * @param	string	$key	The name of the table primary key
	 * @param	object	$db		The system database object
	 */
	function __construct($table, $key, &$db)
	{
		$this->_observers	= array();
		$this->_tbl			= $table;
		$this->_tbl_key		= $key;
		$this->_db			= &$db;
	}

	/**
	 * Method to instantiate a new JXTableObservable object.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	string	$type	The table type to instantiate
	 * @param	string	$prefix	A prefix for the table class name
	 * @return	object	A JXTableObservable child object
	 */
	function &getInstance($type, $prefix='JXTableObservable')
	{
		// Initialize variables
		$db		= &JFactory::getDBO();
		$false	= false;
		$type	= preg_replace('/[^A-Z0-9_\.-]/i', '', $type);
		$class	= $prefix.ucfirst($type);

		if (!class_exists($class))
		{
			jximport('joomla.filesystem.path');

			// Search for the table type
			if($path = JPath::find(JTable::addIncludePath(), strtolower($type).'.php'))
			{
				// Include the table
				require_once $path;

				// Check for the table class
				if (!class_exists($class))
				{
					// Error: could not find the table class
					JError::raiseWarning(0, 'Table class '.$class.' not found in file.');
					return $false;
				}
			}
			else
			{
				// Error: could not find the table type
				JError::raiseWarning(0, 'Table '.$type.' not supported. File not found.');
				return $false;
			}
		}

		// Instante the class
		$instance = new $class($db);
		$instance->setDBO($db);

		return $instance;
	}

	/**
	 * Method to update all attached observers and return an
	 * array of the return values.
	 *
	 * @since	1.0
	 * @access	public
	 * @return	array	Array of return values from the observers
	 */
	function notify()
	{
		// Initialize variables
		$return = array();

		// Iterate through the observers array
		foreach ($this->_observers as $observer)
		{
			// Notify the observer
			$return[] = $observer->update();
		}

		return $return;
	}

	/**
	 * Method to attach an observer object.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$observer	An observer object to attach
	 * @return	void
	 */
	function attach(&$observer)
	{
		// Check if the observer is an object
		if (is_object($observer))
		{
			// Get the class of the observer
			$class = get_class($observer);

			// Check that the observer is not already attached
			foreach ($this->_observers as $check)
			{
				if (is_a($check, $class))
				{
					return;
				}
			}

			// Attach the object
			$this->_observers[] = &$observer;
		} else {
			$this->_observers[] = &$observer;
		}
	}

	/**
	 * Method to detach an observer object.
	 *
	 * @since	1.0
	 * @access	public
	 * @param	object	$observer	An observer object to detach
	 * @return	boolean	True on success/false on failure
	 */
	function detach($observer)
	{
		// Search for the observer
		$key = array_search($observer, $this->_observers);

		if ($key !== false)
		{
			// Detach the observer
			unset($this->_observers[$key]);
			return true;
		}

		return false;
	}

	function store($updateNulls = false)
	{
		// Initialize variables
		$key = $this->_tbl_key;

		// Check the table
		if (!$this->check())
		{
			return false;
		}

		// Check if we are inserting or updating
		if($this->$key)
		{
			// Update the row
			$return = $this->_db->updateObject( $this->_tbl, $this, $this->_tbl_key, $updateNulls );
		}
		else
		{
			// Insert a new row
			$return = $this->_db->insertObject( $this->_tbl, $this, $this->_tbl_key );
		}

		// Check the return value
		if(!$return)
		{
			// Error: store failed
			$this->setError(get_class($this).'::store failed - '.$this->_db->getErrorMsg());
			$this->setErrorNum($this->_db->getErrorNum());
			return false;
		}

		// Notify observers of a change
		if (!$this->notify())
		{
			return false;
		}

		return true;
	}
}