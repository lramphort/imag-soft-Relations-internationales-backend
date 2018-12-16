<?php
include('../template.php');

if( !empty($_GET['idDailyTopic']) ){
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic` WHERE `idDailyTopic` LIKE :idDailyTopic");
	$requete->bindParam(':idDailyTopic', $_GET['idDailyTopic']);
} elseif( !empty($_GET['idPerson']) ) {
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic` WHERE `idPerson` LIKE :idPerson");
	$requete->bindParam(':idPerson', $_GET['idPerson']);
} else {
	$requete = $pdo->prepare("SELECT * FROM `DailyTopic`");
}

if( $requete->execute() ){
	$resultats = $requete->fetchAll();
	
	$success = true;
	$data['nombre'] = count($resultats);
	$data['DailyTopic'] = $resultats;
} else {
	$msg = "Une erreur s'est produite";
}

reponse_json($success, $data);