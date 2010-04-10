<?php
/**
 * @version		$Id: example.php 10714 2008-08-21 10:10:14Z eddieajau $
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Example Content Plugin
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 		1.5
 */
class plgContentLoginLogout extends JPlugin
{

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param object $subject The object to observe
	 * @param object $params  The object that holds the plugin parameters
	 * @since 1.5
	 */
	function plgContentLoginLogout( &$subject, $params )
	{
		parent::__construct( $subject, $params );
	}

	/**
	 * Example prepare content method
	 *
	 * Method is called by the view
	 *
	 * @param 	object		The article object.  Note $article->text is also available
	 * @param 	object		The article params
	 * @param 	int			The 'page' number
	 */
	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;

 	// expression to search for
   	$regex = "#{loginbutton}(.*?){/loginbutton}#s";   
    
   	// perform the replacement
   	$article->text = preg_replace_callback( $regex, 'loginlogout_replacer', $article->text );

	}

}

function loginlogout_replacer( &$matches ) {          
    global $mainframe;
    
    jimport('recly.jtableadvanced');
    require_once(JPATH_SITE.DS.'components'.DS.'com_loginbox'.DS.'helpers'.DS.'link.php' );   
    JHTML::_('behavior.mootools'); 
    
    $db = & JFactory::getDBO();    
    $user = & JFactory::getUser();  
    $uri = JFactory::getURI();
    $url = $uri->toString();
    $return = base64_encode($url);   
    $params = JComponentHelper::getParams('com_loginbox');  
    $width = ($params->getValue('width')>0) ? $params->getValue('width') : 400;
    $height = ($params->getValue('height')>0) ? $params->getValue('height') : 310; 
    
    $params = JComponentHelper::getParams('com_loginbox');
    $_CB_adminpath		=	JPATH_ADMINISTRATOR.DS.'components'.DS.'com_comprofiler'; 
    $logoutOption = 'com_user'; 
    
    if ( $params->getValue('compatibility') == 'cb' && file_exists( $_CB_adminpath . DS . 'plugin.foundation.php' ) ) {   
       $logoutOption = 'com_comprofiler';      
    }  
    
    $result = '';
    if ((int)$matches[1]>0) {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::base() . 'media/system/css/modal.css');
        $document->addScript(JURI::base() . 'media/system/js/modal.js');
        $document->addScriptDeclaration("window.addEvent('domready', function() {SqueezeBox.initialize({});});");
        $document->addScriptDeclaration("function LB_onLogout() {
           var form = new Element('form');
           form.setProperty('method', 'POST');
           form.setProperty('target', '_self');
           form.setProperty('action', 'index.php');
           
           var input = new Element('input');
           input.setProperty('type', 'hidden');
           input.setProperty('name', 'option');
           input.setProperty('value', '$logoutOption');
           form.appendChild(input);
           
           var input = new Element('input');
           input.setProperty('type', 'hidden');
           input.setProperty('name', 'task');
           input.setProperty('value', 'logout');
           form.appendChild(input);
           
           var input = new Element('input');
           input.setProperty('type', 'hidden');
           input.setProperty('name', 'return');
           input.setProperty('value', '$return');
           form.appendChild(input);
           
           \$E('body').appendChild(form);
           form.submit();
        } ");       
        $item = JTable::getInstance('link');
        $item->load((int)$matches[1]);      
        if ($user->get('guest')) {
          $result .= '<a href="'.JRoute::_('index.php?option=com_loginbox').'" 
          onclick="SqueezeBox.fromElement(this); return false;"  
          rel="{handler: \'iframe\', size: {x: '.$width.', y: '.$height.'}}">'.$item->login.'</a>';
        } else {
          $result .= '<a href="javascript:void(0);" onclick="LB_onLogout(); return false;">'.$item->logout.'</a>';
        }        
          
    }

    return $result;
}
