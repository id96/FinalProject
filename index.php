<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/indexstyles.css"<?php echo time(); ?>>
        <script type="text/javascript" src="js/main.js"></script>
	</head>
<body>
    <?php 
            include 'header.php';
            // include 'config.php';
            // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
        
        <?php
            if(isset($_POST['logoutbutton'])) {
                unset($_SESSION['logged_user']); 
            }
        ?>
             
        <?php 
            include 'config.php';
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
        ?>
    
        <?php 
            if(isset($_POST['submit_login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $username = htmlentities($username);
                $password = htmlentities($password);
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "SELECT * FROM Login";
                $result = $mysqli -> query($sql);
                $uservalid = False;
                while ($row = $result -> fetch_row()) {
                    $valid_password = password_verify($password, $row[1]);
                    $uservalid = $row[0] == $username;
                }
                if($valid_password && $uservalid) {
                    $_SESSION['logged_user'] = $username;
                }   
            }
        ?>


            <!-- <img id="homeimage" src="media/home1.jpg"> -->

        <p id="title">EAST COAST DRONES</p>

        <div class="slider" id="main-slider"><!-- outermost container element -->
            <div class="slider-wrapper"><!-- innermost wrapper element -->
                <img src="media/home1.jpg" alt="First" class="slide"/><!-- slides -->
                <img src="media/pic1.jpg" alt="Second" class="slide"/>
                <img src="media/pic2.jpg" alt="Third" class="slide"/>
            </div>
        </div>

        <?php 
            include 'footer.php';
        ?>
                </div>
            </div>
    </div>
</body>
</html>