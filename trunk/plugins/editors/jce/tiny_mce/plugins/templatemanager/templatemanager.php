<?php
/**
* @version $Id: brower.php 2005-12-27 09:23:43Z Ryan Demmer $
* @package JCE
* @copyright Copyright (C) 2005 Ryan Demmer. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* JCE is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

$version = "1.5.1";

require_once( JCE_LIBRARIES .DS. 'classes' .DS. 'editor.php' );
require_once( JCE_LIBRARIES .DS. 'classes' .DS. 'plugin.php' );
require_once( JCE_LIBRARIES .DS. 'classes' .DS. 'utils.php' );
require_once( JCE_LIBRARIES .DS. 'classes' .DS. 'manager.php' );

require_once( dirname( __FILE__ ) .DS. 'classes' .DS. 'templatemanager.php' );

$manager =& TemplateManager::getInstance();

$params = $manager->getPluginParams();

if( $params->get('templatemanager_allow_save', '1') ){
	$manager->addAction( 'save', '', 'this.saveTemplate', JText::_('Create Template') );
	$manager->setXHR( array( $manager, 'saveTemplate' ) );
}

// Set javascript file array
$manager->script( array( 'templatemanager' ), 'plugins' );
$manager->css( array( 'templatemanager' ), 'plugins' );

// Load extensions if any
$manager->loadExtensions();
// Process requests
$manager->processXHR();

$manager->_debug = false;
$version .= $manager->_debug ? ' - debug' : '';

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $manager->getLanguageTag();?>" lang="<?php echo $manager->getLanguageTag();?>" dir="<?php echo $manager->getLanguageDir();?>" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo JText::_('PLUGIN TITLE').' : '.$version;?></title>
<?php
$manager->printScripts();
$manager->printCss();
?>
<script type="text/javascript">
	function initManager(src){
		return new TemplateManager(src, {
			// Global parameters
			actions: <?php echo $manager->getActions();?>,
			buttons: <?php echo $manager->getButtons();?>, 
			lang: '<?php echo $manager->getLanguage();?>',
			alerts: <?php echo $manager->getAlerts();?>,
			// Uploader options
			upload: {
				method: '<?php echo $manager->getEditorParam('editor_upload_method', 'flash'); ?>',
				conflict: '<?php echo $manager->getSharedParam('upload_conflict', 'overwrite|unique'); ?>',
				size: <?php echo $manager->getSharedParam('max_size', '1024'); ?>,
				types: <?php echo $manager->mapUploadFileTypes(); ?>
			},
			tree: <?php echo $manager->getEditorParam('editor_folder_tree', '1'); ?>,
			// Plugin parameters
			params: {
				// Relative base directory
				base: '<?php echo $manager->getBase(); ?>',
				viewable: '<?php echo $manager->getViewable(); ?>'
			}
		});
	}
</script>
<?php echo $manager->printHead();?>
</head>
<body lang="<?php echo $manager->getLanguage(); ?>" id="browser" style="display: none;">
	<?php $manager->loadBrowser();?>
	<div class="mceActionPanel">
		<div style="float: right">
    		<input type="button" class="button "id="refresh" name="refresh" value="<?php echo JText::_('Refresh');?>" />
			<input type="button" id="insert" name="insert" value="<?php echo JText::_('Insert');?>" onClick="TemplateManagerDialog.insert();" />
			<input type="button" id="cancel" name="cancel" value="<?php echo JText::_('Cancel');?>" onClick="tinyMCEPopup.close();" />
		</div>
	</div>
    <iframe id="template_iframe" src="about:blank" style="display:none;visibility:hidden;"></iframe>
</body> 
</html>
