<?php

	$pageName = htmlspecialchars($_POST["pageName"]);
	$urlMask = htmlspecialchars($_POST["urlMask"]);
	$category = htmlspecialchars($_POST["category"]);
	$title = htmlspecialchars($_POST["title"]);
	$published = htmlspecialchars($_POST["published"]);

	$dbh = open_connection();
	// Then you can prepare a statement and execute it.    
	$stmt = $dbh->prepare("CALL projectName.SetPage(?, ?, ?, ?, ?)");
	// One bindParam() call per parameter
	if($category !== ""){
		$path = "php/".$category."/".$pageName.".php";
	} else {	
		$path = "php/".$pageName.".php";
	}
	$stmt->bindParam(1, $path, PDO::PARAM_STR);
	$stmt->bindParam(2, $urlMask, PDO::PARAM_STR);
	$stmt->bindParam(3, $title, PDO::PARAM_STR);
	$stmt->bindParam(4, $category, PDO::PARAM_STR);
	$stmt->bindParam(5, $published, PDO::PARAM_INT); 

	// call the stored procedure
	$stmt->execute();
	
	$resourcePath = ROOT ;

	$fileContent = '
	<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<title>'.$title.'</title>
		<meta name="description" itemprop="description" content="adesivi prespaziati">
		<meta name="keywords" itemprop="keywords" content="adesivi prespaziati">
		<link rel="stylesheet" media="screen" type="text/css" href="'.ROOT.'css/style.css">
	</head>
	<body>
	</body>
		<script async="" type="text/javascript" src="'.ROOT.'js/jquery.js"></script>
		<script async="" type="text/javascript" src="'.ROOT.'js/main.js"></script>
	</html>
	';

	//Page creation
	//Create folder if category exist
	if($category !== ""){
		if( is_dir("../php/".$category) === false )
		{
		    mkdir("../php/".$category);
		}
		$filename = "../php/". $category . '/' . $pageName . ".php";
		if (!file_exists($filename)) {
				createFile($filename, $fileContent);
		}
	} else {
		$filename = "../php/" . $pageName . ".php";
		if (!file_exists($filename)) {
				createFile($filename, $fileContent);
		}
	}

	echo true;

	$dbh = null;
	die();		

	function createFile($filename, $fileContent){
		$newPage = fopen($filename,"w");
		//create page
		fwrite($newPage, $fileContent);
		// closes the file
		fclose($newPage);
	}
?>