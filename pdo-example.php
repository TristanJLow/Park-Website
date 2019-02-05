<?php
	require "includes/connectToDB.inc"
	
	//Easy way with no input:
	$pdo->query("SELECT name FROM table WHERE id = 1");
	
	//If there's user input i.e searching, registration etc.
	
	$query = "SELECT name FROM table WHERE id = :id";
	
	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':id', 1);
	$stmt->execute();
	$result = $stmt->fetchAll();
?>