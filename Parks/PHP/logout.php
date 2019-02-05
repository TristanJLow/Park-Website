<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title, linking the appropriate CSS and setting the page to automatically redirect after three seconds.
	-->
	<title>Parks - Logout</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
	<meta http-equiv="refresh" content="3; url=index.php"/>
</head>
<body>
	<!--
	Logs the user out by clearing the cookie. 
	-->
	<?php
		setcookie("email", "", time()-3600);
		setcookie("password", "", time()-3600);
	?>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<!--
		Informs the user they are logged out and they are being redirected.
		-->
		<h2>Logout Successful</h2>
		Please wait while we redirect you....
		<br>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>