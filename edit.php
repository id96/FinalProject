<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>East Coast Drones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
	<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/parallax.min.js"></script>
</head>

<div class="form_wrap">
        <div class="form">
        <p>Edit Album</p>
            <form action="edit.php" method="post">
                <label>Edit which album(s)?...</label>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Albums');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <label>Change Album Name to...</label>
                <br>
                <input class="button" type="text" name="new_name" placeholder="Matisse"/>
                <br>
                <label>Change Album Description to...</label>
                <br>
                <textarea rows="4" cols="40" name="new_description" placeholder="A collection of works created by Henri Matisse"></textarea>
                <br>
                <label>Add existing image to selected album...</label>
                <br>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Images');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='add_album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <label>Remove existing image from selected album...</label>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Images');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='remove_album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <input class="submit_button" type="submit" name="edit_album" value="Click to submit">
            </form>
        <p>Edit Image</p>
            <form action="edit.php" method="post">
                <label>Current Image:</label>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Images');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <label>Change Image Name to...</label>
                <br>
                <input class="button" type="text" name="new_image" placeholder="Nu Bleu 2"/>
                <br>
                <label>Change Artist to...</label>
                <br>
                <input class="button" type="text" name="new_artist" placeholder="Matisse"/>
                <br>
                <input class="submit_button" type="submit" name="edit_image" value="Click to submit">
            </form>

        <p>Delete Album</p>
            <form action="edit.php" method="post">
                <label>Delete which album(s)?...</label>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Albums');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <input class="submit_button" type="submit" name="delete_album" value="Click to submit">
            </form>
        <p>Delete Image</p>
            <form action="edit.php" method="post">
                <label>Delete which image(s)?...</label>
                <br>
                <?php
                    $result = $mysqli -> query('SELECT * FROM Images');
                    while ($row = $result -> fetch_row()) {
                        print "<input class='button' type='checkbox' name='album_select[]' value='$row[0]'>$row[1]<br>"; }
                ?> 
                <br>
                <input class="submit_button" type="submit" name="delete_image" value="Click to submit">
                <br>
                <br>
                <br>
                <br>
            </form>
        </div>
    </div>

<?php
    if(isset($_POST['edit_album'])) {
        $result = $mysqli -> query('SELECT * FROM Albums');
        $edit_albumid = $_POST['album_select'];
        $new_name = $_POST['new_name'];
        $new_name = htmlentities($new_name);
        $new_description = $_POST['new_description'];
        $new_description = htmlentities($new_description);

        if(preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,100}$/", $new_name) === 1 && preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,200}$/", $new_description) === 1) {
            foreach ($edit_albumid as $item) {
                if(!empty($new_name) && !empty($new_description)) {
                    $sql = "UPDATE Albums SET Name = '$new_name', Description = '$new_description', date_modified = CURDATE() WHERE AlbumID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(!empty($new_name) && empty($new_description)) {
                    $sql = "UPDATE Albums SET Name = '$new_name', date_modified = CURDATE() WHERE AlbumID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(empty($new_name) && !empty($new_description)) {
                    $sql = "UPDATE Albums SET Description = '$new_description', date_modified = CURDATE() WHERE AlbumID = $item";
                    $result = $mysqli -> query($sql);
                }
            }
            echo "<div class='response'>Congrats! Your edit album was successful.</div>";
        }
        else {
            echo "<div class='response_add'>Please enter valid criteria to edit album.</div>";
        }


        if(isset($_POST["remove_album_select"])) {
            $result = $mysqli -> query('SELECT * FROM ImagesinAlbums');
            $edit_albumid = $_POST['album_select'];
            $edit_imageid = $_POST['remove_album_select'];
            // print_r($edit_imageid);
            foreach ($edit_albumid as $item) {
                foreach($edit_imageid as $item2) {
                $sql = "DELETE FROM ImagesinAlbums WHERE AlbumID = $item AND ImageID = $item2";
                $result = $mysqli -> query($sql);
                }
            }
            echo "<div class='response'>Congrats! Your edit was successful.</div>";
        }
        if(isset($_POST['add_album_select'])) {
            $result = $mysqli -> query('SELECT * FROM ImagesinAlbums');
            $edit_albumid = $_POST['album_select'];
            print_r($edit_albumid);
            $edit_imageid = $_POST['add_album_select'];
            print_r($edit_imageid);
            foreach ($edit_albumid as $item) {
                foreach($edit_imageid as $item2) {
                    $sql = "INSERT INTO ImagesinAlbums(ImageID, AlbumID) VALUES('$item2', '$item')";
                    $result = $mysqli -> query($sql);
                }
            }
            echo "<div class='response'>Congrats! Your edit was successful.</div>";
        }
    }

    if(isset($_POST['album_select'])) {
        $image_id = $mysqli -> insert_id;
        $image_select = $_POST['album_select'];
        foreach($image_select as $item) {
            $image_id = $mysqli -> query("INSERT INTO ImagesinAlbums(ImageID, AlbumID) VALUES ('$image_id', '$item')");
        }
        // echo "<div class='response'>Congrats! Your edit was successful.</div>";
    }
    
    if(isset($_POST['edit_image'])) {
        $result = $mysqli -> query('SELECT * FROM Images');
        $edit_albumid = $_POST['album_select'];
        $painting_title = $_POST['new_image'];
        $painting_title = htmlentities($painting_title);
        $new_artist = $_POST['new_artist'];
        $new_artist = htmlentities($new_artist);
        
        if(preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,100}$/", $painting_title) === 1 && preg_match("/^[A-Za-z 0-9!:@#$%^&*_()]{0,200}$/", $new_artist) === 1) {
            foreach ($edit_albumid as $item) {
                if(!empty($painting_title) && !empty($new_artist)) {
                    $sql = "UPDATE Images SET PaintingTitle = '$painting_title', Artist = '$new_artist' WHERE ImageID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(!empty($painting_title) && empty($new_artist)) {
                    $sql = "UPDATE Images SET PaintingTitle = '$painting_title' WHERE ImageID = $item";
                    $result = $mysqli -> query($sql);
                }
                if(empty($painting_title) && !empty($new_artist)) {
                    $sql = "UPDATE Images SET Artist = '$new_artist' WHERE ImageID = $item";
                    $result = $mysqli -> query($sql);
                }
            }
            echo "<div class='response'>Congrats! Your edit image was successful.</div>";
        }
        else {
            echo "<div class='response_add'>Please enter valid edit image criteria.</div>";
        }
    }

    if(isset($_POST["delete_album"])) {
        $result = $mysqli -> query('SELECT * FROM Albums');
        $edit_albumid = $_POST['album_select'];
        foreach ($edit_albumid as $item) {
            $sql = "DELETE FROM Albums WHERE AlbumID = $item";
            $result = $mysqli -> query($sql);
            }
        echo "<div class='response'>Congrats! Your edit was successful.</div>";
        }

    if(isset($_POST["delete_image"])) {
        $result = $mysqli -> query('SELECT * FROM Images');
        $result2 = $mysqli2 -> query('SELECT * FROM Albums');
        $edit_imageid = $_POST['album_select'];
        foreach ($edit_imageid as $item) {
            $sql = "DELETE FROM Images WHERE ImageID = $item";
            $sql2 = "DELETE FROM ImagesinAlbums WHERE ImageID = $item";
            $result = $mysqli -> query($sql);
            $result2 = $mysqli2 -> query($sql2);
        }
        echo "<div class='response'>Congrats! Your edit was successful.</div>";
    }
?>


</body>
</html>