<?php
/* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

// Set the table directory
require_once(JPATH_COMPONENT.DS.'helpers'.DS.'onlydomain.php');
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

/**
 * HTML View class for the YOS_amMap component
 *
 * @static
 * @package		Joomla
 * @subpackage	YOS_amMap
 * @since 1.0
 */
class YOS_ammap_ViewShow extends JView
{
	function display($tpl=null){
		$id 				= JRequest::getVar('id', 0, 'get', 'int');
		$hash				= JRequest::getVar('h', '', 'get', 'string');
		$file				= JRequest::getVar('file', '', 'get', 'string');
		$row				= &JTable::getInstance('yos_AmMap','Table');		
		$plugin				= JRequest::getVar('plugin', 0,'get', 'int');
		$db					= &JFactory::getDBO();
		
		
		if (!$id) {
			exit();
		}
		if ((!$row->load( intval($id) ))||(!$row->published)){			
			exit();
		}
		
		if ($file=='addon') {
			if ($row->security) {
				
		    	$nowdate = date('Y-m-d H:i:s');
		    	$timecheck = date('Y-m-d H:i:s', strtotime($nowdate) + 24*3600 - intval($row->timeout));
				$dhash = uniqid('d_').md5($nowdate);

		    	//Insert key for datafile
		    	$query = "INSERT INTO #__yos_key_hash SET
		    				timecheck = '$timecheck',
		    				hash = '$dhash'
		    				";
		    	$db->setQuery($query);
		    	$db->query();
	    	
		    	$row->hdata = $dhash;
			}
			
			$this->assignRef('data', $this->getDataFile($file, $row, $plugin));
			
			parent::display($tpl);
		} else {
			if ($row->security) { 
				$nowdate = date('Y-m-d H:i:s');
		    	$expDate = date('Y-m-d H:i:s', strtotime($nowdate) - intval($row->timeout));		

				$query				= "SELECT * FROM #__yos_key_hash WHERE hash = '$hash' AND timecheck > '$expDate'";
				$db->setQuery($query);
				$res	=	$db->loadObject();				
				if (!$res) {
					exit();
				} else {
					
					$this->assignRef('data', $this->getDataFile($file, $row, $plugin));					
					//delete hash
					$query = "DELETE FROM #__yos_key_hash WHERE hash = '$hash' OR timecheck < '$expDate'";
					
					$db->setQuery($query);
					
					$db->query();
					parent::display($tpl);					
				}				
			} else {
				$this->assignRef('data', $this->getDataFile($file, $row, $plugin));
				parent::display($tpl);
			}
			
		}
		
		exit();
	}
	
	function getDataFile($file, &$row, $plugin){
		$createdate	 		=& JFactory::getDate();
		$nowdate			= date('Y-m-d h:m:s',$createdate->toUnix());
		$session			= &JFactory::getSession();
		
		switch (strtolower($file)){
			
			case 'data':		
				$data= JFile::read(JPATH_COMPONENT.DS.'maps'.DS.$row->folder.DS.'ammap_data.xml');
				
				$data=	$this->element($data, $row);
				
				$dispatcher	=& JDispatcher::getInstance();
				if (( intval($row->pid)>0 )&&( intval($plugin ))) {
					JPluginHelper::importPlugin('yos_map');
					$dispatcher->trigger('onPrepareMapData', array (& $data, &$row->pid ));					
				}
				
				$data=	$this->safelink($data);

				$data= $this->xmladdon($data, $row, $plugin);
				$data= preg_replace('/{IAddon}/','addon/'.$row->folderaddon,$data);
				
				$data= preg_replace('/&/','&amp;',$data);				
				
				return $data;
				break;
				
			case 'settings':
				$settings= JFile::read(JPATH_COMPONENT.DS.'maps'.DS.$row->folder.DS.'ammap_settings.xml');
				$dispatcher	=& JDispatcher::getInstance();
				if (( intval($row->pid)>0 )&&( intval($plugin ))) {
					JPluginHelper::importPlugin('yos_map');
					$dispatcher->trigger('onPrepareMapSettings', array (& $settings, &$row->pid ));					
				}
				
				$settings=	$this->safelink($settings);

				$settings= preg_replace('/{IAddon}/','addon/'.$row->folderaddon,$settings);				
				$settings= preg_replace('/&/','&amp;',$settings);

				return $settings;
				break;
				
			case 'addon':
				$adddon = JRequest::getVar('addon','');				
				if ($adddon!='') {
					$content= JFile::read(JPATH_COMPONENT.DS.'ammap'.DS.'addon'.DS.$row->folderaddon.DS.$adddon);
					
					$content=	$this->safelink($content);
					
					$content = preg_replace('/{XData}/',JURI::root().'index.php?option=com_yos_ammap&id='.$row->id.'&file=data&h='.$row->hdata.'&plugin='.$plugin, $content);
					$content= $this->xmladdon($content, $row, $plugin);
					$content= preg_replace('/&/','&amp;',$content);
					
					return $content;
				}
				break;				
		}
		return false;
	}
	
