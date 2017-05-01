<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

	<div>
		<div class= "contact-container">
			<h1 class="contact_head"> Get In Touch </h1>
			<form action="contact.php" method="post" class='identification'>
				<div class='form_info'>
					<label>Name:</label>
					<br>
					<input type="text" name="name" placeholder="Johnny Appleseed" required class='field_element'> 
					<br>
					<label>Email Address:</label>
					<br>
					<input type="email" name="email" placeholder="me@gmail.com" required class='field_element'/>
					<br>
					<label>Message:</label>
					<br>
					<input type="text" name="message" placeholder="Hello! We would love to work with you on this project..." required class='field_element'>
					<br>
					<div class='submit_button'>
						<input type="submit" name="submit" value="submit" class='submit'>
					</div>
				</div>
			</form>

		</div>
	</div>
<?php 
	include 'footer.php';
?>

</body>
</html>