<?php
defined ("_JEXEC") or die ("Restricted Access");
echo JText::_("<h1>Book your Trip</h1>");
echo "<hr />";
//$lists['class'] = JHTML::_('select.genericList', $class, 'class', 'class="inputbox" ' . '', 'value', 'text', $row->class);
JHTML::_('behavior.calendar');

//Retrieving source and destination from jos_airlines
$db =& JFactory::getDBO();
$query = "SELECT * FROM #__airlines";
$db->setQuery($query, 0);

$i = 0;
if ($rows = $db->loadObjectList()) {
	foreach ($rows as $row) {
		$place[$i] = $row->source;
		$i++;
		$place[$i] = "d:" . $row->destination;
		$i++;
	}
}
?>
<script language="javascript" src="./modules/mod_booking/xp_progress.js">
/***********************************************
* WinXP Progress Bar- By Brian Gosselin- http://www.scriptasylum.com/
* Script featured on Dynamic Drive- http://www.dynamicdrive.com
* Please keep this notice intact
***********************************************/
</script>
<script language="javascript" type="text/javascript">
function showTime() {
	bar1.showBar();
	var from = document.getElementById('from').value;
	var to = document.getElementById('to').value;
	var depart = document.getElementById('depart').value;
	// Clear myRequest
	myRequest = false;
	// For browsers: Safari, Firefox, etc. use one XML model
	if (window.XMLHttpRequest) {
		myRequest = new XMLHttpRequest();
		if (myRequest.overrideMimeType) {
			myRequest.overrideMimeType('text/xml');
		}
	} else if (window.ActiveXObject) {
		// For browsers: IE, version 6 and before, use another 
		try {
			myRequest = new
			ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				myRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	// Make sure the request object is valid
	if (!myRequest) {
		alert('Error: Cannot create XMLHTTP object');
		return false;
	}
	// Link to display function activated when result returned
	myRequest.onreadystatechange = displayTime;
	// Open the URL request
	url = 'index.php?option=com_time&format=raw&from=' + from + '&to=' + to + '&depart=' + depart;
	myRequest.open('GET', url, true);
	// Send request
	myRequest.send(null);
}
function displayTime() {
	// Check to make sure result came through, 4=complete
	if (myRequest.readyState == 4) {
		// Check HTTP status code
		if (myRequest.status == 200) {
			// Display the responseText
			document.getElementById('time_msg').innerHTML = myRequest.responseText;
		} else {
			alert('There was a problem with the request.');
		}
	}
}
function showReturn() {
	bar2.showBar();
	var from = document.getElementById('from').value;
	var to = document.getElementById('to').value;
	var back = document.getElementById('return').value;
	// Clear myRequest
	myRequest = false;
	// For browsers: Safari, Firefox, etc. use one XML model
	if (window.XMLHttpRequest) {
		myRequest = new XMLHttpRequest();
		if (myRequest.overrideMimeType) {
			myRequest.overrideMimeType('text/xml');
		}
	} else if (window.ActiveXObject) {
		// For browsers: IE, version 6 and before, use another 
		try {
			myRequest = new
			ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				myRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	// Make sure the request object is valid
	if (!myRequest) {
		alert('Error: Cannot create XMLHTTP object');
		return false;
	}
	// Link to display function activated when result returned
	myRequest.onreadystatechange = displayReturn;
	// Open the URL request
	url = 'index.php?option=com_time&format=raw&returnFrom=' + to + '&returnTo=' + from + '&returnDate=' + back;
	myRequest.open('GET', url, true);
	// Send request
	myRequest.send(null);
}
function displayReturn() {
	// Check to make sure result came through, 4=complete
	if (myRequest.readyState == 4) {
		// Check HTTP status code
		if (myRequest.status == 200) {
			// Display the responseText
			document.getElementById('return_msg').innerHTML = myRequest.responseText;
		} else {
			alert('There was a problem with the request.');
		}
	}
}
function showTrip(value) {
	if (value == "Round Trip") {
		document.getElementById('return').disabled = false;
	} else {
		document.getElementById('return').disabled = true;
	}
}
</script>
<form action="index.php?option=com_reviews" method="post">
<input type="radio" name="trip" id="roundtrip" checked="checked" value="Round Trip" onChange="showTrip(this.value);" /> Round Trip <input type="radio" name="trip" id="oneway" value="One Way" onChange="showTrip(this.value);" /> One Way
<hr />
<h4 align="center">Booking Details</h4>
<table border="0" cellpadding="3" cellspacing="0" width="100%">
<tr><td>From: </td><td> <select name="from" id="from"><option value=""> -- Select -- &nbsp; </option>
<?php
for ($i=0; $i<count($place); $i++) {
	$check = substr($place[$i], 0, 1);
	if ($check != 'd') {
		echo '<option value="' . $place[$i] . '">' . $place[$i] . '</option>';
	} else {
		$location = explode(":", $place[$i]);
		echo '<option value="' . $place[$i] . '">' . $location[1] . '</option>';
	}
}
?>
	</select></td></tr>
<tr><td>To: </td><td> <select name="to" id="to"><option value=""> -- Select -- &nbsp; </option>
<?php
for ($i=0; $i<count($place); $i++) {
	$check = substr($place[$i], 0, 1);
	if ($check != 'd') {
		echo '<option value="' . $place[$i] . '">' . $place[$i] . '</option>';
	} else {
		$location = explode(":", $place[$i]);
		echo '<option value="' . $place[$i] . '">' . $location[1] . '</option>';
	}
}
?>
	</select></td></tr>
<tr><td>Depart: </td><td> <input type="text" name="depart" id="depart" size="9" maxlength="12" onChange="showTime();" /> <img class="calendar" src="templates/system/images/calendar.png" alt="calendar" id="showCalendar1" />
																 						 							 						 <script type="text/javascript">
      																																 				 var startDate = new Date(1980,01,01)
        																																			 Calendar.setup(
          																																		 {
            																																	 inputField  : "depart",         // ID of the input field
            																																	 ifFormat    : "%Y-%m-%d",    // the date format
            																																	 button      : "showCalendar1",       // ID of the button
            																																	 date        : startDate
          																																		 }
        																																			 );
																																							 </script>
																																							 </td></tr>																																 																									 
<tr><td>Time: </td><td><span id="time_msg"><script type="text/javascript">
												var bar1= createBar(100,12,'white',1,'black','blue',85,5,5,"");
												bar1.hideBar();
										   </script></span></td></tr>
									  
<tr><td>Return: </td><td><input type="text" name="return" id="return" size="9" maxlength="12" onChange="showReturn();" /> <img class="calendar" src="templates/system/images/calendar.png" id="showCalendar2"  />
																 						 							 						 <script type="text/javascript">
      																																 				 var startDate = new Date(1980,01,01)
        																																			 Calendar.setup(
          																																		 {
            																																	 inputField  : "return",         // ID of the input field
            																																	 ifFormat    : "%Y-%m-%d",    // the date format
            																																	 button      : "showCalendar2",       // ID of the button
            																																	 date        : startDate
          																																		 }
        																																			 );
																																			</script></td></tr>
<tr><td>Time: </td><td><span id="return_msg"><script type="text/javascript">
												var bar2= createBar(100,12,'white',1,'black','blue',85,5,5,"");
												bar2.hideBar();
										   </script></span></td></tr>
										   
<tr><td>Class: </td><td> <select name="class" id="class"><option value="Economy">Economy </option><option value="Business">Business  </option></select></td></tr>
<tr><td colspan="2" align="center"><h4>Passenger Details</h4></td></tr>
<tr><td>Adults: </td><td align="center"><select name="adults">
										<?php
										for ($i=1; $i<7; $i++) {
											echo '<option value="' . $i . '">' . $i . '</option>';
										}
										?>
										</select></td></tr>
<tr><td>Children(2-11): </td><td align="center"><select name="children">
												<?php
												for ($i=0; $i<5; $i++) {
													echo '<option value="' . $i . '">' . $i . '</option>';
												}
												?>
												</select></td></tr>												
<tr><td>Infants<br />(under 2): </td><td align="center"><select name="infants">
														<?php
														for ($i=0; $i<4; $i++) {
															echo '<option value="' . $i . '">' . $i . '</option>';
														}
														?>
														</select></td></tr>
<tr><td></td><td></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Find Flight" /></td></tr>
</table> 
</form>