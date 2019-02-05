<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Parks - Home</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>
		<h1>Welcome!</h1>

		<?php
			/*
			Checks if the user is logged in through a cookie, and if so directs the user to go to search. 
			Otherwise it tells the un-logged in user to go and log in to review parks
			*/
			if (isset($_COOKIE['email'])) {
			    $email = $_COOKIE['email'];
			    printf ("<p>Go to the search tab to look for parks</p>");
			}
			else {
				printf ("<p>Log in to review parks</p>");
			}
		?>
		<br>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>