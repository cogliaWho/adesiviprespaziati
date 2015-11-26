<?php

	function get_content_by_key ($contentKey) {
		$dbh = open_connection();
		// Then you can prepare a statement and execute it.    
		$stmt = $dbh->prepare("CALL projectName.GetContentByKey(?)");
		// One bindParam() call per parameter
		$stmt->bindParam(1, $contentKey, PDO::PARAM_INT); 

		// call the stored procedure
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_COLUMN);
		//$jsonstring = json_encode($results);
		//echo $results[0];
		echo $results[0];
		$dbh = null;
		die();		
	}
?>