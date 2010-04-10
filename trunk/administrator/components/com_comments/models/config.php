<?php
/**
 * @version		$Id: config.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// import library dependencies
jimport('joomla.application.component.model');

/**
 * The JXtended Comments configuration model
 *
 * @package	Comments
 * @version	1.0
 */
class CommentsModelConfig extends JModel
{
	/**
	 * Flag to indicate model state initialization.
	 *
	 * @access	protected
	 * @var		boolean
	 */
	var $__state_set		= null;

	/**
	 * Overridden method to get model state variables.
	 *
	 * @access	public
	 * @param	string	$property	Optional parameter name.
	 * @return	object	The property where specified, the state object where omitted.
	 * @since	1.0
	 */
	function getState($property = null)
	{
		// if the model state is uninitialized lets set some values we will need from the request.
		if (!$this->__state_set)
		{
			// load the component configuration parameters.
			$this->setState('config', JComponentHelper::getParams('com_comments'));

			$this->__state_set = true;
		}

		return parent::getState($property);
	}

	/**
	 * Method to save the component configuration
	 *
	 * @access	public
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function save()
	{
		// initialize variables.
		$table			= &JTable::getInstance('component');
		$params 		= JRequest::getVar('params', array(), 'post', 'array');
		$row			= array();
		$row['option']	= 'com_comments';
		$row['params']	= $params;

		// load the component data for com_comments
		if (!$table->loadByOption('com_comments')) {
			$this->setError($table->getError());
			return false;
		}

		// bind the new values
		$table->bind($row);

		// check the row.
		if (!$table->check()) {
			$this->setError($table->getError());
			return false;
		}

		// store the row.
		if (!$table->store()) {
			$this->setError($table->getError());
			return false;
		}

		return true;
	}

	/**
	 * Method to import the component configuration
	 *
	 * @access	public
	 * @param	string	$data	The configuration string in INI format.
	 * @return	boolean	True on success
	 * @since	1.0
	 */
	function import($data = null)
	{
		// load the component data for com_comments
		$table = &JTable::getInstance('component');
		if (!$table->loadByOption('com_comments')) {
			$this->setError($table->getError());
			return false;
		}

		// set the new configuration values
		$table->set('params', $data);

		// check the row.
		if (!$table->check()) {
			$this->setError($table->getError());
			return false;
		}

		// store the row.
		if (!$table->store()) {
			$this->setError($table->getError());
			return false;
		}

		return true;
	}

	/**
	 * Method to block either an email address or an IP from submitting data
	 *
	 * @access	public
	 * @param	string	$type	The type of entity to block (eg. email, ip)
	 * @param	array	$ids	The items to extract block data from
	 * @return	mixed	Boolean true on success, or JException on failure
	 * @since	1.0
	 */
	function block($type, $ids)
	{
		// make sure we have addresses to block
		if (empty($ids)) {
			return new JException('No item(s) supplied');
		}

		// sanitize array
		jimport('joomla.utilities.arrayhelper');
		JArrayHelper::toInteger($ids);

		// get the data to set based on the block type
		switch ($type)
		{
			case 'address':
				// get a database connection object
				$db	= &$this->getDBO();

				// get the list of addresses to block
				$db->setQuery(
					'SELECT `address`' .
					' FROM `#__jxcomments_comments`' .
					' WHERE `id` IN ('.implode(',', $ids).')'
				);
				if ($list = $db->loadResultArray())
				{
					// load the component data for com_comments
					$table = &JTable::getInstance('component');
					if (!$table->loadByOption('com_comments')) {
						$this->setError($table->getError());
						return false;
					}

					// get the existing blocked addresses and add the new ones to it
					$params = new JParameter($table->params);
					$blocked = $params->get('blockips');
					foreach (explode( ',', $blocked ) as $ip)
					{
						if ($ip = trim($ip)) {
							$list[]	= trim($ip);
						}
					}

					// remove duplicates and set the blocked addresses in the configuration object
					$list = array_unique($list);
					$params->set('blockips', implode(', ', $list));
					$table->set('params', $params->toString());

					// check the row.
					if (!$table->check()) {
						$this->setError($table->getError());
						return false;
					}

					// store the row.
					if (!$table->store()) {
						$this->setError($table->getError());
						return false;
					}
					return true;
				}
				break;

			default:
				return new JException('Unknown block type');
				break;
		}
	}
}