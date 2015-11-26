<?php

	$pageName = htmlspecialchars($_POST["pageName"]);
	$category = htmlspecialchars($_POST["category"]);
	$title = htmlspecialchars($_POST["title"]);
	$published = htmlspecialchars($_POST["published"]);


	// Then you can prepare a statement and execute it.    
	$stmt = $dbh->prepare("CALL projectName.SetPage(?, ?, ?, ?)");
	// One bindParam() call per parameter
	if($category !== ""){
		$stmt->bindParam(1, "php/".$category."/".$pageName.".php", PDO::PARAM_STR);
	} else {	
		$stmt->bindParam(1, "php/".$pageName.".php", PDO::PARAM_STR);
	}
	$stmt->bindParam(2, $title, PDO::PARAM_STR);
	$stmt->bindParam(3, $category, PDO::PARAM_STR);
	$stmt->bindParam(4, $published, PDO::PARAM_INT); 

	// call the stored procedure
	$stmt->execute();
		
	echo true;

	$dbh = null;
	die();		
?>