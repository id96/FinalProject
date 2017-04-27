<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
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

<p>Portfolio</p>

<div id="library">
	<?php 
	// display aerial photos
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
		print("<div class='media'>");
		print("<a href='$href' title='$href'><img src='$file' alt='$title'></a>"); 
		print("</div>");
	}
	print("</div>");

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
		print("<div class='media'>");
		print("<a href='$href' title='$href'><img src='$file' alt='$title'></a>"); 
		print("</div>");
	}
	print("</div>");

	// display video walk thru
	print("<div class='video'>");
	print('<p>VIDEO WALK-THRU</p>');
	
	print("</div>");
	?>

</div>

<?php 
	include 'footer.php';
?>

</body>
</html>