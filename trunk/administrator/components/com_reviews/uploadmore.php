<?php 
$id = $_REQUEST['id'];
if ($_POST['submit']) {
	 $id = $_REQUEST['id'];
	 $confid = time();
	 //Function to retrieve the extension of a file
	 function findexts ($filename) {
				$filename = strtolower($filename) ;
				$exts = split("[/\\.]", $filename) ;
				$n = count($exts)-1;
				$exts = $exts[$n];
				return $exts;
	 }
	 $name = $_FILES['file']['name'];
	 if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpg")) && ($_FILES["file"]["size"] < 1000000)) {
   		if ($_FILES["file"]["error"] > 0) {
    		 echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    	} else {
    		if (file_exists("./images/" . $_FILES["file"]["name"])) {
?>
				<script type="text/javascript">
				<!--
				alert("Image already exits");
				// -->
				</script>
<?      		 
      		} else {
				//Rename file
				$ext = findexts ($_FILES['file']['name']) ; 
		 		$newName = $confid . "." . $ext;
				$target = './images/' . $confid . "." . $ext;
				move_uploaded_file($_FILES["file"]["tmp_name"], $target);  
				//Enter image details into database
				require_once('../../../configuration.php');
				$conf = new JConfig();

				$con = mysql_connect($conf->host, $conf->user, $conf->password);
				mysql_select_db($conf->db);
			
				mysql_query("INSERT INTO jos_images (airline_id, photo) VALUES ('$id', '$newName')");
				mysql_close($con);    		 
				echo '<script>window.location.reload();</script>';			
      		}
      	}
    } else { 
  		echo "Invalid file";
    }		
		echo '<img src="images/' . $newName . '" alt="" width="54" height="73">';
		
} else {
?>
<br /><br />
<?php
}
?>
<form action="uploadmore.php" method="post" enctype="multipart/form-data">
<table cellpadding="5" cellspacing="0" border="0">
<tr>
<td><label for="file" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #666666;">Filename:</label> <input type="file" name="file" id="file" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; " /></td>
<td><input type="submit" name="submit" value="Upload File" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; " /></td> 
</tr>
</table>
<input name="id" type="hidden" value="<?php echo $id; ?>">
</form>