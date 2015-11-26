<?php
	function open_connection(){
		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

		// You must first connect to the database by instantiating a PDO object
		try {
		    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
		    return $dbh;
		} catch (PDOException $e) {
		    echo 'Connection to the DB '.DB_NAME.' failed: ' . $e->getMessage();
		}
	}
?>