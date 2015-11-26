<?php

	$idPage = htmlspecialchars($_POST["idPage"]);
	$contentKey = htmlspecialchars($_POST["contentKey"]);
	$content = htmlspecialchars($_POST["content"]);
	$contentType = htmlspecialchars($_POST["contentType"]);
	
	$dbh = open_connection();
	// Then you can prepare a statement and execute it.    
	$stmt = $dbh->prepare("CALL projectName.SetContentPage(?, ?, ?, ?)");

	$stmt->bindParam(1, $idPage, PDO::PARAM_STR);
	$stmt->bindParam(2, $contentKey, PDO::PARAM_STR);
	$stmt->bindParam(3, $content, PDO::PARAM_STR);
	$stmt->bindParam(4, $contentType, PDO::PARAM_STR);

	// call the stored procedure
	$stmt->execute();
	
	echo true;

	$dbh = null;
	die();		
?>