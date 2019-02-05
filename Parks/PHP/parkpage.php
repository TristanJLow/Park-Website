<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate Javascript and stylesheets.
	-->
	<title>Parks - Park</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>
		<!--
		The div and script for the map to be created within.
		-->
		<div id='map'></div>
		<script src="../Javascript/map.js"></script>
		
		<!--
		Gets the ID of the park to display from the URL, then queries the DP for the information.
		-->
		
		<?php
		$id = $_GET['id'];

		$result = $pdo->query("
		SELECT *
		FROM parks 
		WHERE id = '$id'");
		
		/*
		Loops through the result query and displays the information and ads a marker to the displayed map.
		*/
		
		foreach ($result as $row) {
	
			$id = $row['id'];
			$park_code = $row['park_code'];
			$name = $row['name'];
			$street = $row['street'];
			$suburb = $row['suburb'];
			$longitude = $row['longitude'];
			$latitude = $row['latitude'];
			
			echo "<script type='text/javascript'>add_marker($latitude,$longitude,'$name',$id);</script>";
			
			echo "<h1>$name</h1> <h2> $suburb </h2> $street<p>";
		}
	
		/*
		Checks if the user is logged in, and if so displays the form and inputs to submit a review. 
		Otherwise it will tell the user to log in to review a park
		*/
		
		if (isset($_COOKIE['email'])) {
	    	$email = $_COOKIE['email'];
	
			printf ("
			<form name='submit' action='reviewsubmit.php?' method='post'> 
				Review: <br><textarea name='review'cols='102' rows='6'></textarea><p>
				Rating: 
				<select name='rating'> 
	     	 		<option value = '5'>5 Stars</option>
	     	 		<option value = '4'>4 Stars</option>
	     	 		<option value = '3'>3 Stars</option>
	     	 		<option value = '2'>2 Stars</option>
					<option value = '1'>1 Stars</option>
	     	 	</select>
	     		<input type='hidden' name='id' value='$id'> 
	     		<input type='hidden' name='email' value='$email'> 
				<input type='submit' name='submit' value='sumbit'> 
			</form>");
		}
		else {
		printf ("<p>Log in to review parks</p>");
		}
		
		/*
		Queries the reviews table in the database for this parks ID.
		*/
		
		$result = $pdo->query("
		SELECT *
		FROM reviews
		WHERE id = '$id'");
		
		/*
		Loops through the result and displays all the reviews for this park.
		*/

		foreach ($result as $row) {
			$id = $row['id'];
			$review =$row['review'];
			$first_name =$row['first_name'];
			$stars =$row['stars'];
	
			echo "$review <br>$first_name rated this park $stars stars.<p>";
		}
		?>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>