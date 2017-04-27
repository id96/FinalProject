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
    <?php 
            include 'header.php';
            // include 'config.php';
            // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
    ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                

        <div class="logout_button">
            <form action="index.php" method="post">
                <input class="logout_button" type="submit" name="logoutbutton" value="Click to logout">
            </form>
        </div>
        
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


            <img id="homeimage" src="media/home1.jpg">

                <p id="title">EAST COAST DRONES</p>

        <?php 
            include 'footer.php';
        ?>
                </div>
            </div>
    </div>
</body>
</html>