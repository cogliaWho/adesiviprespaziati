<?php

	function get_page_id_by_path ($path) {
		$dbh = open_connection();
  		// Then you can prepare a statement and execute it.    
		$stmt = $dbh->prepare("CALL projectName.GetPageIdByPath(?)");
		// One bindParam() call per parameter
		$stmt->bindParam(1, $path, PDO::PARAM_INT); 

		// call the stored procedure
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_COLUMN);
		//$jsonstring = json_encode($results);
		
		$dbh = null;
		return $results;
		die();		
	}
?>