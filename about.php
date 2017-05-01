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

<div class="leftcol_bren">
	<div class="image">
		<img class="bio" src="media/brendan.jpg" alt="Brendan Headshot">
	</div>
	<h1>Brendan Viselli</h1>
	<p>I am currently a junior at Boston College studying Economics with a minor in History. I am highly motivated and personable. With my creativity I can insure for a product that is beyond that of my competitors. </p>
	<p>In my free-time I am very active, always enjoying the outdoors. I love ripping around the lakes and oceans on jet skis and boats.</p>
	<a href="tel:7818355410">(781)-835-5410</a> <br>
	<a href="mailto:visellib@bc.edu?Subject=Hello%20again" target="_top">visellib@bc.edu</a>
</div>

<div class="rightcol_jon">
	<div class='image'>
		<img class="bio" src="media/jon.png" alt="Jon Headshot">
	</div>
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