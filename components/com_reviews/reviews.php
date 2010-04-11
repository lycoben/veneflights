<script type="text/javascript" src="includes/js/overlib_mini.js"></script>
<?php 
defined ('_JEXEC') or die ('Restricted Access');
// Details from the Flight Search Module
if ((JRequest::getVar('from')) && (JRequest::getVar('to')) && (JRequest::getVar('depart')) && (JRequest::getVar('time'))) {
	 echo '<div class="componentheading">Step 1: Choose a Departure Flight</div>';	
	 //Booking Details
	 $from = JRequest::getVar('from');
	 $to = JRequest::getVar('to');
	 $depart = JRequest::getVar('depart');
	 $time = JRequest::getVar('time');
	 $class = JRequest::getVar('class');	
	 //Round Trip
	 $trip = JRequest::getVar('trip');
	 if ($trip = "Round Trip") {
	 $return = JRequest::getVar('return'); 
	 $returnTime = JRequest::getVar('returnTime');
	 }
	 //Passenger Details
	 $adults = JRequest::getVar('adults');
	 $children = JRequest::getVar('children');
	 $infants = JRequest::getVar('infants');	 
	 //Change departure time to weekday
	 $day = JFactory::getDate($depart)->toFormat('%A');	 
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
	 //Parse time
	 $explodeTime = explode(":", $time);
	 $timeQuery = $explodeTime[0];
	 
	 if ($explodeTime[2]) {
	 	$flightTime = $explodeTime[1] . ':' . $explodeTime[2];
	 } else {
	 	$flightTime = $explodeTime[1];
	 }
?>	
	 <hr />
	 <table width="100%">
	 <tr>
	 <th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Flight Time</th><th>Class</th>
	 </tr>
	 <tr>
	 <td><?php echo $source; ?></td><td><?php echo $destination; ?></td><td><?php echo $depart; ?></td><td><?php echo $day; ?></td><td><?php echo $flightTime; ?></td><td><?php echo $class; ?></td>
	 </tr>
	 </table>
	 <hr />
<?php 	 
	 if (substr($from, 1, 1) != ':') {
	 	//Straight Oneway Trip ~ from source to destination
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$source' AND destination='$destination' AND $timeQuery='$flightTime'";
		$db->setQuery($query, 0);		
		if ($rows = $db->loadObjectList()) {
			foreach ($rows as $row) {
				$flight_id = $row->id;
				$airlines = $row->airlines;
				$price = strtolower($class);
				$flight_number = $row->flight_number;
				$cost = $row->$price;
				
?>
				<br />
				<p align="center">
				<table border="1" cellpadding="5" cellspacing="0" width="100%" align="center" style="font-family:Arial, Helvetica, sans-serif;">
				<tr>
				<th>Airlines</th><th>Flight No.</th><th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Time</th><th>Class</th><th>Price</th><th>No of Seats</th><th>Book</th>
				</tr>
				<td><a class="modal" href="./components/com_reviews/flight.php?id=<?php echo $flight_id; ?>" rel="{handler: 'iframe', size: {x: 600, y: 400}}"><?php echo $row->airlines; ?></a></td>
				<td><?php echo $row->flight_number; ?></td>
				<td><?php echo $source; ?></td>
				<td><?php echo $destination; ?></td>
				<td><?php echo $depart; ?></td>
				<td><?php echo $day; ?></td>
				<td><?php echo $flightTime; ?></td>
				<td><?php echo $class; ?></td>
				<td><?php echo "$" .  $row->$price; ?></td>
				<td align="center"><?php echo $row->seats; ?></td>
				<td><?php echo '<a href="index.php?option=com_reviews&select=flight">Book</a>'; ?></td>
				</table>
				</p>
<?php 			
			}
			//Passing details using session variables
			session_start();
			//Booking Details
			$_SESSION['from'] = $from;
			$_SESSION['source'] = $source;
			$_SESSION['destination'] = $destination;
			$_SESSION['depart'] = $depart;
			$_SESSION['class'] = $class;
			$_SESSION['flightTime'] = $flightTime;
			//Return Details
			$_SESSION['return'] = $return;
			$_SESSION['returnTime'] = $returnTime;
			//Flight Details	 	
	 		$_SESSION['id'] = $flight_id;
			$_SESSION['airlines'] = $airlines;
			$_SESSION['flight_number'] = $flight_number;
			$_SESSION['cost'] = $cost;
			//Passenger Details
			$_SESSION['adults'] = $adults;
			$_SESSION['children'] = $children;
			$_SESSION['infants'] = $infants;
		
			//Check jos_booked to see whether details for the flight exists or not
	 		$db =& JFactory::getDBO();
	 		$query = "SELECT * FROM #__booked WHERE flight_id='$flight_id' AND departure='$depart' AND source='$source' AND destination='$destination' AND time='$flightTime'";
			$db->setQuery($query, 0);
			$rows = $db->loadObjectList();
			if (count($rows) == 0) {
				$sql = "INSERT INTO #__booked (flight_id, departure, source, destination, time) VALUES ('$flight_id', '$depart', '$source', '$destination', '$flightTime')";
				$db->setQuery($sql);
				$db->query();
			} 
		} 
	 } else {
	 	//Reverse Onewsy Trip ~ from destination to source
		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__airlines WHERE source='$destination' AND destination='$source' AND $timeQuery='$flightTime'";
		$db->setQuery($query, 0);		
		if ($rows = $db->loadObjectList()) {
			foreach ($rows as $row) {
				$flight_id = $row->id;
				$airlines = $row->airlines;
				$price = strtolower($class);
				$flight_number = $row->flight_number;
				$cost = $row->$price;
?>
				<br />
				<p>
				<table border="1" cellpadding="5" cellspacing="0" width="100%">
				<tr>
				<th>Airlines</th><th>Flight No.</th><th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Time</th><th>Class</th><th>Price</th><th>No of Seats</th><th>Book</th>
				</tr>
				<td><a href="components/com_reviews/index.php?option=com_reviews&id=<?php echo $flight_id; ?>"><?php echo $row->airlines; ?></a></td><td><?php echo $row->flight_number; ?></td><td><?php echo $source; ?></td><td><?php echo $destination; ?></td><td><?php echo $depart; ?></td><td><?php echo $day; ?></td><td><?php echo $flightTime; ?></td><td><?php echo $class; ?></td><td><?php echo "$" .  $row->$price; ?></td><td align="center"><?php echo $row->seats; ?></td><td><?php echo '<a href="index.php?option=com_reviews&select=flight">Book</a>'; ?></td>
				</table>
				</p>
<?php 			
			}
		} 
		//Passing details using session variables
		session_start();
		//Booking Details
		$_SESSION['from'] = $from;
		$_SESSION['source'] = $source;
		$_SESSION['destination'] = $destination;
		$_SESSION['depart'] = $depart;
		$_SESSION['class'] = $class;
		$_SESSION['flightTime'] = $flightTime;
		//Return Details
		$_SESSION['return'] = $return;
		$_SESSION['returnTime'] = $returnTime;
		//Flight Details	 	
	 	$_SESSION['id'] = $flight_id;
		$_SESSION['airlines'] = $airlines;
		$_SESSION['flight_number'] = $flight_number;
		$_SESSION['cost'] = $cost;
		//Passenger Details
		$_SESSION['adults'] = $adults;
		$_SESSION['children'] = $children;
		$_SESSION['infants'] = $infants;
		
		//Check jos_booked to see whether details for the flight exists or not
	 		$db =& JFactory::getDBO();
	 		$query = "SELECT * FROM #__booked WHERE flight_id='$flight_id' AND departure='$depart' AND source='$source' AND destination='$destination' AND time='$flightTime'";
			$db->setQuery($query, 0);
			$rows = $db->loadObjectList();
			if (count($rows) == 0) {
				$sql = "INSERT INTO #__booked (flight_id, departure, source, destination, time) VALUES ('$flight_id', '$depart', '$source', '$destination', '$flightTime')";
				$db->setQuery($sql);
				$db->query();
			} 
	 }	 
} 
if (JRequest::getVar('select')) {
	echo '<div class="componentheading">Step 2: Review Details</div>';
	$from = $_SESSION['from'];
	$source = $_SESSION['source'];
	$destination = $_SESSION['destination'];
	$depart = $_SESSION['depart'];
	$flightTime = $_SESSION['flightTime'];
	$flight_number = $_SESSION['flight_number'];
	$class = $_SESSION['class'];
	$cost = $_SESSION['cost'];
	$flight_id = $_SESSION['id'];
	$airlines = $_SESSION['airlines'];
	//Return Details	
	$return = $_SESSION['return'];
	$returnTime = $_SESSION['returnTime'];
	//Booking Details
	$adults = $_SESSION['adults'];
	$children = $_SESSION['children'];
	$infants = $_SESSION['infants'];	
?>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
	<th colspan="6" align="center" style="background-color: #000099; color:white;">Review Details</th>
	</tr>
	<tr>
	<th align="center">Departure</th><th align="center">Arrival</th><th align="center">Duration</th><th align="center">Flight Number</th><th align="center">Fare</th><th align="center">Airline</th>
	</tr>
	<tr>
	<td align="center"><?php echo $source . '<br />' . $depart . '<br />' . $flightTime; ?></td><td align="center"><?php echo $destination . '<br />' . $depart; ?></td><td align="center"><?php echo '45 min'; ?></td><td align="center"><?php echo $flight_number; ?></td><td align="center"><?php echo $class . '<br />' . '$' . $cost; ?></td><td align="center"><?php echo $airlines; ?></td>
	</tr>
	</table>
	<br />
<?php
	if ($return) {
		$returnDay = JFactory::getDate($return)->toFormat('%A');
		$explodeTime = explode(":", $returnTime);
		$returnQuery = $explodeTime[0];
		
		if ($explodeTime[2]) {
			$returnnewTime = $explodeTime[1] . ':' . $explodeTime[2];
		} else {
			$returnnewTime = $explodeTime[1];
		}
		//Return Flight		
		if (substr($from, 1, 1) == ":") {
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__airlines WHERE source='$destination' AND destination='$source' AND $returnQuery='$returnnewTime'";
			$db->setQuery($query, 0);		
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$rflight_id = 'r:' . $row->id;
					$rairlines = $row->airlines;
					$rprice = strtolower($class);
					$rflight_number = $row->flight_number;
					$rcost = $row->$rprice;				
?>
					<br />
					<p align="center">
					<table border="1" cellpadding="5" cellspacing="0" width="100%" align="center" style="font-family:Arial, Helvetica, sans-serif;">
					<tr>
					<th colspan="11" align="center" style="background-color: #000099; color:white;">Select Return Flight</th>
					</tr>
					<tr>
					<th>Airlines</th><th>Flight No.</th><th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Time</th><th>Class</th><th>Price</th><th>No of Seats</th><th>Book</th>
					</tr>
					<td><a class="modal" href="./components/com_reviews/flight.php?id=<?php echo $rflight_id; ?>" rel="{handler: 'iframe', size: {x: 600, y: 400}}"><?php echo $row->airlines; ?></a></td>
					<td><?php echo $row->flight_number; ?></td>
					<td><?php echo $destination; ?></td>
					<td><?php echo $source; ?></td>
					<td><?php echo $return; ?></td>
					<td><?php echo $returnDay; ?></td>
					<td><?php echo $returnnewTime; ?></td>
					<td><?php echo $class; ?></td>
					<td><?php echo "$" .  $rcost; ?></td>
					<td align="center"><?php echo $row->seats; ?></td>
					<td><input type="button" value="Select" onClick="window.location = 'index.php?option=com_reviews&book=ticket';" /></td>
					</table>
					<br />
					</p>
<?php 			
				}
			}
			$_SESSION['rflight_id'] = $rflight_id;
			$_SESSION['returnnewTime'] = $returnnewTime;
			//Check jos_booked to see whether details for the flight exists or not
	 		$db =& JFactory::getDBO();
	 		$query = "SELECT * FROM #__booked WHERE flight_id='$rflight_id' AND departure='$return' AND source='$destination' AND destination='$source' AND time='$returnnewTime'";
			$db->setQuery($query, 0);
			$rows = $db->loadObjectList();
			if (count($rows) == 0) {
				$sql = "INSERT INTO #__booked (flight_id, departure, source, destination, time) VALUES ('$rflight_id', '$return', '$destination', '$source', '$returnnewTime')";
				$db->setQuery($sql);
				$db->query();
			} 
		} else {			
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__airlines WHERE source='$source' AND destination='$destination' AND $returnQuery='$returnnewTime'";
			$db->setQuery($query, 0);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$rflight_id = 'r:' . $row->id;
					$rairlines = $row->airlines;
					$rprice = strtolower($class);
					$rflight_number = $row->flight_number;
					$rcost = $row->$rprice;				
?>
					<br />
					<p align="center">
					<table border="1" cellpadding="5" cellspacing="0" width="100%" align="center" style="font-family:Arial, Helvetica, sans-serif;">
					<tr>
					<th colspan="11" align="center" style="background-color: #000099; color:white;">Select Return Flight</th>
					</tr>
					<tr>
					<th>Airlines</th><th>Flight No.</th><th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Time</th><th>Class</th><th>Price</th><th>No of Seats</th><th>Book</th>
					</tr>
					<td><a class="modal" href="./components/com_reviews/flight.php?id=<?php echo $flight_id; ?>" rel="{handler: 'iframe', size: {x: 600, y: 400}}"><?php echo $row->airlines; ?></a></td>
					<td><?php echo $row->flight_number; ?></td>
					<td><?php echo $destination; ?></td>
					<td><?php echo $source; ?></td>
					<td><?php echo $return; ?></td>
					<td><?php echo $returnDay; ?></td>
					<td><?php echo $returnnewTime; ?></td>
					<td><?php echo $class; ?></td>
					<td><?php echo "$" .  $rcost; ?></td>
					<td align="center"><?php echo $row->seats; ?></td>
					<td><input type="button" value="Select" onClick="window.location = 'index.php?option=com_reviews&book=ticket';" /></td>
					</table>
					<br />
					</p>
<?php 			
				}
			}
			$_SESSION['rflight_id'] = $rflight_id;
			$_SESSION['returnnewTime'] = $returnnewTime;
			//Check jos_booked to see whether details for the flight exists or not
	 		$db =& JFactory::getDBO();
	 		$query = "SELECT * FROM #__booked WHERE flight_id='$rflight_id' AND departure='$return' AND source='$destination' AND destination='$source' AND time='$returnnewTime'";
			$db->setQuery($query, 0);
			$rows = $db->loadObjectList();
			if (count($rows) == 0) {
				$sql = "INSERT INTO #__booked (flight_id, departure, source, destination, time) VALUES ('$rflight_id', '$return', '$destination', '$source', '$returnnewTime')";
				$db->setQuery($sql);
				$db->query();
			} 
		} 
	} else {
?>
		<p align="right">
		<input type="button" value="Continue Booking" onClick="window.location = 'index.php?option=com_reviews&book=ticket';"/>
		</p>
<?php 
		
	}
}
if (JRequest::getVar('book')) {
	 JHTML::_('behavior.calendar');	 
	 echo '<div class="componentheading">Step 3: Pricing Details</div>';
	 //Return Journey
	 $return = $_SESSION['return'];
	 $rflight_id = $_SESSION['rflight_id'];
	 $cost = $_SESSION['cost'];
	 $class = $_SESSION['class'];
	 $adults = $_SESSION['adults'];
	 $children = $_SESSION['children'];
	 $infants = $_SESSION['infants'];	
	 $flight_id = $_SESSION['id']; 
	 $depart = $_SESSION['depart'];
	 $flightTime = $_SESSION['flightTime'];
	 $source = $_SESSION['source'];
	 $destination = $_SESSION['destination'];
	 //Obtain price for children and infants
	$db =& JFactory::getDBO();
	$query = "SELECT * FROM #__airlines WHERE id='$flight_id'";
	$db->setQuery($query, 0);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			if (isset($children)) {
				$sql = 'c' . strtolower($class); 
				$cprice = $row->$sql;						
			}
			if (isset($infants)) {
				$sql = 'i' . strtolower($class); 
				$iprice = $row->$sql;				
			}
			$tax = $row->tax;
			$serviceTax = $row->serviceTax;
		}
	}
	//Compute total price
	$atotal = $adults * $cost;
	$ctotal = $children * $cprice;
	$itotal = $infants * $iprice;
	$taxes = $tax * ($adults + $children + $infants);
	$total1 = $atotal + $ctotal + $itotal + $taxes;
	$service = $serviceTax * $total1 /100;
	if ($return) {
		//Obtain price for children and infants for return journey
		$explodeID = explode(":", $rflight_id);
		$return_id = $explodeID[1];
		$query = "SELECT * FROM #__airlines WHERE id='$return_id'";
		$db->setQuery($query, 0);
		if ($rows = $db->loadObjectList()) {
			foreach ($rows as $row) {
				$adultprice = strtolower($class);
				$radultprice = $row->$adultprice;
				if (isset($children)) {
					$sql = 'c' . strtolower($class); 
					$rcprice = $row->$sql;						
				}
				if (isset($infants)) {
					$sql = 'i' . strtolower($class); 
					$riprice = $row->$sql;				
				}
				$rtax = $row->tax;
				$rserviceTax = $row->serviceTax;
			}
		}
		//Return Journey
		$ratotal = $adults * $radultprice;
		$rctotal = $children * $rcprice;
		$ritotal = $infants * $riprice;
		$rtaxes = $rtax * ($adults + $children + $infants);
		$rtotal1 = $ratotal + $rctotal + $ritotal + $rtaxes;
		$rservice = $rserviceTax * $rtotal1 /100;
		$grandTotal = $total1 + $service + $rtotal1 + $rservice;
	} else {
		$grandTotal = $total1 + $service;
	}
	//Session variables
	$_SESSION['grandTotal'] = $grandTotal;
