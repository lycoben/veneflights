<?php
$id = $_REQUEST['id']; //Customer ID
$flight_id = $_REQUEST['flight_id'];
$depart = $_REQUEST['departure'];
$time = $_REQUEST['time'];
$source = $_REQUEST['source'];
$destination = $_REQUEST['destination'];
$msg = $_REQUEST['msg'];
$refer = $_REQUEST['refer'];

if ($_REQUEST['seat']) {
	$seat = $_REQUEST['seat']; 
	$id = $_REQUEST['id'];
	$flight_id = $_REQUEST['flight_id'];
	$depart = $_REQUEST['depart'];
	$time = $_REQUEST['time'];
	$source = $_REQUEST['source'];
	$destination = $_REQUEST['destination'];
	$msg = $_REQUEST['msg'];
	$refer = $_REQUEST['refer'];
	require_once('../../configuration.php');
	$config = new JConfig();
	$dbprefix = $config->dbprefix;
	$db = $dbprefix . "booked";
	$db2 = $dbprefix . 'customer';
	$db3 = $dbprefix . 'leads';
	$con = mysql_connect($config->host, $config->user, $config->password);
	mysql_select_db($config->db);
	mysql_query("UPDATE $db SET seat$seat='$id' WHERE flight_id='$flight_id' AND departure='$depart' AND source='$source' AND destination='$destination' AND time='$time'");
	//Add seat to jos_customer
	$explodeid = explode(":", $id);
	//Decide whether the customer is the main customer or leads
	$test = $explodeid[0];
	if ($test == 'customer') {
		$customer_id = $explodeid[1];
		mysql_query("UPDATE $db2 SET seat='$seat' WHERE id='$customer_id'");
	} else {
		$lead_id = $explodeid[1];
		mysql_query("UPDATE $db3 SET seat='$seat', referrer='$refer' WHERE id='$lead_id'");
	}
	mysql_close($con);
	if ($msg == 1) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg1').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php	
	}
	if ($msg == 2) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg2').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 3) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg3').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 4) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg4').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 5) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg5').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 6) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg6').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 7) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg7').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 8) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg8').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 9) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg9').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 10) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg10').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 11) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg11').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 12) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg12').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
	if ($msg == 13) {
?>
		<script language="javascript" type="text/javascript">
		window.parent.document.getElementById('seatMsg13').innerHTML = '<img src="./images/apply_f2.png" alt="tick" height="20" width="20" />';		
		</script>
<?php		
	}
?>
<script language="javascript" type="text/javascript">
	window.parent.document.getElementById('sbox-window').close();	
</script>
<?php 	
} else {
	require_once('../../configuration.php');
	$config = new JConfig();
	$dbprefix = $config->dbprefix;
	$db = $dbprefix . "booked";
	$con = mysql_connect($config->host, $config->user, $config->password);
	mysql_select_db($config->db);
	$query = mysql_query("SELECT * FROM $db WHERE flight_id='$flight_id' AND departure='$depart' AND source='$source' AND destination='$destination' AND time='$time'");
	while ($row = mysql_fetch_array($query)) {
		for ($i=1; $i<49; $i++) {
			$seat = "seat" . $i;
			if (isset($row[$seat])) {
				$status[$i] = '<div style="color: red;">' . $i . '</div>';					
			} else if (!isset($row[$seat])) {
				$status[$i] = '<a href="seat.php?seat=' . $i . '&id=' . $id . '&flight_id=' . $flight_id . '&depart=' . $depart . '&time=' . $time . '&source=' . $source . '&destination=' . $destination . '&msg=' . $msg . '&refer=' . $refer . '">'. $i . '</a>';
			}		
		}
	}
?>
	<strong style="font-family: Arial, Helvetica, sans-serif; color: #CC3366;">Seat Selection</strong>
	<hr color="#00CC00" />
	<table border="1" cellpadding="5" cellspacing="0" width="80%" align="center">
	<tr align="center">
	<td width="10%"><?php echo $status[1]; ?> </td>
	<td width="10%"><?php echo $status[2]; ?> </td>
	<td width="10%"><?php echo $status[3]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[4]; ?> </td>
	<td width="10%"><?php echo $status[5]; ?> </td>
	<td width="10%"><?php echo $status[6]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[7]; ?> </td>
	<td width="10%"><?php echo $status[8]; ?> </td>
	<td width="10%"><?php echo $status[9]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[10]; ?> </td>
	<td width="10%"><?php echo $status[11]; ?> </td>
	<td width="10%"><?php echo $status[12]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[13]; ?> </td>
	<td width="10%"><?php echo $status[14]; ?> </td>
	<td width="10%"><?php echo $status[15]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[16]; ?> </td>
	<td width="10%"><?php echo $status[17]; ?> </td>
	<td width="10%"><?php echo $status[18]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[19]; ?> </td>
	<td width="10%"><?php echo $status[20]; ?> </td>
	<td width="10%"><?php echo $status[21]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[22]; ?> </td>
	<td width="10%"><?php echo $status[23]; ?> </td>
	<td width="10%"><?php echo $status[24]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[25]; ?> </td>
	<td width="10%"><?php echo $status[26]; ?> </td>
	<td width="10%"><?php echo $status[27]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[28]; ?> </td>
	<td width="10%"><?php echo $status[29]; ?> </td>
	<td width="10%"><?php echo $status[30]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[31]; ?> </td>
	<td width="10%"><?php echo $status[32]; ?> </td>
	<td width="10%"><?php echo $status[33]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[34]; ?> </td>
	<td width="10%"><?php echo $status[35]; ?> </td>
	<td width="10%"><?php echo $status[36]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[37]; ?> </td>
	<td width="10%"><?php echo $status[38]; ?> </td>
	<td width="10%"><?php echo $status[39]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[40]; ?> </td>
	<td width="10%"><?php echo $status[41]; ?> </td>
	<td width="10%"><?php echo $status[42]; ?> </td>
	</tr>
	<tr align="center">
	<td width="10%"><?php echo $status[43]; ?> </td>
	<td width="10%"><?php echo $status[44]; ?> </td>
	<td width="10%"><?php echo $status[45]; ?> </td>
	<td>&nbsp;</td>
	<td width="10%"><?php echo $status[46]; ?> </td>
	<td width="10%"><?php echo $status[47]; ?> </td>
	<td width="10%"><?php echo $status[48]; ?> </td>
	</tr>
	</table>
<?php
}
?>