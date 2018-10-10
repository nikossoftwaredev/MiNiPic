
<?php 
	session_start();
	$destination = "C:\\xampp\\htdocs\\uploads\\" .$_FILES["filename"]["name"];
	$con = mysqli_connect("localhost","root","");	
	$filename = $_FILES["filename"]["tmp_name"];
	$actual = $_FILES["filename"]["name"];
	move_uploaded_file($filename, $destination); 
	$message = null;
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	
	echo $lat;
	echo $lng;

	if ($_FILES["filename"]["error"] == 0) { 	
		mysqli_select_db($con,"ergasia");
		$sql = "INSERT INTO picture_tbl(id, name, username , category, description, lat, lng) VALUES (default,'$actual', '$_SESSION[usr]', '$_POST[category]', '$_POST[des]', '$_POST[lat]', '$_POST[lng]');";
		mysqli_query($con,$sql);
		mysqli_close($con);
		echo "<script>window.close();</script>";
		 
	}else
		echo "Error:".$_FILES["filename"]["error"]."<br>";
 ?>

