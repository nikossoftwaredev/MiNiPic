<html>

	<head>
		<link rel="stylesheet" type="text/css" href="display.css">
	</head>
		<body>
			<?php
				session_start();
				if (isset($_SESSION['usr'])) {	
				$usr=$_SESSION['usr'];			
			?>
				<div class="navbar">
					 <a class="active" href="index.php">Home</a>
					 <a href ="display.php?a=all">MiNiPic</a>
					 <a href="contactUs.html">Contact Us</a>
					 <a href="searchPhotos.html">Search Photos</a>
					 <a href="JavaScript:newPopup('addnew.html');">Add new photo</a>				 
					 <a href="logout.php">Log-out</a>					 
				</div> 
			<?php
			}else {
			?>
				<div class="navbar">
					 <a class="active" href="index.php">Home</a>
					 <a href = "display.php?a=all">MiNiPic</a>
					 <a href="contactUs.html">Contact Us</a>
					 <a href="searchPhotos.html">Search Photos</a>
					 <a href="signUp.html">Sign Up</a>
					 <a href="signIn.html">Sign In</a>
				</div> 
			<?php
			}
			?>
						
			
			

			
			  
			
			
			<script type="text/javascript">
			
			function RefreshMO(event) {

					event.preventDefault()event.preventDefault()
				 
				 
			}
			
			function newPopup(url) {
				
				popupWindow = window.open(
					url,'popUpWindow','height=600,width=900,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
			}
			</script>
			
			
							
<?php 
	$con = mysqli_connect("localhost","root","");
	
	$searchText = $_POST['searchText'];
	$order = $_POST['order'];
	$searchProp = $_POST['searchProp'];
	
	
	
	mysqli_select_db($con,"ergasia");
	
	if($searchProp == 'per'){
		
		if($order == 'des'){
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE description LIKE '%$searchText%' ORDER BY mo DESC ";
			
		}
		else{
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE description LIKE '%$searchText%' ORDER BY mo ";
			
		}
	}
	else if($searchProp == 'cat'){
		
		if($order == 'des'){
			
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE category LIKE  '%$searchText%' ORDER BY mo DESC ";	
		}
		else{
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE category LIKE '%$searchText%' ORDER BY mo";
			
		}
	}else if($searchProp == 'usr'){
		
		if($order == 'des'){
			
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE username LIKE  '%$searchText%' ORDER BY mo DESC ";	
		}
		else{
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE username LIKE '%$searchText%' ORDER BY mo";
			
		}
	}else if($searchProp == 'nam'){
		
		if($order == 'des'){
			
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE name LIKE '%$searchText%' ORDER BY mo DESC ";	
		}
		else{
			
			$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE name LIKE '%$searchText%' ORDER BY mo";
			
		}
	}
	
	
	$result = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($result)){				
		echo("<table class = 'left'><tr ><td rowspan='7'> <form name = 'submitForm' method = 'post' action='sumbit_vote.php'><a href ='../uploads/".$row['name']."' ><img class = 'mikro' src = ../uploads/" .$row['name']. "></a></td></tr><tr><td valign='top' width = '40%' height='8.3%'><b>Name: </b>" .$row['name']."<input type='hidden' name='please' value= '".$row['name']."'></td></tr><tr><td valign='top' height='8.3%'><b>Χρήστης:</b>".$row['username']."</td></tr><tr><td valign='top' height='8.3%'><b>Κατηγορία:</b>".$row['category']."</td></tr><tr><td valign='top' height='41.5%'><b>Περιγραφή:</b>".$row['description']."</td></tr><tr><td valign='top' height='8.3%'><b>Χάρτης:</b></td></tr><tr><td valign='top' height='24.9%'><b>Μ.Ο. Βαθμολογίας:</b> ".$row['mo']." <br><b># Ψήφων: </b>".$row['nov']."<br><b>Ψήφισε:<br><img class = 'photologo' src = 'assets/icons/photograph.png' ><input size='1' type='text' id = 'vote' name='vote'>/10</input><button name = 'refreshB' id = 'refreshB' type='button' onclick='RefreshMO(event)'>Ok</button></form></tr></table>");
	}

	mysqli_close($con);
	
	
	
	
	
	
?>
</body>
</html>