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

		<?php        
			/*
			Gets the entered in login details through POST, and then queries the database for those exact details. It then takes the result and checks if it's empty, 
			if not it logs the user in and sets the cookie. Otherwise it tells the user it was incorrect and links them to try again.
			*/
			include("../includes/connecttodb.inc");

			$email = $_POST['email'];
			$password = $_POST['password'];

			$result = $pdo->query("
			SELECT email, password
			FROM users
			WHERE email = '$email'
			AND password = '$password'");

			$count=0;
			foreach ($result as $row) {

				$count = +1;
			}

			if($count==1) {
				setcookie("email", "$email", time()+3600);
				setcookie("password", "$password", time()+3600);
				header("location:index.php");
			}
			else {
				echo "Wrong Email or Password <p><a href='login.php'>Try Again</a>";
			}
		?>
		<br>
	</div>
	<?php include "../includes/footer.inc"?>
	</div>
	</div>
</body>
</html>