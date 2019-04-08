<?php
include('../template.php');

if( !empty($_GET['idCourse']) ){

	$requeteDeleteMark = $pdo->prepare("DELETE FROM `Mark` WHERE `idCourse` = :idCourse;");
	$requeteDeleteMark->bindParam(':idCourse', $_GET['idCourse']);
	$requeteDeleteMark->execute();

	$requeteDeletePoll = $pdo->prepare("DELETE FROM `Poll` WHERE `idCourse` = :idCourse;");
	$requeteDeletePoll->bindParam(':idCourse', $_GET['idCourse']);
	$requeteDeletePoll->execute();

	$requeteDeleteCourse = $pdo->prepare("DELETE FROM `Course` WHERE `idCourse` = :idCourse;");
	$requeteDeleteCourse->bindParam(':idCourse', $_GET['idCourse']);

	if( $requeteDeleteCourse->execute() ){
		$success = true;
		$msg = 'Le cours est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
	
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);