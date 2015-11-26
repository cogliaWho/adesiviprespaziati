<?php 
require_once 'config.php';
require_once 'connectionData.php';
include 'GetContentByPageId.php';
include 'GetContentByKey.php';
include 'GetPageList.php';
include 'GetPageIdByPath.php';
		
$GLOBALS['pageObj'] = get_published_page();

function get_pages(){
	for( $i=0; $i < count($GLOBALS['pageObj']); $i++){
		echo '<option value="'. $GLOBALS['pageObj'][$i]['idPage'] .'">'. $GLOBALS['pageObj'][$i]['urlMask'] .'</option>';
	}
}

?>