?>
	<table border="1" cellpadding="5" cellspacing="0" width="100%">
	<tr>
	<th colspan="4" align="center" style="background-color:#000099; color:white;">Pricing Details</th>
	</tr>
	<tr>
	<th colspan="4" style="background-color:#E0FFFF;">One Way Journey:</th>
	</tr>
	<tr>
	<th align="center">Passenger Type</th><th align="center">Passenger(s)</th><th align="center">Price Per Person</th><th>Total</th>
	</tr>
	<tr align="center">
	<td>Adult</td><td><?php echo $adults; ?></td><td><?php echo '$' . $cost; ?></td><td align="right"><?php echo '$'; printf('%.2f', $atotal); ?></td>
	</tr>
	<tr align="center">
	<td>Children</td><td><?php echo $children; ?></td><td><?php echo '$' . $cprice; ?></td><td align="right"><?php echo '$'; printf('%.2f', $ctotal); ?></td>
	</tr>
	<tr align="center">
	<td>Infant</td><td><?php echo $infants; ?></td><td><?php echo '$' . $iprice; ?></td><td align="right"><?php echo '$'; printf('%.2f', $itotal); ?></td>
	</tr>
	<tr>
	<td colspan="3" align="right">Taxes & Fees</td><td align="right"><?php echo '$'; printf('%.2f', $taxes); ?></td>
	</tr>
	<tr>
	<td colspan="3" align="right">Service Tax</td><td align="right"><?php echo '$'; printf('%.2f', $service); ?></td>
	</tr>
	<?php
	if ($return) {
?>
		<tr>
		<th colspan="4" style="background-color:#E0FFFF;">Return Journey:</th>
		</tr>
		</tr>
		<tr>
		<th align="center">Passenger Type</th><th align="center">Passenger(s)</th><th align="center">Price Per Person</th><th>Total</th>
		</tr>
		<tr align="center">
		<td>Adult</td><td><?php echo $adults; ?></td><td><?php echo '$' . $radultprice; ?></td><td align="right"><?php echo '$'; printf('%.2f', $ratotal); ?></td>
		</tr>
		<tr align="center">
		<td>Children</td><td><?php echo $children; ?></td><td><?php echo '$' . $rcprice; ?></td><td align="right"><?php echo '$'; printf('%.2f', $rctotal); ?></td>
		</tr>
		<tr align="center">
		<td>Infant</td><td><?php echo $infants; ?></td><td><?php echo '$' . $riprice; ?></td><td align="right"><?php echo '$'; printf('%.2f', $ritotal); ?></td>
		</tr>
		<tr>
		<td colspan="3" align="right">Taxes & Fees</td><td align="right"><?php echo '$'; printf('%.2f', $rtaxes); ?></td>
		</tr>
		<tr>
		<td colspan="3" align="right">Service Tax</td><td align="right"><?php echo '$'; printf('%.2f', $rservice); ?></td>
		</tr>
<?php 
	}
