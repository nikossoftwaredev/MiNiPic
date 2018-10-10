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
					 <a href="top5.php">Top 5</a>
					 <a href="searchPhotos.html">Search Photos</a>
					 <a href="searchMapPhotos.php">Search Map Photos</a>
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
					 <a href="top5.php">Top 5</a>
					 <a href="searchMapPhotos.php">Search Map Photos</a>
					 <a href="searchPhotos.html">Search Photos</a>
					 <a href="signUp.html">Sign Up</a>
					 <a href="signIn.html">Sign In</a>
				</div> 
			<?php
			}
			?>
						
			
			

			
			  
			
			
			<script type="text/javascript">
			
			
			function newPopup(url) {
				
				popupWindow = window.open(
					url,'popUpWindow','height=600,width=900,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
			}
			
			function toggleAll() {
				
				if(document.getElementById('a').checked == true){					
					document.getElementById('b').checked = true;
					document.getElementById('c').checked = true;
					document.getElementById('d').checked = true;
					document.getElementById('e').checked = true;
					document.getElementById('f').checked = true;
				}else if(document.getElementById('a').checked == false){
					document.getElementById('b').checked = false;
					document.getElementById('c').checked = false;
					document.getElementById('d').checked = false;
					document.getElementById('e').checked = false;
					document.getElementById('f').checked = false;
				}

			}
			</script>
			
	
				
				
			
			<div class="checkboxclass">
				<form name= "checkboxForm" method="GET" action="display.php"  >
				<?php if (isset($_SESSION['usr'])) {?>
				<div><p style="color:blue;font-size:25px;font-family: Arial, Helvetica, sans-serif;"> Welcome <?php echo $usr ."!" ;?> </p></div><?php } ?>
					
					<p style="color:red;"> Filters: </p>
					
					<div><label><input onclick="toggleAll()" type="checkbox" name="a" id="a" value="all" checked >Eπιλογή/Αποεπιλογή</label></div>
					
					<div><label><input type="checkbox" name="b" id="b" value="topia" checked >Τοπία</label></div>
					<div><label><input type="checkbox" name="c" id="c" value="aksio" checked >Αξιοθέατα</label></div>
					<div><label><input type="checkbox" name="d" id="d" value="gunaikes" checked >Γυναίκες</label></div>
					<div><label><input type="checkbox" name="e" id="e" value="prosopa" checked >Πρόσωπα</label></div>
					<div><label><input type="checkbox" name="f" id="f" value="antikeim" checked>Αντικείμενα</label></div>
					
					<div><button>Go</button></div>
				</form>
				
			</div>
			
								
			<div class = "searchDiv">
				 <form method="GET">
					 <input class = "searchBar" name = "searchText" type="text" placeholder="Search..">
					 <input class ="button" name= "searchButton" src="assets/icons/button.png" type="image" />
				 </form>
			</div>
			<?php
				$con = mysqli_connect("localhost","root","");
				
				if(!empty($_GET['a']))
					$a = $_GET['a'];
				else
					$a = 0;
				
				if(!empty($_GET['b']))
					$b = $_GET['b'];
				else
					$b = 0;
				
				if(!empty($_GET['c']))
					$c = $_GET['c'];
				else
					$c = 0;
				
				if(!empty($_GET['d']))
					$d = $_GET['d'];
				else
					$d = 0;
				
				if(!empty($_GET['e']))
					$e = $_GET['e'];
				else
					$e = 0;
				
				if(!empty($_GET['f']))
					$f = $_GET['f'];
				else
					$f = 0;
				

				mysqli_select_db($con,"ergasia");
				if(!empty($a))
					$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE TRUE";
				else
					$sql = "SELECT name,username,category,description,nov,sov,mo FROM picture_tbl WHERE category = '$b' OR category = '$c' OR category = '$d' OR category = '$e' OR category = '$f';";
				
				
				$result = mysqli_query($con,$sql);
					
				while ($row = mysqli_fetch_array($result)){				
					echo("<table class = 'left'><tr ><td rowspan='7'> <form name = 'submitForm' method = 'post' action='sumbit_vote.php'><a href ='../uploads/".$row['name']."' ><img class = 'mikro' src = ../uploads/" .$row['name']. "></a></td></tr><tr><td valign='top' width = '40%' height='8.3%'><b>Name: </b>" .$row['name']."<input type='hidden' name='please' value= '".$row['name']."'></td></tr><tr><td valign='top' height='8.3%'><b>Χρήστης:</b>".$row['username']."</td></tr><tr><td valign='top' height='8.3%'><b>Κατηγορία:</b>".$row['category']."</td></tr><tr><td valign='top' height='41.5%'><b>Περιγραφή:</b>".$row['description']."</td></tr><tr><td valign='top' height='8.3%'><b>Χάρτης:</b><input type='submit' name='mapB' value='Click me' /></td></tr><tr><td valign='top' height='24.9%'><b>Μ.Ο. Βαθμολογίας:</b> ".$row['mo']." <br><b># Ψήφων: </b>".$row['nov']."<br><b>Ψήφισε:<br><img class = 'photologo' src = 'assets/icons/photograph.png' ><input size='1' type='text' id = 'vote' name='vote'>/10</input><input type='submit' name = 'voteB' value = 'Ok'></form></tr></table>");
				}
				


					
				mysqli_close($con);
			?>

			
			
		</body>
	
</html>