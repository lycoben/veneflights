<?php
/**
 * @version		$Id: list.php 10094 2008-03-02 04:35:10Z sonlv $
 * @package		YOS
 * @subpackage	amMap
 * @author 		sonlv@gmail.com
 * @copyright	Copyright (C) 2005 - 2008 YOS. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

// Set the table directory
JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR.DS.'tables');

/**
 * YOS amMap Controller
 *
 * @package		Joomla
 * @subpackage	amMap
 * @since 1.5
 */
class YOS_amMap_ControllerList extends YOS_amMap_Controller
{
	function publish()
	{
		global $mainframe;
		
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$id 	= JRequest::getVar('id', 0, 'get', 'int');
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		$user	=& JFactory::getUser();
		$uid	= $user->get('id');
		$task 	= JRequest::getCmd('task','list.publish');
		
		$publish= ($task=='list.publish')?1:0;		
	
		JArrayHelper::toInteger($cid);
	
		if (count( $cid ) < 1) {
			$action = $publish ? 'publish' : 'unpublish';
			JError::raiseError(500, JText::_( 'Select a category to '.$action, true ) );
		}
	
		$cids = implode( ',', $cid );
	
		$query = 'UPDATE #__yos_maps'
		. ' SET published = ' . (int) $publish
		. ' WHERE id IN ( '.$cids.' )'
		. ' AND ( checked_out = 0 OR ( checked_out = '.(int) $uid.' ) )'
		;
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
	
		if (count( $cid ) == 1) {
			$row =& JTable::getInstance('yos_AmMap','Table');			
			$row->checkin( $cid[0] );
		}
	
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=ammaps" );
	}
	
