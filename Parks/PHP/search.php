<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Parks - Search</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<h2>Search some stuff</h2>
		
		<!--
		Creates a form to send an inputted line of text to the search results file with the method GET.
		-->
	
		<form action="searchresults.php" method="get"> 
			Search by name:
			<br>
			<p>
			<input name="string" type="text" size="20"/>
			<input type="submit" name="submit" value="Search">
		</form>

		<!--
		Creates a form to send a selected suburb to the search results file with the method GET.
		The suburbs are displayed by querying the parks table, and then looping through the result and displaying the unique suburbs.
		-->

		<form action="searchresults.php" method="get"> 
			Search by suburb: 
			<br>
			<p>
			<select name="suburb"> 
				<?php
					include("../includes/connecttodb.inc");
		
					$result = $pdo->query("
					SELECT DISTINCT suburb
					FROM parks
					ORDER BY suburb ASC");
		
					foreach ($result as $row) {
		
				$suburb = $row['suburb'];
						printf ("<option value ='$suburb'>$suburb</option>");
					}	
				?>
			</select>
			<input type="submit" name="submit" value="Search">
		</form>
		
		<!--
		Creates a form to send a selected star rating to the search results file with the method GET.
		-->
		
		<form action="searchresults.php" method="get"> 
			Search by rating: 
			<br>
			<p>
			<select name="rating"> 
      			<option value="5">5 Stars</option>
      			<option value="4">4 Stars</option>
      			<option value="3">3 Stars</option>
      			<option value="2">2 Stars</option>
      			<option value="1">1 Stars</option>
			</select>
			<input type="submit" name="submit" value="Search">
		</form>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>