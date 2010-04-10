<?php
/**
 * @version		$Id: changelog.php 95 2008-08-06 23:12:55Z eddieajau $
 * @package		JXtended
 * @copyright	Copyright (C) 2008 JXtended LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('JPATH_BASE') or die;

?>
Changelog

1.0.6
----------
 + Added decorator support to the forms library

1.0.5
----------
 + Added JXLang JavaScript support for HTML JDocument types

1.0.4
----------
 # Enabled upgrade method
 # Allowed JXPagination to set pagination request variables and use page number or offset numbers.

1.0.3
----------
 # Updated Form Calendar field to be compatible with the JParameter Calendar field.

1.0.2
----------

 # textarea_editor now takes an attribute for the editor="desired|alternative" (if none provided the default is used)
 # Allowed JXPagination to set either frontend or backend style modes
 # Fixed hard-coded $task in JXPagination::orderUpIcon and JXPagination::orderDownIcon
 # Removed unused $condition argument in JXPagination::orderUpIcon and JXPagination::orderDownIcon
 # Fixed back background and font path in captcha library.
 ^ Added white-list and black-list options to JXFormView::renderToTable
 ^ Added JXFormView::render method
 ^ Added JXFormModel::filter method
 ! JXModel::checkin now returns a JException