	function orderup()
	{
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$id 	= JRequest::getVar('id', 0, 'get', 'int');
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));	
		$task 	= JRequest::getCmd('task','list.orderup');
		$inc	= ($task=='list.orderup')?-1:1;
	
		// Initialize variables
		$db		=& JFactory::getDBO();
		$row	=& JTable::getInstance('yos_AmMap','Table');
		$row->load( $cid[0] );
		$row->move( $inc, true );				
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=ammaps");
	}
	
	function saveOrder()
	{
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		
		$id 	= JRequest::getVar('id', 0, 'get', 'int');
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid, array(0));
	
		// Initialize variables
		$db =& JFactory::getDBO();
	
		$total		= count( $cid );
		$order 		= JRequest::getVar( 'order', array(0), 'post', 'array' );
		JArrayHelper::toInteger($order, array(0));
		$row		=& JTable::getInstance('yos_AmMap','Table');		
	
		// update ordering values
		for( $i=0; $i < $total; $i++ ) {
			$row->load( (int) $cid[$i] );
			// track sections
			$row->ordering = $order[$i];
			if (!$row->store()) {
			//TODO - convert to JError
				JError::raiseError(500, $db->getErrorMsg());
			}			
		}		
	
		$msg 	= JText::_( 'New ordering saved' );
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=ammaps", $msg );
	}
	
	function save(){
		
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db		 		=& JFactory::getDBO();
		$user			= & JFactory::getUser();
		$oldtitle 		= JRequest::getString( 'oldtitle', '', 'post' );
		$post			= JRequest::get( 'post' );
		$createdate	 	=& JFactory::getDate();
		$nowdate		=  JHTML::_('date', $createdate->toUnix(), '%Y-%m-%d %H:%M:%S');	
		
		$arr_addon 				= split(',',$post['naddons']);
		$arr_addontitle			= split(',',$post['taddons']);
		$post['ammap_data'] 	= JRequest::getVar( 'ammap_data', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$post['ammap_settings']	= JRequest::getVar( 'ammap_settings', '', 'post', 'string', JREQUEST_ALLOWRAW );
		if ($post['ammap_data']=="") {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('File ammap_data is null!'));
			return false;
		}
		if ($post['ammap_settings']=="") {
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('File ammap_settings is null!'));
			return false;
		}
		
		if ($arr_addon[0]!="") {
			foreach ($arr_addon as $addon) {
				$post[$addon]		= JRequest::getVar( $addon, '', 'post', 'string', JREQUEST_ALLOWRAW );
				if ($post[$addon]=="") {
					JError::raiseWarning('SOME_ERROR_CODE', JText::_('Files addons is null!'));
					return false;
				}
				//$post[$addon] 		= str_replace('\\','',$post[$addon]);
			}
		}
		
	
		$row =& JTable::getInstance('yos_AmMap','Table');
		
		if (!$row->bind( $post )) {
			JError::raiseError(500, $row->getError() );
		}		
		
		$row->folder 		= $row->folder ? $row->folder : JFolder::makeSafe(strtolower(preg_replace('/ /','',uniqid($row->title.'_').'_'.md5($nowdate))));
		$row->folderaddon	= $row->folderaddon ? $row->folderaddon : JFolder::makeSafe(strtolower(preg_replace('/ /','',uniqid($row->title.'_'))));
		$row->hdata			= md5($nowdate);
		$row->hsettings		= md5($nowdate);
		
		$row->created_by 	= $row->created_by ? $row->created_by : $user->get('id');
		if ($row->created && strlen(trim( $row->created )) <= 10) {
			$row->created 	.= ' 00:00:00';
		}
		
		$row->timeout		= $row->timeout ? $row->timeout : 30;
		
		$config =& JFactory::getConfig();
		$tzoffset = $config->getValue('config.offset');
		$date =& JFactory::getDate($row->created, $tzoffset);
		$row->created = $date->toMySQL();		
		
		if (!$row->check()) {
			JError::raiseError(500, $row->getError() );
		}		
		
		if (JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder)) {
			$files = JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder,'\.xml$',0,true);
			foreach ($files as $file) {
				JFile::delete($file);
			}
			
		} else {
			JFolder::create(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder);
		}
		
		
		
		if (!JFile::write(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder.DS.'ammap_data.xml',$post['ammap_data'])){
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('Files not save!'));
			return false;
		}
		if (!JFile::write(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder.DS.'ammap_settings.xml',$post['ammap_settings'])){
			JError::raiseWarning('SOME_ERROR_CODE', JText::_('Files not save!'));
			return false;
		}
		
		if (JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon)) {
			$files = JFolder::files(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon,'\.xml$' , 0, true);
			foreach ($files as $file) {
				JFile::delete($file);
			}
		} else {
			JFolder::create(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon);
		}
		$ta = 0;
		foreach ($arr_addon as $addon) {
			if (JFile::getExt(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon.DS.$arr_addontitle[$ta])=='xml') {
				if (!JFile::write(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon.DS.$arr_addontitle[$ta], $post[$addon])){
					JError::raiseWarning('SOME_ERROR_CODE', JText::_('Files not save!'));
					return false;
				}				
			}		
			$ta++;
		}		
	
		if (!$row->store()) {
			JError::raiseError(500, $row->getError() );
		}
		$row->checkin();	
		
		switch ( JRequest::getCmd('task') )
		{	
			case 'list.apply':
				$msg = JText::_( 'Changes to amMap saved' );
				$mainframe->redirect( "index.php?option=".$post['option']."&task=edit&cid[]=". $row->id, $msg );
				break;
	
			case 'list.save':
			default:
				$msg = JText::_( 'amMap saved' );
				$mainframe->redirect( "index.php?option=".$post['option']."&task=ammaps", $msg );
				break;
		}
	}
	
	function cancel(){
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db =& JFactory::getDBO();	
	
		$row =& JTable::getInstance('yos_AmMap','Table');
		$row->bind( JRequest::get( 'post' ));
		$row->checkin();
	
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=ammaps" );
	}
	
	function remove(){
		global $mainframe;
	
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		// Initialize variables
		$db 	=& JFactory::getDBO();
		$cid 	= JRequest::getVar('cid', array(0), 'post', 'array');
		JArrayHelper::toInteger($cid);
		
		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select a amMap to delete', true ));
		}
		foreach ($cid as $id) {
			$row =& JTable::getInstance('yos_AmMap','Table');
			$row->load($id);
			if (JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder)) {
				JFolder::delete(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'maps'.DS.$row->folder);
			}
			if (JFolder::exists(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon)) {
				JFolder::delete(JPATH_SITE.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$row->folderaddon);
			}
		}
	
		$cids = implode( ',', $cid );		
	
		if (count( $cid )) {
			$cids = implode( ',', $cid );
			$query = 'DELETE FROM #__yos_maps'
			. ' WHERE id IN ( '.$cids.' )'
			;
			$db->setQuery( $query );
			if (!$db->query()) {
				JError::raiseError( 500, $db->stderr() );
				return false;
			}
		}		
	
		$mainframe->redirect( "index.php?option=com_yos_ammap&task=ammaps" );
	}
}