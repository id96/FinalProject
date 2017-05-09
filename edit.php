<?php session_start(); ?>
<?php include 'header.php'; ?>
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

	$message = '';
	//DB connection info
	require_once 'config.php';

	//Establish DB connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	//Was there an error connecting to the database?
	if ($mysqli->errno) {
		print($mysqli->error);
		exit();
	}
?>

<body>
	<div class="form_wrap">
        <div class="form">
        <h1>Edit Media</h1>
            <form action="edit.php" method="post">
                <label>Select Media</label>
                <br>
                <?php
                	// print out list of photos
                    $result = $mysqli -> query('SELECT * FROM media');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='media_select[]' value='$row[0]'>$row[2]<br>"; }
                ?> 
                <br>
                <label>Change Photo Name to...</label>
                <br>
                <input class="button" type="text" name="new_name" placeholder="Title here..."/>
                <br>
                <label>Change Photo Description to...</label>
                <br>
                <textarea rows="4" cols="40" name="new_description" placeholder="Add a description..."></textarea>
                <br>
                <label>Add selected media to which property? </label>
                <br>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM property');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='radio' name='add_to_property' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <input class="submit_button" type="submit" name="edit_media" value="Click to submit">
            </form>
    </div>

    <div class="form_wrap">
        <div class="form">
        <h1>Edit Property</h1>
            <form action="edit.php" method="post">
                <label>Select Property</label>
                <br>
                <?php
                	// print out list of property names
                    $result = $mysqli -> query('SELECT * FROM property');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='property_select' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <label>Change Property Name to...</label>
                <br>
                <input class="button" type="text" name="new_name" placeholder="Title here..."/>
                <br>
                <label>Change Property Address to...</label>
                <br>
                <textarea rows="4" cols="40" name="new_address" placeholder="Add a description..."></textarea>
                <br>
                <br>
                <input class="submit_button" type="submit" name="edit_property" value="Click to submit">
            </form>
    </div>
<?php

// editing media table
    if(isset($_POST['edit_media'])) {
        $result = $mysqli -> query('SELECT * FROM media');
        $edit_mediaid = $_POST['media_select'];
        $new_name = $_POST['new_name'];
        $new_name = htmlentities($new_name);
        $new_description = $_POST['new_description'];
        $new_description = htmlentities($new_description);

        // edit title and edit desciptions
        if(preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,100}$/", $new_name) === 1 && preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,200}$/", $new_description) === 1) {
            foreach ($edit_mediaid as $item) {
                if(!empty($new_name) && !empty($new_description)) {
                    $sql = "UPDATE media SET title = '$new_name', description = '$new_description' WHERE mediaID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(!empty($new_name) && empty($new_description)) {
                    $sql = "UPDATE media SET title = '$new_name' WHERE mediaID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(empty($new_name) && !empty($new_description)) {
                    $sql = "UPDATE media SET description = '$new_description' WHERE mediaID = $item";
                    $result = $mysqli -> query($sql);
                }
            }
            echo "<div class='response'>Congrats! Your edit media was successful.</div>";
        }
        else {
            echo "<div class='response_add'>Please enter valid criteria to edit media.</div>";
        }

        // add property id to this media
        if(isset($_POST['add_to_property'])) {
            //$media = $mysqli -> query('SELECT * FROM media');
            //$edit_mediaid = $POST['media_select'];
            $propertyid = $_POST['add_to_property'];
            
            // print_r($edit_imageid);
            foreach ($edit_mediaid as $item) {
                $sql = "UPDATE media SET propertyID = $propertyid WHERE mediaID = $item";
                $result = $mysqli -> query($sql);
            }
            echo "<div class='response'>media has been added to the property: $propertyid</div>";
        }
        
    }

// editing property table
    if(isset($_POST['edit_property'])) {
        $result = $mysqli -> query('SELECT * FROM property');
        $edit_propertyid = $_POST['property_select'];
        $new_name = $_POST['new_name'];
        $new_name = htmlentities($new_name);
        $new_address = $_POST['new_address'];
        $new_address = htmlentities($new_address);

        // edit title and edit desciptions
        if(preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,100}$/", $new_name) === 1 && preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,200}$/", $new_address) === 1) {
            
            if(!empty($new_name) && !empty($new_address)) {
                $sql = "UPDATE property SET property_name = '$new_name', address = '$new_address' WHERE propertyID = $edit_propertyid";
                $result = $mysqli -> query($sql);
            }
            if(!empty($new_name) && empty($new_address)) {
                $sql = "UPDATE property SET property_name = '$new_name' WHERE propertyID = $edit_propertyid";
                $result = $mysqli -> query($sql);
            }
            if(empty($new_name) && !empty($new_address)) {
                $sql = "UPDATE property SET address = '$new_address' WHERE propertyID = $edit_propertyid";
                $result = $mysqli -> query($sql);
            }
            
            echo "<div class='response'>Congrats! Your edit property was successful.</div>";
        }
        else {
            echo "<div class='response_add'>Please enter valid criteria to edit property.</div>";
        }
    }
?>

<?php 
    include 'footer.php';
?>


</body>
</html>