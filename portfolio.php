<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/parallax.min.js"></script>
</head>

<?php
	//Get the connection info for the DB. 
	require_once 'config.php';

	//Establish a database connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	//Was there an error connecting to the database?
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
	$aerial = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'Aerial'");
	$dslr = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'DSLR'");
?>

<body>

<?php include 'header.php'; ?>

<div class="main_wrapper_services">
	<h1>Portfolio</h1>
</div>

<div> <!-- id="library" -->
	<?php 
	// display aerial photos
	echo "<div class='container'>";
		echo '<div class="row table">';
			echo '<div class="plan col-lg-12 col-md-10 col-sm-8">';
				print("<div class='aerial'>");
					print('<p>AERIAL</p>');
					while ($row = $aerial->fetch_assoc()){
						$media_id = $row['mediaID'];
						$property_id = $row['propertyID'];
						$title = $row['title'];
						$description = $row['description'];
						$file = $row['file_path'];
						$type = $row['type_of_photography'];
						$href = "photo.php?media_id=$media_id"; 
						
						// constructs unique url for each photo
						print("<div class='media col-xs-12 col-sm-12 col-md-3 col-lg-3'>");
							print("<a href='$href' title='$href'><img src='$file' alt='$title'></a>"); 
						print("</div>"); //end of media div
					}
				print("</div>"); //end of aerial div
			echo '</div'; // end of plan div

			echo '<div class="plan col-lg-4 col-md-4 col-sm-8">';
				// display DSLR photos
				print("<div class='dslr'>");
					print('<p>DSLR</p>');
					while ($row = $dslr->fetch_assoc()){
						$media_id = $row['mediaID'];
						$property_id = $row['propertyID'];
						$title = $row['title'];
						$description = $row['description'];
						$file = $row['file_path'];
						$type = $row['type_of_photography'];
						$href = "photo.php?media_id=$media_id"; 
						
						// constructs unique url for each photo
						print("<div class='media col-xs-12 col-sm-12 col-md-3 col-lg-3'>");
							print("<a href='$href' title='$href'><img src='$file' alt='$title'></a>"); 
						print("</div>"); // end of media div
					}
				print("</div>"); //end of dslr div
			echo '</div'; //end of plan div 
	

			echo '<div class="plan col-lg-4 col-md-4 col-sm-8">';
				// display video walk thru
				print("<div class='video'>");
					print('<p>VIDEO WALK-THRU</p>');
						print("<div class='media'>");
							echo '<iframe width="300" height="245" src="https://www.youtube.com/embed/BGz-CwtJP6Q" frameborder="0" allowfullscreen></iframe>';
						print("</div>"); // end of media div
				//print("</div>"); // end of video div
			echo '</div'; // end of plan div 

		echo '</div'; //end of row table div
	echo '</div'; //end of container div
?>
</div>



<?php 
	include 'footer.php';
?>

</body>
</html>