<?php 
defined ('_JEXEC') or die ('Restricted Access');
if (JRequest::getVar('value')) {
	$value = JRequest::getVar('value');
	$value = explode(" ", $value);
	$date = $value[0];
	$flight = $value[1];
	$route = JRequest::getVar('travel');
	$info = explode(":", $route);
	$source = $info[0];
	$destination = $info[1];
	echo '<strong>Select Time: </strong>';
	//echo "<h2>Booking Details for " . $flight . " on " . $date . "</h2>"; 
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date' AND source='$source' AND destination='$destination'";			
			$db->setQuery($query, 0);
			$number = $db->loadObjectList();			
	 		if (count($number)) {
			echo '<select name="' . $route . '" id="timing" onChange="showPassengers(this.name, this.value);"><option value="">-- Select --</option>';
	 			foreach ($number as $row) {
					echo '<option value="' . $row->time . '">'. $row->time . '</option>';
				}
				echo '</select>';
			}
} else if (JRequest::getVar('info')) {
	$info = JRequest::getVar('info');
	$detail = explode(":", $info);
	$flight = $detail[0];
	$date = $detail[1];
	$source = $detail[2];
	$destination = $detail[3];
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date' AND source='$source' AND destination='$destination'";
	$db->setQuery($query, 0);
	$rows = $db->loadObjectList();
	if (count($rows)) {
		echo '<strong>Time: </strong> <select name="' . $flight . '" id="time" onChange="showFlightPassengers(this.name, this.value)"><option value="">Select</option>';
		foreach ($rows as $row) {
			echo '<option value="' . $row->time. '">' . $row->time . '</option>';
		}
		echo '</select>';
	} else {
		echo '<span style="color: red;"><strong>No flight details<strong></span>';
	}	
} else if (JRequest::getVar('time')) {
	$time = JRequest::getVar('time');
	$departure = JRequest::getVar('departure');
	$departure = explode(" ", $departure);
	$date = $departure[0];
	$flight = $departure[1];
	$place = JRequest::getVar('txt');
	$route = explode(":", $place);
	$source = $route[0];
	$destination = $route[1];
	echo '<h2>Passenger Details: </h2>';
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date' AND source='$source' AND destination='$destination' AND time='$time'";			
	$db->setQuery($query, 0);
	$number = $db->loadObjectList();			
	
	if (count($number)) {
		foreach ($number as $row) {
			for ($i=1; $i<49; $i++) {
				$seat = "seat" . $i;
					if (isset($row->$seat)) {
						$booked_seat[$i] = $i;
						$passenger_id[$i] = $row->$seat;												
					}
			}				
		}	
	}				
?>
	<table class="adminlist">
	<thead>
	<tr>
	<th class="title">Seat No. </th><th>Name </th><th>Address </th><th>Date of Birth</th><th>Mobile </th><th>Alternate Contact No.</th><th>Email </th>
	</tr>
	</thead>
<?php												
				for ($j=1; $j<=count($passenger_id); $j++) {
					$query = "SELECT * FROM #__customer WHERE id='$passenger_id[$j]'";
					$db->setQuery($query, 0);
					if ($rows = $db->loadObjectList()) {
						foreach ($rows as $row) {
?>
	<tr>
	<td align="center"><?php echo $booked_seat[$j]; ?></td><td><?php echo $row->title . " " . $row->firstname . " " . $row->lastname; ?></td><td><?php echo $row->address1 . "<br />"; if (isset($row->address2)) {  echo $row->address2 . "<br />"; } echo $row->city . "<br />" .  $row->state . "<br />" . $row->country . "<br />" . $row->zip; ?></td><td><?php echo $row->dob; ?></td><td><?php echo $row->mobile; ?></td><td><?php echo $row->alternate; ?></td><td><?php echo $row->email; ?></td>
	</tr>
<?php 						
						}						
					}					
				}
				echo '</table>';
				echo '<br /><br /><br /><div align="center"><a href="index.php?option=com_reviews&task=book&flight=' . $flight . '">Back</a></div>';
} else if (JRequest::getVar('id')) {
	//Retrieve Route from the jos_booked table
	$flight = JRequest::getVar('id');
	$date = JRequest::getVar('schedule');
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date'";
	$db->setQuery($query, 0);
	$rows = $db->loadObjectList();
	if (count($rows)) {
		echo '<strong>Route: </strong><select name="' . $flight . '" id="route" onChange="displayFlightTiming(this.name);"><option value="">Select</option>';
		if ($rows = $db->loadObjectList()) {
			foreach ($rows as $row) {
				echo '<option value="' . $row->source . ':' . $row->destination . '">' . $row->source . ' >> ' . $row->destination .  '</option>';				
			}
		}
		echo '</select>';
	} else {
		echo '<span style="color:red;">No Details.</span>';
	}
} else if (JRequest::getVar('route')) {
	$route = JRequest::getVar('route'); //Contains the flight_id and date
	$info = explode(" ", $route);
	$date = $info[0];
	$flight_id = $info[1];
	
	//Retrieve route information from the jos_booked table
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__booked WHERE flight_id='$flight_id' AND departure='$date'";
	$db->setQuery($query, 0);
	$rows = $db->loadObjectList();
	if (count($rows)) {
		echo '<strong>Route: </strong><select name="' . $route . '" id="route" onChange="showDetails(this.name, this.value);"><option value="">Select</option>';
		foreach ($rows as $row) {
			echo '<option value="' . $row->source . ':' . $row->destination . '">' . $row->source . ' >> ' . $row->destination .  '</option>';
		}			
	} else {
		echo '<span style="color:red;">No Details.</span>';
	}	
} else if(JRequest::getVar('passenger')) {
	$passenger = JRequest::getVar('passenger');
	$info = explode(":", $passenger);
	$flight = $info[0];
	$date = $info[1];
	$source = $info[2];
	$destination = $info[3];
	$time = $info[4];
	echo '<h2>Passenger Details: </h2>';
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date' AND source='$source' AND destination='$destination' AND time='$time'";			
	$db->setQuery($query, 0);
	$number = $db->loadObjectList();			
	
	if (count($number)) {
		foreach ($number as $row) {
			for ($i=1; $i<49; $i++) {
				$seat = "seat" . $i;
					if (isset($row->$seat)) {
						$booked_seat[$i] = $i;
						$passenger_id[$i] = $row->$seat;												
					}
			}				
		}	
	}				
?>
	<table class="adminlist">
	<thead>
	<tr>
	<th class="title">Seat No. </th><th>Name </th><th>Address </th><th>Date of Birth</th><th>Mobile </th><th>Alternate Contact No.</th><th>Email </th>
	</tr>
	</thead>
<?php												
				for ($j=1; $j<=count($passenger_id); $j++) {
					$query = "SELECT * FROM #__customer WHERE id='$passenger_id[$j]'";
					$db->setQuery($query, 0);
					if ($rows = $db->loadObjectList()) {
						foreach ($rows as $row) {
?>
	<tr>
	<td align="center"><?php echo $booked_seat[$j]; ?></td><td><?php echo $row->title . " " . $row->firstname . " " . $row->lastname; ?></td><td><?php echo $row->address1 . "<br />"; if (isset($row->address2)) {  echo $row->address2 . "<br />"; } echo $row->city . "<br />" .  $row->state . "<br />" . $row->country . "<br />" . $row->zip; ?></td><td><?php echo $row->dob; ?></td><td><?php echo $row->mobile; ?></td><td><?php echo $row->alternate; ?></td><td><?php echo $row->email; ?></td>
	</tr>
<?php 						
						}						
					}					
				}
				echo '</table>';
}
?>