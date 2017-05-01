<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/parallax.min.js"></script>
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