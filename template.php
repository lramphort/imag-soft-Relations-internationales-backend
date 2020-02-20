<?php
header('Access-Control-Allow-Origin: *');
$success = false;
$data = array();
include('db.php');
function reponse_json($success, $data, $msgErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $msgErreur;
	$array['result'] = $data;
	echo json_encode($data);
}
