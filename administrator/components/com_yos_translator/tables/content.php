<?php
/**
 * Customers table class
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */
// no direct access
defined('_JEXEC') or die('Restricted access');


/**
 * Content Table class
 *
 * @package    yos_translator
 * @subpackage Components
 */
class TableContent extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * title
	 * @var string
	 */
	var $title = '';
	
	/**
	 * alias
	 * @var string
	 */
	var $alias = '';
	
	/**
	 * title_alias
	 * @var string
	 */
	var $title_alias = '';
	
	/**
	 * introtext
	 * @var string
	 */
	var $introtext = '';
	
	/**
	 * fulltext
	 * @var string
	 */
	var $fulltext = '';
	
	/**
	 * state
	 * @var tinyint(3)
	 */
	var $state = 0;
	
	/**
	 * sectionid
	 * @var int(11)
	 */
	var $sectionid = 0;
	
	/**
	 * mask
	 * @var string
	 */
	var $mask = 0;
	
	/**
	 * catid
	 * @var int(11)
	 */
	var $catid = 0;
	
	/**
	 * created
	 * @var datetime
	 */
	var $created = '0000-00-00 00:00:00';
	
	/**
	 * created_by
	 * @var int(11)
	 */
	var $created_by = 0;
	
	/**
	 * created_by_alias
	 * @var string
	 */
	var $created_by_alias = '';
	
	/**
	 * modified
	 * @var datetime
	 */
	var $modified = '0000-00-00 00:00:00';
	
	/**
	 * modified_by
	 * @var int(11)
	 */
	var $modified_by = 0;
	
	/**
	 * checked_out
	 * @var int(11)
	 */
	var $checked_out = 0;
	
	/**
	 * checked_out_time
	 * @var datetime
	 */
	var $checked_out_time = '0000-00-00 00:00:00';
	
	/**
	 * publish_up
	 * @var datetime
	 */
	var $publish_up = '0000-00-00 00:00:00';
	
	/**
	 * publish_down
	 * @var datetime
	 */
	var $publish_down = '0000-00-00 00:00:00';
	
	/**
	 * images
	 * @var text
	 */
	var $images = '';
	
	/**
	 * urls
	 * @var text
	 */
	var $urls = '';
	
	/**
	 * attribs
	 * @var text
	 */
	var $attribs = '';
	
	/**
	 * version
	 * @var int(11)
	 */
	var $version = 0;
	
	/**
	 * parentid
	 * @var int(11)
	 */
	var $parentid = 0;
	
	/**
	 * ordering
	 * @var int(11)
	 */
	var $ordering = 0;
	
	/**
	 * metakey
	 * @var text
	 */
	var $metakey = '';
	
	/**
	 * metadesc
	 * @var text
	 */
	var $metadesc = '';
	
	/**
	 * access
	 * @var int(11)
	 */
	var $access = 0;
	
	/**
	 * hits
	 * @var int(11)
	 */
	var $hits = 0;
	
	/**
	 * metadata
	 * @var text
	 */
	var $metadata = '';
	

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function TableContent(& $db) {
		parent::__construct('#__content', 'id', $db);
	}
}
?>
