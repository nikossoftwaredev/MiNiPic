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
		$sql = "SELECT name,username,category,description,nov,sov FROM picture_tbl WHERE TRUE";
	else
		$sql = "SELECT name,username,category,description,nov,sov FROM picture_tbl WHERE category = '$b' OR category = '$c' OR category = '$d' OR category = '$e' OR category = '$f';";
	
	
	$result = mysqli_query($con,$sql);
	
	echo $sql;
		
	while ($row = mysqli_fetch_array($result)){
		echo("<table class = 'left'><tr ><td rowspan='7'><img class = 'mikro' src = assets/pictures/" .$row['name']. "></td></tr><tr><td valign='top' width = '40%' height='8.3%'><b>Name: </b>" .$row['name']."</td></tr><tr><td valign='top' height='8.3%'><b>Χρήστης:".$row['username']."</b></td></tr><tr><td valign='top' height='8.3%'><b>Κατηγορία:".$row['category']."</b></td></tr><tr><td valign='top' height='41.5%'><b>Περιγραφή:".$row['description']."</b></td></tr><tr><td valign='top' height='8.3%'><b>Χάρτης:</b></td></tr><tr><td valign='top' height='24.9%'><b>Μ.Ο. Βαθμολογίας:+ ".$row['sov']." </b><br><b># Ψήφων: ".$row['nov']."</b><br><b>Ψήφισε:<br><img class = 'photologo' src = 'assets/icons/photograph.png' ><form method = 'post' action='sumbit_vote.php'><input size='1' type='text' id = 'vote' name='vote'>/10</input><input type='submit' value='Οk'></form></tr></table>");
	}
	


		
	mysqli_close($con);
	
	
	
	
	
	
	
	

?>
