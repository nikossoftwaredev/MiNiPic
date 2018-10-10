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
		<div id="googleMap" style="width:100%;height:100%;"></div>	

			
			  
			
			
			
		<script>
			var map;
			function myMap() {
				map = new google.maps.Map(document.getElementById('googleMap'), {
					center:new google.maps.LatLng(37.983810,23.727539),
					zoom:5,
				});						
			}	
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc11xKVfwKrkZN_xbNepnVPUbVWBq4xeg&callback=myMap" type="text/javascript"></script>
							
		<?php 
			$con = mysqli_connect("localhost","root","");	
			mysqli_select_db($con,"ergasia");
			
			
			$sql = "SELECT lat,lng,name,category FROM picture_tbl WHERE TRUE";	
				
			
			$result = mysqli_query($con,$sql);

			while ($row = mysqli_fetch_array($result)){	
					?>
					<script> 
						
					
					 
					 if("<?php echo $row['category'] ?>" == "prosopa"){
						var sicon = 'assets/icons/catIcons/prosIcon.png';
					 }else if("<?php echo $row['category'] ?>" == "aksio"){
						var sicon = 'assets/icons/catIcons/aksioIcon.png';						
					 }else if("<?php echo $row['category'] ?>" == "gunaikes"){
						var sicon = 'assets/icons/catIcons/gunaikesIcon.png';
					 }else if("<?php echo $row['category'] ?>" == "topia"){
						var sicon = 'assets/icons/catIcons/topiaIcon.png';
					 }else if("<?php echo $row['category'] ?>" == "antikeim"){
						var sicon = 'assets/icons/catIcons/antikeimIcon.png';
					 }
					 
					 var image = {
						url: sicon,
						size: new google.maps.Size(71, 71),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(25, 25)
					};
	
					if(<?php echo $row['lat'] ?>  !=0 || <?php echo $row['lng'] !=0 ?>)
					{							
						var marker = new google.maps.Marker({
						position: new google.maps.LatLng(<?php echo $row['lat'] ?>,<?php echo $row['lng'] ?>),		
						icon: image
						});  					
						marker.setMap(map);	
					}
					
					marker.addListener('click', function() {
							newwindow=window.open('','','width=404,height=316,resizable=1');
							var path = ( "../uploads/" + "<?php echo $row['name']?>");

							newwindow.document.writeln("<html><head></head><title>"+ "<?php echo $row['name']?>" +"</title> <body>");
							newwindow.document.writeln("<img style ='width:404;height:316;' src=' " + path +"' />");
							newwindow.document.writeln("</body> </html>");
							
					});
					</script>
					<?php
			}
			?>
			
			
			<?php 
			mysqli_close($con);
			
			
			
			
			
			
		?>
	</body>
</html>