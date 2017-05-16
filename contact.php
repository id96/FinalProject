<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
    <script type="text/javascript" src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>


	<div class = 'main_wrapper_services'>
		<!-- <h1>Contact</h1> -->
		<div class= "contact-containter">
			<h1 class="contact_head"> Get In Touch </h1>
			<div class='contact_head'>
				<p>Brendan Viselli</p>
				<span class='contact_info'><a href="tel:7818355410">(781)-835-5410</a></span><br>
				<span class='contact_info'><a href="mailto:visellib@bc.edu?Subject=Hello%20again" target="_top">visellib@bc.edu</a></span><br>
				<p>Jonathan Parece</p>
				<span class='contact_info'><a href="tel:5084239989">(508)-423-9989</a></span> <br>
				<span class='contact_info'><a href="mailto:jjparece@loyola.edu?Subject=Hello%20again" target="_top">jjparece@loyola.edu</a></span> <br>
			</div>
			<form action="contact.php" method="POST" class='identification'>
 				<div class='form_info'>
 					<div class='response'>
	 					<label>Your Name:</label>
	 					<br>
	 					<input type="text" name="name" placeholder="Johnny Appleseed" required class='field_element'> 
	 					<br>
	 				</div>
	 				<div class='response'>
	 					<label>Your Email Address:</label>
	 					<br>
	 					<input type="email" name="email" placeholder="me@gmail.com" required class='field_element'/>
	 					<br>
	 				</div>
	 				<div class='response'>
	 					<label>Your Message:</label>
	 					<br>
	 					<input class='message' type="text" name="message" placeholder="Hello! We would love to work with you on this project..." required class='field_element'>
	 					<br>
	 					<?php
	 						echo '<input class="bot_checker" type="checkbox" name="bot_checker" value="caught">';
	 					
	 					?>
	 				</div>
                    
                    <!--Upon successful implementation, the submit button will email the owners. However, we do not want to bug them right now as we are in development. -->
	 				<div class='submit_button'>
		 				<input type="submit" name="submit" value="submit" class='submit'> 
		 				<!-- idea modified from Squarespace -->
 					</div>
 					<?php
						if (isset($_POST['submit'])) {
							if (isset($_POST["bot_checker"])){
								echo '<p style="color:red;">Please do not spam us.</p>';
							}
							else if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["message"])) {
								echo '<p style="color:red;">Please fill out all fields.</p>';
							}
							else {
								// Remove all illegal characters from contact fields
								$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
								$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
								$message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

								// Validate e-mail
								if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
   									 echo'<p style="color:red;">Supplied email is not a valid email address.</p>';
								}
								else {
									$headers = "From: $name \r\n"."Reply-To: $email \r\n";
									$message = $message."\n\n This message was sent by $name from the website.";
									mail("visellib@bc.edu,jjparece@loyola.edu","East Coast Drones Customer: $name",$message, $headers);
								}
								
							}
						}

					?>
 				</div>
  			</form>
  		</div>
  	</div>


<?php 
	include 'footer.php';
?>

</body>
</html>