<?php
include('../template.php');

if( !empty($_GET['idDailyTopic']) ){
	$requete = $pdo->prepare("DELETE FROM `DailyTopic` WHERE `idDailyTopic` LIKE :idDailyTopic;");
	$requete->bindParam(':idDailyTopic', $_GET['idDailyTopic']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'Le topic est supprimé';
	} else {
		$msg = "Une erreur s'est produite";
	}
	
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);