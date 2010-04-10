<?php
/**
 * @version		1.2
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @copyright	Ossolution Team
 * @license		GPL
 */
defined('_JEXEC') or die('Restricted access');

/**
* Weblink Table class
*
* @package		Joomla
* @subpackage	Weblinks
* @since 1.0
*/
class TableJGtranslation extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * @var int
	 */
	var $language_id = null;

	/**
	 * @var int
	 */
	var $reference_id = null;

	/**
	 * @var string
	 */
	var $reference_table = null;

	/**
	 * @var string
	 */
	var $reference_field = null;

	/**
	 * @var string
	 */
	var $original_value = null;
	/**
	 * The original text
	 *
	 * @var string
	 */
	var $original_text = null;
	/**
	 * The translated value
	 *
	 * @var string
	 */
	var $value = null;
	/**
	 * @var datetime
	 */
	var $modified = null;

	/**
	 * @var int
	 */
	var $modified_by = null;

	/**
	 * @var int
	 */
	var $published = null;
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.5
	 */
	function __construct(& $db) {		
		parent::__construct('#__jf_content', 'id', $db);
	}
}