?>	
	<tr>
	<td colspan="3" align="right"><strong>Total Price</strong></td><td align="right"><?php echo '<strong>$'; printf('%.2f', $grandTotal); echo '</strong>'; ?></td>
	</tr>
	</table>
	<br /><br />
	<p align="right">
	<input type="button" value="Continue Booking" onClick="window.location = 'index.php?option=com_reviews&passenger=details';" />
	</p>
<?php
}
if (JRequest::getVar('passenger')) {
	echo '<div class="componentheading">Step 4: Passenger Details</div>';
	$adults = $_SESSION['adults'];
	$children = $_SESSION['children'];
	$infants = $_SESSION['infants'];
?>	
<script language="javascript" type="text/javascript">
function validate_required(field,alerttxt) {
	with (field) {
		if (value==null||value=="") {
			alert(alerttxt);
			return false;
		} else {
			return true;
		}
	}
}

function validate_form(thisform) {
	with (thisform) {
		if (validate_required(title,"Please select your title")==false) {
			title.focus();
			return false;
		}
		if (validate_required(firstname,"Firstname must be filled out!")==false) {
			firstname.focus();
			return false;
		}
		if (validate_required(lastname,"Lastname must be filled out!")==false) {
			lastname.focus();
			return false;
		}
		if (validate_required(address1,"Address must be filled out!")==false) {
			address1.focus();
			return false;
		}
		if (validate_required(city,"City must be filled out!")==false) {
			city.focus();
			return false;
		}
		if (validate_required(state,"State must be filled out!")==false) {
			state.focus();
			return false;
		}
		if (validate_required(country,"Country must be filled out!")==false) {
			country.focus();
			return false;
		}
		if (validate_required(zip,"Zip must be filled out!")==false) {
			zip.focus();
			return false;
		}
		if (validate_required(dob,"Date of Birth must be filled out!")==false) {
			dob.focus();
			return false;
		}
		if (validate_required(moblie,"Mobile must be filled out!")==false) {
			mobile.focus();
			return false;
		}
		if (validate_required(email,"Email must be filled out!")==false) {
			email.focus();
			return false;
		}
		if (validate_required(ltitle,"Please select the title")==false) {
			ltitle.focus();
			return false;
		}
		if (validate_required(lfirstname,"First name must be filled out!")==false) {
			lfirstname.focus();
			return false;
		}
		if (validate_required(lname,"Last name must be filled out!")==false) {
			lname.focus();
			return false;
		}
		if (validate_required(ldob,"Date of Birth must be filled out!")==false) {
			ldob.focus();
			return false;
		}
		if (validate_required(payment,"Please select a payment mode")==false) {
			payment.focus();
			return false;
		}		
	}
}
</script>
<form action="index.php?option=com_reviews&seat=select" method="post" name="bookingform" id="bookingform" onSubmit="return validate_form(this);">
<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
<tr>
<th colspan="4" align="center" style="background-color:#000099; color:white;">Contact Information: Lead Passenger (First Adult)</th>
</tr>
<tr>
<td colspan="4" align="center">Please enter the details of the lead traveller. This is the name under which the booking will be held.</td>
</tr>
<tr>
<td><b>Title: </b></td><td><select name="title"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
<td></td><td></td>
<tr>
<td><b>First Name: </b></td><td><input type="text" name="firstname" id="firstname" onBlur="checkField(this.id, this.value)" /></td>
<td><b>Last Name: </b></td><td><input type="text" name="lastname" id="lastname" /></td>
</tr>
<tr>
<td><b>Address 1: </b></td><td><input type="text" name="address1" id="address1" /></td>
<td><b>Address 2: </b></td><td><input type="text" name="address2" id="address2" /></td>
</tr>
<tr>
<td><b>City: </b></td><td><input type="text" name="city" id="city" /></td>
<td><b>State: </b></td><td><input type="text" name="state" id="state" /></td>
</tr>
<tr>
<td><b>Country: </b></td><td><input type="text" name="country" id="country" /></td>
<td><b>Zip: </b></td><td><input type="text" name="zip" id="zip" /></td>
</tr>
<tr>
<td><b>DOB: </b></td>
<td><select name="day"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year" id="year"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select>
</td>
<td></td><td></td>											 
</tr>
<tr>
<td><b>Mobile No: </b></td><td><input type="text" name="mobile" id="mobile" /></td>
<td><b>Alternate No: </b></td><td><input type="text" name="alternate" id="alternate" /></td>
</tr>
<tr>
<td><b>Email: </b></td><td colspan="3"><input type="text" name="email" id="email" size="40" /></td>
</tr>						
<tr>
<td colspan="4"><b>Note: </b>Please ensure passenger name matches name on your proof of identity.</td>
</tr>								 
</table>
<br />
<?php
if ($adults>1) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Second Adult</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ltitle2"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="lfirstname2" id="lfirstname2" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="llastname2" id="llastname2" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day2"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month2"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year2" id="year2"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($adults > 2) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Third Adult</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ltitle3"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="lfirstname3" id="lfirstname3" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="llastname3" id="llastname3" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day3"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month3"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year3" id="year3"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($adults > 3) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Fourth Adult</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ltitle4"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="lfirstname4" id="lfirstname4" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="llastname4" id="llastname4" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day4"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month4"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year4" id="year4"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($adults > 4) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Fifth Adult</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ltitle5"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="lfirstname5" id="lfirstname5" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="llastname5" id="llastname5" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day5"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month5"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year5" id="year5"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($adults > 5) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Sixth Adult</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ltitle6"><option value="">-- Select --</option><option value="Mr.">Mr. </option><option value="Ms.">Ms. </option><option value="Mrs. ">Mrs. </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="lfirstname6" id="lfirstname6" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="llastname6" id="llastname6" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day6"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month6"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year6" id="year6"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($children > 0) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">First Child</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ctitle1"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="cfirstname1" id="cfirstname1" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="clastname1" id="clastname1" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day7"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month7"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year7" id="year7"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($children > 1) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Second Child</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ctitle2"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="cfirstname2" id="cfirstname2" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="clastname2" id="clastname2" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day8"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month8"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year8" id="year8"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($children > 2) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Third Child</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ctitle3"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="cfirstname3" id="cfirstname3" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="clastname3" id="clastname3" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day9"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month9"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year9" id="year9"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($children > 3) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Fourth Child</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ctitle4"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="cfirstname4" id="cfirstname4" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="clastname4" id="clastname4" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day10"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month10"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year10" id="year10"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($infants > 0) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">First Infant</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ititle1"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="ifirstname1" id="ifirstname1" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="ilastname1" id="ilastname1" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day11"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month11"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year11" id="year11"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($infants > 1) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Second Infant</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ititle2"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="ifirstname2" id="ifirstname2" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="ilastname2" id="ilastname2" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day12"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month12"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year12" id="year12"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
if ($infants > 2) {
?>
	<br />
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr>
	<th align="center" style="background-color:#000099;color:white;" colspan="4">Third Infant</th>
	</tr>
	<tr>
	<td><b>Title: </b></td><td><select name="ititle3"><option value="">-- Select --</option><option value="Master">Master </option><option value="Miss">Miss </option></select></td>
	<td></td><td></td>
	</tr>
	<tr>
	<td><b>First Name: </b></td><td><input type="text" name="ifirstname3" id="ifirstname3" /></td>
	<td><b>Last Name: </b></td><td><input type="text" name="ilastname3" id="ilastname3" /></td>
	</tr>
	<tr>
	<td><b>DOB: </b></td><td><select name="day13"><option value="">Day</option>
		 <?php 
		 for ($i=1; $i<=31; $i++) {
			 echo '<option value="' . $i . '">' . $i . '</option>';
		 }
		 ?>
         </select>
         &nbsp; <select name="month13"><option value="">Month</option>
         <?php
		 $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		 for ($i=0; $i<count($month); $i++) {
		 	if ($i < 9) {
		 		echo '<option value="0' . ($i+1) . '">' . $month[$i] . '</option>';
			} else {
				echo '<option value="' . ($i+1) . '">' . $month[$i] . '</option>';
			}
		 }
		 ?>
         </select> &nbsp;
		 <select name="year13" id="year13"><option value="">Year &nbsp;</option>
		<?php 
		for ($i=2008; $i>1939; $i--) {
			echo '<option value="' . $i . '">' . $i . '</option>';
		}
		?>
		</select></td>
	<td></td><td></td>
	</tr>	
	</table>
<?php 
}
?>
<!--
<br />
<table border="0" cellpadding="5" cellspacing="0" align="center" width="80%" align="center">
<tr>
<th colspan="3" align="center" style="background-color:#000099; color:white;">Payment Option</th>
</tr>
<tr>
<td><input type="radio" name="payment" id="creditcard" value="Credit Card" checked="checked" /> Credit Card</td>
<td><input type="radio" name="payment" id="netbanking" value="Net Banking" /> Net Banking</td>
<td><input type="radio" name="payment" id="option3" value="option3" /> Option 3</td>
</tr>
<tr>
<td><input type="radio" name="payment" id="option4" value="option4" /> Option 4</td>
<td><input type="radio" name="payment" id="option5" value="option5" /> Option 5</td>
<td><input type="radio" name="payment" id="option6" value="option6" /> Option 6</td>
</tr>
</table>
-->
<br /><br />

<p align="right"><input type="submit" name="submit" value="Continue Booking" /></p>
</form>
<?php  
}

