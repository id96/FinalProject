<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>East Coast Drones</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<script src="https://use.fontawesome.com/252db8b05d.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
		<script type="text/javascript" src="js/main.js"></script>
		<script src="js/parallax.min.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	</head>
<body>

	<?php 
		include 'header.php';
		// include 'config.php';
		// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
	?>
	<div class="container">
		<div class="row table">
			<div class="main_wrapper_services">
				<h1>Services for Any Need</h1>
				<div class='plan col-lg-4 col-md-4 col-sm-8'>
					<div class="service">
						<h2> Aerial </h2>
						<div class="description-container">
							<img src="media/aerial_surveying.jpg">
							<p>Using sUAS from DJI, our Aerial services include photography and videography. Every angle of the subject will be captured and then edited in post production to ensure high quality. </p>
			                    <p> Perfect for: </p>
			                    <ul>
			                        <li> Real-Estate </li>
			                        <li> Commercial </li>
			                        <li> Golf Courses </li>
			                        <li> Construction Progress Monitoring </li>
			                        <li> Roof Inspections </li>
			                    </ul>
						</div> <!-- end of service div -->
					</div> <!-- end of service div -->
				</div> <!-- end of plan div -->

					
				<div class='plan col-lg-4 col-md-4 col-sm-8'>
					<div class="service">
						<h2> DSLR Photography </h2>
						<div class="description-container">
							<img src="media/dslr_living_room.jpg">
							<p> Using Canon DSLRs, East Coast Drones can capture interior and exterior still-pictures of the subject.</p>
			                <div id="perfect">
			                    <p> Perfect for: </p>
			                    <ul>
			                        <li> Real-Estate </li>
			                        <li> Commercial </li>
			                        <li> Golf Courses </li>
			                    </ul>
			                </div>
						</div>
					</div> <!-- end of service div -->
				</div> <!-- end of plan div  -->

				<div class='plan col-lg-4 col-md-4 col-sm-8'>
			        <div class="service">
						<h2> Video Walk-Thru </h2>
						<div class="description-container">
							<div class= "videoWrapper">
								<iframe width="300" height="245" src="https://www.youtube.com/embed/BGz-CwtJP6Q" frameborder="0" allowfullscreen></iframe>
							</div>
							<p> Using stabilizers from DJI, a walk-thru tour of the subject can be created, producing a smooth, first person point of view for the viewer.</p>
			                    <p> Perfect for: </p>
			                    <ul>
			                        <li> Promotional Videos </li>
			                        <li> Real-Estate </li>
			                        <li> Commercial </li>
			                    </ul>
		                </div>
					</div> <!-- end of service div  -->
				</div> <!-- end of plan div -->
			</div> <!-- end of container all services div -->
		</div> <!-- end of row table div -->
	</div> <!-- end of container div  -->
</div>
	

    
<!--
	<div class='video'>
		<div>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/BGz-CwtJP6Q" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
-->
	<?php 
		include 'footer.php';
	?>

	</body>
</html>