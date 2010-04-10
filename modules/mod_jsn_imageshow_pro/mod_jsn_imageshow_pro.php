<?php
/**
	* @copyright Copyright (C) 2006 - 2008 JoomlaShine.com
	* @author JoomlaShine.com
	* @license Commercial Proprietary
	* Please visit http://www.joomlashine.com for more information
*/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

// MODULE PARAMETERS
$moduleclass_sfx			= $params->get( 'moduleclass_sfx', '' );

$image_folder				= trim($params->get( 'image_folder', "" ));
$width						= trim($params->get( 'width', "400" ));
$height						= trim($params->get( 'height', "300" ));
$slide_timing				= intval($params->get( 'slide_timing', 5));
$repeat_count				= intval($params->get( 'repeat_count', 0));
$process_order				= $params->get( 'process_order', 'forward');

$enable_kenburns			= intval($params->get( 'enable_kenburns', 0));
$transition_timing			= intval($params->get( 'transition_timing', 2));
$transition_type			= $params->get( 'transition_type', 'fade');
$motion_timing				= intval($params->get( 'motion_timing', 2));
$motion_ease				= $params->get( 'motion_ease', 'Sine');
$move_range					= intval($params->get( 'move_range', 5));
$scale_range				= intval($params->get( 'scale_range', 25));
$rotation_range				= intval($params->get( 'rotation_range', 0));

$background_type			= $params->get( 'background_type', 'color' );
$background_color			= trim($params->get( 'background_color', 'FFFFFF' ));
$background_predefined		= $params->get( 'background_predefined', '' );
$background_custom			= trim($params->get( 'background_custom', '' ));

$show_shadow				= intval($params->get( 'show_shadow', 0 ));
$show_progress				= intval($params->get( 'show_progress', 1 ));
$show_overlay_effect		= intval($params->get( 'show_overlay_effect', 0 ));
$overlay_effect_predefined	= trim($params->get( 'overlay_effect_predefined', '' ));
$show_overlay_image			= intval($params->get( 'show_overlay_image', 0 ));
$overlay_image_path			= trim($params->get( 'overlay_image_path', '' ));
$overlay_image_opacity		= intval($params->get( 'overlay_image_opacity', 75 ));
$overlay_image_position		= trim($params->get( 'overlay_image_position', '0,0' ));

$show_caption				= intval($params->get( 'show_caption', 1 ));
$caption_source 			= trim($params->get( 'caption_source', 'page_title' ));
$caption_custom 			= trim($params->get( 'caption_custom', '' ));
$caption_font				= trim($params->get( 'caption_font', 'Arial' ));
$caption_size				= intval($params->get( 'caption_size', 12 ));
$caption_color				= trim($params->get( 'caption_color', 'FFFFFF' ));
$caption_alignment			= trim($params->get( 'caption_alignment', 'left' ));
$caption_padding			= trim($params->get( 'caption_padding', '6,10' ));
$caption_position			= trim($params->get( 'caption_position', 'bottom' ));
$caption_bg_opacity			= intval($params->get( 'caption_bg_opacity', 50 ));
$caption_bg_color			= trim($params->get( 'caption_bg_color', '000000' ));

$enable_alternative			= intval($params->get( 'enable_alternative', 0 ));
$display_alternative		= intval($params->get( 'display_alternative', 0 ));
$alternative_type 			= trim($params->get( 'alternative_type', 'text' ));
$alternative_param 			= trim($params->get( 'alternative_param', '' ));

$enable_link				= intval($params->get( 'enable_link', 1 ));
$link_url					= trim($params->get( 'link_url', ''));
$link_open					= $params->get( 'link_open', '_target');

$load_swfobject				= intval($params->get( 'load_swfobject', 1 ));


// Working parameters
$root_url = substr(JURI::root(), 0, strlen(JURI::root())-1);
$module_url = $root_url.'/modules/mod_jsn_imageshow_pro/jsn_imageshow_pro';
$module_path = JPATH_ROOT.JPath::clean('/modules/mod_jsn_imageshow_pro/jsn_imageshow_pro');
//echo $module_url.' '.$module_path;