// Save data from the booking form into database
if (JRequest::getVar('seat')) {
	echo '<div class="componentheading">Step 5: Seat Selection</div>';
	//First Adult
	 $title = JRequest::getVar('title');
	 $firstname = JRequest::getVar('firstname');
	 $lastname = JRequest::getVar('lastname');
	 $address1 = JRequest::getVar('address1');
	 $address2 = JRequest::getVar('address2');
	 $city = JRequest::getVar('city');
	 $state = JRequest::getVar('state');
	 $country = JRequest::getVar('country');
	 $zip = JRequest::getVar('zip');
	 //DOB
	 $day = JRequest::getVar('day');
	 $month = JRequest::getVar('month');
	 $year = JRequest::getVar('year');
	 //Add a leading zero to day if less than 10
	 if ($day<10) {
	 	$day = '0' . $day;
	 } else {
	 	$day = $day;
	 }
	 $dob = $year . '-' . $month . '-' . $day; 
	 $mobile = JRequest::getVar('mobile');
	 $alternate = JRequest::getVar('alternate');
	 $email = JRequest::getVar('email');
	 //No of Passengers
	 $adults = $_SESSION['adults'];
	 $children = $_SESSION['children'];
	 $infants = $_SESSION['infants'];
	 //Cost details
	 $price = $_SESSION['grandTotal'] ;
	 //Payment details
	 $payment = JRequest::getVar('payment');
	 $booked_on = date('Y-m-d H:i:s');
	 //SESSION variables
	 $flight_id = $_SESSION['id'];
	 $departure = $_SESSION['depart'];
	 $source = $_SESSION['source'];
	 $destination = $_SESSION['destination'];
	 $time = $_SESSION['flightTime'];
	 //Return Session Variables
	 $return = $_SESSION['return'];
	 $rflight_id = $_SESSION['rflight_id'];
	 $returnnewTime = $_SESSION['returnnewTime'];
	 //Enter first adult details into the jos_customer database	 
	 $db =& JFactory::getDBO();
	 
	 $query = "INSERT INTO #__customer (title, firstname, lastname, address1, address2, city, state, country, zip, dob, mobile, alternate, email, price, payment, booked_on) VALUES ('$title', '$firstname', '$lastname', '$address1', '$address2', '$city', '$state', '$country', '$zip', '$dob', '$mobile', '$alternate', '$email', '$price', '$payment', '$booked_on')";
	 $db->setQuery($query, 0);
	 $db->query();
	 
	$i = 1;
	//Retrieve customer_id from jos_customer
	$query2 = "SELECT * FROM #__customer ORDER BY id DESC LIMIT 1";
	$db->setQuery($query2);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$customer_id = $row->id;
		}
	}
	$_SESSION['customer_id'] = $customer_id;
