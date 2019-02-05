<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Parks - Login</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
		<!--
		Initialises the content div for everything. 
		-->
	<div class='content'>

		<h2>Login</h2>
		Please enter in your email and password.
		<p>
		<!--
		Creates the form to post the entered information to the loginpage.php file, to query if it's the correct login details. 
		-->
		<form action="loginpage.php" method="post"> 
			Email: <input type="email" name="email" maxlength="40"> 
			<p>
			Password: <input type="password" name="password" maxlength="50">
			<p>
			<input type="submit" name="submit" value="Login"> 
		</form> 
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>