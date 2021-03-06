<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/parallax.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
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
        if(preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $new_name) === 1 && preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $new_description) === 1) {
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
            echo "<div class='response'>Media has been added to the Property: $propertyid</div>";
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
        if(preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $new_name) === 1 && preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $new_address) === 1) {
            
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

    if(isset($_POST["add_property"])) {
    $property_name = $_POST["property_name"];
    $property_name = htmlentities($property_name);
    $prop_address = $_POST["prop_address"];
    $prop_address = htmlentities($prop_address);
    if(preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $property_name) === 1) {
        if (preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,400}$/", $prop_address) === 1) {
            $sql = "INSERT INTO property(property_name, address, date_modified) VALUES('$property_name', '$prop_address', CURDATE())";
            $result = $mysqli -> query($sql);
            echo "<div class='response'><p>You have successfully added a property!</p></div>"; }
        else {
            echo "<div class='form'>Please enter valid address.</div>";
        }
    }
    else {
        echo "<div class='form'>Please enter valid name.</div>"; }
    }

    if(isset($_POST["submit_image"])) {
        $image = $_FILES["newphoto"];
        $temp_name = $image['tmp_name'];
        $temp_name = htmlentities($temp_name);
        $original_name = $image['name'];
        $original_name = htmlentities($original_name);
        $title = $_POST['name_photo'];
        $title = htmlentities($title);
        $filetype = pathinfo($original_name, PATHINFO_EXTENSION);
        $photo_description = $_POST['photo_description'];
        $photo_description = htmlentities($photo_description);
        $photo_type = $_POST['photo_type'];

        if($filetype!='jpg' && $filetype!='png' && $filetype!='jpeg' && $filetype!='gif'){
            echo "<div class='form'>The image was not uploaded successfully. The file type is not supported. Please upload images with the extension .jpg, .png, .jpeg, or .gif only.";
                }
        elseif(preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,100}$/", $title) !== 1) {
            echo "<div class='form'>Please enter a valid name.</div>";
        }
        elseif(preg_match("/^[A-Za-z 0-9!:, \s@#$%^&*_()]{0,100}$/", $photo_description) !== 1) {
            echo "<div class='form'>Please enter a valid photo description.</div>";
        }
        else {
            move_uploaded_file($temp_name, "media/$original_name");
            $sql = "INSERT INTO media(title, description, file_path, type_of_photography, date_taken) VALUES ('$title', '$photo_description', 'media/$original_name', '$photo_type', CURDATE() )";
            var_dump($sql);
            if ($mysqli -> query($sql)){
                $image_id = $mysqli -> insert_id;
                //var_dump($image_id);
            }
            // if (isset($_POST['property_select'])) {
            //     $image_id = $mysqli -> insert_id;
            //     //var_dump($image_id);
            //     $album_select = $_POST['property_select'];
            //     foreach ($album_select as $item) {
            //     $album_id = $mysqli -> query("INSERT INTO ImagesinAlbums(ImageID, AlbumID) VALUES ('$image_id', '$item')");
            //     echo "<div class='response_add'>You have successfully added an image to the specified album(s)! Check the Display All page to see your image!</div>"; }
            // }
        }
    }

    if(isset($_POST["delete_property"])) {
        $result = $mysqli -> query('SELECT * FROM property');
        $edit_albumid = $_POST['property_select'];
        foreach ($edit_albumid as $item) {
            $sql = "DELETE FROM property WHERE propertyID = $item";
            $result = $mysqli -> query($sql);
            }
        echo "<div class='response'>Congrats! You have successfully deleted this property.</div>";
    }

    if(isset($_POST["delete_image"])) {
        $result = $mysqli -> query('SELECT * FROM media');
        $edit_imageid = $_POST['media_select'];
        foreach ($edit_imageid as $item) {
            $sql = "DELETE FROM media WHERE mediaID = $item";
            $result = $mysqli -> query($sql);
        }
        echo "<div class='response'>Congrats! You have successfully deleted this media.</div>";
    }

?>

<body>
    <div class='container'>
        <div class="main_wrapper_services">
            <div class="col-lg-12 col-md-12 col-sm-12"> 
                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Edit Media</h3>
                    <form class='price_generator' action="edit.php" method="post">
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

                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Edit Property</h3>
                    <form class='price_generator' action="edit.php" method="post">
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
                        <textarea rows="4" cols="40" name="new_address" placeholder="Address here..."></textarea>
                        <br>
                        <br>
                        <input class="submit_button" type="submit" name="edit_property" value="Click to submit">
                    </form>
                </div> <!-- end of plan div --> 

                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Add an image to a property</h3>
                    <form class='price_generator' method="post" enctype="multipart/form-data">
                        <label>Upload Photo:</label>
                        <input type="file" name="newphoto"/>
                        <label>Name of Photo:</label>
                        <br>
                        <textarea rows="1" cols="40" name="name_photo" placeholder="Name here..." required></textarea>
                        <br>
                        <label>Photo Description:</label>
                        <br>
                        <textarea rows="1" cols="40" name="photo_description" placeholder="Description here..." required></textarea>
                        <br>
                        <label>Add to which property?</label>
                        <br>
                        <?php
                            $result = $mysqli -> query('SELECT * FROM property');
                            while ($row = $result -> fetch_row()) {
                                print "<input class='button' type='checkbox' name='property_select' value='$row[0]'>$row[1]<br>"; }
                        ?> 
                        <label>What type of photography?</label>
                        <br>
                        <input class='button' type='radio' name='photo_type' value='Aerial'>Aerial
                        <br>
                        <input class='button' type='radio' name='photo_type' value='DSLR'>DSLR
                        <br>
                        <input class='button' type='radio' name='photo_type' value='Land Surveying'>Land Surveying
                        <br>
                        <input type="submit" name="submit_image" value="Click to submit">
                    </form>
                </div> <!-- end of plan div  -->

            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Add Property</h3>
                    <form class='price_generator' action="edit.php" method="post">
                        <label>Property Name:</label>
                        <br>
                        <input class="button" type="text" name="property_name" placeholder="Title here..." required/>
                        <br>
                        <label>Property Address:</label>
                        <br>
                        <textarea rows="4" cols="40" name="prop_address" placeholder="Description here..." required></textarea>
                        <br>
                        <input class="submit_button" type="submit" name="add_property" value="Click to submit">
                    </form>
                </div>

                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Delete a property</h3>
                    <form class='price_generator' action="edit.php" method="post">
                        <label>Delete which property?</label>
                        <br>
                        <?php
                            $result = $mysqli -> query('SELECT * FROM property');
                            while ($row = $result -> fetch_row()) {
                                print "<input class='button' type='checkbox' name='property_select[]' value='$row[0]'>$row[1]<br>"; }
                        ?> 
                        <br>
                        <input class="submit_button" type="submit" name="delete_property" value="Click to submit">
                    </form>
                </div>

                <div class='plan col-lg-4 col-md-4 col-sm-8'>
                    <h3 class='price_generator'>Delete image from property</h3>
                    <form class='price_generator' action="edit.php" method="post">
                        <label>Delete which image?</label>
                        <br>
                        <?php
                            $result = $mysqli -> query('SELECT * FROM media');
                            while ($row = $result -> fetch_row()) {
                                print "<input class='button' type='checkbox' name='media_select[]' value='$row[0]'>$row[2]<br>"; }
                        ?> 
                        <br>
                        <input class="submit_button" type="submit" name="delete_image" value="Click to submit">
                    </form>
                </div>
               
            </div>
        </div>
    </div> <!-- end of container div -->


<?php 
    include 'footer.php';
?>


</body>
</html>