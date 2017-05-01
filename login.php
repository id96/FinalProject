<?php session_start(); ?>
<?php include 'header.php'; ?>
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
<?php 

	$message = '';
	//DB connection info
	require_once 'config.php';

	//Establish DB connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	//Was there an error connecting to the database?
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
?>

<body>

 	<h1>Login</h1>
 	<?php 
		$post_username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
		$post_password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
		if ( empty( $post_username ) || empty( $post_password ) ) {
	?>
		<form action="login.php" method="post">
			Username: <input type="text" name="username"> <br>
			Password: <input type="password" name="password"> <br>
			<input type="submit" value="Submit">
		</form>
	
	<?php
	
	} else {

		require_once 'config.php';
		
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if( $mysqli->connect_errno ) {
			echo "<p>$mysqli->connect_error<p>";
			die( "Couldn't connect to database");
		}
		
		$hashed_password = password_hash($post_password, PASSWORD_DEFAULT);
		//echo "<p>Hashed password: $hashed_password</p>";
		
		//Check for a record that matches the POSTed username
		//Note: This SQL lacks proper security. That's coming later
		$query = "SELECT * 
					FROM login
					WHERE username = '$post_username'";

		$result = $mysqli->query($query);

		//Make sure there is exactly one user with this username
		if ( $result && $result->num_rows == 1) {
			unset($_SESSION['logged_user_by_sql']);
			
			$row = $result->fetch_assoc();
			
			$db_hash_password = $row['hashpassword'];

			if( password_verify( $post_password, $db_hash_password ) ) {
				$db_username = $row['username'];
				$_SESSION['logged_user_by_sql'] = $db_username;
			}
		} 
		
		$mysqli->close();
		
		if (isset($_SESSION['logged_user_by_sql'])) {
			print("<p>Welcome, $db_username.<br>You can now edit photos!<p>");
		} else {
			echo '<p>You did not login successfully.</p>';
			echo '<p>Please <a href="login.php">try</a> again.</p>';
		}
		
	} //end if isset username and password
	
	?>

	<div class="logout_button">
        <form action="login.php" method="post">
            <input class="logout_button" type="submit" name="logoutbutton" value="Click to logout">
        </form>
    </div>


</body>
</html>