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
	
	<div id="container-all-services" class="main_wrapper_services">
		<h1>Services</h1>
		<div class="service">
			<h2> Aerial </h2>
			<div class="description-container">
				<label>Insert example picture here </label>
				<p>Using sUAS from DJI, our Aerial services include photography and videography. Every angle of the subject will be captured and then edited in post production to ensure high quality. </p>
				<p> Perfect for: </p>
				<ul>
					<li> Real-Estate </li>
					<li> Commercial </li>
					<li> Golf Courses </li>
					<li> Construction Progress Monitoring </li>
					<li> Roof Inspections </li>
				</ul>
			</div>
		</div>
		
		<div class="service">
			<h2> DSLR Photography </h2>
			<div class="description-container">
				<label>Insert example picture here </label>
				<p> Using Canon DSLRs, East Coast Drones can capture interior and exterior still-pictures of the subject.</p>
				<p> Perfect for: </p>
				<ul>
					<li> Real-Estate </li>
					<li> Commercial </li>
					<li> Golf Courses </li>
				</ul>
			</div>
		</div>
		
		<div class="service">
			<h2> Video Walk-Thru </h2>
			<div class="description-container">
				<label>Insert example picture here </label>
				<p> Using stabilizers from DJI, a walk-thru tour of the subject can be created, producing a smooth, first person point of view for the viewer.</p>
				<p> Perfect for: </p>
				<ul>
					<li> Promotional Videos </li>
					<li> Real-Estate </li>
					<li> Commercial </li>
				</ul>
			</div>
		</div>
	
	</div>

	<?php 
		include 'footer.php';
	?>

	</body>
</html>