<?php
include('../template.php');

if( !empty($_GET['idCourse']) && !empty($_GET['stateToUpdate']) ){

	$requeteRejectCourse = $pdo->prepare("UPDATE `Course` SET `state` = :stateToUpdate, `lastModification` = NOW() WHERE `idCourse` = :idCourse;");
	$requeteRejectCourse->bindParam(':idCourse', $_GET['idCourse']);
	$requeteRejectCourse->bindParam(':stateToUpdate', $_GET['stateToUpdate']);

	if( $requeteRejectCourse->execute() ){
		$success = true;
		$msg = 'Le status du cours est modifié ('.$_GET['stateToUpdate'].')';
	} else {
		$msg = "Une erreur s'est produite";
	}
	
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);