	function safelink($content){
		$reg	=	'/(src|href)="(.*?)"/i';
		preg_match_all($reg, $content, $matches);
		
		if (!count($matches[0])) {
			return $content;
		}
		
		for ($i=0; $i<count($matches[0]); $i++){
			if (preg_match('/^http:\/\/.*/i', $matches[2][$i]) || preg_match('/^mailto:.*/i', $matches[2][$i])) {
				continue;
			} elseif (preg_match('/^\/.*/i', $matches[2][$i])) {
				$domain		=	new Only_Domain();
				$domain->url(JURI::root());
				$url		=	'http://'.$domain->getResult().$matches[2][$i];
				$content	= 	str_replace($matches[0][$i], $matches[1][$i].'="'.$url.'"', $content);
			} else{
				$url		=	JURI::root().$matches[2][$i];
				$content	=	str_replace($matches[0][$i], $matches[1][$i].'="'.$url.'"', $content);				
			}
		}
		
		return $content;
	}
	
	function xmladdon ($content, &$row, $plugin){
		$reg = '/{XAddon\s+(\S+)}/i';
		preg_match_all($reg,$content,$matches);
		$count = count($matches[0]);		
		for ($i=0; $i< $count; $i++){
			$content= preg_replace('/'.$matches[0][$i].'/',htmlspecialchars(JURI::root().'index.php?option=com_yos_ammap&id='.$row->id.'&file=addon&addon='.$matches[1][$i].'&plugin='.$plugin),$content);			
		}
		$content= preg_replace('/{XAddon}/',htmlspecialchars(JURI::root().'components/com_yos_ammap/ammap/addon/'.$row->folderaddon),$content);
		return $content;		
	}
	
	function element($data, $row) {
		
		$db		=	&JFactory::getDBO();
		$query	=	"SELECT * FROM #__yos_map_elements WHERE map_id = $row->id AND published = 1 GROUP BY element_id, element_type";
		$db->setQuery($query);
		
		
		$elements	=	$db->loadObjectList();
		
		foreach ($elements as $key =>$el) {
			$query		=	"SELECT * FROM #__yos_map_elements WHERE element_id=$el->element_id AND map_id=$el->map_id AND element_type='$el->element_type'";
			$db->setQuery($query);
			$element	=	$db->loadObjectList();
			
			$this->addelement($data, $element, $element[0]->element_type);
		}
		
		return $data;
	}
	
	function addelement(&$data, $element, $type) {
		$attribute	= 	'';
		$content	=	'';
		
		foreach ($element as $property) {			
			if ($property->value && $property->value!='') {
				if ($property->type==0) {
					$attribute	.=	$this->attribute_type($property);
				} else {
					$content	.=	$this->content_type($property);
				}
			}
		}
		$data_el	=	'';
		switch ($type){
			case 'areas':
				$data_el	=	'<area'.$attribute.'>'.$content.'</area>';
				break;
			case 'movies':
				$data_el	=	'<movie'.$attribute.'>'.$content.'</movie>';
				break;
			case 'lines':
				$data_el	=	'<line'.$attribute.'>'.$content.'</line>';
				break;
			case 'labels':
				$data_el	=	'<label'.$attribute.'>'.$content.'</label>';
				break;
		}
		
		if ($data_el=='') {
			return true;
		}
		
		$regex	=	'/<'.$type.'>(.*?)<\/'.$type.'>/is';
		
		if (preg_match($regex, $data, $match)) {
			
			$data_el	=	$match[1].$data_el;			
			$data	=	str_replace($match[0], '<'.$type.'>'.$data_el.'</'.$type.'>', $data);
			
		} else {
			if (preg_match('/<map.*?>(.*?)<\/map>/is', $data, $match)) {
				$data	=	str_replace($match[1], $match[1].'<'.$type.'>'.$data_el.'</'.$type.'>', $data);
			}			
		}
		
		return true;
	}
	
	function attribute_type($property){
		$data	=	' '.$property->field_name.'="'.$property->value.'"';
		return $data;
	}
	
	function content_type($property){
		$data	=	'<'.$property->field_name.'>'.$property->value.'</'.$property->field_name.'>';
		return $data;
	}
}

?>