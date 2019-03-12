<?php
include('../template.php');

if( !empty($_GET['idPerson']) ){
    $requete = $pdo->prepare("UPDATE `DailyTopic` SET `hasBeenSeen` = 'true' WHERE `idPerson` = :idPerson;");
	$requete->bindParam(':idPerson',  $_GET['idPerson'] );
	
	if( $requete->execute() ){
		$success = true;
		$msg = 'Un topic a bien été modifié';
	} else {
		$success = false;
		$msg = "Une erreur s'est produite...";
	}
} else {
    $success = false;
	$msg = "Il manque des informations...";
}

reponse_json($success, $msg, $data);