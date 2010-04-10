<?php
/**
 * @version		$Id: language.php 90 2008-07-18 11:04:20Z eddieajau $
 * @package		JXtended
 * @subpackage	Filter
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

defined('JPATH_BASE') or die;

jximport('joomla.filter.input');

/**
 * JXtended Language Filter Library
 *
 * This library implements a flexible language filter for parsing input
 * strings to remove specified words.  It is capable of matching all
 * occurences of a sequence of letters or specific words surrounded by spaces.
 * To match a sequence of letters explicitly, prefix the characters with a + sign.
 *
 * <code>
 *  <?php
 *  jximport('jxtended.filter.language');
 *
 *	$words	= array('bad', '+naughty', 'words', 'and', 'other');
 *	$filter	= new JXFilterLanguage($words, '');
 *
 *	$string = 'This is a string with big bad words and other naughtystuff';
 *	$string = $filter->clean($string); // $string = 'This is a string with big   stuff'
 *  ?>
 * </code>
 *
 * @package		JXtended
 * @subpackage	Filter
 * @version		1.0
 */
class JXFilterLanguage extends JFilterInput
{
	/**
	 * The strings to remove
	 * @access	public
	 * @var		array of strings
	 */
	var $words		= array();

	/**
	 * The string to substitute
	 * @access	public
	 * @var		string
	 */
	var $replace	= '';

	/**
	 * Constructor for inputFilter class. Only first parameter is required.
	 *
	 * @access	protected
	 * @param	array	$wordsArray	An array of strings to remove
	 * @param	string	$replace	The string to substitue for removed strings
	 * @param	array	$tagsArray	A list of user-defined tags
	 * @param	array	$attrArray	A list of user-defined attributes
	 * @param	int		$tagsMethod	WhiteList method = 0, BlackList method = 1
	 * @param	int		$attrMethod	WhiteList method = 0, BlackList method = 1
	 * @param	int		$xssAuto	Only auto clean essentials = 0, Allow clean blacklisted tags/attr = 1
	 * @since	1.0
	 */
	function __construct($wordsArray = array(), $replace = '', $tagsArray = array(), $attrArray = array(), $tagsMethod = 0, $attrMethod = 0, $xssAuto = 1)
	{
		// Make sure user defined arrays are in lowercase
		$tagsArray = array_map('strtolower', (array) $tagsArray);
		$attrArray = array_map('strtolower', (array) $attrArray);

		// Assign member variables
		$this->tagsArray	= $tagsArray;
		$this->attrArray	= $attrArray;
		$this->tagsMethod	= $tagsMethod;
		$this->attrMethod	= $attrMethod;
		$this->replace		= $replace;
		$this->wordsArray	= $wordsArray;
		$this->xssAuto		= $xssAuto;
	}

	/**
	 * Method to filter the string for the specified strings.
	 *
	 * @access	public
	 * @param	mixed	$input	Input string/array-of-string to be 'cleaned'
	 * @param	string	$type	Return type for the variable (INT, FLOAT, BOOLEAN, WORD, ALNUM, CMD, BASE64, STRING, ARRAY, PATH, NONE)
	 * @return	mixed	'Cleaned' version of input parameter
	 * @since	1.0
	 */
	function clean($input, $type = 'string')
	{
		switch (strtoupper($type))
		{
			case 'INT':
			case 'INTEGER':
			case 'FLOAT':
			case 'DOUBLE':
			case 'BOOL':
			case 'BOOLEAN':
			case 'WORD':
			case 'ALNUM':
			case 'CMD':
			case 'BASE64':
			case 'ARRAY':
			case 'PATH':
			case 'USERNAME':
				$result = JFilterInput::clean($input, $type);
				break;

			case 'STRING':
			default:
				// Are we dealing with an array?
				if (is_array($input))
				{
					foreach ($input as $key => $value)
					{
						// filter element for XSS and other 'bad' code etc.
						if (is_string($value))
						{
							$input[$key] = $this->_remove($this->_decode($value));
						}
					}
					$result = $input;
				}
				else
				{
					// Or a string?
					if (is_string($input) && !empty ($input))
					{
						// Filter source for XSS and other 'bad' code etc.
						$result = $this->_remove($this->_decode($input));
					}
					else
					{
						// Not an array or string.. return the passed parameter
						$result = $input;
					}
				}
				break;
		}

		return $result;
	}

	/**
	 * Internal method to iteratively remove all unwanted tags,
	 * attributes, and language strings.
	 *
	 * @access	private
	 * @param	string	$input	Input string to be 'cleaned'
	 * @return	string	Cleaned version of input parameter
	 * @since	1.0
	 */
	function _remove($input)
	{
		// Run the parent remove function to strip tags
		$input		= JFilterInput::_remove($input);

		// Initialize variables
		$patterns	= array();
		$input		= utf8_encode($input);

		// Iterate the words list to build the regex subpatterns
		foreach ($this->wordsArray as $word)
		{
			$explicit	= false;
			$exploded	= array();

			// Check for an explicit string
			if ($word[0] == '+')
			{
				$word		= substr($word, 1);
				$explicit	= true;
			}

			$word = utf8_encode($word);

			// Transform the word string into an array
			for ($i = 0; $i < strlen($word); $i++)
			{
				$exploded[$i] = $word[$i];
			}

			// Check for an explicit word
			if ($explicit)
			{
				/*
				 * Match any occurence of the word even if it is broken up by periods,
				 * dashes, or underscores.
				 */
				$subpattern = '('.implode('[-\._]*', $exploded).')';
			}
			else
			{
				/*
				 * Match the word at the beginning of the string or with a preceeding space and a
				 * trailing space or end of string delimeter.  The word will match if it is broken
				 * up by periods, dashes, or underscores as well.  For example, ^w-o.r_d$
				 */
				$subpattern = '((^|(?<=\s{1}))('.implode('[-\._]*', $exploded).')((?=\s{1})|$))';
			}

			// Add the subpatern to the paterns array
			$patterns[] = $subpattern;
		}

		// Compile the array of patterns into one pattern
		$pattern	= implode('|',$patterns);

		// Run the regular expression
		$input		= preg_replace("/$pattern/ui", $this->replace, $input);

		return $input;
	}
}