<?php
include('../template.php');

if( !empty($_GET['idCourse']) ){
	$requete = $pdo->prepare("DELETE FROM `Course` WHERE `idCourse` LIKE :idCourse;");
	$requete->bindParam(':idCourse', $_GET['idCourse']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le cours est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
	
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);