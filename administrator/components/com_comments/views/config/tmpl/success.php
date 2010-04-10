<?php
/**
 * @version		$Id: success.php 295 2008-07-09 08:35:28Z louis $
 * @package		Comments
 * @copyright	(C) 2008 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.mootools');
?>

<script type="text/javascript">
	window.addEvent('domready', function(){ window.parent.document.getElementById('sbox-window').close(); });
</script>