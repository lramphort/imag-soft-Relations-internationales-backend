<?php
include('../template.php');
if( !empty($_GET['loginStudent']) && !empty($_GET['passWordStudent']) ){
    $requete = $pdo->prepare("SELECT COUNT(`idPerson`) FROM `Student` WHERE `login` = :loginStudent AND `passWord` = :passWordStudent;");
	$requete->bindParam(':loginStudent', $_GET['loginStudent']);
	$requete->bindParam(':passWordStudent', $_GET['passWordStudent']);
	
	if( $requete->execute() ){
		$success = true;
		$msg = 'Student logged';
	} else {
		$success = false;
		$msg = 'Wrong logs';
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}
reponse_json([$success, $data, $msg]);
