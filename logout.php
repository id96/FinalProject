<?php
	//Need to start a session in order to access it to be able to end it
	session_start();
	
	if (isset($_SESSION['logged_user_by_sql'])) {
		$olduser = $_SESSION['logged_user_by_sql'];
		unset($_SESSION['logged_user_by_sql']);
	} else {
		$olduser = false;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
</head>
<body>
	<?php include 'header.php'; ?>

	<div id="logout-page">


	<?php
		//echo '<pre>' . print_r( $_SESSION, true ) . '</pre>';
		if ( $olduser ) {
			print("<p>You have been logged out, $olduser</p>");
			print("<p>Return to the <a href='index.php'>home page</a></p>");
		} else {
			print("<p>You are not logged in.</p>");
			print("<p>Go to our <a href='login.php'>login page</a>.</p>");
		}
	?>
	</div>
<?php 
	include 'footer.php';
?>
</body>
</html>