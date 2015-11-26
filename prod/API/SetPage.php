<?php

	/*$idPage =htmlspecialchars($_GET["idPage"]);*/


	// Then you can prepare a statement and execute it.    
	$stmt = $dbh->prepare("CALL projectName.SetFormMessages(?, ?, ?, ?)");
	// One bindParam() call per parameter
	$stmt->bindParam(1, $p_name, PDO::PARAM_STR);
	$stmt->bindParam(2, $p_email, PDO::PARAM_STR);
	$stmt->bindParam(3, $p_message, PDO::PARAM_STR);
	$stmt->bindParam(4, $p_viewed, PDO::PARAM_INT); 

	// call the stored procedure
	$stmt->execute();
		
	echo true;

	$dbh = null;
	die();		
?>