<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Parks - Review</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>
		<h2>Review Successfully Published</h2>
		<!--
		Defines variables from the POST information from the previous form, runs a query to find the users name, and then runs a query to insert the review information into the reviews table. 
		It then displays the published review to the user.
		-->
		<?php
			include("../includes/connecttodb.inc");

			$id = $_POST['id'];
			$email = $_POST['email'];
			$review = $_POST['review'];
			$rating = $_POST['rating'];

			$result = $pdo->query("
			SELECT first_name
			FROM users
			WHERE email = '$email'");

			foreach ($result as $row) {
				$first_name = $row["first_name"];
			}

			$result = $pdo->query("
			INSERT INTO reviews
			SET review='$review', first_name='$first_name', stars='$rating', id='$id'");

			echo "$review <br>$first_name rated this park $rating stars.<p> <a href='parkpage.php?id=$id'>Go back to page</a>";
		?>
	</div>
	<?php include "../includes/footer.inc" ?>
	</div>
	</div>
</body>
</html>