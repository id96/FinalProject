<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

	<div>
		<div class= "contact-containter">
			<h1 class="contact_head"> Get In Touch </h1>

			<form action ="contact.php" method="GET" class="identification">
				<p>
				<label>First name: </label>
				<input type="text" name="firstname" value="">
				</p>
				<br>
				Last name:    
				<input type="text" name="lastname" value=""> <br>
				Email:
				<input type="text" name="email"> <br>
		
			</form>

		</div>
	</div>
<?php 
	include 'footer.php';
?>

</body>
</html>