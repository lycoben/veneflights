<?php
/**
 * Google translation class
 * The class uses google translate api to translate data from original language to destination language
 *
 */
class GoogleTranslate{
	/**
	 * The original language
	 *
	 * @var string
	 */
    var $_langFrom = NULL;
	/**
	 * The destination language
	 *
	 * @var string
	 */
    var $_langTo = NULL; 
    /**
     * The text to translate
     *
     * @var string
     */
    var $_text = NULL;
	/**
	 * The url of google translation services
	 *
	 * @var string
	 */
    var $_googleUrl = NULL; 
	/**
	 * The array containing data posted to google for translation
	 *
	 * @var array
	 */
    var $_postData = NULL;
  	
    /**
     * The constructor function, init some variables
     *
     * @param string $langFrom
     * @param string $langTo
     * @param string $text
     */
    
    function __construct($langFrom, $langTo, $text = '') {
		$this->_googleUrl = "http://translate.google.com/translate_t";
		$this->_langFrom = $langFrom;
		$this->_langTo = $langTo;
		$this->_text = $text; 
	} 
 	/**
 	 * Get the destination language
 	 *
 	 * @return string
 	 */
	function returnLanguageTo() {
	   return $this->_langTo;
	}

  	/**
  	 * Get the original language
  	 *
  	 * @return string
  	 */
	function returnLanguageFrom() {
	   return $this->_langFrom;
	}
	/**
	 * Set the destination language
	 *
	 * @param string $langTo
	 */
	 function setLanguageTo($langTo) {
	   $this->_langTo = $langTo;
	 }
	 /**
	  * Set the original language
	  *
	  * @param string $langFrom
	  */
	 function setLanguageFrom($langFrom) {
	     $this->_langFrom = $langFrom;
	 }
	 /**
	  * Set the text for translation
	  *
	  * @param string $text
	  */
	 function setText($text) {
	   $this->_text = $text;
	 } 
	 /**
	  * Get the source text
	  *
	  */
	 function getText() {
	 	return $this->_text ;
	 }	 
	 /**
	  * Translate the original text and return data
	  *
	  * @return string
	  */
	 function translate() {
	     $i = $this->_langFrom."|".$this->_langTo;
	     $this->_postData['langpair'] = $i;
	     $this->_postData['ie'] = 'UTF-8';
	     $query = $this->buildQuery();
	     $ch = curl_init();
	     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	     curl_setopt($ch,CURLOPT_COOKIEJAR,"cookie");
	     curl_setopt($ch,CURLOPT_COOKIEFILE,"cookie");
	     curl_setopt($ch, CURLOPT_URL, $this->_googleUrl);
	     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	     
	     curl_setopt($ch, CURLOPT_POST, 0);
	     curl_setopt($ch, CURLOPT_POSTFIELDS, $query);	     
	     $output = curl_exec($ch);
	     $processedOutput = $this->filterOutput($output);
	     return $processedOutput;
	 } 
	/**
	 * Filter the output from google translation services and only return the translated text
	 *
	 * @param string $output
	 * @return string
	 */
	 function filterOutput($output) {   
	   $search_regex='/<div id=result_box dir="ltr">(.*)<\/div>/iU';
	   $match = array() ;
	   preg_match($search_regex,$output,$match);
	   //$match[0] = str_replace('&nbsp;','',$match[0]); //this gets rid of the HTML no break spaces
	   $result = $match[1];
	   //Strip all hmtl tags
	   $result = strip_tags($result);
	   //Convert to html code
	   $result = html_entity_decode($result) ;
	   //Remove space
	   $result = str_replace('</ ', '</', $result);
	   $result = str_replace('/ ', '/');
	   return $result ;	   	   
	 } 
	 /**
	  * Build the query to submit to google translation services
	  *
	  * @return string the query
	  */
	 function buildQuery() {
	   $this->_postData['text']= $this->_text;
	   return http_build_query($this->_postData);
	 }
}
/**
 * The ajax class for google translate
 *
 */
class GoogleAjaxTranslate {
	/**
	 * The original language
	 *
	 * @var string
	 */
	var $_langFrom = "";
	/**
	 * The destination language
	 *
	 * @var string
	 */
	var $_langTo = "";
	/**
	 * The source text which you want to translate
	 *
	 * @var string
	 */	
	var $_text = "";
	/**
	 * The site url, which we use to translate content
	 *
	 * @var string
	 */	
	var $_siteUrl = "";
	/**
	 * Constructor function
	 *
	 * @param string $langFrom
	 * @param string $langTo
	 */
	function __construct($langFrom, $langTo) {
		$this->_langFrom = $langFrom ;
		$this->_langTo = $langTo ;
		$siteUrl =  JURI::root();
		$this->_siteUrl = substr($siteUrl, 0, strlen($siteUrl) -  1);								
	}
	/**
	 * Set the original language
	 *
	 * @param string $langFrom
	 */
	function setLangFrom($langFrom) {
		$this->_langFrom = $langFrom ;		
	}
	/**
	 * Get the original language
	 *
	 * @return string
	 */
	function getLangFrom() {
		return $this->_langFrom ;		
	}
	/**
	 * Set the destination language
	 *
	 * @param string $langTo
	 */
	function setLangTo($langTo) {
		$this->_langTo = $langTo ;
	}
	/**
	 * Get the destination language
	 *
	 * @return string
	 */
	function getLangTo() {
		return $this->_langTo ;
	}
	/**
	 * Set the source text for translating
	 *
	 * @param string $text
	 */
	function setText($text) {
		$this->_text = $text ;		
	}
	/**
	 * Get the source text
	 *
	 * @return string
	 */	
	function getText() {
		return $this->_text ;		
	}
	/**
	 * Translate text the text from original language to destination language
	 *
	 * @param string $text
	 */
	function translate() {
		$langPair = $this->_langFrom.'|'.$this->_langTo;
		$data = array();
		$data['v'] = "1.0";	    
	    $query = "&q=".urlencode($this->_text);	    	      	
	    $url = "http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&langpair=".urlencode($langPair);		  	
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_REFERER, $this->_siteUrl);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $query );
	    $body = curl_exec($ch);
	    curl_close($ch);	  	 
	    // now, process the JSON string
	    $json = json_decode($body, true);	   
	    if ($json['responseStatus'] != 200){
	       return false;
	    }			    
	    $result = $json['responseData'];
	    return $result['translatedText'];
	}
}
