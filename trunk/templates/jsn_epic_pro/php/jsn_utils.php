<?php
/* jsn_utils.php @copyright (C) 2007 JoomlaShine.com */

defined( '_JEXEC' ) or die( 'Restricted index access' );

function jsnCountPositions($t, $positions){
	$positionCount = 0;
	for($i=0;$i < count($positions); $i++){
		if ($t->countModules($positions[$i])) $positionCount++;
	}
	return $positionCount;
}

?>