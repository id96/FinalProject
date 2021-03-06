<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
	    <title>East Coast Drones</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	    <script src="https://use.fontawesome.com/252db8b05d.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	    <script type="text/javascript" src="js/main.js"></script>
	</head>
<body>

<?php 
	include 'header.php';
	include 'config.php';
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>

<div class='main_wrapper_services'>
	<h1 id='price_area'>Pricing by Area</h1>


	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-8 largetables"> 
			<!-- SUMMARY TABLE -->
			<h3>PRICING SUMMARY</h3>
		    <div class="plan col-lg-6 col-sm-6 smalltables">
		        <h3>0-1999 Sq. Ft</h3>       
		        <ul>
                    <li>Aerial Pictures - $75</li>
		            <li>DSLR Photography - $100</li>
		            <li>Video Walk Thru - $200</li>
		            <li>TOTAL - $325 save $50!</li>	
		        </ul> 
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6 smalltables">
		        <h3>2000-2999 Sq. Ft</h3>        
		        <ul>
		            <li>Aerial Pictures - $100</li>
		            <li>DSLR Photography - $125</li>
		            <li>Video Walk Thru - $225  </li>
		            <li>TOTAL - $400, save $50!	</li>
		        </ul>    
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6 smalltables">
		        <h3>3000-4999 Sq. Ft</h3>
		        <ul>
		            <li>Aerial Pictures - $125</li>
		            <li>DSLR Photography - $150 </li>
		            <li>Video Walk Thru - $250 </li>	
		            <li>TOTAL - $475, save $50!</li>		
		        </ul>
		    </div>
			
		    <div class="plan col-lg-6 col-sm-6 smalltables">
		        <h3>>5000 Sq. Ft</h3>		
		        <ul>
		            <li>Aerial Pictures - $150 </li>
		            <li>DSLR Photography - $175</li>
		            <li>Video Walk Thru - $275 </li>
		            <li>TOTAL - $550, save $50!</li>				
		        </ul>
		    </div>	
            <div id="discount">
                	<p>If you purchase a Total Package (Aerial Pictures, DSLR Photography, and Video Walk Thru) for any sized area, receive a $50 discount!</p>

            </div>
		    <!-- END OF SUMMARY TABLE -->
		 	
        </div>

        
		    <!-- PRICE GENERATOR -->
		    <div class='plan col-lg-12 col-sm-12' id="generator">
		    	<h1>PRICE GENERATOR</h1>
		    	<div class='price_form'>
				    <form action="price.php" method="post">
						<label>What Services Would You Like?</label>
						<br>
						<input class='button' type='checkbox' name='aerial'>
						<label>Aerial Pictures</label>
						<br>
						<input class='button' type='checkbox' name='dslr'>
						<label>DSLR Photography</label>
						<br>
						<input class='button' type='checkbox' name='video'>
						<label>Video Walk Thru</label>
						<br>
						<label>Property Area</label>
							<select class="button" name="area">
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
		$options = [];
		$search_values = ['aerial','dslr','video'];
		
		//Figure out what services are selected
		foreach ($search_values as $x) {
			if(isset($_POST["$x"])){ 
				$search_term = "type = '$x'";
				array_push($options,$search_term);
			}
		}
		
		//Formate the SQL statement
		if(isset($_POST['area'])) {
			$area = filter_var($_POST['area'], FILTER_SANITIZE_STRING); 
			$query = "SELECT * from prices WHERE square_footage = '$area'";
			if (!empty($options)){
				$query .= ' AND (';
				$query .=implode(' OR ', $options );
				$query .=')';
			}
			
			$results = $mysqli->query($query);
			
			//Calculate prices
			if ($results->num_rows==0 || empty($options)){
				echo "<div class='price'><p><span id='price_response'>Total = $$total</span></p></div>";
			}
			else {
				if ($results->num_rows==3){
					$total = $total - 50;
				}
				while ($prices = $results->fetch_assoc()) {
					$total = $total + $prices['price'];
				}
				echo "<div class='price'><p><span id='price_response'>Total = $$total</span></p></div>";
			}
		}
	}
	?>
	</div>
</div>

	

<?php 
	include 'footer.php';
?>

</body>
</html>