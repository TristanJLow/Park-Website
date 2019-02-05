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

		<h2>Registration successful</h2>
		<!--
		Defines variables from the POST information from the previous form, and then runs a query to insert the users information into the users table. 
		It then displays the registered information to the user.
		-->
		<?php
			include("../includes/connecttodb.inc");

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];
			$birthdate = $_POST['birthdate'];
			$phone = $_POST['phone'];
			$street = $_POST['street'];
			$suburb = $_POST['suburb'];
			$state = $_POST['state'];
			$postcode = $_POST['postcode'];
			$newsletter = $_POST['newsletter'];

			$result = $pdo->query("
			INSERT INTO users
			SET email='$email', first_name='$first_name', password='$password', last_name='$last_name', gender='$gender', birthdate='$birthdate', phone='$phone', street='$street', suburb='$suburb', state='$state', postcode='$postcode', newsletter='$newsletter'");

			printf('%s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br> %s <br>', $email, $password, $first_name, $last_name, $gender, $birthdate, $phone, $street, $suburb, $state, $postcode, $newsletter);
		?>
		<!--
		Creates a hyperlink for the user to log in with their new account.
		-->
		<p>
		<a href='Login.php'>Login with New User</a>
		<p>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>