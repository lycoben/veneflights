<?php defined('_JEXEC') or die('Restricted access');?>
<?php
jimport('joomla.html.pane');
$pane =& JPane::getInstance('sliders');
?>
<form action="index.php" method="post" name="adminForm">
<table class="adminform">
	<tr>
		<td width="55%" valign="top">
			<div id="cpanel">
			<?php
			$link = 'index.php?option=com_yos_ammap&task=ammaps';
			echo $this->quickIconButton( $link, 'icon-48-ammap.png', JText::_( 'amMaps' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=elconfig';
			echo $this->quickIconButton( $link, 'icon-48-elconfig.png', JText::_( 'Element Properties' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=icons';
			echo $this->quickIconButton( $link, 'icon-48-icon.png', JText::_( 'Icons' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=maps';
			echo $this->quickIconButton( $link, 'icon-48-maps.png', JText::_( 'Maps' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=addon';
			echo $this->quickIconButton( $link, 'icon-48-addon.png', JText::_( 'Add-ons' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=upload';
			echo $this->quickIconButton( $link, 'icon-48-upload.png', JText::_( 'Upload' ) );	
			
			$link = 'index.php?option=com_yos_ammap&task=backup';
			echo $this->quickIconButton( $link, 'icon-48-backup.png', JText::_( 'Back-up' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=uploadammap';
			echo $this->quickIconButton( $link, 'icon-48-uploadammap.png', JText::_( 'Upload amMap file' ) );
			
			$link = 'index.php?option=com_yos_ammap&task=about';
			echo $this->quickIconButton( $link, 'icon-48-info.png', JText::_( 'About' ) );
			
			$link = 'http://www.yopensource.com/en/joomla-extensions/25-images-and-multimedia/22-yos-ammap-map-tool-solutions-for-joomla-15x';
			echo $this->quickIconButton( $link, 'icon-48-help.png', JText::_( 'Help' ) );
			?>			
			</div>
			<div style="float: left; width: 456px;">
			<?php
			echo $pane->startPane("cp_pane");
			echo $pane->startPanel( JText::_( 'Info' ), "info-page" );
			echo $this->loadTemplate('info');
			echo $pane->endPanel();
			echo $pane->startPanel( JText::_('Report'), "report-page");
			echo $this->loadTemplate('report');
			echo $pane->endPanel();			
			echo $pane->endPane();
			?>
			</div>
		</td>
		
		<td width="45%" valign="top">
			<div style="300px;border:1px solid #ccc;background:#fff;margin:15px;padding:15px">
			<div style="float:right;margin:10px;">
			<?php
			echo JHTML::_('image.site',  'yos_ammap_256.png', '/components/com_yos_ammap/images/', NULL, NULL, 'YOS amMap' )
			?>
			</div>
			<h3><?php echo JText::_('Version');?></h3>
			<p><?php echo $this->version ;?></p>
			<h3><?php echo JText::_('Copyright');?></h3>
			<p>© 2008 YOS Team</p>
			<p><a href="http://www.yopensource.com/" target="_blank">www.yopensource.com</a></p>
			<h3><?php echo JText::_('License');?></h3>
			<p>Commercial</p>			
			<p><strong><?php echo JText::_('Note:');?></strong></p>
			<p class="license">This version included an ammap and a licence. You can get latest version of ammap at <a href="http://www.ammap.com">http://www.ammap.com</a></p>
			<div id="pg-update"><a href="<?php echo JRoute::_('index.php?option=com_yos_ammap&task=uploadammap'); ?>" target="_blank"><?php echo JText::_('Upload amMap file'); ?></a></div>
			</div>
						
		</td>
	</tr>
</table>

<input type="hidden" name="option" value="com_yos_ammap" />
<input type="hidden" name="view" value="controlpanel" />
<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
</form>