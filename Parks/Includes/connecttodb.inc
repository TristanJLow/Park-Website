<?php
	/*
	Connecting to the databse with the correct username and details
	*/
	$pdo = new PDO('mysql:host=localhost;dbname=n9217126', 'n9217126', 'Ambrose');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>