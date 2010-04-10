<?php
/**
 * TemplateManager Class.
 * @author $Author: Ryan Demmer $
 * @version $Id: templatemanager.php 27 2008-03-11 17:51:00 Ryan Demmer $
 */
class TemplateManager extends Manager{
	var $_ext = 'html=html,htm;text=txt';
	/**
	* @access	protected
	*/
	function __construct(){			
		parent::__construct();			
			
		// Set the file type map from parameters
		$this->setFileTypes( $this->getPluginParam('templatemanager_extensions', $this->_ext ) );
		// Init plugin
		$this->init();
	}
	/**
	 * Returns a reference to a editor object
	 *
	 * This method must be invoked as:
	 * 		<pre>  $browser = &TemplateManager::getInstance();</pre>
	 *
	 * @access	public
	 * @return	JCE  The editor object.
	 * @since	1.5
	 */
	function &getInstance(){
		static $instance;
	
		if ( !is_object( $instance ) ){
			$instance = new TemplateManager();
		}
		return $instance;
	}
	function getFileDetails( $file ){
		clearstatcache();
		
		$path 	= Utils::makePath( $this->getBaseDir(), rawurldecode( $file ) );
		$url 	= Utils::makePath( $this->getBaseUrl(), rawurldecode( $file ) );
		
		$date 	= Utils::formatDate( @filemtime( $path ) );
		$size 	= Utils::formatSize( @filesize( $path ) );
		
		$h = array(
			'size'		=>	$size, 
			'modified'	=>	$date,
		);
		
		return $h;
	}
	function saveTemplate(){	
		
		$dir 	= JRequest::getVar( 'dir', '' );
		$data 	= JRequest::getVar( 'data', '', 'POST', 'STRING', JREQUEST_ALLOWHTML );
		$name 	= JRequest::getVar( 'name', '' );
		$type 	= JRequest::getVar( 'type', '' );

		jimport('joomla.filesystem.file');		
		$path = Utils::makePath( $this->getBaseDir(), rawurldecode( $dir ) );
		$name = JFile::makeSafe( $name ) . '.html';		
		$path = Utils::makePath( $path, $name );
		
		// Remove any existing template div
		//$data = preg_replace( '/<div class="mceTmpl">(.*?)<\/div>/gi', '$1', $data );
		
		if( $type == 'template' ){
			$data = "<div class=\"mceTmpl\">\n" . $data . "\n</div>";
		}
		
		if( JFile::exists( $path ) ){
			$this->_result['error'] = JText::_('File Exists');
		}else{
			$content  =  "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
			$content .=  "<head>\n";
			$content .=  "<title>" . $name . "</title>\n";
			$content .=  "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n";
			$content .=  "</head>\n";
			$content .=  "<body>\n";
			$content .=  $data;
			$content .= "\n</body>\n";
			$content .= "</html>";

			if( !@JFile::write( $path, stripslashes( $content ) ) ){
			  $this->_result['error'] = JText::_('Write Error');
			}
		}
		return $this->returnResult();
	}
	function getViewable(){
		return $this->getFileTypes( 'list' );
	}
}
?>