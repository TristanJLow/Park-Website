<!--
Inserts the divs to format the page.
-->
<div class='container'>
<div class='header'></div>
<div class='margin'>
<div class='menu'>
	<!--
	Adding the navigations buttons to the left hand side.
	-->
	<ul>
	<li><a href="index.php" >Home</a></li>
	<li><a href="search.php" >Search</a></li>

	<?php
		/*
		Checking if the cookie is set to the user being logged in, and if so query the DB for his name and display the logout button with his name with the right list class. 
		Otherwise just display the register and login buttons on the right list class.
		*/
		
		include("connecttodb.inc");

		if (isset($_COOKIE['email'])) {
			$email = $_COOKIE['email'];
			$result = $pdo->query("
			SELECT first_name
			FROM users
			WHERE email = '$email'");

			foreach ($result as $row) {
				$name = $row["first_name"];
				printf ("<li class='right'><a href='logout.php'>$name Logout</a></li>");
			}
		}
		else {
			printf ("
				<li class='right'><a href='login.php'>Login</a></li>
				<li class='right'><a href='register.php'>Register</a></li>");
		}
	?>
	</ul>
</div>