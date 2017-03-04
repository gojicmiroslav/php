<?php

// We can simulate a slow server with sleep
// sleep(2);

session_start();

if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

function is_ajax_request(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XmlHttpRequest';
}

if(!is_ajax_request){ exit; }

// get id from request
$raw_id = isset($_POST['id']) ? $_POST['id'] : '';

// d+ - one or more digits
// (\d+)/ - capture digits and store it in $match_id
// preg_match - returns true if it find match, returns false otherwise
if(preg_match("/blog-post-(\d+)/", $raw_id, $matches)){
	$id = $matches[1];

	// store in $_SESSION['favorites']
	if(!in_array($id, $_SESSION['favorites'])){
		$_SESSION['favorites'][] = $id;
	}

	echo 'true';
} else {
	echo 'false';
}

?>