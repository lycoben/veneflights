<?php
/**
 * @version		$Id: jxform.php 91 2008-07-24 07:05:44Z eddieajau $
 * @package		JXtended
 * @subpackage	Forms
 * @copyright	(C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Utility class for javascript behaviors
 *
 * @static
 * @package		JXtended
 * @subpackage	Forms
 */
class JHTMLJXForm
{
	/**
	 * @param
	 */
	function decorator( &$field, $value = null )
	{
		static $exists = null;

		if ($exists === null) {
			$exists = array();
		}

		// Prime the result
		$result = $value;

		// Get the type from the field if one was supplied
		if ($type = JFilterInput::clean( $field->get( 'decorator.type' ), 'word' )) {
			if (!isset( $exists[$type] )) {
				$exists[$type] = null;

				// check if the file exists
				$path = dirname( __FILE__ ).DS.'decorators'.DS.$type.'.php';
				if (is_file( $path )) {
					require_once( $path );

					// check if the class exists
					$className = 'JXDecorator'.ucfirst( $type ) ;
					if (class_exists( $className )) {
						// Cache the classname
						$exists[$type] = $className;
					}
				}
			}

			// The result defaults to the value
			if (($className = $exists[$type])) {
				if (is_callable( array( $className, 'render' ) )) {
					$result = call_user_func( array( $className, 'render' ), $value, $field->get( 'decorator.text' ), $field->get( 'decorator.options' ) );
				}
			}
		}

		return $result;
	}
}