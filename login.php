<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Display All</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
<body> 
	<?php 
	include 'config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
	// include 'footer.php';
	?>

	 <div class="logout_button">
        <form action="index.php" method="post">
            <input class="logout_button" type="submit" name="logoutbutton" value="Click to logout">
        </form>
    </div>


</body>
</html>