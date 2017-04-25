<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
	</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
          

        <?php 
            include 'header.php';
            // include 'config.php';
            // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
        ?>
                
            <img id="homeimage" class="parallax" src="media/home1.jpg">

                <p>Home</p>

        <?php 
            include 'footer.php';
        ?>
                </div>
            </div>
    </div>
</body>
</html>