$width = (strrpos($width, "%")==strlen($width)-1)?$width:intval($width);
$height = (strrpos($height, "%")==strlen($height)-1)?$height:intval($height);

$background_url = '';
switch($background_type){
	case 'predefined':
		$background_url = $module_url.'/images/bg/'.$background_predefined;
	break;
	
	case 'custom':
		$background_url = $root_url.(strpos($background_custom, "/")==0?"":"/").$background_custom;
	break;
}

if($enable_kenburns){
	$motion_timing = $slide_timing + 1;
	$motion_ease = "linear";
}

$shadow_image_url = ($show_shadow==1)?$module_url.'/images/shadow.png':'';

if($show_caption==1){
	switch($caption_source){
		case 'page_title':
			$caption_text = $this->_doc->title;
		break;
		
		case 'site_name':
			$caption_text = $mainframe->getCfg('sitename');
		break;
		
		case 'custom_text':
			$caption_text = $caption_custom;
		break;
	}
}else{
	$caption_text = "";
}

$overlay_image_url = ($show_overlay_image==1)?$root_url.(strpos($overlay_image_path, "/")==0?"":"/").$overlay_image_path:'';
$overlay_image_position = explode (',', $overlay_image_position);

$overlay_effect_name = ($show_overlay_effect==1)?$overlay_effect_predefined:'';

$is_id = rand(1, 1000);

$transition_ease = "Sine";

// Build XML file
$folder = (strpos($image_folder, "/")==0?"":"/").$image_folder.(strrpos($image_folder, "/")==strlen($image_folder)-1?"":"/");
$image_types = array('jpg','png','gif');
$regex = '/'.implode ('|', $image_types).'$/i';
$abs_path = JPATH_ROOT.JPath::clean($folder);
$dh = opendir($abs_path);
$files = array();
while (($filename = readdir($dh)) != false) {
	if (is_file($abs_path.$filename) && preg_match($regex, $filename)) {
		$files[] = $filename;
	}
}

$xml_data = '<?xml version="1.0" encoding="iso-8859-1"?>'."\n";
$xml_data .= '<imageshow>'."\n";
$xml_data .= '<title>JSN ImageShow Module #'.$module->id.' XML Data</title>'."\n";
$xml_data .= '<slideshow path="'.$root_url.$folder.'">'."\n";
sort($files);
foreach ($files as $fname) {
	$xml_data .= "<image>$fname</image>\n";
}
$xml_data .= '</slideshow>'."\n";
$xml_data .= '</imageshow>';
$xml_filename = JPath::clean($module_path.'/xmldata'.$module->id.'.xml');

// Write XML file
$xml_file = fopen($xml_filename,'w');
fwrite($xml_file, $xml_data);
fclose($xml_file);

if(strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), "MSIE")) {
	$extra_xml = '?xml=xml'.date('His').$is_id;
} else {
	$extra_xml = '';
}

