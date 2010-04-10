<?php
defined ('_JEXEC') or die ('Restricted Access');
class HTML_reviews {
	function editReview ($row, $lists, $option) {
		 JHTML::_('behavior.calendar');	 
		 jimport('joomla.html.pane');
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<?php 		 
		$pane =& JPane::getInstance('tabs', array('startOffset'=>0), true);
		echo $pane->startPane( 'pane' );
		echo $pane->startPanel( 'Flight Details', 'panel1' );	
?>
		 <script type="text/javascript">
		 var count = 1;
		 var insert = 5;
		  
		 function schedule(no) {
		 					while (no) {
										var x=document.getElementById('table1').insertRow(insert);
										var y=x.insertCell(0);
										var z=x.insertCell(1);
										y.innerHTML = '';
										z.innerHTML = '<strong>Day: ' + count + ' &nbsp;</strong><select name="day' + count + '"><option>--Select--</option><option value="Monday">Monday </option><option value="Tuesday">Tuesday </option><option value="Wednesday">Wednesday </option><option value="Thursday">Thursday </option><option value="Friday">Friday </option><option value="Saturday">Saturday </option><option value="Sunday">Sunday </option></select> &nbsp;&nbsp;&nbsp; <strong>No. of flights:</strong> <select name="flights_day' + count + '" id="flights_day' + count + '" onChange="displayTime(this.id, this.value);"><option value="">--Select--</option><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option></select>';
										insert++;
										no--;
										count++;
										document.getElementById("frequency").disabled = true;
							}
			}
			
			function displayTime(id, value) {
				var i = 1;
				if (id == "flights_day1") {
					var dayInsert = 6;
					document.getElementById('flights_day1').disabled = true;
				} else if (id == "flights_day2") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var dayInsert = next + 7;
					document.getElementById('flights_day2').disabled = true;
				} else if (id == "flights_day3") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var next2 = parseInt(document.getElementById('flights_day2').value);
					var dayInsert = next + next2 + 8;				
					document.getElementById('flights_day3').disabled = true;
				} else if (id == "flights_day4") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var next2 = parseInt(document.getElementById('flights_day2').value);
					var next3 = parseInt(document.getElementById('flights_day3').value);
					var dayInsert = next + next2 + next3 + 9;				
					document.getElementById('flights_day4').disabled = true;
				} else if (id == "flights_day5") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var next2 = parseInt(document.getElementById('flights_day2').value);
					var next3 = parseInt(document.getElementById('flights_day3').value);
					var next4 = parseInt(document.getElementById('flights_day4').value);
					var dayInsert = next + next2 + next3 + next4 + 10;				
					document.getElementById('flights_day5').disabled = true;
				} else if (id == "flights_day6") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var next2 = parseInt(document.getElementById('flights_day2').value);
					var next3 = parseInt(document.getElementById('flights_day3').value);
					var next4 = parseInt(document.getElementById('flights_day4').value);
					var next5 = parseInt(document.getElementById('flights_day5').value);
					var dayInsert = next + next2 + next3 + next4 + next5 + 11;				
					document.getElementById('flights_day6').disabled = true;
				} else if (id == "flights_day7") {
					var next = parseInt(document.getElementById('flights_day1').value);
					var next2 = parseInt(document.getElementById('flights_day2').value);
					var next3 = parseInt(document.getElementById('flights_day3').value);
					var next4 = parseInt(document.getElementById('flights_day4').value);
					var next5 = parseInt(document.getElementById('flights_day5').value);
					var next6 = parseInt(document.getElementById('flights_day6').value);
					var dayInsert = next + next2 + next3 + next4 + next5 + next6 + 12;				
					document.getElementById('flights_day7').disabled = true;
				}						
				//Set up field numbering
				switch (id) {
					case 'flights_day1':
						var field = 1;
						break;
					case 'flights_day2':
						var field = 2;
						break;
					case 'flights_day3':
						var field = 3;
						break;
					case 'flights_day4':
						var field = 4;
						break;
					case 'flights_day5':
						var field = 5;
						break;
					case 'flights_day6':
						var field = 6;
						break;
					case 'flights_day7':
						var field = 7;
						break;
				}		
				for (i=1; i<=value; i++) {
					var x=document.getElementById('table1').insertRow(dayInsert);
					var y=x.insertCell(0);
					var z=x.insertCell(1);
					y.innerHTML = '';
					z.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Departure ' + i + ': </strong> <input type="text" name="time' + field + i + '" id="time' + field + i + '" /> &nbsp;&nbsp;&nbsp; <strong>Return ' + i + ': </strong> <input type="text" name="return' + field + i + '" id="return' + field + i + '" />';
					dayInsert++;
					//document.getElementById().disabled = true;
				}
			}
			</script> 			
			<fieldset><legend>Airline Details </legend>
			<table class="admintable" id="table1" border="0" cellpadding="10">
			<tr>
			<td width="100" align="right" class="key">Name of Airlines: </td>
			<td><input class="text_area" type="text" name="airlines" id="airlines" size="50" maxlength="250" value="<?php echo $row->airlines; ?>" /></td>
			</tr>
			<tr>
			<td width="100" align="right" class="key">Flight Number:</td>
			<td><input class="text_area" type="text" name="flight_number" id="flight_number" size="50" maxlength="250" value="<?php echo $row->flight_number; ?>" /></td>
			</tr>
			<tr>
			<td width="100" align="right" class="key">From (Source):</td>
			<td><input class="text_area" type="text" name="source" id="source" size="50" maxlength="250" value="<?php echo $row->source; ?>" /></td>
			</tr>
			<tr>
			<td width="100" align="right" class="key">To (Destination):</td>
			<td><input class="text_area" type="text" name="destination" id="destination" size="50" maxlength="250" value="<?php echo $row->destination; ?>" /></td> 
			</tr>
			<!-- **************** SCHEDULE INFORMATION ********************* -->
