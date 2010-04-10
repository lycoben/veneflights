<?php
$id = $_REQUEST['id'];
require_once('../../configuration.php');
$config = new JConfig();
$dbprefix = $config->dbprefix;
$db = $dbprefix . "airlines";
$con = mysql_connect($config->host, $config->user, $config->password);
mysql_select_db($config->db);
$query = mysql_query("SELECT * FROM $db WHERE id='$id'");
while ($row = mysql_fetch_array($query)) {
?>
	<strong style="font-family: Arial, Helvetica, sans-serif; color: #CC3366;">Airline Details</strong>
	<hr color="#00CC00" />
	<table cellpadding="5">
	<tr>
	<th>Name of Airlines: </th><td><?php echo $row['airlines']; ?></td>
	</tr>
	<tr>
	<th>Flight Number: </th><td><?php echo $row['flight_number']; ?></td>
	</tr>
	<tr>
	<th>Source: </th><td><?php echo $row['source']; ?></td>
	</tr>
	<tr>
	<th>Destination: </th><td><?php echo $row['destination']; ?></td>
	</tr>
	</table>
<?php 	
}
mysql_close($con);
$db = $dbprefix . "images";
$con = mysql_connect($config->host, $config->user, $config->password);
mysql_select_db($config->db);
$query = mysql_query("SELECT * FROM $db WHERE airline_id='$id'");
while ($row = mysql_fetch_array($query)) {
	echo '&nbsp; <img src="../../administrator/components/com_reviews/images/' . $row['photo'] . '" height="100" width="130" alt="photo" /> &nbsp;';
}
mysql_close($con);
?>