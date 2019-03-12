<?php
include('../template.php');

if( !empty($_GET['idPerson']) ){
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic` WHERE `idPerson` = :idPerson AND `hasBeenSeen` = 'false';");
	$requete->bindParam(':idPerson', $_GET['idPerson']);

	if( $requete->execute() ){
		$resultats = $requete->fetchAll();
		
		$success = true;
		$data['nombre'] = count($resultats);
		$data['DailyTopic'] = $resultats;
	}
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);