<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Display All</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
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
		echo "<p>Hashed password: $hashed_password</p>";
		
		//Check for a record that matches the POSTed username
		//Note: This SQL lacks proper security. That's coming later
		$query = "SELECT * 
					FROM login
					WHERE
						username = '$post_username'";



		$result = $mysqli->query($query);

		

		//Make sure there is exactly one user with this username
		if ( $result && $result->num_rows == 1) {
			
			$row = $result->fetch_assoc();
			
			$db_hash_password = $row['hashpassword'];

			
			if( password_verify( $post_password, $db_hash_password ) ) {
				$db_username = $row['username'];
				$_SESSION['logged_user_by_sql'] = $db_username;
			}
		} 
		
		$mysqli->close();
		
		if ( isset($_SESSION['logged_user_by_sql'] ) ) {
			print("<p>Welcome, $db_username.<br>You can now edit photos!<p>");
		} else {
			echo '<p>You did not login successfully.</p>';
			echo '<p>Please <a href="login.php">try</a> again.</p>';
		}
		
	} //end if isset username and password
	
	?>

	<!-- <p><a href="logout.php">log out</a></p> -->

</body>
</html>