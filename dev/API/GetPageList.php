<?php
	function get_published_page() {
		$dbh = open_connection();

		$stmt = $dbh->prepare("CALL projectName.GetPublishedPages()");
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$dbh = null;
		return $results;
		die();		
	}
?>