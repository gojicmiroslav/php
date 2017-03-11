<?php

function is_ajax_request(){
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XmlHttpRequest';
}

$length = isset($_POST['length']) ? (int) $_POST['length'] : '';
$length = isset($_POST['width']) ? (int) $_POST['width'] : '';
$length = isset($_POST['height']) ? (int) $_POST['height'] : '';

$volume = $length * $width * $height;

if(is_ajax_request()){
	echo $volume;
} else {
	exit;
}