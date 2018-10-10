<?php
	$con = mysqli_connect("localhost","root","");
	session_start();
	if(!$con)
		echo "failed";
	else{
		mysqli_select_db($con,"ergasia");		
		$sql = "SELECT id FROM users WHERE '$_POST[usr]' = username AND '$_POST[psw]' = psw";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($res);
		$usr = $_POST['usr'];
		echo $usr;
		if($row >0){
			$_SESSION['usr'] = $usr;
			header("location:display.php?a=all");
		}
		else
			echo "Incorrect UserName or Password";
			mysqli_close($con);
	}
		


?>