			
	<?php
	$con = mysqli_connect("localhost","root","");
	
	$tmppsw = $_POST["psw"];
	$tmpusr = $_POST["usr"];
	$repsw = $_POST["repsw"];
	$flag = false;
	
	if(1 === preg_match('~[0-9]~', $tmppsw)){
		$flag = true;
	}
	
	
	
	if(!$con)
		echo "failed";
	else{
		mysqli_select_db($con,"ergasia");
		if(strlen($tmpusr) <=10 && $flag && strcmp($tmppsw,$repsw) == 0){
			$sql = "INSERT INTO users (id,username, psw, mail)VALUES (default,'$_POST[usr]', '$_POST[psw]', '$_POST[mail]');";
			mysqli_query($con,$sql);
			header("location:index.php");
		}			
		else{
			if(!$flag)
				echo "Wrong password must contain a number!<br>";
			if(strlen($tmpusr) >10)
				echo "UserName too long max 10 characters<br>"; 
			?>
			<html>
			<head>
				<link rel="stylesheet" type="text/css" href="signup.css">
			</head>
			
			<body background="assets/backgrounds/signinbg2.jpg">
				<div class="navbar">
					 <a class="active" href="index.html">Home</a>
					 <a href = "display.html">MiNiPic</a>
					 <a href="#contact">Contact</a>
					 <a href="signIn.html">Sign In</a>
				</div> 
				 
				<form  style="background-color:#E6E6FA" name = "sign_up_form" method="post" action="sign_up.php">
					  <div class="imgcontainer">
						<img src="assets/avatar/avatar.png" alt="Avatar" class="avatar">
					  </div>

					  <div class="container">
						<b>Username</b>
						<input type="text" placeholder="Enter Username" name="usr" required> 
						<?php
						if(strlen($tmpusr)>10){
							echo "<p style= 'color:Red;'>UserName too long max 10 characters<br></p>";
						}
						?> 

						<b>Password</b>
						<input type="password" placeholder="Enter Password" name="psw" required>
						<?php 
						if(!$flag) 
							echo "<p style= 'color:Red;'>Wrong password must contain a number!<br></p>";
						?>
						
						<b>Repeat Password</b>
						<input type="password" placeholder="Enter Password" name="repsw" required>
						
						<?php 
						if(strcmp($tmppsw,$repsw) !=0) 
							echo "<p style= 'color:Red;'>Passwords doesn't match<br></p>";
						?>
						<b>E-Mail</b>
						<input type="text" placeholder="Enter E-Mail" name="mail" required>
						

						<button type="submit">Sign up</button>
						
						<p>Already have an account? <a href = "signIn.html"> Sign In</a>
					
				</form> 
			</body>


			
		<?php }
			
		
		
		mysqli_close($con);
	}
		
	?>
	</html>