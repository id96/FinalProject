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
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <script type="text/javascript" src="js/main.js"></script>
</head>
<?php 
    include 'config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

<body>
    
    <?php include 'header.php'; ?>

    <div class="container-fluid slideshow no-gutter">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 slideshow-title">
                <div>EAST COAST DRONES</div>
                <p class='mission'>East Coast Drones strives to exceed expectations by delivering high quality aerial photography & videography, still photography, and walk-through tours</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                <div class="slider" id="main-slider">
                    <div class="slider-wrapper">
                        <img src="media/home1.jpg" alt="First" class="slide"/>
                        <img src="media/pic1.jpg" alt="Second" class="slide"/>
                        <img src="media/pic2.jpg" alt="Third" class="slide"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-title">    
                <div>WHAT IS DRONE PHOTOGRAPHY?</div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 content-text"> 
                <p>Drone Photography is the art of creating digital media through the use of drone equipment. Drones are able to take beautiful birds eye view images of properties, as well as capturing the initimate corners of any room with its mobility. Drone videography gives the user the experience of actually being at a different property, without leaving the comfort of their home. </p>
                <p>East Coast Drones is run by two young professionals who aim to provide our clients with the best work possible through photography and cinematography. Our goal is to create meaningful relationships with clients.</p>
            </div>
        </div>
    </div>

     <!-- <div class="container-fluid content-grey">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-title">    
                <div>WHAT IS DRONE PHOTOGRAPHY?</div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 content-text"> 
                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
            </div>
        </div>
    </div> -->

    <div class="container-fluid services">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-md-push-1 col-lg-10 col-md-push-1 wrap">
            <!-- Simple cell layout, no padding. -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 services-cell no-gutter">         
                <h2>AERIAL</h2>
                <p>Using sUAS (Small Unmanned Aircraft Systems) from DJI (Dà-Jiāng Innovations, a drone technology company), our Aerial services include photography and videography. Every angle of the subject will be captured and then edited in post production to ensure high quality. </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 services-cell no-gutter">         
                <h2>DSLR</h2>
                <p>Using Canon DSLRs (Digital Single-Lens Reflex Cameras), East Coast Drones can capture interior and exterior still-pictures of the subject.</p>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 services-cell no-gutter">         
                <h2>VIDEO WALK-THRU</h2>
                <p>Using stabilizers from DJI (Dà-Jiāng Innovations, a drone technology company), a walk-thru tour of the subject can be created, producing a smooth, first person point of view for the viewer.</p>
            </div>
        </div>
        </div>
    </div>

   
            <!-- Parallax.js wrapper  -->
<!--    <div class="parallax-window" data-parallax="scroll" data-image-src="media/pic2.jpg">
            <div class="container-fluid top">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-8 col-md-push-2 col-lg-8 col-lg-push-2 top-title">
                        <div>EAST COAST DRONES</div>
                    </div>
                </div>
            </div>
        </div> -->


    

    <?php include 'footer.php'; ?>

</body>
</html>