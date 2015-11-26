<?php
	$pageName = htmlspecialchars($_POST["pageName"]);
	$dbh = open_connection();

	$stmt = $dbh->prepare("CALL projectName.GetPublishedPages()");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$dbh = null;
	return $results;
	die();		

?>