<?php
/**
 * @version		$Id: observer.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Base
 * @copyright	Copyright (C) 2005-2008 Open Source Matters. All rights reserved.
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

/**
 * Abstract observer class to implement the observer design pattern.
 *
 * @abstract
 * @package		JXtended
 * @subpackage	Base
 * @version		1.0
 */
class JXObserver extends JObject {

	/**
	 * Event object to observe
	 *
	 * @access private
	 * @var object
	 */
	var $_subject = null;

	/**
	 * Constructor
	 */
	function __construct(& $subject)
	{
		// Register the observer ($this) so we can be notified
		$subject->attach($this);

		// Set the subject to observe
		$this->_subject = & $subject;
	}

	/**
	 * Method to update the state of observable objects
	 *
	 * @abstract Implement in child classes
	 * @access public
	 * @return mixed
	 */
	function update() {
		return JError::raiseError('9', 'JObserver::update: Method not implemented', 'This method should be implemented in a child class');
	}
}

/**
 * Abstract observer class to implement the observer design pattern
 *
 * @abstract
 * @package		Joomla.Framework
 * @subpackage	Base
 * @since		1.5
 */
class JXObserverBubble extends JXObservable {

	/**
	 * Event object to observe
	 *
	 * @access private
	 * @var object
	 */
	var $_subject = null;

	/**
	 * Constructor
	 */
	function __construct(& $subject)
	{
		// Register the observer ($this) so we can be notified
		$subject->attach($this);

		// Set the subject to observe
		$this->_subject = & $subject;

		parent::__construct();
	}

	/**
	 * Method to update the state of observable objects
	 *
	 * @abstract Implement in child classes
	 * @access public
	 * @return mixed
	 */
	function update() {
		return JError::raiseError('9', 'JObserver::update: Method not implemented', 'This method should be implemented in a child class');
	}
}

/**
 * Abstract observable class to implement the observer design pattern
 *
 * @abstract
 * @package		Joomla.Framework
 * @subpackage	Base
 * @since		1.5
 */
class JXObservable extends JObject
{
	/**
	 * An array of Observer objects to notify
	 *
	 * @access private
	 * @var array
	 */
	var $_observers = array();

	/**
	 * The state of the observable object
	 *
	 * @access private
	 * @var mixed
	 */
	var $_state = null;


	/**
	 * Constructor
	 */
	function __construct() {
		$this->_observers = array();
	}

	/**
	 * Get the state of the JObservable object
	 *
	 * @access public
	 * @return mixed The state of the object
	 * @since 1.5
	 */
	function getState() {
		return $this->_state;
	}

	/**
	 * Update each attached observer object and return an array of their return values
	 *
	 * @access public
	 * @return array Array of return values from the observers
	 * @since 1.5
	 */
	function notify()
	{
		// Iterate through the _observers array
		foreach ($this->_observers as $observer) {
			$return[] = $observer->update();
		}
		return $return;
	}

	/**
	 * Attach an observer object
	 *
	 * @access public
	 * @param object $observer An observer object to attach
	 * @return void
	 * @since 1.5
	 */
	function attach( &$observer)
	{
		// Make sure we haven't already attached this object as an observer
		if (is_object($observer))
		{
			$class = get_class($observer);
			foreach ($this->_observers as $check) {
				if (is_a($check, $class)) {
					return;
				}
			}
			$this->_observers[] =& $observer;
		} else {
			$this->_observers[] =& $observer;
		}
	}

	/**
	 * Detach an observer object
	 *
	 * @access public
	 * @param object $observer An observer object to detach
	 * @return boolean True if the observer object was detached
	 * @since 1.5
	 */
	function detach( $observer)
	{
		// Initialize variables
		$retval = false;

		$key = array_search($observer, $this->_observers);

		if ( $key !== false )
		{
			unset($this->_observers[$key]);
			$retval = true;
		}
		return $retval;
	}
}