<?php  
if (JRequest::getVar('task') == "edit") {
	jimport('joomla.html.pane');
	$details =& JPane::getInstance('sliders', array('allowAllClose' => true));
	echo $details->startPane( 'pane' );
?>

	 		<tr>
			<td width="100" align="right" class="key">Schedule: </td>
			<td><?php echo $details->startPanel( 'Details for Day 1', 'panel1' ); ?><strong>Day 1</strong>: <input class="text_area" type="text" name="day1" id="day1" size="10" value="<?php echo $row->day1; ?>" /><br /><br />
<?php
				for ($i=1; $i<8; $i++) {
				$time = "time1" . $i;
				$return = "return1" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time1<?php echo $i; ?>" id="time1<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return1<?php echo $i; ?>" id="return1<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
		echo $details->endPanel();
?>
			</td>
			</tr>
<?php 
	
if (isset($row->day2)) {		
?>	
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 2', 'panel2' ); ?><strong>Day 2</strong>: <input class="text_area" type="text" name="day2" id="day2" size="10" value="<?php echo $row->day2; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time2" . $i;
				$return = "return2" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time2<?php echo $i; ?>" id="time2<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return2<?php echo $i; ?>" id="return2<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
		echo $details->endPanel();
?>
			</td>			
			</tr>
<?php 
}

if (isset($row->day3)) {
?>
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 3', 'panel3' ); ?><strong>Day 3</strong>: <input class="text_area" type="text" name="day3" id="day3" size="10" value="<?php echo $row->day3; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time3" . $i;
				$return = "return3" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time3<?php echo $i; ?>" id="time3<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return3<?php echo $i; ?>" id="return3<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
			echo $details->endPanel();
?>			
			</td>
			</tr>
<?php 			
}

if (isset($row->day4)) {			
?>			
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 4', 'panel4' ); ?><strong>Day 4</strong>: <input class="text_area" type="text" name="day4" id="day4" size="10" value="<?php echo $row->day4; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time4" . $i;
				$return = "return4" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time4<?php echo $i; ?>" id="time4<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return4<?php echo $i; ?>" id="return4<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
			echo $details->endPanel();
?>			
			</td>			
			</tr>
<?php 
}

if (isset($row->day5)) {
?>			
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 5', 'panel5' ); ?><strong>Day 5</strong>: <input class="text_area" type="text" name="day5" id="day5" size="10" value="<?php echo $row->day5; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time5" . $i;
				$return = "return5" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time5<?php echo $i; ?>" id="time5<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return5<?php echo $i; ?>" id="return5<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
			echo $details->endPanel();
?>			
			</td>			
			</tr>
<?php 
}

if (isset($row->day6)) {
?>				
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 6', 'panel6' ); ?><strong>Day 6</strong>: <input class="text_area" type="text" name="day6" id="day6" size="10" value="<?php echo $row->day6; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time6" . $i;
				$return = "return6" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time6<?php echo $i; ?>" id="time6<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return6<?php echo $i; ?>" id="return6<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
			echo $details->endPanel();
?>			
			</td>			
			</tr>
<?php 
}

if (isset($row->day7)) {
?>				
			<tr>
			<td width="100" align="right" class="key"></td>
			<td><?php echo $details->startPanel( 'Details for Day 7', 'panel7' ); ?><strong>Day 7</strong>: <input class="text_area" type="text" name="day7" id="day7" size="10" value="<?php echo $row->day7; ?>" /><br /><br />
<?php
			for ($i=1; $i<8; $i++) {
				$time = "time7" . $i;
				$return = "return7" . $i;
				if (isset($row->$time)) {
				?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departure<?php echo $i; ?>: <input class="text_area" type="text" name="time7<?php echo $i; ?>" id="time7<?php echo $i; ?>" size="10" value="<?php echo $row->$time; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Return<?php echo $i; ?>: <input class="text_area" type="text" name="return7<?php echo $i; ?>" id="return7<?php echo $i; ?>" size="10" value="<?php echo $row->$return; ?>" /><br />
				<?php				
				}
			}
			echo $details->endPanel();
			echo $details->endPane();
?>			
			</td>			
			</tr>
<?php
	
}
} else {
?>			
		<tr>
		<td width="100" align="right" class="key">No. of flights in a week:</td>
		<td><select name="frequency" id="frequency" onchange="schedule(this.value);"><option> -- </option><option value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option></select></td>
		</tr>
<?php  
}
?>		
		<tr>
		<td width="100" class="key" rowspan="2"> Price (Adults): </td><td>Economy:  $ <input class="text_area" type="text" name="economy" id="economy" size="10" maxlength="10" value="<?php echo $row->economy; ?>" /></td>
		</tr>
		<tr>
		<td>Business: $ <input class="text_area" type="text" name="business" id="business" size="10" maxlength="10" value="<?php echo $row->business; ?>" /></td>
		</tr>
		<tr>
		<td width="100" class="key" rowspan="2"> Price (Children): </td><td>Economy:  $ <input class="text_area" type="text" name="ceconomy" id="ceconomy" size="10" maxlength="10" value="<?php echo $row->ceconomy; ?>" /></td>
		</tr>
		<tr>
		<td>Business: $ <input class="text_area" type="text" name="cbusiness" id="cbusiness" size="10" maxlength="10" value="<?php echo $row->cbusiness; ?>" /></td>
		</tr>
		<tr>
		<td width="100" class="key" rowspan="2"> Price (Infant): </td><td>Economy:  $ <input class="text_area" type="text" name="ieconomy" id="ieconomy" size="10" maxlength="10" value="<?php echo $row->ieconomy; ?>" /></td>
		</tr>
		<tr>
		<td>Business: $ <input class="text_area" type="text" name="ibusiness" id="ibusiness" size="10" maxlength="10" value="<?php echo $row->ibusiness; ?>" /></td>
		</tr>
		<tr>
		<td width="100" align="right" class="key">Taxes/Fees:</td>
		<td> $ <input class="text_area" type="text" name="tax" id="tax" size="10" maxlength="10" value="<?php echo $row->tax; ?>" /></td>
		<tr>
		<tr>
		<td width="100" align="right" class="key">Service Tax:</td>
		<td><input class="text_area" type="text" name="serviceTax" id="serviceTax" size="3" maxlength="3" value="<?php echo $row->serviceTax; ?>" /> %</td>
		<tr>
		<td width="100" align="right" class="key">Number of Seats:</td>
		<td><input class="text_area" type="text" name="seats" id="seats" size="10" maxlength="250" value="<?php echo $row->seats; ?>" /></td>
		</tr>		
<?php  
/*         *************************
if (JRequest::getVar('task') == "edit") {
	 //Display nothing
} else {
?>
    <tr>	 														
		<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Image Upload</strong></td>
		</tr>
		<tr>
		<td width="100" align="right" class="key"><label for="upload">Airline Logo:</label></td>
		<td><input type="file" name="upload" id="upload" /></td>
		</tr>
<?php  
}
*************************** */
?>
		</table>
		</fieldset>
		<br /><br />
<?php 
echo $pane->endPanel();

if (JRequest::getVar('task') == "edit") { 
	echo $pane->startPanel( 'Airline Images', 'panel2' );
		
	//Display Images
	$db =& JFactory::getDBO();	
	$id = $row->id;
	$query = "SELECT * FROM #__images WHERE airline_id='$id'";
	$db->setQuery($query, 0);
	 if ($rows = $db->loadObjectList()) {
	 		foreach ($rows as $row) {
				$image = $row->photo;				
				echo '<img src="./components/com_reviews/images/' . $image . '" alt="' . $image . '" height="150" width="200" /> &nbsp; <input name="delete" id="' . $id . " " . $image . '" type="button" value="Delete" onclick="deletePhoto(this.id)"> &nbsp;';			
?>
<script>
function deletePhoto(str) {
	window.location = './components/com_reviews/deletephoto.php?value=' + str;
}
</script>
<?php					
			}
			echo '<fieldset><legend>Add More Images: </legend><div align="center"><iframe src="./components/com_reviews/uploadmore.php?id=' . $id . '" align="center" frameborder="0" width="50%"></iframe></div></fieldset>';
	 } else {
	 	echo '<h2 align="center">No images uploaded.</h2>';
		echo '<fieldset><legend>Add Images: </legend><div align="center"><iframe src="./components/com_reviews/uploadmore.php?id=' . $id . '" align="center" frameborder="0" width="50%"></iframe></div></fieldset>';
	 }
	echo $pane->endPanel();
	echo $pane->endPane();
} else {
	echo $pane->startPanel( 'Upload Images', 'panel2' );
	
?>	
	<!-- Uploading unlimited images. Show this only when adding new entries -->
	<fieldset><legend>Airline Photos</legend><iframe src="components/com_reviews/upload.php" frameborder="0" width="50%"></iframe></fieldset>
<?php 
	echo $pane->endPanel();
	echo $pane->endPane();
}
?>
<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="task" value="" />
<?php 	
	
	echo '</form>';
	}
	
	function showSchedule($row, $option) {	
?>
			<h1 align="center">Airline Details</h1>
			<table border="0" cellpadding="5" cellspacing="0" align="center">
			<tr><th width="20%" colspan="2">Name of Airlines: </th><td colspan="3" align="center"><?php echo $row->airlines; ?></td></tr>
			<tr><th colspan="2">Flight Number: </th><td colspan="3" align="center"><?php echo $row->flight_number; ?></td></tr>
			<tr><th colspan="2">To: </th><td align="center"><?php echo $row->source; ?></td><td align="center"><?php echo $row->destination; ?></td></tr>
			<tr><th colspan="2">From: </th><td align="center"><?php echo $row->destination; ?></td><td align="center"><?php echo $row->source; ?></td></tr>
			<tr><th colspan="2">Schedule: </th><th colspan="2">Day</th>
			<tr><td colspan="2" align="center"><!-- MONDAY --><?php echo $row->day1; ?></td><th>Departure</th><th>Return</th></tr>
			<tr><td colspan="2"></td><td align="center"><?php echo $row->time11; ?></td><td align="center"><?php echo $row->return11; ?></td></tr>
			<?php
			for ($i=2; $i<8; $i++) {
				$time = "time1" . $i;
				$return = "return1" . $i;
				if (isset($row->$time)) {
					echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
				}			
			}
			?>
			<!-- TUESDAY --><?php if (isset($row->day2)) { ?><tr><td align="center" colspan="2"><?php echo $row->day2; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time2" . $i;
					$return = "return2" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			<!-- WEDNESDAY --><?php if (isset($row->day3)) { ?><tr><td colspan="2" align="center"><?php echo $row->day3; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time3" . $i;
					$return = "return3" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			
			<!-- THURSDAY --><?php if (isset($row->day4)) { ?><tr><td colspan="2" align="center"><?php echo $row->day4; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time4" . $i;
					$return = "return4" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			<!-- FRIDAY --><?php if (isset($row->day5)) { ?><tr><td colspan="2" align="center"><?php echo $row->day5; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time5" . $i;
					$return = "return5" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			<!-- SATURDAY --><?php if (isset($row->day6)) { ?><tr><td colspan="2" align="center"><?php echo $row->day6; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time6" . $i;
					$return = "return6" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			<!-- SUNDAY --><?php if (isset($row->day7)) { ?><tr><td colspan="2" align="center"><?php echo $row->day7; ?></td><th>Departure</th><th>Return</th></tr>
			<?php
				for ($i=1; $i<8; $i++) {
					$time = "time7" . $i;
					$return = "return7" . $i;
					if (isset($row->$time)) {
						echo '<tr><td colspan="2"></td><td align="center">' . $row->$time . '</td><td align="center">' . $row->$return . '</td></tr>';
					}			
				}
			}
			?>
			<tr><th colspan="2">Price of ticket: </th><td colspan="2"><?php echo "Economy: $" . $row->economy . "<br />Business: $" . $row->business; ?></td></tr>
			<tr><th colspan="2">No. of Seats: </th><td colspan="2"><?php echo $row->seats; ?></td></tr>
			</table>
			<br />
			<div align="center"><a href="index.php?option=com_reviews">Back</a></div>		
<?php 	
		
	 }
	 
	function showBooking($flight) {
		$count = 1;				
		if (!JRequest::getVar('date')) {
			echo '<h1>' . JText::_('Booking Details for ') . $flight . '</h1>';
			jimport('joomla.html.pane');
			$pane =& JPane::getInstance('tabs', array('allowAllClose' => true));
			echo $pane->startPane( 'pane' );

			echo $pane->startPanel( 'View Datewise', 'panel1' );
			JHTML::_('behavior.calendar');
?>
<script language="javascript" type="text/javascript">
var myRequest = false;
function displayFlightTiming(str) {
	var flight = str;
	var date = document.getElementById('date').value;
	var route = document.getElementById('route').value;
	var info = flight + ':' + date + ':' + route;
	//Use AJAX to get the timing of the flights
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
			myRequest.onreadystatechange = displayFTime;
			// Open the URL request
			url = 'index.php?option=com_details&format=raw&info=' + info;
			myRequest.open('GET', url, true);
			// Send request
			myRequest.send(null);
}

function displayFTime() {
			// Check to make sure result came through, 4=complete
			if (myRequest.readyState == 4) {
				// Check HTTP status code
				if (myRequest.status == 200) {
					// Display the responseText
					document.getElementById('flighttime').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
}
function displayRoute(str) {
	var flight = str;
	var date = document.getElementById('date').value;
	//Use AJAX to get the timing of the flights
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
			myRequest.onreadystatechange = displayRouteInfo;
			// Open the URL request
			url = 'index.php?option=com_details&format=raw&id=' + flight + '&schedule=' + date;
			myRequest.open('GET', url, true);
			// Send request
			myRequest.send(null);
}

function displayRouteInfo() {
			// Check to make sure result came through, 4=complete
			if (myRequest.readyState == 4) {
				// Check HTTP status code
				if (myRequest.status == 200) {
					// Display the responseText
					document.getElementById('routemsg').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
}
function showFlightPassengers(name, str) {
	var flight = name;
	var time = str;
	var date = document.getElementById('date').value;
	var route = document.getElementById('route').value;
	var passenger = flight + ':' + date + ':' + route + ':' + time;
	//Use AJAX to get the timing of the flights
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
			myRequest.onreadystatechange = displayFlightPassenger;
			// Open the URL request
			url = 'index.php?option=com_details&format=raw&passenger=' + passenger;
			myRequest.open('GET', url, true);
			// Send request
			myRequest.send(null);
}

function displayFlightPassenger() {
			// Check to make sure result came through, 4=complete
			if (myRequest.readyState == 4) {
				// Check HTTP status code
				if (myRequest.status == 200) {
					// Display the responseText
					document.getElementById('flightPassengers').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
}
</script>																				 
		<b>Date</b>: <input type="text" name="date" id="date" size="12" maxlength="12" onChange="displayRoute('<?php echo $flight; ?>');" /> <img class="calendar" src="templates/system/images/calendar.png" alt="calendar" id="showCalendar" />
																																			<script type="text/javascript">
      																																 				 var startDate = new Date(1980,01,01)
        																																			 Calendar.setup(
          																																		 {
            																																	 inputField  : "date",         // ID of the input field
            																																	 ifFormat    : "%Y-%m-%d",    // the date format
            																																	 button      : "showCalendar",       // ID of the button
            																																	 date        : startDate
          																																		 }
        																																			 );
																																			 </script>

		&nbsp; <span id="routemsg"></span>
		&nbsp; <span id="flighttime"></span>
		<br /><br /> 
		<div id="flightPassengers"></div>																																		 																																						 
<?php
		echo '<br /><br /><div align="center"><a href="index.php?option=com_reviews">Back</a></div>';	
		echo $pane->endPanel();
		echo $pane->startPanel( 'View Monthwise', 'panel2' );
?>
		<form action="index.php?option=com_reviews&task=month" method="post">
		<b>Month</b>: <select name="month"><option>-- Select Month -- </option><option value="01">January </option><option value="02">February </option><option value="03">March </option><option value="04">April </option><option value="05">May </option><option value="06">June </option><option value="07">July </option><option value="08">August </option><option value="09">September </option><option value="10">October </option><option value="11">November </option><option value="12">December </option></select>
		&nbsp; <b>Year</b>: <input type="text" size="4" name="year" id="year" value="<?php echo date('Y'); ?>">
		<input name="flight" type="hidden" value="<?php echo $flight; ?>">
		<input type="submit" value="Go" />
		</form>
<?php 		
		echo '<br /><br /><div align="center"><a href="index.php?option=com_reviews">Back</a></div>';
		echo $pane->endPanel();		
		echo $pane->endPane();			
	} else if (JRequest::getVar('task')) {
		if (JRequest::getVar('date')) {
			$flight = JRequest::getVar('flight');
			$date = JRequest::getVar('date');	
			$time = JRequest::getVar('time');	
			echo "<h2>Booking Details for " . $flight . " on " . $date . "</h2>"; 
			echo '<h3>Time: ' . $time . '</h3>';
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__booked WHERE flight_id='$flight' AND departure='$date' AND time='$time'";			
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
?>
<table class="adminlist">
<thead>
<tr>
<th class="title">Seat No. </th><th>Name </th><th>Address </th><th>Date of Birth</th><th>Mobile </th><th>Alternate Contact No.</th><th>Email </th>
</tr>
</thead>
<?php												
				for ($j=1; $j<=count($passenger_id); $j++) {
					$db =& JFactory::getDBO();
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
			} else {
				echo "<h3 align='center'>No records</h3>";
				echo '<br /><br /><div align="center"><a href="index.php?option=com_reviews&task=book">Back</a></div>';
			}		
		}
	  }
	}
	
	function showMonth($flight) {
		$month = JRequest::getVar('month');
		$year = JRequest::getVar('year');
		echo '<h1>Booking Details for ' . $flight . ' for '  .  $month . '/' . $year . ':</h1>';
		$db =& JFactory::getDBO();
		$month = $year . "-" . $month . "-"; 
		$query = "SELECT * FROM #__booked WHERE departure LIKE '$month%' AND flight_id='$flight' GROUP BY departure";
		$db->setQuery($query, 0);
		$rows = $db->loadObjectList();			
?>
		<script language="javascript" type="text/javascript">
		var myRequest = false;
		function showRoute(str) {
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
			myRequest.onreadystatechange = showRouteInfo;
			// Open the URL request
			url = 'index.php?option=com_details&format=raw&route=' + str;
			myRequest.open('GET', url, true);
			// Send request
			myRequest.send(null);
		}
		
		function showRouteInfo() {
			// Check to make sure result came through, 4=complete
			if (myRequest.readyState == 4) {
				// Check HTTP status code
				if (myRequest.status == 200) {
					// Display the responseText
					document.getElementById('route').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
		}
		function showDetails(txt, str) {
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
			url = 'index.php?option=com_details&format=raw&value=' + txt + '&travel=' + str;
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
					document.getElementById('passenger').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
		}
		
		function showPassengers(txt, value) {
			var time = value;
			var departure = document.getElementById('date').value; //Contains information about departure and flightid
			//Use AJAX to get passenger details
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
			myRequest.onreadystatechange = displayPassengers;
			// Open the URL request
			url = 'index.php?option=com_details&format=raw&time=' + time + '&departure=' + departure + '&txt=' + txt;
			myRequest.open('GET', url, true);
			// Send request
			myRequest.send(null);
		}
		
		function displayPassengers() {
			// Check to make sure result came through, 4=complete
			if (myRequest.readyState == 4) {
				// Check HTTP status code
				if (myRequest.status == 200) {
					// Display the responseText
					document.getElementById('details').innerHTML = myRequest.responseText;
				} else {
					alert('There was a problem with the request.');
				}
			}
		}
		</script>
		<br />
		
<?php 
	 		if (count($rows)) {
				echo '<strong>Select Date</strong>: <select name="date" id="date" onChange="showRoute(this.value);"><option>-- Select Date --</option>';
				foreach ($rows as $row) {
					echo "<option value='" . $row->departure . " " . $flight . "'>" . $row->departure . " </optio><br />";
				}								
				echo "</select>";
				echo "<br /><br />";
				echo '<div id="route"></div>';
				echo "<br />";
				echo "<div id='passenger'></div>";
				echo '<div id="details"></div>';
				echo '<input type="hidden" id="flight" value="' . $flight . '" />';				
			} else {
				echo '<div style="color: red; font-size: 1.2em; font-weight: bold;" align="center">No records</div><br />';
				echo '<div align="center"><a href="index.php?option=com_reviews&task=book&flight=' . $flight . '">Back</a></div>';
			}
	}
	
	function showReviews ($option, &$rows, &$pageNav) {			
?>
					 <form action="index.php" method="post" name="adminForm">
					 <table class="adminlist">
					 <thead>
					 <tr>
					 <th width="20"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($rows); ?>);" /></th>
					 <th>S. No.</th>
					 <th class="title">Airlines</th>
					 <th>Flight No</th>
					 <th>Route </th>
					 <th>Schedule </th>
					 <th>Price<br />Economy</th>
					 <th>Price<br />Business</th>
					 <th>Seats</th>					 
					 <th width="5%" nowrap="nowrap">Bookings</th>
					 </tr>
					 </thead>
<?php
		 			 jimport('joomla.filter.output');
					 $k = 0;
					 $n = 1;
					 for ($i=0, $n=count($rows); $i<$n; $i++) {
					 		 $row = &$rows[$i];
							 $id[$k] = $row->id;
							 $checked = JHTML::_('grid.id', $i, $row->id);
							 $published = JHTML::_('grid.published', $row, $i);
							 //$link = JOutputFilter::ampReplace( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->id );
							 $link = 'index.php?option=' . $option . '&task=edit&cid[]=' . $row->id;
							 $view = 'index.php?option=' . $option . '&task=view&cid[]=' . $row->id;
							 $book = 'index.php?option=' . $option . '&task=book&flight=' . $row->flight_number;
?>
							 <tr class="<?php echo 'row$k'; ?>">
							 		 <td><?php echo $checked; ?></td>
									 <td align="center"><?php echo $i+1 . "."; ?></td>
									 <td><a href="<?php echo $link; ?>"><?php echo $row->airlines; ?></a></td> 									 
									 <td><?php echo $row->flight_number; ?></td>
									 <td align="center"><?php echo $row->source . " -><- " . $row->destination; ?></td>
									 <td align="center"><a href="<?php echo $view; ?>">View</a></td>									 
									 <td align="right"><?php echo "$" . $row->economy; ?></td>
									 <td align="right"><?php echo "$" . $row->business; ?></td>
									 <td align="center"><?php echo $row->seats; ?></td>	
									 <td align="center"><a href="<?php echo $book; ?>"><?php echo "View" ?></a></td>
									 </tr>		 
<?php
		 					 $k = 1-$k;							 
					 }					 
					 
?>
					 <tfoot>
  						<td colspan="10"><?php echo $pageNav->getListFooter(); ?></td>
					 </tfoot>
					 </table>
					 <input type="hidden" name="option" value="<?php echo $option; ?>" />
					 <input type="hidden" name="task" value="" />
					 <input type="hidden" name="boxchecked" value="0" />
					 </form>
<?php	
	}
}
?>