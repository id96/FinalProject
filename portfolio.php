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
	
?>

<body>

<?php include 'header.php'; ?>

<div class="main_wrapper_services">
	<h1>Portfolio</h1>
</div>

<?php 
echo "<div class='container'>";
	echo '<div class="row table">';
?>

<!-- START AERIAL PORTFOLIO -->
<div class="aerial col-lg-12 col-md-12 col-sm-8">
	<h1>AERIAL</h1>
	 <?php
	 	// get photos from DB
	 	$aerial = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'Aerial'");
	    $i = 0;
	    while ($row = $aerial->fetch_assoc()){
	      $media_id = $row['mediaID'];
	      $property_id = $row['propertyID'];
	      $title = $row['title'];
	      $description = $row['description'];
	      $file = $row['file_path'];
	      $type = $row['type_of_photography'];
	  
	      print("<div class='media col-xs-12 col-sm-12 col-md-3 col-lg-3'>");

	        echo "<img src='$file' style='width:100%' onclick='openModal();currentSlide($i)' class='cursor'>";

	      print("</div>"); //end of media div

	      $i++;
	    }
	?>
</div>

<div id="myModal-aerial" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  <?php 
  //get all photos from DB for overlay effect
  $aerial = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'Aerial'");
    
    while ($row = $aerial->fetch_assoc()){
      $media_id = $row['mediaID'];
      $property_id = $row['propertyID'];
      $title = $row['title'];
      $description = $row['description'];
      $type = $row['type_of_photography'];
      $file = $row['file_path'];

      echo "<div class='mySlides-aerial'>";

        echo "<img src='$file' style='max-height:75vh' class='center-block'>"; 
        echo "<p>$title</p>";
        echo "<p>$description</p>";

      echo "</div>"; //end of myslides

      $i++;
    }
  ?>  
  <!-- buttons -->
  <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div> <!-- end of modal content -->
</div> <!-- end of modal div -->
<!-- end of AERIAL section -->




<!-- START DSLR PORTFOLIO -->
<div class="dslr col-lg-12 col-md-12 col-sm-8">
	<h1>DSLR</h1>
	 <?php
	 	// get photos from DB
	 	$dslr = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'DSLR'");
	    $j = 0;
	    while ($row = $dslr->fetch_assoc()){
	      $media_id = $row['mediaID'];
	      $property_id = $row['propertyID'];
	      $title = $row['title'];
	      $description = $row['description'];
	      $file = $row['file_path'];
	      $type = $row['type_of_photography'];
	  
	      print("<div class='media col-xs-12 col-sm-12 col-md-3 col-lg-3'>");

	        echo "<img src='$file' style='width:100%' onclick='openModalDSLR(); currentSlideDSLR($j)' class='cursor'>";

	      print("</div>"); //end of media div
	      $j++;
	    }
	?>
</div>

<div id="myModal-dslr" class="modal">
  <span class="close cursor" onclick="closeModalDSLR()">&times;</span>
  <div class="modal-content">
  <?php 
  	// get photos from DB for overlay effect
  	$dslr = $mysqli->query("SELECT * FROM media WHERE type_of_photography = 'DSLR'");
    
    while ($row = $dslr->fetch_assoc()){
      $media_id = $row['mediaID'];
      $property_id = $row['propertyID'];
      $title = $row['title'];
      $description = $row['description'];
      $type = $row['type_of_photography'];
      $file = $row['file_path'];

      echo "<div class='mySlides-dslr'>";
        echo "<img src='$file' style='max-height:75vh' class='center-block'>"; 
        echo "<p>$title</p>";
        echo "<p>$description</p>";
      echo "</div>"; //end of myslides DSLR

    }
  ?>  
  <!-- buttons -->
  <a class="prev" onclick='plusSlidesDSLR(-1)'>&#10094;</a>
  <a class="next" onclick="plusSlidesDSLR(1)">&#10095;</a>

  </div> <!-- end of modal content -->
</div> <!-- end of modal div -->
<!-- end of DSLR section -->





<?php
		echo '<div class="video col-lg-12 col-md-10 col-sm-8">';
			// display video walk thru
				print('<h1>VIDEO WALK-THRU</h1>');
				print("<div class='media'>");
					echo '<iframe width="300" height="245" src="https://www.youtube.com/embed/BGz-CwtJP6Q" frameborder="0" allowfullscreen></iframe>';
				print("</div>"); // end of media div
		echo '</div>'; // end of video div 

	echo '</div>'; //end of row table div

echo '</div>'; //end of container div
?>

<?php include 'footer.php';?>

</body>
</html>