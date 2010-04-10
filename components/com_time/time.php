<?php
defined ('_JEXEC') or die ('Restricted Access');
if (JRequest::getVar('from')) {
	$from = JRequest::getVar('from');
	$to = JRequest::getVar('to');
	$depart = JRequest::getVar('depart');
	//Check whether $from and $to starts with 'd' and remove 'd:'
	if (substr($from, 1, 1) == ':') {
		$newFrom = explode(":", $from);
		$source = $newFrom[1];
	} else {
		$source = $from;
	}	
	if (substr($to, 1, 1) == ':') {
		$newTo = explode(":", $to);
		$destination = $newTo[1];
	} else {
		$destination = $to;
	}
	$day = JFactory::getDate($depart)->toFormat('%A');
	//Retrive time from jos_airlines
	if (substr($from, 1, 1) != ':') {
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$source' AND destination='$destination' AND (day1='$day' OR day2='$day' OR day3='$day' OR day4='$day' OR day5='$day' OR day6='$day' OR day7='$day')";
		$db->setQuery($query, 0);
		$rows = $db->loadObjectList();
		if (count($rows)) {
			foreach ($rows as $row) {
				if ($row->day1 == $day) {
					if (isset($row->time11)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time11:' . $row->time11 . '">' . $row->time11 . '</option>';
					} 
					if (isset($row->time12)) {
						echo '<option value="time12:' . $row->time12 . '">' . $row->time12 . '</option>';
					} 
					if (isset($row->time13)) {
						echo '<option value="time13:' . $row->time13 . '">' . $row->time13 . '</option>';
					} 
					if (isset($row->time14)) {
						echo '<option value="time14:' . $row->time14 . '">' . $row->time14 . '</option>';
					} 
					if (isset($row->time15)) {
						echo '<option value="time15:' . $row->time15 . '">' . $row->time15 . '</option>';
					} 
					if (isset($row->time16)) {
						echo '<option value="time16:' . $row->time16 . '">' . $row->time16 . '</option>';
					} 
					if (isset($row->time17)) {
						echo '<option value="time17:' . $row->time17 . '">' . $row->time17 . '</option>';
					} 
					if (isset($row->time11)) {
						echo '</select>';
					} 					
				} else if ($row->day2 == $day) {
					if (isset($row->time21)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time21:' . $row->time21 . '">' . $row->time21 . '</option>';
					} 
					if (isset($row->time22)) {
						echo '<option value="time22:' . $row->time22 . '">' . $row->time22 . '</option>';
					}
					if (isset($row->time23)) {
						echo '<option value="time23:' . $row->time23 . '">' . $row->time23 . '</option>';
					}
					if (isset($row->time24)) {
						echo '<option value="time24:' . $row->time24 . '">' . $row->time24 . '</option>';
					}
					if (isset($row->time25)) {
						echo '<option value="time25:' . $row->time25 . '">' . $row->time25 . '</option>';
					}
					if (isset($row->time26)) {
						echo '<option value="time26:' . $row->time26 . '">' . $row->time26 . '</option>';
					}
					if (isset($row->time27)) {
						echo '<option value="time27:' . $row->time27 . '">' . $row->time27 . '</option>';
					}
					if (isset($row->time21)) {
						echo '</select>';
					} 					
				} else if ($row->day3 == $day) {
					if (isset($row->time31)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time31:' . $row->time31 . '">' . $row->time31 . '</option>';
					}
					if (isset($row->time32)) {
						echo '<option value="time32:' . $row->time32 . '">' . $row->time32 . '</option>';
					}
					if (isset($row->time33)) {
						echo '<option value="time33:' . $row->time33 . '">' . $row->time33 . '</option>';
					}
					if (isset($row->time34)) {
						echo '<option value="time34:' . $row->time34 . '">' . $row->time34 . '</option>';
					}
					if (isset($row->time35)) {
						echo '<option value="time35:' . $row->time35 . '">' . $row->time35 . '</option>';
					}
					if (isset($row->time36)) {
						echo '<option value="time36:' . $row->time36 . '">' . $row->time36 . '</option>';
					}
					if (isset($row->time37)) {
						echo '<option value="time37:' . $row->time37 . '">' . $row->time37 . '</option>';
					}
					if (isset($row->time31)) {
						echo '</select>';
					} 					
				} else if ($row->day4 == $day) {
					if (isset($row->time41)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time41:' . $row->time41 . '">' . $row->time41 . '</option>';
					}
					if (isset($row->time42)) {
						echo '<option value="time42:' . $row->time42 . '">' . $row->time42 . '</option>';
					}
					if (isset($row->time43)) {
						echo '<option value="time43:' . $row->time43 . '">' . $row->time43 . '</option>';
					}
					if (isset($row->time44)) {
						echo '<option value="time44:' . $row->time44 . '">' . $row->time44 . '</option>';
					}
					if (isset($row->time45)) {
						echo '<option value="time45:' . $row->time45 . '">' . $row->time45 . '</option>';
					}
					if (isset($row->time46)) {
						echo '<option value="time46:' . $row->time46 . '">' . $row->time46 . '</option>';
					}
					if (isset($row->time47)) {
						echo '<option value="time47:' . $row->time47 . '">' . $row->time47 . '</option>';
					}
					if (isset($row->time41)) {
						echo '</select>';
					}
				} else if ($row->day5 == $day) {
					if (isset($row->time51)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time51:' . $row->time51 . '">' . $row->time51 . '</option>';
					}
					if (isset($row->time52)) {
						echo '<option value="time52:' . $row->time52 . '">' . $row->time52 . '</option>';
					}
					if (isset($row->time53)) {
						echo '<option value="time53:' . $row->time53 . '">' . $row->time53 . '</option>';
					}
					if (isset($row->time54)) {
						echo '<option value="time54:' . $row->time54 . '">' . $row->time54 . '</option>';
					}
					if (isset($row->time55)) {
						echo '<option value="time55:' . $row->time55 . '">' . $row->time55 . '</option>';
					}
					if (isset($row->time56)) {
						echo '<option value="time56:' . $row->time56 . '">' . $row->time56 . '</option>';
					}
					if (isset($row->time57)) {
						echo '<option value="time57:' . $row->time57 . '">' . $row->time57 . '</option>';
					}
					if (isset($row->time51)) {
						echo '</select>';
					}
				} else if ($row->day6 == $day) {
					if (isset($row->time61)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time61:' . $row->time61 . '">' . $row->time61 . '</option>';
					}
					if (isset($row->time62)) {
						echo '<option value="time62:' . $row->time62 . '">' . $row->time62 . '</option>';
					}
					if (isset($row->time63)) {
						echo '<option value="time63:' . $row->time63 . '">' . $row->time63 . '</option>';
					}
					if (isset($row->time64)) {
						echo '<option value="time64:' . $row->time64 . '">' . $row->time64 . '</option>';
					}
					if (isset($row->time65)) {
						echo '<option value="time65:' . $row->time65 . '">' . $row->time65 . '</option>';
					}
					if (isset($row->time66)) {
						echo '<option value="time66:' . $row->time66 . '">' . $row->time66 . '</option>';
					}
					if (isset($row->time67)) {
						echo '<option value="time67:' . $row->time67 . '">' . $row->time67 . '</option>';
					}
					if (isset($row->time61)) {
						echo '</select>';
					}	
				} else if ($row->day7 == $day) {
					if (isset($row->time71)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="time71:' . $row->time71 . '">' . $row->time71 . '</option>';
					}
					if (isset($row->time72)) {
						echo '<option value="time72:' . $row->time72 . '">' . $row->time72 . '</option>';
					}
					if (isset($row->time73)) {
						echo '<option value="time73:' . $row->time73 . '">' . $row->time73 . '</option>';
					}
					if (isset($row->time74)) {
						echo '<option value="time74:' . $row->time74 . '">' . $row->time74 . '</option>';
					}
					if (isset($row->time75)) {
						echo '<option value="time75:' . $row->time75 . '">' . $row->time75 . '</option>';
					}
					if (isset($row->time76)) {
						echo '<option value="time76:' . $row->time76 . '">' . $row->time76 . '</option>';
					}
					if (isset($row->time77)) {
						echo '<option value="time77:' . $row->time77 . '">' . $row->time77 . '</option>';
					}
					if (isset($row->time71)) {
						echo '</select>';
					} 
				} 
				if (($row->time11 == '') && ($row->time12 == '') && ($row->time13 == '') && ($row->time14 == '') && ($row->time15 == '') && ($row->time16 == '') && ($row->time17 == '') && ($row->time21 == '') && ($row->time22 == '') && ($row->time23 == '') && ($row->time24 == '') && ($row->time25 == '') && ($row->time26 == '') && ($row->time27 == '') && ($row->time31 == '') && ($row->time32 == '') && ($row->time33 == '') && ($row->time34 == '') && ($row->time35 == '') && ($row->time36 == '') && ($row->time37 == '') && ($row->time41 == '') && ($row->time42 == '') && ($row->time43 == '') && ($row->time44 == '') && !isset($row->time45) && !isset($row->time46) && !isset($row->time47) && !isset($row->time51) && !isset($row->time52) && !isset($row->time53) && !isset($row->time54) && !isset($row->time55) && !isset($row->time56) && !isset($row->time57) && !isset($row->time61) && !isset($row->time62) && !isset($row->time63) && !isset($row->time64) && !isset($row->time65) && !isset($row->time66) && !isset($row->time67) && !isset($row->time71) && !isset($row->time72) && !isset($row->time73) && !isset($row->time74) && !isset($row->time75) && !isset($row->time76) && !isset($row->time77)) {
					echo '<span style="color:red;">No Flights</span>';
				}
			} // End of foreach loop
		}  else {
			echo "No Flights";
		}
	} else {
		//Details for return journey
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$destination' AND destination='$source' AND (day1='$day' OR day2='$day' OR day3='$day' OR day4='$day' OR day5='$day' OR day6='$day' OR day7='$day')";
		$db->setQuery($query, 0);
		$rows = $db->loadObjectList();
		if (count($rows)) {
			foreach ($rows as $row) {
				if ($row->day1 == $day) {
					if (isset($row->return11)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return11:' . $row->return11 . '">' . $row->return11 . '</option>';
					} 
					if (isset($row->return12)) {
						echo '<option value="return12:' . $row->return12 . '">' . $row->return12 . '</option>';
					} 
					if (isset($row->return13)) {
						echo '<option value="return13:' . $row->return13 . '">' . $row->return13 . '</option>';
					} 
					if (isset($row->return14)) {
						echo '<option value="return14:' . $row->return14 . '">' . $row->return14 . '</option>';
					} 
					if (isset($row->return15)) {
						echo '<option value="return15:' . $row->return15 . '">' . $row->return15 . '</option>';
					} 
					if (isset($row->return16)) {
						echo '<option value="return16:' . $row->return16 . '">' . $row->return16 . '</option>';
					} 
					if (isset($row->return17)) {
						echo '<option value="return17:' . $row->return17 . '">' . $row->return17 . '</option>';
					} 
					if (isset($row->return11)) {
						echo '</select>';
					} 					
				} else if ($row->day2 == $day) {
					if (isset($row->return21)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return21:' . $row->return21 . '">' . $row->return21 . '</option>';
					} 
					if (isset($row->return22)) {
						echo '<option value="return22:' . $row->return22 . '">' . $row->return22 . '</option>';
					}
					if (isset($row->return23)) {
						echo '<option value="return23:' . $row->return23 . '">' . $row->return23 . '</option>';
					}
					if (isset($row->return24)) {
						echo '<option value="return24:' . $row->return24 . '">' . $row->return24 . '</option>';
					}
					if (isset($row->return25)) {
						echo '<option value="return25:' . $row->return25 . '">' . $row->return25 . '</option>';
					}
					if (isset($row->return26)) {
						echo '<option value="return26:' . $row->return26 . '">' . $row->return26 . '</option>';
					}
					if (isset($row->return27)) {
						echo '<option value="return27:' . $row->return27 . '">' . $row->return27 . '</option>';
					}
					if (isset($row->return21)) {
						echo '</select>';
					} 					
				} else if ($row->day3 == $day) {
					if (isset($row->return31)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return31:' . $row->return31 . '">' . $row->return31 . '</option>';
					}
					if (isset($row->return32)) {
						echo '<option value="return32:' . $row->return32 . '">' . $row->return32 . '</option>';
					}
					if (isset($row->return33)) {
						echo '<option value="return33:' . $row->return33 . '">' . $row->return33 . '</option>';
					}
					if (isset($row->return34)) {
						echo '<option value="return34:' . $row->return34 . '">' . $row->return34 . '</option>';
					}
					if (isset($row->return35)) {
						echo '<option value="return35:' . $row->return35 . '">' . $row->return35 . '</option>';
					}
					if (isset($row->return36)) {
						echo '<option value="return36:' . $row->return36 . '">' . $row->return36 . '</option>';
					}
					if (isset($row->return37)) {
						echo '<option value="return37:' . $row->return37 . '">' . $row->return37 . '</option>';
					}
					if (isset($row->return31)) {
						echo '</select>';
					} 					
				} else if ($row->day4 == $day) {
					if (isset($row->return41)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return41:' . $row->return41 . '">' . $row->return41 . '</option>';
					}
					if (isset($row->return42)) {
						echo '<option value="return42:' . $row->return42 . '">' . $row->return42 . '</option>';
					}
					if (isset($row->return43)) {
						echo '<option value="return43:' . $row->return43 . '">' . $row->return43 . '</option>';
					}
					if (isset($row->return44)) {
						echo '<option value="return44:' . $row->return44 . '">' . $row->return44 . '</option>';
					}
					if (isset($row->return45)) {
						echo '<option value="return45:' . $row->return45 . '">' . $row->return45 . '</option>';
					}
					if (isset($row->return46)) {
						echo '<option value="return46:' . $row->return46 . '">' . $row->return46 . '</option>';
					}
					if (isset($row->return47)) {
						echo '<option value="return47:' . $row->return47 . '">' . $row->return47 . '</option>';
					}
					if (isset($row->return41)) {
						echo '</select>';
					}
				} else if ($row->day5 == $day) {
					if (isset($row->return51)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return51:' . $row->return51 . '">' . $row->return51 . '</option>';
					}
					if (isset($row->return52)) {
						echo '<option value="return52:' . $row->return52 . '">' . $row->return52 . '</option>';
					}
					if (isset($row->return53)) {
						echo '<option value="return53:' . $row->return53 . '">' . $row->return53 . '</option>';
					}
					if (isset($row->return54)) {
						echo '<option value="return54:' . $row->return54 . '">' . $row->return54 . '</option>';
					}
					if (isset($row->return55)) {
						echo '<option value="return55:' . $row->return55 . '">' . $row->return55 . '</option>';
					}
					if (isset($row->return56)) {
						echo '<option value="return56:' . $row->return56 . '">' . $row->return56 . '</option>';
					}
					if (isset($row->return57)) {
						echo '<option value="return57:' . $row->return57 . '">' . $row->return57 . '</option>';
					}
					if (isset($row->return51)) {
						echo '</select>';
					}
				} else if ($row->day6 == $day) {
					if (isset($row->return61)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return61:' . $row->return61 . '">' . $row->return61 . '</option>';
					}
					if (isset($row->return62)) {
						echo '<option value="return62:' . $row->return62 . '">' . $row->return62 . '</option>';
					}
					if (isset($row->return63)) {
						echo '<option value="return63:' . $row->return63 . '">' . $row->return63 . '</option>';
					}
					if (isset($row->return64)) {
						echo '<option value="return64:' . $row->return64 . '">' . $row->return64 . '</option>';
					}
					if (isset($row->return65)) {
						echo '<option value="return65:' . $row->return65 . '">' . $row->return65 . '</option>';
					}
					if (isset($row->return66)) {
						echo '<option value="return66:' . $row->return66 . '">' . $row->return66 . '</option>';
					}
					if (isset($row->return67)) {
						echo '<option value="return67:' . $row->return67 . '">' . $row->return67 . '</option>';
					}
					if (isset($row->return61)) {
						echo '</select>';
					}	
				} else if ($row->day7 == $day) {
					if (isset($row->return71)) {
						echo '<select name="time"><option> -- Select -- &nbsp; </option><option value="return71:' . $row->return71 . '">' . $row->return71 . '</option>';
					}
					if (isset($row->return72)) {
						echo '<option value="return72:' . $row->return72 . '">' . $row->return72 . '</option>';
					}
					if (isset($row->return73)) {
						echo '<option value="return73:' . $row->return73 . '">' . $row->return73 . '</option>';
					}
					if (isset($row->return74)) {
						echo '<option value="return74:' . $row->return74 . '">' . $row->return74 . '</option>';
					}
					if (isset($row->return75)) {
						echo '<option value="return75:' . $row->return75 . '">' . $row->return75 . '</option>';
					}
					if (isset($row->return76)) {
						echo '<option value="return76:' . $row->return76 . '">' . $row->return76 . '</option>';
					}
					if (isset($row->return77)) {
						echo '<option value="return77:' . $row->return77 . '">' . $row->return77 . '</option>';
					}
					if (isset($row->return71)) {
						echo '</select>';
					} 
				} 
				if (($row->return11 == '') && ($row->return12 == '') && ($row->return13 == '') && ($row->return14 == '') && ($row->return15 == '') && ($row->return16 == '') && ($row->return17 == '') && ($row->return21 == '') && ($row->return22 == '') && ($row->return23 == '') && ($row->return24 == '') && ($row->return25 == '') && ($row->return26 == '') && ($row->return27 == '') && ($row->return31 == '') && ($row->return32 == '') && ($row->return33 == '') && ($row->return34 == '') && ($row->return35 == '') && ($row->return36 == '') && ($row->return37 == '') && ($row->return41 == '') && ($row->return42 == '') && ($row->return43 == '') && ($row->return44 == '') && !isset($row->return45) && !isset($row->return46) && !isset($row->return47) && !isset($row->return51) && !isset($row->return52) && !isset($row->return53) && !isset($row->return54) && !isset($row->return55) && !isset($row->return56) && !isset($row->return57) && !isset($row->return61) && !isset($row->return62) && !isset($row->return63) && !isset($row->return64) && !isset($row->return65) && !isset($row->return66) && !isset($row->return67) && !isset($row->return71) && !isset($row->return72) && !isset($row->return73) && !isset($row->return74) && !isset($row->return75) && !isset($row->return76) && !isset($row->return77)) {
					echo '<span style="color:red;">No Flights</span>';
				}
			} // End of foreach loop
		}  else {
			echo "No Flights";
		}
	}
} else if (JRequest::getVar('returnFrom')) {
	$returnFrom = JRequest::getVar('returnFrom');
	$returnTo = JRequest::getVar('returnTo');
	$returnDate = JRequest::getVar('returnDate');
	if (substr($returnFrom, 1, 1) == ':') {
		$from = explode(":", $returnFrom);
		$source = $from[1];
	} else {
		$source = $returnFrom;
	}
	if (substr($returnTo, 1, 1) == ':') {
		$to = explode(":", $returnTo);
		$destination = $to[1];		
	} else {
		$destination = $returnTo;
	}	
	$day = JFactory::getDate($returnDate)->toFormat('%A');
	if (substr($returnFrom, 1, 1) == ':') {
		//Straight Return Journey -- Return from destination to source
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$destination' AND destination='$source' AND (day1='$day' OR day2='$day' OR day3='$day' OR day4='$day' OR day5='$day' OR day6='$day' OR day7='$day')";
		$db->setQuery($query, 0);
		$rows = $db->loadObjectList();
		if (count($rows)) {
			foreach ($rows as $row) {
				if ($row->day1 == $day) {
					if (isset($row->return11)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return11:' . $row->return11 . '">' . $row->return11 . '</option>';
					} 
					if (isset($row->return12)) {
						echo '<option value="return12:' . $row->return12 . '">' . $row->return12 . '</option>';
					} 
					if (isset($row->return13)) {
						echo '<option value="return13:' . $row->return13 . '">' . $row->return13 . '</option>';
					} 
					if (isset($row->return14)) {
						echo '<option value="return14:' . $row->return14 . '">' . $row->return14 . '</option>';
					} 
					if (isset($row->return15)) {
						echo '<option value="return15:' . $row->return15 . '">' . $row->return15 . '</option>';
					} 
					if (isset($row->return16)) {
						echo '<option value="return16:' . $row->return16 . '">' . $row->return16 . '</option>';
					} 
					if (isset($row->return17)) {
						echo '<option value="return17:' . $row->return17 . '">' . $row->return17 . '</option>';
					} 
					if (isset($row->return11)) {
						echo '</select>';
					} 					
				} else if ($row->day2 == $day) {
					if (isset($row->return21)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return21:' . $row->return21 . '">' . $row->return21 . '</option>';
					} 
					if (isset($row->return22)) {
						echo '<option value="return22:' . $row->return22 . '">' . $row->return22 . '</option>';
					}
					if (isset($row->return23)) {
						echo '<option value="return23:' . $row->return23 . '">' . $row->return23 . '</option>';
					}
					if (isset($row->return24)) {
						echo '<option value="return24:' . $row->return24 . '">' . $row->return24 . '</option>';
					}
					if (isset($row->return25)) {
						echo '<option value="return25:' . $row->return25 . '">' . $row->return25 . '</option>';
					}
					if (isset($row->return26)) {
						echo '<option value="return26:' . $row->return26 . '">' . $row->return26 . '</option>';
					}
					if (isset($row->return27)) {
						echo '<option value="return27:' . $row->return27 . '">' . $row->return27 . '</option>';
					}
					if (isset($row->return21)) {
						echo '</select>';
					} 					
				} else if ($row->day3 == $day) {
					if (isset($row->return31)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return31:' . $row->return31 . '">' . $row->return31 . '</option>';
					}
					if (isset($row->return32)) {
						echo '<option value="return32:' . $row->return32 . '">' . $row->return32 . '</option>';
					}
					if (isset($row->return33)) {
						echo '<option value="return33:' . $row->return33 . '">' . $row->return33 . '</option>';
					}
					if (isset($row->return34)) {
						echo '<option value="return34:' . $row->return34 . '">' . $row->return34 . '</option>';
					}
					if (isset($row->return35)) {
						echo '<option value="return35:' . $row->return35 . '">' . $row->return35 . '</option>';
					}
					if (isset($row->return36)) {
						echo '<option value="return36:' . $row->return36 . '">' . $row->return36 . '</option>';
					}
					if (isset($row->return37)) {
						echo '<option value="return37:' . $row->return37 . '">' . $row->return37 . '</option>';
					}
					if (isset($row->return31)) {
						echo '</select>';
					} 					
				} else if ($row->day4 == $day) {
					if (isset($row->return41)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return41:' . $row->return41 . '">' . $row->return41 . '</option>';
					}
					if (isset($row->return42)) {
						echo '<option value="return42:' . $row->return42 . '">' . $row->return42 . '</option>';
					}
					if (isset($row->return43)) {
						echo '<option value="return43:' . $row->return43 . '">' . $row->return43 . '</option>';
					}
					if (isset($row->return44)) {
						echo '<option value="return44:' . $row->return44 . '">' . $row->return44 . '</option>';
					}
					if (isset($row->return45)) {
						echo '<option value="return45:' . $row->return45 . '">' . $row->return45 . '</option>';
					}
					if (isset($row->return46)) {
						echo '<option value="return46:' . $row->return46 . '">' . $row->return46 . '</option>';
					}
					if (isset($row->return47)) {
						echo '<option value="return47:' . $row->return47 . '">' . $row->return47 . '</option>';
					}
					if (isset($row->return41)) {
						echo '</select>';
					}
				} else if ($row->day5 == $day) {
					if (isset($row->return51)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return51:' . $row->return51 . '">' . $row->return51 . '</option>';
					}
					if (isset($row->return52)) {
						echo '<option value="return52:' . $row->return52 . '">' . $row->return52 . '</option>';
					}
					if (isset($row->return53)) {
						echo '<option value="return53:' . $row->return53 . '">' . $row->return53 . '</option>';
					}
					if (isset($row->return54)) {
						echo '<option value="return54:' . $row->return54 . '">' . $row->return54 . '</option>';
					}
					if (isset($row->return55)) {
						echo '<option value="return55:' . $row->return55 . '">' . $row->return55 . '</option>';
					}
					if (isset($row->return56)) {
						echo '<option value="return56:' . $row->return56 . '">' . $row->return56 . '</option>';
					}
					if (isset($row->return57)) {
						echo '<option value="return57:' . $row->return57 . '">' . $row->return57 . '</option>';
					}
					if (isset($row->return51)) {
						echo '</select>';
					}
				} else if ($row->day6 == $day) {
					if (isset($row->return61)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return61:' . $row->return61 . '">' . $row->return61 . '</option>';
					}
					if (isset($row->return62)) {
						echo '<option value="return62:' . $row->return62 . '">' . $row->return62 . '</option>';
					}
					if (isset($row->return63)) {
						echo '<option value="return63:' . $row->return63 . '">' . $row->return63 . '</option>';
					}
					if (isset($row->return64)) {
						echo '<option value="return64:' . $row->return64 . '">' . $row->return64 . '</option>';
					}
					if (isset($row->return65)) {
						echo '<option value="return65:' . $row->return65 . '">' . $row->return65 . '</option>';
					}
					if (isset($row->return66)) {
						echo '<option value="return66:' . $row->return66 . '">' . $row->return66 . '</option>';
					}
					if (isset($row->return67)) {
						echo '<option value="return67:' . $row->return67 . '">' . $row->return67 . '</option>';
					}
					if (isset($row->return61)) {
						echo '</select>';
					}	
				} else if ($row->day7 == $day) {
					if (isset($row->return71)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="return71:' . $row->return71 . '">' . $row->return71 . '</option>';
					}
					if (isset($row->return72)) {
						echo '<option value="return72:' . $row->return72 . '">' . $row->return72 . '</option>';
					}
					if (isset($row->return73)) {
						echo '<option value="return73:' . $row->return73 . '">' . $row->return73 . '</option>';
					}
					if (isset($row->return74)) {
						echo '<option value="return74:' . $row->return74 . '">' . $row->return74 . '</option>';
					}
					if (isset($row->return75)) {
						echo '<option value="return75:' . $row->return75 . '">' . $row->return75 . '</option>';
					}
					if (isset($row->return76)) {
						echo '<option value="return76:' . $row->return76 . '">' . $row->return76 . '</option>';
					}
					if (isset($row->return77)) {
						echo '<option value="return77:' . $row->return77 . '">' . $row->return77 . '</option>';
					}
					if (isset($row->return71)) {
						echo '</select>';
					} 
				} 
				if (($row->return11 == '') && ($row->return12 == '') && ($row->return13 == '') && ($row->return14 == '') && ($row->return15 == '') && ($row->return16 == '') && ($row->return17 == '') && ($row->return21 == '') && ($row->return22 == '') && ($row->return23 == '') && ($row->return24 == '') && ($row->return25 == '') && ($row->return26 == '') && ($row->return27 == '') && ($row->return31 == '') && ($row->return32 == '') && ($row->return33 == '') && ($row->return34 == '') && ($row->return35 == '') && ($row->return36 == '') && ($row->return37 == '') && ($row->return41 == '') && ($row->return42 == '') && ($row->return43 == '') && ($row->return44 == '') && !isset($row->return45) && !isset($row->return46) && !isset($row->return47) && !isset($row->return51) && !isset($row->return52) && !isset($row->return53) && !isset($row->return54) && !isset($row->return55) && !isset($row->return56) && !isset($row->return57) && !isset($row->return61) && !isset($row->return62) && !isset($row->return63) && !isset($row->return64) && !isset($row->return65) && !isset($row->return66) && !isset($row->return67) && !isset($row->return71) && !isset($row->return72) && !isset($row->return73) && !isset($row->return74) && !isset($row->return75) && !isset($row->return76) && !isset($row->return77)) {
					echo '<span style="color:red;">No Flights</span>';
				}
			} //End of foreach loop
		} else {
			echo "No Flights";
		}
	} else {
		//Reverse Return Journey -- Return from source to destination
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$source' AND destination='$destination' AND (day1='$day' OR day2='$day' OR day3='$day' OR day4='$day' OR day5='$day' OR day6='$day' OR day7='$day')";
		$db->setQuery($query, 0);
		$rows = $db->loadObjectList();
		if (count($rows)) {
			foreach ($rows as $row) {
				if ($row->day1 == $day) {
					if (isset($row->time11)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time11:' . $row->time11 . '">' . $row->time11 . '</option>';
					} 
					if (isset($row->time12)) {
						echo '<option value="time12:' . $row->time12 . '">' . $row->time12 . '</option>';
					} 
					if (isset($row->time13)) {
						echo '<option value="time13:' . $row->time13 . '">' . $row->time13 . '</option>';
					} 
					if (isset($row->time14)) {
						echo '<option value="time14:' . $row->time14 . '">' . $row->time14 . '</option>';
					} 
					if (isset($row->time15)) {
						echo '<option value="time15:' . $row->time15 . '">' . $row->time15 . '</option>';
					} 
					if (isset($row->time16)) {
						echo '<option value="time16:' . $row->time16 . '">' . $row->time16 . '</option>';
					} 
					if (isset($row->time17)) {
						echo '<option value="time17:' . $row->time17 . '">' . $row->time17 . '</option>';
					} 
					if (isset($row->time11)) {
						echo '</select>';
					} 					
				} else if ($row->day2 == $day) {
					if (isset($row->time21)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time21:' . $row->time21 . '">' . $row->time21 . '</option>';
					} 
					if (isset($row->time22)) {
						echo '<option value="time22:' . $row->time22 . '">' . $row->time22 . '</option>';
					}
					if (isset($row->time23)) {
						echo '<option value="time23:' . $row->time23 . '">' . $row->time23 . '</option>';
					}
					if (isset($row->time24)) {
						echo '<option value="time24:' . $row->time24 . '">' . $row->time24 . '</option>';
					}
					if (isset($row->time25)) {
						echo '<option value="time25:' . $row->time25 . '">' . $row->time25 . '</option>';
					}
					if (isset($row->time26)) {
						echo '<option value="time26:' . $row->time26 . '">' . $row->time26 . '</option>';
					}
					if (isset($row->time27)) {
						echo '<option value="time27:' . $row->time27 . '">' . $row->time27 . '</option>';
					}
					if (isset($row->time21)) {
						echo '</select>';
					} 					
				} else if ($row->day3 == $day) {
					if (isset($row->time31)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time31:' . $row->time31 . '">' . $row->time31 . '</option>';
					}
					if (isset($row->time32)) {
						echo '<option value="time32:' . $row->time32 . '">' . $row->time32 . '</option>';
					}
					if (isset($row->time33)) {
						echo '<option value="time33:' . $row->time33 . '">' . $row->time33 . '</option>';
					}
					if (isset($row->time34)) {
						echo '<option value="time34:' . $row->time34 . '">' . $row->time34 . '</option>';
					}
					if (isset($row->time35)) {
						echo '<option value="time35:' . $row->time35 . '">' . $row->time35 . '</option>';
					}
					if (isset($row->time36)) {
						echo '<option value="time36:' . $row->time36 . '">' . $row->time36 . '</option>';
					}
					if (isset($row->time37)) {
						echo '<option value="time37:' . $row->time37 . '">' . $row->time37 . '</option>';
					}
					if (isset($row->time31)) {
						echo '</select>';
					} 					
				} else if ($row->day4 == $day) {
					if (isset($row->time41)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time41:' . $row->time41 . '">' . $row->time41 . '</option>';
					}
					if (isset($row->time42)) {
						echo '<option value="time42:' . $row->time42 . '">' . $row->time42 . '</option>';
					}
					if (isset($row->time43)) {
						echo '<option value="time43:' . $row->time43 . '">' . $row->time43 . '</option>';
					}
					if (isset($row->time44)) {
						echo '<option value="time44:' . $row->time44 . '">' . $row->time44 . '</option>';
					}
					if (isset($row->time45)) {
						echo '<option value="time45:' . $row->time45 . '">' . $row->time45 . '</option>';
					}
					if (isset($row->time46)) {
						echo '<option value="time46:' . $row->time46 . '">' . $row->time46 . '</option>';
					}
					if (isset($row->time47)) {
						echo '<option value="time47:' . $row->time47 . '">' . $row->time47 . '</option>';
					}
					if (isset($row->time41)) {
						echo '</select>';
					}
				} else if ($row->day5 == $day) {
					if (isset($row->time51)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time51:' . $row->time51 . '">' . $row->time51 . '</option>';
					}
					if (isset($row->time52)) {
						echo '<option value="time52:' . $row->time52 . '">' . $row->time52 . '</option>';
					}
					if (isset($row->time53)) {
						echo '<option value="time53:' . $row->time53 . '">' . $row->time53 . '</option>';
					}
					if (isset($row->time54)) {
						echo '<option value="time54:' . $row->time54 . '">' . $row->time54 . '</option>';
					}
					if (isset($row->time55)) {
						echo '<option value="time55:' . $row->time55 . '">' . $row->time55 . '</option>';
					}
					if (isset($row->time56)) {
						echo '<option value="time56:' . $row->time56 . '">' . $row->time56 . '</option>';
					}
					if (isset($row->time57)) {
						echo '<option value="time57:' . $row->time57 . '">' . $row->time57 . '</option>';
					}
					if (isset($row->time51)) {
						echo '</select>';
					}
				} else if ($row->day6 == $day) {
					if (isset($row->time61)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time61:' . $row->time61 . '">' . $row->time61 . '</option>';
					}
					if (isset($row->time62)) {
						echo '<option value="time62:' . $row->time62 . '">' . $row->time62 . '</option>';
					}
					if (isset($row->time63)) {
						echo '<option value="time63:' . $row->time63 . '">' . $row->time63 . '</option>';
					}
					if (isset($row->time64)) {
						echo '<option value="time64:' . $row->time64 . '">' . $row->time64 . '</option>';
					}
					if (isset($row->time65)) {
						echo '<option value="time65:' . $row->time65 . '">' . $row->time65 . '</option>';
					}
					if (isset($row->time66)) {
						echo '<option value="time66:' . $row->time66 . '">' . $row->time66 . '</option>';
					}
					if (isset($row->time67)) {
						echo '<option value="time67:' . $row->time67 . '">' . $row->time67 . '</option>';
					}
					if (isset($row->time61)) {
						echo '</select>';
					}	
				} else if ($row->day7 == $day) {
					if (isset($row->time71)) {
						echo '<select name="returnTime"><option> -- Select -- &nbsp; </option><option value="time71:' . $row->time71 . '">' . $row->time71 . '</option>';
					}
					if (isset($row->time72)) {
						echo '<option value="time72:' . $row->time72 . '">' . $row->time72 . '</option>';
					}
					if (isset($row->time73)) {
						echo '<option value="time73:' . $row->time73 . '">' . $row->time73 . '</option>';
					}
					if (isset($row->time74)) {
						echo '<option value="time74:' . $row->time74 . '">' . $row->time74 . '</option>';
					}
					if (isset($row->time75)) {
						echo '<option value="time75:' . $row->time75 . '">' . $row->time75 . '</option>';
					}
					if (isset($row->time76)) {
						echo '<option value="time76:' . $row->time76 . '">' . $row->time76 . '</option>';
					}
					if (isset($row->time77)) {
						echo '<option value="time77:' . $row->time77 . '">' . $row->time77 . '</option>';
					}
					if (isset($row->time71)) {
						echo '</select>';
					} 
				} 
				if (($row->time11 == '') && ($row->time12 == '') && ($row->time13 == '') && ($row->time14 == '') && ($row->time15 == '') && ($row->time16 == '') && ($row->time17 == '') && ($row->time21 == '') && ($row->time22 == '') && ($row->time23 == '') && ($row->time24 == '') && ($row->time25 == '') && ($row->time26 == '') && ($row->time27 == '') && ($row->time31 == '') && ($row->time32 == '') && ($row->time33 == '') && ($row->time34 == '') && ($row->time35 == '') && ($row->time36 == '') && ($row->time37 == '') && ($row->time41 == '') && ($row->time42 == '') && ($row->time43 == '') && ($row->time44 == '') && !isset($row->time45) && !isset($row->time46) && !isset($row->time47) && !isset($row->time51) && !isset($row->time52) && !isset($row->time53) && !isset($row->time54) && !isset($row->time55) && !isset($row->time56) && !isset($row->time57) && !isset($row->time61) && !isset($row->time62) && !isset($row->time63) && !isset($row->time64) && !isset($row->time65) && !isset($row->time66) && !isset($row->time67) && !isset($row->time71) && !isset($row->time72) && !isset($row->time73) && !isset($row->time74) && !isset($row->time75) && !isset($row->time76) && !isset($row->time77)) {
					echo '<span style="color:red;">No Flights</span>';
				}
			} // End of foreach loop
		}  else {
			echo "No Flights";
		}
	}
}
?>