// Begin output
echo '<div id="jsn-is'.$is_id.'" class="jsn-imageshow'.$moduleclass_sfx.'" style="overflow: hidden; width:'.($width.(strrpos($width, "%")==strlen($width)-1?"":"px")).'; height:'.($height.(strrpos($height, "%")==strlen($height)-1?"":"px")).';'.(($background_url != '')?' background-image: url('.$background_url.')':'').'">';
if($enable_alternative == 1 && $alternative_param != ''){
	echo '<div'.(($display_alternative == 0)?' style="margin: 0 0 0 -9999em;"':'').'>';
	$jsn_contents = '';
	if($alternative_type == 'text'){
		$jsn_contents = $alternative_param;
	}else{
		$jsn_document	= &JFactory::getDocument();
		$jsn_renderer	= $jsn_document->loadRenderer('module');
		$jsn_module		= null;
		$jsn_modules	= null;
		switch($alternative_type){
			case 'module':
				$jsn_modules	=& JModuleHelper::_load();
				$jsn_total		= count($jsn_modules);
				$alternative_param = intval($alternative_param);
				for ($i = 0; $i < $jsn_total; $i++) {
					if ($jsn_modules[$i]->id == $alternative_param) {
						$jsn_module =& $jsn_modules[$i];
						break;
					}
				}
				$jsn_contents = $jsn_renderer->render($jsn_module, array('style'=>'none'));
			break;
			
			case 'position':
				$jsn_modules = JModuleHelper::getModules($alternative_param);
				foreach ($jsn_modules as $jsn_module)  {
					$jsn_contents .= $jsn_renderer->render($jsn_module, array('style'=>'none'));
				}
			break;
		}
	}
	echo $jsn_contents;
	echo '</div>';
}
echo '</div>';
if ($load_swfobject) echo '<script type="text/javascript" src="'.$module_url.'/swfobject.js"></script>';
echo '<script type="text/javascript" src="'.$module_url.'/swfobject_addon.js"></script>';
?>
<script type="text/javascript">
	// <![CDATA[
	
	var soImageShow = new SWFObject("<?php echo $module_url.'/loader.swf'; ?>", "imageshow", "<?php echo $width; ?>", "<?php echo $height; ?>", "8", "<?php echo $background_color; ?>");
	soImageShow.addParam("wmode", "<?php echo ($background_type == 'color')?'opaque':'transparent'; ?>");
	soImageShow.addVariable("dataXml", "<?php echo $module_url.'/xmldata'.$module->id.'.xml'.$extra_xml; ?>");
	soImageShow.addVariable("imageshowUrl", "<?php echo $module_url.'/imageshow.swf'; ?>");
	soImageShow.addVariable("slideTiming", <?php echo $slide_timing; ?>);
	soImageShow.addVariable("repeatCount", "<?php echo $repeat_count; ?>");
	soImageShow.addVariable("processOrder", "<?php echo $process_order; ?>");
	soImageShow.addVariable("shadowImageUrl", "<?php echo $shadow_image_url; ?>");
	soImageShow.addVariable("captionText", "<?php echo $caption_text; ?>");
	soImageShow.addVariable("captionFont", "<?php echo $caption_font; ?>");
	soImageShow.addVariable("captionSize", "<?php echo $caption_size; ?>");
	soImageShow.addVariable("captionColor", "0x<?php echo $caption_color; ?>");
	soImageShow.addVariable("captionAlignment", "<?php echo $caption_alignment; ?>");
	soImageShow.addVariable("captionPosition", "<?php echo $caption_position; ?>");
	soImageShow.addVariable("captionPadding", "<?php echo $caption_padding; ?>");
	soImageShow.addVariable("captionBgOpacity", "<?php echo $caption_bg_opacity; ?>");
	soImageShow.addVariable("captionBgColor", "0x<?php echo $caption_bg_color; ?>");
	soImageShow.addVariable("showProgress", "<?php echo $show_progress; ?>");
	soImageShow.addVariable("overlayEffectName", "<?php echo $overlay_effect_name; ?>");
	soImageShow.addVariable("overlayImageUrl", "<?php echo $overlay_image_url; ?>");
	soImageShow.addVariable("overlayImageOpacity", "<?php echo $overlay_image_opacity; ?>");
	soImageShow.addVariable("overlayImageX", "<?php echo $overlay_image_position[0]; ?>");
	soImageShow.addVariable("overlayImageY", "<?php echo $overlay_image_position[1]; ?>");
	soImageShow.addVariable("motionTiming", "<?php echo $motion_timing; ?>");
	soImageShow.addVariable("motionEase", "<?php echo $motion_ease; ?>");
	soImageShow.addVariable("moveRange", "<?php echo $move_range; ?>");
	soImageShow.addVariable("scaleRange", "<?php echo $scale_range; ?>");
	soImageShow.addVariable("rotationRange", "<?php echo $rotation_range; ?>");
	soImageShow.addVariable("transitionType", "<?php echo $transition_type; ?>");
	soImageShow.addVariable("transitionTiming", "<?php echo $transition_timing; ?>");
	soImageShow.addVariable("transitionEase", "<?php echo $transition_ease; ?>");
	soImageShow.addVariable("enableLink", "<?php echo $enable_link; ?>");
	soImageShow.addVariable("linkUrl", "<?php echo urlencode($link_url); ?>");
	soImageShow.addVariable("linkOpen", "<?php echo $link_open; ?>");
	registerSWFObject( soImageShow, "jsn-is<?php echo $is_id; ?>" );
	
	// ]]>
</script>