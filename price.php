<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>East Coast Drones</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	</head>
<body>

<?php 
	include 'header.php';
	// include 'config.php';
	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die ("Unable to connect to MySQL");
?>
<div class='price_body'>
	<h1>Pricing by Area</h1>
	<p>*If you purchase a Total Package (Aerial Pictures, DSLR Photography, and Video Walk Thru) for any sized Area, receive a $50 discount!*</p>

	<!-- SUMMARY TABLE -->
	<div class="container">
		<div class="row table">
		    <div class="plan col-lg-3 col-sm-6">
		        <h3>0-1999 Sq. Ft</h3>       
		        <ul>
		            <li><b>Aerial Pictures - </b> $75</li>
		            <li><b>DSLR Photography - </b> $100</li>
		            <li><b>Video Walk Thru - </b> $200</li>	
		            <li><b>TOTAL - </b><span>$325</span>, save $50!</li>	
		        </ul> 
		    </div>
			
		    <div class="plan col-lg-3 col-sm-6">
		        <h3>2000-2999 Sq. Ft</h3>        
		        <ul>
		            <li><b>Aerial Pictures - </b> $100</li>
		            <li><b>DSLR Photography - </b> $125</li>
		            <li><b>Video Walk Thru - </b> $225</li>	
		            <li><b>TOTAL - </b><span>$400</span>, save $50!</li>	
		        </ul>    
		    </div>
			
		    <div class="plan col-lg-3 col-sm-6">
		        <h3>3000-4999 Sq. Ft</h3>
		        <ul>
		            <li><b>Aerial Pictures - </b> $125</li>
		            <li><b>DSLR Photography - </b> $150</li>
		            <li><b>Video Walk Thru - </b> $250</li>		
		            <li><b>TOTAL - </b><span>$475</span>, save $50!</li>		
		        </ul>
		    </div>
			
		    <div class="plan col-lg-3 col-sm-6">
		        <h3>>5000 Sq. Ft</h3>		
		        <ul>
		            <li><b>Aerial Pictures - </b> $150</li>
		            <li><b>DSLR Photography - </b> $175</li>
		            <li><b>Video Walk Thru - </b> $275</li>
		            <li><b>TOTAL - </b><span>$550</span>, save $50!</li>				
		        </ul>
		    </div>	
		</div>
	</div>

	<!-- END OF SUMMARY TABLE -->


	<!-- PRICE GENERATOR -->


	<div class='price_form'>
		<h1>PRICE GENERATOR!</h1>
		<form action="price.php" method="post">
			<label>Property Area</label>
				<select class="button" name="area" required>
					<option value= "0-1999">0-1999 Sq. Ft</option>
					<option value="2000-2999">2000-2999 Sq. Ft</option>
					<option value="3000-4999">3000-4999 Sq. Ft</option>
					<option value=">5000">>5000 Sq. Ft</option>
				</select>
			<br>
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
			<input class="submit_button" type="submit" name='submit' value="Click to submit">
		</form>
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
		echo "<p>Total = $$total</p>";
	}
	?>

<?php 
	include 'footer.php';
?>

</body>
</html>