<?php

$retval = array(
			'success' => false,
			'message' => 'n/a',
			'file' => ''
			);

if ($_FILES["source_img"]["error"] > 0) {
	$retval["message"] = $_FILES["source_img"]["error"];
} else {

	$name = $_FILES["source_img"]["name"];
	$tmp  = $_FILES["source_img"]["tmp_name"];
	$ext  = end((explode(".", $name)));
	$file = uniqid().'.'.$ext;
	move_uploaded_file($tmp, 'img/'.$file);
	$retval['success'] = true;
	$retval['file']    = 'img/'.$file;
	$retval['message'] = 'File '.$file.' saved.';
}

header("Content-Type: application/json");
echo json_encode($retval);

