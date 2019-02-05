<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate Javascript and stylesheets.
	-->
	<title>Parks - Search</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../CSS/formatting.css"/>
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script src="../CSS/map.js"></script>
</head>
<body>
	<?php include "../includes/navigation.inc" ?>
	
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<!--
		The div and script for the map to be created within.
		-->
		<div id='map'></div>
		<script src="../Javascript/map.js"></script>
		
		<?php
			include("../includes/connecttodb.inc");
			
			/*
			Defines a function to display the titles of the table columns.
			*/
			
			function display_headers() {
				echo "
				<table> 
				<tr>
				<td class='name'>Name</td>
				<td>Street</td>
				<td>Suburb</td>
				</table>
				<p>";
			}
			
			/*
			Creates a function to display the results in a table. 
			It takes in a query result, then loops through the result and defines varaibales, then inserting the park into the table and adding a marker to the map.
			*/

			function display_results($result) {
				foreach ($result as $row) {
					
$id = $row['id'];

					$park_code = $row['park_code'];

					$name = $row['name'];
					$street = $row['street'];
					$suburb = $row['suburb'];
					$longitude = $row['longitude'];
					$latitude = $row['latitude'];
					
					echo "
						<tr>
						<td class='name'><a href='parkpage.php?id=$id'>$name<p></p></a>
						</td>
						<td>$street</td>
						<td>$suburb</td>
						</tr>
						
						<script type='text/javascript'>add_marker($latitude,$longitude,'$name',$id);</script>";
				}
			}
			
			/*
			Creates a function to display the reviews in a table with their parks. 
			It takes in a query result from the reviews table, then loops through the result and defines varaibales, then running a query to the parks table and defining variabls, 
			then inserting the park and review into the table and adding a marker to the map.
			*/
			
			function display_results_with_reviews($result) {
				include("../includes/connecttodb.inc");
			
				foreach ($result as $row) {
					
$id = $row['id'];
					$review =$row['review'];
					$first_name =$row['first_name'];
					$stars =$row['stars'];
	
					$tempresult = $pdo->query("
					SELECT DISTINCT *
					FROM parks
					WHERE id = '$id'
					ORDER BY id ASC");
		
					foreach ($tempresult as $row) {
						
$id = $row['id'];
	
					$park_code = $row['park_code'];

						$name = $row['name'];
						$street = $row['street'];
						$suburb = $row['suburb'];
						$longitude = $row['longitude'];
						$latitude = $row['latitude'];
	
						echo " 
							<tr>
							<td class='name'>
							<a href='parkpage.php?id=$id'>$name</a>
							<p>$review <br>$first_name rated this park $stars stars.
							</td>
							<td>$street</td>
							<td>$suburb</td>
							</tr>
							<script>add_marker($latitude,$longitude,'$name',$id);</script>";
					}
				}
			}
			
			/*
			Checks if the search query was text by getting from the URL, and then queries the text against the parks table and inserts the result into the display results function defined earlier.
			*/

			if(isset($_GET['string'])) {
				$string = $_GET['string'];

				printf("<h2>Search Results for %s </h2>", $string);

				display_headers();

				$result = $pdo->query("
				SELECT *
				FROM parks
				WHERE name LIKE '%$string%'
				ORDER BY id ASC");
				
				echo "<table>";
				display_results($result);
				echo "</table>";
			}
			
			/*
			Checks if the search query was a suburb by getting from the URL, and then queries the suburb against the parks table and inserts the result into the display results function defined earlier.
			*/

			if(isset($_GET['suburb'])) {
				$suburb = $_GET['suburb'];

				printf("<h2>Search Results for %s </h2>", $suburb);

				display_headers();

				$result = $pdo->query("
				SELECT *
				FROM parks
				WHERE suburb = '$suburb'
				ORDER BY id ASC");
				
				echo "<table>";
				display_results($result);
				echo "</table>";
			}

			/*
			Checks if the search query was for a rating, and then queries the rating against the reviews table and inserts the result into the review display results function defined earlier.
			*/
	
			if(isset($_GET['rating'])) {
				$rating = $_GET['rating'];

				printf("<h2>Search Results for %s stars</h2>", $rating);
	
				display_headers();
	
				$result = $pdo->query("
				SELECT *
				FROM reviews
				WHERE stars = '$rating'
				ORDER BY id ASC");
				
				echo "<table>";	
				display_results_with_reviews($result);
				echo "</table>";
			}
		?>
		
		<p>
		<a href="search.php">Try another search</a>

	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>