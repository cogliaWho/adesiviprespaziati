<?php
	require_once 'connectionData.php';

	//$sql = "CALL projectName.GetPages()";
	$stmt = $dbh->prepare("CALL projectName.GetPages()");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$jsonstring = json_encode($results);
	
	echo $jsonstring;

	$dbh = null;
	die();		
?>