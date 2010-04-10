<?php
/**
 * @version		1.2
 * @package		Joomla
 * @subpackage	Google translation for joomfish
 * @copyright	Ossolution Team
 * @license		GPL
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.controller');
/**
 * Joomfish google translation controller
 *
 * @package		Joomla
 * @subpackage	JGtranslation
 * @since 1.5
 */
class JGtranslationController extends JController
{
	/**
	 * Constructor function
	 *
	 * @param array $config
	 */
	function __construct($config = array())
	{
		parent::__construct($config);				
	}
	/**
	 * Display information
	 *
	 */
	function display( )
	{	
		$task = $this->getTask();
		switch ($task) {
			case 'translate':
				JRequest::setVar('view', 'translation');				
				break;
						
			default:
				JRequest::setVar('view', 'jgtranslation');
				break;	
		}
		parent::display();
	}
	/**
	 * Translate the selected content item
	 *
	 */
	function translate()
	{
		$cid = JRequest::getVar('cid', array(), 'post');
		if (count($cid) ==0) {
			$msg = JText::_('Please choose a content element to do the translation');
			$url = 'index.php?option=com_jgtranslation';
			$this->setRedirect($url, $msg);
			return;					
		}
		$model = & $this->getModel('translation');		
		$numberItems = $model->translate();		
		if ($numberItems == 0) {
			$msg = JText::_('The translation process completed');
			$url = 'index.php?option=com_jgtranslation';
			$this->setRedirect($url, $msg);
			return;
		}										
		$this->display();
	}	
}