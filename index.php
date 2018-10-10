<html>
	<head>
		<link rel="stylesheet" type="text/css" href="basicss.css">
		<link rel="icon" href="assets/logo/logo2.png">
		<TITLE> MINIPIC </TITLE>
	</head>
	<body>
	<a href = "display.php?a=all" > <img   class = "logo" src ="assets/logo/logo.jpg"></a>
			<?php
				session_start();
				if (isset($_SESSION['usr'])) {	
				$usr=$_SESSION['usr'];			
			?>
				<div class="navbar">
					 <a class="active" href="index.php">Home</a>
					 <a href = "display.php?a=all">MiNiPic</a>
					 <a href="top5.php">Top 5</a>
					 <a href="contactUs.html">Contact Us</a>
					 <a href="JavaScript:newPopup('addnew.html');">Add new photo</a>				 
					 <a href="logout.php">Log-out</a>					 
				</div> 
				<h1>Welcome <?php echo $usr ?> !</h1>
			<?php
			}else {
			?>
				<div class="navbar">
					 <a class="active" href="index.php">Home</a>
					 <a href = "display.php?a=all">MiNiPic</a>
					 <a href="top5.php">Top 5</a>
					 <a href="contactUs.html">Contact Us</a>
					 <a href="signUp.html">Sign Up</a>
					 <a href="signIn.html">Sign In</a>
				</div> 
				<h1> Καλώς ήρθες  στο MiNiPic!! </h1>
			<?php
			}
			?>
			
			<script type="text/javascript">
			
			
			function newPopup(url) {
				
				popupWindow = window.open(
					url,'popUpWindow','height=600,width=900,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
			}
			</script>

		
		
		<div> &nbsp;&nbsp;&nbsp;Το MiNiPic είναι ένα site προβολής και αξιολόγισης φωτογραφιών. Ο λόγος δημιουργίας του είναι για να περάσουμε το μάθημα "Σχεδίαση εφαρμογών υπηρεσιών διαδικτύου" του Ν. Τσελίκα.
		    Στην ιστοσελίδα υπάρχουν φωτογραφίες διάφορων κατηγοριών &nbsp;(Τοπία, Αξιοθέατα, Αντικείμενα, Πρόσωπα, Γυναίκες). Υπάρχει δυνατότητα πλοήγησης στην ιστοσελίδα σαν
			 <div class="dropdown" >
				<a class = "userCat" href="url">Guest</a>
				<div class="dropdown-content">
					 <ul>
						  <li>Πλοήγηση</li>
						  <li>Sign Up</li>
						 
					 </ul> 
				</div>
			 </div>
			, 
			<div class="dropdown" >
				<a class = "userCat" href="url">User</a>
				<div class="dropdown-content">
					 <ul>
						  <li>Πλοήγηση</li>
						  <li>Upload εικόνες</li>
						  <li>Βαθμολόγιση εικόνων</li>
						  <li>Προαγωγή σε Moderator</li>
					 </ul> 
				</div>
			</div> 	
			και
		    <div class="dropdown" >
				<a class = "userCat" href="url">Moderator.</a>
				<div class="dropdown-content">
					 <ul>
						  <li>Πλοήγηση</li>
						  <li>Upload εικόνες</li>
						  <li>Βαθμολόγιση εικόνων</li>
						  <li>Διαγραφή εικόνας-report</li>
					</ul> 
				</div>
			 </div> 
		</div>
		<div class = "clear" align = "center">
			<video width="720" height="480" controls>
				<source src="movie.mp4" type="video/mp4">
				<source src="movie.ogg" type="video/ogg">
				Your browser does not support the video tag.
			</video>
			<div "class = "bottomText" >All rights Reserved &copy; </div>
		</div>
		
		
		
		
	</body>
</head>