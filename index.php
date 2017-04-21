<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

<p>Home</p>

<?php 
	include 'footer.php';
?>

</body>
</html>