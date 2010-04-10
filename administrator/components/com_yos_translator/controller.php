<?php
/**
 * Translator default controller
 *
 * @package		yos_translator
 * @subpackage	Components
 * @link		http://yopensource.com
 * @author		Minh Nguyen
 * @copyright 	Minh Nguyen (minhna@gmail.com)
 * @license		Commercial
 */

jimport('joomla.application.component.controller');

/**
 * Translator Component Controller
 *
 * @package		yos_translator
 */
class TranslatorController extends JController
{
	function __construct(){
		
		//set default view to about
		if (!JRequest::getVar('task') && !JRequest::getVar('view')) {
			JRequest::setVar('view', 'contents');
		}
		
		parent::__construct();
		
	}
	
	/**
	 * Method to display the view
	 *
	 * @access	public
	 */
	function display()
	{		
		parent::display();
	}
	
	function config(){
		global $mainframe;		
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'default';
		$mName		= 'config';
		// Get/Create the view
		$view = &$this->getView( 'config', $vType);
		// Get/Create the model
		
		if ($model = &$this->getModel($mName)) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
		
		// Set the layout
		$view->setLayout($vLayout);
		
		// Display the view		
		$view->display();
	}
	
	function about(){
		global $mainframe;
		
		$document 	= &JFactory::getDocument();
		$vType		= $document->getType();
		$vLayout 	= 'about';
		$mName		= 'version';
		
		// Get/Create the view
		$view = &$this->getView( 'about', $vType);
		
		// Get/Create the model	
		$checkversion	=	&Yos_utility::getVersion();
		$version	=	$checkversion['version'];
		$url		=	$checkversion['url'];
		$pc			=	$checkversion['productcode'];
		if ($model = &$this->getModel($mName,'', array('version'=> $version, 'url'=> $url , 'pc'=> $pc ))) {
			// Push the model into the view (as default)
			$view->setModel($model, true);
		}
				
		// Set the layout
		$view->setLayout($vLayout);
		
		//display view
		$view->display();
	}
	
}
?>
