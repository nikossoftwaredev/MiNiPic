<?php 

	echo "wtf";
	$destination = "C:\\xampp\\htdocs\\uploads\\" .$_FILES["file"]["name"];
	$con = mysqli_connect("localhost","root","");
	
	

	
		$filename = $_FILES["file"]["tmp_name"];
		move_uploaded_file($filename,$destination);
		mysqli_select_db($con,"ergasia");
		$sql = "INSERT INTO picture_tbl(id, name, username , category, description) VALUES (default,'$_POST[name]', '$_POST[name]', '$_POST[category]', '$_POST[description]');";
		mysqli_query($con,$sql);
		mysqli_close($con);
	
	
	
	
    
 ?>