?>	
	<table border="0" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr style="background-color:#000099;color:white;">
	<th>S.No.</th><th>Name</th><th>Passenger Type</th><th>One Way Trip</th>
<?php
	if ($return) {
?>
		<th>Return Trip</th>
<?php 	
	}
?>	
	</tr>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $title . '. ' . $firstname . ' ' . $lastname; ?></td><td>First Adult</td><td><span id="seatMsg1"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'customer:' . $customer_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=1" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg1"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'customer:' . $customer_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=1" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php
if ($adults > 1) {
	$ltitle2 = JRequest::getVar('ltitle2');
	$lfirstname2 = JRequest::getVar('lfirstname2');
	$llastname2 = JRequest::getVar('llastname2');
	//DOB - Second Adult
	 $day2 = JRequest::getVar('day2');
	 $month2 = JRequest::getVar('month2');
	 $year2 = JRequest::getVar('year2');
	 //Add a leading zero to day if less than 10
	 if ($day2<10) {
	 	$day2 = '0' . $day2;
	 } else {
	 	$day2 = $day2;
	 }
	 $ldob2 = $year2 . '-' . $month2 . '-' . $day2; 
	$ltype2 = "Second Adult";
	//Insert lead information into jos_leads	
	$query3 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ltitle2', '$lfirstname2', '$llastname2', '$ldob2', '$ltype2')";
	$db->setQuery($query3);
	$db->query();	
	$query4 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ltitle2' AND firstname='$lfirstname2' AND lastname='$llastname2' AND dob='$ldob2' AND type='$ltype2'";
	$db->setQuery($query4);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$adult2_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ltitle2 . '. ' . $lfirstname2 . ' ' . $llastname2; ?></td><td>Second Adult</td><td><span id="seatMsg2"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $adult2_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=2&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg2"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $adult2_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=2&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>		</tr>
<?php 
}
if ($adults > 2) {
	$ltitle3 = JRequest::getVar('ltitle3');
	$lfirstname3 = JRequest::getVar('lfirstname3');
	$llastname3 = JRequest::getVar('llastname3');
	//DOB - Third Adult
	 $day3 = JRequest::getVar('day3');
	 $month3 = JRequest::getVar('month3');
	 $year3 = JRequest::getVar('year3');
	 //Add a leading zero to day if less than 10
	 if ($day3<10) {
	 	$day3 = '0' . $day3;
	 } else {
	 	$day3 = $day3;
	 }
	 $ldob3 = $year3 . '-' . $month3 . '-' . $day3; 
	$ltype3 = "Third Adult";
	//Insert lead information into jos_leads	
	$query5 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ltitle3', '$lfirstname3', '$llastname3', '$ldob3', '$ltype3')";
	$db->setQuery($query5);
	$db->query();	
	$query6 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ltitle3' AND firstname='$lfirstname3' AND lastname='$llastname3' AND dob='$ldob3' AND type='$ltype3'";
	$db->setQuery($query6);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$adult3_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ltitle3 . '. ' . $lfirstname3 . ' ' . $llastname3; ?></td><td>Third Adult</td><td><span id="seatMsg3"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $adult3_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=3&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg3"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $adult3_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=3&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>		</tr>
<?php 
}
if ($adults > 3) {
	$ltitle4 = JRequest::getVar('ltitle4');
	$lfirstname4 = JRequest::getVar('lfirstname4');
	$llastname4 = JRequest::getVar('llastname4');
	//DOB - Fourth Adult
	 $day4 = JRequest::getVar('day4');
	 $month4 = JRequest::getVar('month4');
	 $year4 = JRequest::getVar('year4');
	 //Add a leading zero to day if less than 10
	 if ($day4<10) {
	 	$day4 = '0' . $day4;
	 } else {
	 	$day4 = $day4;
	 }
	 $ldob4 = $year4 . '-' . $month4 . '-' . $day4; 
	$ltype4 = "Fourth Adult";
	//Insert lead information into jos_leads		
	$query7 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ltitle4', '$lfirstname4', '$llastname4', '$ldob4', '$ltype4')";
	$db->setQuery($query7);
	$db->query();	
	$query8 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ltitle4' AND firstname='$lfirstname4' AND lastname='$llastname4' AND dob='$ldob4' AND type='$ltype4'";
	$db->setQuery($query8);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$adult4_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ltitle4 . '. ' . $lfirstname4 . ' ' . $llastname4; ?></td><td>Fourth Adult</td><td><span id="seatMsg4"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $adult4_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=4&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg4"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $adult4_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=4&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>		</tr>
<?php 
}
if ($adults > 4) {
	$ltitle5 = JRequest::getVar('ltitle5');
	$lfirstname5 = JRequest::getVar('lfirstname5');
	$llastname5 = JRequest::getVar('llastname5');
	//DOB - Fifth Adult
	 $day5 = JRequest::getVar('day5');
	 $month5 = JRequest::getVar('month5');
	 $year5 = JRequest::getVar('year5');
	 //Add a leading zero to day if less than 10
	 if ($day5<10) {
	 	$day5 = '0' . $day5;
	 } else {
	 	$day5 = $day5;
	 }
	 $ldob5 = $year5 . '-' . $month5 . '-' . $day5; 
	$ltype5 = "Fifth Adult";
	//Insert lead information into jos_leads		
	$query9 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ltitle5', '$lfirstname5', '$llastname5', '$ldob5', '$ltype5')";
	$db->setQuery($query9);
	$db->query();	
	$query10 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ltitle5' AND firstname='$lfirstname5' AND lastname='$llastname5' AND dob='$ldob5' AND type='$ltype5'";
	$db->setQuery($query10);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$adult5_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ltitle5 . '. ' . $lfirstname5 . ' ' . $llastname5; ?></td><td>Fifth Adult</td><td><span id="seatMsg5"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $adult5_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=5&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg5"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $adult5_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=5&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>		</tr>
<?php 
}
if ($adults > 5) {
	$ltitle6 = JRequest::getVar('ltitle6');
	$lfirstname6 = JRequest::getVar('lfirstname6');
	$llastname6 = JRequest::getVar('llastname6');
	//DOB - Sixth Adult
	 $day6 = JRequest::getVar('day6');
	 $month6 = JRequest::getVar('month6');
	 $year6 = JRequest::getVar('year6');
	 //Add a leading zero to day if less than 10
	 if ($day6<10) {
	 	$day6 = '0' . $day6;
	 } else {
	 	$day6 = $day6;
	 }
	 $ldob6 = $year6 . '-' . $month6 . '-' . $day6; 
	$ltype6 = "Sixth Adult";
	//Insert lead information into jos_leads		
	$query11 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ltitle6', '$lfirstname6', '$llastname6', '$ldob6', '$ltype6')";
	$db->setQuery($query11);
	$db->query();			
	$query12 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ltitle6' AND firstname='$lfirstname6' AND lastname='$llastname6' AND dob='$ldob6' AND type='$ltype6'";
	$db->setQuery($query12);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$adult6_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ltitle6 . '. ' . $lfirstname6 . ' ' . $llastname6; ?></td><td>Sixth Adult</td><td><span id="seatMsg6"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $adult6_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=6&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
<?php
	if ($return) {
?>
			<td><span id="returnMsg6"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $adult6_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=6&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>		
</tr>
<?php 
}
if ($children > 0) {
	$ctitle1 = JRequest::getVar('ctitle1');
	$cfirstname1 = JRequest::getVar('cfirstname1');
	$clastname1 = JRequest::getVar('clastname1');
	//DOB - First Child (Seventh Person)
	 $day7 = JRequest::getVar('day7');
	 $month7 = JRequest::getVar('month7');
	 $year7 = JRequest::getVar('year7');
	 //Add a leading zero to day if less than 10
	 if ($day7<10) {
	 	$day7 = '0' . $day7;
	 } else {
	 	$day7 = $day7;
	 }
	 $cdob1 = $year7 . '-' . $month7 . '-' . $day7; 
	$ctype1 = "First Child";
	//Insert lead information into jos_leads	
	
	$child1 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ctitle1', '$cfirstname1', '$clastname1', '$cdob1', '$ctype1')";
	$db->setQuery($child1);
	$db->query();			
	$child2 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ctitle1' AND firstname='$cfirstname1' AND lastname='$clastname1' AND dob='$cdob1' AND type='$ctype1'";
	$db->setQuery($child2);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$child1_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ctitle1 . '. ' . $cfirstname1 . ' ' . $clastname1; ?></td><td>First Child</td><td><span id="seatMsg7"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $child1_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=7&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg7"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $child1_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=7&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
if ($children > 1) {
	$ctitle2 = JRequest::getVar('ctitle2');
	$cfirstname2 = JRequest::getVar('cfirstname2');
	$clastname2 = JRequest::getVar('clastname2');
	//DOB - Second Child (Eighth Person)
	 $day8 = JRequest::getVar('day8');
	 $month8 = JRequest::getVar('month8');
	 $year8 = JRequest::getVar('year8');
	 //Add a leading zero to day if less than 10
	 if ($day8<10) {
	 	$day8 = '0' . $day8;
	 } else {
	 	$day8 = $day8;
	 }
	 $cdob2 = $year8 . '-' . $month8 . '-' . $day8; 
	$ctype2 = "Second Child";
	//Insert lead information into jos_leads		
	$child3 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ctitle2', '$cfirstname2', '$clastname2', '$cdob2', '$ctype2')";
	$db->setQuery($child3);
	$db->query();				
	$child4 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ctitle2' AND firstname='$cfirstname2' AND lastname='$clastname2' AND dob='$cdob2' AND type='$ctype2'";
	$db->setQuery($child4);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$child2_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ctitle2 . '. ' . $cfirstname2 . ' ' . $clastname2; ?></td><td>Second Child</td><td><span id="seatMsg8"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $child2_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=8&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg8"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $child2_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=8&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
if ($children > 2) {
	$ctitle3 = JRequest::getVar('ctitle3');
	$cfirstname3 = JRequest::getVar('cfirstname3');
	$clastname3 = JRequest::getVar('clastname3');
	//DOB - Thrid Child (Ninth Person)
	 $day9 = JRequest::getVar('day9');
	 $month9 = JRequest::getVar('month9');
	 $year9 = JRequest::getVar('year9');
	 //Add a leading zero to day if less than 10
	 if ($day9<10) {
	 	$day9 = '0' . $day9;
	 } else {
	 	$day9 = $day9;
	 }
	 $cdob3 = $year9 . '-' . $month9 . '-' . $day9; 
	$ctype3 = "Third Child";
	//Insert lead information into jos_leads		
	$child5 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ctitle3', '$cfirstname3', '$clastname3', '$cdob3', '$ctype3')";
	$db->setQuery($child5);
	$db->query();				
	$child6 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ctitle3' AND firstname='$cfirstname3' AND lastname='$clastname3' AND dob='$cdob3' AND type='$ctype3'";
	$db->setQuery($child6);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$child3_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ctitle3 . '. ' . $cfirstname3 . ' ' . $clastname3; ?></td><td>Third Child</td><td><span id="seatMsg9"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $child3_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=9&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg9"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $child3_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=9&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
if ($children > 3) {
	$ctitle4 = JRequest::getVar('ctitle4');
	$cfirstname4 = JRequest::getVar('cfirstname4');
	$clastname4 = JRequest::getVar('clastname4');
	//DOB - Fourth Child (Tenth Person)
	 $day10 = JRequest::getVar('day10');
	 $month10 = JRequest::getVar('month10');
	 $year10 = JRequest::getVar('year10');
	 //Add a leading zero to day if less than 10
	 if ($day10<10) {
	 	$day10 = '0' . $day10;
	 } else {
	 	$day10 = $day10;
	 }
	 $cdob4 = $year10 . '-' . $month10 . '-' . $day10; 
	$ctype4 = "Fourth Child";
	//Insert lead information into jos_leads		
	$child7 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ctitle4', '$cfirstname4', '$clastname4', '$cdob4', '$ctype4')";
	$db->setQuery($child7);
	$db->query();				
	$child8 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ctitle4' AND firstname='$cfirstname4' AND lastname='$clastname4' AND dob='$cdob4' AND type='$ctype4'";
	$db->setQuery($child8);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$child4_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ctitle4 . '. ' . $cfirstname4 . ' ' . $clastname4; ?></td><td>Fifth Child</td><td><span id="seatMsg10"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $child4_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=10&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg10"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $child4_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=10&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}

if ($infants > 0) {
	$ititle1 = JRequest::getVar('ititle1');
	$ifirstname1 = JRequest::getVar('ifirstname1');
	$ilastname1 = JRequest::getVar('ilastname1');
	//DOB - First Infant (Eleventh Person)
	 $day11 = JRequest::getVar('day11');
	 $month11 = JRequest::getVar('month11');
	 $year11 = JRequest::getVar('year11');
	 //Add a leading zero to day if less than 10
	 if ($day11<10) {
	 	$day11 = '0' . $day11;
	 } else {
	 	$day11 = $day11;
	 }
	 $idob1 = $year11 . '-' . $month11 . '-' . $day11; 
	$itype1 = "First Infant";
	//Insert lead information into jos_leads		
	$infant1 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ititle1', '$ifirstname1', '$ilastname1', '$idob1', '$itype1')";
	$db->setQuery($infant1);
	$db->query();				
	$infant2 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ititle1' AND firstname='$ifirstname1' AND lastname='$ilastname1' AND dob='$idob1' AND type='$itype1'";
	$db->setQuery($infant2);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$infant1_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ititle1 . '. ' . $ifirstname1 . ' ' . $ilastname1; ?></td><td>First Infant</td><td><span id="seatMsg11"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $infant1_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=11&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg11"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $infant1_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=11&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
if ($infants > 1) {
	$ititle2 = JRequest::getVar('ititle2');
	$ifirstname2 = JRequest::getVar('ifirstname2');
	$ilastname2 = JRequest::getVar('ilastname2');
	//DOB - Second Infant (12th Person)
	 $day12 = JRequest::getVar('day12');
	 $month12 = JRequest::getVar('month12');
	 $year12 = JRequest::getVar('year12');
	 //Add a leading zero to day if less than 10
	 if ($day12<10) {
	 	$day12 = '0' . $day12;
	 } else {
	 	$day12 = $day12;
	 }
	 $idob2 = $year12 . '-' . $month12 . '-' . $day12; 
	$itype2 = "Second Infant";
	//Insert lead information into jos_leads		
	$infant3 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ititle2', '$ifirstname2', '$ilastname2', '$idob2', '$itype2')";
	$db->setQuery($infant3);
	$db->query();				
	$infant4 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ititle2' AND firstname='$ifirstname2' AND lastname='$ilastname2' AND dob='$idob2' AND type='$itype2'";
	$db->setQuery($infant4);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$infant2_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ititle2 . '. ' . $ifirstname2 . ' ' . $ilastname2; ?></td><td>Second Infant</td><td><span id="seatMsg12"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $infant2_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=12&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg12"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $infant2_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=12&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
if ($infants > 2) {
	$ititle3 = JRequest::getVar('ititle3');
	$ifirstname3 = JRequest::getVar('ifirstname3');
	$ilastname3 = JRequest::getVar('ilastname3');
	//DOB - Third Infant (13th Person)
	 $day13 = JRequest::getVar('day13');
	 $month13 = JRequest::getVar('month13');
	 $year13 = JRequest::getVar('year13');
	 //Add a leading zero to day if less than 10
	 if ($day13<10) {
	 	$day13 = '0' . $day13;
	 } else {
	 	$day13 = $day13;
	 }
	 $idob3 = $year13 . '-' . $month13 . '-' . $day13; 
	$itype3 = "Third Infant";
	//Insert lead information into jos_leads		
	$infant5 = "INSERT INTO #__leads (customer_id, title, firstname, lastname, dob, type) VALUES ('$customer_id', '$ititle3', '$ifirstname3', '$ilastname3', '$idob3', '$itype3')";
	$db->setQuery($infant5);
	$db->query();				
	$infant6 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND title='$ititle3' AND firstname='$ifirstname3' AND lastname='$ilastname3' AND dob='$idob3' AND type='$itype3'";
	$db->setQuery($infant6);
	if ($rows = $db->loadObjectList()) {
		foreach ($rows as $row) {
			$infant3_id = $row->id;
		}
	}
?>
	<tr>
	<td align="center"><?php echo $i++ . '.'; ?></td><td><?php echo $ititle3 . '. ' . $ifirstname3 . ' ' . $ilastname3; ?></td><td>Second Infant</td><td><span id="seatMsg13"><a class="modal" href="./components/com_reviews/seat.php?id=<?php echo 'leads:' . $infant3_id; ?>&flight_id=<?php echo $flight_id; ?>&departure=<?php echo $departure; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>&time=<?php echo $time; ?>&msg=13&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></span></td>
	<?php
	if ($return) {
?>
			<td><span id="returnMsg13"><a class="modal" href="./components/com_reviews/return.php?id=<?php echo 'leads:' . $infant3_id; ?>&flight_id=<?php echo $rflight_id; ?>&departure=<?php echo $return; ?>&source=<?php echo $destination; ?>&destination=<?php echo $source; ?>&time=<?php echo $returnnewTime; ?>&msg=13&refer=<?php echo $customer_id; ?>" rel="{handler: 'iframe', size: {x: 400, y: 400}}">Select Seat</a></div></td>

<?php
	} 
?>	
	</tr>
<?php 
}
?>
	<tr>
	<td colspan="4" align="right"><input type="button" value="Continue Booking" onClick="window.location = 'index.php?option=com_reviews&buy=payment';"/></td>
	</tr>
	</table>
<?php 	
}
// Payment
if (JRequest::getVar('buy')) {
		//mail('lmson2t@gmail.com', 'Test send mail from joomla', "test send mail");
		
		$content_email = "<h1>Ticket Details</h1>";
	 	echo '<div class="componentheading">Step 6: Ticket Details</div>';
		//Display Flight Details
		$source = $_SESSION['source'];
		$destination = $_SESSION['destination'];
		$depart = $_SESSION['depart'];
		$class = $_SESSION['class'];
		$flightTime = $_SESSION['flightTime'];
		//Return Details
		$return = $_SESSION['return'];
		$returnTime = $_SESSION['returnTime'];
		//Flight Details	 	
	 	$flight_id = $_SESSION['id'];
		$airlines =	$_SESSION['airlines'];
		$flight_number = $_SESSION['flight_number'];
		$grandTotal =	$_SESSION['grandTotal'];
		//Passenger Details
		$adults = $_SESSION['adults'];
		$children =	$_SESSION['children'];
		$infants =	$_SESSION['infants'];
		$customer_id = $_SESSION['customer_id'];
		$day = JFactory::getDate($depart)->toFormat('%A');
		$content_email = $content_email . '
		<table border="1" cellpadding="5" cellspacing="0">
        <tr>
        <th align="center" style="background-color:#009; color:white;" colspan="8">Flight Details</th>
        </tr>
        <tr>
	 	<th>Airline</th><th>Flight No.<th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Flight Time</th><th>Class</th>
		</tr>
	 	<tr>
	 	<td>' .  $airlines . '</td><td>' .  $flight_number . '</td><td>' .  $source . '</td><td>' .  $destination . '</td><td>' .  $depart . '</td><td>' .  $day . '</td><td>' .  $flightTime . '</td><td>' .  $class . '</td>
	 	</tr>';

		//Display details of return flight	
		//nvhieu
		if($return)
		 {
		 	$dayReturn = JFactory::getDate($return)->toFormat('%A');	
		 	//Parse time
	 		$arrTime = explode(":", $returnTime);
	 		
			if ($arrTime[2]) {
	 			$returnTime = $arrTime[1] . ':' . $arrTime[2];
	 		} else {
	 			$returnTime = $arrTime[1];
	 		}
	 		
		 	$content_email .= '
		 	<tr>
	        <th align="center" style="background-color:#009; color:white;" colspan="8">Return Details</th>
	        </tr>
	        <tr>
		 	<th>Airline</th><th>Flight No.<th>Source</th><th>Destination</th><th>Date</th><th>Weekday</th><th>Flight Time</th><th>Class</th>
			</tr>
		 	<tr>
		 	<td>'.$airlines.'</td><td>'.$flight_number.'</td><td>'.$destination.'</td><td>'.$source.'</td><td>'.$return.'</td><td>'.$dayReturn.'</td><td>'.$returnTime.'</td><td>'.$class.'</td>
		 	</tr>';
	 	
		 }
		//end nvhieu	
		//Display customer details
		$db = & JFactory::getDBO();
		$query2 = "SELECT * FROM #__customer WHERE id='$customer_id'";
		$db->setQuery($query2, 0);
		$db->query();
		
		$mail_to = "";

		$content_email = $content_email . '
        <tr>
        <th align="center" colspan="8" style="background-color: #009; color: white;">Passenger Details</th>
        </tr>
        <tr>
        <th>S.No.</th><th>Name</th><th>Address</th><th>D.O.B.</th><th>Mobile</th><th>Alternate Number</th><th>Email</th><th>Seat</th>
        </tr>';	
		$count = 1; 
		if ($rows = $db->loadObjectList()) {
			foreach ($rows as $row) {
			$content_email = $content_email . '
			<tr>
            <td align="center">' .  $count++ . '.</td>
            <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname . '</td>
            <td>' . $row->address1 . ',<br />';
			if ($row->address2) {
				$content_email = $content_email . $row->address2 . ', <br />';
			}
			
			$mail_to = $row->email;
			$content_email = $content_email . $row->city . ', <br />';
			$content_email = $content_email .  $row->state . ', <br />';
			$content_email = $content_email .  $row->country . ', <br />';
			$content_email = $content_email .  $row->zip;
			$content_email = $content_email . '
			</td>
            <td>' .  $row->dob .'</td>
            <td>' .  $row->mobile .'</td>
            <td>' .  $row->alternate .'</td>
			<td>' .  $row->email .'</td>
            <td>' .  $row->seat .'</td>
            </tr>';
			
			}	
		}
		if ($adults > 1) {		
			$query3 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Second Adult'";
			$db->setQuery($query3);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname .'</td>
                    <td></td>
                    <td>' .  $row->dob .'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat .'</td>
                    </tr>';
					
				}
			}
		}
		if ($adults > 2) {
			$query4 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Third Adult'";
			$db->setQuery($query4);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname .'</td>
                    <td></td>
                    <td>' .  $row->dob .'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat .'</td>
                    </tr>';
				
				}
			}
		}
		if ($adults > 3) {
			$query5 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Fourth Adult'";
			$db->setQuery($query5);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname .'</td>
                    <td></td>
                    <td>' .  $row->dob .'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat .'</td>
                    </tr>';
				
				}
			}
		}
		if ($adults > 4) {
			$query6 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Fifth Adult'";
			$db->setQuery($query6);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname .'</td>
                    <td></td>
                    <td>' .  $row->dob .'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat .'</td>
                    </tr>';
				
				}
			}
		}
		if ($adults > 5) {
			$query7 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Sixth Adult'";
			$db->setQuery($query7);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname .'</td>
                    <td></td>
                    <td>' .  $row->dob .'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat .'</td>
                    </tr>';
					
				}
			}
		}
		if ($children > 0) {
			$child1 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='First Child'";
			$db->setQuery($child1);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
					
				}
			}
		}
		if ($children > 1) {
			$child2 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Second Child'";
			$db->setQuery($child2);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
			
				}
			}
		}
		if ($children > 2) {
			$child3 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Third Child'";
			$db->setQuery($child3);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
		
				}
			}
		}
		if ($children > 3) {
			$child4 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Fourth Child'";
			$db->setQuery($child4);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
				
				}
			}
		}
		if ($infants > 0) {
			$infant1 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='First Infant'";
			$db->setQuery($infant1);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
				
				}
			}
		}
		if ($infants > 1) {
			$infant2 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Second Infant'";
			$db->setQuery($infant2);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
			
				}
			}
		}
		if ($infants > 2) {
			$infant3 = "SELECT * FROM #__leads WHERE customer_id='$customer_id' AND type='Third Infant'";
			$db->setQuery($infant3);
			if ($rows = $db->loadObjectList()) {
				foreach ($rows as $row) {
					$content_email = $content_email . '
        			<tr>
                    <td align="center">' .  $count++ . '.</td>
                    <td>' .  $row->title . ' ' . $row->firstname . ' ' . $row->lastname.'</td>
                    <td></td>
                    <td>' .  $row->dob.'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' .  $row->seat.'</td>
                    </tr>';
        			
				}
			}
		}
		$content_mail_to_provider = $content_email;
		$content_mail_to_provider .= 
        '<tr  style="background-color:#009; color: white;">
        <th colspan="7" align="right"></th>
        <td></td>
        </tr>
		</table>
        <br /><br />';
		
		$content_email = $content_email . '
		<tr  style="background-color:#009; color: white;">
        <th colspan="7" align="right">Grand Total: </th>
        <td>$' .  $grandTotal . '</td>
        </tr>
		</table>
        <br /><br />';
        $content_email = $content_email . '
        <div align="center">Your ticket details has been mailed to your email id. Your reservation is valid for 48 hours. The payement details and mode has been specified in the mail.</div>
        <h3>Please provide details regarding how the mail is to sent</h3> ';
       
		echo $content_email;


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
// More headers
$headers .= 'From: <hieunv_cntt@yahoo.com>'."\r\n";
//send mail to provider
mail('nguyen.van.hieu@ntis.vn',"Detail about new booking trip",$content_mail_to_provider,$headers);

$headers .= 'Cc: hieunvuit@gmail.com' . "\r\n";
//send mail to admin and customer
mail($mail_to,"Detail about new booking trip",$content_email,$headers);
}
?>