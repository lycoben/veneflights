<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
// Set flag that this is an extension parent
DEFINE( '_JCE_EXT', 1 );
class AdvLink extends JContentEditorPlugin {
	/*
	*  @var varchar
	*/
	var $_linkextensions = array();
	/**
	* Constructor activating the default information of the class
	*
	* @access	protected
	*/
	function __construct(){
		parent::__construct();
				
		// Setup XHR callback functions 
		$this->setXHR( array( $this, 'getLinks' ) );
		
		// Set javascript file array
		$this->script( array( 
			'tiny_mce_popup', 
		), 'tiny_mce' );
		$this->script( array( 
			'tiny_mce_utils',
			'mootools',
			'jce',
			'plugin',
			'window',
			'tree'
		) );
		$this->script( array( 'advlink' ), 'plugins' );
		// Set css file array
		$this->css( array( 'plugin', 'tree' ) );
		$this->css( array( 'advlink' ), 'plugins' );
		$this->css( array( 
			'window',
			'dialog'
		), 'skins' );
		$this->loadLanguages();
		
		$extensions = $this->loadExtensions( 'links' );
		
		foreach( $extensions as $extension ){
			if( $extension ){
				if( is_array( $extension ) ){
					foreach( $extension as $sibling ){
						$this->_linkextensions[] = $sibling;
					}
				}else{
					$this->_linkextensions[] = $extension;
				}
			}
		}
	}
	/**
	 * Returns a reference to a plugin object
	 *
	 * This method must be invoked as:
	 * 		<pre>  $advlink = &AdvLink::getInstance();</pre>
	 *
	 * @access	public
	 * @return	JCE  The editor object.
	 * @since	1.5
	 */
	function &getInstance(){
		static $instance;

		if ( !is_object( $instance ) ){
			$instance = new AdvLink();
		}
		return $instance;
	}
	function getLists(){
		$advlink =& AdvLink::getInstance();
		
		$list = '<ul class="root">';
		foreach( $advlink->_linkextensions as $extension ){			
			// Path specified, assume extra files			
			if( $extension['path'] ){
				include_once( $extension['path'] .DS. $extension['file'] );
			}
			$class = 'Advlink' . ucfirst( $extension['name'] );
			if( is_callable( array( $class, 'getOptions' ) ) ){
				$list .= call_user_func( array( $class, 'getOptions' ) );	
			}else{
				// No class file specified, use function instead.
				$list .= call_user_func( $extension['name'] . 'getOptions' );
			}
		}
		$list .= '</ul>';
		return $list;
	}
	function getLinks( $args ){
		$advlink =& AdvLink::getInstance();
		
		foreach( $advlink->_linkextensions as $extension ){
			// Check the prefix of the request
			$option = str_replace( 'com_', '', $args->option );			
			if( $option == $extension['name'] ){
				// Path specified, assume extra files
				if( $extension['path'] ){
					include_once( $extension['path'] .DS. $extension['file'] );
				}
				$class = 'Advlink' . ucfirst( $extension['name'] );
				if( is_callable( array( $class, 'getItems' ) ) ){
					$items = call_user_func( array( $class, 'getItems' ), $args );
				}else{
					// No class file specified, use function instead.
					$items = call_user_func( $extension['name'] . 'getItems', $args );
				}
			}
		}
		$array 	= array();
		$result = array();
		if( isset( $items ) ){
			foreach( $items as $item ){
				$array[] = array(
					'id'		=>	isset( $item['id'] ) ? $advlink->xmlEncode( $item['id'] ) : '',
					'url'		=>	isset( $item['url'] ) ? $advlink->xmlEncode( $item['url'] ) : '',
					'name'		=>	$advlink->xmlEncode( $item['name'] ),
					'class'		=>	$item['class']
				);
			}
			$result[] = array( 
				'folders'	=>	$array
			);
		}
		return $result;
	}
	/**
	 * Category function used by many extensions
	 *
	 * @access	public
	 * @return	Category list object.
	 * @since	1.5
	 */
	function getCategory( $sid ){
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();

		$query	= 'SELECT CONCAT( title, " /", name, "" ) AS text,'
		. ' id AS value,'
		. ' CASE WHEN CHAR_LENGTH(alias) THEN CONCAT_WS(":", id, alias) ELSE id END as slug'
		. ' FROM #__categories'
		. ' WHERE section = '. $db->Quote( $sid )
		. ' AND published = 1'
		. ' AND access <= '.(int) $user->get('aid')
		. ' GROUP BY id'
		. ' ORDER BY title'
		;
		$db->setQuery( $query );
		return $db->loadObjectList();		
	}
	/**
	 * (Attempt to) Get an Itemid
	 *
	 * @access	public
	 * @return	Category list object.
	 * @since	1.5
	 */
	function getItemId( $component ){
		$db	=& JFactory::getDBO();
		$query = 'SELECT id'
		. ' FROM #__menu'
		. ' WHERE link LIKE '. $db->Quote( '%option='. $component )
		. ' AND type = '. $db->Quote( 'component' )
		. ' AND published = 1'	
		;	
		
		$db->setQuery( $query, 0, 1 );
		$id = $db->loadResult();
		
		return $id ? '&ItemId=' . $id : '';
	}
}