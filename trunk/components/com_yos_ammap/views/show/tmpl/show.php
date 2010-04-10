<?php defined('_JEXEC') or die( 'Restricted access' ); ?>
<?php
//jimport('joomla.filesystem.file');
//jimport('joomla.filesystem.folder');
//$createdate	 		=& JFactory::getDate();
//$nowdate			= date('Y-m-d h:m:s',$createdate->toUnix());
//switch (strtolower($this->file)){
//	case 'data':		
//		$data= JFile::read(JPATH_COMPONENT_ADMINISTRATOR.DS.'maps'.DS.$this->row->folder.DS.'ammap_data.xml');
//		$data= preg_replace('/{XAddon}/','administrator'.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon,$data);
//		$data= preg_replace('/{IAddon}/','addon'.DS.$this->row->folderaddon,$data);
//		$data= preg_replace('/&/','&amp;',$data);		
//		$this->row->hdata = md5($nowdate);
//		$this->row->store();
//		echo $data;
//		break;
//	case 'settings':
//		$settings= JFile::read(JPATH_COMPONENT_ADMINISTRATOR.DS.'maps'.DS.$this->row->folder.DS.'ammap_settings.xml');
//		$settings= preg_replace('/{XAddon}/','administrator'.DS.'components'.DS.'com_yos_ammap'.DS.'ammap'.DS.'addon'.DS.$this->row->folderaddon,$settings);
//		$settings= preg_replace('/{IAddon}/','addon'.DS.$this->row->folderaddon,$settings);
//		$settings= preg_replace('/&/','&amp;',$settings);		
//		$this->row->hsettings = md5($nowdate);
//		$this->row->store();
//		echo $settings;
//		break;	
//}

echo $this->data;
?>