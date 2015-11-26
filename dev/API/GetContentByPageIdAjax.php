<?php
	$idPage = htmlspecialchars($_POST["idPage"]);
	$dbh = open_connection();
	// Then you can prepare a statement and execute it.    
	$stmt = $dbh->prepare("CALL projectName.GetContentByPageId(?)");
	// One bindParam() call per parameter
	$stmt->bindParam(1, $idPage, PDO::PARAM_INT); 

	// call the stored procedure
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$jsonstring = json_encode($results);
	
	$dbh = null;
	echo $jsonstring;
	die();		

?>