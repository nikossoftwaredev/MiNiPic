<?php
		session_start();
		error_reporting(E_ALL ^ E_NOTICE);
		if($_POST['voteB'] == 'Ok'){
			
			
			$vote = $_POST['vote'];
			if($vote >=0 && $vote <=10 && $vote !=null){
				$filename = $_POST['please'];	
				$con = mysqli_connect("localhost","root","");
				mysqli_select_db($con,"ergasia");
				
				$sql = "SELECT sov,nov FROM picture_tbl WHERE name = '$filename';";
				$result = mysqli_query($con,$sql);
				
				$row = mysqli_fetch_array($result);
				
				
				
				
				
				
				function getRealIpAddr()
				{
					if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
					{
					  $ip=$_SERVER['HTTP_CLIENT_IP'];
					}
					elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
					{
					  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
					}
					else
					{
					  $ip = $_SERVER['REMOTE_ADDR'];
					}
					return $ip;
				}
				
				$ipaddress = getRealIpAddr();
				
				$sql3 = "SELECT username, ip, name FROM ip_tbl  WHERE username = '$_SESSION[usr]' AND ip= '$ipaddress' AND name ='$filename';";
				$result2 = mysqli_query($con,$sql3);			
							
				if(mysqli_num_rows($result2) == 0){
					$sql4 = "INSERT INTO ip_tbl( id,username, ip, name) VALUES(default,'$_SESSION[usr]','$ipaddress','$filename');";
					mysqli_query($con,$sql4);
					$tmpsov = $row['sov'] + $vote;	
					$tmpnov = $row['nov'] + 1;
					$tmpmo = $tmpsov/$tmpnov;
					$sql2 = "UPDATE picture_tbl SET sov = '$tmpsov',nov = '$tmpnov',mo = '$tmpmo' WHERE name = '$filename';";
					mysqli_query($con,$sql2);
					header("location:display.php?a=all");
				}			
				else{
					echo "You have already voted from this IP";
				}
				
				mysqli_close($con);
				
				
				
			}else{
				echo "Vote must be between 0 and 10!";
			}
			
		}else if ($_POST['mapB'] == 'Click me') {  ?>
			<html>

				<head>
					<link rel="stylesheet" type="text/css" href="display.css">
				</head>
				<body>
					<div id="googleMap" style="width:100%;height:100%;"></div>	
		
				
							
		<?php 
			$con = mysqli_connect("localhost","root","");	
			mysqli_select_db($con,"ergasia");
			$hi = $_POST['please'];
			
			$sql = "SELECT lat,lng,name,category FROM picture_tbl WHERE name = '$hi'";	
				
			
			$result = mysqli_query($con,$sql);

			while ($row = mysqli_fetch_array($result)){	
					?>
					
					<script>
					var map;
					function myMap() {
						map = new google.maps.Map(document.getElementById('googleMap'), {
							center:new google.maps.LatLng(<?php echo $row['lat'] ?>,<?php echo $row['lng'] ?>),
							zoom:5,
						});						
					}	
					</script>
				
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc11xKVfwKrkZN_xbNepnVPUbVWBq4xeg&callback=myMap" type="text/javascript"></script>
					<script> 
					 var path = ( "../uploads/" + "<?php echo $row['name']?>");
					 
					 if("<?php echo $row['category'] ?>" == "prosopa"){
						var sicon = 'assets/icons/catIcons/prosIcon.png';
					 }else if("<?php echo $row['category'] ?>" == "aksio"){
						var sicon = 'assets/icons/catIcons/askioIcon.png';
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

							newwindow.document.writeln("<html><head></head> <body>");
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

		<?php } else {
			echo "Invalid";
		}
	
	
	

?>

	</body>
</html>