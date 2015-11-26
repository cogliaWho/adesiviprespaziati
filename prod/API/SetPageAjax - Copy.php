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
		<script async="" type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
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
		$newPage = fopen("../php/". $category . '/' . $pageName . ".php","w");
	} else {
		$newPage = fopen("../php/" . $pageName . ".php","w");
	}
	//create page
	fwrite($newPage, $fileContent);
	// closes the file
	fclose($newPage);
	
	//$newPage = fopen($pageName.".php", "w") or die("Unable to open file!");

	$post_data = array(
	  'page' => array(
	    'urlMask' => $urlMask,
	    'string_key' => $string_key,
	    'string_value' => $string_value,
	    'string_extra' => $string_extra,
	    'is_public' => $public,
	   'is_public_for_contacts' => $public_contacts
	  )
	);

	echo true;

	$dbh = null;
	die();		
?>