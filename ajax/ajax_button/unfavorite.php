<?php

session_start();

if(!isset($_SESSION['favorites'])) { $_SESSION['favorites'] = []; }

function is_ajax_request(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XmlHttpRequest';
}

if(!is_ajax_request){ exit; }

function array_remove($element, $array){
	$index = array_search($element, $array);
	array_splice($array, $index, 1);
	return $array;
}

// get id from request
$raw_id = isset($_POST['id']) ? $_POST['id'] : '';

if(preg_match("/blog-post-(\d+)/", $raw_id, $matches)){
	$id = $matches[1];

	// remove $id from $_SESSION['favorites']
	if(in_array($id, $_SESSION['favorites'])){
		$_SESSION['favorites'] = array_remove($id, $_SESSION['favorites']);
	}

	echo 'true';
} else {
	echo 'false';
}

?>