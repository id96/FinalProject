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
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"<?php echo time(); ?>>
	    <script type="text/javascript" src="js/main.js"></script>
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

<div class='main_wrapper_services'>
	<h1 id='price_area'>Pricing by Area</h1>


	<div class="container">
		<div class="col-lg-6 col-md-12 col-sm-8"> 
			<!-- SUMMARY TABLE -->
			<h3>PRICING SUMMARY</h3>
		    <div class="plan col-lg-6 col-sm-6">
		        <h3>0-1999 Sq. Ft</h3>       
		        <ul>
		            <b>Aerial Pictures - </b> $75<br>
		            <b>DSLR Photography - </b> $100<br>
		            <b>Video Walk Thru - </b> $200	<br>
		            <b>TOTAL - </b><span>$325</span>, save $50!	
		        </ul> 
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6">
		        <h3>2000-2999 Sq. Ft</h3>        
		        <ul>
		            <b>Aerial Pictures - </b> $100 <br>
		            <b>DSLR Photography - </b> $125 <br>
		            <b>Video Walk Thru - </b> $225  <br>
		            <b>TOTAL - </b><span>$400</span>, save $50!	
		        </ul>    
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6">
		        <h3>3000-4999 Sq. Ft</h3>
		        <ul>
		            <b>Aerial Pictures - </b> $125 <br>
		            <b>DSLR Photography - </b> $150 <br>
		            <b>Video Walk Thru - </b> $250 <br>		
		            <b>TOTAL - </b><span>$475</span>, save $50!		
		        </ul>
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6">
		        <h3>>5000 Sq. Ft</h3>		
		        <ul>
		            <b>Aerial Pictures - </b> $150 <br>
		            <b>DSLR Photography - </b> $175 <br>
		            <b>Video Walk Thru - </b> $275 <br>
		            <b>TOTAL - </b><span>$550</span>, save $50!				
		        </ul>
		    </div>	
            <div id="discount">
                	<p>If you purchase a Total Package (Aerial Pictures, DSLR Photography, and Video Walk Thru) for any sized area, receive a $50 discount!</p>

            </div>
		    <!-- END OF SUMMARY TABLE -->
		 	
        </div>

        
		    <!-- PRICE GENERATOR -->
		    <div class='plan col-lg-6 col-sm-6' id="generator">
		    	<h3>PRICE GENERATOR</h1>
		    	<div class='price_form'>
				    <form action="price.php" method="post">
						<label>What Services Would You Like?</label>
						<br>
						<input class='button' type='checkbox' name='Aerial'>
						<label>Aerial Pictures</label>
						<br>
						<input class='button' type='checkbox' name='DSLR'>
						<label>DSLR Photography</label>
						<br>
						<input class='button' type='checkbox' name='Video'>
						<label>Video Walk Thru</label>
						<br>
						<label>Property Area</label>
							<select class="button" name="area" required>
								<option value= "0-1999">0-1999 Sq. Ft</option>
								<option value="2000-2999">2000-2999 Sq. Ft</option>
								<option value="3000-4999">3000-4999 Sq. Ft</option>
								<option value=">5000">>5000 Sq. Ft</option>
							</select>
						<br>
						<input class="submit" type="submit" name='submit' value="submit">
					</form>
				</div> <!-- end of price form div  -->
			</div>
			<!-- END OF PRICE GENERATOR -->
		
		
<?php
	if(isset($_POST['submit'])) {
		$total = 0;
		if(isset($_POST['area'])) {
			$area = $_POST['area']; 
			if ($area === '0-1999') {
				if(isset($_POST['Aerial'])){
					$total = $total + 75;
				}
				if(isset($_POST['DSLR'])){
					$total = $total + 100;
				}
				if(isset($_POST['Video'])){
					$total = $total + 200;
				}
				if(isset($_POST['Aerial'])&&isset($_POST['DSLR'])&&isset($_POST['Video'])){
					$total = $total - 50;
				}
			}
			if ($area === '2000-2999') {
				if(isset($_POST['Aerial'])){
					$total = $total + 100;
				}
				if(isset($_POST['DSLR'])){
					$total = $total + 125;
				}
				if(isset($_POST['Video'])){
					$total = $total + 225;
				}
				if(isset($_POST['Aerial'])&&isset($_POST['DSLR'])&&isset($_POST['Video'])){
					$total = $total - 50;
				}
			}
			if ($area === '3000-4999') {
				if(isset($_POST['Aerial'])){
					$total = $total + 125;
				}
				if(isset($_POST['DSLR'])){
					$total = $total + 150;
				}
				if(isset($_POST['Video'])){
					$total = $total + 250;
				}
				if(isset($_POST['Aerial'])&&isset($_POST['DSLR'])&&isset($_POST['Video'])){
					$total = $total - 50;
				}
			}
			if ($area === '>5000') {
				if(isset($_POST['Aerial'])){
					$total = $total + 150;
				}
				if(isset($_POST['DSLR'])){
					$total = $total + 175;
				}
				if(isset($_POST['Video'])){
					$total = $total + 275;
				}
				if(isset($_POST['Aerial'])&&isset($_POST['DSLR'])&&isset($_POST['Video'])){
					$total = $total - 50;
				}
			}
		}
		echo "<div class='price'><p><span id='price_response'>Total = $$total</span></p></div>";
	}
	?>
	</div>
</div>

	

<?php 
	include 'footer.php';
?>

</body>
</html>