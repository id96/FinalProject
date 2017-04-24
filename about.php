<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

<p>About</p>


<div class="leftcol_bren">
	<img class="bio" src="media/brendan.jpg" alt="Brendan Headshot">
	<h1>Brendan Viselli</h1>
	<p>I am currently a junior at Boston College studying Economics with a minor in History. I am highly motivated and personable. With my creativity I can insure for a product that is beyond that of my competitors. </p>
	<p>In my free-time I am very active, always enjoying the outdoors. I love ripping around the lakes and oceans on jet skis and boats.</p>
	<a href="tel:7818355410">(781)-835-5410</a> <br>
	<a href="mailto:visellib@bc.edu?Subject=Hello%20again" target="_top">visellib@bc.edu</a>
</div>

<div class="rightcol_jon">
	<img class="bio" src="media/jon.png" alt="Jon Headshot">
	<h1>Jonathan Parece</h1>
	<p>With this business I hope I can provide clients with the best work at a very competitive price. Incorporating both aerial and walk through video into one video is rarely done and is very effective when done correctly.</p>
	<p>I have been flying drones for the past 5 years and with that experience I am able to continuously provide a service that displays my creativity. Whether it be for recreational or business use, I am able develop my skills during every flight.</p>
	<a href="tel:5084239989">(508)-423-9989</a> <br>
	<a href="mailto:jjparece@loyola.edu?Subject=Hello%20again" target="_top">jjparece@loyola.edu</a>
</div>

<?php 
	include 'footer.php';
?>

</body>
</html>