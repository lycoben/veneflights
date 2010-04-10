<?php 
$value = $_REQUEST['value'];
$value = explode(" ", $value);
if (count($value)==2) {
	$photo = $value[1];
} else if (count($value)==3) {
	$photo = $value[1] . " " . $value[2];
} else if (count($value)==4) {
	$photo = $value[1] . " " . $value[2] . " " . $value[3];
}
$id = $value[0];
require_once('../../../configuration.php');
$conf = new JConfig();
$con = mysql_connect($conf->host, $conf->user, $conf->password);
mysql_select_db($conf->db);
mysql_query("DELETE FROM jos_images WHERE airline_id='$id' AND photo='$photo'");
mysql_close($con);

//Delete photo from the server
$conf = new JConfig();
$con = mysql_connect($conf->host, $conf->user, $conf->password);
mysql_select_db($conf->db);
$result = mysql_query("SELECT * FROM jos_images WHERE airline_id='$id' AND photo='$photo'");
while($row = mysql_fetch_array($result)) {
	$image = $row['photo'];
	$file = './images/' . $image;
	fclose($file);
	unlink($file);  
	echo 'File Deleted';
}
mysql_close($con);
?>
<script>
window.history.go(-1); 
</script>
