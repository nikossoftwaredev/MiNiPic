<?php
session_start();

if (isset($_SESSION['usr'])) {
		
?>

<html>

				<head>
					<link rel="stylesheet" type="text/css" href="display.css">
				</head>
					<body>
					poooooo
					</body>
</html>
    
<?php
} else {
?>
   <html>

				<head>
					<link rel="stylesheet" type="text/css" href="display.css">
				</head>
					<body>
					kai twraq
					
					</body>
</html>
<?php
}
?>