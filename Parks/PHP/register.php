<!DOCTYPE html>
<html>
<head>
	<!--
	Setting the title and linking the appropriate CSS.
	-->
	<title>Parks - Register</title>
	<meta charset="utf-8">
	<link rel='stylesheet' type='text/css' href='../CSS/formatting.css'/>
</head>
<body>
	<?php include "../includes/navigation.inc"?>
	<!--
	Initialises the content div for everything. 
	-->
	<div class='content'>

		<h2>Register</h2>
		Enter your information for your user account
		<p>
		<!--
		Creates the form and various inputs to be posted to the registersuccess.php file to be added to the database. Minor HTML5 valdiation checking on some inputs.
		-->
		<form name='register' action='registersuccess.php' method='POST'>
			First Name: <input name="first_name" type="text" size="20"/>
			<p>
			Last Name: <input name="last_name" type="text" size="20"/>
			<p>
			Email: <input name="email" type="email"  size="30"/>
			<p>
			Password: <input name="password" type="text"  size="10"/>
			<p>
			Confirm Password: <input name="password" type="text"  size="10"/>
			<p>
			Gender: <input name="gender" type="radio"  value="M"/> Male <input name="gender" type="radio"  value="F"/>Female
			<p>
			Date of Birth: <input name="birthdate" type="date"/>
			<p>
			Mobile: <input name="phone" type="text"  size="10" placeholder="0000000000"/>
			<p>
			Street: <input name="street" type="text"  size="10"/>
			<p>
			Suburb: <input name="suburb" type="text"  size="10"/>
			<p>
			Postcode: <input name="postcode" type="text"  size="4"/>
			<p>
			State: 
			<select name="state"> 
				<option value="QLD">QLD</option>
				<option value="NSW">NSW</option>
			</select>
			<p>
			Receive Mail Updates: <input name="newsletter" type="checkbox" value="yes"/>
			<p>
			<input name="submit" type="submit" value="submit"/>
			<input name="reset" type="reset" value="reset"/>
		</form>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>