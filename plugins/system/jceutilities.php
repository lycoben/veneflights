<?php
/**
* @version $Id: jceutilities.php 2008-01-07 $
* @package JCEUtilites
* @copyright Copyright (C) 2006/2007/2008 Ryan Demmer. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin');

/**
* JCE Utiltiies Plugin
*
* @package 		JCE Utilities
* @subpackage	System
*/
class plgSystemJCEUtilities extends JPlugin
{
	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param	object		$subject The object to observe
	 * @param 	array  		$config  An array that holds the plugin configuration
	 * @since	1.0
	 */
	function plgSystemJCEUtilities(&$subject, $config)  {
		parent::__construct($subject, $config);
		
		// load plugin parameters
        $this->_plugin = JPluginHelper::getPlugin( 'system', 'jceutilities' );
        $this->_params = new JParameter( $this->_plugin->params );
	}
	
	function renderParams( $name, $params, $end ){
		$html = '';
		if( $name ){
			$html .= "'". $name ."':{";
		}
		$i = 0;
		foreach( $params as $k => $v ){
			if( !is_numeric( $v ) ){
				$v = '"'. $v .'"';
			}
			if( $i < count( $params ) -1 ){
				$v .= ',';
			}
			$html .= "'". $k ."':". $v;
			$i++;
		}
		if( $name ){
			$html .= "}";
		}
		if( !$end ){
			$html .= ",";
		}
		return $html;
	}
		
	function onAfterRoute(){
		global $mainframe;

		if ($mainframe->isAdmin()) {
			return;
		}
		
		$version = '213';
		
		$db =& JFactory::getDBO();
		
		// Causes issue in Safari??
		$pop 	= JRequest::getVar( 'pop', 0, 'int' );
		$task 	= JRequest::getVar( 'task' );
		
		if( $pop || ( $task == 'new' || $task == 'edit' ) ){
			return;
		}
		$params = $this->_params;	
		
		$components = $params->get('components', '');
		if( $components ){
			$excluded 	= explode( ',', $components );
			$option 	= JRequest::getVar( 'option', '' );
			foreach( $excluded as $exclude ){
				if( $option == 'com_'. $exclude || $option == $exclude ){
					return;
				}
			}
		}		
		$query = 'SELECT published'
		. ' FROM #__plugins'
		. ' WHERE element = '. $db->Quote('jceembed')
		. ' OR element = '. $db->Quote('mediaobject')
		;
		$db->setQuery( $query );
		$embed = $db->loadResult();
		
		$popup = array(
			'legacy'			=>	$params->get( 'legacy', '0' ),
			//'convert'			=>	$params->get( 'convert', '0' ),
			'resize'			=>	$params->get( 'resize', '1' ),
			'icons'				=>	$params->get( 'icons', '1' ),
			'overlay'			=>	$params->get( 'overlay', '1' ),
			'overlayopacity'	=>	$params->get( 'overlayopacity', '0.8' ),
			'overlaycolor'		=>	$params->get( 'overlaycolor', '#000000' ),
			'fadespeed'			=>	$params->get( 'fadespeed', '500' ),
			'scalespeed'		=>	$params->get( 'scalespeed', '500' ),
			'width'				=>	$params->get( 'width', '640' ),
			'height'			=>	$params->get( 'height', '480' ),
			'theme'				=>	$params->get( 'theme', 'standard' ),
			'themecustom'		=>	$params->get( 'themecustom', '' ),
			'themepath'			=>	$params->get( 'themepath', 'plugins/system/jceutilities/themes' )
		);
		$tooltip = array(
			'classname'			=>	$params->get( 'tipclass', 'tooltip' ),
			'opacity'			=>	$params->get( 'tipopacity', '1' ),
			'speed'				=>	$params->get( 'tipspeed', '150' ),
			'position'			=>	$params->get( 'tipposition', 'br' ),
			'offsets'			=>	"{'x': ". $params->get( 'tipoffsets_x', '16' ) .", 'y': ". $params->get( 'tipoffsets_y', '16' ) ."}"
		);
		$standard = array(
			'imgpath'			=>	$params->get( 'imgpath', 'plugins/system/jceutilities/img' ),
			'pngfix'			=>	$params->get( 'pngfix', '0' ),
			'wmode'				=>	$params->get( 'wmode', '0' )
		);
		
		$versions = array(
			'flash'			=>	$this->_params->get( 'flash', '7,0,0,0' ),
			'windowmedia'	=>	$this->_params->get( 'windowmedia', '5,1,52,701' ),
			'quicktime'		=>	$this->_params->get( 'quicktime', '6,0,2,0' ),
			'realmedia'		=>	$this->_params->get( 'realmedia', '7,0,0,0' ),
			'shockwave'		=>	$this->_params->get( 'shockwave', '8,5,1,0' )
		);
			
		$document =& JFactory::getDocument();
		
		if( !$embed ){
			$document->addScript( JURI::base() . 'plugins/system/jceutilities/js/mediaobject.js' );
		}
		
		$document->addScript( JURI::base() . 'plugins/system/jceutilities/js/jquery-126.js' );
		$document->addScript( JURI::base() . 'plugins/system/jceutilities/js/jceutilities-' .$version. '.js' );
		$document->addStyleSheet( JURI::base() . 'plugins/system/jceutilities/css/jceutilities-' .$version. '.css' );
		
		jimport('joomla.filesystem.path');
		// Load template css file
		if( file_exists( JPATH_ROOT .DS. JPath::clean( $popup['themepath'] . '/' . $popup['theme']. '/css/style.css' ) ) ){
			$document->addStyleSheet( JURI::base() . $popup['themepath'] . '/' . $popup['theme'] .'/css/style.css' );
		}
		// Load any ie6 variation
		jimport('joomla.environment.browser');
		$browser = &JBrowser::getInstance();
		if( $browser->getBrowser() == 'msie' && intval( $browser->getMajor() ) < 7 ){
			if( file_exists( JPATH_ROOT .DS. JPath::clean( $popup['themepath'] . '/' . $popup['theme']. '/css/style_ie6.css' ) ) ){
				$document->addStyleSheet( JURI::base() . $popup['themepath'] . '/' . $popup['theme'] .'/css/style_ie6.css' );
			}
		}
		$html = "\t";
		if( !$embed ){
			$html .= "MediaObject.init({";
			$html .= $this->renderParams( '', $versions, true );
			$html .= "});";
		}
		$html .= "jQuery(document).ready(function(){";
		$html .= "jceutilities({";
		$html .= $this->renderParams( 'popup', $popup, false );
		$html .= $this->renderParams( 'tootlip', $tooltip, false );
		$html .= $this->renderParams( '', $standard, true );
		$html .= "});";
		$html .= "});";
						
		$document->addScriptDeclaration( $html );
		return true;
	}	
}
?>